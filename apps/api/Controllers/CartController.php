<?php

namespace api\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;
use api\Models\CartModel;
use api\Models\ProductModel;
use api\Models\UserModel;
use Exception;
use Factory;

/**
 *
 * PHP version >= 5.4
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT.
 *
 * @category   Controller
 * @package    api\Controllers
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 * @Rest
 */
class CartController extends Acontroller
{
    /**
     * @var null|CartModel
     */
    private $_model = null;
    /**
     * @var null|ProductModel
     */
    private $_product_model = null;
    /**
     * @var null|UserModel
     */
    private $_client_model = null;
    /**
     * CartController constructor.
     * @param Aorm $model
     * @throws Exception
     */
    public function __construct(Aorm $model)
    {
        /** Call parent construct class */
        parent::__construct($model);
        /** control if there is connection opened */
        if ( !$model->isConnected ) { return false; }
        //set model
        $this->_model = $model;
        $this->_product_model = $this->getModel("api/Product");
        $this->_client_model = $this->getModel("api/User");
    }

    /**
     * @param array $cart
     * @return string[]
     * @Routing[value=get/cart/list]
     */
    public function getCart(array $cart = array())
    {
        $list = '';
        $total = 0;
        foreach ($cart as $item){
            $item = (object) $item;
            $product = $this->_product_model->getProduct($item->item);
            $subTotal = $product->{'Unit Cost'} * $item->qty;
            $picture = $product->Picture;
            $url = !empty($picture) ? $picture[0]->url : "#";
            $list .= '<tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="'.$url.'" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <a href="product/'.$item->item.'">
                                            <p>'.$product->{'Name'}.'</p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>$'.number_format($product->{'Unit Cost'}, 2).'</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" value="'.$item->qty.'" min="0" max="10" id="'.$item->item.'">
                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <h5>$'.number_format($subTotal, 2).'</h5>
                            </td>
                            <td>
                                <button class="btn remove-from-cart" item="'.$item->item.'">REMOVE</button>
                            </td>
                        </tr>';
            $total += $subTotal;
        }
        if(!empty($cart)) {
            $list .= '<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Total</h5>
                        </td>
                        <td>
                            <h5>$'.number_format($total, 2).'</h5>
                        </td>
                    </tr>';
        }
        return array(
            "list" => $list
        );
    }

    /**
     * @return string[]
     * @Routing[value=get/my/orders]
     */
    public function getOrders(){
        $session = Factory::getSession();
        $orders = $this->_model->getMyOrders($session->email);
        $list = '';
        foreach ($orders as $item){
            $item = (object) $item;
            $link = "resonance/invoice/" . $item->{'clientId'};
            $button = "<a href='".$link."' class='btn primary' target='_blank' style='background-color: #1f2b7b !important;'>VIEW ORDER</a>";
            $list .= '<tr>
                            <td>                                
                                <h5>'.$item->{'Order Number'}.'</h5>
                            </td>
                            <td>                                
                                <h5>'.$item->{'Name'}.'</h5>
                            </td>
                            <td>
                                <h5>'.$item->{'Fulfill By'}.'</h5>
                            </td>
                            <td>
                                <h5>$'.number_format($item->{'Order Total Cost'}, 2).'</h5>
                            </td>
                            <td>
                                '.$button.'
                            </td>
                        </tr>';
        }
        return array(
            "list" => $list
        );
    }

    /**
     * @param array $cart
     * @return array
     * @Routing[value=save/cart]
     */
    public function save(array $cart = array()){
        try{
            $session = Factory::getSession();
            if(!$session->logger){
                throw new Exception("Your session has been, please enter again");
            }
            if(empty($cart)){
                throw new Exception("Your cart is empty");
            }

            $setRandom = true;
            while($setRandom){
                $randomOrder = rand(100,1000);
                $resource = $this->_model->checkOrder($randomOrder);
                if(empty($resource)){
                    break;
                }
            }
            $totalCost = 0;
            foreach ($cart as $index => $item){
                $item = (object) $item;
                if((int)$item->qty<1){
                    throw new Exception("Please enter a valid quantity for all items");
                }
                $resource = $this->_product_model->getProduct($item->item);
                //valid
                if($item->qty>$resource->{'Units In Store'}){
                    throw new Exception("Sorry, we have just " . $resource->{'Units In Store'} . " in stock of this item " . $resource->{'Name'});
                }
                $cart[$index]["id"] = $resource->{'RecordID'};
                $cart[$index]["name"] = $resource->{'Name'};
                $cart[$index]["price"] = $resource->{'Unit Cost'};
                $cart[$index]["stock"] = $resource->{'Units In Store'};
                $cart[$index]["subTotal"] = round( ($resource->{'Unit Cost'} * $item->qty), 2 );
                $totalCost += $cart[$index]["subTotal"];
            }
            $clientObject = $this->_client_model->getClient($session->username);
            $clientOrder = array(
                "Client" => array($clientObject->{'Notes'}),
                "Order Number" => (string) $randomOrder,
                "Fulfill By" => date("m/d/Y"),
                "userEmail" => $session->email
            );
            $res = $this->_model->saveClientOrder($clientOrder);
            if(empty($res["id"])){
                throw new Exception("Client order could not be issued, please refresh an try again");
            }
            $orderKey = $res["id"];
            $updateResource = $this->_model->updateClientKeyHeader($orderKey,array("clientId"=>$orderKey));
            if(empty($updateResource["id"])){
                throw new Exception("Client order could not be issued, please refresh an try again");
            }
            foreach ($cart as $item){
                $item = (object) $item;
                $values = array(
                    "Furniture Item" => array($item->id),
                    "Quantity" => (int) $item->qty,
                    "Belongs to Order" => array($orderKey)
                );
                $res = $this->_model->saveClientOrderDetail($values);
                if(empty($res["id"])){
                    throw new Exception("Client order detail could not be save, please refresh and try again");
                }
                $restStock = $item->stock - $item->qty;
                $updateResource = $this->_model->updateProductStock($item->id,array("Units In Store"=>$restStock));
                if(empty($updateResource["id"])){
                    throw new Exception("Stock could not be updated, please refresh and try again");
                }
            }
            return array(
                "status" => true,
                "order" => $orderKey,
                "message" => "Thank for your order, we send your order as soon as possible..."
            );
        } catch (Exception $e){
            return array(
                "status" => false,
                "message" => $e->getMessage()
            );
        }
    }

}
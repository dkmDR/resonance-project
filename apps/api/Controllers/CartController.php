<?php

namespace api\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;
use api\Models\CartModel;
use api\Models\ProductModel;
use Exception;

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
                                        <p>'.$product->{'Name'}.'</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>$'.number_format($product->{'Unit Cost'}, 2).'</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" value="'.$item->qty.'" min="0" max="10">
                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td>
                                <h5>$'.number_format($subTotal, 2).'</h5>
                            </td>
                        </tr>';
            $total += $subTotal;
        }
        if(!empty($cart)) {
            $list .= '<tr>
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

}
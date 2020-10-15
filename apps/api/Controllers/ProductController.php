<?php

namespace api\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;
use api\Models\ProductModel;
use Exception;
use Factory;
use stdClass;

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
class ProductController extends Acontroller
{
    /**
     * @var null|ProductModel
     */
    private $_model = null;
    /**
     * AnnotationController constructor.
     * @param Aorm $model
     */
    public function __construct(Aorm $model)
    {
        /** Call parent construct class */
        parent::__construct($model);
        /** control if there is connection opened */
        if ( !$model->isConnected ) { return false; }
        //set model
        $this->_model = $model;
    }

    /**
     * @param $itemId
     * @return array
     * @Routing[value=send/product/info]
     */
    public function sendProductInfo($itemId)
    {
        try{
            $session = Factory::getSession();
            if(!$session->logger){
                throw new Exception("Please log in before...");
            }
            $product = $this->_model->getProduct($itemId);
            if(empty($product)){
                throw new Exception("Product not found, please refresh the page and try again");
            }
            $emails = array();
            $email1 = new stdClass();
            $email1->type = 3;
            $email1->email = "mcalderon0329@gmail.com";
            $email1->account_name = "Miguel Peralta";
            array_push($emails,$email1);
            $email2 = new stdClass();
            $email2->type = 1;
            $email2->email = $session->email;
            $email2->account_name = $session->firstName . " " . $session->lastName;
            array_push($emails,$email2);
            //ser item...
            Factory::setParametersView($itemId);
            $data = array(
                "key"=>"39a6321d7b5f89f825887cc346b09ea3",
                "subject" => "Resonance E-commerce",
                "emails" => $emails,
                "content"=>Factory::getView("product/mail/template")
            );
            $data = http_build_query($data);

            $process = curl_init("https://billing.oshencore.com/dispatch/product/information");
            curl_setopt($process, CURLOPT_HEADER, false); //TRUE include header in the output.
            curl_setopt($process, CURLOPT_POST, true);
            curl_setopt($process, CURLOPT_POSTFIELDS, $data);
            curl_setopt($process, CURLOPT_TIMEOUT, 30); //Seconds permitted for execute cURL function.
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);//TRUE return result of transfer as string of curl_exec() value instead show directly.
            $return = curl_exec($process);

            /*Print Result*/
//        print_r($return);

            curl_close($process);
            return array(
                "status" => true,
                "message" => "Thank for ask this information, We have sent a mail with all do you need!"
            );
        } catch (Exception $e){
            return array(
                "status" => false,
                "message" => $e->getMessage()
            );
        }
    }

}
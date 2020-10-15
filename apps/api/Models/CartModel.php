<?php

namespace api\Models;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use stdClass;
use Exception;

/**
 * PHP version >= 5.4
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT.
 *
 * @category   Model
 * @package    api\Models
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 */
class CartModel extends Aorm
{
    /**
     * @var null
     */
    private $properties = null;

    /**
     * SampleModel constructor.
     * @param stdClass|null $properties
     * @throws Exception
     */
    public function __construct(stdClass $properties = null)
    {
        parent::__construct($this, $properties);
    }

    /**
     * @return null
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param null $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function saveClientOrder(array $values){
        return $this->getDbo()->insert($values,"Client Orders","Name");
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function saveClientOrderDetail(array $values){
        return $this->getDbo()->insert($values,"Order Line Items","Name");
    }

    /**
     * @param $no
     * @return mixed
     */
    public function checkOrder($no){
        return $this->getDbo()->getRowObjectList(array(
            "table"=>"Client Orders",
            "field"=>"Order Number",
            "value"=>$no
        ));
    }

    /**
     * @param $itemId
     * @param $values
     * @return mixed
     */
    public function updateProductStock($itemId,$values){
        return $this->getDbo()->update($values,"Furniture",$itemId);
    }

    /**
     * @param $invoiceKey
     * @param $values
     * @return mixed
     */
    public function updateClientKeyHeader($invoiceKey,$values){
        return $this->getDbo()->update($values,"Client Orders",$invoiceKey);
    }

    /**
     * @param $no
     * @return mixed
     */
    public function getClientOrder($no){
        return $this->getDbo()->getRowObjectList(array(
            "table"=>"Client Orders",
            "field"=>"clientId",
            "value"=>$no
        ));

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getClientOrderDetail($id){
        $arr = array(
            "table"=>"Order Line Items",
            "filters" => array("filterByFormula" => "AND(RECORD_ID()='$id')")
        );
        return $this->getDbo()->getObjectList($arr);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getMyOrders($email){
        $arr = array(
            "table"=>"Client Orders",
            "filters" => array("filterByFormula" => "AND(userEmail='$email')")
        );
        return $this->getDbo()->getObjectList($arr);
    }
}

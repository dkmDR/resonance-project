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
class ProductModel extends Aorm
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
     * @return array
     */
    public function getTypes(){
        $arr = array(
            "table"=>"Furniture",
            "filters" => array(
                "sort" => array(array('field' => 'Type', 'direction' => "desc"))
            )
        );
        $resource = $this->getDbo()->getObjectList($arr);
        $types = array();
        if(!empty($resource))
            foreach ($resource as $type) {
                if(!in_array($type->{'Type'},$types)){
                    array_push($types,$type->{'Type'});
                }
            }
        return $types;
    }

    /**
     * @return mixed
     */
    public function getProducts(){
        $arr = array(
            "table"=>"Furniture"
        );
        return $this->getDbo()->getObjectList($arr);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getList($type){
        $arr = array(
            "table"=>"Furniture",
            "filters" => array(
                "filterByFormula" => "AND(Type='$type')"
            )
        );
        return $this->getDbo()->getObjectList($arr);
    }

    /**
     * @param $type
     * @return array
     */
    public function limitProducts($type){
        $products = $this->getList($type);
        $response = array();
        for($index=0;$index<count($products);$index++){
            if($index>2) {
                break;
            }
            array_push($response, $products[$index]);
        }
        return $response;
    }

    /**
     * @return array
     */
    public function randomProducts(){
        $products = $this->getProducts();
        shuffle($products);
        $response = array();
        for($index=0;$index<count($products);$index++){
            if($index>2) {
                break;
            }
            array_push($response, $products[$index]);
        }
        return $response;
    }

    /**
     * @param $itemId
     * @return mixed
     */
    public function getProduct($itemId){
        return $this->getDbo()->getRowObjectList(array(
            "table" => "Furniture",
            "field" => "RecordID",
            "value" => $itemId
        ));
    }

}

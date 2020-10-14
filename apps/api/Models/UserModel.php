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
class UserModel extends Aorm
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
     * @return array|int
     */
    public function saveUser(array $values){
        return $this->getDbo()->insert($values,"Users","key");
    }

    /**
     * @param $email
     * @return mixed
     */
    public function checkEmail($email){
        $email = trim(strtolower($email));
        return $this->getDbo()->getRowObjectList(array(
            "table"=>"Users",
            "field"=>"email",
            "value"=>$email
        ));
    }

    /**
     * @param $username
     * @return mixed
     */
    public function checkUser($username){
        $username = trim(strtolower($username));
        return $this->getDbo()->getRowObjectList(array(
            "table"=>"Users",
            "field"=>"username",
            "value"=>$username
        ));
    }

    /**
     * @param $credential
     * @param $password
     * @return mixed
     */
    public function checkCredentialEmail($credential,$password){
        $arr = array(
            "table"=>"Users",
            "filters" => array("filterByFormula" => "AND(email='$credential',Password = '$password')")
        );
        return $this->getDbo()->getObjectList($arr);
    }

    /**
     * @param $credential
     * @param $password
     * @return mixed
     */
    public function checkCredentialUsername($credential,$password){
        $arr = array(
            "table"=>"Users",
            "filters" => array("filterByFormula" => "AND(username='$credential',Password = '$password')")
        );
        return $this->getDbo()->getObjectList($arr);
    }
}

<?php

namespace api\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;
use api\Models\UserModel;
use Factory;
use stdClass;
use Exception;
use Respect\Validation\Validator;

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
class UserController extends Acontroller
{
    /**
     * @var Aorm|null|UserModel
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
     * @param array $form
     * @return array
     * @Routing[value=save/user]
     */
    public function save(array $form = array())
    {
        $password = $this->_model->getSerializeFormModelValueByKey($form,"password");
        $firstName = trim(ucfirst($this->_model->getSerializeFormModelValueByKey($form,"first_name")));
        $lastName = trim(ucfirst($this->_model->getSerializeFormModelValueByKey($form,"last_name")));
        $email = trim(strtolower( $this->_model->getSerializeFormModelValueByKey($form,"email") ));
        $userName = trim(strtolower( $this->_model->getSerializeFormModelValueByKey($form,"user_name") ));
        $values = array(
//            "key" => $this->_model->getSerializeFormModelValueByKey($form,"email"),
            "Password" => $password,
            "First Name" => $firstName,
            "Last Name" => $lastName,
            "email" => $email,
            "username" => $userName
        );
        try{
            $this->valid((object)$values);
            $values["Password"] = md5($values["Password"]);
            $key = $this->_model->saveUser($values);
            if(empty($key["id"])){
                throw new Exception("User could not be registered, please refresh the page and try again");
            }
            $clientValues = array(
                "Name" => $firstName . " " . $lastName,
                "Users" => $userName
            );
            $clientKey = $this->_model->saveClient($clientValues);
            if(empty($clientKey["id"])){
                throw new Exception("Client info, could not be save...");
            }
            $this->_model->updateClientKey($clientKey["id"],array("Notes"=>$clientKey["id"]));
            return array(
                "code" => 200,
                "message" => "User has been registered "
            );
        } catch (Exception $e){
            return array(
                "code" => $e->getCode(),
                "message" => $e->getMessage()
            );
        }
    }

    /**
     * @param stdClass $object
     * @throws Exception
     */
    private function valid(stdClass $object){
        if(!Validator::notEmpty()->validate($object->{'First Name'})){
            throw new Exception("Please enter your first name");
        }
        if(!Validator::notEmpty()->validate($object->{'Last Name'})){
            throw new Exception("Please enter your first name");
        }
        if(!Validator::email()->validate($object->email)){
            throw new Exception("Please enter your email");
        }
        if(!Validator::notEmpty()->validate($object->username)){
            throw new Exception("Please enter an username");
        }
        if(!Validator::notEmpty()->validate($object->{'Password'})){
            throw new Exception("Please enter a password");
        }
        $password = $object->{'Password'};
        if(strlen($password)<6){
            throw new Exception("You must enter a password with 6 or more characters");
        }
        $resource = $this->_model->checkEmail($object->email);
        if(!empty($resource)){
            throw new Exception("This email is already exists, please try with another");
        }
        $resource = $this->_model->checkUser($object->username);
        if(!empty($resource)){
            throw new Exception("This username is already exists, please try with another");
        }
    }

    /**
     * @param array $form
     * @return array
     * @Routing[value=login/user]
     */
    public function login(array $form = array()){
        $credential = $this->_model->getSerializeFormModelValueByKey($form,"credential");
        $password = $this->_model->getSerializeFormModelValueByKey($form,"password");
        try{
            if(empty($credential)){
                throw new Exception("Please enter your username or email");
            }
            if(empty($password)){
                throw new Exception("Please enter your password");
            }
            $password = md5($password);
            $resourceCredential = $this->_model->checkCredentialEmail($credential,$password);
            $credentialSuccess = false;
            if(!empty($resourceCredential)){
                $this->storageSession($resourceCredential[0]);
                $credentialSuccess = true;
            }
            $resourceCredential = $this->_model->checkCredentialUsername($credential,$password);
            if(!empty($resourceCredential)) {
                $this->storageSession($resourceCredential[0]);
                $credentialSuccess = true;
            }
            if(!$credentialSuccess){
                throw new Exception("You don't have permission to this application");
            }
            return array(
                "code" => 200,
                "message" => "User has been logged"
            );
        } catch (Exception $e){
            return array(
                "code" => $e->getCode(),
                "message" => $e->getMessage()
            );
        }
    }

    /**
     * @param stdClass $object
     * @return bool
     */
    public function storageSession(stdClass $object){
        $_SESSION['firstName'] = $object->{'First Name'};
        $_SESSION['lastName'] = $object->{'Last Name'};
        $_SESSION['email'] = $object->{'email'};
        $_SESSION['username'] = $object->{'username'};
        $_SESSION['logger'] = true;
        $_SESSION['sessionKey'] = session_id();
        return true;
    }

}
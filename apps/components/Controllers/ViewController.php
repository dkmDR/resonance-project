<?php

namespace components\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;
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
 * @package    components\Controllers
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 */
class ViewController extends Acontroller
{
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
    }

    /**
     * @Layouts[head=RegisterHeader,foot=RegisterFooter]
     * @Routing[value=login,type=html]
     */
    public function login()
    {
        return "login";
    }

    /**
     * @Layouts[head=RegisterHeader,foot=RegisterFooter]
     * @Routing[value=register,type=html]
     */
    public function register()
    {
        return "register";
    }

    /**
     * @Routing[value=home,type=html]
     */
    public function home()
    {
        return "home";
    }

    /**
     * @Routing[value=products,type=html]
     */
    public function products()
    {
        return "products";
    }

    /**
     * @param string $item
     * @return string
     * @Routing[value=product/{item},type=html]
     */
    public function product($item = '')
    {
        Factory::setParametersView($item);
        return "product";
    }

    /**
     * @Routing[value=cart,type=html]
     */
    public function cart()
    {
        return "cart";
    }

    /**
     * @Layouts[head=EmptyHead,foot=EmptyFoot]
     * @Routing[value=logout,type=html]
     */
    public function logOut()
    {
        return "logout";
    }

    /**
     * @param $item
     * @return string
     * @Layouts[head=EmptyHead,foot=EmptyFoot]
     * @Routing[value=product/mail/template/{item},type=html]
     */
    public function mailContent($item)
    {
        Factory::setParametersView($item);
        return "mailTemplate";
    }

    /**
     * @Layouts[head=EmptyHead,foot=EmptyFoot]
     * @Routing[value=product/mail/template,type=html]
     */
    public function mail()
    {
        return "mailTemplate";
    }

    /**
     * @param $invoice
     * @return string
     * @Layouts[head=EmptyHead,foot=EmptyFoot]
     * @Routing[value=resonance/invoice/{invoice},type=html]
     */
    public function invoice($invoice)
    {
        Factory::setParametersView($invoice);
        return "invoice";
    }

    /**
     * @Routing[value=profile,type=html]
     */
    public function profile()
    {
        return "profile";
    }

}
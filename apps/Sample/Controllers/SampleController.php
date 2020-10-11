<?php

namespace Sample\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;

/**
 *
 * PHP version >= 5.4
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT.
 *
 * @category   Controller
 * @package    Defaults\Controllers
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 */
class SampleController extends Acontroller
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
     * @Routing[value=sample,type=html]
     */
    public function sample()
    {
        return "IncludeView";
    }

    /**
     * @Routing[value=single/sample,type=html]
     */
    public function singleSample()
    {
        return "SampleView";
    }

    /**
     * @Routing[value=sample/js/view,type=html]
     */
    public function sampleJs()
    {
        return "IncludeJsView";
    }

    /**
     * @Routing[value=sample/css/view,type=html]
     */
    public function sampleCss()
    {
        return "IncludeCssView";
    }

    /**
     * @Routing[value=under/construction,type=html]
     */
    public function underConstruction()
    {
        return "underConstruction";
    }

    /**
     * @Routing[value=auth,type=json]
     */
    public function auth()
    {
        return array("message"=>"Hello World");
    }

}
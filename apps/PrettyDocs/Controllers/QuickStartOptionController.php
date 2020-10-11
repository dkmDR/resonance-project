<?php

namespace PrettyDocs\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use abstracts\Acontroller;

/**
 *
 * PHP version 5.4
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT.
 *
 * @category   Controller
 * @package    PrettyDocs\Controllers
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 * @Layouts[head=EmptyHead,foot=EmptyFoot]
 */

class QuickStartOptionController extends Acontroller
{
    /**
     * QuickStartOptionController constructor.
     * @param Aorm $model
     */
    public function __construct( Aorm $model ) {
        parent::__construct($model);
    }

    /**
     * @Routing[value=quick-start-step-one,type=html]
    */
    public function stepOne(){
        return "stepOneView";
    }

    /**
     * @Routing[value=quick-start-step-two,type=html]
     */
    public function stepTwo(){
        return "stepTwoView";
    }

    /**
     * @Routing[value=quick-start-step-three,type=html]
     */
    public function stepThree(){
        return "stepThreeView";
    }

    /**
     * @Routing[value=quick-start-structure-modules,type=html]
     */
    public function structureModules(){
        return "structureModulesView";
    }

    /**
     * @Routing[value=quick-start-structure-layout,type=html]
     */
    public function structureLayout(){
        return "structureLayoutView";
    }

    /**
     * @Routing[value=quick-start-structure-lib,type=html]
     */
    public function structureLib(){
        return "structureLibView";
    }

    /**
     * @Routing[value=quick-start-structure-log,type=html]
     */
    public function structureLog(){
        return "structureLogView";
    }

    /**
     * @Routing[value=quick-start-structure-jscss,type=html]
     */
    public function structureJsCss(){
        return "structureJSCSSView";
    }

    /**
     * @Routing[value=quick-start-structure-routing,type=html]
     */
    public function structureRouting(){
        return "routingView";
    }

    /**
     * @Routing[value=quick-start-structure-factory,type=html]
     */
    public function structureFactory(){
        return "factoryView";
    }

    /**
     * @Routing[value=quick-start-structure-bootstrap,type=html]
     */
    public function structureBootstrap(){
        return "bootstrapView";
    }

}
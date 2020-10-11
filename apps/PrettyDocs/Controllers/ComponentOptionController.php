<?php

namespace PrettyDocs\Controllers;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Acontroller;
use abstracts\Aorm;

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

class ComponentOptionController extends Acontroller
{
    /**
     * ComponentOptionController constructor.
     * @param Aorm $model
     */
    public function __construct( Aorm $model ) {
        parent::__construct($model);
    }

    /**
     * @Routing[value=components-structure-module,type=html]
    */
    public function componentModule(){
        return "structureModuleView";
    }

    /**
     * @Routing[value=components-structure-strmodule,type=html]
     */
    public function componentModuleStructure(){
        return "structureStrModuleView";
    }

    /**
     * @Routing[value=components-structure-orm,type=html]
     */
    public function componentOrm(){
        return "ormView";
    }

}
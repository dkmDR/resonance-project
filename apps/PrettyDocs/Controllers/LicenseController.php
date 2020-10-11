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
 * @package    Defaults\Controllers
 * @author     Miguel Peralta <mcalderon0329@gmail.com>
 * @license    https://opensource.org/licenses/MIT  MIT license
 * @since      File available since Release 2.1
 * @Layouts[head=DocsLicenseHeader,foot=DocsFooter]
 */

class LicenseController extends Acontroller
{
    /**
     * LicenseController constructor.
     * @param Aorm $model
     */
    public function __construct( Aorm $model ) {
        parent::__construct($model);
    }

    /**
     * @Routing[value=license,type=html]
    */
    public function license(){
        return "licenseView";
    }

}
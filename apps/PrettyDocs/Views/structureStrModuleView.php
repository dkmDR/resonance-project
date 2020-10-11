
<section id="module-components" class="doc-section">

    <h2 class="section-title">Module Components</h2>

    <div id="controllers" class="section-block">
        <h3 class="block-title">Controller</h3>
        <p>
            The controller file receive all requests to module. They must extends from Abstract class 'AController'.
            <br><br>
            Here,
            <br><br>
            An example Controller
        </p>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre><code class="language-php">&lt;?php

namespace Defaults\Controllers;

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
 */

class AnnotationController extends Acontroller
{
    /**
     * AnnotationController constructor.
     * @param Aorm $model
     */
    public function __construct( Aorm $model ) {
        parent::__construct($model);
    }

    /**
     * @Routing[value=annotation,type=html]
    */
    public function annotation(){
        return "annotation";
    }

}

?&gt;</code></pre>
            </div>
        </div><!--//row-->
    </div><!--//section-block-->

    <div id="models" class="section-block">
        <h3 class="block-title">Model</h3>
        <p>
            If you need to get any information from database, you will need to create a Model file. This file must extend from <strong>'Aorm'</strong> class

        </p>
        <p>
            It's necessary to know how's the functionality of Object-Relation-Mapping (ORM) on Model class to execute action in database.
        </p>
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

            <pre>
                <code class="language-php">&lt;?php

namespace Defaults\Models;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use abstracts\Aorm;
use stdClass;

/**
 * PHP version 5.4
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT.
 *
 * @category   Model
 * @package    Defaults\Models
 * @Table[name=table_name]
 */

class AnnotationModel extends Aorm
{
    /**
     * @PrimaryKey
     * @AutoIncrement (optional)
     * @Column[name=field_name(optional),type=integer,alias=example(optional),valid=RuleClassName(optional),keyMessage=message description(optional)]
     */
    private $id;

    /**
     * @var RelativeModel
     * @OneToMany[Entity=Module/Model,targetReference=key_name_in_this_class,target=target_key]
     */
    private $relative;

    /**
     * @var RelativeModel
     * @ManyToOne[Entity=Module/Model,targetReference=key_name_in_this_class,target=target_key]
     */
    private $relativeObject;

    /**
     * @var null
     */
    private $properties = null;

    /**
     * AnnotationModel constructor.
     * @param stdClass|null $properties object { server : ??, user : ??, pass : ??, db : ??, port : ??, provider: ??}
     */
    public function __construct( stdClass $properties = null ) {
        parent::__construct($this,$properties);
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

}

?&gt;</code></pre>
            </div>


        </div><!--//row-->
        <br />
        <br />
        <h4>Optional Field @Column</h4>
        <br />
        <ul>
            <li><strong>name : </strong>&nbsp;<span>Name of the field in the database table. If you don't put this attribute, CrowPHP will use the name of variable in the class</span></li>
            <li><strong>alias : </strong>&nbsp;<span>Name of the field for query results</span></li>
            <li>
                <strong>valid : </strong>&nbsp;<span>Name of the rule class into <strong>lib\vendor\validator\rules</strong></span>
                <br><br>
                <p>Also,</p>
                <br>
                <p>You can add multiple rules in the validation, using ":" between them.</p>
                <br>
                <strong>Ejemplo</strong>
                <br>
                <p style="padding-left: 30px;"><strong>-valid=NumericVal:HigherThanZero</strong></p>
                <br>
                <span>*Multiple rules and send parameter to compare*</span>
                <p style="padding-left: 30px;"><strong>-valid=NotEmpty:MaxLength?150</strong></p>
                <br>
            </li>
            <li>
                <strong>keyMessage : </strong>&nbsp;<span>Mensaje de validación realizada en la anotacion <strong>'valid'</strong></span>
                <br><br>
                <strong>Note:</strong>
                <br>
                <span style="padding-left: 30px;">Do not use special characters such as: '*', '?', ',' This may cause inconsistency in the validation.</span>
                <br><br>
            </li>
        </ul>
        <h4>Optional Field @AutoIncrement</h4>
        <p>This option is for Primary Key</p>
        <br><br>
        <p>
            Please check <strong>Aorm Methods</strong>
        </p>
    </div><!--//section-block-->

    <div id="views" class="section-block">
        <h3 class="block-title">View</h3>
        <p>
            HTML code must be here, this is a CrowPHP example
        </p>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <pre><code class="code-block">
&lt;h1&gt; VIEW &lt;/h1&gt;

&lt;p&gt; Write your code!! &lt;/p&gt;
</code></pre>
            </div>
        </div><!--//row-->
    </div><!--//section-block-->

</section><!--//doc-section-->
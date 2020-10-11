<section id="routing" class="doc-section">
    <h2 class="section-title">Routing</h2>
    <div class="section-block">

        <p>How we routing? using PHP annotation let see</p>

        <pre><code class="language-php">&lt;?php

class AnnotationController extends Acontroller
{
    /**
     * @Routing[value=home,type=html]
     */
    public function index() {
        return "index";
    }

    /**
     * @Routing[value=home/{id},type=html]
     */
    public function product($id) {
        Factory::setParametersView($id);
        return "index";
    }

}
?&gt;</code></pre>

        <p>
            In this case is necessary to extends from <strong>Acontroller</strong> abstract class
        </p>

        <div class="callout-block callout-success">
            <div class="icon-holder">
                <i class="fa fa-thumbs-up"></i>
            </div><!--//icon-holder-->
            <div class="content">
                <h4 class="callout-title">Useful Tip:</h4>
                <p>
                    You can see example file into Defaults/Controllers/AnnotationController.php
                </p>
            </div><!--//content-->
        </div>

        <p>
            To route with annotations you must define <code>@Routing[value=path]</code> the path will be use to
            receive all requests with this name, if you want send a parameter you must write after <strong>/</strong> 'parameter option'
            like this <code>@Routing[value=home/{anything}]</code> the value into <strong>{}</strong> does not describe
            variable name that you receive as parameter in the function.
            <br><br>
            <strong>'type option'</strong> into @Routing will be define the response result of method, if you does not specify <strong>'type option'</strong>,
            the framework will be return a <strong>'text value'</strong>.
            <br><br>
            If you choose <strong>'html option'</strong> as a type, it will be charge the header layout and footer layout by default unless you write a specific layouts
            like this :
        </p>

        <pre><code class="language-php">&lt;?php
/**
* @Layouts[head=Header,foot=Footer]
*/
class AnnotationController extends Acontroller
{
    /**
     * @Routing[value=home,type=html]
     */
    public function index() {
        return "index";
    }

    /**
     * @Routing[value=home/{id},type=html]
     */
    public function product($id) {
        Factory::setParametersView($id);
        return "index";
    }

}
?&gt;</code></pre>

        <h4>Note:</h4>

        <p>if you use the <strong>html type</strong>. You must return the name of view into the current module or a html string</p>

        <br><br>
        <h4>Using Layouts</h4>

        <p>There are two way to use layouts in CrowPHP</p>

        <p>
            Here! we use the annotation <strong>@Layouts</strong> out of class. This you indicated that the class will use a layout for all request defined.
            <br>
            As long as you declared the type method as <strong>html</strong>
        </p>

        <pre><code class="language-php">&lt;?php
/**
* @Layouts[head=Header,foot=Footer]
*/
class AnnotationController extends Acontroller
{
    /**
     * @Routing[value=home,type=html]
     */
    public function index() {
        return "index";
    }

}
?&gt;</code></pre>

        <p>
            Now, if you want to call different layouts, no matter what you are calling from the head of the class. You can do this by specifying the <strong>@Layouts</strong> annotation from the method that will receive the request
        </p>

        <pre><code class="language-php">&lt;?php
/**
* @Layouts[head=Header,foot=Footer]
*/
class AnnotationController extends Acontroller
{
    /**
     * @Layouts[head=exampleHeader,foot=exampleFooter]
     * @Routing[value=home,type=html]
     */
    public function index() {
        return "index";
    }

}
?&gt;</code></pre>

        <br><br>
        <p>
            The last type that you can specify is <strong>'json'</strong> if you want that method return it.
        </p>

        <pre><code class="language-php">&lt;?php

class AnnotationController extends Acontroller
{
    /**
     * @Routing[value=home,type=json]
     */
    public function index() {
        return array("key" => "key option");
    }

}
?&gt;</code></pre>

        <p>You can convert a complete controller class in REST CLASS, what's we are mean? that all class methods return a json.</p>

        <pre><code class="language-php">&lt;?php
/**
* @Rest
*/
class AnnotationController extends Acontroller
{
    /**
     * @Routing[value=home]
     */
    public function index() {
        return array("key" => "key option");
    }

}
?&gt;</code></pre>

        <div class="callout-block callout-success">
            <div class="icon-holder">
                <i class="fa fa-thumbs-up"></i>
            </div><!--//icon-holder-->
            <div class="content">
                <h4 class="callout-title">Useful Tip:</h4>
                <p>
                    Remember to handle a json, you must return an array or object from PHP method
                </p>
            </div><!--//content-->
        </div>

        <p>
            If you want to run a example, change the key <strong>annotation</strong> from configuration.json file to true
            <br><br>
            <code>localhost/annotation</code>
        </p>


<!--        <div class="callout-block callout-success">-->
<!--            <div class="icon-holder">-->
<!--                <i class="fa fa-thumbs-up"></i>-->
<!--            </div>-->
<!--            <div class="content">-->
<!--                <h4 class="callout-title">Lorem ipsum dolor sit amet</h4>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a href="#">Link example</a> aenean commodo ligula eget dolor.</p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="callout-block callout-danger">-->
<!--            <div class="icon-holder">-->
<!--                <i class="fa fa-exclamation-triangle"></i>-->
<!--            </div>-->
<!--            <div class="content">-->
<!--                <h4 class="callout-title">Interdum et malesuada</h4>-->
<!--                <p>Morbi eget interdum sapien. Donec sed turpis sed nulla lacinia accumsan vitae ut tellus. Aenean vestibulum <a href="#">Link example</a> maximus ipsum vel dignissim. Morbi ornare elit sit amet massa feugiat, viverra dictum ipsum pellentesque. </p>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>
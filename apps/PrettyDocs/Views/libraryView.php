
<div class="doc-wrapper">
    <div class="container">
        <div id="doc-header" class="doc-header text-center">
            <h1 class="doc-title"><span aria-hidden="true" class="icon icon_datareport_alt"></span> Library</h1>
            <div class="meta"><i class="fa fa-clock-o"></i> Last updated: February 12th, 2019</div>
        </div><!--//doc-header-->
        <div class="doc-body">
            <div class="doc-content">
                <div class="content-inner">

                    <section id="library" class="doc-section">

                        <h2 class="section-title">External Library</h2>
                        <div class="section-block">
                            <ul class="list list-unstyled">

                                <li><a href="https://github.com/Respect/Validation" target="_blank"><i class="fa fa-external-link-square"></i> Respect Validation</a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-external-link-square"></i> Minimizer</a></li>
                                <li><a href="https://github.com/Seldaek/monolog" target="_blank"><i class="fa fa-external-link-square"></i> Monolog</a></li>

                            </ul>
                        </div>

                    </section>

                    <section id="auth" class="doc-section">

                        <h2 class="section-title">HTTP Authentication</h2>

                        <div class="section-block">

                            <p>
                                If you need create a Rest API authentication with user and password, CrowPHP give you a library <strong>'Auth'</strong> class.

                            </p>

                            <h5>HTTP Request</h5>

                            <pre><code class="language-php">&lt;?php

$host = "http://localhost/CrowPHP/rest";
$username = "username";
$password = "password";

$additionalHeaders = "";

/*Header for Digest method*/
//$additionalHeaders = 'Authorization:Digest ' . md5( $username . ":" . $password );

/*Header for Basic method*/
//$additionalHeaders = 'Authorization:Basic ' . base64_encode( $username . ":" . $password );

$process = curl_init($host);
curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $additionalHeaders));//if you send the request by header, you need use this curl_setopt and additionalHeaders with the user and password
curl_setopt($process, CURLOPT_HEADER, false); //TRUE include header in the output.
curl_setopt($process, CURLOPT_TIMEOUT, 30); //Seconds permitted for execute cURL function.
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);//TRUE return result of transfer as string of curl_exec() value instead show directly.
$return = curl_exec($process);

/*Print Result*/
Factory::printer($return);

curl_close($process);

                                    ?></code></pre>

                            <h5>POST Request</h5>

                            <pre><code class="language-php">&lt;?php

$host = "http://localhost/CrowPHP/rest";
$username = "username";
$password = "password";

$process = curl_init($host);
curl_setopt($process, CURLOPT_HEADER, false); //TRUE include header in the output.
curl_setopt($process, CURLOPT_TIMEOUT, 30); //Seconds permitted for execute cURL function.

/*Note: if you want to use POST request, please comment the CURLOPT_HTTPHEADER.*/

$data = array("auth_user_name"=>"username","auth_pass_word"=>"password","extra"=>array(1,2,3,4,5));
$data = http_build_query($data);

            /*OR*/

//$data = "auth_user_name=username&auth_pass_word=password";

curl_setopt($process, CURLOPT_POST, true);//to indicate if you'll do a post
curl_setopt($process, CURLOPT_POSTFIELDS, $data);//is necessary send the data with this curl_setopt if you going to use POST request.
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);//TRUE return result of transfer as string of curl_exec() value instead show directly.
$return = curl_exec($process);

/*Print Result*/
Factory::printer($return);

curl_close($process);

                                    ?></code></pre>

                            <p>
                                HOST SERVER
                            </p>

                            <p>
                                You must put all authentication code into try-catch. As the previous example
                            </p>

                            <pre><code class="language-php">&lt;?php

try{
    /*Create object with HOST credential*/
    $response = false;
    $std = new stdClass();
    $std->host = "localhost";
    $std->username = "username";
    $std->password = "password";

    /*instance of Auth Class and send object*/
    $auth = new lib\http\Auth($std);

    /*
     * There are two methods permitted in this Auth class 'Digest' and 'Basic'
     * 'Digest' uses md5 encode credential and 'Basic' base64. it will depends which you need to use
     */
    //$response = $auth->authDigest();

    /* Or */

    //$response = $auth->authBasic();

    /*Theses methods return a bool value, TRUE or FALSE */
    $msg = ($response) ? "Open" : "Close";

    return array("response" => $msg, "status"=>$response);

} catch (RuntimeException $rexc) {

    return array("response" => $rexc->getMessage(), "status"=>false);

}

                                    ?></code></pre>

                            <p>
                                POST HOST SERVER
                            </p>

                            <pre><code class="language-php">&lt;?php

try{
    /*Create object with HOST credential*/
    $response = false;
    $std = new stdClass();
    $std->host = "localhost";
    $std->username = "username";
    $std->password = "password";

    /*instance of Auth Class and send object*/
    $auth = new lib\http\Auth($std);

    /*
     * There is another method for Auth class.
     * Using POST method you can validate an 'username' and 'password'.
     * the request must define two params
     * -auth_user_name
     * -auth_pass_word
     */
    $response = $auth->authPost();

    /*
     * If you want to get the params have been sent use this method
     * Note: if the params are not defined, this method will return a NULL value
     */
    //$object = $auth->postInput();

    /*Theses methods return a bool value, TRUE or FALSE */
    $msg = ($response) ? "Open" : "Close";

    return array("response" => $msg, "status"=>$response);

} catch (RuntimeException $rexc) {

    return array("response" => $rexc->getMessage(), "status"=>false);

}

                                    ?></code></pre>

                        </div>

                    </section>

                    <section id="middleware" class="doc-section">

                        <h2 class="section-title">Middleware</h2>

                        <div class="section-block">

                            <p>
                                CrowPHP also implements a http validation with middlewares, How we use :
                            </p>

                            <p>There are a structure directories into <strong>lib/http/middleware</strong></p>

                            <ul>
                                <li><strong>roles/</strong><span>&nbsp;&nbsp;In this directory, there will be all the roles that you want to define. It should be noted that there are some predefined roles, such as authentications.</span></li>
                                <li><strong>Filter.php</strong>&nbsp;&nbsp;In this file must be all routes that will be validate. Let see an example</li>
                            </ul>

                            <pre><code class="language-php">&lt;?php

namespace lib\http\middleware;

abstract class Filter {

    /**
     * @var array
     */
    protected static $filters = array(

        /*Route*/               /*classes and params*/
        "auth"          =>      array(
                                    "class" => array(
                                                /*class name*/      /*class params (must be array)*/
                                                "AuthBasic"     =>  array(
                                                                        "host" => "localhost",
                                                                        "username" => "username",
                                                                        "password" => "password"
                                                                    ),

                                                /*class name*/      /*class params (must be array)*/
                                                "Key"           => array ("key" => "e10adc3949ba59abbe56e057f20f883e")

                                                )
                                )

    );

}

?></code></pre>

                            <p>This <strong>abstract class</strong> has a <strong>protected attribute</strong> where is define all validation roles.</p>

                            <ul>
                                <li><strong>auth</strong>&nbsp;&nbsp;<span>route defined...</span></li>
                                <li><strong>class</strong>&nbsp;&nbsp;<span>array with all class that you want apply in this validation</span></li>
                                <li>
                                    <strong>AuthBasic</strong>&nbsp;&nbsp;<span>Name of class define into <strong>lib/http/middleware/roles</strong></span>
                                    <br><br>
                                    <p> <strong>Note : </strong> <span>you must define array value although it empty.</span></p>
                                </li>
                            </ul>

                            <p>You can add multiple class like example or only one for some request.</p>

                            <h5>Role Example</h5>

                            <pre><code class="language-php">&lt;?php

namespace lib\http\middleware\roles;

use lib\http\middleware\IRole;
use lib\http\Auth;
use RuntimeException;
use stdClass;

class AuthDigest implements IRole
{
    /**
     * @param stdClass|null $object
     * @return array
     */
    public function handle(stdClass $object = null)
    {
        $response = array();

        try {

            $auth = new Auth($object);

            $responseAuth = $auth->authDigest();

            $response["text"] = ( $responseAuth ) ? "This request is allowed in Digest" : "Please verify the credentials in Digest";
            $response["allowed"] = $responseAuth;


        } catch (RuntimeException $rExec) {
            $response["text"] = $rExec->getMessage();
            $response["allowed"] = false;
        }

        return $response;
    }

}

?></code></pre>

                            <p><strong>We include for you some authentication classes and we will use as example.</strong></p>

                            <p>
                                All roles must implement <strong>IRole</strong> interface. In this class you should write a function validation and return an array with necessary key.
                            </p>

                            <div class="callout-block callout-info">
                                <div class="icon-holder">
                                    <i class="fa fa-thumbs-up"></i>
                                </div><!--//icon-holder-->
                                <div class="content">
                                    <h4 class="callout-title">Note :</h4>
                                    <p>
                                        You must return "allowed" key into the array in this way CrowPHP would validate the middleware. if you do not specify this key, CrowPHP will put this key for you but it wont validate.
                                    </p>
                                </div><!--//content-->
                            </div>

                            <h5>Custom Role Example</h5>

                            <pre><code class="language-php">&lt;?php

namespace lib\http\middleware\roles;


use lib\http\middleware\IRole;
use stdClass;

class Key implements IRole
{
    public function handle(stdClass $object = null)
    {
        $response = array(
            "text" => "key not found",
            "allowed" => false
        );

        if ( $object->key == "e10adc3949ba59abbe56e057f20f883e" ) {
          $response["text"] = "key found";
          $response["allowed"] = true;
        }

        return $response;
    }

}

?></code></pre>

                            <p>In this example we can see a <strong>custom role</strong> where is validate some key.</p>

                            <p>You can create all validation class do you need as this example and specify into <strong>Filter.php</strong></p>

                        </div>


                    </section>

                    <section id="cors" class="doc-section">

                        <h2 class="section-title">Cross-origin resource sharing (CORS)</h2>

                        <div class="section-block">

                            <p>
                                If you want do a petition from different host that you server-side host, CORS is present. For this case
                                you can define annotation or value into <strong>@Routing</strong> annotation that you permitte handle this request
                            </p>

                            <pre><code class="language-php">&lt;?php

/**
 * @Routing[value=example,allowedHost=http://localhost,allowedMethod=OPTIONS:POST,type=json]
 */
public function example(){

}

?></code></pre>
                            <p>
                                In this case we can see two values defined into <strong>@Routing</strong> :
                                <br><br>
                                -allowedHost
                                <br>
                                -allowedMethod
                                <br><br>
                                with <strong>allowedHost</strong> we could limit all request to this method from the host,
                                if another host is going to trying access to this method automatically the request will be destroy.
                                it is going to responding a <strong>403 Forbidden</strong>.
                                <br>
                                <br>
                                There are three methods allowed into CORS Request 'OPTIONS,POST,GET', if you want limit the request by any this method must specify into <strong>allowedMethod</strong>.
                                The same way if the request does not have one of this method the request will be destroy.
                                it is going to responding a <strong>403 Forbidden</strong>.
                                <br><br>
                                <strong>
                                    Note : you can put more than one method separating them with ':' like this :
                                    <br>
                                    @allowedMethod=OPTIONS:POST
                                </strong>
                            </p>

                            <p>If you do not want specify one <strong>Host</strong> for each method, you can define the host in the class header like this :</p>

                            <pre><code class="language-php">&lt;?php

/**
 * @allowedHost[host=http://localhost:3000]
 */
class SampleController extends Acontroller {

}

?></code></pre>

                            <p>
                                <strong>
                                Note : you can put more than one host separating them with '||' like this :
                                <br>
                                @allowedHost[host=http://localhost:3000||http://localhost]
                                </strong>
                            </p>


                        </div>

                    </section>

                </div><!--//content-inner-->
            </div><!--//doc-content-->
            <div class="doc-sidebar">
                <nav id="doc-nav">
                    <ul id="doc-menu" class="nav doc-menu hidden-xs" data-spy="affix">
                        <li><a class="scrollto" href="#library">External Library</a></li>
                        <li><a class="scrollto" href="#auth">HTTP Authentication</a></li>
                        <li><a class="scrollto" href="#middleware">Middleware</a></li>
                        <li><a class="scrollto" href="#cors">Cors</a></li>
                    </ul><!--//doc-menu-->
                </nav>
            </div><!--//doc-sidebar-->
        </div><!--//doc-body-->
    </div><!--//container-->
</div><!--//doc-wrapper-->
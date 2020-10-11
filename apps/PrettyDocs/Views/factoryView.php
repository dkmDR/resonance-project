<section id="factory" class="doc-section">
    <h2 class="section-title">Factory</h2>
    <div class="section-block">
        <p>
            General methods of Factory class
        </p>
    </div>
    <div class="section-block">
        <pre><code class="language-php">&lt;?php
/**
 * set a controller application object
 * @param \abstracts\Acontroller $controller
 */
public static function setController( $controller )

/**
 * @return mixed get current controller by application configured
 */
public static function get()

/**
 * define object by session variables
 * @return void
 */
public static function setSession()

/**
 * @return stdClass get object by session keys
 */
public static function getSession()

/**
 * @param $key ask for session key
 * @return bool
 */
public static function isSession( $key )

/**
 * verify if request variable was defined
 * @param string $name
 * @return boolean
 */
private static function isRequest( $name )

/**
* get Request Variable
* @param string $name
* @return mixed|null
*/
public static function getInput( $name )

/**
* get main path
* @return string
*/
public static function redirectTo()

/**
 * scape html
 * @param string $escapestring
 * @param flag $flags
 * @param string $charset
 * @param boolean $double_encode
 * @return string
 */
public static function escapeHtml($escapestring, $flags = ENT_QUOTES, $charset = 'UTF-8', $double_encode = TRUE)

/**
 * log error file
 * @param string $error
 * @return void
 */
public static function loggerError( $string )

/**
  * log warning file
  * @param string $string
  * @return void
*/
public static function loggerWarning( $string )

/**
  * log info file
  * @param string $string
  * @return void
 */
public static function loggerInfo( $string )

/**
  * log notice file
  * @param string $string
  * @return void
*/
public static function loggerNotice( $string )

/**
  * log debug file
  * @param string $string
  * @return void
 */
public static function loggerDebug( $string )

/**
  * log critical file
  * @param string $string
  * @return void
*/
public static function loggerCritical( $string )

/**
 *
 * @return array get parameters from view
 * array [ 0 => ??, 1 => 1 ]
 */
public static function getParametersView()

/**
 * render content view by defined keys of Web file
 * @param string $url url defined
 * @param array $params
 * @return string
 */
public static function renderView( $url, array $params = array() )

/**
 * Print content and die
 * @param $content mixed
 * @return void
 */
public static function printDie( $content )

/**
 * @param $content mixed
 * @return void;
 */
public static function printer( $content )

/**
 * render view with annotation
 * @param $url
 * @return mixed
 * @version 2.1
 */
public static function getView( $url )
?&gt;</code></pre>
    </div><!--//section-block-->
</section><!--//doc-section-->

<div id="configuration"  class="section-block">
<h3 class="block-title">Step One</h3>
<p>
    Let's to change the environment configuration
</p>

<div class="code-block">
<h6>Go to lib/configuration.json</h6>
<pre>
<code class="language-markup">
{
    "useDatabase"                                   :       false,
    "appInDeveloping"                               :       true,
    "instanceDatabase"                              :       "Mysqli",

    "title"                                         :       "CrowPHP FRAMEWORK",

    "server"                                        :       "http://localhost/",
    "defaultKeyRouting"                             :       "sample",

    "dirModules"                                    :       "Apps",
    "dirLayouts"                                    :       "layouts",
    "mainHeaderLayout"                              :       "Header",
    "mainFooterLayout"                              :       "Footer",
    "dirProject"                                    :       "CrowPHP/",
    "dirLogs"                                       :       "logs",
    "dirMainFileJs"                                 :       "js",
    "dirMainFileCss"                                :       "css",

    "fileLayoutError"                               :       "error",

    "useStorageSession"                             :       false,
    "storageTable"                                  :       "sessions",
    "primaryKeyField"                               :       "record_id",
    "storageIdField"                                :       "session_id",
    "StorageDataField"                              :       "session_data",

    "localservers"                                  :       "localhost,127.0.0.1,localhost:8080",
    "cors"                                          :       false,
    "version"                                       :       "2.3"
}
</code>
</pre>
</div><!--//code-block-->

<p>
    There are different options, that you must change depending your application. let us explain it below
</p>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
    <table class="table table-condensed table-bordered">
        <tbody>
            <tr>
                <td>useDatabase</td>
                <td>This option can be 'true' or 'false' depending if you want that the app connect to database or not</td>
            </tr>
            <tr>
                <td>appInDeveloping</td>
                <td>This option can be 'true' or 'false' depending if you want indicate that your app is in develop or not</td>
            </tr>
            <tr>
                <td>instanceDatabase</td>
                <td>There are two option to connect to database server 'Postgresql' or 'Mysqli'</td>
            </tr>
            <tr>
                <td>title</td>
                <td>General application title</td>
            </tr>
            <tr>
                <td>server</td>
                <td>specify the domain server or ip server where the app will be run. Be sure if you use domain server write the 'http://' or 'https://'</td>
            </tr>
            <tr>
                <td>defaultKeyRouting</td>
                <td>Write the main route that you specified in your router file <a class="scrollto" href="#routing">Please check Routing!!</a></td>
            </tr>
            <tr>
                <td>dirModules</td>
                <td>Main directory for all modules in the application</td>
            </tr>
            <tr>
                <td>dirLayouts</td>
                <td>Main directory for all Layouts in the application</td>
            </tr>
            <tr>
                <td>mainHeaderLayout</td>
                <td>Define main header layout</td>
            </tr>
            <tr>
                <td>mainFooterLayout</td>
                <td>Define main footer layout</td>
            </tr>
            <tr>
                <td>dirProject</td>
                <td>Main directory of application</td>
            </tr>
            <tr>
                <td>dirLogs</td>
                <td>Main directory for all Logs in the application</td>
            </tr>
            <tr>
                <td>dirMainFileJs</td>
                <td>
                    Main directory for all JS in the application.<br />
                    Note: this include JS directories into modules for the use <a href="#">Getting JS</a>
                </td>
            </tr>
            <tr>
                <td>dirMainFileCss</td>
                <td>
                    Main directory for all CSS in the application.<br />
                    Note: this include CSS directories into modules for the use <a href="#">Getting CSS</a>
                </td>
            </tr>
            <tr>
                <td>fileLayoutError</td>
                <td>
                    If the framework detect a internal error, it will send you to error page. Here you could change that page.
                    <br />
                    note: this page must be into layout directory
                </td>
            </tr>
            <tr>
                <td>useStorageSession</td>
                <td>
                    This option can be 'true' or 'false' depending if you want that the application use session store by PHP <a href="#">you can see here</a>
                    <br />
                    if you will use this option, follow this steps <br />
                </td>
            </tr>
            <tr>
                <td>storageTable</td>
                <td>
                    Create into your database a new table 'session_data'
                </td>
            </tr>
            <tr>
                <td>primaryKeyField</td>
                <td>
                    Create a primary key field as 'record_id', this field must be AUTOINCREMENT
                </td>
            </tr>
            <tr>
                <td>storageIdField</td>
                <td>
                    Create a field 'session_id' to store SESSION ID
                </td>
            </tr>
            <tr>
                <td>StorageDataField</td>
                <td>
                    Create a field 'session_data' to store the SESSION DATA
                </td>
            </tr>
            <tr>
                <td>localservers</td>
                <td>
                    If your application will run in local server your must write the ip address in this option
                </td>
            </tr>
            <tr>
                <td>annotation</td>
                <td>
                    After version 2.1, CrowPHP changes your routing form, Its allowing the use of annotation. for that reason this field could not be change.
                </td>
            </tr>
            <tr>
                <td>version</td>
                <td>
                    For indicate in which version is the framework
                </td>
            </tr>
            <tr>
                <td>cors</td>
                <td>
                    Cross-origin resource sharing
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div><!--//section-block-->
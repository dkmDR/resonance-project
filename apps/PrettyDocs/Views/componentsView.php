<div class="doc-wrapper">
    <div class="container">
        <div id="doc-header" class="doc-header text-center">
            <h1 class="doc-title"><span aria-hidden="true" class="icon icon_puzzle_alt"></span> Components</h1>
            <div class="meta"><i class="fa fa-clock-o"></i> Last updated: February 12th, 2019</div>
        </div><!--//doc-header-->
        <div class="doc-body">
            <div class="doc-content">
                <div class="content-inner">

                    <?php
                        echo Factory::getView("components-structure-module");
                        echo Factory::getView("components-structure-strmodule");
                        echo Factory::getView("components-structure-orm");
                    ?>

                    <section id="reservedKey" class="doc-section">
                        <h2 class="section-title">Reserved Key</h2>
                        <div class="section-block">
                            <p>
                               There are many restrictions that you must know when you use CrowPHP Framework for your applications.
                                <br />
                                These restrictions made the references to words that you must never use in some places, between their are :
                                <br />
                            </p>
                            <ul>
                                <li>
                                    <strong>Controllers</strong>
                                    <br />
                                    <ul>
                                        <li>Into <strong>@Routing</strong> annotation exists two keys that you use to Router and indicate value of response. Those are : <strong>value</strong> and <strong>type</strong>
                                            <br />
                                            You must be sure never use words that contain any these keys for your redirection value like this:
                                            <br />
                                            <span style="color: #f00;">Bad : @Routing[value=get/<strong>type</strong>/example,<strong>type</strong>=json]</span>
                                            <br />
                                            <span style="color: #f00;">Bad : @Routing[<strong>value</strong>=get/<strong>value</strong>/example,type=json]</span>
                                            <br />
                                            <span style="color: #158108;">Good : @Routing[value=get/reference/example,type=json]</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </section>

                </div><!--//content-inner-->
            </div><!--//doc-content-->
            <div class="doc-sidebar">
                <nav id="doc-nav">
                    <ul id="doc-menu" class="nav doc-menu hidden-xs" data-spy="affix">
                        <li><a class="scrollto" href="#module">Module</a></li>
                        <li>
                            <a class="scrollto" href="#module-components">Module Structure</a>
                            <ul class="nav doc-sub-menu">
                                <li><a class="scrollto" href="#controllers">Controllers</a></li>
                                <li><a class="scrollto" href="#models">Models</a></li>
                                <li><a class="scrollto" href="#views">Views</a></li>
                            </ul><!--//nav-->
                        </li>
                        <li><a class="scrollto" href="#orm">Aorm Methods</a></li>
                        <li><a class="scrollto" href="#reservedKey">Reserved Key</a></li>
                    </ul><!--//doc-menu-->
                </nav>
            </div><!--//doc-sidebar-->
        </div><!--//doc-body-->
    </div><!--//container-->
</div><!--//doc-wrapper-->
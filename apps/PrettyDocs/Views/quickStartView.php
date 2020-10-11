<div class="doc-wrapper">
    <div class="container">
        <div id="doc-header" class="doc-header text-center">
            <h1 class="doc-title"><i class="icon fa fa-paper-plane"></i> Quick Start</h1>
            <div class="meta"><i class="fa fa-clock-o"></i> Last updated: February 12th, 2019</div>
        </div><!--//doc-header-->
        <div class="doc-body">
            <div class="doc-content">
                <div class="content-inner">
                    <section id="download-section" class="doc-section">
                        <h2 class="section-title">Download</h2>
                        <div class="section-block">
                            <p>
                                You could download framework files from
                            </p>
                            <a href="backup/CrowPHP2.5.rar" class="btn btn-green" target="_blank"><i class="fa fa-download"></i> Download CrowPHP Framework</a>
                        </div>
                    </section><!--//doc-section-->
                    <section id="installation-section" class="doc-section">
                        <h2 class="section-title">Installation</h2>

                        <?php
                            echo Factory::getView("quick-start-step-one");
                            echo Factory::getView("quick-start-step-two");
                            echo Factory::getView("quick-start-step-three");
                        ?>

                    </section><!--//doc-section-->

                    <section id="code-section" class="doc-section">
                        <h2 class="section-title">Structure</h2>
                        <div class="section-block">
                            <p>
                                The Framework use different directories for its functionality and they are divided on :
                            </p>

                        </div><!--//section-block-->

                        <?php
                            echo Factory::getView("quick-start-structure-modules");
                            echo Factory::getView("quick-start-structure-layout");
                            echo Factory::getView("quick-start-structure-lib");
                            echo Factory::getView("quick-start-structure-log");
                            echo Factory::getView("quick-start-structure-jscss");
                        ?>


                    </section><!--//doc-section-->

                    <?php
                        echo Factory::getView("quick-start-structure-routing");
                        echo Factory::getView("quick-start-structure-factory");
                        echo Factory::getView("quick-start-structure-bootstrap");
                    ?>

                </div><!--//content-inner-->
            </div><!--//doc-content-->

            <div class="doc-sidebar hidden-xs">
                <nav id="doc-nav">
                    <ul id="doc-menu" class="nav doc-menu" data-spy="affix">
                        <li><a class="scrollto" href="#download-section">Download</a></li>
                        <li>
                            <a class="scrollto" href="#installation-section">Installation</a>
                            <ul class="nav doc-sub-menu">
                                <li><a class="scrollto" href="#configuration">Configuration</a></li>
                                <li><a class="scrollto" href="#serverrequirement">Server Requirement</a></li>
                                <li><a class="scrollto" href="#gitinstaller">Git Installer</a></li>
                            </ul><!--//nav-->
                        </li>
                        <li>
                            <a class="scrollto" href="#code-section">Structure</a>
                            <ul class="nav doc-sub-menu">
                                <li><a class="scrollto" href="#modules">Modules</a></li>
                                <li><a class="scrollto" href="#layout">Layouts</a></li>
                                <li><a class="scrollto" href="#lib">Lib</a></li>
                                <li><a class="scrollto" href="#logs">Logs</a></li>
                                <li><a class="scrollto" href="#strjs">JS</a></li>
                                <li><a class="scrollto" href="#strcss">CSS</a></li>
                            </ul><!--//nav-->
                        </li>
                        <li><a class="scrollto" href="#routing">Routing</a></li>
                        <li><a class="scrollto" href="#factory">Factory</a></li>
                        <li><a class="scrollto" href="#bootstrap">Bootstrap</a></li>
                    </ul><!--//doc-menu-->
                </nav>
            </div><!--//doc-sidebar-->
        </div><!--//doc-body-->
    </div><!--//container-->
</div><!--//doc-wrapper-->
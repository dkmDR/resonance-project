<section id="module" class="doc-section">
    <h2 class="section-title">Module</h2>
    <div class="section-block">
        <p>
            Module is a directory that define all functionality of that module, within this must be a controllers, models and views directory. <br><br>

            You can create different directories for any files like css and js.
        </p>
    </div><!--//section-block-->
    <div class="section-block">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-sm-12">
                <h6>Controllers</h6>
                <p>Within this directory only can be controllers file.</p>
            </div>
            <div class="col-md-6 col-sm-12 col-sm-12">
                <h6>Models</h6>
                <p>All files that will connect to database, must be here.</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-12 col-sm-12">
                <h6>Views</h6>
                <p>All UI files</p>
            </div>
            <div class="col-md-6 col-sm-12 col-sm-12">
                <h6>Others</h6>
                <p>You can create whatever directory do you need</p>
            </div>
        </div><!--//row-->
        <div class="callout-block callout-info">
            <div class="icon-holder">
                <i class="fa fa-bullhorn"></i>
            </div><!--//icon-holder-->
            <div class="content">
                <h4 class="callout-title">Check this!</h4>
                <p>If you create a css or js directory, these directories can be handle by 'getJs', 'getCss' and 'getLibrary' into Route class.</p>
            </div><!--//content-->
        </div><!--//callout-->

        <p>
            <strong>Note:</strong>
            <br>
            All controller and Module files must have a namespace defined. Using the <strong>Module</strong> as package and
            the directory reference as <strong>'Controllers'</strong> or <strong>'Modules'</strong>.
        </p>

    </div><!--//section-block-->

</section><!--//doc-section-->
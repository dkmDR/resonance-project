<?php
    $model = Factory::get()->getModel("api/Product");
    $types = $model->getTypes();
?>
<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Products</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? Properties Start -->
    <section class="properties new-arrival fix">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h2>Popular products</h2>
                        <P>Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</P>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="properties__button text-center">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <?php
                                foreach ($types as $index => $type){
                                    $active = ($index==0) ? "active" : "";
                                    $idTab = str_replace(" ","-", $type);
                                    $idTab = strtolower($idTab);
                                    echo '<a class="nav-item nav-link '.$active.'" id="'.$idTab.'-tab" data-toggle="tab" href="#nav-'.$idTab.'" role="tab" aria-controls="nav-'.$idTab.'" aria-selected="true">'.$type.'</a>';
                                }
                                ?>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <?php
                    $tab = '';
                    foreach ($types as $index => $type)
                    {
                        $active = ($index==0) ? "show active" : "";
                        $idTab = str_replace(" ","-", $type);
                        $idTab = strtolower($idTab);
                        $products = $model->getList($type);
                        $tab .= '
                                <div class="tab-pane fade '.$active.'" id="nav-'.$idTab.'" role="tabpanel" aria-labelledby="'.$idTab.'-tab">
                                    <div class="row">
                            ';
                        foreach ($products as $product)
                        {
                            $picture = $product->Picture;
                            $url = !empty($picture) ? $picture[0]->url : "#";
                            $tab .= '
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="single-new-arrival mb-50 text-center">
                                                    <div class="popular-img">
                                                        <img src="'.$url.'" alt="Product">
                                                    </div>
                                                    <div class="popular-caption">
                                                        <h3><a href="product/'.$product->{'RecordID'}.'">'.$product->{'Name'}.'</a></h3>
                                                        <span>$'.number_format($product->{'Unit Cost'},2).'</span>
                                                    </div>
                                                </div>
                                            </div>
                                    ';
                        }
                        $tab .= '
                                        </div>
                                    </div>
                                    ';
                    }
                    //tab
                    echo $tab;
                    ?>
                </div>
                <!-- End Nav Card -->
            </div>
        </div>
    </section>
    <!-- Properties End -->

    <!--? New Arrival End -->
    <!-- Popular Locations End -->
    <!--? Services Area Start -->
    <div class="categories-area section-padding40 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="assets/img/icon/services1.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="assets/img/icon/services2.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payment</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="assets/img/icon/services3.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Money Back Guarantee</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="assets/img/icon/services4.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Online Support</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Services Area End -->
</main>
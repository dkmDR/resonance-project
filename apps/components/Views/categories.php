<?php
    $typ = Factory::getParametersView();
    $model = Factory::get()->getModel("api/Product");
    $types = $model->getTypes();
    $typeSelected = (!empty($typ)) ? $typ : $types[0];
    $products = $model->getList($typeSelected);
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
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Categories</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
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
    <!-- listing Area Start -->
    <div class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-50">
                        <h2>Shop with us</h2>
                        <p>Showing <?php echo count($products) ?> product(s)</p>
                    </div>
                </div>
            </div>
            <div class="row">
               <!--?  Right content -->
                <div class="col-xl-12 col-lg-12 col-md-12 ">
                    <!-- Count of Job list Start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="count-job mb-35">
                                <span>Products found</span>
                                <!-- Select job items start -->
                                <div class="select-cat">
                                    <span>Sort by</span>
                                    <select id="select-product-by-type">
                                        <?php
                                            foreach ($types as $index => $type){
                                                $checked = $type == $typeSelected ? "selected" : "";
                                                echo '<option value="'.$type.'" '.$checked.'>'.$type.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                            </div>
                        </div>
                    </div>
                    <!-- Count of Job list End -->

                    <!--? New Arrival Start -->
                    <div class="new-arrival new-arrival3">
                        <div class="row">
                            <?php
                                foreach ($products as $product){
                                    $picture = $product->Picture;
                                    $url = !empty($picture) ? $picture[0]->url : "#";
                            ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <div class="single-new-arrival mb-50 text-center">
                                            <div class="popular-img">
                                                <img src="<?php echo $url ?>" alt="Product">
                                            </div>
                                            <div class="popular-caption">
                                                <h3><a href="product/<?php echo $product->{'RecordID'} ?>"><?php echo $product->{'Name'} ?></a></h3>
                                                <span>$<?php echo number_format($product->{'Unit Cost'},2) ?></span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <!--? New Arrival End -->
                </div>
            </div>
        </div>
    </div>
    <!-- listing-area Area End -->
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
<script type="text/javascript" src="apps/components/js/categories.js"></script>
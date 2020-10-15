<?php
    $itemId = Factory::getParametersView();
    if(empty($itemId)){
        header('Location: ' . Factory::redirectTo() . 'products');
    }
    $item = Factory::get()->getModel("api/Product")->getProduct($itemId);
    if(empty($item)){
        header('Location: ' . Factory::redirectTo() . 'products');
    }
    $itemObject = new stdClass();
    $itemObject->itemId = $item->{'RecordID'};
    $itemObject->name = $item->{'Name'};
    $itemObject->vendor = (!empty($item->{'Vendor'}))?$item->{'Vendor'}[0]:"";
    $itemObject->type = $item->{'Type'};
    $itemObject->inStock = (int) $item->{'In Stock'} > 0 ? "In Stock" : "Out Stock";
    $itemObject->unitCost = $item->{'Unit Cost'};
    $itemObject->size = $item->{'Size (WxLxH)'};
    $itemObject->description = $item->{'Description'};
    $itemObject->designer = "";
    if(!empty($item->{'Designer'}))
        foreach ($item->{'Designer'} as $des){
            $itemObject->designer = '<h5>'.$des.'</h5>';
        }
    $itemObject->link = $item->{'Link'};
    $itemObject->note = !empty($item->{'Notes'}) ? $item->{'Notes'} : "";
    $itemObject->materialsAndFinishes = "";
    if(!empty($item->{'Materials and Finishes'}))
        foreach ($item->{'Materials and Finishes'} as $mf){
            $itemObject->materialsAndFinishes = '<h5>'.$mf.'</h5>';
        }
    $itemObject->settings = "";
    if(!empty($item->{'Settings'}))
        foreach ($item->{'Settings'} as $set){
            $itemObject->settings = '<h5>'.$set.'</h5>';
        }
    $itemObject->pictures = $item->{'Picture'};
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
                                <h1 data-animation="fadeInUp" data-delay=".4s" >Product details</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Product details</a></li>
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
    <!--? Single Product Area Start-->
    <div class="product_image_area section-padding40">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-5">
                    <div class="product_slider_img">
                        <div id="vertical">
                            <?php
                                if(!empty($itemObject->pictures))
                                    echo '<div data-thumb="'.$itemObject->pictures[0]->url.'">
                                                 <img src='.$itemObject->pictures[0]->url.' class="w-100" alt="thumbnails" />
                                              </div>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?php echo $itemObject->name ?></h3>
                        <h2>$<?php echo number_format($itemObject->unitCost) ?></h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="categories/<?php echo $itemObject->type ?>">
                                    <span>Type</span> : <?php echo $itemObject->type ?></a>
                            </li>
                            <li>
                                <a href="#"> <span>Availibility</span> : <?php echo $itemObject->inStock ?></a>
                            </li>
                        </ul>
                        <p>
                            Settings: <?php echo $itemObject->settings ?>
                        </p>
                        <div class="card_area">
                            <div class="product_count d-inline-block">
                                <span id="decrement" class="inumber-decrement" style="cursor:pointer;"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" id="product-qty" value="1" min="0" max="10" />
                                <span id="increment" class="number-increment" style="cursor:pointer;"> <i class="ti-plus"></i></span>
                            </div>
                            <div class="add_to_cart">
                                <a href="#" id="add-product-to-cart" class="btn" style="background-color: #1f2b7b !important;">add to cart</a>
                                <a href="#" id="get-info" class="btn primary">get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Area End-->
    <!--? Product Description Area Start-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Specification</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                        <?php echo $itemObject->description ?>
                    </p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <h5>Vendor</h5>
                                </td>
                                <td>
                                    <h5><?php echo $itemObject->vendor ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Size</h5>
                                </td>
                                <td>
                                    <h5><?php echo $itemObject->size ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Material & Finishes</h5>
                                </td>
                                <td>
                                    <?php
                                      echo $itemObject->materialsAndFinishes
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Setting</h5>
                                </td>
                                <td>
                                    <h5><?php echo $itemObject->settings ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Designer</h5>
                                </td>
                                <td>
                                    <h5><?php echo $itemObject->designer ?></h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Description Area End-->
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
    <input type="hidden" id="send-data" value="<?php echo $itemObject->itemId ?>" />
    <!--? Services Area End -->
</main>
<script type="text/javascript" src="apps/components/js/product.js"></script>

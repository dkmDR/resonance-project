<?php
    $session = Factory::getSession();
?>
<!-- Header Start -->
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row menu-wrapper align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="home"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Logo-2 -->
                        <div class="logo2">
                            <a href="home"><img src="assets/img/logo/logo2.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="home">Home</a></li>
                                    <li><a href="products">Product</a></li>
                                    <li><a href="categories">Types</a></li>
                                    <li><a href="profile">My Orders</a></li>
                                    <li><a href="cart">Shopping Cart</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <div class="search">
                            <ul class="d-flex align-items-center">
                                <li>
                                    <?php if(!$session->logger){ ?>
                                            <a href="login" class="account-btn" target="_blank">My Account</a>
                                    <?php } else {
                                    ?>
                                            <a href="profile" class="account-btn" style="padding-right: 0 !important;">Welcome back, <?php echo ucwords( $session->firstName . " " . $session->lastName ) ?></a>
                                    <?php
                                    } ?>
                                </li>
                                <?php if($session->logger){ ?>
                                <li>
                                    <a href="#" id="logOut" class="account-btn" style="padding-left: 15px !important;text-decoration: underline !important;">Logout</a>
                                </li>
                                <?php } ?>
                                <li>
                                    <div class="card-stor">
                                        <a href="cart">
                                            <img src="assets/img/icon/card.svg" alt="">
                                            <span id="shopping-cart-qty">0</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<!-- header end -->
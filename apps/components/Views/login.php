<?php
    $session = Factory::getSession();
    if($session->logger){
        header("Location: " . Factory::redirectTo() . "home");
    }
?>
<main class="login-bg">
    <!-- login Area Start -->
    <div class="login-form-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="login-form">
                        <!-- Login Heading -->
                        <div class="login-heading">
                            <span>Login</span>
                            <p>Enter Login details to get access</p>
                        </div>
                        <!-- Single Input Fields -->
                        <form id="login-form">
                            <div class="input-box">
                                <div class="single-input-fields">
                                    <label>Username or Email Address</label>
                                    <input type="text" name="credential" placeholder="Username / Email address">
                                </div>
                                <div class="single-input-fields">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password">
                                </div>
                            </div>
                            <!-- form Footer -->
                            <div class="login-footer">
                                <p>Don’t have an account? <a href="register">Sign Up</a>  here</p>
                                <button type="button" id="login" class="submit-btn3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login Area End -->
</main>
<script type="text/javascript" src="apps/components/js/login.js"></script>
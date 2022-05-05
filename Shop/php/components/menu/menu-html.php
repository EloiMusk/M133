<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/controller/productFunc.php';
?>
<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>0699966996</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/index.php">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">Bricks</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4 navbar">
                <!-- Cart -->
                <div class="dropdown-slide">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-android-cart"></i>Cart</a>
                    <div class="dropdown-menu cart-dropdown">
                        <?php
                        $cart = $_SESSION['cart'];
                        $_SESSION['total'] = 0;
                        if (isset($cart)){
                        foreach ($cart as $key => $item) {
                            $product = getProduct($key);

                            ?>
                            Cart Item
                            <div class="media" id="'<?php echo 'cart-item-' . $product['id'] ?>">
                                <a class="pull-left" href="/product-single.php?id=<?php echo $product['id'] ?>">
                                    <img class="media-object" src="/images/productImage/<?php echo $product['image'] ?>"
                                         alt="image"/>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#!"><?php echo $product['name'] ?></a></h4>
                                    <div class="cart-price">
                                        <span><?php echo $item['quantity'] ?> x</span>
                                        <span><?php echo number_format($product['price'] , 2, '.', '\''); ?></span>
                                    </div>
                                    <h4>
                                       $<?php echo number_format($item['quantity'] * $product['price'], 2, '.', '\'');;
                                        $_SESSION['total'] += $item['quantity'] * $product['price'] ?>
                                    </h4>
                                </div>
                                <a onclick="removeFromCart( <?php echo $product['id']; ?>)" class="remove"><i
                                            class="tf-ion-close"></i></a>
                            </div>
                            <!--                     / Cart Item -->
                        <?php }} ?>

                        <div class="cart-summary">
                            <span>Total</span>
                            <span class="total-price">$<?php echo number_format($_SESSION['total'], 2, '.', '\''); ?></span>
                        </div>
                        <ul class="text-center cart-buttons">
                            <li><a href="cart.php" class="btn btn-small">View Cart</a></li>
                            <li><a href="checkout.php" class="btn btn-small btn-solid-border">Checkout</a></li>
                        </ul>
                    </div>

                </div><!-- / Cart -->

                <!-- Search -->
                <div class="dropdown-slide search">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> Search</a>
                    <ul class="dropdown-menu search-dropdown">
                        <li>
                            <form action="post"><input type="search" class="form-control" placeholder="Search...">
                            </form>
                        </li>
                    </ul>
                </div><!-- / Search -->
                <!--        logout button -->
                <?php
                if (isset($_SESSION['user']['id'])) {
                    print('<a href="/index.php?logout=1" class="btn btn-small btn-solid-border">Logout</a>');
                } else {
                    echo '<a href="/login.php" class="btn btn-small btn-solid-border">Login</a>';
                }
                ?>
                <!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->

<section class="menu">
    <nav class="navbar navigation navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <h2 class="menu-title">Main Menu</h2>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- / .navbar-header -->
            <div id="navbar" class="navbar-collapse  text-center ">
                <ul class="navbar-nav mb-2 mb-lg-0 p-lg-3">
                    <!-- Home -->
                    <li class="dropdown nav-item">
                        <a href="index.php">Home</a>
                    </li><!-- / Home -->


                    <!-- Shop -->
                    <li class="dropdown nav-item">
                        <a href="shop.php">Shop</a>
                    </li>
                    <li class="dropdown nav-item dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Account<span
                                    class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Login/Register</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="signin.php">Register</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Manage</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>
                                        <li><a href="order.html">Orders</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Personal</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="address.html">Adress</a></li>
                                        <li><a href="profile-details.html">Profile Details</a></li>
                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Shop -->


                    <!-- About Us -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">About Us <span
                                    class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-lg-12 col-md-6 mb-sm-3">
                                    <ul>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->
                </ul><!-- / .nav .navbar-nav -->

            </div>
        </div>
    </nav>
    <!-- Navbar Links -->
    <!--/.navbar-collapse -->
    <!-- / .container -->
</section>

<!-- Main Menu Section -->

<!--
Essential Scripts
=====================================-->
<!-- Main jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->
<script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

<!-- slick Carousel -->
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="js/script.js"></script>
<script src="js/cart.js"></script>



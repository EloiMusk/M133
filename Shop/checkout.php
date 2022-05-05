<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Aviato | E-commerce template</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<?php include 'php/components/menu/menu.php'; ?>

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Checkout</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="block billing-details">
                        <h4 class="widget-title">Billing Details</h4>
                        <form class="checkout-form">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" class="form-control" id="user_address" placeholder="">
                            </div>
                            <div class="checkout-country-code clearfix">
                                <div class="form-group">
                                    <label for="user_post_code">Zip Code</label>
                                    <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                                </div>
                                <div class="form-group">
                                    <label for="user_city">City</label>
                                    <input type="text" class="form-control" id="user_city" name="city" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_country">Country</label>
                                <input type="text" class="form-control" id="user_country" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="block">
                        <h4 class="widget-title">Payment Method</h4>
                        <p>Credit Cart Details (Secure payment)</p>
                        <div class="checkout-product-details">
                            <div class="payment">
                                <div class="card-details">
                                    <form class="checkout-form">
                                        <div class="form-group">
                                            <label for="card-number">Card Number <span class="required">*</span></label>
                                            <input id="card-number" class="form-control" type="tel"
                                                   placeholder="•••• •••• •••• ••••">
                                        </div>
                                        <div class="form-group half-width padding-right">
                                            <label for="card-expiry">Expiry (MM/YY) <span
                                                        class="required">*</span></label>
                                            <input id="card-expiry" class="form-control" type="tel"
                                                   placeholder="MM / YY">
                                        </div>
                                        <div class="form-group half-width padding-left">
                                            <label for="card-cvc">Card Code <span class="required">*</span></label>
                                            <input id="card-cvc" class="form-control" type="tel" maxlength="4"
                                                   placeholder="CVC">
                                        </div>
                                        <a href="confirmation.php" class="btn btn-main mt-20">Place Order</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title">Order Summary</h4>
                            <?php
                            if (isset($cart)) {
                                $cart = $_SESSION['cart'];
                                foreach ($cart as $key => $item) {
                                    $product = getProduct($key);
                                    ?>
                                    <div class="media product-card row bg-gray mb-1 pt-2">
                                        <a class="pull-left mb-2" href="/product-single.php?id=<?php echo $product['id'] ?>">
                                            <img class="media-object"
                                                 src="/images/productImage/<?php echo $product['image'] ?>"
                                                 alt="Image"/>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                        href="/product-single.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                                            </h4>
                                            <span class="price">
                                                <?php echo $item['quantity'] ?> x
                                                <?php echo number_format($product['price'], 2, '.', '\''); ?>
                                            </span> <br>
                                            <span class="remove text-danger"
                                                  onclick="removeFromCart( <?php echo $product['id']; ?>)">Remove</span>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                            <ul class="summary-prices">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price"><?php echo $_SESSION['total'] ?></span>
                                </li>
                                <li>
                                    <span>Shipping:</span>
                                    <span>Free</span>
                                </li>
                                <li>
                                    <span>Discount:</span>
                                    <span>100%</span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>$0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-media">
                    <li>
                        <a href="https://www.facebook.com/themefisher">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/themefisher">
                            <i class="tf-ion-social-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/themefisher">
                            <i class="tf-ion-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/themefisher/">
                            <i class="tf-ion-social-pinterest"></i>
                        </a>
                    </li>
                </ul>
                <ul class="footer-menu text-uppercase">
                    <li>
                        <a href="contact.html">CONTACT</a>
                    </li>
                    <li>
                        <a href="shop.php">SHOP</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="contact.html">PRIVACY POLICY</a>
                    </li>
                </ul>
                <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a
                            href="https://themefisher.com/">Themefisher</a></p>
            </div>
        </div>
    </div>
</footer>
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


</body>
</html>
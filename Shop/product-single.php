<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->
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

<?php
include 'php/components/menu/menu.php';
$product = getProduct($_GET['id']);
$categories = getAllCategory();
?>

<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="product-pagination text-right">
                    <?php if (getProduct($product['id'] - 1) != null) { ?>
                        <li><a href="product-single.php?id=<?php echo $product['id'] - 1 ?>"><i
                                        class="tf-ion-ios-arrow-left"></i> Previous </a></li> <?php } ?>
                    <?php if (getProduct($product['id'] + 1) != null) { ?>
                        <li><a href="product-single.php?id=<?php echo $product['id'] + 1 ?>"> Next <i
                                        class="tf-ion-ios-arrow-right"></i></a></li> <?php } ?>
                </ol>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-5">
                <img class="img-thumbnail" src='images/productImage/<?php echo $product['image'] ?>' alt=''
                     data-zoom-image="images/productImage/<?php echo $product['image'] ?>"/>
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2><?php echo $product['name'] ?></h2>
                    <p class="product-price"><?php echo $product['price'] ?> $</p>

                    <p class="product-description mt-20">
                        <?php echo $product['description'] ?>
                    </p>
                    <div class="product-quantity">
                        <span>Quantity:</span>
                        <div class="product-quantity-slider">
                            <input id="product-quantity" type="text" value="1" name="product-quantity">
                        </div>
                    </div>
                    <div class="product-category">
                        <span>Categorie:</span>
                        <ul>
                            <li>
                                <a href="shop.php?category=<?php echo $product['categoryId'] ?>"><?php echo $categories[$product['categoryId'] -1]['name'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <a onclick="addToCart(<?php echo $product['id']?>)" class="btn btn-main mt-20">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
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


<!-- Main Js File -->
<script src="js/script.js"></script>

<script src="js/cart.js"></script>

</body>
</html>
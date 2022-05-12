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
                    <p class="product-price"><?php echo number_format($product['price'], 2, '.', '\''); ?> $</p>
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
                                <a href="shop.php?category=<?php echo $product['categoryId'] ?>"><?php echo $categories[$product['categoryId'] - 1]['name'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <a onclick="addToCart(<?php echo $product['id'] ?>)" class="btn btn-main mt-20">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'php/components/footer/footer.php' ?>

<script src="js/cart.js"></script>

</body>
</html>
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
?>

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Shop</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">shop</li>
                    </ol>
                    <!--                    dopdown menue for the categories-->
                    <div class="dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Filter</a>
                        <ul class="dropdown-menu user-dropdown">
                            <li><a class="dropdown-item"
                                   href="shop.php">All</a>
                            </li>
                            <?php
                            $categories = getAllCategory();
                            foreach ($categories as $category) {
                                ?>
                                <li><a class="dropdown-item"
                                       href="shop.php?category=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
</section>


<section class="products section">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['category'])) {
                $products = getAllProductsByCategory($_GET['category']);
            } else {
                $products = getAllProducts();
            }
            foreach ($products as $product) {
                ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="/images/productImage/<?php echo $product['image'] ?>"
                                 alt="product-img"/>
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <a onclick="addToCart(<?php echo $product['id'] ?>)"><i
                                                    class="tf-ion-android-cart"></i></a>
                                    </li>
                                    <li>
                                        <a style="display: block"
                                           href="product-single.php?id=<?php echo $product['id'] ?>"><i
                                                    class="tf-ion-android-open"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><?php echo $product['name'] ?></h4>
                            <p class="price"><?php echo number_format($product['price'], 2, '.', '\''); ?> $</p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>


<?php include 'php/components/footer/footer.php' ?>

<script src="js/cart.js"></script>


</body>
</html>

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
                        <form class="checkout-form" id="adressForm">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control"
                                       value="<?php echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?>"
                                       id="full_name" placeholder="">
                            </div>
                            <div class="checkout-country-code clearfix">
                                <div class="form-group">
                                    <label for="user_address">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="user_address">Nr.</label>
                                    <input type="text" class="form-control" id="nr" placeholder="">
                                </div>
                            </div>

                            <div class="checkout-country-code clearfix">
                                <div class="form-group">
                                    <label for="user_post_code">Zip Code</label>
                                    <input type="text" class="form-control" id="zip" name="zipcode" value="">
                                </div>
                                <div class="form-group">
                                    <label for="user_city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="">
                                </div>
                            </div>
                            <a href="confirmation.php" class="btn btn-main mt-20">Place Order</a>
                        </form>
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
                                        <a class="pull-left mb-2"
                                           href="/product-single.php?id=<?php echo $product['id'] ?>">
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
<?php include 'php/components/footer/footer.php' ?>

<script src="js/adress.js"></script>
<script>
    fillAdress();
</script>


</body>
</html>
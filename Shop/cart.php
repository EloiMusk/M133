<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header('Location: /empty-cart.php');
} elseif (!$_SESSION['total'] > 0) {
    header('Location: /empty-cart.php');
}
?>
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
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="block">
                        <div class="product-list">
                            <form method="post">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="">Item Name</th>
                                        <th class="">Quantity</th>
                                        <th class="">Item Price</th>
                                        <th class="">Total</th>
                                        <th class="">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $item) {
                                            $product = getProduct($key);
                                            ?>
                                            <tr class="">
                                                <td class="">
                                                    <div class="product-info">
                                                        <img width="80"
                                                             src="/images/productImage/<?php echo $product['image'] ?>"
                                                             alt=""/>
                                                        <a href="/product-single.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <span><?php echo $item['quantity'] ?></span>
                                                </td>
                                                <td class="">
                                                    <span>$<?php echo number_format($product['price'], 2, '.', '\''); ?></span>
                                                </td>
                                                <td>
                                                    <span><strong>$<?php echo number_format($item['quantity'] * $product['price'], 2, '.', '\''); ?></strong></span>
                                                </td>
                                                <td class="">
                                                    <a class="product-remove" href="#!"
                                                       onclick="removeFromCart( <?php echo $product['id']; ?>)">Remove</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                                <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'php/components/footer/footer.php' ?>

</body>
</html>

<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header('Location: /empty-cart.php');
} elseif (!$_SESSION['total'] > 0) {
    header('Location: /empty-cart.php');
} elseif (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';
// add order to database
$db = getDB();
$stmt = $db->prepare("INSERT INTO `order` (user_id, adress_id, products, timestamp, total) VALUES (:user_id, :adress_id, :products, NOW(), :total)");
$stmt->bindParam(':user_id', $_SESSION['user']['id']);
$stmt->bindParam(':adress_id', $_SESSION['user']['adress_id']);
$stmt->bindParam(':total', $_SESSION['total']);
$str1 = '';
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $str1 = $str1 . '{ "id": ' . $productId . ', "quantity": ' . $_SESSION['cart'][$productId]['quantity'] . ' },';
};
$stmt->bindParam(':products', $str1);
$str = 'test';
$stmt->execute();
unset($_SESSION['cart']);
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
<!-- Page Wrapper -->
<section class="page-wrapper success-msg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <i class="tf-ion-android-checkmark-circle"></i>
                    <h2 class="text-center">Thank you! For your payment</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, sed.</p>
                    <a href="shop.php" class="btn btn-main mt-20">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.page-warpper -->

<?php include 'php/components/footer/footer.php' ?>

</body>
</html>
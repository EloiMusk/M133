<?php
session_start();
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'getDB.php';
if (!isset($_SESSION['user'])) {
    header("Location: /login.php?redirect=/manage-orders.php");
} elseif (!$_SESSION['user']['role'] == 1) {
    header("location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Bricks | Manage Orders</title>

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
<?php include 'php/components/menu/menu.php' ?>
<!-- simple adress form-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            </thead>
                            <tbody>
                            <?php
                            include "php/controller/userFunc.php";
                            $db = getDB();
                            $smtp = $db->prepare("SELECT * FROM `order`");
                            $smtp->execute();
                            $orders = $smtp->fetchAll();
                            foreach ($orders as $order) {
                                echo "<tr>";
                                echo "<td>" . $order['id'] . "</td>";
                                $user = getUserById($order['user_id']);
                                echo "<td>" . $user['username'] . "</td>";
                                echo "<td>" . $order['timestamp'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'php/components/footer/footer.php' ?>
</body>

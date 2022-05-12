<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Bricks | Manage Account</title>

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
                    <h4 class="card-title">Manage Account</h4>
                </div>
                <div class="card-body">
                    <form id="adressForm">
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street"
                                   placeholder="Enter Street">
                        </div>
                        <div class="form-group">
                            <label for="nr">Nr.</label>
                            <input type="text" class="form-control" id="nr" name="nr" placeholder="Enter Street Nr">
                        </div>
                        <div class="form-group">
                            <label for="Zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <button onclick="updateAdress()" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <?php include 'php/components/footer/footer.php' ?>
</body>
<script src="js/adress.js" lang="js">
</script>
<script>fillAdress()</script>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Bricks | Manage Products</title>

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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="setMode('create')" data-bs-toggle="modal"
        data-bs-target="#productFormModal">
    Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="productFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productFormTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="productForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="productFormName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="productFormName"
                               placeholder="Square Brick">
                    </div>
                    <div class="mb-3">
                        <label for="productFormDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="productFormDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productFormPrice" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">CHF</span>
                            <input type="text" name="price" id="productFormPrice" class="form-control"
                                   aria-label="Amount (to the nearest chf)">
                        </div>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="category" aria-label="Select Category">
                            <option selected>Select Category</option>
                            <option value="1">Heavy</option>
                            <option value="2">Normal</option>
                            <option value="3">Tiny</option>
                            <option value="4">Magic</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="productFormImage">Product Image</label>
                        <input type="file" class="form-control" name="image" id="productFormImage">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="submitForm()" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Cutom Javascript-->
<script src="js/manage-products.js"></script>
</body>
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
                    <div class="mb-3 row">
                        <label class="form-label" for="productFormImage">Product Image</label>
                        <div class="d-flex align-items-center flex-column">
                            <img id="productFormImagePreview" onclick="fileUpload()" src="images/shop/products/default.png" style="max-height: 15rem; width: auto;" class="rounded img-thumbnail mb-1" alt="...">
                        </div>
                        <div class="input-group">
                            <input type="file" onchange="setPreviewImage()" class="form-control" name="image" id="productFormImage">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="productFormName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="productFormName"
                               placeholder="Square Brick">
                    </div>
                    <div class="mb-3">
                        <label for="productFormDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="productFormDescription"
                                  rows="3"></textarea>
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
                        <label class="form-label" for="productFormCategory">Category</label>
                        <select id="productFormCategory" class="form-select" name="category" aria-label="Select Category">
                            <option selected>Select Category</option>
                            <option value="1">Heavy</option>
                            <option value="2">Normal</option>
                            <option value="3">Tiny</option>
                            <option value="4">Magic</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="button" onclick="submitForm()" data-bs-dismiss="modal"  class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card flex-column">
    <div class="card-header p-5 mb-4 justify-content-between" style="display: flex">
        <h1>Product Management</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" onclick="setMode('create')" data-bs-toggle="modal"
                data-bs-target="#productFormModal">
            Add Product
        </button>
    </div>

    <!--Product List-->
    <div class="list-group">
        <?php
        include 'php/controller/productFunc.php';
        $products = getAllProducts();
        ?>
        <?php foreach ($products as $product): ?>
            <div class="list-group-item" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $product['name'] ?></h5>
                    <div>
                        <button type="button" class="btn btn-danger" value="delete" onclick="deleteProduct(<?= $product['id'] ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary" value="edit" data-bs-toggle="tooltip" onclick="editProduct(<?= $product['id'] ?>)" data-bs-placement="top" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="toast-container">
    <div class="position-fixed bottom-0 end-0 p-3" tabindex="-2" >
        <div id="toastTemplate" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong id="toastTemplateTitle" class="me-auto"></strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toastTemplateBody" class="toast-body">
            </div>
        </div>
    </div>
</div>
<!--    Cutom Javascript-->
<script src="js/manage-products.js"></script>
</body>
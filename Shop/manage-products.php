<?php
session_start();
//if use is not authenticated go to login page
if(!isset($_SESSION['user'])){
    header("Location: /login.php?redirect=/manage-products.php");
}elseif(!$_SESSION['user']['role'] == 1){
    header("location: /index.php");
}
?>
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
<?php
include 'php/controller/productFunc.php';
$products = getAllProducts();
$categories = getAllCategory();
?>

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
                        <div id="uploadContainer" class="d-flex align-items-center  justify-content-center flex-column"
                             onclick="fileUpload()">
                            <image id="productFormImagePreview" class="img-fluid" src="" alt="">
                                <svg id="uploadSvg" preserveAspectRatio="xMidYMid meet" class="p-lg-3" width="100%"
                                     height="100%" viewBox=" 0 0 400 400">
                                    <g id="icon1">
                                        <path style="fill:#3C92CA;" id="XMLID_10_" d="M105.604,105.605L150,61.212v183.786c0,8.284,6.716,15,15,15s15-6.716,15-15V61.213l44.392,44.392
		c2.929,2.929,6.768,4.394,10.606,4.394c3.839,0,7.678-1.464,10.607-4.394c5.858-5.858,5.858-15.355,0-21.213l-69.995-69.996
		c-0.352-0.351-0.721-0.683-1.104-0.998c-0.166-0.136-0.341-0.254-0.51-0.381c-0.222-0.167-0.439-0.337-0.67-0.492
		c-0.207-0.139-0.422-0.259-0.635-0.386c-0.207-0.125-0.41-0.254-0.624-0.369c-0.217-0.116-0.439-0.213-0.661-0.318
		c-0.223-0.105-0.441-0.216-0.67-0.311c-0.214-0.088-0.432-0.16-0.649-0.238c-0.244-0.088-0.485-0.182-0.736-0.258
		c-0.216-0.065-0.435-0.112-0.652-0.167c-0.256-0.065-0.51-0.137-0.77-0.189c-0.25-0.049-0.503-0.078-0.755-0.115
		c-0.231-0.034-0.46-0.077-0.695-0.1c-0.462-0.045-0.925-0.067-1.389-0.07c-0.03,0-0.059-0.004-0.089-0.004
		c-0.029,0-0.059,0.004-0.088,0.004c-0.464,0.002-0.928,0.025-1.391,0.07c-0.229,0.023-0.453,0.065-0.68,0.098
		c-0.258,0.037-0.516,0.067-0.771,0.118c-0.254,0.05-0.5,0.12-0.749,0.183c-0.226,0.057-0.452,0.107-0.676,0.174
		c-0.241,0.073-0.476,0.164-0.712,0.249c-0.225,0.081-0.452,0.155-0.674,0.247c-0.22,0.091-0.43,0.198-0.644,0.299
		c-0.23,0.108-0.462,0.211-0.688,0.331c-0.204,0.109-0.396,0.233-0.595,0.351c-0.223,0.132-0.447,0.258-0.664,0.403
		c-0.217,0.145-0.42,0.307-0.629,0.462c-0.184,0.137-0.371,0.264-0.549,0.411c-0.365,0.299-0.714,0.616-1.049,0.947
		c-0.016,0.016-0.033,0.029-0.05,0.045L84.392,84.391c-5.857,5.858-5.858,15.355,0,21.213
		C90.249,111.463,99.747,111.461,105.604,105.605z"/>
                                        <path style="fill:#2C2F33;" id="XMLID_11_" d="M315,160c-8.284,0-15,6.716-15,15v115H30V175c0-8.284-6.716-15-15-15s-15,6.716-15,15v130
		c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V175C330,166.716,323.284,160,315,160z"/>
                                    </g>
                                    <g id="icon2">
                                        <path style="fill:#3C92CA;" d="M244.7,489.4c5.5,0,9.9-4.4,9.9-9.9V119.4l73.9,73.9c3.9,3.9,10.1,3.9,14,0s3.9-10.1,0-14
			l-90.8-90.8c-1.9-1.9-4.5-2.9-7-2.9s-5.1,1-7,2.9l-90.8,90.8c-3.9,3.9-3.9,10.1,0,14s10.1,3.9,14,0l73.9-73.9v360.1
			C234.8,485,239.2,489.4,244.7,489.4z"/>
                                        <path style="fill:#2C2F33;" d="M450.7,122.5c5.5,0,9.9-4.4,9.9-9.9V9.9c0-5.5-4.4-9.9-9.9-9.9h-412c-5.5,0-9.9,4.4-9.9,9.9v102.8
			c0,5.5,4.4,9.9,9.9,9.9s9.9-4.4,9.9-9.9V19.8h392.2v92.9C440.8,118.1,445.2,122.5,450.7,122.5z"/>
                                    </g>
                                </svg>
                        </div>
                        <div class="input-group">
                            <input type="file" onchange="setPreviewImage()" class="form-control" name="image"
                                   id="productFormImage">
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
                        <select id="productFormCategory" class="form-select" name="category"
                                aria-label="Select Category">
                            <option id="defaultCategory">Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option id="category<?php echo $category['id'] ?>"
                                        value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input name="id" id="productFormId" style="visibility: hidden">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="productFormSubmit" type="button" onclick="" data-bs-dismiss="modal"
                            class="btn btn-primary">Save
                        changes
                    </button>
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
        <?php foreach ($products as $product): ?>
            <div class="list-group-item" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $product['name'] ?></h5>
                    <div>
                        <button type="button" class="btn btn-danger" value="delete"
                                onclick="deleteProduct(<?= $product['id'] ?>)" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-primary" onclick="setMode('edit', <?= $product['id'] ?>)"
                                data-bs-toggle="modal"
                                data-bs-target="#productFormModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="toast-container">
    <div class="position-fixed bottom-0 end-0 p-3" tabindex="-2">
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
<script src="js/svg-morpheus.js"></script>
<script id="uploaderScript">
    var myIcons

    function initSVGMorpheus() {
        uploadContainer.innerHTML = '';
        uploadContainer.innerHTML = svgPlaceholder.outerHTML;
        myIcons = new SVGMorpheus('#uploadSvg');
        var container = uploadContainer
        myIcons.to('icon1');
        container.addEventListener("mouseenter", function () {
            myIcons.to('icon2');
        });
        container.addEventListener("mouseleave", function () {
            myIcons.to('icon1');
        });
    }

    initSVGMorpheus();
</script>
</body>
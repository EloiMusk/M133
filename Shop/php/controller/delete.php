<?php
//deletes image from ../../images/productImage/
$base_dir = "../../images/productImage/";
$image = $_POST['image'];
$image = str_replace("../../images/productImage/", "", $image);
$image = str_replace("/", "", $image);
$image = str_replace("\\", "", $image);
//delete image
unlink($base_dir.$image);
?>
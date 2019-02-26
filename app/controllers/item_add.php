<?php session_start(); ?>

<?php require_once 'connect.php' ?>

<?php 
	
$item_name = $_POST['product_name'];
$category_name = $_POST['category_selection'];
$item_price = $_POST['item_price'];	
$item_desc = $_POST['product_desc'];
$img_path = $_POST[''];
$feature_item = $_POST['featured_item'];

$data = "";

$sql = "INSERT INTO tbl_items (name, price, description, img_path, category_id,) VALUES ($item_name, $item_price, $item_desc, $img_path, $category_name)";

?>
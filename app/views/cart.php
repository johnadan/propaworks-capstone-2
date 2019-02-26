<?php require_once "../partials/header.php" ?>

<?php require_once "../partials/navbar.php" ?>

<?php //session_start(); ?>

<h3 class="mt-5 pt-2">My Shopping Cart</h3>

<?php 
	if(isset($_SESSION['cart'])) {
		echo "<div id='loadCart'></div>";
	}
	else {
		echo "<p class='text-black'>Your cart is empty.</p>";
	}
 ?>

<?php require_once "../partials/footer.php" ?>	
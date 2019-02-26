<?php session_start(); ?>

<?php

$id = $_POST['productId'];
// unset
unset($_SESSION['cart'][$id]);
$_SESSION['item_count'] = array_sum($_SESSION['cart']);

echo "
<a class='nav-item' href='../views/cart.php'><i class='fas fa-shopping-cart'></i> Cart
  <span class='badge badge-primary'>".$_SESSION['item_count']."</span>
</a>";
?>
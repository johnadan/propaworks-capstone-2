<?php require_once "../partials/header.php" ?>

<?php require_once "../partials/navbar.php" ?>

<?php
ob_start();
if(!isset($_SESSION['email'])){
echo "<script type='text/javascript'>location.href='login.php'</script>";
}
?>

<div class="container-fluid my-4">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10 text-center">
			<!-- <h6>Order Reference Number: <?php //echo $_SESSION['trans_code']; ?></h6>
			<?php //unset($_SESSION['trans_code']); ?> -->
			<h6 class="mt-5">Thank you for shopping at Propaworks!</h6>
			<!-- <a href="./catalog.php" class="btn btn-primary">Continue Shopping</a> -->
		</div>
	</div>
</div>

<!-- <?php
//function generate_code() {
$ref_number //= '';
 //$source //= array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  
  //for($i=0; $i < 36; $i++){
     //$index //= rand(0,35);
     //$ref_number //= $ref_number.$source[$index];
    //}
  //$today //= getdate();
  //return $ref_number."-".$today[0];
//}
?> -->
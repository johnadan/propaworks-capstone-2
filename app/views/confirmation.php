<?php 

	function generate_trans_number(){
 $ref_number = '';
 $source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  
  for($i=0; $i < 36; $i++){
     $index = rand(0,35);
     $ref_number = $ref_number.$source[$index];
    }
  $today = getdate();
  return $ref_number."-".$today[0];
}

//call the function and echo
echo generate_trans_number();
echo "<br>";
echo date ("Y-m-d G:i:s"); //Date function in PHP

	// echo "Message has been sent";

	// echo "Message sending failed";

 ?>
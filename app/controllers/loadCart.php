<?php session_start(); ?>

<?php require_once 'connect.php' ?>

<?php

$data ='
         <table class="table table-hover">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           </thead>
           <tbody>
  ';

$grand_total = 0;
// if($_SESSION['cart']) == 0 || ($_SESSION['cart']) = "" {
//   echo "Your cart is empty!";
// }
// if(mysqli_num_rows($result) == 0) {
//                 echo "Your cart is empty!";
//                }
foreach($_SESSION['cart'] as $id=> $quantity){
   $sql = "SELECT * FROM tbl_items where id = '$id' ";
             $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                    //$id = $row["id"];
                    //$quantity = $_SESSION['cart']['id'];
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];
                     //$quantity($_SESSION['cart']['id']))

                       //For computing the sub total and grand total
                     //$subTotal = $_SESSION["grandtotal"]['id'];

                     //$grand_total = $_SESSION['grandTotal'];
                     //$quantity = $_SESSION['cart']['productId'];
                     //$subTotal = $_SESSION['grandTotal']['productId'];

                     //$quantity = ;
                       $subTotal = $quantity * $price;
                       //$grand_total = $row["grandtotal"];
                       //777777777$grand_total = $_SESSION['grandTotal'];
                       $grand_total += $subTotal;

                       $data .=
                         "<tr id='cartItems'>
                             <td><img src='$row[img_path]' width='25%' height='25%'></td>
                            <td id='price$id'>$price</td>
                             <td><input type='number' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange=changeNoItems($id)></td>
                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
                             <td><button class='a_demo_two' id='btnRemove' onclick=removeFromCart($id)>Remove</button></td>
                         </tr>";
                   }
               }
               // elseif(mysqli_num_rows($result) = 0){
               //  $emptycart = "Your cart is empty!";
               //  echo $emptycart;
               // }
               // elseif(mysqli_num_rows($result) == 0) {
               //  echo "Your cart is empty!";
               // }
}

$data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><button class='a_demo_two'><a href='checkout.php'>Check Out</a></button>
             <button class='a_demo_two'> <a href='../controllers/clear_cart.php'>Empty Cart</a></button></h3>
             <hr>";
echo $data;
?>

<script type="text/javascript">
  // add or subtract item quantity
function changeNoItems(id){
  let items = $("#quantity" + id).val();
  console.log(items);
  let price = $("#price" + id).text();
  console.log(price);
  let newPrice = items * price;
  $("#subTotal" + id).html(newPrice);
  console.log("Sub Total is: " + newPrice);

  let grandTotal = 0;
  $('.sub-total').each(function(){
    grandTotal += parseFloat($(this).text());
  });
  $("#grandTotal").html(grandTotal);
}
</script>
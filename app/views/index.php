<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<?php require_once "../controllers/connect.php" ?>


    <!-- Page Content -->
    <div class="container-fluid pt-3 mt-5">
      <div class="row">
        <!-- <div class="col-lg-1"></div> -->
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              <!-- <li data-target="#carouselExampleIndicators" data-slide-to="6"></li> -->
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img id="slide1" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/46174511_1937472813011511_7168301129988571136_n.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img id="slide2" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/42243638_1866153856810074_3832132497672503296_n.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img id="slide3" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/42227407_1866153206810139_5952174126444576768_n.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img id="slide4" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/37961326_1790637204361740_1520850371939926016_n.jpg" alt="Fourth slide">
              </div>
              <div class="carousel-item">
                <img id="slide5" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/23244226_1507034649388665_8269090395870314016_n.jpg" alt="Fifth slide">
              </div>
              <div class="carousel-item">
                <img id="slide6" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/10577130_920631761298824_3161296594274828325_n.jpg" alt="Sixth slide">
              </div>
              <!-- <div class="carousel-item">
                <img id="slide7" class="d-block w-100% h-100% img-fluid" src="../assets/images/carousel/15390649_1497971156898212_5996877715882641374_n.jpg" alt="Seventh slide">
              </div> -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Page Features -->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="text-center mt-3 mb-3">FEATURED ITEMS</h3>
        </div>
        
      </div>

      <div class="row">
        <!-- <div class="col-lg-1"></div> -->
        
        <!-- <div class="col-lg-1"></div> -->
        
        <!-- <div class="col-lg-12"> -->

          <?php 

      require "../controllers/connect.php";
      $sql = "SELECT * FROM tbl_items WHERE featured_item = 1";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo "
          <div class='col-lg-3 mb-2 mt-2'>
            <div class='card h-100 mt-2 mb-2 text-center'>
              <img class='card-img-top' src='$row[img_path]'>
              <div class='card-body'>
                <a href='product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
                <h5>&#8369;$row[price]</h5>
                <p class='card-text'>
                  $row[description]
                </p>  
              </div>   
            </div>  
          </div>";
        }
      }
     ?>
        <!-- </div> -->
      </div>
      <!-- <div class="row"> -->
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
<?php include "../partials/footer.php" ;?>

<!-- add item to cart -->
<script>
$("button#addToCart").on("click",function(){
  // $("#addToCart").on("click",function(){
  //Get the product id
  // let productId = $(this).attr("data-id");
  var productId = $(this).attr("data-id");
  var quantity = $("#quantity" + productId).val();
  console.log("Product Id:" + productId);
  console.log("Quantity:" + quantity);
  $.ajax({
    url:"../controllers/addToCart.php",
    method:"POST",
    data:
    {
      productId: productId,
      quantity:quantity
    },
    dataType:"text",
    success:function(data){
      $('a[href="../views/cart.php"]').html(data);
    }
  })
})      

// function loadCart(){
//   $.get("loadCart.php",function(data){
//     $("#loadCart").html(data);
//   });
// }
</script>
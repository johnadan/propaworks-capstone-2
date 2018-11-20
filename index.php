<?php include "partials/header.php";?>


    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4 text-center">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">
      <!-- <div class="row"> -->
      <?php 

      require "controllers/connect.php";
      $sql = "SELECT * FROM tbl_items LIMIT 4";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo "
          <div class='col-lg-3 mb-3 mt-3'>
            <div class='card h-100 mt-3 mb-3 text-center'>
              <img src='$row[img_path]'>
              <div class='card-body'>
                <h4 class='card-title'>$row[name]</h4>
                <h5>&#8369;$row[price]</h5>
                <p class='card-text'>
                  $row[description]
                </p>  
              </div>
              <div class='card-footer'>
                <button class='btn btn-block btn-primary'>See More..</button>
              </div>    
            </div>  
          </div>";
        }
      }
     ?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "partials/footer.php" ;?>

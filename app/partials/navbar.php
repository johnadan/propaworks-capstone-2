<!-- Navigation -->
    <nav class="navbar custom navbar-expand-lg navbar-light fixed-top mb-5 pb-2">
     
        <a class="navbar-brand" href="index.php">
        <img src="../assets/images/logos/logo.jpg" width="50" height="50" alt=""><!-- UniversiTees -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../views/index.php"><i class="fas fa-home"> Home</i>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/catalog2.php"><i class="fas fa-tshirt"> Shop</i></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li> -->
            <li class="nav-item">
               <?php 
  if(isset($_SESSION['cart'])) {
    echo "<a class='nav-link' href='../views/cart.php'><i class='fas fa-shopping-cart'></i> Cart
  <span class='badge badge-primary'>". $_SESSION['item_count']."</span></a>";
  }
  else {
    echo "<a class='nav-link' href='../views/cart.php'><i class='fas fa-shopping-cart'> Cart</i></a>";
  }
 ?>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="../views/login.php"><i class="fas fa-user"> Log In</i></a> -->
              <?php
  if(isset($_SESSION['email'])){
    echo "<a class='nav-link' href='../views/logout.php'><i class='fas fa-user'> Log Out</i></a>";
  }else{
    echo"<a class='nav-link' href='../views/login.php'><i class='fas fa-user'> Log In</i></a>";
  }
?>  
            </li>
          </ul>
        </div>
      
    </nav>

  
<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
     rel="stylesheet" 
     integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
     crossorigin="anonymous">
     <!-- font awesome link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/cart.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users_area/profile.php'>My Account</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-notdog fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_Cart_price();?>/-</a>
        </li>
    </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data"/>
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product"/>
      </form>
    </div>
  </div>
</nav>

<!--calling cart function-->
<?php
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
   <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href=''>Welcome " . $_SESSION['username'] . "</a>
        </li>";
        }
        ?>
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users_area/user_login.php'>Login</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!-- third child -->
 <div class="bg-light"></div>
<h3 class="text-center">STORE</h3>
<p class="text-center">Welcome To Akash Shopping Cart</p>


<!-- fourth child -->
 <div class="row px-3">
  <div class="col-md-10">
    <!-- products -->
     <div class="row">
      <!--fetching products-->
        <?php
        
        //calling function to display products
        search_products();
        get_unique_categories();
        get_unique_brands();
        ?>


     
      <!-- row end -->
    </div>
      <!--col end-->
  </div>

  <!--Brands to be displayed-->
  <div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
    <a href="#" class="nav-link text-dark"><h4>Delivery Brands</h4></a>
    </li>
  <?php
  
  //calling function to display brands
    getbrands();
  
  ?>

    </ul>
    <!-- CATEGORIES TO BE DISPLAYED-->
     <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
    <a href="#" class="nav-link text-dark"><h4>Categories</h4></a>
    </li>
      <?php
      //calling function to display categories
        getcategories();
  ?>

    </ul>
  </div>
 </div>

<!-- last child -->
<div class="bg-secondary  p-3 text-center">
    <p>© 2026 Shopping_Cart All Rights Reserved. Designed by Akash EA.</p>
</div> 
</div>
<!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
 crossorigin="anonymous"></script>
</body>
</html>
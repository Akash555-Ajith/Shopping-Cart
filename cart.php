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
    <title>Shoppting Cart - Cart Details</title>
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
      <style>
        body{
    overflow-x: hidden;}
    </style>
      <style>
        .cart_img{
    width: 100px;
    height: 100px;
    object-fit: contain;
        }
      </style>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
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
    </ul>
     
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


<!-- fourth child-table -->
 <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!-- php code to display dynamic data-->
                 <?php
                  global $con;
  $ip=getUserIP();
  $total_price=0;
  $cart_query="select * from cart_details where ip_address='$ip'";
  $result_query=mysqli_query($con,$cart_query);
  $result_count=mysqli_num_rows($result_query);
  if($result_count>0){
    echo "<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";
  while($row=mysqli_fetch_array($result_query)){
    $product_id=$row['product_id'];
    $select_products="select * from products where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
     while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image1=$row_product_price['product_image1'];
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    
                 ?>

                <tr>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="./Admin/product_images/<?php echo $product_image1; ?>" alt="<?php echo $product_title; ?>" class="cart_img"></td>
                    <td><input type="text" name="quantity" class="form-input w-50"></td>
                    <?php
                    $ip=getUserIP();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['quantity'];
                      $update_cart="update cart_details set quantity=$quantities where ip_address='$ip'";
                       $result_product_quantity=mysqli_query($con,$update_cart);
                       $total_price=$total_price*$quantities;
                    }
                    
                    ?>
                    <td><?php echo $price_table;?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                    <td>
                        <input type="submit" value="Update" class="bg-info px-3 py-2 border-0 mx-3 btn btn-outline-dark" name="update_cart">
                        <input type="submit" value="Remove" class="bg-danger px-3 py-2 border-0 mx-3 btn btn-outline-dark" name="remove_cart">
                    </td>

                </tr>
                <?php  } }  }
                else{
                  echo "<h1 class='text-danger text-center'>Cart is empty</h1>";
                }?>


            </tbody>
        </table>
        <!-- Sub Total-->
         <div class="d-flex mb-5">
          <?php
          $ip=getUserIP();
  $cart_query="select * from cart_details where ip_address='$ip'";
  $result_query=mysqli_query($con,$cart_query);
  $result_count=mysqli_num_rows($result_query);
  if($result_count>0){
               echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>₹$total_price/-</strong></h4>
             <input type='submit' value='Continue Shopping' class='bg-info px-3 py-1 border-0 mx-3 btn btn-outline-dark' 
             name='continue_shopping'>
            <button class='bg-dark px-3 py-2 border-0 mx-3 my-2 text-light' ><a href='./Users_area/checkout.php' 
            class='text-light btn btn-outline-dark'>Checkout</a></button>";
  }
  else{
    echo  "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3 btn btn-outline-dark' name='continue_shopping'>";
  }
  if(isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
  }
          ?>

         </div>
    </div>
 </div>
 </form>

 <!-- function to remove items -->
  <?php
  function remove_cart_item(){
      global $con;
      if(isset($_POST['remove_cart'])){
          foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="delete from cart_details where product_id='$remove_id'";
            $result_delete=mysqli_query($con,$delete_query);
            if($result_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }  
      }
  }
  echo $remove_item=remove_cart_item();
  ?>

  <!-- last child -->
  <!--include footer-->
  <?php
  include("./includes/footer.php");
  ?>

</div>
<!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
 crossorigin="anonymous"></script>
</body>
</html>
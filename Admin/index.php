<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
     rel="stylesheet" 
     integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
     crossorigin="anonymous">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
     
     <!-- font awesome link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="../style.css">
      <style>
        body{
            overflow-x:hidden;
        }
        .product_img{
            width: 100px;
            object-fit: contain;
        }
      </style>
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->   
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
                <img src="../images/admin.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
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

                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        

        <!-- third child -->
         <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/admin.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="Insert_products.php" class="nav-link text-dark bg-info my-1">Insert products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-dark bg-info my-1">View products</a></button>
                    <button><a href="index.php?Insert_category" class="nav-link text-dark bg-info my-1">Insert categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-dark bg-info my-1">view categories</a></button>
                    <button><a href="index.php?Insert_brand" class="nav-link text-dark bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-dark bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-dark bg-info my-1">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-dark bg-info my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-dark bg-info my-1">List Users</a></button>
                    <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <button> <a class='nav-link text-dark bg-info my-1' href='./admin_login.php'>Login</a> </button>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <button> <a class='nav-link text-dark bg-info my-1' href='./admin_logout.php'>Logout</a> </button>
        </li>";
        }
        ?>
                </div>
            </div>
         </div>

        <!-- fourth child -->
         <div class="container my-5">
            <?php 
                if(isset($_GET['Insert_category'])){
                    include('Insert_categories.php');
                }
            ?>
            <?php 
                if(isset($_GET['Insert_brand'])){
                    include('Insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brand'])){
                    include('edit_brand.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
            ?>
         </div>

        <?php include("../includes/footer.php")?>

     </div>
      
    
<!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
 crossorigin="anonymous"></script>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
 crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>

</body>
</html>
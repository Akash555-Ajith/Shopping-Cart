<?php

//function to get products
function getproducts(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
     $select_query="select * from products order by rand() limit 0,9";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>view more</a>
  </div>
</div>
    </div>";
        }
}
}
}

//getting all products
function get_all_products(){
     global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
     $select_query="select * from products order by rand()";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>view more</a>
  </div>
</div>
    </div>";
        }
}
}
}

//getting unique categories
function get_unique_categories(){
    global $con;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
     $select_query="select * from products where category_id=$category_id order by rand() limit 0,9";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h1 class='text-center text-danger'>No Stock for this category</h1>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>view more</a>
  </div>
</div>
    </div>";
        }
}
}

//get unique Brands
function get_unique_brands(){
    global $con;

    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
     $select_query="select * from products where brand_id=$brand_id order by rand() limit 0,9";
        $result_query=mysqli_query($con,$select_query);
         $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h1 class='text-center text-danger'>This Brand is Not Available for Service</h1>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>view more</a>
  </div>
</div>
    </div>";
        }
}
}


//function to display brands in sidenav
function getbrands(){
    global $con;
     $select_brands="select * from brands";
  $result_brands=mysqli_query($con,$select_brands);
  while($row_data=mysqli_fetch_assoc($result_brands)){
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
    echo "<li class='nav-item '>
    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";
  }
}

//function to display categories in sidenav
function getcategories(){
    global $con;
    $select_category="select * from categories";
  $result_category=mysqli_query($con,$select_category);
  while($row_data=mysqli_fetch_assoc($result_category)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "<li class='nav-item '>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
}
}

//searching products function
function search_products(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data=$_GET['search_data'];
     $search_query="select * from products where product_keywords like '%$search_data%'";
        $result_query=mysqli_query($con,$search_query);
         $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h1 class='text-center text-danger'>No products found for your search.</h1>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>view more</a>
  </div>
</div>
    </div>";
        }
}
}


//view details function
function view_details(){
    global $con;
  if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
          $product_id=$_GET['product_id'];
     $select_query="select * from products where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
             $product_image2=$row['product_image2'];
              $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
           echo " <div class='col-md-4 mb-2'>
        <div class='card' >
  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
  </div>
  <div class='card-body'>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
    <a href='index.php' class='btn btn-dark'>Go Home</a>
  </div>
</div>
    </div>
    
    <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                </div>
                <div class='col-md-6'>
                     <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                        <img src='./Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>
        </div>";
        }
}
}
}
}


// get ip adddress function
function getUserIP() {
    // Check for shared internet connections (e.g., Cloudflare, proxy)
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Handle multiple IPs if forwarded through proxies
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ipList[0]); // Get the first real IP
    } else {
        $ip = $_SERVER['REMOTE_ADDR']; 
    }

    return $ip;
}


// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $ip=getUserIP();
  $get_product_id=$_GET['add_to_cart'];
  $select_query="select * from cart_details where ip_address='$ip' and product_id=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('Product already in cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            }
          else{
            $insert_query="insert into cart_details(product_id,ip_address,quantity) values($get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
             echo "<script>alert('product is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
          }

}
}

//function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
  global $con;
  $ip=getUserIP();
  $select_query="select * from cart_details where ip_address='$ip' ";
  $result_query=mysqli_query($con,$select_query);
   $count_cart_items=mysqli_num_rows($result_query);}

          else{
  global $con;
  $ip=getUserIP();
  $select_query="select * from cart_details where ip_address='$ip' ";
  $result_query=mysqli_query($con,$select_query);
   $count_cart_items=mysqli_num_rows($result_query);}
          
   echo $count_cart_items; 
}

//total price function
function total_Cart_price(){
  global $con;
  $ip=getUserIP();
  $total_price=0;
  $cart_query="select * from cart_details where ip_address='$ip'";
  $result_query=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result_query)){
    $product_id=$row['product_id'];
    $select_products="select * from products where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
     while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
     }
  }
  echo $total_price;
}




//get user order details
function get_user_order(){
global $con;
$username = $_SESSION['username'];
$get_details="select * from user_table where username='$username'";
$result_details=mysqli_query($con,$get_details);
while($row_query=mysqli_fetch_array($result_details)){
  $user_id=$row_query['user_id'];
  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_account'])){
        $get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
        $result_orders_query=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders_query);
        if($row_count>0){
          echo "<h3 class='text-center text-success mt-5 mb-2'>You Have <span class='text-danger'>$row_count </span>Pending Orders</h3>
          <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
        }
        else{
           echo "<h3 class='text-center text-success mt-5 mb-2'>You Have 0 Pending Orders</h3>
          <p class='text-center'><a href='../index.php' class='text-dark'>Explore More</a></p>";
        }
        }
      }
    }
  }
}

?>
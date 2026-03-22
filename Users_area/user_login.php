<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

    <style>
        body{
    overflow-x: hidden;}
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" 
                        placeholder="Enter your Username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" 
                        placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
                    </div>

            <div class="text-center">
                <input type="submit" value="Login" class="btn btn-info px-5 py-2 text-dark border=0" name="user_login"/>
                <p class="small fw-bold mt-2 pt-1 mb-0" >Don't have an account? <a href="user_registration.php" class="link-danger">Register</a></p>
            </div> 
            
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="select * from user_table where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $user_ip=getUserIP();

    //cart items
    $select_query_cart="select * from cart_details where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);


    if($row_count>0){
         $_SESSION['username']=$user_username;
        $row_data=mysqli_fetch_assoc($result);
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                 $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                 $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
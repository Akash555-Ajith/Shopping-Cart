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
    <title>Admin Login</title>
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
      referrerpolicy="no-referrer"/>
      <style>
        body{
            overflow-x: hidden;
        }
      </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin.jpg" alt="Admin Regisration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your Username" required="required" class="form-control">
                    </div>
                
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required="required" class="form-control">
                    </div>
                
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 btn text-light btn-outline-success"
                        name="admin_login" value="Login">
                        <p class="medium fw-bold mt-2 pt-1">Don't have an Account? <a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];
    $select_query="select * from admin_table where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);

    if($row_count>0){
         $_SESSION['username']=$admin_username;
        $row_data=mysqli_fetch_assoc($result);
        if(password_verify($admin_password,$row_data['admin_password'])){
            if($row_count==1 and $row_count_cart==0){
                 $_SESSION['username']=$admin_username;
                echo "<script>alert('Login successful!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
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
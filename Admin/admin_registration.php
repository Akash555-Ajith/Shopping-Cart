<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" 
                        placeholder="Confirm your Password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 btn text-light btn-outline-success"
                        name="admin_registration" value="Register">
                        <p class="medium fw-bold mt-2 pt-1">Already have an Account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
 if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $user_confirm_password=$_POST['confirm_password'];
    
     //select query
    $select_query="select * from admin_table where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Admin already exists')</script>";
    }
    else if($admin_password!=$user_confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }

    else{

    //insert query
    $insert_query="insert into admin_table(admin_name,admin_email,admin_password)
    values ('$admin_username','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Registration successful')</script>";
    }
    else{
        die(mysqli_error($con));    
    }
 }
    }
?>
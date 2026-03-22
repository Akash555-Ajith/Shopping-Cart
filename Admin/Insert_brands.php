<?php
include('../includes/connect.php');
if(isset($_POST['Insert_brand'])){
    $brand_title=$_POST['brand_title'];

    $select_brand="select * from brands where brand_title='$brand_title'";   
    $result_select=mysqli_query($con,$select_brand);
    $number=mysqli_num_rows($result_select);
    if($number>0){
         echo "<script>alert('Brand already exists')</script>";
    }
    else{
    $insert_brand="insert into brands(brand_title) values('$brand_title')";
    $result=mysqli_query($con,$insert_brand);
    if($result){
        echo "<script>alert('Brand has been inserted Successfully')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2"> 
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
 
  <input type="submit" class=" bg-primary border-0 p-2 my-3" name="Insert_brand" value="Insert Brand"> 

</div>
</form>
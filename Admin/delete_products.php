<?php
    if(isset($_GET['delete_products'])){
        $delete_id=$_GET['delete_products'];

        //delete query
        $delete_products="delete from products where product_id=$delete_id";
        $result_products=mysqli_query($con,$delete_products);
        if($result_products){
            echo "<script>alert('Product Deleted Successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
?>
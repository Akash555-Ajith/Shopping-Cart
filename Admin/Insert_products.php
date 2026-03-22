<?php
include('../includes/connect.php');
if(isset($_POST['Insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['Description'];
    $product_keywords=$_POST['Product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['Product_price'];
    $product_status='true';

    //Accessing Images
    $product_image1=$_FILES['Product_image1']['name'];
    $product_image2=$_FILES['Product_image2']['name'];
    $product_image3=$_FILES['Product_image3']['name'];

    //Acessing image Temp Name
    $temp_image1=$_FILES['Product_image1']['tmp_name'];
    $temp_image2=$_FILES['Product_image2']['tmp_name'];
    $temp_image3=$_FILES['Product_image3']['tmp_name']; 
    
    //checking empty condition
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' 
    or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){

            echo "<script>alert('please fill all the fields')</script>";
            exit();
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="insert into products(product_title,product_description,product_keywords,category_id,brand_id,
        product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$product_description',
       '$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',
       NOW(),'$product_status')";
       $result_query=mysqli_query($con,$insert_products);
       if($result_query){
        echo "<script>alert('Successfully inserted the products')</script>";
       }
       

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
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

      <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">

            <!-- Title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" 
            autocomplete="off" required="required">
        </div>
            <!-- Discription -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Description" class="form-label">Product Description</label>
            <input type="text" name="Description" id="Description" class="form-control" placeholder="Enter product Description" 
            autocomplete="off" required="required">
        </div>
         <!-- Keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="Product_keywords" id="Product_keywords" class="form-control" placeholder="Enter product keywords" 
            autocomplete="off" required="required">
        </div>
        <!--categories-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
                <option value="">select a category </option>
                <?php
                $select_categories="select * from categories";
                $result_categories=mysqli_query($con,$select_categories);
                while($row=mysqli_fetch_assoc($result_categories)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
                
            </select>
        </div>
         <!--brands-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brand" id="" class="form-select">
                <option value="">select a brand </option> 
                <?php
                $select_brands="select * from brands";
                $result_brands=mysqli_query($con,$select_brands);
                while($row=mysqli_fetch_assoc($result_brands)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <!-- image1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image1" class="form-label">Product image 1</label>
            <input type="file" name="Product_image1" id="Product_image1" class="form-control"  
            required="required">
        </div> 
        <!-- image2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image2" class="form-label">Product image 2</label>
            <input type="file" name="Product_image2" id="Product_image2" class="form-control"  
            required="required">
        </div> 
        <!-- image3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Product_image3" class="form-label">Product image 3</label>
            <input type="file" name="Product_image3" id="Product_image3" class="form-control"  
            required="required">
        </div> 
         <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter product Price" 
            autocomplete="off" required="required">
        </div>
         <!-- submit -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="Insert_product" class="btn btn-primary mb-3 px-3" value="Insert Product">
        </div>

</form>
    </div>
    
</body>
</html>
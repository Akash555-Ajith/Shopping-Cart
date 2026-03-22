<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_products="select * from products where product_id=$edit_id";
    $result_products=mysqli_query($con,$get_products);
    $row_product=mysqli_fetch_assoc($result_products);
    $product_title=$row_product['product_title'];
    $product_desc=$row_product['product_description'];
    $product_keywords=$row_product['product_keywords'];
    $category_id=$row_product['category_id'];
    $brand_id=$row_product['brand_id'];
    $product_image1=$row_product['product_image1'];
    $product_image2=$row_product['product_image2'];
    $product_image3=$row_product['product_image3'];
    $product_price=$row_product['product_price'];

    //fetching category id
    $select_category="select * from categories where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    //fetching brand id
    $select_brand="select * from brands where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control border-dark mb-4" 
            required="required"  value="<?php echo $product_title ?>" placeholder="Enter Product Title">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control border-dark mb-4" 
            required="required" value="<?php echo $product_desc ?>" placeholder="Enter Product Description">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control border-dark mb-4" 
            required="required"  value="<?php echo $product_keywords ?>" placeholder="Enter Product Keywords">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select border-dark">
                <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                <?php
                        $select_category_all="select * from categories";
                        $result_category_all=mysqli_query($con,$select_category_all);
                       while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                       }
                ?>
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select border-dark">
                <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
                <?php
                        $select_brand_all="select * from brands";
                        $result_brand_all=mysqli_query($con,$select_brand_all);
                       while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                        $brand_title=$row_brand_all['brand_title'];
                        $brand_id=$row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                       }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto border-dark mb-4" 
            required="required" placeholder="Enter Product Title">
            <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto border-dark mb-4" 
            required="required" placeholder="Enter Product Title">
            <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto border-dark mb-4" 
            required="required" placeholder="Enter Product Title">
            <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control border-dark mb-4" 
            required="required" value="<?php echo $product_price ?>" placeholder="Enter Product Price">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" name="edit_product" value="Update Product" 
            class="btn btn-info btn-outline-success text-dark px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name']; 
    
    //checking for fields empty or not
    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or 
    $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('please fill all the fields and continue')</script>";
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //update query
        $update_products="update products set category_id='$product_category' , brand_id='$product_brands' , 
        product_title='$product_title' , product_description='$product_desc' , product_keywords='$product_keywords' , 
        product_price='$product_price' , product_image1='$product_image1', product_image2='$product_image2' , 
        product_image3='$product_image3' , date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}
?>
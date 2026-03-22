<h2 class="text-center text-success">All Brands</h2>
<table class="table table-bordered mt-5">
    <thead>
        <tr class='text-center'>
            <th class='bg-info'>Brand Id</th>
            <th class='bg-info'>Brand Title</th>
            <th class='bg-info'>Edit</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brands="select * from brands";
        $result_brands=mysqli_query($con,$select_brands);
        while($row=mysqli_fetch_assoc($result_brands)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
        
        ?>
        <tr class='text-center'>
            <td class='bg-secondary text-light'><?php echo $brand_id; ?></td>
            <td class='bg-secondary text-light'><?php echo $brand_title; ?></td>
            <td class='bg-secondary text-light'><a href='index.php?edit_brand=<?php echo $brand_id; ?>' 
                class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a href='index.php?delete_brand=<?php echo $brand_id; ?>' 
                  type="button" class="text-light" data-toggle="modal" data-target="#exampleModalCenter">
                 <i class='fa-solid fa-trash'></i></a></td>
        </tr> 
        <?php } ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
       <h4>Are You Sure You Want To Delete This</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id; ?>' 
                 class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
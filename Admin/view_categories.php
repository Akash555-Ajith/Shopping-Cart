<h2 class="text-center text-success">All Categories</h2>
<table class="table table-bordered mt-5">
    <thead>
        <tr class='text-center'>
            <th class='bg-info'>Category Id</th>
            <th class='bg-info'>Category Title</th>
            <th class='bg-info'>Edit</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat="select * from categories";
        $result_cat=mysqli_query($con,$select_cat);
        while($row=mysqli_fetch_assoc($result_cat)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
        
        ?>
        <tr class='text-center'>
            <td class='bg-secondary text-light'><?php echo "$category_id"; ?></td>
            <td class='bg-secondary text-light'><?php echo "$category_title"; ?></td>
            <td class='bg-secondary text-light'><a href='index.php?edit_category=<?php echo $category_id; ?>' 
                class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a href='index.php?delete_category=<?php echo $category_id?>' 
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id; ?>' 
                 class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
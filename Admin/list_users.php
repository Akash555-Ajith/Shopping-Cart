<h1 class="text-center text-success">All Users</h1>
<table class="table table-bordered mt-5">
    <style>
        .uimage{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
    <thead>
        <?php
        $get_users="select * from user_table";
        $result_users=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result_users);
        

    if($row_count==0){
        echo "<h1 class='text-danger text-center mt-5'>No Users yet</h1>";
    }
    else{
        echo "<tr>
            <th class='bg-info text-center'>User Id</th>
            <th class='bg-info text-center'>Username</th>
            <th class='bg-info text-center'>User Email</th>
            <th class='bg-info text-center'>User Image</th>
            <th class='bg-info text-center'>User Address</th>
            <th class='bg-info text-center'>User Mobile</th>
            <th class='bg-info text-center'>Delete</th>
        </tr>
    </thead>
    <tbody>";
        while($row_data=mysqli_fetch_assoc($result_users)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
 
            echo "<tr>
            <td class='bg-secondary text-light text-center'>$user_id</td>
            <td class='bg-secondary text-light text-center'>$username</td>
            <td class='bg-secondary text-light text-center'>$user_email</td>
            <td class='bg-secondary text-light text-center'><img src='../Users_area/user_images/$user_image' 
            alt='$username' class='uimage'</td>
            <td class='bg-secondary text-light text-center'>$user_address</td>
            <td class='bg-secondary text-light text-center'>$user_mobile</td>
            <td class='bg-secondary text-light text-center'><a href='' class='text-light'>
                 <i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
        ?>

        
        
    </tbody>
</table>
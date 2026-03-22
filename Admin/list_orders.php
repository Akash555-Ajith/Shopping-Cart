<h1 class="text-center text-success">All Orders</h1>
<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_orders="select * from user_orders";
        $result_orders=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders);
        

    if($row_count==0){
        echo "<h1 class='text-danger text-center mt-5'>No Orders yet</h1>";
    }
    else{
        echo "<tr>
            <th class='bg-info text-center'>Order Id</th>
            <th class='bg-info text-center'>Due Amount</th>
            <th class='bg-info text-center'>Invoice Number</th>
            <th class='bg-info text-center'>Total Products</th>
            <th class='bg-info text-center'>Order Date</th>
            <th class='bg-info text-center'>Status</th>
            <th class='bg-info text-center'>Delete</th>
        </tr>
    </thead>
    <tbody>";
        while($row_data=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $due_amount=$row_data['due_amount'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            echo "<tr>
            <td class='bg-secondary text-light text-center'>$order_id</td>
            <td class='bg-secondary text-light text-center'>$due_amount</td>
            <td class='bg-secondary text-light text-center'>$invoice_number</td>
            <td class='bg-secondary text-light text-center'>$total_products</td>
            <td class='bg-secondary text-light text-center'>$order_date</td>
            <td class='bg-secondary text-light text-center'>$order_status</td>
            <td class='bg-secondary text-light text-center'><a href='' class='text-light'>
                 <i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
        ?>

        
        
    </tbody>
</table>
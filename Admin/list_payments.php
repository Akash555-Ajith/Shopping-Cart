<h1 class="text-center text-success">All Payments</h1>
<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_payments="select * from user_payments";
        $result_payments=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result_payments);
        

    if($row_count==0){
        echo "<h1 class='text-danger text-center mt-5'>No Payments yet</h1>";
    }
    else{
        echo "<tr>
            <th class='bg-info text-center'>Payment Id</th>
            <th class='bg-info text-center'>Invoice Number</th>
            <th class='bg-info text-center'>Amount</th>
            <th class='bg-info text-center'>Payment Date</th>
            <th class='bg-info text-center'>Payment Mode</th>
            <th class='bg-info text-center'>Delete</th>
        </tr>
    </thead>
    <tbody>";
        while($row_data=mysqli_fetch_assoc($result_payments)){
            $payment_id=$row_data['payment_id'];
            $order_id=$row_data['order_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
 
            echo "<tr>
            <td class='bg-secondary text-light text-center'>$payment_id</td>
            <td class='bg-secondary text-light text-center'>$invoice_number</td>
            <td class='bg-secondary text-light text-center'>$amount</td>
            <td class='bg-secondary text-light text-center'>$date</td>
            <td class='bg-secondary text-light text-center'>$payment_mode</td>
            <td class='bg-secondary text-light text-center'><a href='' class='text-light'>
                 <i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
        ?>

        
        
    </tbody>
</table>
<?php
include 'inc/header.php';
?>
     
            
            <!------------content-body------------>
<?php
           
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<div class="container">
    <h2>Manage Orders</h2>
    <table class="table table-bordered" style="background-color: #00536cad;color: white;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Address</th>
                <th>Prescription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['total_price'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>';
                
                    echo '<a href="../' . $row['prescription'] . '" target="_blank">';
                    echo '<img src="../' . $row['prescription'] . '" alt="' . $row['prescription'] . '" style="max-width: 100px;">';
                    echo '</a>';

                    echo '</td>';
                    echo '<td>' . $row['bkashNumber'] . '</td>';
                    echo '<td>' . $row['tnxNumber'] . '</td>';
                    
                    echo '<td>';
                   
                    echo '<form action="update_order_status.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<select name="status">';
                    echo '<option value="pending">Pending</option>';
                    echo '<option value="confirmed">Confirmed</option>';
                    echo '<option value="on_the_way">On the Way</option>';
                    echo '<option value="on_hold">On Hold</option>';
                    echo '<option value="canceled">Canceled</option>';
                    echo '<option value="done">Done</option>';
                    echo '</select>';
                    echo '<input type="submit" class="btn btn-info" value="Update">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">No orders found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'inc/footer.php';
?>
     
<?php
session_start();
include 'includes/header.php';
include 'connection/db_connection.php';
?>

<div class="container" style="margin-top:200px; margin-bottom:550px;">
<h2 style="font-family:cursive;">Welcome Back <?php echo $_SESSION["user_name"]; ?></h2>
  <div class="row" style="background: #30df0517;border-radius: 7px;height: 500px; border:12px solid #377f00;">
    <div class="col-md-2 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist" style="background: #000c2617;border-radius: 8px; padding:10px;">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">MY ACCOUNT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MY ORDERS</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="contact-tab" href="logout.php">SIGN OUT</a>
  </li>
</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-10">
      <div class="tab-content" id="myTabContent" style="padding:10px;">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php
     $session_user = $_SESSION["user_id"];
     $user_data = mysqli_query($conn, "SELECT * FROM `tbl_customer` WHERE `id`= '$session_user'");
     $user_row = mysqli_fetch_assoc($user_data);
     ?>
  <h2>ACCOUNT DETAILS</h2>
  <table class="table">
  <tbody>
    <tr>
      <td>Name</td>
      <td><?php echo $user_row['name'];?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><?php echo $user_row['phone'];?></td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td><?php echo $user_row['email'];?></td>
    </tr>
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <?php
$session_user = $_SESSION["user_id"];
$sql = "SELECT * FROM orders WHERE user_id = $session_user";
$result = $conn->query($sql);
?>
  <h2>All ORDERS</h2>
  <div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td>' . $row['quantity'] . '</td>';
                    echo '<td>' . $row['total_price'] . '</td>';

                    // Define an array to map statuses to Bootstrap badge classes
                    $statusClasses = [
                        'Pending' => 'badge badge-warning',
                        'confirmed' => 'badge badge-success',
                        'on_the_way' => 'badge badge-info',
                        'on_hold' => 'badge badge-purple',
                        'canceled' => 'badge badge-danger',
                        'done' => 'badge badge-secondary',
                    ];

                    // Get the Bootstrap badge class based on the status
                    $statusClass = $statusClasses[$row['status']] ?? 'badge badge-secondary';

                    // Display the status with the corresponding Bootstrap badge
                    echo '<td><span class="' . $statusClass . '">' . $row['status'] . '</span></td>';

                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No orders found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h2>Contact</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
  
  </div>
</div>
    </div>
    <!-- /.col-md-8 -->
  </div>
  
  
  
</div>
<!-- /.container -->

<?php
include 'includes/footer.php';
include 'includes/modal.php';
?>

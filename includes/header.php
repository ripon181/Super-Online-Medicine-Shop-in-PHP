<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Medicine Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body style="background:url('images/background.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">Online Medicine Shop</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homeopathic.php">Homeopathic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allopathic.php">Allopathic</a>
                </li>
                <li class="nav-item">
                    <?php
                    include 'connection/db_connection.php';

                    if (isset($_SESSION['customer_logged_in']) && $_SESSION['customer_logged_in'] === true) {
                        $select_product = mysqli_query($conn, "SELECT * FROM cart") or die('query Failed');
                        $row_count = mysqli_num_rows($select_product);
                        echo '<a href="cart.php"> <i class="fas fa-shopping-cart" style="color: red;"></i><span><sup style="color:#fff; font-size:14px;">' . $row_count . '</sup></span></a>';
                    } else {
                        echo '<button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#armyUsersLoginModal">
                                <i class="fas fa-shopping-cart" style="color: #086e01;"></i>
                              </button>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['customer_logged_in']) && $_SESSION['customer_logged_in'] === true) { ?>
                        <a href="dashboard.php"><i class="fas fa-user" style="color: red;"></i></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#armyUsersLoginModal">
                            <i class="fas fa-user" style="color: #086e01;"></i>
                        </button>
                    <?php } ?>
                </li>
                <li class="nav-item">
                <a class="nav-link btn btn-info" href="#" data-toggle="modal" data-target="#adminLoginModal">Admin Panel</a>
            </li>
            </ul>
        </div>
      </div>
    </nav>
</body>
</html>

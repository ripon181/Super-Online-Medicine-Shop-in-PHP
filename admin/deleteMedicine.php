<?php
include '../connection/db_connection.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $medicine_id = $_GET['id'];

    // Delete medicine directly without confirmation
    $sql = "DELETE FROM products WHERE id = $medicine_id";
    if ($conn->query($sql)) {
        // Deletion successful
        header("Location: manageMedicine.php");
        exit();
    } else {
        // Error in deletion
        echo '<div class="container mt-5"><p class="alert alert-danger">Error deleting medicine.</p></div>';
    }
} else {
    echo '<div class="container mt-5"><p class="alert alert-danger">Invalid request.</p></div>';
}

include 'inc/footer.php';
?>

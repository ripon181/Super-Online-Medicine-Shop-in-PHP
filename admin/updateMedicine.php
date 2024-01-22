<?php
include '../connection/db_connection.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $medicine_id = $_POST['id'];

    // Fetch existing medicine details from the database
    $sql = "SELECT * FROM products WHERE id = $medicine_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $existingMedicine = $result->fetch_assoc();

        // Process the updated details
        $name = isset($_POST['name']) ? $_POST['name'] : $existingMedicine['name'];
        $description = isset($_POST['description']) ? $_POST['description'] : $existingMedicine['description'];
        $price = isset($_POST['price']) ? $_POST['price'] : $existingMedicine['price'];
        $category = isset($_POST['category']) ? $_POST['category'] : $existingMedicine['category'];

        // Check if a new image is uploaded
        if ($_FILES['image']['error'] == 0) {
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_temp, "uploads/$image");
        } else {
            $image = $existingMedicine['image'];
        }

        // Update the medicine in the database
        $updateSql = "UPDATE products SET 
                      name = '$name', 
                      description = '$description', 
                      price = $price, 
                      category = $category,
                      image = '$image'
                      WHERE id = $medicine_id";

        if ($conn->query($updateSql) === TRUE) {
            echo '<script>alert("Medicine Updated Successfull!"); window.location.href = "manageMedicine.php";</script>';
        } else {
            echo '<div class="container mt-5"><p class="alert alert-danger">Error updating medicine: ' . $conn->error . '</p></div>';
        }
    } else {
        echo '<div class="container mt-5"><p class="alert alert-danger">Medicine not found.</p></div>';
    }
} else {
    echo '<div class="container mt-5"><p class="alert alert-danger">Invalid request.</p></div>';
}

include 'inc/footer.php';
?>

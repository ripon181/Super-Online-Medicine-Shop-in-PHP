<?php
include 'inc/header.php';
include '../connection/db_connection.php'; // Adjust the path as needed

// Check if the medicine ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $medicine_id = $_GET['id'];

    // Fetch medicine details from the database
    $sql = "SELECT * FROM products WHERE id = $medicine_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $medicine = $result->fetch_assoc();
    } else {
        echo '<div class="container mt-5"><p class="alert alert-danger">Medicine not found.</p></div>';
        include 'inc/footer.php';
        exit(); // Exit the script if medicine not found
    }
} else {
    echo '<div class="container mt-5"><p class="alert alert-danger">Invalid request.</p></div>';
    include 'inc/footer.php';
    exit(); // Exit the script if no medicine ID is provided
}
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>Edit Medicine</h2>
    <form action="updateMedicine.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $medicine['id']; ?>">
        <div class="form-group">
            <label for="name">Medicine Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $medicine['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $medicine['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (৳):</label>
            <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" value="<?php echo $medicine['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Medicine Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            <img src="uploads/<?php echo $medicine['image']; ?>" alt="<?php echo $medicine['name']; ?>" style="max-width: 100px;">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                <option value="1" <?php echo ($medicine['category'] == 1) ? 'selected' : ''; ?>>Homeopathic</option>
                <option value="2" <?php echo ($medicine['category'] == 2) ? 'selected' : ''; ?>>Allopathic</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Update Medicine">
    </form>
</div>

<?php
include 'inc/footer.php';
?>

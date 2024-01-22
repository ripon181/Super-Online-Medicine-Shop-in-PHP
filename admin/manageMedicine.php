<?php
include 'inc/header.php';
include '../connection/db_connection.php'; // Adjust the path as needed
?>

<!------------content-body------------>
<div class="container mt-5">
    <h2>All Medicines List</h2>
    <table class="table table-bordered" style="background-color: #00536cad;color: white;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price (৳)</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all medicines from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . ($row['category']) . '</td>';
                    echo '<td><img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '" style="max-width: 100px;"></td>';
                    echo '<td>
                        <a href="editMedicine.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>
                        <a href="deleteMedicine.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">No medicines found.</td></tr>';
            }

    
            ?>
        </tbody>
    </table>
</div>

<?php
include 'inc/footer.php';
?>

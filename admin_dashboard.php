<?php 

include 'includes/header.php'; 
include 'includes/navbar.php'; 
include 'DATABASE/db.php'; 

// Query Pesanan
$query_orders = "SELECT * FROM orders";
$result_orders = $conn->query($query_orders);

// Debug jika query gagal
if (!$result_orders) {
    die("Query Error: " . $conn->error);
}
// Fetch Portfolio Items
$query_items = "SELECT * FROM portfolio_items ORDER BY id ASC";
$result_items = $conn->query($query_items);

// Fetch Categories
$query_categories = "SELECT * FROM portfolio_categories ORDER BY name ASC";
$result_categories = $conn->query($query_categories);

// Handle Adding a New Portfolio Item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_item'])) {
    $image_path = $_FILES['image']['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];

    // Upload the image
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($image_path);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Insert new portfolio item into the database
        $insert_query = "INSERT INTO portfolio_items (image_path, title, description, category) VALUES ('$target_file', '$title', '$description', '$category_id')";
        if ($conn->query($insert_query) === TRUE) {
            echo "New portfolio item added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Handle Adding a New Category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $insert_category_query = "INSERT INTO portfolio_categories (name) VALUES ('$category_name')";
    if ($conn->query($insert_category_query) === TRUE) {
        echo "New category added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container mt-5">

    <h1>Admin Dashboard</h1>

     <!-- Display Orders -->
     <h2 class="mt-5">Pesanan Masuk</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result_orders->num_rows > 0) {
                    while ($row = $result_orders->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['nama_paket'] . "</td>
                                <td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>
                                <td>" . date("d-m-Y H:i", strtotime($row['tanggal_pemesanan'])) . "</td>
                                <td>
                                    <a href='admin/delete_order.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada pesanan.</td></tr>";
                }
                ?>
            </tbody>
        </table>


    <!-- Print Button -->
    <form action="admin/print_orders.php" method="post">
        <button type="submit" class="btn btn-primary mt-3">Print Laporan Pesanan</button>
    </form>

    <!-- Add New Portfolio Item -->
    <h2>Add New Portfolio Item</h2>
    <form action="admin_dashboard.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
                <?php 
                if ($result_categories->num_rows > 0) {
                    while ($row = $result_categories->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                } else {
                    echo "<option value='0'>No categories available</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
    </form>

    <!-- Add New Category -->
    <h2 class="mt-5">Add New Category</h2>
    <form action="admin_dashboard.php" method="post">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <button type="submit" name="add_category" class="btn btn-success">Add Category</button>
    </form>

    <!-- Display Portfolio Items -->
    <h2 class="mt-5">Current Portfolio Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result_items->num_rows > 0) {
                while ($row = $result_items->fetch_assoc()) {
                    echo "<tr>
                            <td><img src='" . $row['image_path'] . "' width='150'></td>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td>
                                <a href='admin/edit_portfolio_item.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                                <a href='admin/delete_portfolio_item.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No items found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>

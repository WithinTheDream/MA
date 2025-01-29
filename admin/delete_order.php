<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $delete_query = "DELETE FROM orders WHERE id = '$order_id'";
    if ($conn->query($delete_query) === TRUE) {
        header("Location: ../admin_dashboard.php?delete_success=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
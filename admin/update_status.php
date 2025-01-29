<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $query = "UPDATE orders SET status='$status' WHERE id=$order_id";
    if ($conn->query($query) === TRUE) {
        header("Location: ../admin_dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<?php
include '../DATABASE/db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "DELETE FROM portfolio_items WHERE id=$id";
    $conn->query($query);
    header('Location: ../admin_dashboard.php?success=1');
}
?>

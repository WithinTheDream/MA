<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $query = "UPDATE hero_section SET title='$title', description='$description' WHERE id=1";
    $conn->query($query);
    header('Location: ../admin_dashboard.php?success=1');
}
?>

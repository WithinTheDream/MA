<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['about_title']);
    $description = $conn->real_escape_string($_POST['about_description']);

    $query = "UPDATE about_section SET title='$title', description='$description' WHERE id=1";

    if ($conn->query($query)) {
        echo "About section berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }

    header('../Location: ../admin_dashboard.php');
}
?>

<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = '../assets/img/';
    $imageName = basename($_FILES['image']['name']);
    $uploadFile = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $query = "INSERT INTO carousel_images (image_path) VALUES ('$uploadFile')";
        $conn->query($query);
        header('Location: ../admin_dashboard.php?success=1');
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>

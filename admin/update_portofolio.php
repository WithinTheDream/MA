<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "../assets/img/";
    $image_name = basename($_FILES["portfolio_image"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["portfolio_image"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO portfolio (image_path) VALUES ('$target_file')";
        if ($conn->query($query)) {
            echo "Gambar Portfolio berhasil diperbarui!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }

    header('Location: ../admin_dashboard.php');
}
?>

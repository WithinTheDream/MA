<?php
include '../DATABASE/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "../assets/img/";
    $image_name = basename($_FILES["portfolio_image"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["portfolio_image"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO portfolio (image_path) VALUES ('$target_file')";
        if ($conn->query($query)) {
            echo "<script>
                window.addEventListener('load', function () {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Gambar portfolio berhasil diperbarui!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '../admin_dashboard.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                window.addEventListener('load', function () {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan: " . $conn->error . "',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>";
        }
    } else {
        echo "<script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat mengunggah gambar.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
    }
}
?>
<!-- SweetAlert2 CDN -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

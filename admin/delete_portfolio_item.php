<?php
include '../DATABASE/db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "DELETE FROM portfolio_items WHERE id=$id";
    
    if ($conn->query($query)) {
        echo "<script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Portfolio berhasil dihapus.',
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
                    text: 'Terjadi kesalahan saat menghapus portfolio.',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                }).then(() => {
                    window.history.back();
                });
            });
        </script>";
    }
}
?>

<!-- SweetAlert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

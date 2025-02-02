<?php
require '../DATABASE/db.php'; // Hubungkan dengan database

if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']); // Pastikan id adalah integer

    // Query hapus data pesanan
    $query = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $order_id);

    if ($stmt->execute()) {
        echo "<script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Pesanan berhasil dihapus.',
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
                    text: 'Gagal menghapus pesanan.',
                    icon: 'error',
                    confirmButtonText: 'Coba Lagi'
                }).then(() => {
                    window.location.href = '../admin_dashboard.php';
                });
            });
        </script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!-- SweetAlert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                alert('Pesanan berhasil dihapus');
                window.location.href='../admin_dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus pesanan');
                window.location.href='../admin_dashboard.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>

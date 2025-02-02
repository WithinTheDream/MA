<?php
session_start();

// Hapus sesi dan beri notifikasi
session_destroy();
$_SESSION['error_message'] = "Anda telah berhasil logout.";

// Alihkan kembali ke halaman utama
header("Location: ../index.php");
exit;
?>

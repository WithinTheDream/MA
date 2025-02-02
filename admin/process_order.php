<?php
include '../DATABASE/db.php';

// Proses pemesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_paket = $conn->real_escape_string($_POST['nama_paket']);
    $harga = $conn->real_escape_string($_POST['harga']);

    // Simpan ke database
    $query = "INSERT INTO orders (nama_paket, harga) VALUES ('$nama_paket', '$harga')";
    if ($conn->query($query) === TRUE) {
        echo "Pemesanan berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    // Redirect kembali ke halaman sebelumnya
    header("Location: ../services.php");
}
?>

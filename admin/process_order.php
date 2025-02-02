<?php
include '../DATABASE/db.php'; // Pastikan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_paket = $_POST["nama_paket"];
    $harga = $_POST["harga"];
    
    $stmt = $conn->prepare("INSERT INTO orders (nama_paket, harga, tanggal_pemesanan) VALUES (?, ?, NOW())");
    $stmt->bind_param("si", $nama_paket, $harga);

    if ($stmt->execute()) {
        echo "Pesanan berhasil disimpan.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

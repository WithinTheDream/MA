<?php
// Konfigurasi koneksi database
$host = 'localhost'; // Server database
$user = 'root';      // Username database
$password = '';      // Password database (kosong jika default pada XAMPP)
$dbname = 'MApro';   // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

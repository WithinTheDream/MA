<?php
session_start();
require '../DATABASE/db.php';

// Tangkap data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Password dan konfirmasi password tidak cocok.";
        header("Location: ../index.php");
        exit;
    }

    // Cek apakah email sudah terdaftar
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "Email sudah terdaftar.";
        header("Location: ../index.php");
        exit;
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data user ke database
    $sql_insert = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $email, $hashed_password);
    if ($stmt_insert->execute()) {
        $_SESSION['error_message'] = "Registrasi berhasil. Silakan login.";
        header("Location: ../index.php");
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan saat registrasi.";
        header("Location: ../index.php");
    }

    exit;
}
?>

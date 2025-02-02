<?php
session_start();
require '../DATABASE/db.php';

// Tangkap data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Cek apakah password sesuai
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            // Jika admin, arahkan ke dashboard admin
            if ($email === "atmintmaproduction@gmail.com") {
                $_SESSION['is_admin'] = true;
                $_SESSION['error_message'] = "Anda Login sebagai admin. Fitur dashboard admin terbuka.";
                header("Location: ../index.php");
            } else {
                $_SESSION['error_message'] = "Login berhasil sebagai pengguna.";
                header("Location: ../index.php");
            }
        } else {
            $_SESSION['error_message'] = "Password salah.";
            header("Location: ../index.php");
        }
    } else {
        $_SESSION['error_message'] = "Email tidak ditemukan.";
        header("Location: ../index.php");
    }
    exit;
}
?>

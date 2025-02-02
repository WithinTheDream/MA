<?php
require_once __DIR__ . '/../DATABASE/db.php';

// Tambahkan akun admin jika belum ada
$email_admin = "atmintmaproduction@gmail.com";
$password_admin = password_hash("passwordadmin123", PASSWORD_DEFAULT);

$sql_check_admin = "SELECT * FROM users WHERE email = ?";
$stmt_check_admin = $conn->prepare($sql_check_admin);
$stmt_check_admin->bind_param("s", $email_admin);
$stmt_check_admin->execute();
$result_admin = $stmt_check_admin->get_result();

if ($result_admin->num_rows === 0) {
    $sql_add_admin = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt_add_admin = $conn->prepare($sql_add_admin);
    $stmt_add_admin->bind_param("ss", $email_admin, $password_admin);
    $stmt_add_admin->execute();
}

// Memulai sesi dan menangkap pesan error
session_start();
$current_page = basename($_SERVER['SCRIPT_NAME'], ".php");
$error_message = $_SESSION['error_message'] ?? '';
unset($_SESSION['error_message']);

// Proses logout
if (isset($_GET['logout'])) {
    session_destroy();

    // Set notifikasi logout berhasil
    $_SESSION['error_message'] = "Anda telah berhasil logout.";

    // Redirect ke halaman utama
    header("Location: index.php");
    exit;
}
?>


<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <img src="assets/img/MA logo.png" alt="" class="img-fluid w-25">
      <h1 class="sitename">MA Production</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Beranda</a></li>
        <li><a href="services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">Jasa</a></li>
        <li><a href="portofolio.php" class="<?= basename($_SERVER['PHP_SELF']) == 'portofolio.php' ? 'active' : '' ?>">Portofolio</a></li>
        <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Kontak</a></li>
        
        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
          <li><a href="admin_dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php' ? 'active' : '' ?>">Dashboard</a></li>
        <?php endif; ?>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Tombol Login/Logout -->
    <?php if (isset($_SESSION['user'])): ?>
      <a href="?logout" class="btn-getstarted">Logout</a>
    <?php else: ?>
      <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
    <?php endif; ?>

  </div>
</header>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Login -->
                <form action="includes/login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password Anda" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3">Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" onclick="resetModal('registerModal')">Register</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Register -->
                <form action="includes/register.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi password Anda" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Reset modal saat berpindah antara login dan register
    function resetModal(modalId) {
        var modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();

        // Reset form input setiap kali modal dibuka
        var form = document.querySelector(`#${modalId} form`);
        form.reset();
    }

    // Event listener untuk menutup backdrop dan menghilangkan transparansi
    document.addEventListener('shown.bs.modal', function (event) {
        // Menghapus backdrop setelah modal ditutup
        var backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.classList.remove('fade');
            document.body.classList.remove('modal-open'); // Menambahkan kelas modal-open
        }
    });

    // Menghapus backdrop dan menutup modal ketika modal ditutup
    document.addEventListener('hidden.bs.modal', function (event) {
        var backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
    });

    // Function untuk memastikan modal login terbuka dengan baik saat di klik
    $('#loginModal').on('hidden.bs.modal', function () {
        // Menggunakan modal.show() untuk membuka kembali modal dengan bersih
        var modal = new bootstrap.Modal(document.getElementById('loginModal'));
        modal.show();
    });
</script>
<?php if (!empty($error_message)): ?>
    <script>
        window.addEventListener('load', function () {
            Swal.fire({
                title: 'Notifikasi',
                text: "<?= $error_message ?>",
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    </script>
<?php endif; ?>
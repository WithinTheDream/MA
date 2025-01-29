<?php
ob_start(); // Start output buffering
include 'includes/header.php'; 
include 'includes/navbar.php'; 
include 'DATABASE/db.php'; 

$status_pesanan = ''; // Initialize variable
// Status Pesanan
$status_pesanan = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $lokasi_maps = $_POST['lokasi_maps'];
    $tanggal_acara = $_POST['tanggal_acara'];
    $jenis_acara = $_POST['jenis_acara'] == "lainnya" ? $_POST['jenis_acara_lain'] : $_POST['jenis_acara'];
    $paket = $_POST['paket'];
    $harga = $_POST['harga'];
    $status_pesanan = "Pending";

    // Simpan ke database
    $query = "INSERT INTO orders (nama, alamat, no_hp, lokasi_maps, tanggal_acara, jenis_acara, paket, harga, status) 
              VALUES ('$nama', '$alamat', '$no_hp', '$lokasi_maps', '$tanggal_acara', '$jenis_acara', '$paket', '$harga', '$status_pesanan')";
   if ($conn->query($query) === TRUE) {
    // Redirect after successful insertion
    header("Location: checkout.php?status=success");
    exit();
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}
}
?>

<!DOCTYPE html>
<html lang="en">

<body class="index-page">
  <main class="main">
    <div class="container mt-5">
        <?php if ($status_pesanan): ?>
            <div class="alert alert-info">
                <h4>Status Pesanan: <?php echo $status_pesanan; ?></h4>
                <p><strong>Nama Pemesan:</strong> <?php echo $nama; ?></p>
                <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
                <p><strong>No. HP:</strong> <?php echo $no_hp; ?></p>
                <p><strong>Lokasi Acara:</strong> <a href="<?php echo $lokasi_maps; ?>" target="_blank">Lihat Lokasi</a></p>
                <p><strong>Tanggal Acara:</strong> <?php echo $tanggal_acara; ?></p>
                <p><strong>Jenis Acara:</strong> <?php echo $jenis_acara; ?></p>
                <p><strong>Paket:</strong> <?php echo $paket; ?></p>
                <p><strong>Harga:</strong> Rp <?php echo number_format($harga, 0, ',', '.'); ?></p>
            </div>
        <?php endif; ?>

        <h2>Checkout</h2>
        <form action="checkout.php" method="post">
            <div class="mb-3">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
            </div>

            <div class="mb-3">
                <label>No. HP:</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP aktif" required>
            </div>

            <div class="mb-3">
                <label>Link Share Lokasi Google Maps:</label>
                <input type="url" name="lokasi_maps" class="form-control" placeholder="Masukkan link share lokasi acara" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Acara:</label>
                <input type="date" name="tanggal_acara" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jenis Acara:</label>
                <select name="jenis_acara" id="jenis_acara" class="form-control" required>
                    <option value="wedding">Wedding</option>
                    <option value="prewedding">Prewedding</option>
                    <option value="khitanan">Khitanan</option>
                    <option value="ulangtahun">Ulang Tahun</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                <input type="text" name="jenis_acara_lain" id="jenis_acara_lain" class="form-control mt-2" placeholder="Isi jenis acara lain" style="display: none;">
            </div>

            <script>
                document.getElementById('jenis_acara').addEventListener('change', function() {
                    var inputLain = document.getElementById('jenis_acara_lain');
                    if (this.value === 'lainnya') {
                        inputLain.style.display = 'block';
                        inputLain.setAttribute('required', 'required');
                    } else {
                        inputLain.style.display = 'none';
                        inputLain.removeAttribute('required');
                    }
                });
            </script>

            <div class="mb-3">
                <label>Paket:</label>
                <input type="text" name="paket" class="form-control" value="<?php echo $_GET['paket'] ?? ''; ?>" readonly>
            </div>

            <div class="mb-3">
                <label>Harga:</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $_GET['harga'] ?? ''; ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
        </form>
    </div>
  </main>
</body>

</html>


<?php 
ob_end_flush(); // End output buffering and flush output
include 'includes/footer.php'; 
?>
<?php 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
include 'DATABASE/db.php'; // Pastikan koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">

<body class="index-page">
  <main class="main">
    <section id="pricing" class="pricing section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Paket</h2>
        <div><span>Rekomendasi paket</span></div>
      </div>

      <div class="container">
        <div class="row gy-4">
          
        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item" style="background: url('assets/img/paket3.jpg') no-repeat center; background-size: cover;">
            <h3>Video Liputan</h3>
            <h4><sup>Rp.</sup>500.000</h4>
            <ul>
              <li><i class="bi bi-check"></i> 1 kamera video</li>
              <li><i class="bi bi-check"></i> Durasi 60 Menit</li>
              <li><i class="bi bi-check"></i> Flashdisk + GoogleDrive</li>
            </ul>
            <a href="#" class="buy-btn" onclick="return orderPaket(event, 'Video Liputan', 500000)">Pesan Sekarang</a>
            </a>
          </div>
        </div>

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="pricing-item" style="background: url('assets/img/paket2.jpg') no-repeat center; background-size: cover;">
              <h3>Foto Liputan 1 roll</h3>
              <h4><sup>Rp.</sup>400.000</h4>
              <ul>
                <li><i class="bi bi-check"></i> Cetak 4R Album Magnetic</li>
                <li><i class="bi bi-check"></i> Flashdisk</li>
                <li><i class="bi bi-check"></i> Upload Google Drive</li>
              </ul>
              <a href="#" class="buy-btn" onclick="return orderPaket(event, 'Foto Liputan 1 roll', 400000)">Pesan Sekarang</a>
            </div>
          </div>

          <!-- Paket Video + Foto -->
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="pricing-item" style="background: url('assets/img/paket1.jpg') no-repeat center; background-size: cover;">
              <h3>Foto Magazine</h3>
              <h4><sup>Rp.</sup>2.000.000</h4>
              <ul>
                <li><i class="bi bi-check"></i> Cetakan kolase</li>
                <li><i class="bi bi-check"></i> Cetakan album kolase</li>
                <li><i class="bi bi-check"></i> cetakan 4R 80 lembar</li>
                <li><i class="bi bi-check"></i> cetakan 16r 2lembar include frame</li>
                <li><i class="bi bi-check"></i> Upload Google Drive & flasdisk</li>
              </ul>
              <a href="#" class="buy-btn" onclick="return orderPaket(event, 'Foto Magazine', 2000000)">Pesan Sekarang</a>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="pricing-item" style="background: url('assets/img/paket4.jpg') no-repeat center; background-size: cover;">
              <h3>Paket Foto + Video Liputan + Cinema</h3>
              <h4><sup>Rp.</sup>4.000.000</h4>
              <ul>
                <li><i class="bi bi-check"></i> Cetakan kolase</li>
                <li><i class="bi bi-check"></i> cetakan 4R Album Magnetic</li>
                <li><i class="bi bi-check"></i> cetakan 16R 2 lembar include frame</li>
                <li><i class="bi bi-check"></i> vid cinema durasi 4 Menit.</li>
                <li><i class="bi bi-check"></i> Upload Google Drive & flasdisk</li>
              </ul>
              <a href="#" class="buy-btn" onclick="return orderPaket(event, 'Paket Foto + Video Liputan + Cinema', 4000000)">Pesan Sekarang</a>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  function orderPaket(event, namaPaket, harga) {
    event.preventDefault(); // Mencegah tautan langsung dijalankan sebelum proses selesai

    let formData = new FormData();
    formData.append("nama_paket", namaPaket);
    formData.append("harga", harga);

    // Kirim data ke server
    fetch('admin/process_order.php', {
      method: "POST",
      body: formData
    })
    .then(response => response.text()) // Bisa diubah ke .json() jika server mengembalikan JSON
    .then(data => {
      console.log("Pesanan berhasil disimpan:", data);

      // Jika berhasil, redirect ke WhatsApp
      let waUrl = `https://wa.me/6288228892484?text=Halo,%20saya%20ingin%20memesan%20paket%20${encodeURIComponent(namaPaket)}%20seharga%20Rp.${harga}`;
      window.location.href = waUrl;
    })
    .catch(error => {
      console.error("Error saat menyimpan pesanan:", error);
      alert("Gagal memproses pesanan. Coba lagi!");
    });

    return false; // Agar tautan tidak langsung dijalankan sebelum proses selesai
  }
</script>
</body>

</html>

<?php 
include 'includes/footer.php'; 
?>

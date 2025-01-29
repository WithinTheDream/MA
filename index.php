<?php 
include 'includes/header.php'; 
include 'includes/navbar.php'; 

include 'DATABASE/db.php';  

?>

<!DOCTYPE html>
<html lang="en">
<body class="index-page">

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active"> 
        <img src="assets/img/weddingbanner1.jpg" alt="">
        <div class="carousel-container">
          <h2>Abadikan Momen Terindah Anda<br></h2>
          <p>"Kami hadir untuk menangkap setiap detik kebahagiaan Anda dengan sentuhan kreativitas dan profesionalisme. Biarkan cerita cinta Anda terwujud dalam gambar yang abadi.</p>
          <a href="#featured-services" class="btn-get-started">Pesan Sekarang!</a>
        </div>
      </div><!-- End Carousel Item -->

      <div class="carousel-item">
        <img src="assets/img/weddingbanner2.jpg" alt="">
        <div class="carousel-container">
          <h2>Layanan Fotografi & Videografi Premium</h2>
          <p>Dari pre-wedding hingga dokumentasi hari pernikahan, kami menawarkan layanan lengkap untuk mengabadikan momen istimewa Anda.</p>
          <a href="#featured-services" class="btn-get-started">Pesan Sekarang!</a>
        </div>
      </div><!-- End Carousel Item -->

      <div class="carousel-item">
        <img src="assets/img/weddingbanner3.jpg" alt="">
        <div class="carousel-container">
          <h2>Percayakan Momen Spesial Anda pada Kami</h2>
          <p>Dengan pengalaman lebih dari 10 tahun dan ratusan pasangan bahagia, kami siap memberikan hasil terbaik untuk setiap momen tak terlupakan Anda.</p>
          <a href="#featured-services" class="btn-get-started">Pesan Sekarang!</a>
        </div>
      </div><!-- End Carousel Item -->

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators"></ol>

    </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang kami</h2>
        <div><span>Seputar</span> <span class="description-title">MA Production</span></div>
      </div>

      <div class="container">
        <?php
        // Ambil data tentang kami dari database
        $query = "SELECT title, description FROM about_section LIMIT 1";
        $result = $conn->query($query);
        $about = $result->fetch_assoc();
        ?>
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p><?php echo htmlspecialchars($about['description']); ?></p>
            <a href="#" class="read-more"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <?php
          // Ambil data statistik dari database
          $query = "SELECT icon, label, value FROM stats";
          $result = $conn->query($query);

          while ($stat = $result->fetch_assoc()) {
              echo '<div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">';
              echo '<i class="' . htmlspecialchars($stat['icon']) . '"></i>';
              echo '<div class="stats-item">';
              echo '<p>' . htmlspecialchars($stat['label']) . '</p>';
              echo '<span data-purecounter-start="0" data-purecounter-end="' . htmlspecialchars($stat['value']) . '" data-purecounter-duration="1" class="purecounter"></span>';
              echo '</div>';
              echo '</div>';
          }
          ?>
        </div>
      </div>
    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Jasa</h2>
        <div><span>Pilihan</span> <span class="description-title">Jasa Kami</span></div>
      </div>

      <div class="container">
        <div class="row gy-4">
          <?php
          // Ambil data layanan dari database
          $query = "SELECT icon, title, description FROM services";
          $result = $conn->query($query);

          while ($service = $result->fetch_assoc()) {
              echo '<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">';
              echo '<div class="service-item position-relative">';
              echo '<div class="icon"><i class="' . htmlspecialchars($service['icon']) . '"></i></div>';
              echo '<a href="service-details.html" class="stretched-link">';
              echo '<h3>' . htmlspecialchars($service['title']) . '</h3>';
              echo '</a>';
              echo '<p>' . htmlspecialchars($service['description']) . '</p>';
              echo '</div>';
              echo '</div>';
          }
          ?>
        </div>
      </div>
    </section><!-- /Services Section -->

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

</body>

</html>

<?php 
include 'includes/footer.php'; 
?>

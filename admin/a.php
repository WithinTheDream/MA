<?php 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="container mt-5">
  <h1>Admin Dashboard</h1>

  <!-- Tab Navigasi -->
  <ul class="nav nav-tabs" id="adminTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="tab-index" data-bs-toggle="tab" href="#index-management" role="tab">Ubah Beranda (index.php)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab-portfolio" data-bs-toggle="tab" href="#portfolio-management" role="tab">Ubah Gambar Portfolio</a>
    </li>
  </ul>

  <div class="tab-content mt-4" id="adminTabContent">
    
    <!-- Tab untuk Mengelola Beranda -->
    <div class="tab-pane fade show active" id="index-management" role="tabpanel" aria-labelledby="tab-index">
      <h3>Ubah Carousel dan Tentang Kami</h3>
      
      <!-- Form Update Carousel -->
      <h4>Carousel Image Management</h4>
      <form action="admin/update_carousel.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="image" class="form-label">Gambar Baru</label>
          <input type="file" class="form-control" name="carousel_image">
        </div>
        <button type="submit" class="btn btn-primary">Update Carousel</button>
      </form>

      <!-- Form Update About Section -->
      <h4 class="mt-4">About Section Management</h4>
      <form action="admin/update_about.php" method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Judul Tentang Kami</label>
          <input type="text" name="about_title" class="form-control">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi Tentang Kami</label>
          <textarea name="about_description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update About Section</button>
      </form>
    </div>

    <!-- Tab untuk Mengelola Gambar Portfolio -->
    <div class="tab-pane fade" id="portfolio-management" role="tabpanel" aria-labelledby="tab-portfolio">
      <h3>Ubah Gambar Portfolio</h3>
      <form action="admin/update_portfolio.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="portfolio_image" class="form-label">Gambar Baru Portfolio</label>
          <input type="file" class="form-control" name="portfolio_image">
        </div>
        <button type="submit" class="btn btn-primary">Update Gambar Portfolio</button>
      </form>
    </div>

  </div>
</div>

<?php include 'includes/footer.php'; ?>

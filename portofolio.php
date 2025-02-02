<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'DATABASE/db.php';

// Fetch categories
$query_categories = "SELECT * FROM portfolio_categories ORDER BY name ASC";
$result_categories = $conn->query($query_categories);

// Fetch all portfolio items grouped by category
$query_items = "SELECT pi.*, pc.name AS category_name 
                FROM portfolio_items pi 
                LEFT JOIN portfolio_categories pc 
                ON pi.category = pc.id 
                ORDER BY pc.name ASC, pi.title ASC";
$result_items = $conn->query($query_items);

$portfolio = [];

// Organize portfolio items by category
if ($result_items->num_rows > 0) {
    while ($row = $result_items->fetch_assoc()) {
        $portfolio[$row['category_name']][] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/vendor/aos/aos.css">
    <script src="assets/vendor/aos/aos.js"></script>
    <style>
        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .card-title, .card-text {
            transition: opacity 0.5s ease-out;
        }

        .card-title:hover, .card-text:hover {
            opacity: 0.7;
        }
    </style>
</head>

<body class="index-page">

<main class="main">
<section id="portfolio" class="portfolio">

<div class="container mt-5">
    <h1 data-aos="fade-up" data-aos-duration="1000">Portofolio</h1>
    <p data-aos="fade-up" data-aos-duration="1500">Eksplor projek yang telah kami selesaikan</p>

    <?php if (!empty($portfolio)): ?>
        <?php foreach ($portfolio as $category => $items): ?>
            <h2 class="mt-4" data-aos="fade-left" data-aos-duration="1000"><?php echo htmlspecialchars($category); ?></h2>
            <div class="row">
                <?php foreach ($items as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="<?php echo htmlspecialchars($item['image_path']); ?>" class="card-img-top"
                                 alt="<?php echo htmlspecialchars($item['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title" data-aos="fade-up" data-aos-duration="1500"><?php echo htmlspecialchars($item['title']); ?></h5>
                                <p class="card-text" data-aos="fade-up" data-aos-duration="2000"><?php echo htmlspecialchars($item['description']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No portfolio items found.</p>
    <?php endif; ?>
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
    AOS.init(); // Initialize AOS animation library
</script>

</body>

</html>

<?php
include 'includes/footer.php';
?>

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `title`, `description`) VALUES
(1, 'a', 'MA Production adalah penyedia jasa fotografi dan videografi profesional yang berfokus pada momen spesial pernikahan Anda. ');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_images`
--

CREATE TABLE `carousel_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel_images`
--

INSERT INTO `carousel_images` (`id`, `image_path`, `title`, `description`) VALUES
(16, 'assets/img/weddingbanner1.jpg', 'AKWOKAWOKAOWKOWK', 'STOP NGEBUG AJGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG');

-- --------------------------------------------------------

--
-- Table structure for table `hero_section`
--

CREATE TABLE `hero_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_section`
--

INSERT INTO `hero_section` (`id`, `title`, `description`) VALUES
(1, 'lmao banget kang', 'PPPPPPPPPPPPPPPPPP');

-- --------------------------------------------------------

--
-- Table structure for table `hero_text`
--

CREATE TABLE `hero_text` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_text`
--

INSERT INTO `hero_text` (`id`, `title`, `description`) VALUES
(1, 'Abadikan Momen Terindah Anda', 'Kami hadir untuk menangkap setiap detik kebahagiaan Anda dengan sentuhan kreativitas dan profesionalisme. Biarkan cerita cinta Anda terwujud dalam gambar yang abadi.'),
(2, 'Layanan Fotografi & Videografi Premium', 'Dari pre-wedding hingga dokumentasi hari pernikahan, kami menawarkan layanan lengkap untuk mengabadikan momen istimewa Anda.'),
(3, 'Percayakan Momen Spesial Anda pada Kami', 'Dengan pengalaman lebih dari 10 tahun dan ratusan pasangan bahagia, kami siap memberikan hasil terbaik untuk setiap momen tak terlupakan Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `lokasi_maps` text NOT NULL,
  `tanggal_acara` date NOT NULL,
  `jenis_acara` varchar(100) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Pending','Sudah Dijadwalkan') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nama`, `alamat`, `no_hp`, `lokasi_maps`, `tanggal_acara`, `jenis_acara`, `paket`, `harga`, `status`) VALUES
(30, 'adam', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0000-00-00', 'wedding', 'Video', 500000, 'Pending'),
(31, 'ad', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0001-11-11', 'wedding', 'Video', 500000, 'Sudah Dijadwalkan'),
(32, 'ad', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0001-11-11', 'wedding', 'Video', 500000, 'Pending'),
(33, 'ad', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0001-11-11', 'wedding', 'Video', 500000, 'Pending'),
(34, 'ad', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0001-11-11', 'wedding', 'Video', 500000, 'Pending'),
(35, 'ad', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '0001-11-11', 'wedding', 'Video', 500000, 'Pending'),
(36, 'adam', 'ngaluran rt 05 rw 02', '089681560551', 'https://www.google.com/maps/place/Condro+Moeria/@-6.6870066,110.8880174,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70d9c0f17f58b3:0xdad819540ec4b2e7!8m2!3d-6.6870119!4d110.8905923!16s%2Fg%2F11r_xhqd1z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '6666-06-06', 'ulangtahun', 'Video', 500000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE `page_info` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `section_name`, `content`) VALUES
(1, 'welcome_text', 'Selamat datang di MA Production'),
(2, 'about_text', 'Kami menyediakan layanan produksi terbaik untuk kebutuhan Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` enum('image','video') NOT NULL,
  `category` enum('app','books','branding','product') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `file_name`, `file_type`, `category`, `created_at`) VALUES
(1, 'app-1.jpg', 'image', 'app', '2025-01-28 09:34:21'),
(2, 'app-2.mp4', 'video', 'app', '2025-01-28 09:34:21'),
(3, 'books-1738057774.png', 'video', 'books', '2025-01-28 09:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `name`) VALUES
(4, 'Pengajian'),
(7, 'Pre-Wedding'),
(1, 'Wedding');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_items`
--

CREATE TABLE `portfolio_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'Uncategorized'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `title`, `description`, `image_path`, `category`) VALUES
(4, 'prau', 'mountain', 'assets/img/b.jpg', '7'),
(7, 'Sindoro', 'sumbing view from sindoro', 'assets/img/IMG_20241222_045418_650.jpg', '1'),
(8, 'Sindoro', 'Pos 4 sindoro via alang alang sewu', 'assets/img/IMG_20241222_052352_350.jpg', '4'),
(9, 'Dieng', 'gapura dieng', 'assets/img/IMG_4033.JPG', '4');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`) VALUES
(1, 'bi bi-activity', 'Videography', 'Rekam setiap momen indah pernikahan Anda dengan kualitas video sinematik terbaik.'),
(2, 'bi bi-broadcast', 'Photography', 'Abadikan kenangan spesial Anda dalam bentuk foto yang penuh emosi dan keindahan.'),
(3, 'bi bi-easel', 'Cinematic', 'Nikmati hasil akhir film pernikahan dengan gaya sinema yang memukau.');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `icon`, `label`, `value`) VALUES
(1, 'bi bi-emoji-smile', 'Tahun pengalaman', 10),
(2, 'bi bi-journal-richtext', 'Projek diselesaikan', 521),
(3, 'bi bi-star', 'Pelanggan puas', 1463),
(4, 'bi bi-people', 'Tim professional', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(64, 'atmintmaproduction@gmail.com', '$2y$10$iZN3PeTgIB08Lq8RJmvWyelP3rGWqNg32hooLSHnxO/PuVh7Vi4F2', 'user'),
(73, 'adamdaemawan@gmail.com', '$2y$10$IXZFzh/XCfq6XEbZi6V1O.EicYoqilB8xLS3Fdotp7.GIP4scoPrS', 'user'),
(82, 'adam@gmail.com', '$2y$10$lhTmF8mTi.AdLM7BnakH6eoepmKjHLwaDUCIz/wDCeHdCcvSpLVc6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_images`
--
ALTER TABLE `carousel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_section`
--
ALTER TABLE `hero_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_text`
--
ALTER TABLE `hero_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_info`
--
ALTER TABLE `page_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel_images`
--
ALTER TABLE `carousel_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hero_section`
--
ALTER TABLE `hero_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hero_text`
--
ALTER TABLE `hero_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `page_info`
--
ALTER TABLE `page_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

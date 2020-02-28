-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 02:41 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2018_02_07_122344_create_user_table', 1),
(5, '2018_02_07_122716_create_product_table', 1),
(6, '2018_02_07_123003_create_admin_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_code`, `product_img1`, `product_img2`, `created_at`, `updated_at`) VALUES
(8, 'Đầm 1 vai lệch tùng tròn', '685000', 'ABCD123', '1_1518164993.jpg', '2_1518164993.jpg', '2018-02-09 01:29:53', '2018-02-09 01:29:53'),
(9, 'Đầm xẻ ngực tùng nhiều tần catwalk', '1250000', 'ABCD1234', '1_1518165041.jpg', '2_1518165041.jpg', '2018-02-09 01:30:41', '2018-02-09 01:30:41'),
(10, 'Đầm ren mỏng phối đầm thun', '685000', 'ABCD1234', '1_1518165089.jpg', '2_1518165089.jpg', '2018-02-09 01:31:29', '2018-02-09 01:31:29'),
(11, 'Đầm croptop voan tầng catwalk', '1250000', 'ABCD1234', '1_1518165136.jpg', '2_1518165136.jpg', '2018-02-09 01:32:16', '2018-02-09 01:32:16'),
(12, 'Đầm tay dài đính nút tay và hông', '495000', 'ABCD1234', '1_1518165187.jpg', '2_1518165187.jpg', '2018-02-09 01:33:07', '2018-02-09 01:33:07'),
(13, 'Đầm ren cổ sơmi tay dài', '895000', 'ABCD1234', '1_1518165232.jpg', '2_1518165232.jpg', '2018-02-09 01:33:52', '2018-02-09 01:33:52'),
(14, 'Đầm ren xẻ ngực 3 tầng catwalk', '1250000', 'ABCD1234', '1_1518165315.jpg', '2_1518165315.jpg', '2018-02-09 01:35:15', '2018-02-09 01:35:15'),
(15, 'Đầm sát nách kết hột tay', '895000', 'ABCD1234', '1_1518165356.jpg', '2_1518165356.jpg', '2018-02-09 01:35:56', '2018-02-09 01:35:56'),
(16, 'Jumpsuit phối lưng catwalk', '595000', 'ABCD1234', '1_1518165387.jpg', '2_1518165387.jpg', '2018-02-09 01:36:27', '2018-02-09 01:36:27'),
(17, 'Đầm vải ánh kim phối bảng lưng', '649000', 'ABCD1234', '1_1518165421.jpg', '2_1518165421.jpg', '2018-02-09 01:37:01', '2018-02-09 01:37:01'),
(18, 'Đầm 2 dây 3 tầng', '895000', 'ABCD1234', '1_1518165444.jpg', '2_1518165444.jpg', '2018-02-09 01:37:24', '2018-02-09 01:37:24'),
(19, 'Đầm 1 vai cúp ngực', '685000', 'ABCD1234', '1_1518165468.jpg', '2_1518165468.jpg', '2018-02-09 01:37:48', '2018-02-09 01:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

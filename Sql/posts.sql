-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 03:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `pinned` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `cover_image`, `pinned`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Prof.', 'Quisquam recusandae.', 'image.jpg', 0, 1, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(2, 'Title Update Now', 'Cumque eaque.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 20:17:50'),
(3, 'Prof.', 'Magni esse laborum.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(4, 'Mr.', 'Omnis et et sit.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(5, 'Mrs.', 'Laudantium possimus.', 'image.jpg', 1, 1, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(6, 'Dr.', 'Pariatur corrupti.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(7, 'Miss', 'Nihil placeat.', 'image.jpg', 1, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(8, 'Mr.', 'Est officia et et.', 'image.jpg', 1, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(9, 'Dr.', 'Deserunt.', 'image.jpg', 0, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(10, 'Prof.', 'Est optio.', 'image.jpg', 1, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(11, 'Ms.', 'Fugiat facilis.', 'image.jpg', 0, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(12, 'Mr.', 'Quo molestias quia.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(13, 'Mrs.', 'Tempore minima est.', 'image.jpg', 1, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(14, 'Ms.', 'Voluptatem cumque.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(15, 'Mr.', 'Et sunt rem laborum.', 'image.jpg', 1, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(16, 'Dr.', 'Est expedita.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(17, 'Prof.', 'Nulla nisi et.', 'image.jpg', 1, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(18, 'Prof.', 'Et ratione.', 'image.jpg', 0, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(19, 'Mr.', 'Sunt omnis alias.', 'image.jpg', 1, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(20, 'Dr.', 'Inventore eos ad.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(21, 'Ms.', 'Dicta est ipsam.', 'image.jpg', 0, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(22, 'Dr.', 'Consequuntur eos.', 'image.jpg', 1, 2, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(23, 'Ms.', 'Maxime voluptas.', 'image.jpg', 1, 1, NULL, '2024-08-20 19:06:25', '2024-08-20 19:06:25'),
(24, 'Prof.', 'Qui rerum ut velit.', 'image.jpg', 0, 3, NULL, '2024-08-20 19:06:25', '2024-08-21 08:43:24'),
(32, 'tes', 'asdqewrsafqweqw', 'post/w9Wx7EdA4CTqlmJRI9jguUUzfpt4uMfQMS2RXqCM.webp', 1, 6, NULL, '2024-08-21 09:43:37', '2024-08-21 09:43:37'),
(33, 'mahmoud', 'asdqewrsafqweqw', 'post/zmmMTu2bhvFfK3aAAv7FGb7gdlpnXktjBQKN2AYt.webp', 1, 6, NULL, '2024-08-21 09:44:43', '2024-08-21 09:44:43'),
(34, 'mahmoud', 'asdqewrsafqweqw', 'post/aDYjZB3bCxVzjbXr3GyVKU32Xq797vVBY5IjZN18.webp', 1, 6, NULL, '2024-08-21 09:46:22', '2024-08-21 09:46:22'),
(35, 'mahmoud', 'asdqewrsafqweqw', 'post/aG8A1m2SQaCc3n8BUZhwdBnV4wGSq794x1InhpqS.webp', 1, 6, NULL, '2024-08-21 09:46:25', '2024-08-21 09:46:25'),
(36, 'mahmoud', 'asdqewrsafqweqw', 'post/1BXVRb9ja7Y4av3Ni0j3mqoGiccza5aaf9cnMxvq.webp', 1, 6, NULL, '2024-08-21 09:48:54', '2024-08-21 09:48:54'),
(37, 'mahmoud', 'asdqewrsafqweqw', 'post/IKdsivLLpvIeLcjovPsUPNDhD6Ed8qQUBCRprgtv.webp', 1, 6, NULL, '2024-08-21 09:51:00', '2024-08-21 09:51:00'),
(38, 'mahmoud', 'asdas', 'post/vqydcBcXjbH34KqtXoAV4XLXLq5GAqVKKyQvzwtv.webp', 1, 6, NULL, '2024-08-21 10:02:34', '2024-08-21 10:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 03:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyramid`
--

-- --------------------------------------------------------

--
-- Table structure for table `questionair`
--

CREATE TABLE `questionair` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int(10) UNSIGNED NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumable` tinyint(1) NOT NULL DEFAULT '0',
  `ispublish` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionair`
--

INSERT INTO `questionair` (`id`, `name`, `total_questions`, `duration`, `resumable`, `ispublish`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General Math', 10, '60min', 1, 1, 1, '2018-08-16 07:00:00', NULL, NULL),
(2, 'Computer Science', 50, '2hrs', 0, 1, 1, '2018-08-16 07:00:00', '2018-08-17 13:40:42', NULL),
(3, 'General Science123', 46, '5minsmins', 0, 1, 1, '2018-08-17 11:49:17', '2018-08-17 17:07:48', '2018-08-17 17:07:48'),
(4, 'PSC Pakistan', 300, '30mins', 1, 1, 2, '2018-08-17 11:51:36', '2018-08-17 11:51:36', NULL),
(5, 'General Science', 20, '3hrs', 1, 0, 2, '2018-08-17 13:36:22', '2018-08-17 13:40:02', NULL),
(6, 'Hello', 29, '2mins', 1, 1, 1, '2018-08-17 17:08:08', '2018-08-17 17:41:53', '2018-08-17 17:41:53'),
(7, 'Hello Testing1', 24, '1hrsmins', 1, 1, 1, '2018-08-17 17:42:19', '2018-08-17 17:42:54', '2018-08-17 17:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questionair`
--
ALTER TABLE `questionair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionair_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questionair`
--
ALTER TABLE `questionair`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `questionair`
--
ALTER TABLE `questionair`
  ADD CONSTRAINT `questionair_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

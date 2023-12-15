-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 04:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_my_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `book_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(10, 2, 6, 4, 'completed', '2023-12-10 01:32:43', '2023-12-10 01:34:47'),
(11, 2, 5, 6, 'completed', '2023-12-10 01:33:10', '2023-12-10 01:35:28'),
(12, 3, 5, 1, 'completed', '2023-12-10 01:33:26', '2023-12-10 01:34:52'),
(13, 3, 7, 2, 'completed', '2023-12-10 01:33:57', '2023-12-10 01:34:52'),
(14, 2, 5, 2, 'completed', '2023-12-10 01:38:15', '2023-12-10 01:38:43'),
(15, 2, 5, 8, NULL, '2023-12-10 01:38:49', '2023-12-10 09:22:20'),
(17, 2, 6, 2, NULL, '2023-12-10 09:21:37', '2023-12-10 09:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'tamil', 'Tamil category Description', '1', '2023-12-06 11:28:54', '2023-12-06 11:28:54'),
(7, 'History', 'History Description', '1', '2023-12-06 11:29:53', '2023-12-06 11:29:53'),
(8, 'English', 'English category Description', '1', '2023-12-08 08:53:44', '2023-12-08 08:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `category_old`
--

CREATE TABLE `category_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_old`
--

INSERT INTO `category_old` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Tamil1', 'tamil category description', '1', '2023-12-06 01:13:07', '2023-12-06 09:41:31'),
(8, 'History', 'History Description', '1', '2023-12-06 01:14:01', '2023-12-06 01:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_01_102111_create_categories_table', 1),
(6, '2023_12_01_113549_create_category_table', 2),
(7, '2023_12_01_163553_create_products_table', 3),
(8, '2023_12_01_170227_create_category_table', 4),
(9, '2023_12_03_054849_create_users_table', 5),
(10, '2023_12_06_140442_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `created_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '100.00', '2023-12-06 14:16:20', 'completed', '2023-12-06 08:46:20', '2023-12-06 08:46:20'),
(2, 2, '100.00', '2023-12-06 14:17:43', 'completed', '2023-12-06 08:47:43', '2023-12-06 08:47:43'),
(3, 2, '100.00', '2023-12-06 14:19:04', 'completed', '2023-12-06 08:49:04', '2023-12-06 08:49:04'),
(4, 2, '100.00', '2023-12-06 14:20:09', 'completed', '2023-12-06 08:50:09', '2023-12-06 08:50:09'),
(5, 2, '100.00', '2023-12-06 14:20:23', 'completed', '2023-12-06 08:50:23', '2023-12-06 08:50:23'),
(6, 2, '100.00', '2023-12-06 14:22:43', 'completed', '2023-12-06 08:52:43', '2023-12-06 08:52:43'),
(7, 2, '100.00', '2023-12-06 14:23:03', 'completed', '2023-12-06 08:53:03', '2023-12-06 08:53:03'),
(8, 2, '100.00', '2023-12-06 14:24:19', 'completed', '2023-12-06 08:54:19', '2023-12-06 08:54:19'),
(9, 3, '1876.00', '2023-12-06 17:48:05', 'completed', '2023-12-06 12:18:05', '2023-12-06 12:18:05'),
(10, 3, '1876.00', '2023-12-06 17:48:30', 'completed', '2023-12-06 12:18:30', '2023-12-06 12:18:30'),
(11, 3, '1876.00', '2023-12-06 17:49:24', 'completed', '2023-12-06 12:19:24', '2023-12-06 12:19:24'),
(12, 3, '1876.00', '2023-12-06 17:50:32', 'completed', '2023-12-06 12:20:32', '2023-12-06 12:20:32'),
(13, 3, '1876.00', '2023-12-06 17:51:35', 'completed', '2023-12-06 12:21:35', '2023-12-06 12:21:35'),
(14, 3, '1876.00', '2023-12-06 17:52:11', 'completed', '2023-12-06 12:22:11', '2023-12-06 12:22:11'),
(15, 1, '1100.00', '2023-12-08 15:00:16', 'completed', '2023-12-08 09:30:16', '2023-12-08 09:30:16'),
(16, 1, '1100.00', '2023-12-08 15:02:53', 'completed', '2023-12-08 09:32:53', '2023-12-08 09:32:53'),
(17, 2, '1000.00', '2023-12-09 03:02:47', 'completed', '2023-12-08 21:32:47', '2023-12-08 21:32:47'),
(18, 2, '1000.00', '2023-12-09 03:10:26', 'completed', '2023-12-08 21:40:26', '2023-12-08 21:40:26'),
(19, 2, '1000.00', '2023-12-09 03:19:10', 'completed', '2023-12-08 21:49:10', '2023-12-08 21:49:10'),
(20, 2, '2576.00', '2023-12-09 03:23:43', 'completed', '2023-12-08 21:53:43', '2023-12-08 21:53:43'),
(21, 2, '2576.00', '2023-12-09 03:26:16', 'completed', '2023-12-08 21:56:16', '2023-12-08 21:56:16'),
(22, 2, '32200.00', '2023-12-10 07:04:47', 'completed', '2023-12-10 01:34:47', '2023-12-10 01:34:47'),
(23, 3, '1676.00', '2023-12-10 07:04:52', 'completed', '2023-12-10 01:34:52', '2023-12-10 01:34:52'),
(24, 2, '200.00', '2023-12-10 07:08:43', 'completed', '2023-12-10 01:38:43', '2023-12-10 01:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(5, 'Ramayanam', 100, 'Tamil category Description', '0', '2023-12-06 11:29:24', '2023-12-06 11:29:24', 6),
(6, 'Mahabharadham', 8000, 'Good story', '0', '2023-12-06 11:31:53', '2023-12-06 11:31:53', 6),
(7, 'Raja Raja Solan', 788, 'life story', '0', '2023-12-06 11:32:35', '2023-12-06 11:32:35', 7),
(8, 'Gandhi life version', 865, 'life story', '0', '2023-12-06 11:33:01', '2023-12-06 11:33:01', 7),
(9, 'Nehru life duties', 976, 'life story', '0', '2023-12-06 11:33:38', '2023-12-06 11:33:38', 7),
(10, 'Seetha Rama', 500, 'life story', '0', '2023-12-06 11:34:20', '2023-12-06 11:34:20', 7),
(11, 'English Version', 400, 'stories', '0', '2023-12-06 11:35:37', '2023-12-06 11:35:37', 7),
(12, 'Nenjukkul needhi', 200, 'tamil version', '0', '2023-12-06 11:37:01', '2023-12-06 11:37:01', 6),
(13, 'BOOK1', 100, 'TEST', '0', '2023-12-08 08:55:04', '2023-12-08 08:55:04', 8);

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE `products_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_old`
--

INSERT INTO `products_old` (`id`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(10, 'Ramayanam', 100, 'good', '1', '2023-12-06 01:17:47', '2023-12-06 01:17:47', 6),
(11, 'Mahabharadham', 200, 'good book', '1', '2023-12-06 01:18:19', '2023-12-06 01:18:19', 8),
(12, 'Raja Raja Solan', 100, 'Raja Raja Solan history', '1', '2023-12-06 08:31:25', '2023-12-06 08:31:25', 8),
(13, 'Ponnyin Selvan', 130, 'Ponnyin Selvan - Description', '1', '2023-12-06 08:32:44', '2023-12-06 08:32:44', 8),
(14, 'CT1', 150, 'CT -ECE Description', '1', '2023-12-06 09:41:16', '2023-12-06 09:52:29', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1-Admin, 0-Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `age`, `phone_no`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 21, '36542765', 'admin@gmail.com', '1', NULL, NULL),
(2, 'customer1', 'customer1@gmail.com', 25, '656757', 'customer1@gmail.com', '0', NULL, NULL),
(3, 'customer2', 'customer2@gmail.com', 25, '656757', 'customer2@gmail.com', '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_ibfk_1` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_old`
--
ALTER TABLE `category_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `products_old`
--
ALTER TABLE `products_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_old`
--
ALTER TABLE `category_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_old`
--
ALTER TABLE `products_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_old`
--
ALTER TABLE `products_old`
  ADD CONSTRAINT `fk_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `category_old` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

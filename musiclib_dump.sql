-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 12:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musiclib`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `release_year` int(11) DEFAULT NULL,
  `format` varchar(255) NOT NULL,
  `api_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shelf_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `release_year`, `format`, `api_id`, `created_at`, `updated_at`, `shelf_id`) VALUES
(5, 'In Utero', 'Nirvana', 1993, 'CD', 'd4e28bbc-5de9-47c1-918b-e7e7dd8871b5', '2025-05-07 14:29:51', '2025-05-07 14:29:51', 5),
(6, 'Birds in the Ground', 'Eiafuawn', 2006, 'CD', 'a93a93fa-f6f6-4f05-ac27-d6b37e73e3c4', '2025-05-07 14:45:04', '2025-05-07 14:45:04', 5),
(7, 'In Rainbows', 'Radiohead', 2007, '12\" Vinyl', 'a58f4eb2-9829-37d5-b46c-e8163038e0f5', '2025-05-07 14:45:47', '2025-05-07 14:45:47', 5),
(8, 'Nevermind', 'Nirvana', 1991, 'CD', 'a146429a-cedc-3ab0-9e41-1aaf5f6cdc2d', '2025-05-07 17:28:43', '2025-05-07 17:28:43', 5),
(9, 'Stratosphere', 'Duster', 2018, 'Digital Media', 'b66b2cf1-27dc-4a61-b11c-248fdbf98792', '2025-05-07 17:29:13', '2025-05-07 17:29:13', 5),
(10, 'Blonde', 'Frank Ocean', 2016, 'CD', '08f54f68-7c89-4e22-8a0f-ac2b06e48568', '2025-05-07 18:35:39', '2025-05-07 18:35:39', 6),
(11, 'IGOR', 'Tyler, The Creator', 2019, 'Digital Media', '4603cee3-ece6-435c-b0b7-7d9eb1842d36', '2025-05-07 18:35:59', '2025-05-07 18:35:59', 6),
(12, 'Run Come Save Me', 'Roots Manuva', 2001, 'CD', '4b3b5c57-8665-45f7-8592-b8f2a251a2e8', '2025-05-07 18:36:25', '2025-05-07 18:36:25', 6),
(14, 'SMITHEREENS', 'Joji', NULL, 'Digital Media', '31ced3da-acb5-4dcd-b3df-1a7319470a63', '2025-05-07 18:45:13', '2025-05-07 18:45:13', 6),
(15, 'BALLADS 1', 'Joji', 2018, '12\" Vinyl', '8137ca0f-123a-4800-8b28-f1f3be6c938d', '2025-05-07 18:45:27', '2025-05-07 18:45:27', 6),
(16, 'Yuck', 'Yuck', 2011, 'CD', 'a3782d43-ba1c-4e66-9369-3b1bfac81b19', '2025-05-07 18:46:05', '2025-05-07 18:46:05', 7),
(17, 'Dark Side of the Moon', 'Pink Floyd', 1984, 'CD', 'e1464abb-80ee-402f-9c49-aed3f73003f0', '2025-05-07 18:46:33', '2025-05-07 18:46:33', 7),
(18, 'The Colour and the Shape', 'Foo Fighters', 1997, 'CD', '8576680b-9baf-48c0-8b65-1122c0d30ab2', '2025-05-07 18:47:08', '2025-05-07 18:47:08', 7),
(19, 'Toxicity', 'System of a Down', 2001, 'CD', '78ff4b12-2fa5-4d62-a33c-a6003b1377d3', '2025-05-07 18:47:50', '2025-05-07 18:47:50', 7),
(20, 'Siamese Dream', 'The Smashing Pumpkins', 1993, '12\" Vinyl', '22e5b621-7b7c-4168-a536-3090b79c17b6', '2025-05-07 18:48:14', '2025-05-07 18:48:14', 7),
(21, 'Endtroducing.....', 'DJ Shadow', 1996, '12\" Vinyl', '76bd6217-5f4a-4402-ab0d-9e859b2efdb6', '2025-05-07 20:34:19', '2025-05-07 20:34:19', 8),
(23, 'Dummy', 'Portishead', 1994, 'CD', 'f88d6d9b-9664-4c54-887c-2bd83248bc2c', '2025-05-07 20:38:10', '2025-05-07 20:38:10', 8),
(24, 'Homework', 'Daft Punk', 2004, 'CD', 'db85b4cf-3554-46f6-9771-e3c281bf4b4c', '2025-05-07 20:39:49', '2025-05-07 20:39:49', 8),
(25, 'Wolf', 'Tyler, The Creator', 2013, 'Digital Media', 'f13c3d03-2c13-4772-aa4f-3bf536e44649', '2025-05-07 20:40:20', '2025-05-07 20:40:20', 8),
(26, 'Selected Ambient Works 85–92', 'Aphex Twin', 2013, '12\" Vinyl', '1e0f2bf5-25b3-4c77-924b-fe5728f88161', '2025-05-07 20:41:02', '2025-05-07 20:41:02', 8),
(27, 'Kill ’Em All', 'Metallica', 1987, '12\" Vinyl', 'f65a601a-2559-419e-92b4-f7a317af45d9', '2025-05-07 20:42:32', '2025-05-07 20:42:32', 9),
(28, 'Ride the Lightning', 'Metallica', 1984, '12\" Vinyl', 'e673ffc2-2321-450f-9fda-9c1b9f9be573', '2025-05-07 20:42:50', '2025-05-07 20:42:50', 9),
(29, 'Metallica', 'Metallica', 2008, '12\" Vinyl', '8e32b21d-8312-4aa5-bb4a-fa99a4f47c02', '2025-05-07 20:43:25', '2025-05-07 20:43:25', 9),
(30, 'Master of Puppets', 'Metallica', 1986, '12\" Vinyl', '03e4ebe1-0a44-411c-8e19-78e0768603f8', '2025-05-07 20:43:41', '2025-05-07 20:43:41', 9),
(31, '…And Justice for All', 'Metallica', 1988, '12\" Vinyl', '3ef952d9-4de5-474b-9d3e-f4941b4fec2d', '2025-05-07 20:44:06', '2025-05-07 20:44:06', 9),
(32, 'System of a Down', 'System of a Down', 1998, 'CD', '18c3c5fd-06be-414b-a769-c7ed3539c7a0', '2025-05-07 20:45:04', '2025-05-07 20:45:04', 10),
(33, 'Around the Fur', 'Deftones', 1997, 'CD', '5d71d0f7-b47b-4795-a52c-e38f0a5dfd93', '2025-05-07 20:45:28', '2025-05-07 20:45:28', 10),
(34, 'I Let It in and It Took Everything', 'Loathe', 2020, 'CD', '0e038f39-8eae-4088-8340-e42e2fd831f1', '2025-05-07 20:45:52', '2025-05-07 20:45:52', 10),
(35, 'Slipknot', 'Slipknot', 1999, 'CD', 'fb8a6511-0c54-48a8-a3c5-d79f198eb6b8', '2025-05-07 20:46:40', '2025-05-07 20:46:40', 10),
(36, 'Jar of Flies', 'Alice in Chains', 1994, 'CD', '4fb8319e-cdba-4948-a8a0-b316995a2094', '2025-05-07 20:47:01', '2025-05-07 20:47:01', 10);

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
(5, '2025_05_06_173006_create_albums_table', 1),
(6, '2025_05_06_200615_create_shelves_table', 2),
(7, '2025_05_06_210409_create_shelves_table', 3),
(8, '2025_05_06_211235_add_shelf_id_to_albums_table', 4),
(9, '2025_05_07_151649_add_api_id_to_albums_table', 5),
(10, '2025_05_07_194151_make_release_year_nullable_in_albums_table', 6);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelves`
--

CREATE TABLE `shelves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelves`
--

INSERT INTO `shelves` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 9, 'My Rock Shelf', '2025-05-07 13:32:18', '2025-05-07 18:15:10'),
(6, 10, 'Vinyl Collection', '2025-05-07 18:22:27', '2025-05-07 18:29:00'),
(7, 10, 'CD Collection', '2025-05-07 18:45:43', '2025-05-07 18:45:43'),
(8, 11, 'Legendary DJ\'s', '2025-05-07 20:33:00', '2025-05-07 20:33:20'),
(9, 12, 'Metallica Collection', '2025-05-07 20:41:52', '2025-05-07 20:41:58'),
(10, 12, 'Nu Metal Collection', '2025-05-07 20:44:20', '2025-05-07 20:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Pooky', 'pooky@pook.ie', NULL, '$2y$10$d9UPkDU9RM94FQ2ZImdNiOL/o5MWgFDnaK./SOMwuCqCFhNmgo3ZK', 'P2sqv2QZOriYZOVk33aJWE0zgMsORlgrR2CY9sCoBsSEUDyVKV9BJW1QF6yK', '2025-05-07 13:32:18', '2025-05-07 13:32:18'),
(10, 'Zluniess', 'zluniess@gmail.com', NULL, '$2y$10$fdyzZ2wpzoJmB8pS3AXCFe/wWCMVy0IBawy3MJuLn.9BtrxkSL5mu', NULL, '2025-05-07 18:22:27', '2025-05-07 18:22:27'),
(11, 'DjFluffy', 'djfluffy@gmail.com', NULL, '$2y$10$A7LxCsueOcZwvjwsDvTyVuYQeAYQgl/XbskxvkE1xasU7yilm1bjm', NULL, '2025-05-07 20:33:00', '2025-05-07 20:33:00'),
(12, 'MetalFan42', 'metalfan42@gmail.com', NULL, '$2y$10$Ru0P1cr9yS2Y0JuxjLP.WOZcsrdkie5AXxHPr3rPvUK/NntNcGtdq', NULL, '2025-05-07 20:41:52', '2025-05-07 20:41:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_shelf_id_foreign` (`shelf_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shelves`
--
ALTER TABLE `shelves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shelves_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelves`
--
ALTER TABLE `shelves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_shelf_id_foreign` FOREIGN KEY (`shelf_id`) REFERENCES `shelves` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shelves`
--
ALTER TABLE `shelves`
  ADD CONSTRAINT `shelves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

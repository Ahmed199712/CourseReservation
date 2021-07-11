-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 08:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalcoursecenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/avatars/admin/default.png',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role`, `avatar`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Developer', 0, 'uploads/avatars/admin/lUaPk5fprQPIylD13s5HmZKhUMFVxCJg0mhFob08.jpeg', '01096217092', 'admin@gmail.com', NULL, '$2y$10$nt7lf5.G2TzcPgL6FO0KP.erxKIDnrAI6CSzUfjsp8IWOYzub6OxS', 'eGSu4QgFwz1vzErFBLi5eV0TvEbu272uUYMFP1PbrO8ODgTgzXIDlPH5sULs', '2019-12-31 23:50:08', '2019-12-31 23:55:47'),
(2, 'Admin Test', 1, 'uploads/avatars/admin/default.png', '01012454545445', 'test@gmail.com', NULL, '$2y$10$c4J4ZdUNdbFkWSlzr//SR.BxwU5DlMWfkucNjg2hnFRqsIeetgyra', NULL, '2020-01-01 02:24:12', '2020-01-01 02:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2019-12-31 23:57:52', '2019-12-31 23:57:52'),
(2, 'Networking', '2020-01-01 02:43:17', '2020-01-01 02:43:17'),
(3, 'Languages', '2020-01-01 02:43:23', '2020-01-01 02:43:23'),
(4, 'Commerce', '2020-01-01 02:43:28', '2020-01-01 02:43:28'),
(5, 'Sports', '2020-01-01 02:43:38', '2020-01-01 02:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `number`, `name`, `floor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Class A', 1, '2019-12-31 23:57:46', '2019-12-31 23:57:46'),
(2, 2, 'Class B', 1, '2020-01-01 02:44:22', '2020-01-01 02:44:22'),
(3, 3, 'Class C', 2, '2020-01-01 02:44:31', '2020-01-01 02:44:31'),
(4, 4, 'Class D', 2, '2020-01-01 02:44:43', '2020-01-01 02:44:43'),
(5, 5, 'Class E', 3, '2020-01-01 02:44:57', '2020-01-01 02:44:57'),
(6, 6, 'Class F', 3, '2020-01-01 02:45:09', '2020-01-01 02:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `approve`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Welcome', 0, 1, 1, '2019-12-31 23:58:38', '2019-12-31 23:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/courses/default.png',
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `hours` int(11) NOT NULL,
  `requirements` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `desc`, `image`, `price`, `discount`, `hours`, `requirements`, `status`, `active`, `category_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'Php/Laravel For Beginners', 'Php/Laravel For Beginners Php/Laravel For Beginners Php/Laravel For BeginnersPhp/Laravel For Beginners', 'uploads/courses/YhOWwmBVDvURc69v5HJicYqdxQaY9qkcY8RJKYFH.png', '1500.00', '100.00', 100, 'php basics', 0, 0, 1, 1, '2019-12-31 23:58:21', '2019-12-31 23:58:21'),
(2, 'C# For Beginners', 'C# For Beginners C# For Beginners C# For Beginners C# For Beginners C# For Beginners', 'uploads/courses/WcZ0CoghXUUl7Q8TMHhv8xA49BvjlH3BSbFEORfw.jpeg', '1500.00', '100.00', 120, 'no requirements', 0, 0, 1, 2, '2020-01-01 02:46:18', '2020-01-01 02:46:18'),
(3, 'CCNA For Beginners', 'CCNA For Beginners CCNA For Beginners CCNA For Beginners CCNA For Beginners CCNA For Beginners', 'uploads/courses/MvMDBLKeWFHi2aIQdS8ToCZ78HqWHq4RDWqEwA8M.jpeg', '2500.00', '100.00', 150, 'no requirements', 0, 0, 2, 3, '2020-01-01 02:46:58', '2020-01-01 02:46:58'),
(4, 'CCNP For Beginners', 'CCNP For Beginners CCNP For Beginners CCNP For Beginners CCNP For BeginnersCCNP For Beginners', 'uploads/courses/oxsAVW2BfyHaC0lp4CauDbnvSii7qHMZrANPtXUB.jpeg', '2800.00', '200.00', 150, 'CCNA Course', 0, 0, 2, 3, '2020-01-01 02:47:34', '2020-01-01 02:47:34'),
(5, 'American English For Beginners', 'American English For Beginners American English For Beginners American English For Beginners American English For Beginners', 'uploads/courses/vwwipvyaOmbPub5toAhajROYyFuMVKasWVxt3m0A.jpeg', '3000.00', '100.00', 200, 'no requirements', 0, 0, 3, 4, '2020-01-01 02:48:22', '2020-01-01 02:48:22'),
(6, 'American English For Intermidete', 'American English For Intermidete American English For Intermidete American English For Intermidete American English For Intermidete', 'uploads/courses/IgyvIpSXBTh48NfAMLXscc0SXSxMHkCYekZ0KKIh.jpeg', '3500.00', '100.00', 250, 'American English Course For Beginners', 0, 0, 3, 4, '2020-01-01 02:49:14', '2020-01-01 02:49:14'),
(7, 'Accounting For Beginners', 'Accounting For Beginners Accounting For Beginners Accounting For BeginnersAccounting For BeginnersAccounting For Beginners', 'uploads/courses/9ryfmaW1FYXnGFLi114H6JS91mAk1DwIUesPv8zf.jpeg', '2500.00', '200.00', 120, 'Basics Of Math', 0, 0, 4, 5, '2020-01-01 02:50:10', '2020-01-01 02:50:10'),
(8, 'Advanced Accounting Course', 'Advanced Accounting Course Advanced Accounting Course Advanced Accounting Course Advanced Accounting Course', 'uploads/courses/N6YHW4Ql6jbUHTwXIdnjz6fute3CmGaedOSg2yjy.jpeg', '4500.00', '200.00', 130, 'Accounting For Beginners', 0, 0, 4, 5, '2020-01-01 02:51:07', '2020-01-01 02:51:07'),
(9, 'Fitness For Beginners', 'Fitness For Beginners Fitness For Beginners Fitness For Beginners Fitness For Beginners Fitness For Beginners', 'uploads/courses/ZQ37f0vTiMhNVPmVEQEu8YoLLOpPQpB2Y9L61TCH.jpeg', '650.00', '50.00', 50, 'no requirements', 0, 0, 5, 6, '2020-01-01 02:52:06', '2020-01-01 02:52:06'),
(10, 'C++ For Beginners', 'C++ For Beginners C++ For Beginners C++ For Beginners C++ For Beginners C++ For Beginners C++ For Beginners C++ For Beginners', 'uploads/courses/1PE7aO31UB7x6rmUyS1B163KJFZxEOf74zr2gobl.png', '1000.00', '200.00', 50, 'no requirements', 0, 0, 1, 1, '2020-01-01 02:54:44', '2020-01-01 02:54:44'),
(11, 'Network Security For Beginners', 'Network Security For Beginners Network Security For Beginners Network Security For Beginners Network Security For Beginners Network Security For Beginners', 'uploads/courses/Jbuy2eVP0Y1aed2vBVsyjqXtlYGKXP54Cm5sLYFu.jpeg', '4500.00', '250.00', 150, 'Basics of networking', 0, 0, 2, 3, '2020-01-01 02:56:01', '2020-01-01 02:56:01'),
(12, 'Ethical Hacking Course', 'Ethical Hacking Course Ethical Hacking Course Ethical Hacking CourseEthical Hacking Course', 'uploads/courses/Vo9xfjaBoJZsuV9agp2tt45mlT42eA0Ak0wGLPT6.jpeg', '6000.00', '200.00', 120, 'CCNA Course', 0, 0, 2, 3, '2020-01-01 02:57:32', '2020-01-01 02:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `number`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Floor1', '2019-12-31 23:57:39', '2019-12-31 23:57:39'),
(2, 2, 'Floor2', '2020-01-01 02:43:52', '2020-01-01 02:43:52'),
(3, 3, 'Floor3', '2020-01-01 02:43:58', '2020-01-01 02:43:58'),
(4, 4, 'Floor4', '2020-01-01 02:44:04', '2020-01-01 02:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_16_120201_create_admins_table', 1),
(4, '2019_12_16_192240_create_categories_table', 1),
(5, '2019_12_17_195114_create_floors_table', 1),
(6, '2019_12_18_162956_create_classes_table', 1),
(7, '2019_12_18_215153_create_courses_table', 1),
(8, '2019_12_22_112014_create_comments_table', 1),
(9, '2019_12_23_133104_create_messages_table', 1),
(10, '2019_12_24_231740_create_settings_table', 1),
(11, '2019_12_25_150356_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmed@gmail.com', '$2y$10$z4bvBskK94VzCOLE5NxkbOpJeMAUQ6vHO9vTV5gVakInNen0VsOay', '2020-01-01 02:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `register_course` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/settings/default.png',
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stop_comments` int(11) NOT NULL DEFAULT '0',
  `stop_register` int(11) NOT NULL DEFAULT '0',
  `stop_website` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_logo`, `website_name`, `website_email`, `website_address`, `website_phone`, `website_desc`, `stop_comments`, `stop_register`, `stop_website`, `created_at`, `updated_at`) VALUES
(1, 'uploads/settings/default.png', 'CourseCenter', 'coursecenter@gmail.com', 'El Mohandeseen , Cairo , Egypt', '01045879654', 'Welcome To Course Center Your Way To Learn Perfect', 0, 0, 0, '2019-12-31 23:50:08', '2019-12-31 23:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/students/default.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_course` int(11) NOT NULL DEFAULT '0',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `phone`, `register_course`, `address`, `type`, `age`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'uploads/students/mi9bRVF6FRej4DKfqTILgXbD6XSL0vjwxdhAMv0g.jpeg', 'ahmed@gmail.com', NULL, '$2y$10$ClKCxDZEj5jAQAluXwFpDeYr0InOFesNeMCplGCwo73bKiAW/Udey', '0104578541254', 0, 'Cairo , Egypt', 0, 25, 0, 'FLh4CUj79wOwHJIgGIASdiRDLrWbxxQShr0s7CTzTj41WvbXGQxLT7aXudhM', '2019-12-31 23:56:53', '2020-01-01 03:01:41'),
(5, '7oda Gamer', 'uploads/students/default.png', '7oda@gmail.com', NULL, '$2y$10$Phryce7DxIDLUznRF4cD9eLbrg5bMPE0FWAvzIw8ZB/SRSWSqfbhq', '010124578954', 0, 'Cairo , Egypt', 0, 25, 0, NULL, '2020-01-01 02:58:23', '2020-01-01 02:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_floor_id_foreign` (`floor_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_class_id_foreign` (`class_id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_course_id_foreign` (`course_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

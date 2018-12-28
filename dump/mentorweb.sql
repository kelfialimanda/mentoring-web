-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 04:01 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentorweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `difficulties`
--

INSERT INTO `difficulties` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Easy', 'green', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(2, 'Medium', 'yellow', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(3, 'Hard', 'red', '2018-12-28 02:42:21', '2018-12-28 02:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '31', 'Sistem Informasi', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(2, '51', 'Manajemen', '2018-12-28 05:50:30', '2018-12-28 05:50:30');

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
(61, '2014_10_11_000000_create_roles_table', 1),
(62, '2014_10_12_000000_create_users_table', 1),
(63, '2014_10_12_100000_create_password_resets_table', 1),
(64, '2018_12_28_061956_create_majors_table', 1),
(65, '2018_12_28_070624_create_targets_table', 1),
(66, '2018_12_28_072830_create_difficulties_table', 1),
(67, '2018_12_28_083620_create_schedules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(2, 'mentor', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(3, 'student', '2018-12-28 02:42:21', '2018-12-28 02:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `major_id` int(10) UNSIGNED NOT NULL,
  `difficulty_id` int(10) UNSIGNED NOT NULL,
  `target_id` int(10) UNSIGNED NOT NULL,
  `mentor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `subtitle`, `start_date`, `end_date`, `description`, `status`, `major_id`, `difficulty_id`, `target_id`, `mentor_id`, `created_at`, `updated_at`) VALUES
(1, 'Mentoring C#', 'C# for beginner', '2018-12-31 14:00:00', '2019-01-01 14:00:00', 'Here we can learn a lot of basic function of c# start from windows form, so come along!', 0, 1, 1, 1, 2, NULL, NULL),
(2, 'Full stack mentoring', 'Laravel', '2019-02-04 15:00:00', '2019-02-04 19:00:00', 'In this mentoring we will learn how to create a web application using laravel 5.7, so prepare yourself, and come along!', 1, 1, 3, 3, 3, NULL, NULL),
(3, 'Title1', 'subtitle', '2018-12-29 00:00:00', '2018-12-31 00:00:00', 'Description', 0, 1, 1, 1, 3, '2018-12-28 06:15:22', '2018-12-28 06:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(2, '2nd Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(3, '3rd Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(4, '4th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(5, '5th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(6, '6th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(7, '7th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(8, '8th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(9, '9th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(10, '10th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(11, '11th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(12, '12th Semester', '2018-12-28 02:42:21', '2018-12-28 02:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `npm`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'admin', 'admin@admin.com', NULL, '$2y$10$rQqDV4Jkx1IxAJ3v1hxO/eaezXNhxMow3VRJDFmDokQz.VPy6QqUq', 1, 'ciqcTtGAaeCwncWrlPJ6UYwTjd5ZhKMfiuFHdu6KNyLh9pqgHbt7OdCGXfcu', '2018-12-28 02:42:21', '2018-12-28 02:42:21'),
(2, NULL, 'Derick', 'derick.tan988@gmail.com', NULL, '$2y$10$5bJ5j6/81l0pfCo/0Ytmeu/DS5Ydg/aPTMbhRIToy7ZYc67YiIUEW', 2, NULL, '2018-12-28 03:25:43', '2018-12-28 03:25:43'),
(3, NULL, 'Mentor 1', 'mentor1@mentor.com', NULL, '$2y$10$mENrdyrbazfRsx29v48LfuRslxV.92Y1zE6gKBGGANjdQMH93Om4m', 2, 'TNDiW3IQg0LnpeyusKMwGxdwxTx14bdgaxFCbGhnBCVSydfmTekeGaSvCxtu', '2018-12-28 03:36:48', '2018-12-28 03:36:48'),
(4, '1731032', 'student', 'student1@student.com', NULL, '$2y$10$kdoFb36xaQb.Kv3VhL603OpKfrCKzGi.PlaqvhJbnAdtkfEbLZiSy', 3, '6XtwQdyQOdE1qg7gycUGPNp5BMDu9uW9kHaY8kE8j6xWnLMO9QwUoBukYaSO', '2018-12-28 05:47:11', '2018-12-28 05:47:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_major_id_foreign` (`major_id`),
  ADD KEY `schedules_difficulty_id_foreign` (`difficulty_id`),
  ADD KEY `schedules_target_id_foreign` (`target_id`),
  ADD KEY `schedules_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_difficulty_id_foreign` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulties` (`id`),
  ADD CONSTRAINT `schedules_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`),
  ADD CONSTRAINT `schedules_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `schedules_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `targets` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

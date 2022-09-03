-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 10:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2022-09-15 20:37:39', NULL),
(7, 'HaiZuka', '1234564411144', '2022-08-31 23:01:36', '2022-08-31 23:05:53'),
(8, 'User', '123456', '2022-08-31 23:01:45', '2022-08-31 23:07:35'),
(9, 'PhanHai', '12345644111', '2022-08-31 23:01:56', '2022-08-31 23:01:56'),
(10, 'HaiZuka45435', '12345644111', '2022-08-31 23:05:47', '2022-08-31 23:05:47'),
(11, 'phanduchai', '123456', '2022-08-31 23:17:27', '2022-08-31 23:17:27'),
(12, 'PhanVietLong', '123456', '2022-09-01 00:51:45', '2022-09-01 00:51:45'),
(14, 'PhanVietLong3', '123456', '2022-09-01 00:52:05', '2022-09-01 00:52:05'),
(15, 'PhanVietLong4', '123456', '2022-09-01 00:52:10', '2022-09-01 00:52:10'),
(16, 'PhanVietLong5', '123456', '2022-09-01 00:52:30', '2022-09-01 00:52:30'),
(17, 'PhanVietLong7', '123456', '2022-09-01 00:52:41', '2022-09-01 00:52:41'),
(18, 'PhanVietLong8', '123456', '2022-09-01 00:52:50', '2022-09-01 00:52:50'),
(19, 'user1', '111111', '2022-09-01 10:05:46', '2022-09-01 20:48:29'),
(20, 'user2', '111111', '2022-09-01 10:05:51', '2022-09-01 10:05:51'),
(21, 'tester', '111111', '2022-09-02 01:02:23', '2022-09-01 20:20:19'),
(22, '1', '111111', '2022-09-02 01:13:00', '2022-09-02 01:13:00'),
(23, 'haha', '111111', '2022-09-02 11:42:57', '2022-09-01 20:54:56'),
(24, 'hahaha', '111111', '2022-09-02 11:44:04', '2022-09-01 18:57:37'),
(26, 'hahahaha', '123456', '2022-09-02 11:46:30', '2022-09-02 11:46:30'),
(27, 'huhu', '111111', '2022-09-02 11:50:52', '2022-09-01 19:13:20'),
(28, 'NamNam', '1222222', '2022-09-01 17:59:17', '2022-09-01 17:59:17'),
(29, 'u1', '111111', '2022-09-03 17:15:29', '2022-09-03 17:15:29'),
(30, 'u2', '111111', '2022-09-03 17:15:35', '2022-09-03 17:15:35'),
(31, 'u3', '111111', '2022-09-03 17:15:41', '2022-09-03 17:15:41');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_26_183029_create_accounts_table', 1),
(3, '2022_08_31_175726_create_roles_table', 1),
(4, '2022_08_31_210417_create_role_accounts_table', 1),
(5, '2022_09_02_162817_create_status_staff_table', 1),
(6, '2022_09_02_163048_create_status_request_staff_table', 1),
(10, '2014_10_12_000000_create_users_table', 2),
(12, '2022_09_02_163126_create_staff_table', 3),
(14, '2022_09_02_163114_create_request_staff_table', 4),
(16, '2022_09_04_003150_create_ranks_table', 5),
(17, '2022_09_05_140420_create_sub_ranks_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `rank_name`, `url_image`, `created_at`, `updated_at`) VALUES
(5, 'Đồng', 'images/bYqMKWFuYiUArFToDMgPaIvNbwZC0Dd6bEfCujFN.png', '2022-09-03 20:06:30', '2022-09-03 20:06:30'),
(6, 'Bạc', 'images/hJKuUJhSci9BpLKoDBNRkc7FQr7Svdju0QWqUOFY.png', '2022-09-03 20:06:43', '2022-09-03 20:06:43'),
(7, 'Vàng', 'images/Toj5ZGkfDqIaq0fCkC33dYsjeXshnlK9SFjhWN2H.png', '2022-09-03 20:06:57', '2022-09-03 20:06:57'),
(8, 'Bạch Kim', 'images/JQm84ken3h7Dk9aJWstdJfxGH1a1x9VNyhFnoW80.png', '2022-09-03 20:07:12', '2022-09-03 20:07:12'),
(9, 'Kim Cương', 'images/xtZ5EZdtdVnv0Voa9rmVvICFj63XSZFCjNH9tpte.png', '2022-09-03 20:07:26', '2022-09-03 20:07:26'),
(10, 'Tinh Anh', 'images/evj70l2F8kkRxlRCj3egC4E8a1TkMVoQb8h4fZXA.png', '2022-09-03 20:07:39', '2022-09-03 20:07:39'),
(11, 'Cao Thủ', 'images/yFrNHWstENizhfHKeyAvoinHvlp0HNw7trVw4jLj.png', '2022-09-03 20:07:50', '2022-09-03 20:07:50'),
(12, 'Chiến Tướng - Thách Đấu', 'images/Q9Hm4uDuKjnjs0vy84SF2fj1HwjDxS8WG3hMFEvU.png', '2022-09-03 20:08:13', '2022-09-03 20:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `request_staff`
--

CREATE TABLE `request_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_staff`
--

INSERT INTO `request_staff` (`id`, `account_id`, `fullname`, `birthday`, `status_id`, `link_facebook`, `message`, `created_at`, `updated_at`) VALUES
(6, 19, 'Phan Đức Huy', '2000-12-27 00:00:00', 2, '12321', '123213', '2022-09-03 17:08:25', '2022-09-03 17:12:31'),
(7, 29, 'Nguyễn Văn Anh', '2000-03-22 00:00:00', 2, '213213', '123123', '2022-09-03 17:16:11', '2022-09-03 17:18:06'),
(8, 30, 'Cày thuê top 1', '2022-12-01 00:00:00', 2, '123', '2321', '2022-09-03 17:16:53', '2022-09-03 17:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `color`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Người quản trị', 'danger', '2022-08-21 11:39:38', '2022-08-26 04:16:31'),
(2, 'staff', 'Nhân viên', 'info', '2022-08-31 06:49:41', '2022-09-01 09:56:44'),
(3, 'user', 'Người dùng', 'success', '2022-08-26 00:24:55', '2022-08-26 04:16:31'),
(4, 'hacker', 'Đây là mô tả', 'dark', '2022-09-01 09:02:49', '2022-09-01 09:56:51'),
(8, 'ban', 'Đây là mô tả', 'warning', '2022-09-02 00:23:54', '2022-09-02 00:26:01'),
(9, 'nam', 'Đây là mô tả', 'dark', '2022-09-02 15:23:51', '2022-09-02 15:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_accounts`
--

CREATE TABLE `role_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_accounts`
--

INSERT INTO `role_accounts` (`id`, `id_account`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-09-08 20:38:01', NULL),
(3, 1, 3, NULL, NULL),
(10, 7, 3, '2022-08-31 23:01:36', '2022-08-31 23:01:36'),
(11, 8, 3, '2022-08-31 23:01:45', '2022-08-31 23:01:45'),
(12, 9, 3, '2022-08-31 23:01:56', '2022-08-31 23:01:56'),
(14, 11, 3, '2022-08-31 23:17:27', '2022-08-31 23:17:27'),
(19, 10, 3, '2022-08-31 23:51:28', '2022-08-31 23:51:28'),
(20, 7, 1, '2022-08-31 23:56:39', '2022-08-31 23:56:39'),
(21, 12, 3, '2022-09-01 00:51:45', '2022-09-01 00:51:45'),
(23, 14, 3, '2022-09-01 00:52:05', '2022-09-01 00:52:05'),
(24, 15, 3, '2022-09-01 00:52:10', '2022-09-01 00:52:10'),
(25, 16, 3, '2022-09-01 00:52:30', '2022-09-01 00:52:30'),
(26, 17, 3, '2022-09-01 00:52:41', '2022-09-01 00:52:41'),
(27, 18, 3, '2022-09-01 00:52:50', '2022-09-01 00:52:50'),
(29, 1, 2, '2022-09-01 01:01:06', '2022-09-01 01:01:06'),
(31, 1, 4, '2022-09-01 09:16:13', '2022-09-01 09:16:13'),
(33, 11, 4, '2022-09-01 09:17:07', '2022-09-01 09:17:07'),
(34, 16, 4, '2022-09-01 09:17:11', '2022-09-01 09:17:11'),
(35, 12, 4, '2022-09-01 09:17:15', '2022-09-01 09:17:15'),
(36, 10, 4, '2022-09-01 09:21:49', '2022-09-01 09:21:49'),
(37, 19, 3, '2022-09-01 10:05:46', '2022-09-01 10:05:46'),
(38, 20, 3, '2022-09-01 10:05:51', '2022-09-01 10:05:51'),
(40, 9, 8, '2022-09-02 00:26:16', '2022-09-02 00:26:16'),
(41, 21, 3, '2022-09-02 01:02:23', '2022-09-02 01:02:23'),
(43, 22, 3, '2022-09-02 01:13:00', '2022-09-02 01:13:00'),
(44, 22, 4, '2022-09-02 03:13:48', '2022-09-02 03:13:48'),
(45, 7, 4, '2022-09-02 03:13:50', '2022-09-02 03:13:50'),
(46, 9, 4, '2022-09-02 03:13:51', '2022-09-02 03:13:51'),
(47, 14, 4, '2022-09-02 03:13:53', '2022-09-02 03:13:53'),
(48, 15, 4, '2022-09-02 03:13:55', '2022-09-02 03:13:55'),
(49, 20, 4, '2022-09-02 03:13:59', '2022-09-02 03:13:59'),
(50, 19, 4, '2022-09-02 03:14:03', '2022-09-02 03:14:03'),
(51, 17, 4, '2022-09-02 03:14:07', '2022-09-02 03:14:07'),
(52, 18, 4, '2022-09-02 03:14:09', '2022-09-02 03:14:09'),
(53, 21, 4, '2022-09-02 03:14:10', '2022-09-02 03:14:10'),
(55, 8, 4, '2022-09-02 03:16:16', '2022-09-02 03:16:16'),
(56, 24, 3, '2022-09-02 11:44:04', '2022-09-02 11:44:04'),
(58, 26, 3, '2022-09-02 11:46:30', '2022-09-02 11:46:30'),
(59, 27, 3, '2022-09-02 11:50:52', '2022-09-02 11:50:52'),
(61, 28, 3, '2022-09-01 17:59:17', '2022-09-01 17:59:17'),
(62, 24, 1, '2022-09-01 18:58:25', '2022-09-01 18:58:25'),
(64, 19, 2, '2022-09-03 17:12:31', '2022-09-03 17:12:31'),
(65, 29, 3, '2022-09-03 17:15:29', '2022-09-03 17:15:29'),
(66, 30, 3, '2022-09-03 17:15:35', '2022-09-03 17:15:35'),
(67, 31, 3, '2022-09-03 17:15:41', '2022-09-03 17:15:41'),
(68, 30, 2, '2022-09-03 17:18:04', '2022-09-03 17:18:04'),
(69, 29, 2, '2022-09-03 17:18:06', '2022-09-03 17:18:06'),
(70, 23, 3, '2022-09-03 17:23:20', '2022-09-03 17:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `account_id`, `fullname`, `birthday`, `status_id`, `link_facebook`, `created_at`, `updated_at`) VALUES
(3, 19, 'Phan Đức Huy', '2000-12-27 00:00:00', 1, '12321', '2022-09-03 17:12:31', '2022-09-03 17:12:31'),
(4, 30, 'Cày thuê top 1', '2022-12-01 00:00:00', 1, '123', '2022-09-03 17:18:04', '2022-09-03 17:18:04'),
(5, 29, 'Nguyễn Văn Anh', '2000-03-22 00:00:00', 1, '213213', '2022-09-03 17:18:06', '2022-09-03 17:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_request_staff`
--

CREATE TABLE `status_request_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_request_staff`
--

INSERT INTO `status_request_staff` (`id`, `status_name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Đang chờ', 'warning', NULL, NULL),
(2, 'Chấp nhận', 'success', NULL, NULL),
(3, 'Huỷ', 'danger', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_staff`
--

CREATE TABLE `status_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_staff`
--

INSERT INTO `status_staff` (`id`, `status_name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Hoạt động', 'success', NULL, NULL),
(2, 'Khoá', 'danger', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_ranks`
--

CREATE TABLE `sub_ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_rank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `star` int(10) NOT NULL,
  `value` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_ranks`
--

INSERT INTO `sub_ranks` (`id`, `sub_rank_name`, `rank_id`, `price`, `star`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Đồng III', 5, 10000, 3, 1, NULL, NULL),
(2, 'Đồng II', 5, 10000, 3, 2, NULL, NULL),
(7, 'Đồng I', 5, 10000, 3, 3, '2022-09-05 08:38:13', '2022-09-05 08:38:13'),
(9, 'Bạc III', 6, 15000, 4, 4, '2022-09-05 08:39:26', '2022-09-05 08:39:26'),
(12, 'Vàng III', 7, 15000, 4, 8, '2022-09-05 08:42:07', '2022-09-05 08:42:07'),
(13, 'Vàng II', 7, 20000, 4, 9, '2022-09-05 08:43:52', '2022-09-05 08:43:52'),
(14, 'Vàng I', 7, 20000, 5, 10, '2022-09-05 08:44:06', '2022-09-05 08:44:06'),
(15, 'Bạc II', 6, 13000, 5, 5, '2022-09-05 08:44:35', '2022-09-05 08:44:35'),
(16, 'Bạc I', 6, 15000, 5, 6, '2022-09-05 08:44:57', '2022-09-05 08:44:57'),
(18, 'Bạch Kim V', 8, 20000, 5, 11, '2022-09-05 08:53:09', '2022-09-05 08:53:09'),
(19, 'Vàng IV', 7, 15000, 5, 7, '2022-09-05 08:55:34', '2022-09-05 08:55:34'),
(20, 'Bạch Kim IV', 8, 20000, 5, 12, '2022-09-05 09:04:17', '2022-09-05 09:04:17'),
(21, 'Bạch Kim III', 8, 25000, 5, 13, '2022-09-05 09:04:37', '2022-09-05 09:04:37'),
(22, 'Bạch Kim II', 8, 25000, 5, 14, '2022-09-05 09:04:54', '2022-09-05 09:04:54'),
(23, 'Bạch Kim I', 8, 25000, 5, 15, '2022-09-05 09:05:14', '2022-09-05 09:05:14'),
(24, 'Kim Cương V', 9, 25000, 5, 16, '2022-09-05 09:05:33', '2022-09-05 09:05:33'),
(25, 'Kim Cương IV', 9, 25000, 5, 17, '2022-09-05 09:05:49', '2022-09-05 09:05:49'),
(26, 'Kim Cương III', 9, 30000, 5, 18, '2022-09-05 09:06:02', '2022-09-05 09:06:02'),
(27, 'Kim Cương II', 9, 30000, 5, 19, '2022-09-05 09:06:13', '2022-09-05 09:06:13'),
(28, 'Kim Cương I', 9, 30000, 5, 20, '2022-09-03 20:10:01', '2022-09-03 20:10:01'),
(29, 'Tinh Anh V', 10, 30000, 5, 21, '2022-09-03 20:10:50', '2022-09-03 20:10:50'),
(30, 'Tinh Anh IV', 10, 30000, 5, 22, '2022-09-03 20:11:05', '2022-09-03 20:11:05'),
(31, 'Tinh Anh III', 10, 35000, 5, 23, '2022-09-03 20:11:25', '2022-09-03 20:11:25'),
(32, 'Tinh Anh I', 10, 35000, 5, 25, '2022-09-03 20:11:51', '2022-09-03 20:11:51'),
(33, 'Tinh Anh II', 10, 35000, 5, 24, '2022-09-03 20:12:12', '2022-09-03 20:12:12'),
(34, 'Cao Thủ', 11, 40000, 50, 26, '2022-09-03 20:12:41', '2022-09-03 20:12:41'),
(35, 'Chiến Tướng - Thách Đấu', 12, 50000, 99, 27, '2022-09-03 20:13:16', '2022-09-03 20:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 24, '2022-09-01 19:06:45', '2022-09-01 19:06:45'),
(3, 27, '2022-09-01 19:13:34', '2022-09-01 19:13:34'),
(4, 26, '2022-09-01 20:13:53', '2022-09-01 20:13:53'),
(5, 22, '2022-09-01 20:15:59', '2022-09-01 20:15:59'),
(6, 21, '2022-09-01 20:20:35', '2022-09-01 20:20:35'),
(7, 8, '2022-09-01 20:27:26', '2022-09-01 20:27:26'),
(8, 19, '2022-09-01 20:48:36', '2022-09-01 20:48:36'),
(9, 23, '2022-09-01 20:55:05', '2022-09-01 20:55:05'),
(10, 29, '2022-09-03 17:15:49', '2022-09-03 17:15:49'),
(11, 30, '2022-09-03 17:16:27', '2022-09-03 17:16:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_username_unique` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_staff`
--
ALTER TABLE `request_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_staff_account_id_unique` (`account_id`),
  ADD KEY `request_staff_status_id_foreign` (`status_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_accounts`
--
ALTER TABLE `role_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_accounts_id_account_foreign` (`id_account`),
  ADD KEY `role_accounts_id_role_foreign` (`id_role`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_account_id_foreign` (`account_id`),
  ADD KEY `staff_status_id_foreign` (`status_id`);

--
-- Indexes for table `status_request_staff`
--
ALTER TABLE `status_request_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_staff`
--
ALTER TABLE `status_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_ranks`
--
ALTER TABLE `sub_ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_ranks_rank_id_foreign` (`rank_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_account_id_foreign` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request_staff`
--
ALTER TABLE `request_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_accounts`
--
ALTER TABLE `role_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_request_staff`
--
ALTER TABLE `status_request_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_staff`
--
ALTER TABLE `status_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_ranks`
--
ALTER TABLE `sub_ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_staff`
--
ALTER TABLE `request_staff`
  ADD CONSTRAINT `request_staff_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `request_staff_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_request_staff` (`id`);

--
-- Constraints for table `role_accounts`
--
ALTER TABLE `role_accounts`
  ADD CONSTRAINT `role_accounts_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `role_accounts_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `staff_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_staff` (`id`);

--
-- Constraints for table `sub_ranks`
--
ALTER TABLE `sub_ranks`
  ADD CONSTRAINT `sub_ranks_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

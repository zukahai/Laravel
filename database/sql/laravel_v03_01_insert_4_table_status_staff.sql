-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 12:56 PM
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
                                                                                      (19, 'user1', '111111', '2022-09-01 10:05:46', '2022-09-01 10:05:46'),
                                                                                      (20, 'user2', '111111', '2022-09-01 10:05:51', '2022-09-01 10:05:51'),
                                                                                      (21, 'tester', '111111', '2022-09-02 01:02:23', '2022-09-02 01:02:23'),
                                                                                      (22, '1', '111111', '2022-09-02 01:13:00', '2022-09-02 01:13:00');

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
                                                          (7, '2022_09_02_163114_create_request_staff_table', 1),
                                                          (8, '2022_09_02_163126_create_staff_table', 1);

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
-- Table structure for table `request_staff`
--

CREATE TABLE `request_staff` (
                                 `id` bigint(20) UNSIGNED NOT NULL,
                                 `account_id` bigint(20) UNSIGNED NOT NULL,
                                 `status_id` bigint(20) UNSIGNED NOT NULL,
                                 `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                 `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
                                                                                                (1, 'admin', 'Day la admin', 'danger', '2022-08-21 11:39:38', '2022-08-26 04:16:31'),
                                                                                                (2, 'staff', 'Day la nhan vien', 'info', '2022-08-31 06:49:41', '2022-09-01 09:56:44'),
                                                                                                (3, 'user', 'Day la nguoi dung', 'success', '2022-08-26 00:24:55', '2022-08-26 04:16:31'),
                                                                                                (4, 'hacker', 'Đây là mô tả', 'dark', '2022-09-01 09:02:49', '2022-09-01 09:56:51'),
                                                                                                (8, 'ban', 'Đây là mô tả', 'warning', '2022-09-02 00:23:54', '2022-09-02 00:26:01');

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
                                                                                            (15, 11, 2, '2022-08-31 23:49:20', '2022-08-31 23:49:20'),
                                                                                            (16, 8, 2, '2022-08-31 23:49:34', '2022-08-31 23:49:34'),
                                                                                            (17, 7, 2, '2022-08-31 23:50:09', '2022-08-31 23:50:09'),
                                                                                            (19, 10, 3, '2022-08-31 23:51:28', '2022-08-31 23:51:28'),
                                                                                            (20, 7, 1, '2022-08-31 23:56:39', '2022-08-31 23:56:39'),
                                                                                            (21, 12, 3, '2022-09-01 00:51:45', '2022-09-01 00:51:45'),
                                                                                            (23, 14, 3, '2022-09-01 00:52:05', '2022-09-01 00:52:05'),
                                                                                            (24, 15, 3, '2022-09-01 00:52:10', '2022-09-01 00:52:10'),
                                                                                            (25, 16, 3, '2022-09-01 00:52:30', '2022-09-01 00:52:30'),
                                                                                            (26, 17, 3, '2022-09-01 00:52:41', '2022-09-01 00:52:41'),
                                                                                            (27, 18, 3, '2022-09-01 00:52:50', '2022-09-01 00:52:50'),
                                                                                            (28, 12, 2, '2022-09-01 01:00:12', '2022-09-01 01:00:12'),
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
                                                                                            (42, 21, 2, '2022-09-02 01:02:36', '2022-09-02 01:02:36'),
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
                                                                                            (55, 8, 4, '2022-09-02 03:16:16', '2022-09-02 03:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `account_id` bigint(20) UNSIGNED NOT NULL,
                         `status_id` bigint(20) UNSIGNED NOT NULL,
                         `link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_request_staff`
--

CREATE TABLE `status_request_staff` (
                                        `id` bigint(20) UNSIGNED NOT NULL,
                                        `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                        `created_at` timestamp NULL DEFAULT NULL,
                                        `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_request_staff`
--

INSERT INTO `status_request_staff` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
                                                                                         (1, 'Đang chờ', NULL, NULL),
                                                                                         (2, 'Chấp nhận', NULL, NULL),
                                                                                         (3, 'Huỷ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_staff`
--

CREATE TABLE `status_staff` (
                                `id` bigint(20) UNSIGNED NOT NULL,
                                `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_staff`
--

INSERT INTO `status_staff` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
                                                                                 (1, 'Hoạt động', NULL, NULL),
                                                                                 (2, 'Khoá', NULL, NULL);

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
-- Indexes for table `request_staff`
--
ALTER TABLE `request_staff`
    ADD PRIMARY KEY (`id`),
  ADD KEY `request_staff_account_id_foreign` (`account_id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_staff`
--
ALTER TABLE `request_staff`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_accounts`
--
ALTER TABLE `role_accounts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

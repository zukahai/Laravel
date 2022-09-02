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

INSERT INTO `roles` (`id`, `role_name`, `description`, `color`, `created_at`, `updated_at`) VALUES
                                                                                                (1, 'admin', 'Day la admin', 'danger', '2022-08-21 11:39:38', '2022-08-26 04:16:31'),
                                                                                                (2, 'staff', 'Day la nhan vien', 'info', '2022-08-31 06:49:41', '2022-09-01 09:56:44'),
                                                                                                (3, 'user', 'Day la nguoi dung', 'success', '2022-08-26 00:24:55', '2022-08-26 04:16:31'),
                                                                                                (4, 'hacker', 'Đây là mô tả', 'dark', '2022-09-01 09:02:49', '2022-09-01 09:56:51'),
                                                                                                (8, 'ban', 'Đây là mô tả', 'warning', '2022-09-02 00:23:54', '2022-09-02 00:26:01');

-- --------------------------------------------------------

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

INSERT INTO `status_request_staff` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
                                                                                         (1, 'Đang chờ', NULL, NULL),
                                                                                         (2, 'Chấp nhận', NULL, NULL),
                                                                                         (3, 'Huỷ', NULL, NULL);

-- --------------------------------------------------------


INSERT INTO `status_staff` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
                                                                                 (1, 'Hoạt động', NULL, NULL),
                                                                                 (2, 'Khoá', NULL, NULL);

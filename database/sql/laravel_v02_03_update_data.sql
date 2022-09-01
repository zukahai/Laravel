INSERT INTO `accounts` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'admin', NULL, NULL);

INSERT INTO `roles` (`id`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
                                                                                                     (NULL, 'admin', 'Day la admin', NULL, NULL),
                                                                                                     (NULL, 'staff', 'Day la nhan vien', NULL, NULL),
                                                                                                     (NULL, 'user', 'Day la nguoi dung', NULL, NULL);

INSERT INTO `role_accounts` (`id`, `id_account`, `id_role`, `updated_at`, `created_at`) VALUES
                                                                                                          (NULL, '1', '1', NULL, NULL),
                                                                                                          (NULL, '1', '2', NULL, NULL),
                                                                                                          (NULL, '1', '3', NULL, NULL);

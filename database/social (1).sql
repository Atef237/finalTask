-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 03:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'atef', 'ateftaha12@gmail.com', '$2y$10$ESiSJkwj1mdhRMiGi1tqnejG4gBNn6kPzdjVsgdg5a2oA2khYsXFy', NULL, NULL),
(2, 'taha', 'taha@gmail.com', '123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `text`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'hello worled :)', '2021-04-16 03:01:34', '2021-04-16 03:01:34'),
(4, 1, 3, 'hello worled :)', '2021-04-16 03:02:53', '2021-04-16 03:02:53'),
(5, 1, 3, 'hello worled :) 2', '2021-04-16 03:03:53', '2021-04-16 03:03:53'),
(6, 1, 16, 'fkwrijfriojferiofjrefg', '2021-04-18 21:47:30', '2021-04-18 21:47:30'),
(7, 1, 15, 'MMMMMMMMFKrgjveris', '2021-04-19 04:43:50', '2021-04-19 04:43:50'),
(8, 5, 16, 'comment comment comment comment', '2021-04-21 03:37:02', '2021-04-21 03:37:02'),
(11, 5, 16, 'update2 update2 update2 update2 update2 update2 update2 update2 update2 update2 update2 update2', '2021-04-21 04:06:13', '2021-04-21 20:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `Future_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `accepted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sender_id`, `Future_id`, `accepted`, `created_at`, `updated_at`) VALUES
(2, 1, 6, 1, NULL, NULL),
(10, 5, 6, 0, NULL, NULL),
(11, 10, 11, 1, NULL, NULL),
(12, 1, 6, 1, NULL, NULL),
(13, 11, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `admin_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'first group', '2021-04-19 03:49:50', '2021-04-19 03:49:50'),
(2, 1, 'GGGGGGGGGGGGGGGGGGGGGGGGGGGGG', '2021-04-19 04:36:23', '2021-04-19 04:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `group_user_members`
--

CREATE TABLE `group_user_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user_members`
--

INSERT INTO `group_user_members` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-04-19 04:17:07', '2021-04-19 04:17:07'),
(3, 2, 1, '2021-04-19 04:36:38', '2021-04-19 04:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `like-comment`
--

CREATE TABLE `like-comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like-replies`
--

CREATE TABLE `like-replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(3, 1, 2, '2021-04-16 03:36:43', '2021-04-16 03:36:43'),
(4, 1, 3, '2021-04-16 03:37:08', '2021-04-16 03:37:08'),
(5, 1, 2, '2021-04-18 07:18:17', '2021-04-18 07:18:17');

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
(271, '2014_10_12_000000_create_users_table', 1),
(272, '2014_10_12_100000_create_password_resets_table', 1),
(273, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(274, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(275, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(276, '2016_06_01_000004_create_oauth_clients_table', 1),
(277, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(278, '2019_08_19_000000_create_failed_jobs_table', 1),
(279, '2021_04_04_000051_create_comments_table', 2),
(281, '2021_04_04_000152_create_replys_table', 4),
(282, '2021_04_03_235854_create_post_table', 5),
(283, '2021_04_13_050404_create_table_admin', 6),
(284, '2021_04_19_032645_create_admin_group_table', 7),
(287, '2021_04_19_032722_create_group_table', 8),
(288, '2021_04_19_032745_create_members_table', 9),
(289, '2021_04_19_044338_create_admins_table', 10),
(290, '2021_04_19_045245_create_members_tables', 10),
(292, '2021_04_20_060726_create_friends_table', 11),
(293, '2021_04_21_225823_create_like-comment_table', 12),
(294, '2021_04_21_233003_create_replies_table', 13),
(295, '2021_04_21_225840_create_like-reply_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('49605e10e34506dd31651f5e0738bca1ce6563052d5d6ef0b6ffd0b175635a619e0bb32d9359a27f', 1, 3, 'token', '[]', 0, '2021-04-20 20:21:11', '2021-04-20 20:21:11', '2022-04-20 22:21:11'),
('74c5e20b6b22f8d8bc2218a452eb816d746a2cb133755c1be8b3bdb881456b811477d17b9893ce66', 1, 3, 'token', '[]', 0, '2021-04-20 20:14:08', '2021-04-20 20:14:08', '2022-04-20 22:14:08'),
('a5a232214a1e7a7e0bf2231efede0be57ba6df06d0d4076cae07ecbf57d912eb0ba7b520535d0464', 1, 3, 'token', '[]', 0, '2021-04-20 20:20:50', '2021-04-20 20:20:50', '2022-04-20 22:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'zPZSUEjPR2qvTqxI4NilIFA1MLeN1kmMXpnc1Qum', NULL, 'http://localhost', 1, 0, 0, '2021-04-11 23:49:08', '2021-04-11 23:49:08'),
(2, NULL, 'Laravel Password Grant Client', 'PcVWet1IYzA1GbHUwScEO1dtC6sTIQLBuhJx6YPf', 'users', 'http://localhost', 0, 1, 0, '2021-04-11 23:49:08', '2021-04-11 23:49:08'),
(3, NULL, 'Laravel Personal Access Client', 'q7oI8imjWZmhRce1KSunum1DtZkeHSTksziKLsbx', NULL, 'http://localhost', 1, 0, 0, '2021-04-20 19:48:59', '2021-04-20 19:48:59'),
(4, NULL, 'Laravel Password Grant Client', 'm22QXvjogJKl7oaPKKzwR19VysxSJw9gUSihIhxk', 'users', 'http://localhost', 0, 1, 0, '2021-04-20 19:49:00', '2021-04-20 19:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-04-11 23:49:08', '2021-04-11 23:49:08'),
(2, 3, '2021-04-20 19:49:00', '2021-04-20 19:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Mahmoud@gmail.com', 'gTZzgobRkKJELTQjRge5', NULL),
('Mahmoud@gmail.com', 'okovgXBexPj3Gm2iqJ2Y', NULL),
('Mahmoud@gmail.com', 'O5GFF3EqBiz910pZehI0', NULL),
('Mahmoud@gmail.com', '1emw8t71XLNCzWvKS4gH', NULL),
('Mahmoud@gmail.com', 'cTn0GX0M9YMUBVkIvmzc', NULL),
('Mahmoud@gmail.com', 'YEPPsUwPjpNpfizBcWdv', NULL),
('Mahmoud@gmail.com', 'kfNpkRLOwZ8GZAGsxcRU', NULL),
('Mahmoud@gmail.com', 'W2QnjlmlbO6E5NewaR24', NULL),
('Mahmoud@gmail.com', 'I3b2Z8xOQ52sZ4gwaDSv', NULL),
('Mahmoud@gmail.com', 'P9yAZK14oC65Dzm7g4Iw', NULL),
('Mahmoud@gmail.com', 'tersGwcy06pfFtKCtQLF', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted` tinyint(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text`, `title`, `accepted`, `created_at`, `updated_at`, `group_id`) VALUES
(2, 1, 'ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 'Title', 0, NULL, NULL, 0),
(3, 1, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'Title', 0, '2021-04-02 02:54:04', NULL, 0),
(8, 1, 'MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM', 'titlte titlte titlte titlte titlte', 0, '2021-04-17 03:37:50', '2021-04-17 03:37:50', 0),
(12, 1, 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', 'KKKKKKKKKKKKKKKKKKKKKKK', 0, '2021-04-17 04:03:32', '2021-04-17 04:03:32', 0),
(13, 1, 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQq', 'SSSSSSSSSSSs', 0, '2021-04-17 04:07:22', '2021-04-17 04:07:22', 0),
(14, 1, 'zzzzzzzzzzzzzzzzzzzzzz', 'aaaaa', 0, '2021-04-17 04:08:12', '2021-04-17 04:08:12', 0),
(15, 1, 'MMMMMMMMMMMMMMMMMMMMMMMMMMm', 'jJJJJJJJJJJJJJJJJJJjjj', 0, '2021-04-18 07:17:46', '2021-04-18 07:17:46', 0),
(16, 1, 'fjwhjfhwruifhwruifhwrufuiyhwefbcwe', 'hhifuwidfwq', 0, '2021-04-18 21:46:51', '2021-04-18 21:46:51', 0),
(17, 1, 'بنلحق لرةنثخبرث برثخحنرثق بلارثبتلاةث بيحرخصحر س', 'test', 0, '2021-04-19 03:23:15', '2021-04-20 22:54:39', 0),
(18, 1, 'texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext', 'ttttttttttttttttttt', 0, '2021-04-20 03:01:14', '2021-04-20 03:01:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'atef', 'ateftaha12@gmail.com', '$2y$10$ESiSJkwj1mdhRMiGi1tqnejG4gBNn6kPzdjVsgdg5a2oA2khYsXFy', NULL, NULL),
(5, 'Mahmoud', 'Mahmoud@gmail.com', '$2y$10$yD8OMYaH0IAvDr5iDYEBTOVjyBaDz0rD9OuoUPNGmCv.twxYclKMe', '2021-04-17 01:54:50', '2021-04-20 22:49:02'),
(6, 'yousef', 'ali@gmail.com', '$2y$10$zyl/HB9dSsbyIdZ9DbKBquMPU2fuB0CMYIpGYvYQ0Pf1FxUTf35Jq', '2021-04-19 19:27:33', '2021-04-19 19:27:34'),
(10, 'ali', 'aliali@gmail.com', '$2y$10$g5f2P6RZR.D/ORAjAkxlA.VGwmSB1/ZL2SEMkRA2RNA8JINt5qke2', '2021-04-20 20:38:26', '2021-04-20 20:38:26'),
(11, 'nnnn', 'nnnnn@gmail.com', '$2y$10$T725x.eBNH0BbR0MGuzcaOXp1OWFNF2zDvUTCCnjI6FfASett1.7.', '2021-04-20 20:45:19', '2021-04-20 20:45:19');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_sender_id_foreign` (`sender_id`),
  ADD KEY `friends_future_id_foreign` (`Future_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_user_members`
--
ALTER TABLE `group_user_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_members_group_id_foreign` (`group_id`),
  ADD KEY `group_user_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `like-comment`
--
ALTER TABLE `like-comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_comment_comment_id_foreign` (`comment_id`),
  ADD KEY `like_comment_user_id_foreign` (`user_id`);

--
-- Indexes for table `like-replies`
--
ALTER TABLE `like-replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_replies_reply_id_foreign` (`reply_id`),
  ADD KEY `like_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_user_members`
--
ALTER TABLE `group_user_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `like-comment`
--
ALTER TABLE `like-comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like-replies`
--
ALTER TABLE `like-replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_future_id_foreign` FOREIGN KEY (`Future_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user_members`
--
ALTER TABLE `group_user_members`
  ADD CONSTRAINT `group_user_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like-comment`
--
ALTER TABLE `like-comment`
  ADD CONSTRAINT `like_comment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like-replies`
--
ALTER TABLE `like-replies`
  ADD CONSTRAINT `like_replies_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `replies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

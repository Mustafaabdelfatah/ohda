-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 07:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohda`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'MAHMOUD HASHEM', 1284454993, '$2y$10$0TLU3LCiJP8QjGAQsdhBUOxuYVyzZsN3XMm1oOlGgSvj.fB8NVx3y', NULL, '2022-08-09 15:06:22', '2022-08-09 15:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `bosla_types`
--

CREATE TABLE `bosla_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bosla_types`
--

INSERT INTO `bosla_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'طابعات', '2022-07-16 03:25:04', '2022-07-16 03:25:04'),
(2, 'حواسب شخصية', '2022-07-27 17:38:41', '2022-07-27 17:38:41'),
(3, 'ماسح ضوئى', '2022-08-08 14:33:32', '2022-08-08 14:33:32'),
(4, 'ZERO CLIENT', '2022-08-08 15:15:36', '2022-08-08 15:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ohda_status` enum('added','removed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'added',
  `bosla` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `not_serial` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `boslatype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `type`, `model`, `date`, `document`, `quantity`, `page`, `description`, `ohda_status`, `bosla`, `not_serial`, `boslatype_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(58, 'ماسح ضوئى', 'hp scan jet 7500 scanner', '[\"2013-06-02\"]', '[\"288\"]', 1, '45/2', NULL, 'added', 'active', 'un_active', 3, '2022-08-22 12:45:18', '2022-08-08 14:34:41', '2022-08-22 12:45:18'),
(59, 'حواسب شخصية', 'HP COMPAQ 8200 ELITE Convertible Minitower PC', '[\"2013-06-02\"]', '[\"288\"]', 8, '45/2', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:36:24', '2022-08-08 17:23:22'),
(60, 'حواسب شخصية', 'Hp Compaq 8100 Elite CMT', '[\"2011-02-06\"]', '[\"569\"]', 10, '162/4', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:49:14', '2022-12-25 15:40:49'),
(61, 'حواسب شخصية', 'Hp 500 microtower pc with led monitor', '[\"2012-12-03\"]', '[\"436\"]', 3, '7/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:51:54', '2022-08-08 14:51:54'),
(62, 'حواسب شخصية', '+ PC CORE i5 – FUJITSU ESPRIMO P521 E85', '[\"2018-01-03\"]', '[\"230\"]', 1, '9/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:53:09', '2022-08-08 17:21:20'),
(63, 'حواسب شخصية', 'PC CORE I5 – 4GB RAM HP COMPAQ PRO 6300', '[\"2015-12-02\"]', '[\"354\"]', 1, '17/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:56:29', '2022-08-08 17:24:08'),
(64, 'حواسب شخصية', '+PC CORE I5 Fujitsu Esprimo P920E85', '[\"2014-05-11\"]', '[\"200\"]', 48, '19/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:57:28', '2022-08-08 17:19:52'),
(65, 'حواسب شخصية', 'Fujitsu siemens ESPRIMO P7935 E80+', '[\"2009-11-18\"]', '[\"169\"]', 18, '26/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 14:58:52', '2022-11-12 07:57:07'),
(66, 'حواسب شخصية', 'PC core i5 – 4GB RAM / HP 8300E CMT', '[\"2015-12-27\"]', '[\"309\"]', 3, '29/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:01:39', '2022-08-08 17:23:45'),
(67, 'حواسب شخصية', 'Fujitsu Siemens ESPRIMO P5915', '[\"2007-06-07\"]', '[\"701\"]', 5, '62/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:04:43', '2022-08-22 12:09:55'),
(68, 'حواسب شخصية', '+PC Core I5-4 GB RAM – Fujitsu Esprimo P910 E85', '[\"2015-08-12\"]', '[\"29\"]', 1, '73/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:10:31', '2022-08-08 17:22:06'),
(69, 'حواسب شخصية', '+Personal Computer Fujitsu Esprimo P900 E85', '[\"2013-02-14\"]', '[\"313\"]', 3, '77/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:11:36', '2022-08-08 17:21:43'),
(70, 'حواسب شخصية', 'PC Fujitsu Siemens ESPRIMO P5925', '[\"2008-05-07\"]', '[\"980\"]', 9, '99/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:13:24', '2022-08-08 17:27:18'),
(71, 'zero client', 'PC SHARE - zero client monitor peripherals / ncomputing l300', '[\"2013-10-30\"]', '[\"465\"]', 98, '106/1', NULL, 'added', 'active', 'un_active', 4, NULL, '2022-08-08 15:16:20', '2022-08-22 12:05:04'),
(72, 'حواسب شخصية', 'DELL OPTIPLEX 7010 MT CORE i5', '[\"2013-10-30\"]', '[\"165\"]', 11, '108/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:17:39', '2022-08-08 17:20:50'),
(73, 'طابعات ليزر', 'A4 NETWORK LASER PRINTER XEROX WORK CENTER 3615 DN', '[\"2020-08-13\"]', '[\"46\"]', 1, '109/1', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 15:21:08', '2022-08-08 17:30:15'),
(74, 'طابعات ليزر', 'A4 laser printer hp 402 dne', '[\"2021-07-29\",\"31\\/01\\/2021\",\"04\\/10\\/2022\"]', '[\"32\",\"373\",\"139\"]', 4, '162/1', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 15:29:50', '2022-12-27 05:57:38'),
(75, 'حواسب شخصية', 'PC Server HP Compaq DC 8000', '[\"2010-08-25\"]', '[\"78\"]', 6, '165/1', NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-08 15:31:34', '2022-08-08 17:22:38'),
(76, 'طابعات ليزر', 'hp laser jet 9040 dn printer', '[\"2013-01-10\"]', '[\"26\"]', 1, '42/2', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 15:33:50', '2022-08-08 15:33:50'),
(80, 'طابعات ألوان', 'HP Color laser jet 5500DN', '[\"2003-01-15\"]', '[\"39\"]', 1, '38/2', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:18:03', '2022-08-08 17:31:10'),
(81, 'طابعات ليزر', 'A4 laser printer hp pro 400 m 401', '[\"2007-10-07\"]', '[\"101\"]', 7, '184/2', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:20:52', '2022-08-09 03:28:10'),
(82, 'طابعات ليزر', 'A4 laser printer –xerox phaser 3320', '[\"2014-11-05\"]', '[\"200\"]', 14, '185/2', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:22:14', '2022-08-09 03:27:56'),
(83, 'طابعات ألوان', 'Xerox Phaser 6280 dn printer', '[\"2015-09-02\"]', '[\"149\"]', 1, '72/6', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:24:36', '2022-08-08 16:24:36'),
(84, 'طابعات خطية', 'line matrix printer magna 3200 c', '[\"2018-01-02\"]', '[\"1\"]', 1, '80/6', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:25:35', '2022-08-09 03:29:28'),
(85, 'طابعات ألوان', 'A4/A3 inkjet printer hp pro 7110', '[\"2014-11-05\"]', '[\"200\"]', 1, '122/6', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:27:14', '2022-08-22 12:23:31'),
(86, 'طابعات ليزر', 'A3 NETWORK laser printer Xerox P5550dn', '[\"2014-11-05\"]', '[\"200\"]', 10, '123/6', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:29:13', '2022-08-09 03:28:06'),
(87, 'ماسح ضوئى', 'A4 high speed color scanner with adf model fi 6230 z', '[\"2014-11-05\"]', '[\"200\"]', 9, '124/6', NULL, 'added', 'active', 'un_active', 3, '2022-08-08 16:32:39', '2022-08-08 16:30:13', '2022-08-08 16:32:39'),
(88, 'ماسح ضوئى', 'A3 high speed due scanner fujitsu si 6670 z', '[\"2014-11-05\"]', '[\"200\"]', 1, '125/6', NULL, 'added', 'active', 'un_active', 3, NULL, '2022-08-08 16:31:06', '2022-08-09 03:28:34'),
(89, 'ماسح ضوئى', 'A4 scanner wit5h adf fujitsu si 6230 z', '[\"2014-11-05\"]', '[\"200\"]', 9, '124/6', NULL, 'added', 'active', 'un_active', 3, NULL, '2022-08-08 16:32:25', '2022-08-09 03:28:38'),
(90, 'طابعات خطية', 'line matrix printer globalis cima 6180', '[\"2015-06-11\"]', '[\"636\"]', 1, '134/6', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:33:55', '2022-08-09 03:29:19'),
(91, 'ماسح ضوئى', 'A4 scanner without adf - epson perfection v 370 photo', '[\"2020-03-17\"]', '[\"315\"]', 2, '111/2', NULL, 'added', 'active', 'un_active', 3, NULL, '2022-08-08 16:45:57', '2022-08-09 03:27:50'),
(92, 'طابعات ليزر', 'A3 / A4 network laser printer hp 9050 dn', '[\"2008-01-06\"]', '[\"704\"]', 1, '109/2', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-08 16:48:46', '2022-08-09 03:28:30'),
(93, 'ماسح ضوئى', 'FI 7240', '[\"2047-01-01\"]', '[\"475\"]', 1, '45/1', NULL, 'added', 'un_active', 'un_active', NULL, '2022-08-08 16:51:27', '2022-08-08 16:51:04', '2022-08-08 16:51:27'),
(94, 'طابعات ليزر', 'HP PRINTER 1320', '[\"0\"]', '[\"0\"]', 1, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-08 17:00:09', '2022-08-08 17:00:09'),
(95, 'طابعات ليزر', 'hp 2055', '[\"0\"]', '[\"0\"]', 11, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-08 17:05:05', '2022-08-14 15:14:18'),
(102, 'ماسح ضوئى', 'A4 high speed color scanner with adf model fi 6230 z', '[\"09\\/10\\/2019\",\"05\\/02\\/2020\"]', '[\"240\",\"86\"]', 2, '107/2', NULL, 'added', 'active', 'un_active', 3, NULL, '2022-08-09 08:46:31', '2022-08-09 11:46:53'),
(106, 'حواسب شخصية', 'Fujitsu siemens ESPRIMO P7935 E80+', '[\"45\"]', '[\"1425\"]', 1, NULL, NULL, 'added', 'un_active', 'un_active', NULL, '2022-08-09 13:24:44', '2022-08-09 12:58:45', '2022-08-09 13:24:44'),
(107, 'طابعات ليزر', 'HP PRINTER 2010', '[\"0\"]', '[\"0\"]', 1, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-09 13:29:13', '2022-08-09 13:29:13'),
(108, 'طابعات ليزر', 'hp 2015', '[\"0\"]', '[\"0\"]', 10, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-09 13:35:32', '2022-12-27 06:00:16'),
(109, 'طابعات ليزر', 'hp 3015', '[\"0\"]', '[\"0\"]', 6, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-09 13:59:10', '2022-08-14 13:52:54'),
(110, 'ماسح ضوئى', 'canon', '[\"0\"]', '[\"0\"]', 1, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, '2022-11-20 15:01:36', '2022-08-13 05:47:49', '2022-11-20 15:01:36'),
(111, 'ماسح ضوئى', 'FI 7240', '[\"0\"]', '[\"0\"]', 2, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-13 08:31:07', '2022-12-24 13:12:48'),
(112, 'حواسب شخصية', 'FUJITSU 5925', '[\"0\"]', '[\"0\"]', 4, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-13 09:34:04', '2022-12-22 10:11:04'),
(113, 'حواسب شخصية', 'PC DELL OPTIPLEX 5060', '[\"07\\/04\\/2022\",\"16\\/07\\/2022\",\"16\\/08\\/2022\"]', '[\"482\",\"08\",\"63\"]', 4, NULL, NULL, 'added', 'active', 'un_active', 2, NULL, '2022-08-13 09:42:22', '2022-08-22 12:19:51'),
(114, 'حواسب شخصية', 'FUJITSU ESPRIMO 7935  PC', '[\"0\"]', '[\"0\"]', 3, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-14 14:45:52', '2022-08-14 14:45:52'),
(115, 'حواسب شخصية', 'FUJITSU 5915', '[\"0\"]', '[\"0\"]', 4, NULL, NULL, 'removed', 'un_active', 'un_active', NULL, NULL, '2022-08-14 14:53:58', '2022-12-22 10:10:22'),
(116, 'طابعات ألوان', 'HP OFFICE JET 7110 PRINTER', '[\"22\\/06\\/2022\",\"28\\/06\\/2022\"]', '[\"568\",\"578\"]', 2, '1/160', NULL, 'added', 'active', 'un_active', 1, NULL, '2022-08-22 12:25:27', '2022-08-22 12:25:27'),
(117, 'طابعات ليزر', 'XEROX PHASER 5550DN UP TO 50 PPM ONE-SIDWD 50 IPM TWOSIDED(A4)', '[\"14\\/03\\/2022\"]', '[\"415\"]', 1, '144/1', NULL, 'added', 'active', 'un_active', NULL, NULL, '2022-08-22 12:38:40', '2022-08-22 12:38:40'),
(118, 'أجهزة محمولة', 'Lap top Core i7  FUJITSU Lifebook E754 QM87', '[\"0\"]', '[\"0\"]', 1, '97/1', NULL, 'added', 'active', 'un_active', NULL, NULL, '2022-09-11 11:01:59', '2022-09-11 11:01:59'),
(119, 'أجهزة محمولة', 'Fujitsu Lifebook A556 Labtop Core i5', '[\"0\"]', '[\"0\"]', 1, '91/1', NULL, 'added', 'active', 'un_active', NULL, NULL, '2022-09-11 11:14:55', '2022-09-11 11:14:55'),
(120, 'أجهزة محمولة', 'Fujitsu Lifebook AH 544/G32 Notebook Core i7', '[\"0\"]', '[\"0\"]', 1, '81/6', NULL, 'added', 'active', 'un_active', NULL, NULL, '2022-09-11 11:18:42', '2022-09-11 11:18:42'),
(121, 'ماسح ضوئى', 'HP SCANJET PRO 3500 F1 FLATBED SCANNER', '[\"04\\/10\\/2022\"]', '[\"139\"]', 1, NULL, NULL, 'added', 'active', 'un_active', NULL, NULL, '2022-12-27 05:55:38', '2022-12-27 05:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `main_places`
--

CREATE TABLE `main_places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_places`
--

INSERT INTO `main_places` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الأفراد', '2022-06-09 04:55:35', '2022-06-09 04:55:35'),
(2, 'المراسم', '2022-06-09 05:00:11', '2022-06-09 05:00:11'),
(3, 'الشئون الشخصيه', '2022-06-09 05:00:41', '2022-06-09 05:00:41'),
(4, 'التنظيم والمرتبات', '2022-06-09 05:00:48', '2022-06-09 05:00:48'),
(5, 'رئاسه الهيئه', '2022-06-09 05:00:56', '2022-06-09 05:00:56'),
(6, 'مساعد رئيس الهيئه', '2022-06-09 05:01:03', '2022-06-09 05:01:03'),
(7, 'التخطيط', '2022-06-09 05:01:09', '2022-06-09 05:01:09'),
(8, 'الميزانيه', '2022-06-09 05:01:17', '2022-06-09 05:01:17'),
(9, 'شئون قانونيه', '2022-06-09 05:01:23', '2022-06-09 05:01:23'),
(10, 'شئون ظباط', '2022-06-09 05:01:29', '2022-06-09 05:01:29'),
(11, 'نظم المعلومات', '2022-06-09 05:01:36', '2022-06-09 05:01:36'),
(12, 'مجمع خدمه المواطنين', '2022-06-09 05:01:48', '2022-06-09 05:01:48'),
(14, 'التفتيش', '2022-06-09 05:02:02', '2022-06-09 05:02:02'),
(15, 'التسليح', '2022-06-09 05:02:09', '2022-06-09 05:02:09'),
(16, 'القياده الاستراتيجيه', '2022-06-09 05:02:25', '2022-06-09 05:02:25'),
(17, 'التعبئه', '2022-06-09 05:05:54', '2022-06-09 05:05:54'),
(18, 'سكرتاريه واداره محليه', '2022-06-09 05:19:51', '2022-06-09 05:19:51'),
(19, 'الاشغال', '2022-06-09 05:21:40', '2022-06-09 05:21:40'),
(20, 'المتابعه', '2022-06-10 15:44:54', '2022-06-10 15:44:54'),
(21, 'اداره عسكريه', '2022-06-10 15:46:03', '2022-06-10 15:46:03'),
(22, 'مفرزة الأمن', '2022-06-10 15:47:23', '2022-06-10 15:47:23'),
(23, 'دراسه عمل', '2022-06-10 16:13:16', '2022-06-10 16:13:16'),
(24, 'الحمله', '2022-06-18 13:12:12', '2022-06-18 13:12:12');

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
(1, '2021_05_26_191241_create_admins_table', 1),
(2, '2022_02_09_140631_create_main_places_table', 1),
(3, '2022_02_09_140631_create_sub_places_table', 1),
(4, '2022_02_09_140631_create_types_table', 1),
(5, '2022_02_09_140641_create_models_table', 1),
(6, '2022_02_09_194922_create_items_table', 1),
(7, '2022_02_17_053830_create_transactions_table', 1),
(8, '2022_04_24_151613_create_settings_table', 1),
(9, '2022_06_03_133207_create_activity_log_table', 1),
(10, '2022_06_05_123851_laratrust_setup_tables', 1),
(11, '2022_02_08_212759_create_bosla_types_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Fujitsu siemens ESPRIMO P7935 E80+', 1, '2022-06-09 05:39:34', '2022-06-09 05:39:34'),
(2, '+PC CORE I5 Fujitsu Esprimo P920E85', 1, '2022-06-09 05:40:14', '2022-08-08 17:19:52'),
(3, 'DELL OPTIPLEX 7010 MT CORE i5', 1, '2022-06-10 15:38:04', '2022-08-08 17:20:50'),
(4, '+ PC CORE i5 – FUJITSU ESPRIMO P521 E85', 1, '2022-06-10 15:50:18', '2022-08-08 17:21:20'),
(5, '+Personal Computer Fujitsu Esprimo P900 E85', 1, '2022-06-10 15:51:56', '2022-08-08 17:21:43'),
(7, '+PC Core I5-4 GB RAM – Fujitsu Esprimo P910 E85', 1, '2022-06-10 15:58:01', '2022-08-08 17:22:06'),
(8, 'PC Server HP Compaq DC 8000', 1, '2022-06-10 16:00:47', '2022-08-08 17:22:38'),
(9, 'Hp Compaq 8100 Elite CMT', 1, '2022-06-10 16:10:43', '2022-08-08 17:22:56'),
(10, 'PC DELL OPTIPLEX 5060', 1, '2022-06-10 16:18:47', '2022-06-10 16:18:47'),
(11, 'HP COMPAQ 8200 ELITE Convertible Minitower PC', 1, '2022-06-10 16:20:30', '2022-08-08 17:23:22'),
(12, 'PC core i5 – 4GB RAM / HP 8300E CMT', 1, '2022-06-10 16:37:11', '2022-08-08 17:23:45'),
(13, 'PC CORE I5 – 4GB RAM HP COMPAQ PRO 6300', 1, '2022-06-10 16:39:21', '2022-08-08 17:24:08'),
(14, 'A3 NETWORK laser printer Xerox P5550dn', 3, '2022-06-11 04:30:44', '2022-08-08 17:24:39'),
(15, 'FUJITSU ESPRIMO 7935  PC', 1, '2022-06-11 12:30:35', '2022-06-11 12:30:35'),
(16, 'Fujitsu Siemens ESPRIMO P5915', 1, '2022-06-18 13:01:15', '2022-08-08 17:26:37'),
(17, 'Hp 500 microtower pc with led monitor', 1, '2022-06-18 14:30:58', '2022-06-18 14:30:58'),
(18, 'PC Fujitsu Siemens ESPRIMO P5925', 1, '2022-06-18 14:31:31', '2022-08-08 17:27:18'),
(19, 'hp 2055', 3, '2022-06-20 06:59:58', '2022-06-20 06:59:58'),
(20, 'hp 2015', 3, '2022-06-20 07:00:17', '2022-06-20 07:00:17'),
(22, 'hp 3015', 3, '2022-06-20 07:00:44', '2022-06-20 07:00:44'),
(23, 'A4 laser printer –xerox phaser 3320', 3, '2022-06-20 07:01:12', '2022-08-08 17:28:25'),
(24, 'A4 NETWORK LASER PRINTER XEROX WORK CENTER 3615 DN', 3, '2022-06-20 07:30:00', '2022-08-08 17:30:15'),
(26, 'A4 laser printer hp 402 dne', 3, '2022-06-20 07:31:21', '2022-06-20 07:31:21'),
(27, 'HP Color laser jet 5500DN', 3, '2022-06-20 07:31:53', '2022-08-08 17:31:10'),
(28, 'hp laser jet 9040 dn printer', 3, '2022-06-20 07:32:37', '2022-06-20 07:32:37'),
(29, 'hp scan jet 7500 scanner', 5, '2022-06-20 07:33:55', '2022-06-20 07:33:55'),
(30, 'A4 high speed color scanner with adf model fi 6230 z', 5, '2022-06-20 07:35:56', '2022-06-20 07:35:56'),
(31, 'A3 / A4 network laser printer hp 9050 dn', 3, '2022-06-20 07:37:29', '2022-06-20 07:37:29'),
(32, 'A4 scanner without adf - epson perfection v 370 photo', 5, '2022-06-20 07:39:12', '2022-06-20 07:39:12'),
(33, 'A4 laser printer hp pro 400 m 401', 3, '2022-06-20 07:40:31', '2022-06-20 07:40:31'),
(34, 'Xerox Phaser 6280 dn printer', 3, '2022-06-20 07:41:38', '2022-06-20 07:41:38'),
(35, 'line matrix printer magna 3200 c', 3, '2022-06-20 07:42:25', '2022-06-20 07:42:25'),
(36, 'A4 scanner wit5h adf fujitsu si 6230 z', 5, '2022-06-20 07:46:20', '2022-06-20 07:46:20'),
(37, 'A3 high speed due scanner fujitsu si 6670 z', 5, '2022-06-20 07:48:14', '2022-06-20 07:48:14'),
(38, 'line matrix printer globalis cima 6180', 3, '2022-06-20 07:50:45', '2022-06-20 07:50:45'),
(39, 'A3 network laser printer xerox p 5550 dn', 3, '2022-06-20 08:04:48', '2022-06-20 08:04:48'),
(40, 'printer hp laser jet p 2055', 3, '2022-06-20 08:17:55', '2022-06-20 08:17:55'),
(41, 'A4 laser printer - xerox phasr 3320', 3, '2022-06-20 08:20:11', '2022-06-20 08:20:11'),
(42, 'A4 laser printer / hp laser jet p 3015 x printer', 3, '2022-06-20 08:21:28', '2022-06-20 08:21:28'),
(43, 'A4 LEASER PRINTER HP PRO 400 M 401 A', 3, '2022-06-20 08:23:10', '2022-06-20 08:23:10'),
(44, 'A4 Laser Printer HP 2015', 3, '2022-06-20 08:23:49', '2022-06-20 08:23:49'),
(46, 'FI 7240', 5, '2022-06-20 10:25:00', '2022-06-20 10:25:00'),
(47, 'HP PRINTER 2010', 3, '2022-06-20 10:27:01', '2022-06-20 10:27:01'),
(48, 'HP PRINTER 1320', 3, '2022-06-20 12:30:36', '2022-06-20 12:30:36'),
(49, 'PC SHARE - zero client monitor peripherals / ncomputing l300', 6, '2022-06-20 12:35:24', '2022-06-20 12:35:24'),
(50, 'A4/A3 inkjet printer hp pro 7110', 7, '2022-06-20 13:21:54', '2022-08-09 05:55:54'),
(51, 'Xerox Phaser 6280 dn printer', 7, '2022-06-20 13:22:31', '2022-06-20 13:22:31'),
(53, 'hp color laser jet 5500 dn', 7, '2022-06-20 13:25:03', '2022-06-20 13:25:03'),
(54, 'line matrix printer magna 3200 c', 1, '2022-06-20 13:26:20', '2022-06-20 13:26:20'),
(55, 'line matrix printer globalis cima 6180', 1, '2022-06-20 13:27:01', '2022-06-20 13:27:01'),
(56, 'line matrix printer magna 3200 c', 8, '2022-06-20 13:29:19', '2022-06-20 13:29:19'),
(57, 'line matrix printer globalis cima 6180', 8, '2022-06-20 13:29:33', '2022-06-20 13:29:33'),
(58, 'DELL OPTIPLEX 5060 CORE I5', 1, '2022-07-27 17:34:29', '2022-07-27 17:34:29'),
(59, 'HP 1320', 3, '2022-08-08 16:59:07', '2022-08-08 16:59:07'),
(60, 'HP OFFICE JET 7110 PRINTER', 7, '2022-08-09 06:00:05', '2022-08-09 06:00:05'),
(66, 'canon', 5, '2022-08-13 05:47:06', '2022-08-13 05:47:06'),
(67, 'FUJITSU 5925', 1, '2022-08-13 09:33:44', '2022-08-13 09:33:44'),
(68, 'FUJITSU 5915', 1, '2022-08-14 14:53:33', '2022-08-14 14:53:33'),
(69, 'XEROX PHASER 5550DN UP TO 50 PPM ONE-SIDWD 50 IPM TWOSIDED(A4)', 3, '2022-08-22 12:31:05', '2022-08-22 12:31:05'),
(70, 'Lap top Core i7  FUJITSU Lifebook E754 QM87', 10, '2022-09-11 10:59:57', '2022-09-11 10:59:57'),
(71, 'Fujitsu Lifebook A556 Labtop Core i5', 10, '2022-09-11 11:08:46', '2022-09-11 11:08:46'),
(72, 'Fujitsu Lifebook AH 544/G32 Notebook Core i7', 10, '2022-09-11 11:09:11', '2022-09-11 11:09:11'),
(73, 'HP SCANJET PRO 3500 F1 FLATBED SCANNER', 5, '2022-12-27 05:54:37', '2022-12-27 05:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create_admins', 'Create Admins', 'Create Admins', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(2, 'read_admins', 'Read Admins', 'Read Admins', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(3, 'update_admins', 'Update Admins', 'Update Admins', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(4, 'delete_admins', 'Delete Admins', 'Delete Admins', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(5, 'create_roles', 'Create Roles', 'Create Roles', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(6, 'read_roles', 'Read Roles', 'Read Roles', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(7, 'update_roles', 'Update Roles', 'Update Roles', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(8, 'delete_roles', 'Delete Roles', 'Delete Roles', '2022-06-09 04:51:30', '2022-06-09 04:51:30'),
(9, 'create_items', 'Create Items', 'Create Items', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(10, 'read_items', 'Read Items', 'Read Items', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(11, 'update_items', 'Update Items', 'Update Items', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(12, 'delete_items', 'Delete Items', 'Delete Items', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(13, 'create_types', 'Create Types', 'Create Types', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(14, 'read_types', 'Read Types', 'Read Types', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(15, 'update_types', 'Update Types', 'Update Types', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(16, 'delete_types', 'Delete Types', 'Delete Types', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(17, 'create_models', 'Create Models', 'Create Models', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(18, 'read_models', 'Read Models', 'Read Models', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(19, 'update_models', 'Update Models', 'Update Models', '2022-06-09 04:51:31', '2022-06-09 04:51:31'),
(20, 'delete_models', 'Delete Models', 'Delete Models', '2022-06-09 04:51:32', '2022-06-09 04:51:32'),
(21, 'create_mainPlaces', 'Create MainPlaces', 'Create MainPlaces', '2022-06-09 04:51:33', '2022-06-09 04:51:33'),
(22, 'read_mainPlaces', 'Read MainPlaces', 'Read MainPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(23, 'update_mainPlaces', 'Update MainPlaces', 'Update MainPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(24, 'delete_mainPlaces', 'Delete MainPlaces', 'Delete MainPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(25, 'create_subPlaces', 'Create SubPlaces', 'Create SubPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(26, 'read_subPlaces', 'Read SubPlaces', 'Read SubPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(27, 'update_subPlaces', 'Update SubPlaces', 'Update SubPlaces', '2022-06-09 04:51:34', '2022-06-09 04:51:34'),
(28, 'delete_subPlaces', 'Delete SubPlaces', 'Delete SubPlaces', '2022-06-09 04:51:35', '2022-06-09 04:51:35'),
(29, 'create_reports', 'Create Reports', 'Create Reports', '2022-06-09 04:51:35', '2022-06-09 04:51:35'),
(30, 'read_reports', 'Read Reports', 'Read Reports', '2022-06-09 04:51:35', '2022-06-09 04:51:35'),
(31, 'update_reports', 'Update Reports', 'Update Reports', '2022-06-09 04:51:35', '2022-06-09 04:51:35'),
(32, 'delete_reports', 'Delete Reports', 'Delete Reports', '2022-06-09 04:51:36', '2022-06-09 04:51:36'),
(33, 'create_settings', 'Create Settings', 'Create Settings', '2022-06-09 04:51:36', '2022-06-09 04:51:36'),
(34, 'read_settings', 'Read Settings', 'Read Settings', '2022-06-09 04:51:36', '2022-06-09 04:51:36'),
(35, 'update_settings', 'Update Settings', 'Update Settings', '2022-06-09 04:51:38', '2022-06-09 04:51:38'),
(36, 'delete_settings', 'Delete Settings', 'Delete Settings', '2022-06-09 04:51:38', '2022-06-09 04:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `permission_admin`
--

CREATE TABLE `permission_admin` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2022-06-09 04:51:29', '2022-06-09 04:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admin`
--

INSERT INTO `role_admin` (`role_id`, `admin_id`, `user_type`) VALUES
(1, 4, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recieve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `degree`, `recieve`, `side`, `boss`, `act`, `created_at`, `updated_at`) VALUES
(1, 'وليد عبدالحكيم الرفاعي', 'عميد', 'فرع نظم المعلومات هيئه التنظيم والإداره', 'العباسيه', 'رئيس فرع نظم المعلومات', 'active', '2022-06-10 15:49:40', '2022-06-10 15:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_places`
--

CREATE TABLE `sub_places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_places`
--

INSERT INTO `sub_places` (`id`, `name`, `master_id`, `created_at`, `updated_at`) VALUES
(1, 'الترقي', 1, '2022-06-09 04:55:44', '2022-08-09 14:54:58'),
(2, 'القوي البشريه', 1, '2022-06-09 04:55:59', '2022-08-09 14:55:03'),
(3, 'رئيس فرع الافراد', 1, '2022-06-09 04:56:15', '2022-06-09 04:56:15'),
(4, 'سكرتاريه رئيس فرع الافراد', 1, '2022-06-09 04:56:21', '2022-06-09 04:56:21'),
(5, 'رئيس محور الخدمه', 1, '2022-06-09 04:56:49', '2022-06-09 04:56:49'),
(6, 'التطوع', 1, '2022-06-09 04:56:56', '2022-08-09 14:55:13'),
(7, 'نائب رئيس فرع الافراد', 1, '2022-06-09 04:58:00', '2022-06-09 04:58:00'),
(8, 'النقل', 1, '2022-06-09 04:58:34', '2022-08-09 14:55:19'),
(9, 'الاحصاء', 1, '2022-06-09 04:58:41', '2022-08-09 14:55:25'),
(10, 'الاستكمال', 1, '2022-06-09 04:58:47', '2022-08-09 14:55:31'),
(11, 'السائقين والمهنيين', 1, '2022-06-09 04:59:05', '2022-06-09 04:59:05'),
(12, 'السفر', 1, '2022-06-09 04:59:10', '2022-06-09 04:59:10'),
(13, 'ارشيف الافراد', 1, '2022-06-09 04:59:30', '2022-06-09 04:59:30'),
(14, 'رئيس فرع المراسم', 2, '2022-06-09 05:00:17', '2022-06-09 05:00:17'),
(15, 'ارشيف المراسم', 2, '2022-06-09 05:03:26', '2022-06-09 05:03:26'),
(16, 'رئيس فرع التنظيم والمرتبات', 4, '2022-06-09 05:04:02', '2022-06-09 05:04:02'),
(17, 'صاله 1', 4, '2022-06-09 05:04:35', '2022-06-09 05:04:35'),
(18, 'صاله 2', 4, '2022-06-09 05:04:41', '2022-06-09 05:04:41'),
(19, 'رئيس فرع التعبئه', 17, '2022-06-09 05:06:11', '2022-06-09 05:06:11'),
(20, 'مكتب الماليات', 18, '2022-06-09 05:20:05', '2022-06-09 05:20:05'),
(21, 'مكتب إ ت', 18, '2022-06-09 05:20:16', '2022-06-09 05:20:16'),
(22, 'مكتب الافراد', 18, '2022-06-09 05:20:29', '2022-06-09 05:20:29'),
(23, 'الاشاره', 18, '2022-06-09 05:21:27', '2022-06-09 05:21:27'),
(24, 'رئيس فرع الاشغال', 19, '2022-06-09 05:21:59', '2022-06-09 05:21:59'),
(25, 'مكتب رئيس الهيئه', 5, '2022-06-09 05:22:37', '2022-06-09 05:22:37'),
(26, 'مكتب مساعد رئيس الهيئه 1', 6, '2022-06-09 05:22:47', '2022-06-09 05:22:47'),
(27, 'مكتب مساعد رئيس الهيئه 2', 6, '2022-06-09 05:22:58', '2022-06-09 05:22:58'),
(28, 'رئيس فرع التخطيط', 7, '2022-06-09 05:23:34', '2022-06-09 05:23:34'),
(29, 'نائب رئيس فرع  التخطيط', 7, '2022-06-09 05:23:45', '2022-06-09 05:23:45'),
(30, 'رئيس فرع الميزانيه', 8, '2022-06-09 05:24:20', '2022-06-09 05:24:20'),
(31, 'الميزانيه', 8, '2022-06-09 05:25:31', '2022-08-09 14:56:05'),
(32, 'مستشار شئون قانونيه', 9, '2022-06-09 05:25:52', '2022-06-09 05:25:52'),
(33, 'رئيس فرع شئون قانونيه', 9, '2022-06-09 05:26:10', '2022-06-09 05:26:10'),
(34, 'رئيس فرع شئون ظباط', 10, '2022-06-09 05:26:47', '2022-06-09 05:26:47'),
(35, 'ارشيف شئون ظباط', 10, '2022-06-09 05:26:58', '2022-06-09 05:26:58'),
(36, 'رئيس فرع  نظم المعلومات', 11, '2022-06-09 05:36:18', '2022-06-09 05:36:18'),
(37, 'نائب رئيس فرع  نظم المعلومات', 11, '2022-06-09 05:36:30', '2022-06-09 05:36:30'),
(38, 'مكتب الميكروجرافيك', 11, '2022-06-09 05:36:49', '2022-08-15 06:37:10'),
(39, 'مكتب الرائد محمد', 11, '2022-06-09 05:37:04', '2022-06-09 05:37:04'),
(40, 'مكتب النقيب عبدالمنعم', 11, '2022-06-09 05:37:12', '2022-06-09 05:37:12'),
(41, 'المناديب', 11, '2022-06-09 05:37:33', '2022-06-09 05:37:33'),
(42, 'الصيانه', 11, '2022-06-09 05:37:48', '2022-06-09 05:37:48'),
(43, 'غرفه السيرفر', 11, '2022-06-09 05:37:56', '2022-06-09 05:37:56'),
(44, 'قاعه ملحقه', 11, '2022-06-09 05:38:06', '2022-06-09 05:38:06'),
(45, 'ارشيف نظم المعلومات', 11, '2022-06-09 05:38:17', '2022-06-09 05:38:17'),
(46, 'المخزن', 11, '2022-06-09 05:38:25', '2022-06-09 05:38:25'),
(47, 'رئبس فرع الشئون الشخصيه', 3, '2022-06-09 05:42:15', '2022-08-09 16:32:46'),
(48, 'رئيس فرع المتابعه', 20, '2022-06-10 15:45:06', '2022-06-10 15:45:06'),
(49, 'المتابعه', 20, '2022-06-10 15:45:13', '2022-08-09 14:56:24'),
(50, 'رئيس فرع اداره عسكريه', 21, '2022-06-10 15:46:18', '2022-06-10 15:46:18'),
(51, 'قائد مفرزة الأمن', 22, '2022-06-10 15:47:27', '2022-06-10 15:47:27'),
(52, 'مكتب الامن', 22, '2022-06-10 15:54:17', '2022-06-10 15:54:17'),
(53, 'رئيس فرع التفتيش', 14, '2022-06-10 16:03:17', '2022-06-10 16:03:17'),
(54, 'نائب رئيس فرع التفتيش', 14, '2022-06-10 16:03:30', '2022-06-10 16:03:30'),
(55, 'قائد مجمع خدمة المواطنين', 12, '2022-06-10 16:05:37', '2022-06-10 16:05:37'),
(56, 'صاله المجمع', 12, '2022-06-10 16:05:55', '2022-06-10 16:05:55'),
(57, 'الانضباط', 21, '2022-06-10 16:08:49', '2022-08-09 14:56:39'),
(58, 'قاعه رئيسيه', 11, '2022-06-10 16:09:48', '2022-06-10 16:09:48'),
(59, 'رئيس فرع دراسه عمل', 23, '2022-06-10 16:13:34', '2022-06-10 16:13:34'),
(60, 'ارشيف دراسه العمل', 23, '2022-06-10 16:13:51', '2022-06-10 16:13:51'),
(61, 'رئيس قسم النقل', 1, '2022-06-10 16:25:42', '2022-06-10 16:25:42'),
(62, 'نائب رئيس فرع شئون قانونيه', 9, '2022-06-10 16:26:35', '2022-06-10 16:26:35'),
(63, 'ارشيف شئون قانونيه', 9, '2022-06-10 16:29:53', '2022-06-10 16:29:53'),
(64, 'التحقيقات', 9, '2022-06-10 16:30:09', '2022-08-09 14:57:11'),
(65, 'الحوادث', 9, '2022-06-10 16:30:30', '2022-08-09 14:57:19'),
(66, 'رئيس فرع التسليح', 15, '2022-06-10 16:31:42', '2022-06-10 16:31:42'),
(67, 'نائب رئيس فرع التسليح', 15, '2022-06-10 16:32:23', '2022-06-10 16:32:23'),
(68, 'ارشيف فرع التسليح', 15, '2022-06-10 16:32:40', '2022-06-10 16:32:40'),
(69, 'رئيس فرع سكرتاريه واداره محليه', 18, '2022-06-10 16:40:10', '2022-06-10 16:40:10'),
(70, 'الاستكمال', 17, '2022-06-11 12:33:38', '2022-08-09 14:57:27'),
(71, 'انهاء الخدمه', 1, '2022-06-11 12:33:49', '2022-06-11 12:33:49'),
(72, 'مستشار رئيس الهيئه فرع المراسم', 2, '2022-06-11 12:39:51', '2022-06-11 12:39:51'),
(73, 'منوب العمليات', 7, '2022-06-11 12:52:59', '2022-06-11 12:52:59'),
(74, 'سكرتاريه رئيس الهيئه', 5, '2022-06-11 12:54:47', '2022-06-11 12:54:47'),
(75, 'الحمله', 24, '2022-06-18 13:12:17', '2022-06-18 13:12:17'),
(76, 'مستشار رئيس الهيئه للتعبئه', 17, '2022-06-18 13:13:16', '2022-06-18 13:13:16'),
(77, 'الطعون', 9, '2022-06-18 14:24:42', '2022-08-09 14:57:41'),
(78, 'رئيس قسم الإستكمال', 1, '2022-06-18 14:38:51', '2022-06-18 14:38:51'),
(79, 'رئيس محور الخدمة الإجتماعية', 3, '2022-06-18 15:03:24', '2022-06-18 15:03:24'),
(80, 'نائب رئيس فرع التنظيم والمرتبات', 4, '2022-06-18 15:05:13', '2022-06-18 15:05:13'),
(81, 'مستشار رئيس الهيئه للتنظيم', 4, '2022-06-18 15:08:37', '2022-06-18 15:08:37'),
(82, 'الشكاوى', 9, '2022-06-18 15:11:08', '2022-08-09 14:57:56'),
(83, 'نائب رئيس فرع  دراسة عمل', 23, '2022-06-18 15:13:15', '2022-06-18 15:13:15'),
(84, 'الحوادث', 21, '2022-06-18 15:18:09', '2022-08-09 14:58:06'),
(85, 'السجون', 21, '2022-06-18 15:18:51', '2022-08-09 14:58:15'),
(86, 'مكتب العميد محمد عبد الغنى', 4, '2022-06-18 15:20:39', '2022-06-18 15:20:39'),
(87, 'رئيس قسم القوى البشرية', 1, '2022-06-18 15:43:09', '2022-06-18 15:43:09'),
(88, 'رئيس قسم التطوع', 1, '2022-06-18 15:48:13', '2022-06-18 15:48:13'),
(89, 'مكتب ضباط فرع التخطيط', 7, '2022-06-18 15:50:37', '2022-06-18 15:50:37'),
(90, 'ارشيف الشئون الشخصية', 3, '2022-06-20 09:38:29', '2022-06-20 09:38:29'),
(91, 'التدريب والعمليات و الأرشيف', 17, '2022-06-20 09:50:55', '2022-08-09 14:59:34'),
(92, 'العمليات و التدريب و الأرشيف العام', 7, '2022-06-20 09:58:15', '2022-08-09 14:59:26'),
(93, 'القوات الصديقة', 7, '2022-06-20 09:58:28', '2022-08-09 14:59:18'),
(94, 'رئيس مكتب الطعون', 9, '2022-06-20 14:28:29', '2022-06-20 14:28:29'),
(95, 'أرشيف التفتيش', 14, '2022-06-20 15:02:35', '2022-06-20 15:02:35'),
(96, 'نائب رئيس فرع السكرتارية و الإدارة المحلية', 18, '2022-06-20 15:08:18', '2022-06-20 15:08:18'),
(97, 'الإدارة الداخلية', 21, '2022-06-20 15:12:41', '2022-06-20 15:12:41'),
(98, 'رئيس محور الدفاع الجوى', 4, '2022-06-21 05:24:57', '2022-06-21 05:24:57'),
(99, 'الاشغال', 19, '2022-06-21 05:33:57', '2022-06-21 05:33:57'),
(100, 'رئيس محور القوات الجوية', 4, '2022-06-21 05:42:39', '2022-06-21 05:42:39'),
(101, 'رئيس محور التخطيط', 4, '2022-06-21 05:48:17', '2022-06-21 05:48:17'),
(102, 'رئيس محور تحليل الوظائف', 4, '2022-06-21 05:48:33', '2022-06-21 05:48:33'),
(103, 'المتابعة', 21, '2022-06-21 06:16:59', '2022-06-21 06:16:59'),
(104, 'صالة المراجعة', 17, '2022-06-21 06:31:46', '2022-06-21 06:31:46'),
(105, 'غرفة حفظ الوثائق', 4, '2022-06-21 10:55:02', '2022-06-21 10:55:02'),
(106, 'التفتيش', 17, '2022-06-21 12:49:42', '2022-08-09 14:59:04'),
(107, 'المدنى', 17, '2022-06-21 12:50:36', '2022-08-09 14:58:57'),
(108, 'التخطيط', 17, '2022-06-21 12:51:19', '2022-08-09 14:58:51'),
(109, 'تجديد الخدمة', 1, '2022-08-09 13:51:27', '2022-08-09 13:51:27'),
(110, 'مكتب الرائد أحمد', 11, '2022-08-15 06:38:33', '2022-08-15 06:38:33'),
(111, 'المثمن', 16, '2022-08-22 12:44:22', '2022-08-22 12:44:22'),
(112, 'المجمع', 16, '2022-08-22 14:59:08', '2022-08-22 14:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `main_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` enum('new','old','used') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `screen_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_serial` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `item_id`, `main_place`, `sub_place`, `ram`, `hd`, `cpu`, `sn`, `quantity`, `status`, `screen_type`, `screen_serial`, `deleted_at`, `created_at`, `updated_at`) VALUES
(384, 94, 'مفرزة الأمن', 'قائد مفرزة الأمن', NULL, NULL, NULL, 'CNCJ397461', 1, 'used', NULL, NULL, NULL, '2022-08-08 17:01:53', '2022-08-08 17:06:20'),
(385, 72, 'مفرزة الأمن', 'قائد مفرزة الأمن', '4', '320', 'CORE I5', 'DD8R5W1', 1, 'used', 'FUJITSU 22', 'YV8T037236', NULL, '2022-08-08 17:02:38', '2022-12-27 10:50:19'),
(386, 69, 'مفرزة الأمن', 'مكتب الامن', '4', '250', 'CORE I3', 'YLCX014564', 1, 'used', NULL, NULL, NULL, '2022-08-08 17:03:27', '2022-08-08 17:03:27'),
(387, 65, 'مفرزة الأمن', 'مكتب الامن', '2', '320', 'CORE 2 QUAD', 'YL1B013957', 1, 'used', NULL, NULL, NULL, '2022-08-08 17:04:26', '2022-08-08 17:04:26'),
(388, 95, 'مفرزة الأمن', 'مكتب الامن', NULL, NULL, NULL, 'CNCJ7760Z7', 1, 'used', NULL, NULL, NULL, '2022-08-08 17:05:44', '2022-08-08 17:05:44'),
(391, 71, 'التخطيط', 'نائب رئيس فرع  التخطيط', NULL, NULL, NULL, 'L300K41D7 12781879', 1, 'used', 'SAMSUNG 19', '00H5HKAF401017E', NULL, '2022-08-09 13:23:57', '2022-12-27 08:58:59'),
(392, 64, 'الأفراد', 'نائب رئيس فرع الافراد', '4', '500', 'CORE I5', 'YLPQ023092', 1, 'new', 'FUJITSU 22', 'YV8T035754', NULL, '2022-08-09 13:25:37', '2022-12-27 06:33:09'),
(393, 71, 'الأفراد', 'الترقي', NULL, NULL, NULL, 'L300K41D7 12784660', 1, 'used', 'GATWAY', '11303712640', NULL, '2022-08-09 13:27:23', '2022-12-27 06:57:26'),
(394, 71, 'الأفراد', 'الترقي', NULL, NULL, NULL, 'L300K41D7 12784313', 1, 'used', 'GATWAY', '11303715040', NULL, '2022-08-09 13:27:23', '2022-12-27 06:57:57'),
(395, 71, 'الأفراد', 'الترقي', NULL, NULL, NULL, 'L300K41D7 12784650', 1, 'used', 'GATWAY', '11303714740', NULL, '2022-08-09 13:28:24', '2022-12-27 06:58:23'),
(396, 71, 'الأفراد', 'الترقي', NULL, NULL, NULL, 'L300K41D7 12784534', 1, 'used', 'SAMSUNG 19', '00H5HKAF400321H', NULL, '2022-08-09 13:28:24', '2022-12-27 06:59:00'),
(397, 107, 'التخطيط', 'القوات الصديقة', NULL, NULL, NULL, 'CNC9317310', 1, 'used', NULL, NULL, NULL, '2022-08-09 13:29:57', '2022-11-20 14:36:49'),
(398, 70, 'الأفراد', 'انهاء الخدمه', '2', '250', 'CORE 2 QUAD', 'YK8D0664461', 1, 'used', 'GATWAY', '11303704340', NULL, '2022-08-09 13:31:41', '2022-12-27 06:44:51'),
(399, 67, 'الأفراد', 'انهاء الخدمه', '2', '250', 'PENTIUM', 'YKAM090191', 1, 'used', NULL, NULL, '2022-08-22 12:09:28', '2022-08-09 13:33:44', '2022-08-22 12:09:28'),
(400, 65, 'الأفراد', 'انهاء الخدمه', '2', '250', 'CORE 2 QUAD', 'YL1B013705', 1, 'used', 'SAMSUNG 19', '00H5HKAF401423E', NULL, '2022-08-09 13:34:35', '2022-12-27 06:37:00'),
(401, 108, 'الأفراد', 'انهاء الخدمه', NULL, NULL, NULL, 'CNBW74J4J3', 1, 'used', NULL, NULL, NULL, '2022-08-09 13:36:17', '2022-12-27 15:30:37'),
(402, 102, 'الأفراد', 'انهاء الخدمه', NULL, NULL, NULL, '403861', 1, 'used', NULL, NULL, NULL, '2022-08-09 13:50:43', '2022-08-09 13:50:43'),
(403, 67, 'الأفراد', 'تجديد الخدمة', '1', '250', 'PENTIUM', 'YKAM090218', 1, 'used', NULL, NULL, '2022-08-22 12:09:33', '2022-08-09 13:52:38', '2022-08-22 12:09:33'),
(404, 71, 'الأفراد', 'تجديد الخدمة', NULL, NULL, NULL, 'L300K33B7 12537099', 1, 'used', 'FUJITSU 17', 'YE7N030417', NULL, '2022-08-09 13:55:20', '2022-12-27 07:15:21'),
(405, 71, 'الأفراد', 'النقل', NULL, NULL, NULL, 'L300K44D7 12828674', 1, 'used', 'SAMSUNG 19', '00H5HKAF401023N', NULL, '2022-08-09 13:58:37', '2022-12-27 07:16:13'),
(406, 71, 'الأفراد', 'النقل', NULL, NULL, NULL, 'L300K44D7 12829353', 1, 'used', 'GATWAY', '11303702440', NULL, '2022-08-09 13:58:37', '2022-12-27 07:16:54'),
(407, 71, 'الأفراد', 'النقل', NULL, NULL, NULL, 'L300K41D7 12784674', 1, 'used', 'FUJITSU 17', 'YE7N030976', NULL, '2022-08-09 13:58:37', '2022-12-27 07:17:29'),
(408, 109, 'الأفراد', 'النقل', NULL, NULL, NULL, 'CNB8DD562K', 1, 'used', NULL, NULL, NULL, '2022-08-09 13:59:47', '2022-08-09 14:55:19'),
(409, 70, 'الأفراد', 'السفر', '2', '500', 'CORE 2 DUO', 'YK8D064559', 1, 'used', 'GATWAY', '11303720240', NULL, '2022-08-09 14:01:46', '2022-12-27 06:45:18'),
(410, 71, 'الأفراد', 'السفر', NULL, NULL, NULL, 'L300K33B7 12548758', 1, 'used', 'GATWAY', '11303713640', NULL, '2022-08-09 14:03:29', '2022-12-27 07:18:48'),
(411, 95, 'الأفراد', 'السفر', NULL, NULL, NULL, 'CNCJN53273', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:04:59', '2022-08-09 14:04:59'),
(412, 64, 'الأفراد', 'رئيس فرع الافراد', '4', '500', 'CORE I5', 'YLPQ022955', 1, 'used', 'FUJITSU 22', 'YV8T037248', NULL, '2022-08-09 14:07:08', '2022-12-27 06:34:25'),
(413, 64, 'الأفراد', 'رئيس فرع الافراد', '4', '500', 'CORE I5', 'YLPQ023073', 1, 'new', 'FUJITSU 22', 'YV8T037871', NULL, '2022-08-09 14:08:10', '2022-12-27 06:34:54'),
(414, 86, 'الأفراد', 'رئيس فرع الافراد', NULL, NULL, NULL, 'KNB030199', 1, 'new', NULL, NULL, NULL, '2022-08-09 14:08:36', '2022-08-09 14:08:36'),
(415, 64, 'الأفراد', 'سكرتاريه رئيس فرع الافراد', '2', '250', 'CORE I5', 'YLPQ022810', 1, 'used', 'FUJITSU 22', 'YV8T037242', NULL, '2022-08-09 14:09:29', '2022-12-27 06:35:16'),
(416, 71, 'الأفراد', 'سكرتاريه رئيس فرع الافراد', NULL, NULL, NULL, 'L300K42D7 12833468', 1, 'used', 'samsung 19', '00h5hkaf400516t', NULL, '2022-08-09 14:11:34', '2022-12-27 05:48:32'),
(417, 95, 'الأفراد', 'سكرتاريه رئيس فرع الافراد', NULL, NULL, NULL, 'CNCJN80411', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:12:23', '2022-08-09 14:12:23'),
(418, 65, 'الأفراد', 'القوي البشريه', '2', '320', 'CORE 2 DUO', 'YL1B013771', 1, 'used', 'FUJITSU 22', 'YV8T240389', NULL, '2022-08-09 14:14:20', '2022-12-27 06:38:55'),
(419, 65, 'الأفراد', 'القوي البشريه', '2', '250', 'CORE 2 DUO', 'YKHF011817', 1, 'used', 'HP 19', NULL, NULL, '2022-08-09 14:14:20', '2022-12-27 06:40:49'),
(420, 64, 'الأفراد', 'القوي البشريه', '4', '500', 'CORE I5', 'YLPQ023074', 1, 'used', 'FUJITSU 22', 'YV8T038009', NULL, '2022-08-09 14:14:58', '2022-12-27 06:35:50'),
(421, 72, 'الأفراد', 'القوي البشريه', '4', '320', 'CORE I5', 'JBZ3L02', 1, 'used', 'FUJITSU 22', 'YV8T207646', NULL, '2022-08-09 14:18:32', '2022-12-27 06:46:31'),
(422, 109, 'الأفراد', 'القوي البشريه', NULL, NULL, NULL, 'VNBVBCHYH', 1, 'used', NULL, NULL, '2022-12-22 09:08:39', '2022-08-09 14:19:18', '2022-12-22 09:08:39'),
(423, 102, 'الأفراد', 'القوي البشريه', NULL, NULL, NULL, '404973', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:19:55', '2022-08-09 14:55:03'),
(424, 66, 'الأفراد', 'السائقين والمهنيين', '4', '250', 'CORE I5', 'TRF31505T1', 1, 'used', 'FUJITSU 22', 'YV8T037995', NULL, '2022-08-09 14:21:28', '2022-12-27 06:43:12'),
(425, 72, 'الأفراد', 'السائقين والمهنيين', '4', '500', 'CORE I5', '147YMVL', 1, 'used', 'FUJITSU 22', 'YV8T037237', NULL, '2022-08-09 14:22:19', '2022-12-27 06:46:57'),
(426, 71, 'الأفراد', 'السائقين والمهنيين', NULL, NULL, NULL, 'L300K2BB7 1243408', 1, 'used', 'GATWAY', '1130371150', NULL, '2022-08-09 14:23:07', '2022-12-27 07:19:13'),
(427, 86, 'الأفراد', 'السائقين والمهنيين', NULL, NULL, NULL, 'KNB029970', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:23:36', '2022-08-09 14:23:36'),
(428, 89, 'الأفراد', 'السائقين والمهنيين', NULL, NULL, NULL, '403952', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:24:04', '2022-08-09 14:24:04'),
(429, 65, 'الأفراد', 'التطوع', '2', '80', 'CORE 2 QUAD', 'YL1B013828', 1, 'used', 'GATWAY', '11303712240', NULL, '2022-08-09 14:29:53', '2022-12-27 06:41:32'),
(430, 65, 'الأفراد', 'الاحصاء', '2', '250', 'CORE 2 QUAD', 'YL1B013917', 1, 'used', 'FUJITSU 17', 'YE7N029770', NULL, '2022-08-09 14:29:53', '2022-12-27 06:42:22'),
(431, 71, 'الأفراد', 'الاحصاء', NULL, NULL, NULL, 'L300K33B7 12548473', 1, 'used', 'FUJITSU 17', 'YE7NP222413', NULL, '2022-08-09 14:30:59', '2022-12-27 07:20:00'),
(432, 108, 'الأفراد', 'التطوع', NULL, NULL, NULL, 'CNBW74J5', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:34:51', '2022-08-09 14:55:13'),
(433, 95, 'الأفراد', 'الاحصاء', NULL, NULL, NULL, 'CNCJN21444', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:36:44', '2022-12-27 06:55:57'),
(434, 59, 'الأفراد', 'الاستكمال', '2', '250', 'CORE I3', 'CZC2044870', 1, 'used', 'FUJITSU 22', 'YV8T0373480', NULL, '2022-08-09 14:42:48', '2022-12-27 06:31:03'),
(435, 72, 'الأفراد', 'الاستكمال', '4', '500', 'CORE I5', '307YMV1', 1, 'used', 'HP', NULL, NULL, '2022-08-09 14:45:25', '2022-12-27 06:47:45'),
(436, 69, 'الأفراد', 'الاستكمال', '4', '320', 'CORE I7', 'YLCX022724', 1, 'used', 'FUJITSU 22', 'YV8T035819', NULL, '2022-08-09 14:46:12', '2022-12-27 06:43:54'),
(437, 71, 'الأفراد', 'الاستكمال', NULL, NULL, NULL, 'L300K44D7 12827540', 1, 'used', 'SAMSUNG 19', '00H5HKAF401454V', NULL, '2022-08-09 14:47:56', '2022-12-27 07:20:59'),
(438, 71, 'الأفراد', 'الاستكمال', NULL, NULL, NULL, 'L300K44D7 128283414', 1, 'used', 'GATWAY', '11303712040', NULL, '2022-08-09 14:47:56', '2022-12-27 07:21:24'),
(439, 81, 'الأفراد', 'الاستكمال', NULL, NULL, NULL, 'PHK6F43755', 1, 'used', NULL, NULL, NULL, '2022-08-09 14:48:47', '2022-08-09 14:55:31'),
(440, 59, 'الأفراد', 'رئيس قسم النقل', '2', '250', 'CORE I3', 'CZC209983P', 1, 'used', 'GATWAY', '11303714840', NULL, '2022-08-09 15:47:14', '2022-12-27 06:31:33'),
(441, 95, 'الأفراد', 'رئيس قسم النقل', NULL, NULL, NULL, 'CNCJN56215', 1, 'used', NULL, NULL, '2022-12-27 06:00:03', '2022-08-09 15:48:04', '2022-12-27 06:00:03'),
(442, 61, 'نظم المعلومات', 'المخزن', '2', '320', 'CORE', 'CZC040CF26', 1, 'used', NULL, NULL, NULL, '2022-08-09 15:51:51', '2022-11-20 14:41:40'),
(443, 67, 'شئون قانونيه', 'رئيس فرع شئون قانونيه', '2', '80', 'PENTIUM D', 'YKAM089986', 1, 'used', 'LG 19', '908UXWCLB4SS', NULL, '2022-08-09 15:53:44', '2022-12-27 11:04:44'),
(444, 64, 'الميزانيه', 'رئيس فرع الميزانيه', '4', '250', 'CORE I5', 'YLPQ022824', 1, 'used', 'SAMSUNG 19', '00H5HKAF400980X', NULL, '2022-08-09 15:54:30', '2022-12-27 08:42:41'),
(445, 64, 'مساعد رئيس الهيئه', 'مكتب مساعد رئيس الهيئه 2', '4', '500', 'CORE I5', 'YLPQ022784', 1, 'used', 'FUJITSU 22', 'YV8T209083', NULL, '2022-08-09 15:56:16', '2022-12-27 08:37:29'),
(446, 64, 'مساعد رئيس الهيئه', 'مكتب مساعد رئيس الهيئه 1', '4', '500', 'CORE I5', 'YLPQ023071', 1, 'used', 'FUJITSU 22', 'YV8T037264', NULL, '2022-08-09 15:56:16', '2022-12-27 08:37:03'),
(447, 81, 'مساعد رئيس الهيئه', 'مكتب مساعد رئيس الهيئه 1', NULL, NULL, NULL, 'VNH6108340', 1, 'used', NULL, NULL, NULL, '2022-08-09 15:56:52', '2022-08-09 15:56:52'),
(448, 95, 'مساعد رئيس الهيئه', 'مكتب مساعد رئيس الهيئه 2', NULL, NULL, NULL, 'CNCJP66974', 1, 'used', NULL, NULL, NULL, '2022-08-09 15:57:43', '2022-08-09 15:57:43'),
(449, 64, 'رئاسه الهيئه', 'مكتب رئيس الهيئه', '4', '500', 'CORE I5', 'YLPQ022983', 1, 'used', 'FUJITSU 22', 'YV8T037875', NULL, '2022-08-09 15:58:49', '2022-12-27 08:27:48'),
(450, 72, 'رئاسه الهيئه', 'مكتب رئيس الهيئه', '4', '500', 'CORE I5', 'J2KQ9X1', 1, 'used', 'DELL', 'CN-OUZMKC-64180-2AV-19MS', NULL, '2022-08-09 15:59:32', '2022-12-27 08:35:32'),
(451, 60, 'رئاسه الهيئه', 'سكرتاريه رئيس الهيئه', '4', '320', 'CORE I5', 'CZC1022CZR', 1, 'used', 'DELL', 'CN-0KCCCP-7Z872-2AT-A5FM', NULL, '2022-08-09 16:00:52', '2022-12-27 08:26:10'),
(452, 60, 'رئاسه الهيئه', 'سكرتاريه رئيس الهيئه', '4', '320', 'CORE I5', 'CZC1022D2D', 1, 'used', 'DELL', 'CN-0KCCCP-72872-2AT-DK3M', NULL, '2022-08-09 16:00:52', '2022-12-27 08:27:05'),
(453, 65, 'رئاسه الهيئه', 'سكرتاريه رئيس الهيئه', '4', '500', 'CORE 2 QUAD', 'YL1B013697', 1, 'used', 'FUJITSU 22', 'YV8T037857', NULL, '2022-08-09 16:01:56', '2022-12-27 08:34:23'),
(454, 82, 'رئاسه الهيئه', 'سكرتاريه رئيس الهيئه', NULL, NULL, NULL, '3223301702', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:02:33', '2022-08-09 16:02:33'),
(455, 64, 'نظم المعلومات', 'قاعه ملحقه', '8', '500', 'CORE I5', 'YLPQ023084', 1, 'used', 'FUJITSU 17', NULL, NULL, '2022-08-09 16:03:46', '2022-12-27 08:38:19'),
(456, 60, 'نظم المعلومات', 'قاعه ملحقه', '4', '320', 'CORE I5', 'CZC1022D4M', 1, 'used', 'DELL', 'CN-OU417N-64180-059-OLDU', NULL, '2022-08-09 16:04:26', '2022-12-27 08:39:10'),
(457, 59, 'نظم المعلومات', 'قاعه رئيسيه', '2', '500', 'CORE I3', 'CZC0255Z66', 1, 'used', NULL, NULL, '2022-08-14 14:35:28', '2022-08-09 16:05:32', '2022-08-14 14:35:28'),
(458, 59, 'نظم المعلومات', 'قاعه رئيسيه', '2', '500', 'CORE I3', 'CZC2044840', 1, 'used', 'FUJITSU 17', 'YE7N029387', NULL, '2022-08-09 16:05:32', '2022-12-27 08:09:00'),
(459, 63, 'سكرتاريه واداره محليه', 'رئيس فرع سكرتاريه واداره محليه', '4', '500', 'CORE I5', 'TRF3020WS5', 1, 'used', 'HP', 'CNCZ3906X7', NULL, '2022-08-09 16:06:24', '2022-12-27 10:54:53'),
(460, 71, 'سكرتاريه واداره محليه', 'رئيس فرع سكرتاريه واداره محليه', NULL, NULL, NULL, 'L300K33B7 1253715', 1, 'used', 'FUJITSU 17', 'YE2M534787', NULL, '2022-08-09 16:06:59', '2022-12-27 10:14:17'),
(461, 81, 'سكرتاريه واداره محليه', 'رئيس فرع سكرتاريه واداره محليه', NULL, NULL, NULL, 'VNH6107401', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:07:30', '2022-08-09 16:07:30'),
(462, 65, 'دراسه عمل', 'رئيس فرع دراسه عمل', '2', '320', 'CORE 2 QUAD', 'YL1B013728', 1, 'used', 'GATWAY', '11303711740', NULL, '2022-08-09 16:09:51', '2022-12-27 08:41:11'),
(463, 65, 'المتابعه', 'المتابعه', '2', '250', 'CORE 2 QUAD', 'YL1B013875', 1, 'used', 'HP', '3CQ0491PKX', NULL, '2022-08-09 16:09:51', '2022-12-27 10:52:10'),
(464, 65, 'المتابعه', 'المتابعه', '2', '320', 'CORE 2 QUAD', 'YL1B013745', 1, 'used', 'FUJITSU 17', 'YE2M537548', NULL, '2022-08-09 16:10:42', '2022-12-27 10:52:42'),
(465, 72, 'المتابعه', 'المتابعه', '4', '500', 'CORE I5', '5X32NV1', 1, 'used', 'FUJITSU 17', 'YE7N029213', NULL, '2022-08-09 16:11:19', '2022-12-27 10:51:21'),
(466, 89, 'المتابعه', 'المتابعه', NULL, NULL, NULL, '403965', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:12:32', '2022-08-09 16:12:32'),
(467, 89, 'المتابعه', 'المتابعه', NULL, NULL, NULL, '605562', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:12:32', '2022-08-09 16:12:32'),
(468, 89, 'المتابعه', 'المتابعه', NULL, NULL, NULL, '405626', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:12:32', '2022-08-09 16:12:32'),
(469, 86, 'المتابعه', 'المتابعه', NULL, NULL, NULL, 'KNB029969', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:13:04', '2022-08-09 16:13:04'),
(470, 75, 'المتابعه', 'رئيس فرع المتابعه', '2', '500', 'CORE 2 QUAD', 'CZC0255Z6M', 1, 'used', 'SAMSUNG 19', '00H5HKAF4002103', NULL, '2022-08-09 16:14:50', '2022-12-27 08:07:26'),
(471, 70, 'دراسه عمل', 'نائب رئيس فرع  دراسة عمل', '1', '250', 'CORE 2 DUO', 'YK8D064573', 1, 'used', 'LG 19', '908UXNU15095', NULL, '2022-08-09 16:16:21', '2022-12-27 07:57:49'),
(472, 60, 'دراسه عمل', 'ارشيف دراسه العمل', '4', '320', 'CORE I5', 'CZC1022CXL', 1, 'used', 'SAMSUNG 19', '00H5HKAFF400952B', NULL, '2022-08-09 16:17:08', '2022-12-27 08:16:07'),
(473, 108, 'دراسه عمل', 'ارشيف دراسه العمل', NULL, NULL, NULL, 'CNBW77J362', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:17:56', '2022-08-09 16:17:56'),
(474, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K2BB712472705', 1, 'used', 'GATWAY', '11303712840', NULL, '2022-08-09 16:24:36', '2022-12-27 09:59:35'),
(475, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K41D712784323', 1, 'used', 'SAMSUNG 19', '00H5HKFF400581Y', NULL, '2022-08-09 16:24:36', '2022-12-27 10:00:17'),
(476, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K44D712831432', 1, 'used', 'GATWAY', '11303712540', NULL, '2022-08-09 16:24:36', '2022-12-27 10:00:42'),
(477, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K41D712784656', 1, 'used', 'GATWAY', '11303721440', NULL, '2022-08-09 16:24:36', '2022-12-27 10:01:11'),
(478, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K2BB712473036', 1, 'used', 'HP', '3CQ0490RKV', NULL, '2022-08-09 16:24:36', '2022-12-27 10:02:00'),
(479, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K445D7 12839594', 1, 'used', 'GATWAY', '11303715440', NULL, '2022-08-09 16:24:36', '2022-12-27 10:02:26'),
(480, 71, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, 'L300K33B712549253', 1, 'used', 'GATWAY', '11303712740', NULL, '2022-08-09 16:24:36', '2022-12-27 10:02:59'),
(481, 88, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', NULL, NULL, NULL, '701338', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:25:15', '2022-08-09 16:25:15'),
(482, 108, 'الأفراد', 'الترقى', NULL, NULL, NULL, 'CNBW74k7l1', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:26:05', '2022-11-20 14:59:05'),
(483, 70, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', '2', '250', 'CORE 2 DUO', 'YK8D064475', 1, 'used', 'SAMSUNG 19', '00H5HKAF400470W', NULL, '2022-08-09 16:26:51', '2022-12-27 09:55:47'),
(484, 65, 'الشئون الشخصيه', 'رئبس فرع الشئون الشخصيه', '2', '250', 'CORE 2 QUAD', 'YL1B013895', 1, 'used', 'FUJITSU 17', 'YE2M545387', NULL, '2022-08-09 16:29:17', '2022-12-27 09:58:03'),
(485, 64, 'الشئون الشخصيه', 'رئبس فرع الشئون الشخصيه', '4', '500', 'CORE I5', 'YLPQ023080', 1, 'used', 'FUJITSU 22', 'YV8T037827', NULL, '2022-08-09 16:30:07', '2022-12-27 09:57:20'),
(486, 82, 'الشئون الشخصيه', 'رئبس فرع الشئون الشخصيه', NULL, NULL, NULL, '3223323234', 1, 'used', NULL, NULL, NULL, '2022-08-09 16:30:34', '2022-08-09 16:32:46'),
(487, 110, 'الأفراد', 'ارشيف الافراد', NULL, NULL, NULL, 'KMYL41216', 1, 'used', NULL, NULL, '2022-11-20 15:01:36', '2022-08-13 05:48:42', '2022-11-20 15:01:36'),
(488, 68, 'سكرتاريه واداره محليه', 'الاشاره', '4', '500', 'CORE I5', 'YLJC007124', 1, 'used', 'SAMSUNG 19', '00H5HKAFF400953R', NULL, '2022-08-13 06:11:29', '2022-12-27 10:27:25'),
(489, 109, 'سكرتاريه واداره محليه', 'الاشاره', NULL, NULL, NULL, 'VNBVB5LGCC', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:12:33', '2022-08-13 06:12:33'),
(490, 89, 'سكرتاريه واداره محليه', 'الاشاره', NULL, NULL, NULL, '403950', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:13:20', '2022-08-13 06:13:20'),
(491, 71, 'سكرتاريه واداره محليه', 'الاشاره', NULL, NULL, NULL, 'L300K44D7 12833197', 1, 'used', 'SAMSUNG 19', '00H5HKFF400951N', NULL, '2022-08-13 06:14:12', '2022-12-27 14:00:34'),
(492, 71, 'سكرتاريه واداره محليه', 'مكتب إ ت', NULL, NULL, NULL, 'L300K44D7 12831774', 1, 'used', 'SAMSUNG 19', '00H5HKAF400497X', NULL, '2022-08-13 06:19:48', '2022-12-27 10:20:19'),
(493, 71, 'سكرتاريه واداره محليه', 'مكتب الافراد', NULL, NULL, NULL, 'L300K44D7 12829380', 1, 'used', 'SAMSUNG 19', '00H5HKAF400945W', NULL, '2022-08-13 06:19:48', '2022-12-27 10:21:50'),
(494, 71, 'سكرتاريه واداره محليه', 'مكتب الماليات', NULL, NULL, NULL, 'L300K44D7 12833125', 1, 'used', 'SAMSUNG 19', '00H5HKAF401175Y', NULL, '2022-08-13 06:19:48', '2022-12-27 10:22:33'),
(495, 71, 'سكرتاريه واداره محليه', 'مكتب الماليات', NULL, NULL, NULL, 'L300K2BB712472812', 1, 'used', 'SAMSUNG 19', '00H5HKAF401656F', NULL, '2022-08-13 06:19:48', '2022-12-27 10:23:26'),
(496, 71, 'الاشغال', 'الاشغال', NULL, NULL, NULL, 'L300K41D7 12782217', 1, 'used', 'SAMSUNG 19', '00H5HKAF400967L', NULL, '2022-08-13 06:19:48', '2022-12-27 09:07:01'),
(497, 71, 'سكرتاريه واداره محليه', 'مكتب الافراد', NULL, NULL, NULL, 'L300K44D7 12833137', 1, 'used', 'SAMSUNG 19', '00H5HKAFF401017M', NULL, '2022-08-13 06:19:48', '2022-12-27 10:24:02'),
(498, 71, 'سكرتاريه واداره محليه', 'مكتب الافراد', NULL, NULL, NULL, 'L300K44D7 12833126', 1, 'used', 'SAMSUNG 19', '00H5HKAF400965M', NULL, '2022-08-13 06:19:48', '2022-12-27 10:24:40'),
(499, 95, 'سكرتاريه واداره محليه', 'مكتب إ ت', NULL, NULL, NULL, 'CNC1876456', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:23:33', '2022-08-13 06:23:33'),
(500, 95, 'سكرتاريه واداره محليه', 'مكتب الافراد', NULL, NULL, NULL, 'CNCJ877296', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:24:14', '2022-08-13 06:24:14'),
(501, 108, 'سكرتاريه واداره محليه', 'مكتب الماليات', NULL, NULL, NULL, 'CNBW74J4XH', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:25:35', '2022-08-13 06:25:35'),
(502, 71, 'اداره عسكريه', 'السجون', NULL, NULL, NULL, 'L300K33B7 12548088', 1, 'used', 'SAMSUNG 19', '00h5hhaf400204m', NULL, '2022-08-13 06:40:40', '2022-12-26 06:18:31'),
(503, 71, 'اداره عسكريه', 'الإدارة الداخلية', NULL, NULL, NULL, 'L300K44D7 12833799', 1, 'used', 'SAMSUNG 19', '00H5HKAF400474Z', NULL, '2022-08-13 06:40:40', '2022-12-27 07:49:18'),
(504, 71, 'اداره عسكريه', 'الإدارة الداخلية', NULL, NULL, NULL, 'L300K44D7 12826934', 1, 'used', 'SAMSUNG 19', '00H5HKAF401014M', NULL, '2022-08-13 06:40:41', '2022-12-27 13:55:39'),
(505, 71, 'اداره عسكريه', 'الانضباط', NULL, NULL, NULL, 'L300K33B7 12541518', 1, 'used', 'SAMSUNG 19', '00H5HKAF400533M', NULL, '2022-08-13 06:40:41', '2022-12-27 13:56:04'),
(506, 71, 'اداره عسكريه', 'المتابعة', NULL, NULL, NULL, 'L300K44D7 12833938', 1, 'used', 'SAMSUNG 19', '00H5HKAF401212Z', NULL, '2022-08-13 06:40:41', '2022-12-27 07:50:46'),
(507, 64, 'اداره عسكريه', 'الانضباط', '4', '500', 'CORE I5', 'YLPQ022903', 1, 'used', 'FUJITSU 22', 'YV8T037245', NULL, '2022-08-13 06:41:58', '2022-12-27 07:53:24'),
(508, 64, 'اداره عسكريه', 'الإدارة الداخلية', '4', '250', 'CORE I5', 'YLPQ022831', 1, 'used', 'FUJITSU 22', 'YV8T037230', NULL, '2022-08-13 06:43:07', '2022-12-27 07:53:57'),
(509, 75, 'اداره عسكريه', 'الانضباط', '2', '250', 'CORE 2 QUAD', 'CZC0255Z5V', 1, 'used', 'SAMSUNG 19', '00H5HKAF401485E', NULL, '2022-08-13 06:45:04', '2022-12-27 08:02:19'),
(510, 70, 'اداره عسكريه', 'السجون', '1', '80', 'CORE 2 DUO', 'YK8D007113', 1, 'used', 'SAMSUNG 19', '00H5HKAF401014M', NULL, '2022-08-13 06:46:17', '2022-12-27 07:54:38'),
(511, 109, 'اداره عسكريه', 'السجون', NULL, NULL, NULL, 'VNBVB4XJZB', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:47:18', '2022-12-26 06:18:31'),
(512, 89, 'اداره عسكريه', 'السجون', NULL, NULL, NULL, '405449', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:47:52', '2022-12-26 06:18:31'),
(513, 108, 'اداره عسكريه', 'الانضباط', NULL, NULL, NULL, 'CVBW82MOLY', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:49:18', '2022-12-26 06:18:31'),
(514, 64, 'التسليح', 'رئيس فرع التسليح', '4', '500', 'CORE I5', 'YLPQ022943', 1, 'used', 'FUJITSU 22', 'YV8T037347', NULL, '2022-08-13 06:51:37', '2022-12-27 08:53:27'),
(515, 82, 'التسليح', 'رئيس فرع التسليح', NULL, NULL, NULL, '3223323307', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:51:57', '2022-08-13 06:51:57'),
(516, 59, 'التسليح', 'نائب رئيس فرع التسليح', '4', '500', 'CORE I3', 'CZC204482W', 1, 'used', 'HP', '3CQ131PMKV', NULL, '2022-08-13 06:52:41', '2022-12-27 08:10:45'),
(517, 71, 'سكرتاريه واداره محليه', 'نائب رئيس فرع السكرتارية و الإدارة المحلية', NULL, NULL, NULL, 'L300K33B7 12536086', 1, 'used', 'GATWAY', '113090E94030', NULL, '2022-08-13 06:53:22', '2022-12-27 10:15:04'),
(518, 70, 'الاشغال', 'رئيس فرع الاشغال', '1.5', '80', 'CORE 2 DUO', 'YK8D007576', 1, 'used', 'DELL', 'CN-0KCCCP-72872-2AT', NULL, '2022-08-13 06:54:19', '2022-12-27 07:55:47'),
(519, 95, 'الاشغال', 'رئيس فرع الاشغال', NULL, NULL, NULL, 'CNCJN86714', 1, 'used', NULL, NULL, NULL, '2022-08-13 06:55:14', '2022-08-13 06:55:14'),
(520, 64, 'التفتيش', 'رئيس فرع التفتيش', '4', '500', 'CORE I5', 'YLPQ023055', 1, 'used', 'FUJITSU 22', 'YV8T037337', NULL, '2022-08-13 06:57:08', '2022-12-27 08:49:09'),
(521, 71, 'اداره عسكريه', 'السجون', NULL, NULL, NULL, 'L300K44D7 12834051', 1, 'used', 'FUJITSU 19', 'ye7n032573', NULL, '2022-08-13 07:00:44', '2022-12-26 06:18:31'),
(522, 81, 'التفتيش', 'رئيس فرع التفتيش', NULL, NULL, NULL, 'PHKPD42718', 1, 'used', NULL, NULL, NULL, '2022-08-13 08:12:26', '2022-12-24 08:08:46'),
(523, 64, 'شئون قانونيه', 'مستشار شئون قانونيه', '4', '500', 'CORE I5', 'YLPQ022807', 1, 'used', 'FUJITSU 22', 'YV8T037098', NULL, '2022-08-13 08:19:32', '2022-12-27 11:06:31'),
(524, 67, 'شئون قانونيه', 'ارشيف شئون قانونيه', '2', '80', 'PENTIUM D', 'YKAM090282', 1, 'used', 'FUJITSU 17', 'YE2M5335591', NULL, '2022-08-13 08:20:57', '2022-12-27 11:04:02'),
(525, 65, 'شئون قانونيه', 'الطعون', '2', '320', 'CORE 2 QUAD', 'YL1B013900', 1, 'used', 'FUJITSU 17', 'YE7N030522', NULL, '2022-08-13 08:26:07', '2022-12-27 11:05:25'),
(526, 65, 'شئون قانونيه', 'ارشيف شئون قانونيه', '2', '320', 'CORE 2 QUAD', 'YL1B013932', 1, 'used', 'FUJITSU 17', 'YE7N030770', NULL, '2022-08-13 08:26:07', '2022-12-27 11:05:54'),
(527, 70, 'نظم المعلومات', 'المناديب', '1', '80', 'CORE 2 DUO', 'YK8D007526', 1, 'used', NULL, NULL, NULL, '2022-08-13 08:27:15', '2022-09-12 16:48:03'),
(528, 59, 'شئون قانونيه', 'ارشيف شئون قانونيه', '2', '500', 'CORE I3', 'CZC204484S', 1, 'used', 'HP 17', '3CQ131BPLR', NULL, '2022-08-13 08:28:12', '2022-12-27 08:10:02'),
(529, 71, 'شئون قانونيه', 'الحوادث', NULL, NULL, NULL, 'L300K42D7 12795610', 1, 'used', 'DELL', 'CN-0KCCCP-72872-2AT-DJFM', NULL, '2022-08-13 08:29:39', '2022-12-27 11:02:11'),
(530, 71, 'شئون قانونيه', 'الشكاوى', NULL, NULL, NULL, 'L300K447D 12828744', 1, 'used', 'SAMSUNG 19', '00H5HKFF400335H', NULL, '2022-08-13 08:29:39', '2022-12-27 11:02:45'),
(531, 82, 'شئون قانونيه', 'ارشيف شئون قانونيه', NULL, NULL, NULL, '3223389138', 1, 'used', NULL, NULL, '2022-12-22 09:05:52', '2022-08-13 08:30:22', '2022-12-22 09:05:52'),
(532, 111, 'شئون قانونيه', 'ارشيف شئون قانونيه', NULL, NULL, NULL, 'AMMA203213', 1, 'used', NULL, NULL, '2022-12-22 10:18:21', '2022-08-13 08:31:40', '2022-12-22 10:18:21'),
(533, 59, 'التسليح', 'ارشيف فرع التسليح', '4', '1000', 'CORE I3', 'CZC204481J', 1, 'used', 'HP 19', '3CQ131BPMQ', NULL, '2022-08-13 08:35:02', '2022-12-27 08:11:31'),
(534, 71, 'التسليح', 'ارشيف فرع التسليح', NULL, NULL, NULL, 'L300K44D7 12833118', 1, 'used', 'SAMSUNG 19', '00H5HKAF401199B', NULL, '2022-08-13 08:41:47', '2022-12-27 08:55:58'),
(535, 71, 'التسليح', 'ارشيف فرع التسليح', NULL, NULL, NULL, 'L300K33B7 12528751', 1, 'used', 'SAMSUNG 19', '00H5HKAF401441W', NULL, '2022-08-13 08:41:47', '2022-12-27 08:56:38'),
(536, 71, 'التسليح', 'ارشيف فرع التسليح', NULL, NULL, NULL, 'L300K44D7 12826951', 1, 'used', 'FUJITSU 22', 'YV8T037282', NULL, '2022-08-13 08:43:58', '2022-12-27 08:57:05'),
(537, 67, 'التسليح', 'ارشيف فرع التسليح', '1', '250', 'PENTIUM D', 'YKAM090296', 1, 'used', 'HP 19', 'CNC010R5RZ', NULL, '2022-08-13 08:44:46', '2022-12-27 08:54:52'),
(538, 89, 'التسليح', 'ارشيف فرع التسليح', NULL, NULL, NULL, '405382', 1, 'used', NULL, NULL, NULL, '2022-08-13 08:45:26', '2022-08-13 08:45:26'),
(539, 95, 'التسليح', 'ارشيف فرع التسليح', NULL, NULL, NULL, 'CNCJN56215', 1, 'used', NULL, NULL, NULL, '2022-08-13 08:46:11', '2022-08-13 08:46:11'),
(540, 71, 'التعبئه', 'التفتيش', NULL, NULL, NULL, 'L300K44D7 12827214', 1, 'used', 'GATWAY', '11303713040', NULL, '2022-08-13 08:59:03', '2022-12-27 09:44:08'),
(541, 71, 'التعبئه', 'المدنى', NULL, NULL, NULL, 'L300K44D7 12833445', 1, 'used', 'SAMSUNG 19', '00H5HKFF400970X', NULL, '2022-08-13 08:59:03', '2022-12-27 09:44:50'),
(542, 71, 'التعبئه', 'التفتيش', NULL, NULL, NULL, 'L300K2BB7 12473057', 1, 'used', 'GATWAY', '11303703940', NULL, '2022-08-13 08:59:03', '2022-12-27 09:45:48'),
(543, 71, 'التعبئه', 'التخطيط', NULL, NULL, NULL, 'L300K44D7 12828745', 1, 'used', 'SAMSUNG 19', '00H5HKAF401645J', NULL, '2022-08-13 08:59:03', '2022-12-27 09:46:20'),
(544, 71, 'التعبئه', 'رئيس فرع التعبئه', NULL, NULL, NULL, 'L300K44D7 12831314', 1, 'used', 'SAMSUNG 19', '00H5HKAF401208D', NULL, '2022-08-13 08:59:03', '2022-12-27 09:46:50'),
(545, 71, 'التعبئه', 'التدريب والعمليات و الأرشيف', NULL, NULL, NULL, 'L300K44D7 12831450', 1, 'used', 'FUJITSU 17', NULL, NULL, '2022-08-13 08:59:03', '2022-12-27 09:47:12'),
(546, 71, 'التعبئه', 'الاستكمال', NULL, NULL, NULL, 'L300K41D7 12784640', 1, 'used', 'GATWAY', '11303713540', NULL, '2022-08-13 08:59:03', '2022-12-27 09:47:37'),
(547, 71, 'التعبئه', 'التدريب والعمليات و الأرشيف', NULL, NULL, NULL, 'L300K41D7 12784309', 1, 'used', 'GATWAY', '11303712340', NULL, '2022-08-13 08:59:03', '2022-12-27 09:48:00'),
(548, 71, 'التعبئه', 'الاستكمال', NULL, NULL, NULL, 'L300K44D7 12828929', 1, 'used', 'GATWAY', '11303711940', NULL, '2022-08-13 08:59:04', '2022-12-27 09:48:27'),
(549, 71, 'التعبئه', 'التدريب والعمليات و الأرشيف', NULL, NULL, NULL, 'L300K44D7 12828672', 1, 'used', 'SAMSUNG 19', '00H5HKFF400433M', NULL, '2022-08-13 08:59:04', '2022-12-27 09:51:36'),
(550, 71, 'التعبئه', 'الاستكمال', NULL, NULL, NULL, 'L300K44D7 12833813', 1, 'used', 'SAMSUNG 19', '00H5HKAF401099M', NULL, '2022-08-13 08:59:04', '2022-12-27 09:52:43'),
(551, 70, 'التعبئه', 'صالة المراجعة', '1', '250', 'CORE 2 DUO', 'YK8D106537', 1, 'used', 'GATWAY', '11303713240', NULL, '2022-08-13 09:00:21', '2022-12-27 07:56:47'),
(552, 65, 'التعبئه', 'التدريب والعمليات و الأرشيف', '2', '320', 'CORE 2 QUAD', 'YL1B013916', 1, 'used', 'SAMSUNG 19', '00H5HKFF400985F', NULL, '2022-08-13 09:01:18', '2022-12-27 09:54:11'),
(553, 108, 'التعبئه', 'التفتيش', NULL, NULL, NULL, 'CNBW74L2KW', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:03:30', '2022-08-13 09:03:30'),
(554, 82, 'التعبئه', 'صالة المراجعة', NULL, NULL, NULL, '3223266982', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:03:58', '2022-08-13 09:03:58'),
(555, 67, 'التعبئه', 'مستشار رئيس الهيئه للتعبئه', '1', '250', 'PENTIUM', 'YKAM0899884', 1, 'used', 'FUJITSU 17', NULL, NULL, '2022-08-13 09:08:19', '2022-12-27 09:54:47'),
(556, 62, 'المراسم', 'ارشيف المراسم', '4', '500', 'CORE I5', 'YM1M005562', 1, 'used', 'FUJITSU 22', 'YV8U013506', NULL, '2022-08-13 09:12:33', '2022-12-27 10:08:14'),
(557, 66, 'المراسم', 'ارشيف المراسم', '4', '320', 'CORE I5', 'TRF33200JF', 1, 'used', 'HP', '3CQ131BNTV', NULL, '2022-08-13 09:13:41', '2022-12-27 10:09:07'),
(558, 66, 'المراسم', 'رئيس فرع المراسم', '4', '500', 'CORE I5', 'TRF33200HJ', 1, 'used', 'HP', '6CM3290NNH', NULL, '2022-08-13 09:13:41', '2022-12-27 10:09:39'),
(559, 61, 'المراسم', 'ارشيف المراسم', '2', '320', 'PENTIUM D', 'CZC040C7G9', 1, 'used', 'HP', '3CQ0491PJF', NULL, '2022-08-13 09:15:23', '2022-12-27 10:06:51'),
(560, 61, 'المراسم', 'ارشيف المراسم', '2', '320', 'PENTIUM D', 'CZC0404SHK', 1, 'used', 'HP', '3CQ0490S8F', NULL, '2022-08-13 09:15:23', '2022-12-27 10:07:35'),
(561, 59, 'المراسم', 'ارشيف المراسم', '4', '500', 'CORE I3', 'CZC204487P', 1, 'used', 'HP', '6CM3290NNF', NULL, '2022-08-13 09:16:12', '2022-12-27 10:05:56'),
(562, 83, 'المراسم', 'رئيس فرع المراسم', NULL, NULL, NULL, 'NKB168668', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:16:56', '2022-08-13 09:16:56'),
(563, 86, 'المراسم', 'ارشيف المراسم', NULL, NULL, NULL, 'KNB030170', 1, 'used', NULL, NULL, '2022-08-22 15:07:15', '2022-08-13 09:17:29', '2022-08-22 15:07:15'),
(564, 82, 'المراسم', 'ارشيف المراسم', NULL, NULL, NULL, '3223323366', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:17:49', '2022-08-13 09:17:49'),
(565, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K45D7 12839672', 1, 'used', 'GATWAY', '11303714540', NULL, '2022-08-13 09:31:20', '2022-12-27 14:05:55'),
(566, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K41D7 12784639', 1, 'used', 'SAMSUNG 19', '00H5HKFF400894T', NULL, '2022-08-13 09:31:20', '2022-12-27 14:06:38'),
(567, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K2BB7 12473110', 1, 'used', 'SAMSUNG 19', '00H5HKFF401540W', NULL, '2022-08-13 09:31:20', '2022-12-27 14:07:22'),
(568, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K41D7 12784316', 1, 'used', 'FUJITSU 17', 'YE7N030388', NULL, '2022-08-13 09:31:20', '2022-12-27 14:08:02'),
(569, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K33B7 12541371', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:31:20', '2022-08-13 09:31:20'),
(570, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K33B7 12548441', 1, 'used', 'HP', 'CNC010R5MB', NULL, '2022-08-13 09:31:20', '2022-12-27 14:10:12'),
(571, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K44D7 12833703', 1, 'used', 'SAMSUNG 19', '00H5HKAF4013798', NULL, '2022-08-13 09:31:20', '2022-12-27 14:08:37'),
(572, 71, 'التنظيم والمرتبات', 'صاله 2', NULL, NULL, NULL, 'L300K33B7 12549350', 1, 'used', 'SAMSUNG 19', '00H5HKAF401473W', NULL, '2022-08-13 09:31:20', '2022-12-27 14:11:33'),
(573, 71, 'التنظيم والمرتبات', 'صاله 2', NULL, NULL, NULL, 'L300K44D7 12831766', 1, 'used', 'FUJITSU 17', 'YE7N030679', NULL, '2022-08-13 09:31:20', '2022-12-27 14:12:38'),
(574, 71, 'التنظيم والمرتبات', 'صاله 2', NULL, NULL, NULL, 'L300K44D7 12833910', 1, 'used', 'GATWAY', '11303710440', NULL, '2022-08-13 09:31:20', '2022-12-27 14:13:26'),
(575, 71, 'التنظيم والمرتبات', 'صاله 2', NULL, NULL, NULL, 'L300K44D7 12826924', 1, 'used', 'SAMSUNG 19', '00H5HKAF401220A', NULL, '2022-08-13 09:31:20', '2022-12-27 14:14:14'),
(576, 71, 'التنظيم والمرتبات', 'صاله 2', NULL, NULL, NULL, 'L300K44D7 12831316', 1, 'used', 'SAMSUNG 19', '00H5HKAF401900A', NULL, '2022-08-13 09:31:20', '2022-12-27 14:17:21'),
(577, 71, 'التنظيم والمرتبات', 'رئيس محور تحليل الوظائف', NULL, NULL, NULL, 'L300K42B7 12795619', 1, 'used', 'SAMSUNG 19', '00H5HKFF401493R', NULL, '2022-08-13 09:31:20', '2022-12-27 14:16:45'),
(578, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K2BB7 12473985', 1, 'used', 'SAMSUNG 19', '00H5HKAF40006T', NULL, '2022-08-13 09:31:20', '2022-12-27 14:18:10'),
(579, 71, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'L300K2BB7 12472498', 1, 'used', 'GATWAY', '11303711040', NULL, '2022-08-13 09:31:20', '2022-12-27 14:18:49'),
(580, 70, 'التنظيم والمرتبات', 'رئيس محور الدفاع الجوى', '1', '250', 'CORE 2 DUO', 'YK8D064498', 1, 'used', 'HP 19', 'CNC0L0R5TF', NULL, '2022-08-13 09:32:23', '2022-12-27 07:58:57'),
(581, 112, 'التنظيم والمرتبات', 'مكتب العميد محمد عبد الغنى', '1', '250', 'CORE 2 DUO', 'YK8D106266', 1, 'used', 'SAMSUNG 19', '00H5HKAF401464Z', NULL, '2022-08-13 09:34:50', '2022-12-27 14:24:03'),
(582, 113, 'التنظيم والمرتبات', 'صاله 1', '8', '1000', 'CORE I5', '4GY5MX2', 1, 'new', 'DELL + GATWAY', 'CN-01MZXX-QDC00-8BC-3GR-A0B', NULL, '2022-08-13 09:47:00', '2022-12-27 14:21:31'),
(583, 113, 'نظم المعلومات', 'المخزن', '8', '1000', 'CORE I5', 'CH3XBY2', 1, 'new', NULL, NULL, NULL, '2022-08-13 09:47:00', '2022-08-13 09:47:00'),
(584, 65, 'التنظيم والمرتبات', 'صاله 1', '2', '80', 'CORE 2 QUAD', 'YL1B013768', 1, 'used', 'SAMSUNG 19', '00H5HKAF401195J', NULL, '2022-08-13 09:48:01', '2022-12-27 10:58:03'),
(585, 72, 'اداره عسكريه', 'رئيس فرع اداره عسكريه', '4', '500', 'CORE I5', '4G33N41', 1, 'used', 'HP 19', '3CQ131BNGW', NULL, '2022-08-13 09:50:23', '2022-12-27 08:01:28'),
(586, 60, 'الميزانية', 'الميزانية', '2', '320', 'CORE I5', 'CZC1022CWW', 1, 'used', 'HP 19', NULL, NULL, '2022-08-13 09:52:35', '2022-12-27 08:12:27'),
(587, 60, 'الميزانيه', 'الميزانيه', '2', '80', 'CORE I5', 'CZC1022D3V', 1, 'used', 'FUJITSU 22', 'YV8T037292', NULL, '2022-08-13 09:53:15', '2022-12-27 08:12:59'),
(588, 82, 'الميزانيه', 'الميزانيه', NULL, NULL, NULL, '322322188', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:53:58', '2022-08-13 09:53:58'),
(589, 82, 'الميزانيه', 'الميزانيه', NULL, NULL, NULL, '3223267130', 1, 'used', NULL, NULL, NULL, '2022-08-13 09:53:58', '2022-12-24 08:07:08'),
(590, 64, 'الميزانيه', 'الميزانيه', '2', '500', 'CORE I5', 'YLPQ023091', 1, 'used', 'FUJITSU 22', 'YV8T037268', NULL, '2022-08-13 09:54:42', '2022-12-27 08:43:13'),
(591, 71, 'التخطيط', 'القوات الصديقة', NULL, NULL, NULL, 'L300K44D7 12827194', 1, 'used', 'DELL', 'CV-0KCCCB-72872-2AT-A6KM', NULL, '2022-08-13 10:14:04', '2022-12-27 08:58:28'),
(592, 71, 'التخطيط', 'القوات الصديقة', NULL, NULL, NULL, 'L300K44D7 12833648', 1, 'used', 'SAMSUNG 19', '00H5HKAF401490K', NULL, '2022-08-13 10:14:04', '2022-12-27 08:59:36'),
(593, 71, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', NULL, NULL, NULL, 'L300K41D7 12783913', 1, 'used', 'SAMSUNG 19', '00H5HKAFF400935A', NULL, '2022-08-13 10:14:04', '2022-12-27 09:00:07'),
(594, 71, 'التخطيط', 'مكتب ضباط فرع التخطيط', NULL, NULL, NULL, 'L300K2BB7 12473977', 1, 'used', 'DELL', 'CN-0KCCCB-72872-2AT-A5TM', NULL, '2022-08-13 10:14:04', '2022-12-27 09:01:02'),
(595, 71, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', NULL, NULL, NULL, 'L300K44D7 12833120', 1, 'used', 'SAMSUNG 19', '00H5HKAFF401016Y', NULL, '2022-08-13 10:14:04', '2022-12-27 09:01:42'),
(596, 71, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', NULL, NULL, NULL, 'L300K44D7 12829253', 1, 'used', 'SAMSUNG 19', '00H5HKAF401485M', NULL, '2022-08-13 10:14:04', '2022-12-27 09:02:32'),
(597, 71, 'التفتيش', 'أرشيف التفتيش', NULL, NULL, NULL, 'L300K44D7 12827211', 1, 'used', 'SAMSUNG 19', '00H5HKAF4004833', NULL, '2022-08-13 10:14:04', '2022-12-27 08:47:06'),
(598, 82, 'التخطيط', 'رئيس فرع التخطيط', NULL, NULL, NULL, '3223301460', 1, 'used', NULL, NULL, NULL, '2022-08-13 10:24:52', '2022-08-13 10:24:52'),
(599, 72, 'نظم المعلومات', 'نائب رئيس فرع  نظم المعلومات', '4', '500', 'CORE I5', 'Jwymv1', 1, 'used', NULL, NULL, NULL, '2022-08-13 10:34:29', '2022-08-13 10:34:29'),
(600, 72, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', '6v6xmu1', 1, 'used', NULL, NULL, NULL, '2022-08-13 10:34:29', '2022-08-13 10:34:29'),
(601, 72, 'الحمله', 'الحمله', '4', '320', 'CORE I5', 'Hc8r5w1', 1, 'used', NULL, NULL, NULL, '2022-08-13 10:34:30', '2022-08-13 10:34:30'),
(602, 72, 'الشئون الشخصيه', 'ارشيف الشئون الشخصية', '4', '320', 'CORE I5', '9Q41NV1', 1, 'used', 'GATWAY', '11303710040', NULL, '2022-08-13 10:34:30', '2022-12-27 09:58:40'),
(603, 64, 'شئون ظباط', 'ارشيف شئون ظباط', '4', '500', 'CORE I5', 'YLPQ023007', 1, 'used', 'FUJITSU 22', 'YV8T037249', NULL, '2022-08-13 10:36:20', '2022-12-27 14:30:52'),
(604, 65, 'شئون ظباط', 'ارشيف شئون ظباط', '2', '320', 'CORE 2 QUAD', 'YL1B013809', 1, 'used', 'FUJITSU 17', 'YE7N029873', NULL, '2022-08-13 10:37:01', '2022-12-27 10:59:03'),
(605, 109, 'شئون ظباط', 'ارشيف شئون ظباط', NULL, NULL, NULL, 'VNBQD9V15P', 1, 'used', NULL, NULL, NULL, '2022-08-13 10:37:50', '2022-08-13 10:37:50'),
(606, 64, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', '2', '250', 'CORE I5', 'YLPQ022804', 1, 'used', 'FUJITSU 22', 'YV8T038049', NULL, '2022-08-14 13:49:13', '2022-12-27 08:51:28'),
(607, 64, 'التخطيط', 'مكتب ضباط فرع التخطيط', '4', '500', 'CORE I5', 'YLPQ022806', 1, 'used', 'SAMSUNG 19', '00H5HKAF400480K', NULL, '2022-08-14 13:51:29', '2022-12-27 08:52:07'),
(608, 64, 'التخطيط', 'مكتب ضباط فرع التخطيط', '4', '500', 'CORE I5', 'YLPQ022959', 1, 'used', 'SAMSUNG 19', '00H5HKFF401045X', NULL, '2022-08-14 13:51:29', '2022-12-27 08:52:38'),
(609, 89, 'شئون ظباط', 'ارشيف شئون ظباط', NULL, NULL, NULL, '403949', 1, 'used', NULL, NULL, NULL, '2022-08-14 13:52:35', '2022-08-14 13:52:35'),
(610, 75, 'التفتيش', 'نائب رئيس فرع التفتيش', '4', '500', 'CORE I5', 'CZC0255Z67', 1, 'used', 'HP 19', 'CNC010R5LX', NULL, '2022-08-14 13:56:06', '2022-12-27 08:06:32'),
(611, 64, 'التنظيم والمرتبات', 'رئيس فرع التنظيم والمرتبات', '4', '500', 'CORE I5', 'YLPQ022909', 1, 'used', 'LG 19', '908UXLS16240', NULL, '2022-08-14 14:14:07', '2022-12-27 14:26:17'),
(612, 75, 'نظم المعلومات', 'قاعه رئيسيه', '4', '500', 'CORE I3', 'CZC0255Z6G', 1, 'used', 'HP 17', 'CNC010R5MU', NULL, '2022-08-14 14:36:05', '2022-12-27 08:05:31'),
(613, 59, 'الأفراد', 'ارشيف الافراد', '2', '500', 'CORE I3', 'CZC204486Z', 1, 'used', 'HP 19', '3C9131PNWP', NULL, '2022-08-14 14:36:48', '2022-12-27 06:30:00'),
(614, 75, 'مجمع خدمه المواطنين', 'قائد مجمع خدمة المواطنين', '2', '500', 'CORE I3', 'CZC 0255Z75', 1, 'used', 'FUJITSU 17', 'YE7N030337', NULL, '2022-08-14 14:38:34', '2022-12-27 08:08:14'),
(615, 75, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I3', 'CZC 0255Z5R', 1, 'used', NULL, NULL, NULL, '2022-08-14 14:38:34', '2022-08-14 14:38:34'),
(616, 65, 'التخطيط', 'رئيس فرع التخطيط', '2', '250', 'CORE 2 DUO', 'Yl1b013691', 1, 'used', 'FUJITSU 22', 'YV8T035753', NULL, '2022-08-14 14:44:21', '2022-12-27 10:56:43'),
(617, 65, 'شئون ظباط', 'رئيس فرع شئون ظباط', '2', '250', 'CORE 2 QUAD', 'Yl1b013962', 1, 'used', NULL, NULL, NULL, '2022-08-14 14:45:10', '2022-08-14 14:45:10'),
(618, 114, 'المراسم', 'مستشار رئيس الهيئه فرع المراسم', '2', '320', 'CORE 2 QUAD', 'Yl1b013882', 1, 'used', 'DELL', 'CN-0KCCCP-728722-ATE76M', NULL, '2022-08-14 14:47:32', '2022-12-27 09:04:43'),
(619, 114, 'سكرتاريه واداره محليه', 'الاشاره', '2', '250', 'CORE 2 QUAD', 'Yl1b 013891', 1, 'used', 'HP', '3CQ122N0JB', NULL, '2022-08-14 14:47:32', '2022-12-27 09:05:53'),
(620, 114, 'التخطيط', 'منوب العمليات', '4', '500', 'CORE 2 QUAD', 'YL1B013899', 1, 'used', 'FUJITSU 17', 'YE7N029233', NULL, '2022-08-14 14:47:32', '2022-12-27 09:03:37'),
(621, 112, 'التنظيم والمرتبات', 'مستشار رئيس الهيئه للتنظيم', '2', '250', 'CORE 2 DUO', 'Yk8d106865', 1, 'used', NULL, NULL, NULL, '2022-08-14 14:51:02', '2022-08-14 14:51:02'),
(622, 112, 'مجمع خدمه المواطنين', 'صاله المجمع', '2', '320', 'CORE 2 DUO', 'YK8D007577', 1, 'used', 'FUJITSU 17', 'YE2M535455', NULL, '2022-08-14 14:51:03', '2022-12-27 14:04:27'),
(623, 67, 'الحمله', 'الحمله', '4', '250', 'PENTIUM D', 'Ykam090194', 1, 'used', NULL, NULL, NULL, '2022-08-14 14:52:46', '2022-08-14 14:52:46'),
(624, 115, 'شئون قانونية', 'الشكاوى', '2', '80', 'PENTIUM D', 'YKAM156818', 1, 'used', NULL, NULL, '2022-12-24 07:49:49', '2022-08-14 14:55:13', '2022-12-24 07:49:49'),
(625, 115, 'نظم المعلومات', 'المخزن', NULL, NULL, 'PENTIUM D', 'YKAM146954', 1, 'used', NULL, NULL, NULL, '2022-08-14 14:55:14', '2022-08-22 15:02:44'),
(626, 115, 'نظم المعلومات', 'المخزن', NULL, NULL, 'PENTIUM D', 'YKAM090253', 1, 'used', NULL, NULL, '2022-12-22 10:10:11', '2022-08-14 14:55:14', '2022-12-22 10:10:11'),
(627, 60, 'شئون ظباط', 'رئيس فرع شئون ظباط', '4', '500', 'CORE I5', 'CZC1022D04', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:02:14', '2022-08-14 15:02:14'),
(628, 60, 'شئون ظباط', 'رئيس فرع شئون ظباط', '4', '500', 'CORE I5', 'CZC 0516DB0', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:02:14', '2022-08-14 15:02:14'),
(629, 60, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', NULL, NULL, 'CORE I5', 'CZC1022D1P', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:02:15', '2022-08-14 15:02:15'),
(630, 60, 'نظم المعلومات', 'المخزن', NULL, NULL, 'CORE I5', 'CZC1022X83', 1, 'used', NULL, NULL, '2022-12-22 12:54:37', '2022-08-14 15:02:15', '2022-12-22 12:54:37'),
(631, 74, 'اداره عسكريه', 'رئيس فرع اداره عسكريه', NULL, NULL, NULL, 'PHCPC47269', 1, 'new', NULL, NULL, NULL, '2022-08-14 15:07:11', '2022-12-26 06:18:31'),
(632, 76, 'نظم المعلومات', 'المناديب', NULL, NULL, NULL, 'JPRTD9W294', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:09:40', '2022-08-14 15:09:40'),
(633, 95, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', NULL, NULL, NULL, 'CNCJZ19772', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:14:49', '2022-08-14 15:14:49'),
(634, 89, 'التخطيط', 'العمليات و التدريب و الأرشيف العام', NULL, NULL, NULL, '402796', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:16:13', '2022-08-14 15:16:13'),
(635, 82, 'مجمع خدمه المواطنين', 'صاله المجمع', NULL, NULL, NULL, '322323323', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:17:12', '2022-08-22 16:21:18'),
(636, 81, 'التنظيم والمرتبات', 'مستشار رئيس الهيئه للتنظيم', NULL, NULL, NULL, 'VNH5H0015H', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:18:46', '2022-08-14 15:18:46'),
(637, 86, 'التنظيم والمرتبات', 'صاله 1', NULL, NULL, NULL, 'KNB032640', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:22:42', '2022-08-14 15:22:42'),
(638, 82, 'التنظيم والمرتبات', 'رئيس فرع التنظيم والمرتبات', NULL, NULL, NULL, '3225301745', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:23:23', '2022-08-14 15:23:23'),
(639, 86, 'شئون قانونيه', 'التحقيقات', NULL, NULL, NULL, 'KNP033425', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:32:41', '2022-08-14 15:32:41'),
(640, 91, 'مجمع خدمه المواطنين', 'صاله المجمع', NULL, NULL, NULL, 'R7DW091088', 1, 'new', NULL, NULL, NULL, '2022-08-14 15:34:22', '2022-08-14 15:34:22'),
(641, 91, 'الميزانيه', 'الميزانيه', NULL, NULL, NULL, 'RZDW091096', 1, 'new', NULL, NULL, NULL, '2022-08-14 15:34:22', '2022-08-14 15:43:42'),
(642, 81, 'نظم المعلومات', 'الصيانه', NULL, NULL, NULL, 'PHKPD42170', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:38:48', '2022-08-14 15:38:48'),
(643, 81, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'PHKBD42258', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:38:48', '2022-08-14 15:38:48'),
(644, 82, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, '3223266737', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:40:08', '2022-08-14 15:40:08'),
(645, 82, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, '3223323188', 1, 'used', NULL, NULL, '2022-12-22 09:07:09', '2022-08-14 15:40:08', '2022-12-22 09:07:09'),
(646, 92, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'JPBBF39084', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:40:48', '2022-08-14 15:40:48'),
(647, 86, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'KNB030014', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:43:01', '2022-08-14 15:43:01'),
(648, 86, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'KNB029953', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:43:01', '2022-08-14 15:43:01'),
(649, 86, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'KNB030051', 1, 'used', NULL, NULL, NULL, '2022-08-14 15:43:01', '2022-08-14 15:43:01'),
(650, 64, 'نظم المعلومات', 'مكتب الرائد محمد', '4', '500', 'CORE I5', 'YLPQ023090', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:36:13', '2022-08-15 06:36:13'),
(651, 64, 'نظم المعلومات', 'مكتب الرائد محمد', '4', '500', 'CORE I5', 'YLPQ022923', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:36:13', '2022-11-20 17:58:13'),
(652, 64, 'نظم المعلومات', 'مكتب الميكروجرافيك', '4', '500', 'CORE I5', 'YLPQ022958', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:43:44', '2022-08-15 06:43:44'),
(653, 64, 'نظم المعلومات', 'نائب رئيس فرع  نظم المعلومات', '4', '500', 'CORE I5', 'YLPQ022812', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:43:44', '2022-08-15 06:43:44'),
(654, 64, 'نظم المعلومات', 'مكتب الرائد أحمد', '4', '500', 'CORE I5', 'YLPQ023094', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:43:44', '2022-08-15 06:43:44'),
(655, 64, 'نظم المعلومات', 'مكتب النقيب عبدالمنعم', '4', '500', 'CORE I5', 'YLPQ023038', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:43:44', '2022-08-15 06:43:44'),
(656, 64, 'نظم المعلومات', 'مكتب النقيب عبدالمنعم', '4', '500', 'CORE I5', 'YLPQ022832', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:43:44', '2022-08-15 06:43:44'),
(657, 69, 'نظم المعلومات', 'مكتب الرائد أحمد', '4', '500', 'CORE I5', 'YLCX014695', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:45:48', '2022-08-15 06:45:48'),
(658, 80, 'نظم المعلومات', 'ارشيف نظم المعلومات', NULL, NULL, NULL, 'JPSN89LGOK', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:54:19', '2022-08-15 06:54:19'),
(659, 108, 'نظم المعلومات', 'نائب رئيس فرع  نظم المعلومات', NULL, NULL, NULL, 'CNBW86R22N', 1, 'used', NULL, NULL, NULL, '2022-08-15 06:55:54', '2022-08-15 06:55:54'),
(660, 64, 'نظم المعلومات', 'ارشيف نظم المعلومات', '4', '500', 'CORE I5', 'YLPQ023077', 1, 'used', NULL, NULL, NULL, '2022-08-15 07:02:56', '2022-08-15 07:02:56'),
(661, 64, 'نظم المعلومات', 'الصيانه', '8', '1000', 'CORE I5', 'YLPQ022808', 1, 'used', NULL, NULL, NULL, '2022-08-15 07:02:56', '2022-08-22 12:53:01'),
(662, 64, 'نظم المعلومات', 'الصيانه', '16', '1000', 'CORE I5', 'YLPQ022890', 1, 'used', NULL, NULL, NULL, '2022-08-15 07:06:28', '2022-08-15 07:06:28'),
(663, 73, 'نظم المعلومات', 'الصيانه', NULL, NULL, NULL, '3152432525', 1, 'used', NULL, NULL, NULL, '2022-08-22 07:03:21', '2022-08-22 07:03:21'),
(664, 64, 'الأفراد', 'رئيس قسم الإستكمال', '4', '500', 'CORE I5', 'YLPQ022935', 1, 'used', 'FUJITSU 22', 'YV8T037851', NULL, '2022-08-22 11:35:39', '2022-12-27 06:33:49'),
(665, 115, 'الأفراد', 'انهاء الخدمه', '2', '250', 'PENTIUM', 'YKAM090191', 1, 'used', 'SAMSUNG 19', '00H5HKAF400501W', NULL, '2022-08-22 12:08:15', '2022-12-27 06:54:04'),
(666, 115, 'الأفراد', 'تجديد الخدمة', '1', '250', 'PENTIUM', 'YKAM090218', 1, 'used', 'FUJITSU 19', 'YE7N030012', NULL, '2022-08-22 12:09:14', '2022-12-27 06:54:42'),
(667, 113, 'الأفراد', 'السائقين والمهنيين', '8', '1000', 'CORE I5', 'F2SWBY2', 1, 'new', 'DELL', 'CN-01M2XX-QDC0095936MU-A08', NULL, '2022-08-22 12:19:22', '2022-12-27 06:51:50'),
(668, 113, 'الأفراد', 'الاحصاء', '8', '1000', 'CORE I5', '6J3XBY2', 1, 'new', 'DELL', 'CN-01M2XX-QDC0094UOCF-A08', NULL, '2022-08-22 12:19:22', '2022-12-27 06:53:04'),
(669, 74, 'القياده الاستراتيجيه', 'المثمن', NULL, NULL, NULL, 'PHC6B91163', 1, 'new', NULL, NULL, NULL, '2022-08-22 12:44:47', '2022-08-22 12:44:47'),
(670, 84, 'التعبئه', 'صالة المراجعة', NULL, NULL, NULL, NULL, 1, 'used', NULL, NULL, NULL, '2022-08-22 12:47:41', '2022-08-22 12:47:41'),
(671, 90, 'نظم المعلومات', 'المناديب', NULL, NULL, NULL, NULL, 1, 'used', NULL, NULL, NULL, '2022-08-22 12:48:05', '2022-08-22 12:48:05'),
(672, 64, 'نظم المعلومات', 'المناديب', '4', '500', 'CORE I5', 'YLPQ023053', 1, 'used', NULL, NULL, NULL, '2022-08-22 12:53:22', '2022-08-22 12:53:22'),
(673, 64, 'شئون ظباط', 'رئيس فرع شئون ظباط', '4', '500', 'CORE I5', 'YLPQ023071', 1, 'used', NULL, NULL, NULL, '2022-08-22 13:51:42', '2022-08-22 13:51:42'),
(674, 64, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', 'YLPQ023058', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(675, 64, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', 'YLPQ023037', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(676, 64, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', 'YLPQ 022951', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(677, 64, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', 'YLPQ 023086', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(678, 64, 'نظم المعلومات', 'غرفه السيرفر', '4', '500', 'CORE I5', 'YLPQ 022837', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(679, 64, 'نظم المعلومات', 'المخزن', '4', '500', 'CORE I5', 'YLPQ022968', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:06:36', '2022-08-22 14:06:36'),
(680, 64, 'نظم المعلومات', 'الصيانه', '4', '500', 'CORE I5', 'YLPQ022932', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:52:11', '2022-08-22 14:53:40'),
(681, 64, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', '4', '500', 'CORE I5', 'YLPQ 023051', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:55:26', '2022-08-22 14:55:26'),
(682, 64, 'نظم المعلومات', 'المناديب', '4', '500', 'CORE I5', 'YLPQ022834', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:55:26', '2022-11-20 17:58:44'),
(683, 64, 'مجمع خدمه المواطنين', 'صاله المجمع', '4', '500', 'CORE I5', 'YLPQ022991', 1, 'used', NULL, NULL, '2022-08-22 16:18:28', '2022-08-22 14:58:49', '2022-08-22 16:18:28'),
(684, 64, 'مجمع خدمه المواطنين', 'صاله المجمع', '4', '500', 'CORE I5', 'YLPQ022994', 1, 'used', 'SAMSUNG 19', '00H5HKFF400449E', NULL, '2022-08-22 14:58:49', '2022-12-27 14:02:06'),
(685, 64, 'القياده الاستراتيجيه', 'المثمن', '4', '500', 'CORE I5', 'YLPQ 022817', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:58:49', '2022-08-22 14:58:49'),
(686, 64, 'القياده الاستراتيجيه', 'المجمع', '4', '500', 'CORE I5', 'YLPQ 022893', 1, 'used', NULL, NULL, NULL, '2022-08-22 14:59:42', '2022-08-22 14:59:42'),
(687, 82, 'الشئون الشخصيه', 'أرشيف الشئون الشخصيه', NULL, NULL, NULL, '3223300277', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:05:58', '2022-11-20 15:08:54'),
(688, 117, 'المراسم', 'ارشيف المراسم', NULL, NULL, NULL, 'KNB029960', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:07:02', '2022-12-27 10:10:19');
INSERT INTO `transactions` (`id`, `item_id`, `main_place`, `sub_place`, `ram`, `hd`, `cpu`, `sn`, `quantity`, `status`, `screen_type`, `screen_serial`, `deleted_at`, `created_at`, `updated_at`) VALUES
(689, 86, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'KNB030170', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:08:49', '2022-08-22 15:08:49'),
(690, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12827223', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:44', '2022-08-22 15:16:44'),
(691, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12827539', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-12-22 14:52:38'),
(692, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K44D7 12833457', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-12-18 09:22:14'),
(693, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12831440', 1, 'new', NULL, NULL, '2022-12-18 16:52:04', '2022-08-22 15:16:45', '2022-12-18 16:52:04'),
(694, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12828909', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-08-22 15:16:45'),
(695, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12833800', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-08-22 15:16:45'),
(696, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12833371', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-08-22 15:16:45'),
(697, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12827213', 1, 'new', NULL, NULL, NULL, '2022-08-22 15:16:45', '2022-08-22 15:16:45'),
(698, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12834093', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-08-22 15:20:04'),
(699, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12829214', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-08-22 15:20:04'),
(700, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K44D7 12829350', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-12-18 09:22:28'),
(701, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12829155', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-08-22 15:20:04'),
(702, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K44D7 12833932', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-08-22 15:20:04'),
(703, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K33B7 12528556', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-12-18 09:22:38'),
(704, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K33B7 12537162', 1, 'used', NULL, NULL, '2022-09-07 05:57:36', '2022-08-22 15:20:04', '2022-09-07 05:57:36'),
(705, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K33B7 12549108', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:20:04', '2022-08-22 15:20:04'),
(706, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K44D7 12833616', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:21:09', '2022-12-18 09:22:49'),
(707, 71, 'التنظيم والمرتبات', 'غرفة حفظ الوثائق', NULL, NULL, NULL, 'L300K44D7 12826927', 1, 'used', NULL, NULL, NULL, '2022-08-22 15:21:09', '2022-12-18 09:23:01'),
(708, 71, 'مجمع خدمه المواطنين', 'صاله المجمع', NULL, NULL, NULL, 'L300K44D7 12828286', 1, 'used', 'SAMSUNG 19', '00H5HKFF400925T', NULL, '2022-08-22 16:17:44', '2022-12-27 13:58:07'),
(709, 71, 'مجمع خدمه المواطنين', 'صاله المجمع', NULL, NULL, NULL, 'L300K33B7 12541422', 1, 'used', 'DELL', '0HX948-64180-8380Q9H', NULL, '2022-08-22 16:17:44', '2022-12-27 13:59:06'),
(710, 71, 'مجمع خدمه المواطنين', 'صاله المجمع', NULL, NULL, NULL, 'L300K2BB7 12473124', 1, 'used', 'SAMSUNG 19', '005RHKAF3010947X', NULL, '2022-08-22 16:17:44', '2022-12-27 13:59:46'),
(711, 64, 'مجمع خدمه المواطنين', 'قائد مجمع خدمة المواطنين', '4', '500', 'CORE I5', 'YLPQ022991', 1, 'used', 'SAMSUNG 19', '00H5HKFF400570D', NULL, '2022-08-22 16:18:52', '2022-12-27 14:02:50'),
(712, 71, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'L300K41D7 12784672', 1, 'used', NULL, NULL, NULL, '2022-09-04 09:18:39', '2022-09-04 09:18:39'),
(713, 71, 'التفتيش', 'أرشيف التفتيش', NULL, NULL, NULL, 'L300K33B7 12537162', 1, 'used', 'SAMSUNG 19', '00H5HKFF400941Y', NULL, '2022-09-07 05:58:10', '2022-12-27 08:47:57'),
(714, 118, 'رئاسه الهيئه', 'مكتب رئيس الهيئه', '4', '500', 'core i7', 'DSDQ008459', 1, 'used', NULL, NULL, NULL, '2022-09-11 11:03:28', '2022-09-11 11:03:28'),
(715, 119, 'المراسم', 'رئيس فرع المراسم', '4', '500', 'core i5', 'YM2C002625', 1, 'used', NULL, NULL, NULL, '2022-09-11 11:19:37', '2022-09-11 11:19:37'),
(716, 120, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', '4', '500', 'core i7', 'YLUB016910', 1, 'used', NULL, NULL, NULL, '2022-09-11 11:20:21', '2022-09-11 11:20:21'),
(717, 71, 'شئون ظباط', 'ارشيف شئون ظباط', NULL, NULL, NULL, 'L300K44D7 12831440', 1, 'new', 'FUJITSU 17', 'YE7N026344', NULL, '2022-12-18 16:52:26', '2022-12-27 10:59:56'),
(718, 116, 'نظم المعلومات', 'ارشيف نظم المعلومات', NULL, NULL, NULL, 'CN66T5R032', 1, 'used', NULL, NULL, NULL, '2022-12-19 06:04:48', '2022-12-19 06:04:48'),
(719, 116, 'نظم المعلومات', 'ارشيف نظم المعلومات', NULL, NULL, NULL, 'CN66T5R034', 1, 'used', NULL, NULL, NULL, '2022-12-19 06:04:48', '2022-12-19 06:04:48'),
(720, 82, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, '3223389138', 1, 'used', NULL, NULL, NULL, '2022-12-22 09:06:05', '2022-12-22 09:06:05'),
(721, 82, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', NULL, NULL, NULL, '3223301559', 1, 'new', NULL, NULL, NULL, '2022-12-22 09:07:19', '2022-12-22 10:14:10'),
(722, 109, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'VNBVB3CHYH', 1, 'used', NULL, NULL, NULL, '2022-12-22 09:08:59', '2022-12-22 09:08:59'),
(723, 74, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'PHC6J21305', 1, 'new', NULL, NULL, NULL, '2022-12-22 09:10:07', '2022-12-22 09:10:07'),
(724, 112, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'بدون', 1, 'used', NULL, NULL, NULL, '2022-12-22 10:11:19', '2022-12-22 10:12:54'),
(725, 85, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', NULL, NULL, NULL, 'CN44A3M0W8', 1, 'new', NULL, NULL, NULL, '2022-12-22 10:16:16', '2022-12-22 10:16:16'),
(726, 111, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'AMMA203123', 1, 'used', NULL, NULL, NULL, '2022-12-22 10:18:40', '2022-12-22 10:18:40'),
(727, 60, 'نظم المعلومات', 'مكتب الرائد محمد', NULL, NULL, 'core i5', 'CZC1022X83', 1, 'new', NULL, NULL, NULL, '2022-12-22 12:54:55', '2022-12-22 12:54:55'),
(728, 108, 'الاشغال', 'الاشغال', NULL, NULL, NULL, 'CNBW77D550', 1, 'used', NULL, NULL, NULL, '2022-12-23 12:40:39', '2022-12-23 12:40:39'),
(729, 115, 'شئون قانونيه', 'نائب رئيس فرع شئون قانونيه', '2', '80', 'PENTIUM', 'YKAM156818', 1, 'used', 'FUJITSU 17', 'YE7N030189', NULL, '2022-12-24 07:50:25', '2022-12-27 14:28:40'),
(730, 111, 'نظم المعلومات', 'المخزن', NULL, NULL, NULL, 'AMMA203213', 1, 'used', NULL, NULL, NULL, '2022-12-24 13:14:03', '2022-12-24 13:14:03'),
(731, 60, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', '4', '500', 'core i7', 'bo_0dy', 1, 'new', NULL, NULL, '2022-12-25 15:06:22', '2022-12-25 13:50:48', '2022-12-25 15:06:22'),
(732, 60, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', '4', '500', 'core i7', 'bo_0dy', 1, 'new', NULL, NULL, '2022-12-25 15:12:22', '2022-12-25 15:06:48', '2022-12-25 15:12:22'),
(733, 60, 'نظم المعلومات', 'رئيس فرع  نظم المعلومات', '4', '500', 'core i7', 'bo_0dy', 1, 'used', 'samsung', 'samaskqwe', '2022-12-25 15:23:10', '2022-12-25 15:21:52', '2022-12-25 15:23:10'),
(734, 121, 'الأفراد', 'الاستكمال', NULL, NULL, NULL, 'CN9A5B600J', 1, 'new', NULL, NULL, NULL, '2022-12-27 05:56:28', '2022-12-27 05:56:28'),
(735, 74, 'الأفراد', 'رئيس قسم الإستكمال', NULL, NULL, NULL, 'PHCXD15613', 1, 'new', NULL, NULL, NULL, '2022-12-27 05:58:11', '2022-12-27 05:58:11'),
(736, 95, 'الأفراد', 'رئيس قسم النقل', NULL, NULL, NULL, 'CNBW8615QJ', 1, 'used', NULL, NULL, NULL, '2022-12-27 06:01:02', '2022-12-27 06:01:02'),
(737, 109, 'الأفراد', 'القوي البشريه', NULL, NULL, NULL, 'VNBVB3CJ8K', 1, 'used', NULL, NULL, NULL, '2022-12-27 06:06:46', '2022-12-27 06:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'حواسب شخصية', '2022-06-09 05:39:24', '2022-06-09 05:39:24'),
(3, 'طابعات ليزر', '2022-06-11 04:29:38', '2022-06-20 13:11:08'),
(5, 'ماسح ضوئى', '2022-06-20 07:33:14', '2022-06-20 13:11:20'),
(6, 'zero client', '2022-06-20 12:35:15', '2022-06-20 12:35:15'),
(7, 'طابعات ألوان', '2022-06-20 13:11:41', '2022-06-20 13:11:41'),
(8, 'طابعات خطية', '2022-06-20 13:28:47', '2022-06-20 13:28:47'),
(10, 'أجهزة محمولة', '2022-09-11 10:59:51', '2022-09-11 10:59:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bosla_types`
--
ALTER TABLE `bosla_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_places`
--
ALTER TABLE `main_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_type_id_foreign` (`type_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD PRIMARY KEY (`admin_id`,`permission_id`,`user_type`),
  ADD KEY `permission_admin_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`admin_id`,`role_id`,`user_type`),
  ADD KEY `role_admin_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_places`
--
ALTER TABLE `sub_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_places_master_id_foreign` (`master_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_item_id_foreign` (`item_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bosla_types`
--
ALTER TABLE `bosla_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `main_places`
--
ALTER TABLE `main_places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_places`
--
ALTER TABLE `sub_places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD CONSTRAINT `permission_admin_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD CONSTRAINT `role_admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_places`
--
ALTER TABLE `sub_places`
  ADD CONSTRAINT `sub_places_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `main_places` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

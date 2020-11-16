-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2020 lúc 01:52 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `happyhouse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_top` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_top` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_middle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_bottom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `news_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(10, 6, '構造', '木造セメント瓦葺　地上2階建', '2020-10-17 13:13:51', '2020-10-17 13:13:51'),
(11, 6, 'その他初期費用', '火災保険(2年)　9,900円', '2020-10-17 13:14:39', '2020-10-17 13:14:39'),
(12, 6, '保証会社', '原則加入', '2020-10-17 13:15:06', '2020-10-17 13:15:06'),
(13, 6, '所在地', '茨城県水戸市城南3丁目', '2020-10-19 09:24:41', '2020-10-19 09:24:41'),
(14, 6, '交通', 'JR常磐線　水戸駅　徒歩12分', '2020-10-19 09:25:10', '2020-10-19 09:25:10'),
(15, 6, '築年月', '1992 年　3 月', '2020-10-19 09:26:02', '2020-10-19 09:26:02'),
(16, 7, '共益費', '3,000 円', '2020-10-22 18:49:08', '2020-10-22 18:50:07'),
(17, 7, '敷金・礼金', '0ヶ月・0ヶ月 ※ペット飼育時礼金1ヶ月分追加となります。', '2020-10-22 19:03:04', '2020-10-22 19:03:04'),
(18, 7, 'その他諸費用', '退去時清掃費　10,000円', '2020-10-22 19:24:15', '2020-10-22 19:24:15'),
(20, 8, 'cô ơi cô cô đừng đi lấy chống', 'sad', '2020-11-10 11:58:29', '2020-11-10 11:58:29'),
(21, 8, 'mdjhdgas', 'ádasd', '2020-11-10 13:03:21', '2020-11-10 13:03:21'),
(22, 8, 'jhsagdhjjas', 'as', '2020-11-10 14:32:22', '2020-11-10 14:32:22'),
(23, 9, 'xe lửa', '5 km', '2020-11-10 14:47:18', '2020-11-10 14:47:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `group_categories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `group_categories_id`, `created_at`, `updated_at`) VALUES
(3, '賃貸用', 'for-rent', 'category-16034365525f928008eb961.png', 1, 1, '2020-10-15 10:14:28', '2020-10-23 09:02:32'),
(4, '販売のため', 'for-sell', 'category-16033253675f90cdb7c6263.png', 1, 1, '2020-10-22 02:09:27', '2020-10-22 02:09:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmt_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `name`, `email`, `website`, `content`, `cmt_status`, `created_at`, `updated_at`) VALUES
(10, 6, 'sd', 'thorbmt@gmail.com', NULL, 'sadsa', 1, '2020-10-18 13:10:38', '2020-10-18 16:31:34'),
(11, 6, 'sd', 'thorbmt@gmail.com', NULL, 'ádjasdjasdj', 1, '2020-10-18 16:32:37', '2020-10-18 16:32:49'),
(12, 7, 'sd', 'thorbmt@gmail.com', NULL, 'sad', 1, '2020-10-22 19:36:52', '2020-10-23 09:02:15'),
(13, 6, 'sd', 'thorbmt@gmail.com', NULL, 'wow', 1, '2020-10-23 20:23:18', '2020-10-23 20:33:01'),
(14, 6, 'sd', 'thorbmt@gmail.com', NULL, 'test again', 1, '2020-10-23 20:25:17', '2020-10-23 20:33:02'),
(15, 6, 'sd', 'thorbmt@gmail.com', NULL, 'test once again', 1, '2020-10-23 20:25:41', '2020-10-23 20:33:02'),
(16, 6, 'sd', 'thorbmt@gmail.com', NULL, 'test notification', 1, '2020-10-23 20:29:31', '2020-10-23 20:33:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `romanji_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `name`, `romanji_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, '大阪', 'osaka', 'district-16034366495f92806919332.png', 1, '2020-10-15 15:32:13', '2020-10-23 09:30:49'),
(5, '東京', 'tokyo', 'district-16029441825f8afcb651123.png', 1, '2020-10-15 15:33:20', '2020-10-17 14:16:22'),
(6, '北海道', 'Hokkaido', 'district-16029442115f8afcd347f8a.png', 1, '2020-10-15 16:55:30', '2020-10-17 14:16:51'),
(7, '青森', 'Aomori', 'district-16029442335f8afce94bd07.png', 1, '2020-10-15 16:56:51', '2020-10-17 14:17:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `download_file`
--

CREATE TABLE `download_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `download_file`
--

INSERT INTO `download_file` (`id`, `image`, `title`, `file`, `created_at`, `updated_at`) VALUES
(3, '16042249275f9e879f441c0.png', 'excel', '16042249275f9e879f44673.txt', '2020-11-01 12:02:07', '2020-11-01 12:02:07'),
(4, '16042249685f9e87c86a297.png', 'download2', '16042249685f9e87c86bfb4.png', '2020-11-01 12:02:48', '2020-11-01 12:02:48'),
(5, '16042252115f9e88bbd864f.png', 'ok', '16042252115f9e88bbd8ab2.png', '2020-11-01 12:06:51', '2020-11-01 12:06:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `news_id`, `path`, `size`, `created_at`, `updated_at`) VALUES
(63, 6, 'news-img-16028705065f89dcea67187.jp2', 24018, '2020-10-16 17:48:26', '2020-10-16 17:48:26'),
(64, 6, 'news-img-16028705065f89dcea8cf43.jp2', 97021, '2020-10-16 17:48:26', '2020-10-16 17:48:26'),
(65, 6, 'news-img-16028705065f89dceab1dd7.jp2', 41778, '2020-10-16 17:48:26', '2020-10-16 17:48:26'),
(66, 6, 'news-img-16028705075f89dceb0b0b5.jp2', 51649, '2020-10-16 17:48:27', '2020-10-16 17:48:27'),
(67, 6, 'news-img-16028705075f89dceb2ff8b.jp2', 50766, '2020-10-16 17:48:27', '2020-10-16 17:48:27'),
(68, 6, 'news-img-16028705075f89dceb7cc4e.jp2', 57285, '2020-10-16 17:48:27', '2020-10-16 17:48:27'),
(69, 6, 'news-img-16028705075f89dceba172b.jp2', 54786, '2020-10-16 17:48:27', '2020-10-16 17:48:27'),
(72, 486339, 'news-img-16033463175f911f8d818f7.jp2', 12011, '2020-10-22 07:58:37', '2020-10-22 07:58:37'),
(73, 7, 'news-img-16033853185f91b7e6465ef.jp2', 112545, '2020-10-22 18:48:38', '2020-10-22 18:50:07'),
(74, 7, 'news-img-16033853185f91b7e66a4ed.jp2', 147072, '2020-10-22 18:48:38', '2020-10-22 18:50:07'),
(75, 7, 'news-img-16033853185f91b7e691d8a.jp2', 96908, '2020-10-22 18:48:38', '2020-10-22 18:50:07'),
(76, 7, 'news-img-16033853185f91b7e6b8a8a.jp2', 138880, '2020-10-22 18:48:38', '2020-10-22 18:50:07'),
(77, 7, 'news-img-16033853185f91b7e6deb28.jp2', 48233, '2020-10-22 18:48:38', '2020-10-22 18:50:07'),
(78, 7, 'news-img-16033853195f91b7e70f15e.jp2', 1457, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(79, 7, 'news-img-16033853195f91b7e73658e.jp2', 76795, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(80, 7, 'news-img-16033853195f91b7e75b167.jp2', 39386, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(81, 7, 'news-img-16033853195f91b7e77f07f.jp2', 39581, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(82, 7, 'news-img-16033853195f91b7e7a7f13.jp2', 79782, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(83, 7, 'news-img-16033853195f91b7e7ce051.jp2', 73592, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(84, 7, 'news-img-16033853195f91b7e7f1094.jp2', 32869, '2020-10-22 18:48:39', '2020-10-22 18:50:07'),
(85, 7, 'news-img-16033853205f91b7e82493f.jp2', 110508, '2020-10-22 18:48:40', '2020-10-22 18:50:07'),
(86, 7, 'news-img-16033853205f91b7e84bf03.jp2', 21724, '2020-10-22 18:48:40', '2020-10-22 18:50:07'),
(87, 8, 'news-img-16050000295faa5b5d1f162.jp2', 54083, '2020-11-10 11:20:29', '2020-11-10 11:20:39'),
(88, 8, 'news-img-16050000295faa5b5d48d2b.jp2', 32670, '2020-11-10 11:20:29', '2020-11-10 11:20:39'),
(89, 8, 'news-img-16050000295faa5b5d71fb8.jp2', 44029, '2020-11-10 11:20:29', '2020-11-10 11:20:39'),
(90, 8, 'news-img-16050000295faa5b5dc30bf.jp2', 40428, '2020-11-10 11:20:29', '2020-11-10 11:20:39'),
(91, 8, 'news-img-16050000295faa5b5df1791.jp2', 51872, '2020-11-10 11:20:29', '2020-11-10 11:20:39'),
(92, 8, 'news-img-16050000305faa5b5e45193.jp2', 21870, '2020-11-10 11:20:30', '2020-11-10 11:20:39'),
(93, 8, 'news-img-16050000305faa5b5e7322f.jp2', 28012, '2020-11-10 11:20:30', '2020-11-10 11:20:39'),
(94, 8, 'news-img-16050000305faa5b5ebb307.jp2', 31067, '2020-11-10 11:20:30', '2020-11-10 11:20:39'),
(95, 9, 'news-img-16050124105faa8bba1230f.jp2', 54083, '2020-11-10 14:46:50', '2020-11-10 14:47:21'),
(96, 9, 'news-img-16050124105faa8bba6e25c.jp2', 32670, '2020-11-10 14:46:50', '2020-11-10 14:47:21'),
(97, 9, 'news-img-16050124105faa8bbac7f40.jp2', 44029, '2020-11-10 14:46:50', '2020-11-10 14:47:21'),
(98, 9, 'news-img-16050124115faa8bbb32c61.jp2', 40428, '2020-11-10 14:46:51', '2020-11-10 14:47:21'),
(99, 9, 'news-img-16050124115faa8bbb83dba.jp2', 51872, '2020-11-10 14:46:51', '2020-11-10 14:47:21'),
(100, 9, 'news-img-16050124115faa8bbbe4a92.jp2', 21870, '2020-11-10 14:46:51', '2020-11-10 14:47:21'),
(101, 9, 'news-img-16050124125faa8bbc9e56f.jp2', 28012, '2020-11-10 14:46:52', '2020-11-10 14:47:21'),
(102, 9, 'news-img-16050124125faa8bbcefd8f.jp2', 31067, '2020-11-10 14:46:52', '2020-11-10 14:47:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_categories`
--

CREATE TABLE `group_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_categories`
--

INSERT INTO `group_categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo', 'group-category-16025739375f85567195c40.png', 1, '2020-10-13 07:25:37', '2020-10-13 07:25:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hero_images`
--

CREATE TABLE `hero_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_submits`
--

CREATE TABLE `info_submits` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `orders` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appoinment` datetime NOT NULL DEFAULT current_timestamp(),
  `star` tinyint(1) DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_submits`
--

INSERT INTO `info_submits` (`id`, `name`, `email`, `message`, `phone`, `status`, `orders`, `appoinment`, `star`, `note`, `order_code`, `stage`, `created_at`, `updated_at`) VALUES
(3, 'sd', 'thorbmt@gmail.com', 'sad', '111379373', 1, '6', '2020-10-31 12:31:00', 1, NULL, 'JFTHFUJKJK', 'inprogress', '2020-10-18 20:43:26', '2020-10-23 20:06:00'),
(4, 'sd', 'thorbmt@gmail.com', 'asd', '111379373', 1, '7', '2020-10-29 14:21:00', 1, NULL, 'HGFKFHJFJMJK', 'done', '2020-10-19 10:30:15', '2020-10-23 20:06:37'),
(5, 'sd', 'thorbmt@gmail.com', 'sadsd', '111379373', 1, NULL, '2020-12-23 09:30:00', 0, NULL, '5f932c9da2331', 'pending', '2020-10-23 21:18:53', '2020-10-24 03:59:08'),
(6, 'sd', 'thorbmt@gmail.com', 'dfsdfds', '111379373', 1, '6', '2020-12-21 21:35:00', 1, NULL, '5f938a4e8855c', 'inprogress', '2020-10-24 03:58:38', '2020-10-24 04:00:00'),
(7, 'sd', 'thorbmt@gmail.com', 'haha', '111379373', 1, '6', '2020-10-26 09:30:00', 0, NULL, '5f938d6d2cb77', 'pending', '2020-10-24 04:11:57', '2020-10-28 10:12:33'),
(8, 'sd', 'thorbmt@gmail.com', 'ádasd', '111379373', 1, '8', '2020-11-12 07:30:00', 0, NULL, '5faa714505353', 'inprogress', '2020-11-10 12:53:57', '2020-11-10 13:00:31'),
(9, 'sd', 'thorbmt@gmail.com', 'đâsd', '111379373', 1, '8', '2020-11-12 07:30:00', 0, NULL, '5faa71a24275b', 'inprogress', '2020-11-10 12:55:30', '2020-11-10 13:00:31'),
(10, 'jhsagdhjjas', 'phuocnguyenngoc1997@gmail.com', 'sdasdas', 'asdas', 1, '7', '2020-11-12 22:42:00', 0, NULL, '5faa8a20b856c', 'inprogress', '2020-11-10 14:40:00', '2020-11-10 15:01:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `map`
--

CREATE TABLE `map` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `coords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shape` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'poly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `map`
--

INSERT INTO `map` (`id`, `district_id`, `coords`, `shape`, `created_at`, `updated_at`) VALUES
(1, 6, '746,71, 746,73, 743,73, 743,74, 742,74, 742,75, 741,75, 741,76, 740,76, 740,77, 739,77, 738,77, 737,77, 736,77, 735,77, 735,78, 734,78, 734,79, 733,79, 733,80, 732,80, 732,81, 731,81, 731,82, 730,82, 730,83, 730,84, 730,85, 729,85, 729,86, 728,86, 728,87, 727,87, 727,88, 727,89, 726,89, 726,90, 725,90, 724,90, 724,91, 723,91, 722,91, 722,94, 722,95, 722,96, 721,96, 721,97, 720,97, 720,96, 719,96, 719,95, 718,95, 718,94, 718,93, 719,93, 719,92, 719,91, 720,91, 720,90, 721,90, 722,90, 722,89, 723,89, 723,88, 724,88, 724,87, 725,87, 725,86, 726,86, 726,85, 726,84, 726,83, 727,83, 727,82, 728,82, 728,81, 729,81, 729,80, 729,79, 730,79, 730,78, 731,78, 731,77, 732,77, 732,76, 732,75, 733,75, 733,74, 733,73, 734,73, 734,72, 734,71, 735,71, 735,70, 735,69, 737,69, 737,70, 738,70, 739,70, 739,71, 740,71, 740,72, 743,72, 743,71, 744,71, 745,71, 746,71', 'poly', '2020-10-15 16:38:46', '2020-10-16 10:50:25'),
(3, 6, '563,157, 561,157, 561,156, 561,155, 560,155, 560,154, 560,153, 561,153, 561,152, 563,152, 563,155, 563,157', 'poly', '2020-10-16 10:06:57', '2020-10-16 10:06:57'),
(4, 6, '615,82, 616,82, 616,83, 616,84, 616,85, 616,89, 616,92, 615,92, 615,89, 615,87, 615,84, 615,82', 'poly', '2020-10-16 10:07:28', '2020-10-16 10:07:28'),
(5, 6, '615,82, 615,79, 616,79, 616,78, 616,77, 617,77, 617,76, 617,75, 618,75, 618,72, 618,71, 618,70, 618,69, 619,69, 619,68, 619,67, 619,66, 618,66, 618,65, 618,64, 618,63, 618,62, 618,61, 618,60, 618,59, 617,59, 617,58, 617,57, 616,57, 616,56, 616,55, 616,54, 615,54, 615,53, 615,52, 614,52, 614,51, 614,50, 613,50, 613,49, 613,48, 613,47, 612,47, 612,46, 612,45, 612,44, 612,43, 613,43, 613,42, 613,41, 614,41, 614,40, 614,39, 613,39, 613,38, 613,37, 614,37, 614,38, 615,38, 616,38, 617,38, 618,38, 618,37, 619,37, 619,36, 619,35, 619,34, 620,34, 620,33, 621,33, 621,34, 621,35, 622,35, 622,36, 623,36, 623,37, 623,38, 624,38, 625,38, 625,39, 626,39, 626,40, 627,40, 627,41, 628,41, 628,42, 629,42, 629,43, 629,44, 630,44, 630,45, 631,45, 631,46, 632,46, 632,47, 633,47, 633,48, 634,48, 634,49, 635,49, 635,50, 636,50, 636,51, 636,52, 637,52, 637,53, 638,53, 638,54, 638,55, 639,55, 639,56, 639,57, 640,57, 640,58, 640,59, 641,59, 641,60, 642,60, 642,61, 643,61, 643,62, 644,62, 644,63, 645,63, 645,64, 646,64, 646,65, 647,65, 647,66, 648,66, 648,67, 649,67, 649,68, 650,68, 650,69, 651,69, 651,70, 652,70, 652,71, 653,71, 654,71, 654,72, 655,72, 655,73, 656,73, 657,73, 657,74, 658,74, 659,74, 659,75, 659,76, 660,76, 660,77, 661,77, 661,78, 662,78, 663,78, 663,79, 664,79, 664,80, 665,80, 668,80, 668,81, 668,82, 669,82, 669,83, 670,83, 670,84, 671,84, 672,84, 673,84, 674,84, 675,84, 676,84, 676,83, 677,83, 678,83, 680,83, 680,87, 682,87, 682,86, 683,86, 683,85, 683,84, 684,84, 684,85, 684,86, 684,87, 685,87, 685,88, 686,88, 687,88, 687,89, 693,89, 700,89, 700,88, 700,87, 701,87, 701,86, 702,86, 702,85, 703,85, 703,84, 703,83, 705,83, 705,82, 706,82, 706,81, 707,81, 707,80, 708,80, 708,79, 709,79, 710,79, 710,78, 710,77, 711,77, 711,76, 711,75, 712,75, 712,74, 713,74, 713,73, 714,73, 714,74, 714,76, 714,77, 713,77, 713,78, 713,79, 712,79, 712,80, 712,81, 711,81, 711,82, 711,83, 711,84, 710,84, 710,85, 709,85, 709,86, 709,87, 708,87, 708,88, 708,89, 707,89, 707,90, 707,91, 707,92, 707,93, 707,94, 707,95, 707,96, 708,96, 708,97, 708,98, 709,98, 709,99, 710,99, 711,99, 711,100, 712,100, 713,100, 715,100, 715,101, 714,101, 714,102, 713,102, 712,102, 712,105, 713,105, 713,106, 713,107, 713,108, 714,108, 714,109, 715,109, 715,110, 716,110, 716,111, 717,111, 717,112, 720,112, 720,111, 721,111, 721,110, 722,110, 722,109, 723,109, 723,108, 724,108, 725,108, 726,108, 726,107, 727,107, 728,107, 728,108, 727,108, 727,109, 726,109, 725,109, 724,109, 724,110, 723,110, 723,111, 722,111, 722,112, 721,112, 721,113, 721,114, 721,115, 717,115, 716,115, 716,116, 715,116, 714,116, 713,116, 713,117, 709,117, 709,118, 709,119, 710,119, 710,120, 709,120, 709,121, 708,121, 707,121, 707,122, 706,122, 706,123, 705,123, 704,123, 703,123, 702,123, 702,122, 701,122, 701,121, 700,121, 700,122, 699,122, 699,123, 698,123, 698,124, 699,124, 699,125, 698,125, 695,125, 693,125, 692,125, 691,125, 690,125, 690,124, 689,124, 688,124, 688,123, 687,123, 686,123, 684,123, 684,124, 683,124, 682,124, 682,125, 681,125, 680,125, 680,126, 679,126, 679,127, 678,127, 677,127, 677,128, 676,128, 676,129, 675,129, 675,130, 674,130, 674,131, 673,131, 673,132, 672,132, 672,133, 671,133, 671,134, 670,134, 670,135, 669,135, 669,136, 668,136, 668,137, 668,138, 667,138, 667,139, 666,139, 666,140, 665,140, 665,141, 665,142, 664,142, 664,143, 664,144, 663,144, 663,145, 662,145, 662,146, 662,147, 662,148, 661,148, 661,149, 661,150, 661,151, 661,152, 662,152, 662,153, 662,154, 662,155, 662,156, 662,157, 661,157, 661,158, 661,159, 660,159, 660,160, 658,160, 658,159, 657,159, 657,158, 656,158, 655,158, 655,157, 654,157, 653,157, 653,156, 652,156, 652,155, 650,155, 649,155, 648,155, 648,154, 647,154, 646,154, 646,153, 645,153, 644,153, 644,152, 643,152, 642,152, 642,151, 641,151, 640,151, 640,150, 639,150, 639,149, 638,149, 637,149, 636,149, 636,148, 635,148, 635,147, 634,147, 634,146, 633,146, 633,145, 632,145, 632,144, 630,144, 629,144, 629,143, 628,143, 627,143, 627,142, 626,142, 626,141, 625,141, 624,141, 624,140, 623,140, 623,139, 622,139, 621,139, 620,139, 620,138, 619,138, 618,138, 617,138, 616,138, 615,138, 615,139, 614,139, 613,139, 613,140, 612,140, 611,140, 611,141, 610,141, 609,141, 609,142, 608,142, 608,143, 607,143, 607,144, 606,144, 605,144, 605,145, 604,145, 604,146, 603,146, 603,147, 602,147, 602,148, 601,148, 601,149, 600,149, 599,149, 599,147, 598,147, 598,146, 598,145, 597,145, 597,144, 596,144, 596,143, 595,143, 595,142, 595,141, 594,141, 594,140, 586,140, 586,141, 585,141, 585,142, 584,142, 584,143, 584,144, 583,144, 583,145, 583,146, 582,146, 582,147, 582,148, 582,149, 582,150, 582,151, 582,152, 583,152, 583,153, 584,153, 585,153, 585,154, 586,154, 587,154, 587,155, 588,155, 588,156, 589,156, 590,156, 593,156, 594,156, 594,157, 595,157, 595,158, 596,158, 596,159, 596,160, 597,160, 598,160, 598,161, 599,161, 599,162, 599,163, 600,163, 600,164, 601,164, 602,164, 602,165, 603,165, 604,165, 604,166, 605,166, 605,167, 605,168, 603,168, 603,169, 602,169, 602,170, 601,170, 600,170, 600,169, 599,169, 598,169, 598,168, 597,168, 596,168, 595,168, 595,167, 594,167, 594,166, 593,166, 592,166, 592,167, 591,167, 591,168, 591,169, 590,169, 590,170, 589,170, 588,170, 587,170, 587,173, 587,175, 587,176, 586,176, 586,177, 585,177, 584,177, 584,178, 583,178, 582,178, 582,179, 581,179, 581,180, 580,180, 579,180, 578,180, 577,180, 577,178, 576,178, 576,177, 576,176, 576,175, 575,175, 575,172, 576,172, 576,171, 576,170, 577,170, 577,169, 577,168, 578,168, 578,167, 578,166, 579,166, 579,164, 579,161, 578,161, 578,160, 578,159, 577,159, 577,158, 576,158, 576,157, 576,156, 574,156, 573,156, 573,155, 572,155, 572,154, 572,153, 571,153, 570,153, 570,152, 569,152, 569,151, 569,150, 569,149, 569,148, 570,148, 570,147, 570,146, 571,146, 571,143, 571,142, 570,142, 570,141, 570,140, 570,139, 570,138, 571,138, 571,137, 572,137, 573,137, 574,137, 575,137, 576,137, 576,136, 577,136, 577,135, 578,135, 578,134, 578,133, 580,133, 580,134, 581,134, 582,134, 582,133, 582,132, 583,132, 583,131, 584,131, 584,130, 584,129, 585,129, 585,128, 586,128, 586,127, 587,127, 588,127, 588,126, 588,124, 587,124, 587,123, 586,123, 586,122, 586,121, 585,121, 584,121, 584,120, 583,120, 583,119, 582,119, 582,118, 582,117, 583,117, 583,116, 583,115, 584,115, 584,114, 585,114, 585,113, 587,113, 587,114, 588,114, 588,115, 589,115, 589,116, 590,116, 590,117, 592,117, 593,117, 593,118, 594,118, 594,119, 595,119, 596,119, 597,119, 597,118, 600,118, 600,119, 600,120, 601,120, 602,120, 603,120, 603,121, 604,121, 605,121, 605,120, 606,120, 607,120, 607,119, 608,119, 608,118, 609,118, 609,117, 609,116, 610,116, 610,115, 611,115, 611,114, 611,113, 611,112, 611,111, 610,111, 610,110, 610,109, 609,109, 609,108, 609,107, 609,104, 609,103, 608,103, 608,102, 608,101, 608,100, 608,99, 609,99, 609,98, 609,97, 611,97, 611,96, 612,96, 613,96, 613,95, 614,95, 614,94, 615,94, 615,92, 616,92, 616,89, 616,85, 616,84, 616,83, 616,82, 615,82', 'poly', '2020-10-16 10:08:24', '2020-10-16 10:49:11'),
(6, 6, '749,95, 751,95, 751,96, 750,96, 750,97, 749,97, 749,98, 748,98, 748,99, 747,99, 746,99, 745,99, 745,100, 744,100, 744,99, 743,99, 743,98, 743,97, 747,97, 747,95, 748,95, 748,94, 749,94, 749,9', 'poly', '2020-10-16 10:09:28', '2020-10-16 10:09:28'),
(7, 6, '601,44, 602,44, 603,44, 604,44, 604,45, 604,46, 605,46, 605,47, 605,48, 604,48, 604,49, 602,49, 602,48, 601,48, 601,47, 601,46, 601,45, 601,44', 'poly', '2020-10-16 10:10:22', '2020-10-16 10:10:22'),
(8, 6, '598,42, 596,42, 596,39, 596,38, 596,37, 595,37, 595,36, 595,35, 597,35, 597,36, 597,37, 598,37, 598,38, 598,42', 'poly', '2020-10-16 10:10:43', '2020-10-16 10:10:43'),
(9, 6, '802,32, 802,39, 796,39, 796,40, 795,40, 795,41, 794,41, 794,42, 793,42, 792,42, 792,43, 791,43, 790,43, 789,43, 789,44, 788,44, 788,45, 787,45, 786,45, 786,46, 785,46, 785,47, 784,47, 784,48, 783,48, 783,49, 782,49, 782,50, 782,51, 781,51, 781,52, 780,52, 780,53, 779,53, 778,53, 778,54, 777,54, 777,53, 776,53, 776,52, 775,52, 774,52, 773,52, 773,53, 772,53, 772,54, 772,55, 773,55, 773,56, 772,56, 772,57, 772,58, 771,58, 771,59, 770,59, 769,59, 769,60, 768,60, 768,61, 767,61, 767,62, 766,62, 766,63, 765,63, 765,64, 764,64, 764,65, 764,66, 763,66, 763,67, 762,67, 762,68, 761,68, 760,68, 759,68, 759,69, 759,70, 758,70, 758,71, 757,71, 757,72, 755,72, 755,70, 756,70, 756,69, 756,68, 756,67, 758,67, 758,66, 758,65, 759,65, 760,65, 761,65, 761,64, 762,64, 762,63, 763,63, 763,62, 762,62, 762,61, 761,61, 761,60, 761,59, 763,59, 764,59, 764,58, 764,57, 765,57, 765,56, 766,56, 766,55, 767,55, 768,55, 768,54, 769,54, 769,53, 770,53, 770,52, 770,49, 772,49, 773,49, 774,49, 774,48, 774,47, 775,47, 775,46, 776,46, 776,45, 777,45, 778,45, 778,44, 779,44, 779,43, 779,42, 778,42, 778,40, 778,39, 778,38, 779,38, 779,37, 780,37, 780,38, 781,38, 781,39, 781,40, 781,41, 782,41, 782,42, 785,42, 787,42, 788,42, 789,42, 789,41, 790,41, 791,41, 791,40, 792,40, 792,39, 793,39, 793,38, 794,38, 794,37, 794,36, 795,36, 795,35, 796,35, 796,34, 796,33, 797,33, 797,32, 800,32, 802,32', 'poly', '2020-10-16 10:11:11', '2020-10-16 10:49:55'),
(10, 6, '874,285, 874,304, 855,304, 836,304, 817,304, 798,304, 798,296, 798,292, 798,288, 798,285, 799,285, 874,285', 'poly', '2020-10-16 10:11:48', '2020-10-16 10:11:48'),
(11, 6, '738,105,4', 'circle', '2020-10-16 10:32:20', '2020-10-16 10:42:38'),
(12, 6, '823,283,881,308', 'rect', '2020-10-16 10:43:06', '2020-10-16 10:43:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuorder` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_23_184558_create_categories_table', 1),
(4, '2018_10_23_184558_create_group_categories_table', 1),
(5, '2018_10_23_184723_create_news_table', 1),
(6, '2018_10_26_134857_create_roles_table', 1),
(7, '2018_10_26_154819_create_settings_table', 1),
(8, '2018_11_03_231855_create_menus_table', 1),
(9, '2018_11_15_055330_create_advertisements_table', 1),
(10, '2020_07_07_055330_create_infosubmit_table', 1),
(11, '2020_07_29_100623_create_comments_table', 1),
(12, '2020_10_11_153647_create_attributes_table', 1),
(13, '2020_10_11_160303_create_district_table', 1),
(14, '2020_10_11_160322_create_map_table', 1),
(15, '2020_10_11_160530_create_status_table', 1),
(16, '2020_10_11_160755_create_gallery_table', 1),
(17, '2020_07_25_123940_create_hero_images_table', 2),
(18, '2020_11_01_112012_create_download_file_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_station_distance` int(11) DEFAULT NULL,
  `free_first_months` int(11) NOT NULL DEFAULT 0,
  `is_foreign_nationality_consultation` tinyint(1) NOT NULL DEFAULT 1,
  `is_newly_built_properties` tinyint(1) NOT NULL DEFAULT 0,
  `receiving_time` date NOT NULL DEFAULT current_timestamp(),
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `statuses_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` bigint(20) NOT NULL,
  `acreage` float NOT NULL,
  `floor_amount` int(11) NOT NULL DEFAULT 1,
  `room_amount` int(11) NOT NULL DEFAULT 1,
  `bathroom_amount` int(11) NOT NULL DEFAULT 1,
  `bed_amount` int(11) NOT NULL DEFAULT 1,
  `host_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `address`, `coords`, `image`, `bus_station_distance`, `free_first_months`, `is_foreign_nationality_consultation`, `is_newly_built_properties`, `receiving_time`, `details`, `category_id`, `district_id`, `statuses_id`, `status`, `price`, `acreage`, `floor_amount`, `room_amount`, `bathroom_amount`, `bed_amount`, `host_name`, `phone_number`, `note`, `user_id`, `view_count`, `tags`, `created_at`, `updated_at`) VALUES
(6, 'ファミリーでもフレンドでも', 'famiri-demo-furendo-demo', '〒　170-0005 東京都豊島区南大塚3-52-5近藤ビル2F', '13.1965807,108.2225727', 'news-16028712295f89dfbd53ad9.jp2', 5, 2, 0, 0, '2020-11-19', '<p>ご家族で住むお部屋としても、ご友人たちとのルームシェアとしても暮らしやすい、3DKタイプのお部屋です。<br />\r\n6帖と7帖の洋室にはそれぞれ1帖ほどの収納スペースがあります。<br />\r\n南向きのバルコニーに面している7帖の洋室と6帖の和室には、窓から日当たりがよく、お部屋全体を明るくさせ、心地よい空間を作っています。<br />\r\n<br />\r\nガスコンロが設置できるキッチンは、かなり広々としており、シンクやワークトップもしっかりあるので、お料理が好きな方にもおすすめいたします。<br />\r\n収納トレイ付洗面化粧台もあるので、日ごろの身だしなみを整えるのに最適です。<br />\r\n<br />\r\n気になる方はぜひお問合せください。<br />\r\n<br />\r\n○　敷金なし・礼金なし<br />\r\n○　ペット飼育OK<br />\r\n大事な家族の一員であるワンちゃんやネコちゃんももちろん一緒に暮らしていただけます。<br />\r\n&nbsp;</p>', 3, 5, 3, 1, 50035, 70, 2, 8, 3, 1, 'Nguyễn Ngọc Phước', '0947467073', NULL, 1, 18, '東京,無料のwifi,無料の電気', '2020-10-15 18:17:05', '2020-11-16 06:25:57'),
(7, 'きゅっとまとめてより広く', 'kyutto-matomete-yori-hiroku', '青森県青森市幸畑2丁目', '13.1965807,108.2225727', 'news-16033854075f91b83fbe7b2.jp2', NULL, 2, 1, 0, '2020-11-16', '<p>▼▲▼　11/13までにご入居いただける方限定　初期費用ゼロ円キャンペーン実施中　▼▲▼<br />\r\n<br />\r\nしっかりとした設備もまとまっている事で、より広くお部屋が使えます。<br />\r\nガスコンロ設置可タイプのキッチンの横に洗濯機置場があり、お風呂は３点ユニットのためコンパクトでお掃除もしやすいです。<br />\r\n上下二段に分かれている収納スペースは、用途によって使い分けができるのでとても便利です。<br />\r\n<br />\r\n○　敷金なし・礼金なし<br />\r\n○　ペット飼育OK<br />\r\n大事な家族の一員であるワンちゃんやネコちゃんももちろん一緒に暮らしていただけます。</p>', 3, 5, 3, 1, 40000, 70, 2, 4, 2, 3, 'Nguyễn Ngọc Phước', '0947467073', NULL, 1, 5, 'laravel,framework', '2020-10-22 18:50:07', '2020-11-10 14:39:14'),
(8, 'thử crop cái coi sao', 'thu-cai-coi-sao', '64 Ngô Sĩ Liên Đà Nẵng', '13.1965807,108.2225727', 'news-16050000395faa5b67a8510.jp2', NULL, 2, 1, 0, '2020-11-16', '<p>asdasdasdasdas</p>', 4, 7, 3, 1, 90000, 32, 1, 11, 13, 12, 'Nguyễn Ngọc Phước', '111379373', NULL, 1, 2, NULL, '2020-11-10 11:20:39', '2020-11-10 14:31:41'),
(9, 'tiêu đề', 'kyutto-matomete-yori-hiroku-abc', '142 thôn 16', '13,108', 'news-16050124415faa8bd904c12.jp2', 7, 2, 0, 0, '2020-11-16', '<p><strong>abc</strong></p>', 4, 7, 3, 1, 123123, 50, 1, 1, 13, 1, 'phước', '0947467073', NULL, 1, 1, 'free-wifi,abc', '2020-11-10 14:47:21', '2020-11-16 06:34:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Editor', 'editor', NULL, NULL),
(3, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribbble` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_flow` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messenger` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feeds_embed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_api_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_left` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_right` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'this is description',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `email`, `phone`, `facebook`, `twitter`, `linkedin`, `vimeo`, `behance`, `dribbble`, `youtube`, `about_us`, `address`, `contract_flow`, `messenger`, `feeds_embed`, `coords`, `video`, `banner_image`, `map_api_key`, `footer_left`, `footer_right`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Happy House', 'logo1602838373098.png', 'favicon1602838343257.png', 'thorbmt@gmail.com', '+84947467074', 'https://www.facebook.com/profile.php?id=100005694852711', 'https://www.facebook.com/profile.php?id=100005694852711', NULL, NULL, NULL, NULL, NULL, '<h2>社会へのお役立ちをめざすフランチャイズ企業</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ダスキンは、日本でいち早くフランチャイズシステムをとり入れ、創業期からフランチャイズビジネスを確立するとともに、その後の事業展開でも、常にフランチャイズビジネスの可能性を追求してきました。今では、その事業領域も、環境衛生からフードサービスまで多岐にわたり、定期訪問レンタルサービスから高度なプロの技術サービス、店舗販売によるフードサービスまで、様々な業態でフランチャイズビジネスを展開しています</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"5\" summary=\"会社概要\">\r\n	<tbody>\r\n		<tr>\r\n			<th>商号</th>\r\n			<td>ライオン株式会社（Lion Corporation）</td>\r\n		</tr>\r\n		<tr>\r\n			<th>創業</th>\r\n			<td>1891年（明治24年）10月30日</td>\r\n		</tr>\r\n		<tr>\r\n			<th>設立</th>\r\n			<td>1918年（大正07年）09月</td>\r\n		</tr>\r\n		<tr>\r\n			<th>資本金</th>\r\n			<td>344億3,372万円（2019年12月31日現在）</td>\r\n		</tr>\r\n		<tr>\r\n			<th>本社所在地</th>\r\n			<td>〒130-8644 東京都墨田区本所1-3-7<br />\r\n			TEL：03-3621-6211</td>\r\n		</tr>\r\n		<tr>\r\n			<th>代表者</th>\r\n			<td>代表取締役 社長執行役員　掬川 正純</td>\r\n		</tr>\r\n		<tr>\r\n			<th>従業員数</th>\r\n			<td>連結：7,151名　個別：2,850名（2019年12月31日現在）</td>\r\n		</tr>\r\n		<tr>\r\n			<th>事業内容</th>\r\n			<td>ハミガキ、ハブラシ、石けん、洗剤、ヘアケア・スキンケア製品、クッキング用品、薬品等の製造販売、海外現地会社への輸出</td>\r\n		</tr>\r\n		<tr>\r\n			<th>売上</th>\r\n			<td>連結：3,475億円［IFRS］　個別：2,694億円（2019年12月期）</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '〒170-0005   東京都豊島区南大塚3-52-5近藤ビル2F', '<h1>Corporate Outline - 会社概要</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<img alt=\"賃貸借契約書とは!?　契約後のトラブルを防ぐための読み方講座\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_650.png\" style=\"height:507px; width:1080px\" /></p>\r\n\r\n<p>賃貸物件を契約する際に、必要となる「賃貸借契約書」。文字は細かくて読みにくいし、難しそうと尻込みしていませんか？確かにパッと見ただけでは何が書いてあるのか分かりにくいですが、ある程度決まっています。契約後のトラブルを防ぐためにも、賃貸借契約書のスマートな読み解き方をマスターしましょう。</p>\r\n\r\n<p>●お話を伺った方<br />\r\nハウスメイトパートナーズ　東京営業部課長　伊部尚子さん</p>\r\n\r\n<p>記事の目次</p>\r\n\r\n<ol>\r\n	<li><a href=\"https://suumo.jp/article/oyakudachi/oyaku/chintai/fr_other/chintai_keiyakusyo/#tboc1\">1.&nbsp;賃貸借契約書は何のためにある？重要事項説明書との違いは？</a></li>\r\n	<li><a href=\"https://suumo.jp/article/oyakudachi/oyaku/chintai/fr_other/chintai_keiyakusyo/#tboc2\">2.&nbsp;最初に確認すべき「賃貸借契約書」7つのポイント</a></li>\r\n	<li><a href=\"https://suumo.jp/article/oyakudachi/oyaku/chintai/fr_other/chintai_keiyakusyo/#tboc3\">3.&nbsp;見落としがちな項目をチェックして、事前にトラブルシューティング！</a></li>\r\n</ol>\r\n\r\n<h2>賃貸借契約書は何のためにある？重要事項説明書との違いは？</h2>\r\n\r\n<p>賃貸借契約書とは、簡単に言うと賃貸物件を借りるための契約書のこと。一方、重要事項説明書とは、不動産会社が「借りようとしている物件は、こんな状態ですが、本当に借りますか？」と借主に説明する、重要事項説明の内容をまとめた書類です。その内容に借主が納得した上で、本題の賃貸借契約書の取り交わしとなります。</p>\r\n\r\n<h3>賃貸借契約のおおまかな流れ</h3>\r\n\r\n<p>不動産会社が、『重要事項説明書』の内容を説明する<br />\r\n&darr;<br />\r\n借主が、『重要事項説明書』に署名・捺印をする<br />\r\n（まだ契約は成立していない！）<br />\r\n&darr;<br />\r\n不動産会社が、『賃貸借契約書』を提示する<br />\r\n&darr;<br />\r\n借主が、『賃貸借契約書』に署名・捺印する<br />\r\n&darr;<br />\r\n契約が成立！</p>\r\n\r\n<p><img alt=\"イラスト\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_sub01.jpg\" style=\"height:811px; width:1080px\" /></p>\r\n\r\n<p>ここで気を付けたいのは、実際の契約で効力をもつのは「賃貸借契約書」である点。賃貸借契約が成立した後に、もし重要事項説明と契約書の内容の齟齬に気付いても、基本的には契約書の内容が優先されます。</p>\r\n\r\n<p>契約後のトラブルを避けるには、重要事項説明を受けた後、検討の時間を十分に取って、疑問点を解消してから契約に臨むのが有効です。しかし実際には、重要事項説明と契約が同日に行われることが多く、その場で的確な判断をくだすのは難しいでしょう。</p>\r\n\r\n<p>可能であれば、重要事項説明の書類をもらえないかお願いしてみても良いかもしれません。なお、重要事項説明は宅地建物取引士が宅地建物取引士証を提示して行われなければなりません。資格証の提示がない場合には、念のため確認しましょう。</p>\r\n\r\n<h2>最初に確認すべき「賃貸借契約書」7つのポイント</h2>\r\n\r\n<p>賃貸借契約書でチェックすべきポイントを、国土交通省が提供する「賃貸住宅標準契約書（改訂版）」より抜粋して説明します。</p>\r\n\r\n<h3>（1）自分が借りようとしている物件と合っているかチェック</h3>\r\n\r\n<p>賃貸借契約書の冒頭には、物件名称や所在地（住所）、建物の構造（木造、RCなど）、間取り、部屋番号など、借りようとしている物件の情報が記載されています。物件の工事完了年も記載されているので、ここで築年数も確認できます。借りようとしている物件と違う物件を契約しようとしていないか、念のため確認しましょう。</p>\r\n\r\n<p><img alt=\"賃貸住宅標準契約書（改訂版）\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_sub02.png\" style=\"height:540px; width:1080px\" /></p>\r\n\r\n<h3>（2）附属品と残置物の違いを踏まえて設備をチェック</h3>\r\n\r\n<p>附属品とは、部屋と一緒に借りることになる備え付けの設備のこと。故意に壊した場合などを除き、大家さんが修理代を負担します。設備欄で「有」にチェックがついている設備が附属品です。</p>\r\n\r\n<p>一方、注意が必要なのが、残置物。これは前の入居者が残したものを、使えそうだから、そのまま置いているということです。使用は任意ですが、故障しても補償はありません。不要であれば大家さん（管理会社）に相談して、入居前に撤去することもできます。</p>\r\n\r\n<p><img alt=\"賃貸住宅標準契約書（改訂版）\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_sub03.png\" style=\"height:888px; width:1080px\" /></p>\r\n\r\n<h3>（3）契約期間と諸費用を正確に把握しておこう</h3>\r\n\r\n<p>契約期間とともに、敷金、礼金、家賃、家賃の支払い方法などをチェックしましょう。なお、契約期間については契約内容によりますが、2年契約だからといって必ず2年間住まなければいけないということではありません。</p>\r\n\r\n<p><img alt=\"賃貸住宅標準契約書（改訂版）\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_sub04.png\" style=\"height:719px; width:1080px\" /></p>\r\n\r\n<h3>（4）大家さんと管理業者の連絡先は控えておこう</h3>\r\n\r\n<p>入居後にトラブルが起こった際などの連絡先が記載されています。いざというときのため、いつでも確認できるように控えておきましょう。なお、トラブルの際の連絡先と、解約など契約に関する相談は連絡先が異なる場合もあるため、どんなときにどこに連絡をするのかを確認しておくことが大切です。</p>\r\n\r\n<p><img alt=\"賃貸住宅標準契約書（改訂版）\" src=\"https://suumo.jp/article/oyakudachi/wp-content/uploads/2018/07/chintai_keiyakusyo_sub05.png\" style=\"height:414px; width:1080px\" /></p>\r\n\r\n<h3>（5）解約するときの流れは？</h3>\r\n\r\n<p>（5）～（7）に該当する賃貸借契約書の後半には、借主と貸主の約束事が箇条書きで記載されています。字が細かく表現も分かりづらいですが、入居後のトラブルの原因になりやすい解約条項と禁止事項、違約金についてはしっかり確認しましょう。<br />\r\n特に&ldquo;解約通告期間&rdquo;は見落としがちです。時折、「解約通告は2カ月前という契約条項を見落とし、1カ月前と思い込んでいたため、引越しの際、その1カ月前に通告。その結果、想定より1カ月分多く家賃を支払うことになってしまった」というケースも見られます。</p>\r\n\r\n<h3>（6）入居中に修繕が発生した場合の負担確認は必須</h3>\r\n\r\n<p>電球の取り換えは勝手にしてもよいのか？　エアコンの故障時は誰に連絡するのか？　など、どういうときに誰が修繕費を負担するのかを明確にしておきましょう。</p>\r\n\r\n<h3>（7）解約時の原状回復義務と敷金の精算について</h3>\r\n\r\n<p>これは非常に重要で、解約時に借主が負担すべきものがどう規定されているかを確認しておかないと、大きなトラブルを招きかねません。また、原状回復にかかる実費の額にかかわらず、敷金から一定額を差し引かれる場合もあります。</p>\r\n\r\n<p>国土交通省の「原状回復ガイドライン」に則るなら、ルームクリーニングや通常損耗（時間の経過によって自然と劣化したもの。壁紙の日焼けによる黄ばみなど）の修繕は基本的に借主に負担義務はありません。しかし、実際には特約によってガイドラインと異なる契約内容となっていることも多く、トラブルが多発しています。そのため、契約前にガイドラインと照らし合わせ、契約書にガイドラインの規定と異なる特約があるかどうか、ある場合は解約時にどういう負担が発生するのかを確認しておくことをおすすめします。</p>', NULL, '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCode-T%E1%BA%A5u-H%C3%A0i-100936801748264%2F&tabs=timeline&width=220&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=622413644906429\" width=\"220\" height=\"500\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"></iframe>', '13.1965807,108.2225727', 'video1603345182274.mp4', 'banner_image1603365539214.jpg', 'AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBk', '<h3>私たちに関しては</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>株式会社アシスト・ビジネス 本社 : 〒102-0074　東京都千代田区九段南3-3-18 駒込支店 : 〒170-0003　東京都豊島区駒込2-7-23 アシスト駒込マンション101</p>', '<h3>フォローする</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>TEL.03-5980-9395 FAX.03-3918-8881 営業時間　　10:00～18:00 定休日　土曜日、日曜日、祝祭日 プライバシーポリシー　サイトポリシー　サイトマップ</p>', 'đây là 1 trang web', NULL, '2020-10-31 16:38:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#20f807',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#20f807',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `status`, `color`, `created_at`, `updated_at`) VALUES
(2, '利用可能', 1, '#ef6910', NULL, '2020-10-16 11:19:07'),
(3, '販売済み', 1, '#20f807', '2020-10-15 09:07:54', '2020-10-15 09:41:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'description',
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `facebook` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `twitter` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instagram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `photo`, `status`, `remember_token`, `description`, `position`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'ルアン・ユフ', 'phuocnguyenngoc1997@gmail.com', NULL, '$2y$10$RtVmSU6Bot9emNoca.eUxuMUDVf4PwOEgxJnDeywo0aMATFn5gA.u', 1, 'photo-16034403305f928eca8a420.jpg', 1, '51n52mv4FdBCZCj7puFwzV6qfoNrl5SMl2ZsWN01x35IncHc6urOcK2ZJeFa', 'Con nguyện hóa làm cây cầu đá, chịu kiếp 500 năm gió thốc, 500 năm nắng đổ , 500 năm mưa sa, chỉ nguyện người con gái đó, đi qua cây cầu.', 'スタッフ', 'https://www.facebook.com/profile.php?id=100005694852711', 'https://www.facebook.com/profile.php?id=100005694852711', 'sda', '2020-07-17 22:27:53', '2020-10-23 10:05:30'),
(4, 'ヤン・ミンシュン', 'thuandm1@deophaiepsopdau.com', NULL, '$2y$10$JEEHbwn4f14M3ZW1N5vyTefZhuxdsyDhjZA5UlxCWWsRa3nalJEJa', 1, 'user-16029988335f8bd23154c35.jpg', 0, NULL, '\"When you cut against the grain of the wood, much strength is needed. When you program against the grain of the problem, much code is needed\" - Master Yuan-Ma', 'スタッフ', '', '', '', '2020-08-13 02:24:44', '2020-11-16 14:52:09'),
(5, 'ルアン・ドゥイフェン', 'PhongND@deophaiepsopdau.com.vn', NULL, '$2y$10$.wezAYLvGWV/yQD5ZjbEneJB.dGFOkOszaYteGHmDUJsfXVfXVeHm', 1, 'user-16029988575f8bd2494cf59.jpg', 0, NULL, 'mô tả', 'スタッフ', '', '', '', '2020-08-16 21:01:53', '2020-11-16 14:51:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisements_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `download_file`
--
ALTER TABLE `download_file`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_categories`
--
ALTER TABLE `group_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hero_images`
--
ALTER TABLE `hero_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_submits`
--
ALTER TABLE `info_submits`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `download_file`
--
ALTER TABLE `download_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `group_categories`
--
ALTER TABLE `group_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hero_images`
--
ALTER TABLE `hero_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `info_submits`
--
ALTER TABLE `info_submits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `map`
--
ALTER TABLE `map`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

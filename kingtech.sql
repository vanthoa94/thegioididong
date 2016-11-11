-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2016 at 05:35 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_visit` datetime NOT NULL,
  `after_last_visit` datetime NOT NULL,
  `block` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `group_id`, `name`, `username`, `email`, `password`, `phone`, `last_visit`, `after_last_visit`, `block`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$zRFL.B5mnjpUjqMgOx4SDOfmO31cWikhYqBigOV3TJ5Ox62mTZsie', '01686539737', '2016-08-11 12:28:53', '2016-08-11 20:40:31', 0, '0000-00-00 00:00:00', '2016-08-11 13:40:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_role`
--

CREATE TABLE `admin_group_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_group_role`
--

INSERT INTO `admin_group_role` (`id`, `group_id`, `role_id`) VALUES
(1, 1, 49),
(2, 1, 50),
(3, 1, 51),
(4, 1, 52),
(5, 1, 33),
(6, 1, 34),
(7, 1, 35),
(8, 1, 36),
(9, 1, 41),
(10, 1, 42),
(11, 1, 43),
(12, 1, 44),
(13, 1, 45),
(14, 1, 46),
(15, 1, 47),
(16, 1, 48),
(17, 1, 27),
(18, 1, 28),
(19, 1, 29),
(20, 1, 30),
(21, 1, 37),
(22, 1, 38),
(23, 1, 39),
(24, 1, 40),
(25, 1, 53),
(26, 1, 54),
(27, 1, 55),
(28, 1, 56),
(29, 1, 1),
(30, 1, 2),
(31, 1, 3),
(32, 1, 4),
(33, 1, 19),
(34, 1, 20),
(35, 1, 21),
(36, 1, 22),
(37, 1, 15),
(38, 1, 16),
(39, 1, 17),
(40, 1, 18),
(41, 1, 71),
(42, 1, 72),
(43, 1, 73),
(44, 1, 74),
(45, 1, 23),
(46, 1, 24),
(47, 1, 25),
(48, 1, 26),
(49, 1, 11),
(50, 1, 12),
(51, 1, 13),
(52, 1, 14),
(53, 1, 57),
(54, 1, 58),
(55, 1, 59),
(56, 1, 60),
(57, 1, 61),
(58, 1, 62),
(59, 1, 63),
(60, 1, 64),
(61, 1, 5),
(62, 1, 6),
(63, 1, 7),
(64, 1, 8),
(65, 1, 9),
(66, 1, 10),
(67, 1, 65),
(68, 1, 66),
(69, 1, 67),
(70, 1, 68),
(71, 1, 69),
(72, 1, 70),
(73, 1, 31),
(74, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `url`, `image`, `position`, `display`, `created_at`, `updated_at`) VALUES
(1, '', '', 'ads/androidtvbox123.jpg', 1, 1, '2016-08-03 12:49:13', '2016-08-03 12:49:13'),
(2, '', '', 'ads/androidtvbox123.jpg', 2, 1, '2016-08-03 12:49:21', '2016-08-03 12:49:21'),
(3, '', '', 'ads/httpdangcapdigitalcomc395camerasricam105.gif', 3, 1, '2016-08-03 12:50:53', '2016-08-03 12:50:53'),
(4, 'khuyến mãi 50%', '', 'ads/httpdangcapdigitalcomc395camerasricam105.gif', 5, 1, '2016-08-11 13:45:38', '2016-08-11 13:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `agencys`
--

CREATE TABLE `agencys` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `googlemap` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `display_footer` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agencys`
--

INSERT INTO `agencys` (`id`, `branch_id`, `name`, `address`, `phone`, `email`, `googlemap`, `display_footer`, `created_at`, `updated_at`) VALUES
(1, 1, 'dai lý tại hà nội', 'hà nội', '0987654321 - 12456789', 'mail@gmail.com', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `require` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `developers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `app_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `cate_id`, `name`, `url`, `description`, `keywords`, `image`, `status`, `capacity`, `require`, `version`, `developers`, `content`, `display`, `created_at`, `updated_at`, `app_url`) VALUES
(2, 4, 'Phần mềm Camera Ip', 'phan-mem-camera-ip', 'Phần mềm Camera Ip trên máy tính', 'phần mềm xem camera ip qua mạng', 'app/mobile/36phanmemcameraiptrenmaytinh.jpg', 'Miễn phí', '1mb', '', '', 'kingtech', '<br>', 1, '2016-08-03 12:10:38', '2016-08-03 12:10:38', 'https://www.dropbox.com/s/a8q2oeic8evgz5z/CMSsetup.rar?dl=0'),
(3, 3, 'Phần mềm teamview 11', 'phan-mem-teamview-11', 'Phần mềm teamview 11', 'phần mềm teamviewer', 'app/desktop/winmainwindow.png', 'Miễn phí', '', '', '', '', '<br>', 1, '2016-08-03 12:13:41', '2016-08-03 12:13:41', 'https://download.teamviewer.com/download/TeamViewer_Setup_vi-iod.exe');

-- --------------------------------------------------------

--
-- Table structure for table `app_cate`
--

CREATE TABLE `app_cate` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `index` int(10) UNSIGNED NOT NULL,
  `display` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_cate`
--

INSERT INTO `app_cate` (`id`, `name`, `url`, `parent`, `index`, `display`) VALUES
(1, 'Ứng dụng desktop', 'ung-dung-desktop', 0, 0, 1),
(2, 'Ứng dụng mobile', 'ung-dung-mobile', 0, 1, 1),
(3, 'Remote', 'teamviewer', 1, 0, 1),
(4, 'Xem camera trên mobile', 'xem-camera-tren-mobile', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `index` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `zone`, `name`, `city_name`, `index`) VALUES
(1, 1, 'chi nhánh đại lý Hà nội', 'Hà nội', 0),
(2, 2, 'Chi nhánh vinh', 'Nghệ An', 0),
(3, 3, 'chi nhánh biên hòa', 'Đồng Nai', 0),
(4, 3, 'Chi nhánh bình thạnh', 'hồ chí minh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `sort_home` int(10) UNSIGNED NOT NULL,
  `sort_menu` int(10) UNSIGNED NOT NULL,
  `display` tinyint(4) NOT NULL,
  `icon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ads` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `parent`, `name`, `url`, `meta_description`, `meta_keywords`, `show_home`, `sort_home`, `sort_menu`, `display`, `icon`, `ads`) VALUES
(1, 0, 'Đầu ghi hình', 'dau-ghi-hinh', 'Đầu ghi hình', 'Đầu ghi hình', 1, 2, 0, 1, 'fa-save', ''),
(2, 0, 'Camera', 'camera', 'camera', 'camera', 1, 1, 1, 1, 'fa-camera-retro', ''),
(3, 1, 'Đầu ghi hình analog', 'dau-ghi-hinh-analog', 'Đầu ghi hình analog', 'Đầu ghi hình analog', 1, 0, 1, 1, 'fa-', ''),
(4, 1, 'Đầu ghi hình camera IP', 'dau-ghi-hinh-ip', 'Đầu ghi hình camera IP', 'Đầu ghi hình camera IP', 0, 1, 1, 1, 'fa-', ''),
(5, 0, 'Thiết bị báo động', 'thiet-bi-bao-dong', 'Thiết bị báo động', 'Thiết bị báo động', 0, 0, 0, 1, 'fa-bell-o', ''),
(6, 0, 'TV box', 'tv-box', 'TV box', 'TV box', 0, 0, 0, 1, 'fa-desktop', ''),
(7, 0, 'Nhà thông minh', 'nha-thong-minh', 'Nhà thông minh', 'Nhà thông minh', 0, 0, 0, 1, 'fa-home', ''),
(8, 0, 'Bộ đàm', 'bo-dam', 'Bộ đàm', 'Bộ đàm', 0, 0, 0, 1, 'fa-building', ''),
(9, 0, 'Năng lượng mặt trời', 'nang-luong-mat-troi', 'Năng lượng mặt trời', 'Năng lượng mặt trời', 0, 0, 0, 1, 'fa-asterisk', ''),
(10, 0, 'Thiết bị định vị', 'thiet-bi-dinh-vi', 'Thiết bị định vị', 'Thiết bị định vị', 1, 0, 0, 1, 'fa-bug', ''),
(11, 0, 'Phụ Kiện', 'phu-kien', 'Phụ Kiện', 'Phụ Kiện', 0, 0, 0, 1, 'fa-shopping-cart', ''),
(12, 2, 'Camera IP', 'camera-ip', 'Camera IP', 'Camera IP', 0, 0, 0, 1, 'fa-none', ''),
(13, 2, 'Camera analog', 'camera-analog', 'Camera analog', 'Camera analog', 0, 0, 0, 1, 'fa-none', ''),
(14, 2, 'Camera AHD', 'camera-ahd', 'Camera AHD', 'Camera AHD', 0, 0, 0, 1, 'fa-none', ''),
(15, 11, 'Adapter', 'adapter', 'Adapter', 'Adapter', 0, 0, 0, 1, 'fa-none', ''),
(16, 11, 'Dây cáp', 'day-cap', 'Dây cáp', 'Dây cáp', 0, 0, 0, 1, 'fa-none', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_admins`
--

CREATE TABLE `group_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_admins`
--

INSERT INTO `group_admins` (`id`, `name`) VALUES
(1, 'Admintrantor');

-- --------------------------------------------------------

--
-- Table structure for table `group_role`
--

CREATE TABLE `group_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_role`
--

INSERT INTO `group_role` (`id`, `name`) VALUES
(1, 'Quản lý sản phẩm'),
(2, 'Quản lý menu'),
(3, 'Quản lý tin tức'),
(4, 'Quản lý trang'),
(5, 'Quản lý loại sản phẩm'),
(6, 'Quản lý loại tin tức'),
(7, 'Quản lý slide'),
(8, 'Quản lý quảng cáo'),
(9, 'Quản lý ứng dụng'),
(10, 'Quản lý loại ứng dụng'),
(11, 'Quản lý video'),
(12, 'Quản lý chi nhánh'),
(13, 'Quản lý đại lý'),
(14, 'Quản lý hỗ trợ'),
(15, 'Quản lý tag'),
(16, 'Quản lý admin'),
(17, 'Quản lý người dùng'),
(18, 'Quản lý website'),
(19, 'Quản lý nhóm admin');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `index` smallint(6) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `show_menu_top` tinyint(4) NOT NULL,
  `show_footer` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `index`, `parent_id`, `color`, `show_menu_top`, `show_footer`) VALUES
(5, 'Tin tức', 'tin-tuc', 1, 0, '', 1, 0),
(8, 'Video', 'video', 2, 0, '', 1, 0),
(9, 'Giới thiệu', 'gioi-thieu', 0, 0, '', 1, 0),
(10, 'Hỗ trợ', 'ho-tro', 3, 0, '', 1, 0),
(12, 'Ứng dụng', 'ung-dung', 4, 0, '', 1, 0),
(13, 'Tuyển dụng', 'tuyen-dung', 5, 0, '', 1, 0),
(14, 'Danh sách đại lý', 'dai-ly-phan-phoi', 6, 0, '', 1, 0),
(15, 'Liên hệ', 'lien-he', 7, 0, '', 1, 0),
(16, 'Chính sách vận chuyển', 'chinh-sach-van-chuyen', 1, 10, '', 1, 1),
(17, 'Quy định bảo hành', 'quy-dinh-bao-hanh', 0, 10, '', 1, 1),
(18, 'Chính sách đổi hàng', 'chinh-sach-doi-hang', 0, 10, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_19_125024_create_menu_table', 1),
('2016_07_19_125955_create_page_table', 1),
('2016_07_19_130429_create_website_table', 1),
('2016_07_19_132700_create_support_table', 1),
('2016_07_19_133354_create_branch_table', 1),
('2016_07_19_134240_create_agency_table', 1),
('2016_07_19_134910_create_ads_table', 1),
('2016_07_19_135606_create_slideshow_table', 1),
('2016_07_19_135917_create_news_cate_table', 1),
('2016_07_19_140145_create_news_table', 1),
('2016_07_19_140747_create_category_table', 1),
('2016_07_19_142736_create_group_role_table', 1),
('2016_07_19_142833_create_role_table', 1),
('2016_07_19_142857_create_group_admin_table', 1),
('2016_07_19_142914_create_admin_table', 1),
('2016_07_19_143738_create_admin_group_role_table', 1),
('2016_07_19_145207_create_video_table', 1),
('2016_07_19_145923_create_app_cate_table', 1),
('2016_07_19_150123_create_app_table', 1),
('2016_07_20_012733_create_product_table', 1),
('2016_07_20_015545_create_orders_table', 1),
('2016_07_20_020626_create_order_details_table', 1),
('2016_07_20_022115_create_tags_table', 1),
('2016_07_20_064356_create_update_1_table', 1),
('2016_07_21_162200_create_update_2_table', 2),
('2016_07_30_031401_create_update_3_table', 2),
('2016_07_30_133608_create_update_4_table', 3),
('2016_08_02_120012_create_update_5_table', 4),
('2016_08_02_194009_create_useronline_table', 4),
('2016_08_02_194316_create_statistics_online_table', 4),
('2016_08_04_192928_create_update_6_table', 5),
('2016_08_08_212054_create_update_7_table', 6),
('2016_08_10_130539_create_update_7_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hot` tinyint(4) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `cate_id`, `title`, `url`, `image`, `hot`, `description`, `keywords`, `content`, `display`, `created_at`, `updated_at`, `viewer`) VALUES
(5, 1, 'CHƯƠNG TRÍNH KHUYẾN MÃI CỰC SỐC VỚI SẢN PHẨM ĐANG HOT NHẤT 2016 HIỆN NAY- SJCAM M20', 'chuong-trinh-khuyen-mai-cuc-soc-voi-san-pham-dang-hot-nhat-2016-hien-nay-sjcam-m20', 'news/khuyenmai/125chuongtrinhkhuyenmaicucsocvoisanphamdanghotnhat2016hiennaysjcamm20.jpg', 0, 'CHƯƠNG TRÍNH KHUYẾN MÃI CỰC SỐC VỚI SẢN PHẨM ĐANG HOT NHẤT 2016 HIỆN NAY- SJCAM M20', 'CHƯƠNG TRÍNH KHUYẾN MÃI CỰC SỐC VỚI SẢN PHẨM ĐANG HOT NHẤT 2016 HIỆN NAY- SJCAM M20', '<p><b>CHƯƠNG TRÍNH KHUYẾN MÃI CỰC SỐC VỚI SẢN PHẨM ĐANG HOT NHẤT 2016 HIỆN NAY- SJCAM M20</b></p><p>Chương trình khuyến mãi ĐẶT BIỆT áp dụng có giới hạn từ ngày 14/07/2016 đến hết ngày 01/08/2016.</p><p>Chiếc Camera hành trình SJCAM M20 dễ dàng làm “ siêu lòng “ hàng loạt DÂN PHƯỢT bởi thiết kế bên ngoài “ duyên dáng” nhỏ gọn cùng tính năng tuyệt vời , chụp và quay chất lượng hình ảnh 4k chuẩn đẹp, hỗ trợ wifi kết nối với điện thoại tiện lợi hữu ích, mà giá chỉ với 2.990.000vnđ hàng chính bảo hành 3 năm, phụ kiện đầy đủ nguyên hộp.</p><p>=================================================</p><p>100 KHÁCH HÀNG ĐẦU TIÊN TRÊN FACEBOOK mua sản phẩm CAMERA HÀNH TRÌNH SJCAM M20 đang HOT nhất MÀU HÈ 2016 này sẽ được nhận ngay MÓN QUÀ ƯU ĐÃI gồm 2 COMBO:</p><p>Mua sản phẩm SJCAM M20 CHÍNH HÃNG giá: 2.990.000vnđ BẢO HÀNH 3 NĂM.</p><p>Phần quà khuyến mãi:</p><p>COMBO 1:</p><p> + Full phụ kiện</p><p> + Tặng kèm 1 PIN SJCAM CHÍNH HÃNG</p><p> + Tặng kèm thẻ nhớ 16GB Class 10</p><p> + Tặng 1 túi đựng HIỆU SJCAM</p><p><img src="blob:https%3A//mail.google.com/42393159-232e-462e-aa05-1cbc1b7e5d79" alt="Displaying sjcam-m20.jpg"></p><p>COMBO 2:</p><p> <sub>­</sub>+ Full phụ kiện</p><p> + Tặng kèm MẶT ĐỒNG HỒ ĐIỀU KHIỂN BLUETOOTH THÔNG MINH tiện lợi</p><p> + Tặng kèm thẻ nhớ 8GB Class 10</p><p> + Tặng 1 túi đựng HIỆU SJCAM</p><p>------------------HẤP DẪN THÌ HÃY LIKE + SHARE CHO MỌI NGƯỜI CÙNG TẬN HƯỞNG NÀO --------------------</p><p> CẢM ƠN BẠN ĐÃ QUAN TÂM ĐẾN SẢN PHẨM CỦA CHÚNG TÔI, XIN CẢM ƠN</p>', 1, '2016-08-03 13:03:15', '2016-08-03 14:08:40', 5),
(6, 1, 'Modem Wifi 3G Huawei B683 tốc độ 28.8Mbps, 4 port LAN chuyên dụng cho xe khách', 'modem-wifi-3g-huawei-b683-toc-do-28-8mbps-4-port-lan-chuyen-dung-cho-xe-khach', 'news/khuyenmai/123modemwifi3ghuaweib683tocdo288mbps4portlanchuyendungchoxekhach.jpg', 1, 'Modem Wifi 3G Huawei B683 tốc độ 28.8Mbps, 4 port LAN chuyên dụng cho xe khách', '', '<h2><strong style="color: inherit; font-family: inherit; font-size: 36px; line-height: 1.1;">Đẳng Cấp Digital chuyên phân phối thiết Bị Phát Wifi Từ Sim 3G Huawei B683 Tốc Độ Cao 28Mbps Phát Sóng Cực Khỏe.</strong><br></h2><big><h1><p><img src="http://dangcapdigital.com/images/p/huawei-b683-modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-0.jpg"></p></h1><h2><font>Bộ Thiết Bị Phát Wifi Từ Sim 3G Huawei B683 Tốc Độ Cao.</font></h2><h1><p><font>- Bộ&nbsp;phát wifi dùng sim 3G Huawei B683&nbsp;là thiết bị phát sóng wifi từ Sim 3G. Tích hợp khe cắm sim 3G cho độ ổn định cao ngay khi gắn trên xe ô tô, xe khách hoặc sử dụng cho văn phòng.</font></p><p><font>- Thiết bị Huawei B683 là thiết bị chuyển đổi sóng 3G rồi phát ra sóng Wifi và mạng có dây thông qua 4 cổng LAN tich hợp tiện lợi.</font></p><p><font>- Bộ&nbsp;phát wifi dùng sim 3G Huawei B683&nbsp;hỗ trợ sim 3G tất cả các mạng 3G trên thế giới đang sử dụng phổ biến hiện nay.</font></p><p><font>- Wifi 3G Huawei B683 có công suất thu và phát lớn, phù hợp với nhu cầu sử dụng trong gia đình, văn phòng và trên các xe khách loại lớn.</font></p><p></p><p><font>- Tốc độ phát sóng Internet của bộ phát wifi 3G rất cao và ổn định, tốc độ download tối đa<strong>28.8 Mbps</strong>và tốc độ upload tối đa 5.76 Mbps cho vùng phủ sóng rồi và kết nối nhanh.</font></p><p><font><br></font></p><p><font><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-2.jpg"></font></p><p><font><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-9.jpg"><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-10.jpg"></font></p></h1><h3><font>- Bộ<strong><font> phát wifi 3G</font> Huawei B683</strong>&nbsp;có chuẩn kết nối WiFi chuẩn B/G/N 300Mbps, hỗ trợ cùng lúc cho <strong>32 thiết bị</strong> (user) kết nối đồng thời. Thiết bị Huawei B683 sử dụng nguồn điện vào dải rộng AC 110 - 240v hoặc DC 5v cho công suất phát mạnh mẽ.</font></h3><h1><p><font>- Huawei B683 có tích hợp Anten 3G bên trong bắt sóng cực mạnh, đồng thời hỗ trợ 1 slot SMA female để gắn thêm antenna gắn thêm bên ngoài.</font></p><p><font>- <strong><font>Thiết bị phát wifi 3G Huawei B683</font></strong> thiết kế sẵn thêm 4 cổng LAN RJ45 hỗ trợ sử dụng cho máy bàn không có Card wifi hoặc gắn với camera IP Cloud hoặc thiết bị phát wifi khác.</font></p><p><font>- Hệ thống đèn led trên <strong>Huawei B683</strong> cho cảm nhận thể hiện trực quan, rất đẹp mắt với các đèn báo kết nối, đèn báo sóng đẹp.</font></p><p><font>- Bộ phát wifi 3G Huawei B683 có thiết kế sang trọng với vỏ gương bóng màu đen chống bám bẩn, có thể vệ sinh thiết bị 1 cách dễ dàng.</font></p><p><font><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-6.jpg"></font></p></h1><h5><strong><font>Thông Số Kỹ Thuật Sản Phẩm Bộ Phát Wifi 3G Huawei B683Tốc Độ Cao:</font></strong></h5><h1><p><font> 1. Nút nguồn 7. Ngắt chế độ sóng<br> 2. Chuyển trạng thái wifi sang sóng 3G 8. Chỉ số cổng LAN<br> 3. Reset trạng thái wifi 9. Chân cổng anten bên ngoài<br> 4. Cổng kết nối usb 10. Cổng cấp nguồn điện<br> 5. Đèn thể hiện trạng thái chuyển đổi 11. Cổng usb<br> 6. Thể hiện chỉ số sóng 12. Cổng mạng LAN</font></p><p><font><br></font></p><p><font>- <font>Cục phát sóng wifi 3G</font> Huawei B683 hỗ trợ sử dụng công nghệ 3G mới nhất: HSPA+/HSDPA/HSUPA/UMTS (900/2000Mhz) cho khả năng dowload tối đa 28.8Mbps/s và tốc độ upload maxspeed 5.76Mbps/s.</font></p><p><font>- <strong><font>Huawei B683</font></strong> phát wifi di động có chức năng như là một bộ định tuyến không dây đầy đủ qua (max 32 user) và mạng LAN RJ45 đang hoạt động. Tích hợp cổng 4xRJ45 LAN Swich.</font></p><p><font>- Thiết bị Huawei B683 hỗ trợ hệ điều hành Windows 2000/XP/Vista/7 cho các modem usb, wifi, UMTS và hệ điều hành chức năng router độc lập.</font></p><p><font><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-3.jpg"></font></p><p><font><br></font></p><p><font><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-5.jpg"><img src="http://dangcapdigital.com/images/p/modem-wifi-3g-huawei-b683-toc-do-288mbps-4-port-lan-rat-phu-hop-cho-xe-khach-co-lon-8.jpg"></font></p></h1></big>', 1, '2016-08-03 13:07:35', '2016-08-03 14:10:01', 3),
(7, 1, 'CAMERA IP KHÔNG DÂY, CHẤT LƯỢNG HÌNH ẢNH HD, TÍCH HỢP BÁO ĐỘNG, CẮM LÀ CHẠY GIÁ DƯỚI 1 TRIỆU ĐỒNG', 'camera-ip-khong-day-chat-luong-hinh-anh-hd-tich-hop-bao-dong-cam-la-chay-gia-duoi-1-trieu-dong', 'news/khuyenmai/106cameraipkhongdaychatluonghinhanhhdtichhopbaodongcamlachaygiaduoi1trieudong.jpg', 1, 'CAMERA IP KHÔNG DÂY, CHẤT LƯỢNG HÌNH ẢNH HD, TÍCH HỢP BÁO ĐỘNG, CẮM LÀ CHẠY GIÁ DƯỚI 1 TRIỆU ĐỒNG', 'CAMERA IP KHÔNG DÂY, CHẤT LƯỢNG HÌNH ẢNH HD, TÍCH HỢP BÁO ĐỘNG, CẮM LÀ CHẠY GIÁ DƯỚI 1 TRIỆU ĐỒNG', '<p>CHƯƠNG TRÌNH KHUYẾN MÃI MUA 1 SẢN PHẨM SJCAM 4000 WIFI TẶNG 4 PHỤ KIỆN CHÀO MỪNG PHIÊN BẢN 2.0 MỚI NHẤT 2016</p><p> + Tặng 1 thẻ nhớ 8GB</p><p> + Tặng 1 gậy tự sướng</p><p> + Tặng 1 dock sạc pin Sjcam</p><p> + Tặng 1 túi đựng Sjcam</p><p>CHƯƠNG TRÌNH KHUYẾN MÃI CÓ GIỚI HẠN- HÃY NHANH TAY SỞ HỮU RIÊNG CHO MÌNH SẢN PHẨM SJCAM 4000WIFI PHIÊN BẠN MỚI</p><h5></h5>', 1, '2016-08-03 13:08:51', '2016-08-03 14:06:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_cates`
--

CREATE TABLE `news_cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `display` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_cates`
--

INSERT INTO `news_cates` (`id`, `name`, `url`, `show_home`, `display`) VALUES
(1, 'KHuyến mãi', '1-khuyen-mai', 1, 1),
(2, 'thủ thuật', '2-thu-thuat', 1, 1),
(3, 'Công nghệ', 'cong-nghe', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `delivered` tinyint(4) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `deliver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `meta_description`, `meta_keywords`, `content`, `display`, `created_at`, `updated_at`, `viewer`) VALUES
(1, 'tuyển nhân viên kinh doanh', 'tuyen-dung', 'tuyển nhân viên kinh doanh', 'tuyển nhận viên kinh doanh', '<p><strong><img src="file:///C:/Users/MyPC/AppData/Local/Temp/msohtmlclip1/01/clip_image002.gif" alt="unnamed"></strong><strong></strong></p>\r\n\r\n<p><strong>CÔNG TY Thiết bị camera HÀO HUÂN TUYỂN DỤNG</strong></p>\r\n\r\n<p><strong></strong></p>\r\n\r\n<p><strong>Nhân viên kinh doanh 05 người (nam/Nữ)</strong></p>\r\n\r\n<p><strong></strong></p>\r\n\r\n<p><strong>MÔ TẢ CÔNG VIỆC:</strong></p>\r\n\r\n<p>- Tìm kiếm và khai\r\nthác khách hàng tiềm năng có nhu cầu làm đại lý camera<br>\r\n- Giới thiệu sản phẩm, chào giá<br>\r\n(Chi tiết công việc sẽ được trao đổi trực tiếp khi phỏng vấn)</p>\r\n\r\n<p><strong></strong></p>\r\n\r\n<p><strong>QUYỀN LỢI ĐƯỢC HƯỞNG:</strong></p>\r\n\r\n<p>- Mức lương cơ bản 6tr-8tr\r\n+ phụ cấp + hoa hồng ( tùy theo doanh số ). Được thưởng theo năng lực làm việc.<br>\r\n- Thời gian làm việc: Giờ hành chánh.<br>\r\n- Được đóng BHYT, BHXH, BHTN <br>\r\n- Được hưởng các chế độ phúc lợi khác theo quy định của công ty<br>\r\n- Nghỉ Lễ tết theo quy định của luật lao động<br>\r\n-<a href="http://mywork.com.vn/tuyen-dung/89/moi-truong.html">Môi trường</a>làm việc năng động và thân thiện, được hỗ trợ tốt nhất để hoàn\r\nthành công việc.</p>\r\n\r\n<p><strong>YÊU CẦU CÔNG VIỆC:</strong></p>\r\n\r\n<p>- Khả năng đi công tác\r\nthị trường và khả năng tiếp xúc khách hàng tốt</p>\r\n\r\n<p>- Không yêu cầu bằng\r\ncấp. Có hiểu biết về công nghệ thông tin</p>\r\n\r\n<p>- Chịu khó, nhiệt\r\nhuyết và đam mê kinh doanh<br>\r\n- Kỹ năng đàm phán, thương lượng, thuyết phục khách hàng tốt</p>\r\n\r\n<p>- Kỹ năng hoạt động\r\nđộc lập, làm việc đội nhóm khi có yêu cầu<br>\r\n- Có khả năng làm việc độc lập, hoặc theo nhóm và chịu được áp lực cao.</p>\r\n\r\n<p>- Ưu tiên có hiểu biết\r\ntốt về công nghệ thông tin, điện-điện tử và công nghệ thông minh</p>\r\n\r\n<p><strong>YÊU CẦU HỒ SƠ</strong></p>\r\n\r\n<p>Đơn xin việc, Sơ yếu\r\nlý lịch, quá trình làm việc</p>\r\n\r\n<p></p>', 1, '2016-07-28 08:43:26', '2016-07-28 08:43:26', 0),
(2, 'Giới thiệu', 'gioi-thieu', 'Lời đầu tiên, cty TNHH thiết bị công nghệ Hào Huân xin gửi lời chào trân trọng và lời cám ơn sâu sắc đến quý khách hàng, đã tin tưởng và hợp tác với chúng tôi trong suốt chặng đường phát triển của công ty.', 'Giới thiệu camera kingtech', '<h2>Thư ngỏ</h2><br><h4></h4><table><tbody><tr><td></td><td></td></tr></tbody></table><table><tbody><tr><td><p>Lời đầu tiên, cty TNHH thiết bị công nghệ Hào Huân xin gửi lời chào trân trọng và lời cám ơn sâu sắc đến quý khách hàng, đã tin tưởng và hợp tác với chúng tôi trong suốt chặng đường phát triển của công ty.</p><p>Công ty chúng tôi chuyên kinh doanh, sản xuất và phân phối camera quan sát, báo trộm, báo cháy, thiết bị định vị GPS, phần mềm chương trình quản lý hệ thống và đang mở rộng tiến tới giải pháp nhà thông minh.<br><strong>Phương châm hoạt động: HỢP TÁC &amp; PHÁT TRIỂN“<br></strong>Công ty TNHH Thiết Bị Công nghệ Hào Huân tự tin là nhà phân phối độc quyền thương hiệu KingTech tại Việt Nam. Luôn cam kết cung cấp cho quý khách hàng những giải pháp và sản phẩm tốt nhất, với đội ngũ nhân viên kĩ thuật dày dạn kinh nghiệm, phong cách phục vụ chuyên nghiệp chúng tôi mang đến cho quý khách hàng chế độ chăm sóc khách hàng cao nhất thỏa mãn và đáp ứng tối đa nhu cầu của khách hàng.<br>Cùng với sự hỗ trợ và cam kết của nhà sản xuất uy tín trên thế giới, Hào Huân luôn mang lại cho khách hàng mức giá hợp lý nhất. Chúng tôi là một nhà cung cấp các sản phẩm thiết bị được ứng dụng công nghệ cao, luôn cam kết mang đến cho khách hàng những sự lựa chọn hợp lý nhất tương ứng với từng nhu cầu cụ thể cho từng ngành nghề và lĩnh vực sản xuất. Liên hệ với chúng tôi, khách hàng sẽ cảm nhận được phong cách phục vụ chuyên nghiệp, tận tình, và nhanh chóng nhất và có rất nhiều chương trình ưu đãi đối với khách hàng.</p><p> Hình ảnh công ty:</p><p> </p><p><strong>Mọi chi tiết xin liên hệ:</strong></p><p>Công ty TNHH Thiết Bị Công Nghệ Hào Huân<br>ĐỒNG NAI : D394 TỔ 8, KP4, P.LONG BÌNH, TP.BIÊN HÒA, ĐỒNG NAI<br>HỒ CHÍ MINH : 206H3, CHU VĂN AN, P.26, Q.BÌNH THẠNH, TP.HCM<br>Hotline: 0613891561 - Fax: 0613891561<br>Phone: +84.947.93.28.28<br>Website:<a href="http://kingtech.com.vn/">http//kingtech.com.vn<br></a>hoặc<a href="http://thietbicamera.com.vn/">http://thietbicamera.com.vn</a></p></td></tr></tbody></table>', 1, '2016-08-03 11:40:22', '2016-08-03 11:40:22', 0),
(3, 'Liên hệ', 'lien-he', 'CÔNG TY TNHH THIẾT BỊ CÔNG NGHỆ HÀO HUÂN', 'CÔNG TY TNHH THIẾT BỊ CÔNG NGHỆ HÀO HUÂN', '<h2>CÔNG TY TNHH THIẾT BỊ CÔNG NGHỆ HÀO HUÂN</h2><br><h4>CÔNG TY TNHH THIẾT BỊ CÔNG NGHỆ HÀO HUÂN</h4><table><tbody><tr><td><a href="http://kingtech.com.vn/images/logo-hao-huan.png"><img src="http://kingtech.com.vn/images/logo-hao-huan.png"></a></td><td>Địa chỉ : Đồng Nai: D 394 Tổ 8, Kp 4, P. Long Bình, Tp. Biên Hòa, Đồng Nai.<br><br>Hồ Chí Minh: 206H3, Chu Văn An, P.26, Q.Bình Thạnh, Tp. HCM.<br>Điện thoại : 0947.93.2828 - 0949.475.821<br>@ Email : <a href="mailto:congnghethoidai1906@gmail.com">congnghethoidai1906@gmail.com</a><br>Website: <a href="http://kingtech.com.vn/">http://kingtech.com.vn</a></td></tr></tbody></table>', 1, '2016-08-03 11:41:50', '2016-08-03 11:41:50', 0),
(4, 'Quy định bảo hành', 'quy-dinh-bao-hanh', '', '', '<table><tbody><tr><td><p><i>Xin quý khách kiểm tra hàng kỹ khi nhận hàng. Hàng được giao hoàn toàn mới 100% và có dán tem bảo hành của&nbsp;<strong>KINGTECH.COM.VN</strong><em>. Trên tem có ghi rõ ngày tháng năm vàthời hạn bảo hành theo đúng quy định bảo hành của nhà sản xuất.</em></i></p></td></tr><tr><td></td></tr><tr><td><table><tbody><tr><td><strong>I. ĐỐI VỚI TẤT CẢ SẢN PHẨM MUA TẠI KINGTECH.COM.VN<br></strong></td></tr></tbody></table></td></tr><tr><td><table><tbody><tr><td></td><td><p><strong>1. Điều kiện bảo hành:</strong></p></td></tr><tr><td></td><td><table><tbody><tr><td></td><td><ul><li>Tất cả các sản phẩm linh kiện, thiết bị phải có tem bảo hành của&nbsp;<strong>KINGTECH.COM.VN&nbsp;</strong>và tem phải còn trong thời hạn bảo hành.</li><li>Tem bảo hành phải còn nguyên vẹn, không có dấu hiệu cạo sửa, tẩy xoá hay bị rách mờ.</li><li>Những hư hỏng của thiết bị được xác định do lỗi kỹ thuật hoặc lỗi của nhà sản xuất.</li></ul></td></tr></tbody></table></td></tr><tr><td></td><td><p><strong>2. Điều kiện không bảo hành:</strong></p></td></tr><tr><td></td><td><table><tbody><tr><td></td><td><ul><li>Thiết bị do va chạm hoặc đã bị rơi rớt, bể mẻ, móp méo, biến dạng, trầy xước, ẩm gỉ, gỉ sét, phù tụ.</li><li>Thiết bị có dấu hiệu cháy nổ, chuột bọ,côn trùng xâm nhập hoặc được sử dụng trong môi trường ẩm ướt.</li><li>Hư hỏng do thiên tai hoả hoạn,sử dụng nguồn điện không ổn định hoặc do vận chuyển không đúng quy cách.</li><li>Không bảo hành các thiết bị phụ kiện như: bộ sạc, tai nghe, pin, cable nối, vỏ máy, nút hay công tắc, dây điện, remote điều khiển</li><li>Không chịu trách nhiệm bảo hành dữ liệu có chứa trong thiết bị lưu trữ của khách hàng khi bảo hành thiết bị.</li></ul></td></tr></tbody></table></td></tr><tr><td></td><td><p><strong>3. Phương thức bảo hành:</strong></p></td></tr><tr><td></td><td><table><tbody><tr><td></td><td><ul><li>Tất cả các thiết bị được bảo hành miễn phí trong suốt thời hạn bảo hành.</li><li>Hàng mới mua trong vòng 05 ngày sẽ được đổi ngay hàng mới nếu việc kiểm tra hàng đó hư hỏng do lỗi của nhà sản xuất. Trong trường hợp không có hàng mới để đổi thì sẽ thoả thuận đổi sang hàng mới khác có giá trị tương đương hoặc sẽ hoàn trả lại đúng số tiền mà quý khách đã mua. <strong>Chú ý :</strong> không áp dụng đối với các thiết bị như : thiết bị có tính chất hao mòn, các thiết bị bị cắt rời, bẻ gãy, làm mất bao bì hoặc bị trầy xước, dơ bẩn.</li><li>Trường hợp hàng đã mua quá thời hạn 05 ngày thì sẽ được nhận lại để bảo hành(sửa chữa). Nếu không thể sửa chữa được thì cửa hàng sẽ thay thế một sản phẩm khác tương đương và sản phẩm này không nhất thiết mới 100%.</li><li><strong>Thời gian giải quyết bảo hành từ 3-&gt;7 ngày kể từ ngày nhận (trừ ngày chủ nhật và các ngày lễ) và tuỳ từng trường hợp có thể giải quyết sớm hơn hoặc chậm hơn.</strong></li><li><strong>Thời gian nhận và trả bảo hành từ 12h- 17hmỗi ngày</strong></li><li>Đối với các thiết bị không thể sửa chữa được mà thiết bị này hết hàng do không còn sản xuất nữa hoặc không còn lưu hành trên thị trường, quý khách phải đợi nhà phân phối đổi hàng khác có giá trị tương đương hoặc cao hơn và bù tiền theo thoả thuận của giá cả hiện hành trên thị trường. Thời hạn bảo hành đối với sản phẩm được thay thế sẽ được tính tiếp tục chứ không bảo hành lại từ đầu.</li><li>Đối với các thiết bị không sửa chữa được trong nước phải gởi sang nhà sản xuất ở nước ngoài thì thời hạn có thể kéo dài từ 4 đến 6 tuần. Trong trường hợp này cửa hàng sẽ thay thế một sản phẩm có tính năng tương đương để quý khách tạm sử dụng</li></ul></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 1, '2016-08-03 11:46:28', '2016-08-03 11:46:28', 0),
(5, 'Chính sách vẫn chuyển', 'chinh-sach-van-chuyen', 'Chính sách vẫn chuyển', 'Chính sách vẫn chuyển', '<p><strong>I. MỤC ĐÍCH</strong></p><p>- Tạo sự khác biệt về quyền lợi cho khách hàng khi đến mua hàng tại KINGTECH.COM.VN</p><p>- Hỗ trợ và gia tăng giá trị ưu đãi cho khách hàng khi mua hàng tại KINGTECH.COM.VN</p><p><strong>II. PHẠM VI ÁP DỤNG</strong></p><p>- Đối tượng áp dụng: Khách hàng mua các sản phẩm tại KINGTECH.COM.VN</p><p>- Sản phẩm áp dụng: Áp dụng cho tất cả các sản phẩm trong&nbsp;KINGTECH.COM.VN</p><p> - Khu vực áp dụng: KINGTECH.COM.VN sẽ giao hàng và lắp đặt miễn phí tại các tỉnh, thành phố trên toàn khu vực miền Nam Việt Nam.</p><p><strong>III. NỘI DUNG</strong></p><p></p><p><strong> 1.</strong><strong>Điều kiện áp dụng</strong></p><p> - Để thực hiện chính sách này khách hàng cần thanh toán trước 100% giá trị của đơn hàng.</p><p> - KINGTECH.COM.VN sẽ <strong>vận chuyển và lắp đặt</strong> miễn phí cho khách hàng:</p><p></p><table><tbody><tr><td><p><strong> Khoảng cách miễn phí</strong></p></td><td><p><strong>Tổng giá trị đơn hàng</strong></p></td><td><p><strong>Thời gian giao nhận</strong></p></td></tr><tr><td><p> Trong vòng 20 km</p></td><td><p>Từ 01 triệu đồng</p></td><td><p>&lt; 01 ngày</p></td></tr><tr><td><p> Trong vòng 50 km</p></td><td><p>Từ 10 triệu đồng</p></td><td><p>&lt; 05 ngày</p></td></tr><tr><td><p> Trong vòng 100 km</p></td><td><p>Từ 20 triệu đồng</p></td><td><p>&lt; 07 ngày</p></td></tr><tr><td><p> Trong vòng 200 km</p></td><td><p>Từ 50 triệu đồng</p></td><td><p>&lt; 10 ngày</p></td></tr><tr><td><p>Vận chuyển, lắp đặt miễn phí toàn miền Nam</p></td><td><p>Từ 100 triệu đồng</p></td><td><p>Theo thỏa thuận</p></td></tr></tbody></table><p> </p><p> - Trước khi vận chuyển, bộ phận giao nhận sẽ liên lạc với Quý khách hàng để xác nhận khoảng thời gian và địa điểm giao hàng cụ thể.</p><p> - Thời gian giao hàng: Tất cả các ngày trong tuần.</p><p></p><p><strong>2. Các điều kiện khác</strong></p><p> - Chính sách “Vận chuyển, lắp đặt miễn phí toàn miền Nam” không áp dụng đối với những sản phẩm được mua trong chương trình khuyến mại giờ vàng, giá sốc….. hoặc trong những lô hàng bán thanh lý.</p><p> - Đối với mỗi một đơn hàng trong phạm vi chính sách, KINGTECH.COM.VN chỉ vận chuyển, lắp đặt miễn phí 01 lần.</p><p> - Chi phí cầu đường, phí vào thôn xã hoặc phí đỗ xe tại chung cư do khách hàng tự thanh toán.</p><p> - Phương tiện vận chuyển (Ô tô, xe máy hay các phương tiện giao thông khác) do KINGTECH.COM.VN tự điều phối và quyết định.</p><p> - &nbsp;KINGTECH.COM.VN chỉ giao hàng cho đúng người nhận mà Quý khách hàng đã đăng ký khi mua hàng. Trong quá trình giao hàng nếu có sự thay đổi người nhận một cách không rõ ràng, KINGTECH.COM.VN có quyền từ chối giao hàng và yêu cầu Quý khách hàng nhận hàng tại địa điểm của &nbsp;KINGTECH.COM.VN</p><p> - Một số trường hợp địa chỉ giao hàng không rõ ràng, nằm trong ngõ ngách, hoặc ở những nơi nguy hiểm, những vùng đồi núi hiểm trở, phương tiện giao thông đi lại khó khăn, KINGTECH.COM.VN giữ quyền từ chối vận chuyển, giao nhận hàng trực tiếp.</p><p> - Trong các trường hợp bất khả kháng, do thiên tai, lũ lụt, hỏng hóc cầu phà …, công ty KINGTECH.COM.VN không chịu trách nhiệm bồi thường thiệt hại phát sinh do giao hàngkhông đúng thời gian hoặc không vận chuyển hàng hóa đến địa điểm như đã thỏa thuận với khách hàng.</p><p> - Trường hợp &nbsp;đã vận chuyển hàng đến địa điểm giao nhận như thỏa thuận lúc mua hàng, nhưng vì một lý do nào đó khách hàng yêu cầu trả lại hàng thì lúc đó khách hàng phải chịu chi phí vận chuyển theo biểu giá quy định của công ty.</p><p> - Đối với những sản phẩm nặng và cồng kềnh cần vận chuyển lên tầng mà không có thang máy đề nghị khách hàng hỗ trợ trong việc giao nhận.</p><p> - Trong những ngày đặc biệt hoặc các ngày Lễ hội do chính sách giao thông chung bị hạn chế (cấm đường đối với một số phương tiện…) thời gian giao hàng có thể sẽ thay đổi, KINGTECH.COM.VN sẽ gọi điện cho khách hàng để thống nhất thời gian giao nhận.</p><strong>Lưu ý:</strong><p><em>Để có thông tin chi tiết hoặc nếu có gì vướng mắc, Quý khách vui lòng liên lạc với bộ phân <strong><em>Chăm sóc khách hàng</em> </strong>tại các Siêu thị của</em>&nbsp;&nbsp;<b>KINGTECH.COM.VN</b></p>', 1, '2016-08-03 11:51:33', '2016-08-03 11:52:38', 0),
(6, 'Chính sách đổi hàng', 'chinh-sach-doi-hang', 'Chính sách đổi hàng', 'Chính sách đổi hàng', '<p><strong>1. Thời hạn đổi hàng</strong></p><p>Quý khách hàng có thể thực hiện đổi hàng trong vòng 01 - 02 ngày kể từ khi nhận hàng đặt mua tại Kingtech.com.vn theo các điều khoản quy định tại mục 2 dưới đây.</p><p><strong>2. Các trường hợp đổi</strong></p><p><strong>2.2 Đổi hàng</strong></p><p>- Sau khi mua hàng, nếu khách hàng thấy không hài lòng với sản phẩm hoặc thay đổi nhu cầu, khách có thể đổi sang mã hàng khác với mức giá tiền tương đương hoặc lớn hơn, nếu hàng muốn đổi có giá trị lớn hơn, khách sẽ phải thêm tiền.</p><p><strong>2.3 Các trường hợp không được đổi trả hàng</strong></p><p>- Thời gian khiếu nại ngoài thời gian đổi/trả hàng quy định</p><p>- Hàng bị lỗi do quá trình vận chuyển và các lỗi bất khả kháng khác, không phải lỗi trực tiếp của &nbsp;Kingtech.com.vn, 2 bên sẽ cùng trao đổi để có phương án giải quyết phù hợp nhất.</p><p><strong>3. Chi phí đổi trả hàng</strong></p><p>- Trường hợp do lỗi của Dangcapdigital.com (tại mục 2.1), shop sẽ chịu toàn bộ chi phí trả đổi hàng.</p><p>- Trong trường hợp khách muốn đổi hàng vì không hài lòng hay thay đổi nhu cầu, khách phải tự chịu chi phí đổi trả hàng (phí chuyển hàng bị đổi và hàng muốn đổi…).</p><p>- &nbsp;Kingtech.com.vn sử dụng dịch vị chuyển phát nhanh với những đơn hàng ngoài khu vực nội thành Hà Nội, trong trường hợp khách hàng yêu cầu gửi bằng bất kỳ hình thức nào khác, khách cùng &nbsp;Kingtech.com.vn thỏa thuận chi phí khi gửi bằng hình thức đó.</p><p><strong>4. Quy trình đổi trả hàng</strong></p><p>- Sau khi nhận hàng và có nhu cầu muốn đổi/trả hàng, khách gọi điện hoặc nhắn tin trực tiếp đến Hotline &nbsp;hoặc gửi email với đầy đủ các nội dung sau:</p><p> * Họ tên &amp; số ĐT</p><p> * Thời gian nhận hàng</p><p> * Hàng muốn đổi trả, lý do đổi trả hàng</p>', 1, '2016-08-03 11:58:09', '2016-08-03 11:58:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `price_company` int(10) UNSIGNED NOT NULL,
  `price_origin` int(10) UNSIGNED NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `viewer` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `overview` text COLLATE utf8_unicode_ci NOT NULL,
  `specs` text COLLATE utf8_unicode_ci NOT NULL,
  `accessories` text COLLATE utf8_unicode_ci NOT NULL,
  `promotion` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `index_home` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_code`, `cate_id`, `name`, `url`, `image`, `images`, `price`, `price_company`, `price_origin`, `description`, `keywords`, `status`, `quantity`, `viewer`, `sold`, `overview`, `specs`, `accessories`, `promotion`, `display`, `show_home`, `index_home`, `created_at`, `updated_at`) VALUES
(3, 'SP-01', 2, 'sản phẩm test 3 sửa', 'san-pham-test-3-sua', 'product/new/977camerathethaosjcamsj5000wifi.jpg', 'product/new/977camerathethaosjcamsj5000wifi.jpg', 10000000, 90000000, 800000, 'quay phim, chup hinh', 'camera', 0, 5, 46, 0, 'tổng quan', 'thông sô kỹ thâutj', 'khui jhopwj', 'khuyen mai', 1, 1, 2, '2016-07-26 22:58:50', '2016-08-06 05:21:43'),
(4, 'SP02', 2, 'Camera IP thông minh Wifi Sricam SP007 Onvif 720P Zoom 5X', 'camera-ip-thong-minh-wifi-sricam-sp007-onvif-720p-zoom-5x', 'product/new/camerawifingoaitroisricamsp007720phd1.jpg', '', 1550000, 1050000, 800000, 'Camera chuyên dụng dùng ngoài Trời, chống Nước, hỗ trợ thẻ nhớ 128G\r<br>Sử dụng chip Hislicon của Huawei\r<br>P2p thông qua công nghệ điện toán đám mây, plug and play, không cần cài đặt, phù hợp với nhiều mạng băng thông rộng.\r<br>Cài đặt và sử dụng đơn giản,\r<br>Cảm biến hồng ngoại tự động tiện lợi, tự động chuyển ngày và đêm, giúp màu sắc và hình ảnh sắc nét, đẹp.\r<br>Hỗ trợ http, TCP/IP, UDP, rtsp, p2p và các giao thức khác.\r<br>Hỗ trợ tf thẻ nhớ, được xây dựng trong vi- khe cắm thẻ tf, hỗ trợ lên đến 128G lưu trữ.\r<br>Với dns động\r<br>Hỗ trợ phát hiện chuyển động và báo động.\r<br>Hỗ trợ TCP/IP, UDP, imcp, http, ftp, dns, DDNS, DHCP, pppoe và các giao thức khác.\r<br>Hỗ trợ Hệ điều hành Window, Android, IOS\r<br>Có được FCC, ce, testlab chứng nhận, chất lượng đáng tin cậy.\r<br>Hỗ trợ Smartphone Android, IOS, Máy Tính, Laptop,\r<br>Bảo hành chính hãng 12 tháng', 'Camera IP thông minh Wifi Sricam SP007 Onvif 720P Zoom 5X', 0, 5, 3, 0, '<h1><font><p>Ngoài ra Khi mua hàng tại đây bạn sẽ nhận được nhiều ưu đãi khuyến mãi đặc biết. Chúng tôi luôn tạo sự thoải mái và thuận tiện nhất cho các bạn khi mua hàng, bộ phận hộ trợ kỹ thuật sẽ hướng dẫn tần tình và sẽ cài đặt cho các bạn nếu có nhu cầu, ngoài ra nếu đặt hàng chúng tôi sẽ giao hàng tận nơi, bạn cũng có thể gọi nhiều sản phẩm cùng lúc để so sánh và chọn lựa.</p><p>Luôn đặt chữ tín chất lượng lên hàng đầu chúng tôi cam kết hàng đảm bảo chính hãng, cam kết không bán hàng xách tay như các SHOP nhỏ lẻ khác trên thị trường.</p><p>Nếu có bất cứ lỗi sản phẩm nào trong thời gian bảo hành Đẳng Cấp Digital sẽ bảo hành trọn gói cho các bạn hoặc hưởng chế độ 1 đổi 1.</p></font></h1><img src="http://img.banggood.com/thumb/water/upload/2015/12/SKU215316/1/7.jpg"><br>', '<table><tbody><tr><td><font>Model No.: <strong>Sricam SP007</strong></font></td></tr><tr><td><font>System</font></td><td><font>Main Processor</font></td><td><font>Hisilicon processor,built-in ARM9 and a high-speed video co-processor.</font></td></tr><tr><td><font>Operating system</font></td><td><font>Embedded Linux OS</font></td></tr><tr><td><font>Image Sensor</font></td><td><font>Sensor</font></td><td><font>High Definitioin Color CMOS Sensor</font></td></tr><tr><td><font>Display Resolution</font></td><td><font>1280*720 (1.0 Megapixel)</font></td></tr><tr><td><font>Min.Illuminatioin</font></td><td><font>0.1 Lux / F1.2 (With IR Illuminator)</font></td></tr><tr><td><font>lens</font></td><td><font>Lens Type</font></td><td><font>Glass Lens</font></td></tr><tr><td><font>Lens Parameter</font></td><td><font>Focal Length:3.6 mm; Aperture:F 2.4</font></td></tr><tr><td><font>Angle of View</font></td><td><font>65°</font></td></tr><tr><td><font>Video</font></td><td><font>Image Compression</font></td><td><font>H.264.</font></td></tr><tr><td><font>Image Frame Rate</font></td><td><font>30fps maxmium, downward adjustable</font></td></tr><tr><td><font>Resolution</font></td><td><font>720P(1280 x 720), VGA(640 x 360), QVGA(320 x 180)</font></td></tr><tr><td><font>Image Adjustment</font></td><td><font>Automatic</font></td></tr><tr><td><font>Infrared Mode</font></td><td><font>Automatic</font></td></tr><tr><td><font>Night Visibility</font></td><td><font>36pcs IR-LEDs, night vision range up to 15 metres</font></td></tr><tr><td><font>Filter Switch(IR-Cut)</font></td><td><font>Built-in IR Cut, no color deviation indoor or outdoor.</font></td></tr><tr><td><font>Record</font></td><td><font>TF Card Record</font></td><td><font>Support Built-in TF card, up to 128GB.( only support FAT32 file system), Note: the standard version didn''t include TF card.</font></td></tr><tr><td><font>Record Mode</font></td><td><font>Alarm Record; Motion Detection Alarm Record; Timing video; Manual Record.</font></td></tr><tr><td><font>Record Standard</font></td><td><font>VGA @ 25 fps</font></td></tr><tr><td><font>Playback</font></td><td><font>Support remote playback.</font></td></tr><tr><td><font>Network</font></td><td><font>Ethernet</font></td><td><font>RJ-45 Ethernet</font></td></tr><tr><td><font>Wireless</font></td><td><font>Standard IEEE 802.11 b/g/n, Security support :WEP, WPA, WPA2 Encryption.</font></td></tr><tr><td><font>Online Visitor</font></td><td><font>Online Visitor LAN support 10 people, WAN support 5 people.</font></td></tr><tr><td><font>Onvif</font></td><td><font>Support Onvif Protocol, Support NVR (above Onvif version 2.4.2)</font></td></tr><tr><td><font>Alarm</font></td><td><font>Alarm</font></td><td><font>Supports Motion detection Alarm, Phone push alarm, Email alarm.</font></td></tr><tr><td><font>Others</font></td><td><font>Product Type</font></td><td><font>Metal Gun type / Waterproof outdoor use</font></td></tr><tr><td><font>DC Power</font></td><td><font>DC12V/1A..</font></td></tr><tr><td><font>Working Temperature</font></td><td><font>0~55 °C</font></td></tr><tr><td><font>Working Humidity</font></td><td><font>10%- 90% RH</font></td></tr><tr><td><font>Size</font></td><td><font>Item size: 165mmx83mmx72mm (LxWxH)</font></td></tr><tr><td><font>Packaging size:182mmx110mmx149mm(LxWxH)</font></td></tr><tr><td><font>Weight</font></td><td><font>N.W.:500g G.W.: 750g (Note:Actual Weight Final)</font></td></tr><tr><td><font>Accessories</font></td><td><font>Adaptor, User Manual, Bracket,Screw.</font></td></tr><tr><td><font>System<br>Required</font></td><td><font>SmartPhone &amp; TablePC</font></td><td><font>Support iOS and Android system, Provide free App "APCam"</font></td></tr><tr><td><font>PC</font></td><td><font>Only support remote monitor on Internet Explorer(IE) browser.</font></td></tr><tr><td><font>Certification</font></td><td><font>CE, FCC, RoHS</font></td></tr></tbody></table>', '<br>', '<br>', 1, 1, 0, '2016-08-04 13:58:20', '2016-08-07 15:25:07'),
(5, 'SP002', 12, 'Camera IP Hismart Pro 09 HD', 'camera-ip-hismart-pro-09-hd', 'product/new/cameraiphismartpro096.jpg', '', 1500000, 1000000, 70000, '✔ Đây là Camera IP nhiều tính năng ưu việt mà độ ổn định cao\r<br>✔ Camera IP độ phân giải HD-720p cực nét\r<br>✔ Thiết kế sang trọng, bắt wifi  2 anten cho kết nối nhanh hơn các thiết bị camera IP 1 anten \r<br>✔ (Camera IP Hismart Pro 09 2 anten là điểm nhấn làm hài lòng nhiều khách hàng khó tính nhất)\r<br>✔ Camera IP xem ban đêm rõ nét như ban ngày nhờ 11 mắt hồng ngoại 20 phi\r<br>✔( Lưu ý: thị trường có nhiều dòng sản phẩm chỉ 4 mắt hồng ngoại, ban đêm xem rất kém )\r<br>✔ Camera IP tích hợp báo động, hú còi tại chỗ, thông báo qua điện thoại, email\r<br>✔ Camera IP cắm là chạy, không cần tên miền, cấu hình cao siêu\r<br>✔ Camera IP xoay 360 độ ngang và 120 độ dọc, xem được mọi ngõ ngách\r<br>✔ Camera IP không cần đầu ghi, chỉ cần cắm thẻ nhớ\r<br>✔ Camera IP kết nối qua wifi bằng công nghệ điện toán đám mây\r<br>✔ Camera IP đàm thoại 2 chiều, dễ dàng quản lý nhân viên\r<br>✔ Sản phẩm bảo hành 12 tháng,', 'Camera IP Hismart Pro 09 HD', 0, 5, 8, 0, '<h3>Bạn đang lo lắng về an ninh nhà bạn, bạn muốn quan sát mọi việc ở nhà, muốn biết hôm nay con yêu đang làm gì hoặc muốn biết thú cưng ở nhà thế nào và nhiều vấn đề hơn nữa mỗi khi đi vắng, ngoài ra bạn còn muốn liên hệ với người thân bên nước ngoài chẳng hạn. Để mọi việc trở nên dễ dàng và nhanh chóng hơn hôm nay Công Ty Đẳng Cấp Digital xin giới thiệu với các bạn một sản phẩm có đầy đủ các tính năng trên đó là chiếc camera<br><font><strong>THÔNG SỐ KỸ THUẬT HISMART PRO 09<br></strong></font><font><strong>2 angten wifi, 11 LED hồng ngoại nhìn ban đêm<br></strong></font><font>Cảm biến hình ảnh: 720P 1.0M CMOS<br></font><font>Hệ thống tín hiệu: PAL/NTSC<br></font><font>Độ phân giải video: 1280 x 720<br></font><font>Tốc độ video: 25 FPS hoặc 30 FPS<br></font><font>Phát hiện chuyển động: Có<br></font><font>Hỗ trợ chụp ảnh: Có<br></font><font>Hỗ trợ NVR: Có<br></font><font>Đầu vào âm thanh: Microphone tích hợp<br></font><font>Đầu ra âm thanh: Microphone tích hợp, tai nghe gắn ngoài<br></font><font>Hỗ trợ lưu trữ: 1 x Micro SD<br></font><font>Báo động: Hỗ trợ báo động qua điện thoại, email<br></font><font>Báo động Wireless: 64 sectors<br></font><font>Hỗ trợ Wireless: 802.11 b/g/n<br></font><font>Cổng giao tiếp Ethernet: RJ45 100m/ 1000m/ Base-TX<br></font><font>Ống kính: 3.6/2.8mm<br></font><font>Hồng ngoại: 10m<br></font><font>Nguồn đầu vào: DC5V 2A<br></font><font>Nhiệt độ hoạt động: -10 độ đến 60 độ<br></font><font>Độ ẩm hoạt động: tối đa 90%</font></h3><div><font><br></font></div><h3><font><font><strong>4. Thêm camera vào thông qua kết nối Wifi<br></strong></font></font><font><font>Kết nối Smartphone với Wifi, mở ứng dụng Hismart Pro 09 lên, nhấn nút “+” ở góc phải thiết bị, chọn Smartlink. Lúc này hệ thống sẽ tự động nhận diện camera đang kết nối trong mạng và yêu cầu nhập password của Wifi, sau đó nhấn Next. Bạn chờ một lúc cho hệ thống kết nối camera và Smartphone sau đó nhập password của camera là (123) và thiết bị sẽ tự động ghi nhớ lại trạng thái đăng nhập để bạn không phải nhập lại những lần sau.<br></font></font><font><font><strong>5. Sử dụng ứng dụng camera IP Hismart Pro 09 để truy cập camera</strong></font>Xem trực tiếp video đang quay: nhấn vào nút Play trên thanh công cụ cho phép bạn xem trực tiếp video đang được ghi nhận bởi Camera, màn hình trượt có thể giúp kiểm soát việc góc độ xoay của camera.<font>Xem lại video đã lưu: nhấn vào mục danh sách camera ban đầu, trong pop-up menu chọn giao diện playback video, lúc này hệ thống sẽ hiển thị các video đã được lưu để bạn có thể xem lại.<br>Bạn cũng có thể thiết lập các thông số khác nhau cho camera thông qua tùy chỉnh trong mục Options<br></font></font><font><font>Bạn cũng có thể thiết lập các thông số khác nhau cho camera thông qua tùy chỉnh trong mục Options</font></font><font><br></font><font><strong>NHỮNG VẤN ĐỀ THƯỜNG GẶP KHI SỬ DỤNG CAMERA HISMART PRO 09</strong></font><font><strong><br></strong></font><font>1. Camera và smartphone không phát hiện ra nhau để đồng bộ<br></font><font>Bạn cần kiểm tra xem camera và smartphone có đang trong cùng một mạng LAN hay không. Nếu hai thiết bị này không cùng trong một mạng LAN thì bạn nên thêm camera vào ứng dụng trên Smartphone theo phương pháp thủ công, tự nhập ID và Password Wifi.</font><font><br></font><font>2. Bạn muốn xem video đang quay nhưng password lại sai<br></font><font>Hãy kiểm tra lại thiết lập password điều khiển từ xa cho camera đã đúng chưa, nếu chưa đúng bạn hãy chọn Edit để chỉnh sửa lại password trong camera list<br></font><font>Nếu bạn quên mật khẩu điều khiển từ xa của camera, hãy nhấn Reset để thiết lập lại cài đặt ban đầu cho thiết bị, mật khẩu mặc định sẽ là rỗng, lúc này bạn cần tạo một mật khẩu mới và bắt đầu truy cập qua mật khẩu mới tạo này.</font><font><br></font><font>3. Danh sách thiết bị rơi vào trạng thái off-line<br></font><font>Bạn hãy kiểm tra camera có kết nối mạng bình thường không, xem đèn tín hiệu mạng có cháy sáng không. Nếu đèn tín hiệu vẫn cháy sáng thì hãy kiểm tra lại Router xem có trục trặc gì không.</font><font><br></font><font>4. Video playback không tìm thấy video file<br></font><font>Bạn hãy kiểm tra xem thẻ nhớ có hoạt động bình thường không, nếu thẻ nhớ bị lỗi, hãy cắm vào máy tính để kiểm tra hoặc cân nhắc thay thế thẻ nhớ khác.</font><font><br></font><font>5. Camera không thể kết nối được Wifi<br></font><font>Bạn cần kiểm tra mật khẩu Wifi xem đã đúng chưa và lưu ý một điều camera không hỗ trợ mạng 5G vì vậy hãy chuyển smartphone sang kết nối với mạng Wifi 2.4G.</font></h3>', 'Hismart Pro 09 2 angten wifi<br>Cảm biến hình ảnh: 720P 1.0M CMOS<br>Hệ thống tín hiệu: PAL/NTSC<br>Độ phân giải video: 1280 x 720<br>Tốc độ video: 25 FPS hoặc 30 FPS<br>Phát hiện chuyển động: Có<br>Hỗ trợ chụp ảnh: Có<br>Hỗ trợ NVR: Có<br>Đầu vào âm thanh: Microphone tích hợp<br>Đầu ra âm thanh: Microphone tích hợp, tai nghe gắn ngoài<br>Hỗ trợ lưu trữ: 1 x Micro SD<br>Báo động: Hỗ trợ báo động qua điện thoại, email<br>Báo động Wireless: 64 sectors<br>Hỗ trợ Wireless: 802.11 b/g/n<br>Cổng giao tiếp Ethernet: RJ45 100m/ 1000m/ Base-TX<br>Ống kính: 3.6/2.8mm<br>Hồng ngoại: 10m<br>Nguồn đầu vào: DC5V 2A<br>Nhiệt độ hoạt động: -10 độ đến 60 độ<br>Độ ẩm hoạt động: tối đa 90%<br>', '<br>', '<br>', 1, 1, 0, '2016-08-04 14:02:46', '2016-08-11 13:37:48'),
(6, 'DV001', 10, 'Định vị xuyên việt XV206 GPS', 'dinh-vi-xuyen-viet-xv206-gps', 'product/new/dinhvixuyenvietlk206gps0.jpg', '', 999000, 500000, 300000, '- Theo dõi xe máy / Private xe / cho thuê xe / Thiết bị bên ngoài..\r<br>- Xe công ty Monitor \r<br>- Trọng lượng: 85g \r<br>- Màu sắc: đen \r<br>- Band: 850/900/1800 / 1900MHz \r<br>- Độ chính xác: 10m \r<br>- Chip Gps: Ublox \r<br>- Chế độ GSM: MTK simcom800 \r<br>- Standy: 240h \r<br>- Mạng: GSM & GPRS \r<br>- Loại: LK206', 'Định vị xuyên việt XV206 GPS', 0, 5, 4, 0, '<strong><font>Định vị xuyên việt XV206 GPS</font></strong><font>là một thiết bị điện tử với tính năng định vị chuẩn nhất vị trí của đối tượng bạn muốn định vị giám sát n</font><font>hư: trẻ em, người lớn tuổi, xe máy, xe đạp, oto, thú cưng... bất kì đối tượng nào bạn muốn định vị giám sát và</font><font>tìm kiếm</font>Nó có khả năng kiểm tra, giám sát các tuyến đường, những nơi mà đối tượng bạn muốn theo dõi đã đi qua,...Với tính năng như vậy mà nó hoàn toàn đơn giản và dễ cài đặt, sử dụng.', '<br>', '<br>', '<br>', 1, 1, 0, '2016-08-04 14:05:37', '2016-08-08 09:24:10'),
(7, 'AR003', 6, 'Android Tv Box K1 Plus 4K Amlogic S905 Quad core 64-bit', 'android-tv-box-k1-plus-4k-amlogic-s905-quad-core-64-bit', 'product/new/skyboxtvk1plus4kamlogics905quadcore64bit1.jpg', '', 1690000, 1090000, 690000, '', 'Android Tv Box K1 Plus 4K Amlogic S905 Quad core 64-bit', 0, 5, 0, 0, '<table><tbody><tr><th>General</th></tr><tr><td>Model</td><td>SKYBOX TV K1 PLUS</td></tr><tr><td>Quantity</td><td>1 Piece</td></tr><tr><td>Color</td><td>Black</td></tr><tr><th>System</th></tr><tr><td>Operating System</td><td>Android 5.1.1</td></tr><tr><td>CPU</td><td>Amlogic S905 Quad core 64-bit Cortex A53 Up to 2.0GHz</td></tr><tr><td>GPU</td><td>GPU Penta-core Mali-450 Up to 750MHZ<br>3D Graphics OpenGL ES 1.1/2.0 and Open VG 1.1 support</td></tr><tr><td>RAM</td><td>DDRIII 1GB</td></tr><tr><td>ROM</td><td>Flash Nand 8GB</td></tr><tr><td>Extended Storage</td><td>TF CARD Support 1~32GB</td></tr><tr><th>Communication</th></tr><tr><td>Wifi Connectivity</td><td>2.4G WiFi</td></tr><tr><td>Ethernet</td><td>10/100 BaseT</td></tr><tr><td>Bluetooth</td><td>N/A</td></tr><tr><th>Media</th></tr><tr><td>Video Supported</td><td>HD MPEG1/2/4,H.265/HEVC , HD AVC/VC-1,RM/RMVB,Xvid/DivX3/4/5/6 ,RealVideo8/9/10<br>AVI/RM/RMVB/TS/VOB/MKV/MOV/ISO/WMV/ASF/FLV/DAT/MPG/MPEG</td></tr><tr><td>Audio Supported</td><td>MP3/WMA/AAC/WAV/OGG/AC3/DDP/TrueHD/DTS/DTS/HD/FLAC/APE</td></tr><tr><td>Picture Supported</td><td>HD JPEG/BMP/GIF/PNG/TIFF</td></tr><tr><td>Resolution</td><td>2K*4K</td></tr><tr><td>Language</td><td>Chinese , English ,Germany ,Japanese, Korea etc. 24 languages</td></tr><tr><th>Interfaces</th></tr><tr><td>HDMI Port</td><td>Standard HDMI 2.0</td></tr><tr><td>Other Interfaces</td><td>4*USB 2.0 <br>1*TF card slpt<br>1*HDMI<br>1*AV<br>1*SPDIF <br>1*RJ45</td></tr><tr><th>Other Features</th></tr><tr><td>Other Functions</td><td>IR Remote <br>LED Indicator Power ON :blue; Standby :Red<br>Mould Private tooling<br>Support most external 3G USB dongle<br>WiFi Hotpoint Support<br>Mouse/ Keyboard: Support 2.4G wireless mouse and keyboard via 2.4G USB dongle<br>KODI DLNA AirPlay Google TV Remote LAN Miracast 3D moive Support <br>DRM Optional: Microsoft Playready,Verimatrix ,Google Widevine</td></tr><tr><td>Appliactions</td><td>Browse all video websites online, support Netflix,Hulu,Flicker,Picasa,Youtube,Twitter ,Facebook,etc<br>Apps: Apps download freely form Android market, Amazon App store etc<br>Medium Local Media playback, support HDD, U disck ,SD card<br>Talk online Support SKYPE video call , facebook,twitter,Netflix,Youtube, etc<br>Others: Email,Office suit etc</td></tr><tr><td>Power</td><td>12V/1A</td></tr><tr><th>Package Contents</th></tr><tr><td>1 x TV box</td></tr><tr><td>1 x IR remote</td></tr><tr><td>1 x HDMI cable</td></tr><tr><td>1 x Power adapter (A right AC Adapter will be sent as your shipping country)</td></tr><tr><td>1 x User manual</td></tr></tbody></table><p><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0928.jpg"><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0935.jpg"><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0938.jpg"><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0940.jpg"><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0929.jpg"><img alt="" src="http://image3.geekbuying.com/content_pic/201510/IMG_0941.jpg"></p><br>', '<table><tbody><tr><th>General</th></tr><tr><td>Model</td><td>SKYBOX TV K1 PLUS</td></tr><tr><td>Quantity</td><td>1 Piece</td></tr><tr><td>Color</td><td>Black</td></tr><tr><th>System</th></tr><tr><td>Operating System</td><td>Android 5.1.1</td></tr><tr><td>CPU</td><td>Amlogic S905 Quad core 64-bit Cortex A53 Up to 2.0GHz</td></tr><tr><td>GPU</td><td>GPU Penta-core Mali-450 Up to 750MHZ<br>3D Graphics OpenGL ES 1.1/2.0 and Open VG 1.1 support</td></tr><tr><td>RAM</td><td>DDRIII 1GB</td></tr><tr><td>ROM</td><td>Flash Nand 8GB</td></tr><tr><td>Extended Storage</td><td>TF CARD Support 1~32GB</td></tr><tr><th>Communication</th></tr><tr><td>Wifi Connectivity</td><td>2.4G WiFi</td></tr><tr><td>Ethernet</td><td>10/100 BaseT</td></tr><tr><td>Bluetooth</td><td>N/A</td></tr><tr><th>Media</th></tr><tr><td>Video Supported</td><td>HD MPEG1/2/4,H.265/HEVC , HD AVC/VC-1,RM/RMVB,Xvid/DivX3/4/5/6 ,RealVideo8/9/10<br>AVI/RM/RMVB/TS/VOB/MKV/MOV/ISO/WMV/ASF/FLV/DAT/MPG/MPEG</td></tr><tr><td>Audio Supported</td><td>MP3/WMA/AAC/WAV/OGG/AC3/DDP/TrueHD/DTS/DTS/HD/FLAC/APE</td></tr><tr><td>Picture Supported</td><td>HD JPEG/BMP/GIF/PNG/TIFF</td></tr><tr><td>Resolution</td><td>2K*4K</td></tr><tr><td>Language</td><td>Chinese , English ,Germany ,Japanese, Korea etc. 24 languages</td></tr><tr><th>Interfaces</th></tr><tr><td>HDMI Port</td><td>Standard HDMI 2.0</td></tr><tr><td>Other Interfaces</td><td>4*USB 2.0 <br>1*TF card slpt<br>1*HDMI<br>1*AV<br>1*SPDIF <br>1*RJ45</td></tr><tr><th>Other Features</th></tr><tr><td>Other Functions</td><td>IR Remote <br>LED Indicator Power ON :blue; Standby :Red<br>Mould Private tooling<br>Support most external 3G USB dongle<br>WiFi Hotpoint Support<br>Mouse/ Keyboard: Support 2.4G wireless mouse and keyboard via 2.4G USB dongle<br>KODI DLNA AirPlay Google TV Remote LAN Miracast 3D moive Support <br>DRM Optional: Microsoft Playready,Verimatrix ,Google Widevine</td></tr><tr><td>Appliactions</td><td>Browse all video websites online, support Netflix,Hulu,Flicker,Picasa,Youtube,Twitter ,Facebook,etc<br>Apps: Apps download freely form Android market, Amazon App store etc<br>Medium Local Media playback, support HDD, U disck ,SD card<br>Talk online Support SKYPE video call , facebook,twitter,Netflix,Youtube, etc<br>Others: Email,Office suit etc</td></tr><tr><td>Power</td><td>12V/1A</td></tr><tr><th>Package Contents</th></tr><tr><td>1 x TV box</td></tr><tr><td>1 x IR remote</td></tr><tr><td>1 x HDMI cable</td></tr><tr><td>1 x Power adapter (A right AC Adapter will be sent as your shipping country)</td></tr><tr><td>1 x User manual</td></tr></tbody></table>', '<br>', '<br>', 1, 1, 0, '2016-08-04 14:07:57', '2016-08-04 14:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `group_id`, `name`, `key`) VALUES
(1, 8, 'Xem danh sách', 'ad/list'),
(2, 8, 'Thêm', 'ad/create'),
(3, 8, 'Sửa', 'ad/update'),
(4, 8, 'Xóa', 'ad/delete'),
(5, 16, 'Xem danh sách', 'admin/list'),
(6, 16, 'Thêm', 'admin/create'),
(7, 16, 'Sửa', 'admin/update'),
(8, 16, 'Xóa', 'admin/delete'),
(9, 16, 'Mở khóa / Khóa', 'admin/block'),
(10, 16, 'Reset pass', 'admin/reset'),
(11, 13, 'Xem danh sách', 'agency/list'),
(12, 13, 'Thêm', 'agency/create'),
(13, 13, 'Sửa', 'agency/update'),
(14, 13, 'Xóa', 'agency/delete'),
(15, 10, 'Xem danh sách', 'appcate/list'),
(16, 10, 'Thêm', 'appcate/create'),
(17, 10, 'Sửa', 'appcate/update'),
(18, 10, 'Xóa', 'appcate/delete'),
(19, 9, 'Xem danh sách', 'app/list'),
(20, 9, 'Thêm', 'app/create'),
(21, 9, 'Sửa', 'app/update'),
(22, 9, 'Xóa', 'app/delete'),
(23, 12, 'Xem danh sách', 'branch/list'),
(24, 12, 'Thêm', 'branch/create'),
(25, 12, 'Sửa', 'branch/update'),
(26, 12, 'Xóa', 'branch/delete'),
(27, 5, 'Xem danh sách', 'category/list'),
(28, 5, 'Thêm', 'category/create'),
(29, 5, 'Sửa', 'category/update'),
(30, 5, 'Xóa', 'category/delete'),
(31, 18, 'Xem', 'info/list'),
(32, 18, 'Cập nhật', 'info/update'),
(33, 2, 'Xem danh sách', 'menu/list'),
(34, 2, 'Thêm', 'menu/create'),
(35, 2, 'Sửa', 'menu/update'),
(36, 2, 'Xóa', 'menu/delete'),
(37, 6, 'Xem danh sách', 'newscate/list'),
(38, 6, 'Thêm', 'newscate/create'),
(39, 6, 'Sửa', 'newscate/update'),
(40, 6, 'Xóa', 'newscate/delete'),
(41, 3, 'Xem danh sách', 'news/list'),
(42, 3, 'Thêm', 'news/create'),
(43, 3, 'Sửa', 'news/update'),
(44, 3, 'Xóa', 'news/delete'),
(45, 4, 'Xem danh sách', 'page/list'),
(46, 4, 'Thêm', 'page/create'),
(47, 4, 'Sửa', 'page/update'),
(48, 4, 'Xóa', 'page/delete'),
(49, 1, 'Xem danh sách', 'product/list'),
(50, 1, 'Thêm', 'product/create'),
(51, 1, 'Sửa', 'product/update'),
(52, 1, 'Xóa', 'product/delete'),
(53, 7, 'Xem danh sách', 'slide/list'),
(54, 7, 'Thêm', 'slide/create'),
(55, 7, 'Sửa', 'slide/update'),
(56, 7, 'Xóa', 'slide/delete'),
(57, 14, 'Xem danh sách', 'support/list'),
(58, 14, 'Thêm', 'support/create'),
(59, 14, 'Sửa', 'support/update'),
(60, 14, 'Xóa', 'support/delete'),
(61, 15, 'Xem danh sách', 'tag/list'),
(62, 15, 'Thêm', 'tag/create'),
(63, 15, 'Sửa', 'tag/update'),
(64, 15, 'Xóa', 'tag/delete'),
(65, 17, 'Xem danh sách', 'user/list'),
(66, 17, 'Thêm', 'user/create'),
(67, 17, 'Sửa', 'user/update'),
(68, 17, 'Xóa', 'user/delete'),
(69, 17, 'Mở khóa / Khóa', 'user/block'),
(70, 17, 'Reset pass', 'user/reset'),
(71, 11, 'Xem danh sách', 'video/list'),
(72, 11, 'Thêm', 'video/create'),
(73, 11, 'Sửa', 'video/update'),
(74, 11, 'Xóa', 'video/delete'),
(75, 19, 'Xem danh sách', 'groupadmin/list'),
(76, 19, 'Thêm', 'groupadmin/create'),
(77, 19, 'Sửa', 'groupadmin/update'),
(78, 19, 'Xóa', 'groupadmin/delete');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `index` int(10) UNSIGNED NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `title`, `url`, `image`, `index`, `display`, `created_at`, `updated_at`) VALUES
(1, '', 'void::javascript()', 'slide/02.jpg', 0, 1, '0000-00-00 00:00:00', '2016-07-31 02:53:11'),
(2, '', 'void::javascript()', 'slide/10.jpg', 1, 1, '0000-00-00 00:00:00', '2016-07-31 02:55:58'),
(3, '', '', 'slide/03.jpg', 0, 1, '2016-07-31 02:53:20', '2016-07-31 02:53:20'),
(4, '', '', 'slide/04.jpg', 0, 1, '2016-07-31 02:53:26', '2016-07-31 02:53:26'),
(5, '', '', 'slide/05.jpg', 0, 1, '2016-07-31 02:53:31', '2016-07-31 02:53:31'),
(6, '', '', 'slide/06.jpg', 0, 1, '2016-07-31 02:53:36', '2016-07-31 02:53:36'),
(7, '', '', 'slide/07.jpg', 0, 1, '2016-07-31 02:53:41', '2016-07-31 02:53:41'),
(8, '', '', 'slide/08.jpg', 0, 1, '2016-07-31 02:53:46', '2016-07-31 02:53:46'),
(9, '', '', 'slide/09.jpg', 0, 1, '2016-07-31 02:53:52', '2016-07-31 02:53:52'),
(10, '', '', 'slide/11.jpg', 0, 1, '2016-07-31 02:53:57', '2016-07-31 02:53:57'),
(11, '', '', 'slide/12.jpg', 0, 1, '2016-07-31 02:54:02', '2016-07-31 02:54:02'),
(12, '', '', 'slide/13.jpg', 0, 1, '2016-07-31 02:54:19', '2016-07-31 02:54:19'),
(13, '', '', 'slide/14.jpg', 0, 1, '2016-07-31 02:54:26', '2016-07-31 02:55:45'),
(14, '', '', 'slide/thumb02.jpg', 0, 1, '2016-07-31 02:54:34', '2016-07-31 02:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `statistics_online`
--

CREATE TABLE `statistics_online` (
  `id` int(10) UNSIGNED NOT NULL,
  `id2` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `mday` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics_online`
--

INSERT INTO `statistics_online` (`id`, `id2`, `quantity`, `mday`) VALUES
(1, '782016', 5, 7),
(2, '882016', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` tinyint(4) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `phone`, `skype`, `yahoo`, `group`, `display`, `email`) VALUES
(1, 'Nguyễn văn A', '0987654321', 'nguyenvana', 'nguyenvana', 1, 1, 'nguyenvana@kingtech.com.vn'),
(2, 'Nguyễn văn B', '0987654321', 'nguyenvanb', 'nguyenvanb', 2, 1, 'nguyenvanb@kingtech.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `url`, `index`, `display`) VALUES
(1, 'camerakingtech', 'kingtech.com.vn', 0, 1),
(2, 'tuyển dụng', 'pages/tuyen-dung', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `block` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone`, `address`, `gender`, `block`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '3344334', '', 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(10) UNSIGNED NOT NULL,
  `id2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_visit` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` tinyint(4) NOT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `title`, `url`, `image`, `source`, `video_url`, `display`, `view`, `created_at`, `updated_at`) VALUES
(1, 'SJCAM SJ5000 PLUS QUAY PHIM FULL HD 60 FPS', 'SJCAM SJ5000 PLUS QUAY PHIM FULL HD 60 FPS', 'sjcam-sj5000-plus-quay-phim-full-hd-60-fps', 'http://img.youtube.com/vi/KjXg0dvMGUw/1.jpg', 1, 'https://www.youtube.com/embed/KjXg0dvMGUw', 1, 0, '2016-08-03 13:00:38', '2016-08-03 13:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `content`, `updated_at`, `created_at`) VALUES
(1, 'title', 'Kingtech.com.vn | Thiết bị công nghệ HÀO HUÂN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'meta_description', 'Kingtech.com.vn | Thiết bị công nghệ HÀO HUÂN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'meta_keywords', 'Kingtech.com.vn | Thiết bị công nghệ HÀO HUÂN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'hotline', '01686539737', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'phone', '01685554447', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'email', 'kingtech@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'sdt_mua_hang_tu_xa', '0168855447', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sdt_trung_tam_bh', '0155887779', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'sdt_dai_ly', '0168885547', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'open_time', 'Thứ 2 - thứ 7: Từ 8h00 đến 20h00\r<br>Chủ nhật: Từ 8h00 đến 17h00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'gio_bao_hanh', 'Thời gian nhận và trả máy bảo hành\r<br>Từ 12h00 đến 17h00 hằng ngày, trừ chủ nhật', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'address', '<span style="color:red;font-weight:bold">ĐỒNG NAI</span> : D394 TỔ 8, KP4, P.LONG BÌNH, TP.BIÊN HÒA, ĐỒNG NAI\r<br>\r<br><span style="color:red;font-weight:bold">HỒ CHÍ MINH </span>: 206H3, CHU VĂN AN, P.26, Q.BÌNH THẠNH, TP.HCM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'facebook', 'facebook.com/', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'skype', 'skype', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'google', 'google', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'copyright', 'Copyright© 2015 Bản quyền thuộc về kingtech.com.vn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'giay_phep', 'GPKD số : 41C8012283 đăng ký ngày 26 tháng 3 năm 2010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'twitter', 'twitter.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'background_image', '/public/images/upload/maunenbody(1).jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'background_color', '#95d6f4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'background_color_menu', '#000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'background_footer', '#753a00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'background_body', '#ffffff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'slide_top', 'KINGTECH.COM.VN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'slide_top', 'WEBSITE HÀNG ĐẦU VỀ ĐỒ CHƠI CÔNG NGHỆ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'background_color_menu', '#000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'background_header', '#6dd7dc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'background_hover_menu', '#ff0000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'background_header_top', '#000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'email_mua_hang_tu_xa', '#fffff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'email_trung_tam_bao_hanh', '#fffff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'email_dai_ly', '#fffff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'background_menu', '/public/images/upload/menu.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'background_color_menu', '#000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'background_header', '#6dd7dc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'background_hover_menu', '#ff0000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'background_header_top', '#000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'email_mua_hang_tu_xa', 'email@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'email_trung_tam_bao_hanh', 'email@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'email_dai_ly', 'email@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'background_center_support', '#23bbd6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'icon_mua_hang_tu_xa', '/public/kingtech/images/icon/1-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'icon_trung_tam_bao_hanh', '/public/kingtech/images/icon/2-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'icon_dai_ly', '/public/kingtech/images/icon/3-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'background_center_support', '#23bbd6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'icon_mua_hang_tu_xa', '/public/kingtech/images/icon/1-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'icon_trung_tam_bao_hanh', '/public/kingtech/images/icon/2-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'icon_dai_ly', '/public/kingtech/images/icon/3-trung-tam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD KEY `admins_group_id_foreign` (`group_id`);

--
-- Indexes for table `admin_group_role`
--
ALTER TABLE `admin_group_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_group_role_group_id_foreign` (`group_id`),
  ADD KEY `admin_group_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencys`
--
ALTER TABLE `agencys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencys_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apps_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `app_cate`
--
ALTER TABLE `app_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_admins`
--
ALTER TABLE `group_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_role`
--
ALTER TABLE `group_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`),
  ADD UNIQUE KEY `menus_url_unique` (`url`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `news_cates`
--
ALTER TABLE `news_cates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_url_unique` (`url`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_group_id_foreign` (`group_id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_online`
--
ALTER TABLE `statistics_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `support_email_unique` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_group_role`
--
ALTER TABLE `admin_group_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `agencys`
--
ALTER TABLE `agencys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_cate`
--
ALTER TABLE `app_cate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `group_admins`
--
ALTER TABLE `group_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_role`
--
ALTER TABLE `group_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news_cates`
--
ALTER TABLE `news_cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `statistics_online`
--
ALTER TABLE `statistics_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group_admins` (`id`);

--
-- Constraints for table `admin_group_role`
--
ALTER TABLE `admin_group_role`
  ADD CONSTRAINT `admin_group_role_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group_admins` (`id`),
  ADD CONSTRAINT `admin_group_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `agencys`
--
ALTER TABLE `agencys`
  ADD CONSTRAINT `agencys_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `apps`
--
ALTER TABLE `apps`
  ADD CONSTRAINT `apps_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `app_cate` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `news_cates` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

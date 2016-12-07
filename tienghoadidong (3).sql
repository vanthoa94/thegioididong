-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 07:53 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienghoadidong`
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
(1, 1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$7KHD7I0a/fOP90iC//E./.GHtRU3hZy62Bw1Cg39lLRyUqL/m6h3K', '01686539737', '2016-12-05 15:12:33', '2016-12-07 13:52:45', 0, '0000-00-00 00:00:00', '2016-12-07 06:52:45', 'sBa8r21rRcFX9mX86XOmGVRMHoNRdWYiMKo6XOsVaHmjOVLkGFS30qEdtAWi');

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
(1, 1, 25),
(2, 1, 26),
(3, 1, 27),
(4, 1, 28),
(5, 1, 17),
(6, 1, 18),
(7, 1, 19),
(8, 1, 20),
(9, 1, 21),
(10, 1, 22),
(11, 1, 23),
(12, 1, 24),
(13, 1, 11),
(14, 1, 12),
(15, 1, 13),
(16, 1, 14),
(17, 1, 29),
(18, 1, 30),
(19, 1, 31),
(20, 1, 32),
(21, 1, 1),
(22, 1, 2),
(23, 1, 3),
(24, 1, 4),
(25, 1, 43),
(26, 1, 44),
(27, 1, 45),
(28, 1, 46),
(29, 1, 33),
(30, 1, 34),
(31, 1, 35),
(32, 1, 36),
(33, 1, 5),
(34, 1, 6),
(35, 1, 7),
(36, 1, 8),
(37, 1, 9),
(38, 1, 10),
(39, 1, 37),
(40, 1, 38),
(41, 1, 39),
(42, 1, 40),
(43, 1, 41),
(44, 1, 42),
(45, 1, 15),
(46, 1, 16),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50);

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
(1, 'Mở lớp học tiếng hoa cấp tốc', 'page/giam-50-hoc-phi.html', 'ads/tdtnhatrang.gif', 1, 1, '2016-12-03 08:11:05', '2016-12-03 08:54:57'),
(2, 'Dạy tiếng hoa online', 'page/day-tieng-hoa-online.html', 'ads/qcfooter.jpg', 3, 1, '2016-12-03 08:41:03', '2016-12-03 08:41:03'),
(3, 'Khuyến học', 'dang-ky-khoa-hoc.html', 'ads/dangky.png', 2, 1, '2016-12-03 08:46:27', '2016-12-03 08:46:27'),
(4, '', 'page/giam-50-hoc-phi.html', 'ads/k21800.jpg', 4, 1, '2016-12-03 08:55:30', '2016-12-03 08:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `price_pro` int(10) UNSIGNED NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `viewer` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `promotion` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `index_home` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `daxem` tinyint(1) NOT NULL DEFAULT '0',
  `ngaydoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doctn` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cate_id`, `name`, `url`, `image`, `price`, `price_pro`, `description`, `keywords`, `status`, `quantity`, `viewer`, `sold`, `promotion`, `author`, `display`, `show_home`, `index_home`, `created_at`, `updated_at`, `daxem`, `ngaydoc`, `doctn`) VALUES
(1, 1, '﻿﻿﻿﻿﻿﻿Nắm Vững 300 Từ Tiếng Hoa', 'hoc-vien-online-26-11', 'book/bia.jpg', 1000000, 900000, '', '', 3, 0, 3, 0, 'Sự thành công ở đây không mơ hồ, cao xa hay viển vông, mà rất thực tế, rõ ràng: Tôi biết, tôi đang xử lý Thông tin này. Tôi biết, tôi rõ ràng Thông tin này. Tôi phải lặp đi lặp lại rất nhiều lần Thông tin này bằng cách nghe, nói, viết và liên tưởng đến tình huống thực tế. Tôi đã thuần thụcThông tin này, nghĩa là tôi đã thành công với nó. Sự thành công lớn do nhiều sự thành công nhỏ như vầy cộng lại mà thành. Tùy theo chỗ đứng (nền tảng, điều kiện, …) mà ta đi nhanh hay đi chậm, tuy nhiên điều q<br>Sự thành công ở đây không mơ hồ, cao xa hay viển vông, mà rất thực tế, rõ ràng: Tôi biết, tôi đang xử lý Thông tin này. Tôi biết, tôi rõ ràng Thông tin này. Tôi phải lặp đi lặp lại rất nhiều lần Thông tin này bằng cách nghe, nói, viết và liên tưởng đến tình huống thực tế. Tôi đã thuần thụcThông tin này, nghĩa là tôi đã thành công với nó. Sự thành công lớn do nhiều sự thành công nhỏ như vầy cộng lại mà thành. Tùy theo chỗ đứng (nền tảng, điều kiện, …) mà ta đi nhanh hay đi chậm, tuy nhiên điều q', 'Phạm Minh Kha', 1, 1, 1, '2016-11-29 06:27:34', '2016-12-04 14:45:42', 0, '4122016', 3),
(2, 1, '﻿﻿﻿﻿﻿﻿Tư Vấn Học Tiếng Hoa', 'tu-van-hoc-tieng-hoa', 'book/bia(1).jpg', 0, 0, '', '', 0, 0, 8, 0, 'Sự thành công ở đây không mơ hồ, cao xa hay viển vông, mà rất thực tế, rõ ràng: Tôi biết, tôi đang xử lý Thông tin này. Tôi biết, tôi rõ ràng Thông tin này. Tôi phải lặp đi lặp lại rất nhiều lần Thông tin này bằng cách nghe, nói, viết và liên tưởng đến tình huống thực tế. Tôi đã thuần thục&nbsp;<div>Thông tin này, nghĩa là tôi đã thành công với nó. Sự thành công lớn do nhiều sự thành công nhỏ như vầy cộng lại mà thành. Tùy theo chỗ đứng (nền tảng, điều kiện, …) mà ta đi nhanh hay đi chậm, tuy nhiên điều q<br></div><div>Sự thành công ở đây không mơ hồ, cao xa hay viển vông, mà rất thực tế, rõ ràng: Tôi biết, tôi đang xử lý Thông tin này. Tôi biết, tôi rõ ràng Thông tin này. Tôi phải lặp đi lặp lại rất nhiều lần Thông tin này bằng cách nghe, nói, viết và liên tưởng đến tình huống thực tế. Tôi đã thuần thụcThông tin này, nghĩa là tôi đã thành công với nó. Sự thành công lớn do nhiều sự thành công nhỏ như vầy cộng lại mà thành. Tùy theo chỗ đứng (nền tảng, điều kiện, …) mà ta đi nhanh hay đi chậm, tuy nhiên điều q</div>', 'Phạm Minh Kha', 1, 1, 0, '2016-11-30 06:58:30', '2016-12-05 09:10:41', 0, '5122016', 5),
(3, 2, 'Học viên online 4/12', 'hoc-vien-online-4-12', 'book/bia.jpg', 0, 0, '', '', 0, 0, 2, 0, 'sách học viên online', 'Phạm Minh Kha', 1, 1, 0, '2016-12-04 07:15:03', '2016-12-04 14:37:17', 0, '4122016', 2);

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
  `display` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `parent`, `name`, `url`, `meta_description`, `meta_keywords`, `show_home`, `sort_home`, `sort_menu`, `display`) VALUES
(1, 0, 'Sách tiếng hoa', 'sach-tieng-hoa', '', '', 1, 1, 1, 1),
(2, 0, 'Sách học viên', 'sach-hoc-vien', '', '', 1, 2, 2, 1);

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
(1, 'Administrator');

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
(1, 'Quản lý sách'),
(2, 'Quản lý menu'),
(3, 'Quản lý trang'),
(4, 'Quản lý loại sách'),
(5, 'Quản lý slide'),
(6, 'Quản lý quảng cáo'),
(7, 'Quản lý video'),
(8, 'Quản lý tag'),
(9, 'Quản lý admin'),
(10, 'Quản lý người dùng'),
(11, 'Quản lý website'),
(12, 'Quản lý nhóm admin');

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
('2016_07_19_134910_create_ads_table', 1),
('2016_07_19_135606_create_slideshow_table', 1),
('2016_07_19_140747_create_category_table', 1),
('2016_07_19_142736_create_group_role_table', 1),
('2016_07_19_142833_create_role_table', 1),
('2016_07_19_142857_create_group_admin_table', 1),
('2016_07_19_142914_create_admin_table', 1),
('2016_07_19_143738_create_admin_group_role_table', 1),
('2016_07_19_145207_create_video_table', 1),
('2016_07_20_012733_create_book_table', 1),
('2016_07_20_022115_create_tags_table', 1),
('2016_07_30_031401_create_update_3_table', 1),
('2016_07_30_133608_create_update_4_table', 1),
('2016_08_02_120012_create_update_5_table', 1),
('2016_08_02_194009_create_useronline_table', 1),
('2016_08_02_194316_create_statistics_online_table', 1),
('2016_11_29_125437_create_update_6_table', 2),
('2016_11_29_135147_create_mucluc_table', 3),
('2016_12_01_130357_create_update8_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `muclucs`
--

CREATE TABLE `muclucs` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `sort_index` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewer` int(10) UNSIGNED NOT NULL,
  `ngaydoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doctn` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `muclucs`
--

INSERT INTO `muclucs` (`id`, `book_id`, `sort_index`, `name`, `url`, `image`, `video`, `audio`, `content`, `display`, `created_at`, `updated_at`, `viewer`, `ngaydoc`, `doctn`) VALUES
(4, 1, 2, 'Là Anh - Tập 9 - FAPtv', 'la-anh-tap-9-faptv', '', '1ZBlAhDrla8', '', 'Casting diễn viên Nam nhằm bổ sung diễn viên cho series Film Là Anh Phần 2 và Các team khác của FAP như Bánh Bao Bự Channel - Đậu Phộng TV !<br>Các bạn nữ đợt 1 bận không tham gia được có thể nộp đơn bổ sung lại<br>Thời gian diễn ra Casting : 09h ngày 04/12/2016<br><br>Yêu cầu Casting như sau :<br><br>Các bạn Nam từ 18 đến 25 tuổi<br><br>+ Ngoại hình bắt mắt - chuẩn soái ca<br><br>+ Hiện đang sinh sống và làm việc tại TpHCM<br><br>+ "Chuẩn men"<br><br>+ Giọng nói tốt - dễ nghe<br><br>+ Có thể làm việc toàn thời gian với FAP Team<br><br>CV ứng tuyển casting bao gồm :<br><br>+ Thông tin cá nhân ( Tên - Tuổi - Số đt - địa chỉ - công việc - kỹ năng )<br><br>+ Hình chụp cận mặt và toàn thân ( không 360 - photoshop )<br><br>+ Các sản phẩm nghệ thuật từng tham gia ( nếu có )<br><br>Mọi CV xin ứng tuyển Casting xin vui lòng gửi về email : casting.faptv@gmail.com<br>', 1, '2016-11-29 22:51:35', '2016-12-02 11:30:44', 0, '4122016', 0),
(7, 1, 1, 'Bài 1: mở đầu', 'bai-1-mo-dau', 'book/bia.jpg', '', 'http://www.tienghoadidong.com/Data/2801-1/MucLuc/10/m.mp3', '<br>', 1, '2016-11-29 22:55:23', '2016-12-02 11:30:44', 0, '4122016', 0),
(8, 2, 0, 'Bài 1: mở đầu', 'bai-1-mo-dau', '', '', '', '<br>', 1, '2016-11-30 06:59:50', '2016-11-30 07:00:27', 0, '4122016', 0),
(9, 1, 0, 'Bài 2', 'bai-2', 'book/bia.jpg', 'yJKjtZ950mg', 'http://www.tienghoadidong.com/Data/2801-1/MucLuc/1/m.mp3', '<br>', 1, '2016-12-02 11:47:18', '2016-12-04 09:41:59', 1, '4122016', 1),
(10, 1, 0, 'Bài 3', 'bai-3', '', '', '', '<br>', 1, '2016-12-02 11:47:23', '2016-12-02 11:47:23', 0, '4122016', 0),
(11, 1, 0, 'Bài 4', 'bai-4', '', '', '', '<br>', 1, '2016-12-02 11:47:27', '2016-12-02 11:47:27', 0, '4122016', 0),
(12, 1, 0, 'Bài 5', 'bai-5', '', '', '', '<br>', 1, '2016-12-02 11:48:04', '2016-12-02 11:48:04', 0, '4122016', 0),
(13, 1, 0, 'Bài 6', 'bai-6', '', '', '', '<br>', 1, '2016-12-02 11:48:09', '2016-12-04 09:22:04', 1, '4122016', 1),
(14, 1, 0, 'Bài 7', 'bai-7', '', '', '', '<br>', 1, '2016-12-02 11:48:19', '2016-12-02 11:48:19', 0, '4122016', 0),
(15, 1, 0, 'Bài 8', 'bai-8', '', '', '', 'Càng về khuya, đêm tối mù mịt, đèn cầy chập chờn.<br><br>"Biểu. . . . . . Tiểu thư. . . . . . , nên đi ngủ thôi." Lâm Nhi cẩn thận sửa lại chăn mền cho Phó Nghiên.<br><br>Sắc mặt Phó Nghiên trắng bệch, từ khi vào đông liền nhiễm bệnh không dậy nổi, đại phu nói bệnh này của nàng sợ là không tốt lên được. Không tốt lên thì thôi, sớm qua đời có thể sớm thoát khỏi nơi này.<br><br>Phó Nghiên gả vào phủ tướng quân được một năm, phu quân là Trương Dương, cả ngày quây quần cùng nam sủng. Bà bà (mẹ chồng) cũng vì vậy mà cả ngày nói lời ác độc với nàng, tiểu cô tử (em chồng) cũng không có sắc mặt tốt, ngay cả bọn hạ nhân cũng chó cậy thế chủ, không coi nàng trong mắt. Điều kiện sống của nàng so với quản gia Tướng phủ còn kém hơn.<br><br>Phó Nghiên nhìn Lâm Nhi, lạnh nhạt nói: "Khụ khụ. . . . . . Khụ khụ. . . . . . Làm liên lụy đến ngươi. . . . . . Nghỉ ngơi đi."<br><br>"Tiểu thư, Lâm Nhi không mệt." Con ngươi Lâm Nhi nhìn nàng, lộ ra chút ý cười.<br><br>Sao lại không mệt, cả ngày hầu hạ người bệnh Phó Nghiên này, còn bị những người khác nhục mạ. Nếu là ở Tướng phủ ai dám đối xử với nàng như vậy, Lộ Lộ chắc chắn sẽ đánh chết hắn. Lâm Nhi vốn là nha hoàn bên người biểu tỷ Mạc Lộ của Phó Nghiên, Lộ Lộ lo lắng nàng ở bên này không ai chăm sóc, liền cho Lâm Nhi theo Phó Nghiên. Phó Nghiên đến nơi này, Lâm Nhi vẫn luôn chăm sóc nàng, có thể nói, nàng là người thân duy nhất ở nơi này của Phó Nghiên. Nhìn Lâm Nhi bị khi dễ, nàng lại không thể làm gì.<br><br>"Lâm Nhi. . . . . . Ngươi nói coi phải làm sao mới có thể làm ngươi. . . . . . Trở về." Phó Nghiên nhìn Lâm Nhi, giọng nói sâu xa.<br><br>"Biểu tiểu thư, người muốn nô tì trở về sao! ?" Lâm Nhi cả kinh, lớn tiếng hỏi.<br><br>"Ta mệt mỏi rồi, ngươi trở về nghỉ ngơi đi. Khụ khụ. . . . . ."Phó Nghiên không trả lời nàng.<br><br>Lâm Nhi đành phải rời đi, lúc đi vươn tay định tắt đèn.<br><br>Phó Nghiên lại mở miệng ngăn cản nàng: "Để cho nó cháy hết đi."<br><br>Sau khi Lâm Nhi đi, Phó Nghiên gian nan xuống giường, vịn tường đi tới trước bàn đọc sách viết thư.<br><br>Tín vân: Cảm tạ Lộ Lộ đã quan tâm, Lâm Nhi chăm sóc chu toàn. Là người duy nhất bên cạnh Nghiên Nghiên, không muốn thấy nàng ở nơi này chịu khổ, thời gian một năm, hiểu thấu tất cả, không còn lưu luyến, vọng sông Nhữ nhớ về ngày trước! Kiếp này không còn gặp nhau nữa, muội cầu tỷ mạnh khỏe, cầu tỷ an nhàn, không oán thiên mệnh làm khó. Chỉ mong kiếp sau, bắt đầu lại.<br><br>Dừng bút.<br><br>Chỗ của Phó Nghiên, gặp nước, như vậy rất tốt!<br><br>Nước có thể nâng thuyền, cũng có thể lật thuyền. Nước đổ thuyền, trôi theo nước chảy.<br><br>Nước hồ giống như kim nhọn bao phủ lấy nàng, thấu xương, lạnh lẽo, khiến nàng không cách nào nhúc nhích. Mặc cho mình ngâm ở trong nước, bởi vì lạnh lẽo, càng khiến nàng tỉnh táo hơn, cũng càng không thể hô hấp, cứ như vậy, không có giãy giụa, im thinh thít, rời khỏi cái thế giới này. . . . . .<br><br>Nếu như có thể làm lại từ đầu, nàng muốn tùy tâm tự do. .<br>', 1, '2016-12-02 11:48:24', '2016-12-04 09:21:48', 1, '4122016', 1),
(16, 3, 0, 'Bài 1', 'bai-1', '', '', '', '<br>', 1, '2016-12-04 09:09:53', '2016-12-04 11:16:18', 1, '4122016', 1);

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
(1, 'Hướng dẫn đăng sách lên website', 'huong-dan-dang-sach', '', '', 'Hướng dẫn', 1, '2016-12-03 07:07:42', '2016-12-05 07:01:34', 1),
(2, 'Khai giảng khóa học tiếng hoa cấp tốc', 'giam-50-hoc-phi', '', '', 'Nội dung', 1, '2016-12-03 08:08:10', '2016-12-07 06:52:00', 1),
(3, 'Dạy tiếng hoa online', 'day-tieng-hoa-online', '', '', 'Liên hệ', 1, '2016-12-03 08:40:45', '2016-12-03 08:40:45', 0);

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
(1, 6, 'Xem danh sách', 'ad/list'),
(2, 6, 'Thêm', 'ad/create'),
(3, 6, 'Sửa', 'ad/update'),
(4, 6, 'Xóa', 'ad/delete'),
(5, 9, 'Xem danh sách', 'admin/list'),
(6, 9, 'Thêm', 'admin/create'),
(7, 9, 'Sửa', 'admin/update'),
(8, 9, 'Xóa', 'admin/delete'),
(9, 9, 'Mở khóa / Khóa', 'admin/block'),
(10, 9, 'Reset pass', 'admin/reset'),
(11, 4, 'Xem danh sách', 'category/list'),
(12, 4, 'Thêm', 'category/create'),
(13, 4, 'Sửa', 'category/update'),
(14, 4, 'Xóa', 'category/delete'),
(15, 11, 'Xem', 'info/list'),
(16, 11, 'Cập nhật', 'info/update'),
(17, 2, 'Xem danh sách', 'menu/list'),
(18, 2, 'Thêm', 'menu/create'),
(19, 2, 'Sửa', 'menu/update'),
(20, 2, 'Xóa', 'menu/delete'),
(21, 3, 'Xem danh sách', 'page/list'),
(22, 3, 'Thêm', 'page/create'),
(23, 3, 'Sửa', 'page/update'),
(24, 3, 'Xóa', 'page/delete'),
(25, 1, 'Xem danh sách', 'product/list'),
(26, 1, 'Thêm', 'product/create'),
(27, 1, 'Sửa', 'product/update'),
(28, 1, 'Xóa', 'product/delete'),
(29, 5, 'Xem danh sách', 'slide/list'),
(30, 5, 'Thêm', 'slide/create'),
(31, 5, 'Sửa', 'slide/update'),
(32, 5, 'Xóa', 'slide/delete'),
(33, 8, 'Xem danh sách', 'tag/list'),
(34, 8, 'Thêm', 'tag/create'),
(35, 8, 'Sửa', 'tag/update'),
(36, 8, 'Xóa', 'tag/delete'),
(37, 10, 'Xem danh sách', 'user/list'),
(38, 10, 'Thêm', 'user/create'),
(39, 10, 'Sửa', 'user/update'),
(40, 10, 'Xóa', 'user/delete'),
(41, 10, 'Mở khóa / Khóa', 'user/block'),
(42, 10, 'Reset pass', 'user/reset'),
(43, 7, 'Xem danh sách', 'video/list'),
(44, 7, 'Thêm', 'video/create'),
(45, 7, 'Sửa', 'video/update'),
(46, 7, 'Xóa', 'video/delete'),
(47, 12, 'Xem danh sách', 'groupadmin/list'),
(48, 12, 'Thêm', 'groupadmin/create'),
(49, 12, 'Sửa', 'groupadmin/update'),
(50, 12, 'Xóa', 'groupadmin/delete');

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
(1, '', '', 'slide/qc-3.jpg', 1, 1, '2016-12-02 08:10:39', '2016-12-02 08:23:22'),
(2, '', '', 'slide/slider.jpg', 0, 1, '2016-12-02 08:16:47', '2016-12-02 08:24:03');

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
(3, 'Van Thoa', '622872394481016', 'tranvanthoa2@gmail.com', 'ojhsdfosaodfgso', '', '', 1, 0, '1', '2016-12-05 08:21:30', '2016-12-05 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(10) UNSIGNED NOT NULL,
  `id2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_visit` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL
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
(1, 'Nói Thạo 139 Câu Tiếng Hoa - 090', 'Nói Thạo 139 Câu Tiếng Hoa - 090', 'noi-thao-139-cau-tieng-hoa-090', 'https://img.youtube.com/vi/XRneTtLm-Os/mqdefault.jpg', 1, 'https://www.youtube.com/embed/XRneTtLm-Os', 1, 0, '2016-12-02 09:05:20', '2016-12-02 09:15:16'),
(2, 'Nói Thạo 139 Câu Tiếng Hoa', 'Nói Thạo 139 Câu Tiếng Hoa', 'noi-thao-139-cau-tieng-hoa-030', 'https://img.youtube.com/vi/z6dMJ9mJhRw/mqdefault.jpg', 1, 'https://www.youtube.com/embed/z6dMJ9mJhRw', 1, 1, '2016-12-02 09:20:17', '2016-12-05 07:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `content`) VALUES
(1, 'title', 'Học tiếng Hoa, tiếng Trung Quốc Online'),
(2, 'meta_description', 'Học tiếng Hoa, tiếng Trung Quốc trên điện thoại, web, máy tính bảng.'),
(3, 'meta_keywords', 'hoc tieng hoa, hoc tieng trung, hoc tieng trung quoc, hoc tieng hoa online, hoc tieng trung quoc online, tieng trung mien phi'),
(4, 'hotline', '01686539737'),
(5, 'zalo', '0973149169'),
(6, 'email', 'tienghoadidong@gmail.com'),
(7, 'address', 'Lầu 1 - 25/4a đường Hồ Văn Đại, Kp 3, P. Quang Vinh Biên Hòa, Đồng Nai - gần bến xe buýt Biên Hòa'),
(8, 'facebook', 'https://facebook.com/tienghoadidong'),
(9, 'skype', 'https://skype.com/minhkha'),
(10, 'google', 'https://plug.google.com'),
(11, 'copyright', 'Copyright© 2016 Bản quyền thuộc về <a href="http://tienghoadidong.com">http://tienghoadidong.com</a>'),
(13, 'background_color', '#ffffff'),
(14, 'background_footer', '#363638'),
(15, 'background_menu', '#009688'),
(16, 'background_color_menu', '#333333'),
(17, 'background_menutop', '#cccccc'),
(18, 'background_header', '#ffffff'),
(19, 'background_hover_menu', '#3b5998'),
(21, 'email_send', 'lenguyetanh103@gmail.com'),
(22, 'password_send', 'OnlineSee.net'),
(25, 'GPKD', ''),
(26, 'TextColor', '#0000cc'),
(27, 'TextColorHover', '#3b5998'),
(28, 'text_color_menutop', '#000000');

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
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_cate_id_foreign` (`cate_id`);

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
-- Indexes for table `muclucs`
--
ALTER TABLE `muclucs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `muclucs_book_id_foreign` (`book_id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_admins`
--
ALTER TABLE `group_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_role`
--
ALTER TABLE `group_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `muclucs`
--
ALTER TABLE `muclucs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statistics_online`
--
ALTER TABLE `statistics_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `muclucs`
--
ALTER TABLE `muclucs`
  ADD CONSTRAINT `muclucs_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

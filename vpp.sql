-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 05:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `k` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `v` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `k`, `v`) VALUES
(1, 'left-sidebar', '<h3 style=\"text-align: center;\"><span style=\"color: #ff0000;\"><img src=\"img/banner1.jpg\" width=\"190\" height=\"70\" />&nbsp; Nội dung quảng c&aacute;o !</span></h3>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>'),
(2, 'banner-main', '<p style=\"text-align: center;\"><img src=\"img/banner2.PNG\" alt=\"\" width=\"1347\" height=\"512\" /></p>\r\n<h1 style=\"text-align: center;\"><span style=\"color: #ff9900;\"><strong>Ch&agrave;o mừng bạn đ&atilde; đến với cửa h&agrave;ng của ch&uacute;ng t&ocirc;i !</strong></span></h1>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(3, '1', '<p><img src=\"img/logo.png\" alt=\"\" width=\"670\" height=\"250\" /></p>'),
(4, '2', '<p><img src=\"img/logo.png\" width=\"327\" height=\"122\" /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ten` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `ten`, `diachi`, `email`, `sdt`, `content`) VALUES
(1, 'asdasda', 'asdasd', 'cuongdcdev@gmail.com', '0123456789', 'asdasd'),
(2, 'cuong', 'ở nhà', 'duongcuong96@gmail.com', '0123456789', 'adasdasdasdasd'),
(3, 'tuana', 'Hà nội', 'chientuan084@gmail.com', '0989765049', 'bán hoa trái phép'),
(4, 'BVGV', 'BHBH', 'chientuan084@gmail.com', '0989765049', 'dhbhbh bbebsbhbeshbd bdshb hbhsb');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `info`) VALUES
(8, 'TẬP VỞ', 'Vở là tập giấy được đóng lại dùng để để viết lên. Vở thường có bìa bọc ngoài để bảo vệ.'),
(9, 'Bút', ' Là dụng cụ dùng mực ghi trên bề mặt, thông thường bề mặt giấy. Công dụng của bút là để viết hoặc vẽ.'),
(10, 'DỤNG CỤ HỌC SINH', ' (mực, ngòi bút bi-gel, tẩy chì, gọt bút chì, thước kẻ, màu vẽ, nhãn vở, giấy thủ công, hồ dán, giấy ktra, giấy vẽ A4-A3 …, túi tài liệu)'),
(11, 'ĐỒ DÙNG VĂN PHÒNG', 'Đồ dùng trong văn phòng'),
(12, 'Đồ lưu niệm', 'Đồ lưu niệm, kỷ niệm');

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sp`
--

INSERT INTO `sp` (`id`, `menu`, `avatar`, `name`, `info`, `excerpt`, `price`) VALUES
(14, 8, 'betapto.jpg', 'Vở bé tập tô', '<p><span class=\"irc_su\" dir=\"ltr\" style=\"text-align: left;\">Một hoạt động học m&agrave; chơi, chơi m&agrave; học bổ &iacute;ch như vẽ tranh, t&ocirc; m&agrave;u sẽ khiến b&eacute; cảm thấy th&iacute;ch th&uacute; v&agrave; tăng th&ecirc;m say m&ecirc;, hứng khởi học tập.</span></p>', '<p><span class=\"irc_su\" dir=\"ltr\" style=\"text-align: left;\"><span class=\"irc_iis\"><a class=\"_Epb irc_tas i3598\" tabindex=\"0\" href=\"https://bibomart.com.vn/vo-tap-to-cho-be-p47753.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-noload=\"\" data-ved', '9500');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 : đang chờ giao | 1 : ok | -1 : hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhtoan`
--

INSERT INTO `thanhtoan` (`id`, `ten`, `diachi`, `sdt`, `email`, `status`) VALUES
(1, 'cuong', 'cuong', '1234566', 'cuong@gmail.com', 0),
(2, 'cuong', 'cuong', '1234566', 'cuong@gmail.com', 0),
(3, 'cuong', 'cuong', '1234566', 'cuong@gmail.com', 0),
(4, 'cuong', 'cuong', '1234566', 'cuong@gmail.com', 0),
(5, 'cường', 'cuong', '1234566', 'cuong@gmail.com', 0),
(6, 'tuan', 'Thanh Hoa', '01666665545', 'chientuan084@gmail.com', 0),
(7, 'vbhvbhbh', 'bhdbhbhbhb', '545455', 'chientuan084@gmail.com', 0),
(8, 'ggyhgyg', 'ygygy', '554545454', 'chientuan084@gmail.com', 0),
(9, 'dffghbgf', 'Ha Noi', '0989765049', 'chientuan084@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `info`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bờ la bờ lô bờ la là ra bờ ao\r\n'),
(2, 'cuong', 'cf4d87e50be6390ee9bd8ad6e7498cae', 'day la cuong\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `k` (`k`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sp`
--
ALTER TABLE `sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

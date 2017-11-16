-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2017 at 06:51 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachment`
--

CREATE TABLE `tbl_attachment` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `basename` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `content`, `parent`) VALUES
(1, 'điện thoại', '', NULL),
(2, 'máy ảnh', '', NULL),
(3, 'máy tính', '', NULL),
(4, 'tivi', '', NULL),
(5, 'hệ sinh thái', '', NULL),
(6, 'cao cấp', '', 1),
(7, 'trung cấp', '', 1),
(8, 'selfie', '', 1),
(9, 'ống kính rời', '', 2),
(10, 'camera 360', '', 2),
(11, 'ultrabook', '', 3),
(12, '2 in 1', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lookup`
--

INSERT INTO `tbl_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumnail` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `thumnail`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(9, 'Đánh giá Oppo F1s – Chuyên gia sắc đẹp thời hiện đại', 'Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận đặc biệt là giới\r\nthích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận\r\nđặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người\r\ndùng trẻ đón nhận đặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng,\r\ndễ được người dùng trẻ đón nhận đặc biệt là giới thích chụp ảnh.', '/2017-11-13/oppo_product.jpg', NULL, 2, 1510579501, 1510579501, 1),
(10, 'Đánh giá Oppo F1s – Chuyên gia sắc đẹp thời hiện đại', 'Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận đặc biệt là giới\r\nthích chụp ảnh. Oppo F1s với camera selfie 16MP.', '/2017-11-13/oppo_product.jpg', NULL, 2, 1510579668, 1510579668, 1),
(11, 'Đánh giá Oppo F1s – Chuyên gia sắc đẹp thời hiện đại', 'Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận đặc biệt là giới\r\nthích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận\r\nđặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người\r\ndùng trẻ đón nhận đặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng,\r\ndễ được người dùng trẻ đón nhận đặc biệt là giới thích', '/2017-11-13/oppo_product.jpg', NULL, 2, 1510579708, 1510579708, 1),
(12, 'Đánh giá Oppo F1s – Chuyên gia sắc đẹp thời hiện đại', 'Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận đặc biệt là giới\r\nthích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người dùng trẻ đón nhận\r\nđặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng, dễ được người\r\ndùng trẻ đón nhận đặc biệt là giới thích chụp ảnh. Oppo F1s với camera selfie 16MP, cấu hình mạnh và thiết kế gọn gàng,\r\ndễ được người dùng trẻ đón nhận đặc biệt là giới thích chụp ảnh.', '/2017-11-13/oppo_product.jpg', NULL, 2, 1510580431, 1510580431, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prize`
--

CREATE TABLE `tbl_prize` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `option` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prize`
--

INSERT INTO `tbl_prize` (`id`, `user`, `option`, `type`, `date_create`) VALUES
(1, 6, '{\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\"}', 3, 1510704330),
(2, 7, '{\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\"}', 3, 1510704340),
(3, 7, '{\"week\":\"1509922800\",\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 2, 1509922800),
(4, 6, '{\"week\":\"1510527600\",\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 2, 1510527600),
(5, 7, '{\"week\":\"1510527600\",\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 2, 1510527600),
(6, 7, '{\"week\":\"1510527600\",\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 2, 1510527600),
(7, 6, '{\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 1, 1510704430),
(8, 7, '{\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 1, 1510704436),
(9, 7, '{\"prize\":\"D\\u00e0n m\\u00e1y Samsung HW-J250\\/XV - KM\", \"type\":\"1\",\"category\":\"6\"}', 1, 1510704439),
(10, 6, '{\"week\":\"1511737200\",\"prize\":\"100 C\\u00e2y v\\u00e0ng\",\"type\":\"3\"}', 2, 1511737200),
(11, 6, '{\"week\":\"1511132400\",\"prize\":\"111\",\"type\":\"1\",\"category\":\"6\"}', 2, 1511737200),
(12, 6, '{\"week\":\"1511132400\",\"prize\":\"111\",\"type\":\"1\",\"category\":\"6\"}', 2, 1511132400),
(13, 6, '{\"week\":\"1511132400\",\"prize\":\"111\",\"type\":\"1\",\"category\":\"6\"}', 2, 1511132400);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `config` text COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `thumnail` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `content`, `config`, `category`, `thumnail`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(5, 'Samsung Galaxy S7 edge', 'Samsung Galaxy S7 edge sở hữu thiết kế thời trang màn hình vát cong nhiều tiện ích, khả năng chống nước chuẩn IP68 ấn tượng, cấu hình mạnh mẽ, tính năng độc đáo mang tới không gian giải trí và làm việc tối ưu nhất cho người dùng', '{\"key\":[\"M\\u00e0n h\\u00ecnh\",\"\\u0110\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"CPU\",\"RAM\",\"H\\u0110H\",\"SIM\",\"Gi\\u00e1\"],\"value\":[\"5,5 inch\",\"2560 x 1440 pixel\",\"Exynos 8890 8 nh\\u00e2n 64-bit\",\"4 GB\\/ ROM: 32 GB (h\\u1ed7 tr\\u1ee3 th\\u1ebb nh\\u1edb 200GB)\",\"Android 6.0\",\"2 SIM\",\"18,5 tri\\u1ec7u \\u0111\\u1ed3ng\"]}', 6, '/2017-11-14/sp_1.png', 2, 1510619111, 1510619111, 1),
(8, 'Iphone 7 plus', '\r\nSamsung Galaxy S7 edge sở hữu thiết kế thời trang màn hình vát cong nhiều tiện ích, khả năng chống nước chuẩn IP68 ấn tượng, cấu hình mạnh mẽ, tính năng độc đáo mang tới không gian giải trí và làm việc tối ưu nhất cho người dùng', '{\"key\":[\"M\\u00e0n h\\u00ecnh\",\"\\u0110\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"CPU\",\"RAM\",\"H\\u0110H\",\"SIM\",\"Gi\\u00e1\"],\"value\":[\"5,5 inch\",\"2560 x 1440 pixel\",\"Exynos 8890 8 nh\\u00e2n 64-bit\",\"4 GB\\/ ROM: 32 GB (h\\u1ed7 tr\\u1ee3 th\\u1ebb nh\\u1edb 200GB)\",\"Android 6.0\",\"2 SIM\",\"18,5 tri\\u1ec7u \\u0111\\u1ed3ng\"]}', 6, '/2017-11-14/sp_1.png', 2, 1510619111, 1510619111, 1),
(9, 'Samsung Galaxy J7 Prime', '\r\nSamsung Galaxy S7 edge sở hữu thiết kế thời trang màn hình vát cong nhiều tiện ích, khả năng chống nước chuẩn IP68 ấn tượng, cấu hình mạnh mẽ, tính năng độc đáo mang tới không gian giải trí và làm việc tối ưu nhất cho người dùng', '{\"key\":[\"M\\u00e0n h\\u00ecnh\",\"\\u0110\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"CPU\",\"RAM\",\"H\\u0110H\",\"SIM\",\"Gi\\u00e1\"],\"value\":[\"5,5 inch\",\"2560 x 1440 pixel\",\"Exynos 8890 8 nh\\u00e2n 64-bit\",\"4 GB\\/ ROM: 32 GB (h\\u1ed7 tr\\u1ee3 th\\u1ebb nh\\u1edb 200GB)\",\"Android 6.0\",\"2 SIM\",\"18,5 tri\\u1ec7u \\u0111\\u1ed3ng\"]}', 7, '/2017-11-14/samsung.png', 2, 1510619430, 1510619430, 1),
(10, 'Samsung J7 Pro', '\r\nSamsung Galaxy S7 edge sở hữu thiết kế thời trang màn hình vát cong nhiều tiện ích, khả năng chống nước chuẩn IP68 ấn tượng, cấu hình mạnh mẽ, tính năng độc đáo mang tới không gian giải trí và làm việc tối ưu nhất cho người dùng', '{\"key\":[\"M\\u00e0n h\\u00ecnh\",\"\\u0110\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"CPU\",\"RAM\",\"H\\u0110H\",\"SIM\",\"Gi\\u00e1\"],\"value\":[\"5,5 inch\",\"2560 x 1440 pixel\",\"Exynos 8890 8 nh\\u00e2n 64-bit\",\"4 GB\\/ ROM: 32 GB (h\\u1ed7 tr\\u1ee3 th\\u1ebb nh\\u1edb 200GB)\",\"Android 6.0\",\"2 SIM\",\"18,5 tri\\u1ec7u \\u0111\\u1ed3ng\"]}', 8, '/2017-11-14/samsung.png', 2, 1510619497, 1510619497, 1),
(11, 'Canon 1', '\r\nSamsung Galaxy S7 edge sở hữu thiết kế thời trang màn hình vát cong nhiều tiện ích, khả năng chống nước chuẩn IP68 ấn tượng, cấu hình mạnh mẽ, tính năng độc đáo mang tới không gian giải trí và làm việc tối ưu nhất cho người dùng', '{\"key\":[\"M\\u00e0n h\\u00ecnh\",\"\\u0110\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"CPU\",\"RAM\",\"H\\u0110H\",\"SIM\",\"Gi\\u00e1\"],\"value\":[\"5,5 inch\",\"2560 x 1440 pixel\",\"Exynos 8890 8 nh\\u00e2n 64-bit\",\"4 GB\\/ ROM: 32 GB (h\\u1ed7 tr\\u1ee3 th\\u1ebb nh\\u1edb 200GB)\",\"Android 6.0\",\"2 SIM\",\"18,5 tri\\u1ec7u \\u0111\\u1ed3ng\"]}', 9, '/2017-11-14/small-image.jpg', 2, 1510619551, 1510619551, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `id_user` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `config` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `id_user`, `config`) VALUES
(1, '864422863694475', '{\"action\":\"login\",\"type\":\"facebook\",\"username\":\"Hi\\u1ebfu Thanh\",\"id\":\"864422863694475\",\"session\":\"22qpdboagj78335k8fuk8lp2v0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`, `role`) VALUES
(1, 'admin', '$2y$13$MMnv1WJ8B0ksZh1NZbkUNe.1gSERJgXFJpleANG/0x.2pL/Ytwuce', 'admin@nghenhin.com', NULL, 1),
(6, 'Nguyễn Thế Anh', '$2y$13$8e9Zxx5E.1VuIKb6UVyvdepBj4WZ1NrprPWxuQ3YNN9p677AOH2U2', 'tcthanhhieu@gmail.com', '{\"username\":\"Hieutct\",\"phone\":\"016489879\",\"email\":\"tcthanhhieu@gmail.com\",\"code\":\"273532118\",\"address\":\"606, 3\\/2\"}', 2),
(7, 'Trần Cao Thanh Hiếu', '$2y$13$MMnv1WJ8B0ksZh1NZbkUNe.1gSERJgXFJpleANG/0x.2pL/Ytwuce', 'thanhhieu0195@gmail.com', '{\"username\":\"Hieutct\",\"phone\":\"0973334905\",\"email\":\"tcthanhhieu@gmail.com\",\"code\":\"273532118\",\"address\":\"606, 3\\/2\"}', 2),
(8, '864422863694475', '$2y$13$phBpR1y1m/KUAtu05ubBjeHsITzohBRZRtlFaDiwtvNXVkt/xI6Z2', '864422863694475@facebook.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote`
--

CREATE TABLE `tbl_vote` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `date_create` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vote`
--

INSERT INTO `tbl_vote` (`id`, `code`, `content`, `author`, `product`, `date_create`) VALUES
(1, 'HTFvliPZ_x', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 6, 5, 1510679203),
(2, 'BdmmkoOmZG', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 6, 5, 1510679273),
(3, 'zhkLoBpus6', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 7, 8, 1510679337),
(4, 'foDG71SFIN', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 7, 11, 1510679431),
(5, 'Rykawd~~8G', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 6, 5, 1510679787),
(6, 'r12A9UeKf2', 'dòng máy nhìn rất thời trang, trẻ trung, kiểu dáng sang trọng. Bộ nhớ trong lớn. Độ phân giải cao nên loát hình rất nhanh và\r\nsắc nét. Camera chụp ảnh rất đẹp.', 7, 8, 1510680003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`);

--
-- Indexes for table `tbl_prize`
--
ALTER TABLE `tbl_prize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_prize_ibfk_1` (`user`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_user` (`author_id`),
  ADD KEY `tbl_product_cat` (`category`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `author` (`author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_prize`
--
ALTER TABLE `tbl_prize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_prize`
--
ALTER TABLE `tbl_prize`
  ADD CONSTRAINT `tbl_prize_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_cat` FOREIGN KEY (`category`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_user` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD CONSTRAINT `tbl_vote_ibfk_1` FOREIGN KEY (`product`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vote_ibfk_2` FOREIGN KEY (`author`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
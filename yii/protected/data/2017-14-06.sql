-- phpMyAdmin SQL Dump
        -- version 4.7.0
        -- https://www.phpmyadmin.net/
        --
        -- Host: localhost
        -- Generation Time: Nov 14, 2017 at 12:54 AM
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
        (1, 'admin', '$2y$13$r1c4XDdtPLDqn.Uq9k39f.jCU9XFFhF.ZzTNoA.U.4NSADF49fH1K', 'admin@gmail.com', NULL, 1),
        (6, 'Hieutct', '$2y$13$r1c4XDdtPLDqn.Uq9k39f.jCU9XFFhF.ZzTNoA.U.4NSADF49fH1K', 'tcthanhhieu@gmail.com', '{\"username\":\"Hieutct\",\"phone\":\"0973334905\",\"email\":\"tcthanhhieu@gmail.com\",\"code\":\"273532118\",\"address\":\"606, 3\\/2\"}', 2),
        (7, 'thanhhieu0195', '$2y$13$MMnv1WJ8B0ksZh1NZbkUNe.1gSERJgXFJpleANG/0x.2pL/Ytwuce', 'thanhhieu0195@gmail.com', NULL, 2);

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
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
        --
        -- AUTO_INCREMENT for table `tbl_product`
        --
        ALTER TABLE `tbl_product`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
        --
        -- AUTO_INCREMENT for table `tbl_user`
        --
        ALTER TABLE `tbl_user`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
        --
        -- AUTO_INCREMENT for table `tbl_vote`
        --
        ALTER TABLE `tbl_vote`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
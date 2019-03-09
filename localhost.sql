-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 3 月 07 日 13:54
-- サーバのバージョン： 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_f02_db06`
--
CREATE DATABASE IF NOT EXISTS `gs_f02_db06` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gs_f02_db06`;

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, '逆引きゲームプログラミング', 'https://www.googleapis.com/books/v1/volumes/yheQnleSSKsC', '読んでみたい', '2019-02-25 14:13:51'),
(2, '初めてのプログラミング', 'https://www.googleapis.com/books/v1/volumes/hPFh1C5V5-YC', '', '2019-02-25 14:14:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(128) NOT NULL,
  `deadline` date NOT NULL,
  `comment` text,
  `image` varchar(128) DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `image`, `indate`) VALUES
(14, 'パン', '2019-03-21', '', 'upload/20190306044138d41d8cd98f00b204e9800998ecf8427e.jpeg', '2019-03-06 13:41:38'),
(15, 'パン', '2019-03-21', 'ううう', 'upload/20190306065004d41d8cd98f00b204e9800998ecf8427e.jpg', '2019-03-06 15:50:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `php05_table`
--

CREATE TABLE `php05_table` (
  `id` int(12) NOT NULL,
  `comment` text,
  `image` varchar(128) DEFAULT NULL,
  `audio` varchar(128) DEFAULT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `php05_table`
--

INSERT INTO `php05_table` (`id`, `comment`, `image`, `audio`, `indate`) VALUES
(17, 'りんた', 'upload/20190307122503d41d8cd98f00b204e9800998ecf8427e.jpg', 'upload/20190307122503d41d8cd98f00b204e9800998ecf8427e.m4a', '2019-03-07'),
(19, '咀嚼音', 'upload/20190307123547d41d8cd98f00b204e9800998ecf8427e.png', 'upload/20190307123547d41d8cd98f00b204e9800998ecf8427e.m4a', '2019-03-07'),
(20, 'ごえもん', 'upload/20190307123615d41d8cd98f00b204e9800998ecf8427e.jpg', 'upload/20190307123615d41d8cd98f00b204e9800998ecf8427e.m4a', '2019-03-07');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `image`, `kanri_flg`, `life_flg`) VALUES
(8, 'rinta', 'rinta@', 'rin', 'upload/20190307080102d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0),
(9, 'azusa', 'azusa@', '1023', 'upload/20190307133056d41d8cd98f00b204e9800998ecf8427e.jpg', 1, 0),
(10, 'utaya', 'utaya@', '1234', 'upload/20190307133120d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0),
(11, 'tanaka', 'tanaka@', '5678', 'upload/20190307133142d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php05_table`
--
ALTER TABLE `php05_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `php05_table`
--
ALTER TABLE `php05_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

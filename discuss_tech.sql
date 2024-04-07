-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'pawan12', '$2y$10$NfV7mRvuztP05xC0Xe3MaOjML.wSPUb/84.9rYJiOPN2ypN9/xc1q', '2022-08-26 11:10:03'),
(3, 'pawan21', '$2y$10$egjrC1KTQpbnUOQB3nli3eGktLC349jj5AA5S9SU/BlrnXOMQuP0G', '2022-09-06 14:21:24'),
(4, 'pawan123', '$2y$10$7apmfrXCffEIG9M04L8j4e40BYlqDIcNBubJgyqvFrCSDkZ5jkC0m', '2022-09-06 14:31:33'),
(5, 'pawan2', '$2y$10$IdsJwONmgESqyYXAVk2/J.G8dGoF/PAzt.bq7bCSqQLBJ0SuL3K9W', '2022-09-07 13:51:48'),
(6, 'pawan122', '$2y$10$OCzp421iemmbKsvme5o2OOtU.NVMjdSTmb/v0tsy8UIdic3.Trgcm', '2022-09-08 08:37:52'),
(7, 'pawan0', '$2y$10$HskrWsdrBElh49s/95w3P.Ns13VBmA94m0CpmglJIMvdMB2sv0xdi', '2022-09-08 14:26:21'),
(8, 'pawan1234', '$2y$10$LrsMt1zcSt/L7qu6T0n/IeZgJDm3y7KR7aVJx7jG94tfXyBK6eU3q', '2022-09-10 04:33:07'),
(9, 'pawan10', '$2y$10$MtuH4QzFK/X8soMZeObvFOVOjo49pYaKF9xY2oFIAWSw1K.eBZ0Ci', '2022-09-10 04:33:36'),
(10, 'pawan12345', '$2y$10$3Hlmz0ni.Ka6YKCy1QlAkuplbH6KtBlVNsFYsyvoQpJgl8piBA9ly', '2022-09-10 04:36:37'),
(11, 'pawan', '$2y$10$TTb8ASIHNoCgpHRJECheT.CZrwNwp.Aq7oImm7wqovI7IbVS28DMO', '2022-09-10 11:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(10) NOT NULL,
  `categories_name` text NOT NULL,
  `categories_description` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_description`, `created_date`) VALUES
(14, 'ruby', 'Ruby is an interpreted, high-level, general-purpose programming language which supports multiple programming paradigms. It was designed with an emphasis on programming productivity and simplicity. In Ruby, everything is an object, including primitive data types.', '2022-09-19 13:20:00'),
(15, 'dart', 'Dart is a programming language designed for client development, such as for the web and mobile apps. It is developed by Google and can also be used to build server and desktop applications. It is an object-oriented, class-based, garbage-collected language with C-style syntax.', '2022-09-19 13:20:53'),
(17, 'Python', 'Python is an interpreted high-level general-purpose programming language.', '2022-10-14 13:02:15'),
(18, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.', '2022-10-14 13:02:40'),
(20, 'Kotlin', 'Kotlin is a cross-platform, statically typed, general-purpose programming language with type inference.', '2022-10-14 13:03:35'),
(21, 'php', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2022-10-14 13:05:05'),
(22, 'Blockchain', 'Blockchain.com is a cryptocurrency financial services company. The company began as the first Bitcoin blockchain explorer in 2011 and later created a cryptocurrency wallet that accounted for 28% of bitcoin transactions between 2012 and 2020.', '2022-10-14 13:05:44'),
(23, 'c', 'C is a general-purpose computer programming language. It was created in the 1970s by Dennis Ritchie, and remains very widely used and influential.', '2022-10-14 13:07:09'),
(24, 'C++', 'C++ is a general-purpose programming language created by Danish computer scientist Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2022-10-14 13:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(5) NOT NULL,
  `commented_by` int(5) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `thread_id`, `commented_by`, `comment_time`) VALUES
(20, 'vgdfvgdfv', 1, 17, '2022-09-08 14:24:42'),
(27, 'XFHRT', 4, 26, '2022-09-17 11:42:32'),
(28, 'DVTVQ34', 4, 26, '2022-09-17 11:42:40'),
(29, 'pawan', 2, 27, '2022-09-17 14:46:57'),
(30, 'grt', 41, 27, '2022-09-17 14:47:57'),
(31, 'rt', 41, 27, '2022-09-17 14:48:02'),
(32, 'erty', 41, 27, '2022-09-17 14:50:17'),
(33, 'gerg', 2, 27, '2022-09-17 14:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `timestamp`, `message`) VALUES
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:13:59', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp2', '2022-09-19 13:14:19', ' Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP code ] [ Refresh ]'),
('pawan', 'pawan@gmail.com', 'imp3', '2022-09-19 13:14:47', ' Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP code ] [ Refresh ]'),
('pawan', 'pawan@gmail.com', 'imp4', '2022-09-19 13:14:52', ' Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP code ] [ Refresh ]'),
('pawan', 'pawan@gmail.com', 'imp4', '2022-09-19 13:15:02', ' Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP co'),
('pawan', 'pawan@gmail.com', 'imp5', '2022-09-19 13:15:23', ' HelpPrivacyTerms\r\n Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP co '),
('pawan', 'pawan@gmail.com', 'imp5', '2022-09-19 13:15:44', ' HelpPrivacyTerms\r\n Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP co '),
('pawan', 'pawan@gmail.com', 'imp5', '2022-09-19 13:15:47', ' HelpPrivacyTerms\r\n Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP co '),
('pawan', 'pawan@gmail.com', 'imp5', '2022-09-19 13:15:50', ' HelpPrivacyTerms\r\n Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP co '),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:15:53', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:15:56', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:15:58', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:16:01', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:16:03', 'http://localhost/prc/repeatedcode/contact.php'),
('pawan', 'pawan@gmail.com', 'imp', '2022-09-19 13:16:06', 'http://localhost/prc/repeatedcode/contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(5) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `imgFileName` varchar(100) DEFAULT NULL,
  `thread_cat_id` int(4) NOT NULL,
  `thread_user_id` int(4) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `imgFileName`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(17, 'aa', 'aqaq', 'deedpool.jpg', 1, 4, '2022-09-06 14:34:14'),
(19, 'python', 'gdrgerg', 'deadpool-vs-thanos-uhdpaper.com-4K-119.jpg', 1, 4, '2022-09-07 11:54:28'),
(20, 'tr', 'ert', '', 1, 4, '2022-09-07 11:55:00'),
(28, 'deadpool', 're', 'deedpool.jpg', 1, 4, '2022-09-07 12:06:33'),
(31, 'fre', 'rferf', '', 1, 17, '2022-09-08 14:25:09'),
(32, 'tr', 'rt', '', 2, 23, '2022-09-10 13:07:16'),
(33, 'tr', 'rt', '', 2, 23, '2022-09-10 13:10:10'),
(34, 'tr', 'rt', '', 2, 23, '2022-09-10 13:10:54'),
(35, 'dswq', 'dw', '', 3, 23, '2022-09-10 13:12:54'),
(36, 'dswq', 'dw', '', 3, 23, '2022-09-10 13:13:48'),
(37, 'sqws', 'swqs', '', 1, 23, '2022-09-10 13:14:16'),
(38, 'test', 'cecwcc', 'deedpool.jpg', 1, 23, '2022-09-10 13:14:30'),
(39, 'wdw', 'dwd', '', 3, 23, '2022-09-10 13:14:54'),
(40, 'dwd', 'wdwwd', 'deedpool.jpg', 3, 23, '2022-09-10 13:15:04'),
(41, 'pawan', 'hi', '', 1, 27, '2022-09-17 14:47:25'),
(42, 'eqfef', 'qfqf', 'cpk.png', 5, 29, '2022-10-14 11:37:18'),
(43, 'wrefw', 'fwefw', 'deedpool.jpg', 2, 29, '2022-10-14 11:43:09'),
(44, 'werf', 'wfwe', 'realistic-set-colorful-powder-clouds-explosions-isolated-transparent-background_1441-2628.webp', 2, 29, '2022-10-14 11:43:20'),
(45, '324rf324r', '2f2rf', 'deedpool.jpg', 15, 29, '2022-10-14 11:44:12'),
(46, 'hhe', 'ghehe', 'realistic-set-colorful-powder-clouds-explosions-isolated-transparent-background_1441-2628.webp', 15, 29, '2022-10-14 11:44:22'),
(47, '35yh35', 'egg', 'deadpool-vs-thanos-uhdpaper.com-4K-119.jpg', 15, 29, '2022-10-14 11:44:32'),
(48, '35yh35', 'egg', 'deadpool-vs-thanos-uhdpaper.com-4K-119.jpg', 15, 29, '2022-10-14 11:45:37'),
(49, '34tf3e', 'f3wfw', 'realistic-set-colorful-powder-clouds-explosions-isolated-transparent-background_1441-2628.webp', 15, 29, '2022-10-14 11:45:47'),
(50, '34tf3e', 'f3wfw', 'realistic-set-colorful-powder-clouds-explosions-isolated-transparent-background_1441-2628.webp', 15, 29, '2022-10-14 11:46:12'),
(51, 'wffe', 'fwef', 'spiderman.jpg', 3, 29, '2022-10-14 11:49:43'),
(52, 'check', 'cwscwc', 'grrt.PNG', 3, 29, '2022-10-14 11:55:27'),
(53, 'ysfs', 'ffffff', 'spiderman.jpg', 3, 29, '2022-10-14 11:56:42'),
(54, 'ysfs', 'ffffff', 'spiderman.jpg', 3, 29, '2022-10-14 12:03:16'),
(55, '2d', 'd2d2', 'Screenshot 2022-04-06 143920.png', 5, 29, '2022-10-14 12:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `userpass`, `timestamp`) VALUES
(6, 'pk@1', '$2y$10$Er8F.Ef9w2RYGi1lsCAE8.6RS2dHQN6Zmp6AcS.cKFM3L6OCloS/G', '2022-09-06 14:06:25'),
(9, 'dqwdq', '$2y$10$H5m5FpYWcc3v/VEBZrtTh.JuCqfFVULzX5QJP1gb52KpOw/QVitzW', '2022-09-07 10:54:39'),
(10, 'pk@11', '$2y$10$G0YnRoqZjDn5xeVnYuwegOdslPcJg7UiGC.OeTPM2lNUorlotIxSq', '2022-09-07 11:02:34'),
(11, 'pawan@gmail.com22', '$2y$10$8xsUCA6EHgOa6XlPCWbjy.8mYmWgI7RKlG7EyDb/u/7ksDWSS1MaK', '2022-09-07 11:07:19'),
(12, 'pk@111', '$2y$10$J/mMyU1lLD4eWX948UeCduid2Nl69HRGh2iqe5BaTiQTf4FzETlnC', '2022-09-07 11:08:38'),
(13, 'pawan@gmail.com32', '$2y$10$u73QXyNPWkv4eD83yGHyTOtxPT/uqNU.y06FUKmZX2wmeKDLbXTDq', '2022-09-07 14:54:01'),
(14, '121', '$2y$10$umZf8nlH9kb7G/bOvewrHeAJSBvdbFHwUo6YP.MoczK3zYkcrq6He', '2022-09-07 14:54:14'),
(15, 'pawan1@gmail.com', '$2y$10$8LQhyv99AMzmLOd3Kf0jq.pojAf2unJbDIyvDGGjkqdKvlEt4Wxl2', '2022-09-08 12:58:29'),
(16, 'pawan', '$2y$10$qp.qrDMSw1c56JU1VWwJquisArgL2Ca1k76p9ii200qV9MtZTxCfO', '2022-09-08 14:20:39'),
(17, 'pawan12', '$2y$10$THF7T4uUofxFlaT/XFQHmuEMXNrvGzrIbH2DV1YLCiWSJQ62Cpuhi', '2022-09-08 14:23:51'),
(18, 'pawan0', '$2y$10$O4QGI/Yv04.xv4SP0Cpsiu7nnSEYonWviwVjUItkT5ScGbAZd.bkG', '2022-09-10 03:38:32'),
(19, 'pawan@gmail.com3', '$2y$10$0OWKLR8DMqO/7nXBhZ9N2ukPBsxDfVhUtKBBICxYdmWoNBS0RlMPW', '2022-09-10 04:38:50'),
(21, 'pawan@gmail.com1122', '$2y$10$D.vmEjAMlRGG.KURoin9ReWlKKK199IPZYIj88ZkFVfwC7ZEJ2vEK', '2022-09-10 11:27:46'),
(23, 'pawan09', '$2y$10$e3V5P8OhD/uIfeE4sjYmOuGDLswkiJP.vhUfrCEhTLs2kp2UB0zB2', '2022-09-10 13:06:53'),
(24, 'test', '$2y$10$Gi1EUaQpYIz/EGyJb8EVJej.7CU3j40Pav0auCn.TOqAxz5xUGVkm', '2022-09-16 11:23:04'),
(27, 'test4', '$2y$10$.3btHssgYUyK0uOjxswxTeYh.P3TIgV/MRnHQUh1uJnjINTs3pMxy', '2022-09-17 14:46:26'),
(28, 'pawan@gmail.com21', '$2y$10$R.zToUsGJ55tzsRzU1nJsOS1r5vh/9GLB/oLFM6USkZkcuSLQjcYG', '2022-09-21 10:56:41'),
(29, 'vi', '$2y$10$sG73Xf2YlfR2d8WVVpD1deOJ0CrdCyDgUMXVBm5IONsZt./eeC9pe', '2022-10-14 11:36:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title_2` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

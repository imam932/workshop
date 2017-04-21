-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2017 at 09:39 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 5.6.30-9+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(200) NOT NULL,
  `posting` text NOT NULL,
  `image` text NOT NULL,
  `id_category` varchar(15) DEFAULT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` varchar(15) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
('nDFSL0417ah1X9e', 'Riset'),
('oDxlB0417Jl8uE7', 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id_division` varchar(15) NOT NULL,
  `division` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('1', 'admin'),
('2', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `ref` text,
  `date` datetime NOT NULL,
  `browser` text NOT NULL,
  `platform` varchar(15) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `ip`, `ref`, `date`, `browser`, `platform`, `location`) VALUES
(1, '127.0.0.1', '', '2017-04-07 21:22:53', 'Chrome', 'Linux', 'unknown'),
(2, '127.0.0.1', 'http://localhost/workshop/admin/Logout', '2017-04-09 18:21:52', 'Chrome', 'Linux', 'unknown'),
(3, '127.0.0.1', '', '2017-04-11 12:28:15', 'Chrome', 'Linux', 'unknown'),
(4, '127.0.0.1', '', '2017-04-12 16:47:47', 'Chrome', 'Linux', 'unknown'),
(5, '127.0.0.1', '', '2017-04-13 20:52:22', 'Chrome', 'Linux', 'unknown'),
(6, '127.0.0.1', '', '2017-04-13 20:52:51', 'Chrome', 'Linux', 'unknown'),
(7, '127.0.0.1', '', '2017-04-14 07:19:42', 'Chrome', 'Linux', 'unknown'),
(8, '127.0.0.1', '', '2017-04-15 09:33:28', 'Chrome', 'Linux', 'unknown'),
(9, '127.0.0.1', '', '2017-04-15 09:33:28', 'Chrome', 'Linux', 'unknown'),
(10, '127.0.0.1', '', '2017-04-17 15:23:48', 'Chrome', 'Linux', 'unknown'),
(11, '127.0.0.1', '', '2017-04-17 16:46:13', 'Chrome', 'Linux', 'unknown'),
(12, '127.0.0.1', '', '2017-04-18 18:12:37', 'Chrome', 'Linux', 'unknown'),
(13, '127.0.0.1', '', '2017-04-21 21:32:58', 'Chrome', 'Linux', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `readed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` varchar(15) NOT NULL,
  `module` varchar(20) NOT NULL,
  `controller` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `module`, `controller`, `icon`) VALUES
('1', 'dashboard', 'Dashboard', 'fa-dashboard'),
('2', 'category', 'Category', 'fa-tag'),
('3', 'article', 'Article', 'fa-file-text-o'),
('4', 'tutorial', 'Tutorial', 'fa-file-text'),
('5', 'gallery', 'Gallery', 'fa-file-image-o'),
('6', 'level', 'Level', 'fa-level-up'),
('7', 'user', 'User', 'fa-user'),
('8', 'message', 'Message', 'fa-envelope-o'),
('9', 'visitor', 'Visitor', 'fa-bar-chart');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id_privilege` int(11) NOT NULL,
  `id_level` varchar(15) NOT NULL,
  `id_module` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id_privilege`, `id_level`, `id_module`) VALUES
(38, '2', '3'),
(39, '2', '2'),
(40, '2', '1'),
(41, '2', '5'),
(42, '2', '4'),
(43, '2', '9'),
(70, '1', '3'),
(71, '1', '2'),
(72, '1', '1'),
(73, '1', '5'),
(74, '1', '6'),
(75, '1', '8'),
(76, '1', '4'),
(77, '1', '7'),
(78, '1', '9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `id_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `gender`, `birth`, `address`, `phone`, `username`, `password`, `id_level`) VALUES
('6Cghsq10046e73N', 'nindra', 1, '0000-00-00', 'nindra', '234567', 'nindra', '39258741aae25828c1ea891a0f8f7cc7', '2'),
('ed4ujtfgfu9i', 'admin', 1, '2017-04-11', 'malang', '085331247098', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id_privilege`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL,
  ADD CONSTRAINT `article_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL;

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privilege_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 09:14 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
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
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` varchar(15) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `activity`, `description`, `image`) VALUES
('PVQNYm0517gFA6r', 'Riset Perkembangan Teknologi Informasi', '<p><strong>WRI</strong> memiliki kegiatan rutin yaitu melakukan riset terhadap perkembangan teknologi informasi sehingga dapat bersaing di era globalisasi</p>\r\n', 'fe3c7a9cc2117e4d67439d30eb0382ae.png'),
('QYRqJs0517cYfay', 'Mini Class', '<p><strong>WRI&nbsp;</strong>memberikan sarana bagi mahasiswa untuk dapat belajar dan meningkatkan pengetahuan</p>\r\n', '773377c3d82011f55a2bdc8a0d4eb040.png'),
('T8grHO0517TuxO2', 'Peningkatan Skill dengan Mengikuti Sertifikasi', '<p>Dengan bergabung dengan <strong>WRI </strong>mahasiswa dapat mengikuti sertifikasi dalam bidang teknologi untuk meningkatkan skill dan mempermudah dalam mencari pekerjaan di masa depan</p>\r\n', '745e9a076ced18375014c5083a8f8d4a.png'),
('rJHAMG0517vWngU', 'Aktif Mengikuti Lomba', '<p><strong>WRI&nbsp;</strong>memberikan wadah bagi mahasiswa untuk menyalurkan minat dan bakat dengan mengikuti berbagai macam lomba</p>\r\n', '964c143bc097da4c82d6901d60e20a8d.png');

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
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `date`, `last_modified`, `title`, `posting`, `image`, `id_category`, `id_user`, `publish`) VALUES
('Tarf0N0517wDlBe', '2017-05-01 18:50:12', '2017-05-01 18:50:12', 'tes', '<p>lol</p>\r\n', '691201c84bb9e6083e8e6e485e626a90.jpg', NULL, NULL, 1);

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

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `division`, `description`, `image`) VALUES
('EOHzc60517F3gcx', 'Pemrograman', '<p>Divisi Pemrograman adalah divisi yang mengembangkan berbagai cabang ilmu yang difokuskan pada proses pembuatan atau pengembangan program / aplikasi yang menggunakan berbagai bahasa pemrograman, seperti :&nbsp;<strong>C++, Java, Html, Php, Css, Javascript, dan bahasa pemrograman lainnya.</strong></p>\r\n', 'd926231542c08cbb77b50ba7119a16d2.png'),
('iNWOm70517yr6uV', 'Multimedia', '<p>Divisi Multimedia adalah divisi yang berfokus pada penyampaian informasi yang menggunakan berbagai media digital, media tersebut mecakup desain grafis, audio, video, serta bidang multimedia lainnya. Divisi ini juga memiliki peran penting dalam proses pembuatan atau pengembangan game, terutama dalam bidang desain, seperti : karakter, assets, animasi dan komponen lainnya pada game.</p>\r\n', '00ed6d6b4738e8a831dd1643c77e3eea.png'),
('u3lqbz0517wTu4Q', 'Jaringan', '<p>Divisi Jaringan adalah divisi yang terfokus pada bidang jaringan. Didalam divisi ini mencakup tentang berbagai macam jenis pengembangan yang berhubungan dengan suatu jaringan, seperti: setting jaringan, pengalamatan IP, sharing jaringan, dll.</p>\r\n', '1326eb56a8a5449acb43a0f4176cdae5.png');

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
(13, '127.0.0.1', '', '2017-04-21 21:32:58', 'Chrome', 'Linux', 'unknown'),
(14, '127.0.0.1', '', '2017-04-23 13:02:54', 'Chrome', 'Linux', 'unknown'),
(15, '127.0.0.1', '', '2017-04-23 13:02:55', 'Chrome', 'Linux', 'unknown'),
(16, '127.0.0.1', '', '2017-05-01 10:42:07', 'Chrome', 'Linux', 'unknown'),
(17, '127.0.0.1', '', '2017-05-06 12:02:42', 'Chrome', 'Linux', 'unknown'),
(18, '127.0.0.1', '', '2017-05-11 11:01:18', 'Chrome', 'Linux', 'unknown'),
(19, '127.0.0.1', '', '2017-05-12 21:45:42', 'Chrome', 'Linux', 'unknown'),
(20, '127.0.0.1', '', '2017-05-16 19:05:15', 'Chrome', 'Linux', 'unknown'),
(21, '127.0.0.1', '', '2017-05-25 13:34:08', 'Chrome', 'Linux', 'unknown'),
(22, '127.0.0.1', '', '2017-05-29 08:44:30', 'Chrome', 'Linux', 'unknown');

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
('agrtehy7j', 'Dashboard', 'Dashboard', 'fa-dashboard'),
('bgerhtytj', 'Category', 'Category', 'fa-tag'),
('cgrthyjyr', 'Article', 'Article', 'fa-file-text-o'),
('dgr5y6u7', 'Gallery', 'Gallery', 'fa-file-image-o'),
('eergthyj', 'Level', 'Level', 'fa-level-up'),
('fhgiaega', 'User', 'User', 'fa-user'),
('ggeyagag', 'Division', 'Division', 'fa-shield'),
('ghgeageagh', 'Activity', 'Activity', 'fa-pencil-square-o'),
('hgeayga', 'Message', 'Message', 'fa-envelope-o'),
('igaeghae', 'Visitor', 'Visitor', 'fa-bar-chart');

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
(88, '2', 'cgrthyjyr'),
(89, '2', 'bgerhtytj'),
(90, '2', 'agrtehy7j'),
(91, '2', 'dgr5y6u7'),
(92, '2', 'igaeghae'),
(93, '1', 'ghgeageagh'),
(94, '1', 'cgrthyjyr'),
(95, '1', 'bgerhtytj'),
(96, '1', 'agrtehy7j'),
(97, '1', 'ggeyagag'),
(98, '1', 'dgr5y6u7'),
(99, '1', 'eergthyj'),
(100, '1', 'hgeayga'),
(101, '1', 'fhgiaega'),
(102, '1', 'igaeghae');

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
('8QvgFA12056XFHU', 'm. nindra zaka', 1, '1998-02-16', 'Malang', '085331247098', 'mnindra', 'a0b9563e488abfc70f714b0edd7e9971', '1'),
('zudOgU12059udSl', 'imam nawawi', 1, '2017-12-05', 'Malang', '085730269938', 'nawawi932', '4076469135864b9db87b3b03b137e0b9', '1');

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
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
  ADD CONSTRAINT `privilege_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privilege_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

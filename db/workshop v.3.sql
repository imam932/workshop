-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 04:47 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

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
  `title` varchar(200) NOT NULL,
  `posting` text NOT NULL,
  `id_category` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `date`, `title`, `posting`, `id_category`, `id_user`, `publish`) VALUES
('678Xzk0117tHzEd', '2017-01-20 03:56:15', 'taegae', '<p>gaertgaegaegaerghar<br></p>', 'JbGHW01171diHtu', '1', 0),
('9WUIof0117TkBXF', '2017-01-19 01:30:48', 'gveaga', '<p>gaegaga<br></p>', 'vkDpt0117RXjqyu', '1', 1),
('F1queQ0117YlfUo', '2017-01-20 03:53:17', 'gfaeghsegse', '<p>hsrhsrhrss<br></p>', '6X1R50117FRfPug', '1', 1),
('Md1nqt0117CP72q', '2017-01-20 04:23:23', 'alfiii', '<p>ggaegaeg<br></p>', 'JbGHW01171diHtu', '1', 1),
('mLvDyJ01177O34f', '2017-01-19 11:17:17', 'judulnya hahaha', '<p>isinya hahaha<br></p>', 'JbGHW01171diHtu', '1', 1),
('pJFQE801173yC5B', '2017-01-20 03:57:03', 'taeghareg', '<p>graharehrahrsghrs<br></p>', 'JbGHW01171diHtu', '1', 0),
('pSeNFT0117eN6Vb', '2017-01-20 03:58:02', 'bshsrh', '<p>hsrhbsrhrsn<br></p>', 'vkDpt0117RXjqyu', '1', 1),
('vxb26d0117NS4Jh', '2017-01-20 03:56:04', 'gtaetae', '<p>gaet<br></p>', 'vkDpt0117RXjqyu', '1', 1),
('z7bT2j0117pTFX0', '2017-01-20 04:46:31', 'gejiaeg', '<p>gmaehgmoiaeh<br></p>', 'JbGHW01171diHtu', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id_auth` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `id_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id_auth`, `username`, `password`, `id_user`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

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
('6X1R50117FRfPug', 'Lomba'),
('8afkc0117IlVaxQ', 'geagea'),
('JbGHW01171diHtu', 'Pertemuan'),
('vkDpt0117RXjqyu', 'tes');

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

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `date`, `title`, `image`, `description`) VALUES
('olxWq01174qGiW2', '2017-01-19 06:35:36', 'hywryh', 'a941f829084b63a464c41ddb0f943c23.jpg', 'hsrjhs');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` varchar(15) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id_tutorial` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `gender`, `birth`, `address`, `phone`) VALUES
('1', 'aka', 1, '2017-01-16', 'condong', '252523');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id_tutorial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

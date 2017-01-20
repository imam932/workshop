-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 02:17 
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
('z7bT2j0117pTFX0', '2017-01-20 04:46:31', 'HAHA', '<p>gmaehgmoiaeh<br></p>', 'JbGHW01171diHtu', '1', 1);

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
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('1ckwBX2001TwFZk', 'nindra', '39258741aae25828c1ea891a0f8f7cc7', 'SUfON62001LZ3Jr'),
('Cf7j5G2001qJVGM', 'hsrh', 'df10847b5850d2be18c7bedcd3c33428', 'KGZjqi2001XjGoJ'),
('DwxshR20016pgbd', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'swhvI82001ZlbK0'),
('FCQxyk2001lSEe0', 'jaka', '9d83066da00b7c7fa9de34117f488653', 'TVUCOe2001B5GWp'),
('NL6JsU20012A5me', 'hsrhr', 'b078bfc5d5b96f2b5d4a68b2cb800489', 'OP7m042001p1Gmr'),
('nWUduE2001ZuY31', 'raka', 'e5b2a975d9b73165bcc8b5e63ce488ff', 'v0x7ei2001V7SlT'),
('xgBIfR2001djy3Q', 'taeg', '4dcaeebaa201ac85691509cd8529f095', 'KYMCOk2001M97bO');

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
('7YdRQ0117oP6cxH', '2017-01-20 05:14:43', 'ghsrhs', '2cfb98349fbc4a96cfc0728aba677e78.png', 'hsrhsr'),
('BhMSO0117qJDyAF', '2017-01-20 05:15:07', 'hsnstnhtd', '5536b44f1ae7551714c3dc9d22fa1024.png', 'hrshstnbts'),
('BrYZS01173rPied', '2017-01-20 05:14:35', 'wetrwy', '95ce5b02d2bd86b78e8a65991b2791d9.png', 'hsghbsb'),
('EWvf40117cGm73x', '2017-01-20 05:14:23', 'garg', 'd618f9865c3cbd515aac502187b103e8.png', 'gagar'),
('Ho89m0117lHfDX7', '2017-01-20 05:14:56', 'hbsfnbdn', 'bf3881ec306d1037dc61cffb8abd8c5c.png', 'hsrhsh'),
('lHUW40117LIMja1', '2017-01-20 05:14:12', 'gaeg', '66ae9fdc037e02c40a9edd4548713961.jpg', 'gaga'),
('LmoBV01179lWcAq', '2017-01-20 05:15:46', 'hinata', '5beabe6e14033140a1d6d192f8b237b6.png', 'jifjaeiogaegegrhr'),
('olxWq01174qGiW2', '2017-01-19 06:35:36', 'hywryh', 'a941f829084b63a464c41ddb0f943c23.jpg', 'hsrjhs'),
('pAbXF0117hXlRn5', '2017-01-20 05:14:28', 'geasg', 'f7885dbae22d0c0a37f2eef033030b7a.png', 'vvsfbfsbs'),
('ThY6J0117GPCHuw', '2017-01-20 05:14:18', 'grsgsr', 'f342e5646484883e1f29eb1c69adec35.png', 'gsrgr'),
('TiprC0117ijmunB', '2017-01-20 05:15:14', 'bngdngcn', 'a70921f930eac5102cb493509de790d7.jpg', 'hsrhntsdn');

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
  `phone` varchar(12) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `gender`, `birth`, `address`, `phone`, `admin`) VALUES
('1', 'aka', 1, '2017-01-16', 'condong', '252523', 1),
('KGZjqi2001XjGoJ', 'graegr', 1, '2017-01-17', 'hrsh', '5435435', 0),
('SUfON62001LZ3Jr', 'nindra', 1, '2017-11-01', 'probolinggo', '08533127098', 0),
('swhvI82001ZlbK0', 'M. Nindra Zaka', 1, '2017-03-01', 'geagareg', '085331247098', 0),
('TVUCOe2001B5GWp', 'jaka', 1, '1900-12-22', 'gaeeaf', '08', 1),
('v0x7ei2001V7SlT', 'raka', 0, '2017-12-01', 'condong', '0853333333', 0);

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

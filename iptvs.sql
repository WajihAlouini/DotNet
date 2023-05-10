-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iptvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `iptv_category`
--

CREATE TABLE `iptv_category` (
  `id_category` int(11) NOT NULL,
  `nom_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iptv_category`
--

INSERT INTO `iptv_category` (`id_category`, `nom_category`) VALUES
(9, 'Tunisian'),
(10, 'Bein Sports'),
(11, 'Kids Channels');

-- --------------------------------------------------------

--
-- Table structure for table `iptv_channel`
--

CREATE TABLE `iptv_channel` (
  `id_channel` int(11) NOT NULL,
  `nom_channel` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `frame` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `id_category` int(11) NOT NULL,
  `raiting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iptv_channel`
--

INSERT INTO `iptv_channel` (`id_channel`, `nom_channel`, `url`, `frame`, `image`, `id_category`, `raiting`) VALUES
(1, 'Nickelodeon Arabia', 'https://www.youtube.com/watch?v=oQCOQmshmS', '', 'logo nickelodeon.jpg', 11, 0),
(2, 'Bein Sports 1 HD', 'https://www.youtube.com/watch?v=eIjjS2M4Wxg', '', 'being sports 12.png', 10, 5),
(3, 'Alwataneya 2 Live', 'https://www.youtube.com/watch?v=1SxvIr3Pp3U', '', 'wataneya 2.png', 9, 0),
(4, 'Alwataneya 1 Live', 'https://www.youtube.com/watch?v=Bz8j9M8BuXE', '', 'alwataneya 1.png', 9, 3),
(5, 'Elhiwar Ettounsi', 'https://www.youtube.com/watch?v=PGUTqEHDTAY', '', 'elhiwar ettounsi.jpg', 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iptv_category`
--
ALTER TABLE `iptv_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `iptv_channel`
--
ALTER TABLE `iptv_channel`
  ADD PRIMARY KEY (`id_channel`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iptv_category`
--
ALTER TABLE `iptv_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `iptv_channel`
--
ALTER TABLE `iptv_channel`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iptv_channel`
--
ALTER TABLE `iptv_channel`
  ADD CONSTRAINT `iptv_channel_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `iptv_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

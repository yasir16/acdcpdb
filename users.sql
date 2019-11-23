-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 03:24 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--
-- Error reading structure for table users.floor: #1932 - Table 'users.floor' doesn't exist in engine
-- Error reading data for table users.floor: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `users`.`floor`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` tinyint(11) NOT NULL,
  `parent_id` tinyint(11) NOT NULL,
  `title` text NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT 'javascript:void(0);',
  `menu_order` int(11) NOT NULL,
  `more` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `title`, `url`, `menu_order`, `more`) VALUES
(1, 0, 'JNB-1', 'javascript:void(0);', 1, 'Jl. Denpasar Raya No.20, RT.7/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950'),
(2, 0, 'BNB', 'javascript:void(0);', 2, 'Jl. Soekarno Hatta No.779, Cisaranten Kulon, Arcamanik, Kota Bandung, Jawa Barat 40292'),
(3, 0, 'SNB', 'javascript:void(0);', 3, 'Jl. Raya Rungkut No.15A, Kali Rungkut, Rungkut, Kota SBY, Jawa Timur 60293'),
(4, 0, 'JNB-2', 'javascript:void(0);', 4, 'Jl. Sumba, Kawasan Industri MM2100, Cibitung, Bekasi'),
(5, 0, 'PNB', 'javascript:void(0);', 5, 'Jl. Nangka No.819, Labuh Baru Bar., Payung Sekaki, Kota Pekanbaru, Riau 28291'),
(6, 0, 'Palma Tower', 'javascript:void(0);', 6, 'Sektor II Palma Tower Lt. 21, Jalan R.A Kartini III-S Kav. 06 RT. 06 / RW. 14, Pondok Pinang, Kebayoran lama, RT.6/RW.14, Pd. Pinang, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12310'),
(7, 0, 'Regional DPS', 'javascript:void(0);', 7, 'Jl. Sunset Road No.818, Kuta, Kabupaten Badung, Bali 80361'),
(8, 0, 'Regional BDG', 'javascript:void(0);', 8, 'Jl. R.E. Martadinata No.7, Tamansari, Bandung Wetan, Kota Bandung, Jawa Barat 40116'),
(9, 0, 'Regional PLMBG', 'javascript:void(0);', 9, 'Jl. Angkatan 45 No.818, Demang Lebar Daun, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30137'),
(10, 0, 'Regional PKB', 'javascript:void(0);', 10, 'Jl. Nangka No.819, Labuh Baru Bar., Payung Sekaki, Kota Pekanbaru, Riau 28291'),
(11, 0, 'Regional Tamora', 'javascript:void(0);', 11, 'Jl. Pelita IV, Tj. Morawa B, Tj. Morawa, Kabupaten Deli Serdang, Sumatera Utara 20362');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `site_id` int(11) NOT NULL,
  `site_name` text NOT NULL,
  `site_more` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `site_name`, `site_more`) VALUES
(0, 'JNB-1', 'Jl. Denpasar Raya No.20, RT.7/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950'),
(1, 'BNB', 'Jl. Soekarno Hatta No.779, Cisaranten Kulon, Arcamanik, Kota Bandung, Jawa Barat 40292'),
(2, 'SNB', 'Jl. Raya Rungkut No.15A, Kali Rungkut, Rungkut, Kota SBY, Jawa Timur 60293'),
(3, 'JNB-2', 'Jl. Sumba, Kawasan Industri MM2100, Cibitung, Bekasi'),
(4, 'PNB', 'Jl. Nangka No.819, Labuh Baru Bar., Payung Sekaki, Kota Pekanbaru, Riau 28291'),
(5, 'Palma Tower', 'Sektor II Palma Tower Lt. 21, Jalan R.A Kartini III-S Kav. 06 RT. 06 / RW. 14, Pondok Pinang, Kebayoran lama, RT.6/RW.14, Pd. Pinang, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12310');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'user', 'user', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2021 at 08:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peta`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `tipe` varchar(50) NOT NULL,
  `foto` longblob DEFAULT '../../files/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `username`, `nama`, `alamat`, `longitude`, `latitude`, `tipe`, `foto`) VALUES
(1, '0', 'Stadion Andalas', 'Nawin, Haruai, Tabalong Regency, South Kalimantan 71572', 115.54744720458984, -1.9649250507354736, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(2, '0', 'Stadion Malihu FC', 'Paran, Paringin, Balangan Regency, South Kalimantan 71662', 115.5275650024414, -2.284467935562134, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(3, '0', 'Stadion Paringin', 'Jl. A. Yani, Paringin, Paringin Kota, Paringin, Kabupaten Balangan, Kalimantan Selatan 71615', 115.4210279290894, -2.2708374477105764, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(4, '0', 'Stadion Murakata', 'Mandingin, Barabai, Mandingin, Barabai, Kabupaten Hulu Sungai Tengah, Kalimantan Selatan 71312', 115.39990234375, -2.5693559646606445, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(5, '0', 'Stadion Sepakbola Ganda', 'Jl. Brigjen H. Moh. Yusi, Kandangan, Baluti, Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71213', 115.2670669555664, -2.801013946533203, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(7, '0', 'Stadion Dspectra FC', 'Takuti, Mataraman, Banjar, South Kalimantan 70672', 115.0038070678711, -3.353472948074341, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(9, '0', 'Stadion MINI BARAKAT', 'Jl. Kayu Tangi, Cindai Alus, Kec. Martapura, Banjar, Kalimantan Selatan 70714', 114.84806060791016, -3.419326066970825, 'Stadion', 0x66696c65732f64656661756c742e6a7067),
(10, '0', 'Stadion 17 Mei', 'Jl. Zafri Zam Zam, Tlk. Dalam, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70117', 114.5801773071289, -3.3168399333953857, 'Stadion', 0x66696c65732f64656661756c742e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('18650045', 'akuganteng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2019 at 02:55 PM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.2.15-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nahrimapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `coords`
--

CREATE TABLE `coords` (
  `stn_no` int(7) DEFAULT NULL,
  `stn_name` varchar(25) DEFAULT NULL,
  `state` varchar(19) DEFAULT NULL,
  `district` varchar(19) DEFAULT NULL,
  `lon` decimal(9,6) DEFAULT NULL,
  `lat` decimal(7,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `coords`
--

INSERT INTO `coords` (`stn_no`, `stn_name`, `state`, `district`, `lon`, `lat`) VALUES
(5303053, 'BANDAR BARU SEBERANG PRAI', 'Pulau Pinang', 'Sbg. Perai Tengah', '100.391667', '5.381944'),
(1829001, 'BATU PAHAT', 'Johor', 'Batu Pahat', '102.981944', '1.866667'),
(5304045, 'BUKIT BERAPIT', 'Pulau Pinang', 'Sbg. Perai Tengah', '100.475556', '5.375556'),
(4634085, 'DUNGUN', 'Terengganu', 'Dungun', '103.437500', '4.636111'),
(3116003, 'JPS KL', 'Wilayah Persekutuan', 'Wilayah Persekutuan', '101.684722', '3.151389'),
(2917001, 'KAJANG', 'Selangor', 'Hulu Langat', '101.785806', '2.996111'),
(6401002, 'KANGAR', 'Perlis', 'Kangar', '100.187500', '6.445833'),
(4234109, 'KEMAMAN', 'Terengganu', 'Kemaman', '103.422222', '4.231944'),
(3014080, 'KLANG', 'Selangor', 'Klang', '101.444806', '3.048056'),
(6122001, 'KOTA BHARU', 'Kelantan', 'Kota Bharu', '102.233333', '6.133333'),
(3833002, 'KUANTAN', 'Pahang', 'Kuantan', '103.329167', '3.808333'),
(1537113, 'LDG TEBRAU', 'Johor', 'Johor Bahru', '103.743056', '1.550000'),
(4206045, 'LUMUT', 'Perak', 'Manjung', '100.608333', '4.226389'),
(2322001, 'MELAKA', 'Melaka', 'Tengah', '102.270283', '2.213478'),
(2438001, 'MERSING', 'Johor', 'Mersing', '103.813889', '2.473611'),
(2025001, 'MUAR', 'Johor', 'Muar', '102.577778', '2.051389'),
(2834001, 'ROMPIN', 'Pahang', 'Rompin', '103.450000', '2.812500'),
(2719001, 'SEREMBAN', 'Negeri Sembilan', 'Seremban', '101.955556', '2.737500'),
(5604002, 'SG PETANI', 'Kedah', 'Kuala Muda', '100.494444', '5.629167'),
(6003049, 'TELOK CHENGAI', 'Kedah', 'Kota Setar', '100.333333', '6.095833'),
(4010001, 'TELUK INTAN', 'Perak', 'Hilir Perak', '101.036111', '4.016667'),
(3424081, 'TEMERLOH', 'Pahang', 'Termeloh', '102.426389', '3.438889'),
(3517022, 'ULU SELANGOR', 'Selangor', 'Hulu Selangor', '101.728056', '3.581667'),
(3117066, 'WILAYAH PERSEKUTUAN', 'Wilayah Persekutuan', 'Wilayah Persekutuan', '101.701389', '3.173611');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

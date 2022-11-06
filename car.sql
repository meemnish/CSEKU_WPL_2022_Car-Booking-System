-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2022 at 05:26 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'b92f74f01c13d0a568b1638a9f501a1f', '2022-11-06 17:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

DROP TABLE IF EXISTS `bookingtable`;
CREATE TABLE IF NOT EXISTS `bookingtable` (
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `car` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `slot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`name`, `phone`, `car`, `date`, `slot`) VALUES
('Meem', '01823363300', 'Hyundai Veloster', '2022-11-10', 'AM'),
('Shoumili', '01234567890', 'Kia Sportage', '2022-11-12', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Hyundai', '2022-11-01 15:27:25', NULL),
(2, 'BMW', '2022-11-01 15:27:46', NULL),
(3, 'Toyota', '2022-11-01 15:27:49', NULL),
(4, 'Nissan', '2022-11-01 15:27:52', NULL),
(5, 'Mercedes', '2022-11-01 15:48:11', NULL),
(6, 'CSEKU19', '2022-11-03 05:19:00', '2022-11-03 05:19:35'),
(9, 'Audi', '2022-11-06 12:04:30', '2022-11-06 12:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`name`, `email`, `date`, `review`) VALUES
('Meem', 'meem@gmail.com', '2022-11-03', 'Good experience');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE IF NOT EXISTS `usertable` (
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`name`, `password`) VALUES
('ishan', '7890'),
('mantasha', '1234'),
('meem', '1234'),
('nidhi', '1234'),
('oishi', '1234'),
('shoumili', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int DEFAULT NULL,
  `SeatingCapacity` int DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `RegDate`, `UpdationDate`) VALUES
(5, 'Mitsubishi', 4, 'nice car', 5500, 'Petrol', 2020, 4, 'm1.jpg', 'm2.jpg', 'm3.jpg', 'm4.jpg', '', 1, '2022-11-01 16:44:28', NULL),
(6, 'Benz', 5, 'nice car', 5500, 'Petrol', 2021, 4, 'benz1.jpg', 'benz2.jpg', 'benz3.jpg', 'benz4.jpg', '', 1, '2022-11-02 07:54:19', NULL),
(7, 'wpl', 6, 'nice car', 7000, 'Petrol', 2022, 7, 'bmw1.jpg', 'bmw2.jpg', 'bmw3.jpg', 'bmw4.jpg', '', 1, '2022-11-03 05:20:49', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

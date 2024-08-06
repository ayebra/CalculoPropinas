-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 10:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propinas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `propinas`
--

CREATE TABLE `propinas` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `propina_cocina` decimal(10,2) DEFAULT NULL,
  `propina_cajas` decimal(10,2) DEFAULT NULL,
  `cantidad_meseros` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `turno` varchar(30) DEFAULT NULL,
  `propina_por_mesero` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propinas`
--

INSERT INTO `propinas` (`id`, `total`, `propina_cocina`, `propina_cajas`, `cantidad_meseros`, `fecha`, `turno`, `propina_por_mesero`) VALUES
(68, 500.00, 85.00, 35.00, 4, '2024-07-29', '3:00 PM a 7:00 PM', 95.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propinas`
--
ALTER TABLE `propinas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `propinas`
--
ALTER TABLE `propinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

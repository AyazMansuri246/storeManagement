-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 06:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `quantity`, `email`) VALUES
(1, 'amul_gold', 3, 'ayaz@gmail.com'),
(2, 'taza', 4, 'ayaz@gmail.com'),
(3, 'submit', 0, 'ayaz@gmail.com'),
(4, 'amul_gold', 3, 'ayaz@gmail.com'),
(5, 'taza', 3, 'ayaz@gmail.com'),
(6, 'amul_gold', 3, 'ayaz@gmail.com'),
(7, 'taza', 5, 'ayaz@gmail.com'),
(8, 'amul_gold', 3, 'ayaz@gmail.com'),
(9, 'taza', 5, 'ayaz@gmail.com'),
(10, 'amul_gold', 2, 'ayaz@gmail.com'),
(11, 'taza', 1, 'ayaz@gmail.com'),
(12, 'amul_gold', 2, 'ayaz@gmail.com'),
(13, 'taza', 1, 'ayaz@gmail.com'),
(14, 'amul_gold', 2, 'ayaz@gmail.com'),
(15, 'taza', 1, 'ayaz@gmail.com'),
(16, 'amul_gold', 2, 'ayaz@gmail.com'),
(17, 'taza', 1, 'ayaz@gmail.com'),
(18, 'amul_gold', 0, 'ayaz@gmail.com'),
(19, 'taza', 4, 'ayaz@gmail.com'),
(20, 'amul_gold', 2, 'ayaz@gmail.com'),
(21, 'taza', 1, 'ayaz@gmail.com'),
(22, 'amul_gold', 5, 'ayaz@gmail.com'),
(23, 'taza', 7, 'ayaz@gmail.com'),
(24, 'amul_gold', 0, 'ayaz@gmail.com'),
(25, 'taza', 1, 'ayaz@gmail.com'),
(26, 'amul_gold', 0, 'ayaz@gmail.com'),
(27, 'taza', 1, 'ayaz@gmail.com'),
(28, 'amul_gold', 0, 'ayaz@gmail.com'),
(29, 'taza', 1, 'ayaz@gmail.com'),
(30, 'amul_gold', 0, 'ayaz@gmail.com'),
(31, 'taza', 1, 'ayaz@gmail.com'),
(32, 'amul_gold', 0, 'ayaz@gmail.com'),
(33, 'taza', 1, 'ayaz@gmail.com'),
(34, 'amul_gold', 0, 'ayaz@gmail.com'),
(35, 'taza', 1, 'ayaz@gmail.com'),
(36, 'amul_gold', 0, 'ayaz@gmail.com'),
(37, 'taza', 1, 'ayaz@gmail.com'),
(38, 'amul_gold', 1, 'ayaz@gmail.com'),
(39, 'taza', 1, 'ayaz@gmail.com'),
(40, 'laptop', 1, 'ayaz@gmail.com'),
(41, 'computer', 1, 'ayaz@gmail.com'),
(42, 'amul_gold', 1, 'ayaz@gmail.com'),
(43, 'taza', 1, 'ayaz@gmail.com'),
(44, 'laptop', 1, 'ayaz@gmail.com'),
(45, 'computer', 1, 'ayaz@gmail.com'),
(46, 'amul_gold', 1, 'ayaz@gmail.com'),
(47, 'taza', 1, 'ayaz@gmail.com'),
(48, 'laptop', 1, 'ayaz@gmail.com'),
(49, 'computer', 1, 'ayaz@gmail.com'),
(50, 'amul_gold', 5, 'ayaz@gmail.com'),
(51, 'taza', 2, 'ayaz@gmail.com'),
(52, 'laptop', 1, 'ayaz@gmail.com'),
(53, 'computer', 5, 'ayaz@gmail.com'),
(54, 'amul_gold', 3, 'ayaz@gmail.com'),
(55, 'taza', 1, 'ayaz@gmail.com'),
(56, 'laptop', 0, 'ayaz@gmail.com'),
(57, 'computer', 1, 'ayaz@gmail.com'),
(58, 'kul', 1, 'ayaz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bill_present` varchar(10) NOT NULL,
  `bill_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `email`, `bill_present`, `bill_quantity`) VALUES
(69, 'taza', 65, 25, 'ayaz@gmail.com', 'yes', 213),
(70, 'amul gold', 22, 12, 'ayaz@gmail.com', 'yes', 122),
(71, 'laptop', 12, 23222, 'ayaz@gmail.com', 'yes', 123),
(72, 'fan', 22, 222, 'ayaz@gmail.com', 'yes', 1232);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(8) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` int(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`id`, `username`, `email`, `number`, `password`) VALUES
(1, 'ayaz', 'ayaz@gmail.com', 8582889, 'a'),
(10, 'ayazmansuri', 'ayazmansuri246@gmail.com', 11124, 'aa'),
(11, 'Ayaz_Mansuri', 'aaaaaa@gmail.com', 123, 'a'),
(12, 'kul', 'kuljeet@gmail.com', 2147483647, 'k');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

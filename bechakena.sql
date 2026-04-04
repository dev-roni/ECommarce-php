-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2026 at 04:21 PM
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
-- Database: `bechakena`
--

-- --------------------------------------------------------

--
-- Table structure for table `cetegory`
--

CREATE TABLE `cetegory` (
  `id` int(50) NOT NULL,
  `cetegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cetegory`
--

INSERT INTO `cetegory` (`id`, `cetegory_name`) VALUES
(2, 'khaddo'),
(3, 'vushimal'),
(4, 'cosmetics'),
(5, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `image_url` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cetegory` varchar(50) NOT NULL,
  `sub_cetegory` varchar(50) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `image_url`, `description`, `cetegory`, `sub_cetegory`, `price`) VALUES
(15, 'pran', '1733669877.jpg', 'ajkldfh', '2', '1', 100),
(16, 'pran', '1733669934.jpg', 'ajkldfh', '2', '1', 42),
(17, 'pran', '1733670182.jpg', 'ajkldfh', '2', '1', 52),
(18, 'pran', '1733670248.jpg', 'ajkldfh', '2', '1', 30),
(19, 'pran', '1775225970.jpeg', 'aj pasa khelbo re sham', '2', '1', NULL),
(20, 'gdgdfggd', '1775225991.jpg', 'dfgdgcgdg', '2', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cetegory`
--

CREATE TABLE `sub_cetegory` (
  `id` int(10) NOT NULL,
  `cetegory_id` int(10) NOT NULL,
  `sub_cetegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_cetegory`
--

INSERT INTO `sub_cetegory` (`id`, `cetegory_id`, `sub_cetegory_name`) VALUES
(1, 2, 'drink'),
(2, 2, 'chanachur'),
(3, 3, 'chips');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'boss', 'boss@gmail.com', '12345678', 'admin'),
(2, 'wheel', 'wheel@gmail.com', '12345678', 'user'),
(4, 'BIPUL KUMAR SINGHA', 'sinhasreyan744@gmail.com', '12345678', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetegory`
--
ALTER TABLE `cetegory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cetegory`
--
ALTER TABLE `sub_cetegory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cetegory`
--
ALTER TABLE `cetegory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_cetegory`
--
ALTER TABLE `sub_cetegory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

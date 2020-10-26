-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2020 at 09:44 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `order_items` tinyint NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_name`, `order_items`, `created_date`) VALUES
(1, 2, 'tt@tt.com', 1, '2020-10-01 20:21:42'),
(2, 1, 'tt@tt.com', 2, '2020-10-25 20:51:36'),
(3, 1, 'tt@tt.com', 3, '2020-10-25 20:51:37'),
(4, 1, 'tt@tt.com', 2, '2020-10-25 20:51:59'),
(5, 1, 'tt@tt.com', 3, '2020-10-25 20:52:00'),
(6, 3, 'tt@tt.com', 2, '2020-10-25 20:52:32'),
(7, 3, 'tt@tt.com', 3, '2020-10-25 20:52:34'),
(8, 3, 'tt@tt.com', 2, '2020-10-25 20:52:55'),
(9, 3, 'tt@tt.com', 3, '2020-10-25 20:52:57'),
(10, 3, 'tt@tt.com', 2, '2020-10-25 20:54:06'),
(11, 3, 'tt@tt.com', 3, '2020-10-25 20:54:08'),
(12, 3, 'tt@tt.com', 2, '2020-10-25 20:54:19'),
(13, 3, 'tt@tt.com', 3, '2020-10-25 20:54:21'),
(14, 3, 'tt@tt.com', 2, '2020-10-25 20:57:37'),
(15, 3, 'tt@tt.com', 3, '2020-10-25 20:57:39'),
(16, 3, 'tt@tt.com', 2, '2020-10-25 21:06:06'),
(17, 3, 'tt@tt.com', 3, '2020-10-25 21:07:21'),
(18, 3, 'tt@tt.com', 2, '2020-10-25 21:10:27'),
(19, 3, 'tt@tt.com', 3, '2020-10-25 21:16:03'),
(20, 3, 'tt@tt.com', 3, '2020-10-25 21:18:04'),
(21, 3, 'tt@tt.com', 4, '2020-10-25 21:19:20'),
(22, 3, 'tt@tt.com', 4, '2020-10-25 21:24:23'),
(23, 3, 'tt@tt.com', 6, '2020-10-25 21:27:06'),
(24, 3, 'tt@tt.com', 3, '2020-10-25 21:31:08'),
(25, 3, 'tt@tt.com', 3, '2020-10-26 09:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `login_datetime`) VALUES
(1, 'pratikaro@gmail.com', '4ad12b670ef80754fa193ae6fd786978f47e301c', '2020-10-24 16:49:49'),
(2, 'test@test.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-10-24 16:49:49'),
(3, 'test@tt.com', '0926c950fe247c3b465eb13e258ee468d239a065', '2020-10-24 16:49:49'),
(4, 'pratik@pratik.com', '0926c950fe247c3b465eb13e258ee468d239a065', '2020-10-24 16:49:49'),
(5, 'tt@tt.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-10-24 16:49:49'),
(6, 't@t.com', '0926c950fe247c3b465eb13e258ee468d239a065', '2020-10-24 16:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` tinyint NOT NULL,
  `apt` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` int NOT NULL,
  `note` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_name`, `first_name`, `last_name`, `phone_number`, `address`, `country`, `apt`, `city`, `district`, `pincode`, `note`, `created_date`) VALUES
(1, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:46:39'),
(2, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:48:43'),
(3, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:49:32'),
(4, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:50:17'),
(5, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:51:00'),
(6, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:51:34'),
(7, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:51:58'),
(8, 'tt@tt.com', 'Pratik', 'A', '123456789', 'TestAddress*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Test', '2020-10-25 20:52:31'),
(26, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:18:01'),
(27, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:18:34'),
(28, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 2, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:19:19'),
(29, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*Test', 4, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:24:21'),
(30, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*Test', 4, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:26:20'),
(31, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:27:04'),
(32, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:27:55'),
(33, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Sion', 400022, 'Special Notes', '2020-10-25 21:31:06'),
(34, 'tt@tt.com', 'Pratik', 'A', '123456789', 'Address*', 10, 'Niwas', 'Mumbai', 'Test', 400022, 'Special Notes', '2020-10-26 09:21:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 06:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homebasket`
--

CREATE Database `homebasket`;

-- --------------------------------------------------------

--
-- Table structure for table `category`

--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`, `created_at`) VALUES
(1, 'Fruits', 0, '2019-02-14 18:04:06'),
(2, 'Vegetbales', 0, '2019-02-14 18:04:06'),
(3, 'sdd', 0, '2019-02-21 17:12:51'),
(4, '', 0, '2019-02-21 17:13:02'),
(5, '', 0, '2019-02-21 17:13:07'),
(6, '', 0, '2019-02-21 17:13:30'),
(21, 'saop', 1, '2019-03-14 16:17:10'),
(22, 'brush', 1, '2019-03-14 19:29:28'),
(23, 'clothes', 1, '2019-03-14 19:29:58'),
(24, 'saop', 1, '2019-03-19 23:42:05'),
(25, '', 0, '2019-03-20 15:52:07'),
(26, 'sweets', 1, '2019-03-21 18:00:19'),
(27, 'jeans', 1, '2019-04-02 20:49:22'),
(28, '', 1, '2019-04-08 14:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` int(20) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_name`, `category_id`, `quantity`, `price`, `status`, `created_at`) VALUES
(17, 'mangoodsh', 21, 10, 0, 1, '2019-03-20 18:50:13'),
(18, 'ssdaas', 21, 10, 0, 0, '2019-03-20 19:15:05'),
(19, 'nirma', 24, 100, 0, 1, '2019-03-20 19:17:19'),
(20, 'pepsodent', 22, 112, 0, 1, '2019-03-21 17:26:22'),
(21, 'dress', 23, 29, 0, 1, '2019-03-21 17:26:48'),
(22, 'lddu', 26, 1000, 0, 1, '2019-03-21 18:00:50'),
(23, 'high based', 27, 100, 0, 1, '2019-04-03 15:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(2, 'pp', 'k', 'puneetsalhotrra4@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2019-02-14 18:01:40'),
(5, 'qwert', 'we', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2019-02-21 18:50:46'),
(6, 'admin', 'admin', 'admin@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2019-04-08 14:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

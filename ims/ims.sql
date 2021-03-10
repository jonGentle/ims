-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2020 at 12:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Tools', '2019-06-01 00:35:07', '2019-05-30 21:34:33'),
(2, 'Electronics', '2014-06-01 00:35:07', '2014-05-30 21:34:33'),
(3, 'PPE', '2014-06-01 00:35:07', '2014-05-30 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created`, `modified`) VALUES
(1, 'A', '2014-06-01 00:35:07', '2014-05-30 21:34:33'),
(2, 'B', '2014-06-01 00:35:07', '2014-05-30 21:34:33'),
(3, 'C', '2014-06-01 00:35:07', '2014-05-30 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `category_id`, `created`, `modified`) VALUES
(2, 'Masks ', 'Disposable Face Mask 50 pack ', 80, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(4, 'Rubber Mallet ', '16-Ounce Rubber Mallet', 7, 1, '2019-06-01 01:12:26', '2019-06-01 01:12:26'),
(5, 'Keyboard ', 'Wired Keyboard ', 20, 2, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(6, 'Gloves ', 'Non-Powdered 100 pack ', 35, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(7, 'Monitor ', '24 inch 1080p', 10, 2, '2019-06-01 01:12:26', '2019-05-31 10:12:21'),
(8, 'Wrench Set', '15pcs set', 3, 2, '2019-06-06 17:11:04', '2019-06-06 02:10:54'),
(9, 'Mouse ', 'Wired Mouse ', 15, 2, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(11, 'Disinfectant Wipes ', 'Wipes 80 Count', 60, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(12, 'Fabric Bandages ', 'Box of 50 bandages', 22, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(13, 'Disinfectant Cleaner ', '1 gallon ', 22, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11'),
(14, 'Safety Goggles ', '10 pack ', 150, 3, '2019-06-06 17:12:21', '2019-06-06 02:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `department_id` int(11) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `department_id`, `access_level`, `status`, `created`, `modified`) VALUES
(1, 'Jane', 'Doe', 'janed@example.com', '(000) 000-0000', 'The House,Jerusalem', '$2y$10$y2/Q7kW4cmJkGZR7L0/k1.0Lqm7WqodiD6Mt0M3iy.4A7RoWD.R0S', 1, 'Admin', 1, '0000-00-00 00:00:00', '2020-12-04 11:14:53'),
(4, 'John ', 'Doe', 'jd@example.com', '(111) 111-1111', '76 A Salems Lot,  Arkham, Massachusetts', '$2y$10$MyDfMqc07tas/Uz3CNYt.OxrotgtTp6/E2YcTxtpYDMNkntVNUeaC', 3, 'User', 1, '2014-10-29 17:31:09', '2020-12-04 11:23:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

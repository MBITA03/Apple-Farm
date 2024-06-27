-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crswrkv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `apple_varieties`
--

CREATE TABLE `apple_varieties` (
  `id` int(11) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apple_varieties`
--

INSERT INTO `apple_varieties` (`id`, `variety`, `description`, `price`, `image_path`, `user_id`) VALUES
(16, 'White Apple', 'Very available', '789.00', 'uploads/red-delicious-apples-48213-1.jpg', NULL),
(21, 'Red and green Apples', 'Very ready', '145.00', 'uploads/Red and green.jpg', 0),
(24, 'Rose apples', 'Unique and sweet', '150.00', 'uploads/rose apples.jpg', 0),
(25, 'Black apples', 'Rare but available', '25.00', 'uploads/black apples.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify_token` varchar(100) DEFAULT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `verify_token`, `verify_status`, `created_at`, `usertype`) VALUES
(13, 'Isaac Chama', '0972844242', 'thejuvenile3@gmail.com', '$2y$10$Cbgpn7MTVlwN3HZnyhXc1ONkX56P5kqr8E7Vb43TGSeCUzIk5tOQC', '4ef8f92492c2d1fa8553b046bf42d743', 1, '2023-11-19 00:44:44', ''),
(15, 'MBITA CHIPETA', '0964920269', 'mbitachipeta3@gmail.com', '$2y$10$FBI2QaNyMNy71H2ft2zP5u3GWmtxItPHZrW3bTX7w66rUNqZ1OClW', '99472c8a8a94e1ffed2150d473a69dad', 1, '2023-11-24 20:56:39', 'admin'),
(16, 'Chipeta Mbita', '0779374574', 'mckay3051@gmail.com', '$2y$10$yj/AxZlvSMqqn5Ve5NB6LuqPTgwrKbX3CIm31KC43qxZLkvtUfgma', '1d2cbc9c6edf9840b7f7d068d8c38585', 1, '2023-11-26 14:14:12', 'admin'),
(17, 'Miyoba Miyoba', '0964159399', 'miyobae@gmail.com', '$2y$10$1GtqMcXNpa65U2.nYSZ.WOaX8rBEKvCp0LtTo1MYU1FOG.EJQ5hw2', '10fa6e3c5828d19314316c173c54ba31', 0, '2024-06-07 19:43:47', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apple_varieties`
--
ALTER TABLE `apple_varieties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apple_varieties`
--
ALTER TABLE `apple_varieties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `apple_varieties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

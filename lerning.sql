-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 10:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lerning`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_creater` varchar(255) DEFAULT NULL,
  `com_comments` text DEFAULT NULL,
  `com_date` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_creater`, `com_comments`, `com_date`) VALUES
(1, 'satish', 'this task assign only satish', '2023-12-01'),
(2, 'hello', NULL, '1 second ago'),
(3, 'Test', 'hello', '1 second ago'),
(4, 'Test', 'ghtgjh', '1 second ago'),
(5, 'Test', 'dwdw', '1 second ago'),
(6, 'Test', 'dwdw', '1 second ago'),
(7, 'Test', 'fddfdffd', '1 second ago'),
(8, 'Test', 'fddfdffdfddddddd dddddddddddddddd fffffffffff dfdfdf dfdfd', '1 second ago');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '123456',
  `actual_password` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL DEFAULT 'a.png',
  `type` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 =admin,\r\n 1=manager,\r\n 2=user\r\n',
  `user_status` enum('0','-1') NOT NULL DEFAULT '0',
  `remember_token` text DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `actual_password`, `user_profile`, `type`, `user_status`, `remember_token`, `create_date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$IivjFTgqFZrNYyal0kmwqOGC4BCzmt9bw7AQ1HZ0zmdpkh5qf0JES', '', 'a.png', '0', '0', NULL, '2023-12-05 05:51:41'),
(5, 'manager', 'manager@gmail.com', '$2y$10$q6a3acRChQbcflZ3EoOBAO/OHXO7HCOvG1.CD8k8CbXyzGz5yF1hK', '', 'a.png', '1', '0', NULL, '2023-12-05 05:52:20'),
(3, 'user', 'user@gmail.com', '$2y$10$/pUdrPjshdrE1QvsNNvbJ.oaqIewjm/lsiahWKGUE8E2nU0n4SHIS', '', 'a.png', '1', '-1', NULL, '2023-12-05 05:52:42'),
(6, NULL, NULL, '$2y$10$C5LRFxZr3wak3s0CzgvzCOIDtX03yJ8GjfD/kLxA4978LoO8XUTLe', 'hello', 'a.png', '0', '0', NULL, '2023-12-07 06:10:15'),
(23, '41414', 'pranavtank@gmail.com', '$2y$10$Bq/huOOVxCaaTv5lHyLIHuNdH2V3VRSsn2eE03KZ6BZUbl7GOMpq2', '123', '1701946833childcare_logo.png', '1', '0', NULL, '2023-12-07 11:00:33'),
(22, 'pranav tank', 'pranavtank@gmail.com', '$2y$10$tIyRSJNh3KKgrbMPQ8PLeOlqhrutFMaoYWSxQfEmJbUq6Rya9lKnC', '2020', '1701946808childcare_logo.png', '1', '-1', NULL, '2023-12-07 11:00:08'),
(21, 'pranav tank', 'pranavtank@gmail.com', '$2y$10$nj71lO3Uv5iJsmWt5jx5Qeq9dWcVJf3T3EW7L5Rdu7ySForAScpYa', '123', '1701946695childcare_logo.png', '1', '0', NULL, '2023-12-07 10:58:15'),
(20, 'pranav tank', 'pranavtank@gmail.com', '$2y$10$UIoGff2XbZsHG9SQNGwrA.VBMMuKeoSt8vJLR27oM2yfhefT.ALFq', '1010', '1701946644childcare_logo.png', '1', '-1', NULL, '2023-12-07 10:57:24'),
(19, 'helloe', 'hello@gmoal.com', '$2y$10$fyYpuYKi25XMevnviRbgW.ZJx186XB41R1cvFFZ00Agnwe4sQtmXm', '1020', '1701946618childcare_logo.png', '1', '0', NULL, '2023-12-07 10:56:58'),
(18, 'helloe', 'hello@gmail.com', '$2y$10$w5Ni4wuqLp2mBbKe0KwPv.dbDr.YS80cn/gOc25jUCVZyIM4vFjsu', '1010', '1701944691childcare_logo.png', '0', '0', NULL, '2023-12-07 10:24:51'),
(17, 'asasa', 'mskldns@gmail.com', '$2y$10$2YVUoU9fYVuPgnS29GPmjeLHwKLa2TznBr7SDddDdgMSp5N5ItMLW', '123', '1701943943childcare_logo.png', '0', '0', NULL, '2023-12-07 10:12:23'),
(24, 'asasa', 'mskldns@gmail.com', '$2y$10$2YVUoU9fYVuPgnS29GPmjeLHwKLa2TznBr7SDddDdgMSp5N5ItMLW', '123', '1701943943childcare_logo.png', '0', '0', NULL, '2023-12-07 10:12:23'),
(25, 'pranav tank', 'pranavtank@gmail.com', '$2y$10$CCtsWlHgEy7zNwxkYMsGVOUvAlHaLMNhoawUydj8REQcH.1zPgZz6', '123', '1701948235result1.png', '2', '-1', NULL, '2023-12-07 11:23:55'),
(26, 'keval', 'keval@gmail.com', '$2y$10$C8.aJ23F6k48v5p7TRi7bea/kyB9Mj7b2iIKPHM27BKGyzhWQ3uBC', '1020', '1702019261childcare_logo.png', '1', '0', NULL, '2023-12-08 07:07:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

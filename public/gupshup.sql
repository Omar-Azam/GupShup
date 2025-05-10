-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 05:36 PM
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
-- Database: `gupshup`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'general', '2025-05-08 16:00:23'),
(2, 'coding', '2025-05-08 16:00:23'),
(3, 'mobile', '2025-05-08 16:00:23'),
(4, 'laptop', '2025-05-08 16:00:23'),
(5, 'tech', '2025-05-08 16:00:23'),
(6, 'food', '2025-05-08 16:00:23'),
(7, 'gaming', '2025-05-08 16:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`, `category_id`, `created_at`) VALUES
(2, 'Best phone under 30000', 'i need a phone that is overall best in this price segment\r\nmy friend told me that the best in this range is itel s25\r\nwhat do you guys think is the best in this range??', 1, 3, '2025-05-08 18:31:38'),
(3, 'is php a good programming language', 'i want to learn backend my friend suggest me to learn php\r\nhe says its begineer friendly!', 1, 2, '2025-05-08 19:14:52'),
(4, 'are burgers healthy', 'i used to eat burgers all the time but recently my stomach hurts so i stopped eating burgers anymore but i crave them alot', 1, 6, '2025-05-08 19:15:54'),
(5, 'Best phone under 20000', 'i heard about realme note 60x and tecno spark go 1 are best options \r\nwhat you guys suggest!', 1, 3, '2025-05-09 18:46:33'),
(6, 'The Mobile Revolution: How Smartphones Have Fundamentally Reshaped Society and Culture', 'Explores the broad societal impact of mobile technology, including communication, social interactions, commerce, and entertainment.', 1, 3, '2025-05-09 19:24:48'),
(7, 'Beyond Calls and Texts: Unveiling the Multifaceted Utility of Modern Mobile Devices', 'Focuses on the diverse functionalities of smartphones beyond basic communication, such as productivity, navigation, photography, and gaming.', 1, 3, '2025-05-09 19:25:10'),
(8, 'The Great OS Debate: Android vs. iOS - A Comparative Analysis of Strengths, Weaknesses, and User Ecosystems', 'Examines the two dominant mobile operating systems, comparing their features, user experience, app availability, and the loyalty of their user bases.', 1, 3, '2025-05-09 19:25:38'),
(9, 'Mobile Photography Evolution: From Novelty to Professional Tool - Tracking the Advancements and Impact', 'Delves into the history and progress of mobile phone cameras, their increasing capabilities, and their influence on photography as a whole.', 1, 3, '2025-05-09 19:26:01'),
(13, 'is javascript complex like chemistry?', 'i heard that javascript is very complex and it has so many exceptions that does not make any sense is it true??', 3, 2, '2025-05-10 12:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `replies` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `replies`, `question_id`, `user_id`, `created_at`) VALUES
(1, 'nahh they are unhealthy af what do u expect from a junk food they all trash ', 4, 1, '2025-05-09 16:49:48'),
(2, 'they are unhealthy!', 4, 1, '2025-05-09 16:55:31'),
(3, 'unhealhty hai bhai', 4, 1, '2025-05-09 16:55:40'),
(4, 'ghar ka khana khao \r\n', 4, 1, '2025-05-09 16:55:47'),
(5, 'ghar ka khao bhai', 4, 1, '2025-05-09 16:55:56'),
(6, 'sehat boht zaruri hai bhai', 4, 1, '2025-05-09 16:56:11'),
(7, 'itel s25 best hai', 2, 1, '2025-05-09 17:17:41'),
(8, 'itel s25 lelo boht acha phone hai', 2, 2, '2025-05-09 17:19:44'),
(9, 'mene bhi to yahi kaha', 2, 1, '2025-05-09 17:20:15'),
(10, 'tum sare pagal ho', 2, 3, '2025-05-09 23:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `created_at`) VALUES
(1, 'omar', 'omar@gmail.com', '$2y$10$XglQar128dLSSSCLZkcXFuUqEVaWFquc88rgaIJuztj2bUa04hJYK', '2025-05-06 19:42:49'),
(2, 'Faisal Ismael', 'faisal@gmail.com', '$2y$10$jGSg4tYH/DZeDvBCSTVcyO4YAKQhqFueEohH04GwNig7ekLz4FgTG', '2025-05-09 17:19:29'),
(3, 'Omar Azam', 'itxumarhere@gmail.com', '$2y$10$4KQSGqSeKtuLBOO.qV16d.USMeb6iYYS1ZTNospO6IIoufk74G8b2', '2025-05-09 23:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 10:33 AM
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
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(5) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `form_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer`, `question_id`, `user_id`, `form_id`) VALUES
(21, '\"ganesh\"', 15, 6, 37),
(22, '\"male\"', 16, 6, 37),
(23, '[\"python\",\"php\"]', 17, 6, 37),
(24, '\"msc\"', 18, 6, 37);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` int(5) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `title`, `description`) VALUES
(36, 'cwkmlkml', 'hbjbhj'),
(37, 'Employee data', 'get personal data form employee'),
(38, 'Employee data', 'get personal data form employee'),
(39, 'Employee data', 'get personal data form employee');

-- --------------------------------------------------------

--
-- Table structure for table `input_types`
--

CREATE TABLE `input_types` (
  `input_type_id` int(5) NOT NULL,
  `input_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `input_types`
--

INSERT INTO `input_types` (`input_type_id`, `input_type`) VALUES
(1, 'Textbox'),
(2, 'Radio Button'),
(3, 'CheckBox'),
(4, 'Dropdown');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(5) NOT NULL,
  `question` text NOT NULL,
  `form_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `form_id`) VALUES
(13, '{\"1\":{\"type\":\"Radio Button\",\"question\":\"hjhjhj\",\"options\":{\"2\":\"bhjhhj\",\"3\":\"jhbhbjhb\"},\"required\":\"1\"}}', 36),
(14, '{\"4\":{\"type\":\"Radio Button\",\"question\":\"hbjjhjb\",\"options\":{\"2\":\"option 1\",\"5\":\"hbjhbhbj\",\"6\":\"njkjkjkn\"},\"required\":\"1\"}}', 36),
(15, '{\"1\":{\"type\":\"Textbox\",\"question\":\"what is your name\",\"options\":[],\"required\":\"1\"}}', 37),
(16, '{\"2\":{\"type\":\"Radio Button\",\"question\":\"gender\",\"options\":{\"4\":\"male\",\"5\":\"female\"},\"required\":\"0\"}}', 37),
(17, '{\"3\":{\"type\":\"CheckBox\",\"question\":\"skills\",\"options\":{\"4\":\"option 1\",\"6\":\"python\",\"7\":\"php\",\"8\":\"java\"},\"required\":\"1\"}}', 37),
(18, '{\"9\":{\"type\":\"Dropdown\",\"question\":\"Hight Qualifications\",\"options\":{\"4\":\"option 1\",\"10\":\"bsc\",\"11\":\"msc\",\"12\":\"b-tech\",\"13\":\"m-tech\"},\"required\":\"1\"}}', 37),
(19, '{\"1\":{\"type\":\"Dropdown\",\"question\":\"Qualifications\",\"options\":{\"2\":\"msc\"},\"required\":\"1\"}}', 38),
(20, '{\"3\":{\"type\":\"CheckBox\",\"question\":\"Skills\",\"options\":{\"2\":\"option 1\",\"4\":\"C++\"},\"required\":\"0\"}}', 38),
(21, '{\"1\":{\"type\":\"CheckBox\",\"question\":\"Skills\",\"options\":{\"2\":\"sjwqkjknj\"},\"required\":\"0\"}}', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `mobile`) VALUES
(6, '8999779536');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `input_types`
--
ALTER TABLE `input_types`
  ADD PRIMARY KEY (`input_type_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `input_types`
--
ALTER TABLE `input_types`
  MODIFY `input_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

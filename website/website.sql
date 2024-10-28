-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 03:25 PM
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
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'vikaskumar', 'vikas@20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `time_period` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `uploaded_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `time_period`, `cost`, `uploaded_file`) VALUES
(1, 'MDCE+', '3.5 YEARS', 45000.00, '7-programming-languages-every-beginner-should-explore.webp'),
(2, 'MDCE+', '3 YEARS', 40000.00, '7-programming-languages-every-beginner-should-explore.webp'),
(3, 'ADCE', '2.5 YEARS', 30000.00, 'ADCA-Full-Form-FULL-01-01-01.png'),
(4, 'WEB-D', '1 YEAR', 10000.00, 'email-thin-line-icon-letter-filled-outline-vector-logo-illustra-illustration-open-envelope-linear-colorful-pictogram-isolated-96027083.webp'),
(5, 'PHOTOSHOP', '3 MONTHS', 5000.00, 'What-Is-Filters-Photoshop-Photshop-Skills-blog.webp'),
(6, 'CORAL-DROW', '3 MONTHS', 5000.00, 'CorelDRAW-Graphics-Suite-for-Mac.webp'),
(7, 'MDCE+', '3 YEARS', 50000.00, 'logo.png'),
(8, 'ADCE', '3 YEARS', 50000.00, 'ADCA-Full-Form-FULL-01-01-01.png'),
(9, 'PHOTOSHOP', '3 MONTHS', 5000.00, 'What-Is-Filters-Photoshop-Photshop-Skills-blog.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `question1`, `question2`) VALUES
(1, 'vikas@3', 'vikaskumaragust3@gmail.com', '$2y$10$T2qg5OLtON1Bad6dTlO.VuCcmsilmLojnbft5TWwtEmzNh0vxFzZi', 'zoro', 'i don\'t have favortie movie'),
(2, 'vikaskumar', 'spiderninja890@gmail.com', '$2y$10$s0SyLGh/s7a7t8XJknrwiuFhKNtzStyNVoLzVH9FAy/l0qn1J1Hli', 'zoro', 'i don\'t have favortie movie'),
(3, 'vikaskumaragust', 'vikaskumaragust3@gmail.com', '$2y$10$s0SyLGh/s7a7t8XJknrwiuFhKNtzStyNVoLzVH9FAy/l0qn1J1Hli', 'sanji', 'i don\'t have favortie movie'),
(5, 'kakashi', 'vikaskumaragust3@gmail.com', 'hello@3', 'kakashi', 'i don\'t have favortie movie'),
(6, 'vikas420', 'spiderninja890@gmail.com', 'hello', 'zoro', 'i don\'t have favortie movie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

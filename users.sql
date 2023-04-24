-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one_task_ahead`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(3, 'nat', 'gracilla', 'natswell', 'test@gmail.com', '$2y$10$v4qfrk56eshTs3YT3ahHs.HG3m98vRyW8hMzNXuRsKYgMq55eNkuO'),
(4, 'ian', 'zapata', 'zptlks', 'ian@gmail.com', '$2y$10$TJPxyea7PLfofG7He.tv4OYTE7n3g0/ABbodMwvgyWnvvmVHvskpu'),
(5, 'vic', 'hiwatig', 'vico', 'vic@gmail.com', '$2y$10$PwykPXLQgeBrjjKIIhsD7.Oc2cnIDJM4wkHcH/DnWmi70APWT49Ee'),
(6, 'nat', 'zapata', 'wtf', 'test@gmail.com', '$2y$10$gTImnj3kL.gRqL2zk6tsU.QA/Pe5rt13Ev49m3aEH4jU37WTLTkmO'),
(7, 'shaun', 'robles', 'shu', 'shu@gmail.com', '$2y$10$kPt7z59cbRg8Lxg894IQM.scuWPp4Uif1J5.8JNi8wF6EiSAjiXje'),
(8, 'nat', 'gracilla', 'nats2', 'Nathaniel.gracilla@gmail.com', '$2y$10$dnpnKy5pjKNQsTzqsClfW.qdRJhn6ntPoi30BvmPyU794rKmsHFbi'),
(16, 'nat', 'gracilla', 'natswell2', 'test1@gmail.com', '$2y$10$zOpPYtZ0/C8A2hfqf2BcF.FK7A/a5GCl5ZgYCb.xRVfF.xcyBU46C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

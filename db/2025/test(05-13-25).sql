-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 19, 2025 at 09:28 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requested_by` varchar(255) DEFAULT NULL,
  `nameOfCorp` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `secNum` varchar(255) DEFAULT NULL,
  `elaNum` varchar(255) DEFAULT NULL,
  `taxYear` varchar(255) DEFAULT NULL,
  `fanNum` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `docsRequested` varchar(255) DEFAULT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `nameOfCorp`, `tin`, `secNum`, `elaNum`, `taxYear`, `fanNum`, `amount`, `docsRequested`, `created_date`, `ip_address`) VALUES
(1, NULL, 'asd', 'asd', 'asd', 'asd', 'ads', '', '', 'ads', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(2, NULL, 'asd', 'asd', 'asd', 'asd', 'asd', '', '', 'asd', '2025-02-13 16:00:00.000000', '172.16.15.180'),
(3, NULL, 'asd', 'asd', 'ads', '', '', 'ads', 'das', 'dsa', '2025-02-13 16:00:00.000000', '172.16.15.180'),
(4, NULL, 'asd', 'asd', 'ads', '', '', 'ads', 'das', 'dsa', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(5, NULL, 'asd', 'asd', 'ads', '', '', 'ads', 'das', 'dsa', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(6, NULL, 'asd', 'asd', 'ads', '', '', 'ads', 'das', 'dsa', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(7, NULL, 'asd', 'ads', 'ads', '', '', 'ads', 'ads', 'ads', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(8, NULL, 'asd', 'ads', 'ads', '', '', 'ads', 'ads', 'ads', '0000-00-00 00:00:00.000000', '172.16.15.180'),
(9, NULL, 'asd', 'ads', 'ads', '', '', 'ads', 'ads', 'ads', '2025-02-13 17:52:17.000000', '172.16.15.180'),
(10, NULL, 'asd', 'ads', 'ads', '', '', 'sad', 'dsa', 'dsa', '2025-02-13 18:03:40.000000', '172.16.15.180'),
(11, NULL, 'asd', 'ads', 'ads', 'dsa', 'dsa', '', '', 'dsa', '2025-02-13 18:05:03.000000', '172.16.15.180'),
(12, NULL, 'ads', 'dsa', 'ads', '', '', 'dsa', 'dsa', 'dsa', '2025-02-13 18:06:02.000000', '172.16.15.180'),
(13, NULL, 'asd', 'asd', 'ads', 'ads', 'ads', '', '', 'ads', '2025-02-13 18:08:19.000000', '172.16.15.180'),
(14, NULL, 'asd', 'ads', 'ads', 'asd', 'ads', '', '', 'ads', '2025-02-13 18:08:53.000000', '172.16.15.180'),
(15, NULL, 'asd', 'ads', 'ads', 'ads', 'ads', '', '', 'ads', '2025-02-13 18:11:09.000000', '172.16.15.180'),
(16, NULL, 'ads', 'ads', 'ads', 'ads', 'ads', NULL, NULL, 'dsa', '2025-02-13 18:20:21.000000', '172.16.15.180'),
(17, NULL, 'asd', 'ads', 'asd', 'sad', 'ads', NULL, NULL, 'ads', '2025-02-13 20:18:42.000000', '172.16.15.180'),
(18, NULL, 'asd', 'ads', 'ads', 'ads', 'ads', NULL, NULL, 'ads', '2025-02-13 20:20:44.000000', '172.16.15.180'),
(19, NULL, 'asd', 'asd', 'ads', 'ads', 'adsd', '', '', 'ads', '2025-02-13 20:21:28.000000', '172.16.15.180'),
(20, NULL, 'asd', 'ads', 'ads', 'ads', 'ads', NULL, NULL, 'ads', '2025-02-13 20:22:55.000000', '172.16.15.180'),
(21, NULL, 'asd', 'asd', 'das', 'ads', 'ads', '', '', 'ads', '2025-02-13 20:24:53.000000', '172.16.15.180'),
(22, NULL, 'asd', 'asd', 'asd', 'ads', 'ads', '', '', 'asd', '2025-02-17 01:21:22.000000', '172.16.15.180'),
(23, NULL, 'asd', 'adsads', 'asd', '', '', 'ads', 'ads', 'asd', '2025-02-17 01:21:31.000000', '172.16.15.180'),
(24, NULL, 'asd', 'asd', 'asd', 'asd', 'ads', '', '', 'ads', '2025-02-17 01:36:19.000000', '172.16.15.180'),
(25, NULL, 'ads', 'ads', 'ads', '', '', 'ads', 'ads', 'ads', '2025-02-17 01:36:28.000000', '172.16.15.180');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY ,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_ban` tinyint(1) DEFAULT 0 COMMENT 'unban=0, ban=1',
  `role` varchar(100) DEFAULT NULL COMMENT 'admin,pointperson,approver',
  `created_date` date DEFAULT current_timestamp(),
  `office` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_ban`, `role`, `created_date`, `office`) VALUES
(17, 'Juana', 'Dela Cruz', 'juandelacruz@gmail.com', '$2y$10$D58cNQWKipksAgT3VYlhMu2QNnSXXGYpwHOqVb1fY/MwCGYLqcQ1i', 0, 'Point Person', '2025-02-18', 'National Office'),
(18, 'Liam', 'Miller', 'liammiller@gmail.com', '$2y$10$J5WJfVOSFL1NeIPpNMY93uDmKGzUDt9JoSePdtQwiXCqEmYDYcW5G', 0, 'Administrator', '2025-02-18', NULL),
(19, 'Louise', 'Beckham', 'louisebeckham@yahoo.com', '$2y$10$lxBUeELueVmvsy.XLPST1ulwHVYP38u9fFgXFyeTeZgKmiV7rIRy.', 0, 'Point Person', '2025-02-18', NULL),
(20, 'Steven', 'Holmes', 'stevenholmes@hotmail.com', '$2y$10$FTZVB8uZnWQqbjWTPSxyIOsTeRfK6Q0KO0lV7wjKhx5cnG/4vo1T.', 0, 'Approver', '2025-02-18', NULL),
(21, 'Mike', 'Bailey', 'mikebailey@gmail.com', '$2y$10$WIFX1M6wXZucJFXgZB7.u.5FVpNF6G6Fty47qfWoS6lfrgbZ0ocn6', 1, 'Administrator', '2025-02-18', NULL),
(22, 'Charlie', 'Monroe', 'charliemonroe@gmail.com', '$2y$10$yZWQI6E4K5xbM0IlvfDtO.lX3Mve5HkqMEsp9TAr3i0kkbcF9JZ9O', 1, 'Point Person', '2025-02-18', NULL),
(23, 'Fiona', 'Watson', 'fionawatson@yahoo.com', '$2y$10$pp1RBMTciEE8qB2KlBCcwuT1h.GaAnIpDMSpnAOmURGhWjoHIdV5S', 1, 'Administrator', '2025-02-18', NULL),
(24, 'Sample', 'Name', 'asdasd@asdasd.com', '$2y$10$MXvNiSj2H/2dO76KNcGVGeNdGGhaGPxqIOnrqYmoarXuZUFu6jbzG', 0, 'Point Person', '2025-02-19', 'National Office'),
(25, 'makak', 'manoys', 'makak@gmail.com', '$2y$10$n7pv98bMxLRvub2zOHb6ceoUN8bUkaD7GXyRx3cmQge/CamOhd2Nu', 1, 'Administrator', '2025-02-19', 'National Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
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
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 14, 2025 at 02:27 AM
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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `office` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(100) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `name`, `transaction_type`, `office`, `date_created`, `role`, `ip_address`) VALUES
(5, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:06:55', 'Administrator', '172.16.15.180'),
(6, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:33:51', 'Administrator', '172.16.15.180'),
(7, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:38:07', 'Administrator', '172.16.15.180'),
(8, 31, 'Admin Admin', 'CREATE', 'National Office', '2025-03-27 03:56:58', 'Administrator', '172.16.15.180'),
(9, 31, 'Admin Admin', 'CREATE', 'National Office', '2025-03-27 04:00:55', 'Administrator', '172.16.15.180'),
(10, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 04:38:09', 'Administrator', '172.16.15.180'),
(11, 35, 'Sins Johnyn', 'UDPATE', 'National Office', '2025-03-27 04:43:07', 'Point Person', '172.16.15.180'),
(12, 35, 'Sins Johnyn', 'UDPATE', 'National Office', '2025-03-27 04:47:35', 'Point Person', '172.16.15.180'),
(13, 32, 'Approver Approver', 'UDPATE', 'National Office', '2025-03-28 08:35:22', 'Approver', '172.16.15.180'),
(14, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:36:05', 'Administrator', '172.16.15.180'),
(15, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:37:08', 'Administrator', '172.16.15.180'),
(16, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:37:23', 'Administrator', '172.16.15.180'),
(17, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:15:51', 'Administrator', '172.16.15.180'),
(18, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:19:28', 'Administrator', '172.16.15.180'),
(19, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:20:16', 'Administrator', '172.16.15.180');

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
  `ip_address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `nameOfCorp`, `tin`, `secNum`, `elaNum`, `taxYear`, `fanNum`, `amount`, `docsRequested`, `created_date`, `ip_address`, `status`, `email`, `Remarks`) VALUES
(51, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-05-13 06:46:18.239993', '172.16.15.180', 'Rejected', NULL, ''),
(52, 'Juan', 'asd', 'ads', 'dsa', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-03-25 08:35:22.561052', '172.16.15.180', 'Rejected', NULL, 'sample remarks na mahaba like lorem ipsum then capaisin basta kung ano ano na mga pinipindot ko dito sa keuyboard na malupit na limit testing kaya ganon'),
(53, 'Array', 'asd', 'asd', 'ads', 'ads', 'asd', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:27.552686', '172.16.15.180', 'Approved', NULL, NULL),
(54, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:30.681782', '172.16.15.180', 'Approved', NULL, NULL),
(55, 'makak@gmail.com', 'ads', 'ads', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:34.132298', '172.16.15.180', 'Approved', NULL, NULL),
(56, 'admin@mail.com', 'Bureau of Internal Revneue', '433799685', 'asd', 'asd', 'asd', 'N/A', 'N/A', 'asd', '2025-03-25 08:35:37.577461', '172.16.15.180', 'Approved', NULL, NULL),
(57, 'Admin Admin', 'buera', 'asdasdzxczcx', 'adsczcxxasdzxc', 'N/A', 'N/A', 'zcxzcxzxasads', 'zxczcxczxadsasd', 'zcxzxvzvdnbxbnvc', '2025-03-25 08:35:41.270047', '172.16.15.180', 'Approved', 'admin@mail.com', NULL),
(58, 'Admin Admin', 'Bureau of Internal Revneue', '000-111-111', 'ads', 'asd', 'asd', 'N/A', 'N/A', 'SEC Document', '2025-03-25 08:35:44.565022', '172.16.15.180', 'Approved', 'admin@mail.com', NULL),
(59, 'Admin Admin', 'Commission on Audit', '111-222-333', '123456789', '123456', '2025', 'N/A', 'N/A', 'AFS', '2025-03-25 08:40:56.216109', '172.16.15.180', 'Rejected', 'admin@mail.com', 'sample remarks'),
(60, 'makak manoys', 'BIR National University', '123456789', '505050050505', 'adsaasd', 'asdsad', 'N/A', 'N/A', 'ads', '2025-05-12 18:43:05.000000', '172.16.15.180', 'For Approval', 'makak@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
(24, 'Sample', 'Name', 'asdasd@asdasd.com', '$2y$10$6m40ICdBQa9atLRokm4m9.suTsB4kwycnx0SmIHkS3Qei0ceMUTxq', 0, 'Point Person', '2025-02-19', 'National Office'),
(25, 'makak', 'manoys', 'makak@gmail.com', '$2y$10$n7pv98bMxLRvub2zOHb6ceoUN8bUkaD7GXyRx3cmQge/CamOhd2Nu', 0, 'Administrator', '2025-02-19', 'National Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

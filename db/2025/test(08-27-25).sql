-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 27, 2025 at 08:21 AM
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
(19, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:20:16', 'Administrator', '172.16.15.180'),
(20, 25, 'manoys makak', 'CREATE', 'National Office', '2025-05-28 08:48:42', 'Administrator', '172.16.15.180'),
(26, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 09:10:13', 'Administrator', '172.16.15.180'),
(27, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 09:10:34', 'Administrator', '172.16.15.180'),
(28, 24, 'Name Sample', 'UDPATE', 'National Office', '2025-05-28 09:14:26', 'Point Person', '172.16.15.180'),
(32, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 01:42:41', 'Administrator', '172.16.15.180'),
(33, 24, 'Name Sample', 'UDPATE', 'National Office', '2025-05-28 01:43:57', 'Point Person', '172.16.15.180'),
(39, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 01:54:13', 'Point Person', '172.16.15.180'),
(40, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 01:55:02', 'Point Person', '172.16.15.180'),
(41, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 01:55:10', 'Point Person', '172.16.15.180'),
(42, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 03:47:32', 'Point Person', '172.16.15.180'),
(43, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-05-28 03:48:16', 'Approver', '172.16.15.180'),
(44, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 08:58:25', 'Point Person', '172.16.15.180'),
(45, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-05-29 11:08:50', 'Approver', '172.16.15.180'),
(46, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 01:16:00', 'Point Person', '172.16.15.180'),
(47, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:04:01', 'Point Person', '172.16.15.180'),
(48, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:56:20', 'Point Person', '172.16.15.180'),
(49, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:57:13', 'Point Person', '172.16.3.232'),
(50, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:58:08', 'Point Person', '172.16.15.180'),
(51, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-30 10:57:59', 'Point Person', '172.16.15.180'),
(52, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-03 02:53:17', 'Point Person', '172.16.15.180'),
(53, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 01:48:02', 'Point Person', '172.16.15.180'),
(54, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:11:01', 'Point Person', '172.16.15.180'),
(55, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:12:59', 'Point Person', '172.16.15.180'),
(56, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:21:25', 'Point Person', '172.16.15.180'),
(57, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-04 02:46:44', 'Approver', '172.16.15.180'),
(58, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-04 02:58:58', 'Approver', '172.16.15.180'),
(59, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 04:12:39', 'Point Person', '172.16.15.180'),
(60, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-05 09:50:27', 'Point Person', '172.16.15.180'),
(61, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 08:51:17', 'Point Person', '172.16.15.180'),
(62, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 09:57:36', 'Point Person', '172.16.15.180'),
(63, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 11:15:29', 'Point Person', '172.16.15.180'),
(64, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 01:36:08', 'Point Person', '172.16.15.180'),
(65, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 01:36:34', 'Point Person', '172.16.15.180'),
(66, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 02:25:33', 'Point Person', '172.16.15.180'),
(67, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-09 02:51:12', 'Approver', '172.16.15.180'),
(68, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 03:01:47', 'Point Person', '172.16.15.180'),
(69, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-10 11:10:46', 'Point Person', '172.16.15.180'),
(70, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:18:56', 'Point Person', '172.16.15.180'),
(71, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:32:15', 'Point Person', '172.16.15.180'),
(72, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-11 09:50:01', 'Approver', '172.16.15.180'),
(73, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:54:39', 'Point Person', '172.16.15.180'),
(74, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 10:01:33', 'Point Person', '172.16.15.180'),
(75, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 08:49:24', 'Point Person', '172.16.15.180'),
(76, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 09:08:46', 'Point Person', '172.16.15.180'),
(77, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 09:52:29', 'Point Person', '172.16.15.180'),
(78, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 10:30:54', 'Point Person', '172.16.15.180'),
(79, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 01:24:13', 'Point Person', '172.16.15.180'),
(80, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 09:42:16', 'Point Person', '172.16.15.180'),
(81, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 09:51:54', 'Point Person', '172.16.15.180'),
(82, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 10:58:11', 'Point Person', '172.16.15.180'),
(83, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:40:02', 'Point Person', '172.16.15.180'),
(84, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-18 03:40:55', 'Approver', '172.16.15.180'),
(85, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:41:32', 'Point Person', '::1'),
(86, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:50:11', 'Point Person', '172.16.15.180'),
(87, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 10:17:24', 'Point Person', '172.16.15.180'),
(88, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 11:11:41', 'Point Person', '172.16.15.180'),
(89, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:22:48', 'Point Person', '172.16.15.180'),
(90, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:36:58', 'Point Person', '172.16.15.180'),
(91, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:50:02', 'Point Person', '172.16.15.180'),
(92, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 02:59:44', 'Point Person', '172.16.15.180'),
(93, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:19:13', 'Point Person', '172.16.15.180'),
(94, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:26:49', 'Point Person', '172.16.15.180'),
(95, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:36:39', 'Point Person', '172.16.15.180'),
(96, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 08:36:14', 'Point Person', '172.16.15.180'),
(97, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 09:48:52', 'Point Person', '172.16.15.180'),
(98, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 01:39:28', 'Point Person', '172.16.15.180'),
(99, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 01:55:17', 'Point Person', '172.16.15.180'),
(100, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:18:05', 'Point Person', '172.16.15.180'),
(101, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:28:08', 'Point Person', '172.16.15.180'),
(102, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:58:00', 'Point Person', '172.16.15.180'),
(103, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 03:39:28', 'Point Person', '172.16.15.180'),
(104, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 04:15:21', 'Point Person', '172.16.4.179'),
(105, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:24:53', 'Point Person', '172.16.15.180'),
(106, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:57:47', 'Point Person', '172.16.15.180'),
(107, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 09:58:23', 'Point Person', '172.16.15.180'),
(108, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-23 09:58:35', 'Administrator', '172.16.15.180'),
(109, 0, '1123 test', 'UDPATE', 'RDO 1', '2025-06-23 09:58:53', 'Administrator', '172.16.15.180'),
(110, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:59:18', 'Point Person', '172.16.15.180'),
(111, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:01:54', 'Point Person', '172.16.15.180'),
(112, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:02:06', 'Point Person', '172.16.15.180'),
(113, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:04:54', 'Point Person', '172.16.15.180'),
(114, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:05:02', 'Point Person', '172.16.15.180'),
(115, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:05:09', 'Point Person', '172.16.15.180'),
(116, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:07:30', 'Point Person', '172.16.15.180'),
(117, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:08:07', 'Point Person', '172.16.15.180'),
(118, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:08:14', 'Point Person', '172.16.15.180'),
(119, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:08:30', 'Point Person', '172.16.15.180'),
(120, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:08:40', 'Point Person', '172.16.15.180'),
(121, 0, 'Administrator 123', 'LOGIN', 'RDO 1', '2025-06-23 10:08:46', 'Administrator', '172.16.15.180'),
(122, 0, '123 Administrator', 'UDPATE', 'RDO 1', '2025-06-23 10:09:46', 'Administrator', '172.16.15.180'),
(123, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:09:58', 'Point Person', '172.16.15.180'),
(124, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:10:04', 'Point Person', '172.16.15.180'),
(125, 0, 'Administrator 123', 'LOGIN', 'RDO 1', '2025-06-23 10:10:07', 'Administrator', '172.16.15.180'),
(126, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 01:41:46', 'Point Person', '172.16.15.180'),
(127, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 02:08:06', 'Point Person', '172.16.15.180'),
(128, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:08:40', 'Point Person', '172.16.15.180'),
(129, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:09:38', 'Point Person', '172.16.15.180'),
(130, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:10:00', 'Point Person', '172.16.15.180'),
(131, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:10:15', 'Point Person', '172.16.15.180'),
(132, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 02:27:42', 'Point Person', '172.16.15.180'),
(133, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 09:17:13', 'Point Person', '172.16.15.180'),
(134, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-24 03:17:22', 'Point Person', '172.16.15.180'),
(135, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 09:17:28', 'Administrator', '172.16.15.180'),
(136, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 09:27:33', 'Administrator', '172.16.15.180'),
(137, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 10:02:45', 'Administrator', '172.16.15.180'),
(138, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 10:38:30', 'Point Person', '172.16.15.180'),
(139, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 01:51:31', 'Point Person', '172.16.15.180'),
(140, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 02:07:22', 'Point Person', '172.16.15.180'),
(141, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 03:09:43', 'Administrator', '172.16.15.180'),
(142, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 08:23:58', 'Point Person', '172.16.15.180'),
(143, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 09:11:57', 'Point Person', '172.16.15.180'),
(144, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 09:13:24', 'Point Person', '172.16.15.180'),
(145, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 09:13:30', 'Point Person', '172.16.15.180'),
(146, 0, 'Administrator 12345', 'LOGIN', 'Car', '2025-06-25 10:11:11', 'Administrator', '172.16.15.180'),
(147, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 10:31:04', 'Point Person', '172.16.15.180'),
(148, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 03:18:55', 'Point Person', '172.16.15.180'),
(149, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 03:29:04', 'Point Person', '172.16.15.180'),
(150, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 03:30:02', 'Point Person', '172.16.15.180'),
(151, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-25 03:36:58', 'Administrator', '172.16.15.180'),
(152, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 03:51:35', 'Point Person', '172.16.15.180'),
(153, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 10:29:59', 'Point Person', '172.16.15.180'),
(154, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 10:57:53', 'Point Person', '172.16.15.180'),
(155, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 01:19:03', 'Point Person', '172.16.15.180'),
(156, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 01:42:15', 'Point Person', '172.16.15.180'),
(157, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 02:10:00', 'Point Person', '172.16.15.180'),
(158, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 02:35:54', 'Point Person', '172.16.15.180'),
(159, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 03:16:57', 'Point Person', '172.16.15.180'),
(160, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 03:31:52', 'Point Person', '172.16.15.180'),
(161, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:43:40', 'Administrator', '172.16.15.180'),
(162, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:50:43', 'Administrator', '172.16.15.180'),
(163, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:58:38', 'Administrator', '172.16.15.180'),
(164, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 10:20:41', 'Administrator', '172.16.15.180'),
(165, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 10:45:25', 'Point Person', '172.16.15.180'),
(166, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 10:56:04', 'Point Person', '172.16.15.180'),
(167, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:29:55', 'Administrator', '172.16.15.180'),
(168, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:51:37', 'Administrator', '172.16.15.180'),
(169, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:53:02', 'Administrator', '172.16.15.180'),
(170, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 01:58:43', 'Point Person', '172.16.15.180'),
(171, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:16:46', 'Point Person', '172.16.15.180'),
(172, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 02:32:24', 'Point Person', '172.16.15.180'),
(173, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:34:44', 'Point Person', '172.16.15.180'),
(174, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:02', 'Point Person', '172.16.15.180'),
(175, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:07', 'Point Person', '172.16.15.180'),
(176, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:12', 'Point Person', '172.16.15.180'),
(177, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:18', 'Point Person', '172.16.15.180'),
(178, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:25', 'Point Person', '172.16.15.180'),
(179, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:29', 'Point Person', '172.16.15.180'),
(180, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:02', 'Point Person', '172.16.15.180'),
(181, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:11', 'Point Person', '172.16.15.180'),
(182, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:16', 'Point Person', '172.16.15.180'),
(183, 0, 'Administrator 12345', 'LOGIN', '', '2025-08-27 10:19:08', 'Administrator', '172.16.15.180'),
(184, 0, 'Administrator 12345', 'LOGIN', '', '2025-08-27 10:36:59', 'Administrator', '172.16.15.180'),
(185, 0, '12345 Administrator', 'UDPATE', '', '2025-08-27 10:37:04', 'Administrator', '172.16.15.180'),
(186, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 10:37:46', 'Administrator', '172.16.15.180'),
(187, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 10:37:49', 'Administrator', '172.16.15.180'),
(188, 25, 'makak manoys', 'LOGIN', '', '2025-08-27 11:05:40', 'Point Person', '172.16.15.180'),
(189, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 11:05:46', 'Administrator', '172.16.15.180'),
(190, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 11:11:49', 'Administrator', '172.16.15.180'),
(191, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:14:39', 'Administrator', '172.16.15.180'),
(192, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:14:51', 'Administrator', '172.16.15.180'),
(193, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:31:37', 'Administrator', '172.16.15.180'),
(194, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:31:54', 'Administrator', '172.16.15.180'),
(195, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:32:02', 'Approver', '172.16.15.180'),
(196, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:33:17', 'Approver', '172.16.15.180'),
(197, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:34:51', 'Approver', '172.16.15.180'),
(198, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:17:47', 'Approver', '172.16.15.180'),
(199, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:17:52', 'Approver', '172.16.15.180'),
(200, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:18:25', 'Approver', '172.16.15.180');

-- --------------------------------------------------------

--
-- Table structure for table `rdo`
--

CREATE TABLE `rdo` (
  `id` int(10) NOT NULL,
  `rdo_code` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rdo`
--

INSERT INTO `rdo` (`id`, `rdo_code`, `description`) VALUES
(1, '1', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte'),
(2, '2', 'Revenue District Office No. 2 -  Vigan City, Ilocos Sur'),
(3, '3', 'Revenue District Office No. 3 - San Fernando, La Union'),
(4, '4', 'Revenue District Office No. 4 - Calasiao, Central Pangasinan'),
(5, '5', 'Revenue District Office No. 5 - Alaminos City, West Pangasinan'),
(6, '6', 'Revenue District Office No. 6 - Urdaneta City, East Pangasinan'),
(7, '7', 'Revenue District Office No. 7 - Bangued, Abra'),
(8, '8', 'Revenue District Office No. 8 - Baguio City'),
(9, '9', 'Revenue District Office No. 9 - La Trinidad, Benguet'),
(10, '10', 'Revenue District Office No. 10 - Bontoc, Mt. Province'),
(11, '11', 'Revenue District Office No. 11 - Tabuk City, Kalinga'),
(12, '12', 'Revenue District Office No. 12- Lagawe, Ifugao'),
(13, '13', 'Revenue District Office No. 13 - Tuguegarao City, Cagayan'),
(14, '14', 'Revenue District Office No. 14 - Bayombong, Nueva Vizcaya'),
(15, '15', 'Revenue District Office No. 15 - Naguilian, Isabela'),
(16, '16', 'Revenue District Office No. 16 - Cabarroguis, Quirino'),
(17, '17A', 'Revenue District Office No. 17A - Tarlac City, Tarlac'),
(18, '17B', 'Revenue District Office No. 17B - Paniqui, Tarlac'),
(19, '18', 'Revenue District Office No. 18 - Olongapo City, Zambales'),
(20, '19', 'Revenue District Office No. 19 - Subic Bay Freeport Zone'),
(21, '20', 'Revenue District Office No. 20 - Balanga City, Bataan'),
(22, '21A', 'Revenue District Office No. 21A - Angeles City, North Pampanga'),
(23, '21B', 'Revenue District Office No. 21B - City of San Fernando, South Pampanga'),
(24, '21C', 'Revenue District Office No. 21C - Clark Freeport and Special Economic Zone (CFEZ)'),
(25, '22', 'Revenue District Office No. 22 - Baler, Aurora'),
(26, '23A', 'Revenue District Office No. 23A - Talavera, North Nueva Ecija'),
(27, '23B', 'Revenue District Office No. 23B - Cabanatuan City, South Nueva Ecija'),
(28, '24', 'Revenue District Office No. 24 - Valenzuela City'),
(29, '25A', 'Revenue District Office No. 25A - West Bulacan'),
(30, '25B', 'Revenue District Office No. 25B - East Bulacan'),
(31, '26', 'Revenue District Office No. 26 - Malabon City/Navotas City'),
(32, '27', 'Revenue District Office No. 27 - Caloocan City'),
(33, '28', 'Revenue District Office No. 28 – Novaliches'),
(34, '29', 'Revenue District Office No. 29 - Tondo - San Nicolas'),
(35, '30', 'Revenue District Office No. 30 – Binondo'),
(36, '31', 'Revenue District Office No. 31- Sta. Cruz'),
(37, '32', 'Revenue District Office No. 32 - Quiapo-Sampaloc-San Miguel-Sta. Mesa'),
(38, '33', 'Revenue District Office No. 33 - Ermita-Intramuros-Malate'),
(39, '34', 'Revenue District Office No. 34 - Paco-Pandacan-Sta. Ana-San Andres'),
(40, '35', 'Revenue District Office No. 35 – Odiongan, Romblon'),
(41, '36', 'Revenue District Office No. 36 - Puerto Princesa City, Palawan'),
(42, '37', 'Revenue District Office No. 37 - San Jose, Occidental Mindoro'),
(43, '38', 'Revenue District Office No. 38 - North Quezon City'),
(44, '39', 'Revenue District Office No. 39-South Quezon City'),
(45, '40', 'Revenue District Office No. 40 – Cubao'),
(46, '41', 'Revenue District Office No. 41 - Mandaluyong City'),
(47, '42', 'Revenue District Office No. 42 - San Juan City'),
(48, '43', 'Revenue District Office No. 43 - Pasig City'),
(49, '44', 'Revenue District Office No. 44 - Taguig City-Pateros'),
(50, '45', 'Revenue District Office No. 45 – SMART (San Mateo - Marikina - Antipolo - Rodriguez - Teresa)'),
(51, '46', 'Revenue District Office No. 46 - Cainta-Taytay'),
(52, '47', 'Revenue District Office No. 47- East Makati City'),
(53, '48', 'Revenue District Office No. 48 - West Makati City'),
(54, '49', 'Revenue District Office No. 49 - North Makati City'),
(55, '50', 'Revenue District Office No. 50 - South Makati City'),
(56, '51', 'Revenue District Office No. 51 - Pasay City'),
(57, '52', 'Revenue District Office No. 52 - Parañaque City'),
(58, '53A', 'Revenue District Office No. 53A - Las Piñas City'),
(59, '53B', 'Revenue District Office No. 53B - Muntinlupa City'),
(60, '54A', 'Revenue District Office No. 54A - Trece Martires City, East Cavite'),
(61, '54B', 'Revenue District Office No. 54B - Kawit, West Cavite'),
(62, '55', 'Revenue District Office No. 55 - San Pablo City, East Laguna'),
(63, '56', 'Revenue District Office No. 56 - Calamba City, Central Laguna'),
(64, '57', 'Revenue District Office No. 57- Biñan City, West Laguna'),
(65, '58', 'Revenue District Office No. 58 - Batangas City, West Batangas'),
(66, '59', 'Revenue District Office No. 59 - Lipa City, East Batangas'),
(67, '60', 'Revenue District Office No. 60 - Lucena City, North Quezon'),
(68, '61', 'Revenue District Office No. 61 - Gumaca, South Quezon'),
(69, '62', 'Revenue District Office No. 62 - Boac, Marinduque'),
(70, '63', 'Revenue District Office No. 63 - Calapan City, Oriental Mindoro'),
(71, '64', 'Revenue District Office No. 64- Talisay City, Camarines Norte'),
(72, '65', 'Revenue District Office No. 65 - Naga City, Camarines Sur'),
(73, '66', 'Revenue District Office No. 66 - Iriga City, Camarines Sur'),
(74, '67', 'Revenue District Office No. 67 - Legazpi City, Albay'),
(75, '68', 'Revenue District Office No. 68 - Sorsogon City, Sorsogon'),
(76, '69', 'Revenue District Office No. 69 - Virac, Catanduanes'),
(77, '70', 'Revenue District Office No. 70 - Masbate City, Masbate'),
(78, '71', 'Revenue District Office No. 71 - Kalibo, Aklan'),
(79, '72', 'Revenue District Office No. 72 - Roxas City, Capiz'),
(80, '73', 'Revenue District Office No. 73 - San Jose, Antique'),
(81, '74', 'Revenue District Office No. 74 - Iloilo City, Iloilo'),
(82, '75', 'Revenue District Office No. 75 - Zarraga, Iloilo'),
(83, '76', 'Revenue District Office No. 76 - Victorias City, Negros Occidental'),
(84, '77', 'Revenue District Office No. 77 - Bacolod City, Negros Occidental'),
(85, '78', 'Revenue District Office No. 78 - Binalbagan, Negros Occidental'),
(86, '79', 'Revenue District Office No. 79 - Dumaguete City, Negros Oriental'),
(87, '80', 'Revenue District Office No. 80 - Mandaue City, Cebu'),
(88, '81', 'Revenue District Office No. 81 - Cebu City North'),
(89, '82', 'Revenue District Office No. 82 - Cebu City South'),
(90, '83', 'Revenue District Office No. 83 - Talisay City, Cebu'),
(91, '84', 'Revenue District Office No. 84 - Tagbilaran City, Bohol'),
(92, '85', 'Revenue District Office No. 85 - Catarman, Northern Samar'),
(93, '86', 'Revenue District Office No. 86 - Borongan City, Eastern Samar'),
(94, '87', 'Revenue District Office No. 87 - Calbayog City, Samar'),
(95, '88', 'Revenue District Office No. 88 - Tacloban City, Leyte'),
(96, '89', 'Revenue District Office No. 89 - Ormoc City, Leyte'),
(97, '90', 'Revenue District Office No. 90 - Maasin City, Southern Leyte'),
(98, '91', 'Revenue District Office No. 91 - Dipolog City, Zamboanga del Norte'),
(99, '92', 'Revenue District Office No. 92 - Pagadian City, Zamboanga del Sur'),
(100, '93A', 'Revenue District Office No. 93A - Zamboanga City, Zamboanga del Sur'),
(101, '93B', 'Revenue District Office No. 93B - Ipil, Zamboanga Sibugay'),
(102, '94', 'Revenue District Office No. 94 - Isabela City, Basilan'),
(103, '95', 'Revenue District Office No. 95 - Jolo, Sulu'),
(104, '96', 'Revenue District Office No. 96 - Bongao, Tawi-Tawi'),
(105, '97', 'Revenue District Office No. 97 - Gingoog City, Misamis Oriental'),
(106, '98', 'Revenue District Office No. 98 - Cagayan de Oro City, Misamis Oriental'),
(107, '99', 'Revenue District Office No. 99 - Malaybalay City, Bukidnon'),
(108, '100', 'Revenue District Office No. 100 - Ozamis City, Misamis Occidental'),
(109, '101', 'Revenue District Office No. 101 -Iligan City, Lanao del Norte'),
(110, '102', 'Revenue District Office No. 102 - Marawi City, Lanao del Sur'),
(111, '103', 'Revenue District Office No. 103 - Butuan City, Agusan del Norte'),
(112, '104', 'Revenue District Office No. 104 - Bayugan City, Agusan del Sur'),
(113, '105', 'Revenue District Office No. 105 - Surigao City, Surigao del Norte'),
(114, '106', 'Revenue District Office No. 106 - Tandag City, Surigao del Sur'),
(115, '107', 'Revenue District Office No. 107 - Cotabato City, Maguindanao'),
(116, '108', 'Revenue District Office No. 108 - Kidapawan City, North Cotabato'),
(117, '109', 'Revenue District Office No. 109 - Tacurong City, Sultan Kudarat'),
(118, '110', 'Revenue District Office No. 110 - General Santos City, South Cotabato'),
(119, '111', 'Revenue District Office No. 111 - Koronadal City, South Cotabato'),
(120, '112', 'Revenue District Office No. 112 - Tagum City, Davao del Norte'),
(121, '113A', 'Revenue District Office No. 113A - West Davao City'),
(122, '113B', 'Revenue District Office No. 113B - East Davao City'),
(123, '114', 'Revenue District Office No. 114 - Mati City, Davao Oriental'),
(124, '115', 'Revenue District Office No. 115 - Digos City, Davao del Sur');

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
  `Remarks` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `nameOfCorp`, `tin`, `secNum`, `elaNum`, `taxYear`, `fanNum`, `amount`, `docsRequested`, `created_date`, `ip_address`, `status`, `email`, `Remarks`, `user_id`) VALUES
(51, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-06-24 01:48:14.875458', '172.16.15.180', 'Rejected', NULL, '', NULL),
(52, 'Juan', 'asd', 'ads', 'dsa', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-06-24 01:32:17.205587', '172.16.15.180', 'Rejected', NULL, '', NULL),
(53, 'Array', 'asd', 'asd', 'ads', 'ads', 'asd', 'N/A', 'N/A', 'ads', '2025-06-20 06:01:53.515757', '172.16.15.180', 'Approved', NULL, NULL, NULL),
(54, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:30.681782', '172.16.15.180', 'Approved', NULL, NULL, NULL),
(55, 'makak@gmail.com', 'ads', 'ads', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:34.132298', '172.16.15.180', 'Approved', NULL, NULL, NULL),
(56, 'admin@mail.com', 'Bureau of Internal Revneue', '433799685', 'asd', 'asd', 'asd', 'N/A', 'N/A', 'asd', '2025-06-23 01:32:53.314997', '172.16.15.180', 'Rejected', NULL, '', NULL),
(57, 'Admin Admin', 'buera', 'asdasdzxczcx', 'adsczcxxasdzxc', 'N/A', 'N/A', 'zcxzcxzxasads', 'zxczcxczxadsasd', 'zcxzxvzvdnbxbnvc', '2025-06-23 01:33:43.286582', '172.16.15.180', 'Approved', 'admin@mail.com', '', NULL),
(58, 'Admin Admin', 'Bureau of Internal Revneue', '000-111-111', 'ads', 'asd', 'asd', 'N/A', 'N/A', 'SEC Document', '2025-06-23 06:15:16.631018', '172.16.15.180', 'Approved', 'admin@mail.com', NULL, NULL),
(59, 'Admin Admin', 'Commission on Audit', '111-222-333', '123456789', '123456', '2025', 'N/A', 'N/A', 'AFS', '2025-06-24 01:36:53.686779', '172.16.15.180', 'Approved', 'admin@mail.com', '', NULL),
(60, 'makak manoys', 'BIR National University', '123456789', '505050050505', 'adsaasd', 'asdsad', 'N/A', 'N/A', 'ads', '2025-06-24 01:53:08.857559', '172.16.15.180', 'Approved', 'makak@gmail.com', '', NULL),
(61, 'makak manoys', 'Test Corporation', '123456789', '12312312313', 'ads', 'asd', 'N/A', 'N/A', 'ds', '2025-06-24 01:52:49.233569', '172.16.15.180', 'Approved', 'makak@gmail.com', '', NULL),
(62, 'Sample Name', 'Test Copr', '123456789', 'asdasd', 'asd', 'asd', 'N/A', 'N/A', 'ds', '2025-06-26 06:29:42.854066', '172.16.15.180', 'Rejected', 'asdasd@asdasd.com', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `email`, `filename`, `date`, `ip_address`, `user_id`, `file_path`) VALUES
(1, 'makak manoys', 'makak@gmail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(2, 'makak manoys', 'makak@gmail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(3, 'makak manoys', 'makak@gmail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(4, '', 'makak@gmail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(5, 'Administrator 12345', 'admin@mail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(6, 'Administrator 12345', 'admin@mail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(7, 'Administrator 12345', 'admin@mail.com', '', '2025-06-26', '172.16.15.180', NULL, NULL),
(8, 'makak manoys', 'Array', 'Air Fish Lending Corporation - 010-398-352-000 (1).pdf', '2025-06-30', '172.16.15.180', NULL, NULL),
(9, '2018 CROWNE - Certificate-of-RegistratioN.pdf', '', '', '2025-06-30', '', NULL, NULL),
(10, 'Audit_Trail.xls', '', '', '2025-06-30', '', NULL, NULL),
(13, 'Approver Test', 'approver@mail.com', 'EMAIL CONFIRMATION.pdf', '2025-08-27', '172.16.15.180', 26, './uploads/EMAIL CONFIRMATION.pdf');

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
  `office` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_ban`, `role`, `office`) VALUES
(1, 'Admin', '12345', 'admin@mail.com', '$2y$10$S0ithJy368hu8Z3tyHAqJuVUIVRIIU5jx0G8g2Yo54/FR2DSBAi2G', 0, 'Administrator', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte'),
(17, 'Juana', 'Dela Cruz', 'juandelacruz@gmail.com', '$2y$10$D58cNQWKipksAgT3VYlhMu2QNnSXXGYpwHOqVb1fY/MwCGYLqcQ1i', 0, 'Point Person', NULL),
(18, 'Liam', 'Miller', 'liammiller@gmail.com', '$2y$10$J5WJfVOSFL1NeIPpNMY93uDmKGzUDt9JoSePdtQwiXCqEmYDYcW5G', 0, 'Administrator', NULL),
(19, 'Louise', 'Beckham', 'louisebeckham@yahoo.com', '$2y$10$lxBUeELueVmvsy.XLPST1ulwHVYP38u9fFgXFyeTeZgKmiV7rIRy.', 0, 'Point Person', NULL),
(20, 'Steven', 'Holmes', 'stevenholmes@hotmail.com', '$2y$10$FTZVB8uZnWQqbjWTPSxyIOsTeRfK6Q0KO0lV7wjKhx5cnG/4vo1T.', 0, 'Approver', NULL),
(21, 'Mike', 'Bailey', 'mikebailey@gmail.com', '$2y$10$WIFX1M6wXZucJFXgZB7.u.5FVpNF6G6Fty47qfWoS6lfrgbZ0ocn6', 1, 'Administrator', NULL),
(22, 'Charlie', 'Monroe', 'charliemonroe@gmail.com', '$2y$10$yZWQI6E4K5xbM0IlvfDtO.lX3Mve5HkqMEsp9TAr3i0kkbcF9JZ9O', 1, 'Point Person', NULL),
(23, 'Fiona', 'Watson', 'fionawatson@yahoo.com', '$2y$10$pp1RBMTciEE8qB2KlBCcwuT1h.GaAnIpDMSpnAOmURGhWjoHIdV5S', 1, 'Administrator', NULL),
(24, 'Sample', 'Name', 'asdasd@asdasd.com', '$2y$10$a4czMTaFWXBSHelmFJzVXu0N6VS7OS4lLLMdEzQt8wY9x6Sj7Hxjy', 0, 'Point Person', NULL),
(25, 'makak', 'manoys', 'makak@gmail.com', '$2y$10$bIkP5lgS3lKEQVVYnCHEo.lg940GsmWygpkjBxoP7msjMoBnmvSHy', 0, 'Point Person', NULL),
(26, 'Approver', 'Test', 'approver@mail.com', '$2y$10$41m/gO8G7pqrM40hqCuYdeA11Yp9NgHL5D4MhbdwmhS47byCCGFKO', 0, 'Approver', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdo`
--
ALTER TABLE `rdo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `rdo`
--
ALTER TABLE `rdo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

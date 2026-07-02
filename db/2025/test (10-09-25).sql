-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 09, 2025 at 04:29 AM
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
  `ip_address` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `name`, `transaction_type`, `office`, `date_created`, `role`, `ip_address`, `remarks`) VALUES
(5, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:06:55', 'Administrator', '172.16.15.180', NULL),
(6, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:33:51', 'Administrator', '172.16.15.180', NULL),
(7, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 03:38:07', 'Administrator', '172.16.15.180', NULL),
(8, 31, 'Admin Admin', 'CREATE', 'National Office', '2025-03-27 03:56:58', 'Administrator', '172.16.15.180', NULL),
(9, 31, 'Admin Admin', 'CREATE', 'National Office', '2025-03-27 04:00:55', 'Administrator', '172.16.15.180', NULL),
(10, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-27 04:38:09', 'Administrator', '172.16.15.180', NULL),
(11, 35, 'Sins Johnyn', 'UDPATE', 'National Office', '2025-03-27 04:43:07', 'Point Person', '172.16.15.180', NULL),
(12, 35, 'Sins Johnyn', 'UDPATE', 'National Office', '2025-03-27 04:47:35', 'Point Person', '172.16.15.180', NULL),
(13, 32, 'Approver Approver', 'UDPATE', 'National Office', '2025-03-28 08:35:22', 'Approver', '172.16.15.180', NULL),
(14, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:36:05', 'Administrator', '172.16.15.180', NULL),
(15, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:37:08', 'Administrator', '172.16.15.180', NULL),
(16, 31, 'Admin Admin', 'UDPATE', 'National Office', '2025-03-28 08:37:23', 'Administrator', '172.16.15.180', NULL),
(17, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:15:51', 'Administrator', '172.16.15.180', NULL),
(18, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:19:28', 'Administrator', '172.16.15.180', NULL),
(19, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-13 02:20:16', 'Administrator', '172.16.15.180', NULL),
(20, 25, 'manoys makak', 'CREATE', 'National Office', '2025-05-28 08:48:42', 'Administrator', '172.16.15.180', NULL),
(26, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 09:10:13', 'Administrator', '172.16.15.180', NULL),
(27, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 09:10:34', 'Administrator', '172.16.15.180', NULL),
(28, 24, 'Name Sample', 'UDPATE', 'National Office', '2025-05-28 09:14:26', 'Point Person', '172.16.15.180', NULL),
(32, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 01:42:41', 'Administrator', '172.16.15.180', NULL),
(33, 24, 'Name Sample', 'UDPATE', 'National Office', '2025-05-28 01:43:57', 'Point Person', '172.16.15.180', NULL),
(39, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 01:54:13', 'Point Person', '172.16.15.180', NULL),
(40, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 01:55:02', 'Point Person', '172.16.15.180', NULL),
(41, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-05-28 01:55:10', 'Point Person', '172.16.15.180', NULL),
(42, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-28 03:47:32', 'Point Person', '172.16.15.180', NULL),
(43, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-05-28 03:48:16', 'Approver', '172.16.15.180', NULL),
(44, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 08:58:25', 'Point Person', '172.16.15.180', NULL),
(45, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-05-29 11:08:50', 'Approver', '172.16.15.180', NULL),
(46, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 01:16:00', 'Point Person', '172.16.15.180', NULL),
(47, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:04:01', 'Point Person', '172.16.15.180', NULL),
(48, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:56:20', 'Point Person', '172.16.15.180', NULL),
(49, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:57:13', 'Point Person', '172.16.3.232', NULL),
(50, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-29 02:58:08', 'Point Person', '172.16.15.180', NULL),
(51, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-05-30 10:57:59', 'Point Person', '172.16.15.180', NULL),
(52, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-03 02:53:17', 'Point Person', '172.16.15.180', NULL),
(53, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 01:48:02', 'Point Person', '172.16.15.180', NULL),
(54, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:11:01', 'Point Person', '172.16.15.180', NULL),
(55, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:12:59', 'Point Person', '172.16.15.180', NULL),
(56, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 02:21:25', 'Point Person', '172.16.15.180', NULL),
(57, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-04 02:46:44', 'Approver', '172.16.15.180', NULL),
(58, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-04 02:58:58', 'Approver', '172.16.15.180', NULL),
(59, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-04 04:12:39', 'Point Person', '172.16.15.180', NULL),
(60, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-05 09:50:27', 'Point Person', '172.16.15.180', NULL),
(61, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 08:51:17', 'Point Person', '172.16.15.180', NULL),
(62, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 09:57:36', 'Point Person', '172.16.15.180', NULL),
(63, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 11:15:29', 'Point Person', '172.16.15.180', NULL),
(64, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 01:36:08', 'Point Person', '172.16.15.180', NULL),
(65, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 01:36:34', 'Point Person', '172.16.15.180', NULL),
(66, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 02:25:33', 'Point Person', '172.16.15.180', NULL),
(67, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-09 02:51:12', 'Approver', '172.16.15.180', NULL),
(68, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-09 03:01:47', 'Point Person', '172.16.15.180', NULL),
(69, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-10 11:10:46', 'Point Person', '172.16.15.180', NULL),
(70, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:18:56', 'Point Person', '172.16.15.180', NULL),
(71, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:32:15', 'Point Person', '172.16.15.180', NULL),
(72, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-11 09:50:01', 'Approver', '172.16.15.180', NULL),
(73, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 09:54:39', 'Point Person', '172.16.15.180', NULL),
(74, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-11 10:01:33', 'Point Person', '172.16.15.180', NULL),
(75, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 08:49:24', 'Point Person', '172.16.15.180', NULL),
(76, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 09:08:46', 'Point Person', '172.16.15.180', NULL),
(77, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 09:52:29', 'Point Person', '172.16.15.180', NULL),
(78, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 10:30:54', 'Point Person', '172.16.15.180', NULL),
(79, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-16 01:24:13', 'Point Person', '172.16.15.180', NULL),
(80, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 09:42:16', 'Point Person', '172.16.15.180', NULL),
(81, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 09:51:54', 'Point Person', '172.16.15.180', NULL),
(82, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 10:58:11', 'Point Person', '172.16.15.180', NULL),
(83, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:40:02', 'Point Person', '172.16.15.180', NULL),
(84, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-18 03:40:55', 'Approver', '172.16.15.180', NULL),
(85, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:41:32', 'Point Person', '::1', NULL),
(86, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-18 03:50:11', 'Point Person', '172.16.15.180', NULL),
(87, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 10:17:24', 'Point Person', '172.16.15.180', NULL),
(88, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 11:11:41', 'Point Person', '172.16.15.180', NULL),
(89, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:22:48', 'Point Person', '172.16.15.180', NULL),
(90, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:36:58', 'Point Person', '172.16.15.180', NULL),
(91, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 01:50:02', 'Point Person', '172.16.15.180', NULL),
(92, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 02:59:44', 'Point Person', '172.16.15.180', NULL),
(93, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:19:13', 'Point Person', '172.16.15.180', NULL),
(94, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:26:49', 'Point Person', '172.16.15.180', NULL),
(95, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-19 03:36:39', 'Point Person', '172.16.15.180', NULL),
(96, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 08:36:14', 'Point Person', '172.16.15.180', NULL),
(97, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 09:48:52', 'Point Person', '172.16.15.180', NULL),
(98, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 01:39:28', 'Point Person', '172.16.15.180', NULL),
(99, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 01:55:17', 'Point Person', '172.16.15.180', NULL),
(100, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:18:05', 'Point Person', '172.16.15.180', NULL),
(101, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:28:08', 'Point Person', '172.16.15.180', NULL),
(102, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 02:58:00', 'Point Person', '172.16.15.180', NULL),
(103, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 03:39:28', 'Point Person', '172.16.15.180', NULL),
(104, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-20 04:15:21', 'Point Person', '172.16.4.179', NULL),
(105, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:24:53', 'Point Person', '172.16.15.180', NULL),
(106, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:57:47', 'Point Person', '172.16.15.180', NULL),
(107, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 09:58:23', 'Point Person', '172.16.15.180', NULL),
(108, 0, 'test 1123', 'LOGIN', 'RDO 1', '2025-06-23 09:58:35', 'Administrator', '172.16.15.180', NULL),
(109, 0, '1123 test', 'UDPATE', 'RDO 1', '2025-06-23 09:58:53', 'Administrator', '172.16.15.180', NULL),
(110, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 09:59:18', 'Point Person', '172.16.15.180', NULL),
(111, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:01:54', 'Point Person', '172.16.15.180', NULL),
(112, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:02:06', 'Point Person', '172.16.15.180', NULL),
(113, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:04:54', 'Point Person', '172.16.15.180', NULL),
(114, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:05:02', 'Point Person', '172.16.15.180', NULL),
(115, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:05:09', 'Point Person', '172.16.15.180', NULL),
(116, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:07:30', 'Point Person', '172.16.15.180', NULL),
(117, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:08:07', 'Point Person', '172.16.15.180', NULL),
(118, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:08:14', 'Point Person', '172.16.15.180', NULL),
(119, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:08:30', 'Point Person', '172.16.15.180', NULL),
(120, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:08:40', 'Point Person', '172.16.15.180', NULL),
(121, 0, 'Administrator 123', 'LOGIN', 'RDO 1', '2025-06-23 10:08:46', 'Administrator', '172.16.15.180', NULL),
(122, 0, '123 Administrator', 'UDPATE', 'RDO 1', '2025-06-23 10:09:46', 'Administrator', '172.16.15.180', NULL),
(123, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 10:09:58', 'Point Person', '172.16.15.180', NULL),
(124, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 10:10:04', 'Point Person', '172.16.15.180', NULL),
(125, 0, 'Administrator 123', 'LOGIN', 'RDO 1', '2025-06-23 10:10:07', 'Administrator', '172.16.15.180', NULL),
(126, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 01:41:46', 'Point Person', '172.16.15.180', NULL),
(127, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 02:08:06', 'Point Person', '172.16.15.180', NULL),
(128, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:08:40', 'Point Person', '172.16.15.180', NULL),
(129, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:09:38', 'Point Person', '172.16.15.180', NULL),
(130, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:10:00', 'Point Person', '172.16.15.180', NULL),
(131, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-23 02:10:15', 'Point Person', '172.16.15.180', NULL),
(132, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-23 02:27:42', 'Point Person', '172.16.15.180', NULL),
(133, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 09:17:13', 'Point Person', '172.16.15.180', NULL),
(134, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-24 03:17:22', 'Point Person', '172.16.15.180', NULL),
(135, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 09:17:28', 'Administrator', '172.16.15.180', NULL),
(136, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 09:27:33', 'Administrator', '172.16.15.180', NULL),
(137, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 10:02:45', 'Administrator', '172.16.15.180', NULL),
(138, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 10:38:30', 'Point Person', '172.16.15.180', NULL),
(139, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 01:51:31', 'Point Person', '172.16.15.180', NULL),
(140, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-24 02:07:22', 'Point Person', '172.16.15.180', NULL),
(141, 0, 'Administrator 12345', 'LOGIN', 'RDO 11', '2025-06-24 03:09:43', 'Administrator', '172.16.15.180', NULL),
(142, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 08:23:58', 'Point Person', '172.16.15.180', NULL),
(143, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 09:11:57', 'Point Person', '172.16.15.180', NULL),
(144, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 09:13:24', 'Point Person', '172.16.15.180', NULL),
(145, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 09:13:30', 'Point Person', '172.16.15.180', NULL),
(146, 0, 'Administrator 12345', 'LOGIN', 'Car', '2025-06-25 10:11:11', 'Administrator', '172.16.15.180', NULL),
(147, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 10:31:04', 'Point Person', '172.16.15.180', NULL),
(148, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 03:18:55', 'Point Person', '172.16.15.180', NULL),
(149, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 03:29:04', 'Point Person', '172.16.15.180', NULL),
(150, 25, 'manoys makak', 'UDPATE', 'National Office', '2025-06-25 03:30:02', 'Point Person', '172.16.15.180', NULL),
(151, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-25 03:36:58', 'Administrator', '172.16.15.180', NULL),
(152, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-25 03:51:35', 'Point Person', '172.16.15.180', NULL),
(153, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 10:29:59', 'Point Person', '172.16.15.180', NULL),
(154, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 10:57:53', 'Point Person', '172.16.15.180', NULL),
(155, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 01:19:03', 'Point Person', '172.16.15.180', NULL),
(156, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 01:42:15', 'Point Person', '172.16.15.180', NULL),
(157, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 02:10:00', 'Point Person', '172.16.15.180', NULL),
(158, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 02:35:54', 'Point Person', '172.16.15.180', NULL),
(159, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 03:16:57', 'Point Person', '172.16.15.180', NULL),
(160, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-26 03:31:52', 'Point Person', '172.16.15.180', NULL),
(161, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:43:40', 'Administrator', '172.16.15.180', NULL),
(162, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:50:43', 'Administrator', '172.16.15.180', NULL),
(163, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-26 03:58:38', 'Administrator', '172.16.15.180', NULL),
(164, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 10:20:41', 'Administrator', '172.16.15.180', NULL),
(165, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 10:45:25', 'Point Person', '172.16.15.180', NULL),
(166, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 10:56:04', 'Point Person', '172.16.15.180', NULL),
(167, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:29:55', 'Administrator', '172.16.15.180', NULL),
(168, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:51:37', 'Administrator', '172.16.15.180', NULL),
(169, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-06-30 01:53:02', 'Administrator', '172.16.15.180', NULL),
(170, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 01:58:43', 'Point Person', '172.16.15.180', NULL),
(171, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:16:46', 'Point Person', '172.16.15.180', NULL),
(172, 25, 'makak manoys', 'LOGIN', 'National Office', '2025-06-30 02:32:24', 'Point Person', '172.16.15.180', NULL),
(173, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:34:44', 'Point Person', '172.16.15.180', NULL),
(174, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:02', 'Point Person', '172.16.15.180', NULL),
(175, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:07', 'Point Person', '172.16.15.180', NULL),
(176, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:12', 'Point Person', '172.16.15.180', NULL),
(177, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:18', 'Point Person', '172.16.15.180', NULL),
(178, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:25', 'Point Person', '172.16.15.180', NULL),
(179, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:35:29', 'Point Person', '172.16.15.180', NULL),
(180, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:02', 'Point Person', '172.16.15.180', NULL),
(181, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:11', 'Point Person', '172.16.15.180', NULL),
(182, 25, 'manoys makak', 'UDPATE', '', '2025-06-30 02:36:16', 'Point Person', '172.16.15.180', NULL),
(183, 0, 'Administrator 12345', 'LOGIN', '', '2025-08-27 10:19:08', 'Administrator', '172.16.15.180', NULL),
(184, 0, 'Administrator 12345', 'LOGIN', '', '2025-08-27 10:36:59', 'Administrator', '172.16.15.180', NULL),
(185, 0, '12345 Administrator', 'UDPATE', '', '2025-08-27 10:37:04', 'Administrator', '172.16.15.180', NULL),
(186, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 10:37:46', 'Administrator', '172.16.15.180', NULL),
(187, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 10:37:49', 'Administrator', '172.16.15.180', NULL),
(188, 25, 'makak manoys', 'LOGIN', '', '2025-08-27 11:05:40', 'Point Person', '172.16.15.180', NULL),
(189, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 11:05:46', 'Administrator', '172.16.15.180', NULL),
(190, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 11:11:49', 'Administrator', '172.16.15.180', NULL),
(191, 0, 'Administrator 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:14:39', 'Administrator', '172.16.15.180', NULL),
(192, 0, '12345 Administrator', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:14:51', 'Administrator', '172.16.15.180', NULL),
(193, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:31:37', 'Administrator', '172.16.15.180', NULL),
(194, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:31:54', 'Administrator', '172.16.15.180', NULL),
(195, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:32:02', 'Approver', '172.16.15.180', NULL),
(196, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:33:17', 'Approver', '172.16.15.180', NULL),
(197, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 01:34:51', 'Approver', '172.16.15.180', NULL),
(198, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:17:47', 'Approver', '172.16.15.180', NULL),
(199, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:17:52', 'Approver', '172.16.15.180', NULL),
(200, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:18:25', 'Approver', '172.16.15.180', NULL),
(201, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:29:40', 'Approver', '172.16.15.180', NULL),
(202, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:30:41', 'Approver', '172.16.15.180', NULL),
(203, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-27 02:31:31', 'Approver', '172.16.15.180', NULL),
(204, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-28 08:56:09', 'Approver', '172.16.15.180', NULL),
(205, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-29 09:27:17', 'Administrator', '172.16.15.180', NULL),
(206, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-08-29 09:31:02', 'Administrator', '172.16.15.180', NULL),
(207, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-08-29 09:31:19', 'Point Person', '172.16.15.180', NULL),
(208, 27, 'Person Point', 'SUBMIT', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-08-29 09:31:32', 'Point Person', '172.16.15.180', NULL),
(209, 27, 'Person Point', 'SUBMIT', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-08-29 09:32:04', 'Point Person', '172.16.15.180', NULL),
(210, 27, 'Person Point', 'SUBMIT', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-08-29 09:32:19', 'Point Person', '172.16.15.180', NULL),
(211, 27, 'Person Point', 'SUBMIT', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-08-29 09:32:47', 'Point Person', '172.16.15.180', NULL),
(212, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-02 09:06:38', 'Approver', '172.16.15.180', NULL),
(213, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-02 09:06:52', 'Approver', '172.16.15.180', NULL),
(214, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:08:32', 'Approver', '172.16.15.180', NULL),
(215, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:13:10', 'Approver', '172.16.15.180', NULL),
(216, 25, 'makak manoys', 'LOGIN', '', '2025-09-03 09:13:21', 'Point Person', '172.16.15.180', NULL),
(217, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:16:02', 'Approver', '172.16.15.180', NULL),
(218, 25, 'makak manoys', 'LOGIN', '', '2025-09-03 09:18:29', 'Point Person', '172.16.15.180', NULL),
(219, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:19:54', 'Approver', '172.16.15.180', NULL),
(220, 25, 'makak manoys', 'LOGIN', '', '2025-09-03 09:20:24', 'Point Person', '172.16.15.180', NULL),
(221, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:21:52', 'Approver', '172.16.15.180', NULL),
(222, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:23:54', 'Approver', '172.16.15.180', NULL),
(223, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:24:12', 'Approver', '172.16.15.180', NULL),
(224, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 09:24:36', 'Approver', '172.16.15.180', NULL),
(225, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 10:12:47', 'Approver', '172.16.15.180', NULL),
(226, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 02:34:37', 'Approver', '172.16.15.180', NULL),
(227, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 02:34:55', 'Administrator', '172.16.15.180', NULL),
(228, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 02:35:32', 'Administrator', '172.16.15.180', NULL),
(229, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-09-03 02:35:42', 'Point Person', '172.16.15.180', NULL),
(230, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-09-03 02:36:01', 'Point Person', '172.16.15.180', NULL),
(231, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 02:36:09', 'Approver', '172.16.15.180', NULL),
(232, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 02:45:40', 'Approver', '172.16.15.180', NULL),
(233, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 03:12:29', 'Approver', '172.16.15.180', NULL),
(234, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 03:31:59', 'Approver', '172.16.15.180', NULL),
(235, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 03:42:02', 'Approver', '172.16.15.180', NULL),
(236, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 03:51:21', 'Administrator', '172.16.15.180', NULL),
(237, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 03:52:37', 'Approver', '172.16.15.180', NULL),
(238, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-03 04:06:55', 'Approver', '172.16.15.180', NULL),
(239, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 08:19:36', 'Approver', '172.16.15.180', NULL),
(240, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 08:31:33', 'Approver', '172.16.15.180', NULL),
(241, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 08:46:44', 'Approver', '172.16.15.180', NULL),
(242, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 09:04:23', 'Approver', '172.16.15.180', NULL),
(243, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 09:31:09', 'Approver', '172.16.15.180', NULL),
(244, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 09:55:01', 'Approver', '172.16.15.180', NULL),
(245, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 10:55:52', 'Approver', '172.16.15.180', NULL),
(246, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 02:22:27', 'Approver', '172.16.15.180', NULL),
(247, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 02:48:54', 'Approver', '172.16.15.180', NULL),
(248, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 02:56:50', 'Administrator', '172.16.15.180', NULL),
(249, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 02:58:42', 'Approver', '172.16.15.180', NULL),
(250, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 03:49:33', 'Approver', '172.16.15.180', NULL),
(251, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-04 04:37:20', 'Approver', '172.16.15.180', NULL),
(252, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-05 08:22:14', 'Approver', '172.16.15.180', NULL),
(253, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-05 08:42:33', 'Approver', '172.16.15.180', NULL),
(254, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-05 08:55:23', 'Approver', '172.16.15.180', NULL),
(255, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-05 02:54:38', 'Approver', '172.16.15.180', NULL),
(256, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 09:07:17', 'Approver', '172.16.15.180', NULL),
(257, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 09:39:34', 'Approver', '172.16.15.180', NULL),
(258, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 10:03:14', 'Approver', '172.16.15.180', NULL),
(259, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:15:18', 'Administrator', '172.16.15.180', 'Logged in as Admin 12345'),
(260, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:23:35', 'Administrator', '172.16.15.180', 'Logged in as Admin 12345'),
(261, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:24:04', 'Administrator', '172.16.15.180', NULL),
(262, 1, '12345 Admin', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:26:14', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: 12345 Last Name: Admin'),
(263, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:27:13', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz'),
(264, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-08 04:29:47', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 18 - Olongapo City, Zambales'),
(265, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:36:23', 'Administrator', '172.16.15.180', 'Logged in as Admin 12345'),
(266, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:37:12', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 17A - Tarlac City, Tarlac'),
(267, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:37:43', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 11 - Tabuk City, Kalinga'),
(268, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:39:14', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 14 - Bayombong, Nueva Vizcaya'),
(269, 1, 'Makakzzzzz Makakzzzzzzzzzz', 'CREATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:41:08', 'Administrator', '172.16.15.180', 'Administrator has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 8 - Baguio City'),
(270, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:41:27', 'Approver', '172.16.15.180', 'Logged in as Approver Test'),
(271, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 10:41:38', 'Approver', '172.16.15.180', NULL),
(272, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 01:51:05', 'Administrator', '172.16.15.180', 'Logged in as Admin 12345'),
(273, 1, 'Admin 12345', 'CREATE USER', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 01:59:11', 'Administrator', '172.16.15.180', 'Administrator (Admin 12345) has created a user with the ff credentials: First Name: Makakzzzzz Last Name: Makakzzzzzzzzzz Email: makakz@gmail.com Office: Revenue District Office No. 15 - Naguilian, Isabela'),
(274, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 02:47:54', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345'),
(275, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 02:49:54', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(276, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 03:36:18', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(277, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-09 03:36:25', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(278, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 09:25:31', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(279, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 09:25:43', 'Approver', '172.16.15.180', 'User has uploaded the file: pdf_hyperlink_example.pdf'),
(280, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 09:26:55', 'Approver', '172.16.15.180', 'Userapprover@mail.com has uploaded the file: BOSH BIR 2303_COR_2022.pdf'),
(281, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 09:38:50', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(282, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-09-10 10:02:20', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(283, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-09-10 10:02:34', 'Point Person', '172.16.15.180', NULL),
(284, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 10:02:41', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(285, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 10:36:06', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(286, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 11:22:34', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(287, 1, 'Makakzzzzz123123 Makakzzzzzzzzzz', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 11:23:25', 'Administrator', '172.16.15.180', 'Administrator 12345 Adminhas updated the details for: Makakzzzzz123123 Makakzzzzzzzzzz (makakz@gmail.com) to: makakz@gmail.com'),
(288, 1, 'Admin 12345', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 01:43:16', 'Administrator', '172.16.15.180', 'Logged in as: Admin 12345 (admin@mail.com)'),
(289, 1, 'Admin 123456', 'UDPATE', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 01:43:26', 'Administrator', '172.16.15.180', 'Administrator (Admin 12345) has updated the details for: Admin 123456 (admin@mail.com)'),
(290, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 01:54:09', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(291, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 02:02:45', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(292, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 02:03:01', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(293, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 02:27:18', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(294, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-10 03:28:19', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(295, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-11 11:09:20', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(296, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-11 02:23:10', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(297, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-11 02:39:03', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(298, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-12 10:58:52', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(299, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-12 01:43:37', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(300, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-12 04:36:07', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(301, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-12 04:39:18', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(302, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-12 04:41:41', 'Approver', '172.16.15.180', NULL),
(303, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-12 04:41:49', 'Point Person', '172.16.15.180', NULL),
(304, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 08:53:54', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(305, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 08:54:17', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(306, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 08:54:36', 'Point Person', '172.16.15.180', NULL),
(307, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 08:54:48', 'Point Person', '172.16.15.180', NULL),
(308, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 08:58:02', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(309, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 08:59:45', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(310, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 09:03:53', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(311, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 09:25:07', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(312, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-15 09:29:22', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(313, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 09:29:31', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(314, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 02:33:05', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(315, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 02:41:11', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(316, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 02:42:36', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(317, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 02:43:51', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(318, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 02:44:40', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(319, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 03:51:28', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(320, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-15 03:53:04', 'Approver', '172.16.15.180', NULL),
(321, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-16 08:19:17', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(322, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-16 08:21:09', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(323, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-16 01:43:19', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(324, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-17 08:22:41', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(325, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-17 01:51:41', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(326, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-17 01:51:52', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: eafs444444444ITRTY122024.pdf'),
(327, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-18 09:36:08', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(328, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-23 01:36:29', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(329, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-24 10:11:58', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(330, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-09-24 01:49:05', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(331, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-24 02:03:52', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(332, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-24 02:26:54', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(333, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-29 11:28:05', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(334, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 09:18:46', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(335, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 09:37:05', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(336, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 10:21:26', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(337, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 10:30:55', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(338, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 10:52:43', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(339, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 10:59:24', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(340, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-09-30 11:20:39', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(341, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-01 11:01:54', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(342, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-01 01:16:17', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(343, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-01 01:44:18', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(344, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-01 03:03:08', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(345, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-01 03:14:21', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(346, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 08:38:21', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(347, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:22:31', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(348, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:33:22', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(349, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:33:39', 'Point Person', '172.16.15.180', NULL),
(350, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:33:50', 'Point Person', '172.16.15.180', NULL),
(351, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:34:02', 'Approver', '172.16.15.180', NULL),
(352, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:34:18', 'Approver', '172.16.15.180', NULL),
(353, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:34:51', 'Approver', '172.16.15.180', NULL);
INSERT INTO `logs` (`id`, `user_id`, `name`, `transaction_type`, `office`, `date_created`, `role`, `ip_address`, `remarks`) VALUES
(354, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:36:10', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(355, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:38:27', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(356, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:38:36', 'Point Person', '172.16.15.180', NULL),
(357, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:38:50', 'Approver', '172.16.15.180', NULL),
(358, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:39:51', 'Point Person', '172.16.15.180', NULL),
(359, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:40:05', 'Approver', '172.16.15.180', NULL),
(360, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:40:44', 'Approver', '172.16.15.180', NULL),
(361, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:41:13', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(362, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:43:22', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(363, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:48:01', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(364, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:49:32', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(365, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:49:51', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(366, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:51:26', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(367, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:51:58', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(368, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 09:52:19', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(369, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 09:52:34', 'Point Person', '172.16.15.180', 'User (mac2manaois1998@gmail.com) has submitted a request with ff: Name of Corporation: Sample Form 1 TIN: 12312323 SEC Number: asd eLA No.:  Tax Year:  FAN No.: ads Amount: dsa Documents Requested: 1'),
(370, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 09:52:46', 'Point Person', '172.16.15.180', 'User (mac2manaois1998@gmail.com) has submitted a request with ff: Name of Corporation: Sample Form 2 TIN: ds SEC Number: dsa eLA No.:  Tax Year:  FAN No.: asd Amount: asd Documents Requested: dsa'),
(371, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 09:52:54', 'Point Person', '172.16.15.180', 'User (mac2manaois1998@gmail.com) has submitted a request with ff: Name of Corporation: Sample Form 3 TIN: as SEC Number: dsa eLA No.:  Tax Year:  FAN No.: as Amount: as Documents Requested: ds'),
(372, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 09:53:02', 'Point Person', '172.16.15.180', 'User (mac2manaois1998@gmail.com) has submitted a request with ff: Name of Corporation: Sample Form 4 TIN: ds SEC Number: asd eLA No.:  Tax Year:  FAN No.: asd Amount: asd Documents Requested: ds'),
(373, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 09:54:19', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(374, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-02 09:59:29', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(375, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:06:18', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(376, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:06:45', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(377, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:07:02', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(378, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:07:57', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(379, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:08:44', 'Point Person', '172.16.15.180', NULL),
(380, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:09:07', 'Approver', '172.16.15.180', NULL),
(381, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:10:46', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(382, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:13:57', 'Point Person', '172.16.15.180', NULL),
(383, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:19:28', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(384, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:19:54', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(385, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:21:53', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(386, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:23:33', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(387, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-02 10:37:21', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(388, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 10:43:27', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(389, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 01:20:52', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(390, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 01:56:59', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(391, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 01:57:20', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(392, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 02:21:35', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(393, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 03:25:43', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(394, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-02 03:27:24', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(395, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 11:10:30', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(396, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 01:14:53', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(397, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 01:26:21', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(398, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 03:32:13', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(399, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 03:32:20', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: RMO No. 1-2025.pdf'),
(400, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 03:49:48', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(401, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 03:51:02', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(402, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 03:53:58', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(403, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-06 04:11:44', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(404, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 08:53:08', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(405, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 09:07:11', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(406, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 09:10:51', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(407, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 09:34:32', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(408, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 09:41:17', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(409, 1, 'Admin 123456', 'CREATE USER', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 09:41:46', 'Administrator', '172.16.15.180', 'Administrator (Admin 123456) has created a user with the ff credentials: First Name: Manuel Last Name: Manaois Jr. Email: manuelmanaois98@gmail.com Office: '),
(410, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 10:01:01', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(411, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 10:25:37', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(412, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 10:33:15', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(413, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 10:39:56', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(414, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:01:34', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(415, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-07 02:01:58', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(416, 27, 'Person Point', 'SUBMIT', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-07 02:05:56', 'Point Person', '172.16.15.180', 'User (pointperson@mail.com) has submitted a request with ff: Name of Corporation: Bureau of Internal Revenue TIN: 321231321 SEC Number: asdadsadsadsds eLA No.: 202400006795 Tax Year: 2015 FAN No.:  Amount:  Documents Requested: 1, 2'),
(417, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:08:20', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(418, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:15:55', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(419, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:17:57', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(420, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:26:23', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(421, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:27:56', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(422, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:38:50', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(423, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-07 02:43:54', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(424, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:44:14', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(425, 28, 'Manuel Jr. Manaois', 'LOGIN', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-07 02:48:58', 'Point Person', '172.16.15.180', 'Logged in as: Manuel Jr. Manaois (mac2manaois1998@gmail.com)'),
(426, 28, 'Manaois Manuel Jr.', 'SUBMIT', 'Revenue District Office No. 11 - Tabuk City, Kalinga', '2025-10-07 02:49:20', 'Point Person', '172.16.15.180', 'User (mac2manaois1998@gmail.com) has submitted a request with ff: Name of Corporation: Bureau of Internal Revenue TIN: 123456123 SEC Number: test eLA No.: test Tax Year: 2015 FAN No.:  Amount:  Documents Requested: 1'),
(427, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-07 02:50:08', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(428, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-08 08:37:18', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(429, 27, 'Point Person', 'LOGIN', 'Revenue District Office No. 18 - Olongapo City, Zambales', '2025-10-08 08:52:45', 'Point Person', '172.16.15.180', 'Logged in as: Point Person (pointperson@mail.com)'),
(430, 1, 'Admin 123456', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 09:21:57', 'Administrator', '172.16.15.180', 'Logged in as: Admin 123456 (admin@mail.com)'),
(431, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 01:17:21', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(432, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 01:42:50', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(433, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 01:54:55', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(434, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 01:56:45', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: AOI-something.pdf'),
(435, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 01:58:39', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: AOI-something.pdf'),
(436, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:08:17', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(437, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:08:38', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: AOI-something.pdf'),
(438, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:09:54', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: GIS-123456789.pdf'),
(439, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:10:44', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: BL-3216541564561.pdf'),
(440, 26, 'Test Approver', 'UPLOAD', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:10:51', 'Approver', '172.16.15.180', 'User (approver@mail.com) has uploaded the file: AFS-12345678945512.pdf'),
(441, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:36:43', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(442, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:44:43', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(443, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 02:58:08', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(444, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 03:05:29', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(445, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-08 03:43:18', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)'),
(446, 26, 'Approver Test', 'LOGIN', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', '2025-10-09 10:26:16', 'Approver', '172.16.15.180', 'Logged in as: Approver Test (approver@mail.com)');

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
  `created_date` timestamp(6) NULL DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rejected_by` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `edited_date` timestamp(6) NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `approver_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `nameOfCorp`, `tin`, `secNum`, `elaNum`, `taxYear`, `fanNum`, `amount`, `docsRequested`, `created_date`, `ip_address`, `status`, `email`, `Remarks`, `user_id`, `rejected_by`, `approved_by`, `edited_date`, `approver_user_id`) VALUES
(51, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-09-03 01:31:49.604083', '172.16.15.180', 'Rejected', NULL, 'Sample Remarks', NULL, NULL, NULL, NULL, NULL),
(52, 'Juan', 'asd', 'ads', 'dsa', 'N/A', 'N/A', 'ads', 'ads', 'ads', '2025-06-24 01:32:17.205587', '172.16.15.180', 'Rejected', NULL, '', NULL, NULL, NULL, NULL, NULL),
(53, 'Array', 'asd', 'asd', 'ads', 'ads', 'asd', 'N/A', 'N/A', 'ads', '2025-09-03 01:31:58.426427', '172.16.15.180', 'Rejected', NULL, 'Sample Remarks', NULL, NULL, NULL, NULL, NULL),
(54, 'juandelacruz@gmail.com', 'asd', 'asd', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:30.681782', '172.16.15.180', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'makak@gmail.com', 'ads', 'ads', 'ads', 'ads', 'ads', 'N/A', 'N/A', 'ads', '2025-03-25 08:35:34.132298', '172.16.15.180', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'admin@mail.com', 'Bureau of Internal Revneue', '433799685', 'asd', 'asd', 'asd', 'N/A', 'N/A', 'asd', '2025-06-23 01:32:53.314997', '172.16.15.180', 'Rejected', NULL, '', NULL, NULL, NULL, NULL, NULL),
(57, 'Admin Admin', 'buera', 'asdasdzxczcx', 'adsczcxxasdzxc', 'N/A', 'N/A', 'zcxzcxzxasads', 'zxczcxczxadsasd', 'zcxzxvzvdnbxbnvc', '2025-06-23 01:33:43.286582', '172.16.15.180', 'Approved', 'admin@mail.com', '', NULL, NULL, NULL, NULL, NULL),
(58, 'Admin Admin', 'Bureau of Internal Revneue', '000-111-111', 'ads', 'asd', 'asd', 'N/A', 'N/A', 'SEC Document', '2025-06-23 06:15:16.631018', '172.16.15.180', 'Approved', 'admin@mail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Admin Admin', 'Commission on Audit', '111-222-333', '123456789', '123456', '2025', 'N/A', 'N/A', 'AFS', '2025-06-24 01:36:53.686779', '172.16.15.180', 'Approved', 'admin@mail.com', '', NULL, NULL, NULL, NULL, NULL),
(60, 'makak manoys', 'BIR National University', '123456789', '505050050505', 'adsaasd', 'asdsad', 'N/A', 'N/A', 'ads', '2025-09-03 07:16:57.543122', '172.16.15.180', 'Rejected', 'makak@gmail.com', 'nsddfgndsfgnsfdg', NULL, NULL, NULL, NULL, NULL),
(61, 'makak manoys', 'Test Corporation', '123456789', '12312312313', 'ads', 'asd', 'N/A', 'N/A', 'ds', '2025-06-24 01:52:49.233569', '172.16.15.180', 'Approved', 'makak@gmail.com', '', NULL, NULL, NULL, NULL, NULL),
(62, 'Sample Name', 'Test Copr', '123456789', 'asdasd', 'asd', 'asd', 'N/A', 'N/A', 'ds', '2025-10-02 06:04:48.614904', '172.16.15.180', 'Rejected', 'asdasd@asdasd.com', '', 26, NULL, NULL, NULL, NULL),
(63, 'Point Person', 'Bureau of Internal Revneue', '12312323', 'ads', 'ads', 'ads', 'N/A', 'N/A', '1', '2025-10-02 01:48:12.901003', '172.16.15.180', 'Rejected', 'pointperson@mail.com', 'Ssample Remarks', 27, NULL, NULL, NULL, NULL),
(64, 'Point Person', 'Bureau of Internal Reveneue', '12312324', 'ads', 'asd', 'asd', 'N/A', 'N/A', '1', '2025-10-02 01:54:28.043562', '172.16.15.180', 'Rejected', 'pointperson@mail.com', 'Sample Reject ', 27, NULL, NULL, '2025-10-01 16:00:00.000000', NULL),
(65, 'Point Person', 'Bureau of Internal Revneue', '12312324', 'ads', 'asd', 'sad', 'N/A', 'N/A', '1', '2025-10-02 02:46:49.667495', '172.16.15.180', 'Approved', 'pointperson@mail.com', '', 27, NULL, NULL, '2025-10-01 16:00:00.000000', NULL),
(66, 'Point Person', 'Bureau of Internal Revneue', '12312324', 'asd', 'N/A', 'N/A', 'asd', 'dsa', '1', '2025-08-29 01:32:47.000000', '172.16.15.180', 'Rejected', 'pointperson@mail.com', 'Reject pls', 27, NULL, NULL, '2025-10-02 06:15:21.323772', NULL),
(67, 'Manuel Jr. Manaois', 'Sample Corporation', '123212321', '123212321', 'ads', 'asd', 'N/A', 'N/A', '1', '2025-10-02 02:10:30.098004', '172.16.15.180', 'Rejected', 'mac2manaois1998@gmail.com', 'Ssample Reject ulit', 28, NULL, NULL, '2025-10-02 06:16:05.585891', NULL),
(68, 'Manuel Jr. Manaois', 'Sample Request', '123123122', '12312312312b331', 'ads', 'asd', 'N/A', 'N/A', '313', '2025-10-02 02:10:26.877854', '172.16.15.180', 'For Approval', 'mac2manaois1998@gmail.com', 'SAMPLE REMARKS HAYAYAAAA HELELOLLOLO', 28, NULL, NULL, NULL, NULL),
(69, 'Manuel Jr. Manaois', 'Sample Form 1', '12312323', 'asd', 'N/A', 'N/A', 'ads', 'dsa', '1', '2025-10-02 02:10:25.578116', '172.16.15.180', 'For Approval', 'mac2manaois1998@gmail.com', 'Sample Reject again', 28, NULL, NULL, NULL, NULL),
(70, 'Manuel Jr. Manaois', 'Sample Form 2', 'ds', 'dsa', 'N/A', 'N/A', 'asd', 'asd', 'dsa', '2025-10-02 02:10:23.776507', '172.16.15.180', 'For Approval', 'mac2manaois1998@gmail.com', 'Sample Reject PLs', 28, NULL, NULL, NULL, NULL),
(71, 'Manuel Jr. Manaois', 'Sample Form 3', 'as', 'dsa', 'N/A', 'N/A', 'as', 'as', 'ds', '2025-10-02 02:10:22.067508', '172.16.15.180', 'Rejected', 'mac2manaois1998@gmail.com', 'Sample Reject No .1', 28, 'Approver Test', NULL, '2025-10-06 07:56:47.159013', 26),
(72, 'Manuel Jr. Manaois', 'Sample Form 4', 'ds', 'asd', 'N/A', 'N/A', 'asd', 'asd', 'ds', '2025-10-02 06:10:55.809031', '172.16.15.180', 'Rejected', 'mac2manaois1998@gmail.com', 'Sample Remarks', 28, NULL, NULL, NULL, NULL),
(73, 'Point Person', 'Bureau of Internal Revenue', '321231321', 'asdadsadsadsds', '202400006795', '2015', 'N/A', 'N/A', '1, 2', '2025-10-06 18:05:56.000000', '172.16.15.180', 'Approved', 'pointperson@mail.com', '', 27, NULL, NULL, '2025-10-06 18:51:17.000000', NULL),
(74, 'Manuel Jr. Manaois', 'Bureau of Internal Revenue', '123456123', 'test', 'test', '2015', 'N/A', 'N/A', '1', '2025-10-06 18:49:20.000000', '172.16.15.180', 'Rejected', 'mac2manaois1998@gmail.com', 'Sample Remarks', 28, 'Approver Test', NULL, '2025-10-07 06:50:43.843704', 26);

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
  `file_path` varchar(255) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `email`, `filename`, `date`, `ip_address`, `user_id`, `file_path`, `file_type`) VALUES
(27, 'Approver Test', 'approver@mail.com', 'AFS-12345678945512.pdf', '2025-10-08', '172.16.15.180', 26, './uploads/AFS-12345678945512.pdf', 'Audited Financial Statements'),
(26, 'Approver Test', 'approver@mail.com', 'BL-3216541564561.pdf', '2025-10-08', '172.16.15.180', 26, './uploads/BL-3216541564561.pdf', 'By-Laws'),
(25, 'Approver Test', 'approver@mail.com', 'GIS-123456789.pdf', '2025-10-08', '172.16.15.180', 26, './uploads/GIS-123456789.pdf', 'General Information Sheet'),
(24, 'Approver Test', 'approver@mail.com', 'AOI-something.pdf', '2025-10-08', '172.16.15.180', 26, './uploads/AOI-something.pdf', 'Articles of Incorporation');

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
  `office` varchar(255) DEFAULT NULL,
  `rdo_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_ban`, `role`, `office`, `rdo_code`) VALUES
(1, 'Admin', '123456', 'admin@mail.com', '$2y$10$S0ithJy368hu8Z3tyHAqJuVUIVRIIU5jx0G8g2Yo54/FR2DSBAi2G', 0, 'Administrator', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', NULL),
(17, 'Juana', 'Dela Cruz', 'juandelacruz@gmail.com', '$2y$10$D58cNQWKipksAgT3VYlhMu2QNnSXXGYpwHOqVb1fY/MwCGYLqcQ1i', 0, 'Point Person', NULL, NULL),
(18, 'Liam', 'Miller', 'liammiller@gmail.com', '$2y$10$J5WJfVOSFL1NeIPpNMY93uDmKGzUDt9JoSePdtQwiXCqEmYDYcW5G', 0, 'Administrator', NULL, NULL),
(19, 'Louise', 'Beckham', 'louisebeckham@yahoo.com', '$2y$10$lxBUeELueVmvsy.XLPST1ulwHVYP38u9fFgXFyeTeZgKmiV7rIRy.', 0, 'Point Person', NULL, NULL),
(20, 'Steven', 'Holmes', 'stevenholmes@hotmail.com', '$2y$10$FTZVB8uZnWQqbjWTPSxyIOsTeRfK6Q0KO0lV7wjKhx5cnG/4vo1T.', 0, 'Approver', NULL, NULL),
(21, 'Mike', 'Bailey', 'mikebailey@gmail.com', '$2y$10$WIFX1M6wXZucJFXgZB7.u.5FVpNF6G6Fty47qfWoS6lfrgbZ0ocn6', 1, 'Administrator', NULL, NULL),
(22, 'Charlie', 'Monroe', 'charliemonroe@gmail.com', '$2y$10$yZWQI6E4K5xbM0IlvfDtO.lX3Mve5HkqMEsp9TAr3i0kkbcF9JZ9O', 1, 'Point Person', NULL, NULL),
(23, 'Fiona', 'Watson', 'fionawatson@yahoo.com', '$2y$10$pp1RBMTciEE8qB2KlBCcwuT1h.GaAnIpDMSpnAOmURGhWjoHIdV5S', 1, 'Administrator', NULL, NULL),
(24, 'Sample', 'Name', 'asdasd@asdasd.com', '$2y$10$a4czMTaFWXBSHelmFJzVXu0N6VS7OS4lLLMdEzQt8wY9x6Sj7Hxjy', 0, 'Point Person', NULL, NULL),
(25, 'makak', 'manoys', 'makak@gmail.com', '$2y$10$bIkP5lgS3lKEQVVYnCHEo.lg940GsmWygpkjBxoP7msjMoBnmvSHy', 0, 'Point Person', NULL, NULL),
(26, 'Approver', 'Test', 'approver@mail.com', '$2y$10$41m/gO8G7pqrM40hqCuYdeA11Yp9NgHL5D4MhbdwmhS47byCCGFKO', 0, 'Approver', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', NULL),
(27, 'Point', 'Person', 'pointperson@mail.com', '$2y$10$SOWyrCshYYohdAhLscduS.LNgXccr7REy8UL4WvX9wEBDbzmsM6ze', 0, 'Point Person', 'Revenue District Office No. 18 - Olongapo City, Zambales', NULL),
(28, 'Manuel Jr.', 'Manaois', 'mac2manaois1998@gmail.com', '$2y$10$wuRsoMdPvbacSECAEU0AXuWZu4N.S4/y7ZCJoFN6OlI6h/yRlW.Pu', 0, 'Point Person', 'Revenue District Office No. 11 - Tabuk City, Kalinga', NULL),
(30, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$BRrTcikycdVmBMGrM2e9y.Kd/sk8lNFFx9JR3FpObG7WK3Kf4.d8m', 0, 'Administrator', 'Revenue District Office No. 18 - Olongapo City, Zambales', NULL),
(31, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$GlrHb2ceVX9hLEVHS2rPHO1vwOVUteu1p9BdfgVwBmIiLhTdoXHN.', 0, 'Administrator', 'Revenue District Office No. 18 - Olongapo City, Zambales', NULL),
(32, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$rdl4bXlysW..Ea6BZgpQtedyD4Y.HQgb8p4uIjd69VhC6QTUHz4RS', 0, 'Administrator', 'Revenue District Office No. 18 - Olongapo City, Zambales', NULL),
(33, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$vSl3fmoxijUYxUq2ZHJfWOmv94nh5c45eyZBh.OMfrYEV6EjeMtV6', 0, 'Administrator', 'Revenue District Office No. 17A - Tarlac City, Tarlac', NULL),
(34, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$4zV5N2Tn6hUpmkdH.LU8a.Ft17FXMsS6TDQxWG.EAHaljDJYNJ5kS', 0, 'Administrator', 'Revenue District Office No. 11 - Tabuk City, Kalinga', NULL),
(35, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$8UeXjG/yGYD2iFE8fUkTHOP2GDj5Wr/XjJRa5gCkpMa9xazDBRClS', 0, 'Administrator', 'Revenue District Office No. 14 - Bayombong, Nueva Vizcaya', NULL),
(36, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$Zz0fWkfUlpwFvf.73YdnWOwvMMU/a/K3KSK1dqz2V/gcS72iClyfe', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(37, 'Makak', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$sZl5or89JLVU5iJUYMEKCeKkJOWedd2YLQOdrNsbCr35hOm2O2TrS', 0, 'Administrator', 'Revenue District Office No. 9 - La Trinidad, Benguet', NULL),
(38, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$UVwY.cv5bN3TRMm..eFEIOXmRwZqxOKqewHKhXmLMC8w/DAyL1.Uy', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(39, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$xm826zL7GGHLLBI.Gl9raO2iEDosAEEqm9pXvgqfou0Wec1wuzTVi', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(40, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$EDIBADqJotFZnFEJirrrXOCuTISfjmRwJQpitfxOg3oYG6LprVFka', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(41, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$26vl/1FZspNs6Eu2FxSK0OblmGxVbnjflqfXJH/wIXGa5lixoEkN6', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(42, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$gtTsVUSV3u92qVSkAX4VEuG.q.JMjiGOcBhKo37Ulg3rcN1UaLh3q', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(43, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$IiWQ5QeLRlfCV9GuLkPmee3ulZl.EmEFSiIXDc294SjH3ir8imnBS', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(44, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$s/fojf0RKV956MlVnt.UR.VJtaaNgRZcjsY4mV64vvI4juTK.LTsq', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(45, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$HVj3MvggZQmONgtRqvjw2uoAAkQeutDKxFQo738cRBzyf.thJfeiq', 0, 'Administrator', 'Revenue District Office No. 8 - Baguio City', NULL),
(46, 'Makakzzzzz', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$jZ83shAlGTBQ4ABTdHCogehcPvwYnD3AQYDZFjc.1.eIcjVNuLG3m', 0, 'Administrator', 'Revenue District Office No. 15 - Naguilian, Isabela', NULL),
(47, 'Makakzzzzz123123', 'Makakzzzzzzzzzz', 'makakz@gmail.com', '$2y$10$rQYKQfxv5TrJZqh0MV8bJ..GNl.Wp6/iDPPjGzIPRAEj89Sb388aq', 0, 'Administrator', 'Revenue District Office No. 1 - Laoag City, Ilocos Norte', NULL),
(48, 'Manuel', 'Manaois Jr.', 'manuelmanaois98@gmail.com', '$2y$10$xUAXcyXevYsCDushc3KmteMLkRgMmMUDAkBKo1BMt41OqTJvSAyca', 0, 'Administrator', NULL, '8');

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `rdo`
--
ALTER TABLE `rdo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

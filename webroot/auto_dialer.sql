-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2021 at 11:20 AM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.2.34-22+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_dialer`
--

-- --------------------------------------------------------

--
-- Table structure for table `callback_history`
--

CREATE TABLE `callback_history` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `iptsp_id` int NOT NULL,
  `call_from` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_to` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_status` tinyint NOT NULL,
  `call_duration` int NOT NULL,
  `connect_time` int NOT NULL,
  `establish_time` int NOT NULL,
  `disconnect_time` int NOT NULL,
  `disconnect_cause` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `callback_history`
--

INSERT INTO `callback_history` (`id`, `users_id`, `iptsp_id`, `call_from`, `call_to`, `call_status`, `call_duration`, `connect_time`, `establish_time`, `disconnect_time`, `disconnect_cause`, `created`, `modified`) VALUES
(1, 1, 1, '01717137361', '01841137361', 0, 0, 1584272411, 0, 1584272420, 0, '2020-03-15 17:40:21', '2020-03-15 17:40:21'),
(2, 3, 1, '01717137361', '01841137361', 0, 0, 1584272550, 1584272557, 1584272564, 0, '2020-03-15 17:42:44', '2020-03-15 17:42:44'),
(3, 3, 1, '01717137361', '01841137361', 0, -15, 1584272623, 1584272629, 1584272644, 0, '2020-03-15 17:44:05', '2020-03-15 17:44:05'),
(4, 3, 1, '01717137361', '01841137361', 0, 9, 1584272696, 1584272702, 1584272711, 0, '2020-03-15 17:45:12', '2020-03-15 17:45:12'),
(5, 3, 1, '01717137361', '01841137361', 1, 6, 1584272781, 1584272791, 1584272797, 0, '2020-03-15 17:46:38', '2020-03-15 17:46:38'),
(6, 3, 1, '01717137361', '01841137361', 0, 0, 1584273023, 0, 1584273029, 0, '2020-03-15 17:50:30', '2020-03-15 17:50:30'),
(7, 3, 1, '01717137361', '01841137361', 0, 0, 1584263511, 0, 1584263513, 0, '2020-03-16 10:19:12', '2020-03-16 10:19:12'),
(8, 3, 1, '01717137361', '01841137361', 0, 0, 1584263525, 0, 1584263532, 0, '2020-03-16 10:19:30', '2020-03-16 10:19:30'),
(9, 3, 1, '01717137361', '01841137361', 0, 0, 1584341022, 0, 1584341031, 0, '2020-03-16 12:43:52', '2020-03-16 12:43:52'),
(10, 3, 1, '01521338378', '01841137361', 0, 0, 1584341798, 0, 1584341811, 0, '2020-03-16 12:56:52', '2020-03-16 12:56:52'),
(11, 3, 1, '01717137361', '01841137361', 0, 0, 1584356111, 0, 1584356117, 0, '2020-03-16 16:55:18', '2020-03-16 16:55:18'),
(12, 6, 2, '01717137361', '01841137361', 1, 17, 1584361135, 1584361147, 1584361164, 0, '2020-03-16 18:19:25', '2020-03-16 18:19:25'),
(13, 3, 1, '01717137361', '01841137361', 0, 0, 1584513564, 0, 1584513573, 0, '2020-03-18 12:39:34', '2020-03-18 12:39:34'),
(14, 6, 2, '01521338378', '01707123000', 0, 0, 1584514780, 0, 1584514790, 0, '2020-03-18 12:59:51', '2020-03-18 12:59:51'),
(15, 6, 2, '01707123000', '01841137361', 0, 0, 1584514815, 0, 1584514819, 480, '2020-03-18 13:00:20', '2020-03-18 13:00:20'),
(16, 1, 2, '01707123000', '01841137361', 0, 0, 1584514826, 0, 1584514830, 480, '2020-03-18 13:00:31', '2020-03-18 13:00:31'),
(17, 3, 1, '01717137361', '01841137361', 0, 0, 1584529105, 0, 1584529113, 0, '2020-03-18 16:58:34', '2020-03-18 16:58:34'),
(18, 3, 1, '01717137361', '01841137361', 0, 0, 1584531510, 0, 1584531522, 0, '2020-03-18 17:38:43', '2020-03-18 17:38:43'),
(19, 3, 1, '01717137361', '01841137361', 0, 0, 3179, 0, 3179, 0, '2020-03-19 12:13:22', '2020-03-19 12:13:22'),
(20, 3, 1, '01717137361', '01841137361', 0, 0, 3397, 0, 3397, 0, '2020-03-19 12:16:59', '2020-03-19 12:16:59'),
(21, 3, 1, '01717137361', '01841137361', 0, 0, 3592, 0, 3592, 0, '2020-03-19 12:20:14', '2020-03-19 12:20:14'),
(22, 3, 1, '01717137361', '01841137361', 0, 0, 3823, 0, 3823, 0, '2020-03-19 12:24:06', '2020-03-19 12:24:06'),
(23, 3, 1, '01717137361', '01841137361', 0, 0, 3899, 0, 3899, 0, '2020-03-19 12:25:21', '2020-03-19 12:25:21'),
(24, 1, 1, '01717137361', '01841137361', 0, 0, 4033, 0, 4033, 0, '2020-03-19 12:27:35', '2020-03-19 12:27:35'),
(25, 3, 1, '01717137361', '01841137361', 0, 0, 4286, 0, 4286, 0, '2020-03-19 12:31:48', '2020-03-19 12:31:48'),
(26, 3, 1, '01717137361', '01841137361', 0, 0, 4480, 0, 4480, 0, '2020-03-19 12:35:02', '2020-03-19 12:35:02'),
(27, 3, 1, '01717137361', '01841137361', 0, 0, 5433, 0, 5434, 0, '2020-03-19 12:50:56', '2020-03-19 12:50:56'),
(28, 3, 1, '01717137361', '01841137361', 0, 0, 6086, 0, 6086, 0, '2020-03-19 13:01:48', '2020-03-19 13:01:48'),
(29, 3, 1, '01717137361', '01841137361', 0, 0, 6228, 0, 6228, 0, '2020-03-19 13:04:11', '2020-03-19 13:04:11'),
(30, 3, 1, '01717137361', '01841137361', 0, 0, 6469, 0, 6469, 0, '2020-03-19 13:08:11', '2020-03-19 13:08:11'),
(31, 3, 1, '01717137361', '01841137361', 0, 0, 6550, 0, 6551, 0, '2020-03-19 13:09:33', '2020-03-19 13:09:33'),
(32, 3, 1, '01717137361', '01841137361', 0, 0, 6559, 0, 6559, 0, '2020-03-19 13:09:42', '2020-03-19 13:09:42'),
(33, 3, 1, '01717137361', '01841137361', 0, 0, 6587, 0, 6587, 0, '2020-03-19 13:10:09', '2020-03-19 13:10:09'),
(34, 3, 1, '01717137361', '01841137361', 0, 0, 6793, 0, 6793, 0, '2020-03-19 13:13:36', '2020-03-19 13:13:36'),
(35, 3, 1, '01717137361', '01841137361', 0, 0, 6844, 0, 6844, 0, '2020-03-19 13:14:26', '2020-03-19 13:14:26'),
(36, 3, 1, '01717137361', '01841137361', 0, 0, 6862, 0, 6862, 0, '2020-03-19 13:14:44', '2020-03-19 13:14:44'),
(37, 3, 1, '01717137361', '01841137361', 0, 0, 6881, 0, 6881, 0, '2020-03-19 13:15:03', '2020-03-19 13:15:03'),
(38, 3, 1, '01717137361', '01841137361', 0, 0, 6986, 0, 6986, 0, '2020-03-19 13:16:48', '2020-03-19 13:16:48'),
(39, 3, 1, '01717137361', '01841137361', 0, 0, 7067, 0, 7067, 0, '2020-03-19 13:18:10', '2020-03-19 13:18:10'),
(40, 3, 1, '01717137361', '01841137361', 0, 0, 7089, 0, 7091, 0, '2020-03-19 13:18:34', '2020-03-19 13:18:34'),
(41, 3, 1, '01717137361', '01841137361', 0, 0, 7103, 0, 7103, 0, '2020-03-19 13:18:46', '2020-03-19 13:18:46'),
(42, 3, 1, '01717137361', '01841137361', 0, 0, 7172, 0, 7172, 0, '2020-03-19 13:19:54', '2020-03-19 13:19:54'),
(43, 3, 1, '01521338378', '01841137361', 0, 0, 22047, 0, 22052, 0, '2020-03-19 17:27:54', '2020-03-19 17:27:54'),
(44, 3, 1, '01735520190', '01841137361', 0, 0, 1585977875, 0, 1585977885, 0, '2020-04-04 11:24:45', '2020-04-04 11:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` int NOT NULL,
  `campaigns_id` int NOT NULL,
  `users_id` int NOT NULL,
  `contacts_id` int NOT NULL,
  `contact_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retry_count` tinyint NOT NULL,
  `call_status` tinyint NOT NULL,
  `call_duration` int NOT NULL,
  `connect_time` int NOT NULL,
  `establish_time` int NOT NULL,
  `disconnect_time` int NOT NULL,
  `disconnect_cause` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calls_id` int NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_duration` int NOT NULL DEFAULT '0',
  `gateway_id` int NOT NULL,
  `frequency` int NOT NULL,
  `dialing` tinyint NOT NULL,
  `received` tinyint NOT NULL,
  `failed` tinyint NOT NULL,
  `busy` tinyint NOT NULL,
  `max_call_duration` int NOT NULL,
  `max_call_retry` int NOT NULL,
  `time_between_retries` int NOT NULL,
  `play_count` int NOT NULL DEFAULT '1',
  `caller_id_number` int NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekdays` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `finished_at` date NOT NULL,
  `daily_start_time` time NOT NULL,
  `daily_stop_time` time NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `users_id`, `calls_id`, `file_name`, `contact_groups`, `call_duration`, `gateway_id`, `frequency`, `dialing`, `received`, `failed`, `busy`, `max_call_duration`, `max_call_retry`, `time_between_retries`, `play_count`, `caller_id_number`, `description`, `weekdays`, `start_at`, `finished_at`, `daily_start_time`, `daily_stop_time`, `timezone`, `status`, `created`, `modified`) VALUES
(1, 'Special Offer', '1', 0, 'fileexamplemp3700kb--20-09-2021-1632134656603.g729', '1,5', 0, 3, 55, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'test', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun', '2021-09-15', '2021-09-24', '09:44:00', '11:44:00', 'Asia/Samarkand', 6, '2021-09-20 06:27:21', '2021-09-20 11:01:36'),
(2, 'Abir Hassan', '1', 0, 'fileexamplemp3700kb--20-09-2021-1632119553485.g729', '1,5', 0, 3, 30, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'test', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun', '2021-09-20', '2021-09-20', '12:32:01', '12:32:02', 'Pacific/Midway', 6, '2021-09-20 06:32:33', '2021-09-20 11:02:01'),
(3, 'Special Offer', '1', 0, 'fileexamplemp3700kb--20-09-2021-1632119596782.g729', '1,5', 0, 3, 55, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'test', 'Mon,Tue,Thu,Fri,Sun', '2021-09-20', '2021-09-20', '12:33:09', '12:33:09', 'Pacific/Midway', 6, '2021-09-20 06:33:16', '2021-09-20 11:02:30'),
(4, 'test', '1', 0, 'fileexamplemp3700kb--20-09-2021-1632134989820.g729', '5', 0, 3, 30, 0, 0, 0, 0, 10, 10, 10, 2, 0, 'test', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun', '2021-09-20', '2021-09-20', '16:49:22', '16:49:23', 'Asia/Dhaka', 6, '2021-09-20 10:49:49', '2021-09-20 11:02:34'),
(5, 'Abir Hassan', '2', 0, 'fileexamplemp3700kb--20-09-2021-1632135878871.g729', '5', 0, 3, 55, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'Test', 'Mon,Tue,Sat,Sun', '2021-01-20', '2021-09-20', '17:04:00', '17:04:00', 'Asia/Dhaka', 6, '2021-09-20 11:04:38', '2021-09-21 06:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `call_forwarding_to` varchar(255) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `fullname`, `company_name`, `address`, `phone`, `email`, `profileimage`, `call_forwarding_to`, `active`, `created`, `modified`) VALUES
(1, 'atik@infosoftbd.com', 'f4cc399f0effd13c888e310ea2cf5399', 'Abir Hassan', 'Kitcorders', '40/4/c East Hazipara', '01518307641', 'atik@infosoftbd.com', 'screenshot-from-2021-21-09-2021-1632222982179.png', '01518307641', 0, '2021-09-21 10:34:22', '2021-09-21 11:16:22'),
(2, 'atikasdf@infosoftbd.com', 'f4cc399f0effd13c888e310ea2cf5399', 'Nuruzzaman Khan', 'Kitcorders', '40/4/c East Hazipara', '012345687', 'khan@gmail.com', 'screenshot-from-2021-21-09-2021-1632222965708.png', '012345687', 0, '2021-09-21 10:36:49', '2021-09-21 11:16:05'),
(3, 'atikadf@infosoftbd.com', 'f4cc399f0effd13c888e310ea2cf5399', 'Abir Hassan', 'Kitcorders', '40/4/c East Hazipara', '01518307641', 'atik5asd@infosoftbd.com', 'screenshot-from-2021-21-09-2021-1632222954295.png', '01518307641', 0, '2021-09-21 10:40:47', '2021-09-21 11:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_groups_id` int DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `extra_information` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `users_id`, `mobile_no`, `contact_name`, `contact_groups_id`, `district`, `extra_information`, `created`, `modified`) VALUES
(1, 1, '0151836076', 'Atik Hassan', 1, 'Mymensing', '', '2021-09-19 04:34:33', '2021-09-19 06:27:57'),
(4, 1, '0124585122', 'test', 1, 'Dhaka', 'test', '2021-09-19 04:52:03', '2021-09-19 04:52:03'),
(6, 1, '0151836076', 'Atik Hassan', 5, 'Mymensing', NULL, '2021-09-19 04:56:58', '2021-09-19 04:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_groups`
--

CREATE TABLE `contact_groups` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_groups`
--

INSERT INTO `contact_groups` (`id`, `users_id`, `group_name`, `created`, `modified`) VALUES
(1, 1, 'test ', '2021-09-15 05:28:46', '2021-09-15 06:37:13'),
(5, 1, 'Dhaka Club', '2021-09-15 06:03:20', '2021-09-15 06:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE `gateway` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int NOT NULL,
  `call_rate` decimal(10,2) DEFAULT NULL,
  `call_pulse` int NOT NULL DEFAULT '60',
  `service_rate` decimal(10,2) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway`
--

INSERT INTO `gateway` (`id`, `name`, `users_id`, `ip`, `port`, `call_rate`, `call_pulse`, `service_rate`, `username`, `password`, `prefix`, `created`, `modified`) VALUES
(3, 'Abir Hassan', 1, '192.168.0.15', 15, NULL, 60, NULL, 'atik1245', 'atik1245', '15', '2021-09-19 09:53:23', '2021-09-19 09:53:23'),
(4, 'Abir Hassan', 1, '85', 15, NULL, 60, NULL, 'test', 'test', '20', '2021-09-20 11:55:02', '2021-09-20 11:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `iptsp`
--

CREATE TABLE `iptsp` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `iptsp_user` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iptsp_password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iptsp_ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iptsp_port` int NOT NULL,
  `iptsp_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forwarding_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_registered` int NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iptsp`
--

INSERT INTO `iptsp` (`id`, `users_id`, `iptsp_user`, `iptsp_password`, `iptsp_ip`, `iptsp_port`, `iptsp_number`, `forwarding_number`, `last_registered`, `created`) VALUES
(1, 4, '124589', '152469', '54238', 44555, '01245862333', '12458961', 0, '2021-09-21 05:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `company`, `address`, `image`, `status`, `created`, `modified`) VALUES
(2, 'Abir Hassan', 'atik@infosoftbd.com', 'e10adc3949ba59abbe56e057f20f883e', 'atik@infosoftbd.com', '01518307641', 'Infosoftbd test', '40/4/c East Hazipara', 'havells-jio-dry-iron-20-09-2021-1632143390306.jpg', 1, '2021-09-20 13:09:50', '2021-09-20 13:44:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callback_history`
--
ALTER TABLE `callback_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`,`contact_groups_id`);

--
-- Indexes for table `contact_groups`
--
ALTER TABLE `contact_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway`
--
ALTER TABLE `gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iptsp`
--
ALTER TABLE `iptsp`
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
-- AUTO_INCREMENT for table `callback_history`
--
ALTER TABLE `callback_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_groups`
--
ALTER TABLE `contact_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gateway`
--
ALTER TABLE `gateway`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iptsp`
--
ALTER TABLE `iptsp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

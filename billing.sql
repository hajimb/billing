-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2022 at 01:14 PM
-- Server version: 10.3.32-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `framework_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `role` text DEFAULT NULL COMMENT 'this field is used for admin sidebar access',
  `groups` text NOT NULL,
  `r_password` text DEFAULT NULL COMMENT 'Password in readable form',
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `framework_id`, `restaurant_id`, `status`, `created_date`, `modified_date`, `role`, `groups`, `r_password`, `is_deleted`) VALUES
(1, 'admin', 'admin', '', '', '0c0d1e46e5c0a1056d2fa630ade23acc', 0, 0, 'yes', '2015-02-24 11:44:22', '2017-07-10 12:39:28', 'admin', '1', '$QGP9AB!rVKj8hn', 0),
(2, 'user', 'admin2', 'add', 'a@a.com', 'a1d7d7e0c7e645825f0ac3d1b04957fc', 0, 2, 'no', '2021-02-18 11:44:22', '2021-02-18 12:39:28', 'user', '2', 'vqW!c9VO$hdVwS', 0),
(3, 'BimalP', 'bimal', 'pancholi', 'bjpancholi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 1, 'yes', '2021-08-26 14:09:32', '2021-12-01 03:15:50', 'admin', '2', '12345678', 0),
(4, 'krunal', 'krunal', 'patel', 'admin@321', '965b21f9b0929eb034918f57a06065a8', 0, 1, 'yes', '2021-10-24 12:09:28', '2021-12-01 03:15:54', NULL, '2', 'admin@321', 0),
(5, 'Test Resturant', 'Test', 'Test', 'test@thefudx.com', '0546896b4366e09bea80e1a890218b19', 0, 4, 'yes', '2021-12-02 18:21:15', '0000-00-00 00:00:00', NULL, '2', 'test@123$', 0),
(6, 'Test Waiter', 'Test Waiter', 'Waiter', 'testwaiter@thefudx.com', 'e85a468029c485e941fc05f80dc6a3d4', 0, 4, 'yes', '2021-12-02 18:22:49', '0000-00-00 00:00:00', NULL, '3', 'testwaiter@123$', 1),
(7, 'john_doe', 'John', 'Doe', 'john_doe@gmail.com', '88773a5342684a9223538352aac9add9', 0, 4, 'yes', '2021-12-03 06:38:06', '0000-00-00 00:00:00', NULL, '2', 'john_doe', 1),
(8, 'waiter_doe', 'Waiter', 'Doe', 'waiter_doe@gmail.com', '8829ce95fedb441e405e7dd3376bcb13', 0, 4, 'yes', '2021-12-03 06:46:00', '0000-00-00 00:00:00', NULL, '4', 'waiter_doe', 1),
(9, 'kitchen_doe', 'Kitchen', 'Doe', 'kitchen_doe@gmail.com', '33226d8fb464d106806ced81cad9501e', 0, 4, 'yes', '2021-12-03 07:11:32', '0000-00-00 00:00:00', NULL, '3', 'kitchen_doe', 1),
(10, 'Havemore  Owner', 'Prashant', 'Shah', 'testhavemore@gmail.com', '9aaf69a67448ae57d0b9d598d299c3e7', 0, 5, 'yes', '2021-12-03 08:42:26', '2022-01-11 16:15:35', NULL, '2', 'havemore@123$', 0),
(11, 'Havemore Kitchen', 'Ketan', 'Patel', 'kitchenhavemore@gmail.com', '9aaf69a67448ae57d0b9d598d299c3e7', 0, 5, 'yes', '2021-12-03 08:55:49', '0000-00-00 00:00:00', NULL, '3', 'havemore@123$', 0),
(12, 'Havemore Waiter', 'Tambi', 'Chootu', 'waiterhavemore@gmail.com', '9aaf69a67448ae57d0b9d598d299c3e7', 0, 5, 'yes', '2021-12-03 08:57:10', '2022-01-11 15:16:22', NULL, '4', 'havemore@123$', 0),
(13, 'Havemore Manager', 'Lalit', 'Shah', 'havemoremanager@gmail.com', '9aaf69a67448ae57d0b9d598d299c3e7', 0, 5, 'yes', '2021-12-03 08:57:56', '0000-00-00 00:00:00', NULL, '5', 'havemore@123$', 0),
(14, 'Tea post', 'Tea', 'Post', 'teapost@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2021-12-15 08:59:23', '0000-00-00 00:00:00', NULL, '2', '123456', 0),
(15, 'teapost waiter', 'manoj', 'shah', 'manoj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2021-12-15 14:09:39', '0000-00-00 00:00:00', NULL, '4', '123456', 0),
(16, 'teapost manager', 'manish', 'chavada', 'manish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2021-12-15 14:10:32', '0000-00-00 00:00:00', NULL, '5', '123456', 0),
(17, 'teapost  kitchen', 'kamal', 'singh', 'kamal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2021-12-15 14:11:11', '0000-00-00 00:00:00', NULL, '3', '123456', 0),
(18, 'Havemore Hotel', 'Pankaj', 'Patel', 'havemoretest343@gmail.com', '9aaf69a67448ae57d0b9d598d299c3e7', 0, 0, 'yes', '2021-12-31 05:09:32', '0000-00-00 00:00:00', NULL, '6', 'havemore@123$', 0),
(19, 'Punjab grill waiter', 'Sanjeev', 'Vedak', 'punjabgrill4534@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-01 12:27:53', '0000-00-00 00:00:00', NULL, '4', '123456', 0),
(20, 'Punjab grill kitchen', 'Samir', 'Patra', 'pn433444@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 09:08:15', '0000-00-00 00:00:00', NULL, '3', '123456', 0),
(21, 'Punjab grill manager', 'Hitesh', 'Bhumke', 'Hjh343344@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 09:09:10', '0000-00-00 00:00:00', NULL, '5', '123456', 0),
(22, 'Demo 1 waiter', 'Demo 1', 'Waiter', 'demo1waiter@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:18:59', '0000-00-00 00:00:00', NULL, '4', '123456', 0),
(23, 'Demo 1 Kitchen', 'Demo 1', 'Kitchen', 'demo1kitchen@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:20:07', '0000-00-00 00:00:00', NULL, '3', '123456', 0),
(24, 'Demo 1 Manager', 'Demo 1', 'Manager', 'demo1manager@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:24:21', '0000-00-00 00:00:00', NULL, '5', '123456', 0),
(25, 'Demo 2 Waiter', 'Demo 2', 'Waiter', 'demo2waiter@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:25:10', '0000-00-00 00:00:00', NULL, '4', '123456', 0),
(26, 'Demo 2 Kitchen', 'Demo 2', 'Kitchen', 'demo2kitchen@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:25:50', '0000-00-00 00:00:00', NULL, '3', '123456', 0),
(27, 'Demo 2 Manager', 'Demo 2', 'Manager', 'demo2manager@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:28:07', '0000-00-00 00:00:00', NULL, '5', '123456', 0),
(28, 'punjab da dhaba', 'daljeet', 'singh', 'daljeetsingh@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:40:05', '0000-00-00 00:00:00', NULL, '6', '123456', 0),
(29, 'punjab da dhaba waiter', 'manjeet', 'singh', 'manjeetsingh@billing.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'yes', '2022-01-04 13:41:47', '0000-00-00 00:00:00', NULL, '4', '123456', 0),
(30, 'Haji', 'haji', 'Haji', 'haji@badri.com', '7cec85c75537840dad40251576e5b757', 0, 5, 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2', '12356', 1),
(31, 'Arshad', 'arshad', 'shaikh', 'ars@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 5, 'yes', '2022-01-11 15:44:51', '0000-00-00 00:00:00', NULL, '2', '12345678', 1),
(32, 'haji', 'haji', 'haji', 'haji@gmail.com', '3d1102f8d75f56bc6de99aff5cd8d6ea', 0, 5, 'yes', '2022-01-11 15:48:14', '0000-00-00 00:00:00', NULL, '2', 'haji', 1),
(34, 'haji', 'haji', 'hajia', 'haji@gmail.com', '246d2517ce6bd77da0b62bccd15a802e', 0, 5, 'yes', '2022-01-11 15:57:38', '0000-00-00 00:00:00', NULL, '2', 'hfsjdfhsdakj', 1),
(35, 'Main Admin', 'Main', 'Admin', 'maindadmin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 'yes', '2022-01-14 14:19:10', '0000-00-00 00:00:00', NULL, '1', '123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_head`
--

DROP TABLE IF EXISTS `bill_head`;
CREATE TABLE `bill_head` (
  `Id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `items` int(11) NOT NULL,
  `bill_amt` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `tax_id` int(11) NOT NULL,
  `tax_amt` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(55) NOT NULL,
  `invoice_no` bigint(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `bill_type` varchar(55) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_head`
--

INSERT INTO `bill_head` (`Id`, `restaurant_id`, `table_id`, `name`, `mobile`, `items`, `bill_amt`, `discount_id`, `discount_amt`, `tax_id`, `tax_amt`, `total`, `status`, `invoice_no`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`, `bill_type`, `payment_type`, `is_active`) VALUES
(1, 5, 1, '', '', 2, 450, 0, 0, 0, 32.4, 572.4, 'BillPaid', 2201241, '2022-01-24 19:05:31', '2022-01-24 19:05:31', 10, 10, 0, 'dinein', 'Cash', 1),
(2, 5, 1, '', '', 1, 60, 0, 0, 0, 19.2, 339.2, 'BillPaid', 2201242, '2022-01-24 19:07:43', '2022-01-24 19:07:43', 10, 10, 0, 'dinein', 'Cash', 1),
(3, 5, 1, '', '', 2, 452, 0, 0, 0, 73.62, 1300.62, 'BillPaid', 2201243, '2022-01-24 19:09:35', '2022-01-24 19:09:35', 10, 10, 0, 'dinein', 'Cash', 1),
(4, 5, 8, '', '', 2, 310, 0, 0, 0, 18.6, 328.6, 'BillPaid', 2201244, '2022-01-24 19:10:54', '2022-01-24 19:10:54', 10, 10, 0, 'dinein', 'Cash', 1),
(5, 5, 1, '', '', 3, 150, 0, 0, 0, 9, 159, 'BillPaid', 2201245, '2022-01-24 19:11:02', '2022-01-24 19:11:02', 10, 10, 0, 'dinein', 'Cash', 1),
(6, 5, 1, '', '', 2, 250, 0, 0, 0, 33.6, 593.6, 'OrderTaken', 2201256, '2022-01-25 17:35:24', '2022-01-25 17:35:24', 10, 10, 0, 'dinein', '', 1),
(7, 5, 1, '', '', 2, 250, 0, 0, 0, 15, 265, 'BillPaid', 2201257, '2022-01-25 17:35:48', '2022-01-25 17:35:48', 10, 10, 0, 'dinein', 'Cash', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_item`
--

DROP TABLE IF EXISTS `bill_item`;
CREATE TABLE `bill_item` (
  `Id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `kot_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_item`
--

INSERT INTO `bill_item` (`Id`, `bill_id`, `kot_id`, `created_date`) VALUES
(1, 1, 1, '2022-01-24 19:05:31'),
(2, 1, 2, '2022-01-24 19:06:04'),
(3, 2, 3, '2022-01-24 19:07:43'),
(4, 2, 4, '2022-01-24 19:08:54'),
(5, 3, 5, '2022-01-24 19:09:35'),
(6, 3, 6, '2022-01-24 19:09:44'),
(7, 3, 7, '2022-01-24 19:10:27'),
(8, 4, 8, '2022-01-24 19:10:54'),
(9, 5, 9, '2022-01-24 19:11:02'),
(10, 6, 10, '2022-01-25 17:35:24'),
(11, 7, 11, '2022-01-25 17:35:48'),
(12, 6, 12, '2022-01-28 15:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `bill_item1`
--

DROP TABLE IF EXISTS `bill_item1`;
CREATE TABLE `bill_item1` (
  `Id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `restaurant_id`, `category`, `modified_date`, `created_date`, `is_deleted`) VALUES
(2, 5, 'Chinese', '2022-01-14 11:51:47', '2021-08-04 17:19:22', 0),
(3, 5, 'South Indian', '0000-00-00 00:00:00', '2021-08-04 17:19:28', 0),
(4, 5, 'Panjabi', '0000-00-00 00:00:00', '2021-08-04 17:19:49', 0),
(5, 5, 'Gujrati', '0000-00-00 00:00:00', '2021-08-04 17:19:57', 1),
(7, 5, 'Indian Subzi', '0000-00-00 00:00:00', '2021-08-16 07:59:13', 0),
(8, 5, 'Starter', '0000-00-00 00:00:00', '2021-12-08 06:56:42', 0),
(9, 5, 'Soup', '0000-00-00 00:00:00', '2021-12-10 07:05:26', 0),
(10, 5, 'Tea', '0000-00-00 00:00:00', '2021-12-15 15:18:49', 0),
(11, 5, 'Desert', '0000-00-00 00:00:00', '2021-12-28 12:11:56', 0),
(12, 5, 'lassi', '0000-00-00 00:00:00', '2022-01-04 10:11:32', 0),
(13, 5, 'lassi', '0000-00-00 00:00:00', '2022-01-04 10:11:36', 1),
(14, 5, 'Pan', '0000-00-00 00:00:00', '2022-01-04 11:00:28', 1),
(15, 5, 'Punjabi', '0000-00-00 00:00:00', '2022-01-14 11:46:33', 0),
(16, 5, 'dasdasds', '0000-00-00 00:00:00', '2022-01-14 12:06:30', 0),
(17, 1, 'Punjabi Dishses', '0000-00-00 00:00:00', '2022-01-25 12:56:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `current_stock`
--

DROP TABLE IF EXISTS `current_stock`;
CREATE TABLE `current_stock` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rawmaterial_id` int(11) NOT NULL,
  `current_stock` decimal(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_stock`
--

INSERT INTO `current_stock` (`id`, `restaurant_id`, `rawmaterial_id`, `current_stock`, `created_date`, `modified_date`, `created_by`, `modified_by`, `ip`) VALUES
(1, 5, 9, '165.00', '2022-01-28 05:10:58', '2022-01-28 05:59:31', 10, 10, '::1'),
(2, 5, 8, '40.00', '2022-01-28 05:11:28', '2022-01-31 07:24:45', 10, 10, '::1'),
(3, 5, 7, '-40.00', '2022-01-28 12:09:01', '2022-01-31 07:24:45', 10, 10, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `c_name`, `email`, `mobile`, `address`, `restaurant_id`, `dob`, `doa`, `created_date`, `modified_date`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Bimal j Pancholi', 'Bimalpancholi@gmail.com', '7043052060', 'Shivam, block no 18, satellite park\r\nSadhu vaswani main road, sur.university road, rajkot', 0, NULL, NULL, '2021-07-31 10:51:21', '0000-00-00 00:00:00', 0, 0, 0),
(2, 'Krunal patel', 'Kp@gmail.com', '1234567890', 'Gandhinagar', 0, NULL, NULL, '2021-07-31 11:10:00', '0000-00-00 00:00:00', 0, 0, 0),
(3, 'Avinasha ', 'ag@gmail.com', '1234567890', 'Sahibag, Ahmedabad', 0, NULL, NULL, '2021-07-31 11:11:14', '0000-00-00 00:00:00', 0, 0, 0),
(4, 'test', 'test@gmail.com', '1234567890', 'Shivam, block no 18, satellite park\r\nSadhu vaswani main road, sur.university road, rajkot', 0, NULL, NULL, '2021-08-07 08:26:59', '0000-00-00 00:00:00', 0, 0, 1),
(5, 'test', 'test@test.com', '9090809070', 'rajkot', 0, NULL, NULL, '2021-12-04 10:30:57', '0000-00-00 00:00:00', 0, 0, 0),
(6, 'Mufaddal', 'muffadal.haji@gmail.com', '9820686479', 'Goregaon', 5, '1975-06-23', '2003-09-18', '2022-01-15 06:59:42', '0000-00-00 00:00:00', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `discount_id` int(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `discount_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `restaurant_id`, `discount_name`, `discount`, `modified_date`, `created_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 'Special Discount', 10, '2022-01-14 11:26:05', '2021-10-24 15:14:47', 0, 0, 0),
(2, 5, 'Welcome 2022', 22, '2022-01-14 11:26:58', '2021-12-08 07:37:00', 0, 0, 0),
(3, 5, '26 Jan', 25, '0000-00-00 00:00:00', '2022-01-04 10:13:40', 0, 0, 1),
(4, 5, 'Welcome 22', 25, '0000-00-00 00:00:00', '2022-01-14 11:26:31', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense` (
  `expense_id` int(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `expense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `restaurant_id`, `expense`, `user_id`, `amount`, `created_date`, `created_by`, `modified_date`, `modify_by`, `is_deleted`) VALUES
(1, 5, '', 1, 50000, '2021-11-13 07:48:56', 0, '2021-11-13 07:48:56', 0, 1),
(2, 5, 'General expense', 10, 10000, '2021-11-13 07:54:55', 0, '2022-01-14 16:12:10', 0, 0),
(3, 5, 'Staff Salary', 10, 50000, '2021-11-13 07:56:54', 0, '2022-01-14 15:50:12', 0, 0),
(4, 5, 'Test expence', 11, 1000, '2021-12-08 07:35:55', 13, '2022-01-14 15:56:05', 13, 0),
(5, 5, 'Electricity bill', 11, 10000, '2022-01-04 11:10:31', 21, '2022-01-14 16:10:56', 21, 0),
(6, 5, 'Daru Soda', 12, 120, '2022-01-05 11:41:04', 21, '2022-01-14 16:11:01', 21, 0),
(7, 5, 'adsda', 10, 124, '2022-01-14 15:15:09', 10, '2022-01-14 15:15:09', 10, 1),
(8, 5, 'Test expence', 10, 1235, '2022-01-14 15:40:55', 0, '2022-01-14 15:45:14', 0, 0),
(9, 5, 'Taxi', 13, 250, '2022-01-14 16:11:15', 0, '0000-00-00 00:00:00', 0, 1),
(10, 5, 'fdsfdsadsf', 11, 213, '2022-01-14 16:12:57', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`, `created_date`, `modified_date`, `is_deleted`) VALUES
(1, 'MasterAdmin', '10,18,23', NULL, NULL, 0),
(2, 'Admin', '26,14,13,4,27,1,9,25,11,21,2,12,8,23,5,6,22,7', NULL, '2022-01-28 13:33:52', 0),
(3, 'Kitchen', '13', NULL, '2022-01-28 13:34:07', 0),
(4, 'Waiter', '26', NULL, '2022-01-28 13:34:02', 0),
(5, 'Manager', '26,14,13,4,1,9,25,11,21,2,12,8,23,5,6,22,7', NULL, '2022-01-28 13:34:21', 0),
(6, 'Owner', '26,14,13,4,27,1,9,25,11,21,2,12,8,23,5,6,22,7', NULL, '2022-01-28 13:34:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(100) NOT NULL,
  `restaurant_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(8,2) NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT 0,
  `stock_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(100) NOT NULL,
  `modify_by` int(100) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `restaurant_id`, `cat_id`, `item_name`, `short_code`, `price`, `favorite`, `stock_status`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 7, 'Bataka Shak', 'BS', 75.00, 1, 1, '2021-08-04 14:01:38', '2022-01-15 12:38:18', 0, 0, 0),
(2, 1, 6, 'paneer bhurji', 'pb', 250.00, 1, 0, '2021-08-04 14:42:26', '0000-00-00 00:00:00', 0, 0, 0),
(3, 1, 17, 'Bataka Shak', '12', 350.00, 0, 1, '2021-08-14 05:42:19', '2022-01-25 12:57:11', 0, 3, 0),
(4, 5, 3, 'Paneer Crispy', '124', 160.00, 1, 1, '2021-12-04 10:01:36', '2022-01-15 16:11:23', 10, 10, 0),
(5, 5, 3, 'Veg Crispy', '125', 150.00, 0, 1, '2021-12-04 10:02:39', '0000-00-00 00:00:00', 10, 10, 0),
(6, 5, 4, 'Roti', '126', 40.00, 0, 1, '2021-12-04 10:03:08', '0000-00-00 00:00:00', 10, 10, 0),
(7, 5, 4, 'Butter Roti', '127', 50.00, 0, 1, '2021-12-04 10:03:30', '0000-00-00 00:00:00', 10, 10, 0),
(8, 5, 4, 'Naan', '128', 60.00, 0, 1, '2021-12-04 10:03:51', '0000-00-00 00:00:00', 10, 10, 1),
(9, 5, 4, 'Butter Naan', '129', 75.00, 1, 1, '2021-12-04 10:04:16', '0000-00-00 00:00:00', 10, 10, 0),
(10, 5, 2, 'Paneer Butter Masala', '130', 220.00, 0, 1, '2021-12-04 10:04:45', '0000-00-00 00:00:00', 10, 10, 0),
(11, 5, 2, 'Paneer Makhanwala', '131', 230.00, 0, 1, '2021-12-04 10:05:08', '0000-00-00 00:00:00', 10, 10, 0),
(12, 5, 2, 'Paneer lalbabdar', '456', 230.00, 0, 1, '2021-12-05 13:03:09', '0000-00-00 00:00:00', 13, 13, 0),
(13, 5, 3, 'Idli', '345', 90.00, 0, 1, '2021-12-08 06:06:30', '0000-00-00 00:00:00', 13, 13, 0),
(14, 5, 10, 'Masala Tea', '363', 60.00, 0, 1, '2021-12-15 15:19:54', '0000-00-00 00:00:00', 14, 14, 0),
(15, 5, 11, 'Gulab Jamun', '678', 150.00, 0, 1, '2021-12-28 12:12:43', '0000-00-00 00:00:00', 13, 13, 0),
(16, 5, 12, 'Mango', '452', 110.00, 0, 1, '2022-01-04 10:12:41', '0000-00-00 00:00:00', 21, 21, 0),
(17, 5, 12, 'Mango', '452', 110.00, 0, 1, '2022-01-04 10:12:44', '0000-00-00 00:00:00', 21, 21, 0),
(18, 5, 14, 'Banarasi', '456', 50.00, 0, 1, '2022-01-04 11:01:25', '0000-00-00 00:00:00', 21, 21, 0),
(19, 5, 2, 'panner chilli', '444', 232.00, 1, 1, '2022-01-04 13:05:00', '0000-00-00 00:00:00', 21, 21, 0),
(20, 5, 3, 'Naan', 'NN', 20.00, 0, 1, '2022-01-25 12:45:30', '0000-00-00 00:00:00', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kot_head`
--

DROP TABLE IF EXISTS `kot_head`;
CREATE TABLE `kot_head` (
  `Id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `kot` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `items` int(11) NOT NULL,
  `bill_amt` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `tax_id` int(11) NOT NULL,
  `tax_amt` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(55) NOT NULL,
  `invoice_no` bigint(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `bill_type` varchar(55) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_head`
--

INSERT INTO `kot_head` (`Id`, `bill_id`, `kot`, `restaurant_id`, `table_id`, `name`, `mobile`, `items`, `bill_amt`, `discount_id`, `discount_amt`, `tax_id`, `tax_amt`, `total`, `status`, `invoice_no`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`, `bill_type`, `payment_type`, `is_active`) VALUES
(1, 1, 1, 5, 1, '', '', 2, 450, 0, 0, 0, 0, 450, 'BillPaid', 2201241, '2022-01-24 19:05:31', '2022-01-24 19:05:31', 10, 10, 0, 'dinein', 'Cash', 1),
(2, 1, 2, 5, 1, '', '', 2, 90, 0, 0, 0, 0, 90, 'BillPaid', 2201242, '2022-01-24 19:06:04', '2022-01-24 19:06:04', 10, 10, 0, 'dinein', 'Cash', 1),
(3, 2, 3, 5, 1, '', '', 1, 60, 0, 0, 0, 0, 60, 'BillPaid', 2201242, '2022-01-24 19:07:43', '2022-01-24 19:07:43', 10, 10, 0, 'dinein', 'Cash', 1),
(4, 2, 4, 5, 1, '', '', 2, 260, 0, 0, 0, 0, 260, 'BillPaid', 2201243, '2022-01-24 19:08:54', '2022-01-24 19:08:54', 10, 10, 0, 'dinein', 'Cash', 1),
(5, 3, 5, 5, 1, '', '', 2, 452, 0, 0, 0, 0, 452, 'BillPaid', 2201243, '2022-01-24 19:09:35', '2022-01-24 19:09:35', 10, 10, 0, 'dinein', 'Cash', 1),
(6, 3, 6, 5, 1, '', '', 2, 425, 0, 0, 0, 0, 425, 'BillPaid', 2201244, '2022-01-24 19:09:44', '2022-01-24 19:09:44', 10, 10, 0, 'dinein', 'Cash', 1),
(7, 3, 7, 5, 1, '', '', 1, 350, 0, 0, 0, 0, 350, 'BillPaid', 2201244, '2022-01-24 19:10:27', '2022-01-24 19:10:27', 10, 10, 0, 'dinein', 'Cash', 1),
(8, 4, 8, 5, 8, '', '', 2, 310, 0, 0, 0, 0, 310, 'BillPaid', 2201244, '2022-01-24 19:10:54', '2022-01-24 19:10:54', 10, 10, 0, 'dinein', 'Cash', 1),
(9, 5, 9, 5, 1, '', '', 3, 150, 0, 0, 0, 0, 150, 'BillPaid', 2201245, '2022-01-24 19:11:02', '2022-01-24 19:11:02', 10, 10, 0, 'dinein', 'Cash', 1),
(10, 6, 1, 5, 1, '', '', 2, 250, 0, 0, 0, 0, 250, 'OrderTaken', 2201256, '2022-01-25 17:35:24', '2022-01-25 17:35:24', 10, 10, 0, 'dinein', '', 1),
(11, 7, 2, 5, 1, '', '', 2, 250, 0, 0, 0, 0, 250, 'BillPaid', 2201257, '2022-01-25 17:35:48', '2022-01-25 17:35:48', 10, 10, 0, 'dinein', 'Cash', 1),
(12, 6, 1, 5, 1, '', '', 2, 310, 0, 0, 0, 0, 310, 'OrderTaken', 2201288, '2022-01-28 15:07:51', '2022-01-28 15:07:51', 10, 10, 0, 'dinein', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kot_item`
--

DROP TABLE IF EXISTS `kot_item`;
CREATE TABLE `kot_item` (
  `Id` int(11) NOT NULL,
  `kot_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_item`
--

INSERT INTO `kot_item` (`Id`, `kot_id`, `item_id`, `qty`, `amount`, `price`, `created_date`) VALUES
(1, 1, 10, 1, 220, 220, '2022-01-24 19:05:31'),
(2, 1, 12, 1, 230, 230, '2022-01-24 19:05:31'),
(3, 2, 6, 1, 40, 40, '2022-01-24 19:06:04'),
(4, 2, 7, 1, 50, 50, '2022-01-24 19:06:04'),
(5, 3, 14, 1, 60, 60, '2022-01-24 19:07:43'),
(6, 4, 15, 1, 150, 150, '2022-01-24 19:08:54'),
(7, 4, 17, 1, 110, 110, '2022-01-24 19:08:54'),
(8, 5, 10, 1, 220, 220, '2022-01-24 19:09:35'),
(9, 5, 19, 1, 232, 232, '2022-01-24 19:09:35'),
(10, 6, 1, 1, 75, 75, '2022-01-24 19:09:44'),
(11, 6, 3, 1, 350, 350, '2022-01-24 19:09:44'),
(12, 7, 3, 1, 350, 350, '2022-01-24 19:10:27'),
(13, 8, 4, 1, 160, 160, '2022-01-24 19:10:54'),
(14, 8, 5, 1, 150, 150, '2022-01-24 19:10:54'),
(15, 9, 6, 1, 40, 40, '2022-01-24 19:11:02'),
(16, 9, 7, 1, 50, 50, '2022-01-24 19:11:02'),
(17, 9, 8, 1, 60, 60, '2022-01-24 19:11:02'),
(18, 10, 4, 1, 160, 160, '2022-01-25 17:35:24'),
(19, 10, 13, 1, 90, 90, '2022-01-25 17:35:24'),
(20, 11, 4, 1, 160, 160, '2022-01-25 17:35:48'),
(21, 11, 13, 1, 90, 90, '2022-01-25 17:35:48'),
(22, 12, 4, 1, 160, 160, '2022-01-28 15:07:51'),
(23, 12, 5, 1, 150, 150, '2022-01-28 15:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createddate` datetime NOT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_msg`, `createddate`, `controller`) VALUES
(1, 'Admin sign-out successfully.', '2021-07-12 20:44:16', 'Logout'),
(2, ' sign-out successfully.', '2021-07-29 18:33:01', 'Logout'),
(3, 'Admin sign-in successfully.', '2021-07-29 18:35:35', 'Login'),
(4, 'Admin sign-out successfully.', '2021-07-29 18:35:57', 'Logout'),
(5, 'Admin sign-in successfully.', '2021-07-29 18:36:03', 'Login'),
(6, 'Admin sign-out successfully.', '2021-07-29 18:59:34', 'Logout'),
(7, 'Admin sign-in successfully.', '2021-07-29 18:59:46', 'Login'),
(8, 'Admin sign-out successfully.', '2021-07-29 19:00:11', 'Logout'),
(9, 'Admin sign-out successfully.', '2021-07-29 19:00:11', 'Logout'),
(10, 'Admin sign-in successfully.', '2021-07-29 19:01:11', 'Login'),
(11, 'Admin sign-out successfully.', '2021-07-29 19:04:06', 'Logout'),
(12, 'Admin sign-in successfully.', '2021-07-29 19:04:15', 'Login'),
(13, 'Admin sign-out successfully.', '2021-07-29 19:04:25', 'Logout'),
(14, 'Admin sign-in successfully.', '2021-07-31 08:29:56', 'Login'),
(15, 'Admin sign-out successfully.', '2021-07-31 11:37:35', 'Logout'),
(16, 'Admin sign-in successfully.', '2021-08-02 09:17:39', 'Login'),
(17, 'Admin sign-in successfully.', '2021-08-02 09:17:56', 'Login'),
(18, 'Admin sign-out successfully.', '2021-08-02 09:21:38', 'Logout'),
(19, 'Admin sign-out successfully.', '2021-08-02 09:21:44', 'Logout'),
(20, 'Admin sign-in successfully.', '2021-08-02 09:22:22', 'Login'),
(21, 'Admin sign-in successfully.', '2021-08-02 09:23:25', 'Login'),
(22, 'Admin sign-out successfully.', '2021-08-02 09:24:36', 'Logout'),
(23, 'Admin sign-in successfully.', '2021-08-02 14:33:21', 'Login'),
(24, 'Admin sign-out successfully.', '2021-08-02 14:56:37', 'Logout'),
(25, 'Admin sign-in successfully.', '2021-08-02 14:56:57', 'Login'),
(26, 'Admin sign-out successfully.', '2021-08-02 16:22:39', 'Logout'),
(27, 'Admin sign-in successfully.', '2021-08-02 16:22:50', 'Login'),
(28, 'Admin sign-in successfully.', '2021-08-03 08:20:45', 'Login'),
(29, 'Admin sign-out successfully.', '2021-08-03 08:21:56', 'Logout'),
(30, 'Admin sign-in successfully.', '2021-08-03 13:17:32', 'Login'),
(31, 'Admin sign-in successfully.', '2021-08-03 13:49:11', 'Login'),
(32, 'Admin sign-in successfully.', '2021-08-03 16:04:44', 'Login'),
(33, 'Admin sign-out successfully.', '2021-08-03 17:53:10', 'Logout'),
(34, 'Admin sign-in successfully.', '2021-08-03 17:53:19', 'Login'),
(35, 'Admin sign-out successfully.', '2021-08-03 18:07:35', 'Logout'),
(36, 'Admin sign-in successfully.', '2021-08-04 13:59:13', 'Login'),
(37, 'Admin sign-out successfully.', '2021-08-04 14:27:05', 'Logout'),
(38, ' sign-out successfully.', '2021-08-04 14:27:15', 'Logout'),
(39, 'Admin sign-in successfully.', '2021-08-04 14:27:28', 'Login'),
(40, 'Admin sign-out successfully.', '2021-08-04 14:31:03', 'Logout'),
(41, 'Admin sign-in successfully.', '2021-08-04 14:31:38', 'Login'),
(42, 'Admin sign-out successfully.', '2021-08-04 15:17:32', 'Logout'),
(43, 'Admin sign-in successfully.', '2021-08-04 15:51:27', 'Login'),
(44, 'Admin sign-out successfully.', '2021-08-04 16:54:14', 'Logout'),
(45, 'Admin sign-in successfully.', '2021-08-04 16:54:20', 'Login'),
(46, 'Admin sign-out successfully.', '2021-08-04 16:57:15', 'Logout'),
(47, 'Admin sign-in successfully.', '2021-08-04 16:57:40', 'Login'),
(48, 'Admin sign-out successfully.', '2021-08-04 17:00:35', 'Logout'),
(49, 'Admin sign-in successfully.', '2021-08-04 17:00:56', 'Login'),
(50, 'Admin sign-in successfully.', '2021-08-04 17:03:03', 'Login'),
(51, 'Admin sign-out successfully.', '2021-08-04 17:35:58', 'Logout'),
(52, 'Admin sign-in successfully.', '2021-08-04 17:41:34', 'Login'),
(53, 'Admin sign-out successfully.', '2021-08-04 17:42:27', 'Logout'),
(54, 'Admin sign-in successfully.', '2021-08-05 05:55:47', 'Login'),
(55, 'Admin sign-in successfully.', '2021-08-05 14:12:35', 'Login'),
(56, 'Admin sign-out successfully.', '2021-08-05 15:04:24', 'Logout'),
(57, 'Admin sign-in successfully.', '2021-08-05 15:04:32', 'Login'),
(58, 'Admin sign-out successfully.', '2021-08-05 15:10:16', 'Logout'),
(59, 'Admin sign-in successfully.', '2021-08-05 15:10:36', 'Login'),
(60, 'Admin sign-in successfully.', '2021-08-06 13:58:05', 'Login'),
(61, 'Admin sign-in successfully.', '2021-08-07 06:30:01', 'Login'),
(62, 'Admin sign-out successfully.', '2021-08-07 06:31:00', 'Logout'),
(63, 'Admin sign-in successfully.', '2021-08-07 06:31:45', 'Login'),
(64, 'Admin sign-out successfully.', '2021-08-07 06:32:41', 'Logout'),
(65, 'Admin sign-in successfully.', '2021-08-07 07:58:01', 'Login'),
(66, 'Admin sign-out successfully.', '2021-08-07 10:21:14', 'Logout'),
(67, 'Admin sign-in successfully.', '2021-08-07 10:22:45', 'Login'),
(68, 'Admin sign-in successfully.', '2021-08-12 14:33:23', 'Login'),
(69, 'Admin sign-in successfully.', '2021-08-14 05:39:35', 'Login'),
(70, 'Admin sign-out successfully.', '2021-08-14 05:44:59', 'Logout'),
(71, 'Admin sign-in successfully.', '2021-08-14 05:54:02', 'Login'),
(72, 'Admin sign-in successfully.', '2021-08-14 06:21:17', 'Login'),
(73, 'Admin sign-in successfully.', '2021-08-14 14:25:27', 'Login'),
(74, 'Admin sign-in successfully.', '2021-08-16 07:05:54', 'Login'),
(75, 'Admin sign-out successfully.', '2021-08-16 07:06:02', 'Logout'),
(76, 'Admin sign-in successfully.', '2021-08-16 07:06:07', 'Login'),
(77, 'Admin sign-out successfully.', '2021-08-16 07:32:25', 'Logout'),
(78, 'Admin sign-in successfully.', '2021-08-16 07:53:04', 'Login'),
(79, 'Admin sign-in successfully.', '2021-08-16 14:02:49', 'Login'),
(80, 'Admin sign-out successfully.', '2021-08-16 17:25:19', 'Logout'),
(81, 'Admin sign-in successfully.', '2021-08-17 14:06:32', 'Login'),
(82, 'Admin sign-out successfully.', '2021-08-17 16:59:42', 'Logout'),
(83, 'Admin sign-in successfully.', '2021-08-18 14:16:17', 'Login'),
(84, 'Admin sign-in successfully.', '2021-08-19 12:20:45', 'Login'),
(85, 'Admin sign-in successfully.', '2021-08-19 14:23:32', 'Login'),
(86, 'Admin sign-in successfully.', '2021-08-20 14:24:32', 'Login'),
(87, 'Admin sign-in successfully.', '2021-08-21 05:52:30', 'Login'),
(88, 'Admin sign-in successfully.', '2021-08-22 09:10:00', 'Login'),
(89, 'Admin sign-in successfully.', '2021-08-24 14:25:04', 'Login'),
(90, 'Admin sign-out successfully.', '2021-08-24 17:21:05', 'Logout'),
(91, 'Admin sign-in successfully.', '2021-08-25 12:46:45', 'Login'),
(92, 'Admin sign-in successfully.', '2021-08-26 14:08:20', 'Login'),
(93, 'Admin sign-out successfully.', '2021-08-26 17:09:42', 'Logout'),
(94, 'Admin sign-in successfully.', '2021-08-28 13:15:04', 'Login'),
(95, 'Admin sign-out successfully.', '2021-08-28 16:17:09', 'Logout'),
(96, 'Admin sign-in successfully.', '2021-08-30 09:00:27', 'Login'),
(97, 'Admin sign-in successfully.', '2021-08-30 10:39:30', 'Login'),
(98, 'Admin sign-out successfully.', '2021-08-30 12:35:29', 'Logout'),
(99, 'Admin sign-in successfully.', '2021-08-30 13:38:50', 'Login'),
(100, 'Admin sign-in successfully.', '2021-08-30 15:46:49', 'Login'),
(101, 'Admin sign-in successfully.', '2021-08-31 11:55:00', 'Login'),
(102, 'Admin sign-in successfully.', '2021-08-31 13:54:58', 'Login'),
(103, 'Admin sign-in successfully.', '2021-08-31 14:38:56', 'Login'),
(104, 'Admin sign-out successfully.', '2021-08-31 17:01:33', 'Logout'),
(105, 'Admin sign-in successfully.', '2021-09-01 10:46:45', 'Login'),
(106, 'Admin sign-in successfully.', '2021-09-07 14:46:11', 'Login'),
(107, 'Admin sign-in successfully.', '2021-09-08 14:21:58', 'Login'),
(108, 'Admin sign-in successfully.', '2021-09-13 14:37:00', 'Login'),
(109, 'Admin sign-out successfully.', '2021-09-13 16:32:18', 'Logout'),
(110, 'Admin sign-in successfully.', '2021-10-19 06:54:09', 'Login'),
(111, ' sign-out successfully.', '2021-10-21 14:07:06', 'Logout'),
(112, 'Admin sign-in successfully.', '2021-10-21 14:07:11', 'Login'),
(113, 'Admin sign-out successfully.', '2021-10-21 17:08:30', 'Logout'),
(114, 'Admin sign-in successfully.', '2021-10-24 11:44:21', 'Login'),
(115, 'Krunal sign-in successfully.', '2021-10-24 12:09:46', 'Login'),
(116, 'Admin sign-in successfully.', '2021-10-24 13:27:20', 'Login'),
(117, 'Admin sign-in successfully.', '2021-10-24 14:33:51', 'Login'),
(118, 'Admin sign-in successfully.', '2021-10-24 15:12:02', 'Login'),
(119, 'Admin sign-in successfully.', '2021-10-27 08:23:16', 'Login'),
(120, 'Admin sign-in successfully.', '2021-10-27 11:52:22', 'Login'),
(121, 'Admin sign-in successfully.', '2021-10-30 05:24:00', 'Login'),
(122, 'Admin sign-in successfully.', '2021-10-30 05:53:15', 'Login'),
(123, 'Admin sign-in successfully.', '2021-10-30 18:32:39', 'Login'),
(124, 'Admin sign-in successfully.', '2021-11-10 14:47:09', 'Login'),
(125, 'Admin sign-out successfully.', '2021-11-10 16:14:10', 'Logout'),
(126, 'Admin sign-in successfully.', '2021-11-11 14:04:14', 'Login'),
(127, 'Admin sign-out successfully.', '2021-11-11 16:06:56', 'Logout'),
(128, 'Admin sign-in successfully.', '2021-11-12 13:46:13', 'Login'),
(129, 'Admin sign-in successfully.', '2021-11-13 06:31:42', 'Login'),
(130, 'Admin sign-out successfully.', '2021-11-13 08:58:50', 'Logout'),
(131, 'Admin sign-in successfully.', '2021-11-13 13:52:23', 'Login'),
(132, 'Admin sign-in successfully.', '2021-11-13 15:34:15', 'Login'),
(133, 'Admin sign-in successfully.', '2021-11-13 15:34:20', 'Login'),
(134, 'Admin sign-out successfully.', '2021-11-13 17:31:48', 'Logout'),
(135, 'Admin sign-in successfully.', '2021-11-13 17:38:24', 'Login'),
(136, 'Admin sign-in successfully.', '2021-11-14 13:52:33', 'Login'),
(137, 'Admin sign-in successfully.', '2021-11-15 04:40:08', 'Login'),
(138, 'Admin sign-out successfully.', '2021-11-15 04:41:13', 'Logout'),
(139, 'Admin sign-in successfully.', '2021-11-15 04:42:27', 'Login'),
(140, 'Admin sign-out successfully.', '2021-11-15 04:42:37', 'Logout'),
(141, 'User sign-in successfully.', '2021-11-15 04:43:05', 'Login'),
(142, 'Admin sign-in successfully.', '2021-11-15 11:59:03', 'Login'),
(143, 'Admin sign-in successfully.', '2021-11-15 12:38:34', 'Login'),
(144, 'Admin sign-in successfully.', '2021-11-18 11:58:29', 'Login'),
(145, 'Admin sign-in successfully.', '2021-11-18 11:58:46', 'Login'),
(146, 'Admin sign-in successfully.', '2021-11-18 12:06:03', 'Login'),
(147, 'Admin sign-in successfully.', '2021-11-28 20:29:06', 'Login'),
(148, 'Admin sign-in successfully.', '2021-11-30 05:11:11', 'Login'),
(149, 'Admin sign-in successfully.', '2021-11-30 09:41:58', 'Login'),
(150, 'Admin sign-in successfully.', '2021-11-30 21:42:40', 'Login'),
(151, 'Admin sign-out successfully.', '2021-11-30 22:00:26', 'Logout'),
(152, 'Krunal sign-in successfully.', '2021-11-30 22:00:44', 'Login'),
(153, 'Krunal sign-out successfully.', '2021-11-30 22:01:08', 'Logout'),
(154, 'Admin sign-in successfully.', '2021-11-30 22:01:25', 'Login'),
(155, 'Admin sign-in successfully.', '2021-12-02 16:59:49', 'Login'),
(156, 'Admin sign-out successfully.', '2021-12-02 17:04:58', 'Logout'),
(157, 'Admin sign-in successfully.', '2021-12-02 18:19:36', 'Login'),
(158, 'Admin sign-out successfully.', '2021-12-02 18:23:04', 'Logout'),
(159, 'Test Resturant sign-in successfully.', '2021-12-02 18:23:10', 'Login'),
(160, 'Admin sign-in successfully.', '2021-12-03 06:29:14', 'Login'),
(161, 'Admin sign-out successfully.', '2021-12-03 06:30:35', 'Logout'),
(162, 'Admin sign-in successfully.', '2021-12-03 06:30:39', 'Login'),
(163, 'Admin sign-out successfully.', '2021-12-03 06:31:50', 'Logout'),
(164, 'Admin sign-in successfully.', '2021-12-03 06:31:58', 'Login'),
(165, 'Admin sign-out successfully.', '2021-12-03 06:32:06', 'Logout'),
(166, 'Admin sign-in successfully.', '2021-12-03 06:36:44', 'Login'),
(167, 'Admin sign-out successfully.', '2021-12-03 06:38:13', 'Logout'),
(168, 'John_doe sign-in successfully.', '2021-12-03 06:38:21', 'Login'),
(169, 'John_doe sign-out successfully.', '2021-12-03 06:42:48', 'Logout'),
(170, 'John_doe sign-in successfully.', '2021-12-03 06:43:00', 'Login'),
(171, 'John_doe sign-out successfully.', '2021-12-03 06:46:03', 'Logout'),
(172, 'Waiter_doe sign-in successfully.', '2021-12-03 06:46:11', 'Login'),
(173, 'Waiter_doe sign-out successfully.', '2021-12-03 06:49:55', 'Logout'),
(174, 'John_doe sign-in successfully.', '2021-12-03 06:50:02', 'Login'),
(175, 'John_doe sign-out successfully.', '2021-12-03 06:53:22', 'Logout'),
(176, 'Waiter_doe sign-in successfully.', '2021-12-03 06:53:32', 'Login'),
(177, 'Waiter_doe sign-out successfully.', '2021-12-03 06:57:05', 'Logout'),
(178, 'Admin sign-in successfully.', '2021-12-03 07:01:37', 'Login'),
(179, 'Admin sign-out successfully.', '2021-12-03 07:02:08', 'Logout'),
(180, 'Krunal sign-in successfully.', '2021-12-03 07:02:18', 'Login'),
(181, 'John_doe sign-in successfully.', '2021-12-03 07:08:02', 'Login'),
(182, 'John_doe sign-out successfully.', '2021-12-03 07:09:39', 'Logout'),
(183, 'Waiter_doe sign-in successfully.', '2021-12-03 07:09:47', 'Login'),
(184, 'Waiter_doe sign-out successfully.', '2021-12-03 07:10:26', 'Logout'),
(185, 'John_doe sign-in successfully.', '2021-12-03 07:10:41', 'Login'),
(186, 'John_doe sign-out successfully.', '2021-12-03 07:11:35', 'Logout'),
(187, 'Kitchen_doe sign-in successfully.', '2021-12-03 07:11:47', 'Login'),
(188, 'Kitchen_doe sign-out successfully.', '2021-12-03 07:12:02', 'Logout'),
(189, 'Waiter_doe sign-in successfully.', '2021-12-03 07:12:10', 'Login'),
(190, 'Waiter_doe sign-out successfully.', '2021-12-03 07:13:36', 'Logout'),
(191, 'John_doe sign-in successfully.', '2021-12-03 07:13:45', 'Login'),
(192, 'John_doe sign-out successfully.', '2021-12-03 08:35:39', 'Logout'),
(193, 'Admin sign-in successfully.', '2021-12-03 08:39:40', 'Login'),
(194, 'Admin sign-out successfully.', '2021-12-03 08:42:55', 'Logout'),
(195, 'Havemore  Admin sign-in successfully.', '2021-12-03 08:43:00', 'Login'),
(196, 'Havemore  Admin sign-out successfully.', '2021-12-03 08:48:28', 'Logout'),
(197, 'Admin sign-in successfully.', '2021-12-03 08:48:33', 'Login'),
(198, 'Admin sign-in successfully.', '2021-12-03 08:48:38', 'Login'),
(199, 'Admin sign-out successfully.', '2021-12-03 08:49:30', 'Logout'),
(200, 'John_doe sign-in successfully.', '2021-12-03 08:49:52', 'Login'),
(201, 'Admin sign-out successfully.', '2021-12-03 08:52:24', 'Logout'),
(202, 'Havemore  Admin sign-in successfully.', '2021-12-03 08:52:29', 'Login'),
(203, 'Havemore  Admin sign-out successfully.', '2021-12-03 08:58:28', 'Logout'),
(204, 'Havemore Manager sign-in successfully.', '2021-12-03 08:58:34', 'Login'),
(205, 'Havemore Manager sign-out successfully.', '2021-12-03 08:58:42', 'Logout'),
(206, 'Havemore Waiter sign-in successfully.', '2021-12-03 08:58:51', 'Login'),
(207, 'Havemore Kitchen sign-in successfully.', '2021-12-03 08:59:27', 'Login'),
(208, 'Havemore Waiter sign-out successfully.', '2021-12-03 09:24:36', 'Logout'),
(209, 'Havemore Waiter sign-in successfully.', '2021-12-03 09:25:32', 'Login'),
(210, 'Havemore Waiter sign-out successfully.', '2021-12-03 09:28:53', 'Logout'),
(211, 'Havemore Manager sign-in successfully.', '2021-12-03 09:29:01', 'Login'),
(212, 'Krunal sign-out successfully.', '2021-12-03 09:36:02', 'Logout'),
(213, 'Krunal sign-in successfully.', '2021-12-03 09:36:14', 'Login'),
(214, 'Havemore Waiter sign-in successfully.', '2021-12-04 05:49:02', 'Login'),
(215, 'Havemore Waiter sign-out successfully.', '2021-12-04 05:51:46', 'Logout'),
(216, 'Havemore  Admin sign-in successfully.', '2021-12-04 05:54:42', 'Login'),
(217, 'Havemore Waiter sign-in successfully.', '2021-12-04 05:58:14', 'Login'),
(218, 'Havemore  Admin sign-out successfully.', '2021-12-04 05:59:00', 'Logout'),
(219, 'Havemore  Admin sign-in successfully.', '2021-12-04 05:59:51', 'Login'),
(220, 'Havemore  Admin sign-out successfully.', '2021-12-04 06:00:40', 'Logout'),
(221, 'Havemore  Admin sign-in successfully.', '2021-12-04 06:01:14', 'Login'),
(222, 'Havemore  Admin sign-out successfully.', '2021-12-04 07:00:24', 'Logout'),
(223, 'Havemore Kitchen sign-in successfully.', '2021-12-04 07:00:35', 'Login'),
(224, 'Havemore Waiter sign-in successfully.', '2021-12-04 07:00:57', 'Login'),
(225, 'Havemore Waiter sign-out successfully.', '2021-12-04 07:21:38', 'Logout'),
(226, 'Havemore Kitchen sign-in successfully.', '2021-12-04 07:21:52', 'Login'),
(227, 'Havemore Waiter sign-out successfully.', '2021-12-04 08:32:12', 'Logout'),
(228, 'Havemore Kitchen sign-in successfully.', '2021-12-04 08:32:17', 'Login'),
(229, 'Havemore Kitchen sign-out successfully.', '2021-12-04 08:33:04', 'Logout'),
(230, 'Havemore  Admin sign-in successfully.', '2021-12-04 08:33:09', 'Login'),
(231, 'Havemore  Admin sign-in successfully.', '2021-12-04 10:00:43', 'Login'),
(232, 'Havemore waiter sign-in successfully.', '2021-12-04 11:25:04', 'Login'),
(233, 'Krunal sign-in successfully.', '2021-12-04 11:46:10', 'Login'),
(234, 'Havemore Manager sign-in successfully.', '2021-12-04 13:54:40', 'Login'),
(235, 'Havemore Manager sign-out successfully.', '2021-12-04 13:55:39', 'Logout'),
(236, 'Havemore Waiter sign-in successfully.', '2021-12-04 13:55:54', 'Login'),
(237, 'Havemore Waiter sign-out successfully.', '2021-12-04 14:05:42', 'Logout'),
(238, 'Havemore Kitchen sign-in successfully.', '2021-12-04 14:05:49', 'Login'),
(239, 'Havemore Kitchen sign-out successfully.', '2021-12-04 14:08:32', 'Logout'),
(240, ' sign-out successfully.', '2021-12-04 14:08:33', 'Logout'),
(241, 'Havemore Manager sign-in successfully.', '2021-12-04 14:08:39', 'Login'),
(242, 'Havemore Manager sign-in successfully.', '2021-12-05 12:53:58', 'Login'),
(243, 'Havemore Manager sign-out successfully.', '2021-12-05 12:59:52', 'Logout'),
(244, 'Havemore Kitchen sign-in successfully.', '2021-12-05 13:00:03', 'Login'),
(245, 'Havemore Manager sign-in successfully.', '2021-12-05 13:00:53', 'Login'),
(246, 'Admin sign-in successfully.', '2021-12-07 10:54:45', 'Login'),
(247, 'Admin sign-out successfully.', '2021-12-07 10:55:30', 'Logout'),
(248, 'Krunal sign-in successfully.', '2021-12-07 10:56:31', 'Login'),
(249, 'Krunal sign-out successfully.', '2021-12-07 11:30:39', 'Logout'),
(250, 'Krunal sign-in successfully.', '2021-12-07 11:31:11', 'Login'),
(251, 'Krunal sign-out successfully.', '2021-12-07 13:47:31', 'Logout'),
(252, 'Krunal sign-in successfully.', '2021-12-07 13:50:04', 'Login'),
(253, 'Krunal sign-in successfully.', '2021-12-07 13:52:30', 'Login'),
(254, 'Krunal sign-out successfully.', '2021-12-07 13:59:15', 'Logout'),
(255, 'Krunal sign-in successfully.', '2021-12-07 20:09:30', 'Login'),
(256, 'Havemore manager sign-in successfully.', '2021-12-08 06:05:31', 'Login'),
(257, 'Admin sign-in successfully.', '2021-12-08 06:55:24', 'Login'),
(258, 'Admin sign-out successfully.', '2021-12-08 06:55:34', 'Logout'),
(259, 'John_doe sign-in successfully.', '2021-12-08 06:55:52', 'Login'),
(260, 'Havemore Manager sign-out successfully.', '2021-12-08 06:57:16', 'Logout'),
(261, 'Havemore manager sign-in successfully.', '2021-12-08 06:57:21', 'Login'),
(262, 'John_doe sign-out successfully.', '2021-12-08 06:58:23', 'Logout'),
(263, 'Admin sign-in successfully.', '2021-12-08 06:58:43', 'Login'),
(264, 'John_doe sign-in successfully.', '2021-12-08 06:59:36', 'Login'),
(265, 'Krunal sign-in successfully.', '2021-12-08 08:36:39', 'Login'),
(266, 'Krunal sign-in successfully.', '2021-12-08 14:31:59', 'Login'),
(267, 'Krunal sign-out successfully.', '2021-12-08 16:06:31', 'Logout'),
(268, 'Havemore Manager sign-in successfully.', '2021-12-10 07:03:35', 'Login'),
(269, 'Havemore Manager sign-out successfully.', '2021-12-10 07:07:00', 'Logout'),
(270, 'Krunal sign-in successfully.', '2021-12-10 12:10:21', 'Login'),
(271, 'Krunal sign-in successfully.', '2021-12-10 12:20:52', 'Login'),
(272, 'Krunal sign-out successfully.', '2021-12-10 13:29:36', 'Logout'),
(273, 'Krunal sign-in successfully.', '2021-12-11 20:18:40', 'Login'),
(274, 'Admin sign-in successfully.', '2021-12-15 08:12:08', 'Login'),
(275, 'Admin sign-out successfully.', '2021-12-15 08:59:33', 'Logout'),
(276, 'Tea post sign-in successfully.', '2021-12-15 08:59:38', 'Login'),
(277, 'Tea post sign-in successfully.', '2021-12-15 14:08:34', 'Login'),
(278, 'Tea post sign-out successfully.', '2021-12-15 15:13:53', 'Logout'),
(279, 'Tea post sign-in successfully.', '2021-12-15 15:16:44', 'Login'),
(280, 'Tea post sign-out successfully.', '2021-12-15 15:20:33', 'Logout'),
(281, 'Teapost waiter sign-in successfully.', '2021-12-15 15:21:10', 'Login'),
(282, 'Teapost  kitchen sign-in successfully.', '2021-12-15 15:22:09', 'Login'),
(283, 'Tea post sign-in successfully.', '2021-12-15 15:22:50', 'Login'),
(284, 'Tea post sign-out successfully.', '2021-12-15 15:22:55', 'Logout'),
(285, 'Tea post sign-in successfully.', '2021-12-15 15:23:15', 'Login'),
(286, 'Tea post sign-out successfully.', '2021-12-15 15:24:09', 'Logout'),
(287, 'Teapost  kitchen sign-in successfully.', '2021-12-15 15:24:13', 'Login'),
(288, 'Teapost  kitchen sign-out successfully.', '2021-12-15 15:29:15', 'Logout'),
(289, 'Tea post sign-in successfully.', '2021-12-15 15:29:28', 'Login'),
(290, 'Admin sign-in successfully.', '2021-12-25 00:58:43', 'Login'),
(291, 'Admin sign-out successfully.', '2021-12-25 00:58:50', 'Logout'),
(292, 'Krunal sign-in successfully.', '2021-12-25 00:58:59', 'Login'),
(293, 'Krunal sign-in successfully.', '2021-12-25 09:39:16', 'Login'),
(294, 'Krunal sign-in successfully.', '2021-12-25 12:01:59', 'Login'),
(295, 'Krunal sign-in successfully.', '2021-12-26 07:22:21', 'Login'),
(296, 'Admin sign-in successfully.', '2021-12-28 09:09:59', 'Login'),
(297, 'Admin sign-out successfully.', '2021-12-28 09:10:29', 'Logout'),
(298, 'John_doe sign-in successfully.', '2021-12-28 09:10:36', 'Login'),
(299, 'John_doe sign-out successfully.', '2021-12-28 09:12:09', 'Logout'),
(300, 'John_doe sign-in successfully.', '2021-12-28 09:12:34', 'Login'),
(301, 'Waiter_doe sign-in successfully.', '2021-12-28 09:12:55', 'Login'),
(302, 'Waiter_doe sign-out successfully.', '2021-12-28 09:18:21', 'Logout'),
(303, 'Kitchen_doe sign-in successfully.', '2021-12-28 09:18:29', 'Login'),
(304, 'Kitchen_doe sign-out successfully.', '2021-12-28 09:18:56', 'Logout'),
(305, 'Waiter_doe sign-in successfully.', '2021-12-28 09:19:09', 'Login'),
(306, 'Waiter_doe sign-out successfully.', '2021-12-28 09:25:02', 'Logout'),
(307, 'John_doe sign-in successfully.', '2021-12-28 09:25:08', 'Login'),
(308, 'Havemore Waiter sign-in successfully.', '2021-12-28 10:51:26', 'Login'),
(309, 'Havemore Waiter sign-out successfully.', '2021-12-28 10:52:31', 'Logout'),
(310, 'Havemore Kitchen sign-in successfully.', '2021-12-28 10:52:37', 'Login'),
(311, 'Havemore Kitchen sign-out successfully.', '2021-12-28 10:54:17', 'Logout'),
(312, 'Havemore Manager sign-in successfully.', '2021-12-28 10:54:25', 'Login'),
(313, 'Havemore Manager sign-out successfully.', '2021-12-28 11:02:36', 'Logout'),
(314, 'Havemore Waiter sign-in successfully.', '2021-12-28 11:02:45', 'Login'),
(315, 'Havemore Waiter sign-out successfully.', '2021-12-28 11:45:10', 'Logout'),
(316, 'Havemore Waiter sign-in successfully.', '2021-12-28 11:45:16', 'Login'),
(317, 'Havemore Waiter sign-out successfully.', '2021-12-28 11:56:12', 'Logout'),
(318, 'Havemore Kitchen sign-in successfully.', '2021-12-28 11:56:17', 'Login'),
(319, 'Havemore Kitchen sign-out successfully.', '2021-12-28 11:57:43', 'Logout'),
(320, 'Havemore Waiter sign-in successfully.', '2021-12-28 11:57:49', 'Login'),
(321, 'Havemore Waiter sign-out successfully.', '2021-12-28 12:03:03', 'Logout'),
(322, 'Havemore Manager sign-in successfully.', '2021-12-28 12:03:12', 'Login'),
(323, 'Krunal sign-in successfully.', '2021-12-28 20:40:01', 'Login'),
(324, 'Krunal sign-in successfully.', '2021-12-29 06:16:47', 'Login'),
(325, 'Krunal sign-in successfully.', '2021-12-29 06:22:08', 'Login'),
(326, 'Test Waiter sign-in successfully.', '2021-12-29 08:19:02', 'Login'),
(327, 'Test Waiter sign-out successfully.', '2021-12-29 08:43:02', 'Logout'),
(328, 'Havemore Waiter sign-in successfully.', '2021-12-29 08:43:22', 'Login'),
(329, 'Havemore Waiter sign-out successfully.', '2021-12-29 08:49:00', 'Logout'),
(330, 'Krunal sign-in successfully.', '2021-12-29 08:50:08', 'Login'),
(331, 'Admin sign-in successfully.', '2021-12-29 09:03:25', 'Login'),
(332, 'Havemore kitchen sign-in successfully.', '2021-12-30 06:52:00', 'Login'),
(333, 'Havemore Kitchen sign-out successfully.', '2021-12-30 06:54:39', 'Logout'),
(334, 'Havemore Waiter sign-in successfully.', '2021-12-30 07:04:52', 'Login'),
(335, 'Havemore Kitchen sign-in successfully.', '2021-12-30 07:05:28', 'Login'),
(336, 'Havemore Kitchen sign-out successfully.', '2021-12-30 07:05:47', 'Logout'),
(337, 'Havemore manager sign-in successfully.', '2021-12-30 07:06:07', 'Login'),
(338, 'Krunal sign-in successfully.', '2021-12-30 11:28:00', 'Login'),
(339, 'Havemore waiter sign-in successfully.', '2021-12-30 17:01:43', 'Login'),
(340, 'Havemore Waiter sign-out successfully.', '2021-12-30 17:03:33', 'Logout'),
(341, 'Havemore waiter sign-in successfully.', '2021-12-31 04:54:03', 'Login'),
(342, 'Havemore Kitchen sign-in successfully.', '2021-12-31 04:59:09', 'Login'),
(343, 'Havemore Kitchen sign-out successfully.', '2021-12-31 04:59:57', 'Logout'),
(344, 'Admin sign-in successfully.', '2021-12-31 05:02:05', 'Login'),
(345, 'Admin sign-out successfully.', '2021-12-31 05:02:27', 'Logout'),
(346, 'ADMIN sign-in successfully.', '2021-12-31 05:02:41', 'Login'),
(347, 'Admin sign-out successfully.', '2021-12-31 05:03:05', 'Logout'),
(348, 'Admin sign-in successfully.', '2021-12-31 05:03:34', 'Login'),
(349, 'Admin sign-out successfully.', '2021-12-31 05:03:54', 'Logout'),
(350, 'Admin sign-in successfully.', '2021-12-31 05:04:30', 'Login'),
(351, 'Admin sign-out successfully.', '2021-12-31 05:05:10', 'Logout'),
(352, 'Admin sign-in successfully.', '2021-12-31 05:06:54', 'Login'),
(353, 'Admin sign-out successfully.', '2021-12-31 05:11:26', 'Logout'),
(354, 'Havemore Hotel sign-in successfully.', '2021-12-31 05:11:42', 'Login'),
(355, 'Havemore Hotel sign-out successfully.', '2021-12-31 05:12:17', 'Logout'),
(356, 'Havemore waiter sign-in successfully.', '2021-12-31 05:17:38', 'Login'),
(357, 'Havemore Waiter sign-out successfully.', '2021-12-31 05:19:43', 'Logout'),
(358, 'Havemore waiter sign-in successfully.', '2021-12-31 06:30:41', 'Login'),
(359, 'Havemore Manager sign-in successfully.', '2021-12-31 06:32:56', 'Login'),
(360, 'Havemore Manager sign-out successfully.', '2021-12-31 06:35:39', 'Logout'),
(361, 'Havemore kitchen sign-in successfully.', '2021-12-31 06:35:49', 'Login'),
(362, 'Havemore Waiter sign-in successfully.', '2021-12-31 06:50:09', 'Login'),
(363, 'Havemore waiter sign-in successfully.', '2021-12-31 11:45:59', 'Login'),
(364, 'Havemore kitchen sign-in successfully.', '2021-12-31 11:46:50', 'Login'),
(365, 'HAVEMORE MANAGER sign-in successfully.', '2022-01-01 06:51:57', 'Login'),
(366, 'Admin sign-in successfully.', '2022-01-01 12:02:09', 'Login'),
(367, 'Havemore manager sign-in successfully.', '2022-01-01 16:19:37', 'Login'),
(368, 'Havemore Manager sign-out successfully.', '2022-01-01 16:22:31', 'Logout'),
(369, 'Havemore Waiter sign-in successfully.', '2022-01-02 07:33:36', 'Login'),
(370, 'Havemore waiter sign-in successfully.', '2022-01-02 07:45:04', 'Login'),
(371, 'Havemore kitchen sign-in successfully.', '2022-01-03 05:01:43', 'Login'),
(372, 'Havemore Waiter sign-in successfully.', '2022-01-03 09:08:47', 'Login'),
(373, 'Havemore Waiter sign-out successfully.', '2022-01-03 09:51:34', 'Logout'),
(374, 'Havemore Waiter sign-in successfully.', '2022-01-03 09:52:57', 'Login'),
(375, 'Havemore Waiter sign-out successfully.', '2022-01-03 09:53:11', 'Logout'),
(376, 'Havemore waiter sign-in successfully.', '2022-01-03 16:00:02', 'Login'),
(377, 'Havemore Waiter sign-out successfully.', '2022-01-03 16:00:05', 'Logout'),
(378, 'Admin sign-in successfully.', '2022-01-04 09:07:13', 'Login'),
(379, 'Punjab grill manager sign-in successfully.', '2022-01-04 09:18:43', 'Login'),
(380, 'Punjab grill manager sign-in successfully.', '2022-01-04 09:33:59', 'Login'),
(381, 'Punjab grill manager sign-in successfully.', '2022-01-04 09:33:59', 'Login'),
(382, 'Punjab grill manager sign-out successfully.', '2022-01-04 09:58:09', 'Logout'),
(383, 'Punjab grill waiter sign-in successfully.', '2022-01-04 10:00:43', 'Login'),
(384, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 10:01:34', 'Login'),
(385, 'Punjab grill kitchen sign-out successfully.', '2022-01-04 10:01:56', 'Logout'),
(386, 'Punjab grill manager sign-in successfully.', '2022-01-04 10:02:05', 'Login'),
(387, 'Punjab grill manager sign-out successfully.', '2022-01-04 10:14:16', 'Logout'),
(388, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 10:14:27', 'Login'),
(389, 'Punjab grill kitchen sign-out successfully.', '2022-01-04 10:15:15', 'Logout'),
(390, 'Punjab grill manager sign-in successfully.', '2022-01-04 10:15:25', 'Login'),
(391, 'Punjab grill waiter sign-in successfully.', '2022-01-04 10:44:36', 'Login'),
(392, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 10:45:18', 'Login'),
(393, 'Punjab grill waiter sign-out successfully.', '2022-01-04 10:45:35', 'Logout'),
(394, 'Punjab grill waiter sign-in successfully.', '2022-01-04 10:46:15', 'Login'),
(395, 'Punjab grill waiter sign-in successfully.', '2022-01-04 10:55:35', 'Login'),
(396, 'Punjab grill waiter sign-out successfully.', '2022-01-04 10:58:34', 'Logout'),
(397, 'Punjab grill manager sign-in successfully.', '2022-01-04 10:58:41', 'Login'),
(398, 'Punjab grill manager sign-out successfully.', '2022-01-04 11:01:41', 'Logout'),
(399, 'Punjab grill waiter sign-in successfully.', '2022-01-04 11:01:45', 'Login'),
(400, 'Punjab grill waiter sign-out successfully.', '2022-01-04 11:02:04', 'Logout'),
(401, 'Punjab grill manager sign-in successfully.', '2022-01-04 11:02:13', 'Login'),
(402, 'Punjab grill waiter sign-in successfully.', '2022-01-04 11:22:41', 'Login'),
(403, 'Punjab grill waiter sign-out successfully.', '2022-01-04 11:27:06', 'Logout'),
(404, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 11:27:30', 'Login'),
(405, 'Punjab grill manager sign-out successfully.', '2022-01-04 11:30:52', 'Logout'),
(406, 'Punjab grill manager sign-in successfully.', '2022-01-04 11:30:56', 'Login'),
(407, 'Punjab grill manager sign-in successfully.', '2022-01-04 11:44:13', 'Login'),
(408, 'Punjab grill manager sign-out successfully.', '2022-01-04 12:03:27', 'Logout'),
(409, 'Punjab grill waiter sign-in successfully.', '2022-01-04 12:10:11', 'Login'),
(410, 'Punjab grill kitchen sign-out successfully.', '2022-01-04 12:41:51', 'Logout'),
(411, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 12:42:19', 'Login'),
(412, 'Punjab grill waiter sign-in successfully.', '2022-01-04 12:45:29', 'Login'),
(413, 'Punjab grill waiter sign-in successfully.', '2022-01-04 12:45:33', 'Login'),
(414, 'Punjab grill waiter sign-in successfully.', '2022-01-04 12:45:43', 'Login'),
(415, 'Punjab grill kitchen sign-out successfully.', '2022-01-04 12:47:26', 'Logout'),
(416, 'Punjab grill manager sign-in successfully.', '2022-01-04 12:47:33', 'Login'),
(417, 'Punjab grill manager sign-out successfully.', '2022-01-04 13:15:15', 'Logout'),
(418, 'Admin sign-in successfully.', '2022-01-04 13:16:57', 'Login'),
(419, 'Admin sign-out successfully.', '2022-01-04 13:30:18', 'Logout'),
(420, 'Demo 1 waiter sign-in successfully.', '2022-01-04 13:30:28', 'Login'),
(421, 'Demo 1 kitchen sign-in successfully.', '2022-01-04 13:30:56', 'Login'),
(422, 'Demo 1 waiter sign-out successfully.', '2022-01-04 13:33:46', 'Logout'),
(423, 'Admin sign-in successfully.', '2022-01-04 13:33:51', 'Login'),
(424, 'Admin sign-out successfully.', '2022-01-04 13:40:14', 'Logout'),
(425, 'Punjab da dhaba sign-in successfully.', '2022-01-04 13:40:22', 'Login'),
(426, 'Punjab da dhaba sign-out successfully.', '2022-01-04 13:40:54', 'Logout'),
(427, 'Punjab da dhaba sign-in successfully.', '2022-01-04 13:40:58', 'Login'),
(428, 'Punjab da dhaba sign-in successfully.', '2022-01-04 13:40:58', 'Login'),
(429, 'Demo 1 Kitchen sign-out successfully.', '2022-01-04 13:42:08', 'Logout'),
(430, 'Punjab grill kitchen sign-in successfully.', '2022-01-04 13:42:23', 'Login'),
(431, 'Punjab da dhaba sign-out successfully.', '2022-01-04 13:42:37', 'Logout'),
(432, 'Punjab da dhaba waiter sign-in successfully.', '2022-01-04 13:42:41', 'Login'),
(433, 'Havemore waiter sign-in successfully.', '2022-01-04 14:14:34', 'Login'),
(434, 'Havemore Waiter sign-out successfully.', '2022-01-04 14:15:05', 'Logout'),
(435, 'Havemore manager sign-in successfully.', '2022-01-04 14:15:43', 'Login'),
(436, 'Havemore Manager sign-out successfully.', '2022-01-04 14:16:22', 'Logout'),
(437, 'Punjab grill manager sign-in successfully.', '2022-01-04 14:16:42', 'Login'),
(438, 'Punjab grill manager sign-in successfully.', '2022-01-04 14:22:41', 'Login'),
(439, 'Punjab grill manager sign-out successfully.', '2022-01-04 14:23:36', 'Logout'),
(440, 'Havemore manager sign-in successfully.', '2022-01-05 05:16:24', 'Login'),
(441, 'Havemore Manager sign-out successfully.', '2022-01-05 05:17:09', 'Logout'),
(442, 'Havemore kitchen sign-in successfully.', '2022-01-05 08:40:40', 'Login'),
(443, 'Havemore Kitchen sign-out successfully.', '2022-01-05 08:41:01', 'Logout'),
(444, 'Punjab grill waiter sign-in successfully.', '2022-01-05 11:24:03', 'Login'),
(445, 'Punjab grill waiter sign-out successfully.', '2022-01-05 11:27:20', 'Logout'),
(446, 'Punjab grill kitchen sign-in successfully.', '2022-01-05 11:27:44', 'Login'),
(447, 'Punjab grill kitchen sign-out successfully.', '2022-01-05 11:28:10', 'Logout'),
(448, 'Punjab grill manager sign-in successfully.', '2022-01-05 11:28:16', 'Login'),
(449, 'Havemore waiter sign-in successfully.', '2022-01-07 12:02:23', 'Login'),
(450, 'Havemore kitchen sign-in successfully.', '2022-01-07 12:11:25', 'Login'),
(451, 'Havemore manager sign-in successfully.', '2022-01-08 16:59:38', 'Login'),
(452, 'Havemore manager sign-in successfully.', '2022-01-09 10:00:03', 'Login'),
(453, 'Havemore waiter sign-in successfully.', '2022-01-10 13:06:32', 'Login'),
(454, 'Havemore Waiter sign-out successfully.', '2022-01-10 14:39:31', 'Logout'),
(455, 'Admin sign-in successfully.', '2022-01-10 14:40:01', 'Login'),
(456, 'Admin sign-in successfully.', '2022-01-10 14:40:06', 'Login'),
(457, 'Admin sign-in successfully.', '2022-01-10 14:40:39', 'Login'),
(458, 'Admin sign-in successfully.', '2022-01-10 14:41:17', 'Login'),
(459, 'Admin sign-in successfully.', '2022-01-11 10:58:57', 'Login'),
(460, 'Havemore manager sign-in successfully.', '2022-01-11 13:16:09', 'Login'),
(461, 'Admin sign-out successfully.', '2022-01-11 13:28:04', 'Logout'),
(462, 'Havemore manager sign-in successfully.', '2022-01-11 13:28:13', 'Login'),
(463, 'Havemore Manager sign-out successfully.', '2022-01-11 13:34:08', 'Logout'),
(464, 'Admin sign-in successfully.', '2022-01-11 13:34:23', 'Login'),
(465, 'Havemore Manager sign-out successfully.', '2022-01-11 16:38:36', 'Logout'),
(466, 'Havemore Manager sign-in successfully.', '2022-01-11 16:41:17', 'Login'),
(467, 'Havemore Manager sign-out successfully.', '2022-01-11 16:50:51', 'Logout'),
(468, 'Havemore Manager sign-out successfully.', '2022-01-11 16:57:31', 'Logout'),
(469, 'Havemore Manager sign-out successfully.', '2022-01-11 17:06:41', 'Logout'),
(470, 'Havemore Waiter sign-out successfully.', '2022-01-13 17:53:09', 'Logout'),
(471, 'Havemore  Owner sign-out successfully.', '2022-01-14 12:32:13', 'Logout'),
(472, 'Havemore Waiter sign-out successfully.', '2022-01-14 12:52:27', 'Logout'),
(473, 'Admin sign-out successfully.', '2022-01-14 12:57:10', 'Logout'),
(474, 'Admin sign-out successfully.', '2022-01-14 13:11:53', 'Logout'),
(475, 'Admin sign-out successfully.', '2022-01-14 13:49:42', 'Logout'),
(476, 'Havemore  Owner sign-out successfully.', '2022-01-14 14:07:47', 'Logout'),
(477, 'Test Resturant sign-out successfully.', '2022-01-14 14:08:38', 'Logout'),
(478, 'Test Resturant sign-out successfully.', '2022-01-14 14:29:13', 'Logout'),
(479, 'Admin sign-out successfully.', '2022-01-14 15:57:45', 'Logout'),
(480, 'Havemore  Owner sign-out successfully.', '2022-01-14 18:18:17', 'Logout'),
(481, 'Admin sign-out successfully.', '2022-01-14 18:38:47', 'Logout'),
(482, 'Admin sign-out successfully.', '2022-01-14 18:40:31', 'Logout'),
(483, 'Admin sign-out successfully.', '2022-01-14 18:43:54', 'Logout'),
(484, 'Havemore Waiter sign-out successfully.', '2022-01-18 15:47:51', 'Logout'),
(485, 'Havemore Waiter sign-out successfully.', '2022-01-19 11:43:57', 'Logout'),
(486, 'Admin sign-out successfully.', '2022-01-19 11:44:51', 'Logout'),
(487, 'Admin sign-out successfully.', '2022-01-19 11:44:58', 'Logout'),
(488, 'Admin sign-out successfully.', '2022-01-19 11:56:46', 'Logout'),
(489, 'Admin sign-out successfully.', '2022-01-19 12:08:01', 'Logout'),
(490, 'Havemore  Owner sign-out successfully.', '2022-01-19 15:26:02', 'Logout'),
(491, 'Havemore  Owner sign-out successfully.', '2022-01-21 13:16:40', 'Logout'),
(492, 'Admin sign-out successfully.', '2022-01-21 17:52:56', 'Logout'),
(493, 'Havemore  Owner sign-out successfully.', '2022-01-25 12:51:27', 'Logout'),
(494, 'Punjab grill manager sign-out successfully.', '2022-01-25 12:55:23', 'Logout'),
(495, 'Admin sign-out successfully.', '2022-01-27 15:04:11', 'Logout'),
(496, 'Havemore  Owner sign-out successfully.', '2022-01-28 12:45:09', 'Logout'),
(497, 'Admin sign-out successfully.', '2022-01-28 13:03:16', 'Logout'),
(498, 'Havemore  Owner sign-out successfully.', '2022-01-28 13:30:26', 'Logout'),
(499, 'Havemore Waiter sign-out successfully.', '2022-01-28 13:30:54', 'Logout'),
(500, 'Havemore  Owner sign-out successfully.', '2022-01-28 13:32:26', 'Logout'),
(501, 'Admin sign-out successfully.', '2022-01-28 13:34:32', 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `master_modules`
--

DROP TABLE IF EXISTS `master_modules`;
CREATE TABLE `master_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `classname` varchar(100) DEFAULT NULL,
  `fa_class` varchar(200) NOT NULL,
  `to_show` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_id` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_modules`
--

INSERT INTO `master_modules` (`id`, `name`, `classname`, `fa_class`, `to_show`, `parent_id`, `sort_id`, `is_deleted`) VALUES
(1, 'Cash Flow', 'cashflow', 'fas fa-money-bill-wave-alt fa-2x', 1, 0, 7, 0),
(2, 'Item Category', 'category', 'fas fa-cogs fa-2x', 1, 0, 12, 0),
(3, 'Current Stock', 'currentstock', '', 1, 11, 0, 0),
(4, 'Customers', 'customer', 'fas fa-users fa-2x', 1, 0, 5, 0),
(5, 'Day End', 'dayend', 'fas fa-calendar-day fa-2x', 1, 0, 16, 0),
(6, 'Day End History', 'dayendhistory', 'fas fa-calendar-week fa-2x', 1, 0, 18, 0),
(7, 'Discount', 'discount', 'fas fa-tag fa-2x', 1, 0, 20, 0),
(8, 'Due Payment', 'duepayment', 'fas fa-file-invoice-dollar fa-2x', 1, 0, 15, 0),
(9, 'Expense', 'expense', 'fas fa-clipboard-list fa-2x', 1, 0, 8, 0),
(10, 'User Groups', 'groups', 'fas fa-users fa-2x', 0, 0, 14, 1),
(11, 'Inventory', 'inventory', 'fas fa-clipboard-list fa-2x', 1, 0, 10, 0),
(12, 'Items', 'item', 'fas fa-th-large fa-2x', 1, 0, 13, 0),
(13, 'Kot', 'kot', 'fas fa-receipt fa-2x', 1, 0, 4, 0),
(14, 'Orders', 'order', 'fas fa-clipboard fa-2x', 1, 0, 3, 0),
(15, 'Purchase', 'purchase', '', 1, 11, 0, 0),
(16, 'Raw Material', 'rawmaterial', '', 1, 11, 0, 0),
(17, 'Receipt', 'receipt', '', 1, -1, 0, 0),
(18, 'Restaurants', 'restaurant', 'fas fa-utensils fa-2x', 0, 0, 1, 0),
(19, 'Role', 'role', '', 0, -1, 0, 0),
(20, 'Stock Report', 'stockreport', '', 1, 11, 0, 0),
(21, 'Table', 'table', 'fas fa-clipboard-list fa-2x', 1, 0, 11, 0),
(22, 'Tax', 'tax', 'fas fa-donate fa-2x', 1, 0, 19, 0),
(23, 'Users', 'user', 'far fa-id-card fa-2x', 1, 0, 15, 0),
(24, 'Wastage', 'wastagelisting', '', 1, 11, 0, 0),
(25, 'Withdrawal', 'withdrawal', 'fas fa-clipboard-list fa-2x', 1, 0, 9, 0),
(26, 'Table Order', 'tableorder', 'fas fa-clipboard fa-2x', 1, 0, 2, 0),
(27, 'XLS Import', 'upload', 'fas fa-file-upload fa-2x', 1, 0, 6, 0),
(28, 'Raw Material Used', 'rawmaterial-used', '', 1, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_payment_type`
--

DROP TABLE IF EXISTS `master_payment_type`;
CREATE TABLE `master_payment_type` (
  `id` int(11) NOT NULL,
  `ptype` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_payment_type`
--

INSERT INTO `master_payment_type` (`id`, `ptype`) VALUES
(1, 'Fully Paid'),
(2, 'Partially Paid');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

DROP TABLE IF EXISTS `master_unit`;
CREATE TABLE `master_unit` (
  `id` int(11) NOT NULL,
  `units` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`id`, `units`) VALUES
(1, 'KG'),
(2, 'ML'),
(3, 'LT'),
(4, 'GM');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_log`
--

DROP TABLE IF EXISTS `order_status_log`;
CREATE TABLE `order_status_log` (
  `Id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status_log`
--

INSERT INTO `order_status_log` (`Id`, `order_id`, `status`, `create_date`) VALUES
(1, 1, 'OrderTaken', '2022-01-24 19:05:31'),
(2, 1, 'BillRaised', '2022-01-24 19:06:29'),
(3, 1, 'BillPaid', '2022-01-24 19:07:18'),
(4, 2, 'OrderTaken', '2022-01-24 19:07:43'),
(5, 2, 'BillRaised', '2022-01-24 19:09:05'),
(6, 2, 'BillPaid', '2022-01-24 19:09:07'),
(7, 3, 'OrderTaken', '2022-01-24 19:09:35'),
(8, 3, 'BillPaid', '2022-01-24 19:10:47'),
(9, 4, 'OrderTaken', '2022-01-24 19:10:54'),
(10, 5, 'OrderTaken', '2022-01-24 19:11:02'),
(11, 4, 'BillRaised', '2022-01-24 19:11:23'),
(12, 4, 'BillPaid', '2022-01-24 19:11:25'),
(13, 5, 'BillPaid', '2022-01-24 19:11:38'),
(14, 6, 'OrderTaken', '2022-01-25 17:35:24'),
(15, 7, 'OrderTaken', '2022-01-25 17:35:48'),
(16, 7, 'BillRaised', '2022-01-28 13:30:44'),
(17, 7, 'BillPaid', '2022-01-28 13:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterial`
--

DROP TABLE IF EXISTS `rawmaterial`;
CREATE TABLE `rawmaterial` (
  `rawmaterial_id` int(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rawmaterial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rawmaterial`
--

INSERT INTO `rawmaterial` (`rawmaterial_id`, `restaurant_id`, `rawmaterial`, `unit`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 0, 'Potato', 1, '2021-08-19 16:43:05', '0000-00-00 00:00:00', 0, 0, 0),
(2, 0, 'Paneer', 1, '2021-08-19 16:47:30', '0000-00-00 00:00:00', 0, 0, 0),
(3, 0, 'Tomato', 1, '2021-12-04 08:36:21', '0000-00-00 00:00:00', 0, 0, 0),
(4, 0, 'Surmai', 1, '2021-12-05 12:56:44', '0000-00-00 00:00:00', 0, 0, 0),
(5, 0, 'Tea', 3, '2021-12-15 15:55:30', '0000-00-00 00:00:00', 0, 0, 0),
(6, 0, 'Milk', 3, '2022-01-04 11:04:48', '0000-00-00 00:00:00', 0, 0, 0),
(7, 5, 'Salt', 1, '2022-01-15 12:49:30', '2022-01-28 17:32:21', 10, 10, 0),
(8, 5, 'Potato', 1, '2022-01-15 12:51:47', '0000-00-00 00:00:00', 10, 0, 0),
(9, 5, 'Onion', 1, '2022-01-27 16:57:27', '0000-00-00 00:00:00', 10, 0, 1),
(10, 5, 'Oil', 3, '2022-01-28 17:32:30', '0000-00-00 00:00:00', 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `restaurant_id` int(100) NOT NULL,
  `restaurant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fssai_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `contact_no`, `company_name`, `email`, `fssai_no`, `gstin_no`, `photo_file`, `modified_date`, `created_date`, `is_deleted`) VALUES
(1, 'Havemore Restaurant', 'Shivam, block no 18, satellite park\r\nSadhu vaswani main road, sur.university road, rajkot', '7043052060', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-03 16:06:49', 0),
(2, 'Mirch Masala Restaurant', 'Shubhash Bridge, Shahibaug', '9925003466', 'saddsadad', '', '', '', 'mirch-masala-restaurant_61ea9fc905c01.png', '2022-01-21 17:32:23', '2021-08-05 05:59:30', 0),
(3, 'test restaurant', 'Shivam, block no 18, satellite park\r\nSadhu vaswani main road, sur.university road, rajkot', '1234567890', 'Test Compnay', 'haji@badri.com', '', '', NULL, '2022-01-21 16:44:43', '2021-08-07 08:26:09', 0),
(4, 'Tomatos', 'Testing Address', '999999999', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-16 07:53:58', 1),
(5, 'Havemore Admin 1', 'Dadar west Mumbai 400050', '9090909080', 'My company', '', '', '', 'havemore-admin-1_61eaa46620f15.jpg', '2022-01-21 17:47:42', '2021-12-03 08:44:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `storename` varchar(255) NOT NULL,
  `storeurl` varchar(255) NOT NULL,
  `apiusername` varchar(255) NOT NULL,
  `apipath` varchar(255) NOT NULL,
  `apitoken` varchar(255) NOT NULL,
  `storehas` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `client_secret` varchar(255) NOT NULL,
  `store_front_url` varchar(255) NOT NULL,
  `logo_image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `storename`, `storeurl`, `apiusername`, `apipath`, `apitoken`, `storehas`, `client_id`, `client_secret`, `store_front_url`, `logo_image`, `date`, `protocol`, `smtp_user`, `smtp_port`, `smtp_host`, `smtp_pass`, `admin_email`) VALUES
(1, '', 'https://sandbox313.mybigcommerce.com/?ctk=d3a54233-f676-435c-9fba-e2b62965003d', 'SB_white_mountain', ' https://api.bigcommerce.com/stores/jrrt2gfxkr/v3/', 'sciwthm3lx7wanfjhuy8cka3zm1d873', 'jrrt2gfxkr', 'hmw4t9qdawo92l94gmx5uxmxptrk6xs', '6698c50bb35bc1b19df44bd52ce978489ae09fd41df76e4737671d50855ce58e', 'https://store-jrrt2gfxkr.mybigcommerce.com', 'bc5df4d63ac0e4b3d07bbd09d1b2a219.png', '2019-12-26 06:59:15', 'testsmtp', 'tradein@macofalltrades.com', '465', 'secure.emailsrvr.com', 'sell-collar-Decimal-cave-74', 'purchasing@macofalltrades.com');

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

DROP TABLE IF EXISTS `status_master`;
CREATE TABLE `status_master` (
  `status_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`status_id`, `name`, `is_active`) VALUES
(1, 'InOrder', 0),
(2, 'KitchenAccept', 0),
(3, 'KitchenReject', 0),
(4, 'InCooking', 0),
(5, 'OrderReady', 0),
(6, 'PickedUpByWaiter', 0),
(7, 'OrderOnTable', 0),
(8, 'BillRaised', 0),
(9, 'BillPaid', 0),
(10, 'TableEmpty', 0),
(11, 'OrderTaken', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(255) NOT NULL,
  `restaurant_id` int(255) NOT NULL,
  `rawmaterial_id` int(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `total_amount` double(8,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `entry_type` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `restaurant_id`, `rawmaterial_id`, `stock`, `supplier_name`, `invoice_no`, `invoice_date`, `total_amount`, `payment_type`, `paid_amount`, `entry_type`, `modified_date`, `created_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 9, 100, 'ABC', '123', '2022-01-25', 1250.00, '1', 1250.00, 'P', '2022-01-28 11:19:16', '2022-01-28 10:40:58', 10, 10, 0),
(2, 5, 8, 50, 'XYZ', '456', '2022-01-23', 100.00, '1', 100.00, 'P', '2022-01-28 17:38:44', '2022-01-28 10:41:28', 10, 10, 0),
(3, 5, 8, 10, 'ddd', '45656', '2022-01-25', 152.00, '1', 152.00, 'P', '0000-00-00 00:00:00', '2022-01-28 10:41:55', 10, 0, 0),
(4, 5, 9, 10, NULL, '', '2022-01-26', 0.00, '', 0.00, 'W', '0000-00-00 00:00:00', '2022-01-28 11:24:34', 10, 0, 0),
(5, 5, 9, 25, NULL, '', '2022-01-26', 0.00, '', 0.00, 'U', '2022-01-28 11:29:31', '2022-01-28 11:27:16', 10, 10, 0),
(6, 5, 7, 100, 'jlkj', '4546', '2022-01-25', 1523.00, '1', 1523.00, 'P', '2022-01-28 17:39:01', '2022-01-28 17:39:01', 10, 10, 0),
(7, 5, 7, 100, NULL, '', '2022-01-22', 0.00, '', 0.00, 'U', '2022-01-28 18:01:28', '2022-01-28 17:57:46', 10, 10, 0),
(8, 5, 7, 15, NULL, '', '2022-01-22', 0.00, '', 0.00, 'U', '2022-01-28 18:01:50', '2022-01-28 18:01:39', 10, 10, 0),
(9, 5, 8, 10, NULL, '', '2022-01-22', 0.00, '', 0.00, 'W', '2022-01-28 18:02:59', '2022-01-28 18:02:42', 10, 10, 0),
(10, 5, 7, 10, NULL, '', '2022-01-22', 0.00, '', 0.00, 'U', '2022-01-28 18:16:03', '2022-01-28 18:15:39', 10, 10, 0),
(11, 5, 7, 5, NULL, '', '2022-01-23', 0.00, '', 0.00, 'W', '2022-01-28 18:16:40', '2022-01-28 18:16:40', 10, 10, 0),
(12, 5, 7, 10, NULL, '', '2022-01-22', 0.00, '', 0.00, 'U', '2022-01-31 12:54:45', '2022-01-31 12:54:45', 10, 0, 0),
(13, 5, 8, 20, NULL, '', '2022-01-22', 0.00, '', 0.00, 'U', '2022-01-31 12:54:45', '2022-01-31 12:54:45', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `table_id` int(255) NOT NULL,
  `restaurant_id` int(255) NOT NULL,
  `tablename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(255) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 0,
  `ord_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `restaurant_id`, `tablename`, `capacity`, `status`, `ord_status`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 'Table No.1', 5, 0, 'OrderTaken', '2021-08-28 15:40:54', '2022-01-16 12:36:29', 0, 10, 0),
(2, 1, 'Table No.2', 6, 0, '', '2021-08-28 16:14:43', '2021-08-28 16:14:43', 0, 0, 0),
(3, 1, 'Table No.3', 5, 0, '', '2021-08-31 16:36:23', '2021-08-31 16:36:23', 0, 0, 0),
(4, 1, 'Table No.4', 4, 0, '', '2021-08-31 16:37:22', '2021-08-31 16:37:22', 0, 0, 0),
(5, 1, 'Table No.5', 6, 0, '', '2021-08-31 16:39:20', '2021-08-31 16:39:20', 0, 0, 0),
(6, 1, 'Table No.1', 4, 0, '', '2021-10-24 12:03:41', '2021-10-24 12:03:41', 0, 0, 0),
(7, 1, 'Table No.2', 6, 0, '', '2021-10-24 12:03:53', '2021-10-24 12:03:53', 0, 0, 0),
(8, 5, 'table 17', 4, 0, '', '2021-10-24 12:08:26', '2022-01-16 12:49:29', 0, 10, 0),
(9, 5, 'Table 18', 3, 0, '', '2021-10-24 12:08:41', '2022-01-16 12:49:36', 0, 10, 0),
(10, 5, '11', 6, 0, '', '2021-12-04 11:00:30', '2021-12-04 11:00:30', 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE `tax` (
  `tax_id` int(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `sgst` decimal(11,2) DEFAULT NULL,
  `cgst` decimal(11,2) DEFAULT NULL,
  `is_default` int(20) NOT NULL DEFAULT 0,
  `modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `restaurant_id`, `tax_name`, `vat`, `sgst`, `cgst`, `is_default`, `modified_date`, `created_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 'Tax', '2.00', '5.00', '5.00', 0, '2022-01-13 18:52:04', '2022-01-13 18:50:52', 0, 0, 1),
(2, 5, 'Service Tax', '2.00', '2.50', '2.50', 0, '2022-01-13 18:57:33', '2022-01-13 18:51:45', 0, 0, 0),
(3, 5, 'Tax', '2.00', '2.00', '2.00', 1, '2022-01-14 13:50:03', '2022-01-13 18:53:20', 0, 0, 0),
(4, 2, 'Tax', '2.00', '2.00', '2.00', 1, '2022-01-13 18:56:22', '2022-01-13 18:53:20', 0, 0, 0),
(5, 5, 'Blank', '0.00', '0.00', '0.00', 0, '0000-00-00 00:00:00', '2022-01-14 13:50:17', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 4, 2),
(2, 1, 1),
(3, 2, 2),
(4, 3, 2),
(5, 5, 2),
(6, 6, 3),
(7, 7, 2),
(8, 8, 4),
(9, 9, 3),
(10, 10, 2),
(11, 11, 3),
(12, 12, 4),
(13, 13, 5),
(14, 14, 2),
(15, 15, 4),
(16, 16, 5),
(17, 17, 3),
(18, 18, 6),
(19, 19, 4),
(20, 20, 3),
(21, 21, 5),
(22, 22, 4),
(23, 23, 3),
(24, 24, 5),
(25, 25, 4),
(26, 26, 3),
(27, 27, 5),
(28, 28, 6),
(29, 29, 4),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 2),
(35, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

DROP TABLE IF EXISTS `wastage`;
CREATE TABLE `wastage` (
  `wastage_id` int(255) NOT NULL,
  `restaurant_id` int(255) NOT NULL,
  `rawmaterial_id` int(255) NOT NULL,
  `wastage` double(8,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`wastage_id`, `restaurant_id`, `rawmaterial_id`, `wastage`, `unit`, `created_date`, `modified_date`, `created_by`, `modify_by`, `is_deleted`) VALUES
(1, 5, 7, 5.00, '1', '2022-01-15 13:30:14', '2022-01-15 13:31:12', 10, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

DROP TABLE IF EXISTS `withdrawal`;
CREATE TABLE `withdrawal` (
  `withdrawal_id` int(255) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modify_by` int(255) NOT NULL,
  `is_deleted` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`withdrawal_id`, `restaurant_id`, `user_id`, `amount`, `created_date`, `created_by`, `modified_date`, `modify_by`, `is_deleted`) VALUES
(1, 5, 10, 5000, '2021-08-26 16:30:08', 0, '2022-01-14 16:25:11', 0, 0),
(2, 5, 10, 4000, '2021-12-04 10:37:02', 10, '2022-01-14 16:25:18', 10, 0),
(3, 5, 11, 35200, '2022-01-14 16:25:26', 0, '0000-00-00 00:00:00', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_head`
--
ALTER TABLE `bill_head`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bill_item`
--
ALTER TABLE `bill_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `current_stock`
--
ALTER TABLE `current_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `kot_head`
--
ALTER TABLE `kot_head`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `kot_item`
--
ALTER TABLE `kot_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `master_modules`
--
ALTER TABLE `master_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_payment_type`
--
ALTER TABLE `master_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_log`
--
ALTER TABLE `order_status_log`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  ADD PRIMARY KEY (`rawmaterial_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_master`
--
ALTER TABLE `status_master`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`wastage_id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bill_head`
--
ALTER TABLE `bill_head`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill_item`
--
ALTER TABLE `bill_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `current_stock`
--
ALTER TABLE `current_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kot_head`
--
ALTER TABLE `kot_head`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kot_item`
--
ALTER TABLE `kot_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `master_modules`
--
ALTER TABLE `master_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `master_payment_type`
--
ALTER TABLE `master_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_status_log`
--
ALTER TABLE `order_status_log`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rawmaterial`
--
ALTER TABLE `rawmaterial`
  MODIFY `rawmaterial_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_master`
--
ALTER TABLE `status_master`
  MODIFY `status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `wastage_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

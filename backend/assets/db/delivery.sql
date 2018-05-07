-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2017 at 02:47 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_no` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `id_no`, `password`, `admin_role_id`, `location_id`, `is_active`) VALUES
(1, 'fname', 'lname', 'fname@gmail.com', 202012455, '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, 1),
(2, 'nnnnn', 'nnnn', 'me@gmail.com', 20202020, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 2, 0),
(3, 'yayaya', 'nnbbbb', 'fname2@gmail.com', 1010101, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 1, 0),
(4, 'yayaya', 'nnbbbb', 'fname3@gmail.com', 202020, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 1, 0),
(5, 'yayaya', '11', 'f@g.cim', 11111, '2ea6201a068c5fa0eea5d81a3863321a87f8d533', 1, 1, 0),
(6, '1111111', '111111', 'fname3a@gmail.com', 1111111, '2ea6201a068c5fa0eea5d81a3863321a87f8d533', 1, 1, 0),
(7, '1111111', '1111111', 'f@ddg.cim', 1111111, '2ea6201a068c5fa0eea5d81a3863321a87f8d533', 2, 3, 0),
(8, 'normal', 'qq', 'normal@gmail.com', 10101, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2, 3, 1),
(9, 'r', 'r', 'r@gmail.com', 1010, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE IF NOT EXISTS `admin_roles` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`admin_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`admin_role_id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Normal Admin');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_mode`
--

CREATE TABLE IF NOT EXISTS `delivery_mode` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_name` varchar(40) NOT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delivery_mode`
--

INSERT INTO `delivery_mode` (`delivery_id`, `delivery_name`) VALUES
(1, 'Pickup'),
(2, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE IF NOT EXISTS `duration` (
  `duration_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `d_unpaid` varchar(20) NOT NULL,
  `d_paid` varchar(20) NOT NULL,
  `d_dispatched` varchar(20) NOT NULL,
  `d_received` varchar(20) NOT NULL,
  `d_released` varchar(20) NOT NULL,
  PRIMARY KEY (`duration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`duration_id`, `order_id`, `d_unpaid`, `d_paid`, `d_dispatched`, `d_received`, `d_released`) VALUES
(1, 15, '2017-11-28 11:36:27', '2017-11-28 01:31:27', '2017-11-28 01:50:52', '2017-11-28 02:09:12', '2017-11-28 02:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(500) NOT NULL,
  `location_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_phone`) VALUES
(1, 'Nairobi', '0700000001'),
(2, 'Meru', '0700000002'),
(3, 'Isiolo', '07000000037'),
(4, 'Mombasa', '0700000004'),
(5, 'testbnm', '0705571573'),
(6, 'test Case', '7000046595');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_no` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `order_number` varchar(15) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `destination` blob NOT NULL,
  `order_details` blob NOT NULL,
  `transport_cost` int(11) NOT NULL,
  `recepient_names` varchar(50) NOT NULL,
  `recepient_phone` varchar(20) NOT NULL,
  `recepient_idno` varchar(20) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `fname`, `lname`, `phone`, `id_no`, `email`, `order_number`, `delivery_id`, `from`, `to`, `destination`, `order_details`, `transport_cost`, `recepient_names`, `recepient_phone`, `recepient_idno`, `item_cost`, `timestamp`, `is_active`) VALUES
(1, 'yayaya', 'nnbbbb', '0705571573', '1', 'fname@gmail.com', '10', 1, 1, 2, '', 0x3130, 1, '', '', '', 1, '2017-10-26 08:47:24', 1),
(2, 'yayaya', 'vv', '0705571573', '567890', 'soharpropertieske@gmail.com', '10FG', 1, 1, 2, '', 0x3130, 10, '', '', '', 10, '2017-10-26 08:47:22', 1),
(3, 'yayaya', 'fghj', '0705571573', '20202', '', '2017102575FF', 1, 2, 1, 0x7863677662686e6a6b6d, 0x646667686a6b, 10, '', '', '', 10, '2017-10-26 08:47:20', 1),
(4, 'yayaya', 'nnbbbb', '0705571573', '1010', '', '20171025B390', 2, 1, 2, 0x636667766a, 0x6366677662686e6a6b6d, 1010, '', '', '', 50, '2017-10-26 08:47:13', 1),
(5, 'Test', 'qqq', '0705571573', '1212', '', '20171025147D', 1, 1, 1, 0x202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020, 0x7171, 10, '', '', '', 10, '2017-10-26 08:56:27', 1),
(6, 'sdfghj', 'dfghjk', '0705571573', '1020201', '', '201710278028', 2, 3, 2, 0x646667686a6b6c, 0x646667686a6b6c3b, 50, '', '', '', 10101, '2017-10-27 07:30:29', 1),
(7, 'test 1', 'one', '0705571573', '202020', '', '20171027FE9B', 1, 2, 3, 0x666776686a6b6c3b, 0x646667686a6b6c, 2020, '', '', '', 10, '2017-10-27 08:11:19', 1),
(8, 'test normal', 'test n', '070571573', '202020', '', '201710279A8B', 1, 1, 3, 0x7171717171, 0x71717171, 1010, '', '', '', 1010, '2017-10-27 08:01:22', 1),
(9, 'test normal 2', 'aa', '123456789', '1010', '', '201710273F75', 1, 2, 3, 0x7171717171, 0x717171, 0, '', '', '', 0, '2017-10-27 08:11:15', 1),
(10, 'test normal 3', 'nnnn', '0705571573', '1010', '', '201710272F2D', 1, 3, 1, 0x6667686a6b6c3b, 0x646667686a6b6c, 0, '', '', '', 0, '2017-10-27 10:13:11', 1),
(11, 'Richard', 'Victor ', '0724521414', '3635321', '', '20171027A8BF', 1, 2, 1, 0x20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202073646667686a, 0x52696368617264, 1000, '', '', '', 25000, '2017-10-27 11:51:54', 1),
(12, 'Zeff', 'mwalimu', '0724521414', '26241564', '', '20171027F4AF', 1, 3, 1, 0x6667686a6b, 0x646667686a6b, 30, '', '', '', 30, '2017-10-27 10:11:27', 1),
(13, 'Data', 'qwertyui', '0705571573', '1010', '', '201710280800', 1, 1, 3, 0x6667686a6b6c3b, 0x646667686a6b6c, 50, '', '', '', 50, '2017-10-28 06:39:21', 1),
(14, 'tester', 'tester', '0701580017', '303030', '', '201710288BBE', 1, 1, 2, 0x667662676e6d2c, 0x647662676e6d2c, 5050, '', '', '', 10, '2017-10-28 06:41:57', 1),
(15, 'may', 'Yes', '0705571573', '101010', 'fname@gmail.com', '201711282B73', 1, 3, 3, 0x20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202076676864676a662067686668676b626a672020676b75696b20206a67626b75686b20686a686b6875206c686a6c69756c64660d0a62766768766b7564206a686f6c697564666e616b6a6c736466682066766a647367666b7567796173666b20676b75676b66610d0a626a676a6b67736673660d0a, 0x6d6179, 1010, 'gagaga gggjj', '0705571573', '20202010', 5050, '2017-11-28 11:15:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_stage`
--

CREATE TABLE IF NOT EXISTS `order_stage` (
  `order_stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `is_dispatched` int(11) NOT NULL DEFAULT '0',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `is_received` int(11) NOT NULL DEFAULT '0',
  `is_released` int(11) NOT NULL DEFAULT '0',
  `is_incomplete` int(11) NOT NULL DEFAULT '1',
  `is_paid` int(11) NOT NULL DEFAULT '0',
  `is_cancelled` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_stage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order_stage`
--

INSERT INTO `order_stage` (`order_stage_id`, `order_id`, `is_dispatched`, `is_completed`, `is_received`, `is_released`, `is_incomplete`, `is_paid`, `is_cancelled`) VALUES
(1, 4, 1, 1, 1, 1, 0, 1, 0),
(2, 5, 0, 0, 0, 0, 0, 0, 1),
(3, 6, 1, 1, 1, 1, 0, 1, 0),
(4, 7, 1, 1, 1, 1, 0, 1, 0),
(5, 8, 0, 0, 0, 0, 0, 0, 1),
(6, 9, 0, 0, 0, 0, 1, 0, 1),
(7, 10, 0, 0, 0, 0, 0, 1, 0),
(8, 11, 1, 0, 0, 0, 0, 1, 0),
(9, 12, 1, 1, 1, 1, 0, 1, 0),
(10, 13, 1, 1, 1, 1, 0, 1, 0),
(11, 14, 1, 1, 1, 1, 0, 1, 0),
(12, 15, 1, 1, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `mpesa_code` varchar(20) NOT NULL,
  `payment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `amount`, `mpesa_code`, `payment_timestamp`) VALUES
(1, 6, '101', '', '0000-00-00 00:00:00'),
(2, 6, '1010', '', '0000-00-00 00:00:00'),
(3, 6, '1011', '', '0000-00-00 00:00:00'),
(4, 13, '1010', '', '0000-00-00 00:00:00'),
(5, 14, '5050', '', '0000-00-00 00:00:00'),
(6, 10, '1010', 'asdfghjkl', '0000-00-00 00:00:00'),
(7, 10, '1010', 'dfxfcghj', '0000-00-00 00:00:00'),
(8, 10, '1010', 'sdxcvbnm', '0000-00-00 00:00:00'),
(9, 15, '6060', '', '0000-00-00 00:00:00'),
(10, 15, '60060', '', '0000-00-00 00:00:00'),
(11, 15, '6060', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE IF NOT EXISTS `payment_mode` (
  `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_mode_name` varchar(10) NOT NULL,
  PRIMARY KEY (`payment_mode_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`payment_mode_id`, `payment_mode_name`) VALUES
(1, 'Cash'),
(2, 'M-Pesa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

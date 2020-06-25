-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2020 at 03:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vender_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ven_bill`
--

DROP TABLE IF EXISTS `tbl_ven_bill`;
CREATE TABLE IF NOT EXISTS `tbl_ven_bill` (
  `id` int(50) NOT NULL,
  `po_number` varchar(100) NOT NULL,
  `po_date` varchar(100) NOT NULL,
  `base_ammount` varchar(100) NOT NULL,
  `gst_ammount` varchar(100) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ven_quote`
--

DROP TABLE IF EXISTS `tbl_ven_quote`;
CREATE TABLE IF NOT EXISTS `tbl_ven_quote` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `u_rfp` varchar(100) NOT NULL,
  `u_date` varchar(100) NOT NULL,
  `u_base` varchar(100) NOT NULL,
  `u_gst` varchar(50) DEFAULT NULL,
  `u_qut` varchar(50) DEFAULT NULL,
  `u_acceptence` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ven_quote`
--

INSERT INTO `tbl_ven_quote` (`id`, `u_rfp`, `u_date`, `u_base`, `u_gst`, `u_qut`, `u_acceptence`, `created_date`) VALUES
(1, '353533', '21/Jun/2020', '53535rf', 'vvcdvdve', 'High_School1.pdf', NULL, '2020-06-21 13:28:54'),
(2, 'wdsc', '13/Jun/2020', '', '', NULL, 'Acceptencefor the code of conduct', '2020-06-21 13:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ven_rfp`
--

DROP TABLE IF EXISTS `tbl_ven_rfp`;
CREATE TABLE IF NOT EXISTS `tbl_ven_rfp` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `t_desc` varchar(100) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `l_date` varchar(100) NOT NULL,
  `vender` varchar(100) NOT NULL,
  `emails` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ven_rfp`
--

INSERT INTO `tbl_ven_rfp` (`id`, `title`, `t_desc`, `document`, `l_date`, `vender`, `emails`, `created_date`) VALUES
(1, 'Jayant Singh', 'Hello there! i am developing this complete portal and i will manage this from my home.', 'B_Tech2.pdf', 'comming soon', '1', 'jayantsigh924@gmail.com, varunsingh924@gmail.com', '2020-06-21 10:25:26'),
(2, 'TESTING', 'HEYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY', 'Bank_Details.pdf', '16/Jun/2020', '2', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2020-06-21 11:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ven_user`
--

DROP TABLE IF EXISTS `tbl_ven_user`;
CREATE TABLE IF NOT EXISTS `tbl_ven_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ven_user`
--

INSERT INTO `tbl_ven_user` (`user_id`, `user_name`, `user_email`, `user_pass`, `created_at`) VALUES
(1, 'Jayant', 'jayant@gmail.com', 'baf4be81a8a9853be527d5564e4aff5b', '2020-06-24 08:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ven_vender`
--

DROP TABLE IF EXISTS `tbl_ven_vender`;
CREATE TABLE IF NOT EXISTS `tbl_ven_vender` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `v_name` text DEFAULT NULL,
  `v_address` varchar(100) DEFAULT NULL,
  `v_city` text DEFAULT NULL,
  `v_state` text DEFAULT NULL,
  `v_pincode` int(100) DEFAULT NULL,
  `v_nature` varchar(100) DEFAULT NULL,
  `v_phone` varchar(100) DEFAULT NULL,
  `v_mobile` varchar(100) DEFAULT NULL,
  `v_website` varchar(100) DEFAULT NULL,
  `v_email` varchar(100) DEFAULT NULL,
  `v_panno` varchar(100) DEFAULT NULL,
  `v_panfile` varchar(100) DEFAULT NULL,
  `v_tanno` int(100) DEFAULT NULL,
  `v_gstno` int(100) DEFAULT NULL,
  `v_gstfile` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `v_uinno` int(100) DEFAULT NULL,
  `v_msmeno` int(100) DEFAULT NULL,
  `v_coo` varchar(100) DEFAULT NULL,
  `v_primary` varchar(100) DEFAULT NULL,
  `v_contact` varchar(100) DEFAULT NULL,
  `v_email1` varchar(100) DEFAULT NULL,
  `v_designation` varchar(100) DEFAULT NULL,
  `v_acceptence` varchar(500) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ven_vender`
--

INSERT INTO `tbl_ven_vender` (`id`, `v_name`, `v_address`, `v_city`, `v_state`, `v_pincode`, `v_nature`, `v_phone`, `v_mobile`, `v_website`, `v_email`, `v_panno`, `v_panfile`, `v_tanno`, `v_gstno`, `v_gstfile`, `status`, `v_uinno`, `v_msmeno`, `v_coo`, `v_primary`, `v_contact`, `v_email1`, `v_designation`, `v_acceptence`, `register_date`) VALUES
(1, 'Test Singh', '', '', '', 87686, '', '67886', '5878', '', 'test@gmail.com', '867697', '', 7869, 7698769, '', 'inactive', 687698, 769689, '2', '', '', '', '', NULL, '2020-06-20 05:01:37'),
(2, 'Jayant Singh', '', '', '', 87686, '', '67886', '5878', '', 'test@gmail.com', '867697', '', 7869, 7698769, '', 'inactive', 687698, 769689, '2', '', '', '', '', 'Acceptencefor the code of conduct,Acceptence for NDA', '2020-06-19 16:01:06'),
(3, 'gngngngn', '', '', '', 0, '', '', '', '', 'test@gmail.com', '', NULL, 0, 0, NULL, 'active', 0, 0, '', '', '', '', '', NULL, '2020-06-19 16:01:09'),
(4, 'bnfbfdbd', '', '', '', 0, '', '', '', '', 'test@gmail.com', '', '79371959_1059159384432258_4006511116237668352_n1.jpg', 0, 0, NULL, 'active', 0, 0, '', '', '', '', '', NULL, '2020-06-19 16:01:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

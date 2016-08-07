-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 07:47 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbportalpgn`
--
CREATE DATABASE `dbportalpgn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbportalpgn`;

-- --------------------------------------------------------

--
-- Table structure for table `reff_groupid`
--

CREATE TABLE IF NOT EXISTS `reff_groupid` (
  `groupid` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_groupid`
--

INSERT INTO `reff_groupid` (`groupid`, `description`) VALUES
('1', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `reff_groupmenu`
--

CREATE TABLE IF NOT EXISTS `reff_groupmenu` (
  `groupid` varchar(20) NOT NULL,
  `menuid` varchar(50) NOT NULL,
  `isView` bit(1) NOT NULL,
  `isAdd` bit(1) NOT NULL,
  `isUpdate` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL,
  PRIMARY KEY (`groupid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_groupmenu`
--

INSERT INTO `reff_groupmenu` (`groupid`, `menuid`, `isView`, `isAdd`, `isUpdate`, `isDelete`) VALUES
('1', '1', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `reff_menu`
--

CREATE TABLE IF NOT EXISTS `reff_menu` (
  `menuid` int(50) NOT NULL AUTO_INCREMENT,
  `menu_desc` varchar(250) NOT NULL,
  `menu_url` varchar(500) NOT NULL,
  `menu_image_url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reff_menu`
--

INSERT INTO `reff_menu` (`menuid`, `menu_desc`, `menu_url`, `menu_image_url`) VALUES
(1, 'Dashboard', 'Dashboard/index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reff_region`
--

CREATE TABLE IF NOT EXISTS `reff_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reff_region`
--

INSERT INTO `reff_region` (`id`, `description`) VALUES
(0, 'Semua Regional');

-- --------------------------------------------------------

--
-- Table structure for table `reff_table`
--

CREATE TABLE IF NOT EXISTS `reff_table` (
  `maintable` varchar(150) NOT NULL,
  `refffield` varchar(150) NOT NULL,
  `reffquery` varchar(150) NOT NULL,
  `reffqueryedit` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_table`
--

INSERT INTO `reff_table` (`maintable`, `refffield`, `reffquery`, `reffqueryedit`) VALUES
('reff_users', 'groupid', 'select CONCAT(groupid,'' - '',description) as ''description'' FROM reff_groupid', 'select groupid,description FROM reff_groupid');

-- --------------------------------------------------------

--
-- Table structure for table `reff_tablekey`
--

CREATE TABLE IF NOT EXISTS `reff_tablekey` (
  `tablename` varchar(150) NOT NULL,
  `keyfields` varchar(500) NOT NULL,
  `fields` varchar(2000) NOT NULL,
  `Condition` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`tablename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_tablekey`
--

INSERT INTO `reff_tablekey` (`tablename`, `keyfields`, `fields`, `Condition`) VALUES
('reff_users', 'userid', 'userid,password,groupid,full_name,address,phone_number,email_address,active,region', 'userid != ''admin''');

-- --------------------------------------------------------

--
-- Table structure for table `reff_users`
--

CREATE TABLE IF NOT EXISTS `reff_users` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `groupid` varchar(20) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `is_login` bit(1) NOT NULL,
  `active` bit(1) NOT NULL,
  `region` bigint(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_users`
--

INSERT INTO `reff_users` (`userid`, `password`, `groupid`, `full_name`, `address`, `phone_number`, `email_address`, `is_login`, `active`, `region`) VALUES
('super_admin', '161ebd7d45089b3446ee4e0d86dbcf92', '1', 'Super Admin', NULL, NULL, '', b'0', b'1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

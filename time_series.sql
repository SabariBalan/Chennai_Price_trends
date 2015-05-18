-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 12:16 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `time_series`
--

-- --------------------------------------------------------

--
-- Table structure for table `chennai`
--

CREATE TABLE IF NOT EXISTS `chennai` (
`no` int(20) NOT NULL,
  `year` int(100) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `chennai`
--

INSERT INTO `chennai` (`no`, `year`, `price`) VALUES
(1, 2000, 231435),
(2, 2001, 917428),
(3, 2002, 126598),
(4, 2003, 895422),
(5, 2004, 986743),
(6, 2005, 123454),
(7, 2006, 786589),
(8, 2007, 989089),
(9, 2008, 908070),
(10, 2009, 562378),
(11, 2010, 896754),
(12, 2011, 909878),
(13, 2012, 235456);

-- --------------------------------------------------------

--
-- Table structure for table `omr`
--

CREATE TABLE IF NOT EXISTS `omr` (
`no` int(10) NOT NULL,
  `year` int(100) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `omr`
--

INSERT INTO `omr` (`no`, `year`, `price`) VALUES
(1, 2000, 786745),
(2, 2001, 987598),
(3, 2002, 907867),
(4, 2003, 908978),
(5, 2004, 789589),
(6, 2005, 987893),
(7, 2006, 983489),
(8, 2007, 891243),
(9, 2008, 897855),
(10, 2009, 987867),
(11, 2010, 324345),
(12, 2011, 909878),
(13, 2012, 909798);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chennai`
--
ALTER TABLE `chennai`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `omr`
--
ALTER TABLE `omr`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chennai`
--
ALTER TABLE `chennai`
MODIFY `no` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `omr`
--
ALTER TABLE `omr`
MODIFY `no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

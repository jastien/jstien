-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 12:23 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `netflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`) VALUES
(1001, 'Action'),
(1002, 'Comedies'),
(1003, 'Drama'),
(1004, 'Musical'),
(1005, 'Horror'),
(1006, 'Foreign'),
(1007, 'Fantasy'),
(1008, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movieId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `rated` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`movieId`),
  UNIQUE KEY `movieId` (`movieId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `title`, `categoryId`, `year`, `rated`) VALUES
(1, 'Ghost Busters', 1007, 2016, 'PG-13'),
(2, 'Me Before You', 1003, 2016, 'PG-13'),
(3, 'Captain America', 1001, 2011, 'PG-13'),
(4, 'Now You See Me', 1008, 2016, 'PG-13'),
(5, 'Angry Bird', 1001, 2016, 'PG'),
(6, 'Batman Vs Superman', 1001, 2016, 'PG-13'),
(7, 'Kung Fu Panda', 1002, 2008, 'PG'),
(8, 'Eddie The Eagle', 1003, 2016, 'PG-13'),
(9, 'Point Break', 1005, 2015, 'PG-13'),
(10, 'Minions', 1007, 2015, 'PG'),
(11, 'Alvin and Chipmunks', 1001, 2007, 'PG'),
(12, 'Daddys Home', 1002, 2015, 'PG-13'),
(13, 'The Force Awakens', 1001, 2015, 'PG-13'),
(14, 'Everest', 1006, 2016, 'PG-13'),
(15, 'Spectre', 1005, 2015, 'PG-13'),
(16, 'Saving Private Ryan', 1006, 1998, 'R'),
(17, 'The Intern', 1003, 2015, 'PG-13'),
(18, 'The Martian', 1008, 2015, 'PG-13'),
(19, 'Fantastic Four', 1008, 2015, 'PG-13'),
(20, 'Jurassic World', 1001, 2015, 'PG-13'),
(22, 'Zombieland', 1005, 2009, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `userId` int(11) NOT NULL,
  `movieId` int(11) NOT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`userId`, `movieId`, `ratings`) VALUES
(1, 1, 5),
(1, 3, 4),
(1, 5, 3),
(1, 7, 2),
(1, 9, 1),
(1, 10, 3),
(1, 12, 3),
(1, 14, 5),
(1, 16, 5),
(1, 18, 1),
(1, 20, 1),
(2, 2, 2),
(2, 4, 2),
(2, 6, 3),
(2, 8, 3),
(3, 11, 4),
(3, 13, 4),
(3, 15, 5),
(4, 17, 5),
(4, 20, 1),
(4, 1, 2),
(4, 2, 3),
(5, 3, 4),
(5, 4, 5),
(6, 5, 1),
(6, 6, 2),
(6, 7, 3),
(7, 8, 4),
(8, 9, 5),
(10, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `gender`, `age`, `username`, `password`) VALUES
(1, 'Nancy', 'Chan', 'F', 25, 'nchan1', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(2, 'Keith', 'Chan', 'M', 50, 'kchan', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(3, 'Darren', 'Chan', 'M', 19, 'chan1443', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(4, 'Nicholas', 'Chan', 'M', 15, 'nchan123', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(5, 'Timothy', 'Chan', 'M', 13, 'tchan', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(6, 'Lily', 'Chow', 'F', 30, 'lchan', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(7, 'Justin', 'Bieber', 'M', 22, 'jb', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(8, 'Donald', 'Trump', 'M', 70, 'trump', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(9, 'Hillary', 'Clinton', 'F', 69, 'hclinton', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(10, 'Barack', 'Obama', 'M', 55, 'bobama', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

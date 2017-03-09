-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 07:42 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) DEFAULT NULL,
  `email` varchar(210) NOT NULL,
  `password` varchar(230) NOT NULL,
  `date` date DEFAULT NULL,
  `breakfast` longtext,
  `lunch` longtext,
  `dinner` longtext,
  `plan` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `email`, `password`, `date`, `breakfast`, `lunch`, `dinner`, `plan`) VALUES
(86, 'subho', 'gf', 'subho@gmail.com', '$1$Rii3kfFf$bCO.EywozFJoevy2xZW2E/', '2016-12-12', 'uuuuuuuuuuuuuuuuuuuuuu', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj'),
(98, '', NULL, '', '', '2016-12-16', 'uuuuuuuuuuuuuuuuu', 'jjjjjjjjjjjjjjjjjjjjjjjjj', 'kkkkkkkkkkkkkkkkk', 'pppppppppppppppppp'),
(99, '', NULL, '', '', '2016-12-17', 'dmsfnjdg', 'qqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq'),
(100, '', NULL, '', '', '2017-02-11', '', '', '', ''),
(101, '', NULL, '', '', '2017-03-08', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

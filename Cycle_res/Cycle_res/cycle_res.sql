-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 05:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cycle`
--

CREATE TABLE `cycle` (
  `RegNo` varchar(9) NOT NULL,
  `ID` int(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `TIimestamp` time DEFAULT '00:00:00',
  `MinsRun` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle`
--

INSERT INTO `cycle` (`RegNo`, `ID`, `Location`, `status`, `TIimestamp`, `MinsRun`) VALUES
('20BCE0052', 14723, 'Foodies', 0, '00:00:00', 0),
('20BCE0052', 14723, 'Foodies', 0, '00:00:00', 1),
('20BCE0004', 23700, 'GDN', 0, '00:00:00', 116),
('20BCE0004', 23700, 'smv', 0, '00:00:00', 2),
('20BCI0052', 21827, 'TECHNOLOGY TOWER', 0, '00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) NOT NULL,
  `RegNo` varchar(9) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Timerun` int(10) NOT NULL,
  `Lastcycle` varchar(5) NOT NULL,
  `TotalDue` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `RegNo`, `password`, `Timerun`, `Lastcycle`, `TotalDue`) VALUES
('dhanush@vitstudent.ac.in', '20BCE0044', '123456', 4, '19429', 0),
('sanjit@vitstudent.ac.in', '20BCE0052', '12345678', 122, '14723', 0),
('yogeeshpavas@vitstudent.ac.in', '20BCE0004', '1234', 118, '23700', 0),
('revans2002win@vitstudent.ac.in', '20BCE0001', '12345', 0, '', 0),
('revans@vitstudent.ac.in', '20BCE0971', '123456', 0, '', 0),
('abs@vitstudent.ac.in', '20BCE4545', '123', 0, '', 0),
('sanxs@vitstudent.ac.in', '20BCE1000', '123', 0, '', 0),
('bud@vitstudent.ac.in', '20BCE0500', '123', 0, '', 0),
('Vijay@vitstudent.ac.in', '20BCE0020', '1234', 0, '', 0),
('sanx@vitstudent.ac.in', '20BCI0052', '123456789', 4, '21827', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registercycle`
--

CREATE TABLE `registercycle` (
  `ownerreg` varchar(9) NOT NULL,
  `cycleid` int(3) NOT NULL,
  `cyclebrand` varchar(255) NOT NULL,
  `cyclecolor` varchar(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `Lastlocn` varchar(30) NOT NULL,
  `Lastcust` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registercycle`
--

INSERT INTO `registercycle` (`ownerreg`, `cycleid`, `cyclebrand`, `cyclecolor`, `address`, `Lastlocn`, `Lastcust`) VALUES
('20BCE0044', 19429, 'Hercules', 'Brown', 'asasasa\r\nasdsds', 'TT', '20BCE0052'),
('20BCE0052', 14723, 'FireFox', 'black', 'Vit Vellore', 'Foodies', '20BCE0052'),
('20BCE0004', 23700, 'BUTTERFLY', 'PINK AND BLUE', ' E BLOCK VIT VELLORE \r\n', 'smv', '20BCE0004'),
('20BCI0052', 21827, 'HERCUES', 'GREEN', '  \r\nC BLOCK', 'TECHNOLOGY TOWER', '20BCI0052');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RegNo` varchar(9) NOT NULL,
  `Gender` varchar(10) DEFAULT 'ENTER ',
  `Mobile` varchar(10) NOT NULL DEFAULT 'ENTER',
  `names` varchar(30) NOT NULL DEFAULT 'ENTER ',
  `Hostel` varchar(30) NOT NULL DEFAULT 'ENTER ',
  `Department` varchar(30) NOT NULL DEFAULT 'ENTER ',
  `Branch` varchar(30) NOT NULL DEFAULT 'ENTER '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `Gender`, `Mobile`, `names`, `Hostel`, `Department`, `Branch`) VALUES
('20BCE1000', '', '', '', '', '', ''),
('20BCE0500', 'M', '9790341357', 'BUDVIN', '', '', ''),
('20BCE0020', 'ENTER ', 'ENTER', 'ENTER ', 'ENTER ', 'ENTER ', 'ENTER '),
('20BCI0052', 'M', '9876336536', 'Sanjith', 'C-Block', 'BTech', 'CSE');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `my_event` ON SCHEDULE EVERY 1 DAY STARTS '2022-11-11 00:00:00' ON COMPLETION PRESERVE ENABLE DO DELETE FROM `cycle`$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE EVENT my_event
  ON SCHEDULE
    EVERY 1 DAY
    STARTS '2022-11-11 00:00:00' ON COMPLETION PRESERVE ENABLE 
  DO DELETE FROM `cycle` ;
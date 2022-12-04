-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 29, 2020 at 03:41 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `userName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`,`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`ID`, `userName`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `job_ID` int(6) NOT NULL AUTO_INCREMENT,
  `mID` int(6) DEFAULT NULL,
  `uName` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialNo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engineNo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt_date` date DEFAULT NULL,
  `Overridden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`job_ID`),
  KEY `mID` (`mID`),
  KEY `u_nm constraint` (`uName`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`job_ID`, `mID`, `uName`, `serialNo`, `engineNo`, `apt_date`, `Overridden`) VALUES
(2, 4, 'user1', 'x0001110101010', 'e00123654', '2020-03-25', 'yes'),
(7, 3, 'user2', 'x02351813121', 'e030230200', '2020-02-29', 'yes'),
(12, 5, 'user4', 'x0235181551', 'e0320684102', '2020-03-25', 'yes'),
(13, 2, 'user5', 'x03210324815', 'e0351325411', '2020-03-02', 'yes'),
(30, 4, 'user9', 'x03035130', 'e03250310', '2020-03-10', NULL),
(31, 1, 'user7', 'x03130021520', 'e031032416352', '2020-02-29', 'yes'),
(32, 5, 'user8', '1613131x813x1813', '168135135w1d35a1513', '2020-02-28', 'yes'),
(33, 2, 'user8', '1e5030e0333', '15e15105e896', '2020-02-29', NULL),
(37, 4, 'user2', 'hbukbuhukh4kuh', 'hukbnrkuhb5uh5k', '2020-03-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mechanicinfo`
--

DROP TABLE IF EXISTS `mechanicinfo`;
CREATE TABLE IF NOT EXISTS `mechanicinfo` (
  `ID` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mechanicinfo`
--

INSERT INTO `mechanicinfo` (`ID`, `name`, `contact`) VALUES
(1, 'mechanic 1', 123456789),
(2, 'mechanic 2', 321654789),
(3, 'mechanic 3', 369852147),
(4, 'mechanic 4', 324153957),
(5, 'mechanic 5', 159753652);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `uName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cNumber` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uName`, `name`, `address`, `cNumber`) VALUES
('user1', 'user one', 'Dhaka', '1234567890'),
('user10', 'user ten', 'dhaka', '12365474125'),
('user2', 'user two', 'dhaka', '321654789'),
('user3', 'user three', 'dhaka', '159753654'),
('user4', 'user four', 'dhaka', '1530023151'),
('user5', 'user five', 'dhaka', '1597536540'),
('user6', 'user six', 'dhaka', '1236541111'),
('user7', 'user seven', 'dhaka', '01000000000'),
('user8', 'user eight', 'dhaka', '111222111031'),
('user9', 'user nine', 'dhaka', '000111222333');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `uName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`uName`, `password`) VALUES
('user1', '$2y$10$epIuet9AYzyYKtNjpDcp3e1eOURkD6IdXQyCbz6WQudVLKW..Ycdi'),
('user10', '$2y$10$SL62VOLZHY8Z917vU.YLS.vkC5zYENqtRczB0d2.BIvLo6sdGxMve'),
('user2', '$2y$10$8Ap2Zu05Da74/9uG6V4m.eUAFHYbDurll.f5eUmataFXsZ4qxHA8W'),
('user3', '$2y$10$reSZ.aO/x47OyXbJ.mZIXe0XNbgbk98BwgCUxrjgXz9aykaT53906'),
('user4', '$2y$10$OxOER0Kee3wUiTlNfaRVmOCMzTFAOhT8jo599AAUrGu8n/C.dU99O'),
('user5', '$2y$10$eIXNvv5xhlxrJ.fOOUcRV.s0QChaPz9rSvFrOFxpNvuFhykToVfwa'),
('user6', '$2y$10$29xGlRstF52N.Mmx.cVgMOTKvLc.ykWOHXNZZc7SqdfiTNj33Mp8i'),
('user7', '$2y$10$brdl.sXwZuVumd1s0ffdy..J3qq98aNyniaW0/Jw3Gts3S8Cf/wWG'),
('user8', '$2y$10$18ga6WF04kXrxyCrni.j5eUvPQCIbsibqKAKgVeiwPqAFYejmTtZa'),
('user9', '$2y$10$dd5W6KiqyKwk1IKOP66IY.yFdoqorCQARcbkS4Mu7wHtYWP0ZUYTy');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`mID`) REFERENCES `mechanicinfo` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `u_nm constraint` FOREIGN KEY (`uName`) REFERENCES `userinfo` (`uName`) ON UPDATE CASCADE;

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userName` FOREIGN KEY (`uName`) REFERENCES `userinfo` (`uName`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

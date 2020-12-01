-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 10:40 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fr_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Title` varchar(100) DEFAULT NULL,
  `Content` varchar(1000) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `PublicationID` varchar(9) NOT NULL,
  `PublicationType` varchar(20) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Abstract` text NOT NULL,
  `Author` varchar(300) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Keywords` text DEFAULT NULL,
  `Month` int(11) DEFAULT NULL,
  `Year` int(11) NOT NULL,
  `Note` text DEFAULT NULL,
  `DateAddedToDB` date NOT NULL,
  `Address` text DEFAULT NULL,
  `Degree` varchar(200) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Source` text DEFAULT NULL,
  `Type` varchar(300) DEFAULT NULL,
  `Institution` varchar(100) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `BookTitle` varchar(500) DEFAULT NULL,
  `Editor` varchar(300) DEFAULT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Pages` int(11) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Series` varchar(100) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `DOI` varchar(10) DEFAULT NULL,
  `Journal` varchar(100) DEFAULT NULL,
  `Edition` varchar(15) DEFAULT NULL,
  `ISBN` varchar(16) DEFAULT NULL,
  `Price` decimal(6,2) DEFAULT NULL,
  `Chapter` varchar(10) DEFAULT NULL,
  `HowPublished` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`PublicationID`, `PublicationType`, `Title`, `Abstract`, `Author`, `Department`, `Keywords`, `Month`, `Year`, `Note`, `DateAddedToDB`, `Address`, `Degree`, `School`, `Source`, `Type`, `Institution`, `Number`, `BookTitle`, `Editor`, `Organization`, `Pages`, `Publisher`, `Series`, `Volume`, `DOI`, `Journal`, `Edition`, `ISBN`, `Price`, `Chapter`, `HowPublished`) VALUES
('111', 'Thesis', 'The Rise of CyberWarefare since 2006', 'This thesis discusses the reasons which made cyberwarfare better than traditional meduims', 'Ahmed Jamal', NULL, NULL, NULL, 2013, NULL, '2015-03-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('131', 'Book', 'Testing Methodology', 'This book discuss the methodolgy and techniques done in software testing', 'Ahmed Jamal', NULL, NULL, NULL, 2011, NULL, '2014-01-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('201', 'Book', 'Artifitial Intelligence', 'This book shows the techniques used in AI', 'Rayan Talal', NULL, NULL, NULL, 2015, NULL, '2016-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publicationfacultylink`
--

CREATE TABLE `publicationfacultylink` (
  `FacultyID` varchar(9) NOT NULL,
  `PublicationID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicationfacultylink`
--

INSERT INTO `publicationfacultylink` (`FacultyID`, `PublicationID`) VALUES
('201412345', '111'),
('201412345', '131'),
('201354321', '201');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Title` varchar(100) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Author` varchar(40) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suser`
--

CREATE TABLE `suser` (
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `ID` varchar(9) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Pswrd` varchar(20) NOT NULL,
  `ExperienceYears` int(11) DEFAULT NULL,
  `Expertise` varchar(20) DEFAULT NULL,
  `Bio` varchar(500) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Educatoin` varchar(50) DEFAULT NULL,
  `OfficeLocation` varchar(20) DEFAULT NULL,
  `PhoneNo` varchar(15) DEFAULT NULL,
  `Photo` varbinary(21844) DEFAULT NULL,
  `Website` varchar(50) DEFAULT NULL,
  `Membership` varchar(30) DEFAULT NULL,
  `regReason` varchar(500) DEFAULT NULL,
  `Flag` varchar(1) NOT NULL,
  `dateRegistered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suser`
--

INSERT INTO `suser` (`FName`, `LName`, `ID`, `Email`, `Pswrd`, `ExperienceYears`, `Expertise`, `Bio`, `Department`, `Educatoin`, `OfficeLocation`, `PhoneNo`, `Photo`, `Website`, `Membership`, `regReason`, `Flag`, `dateRegistered`) VALUES
('Mohammed', 'Ahmed', '201312345', 'mm@kfupm.edu.sa', 'm12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
('Rayan', 'Talal', '201354321', 'rt@kfupm.edu.sa', 'rt12312345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
('Ahmed', 'Jamal', '201412345', 'aj@kfupm.edu.sa', 'a12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
('Abdulla', 'Hussain', '201454321', 'ah@kfupm.edu.sa', 'ah12312345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
('Husni', 'Hamad', '201512345', 'hh@kfupm.edu.sa', 'h12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`PublicationID`);

--
-- Indexes for table `publicationfacultylink`
--
ALTER TABLE `publicationfacultylink`
  ADD KEY `FacultyID` (`FacultyID`),
  ADD KEY `PublicationID` (`PublicationID`);

--
-- Indexes for table `suser`
--
ALTER TABLE `suser`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FName` (`FName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `publicationfacultylink`
--
ALTER TABLE `publicationfacultylink`
  ADD CONSTRAINT `publicationfacultylink_ibfk_1` FOREIGN KEY (`FacultyID`) REFERENCES `suser` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicationfacultylink_ibfk_2` FOREIGN KEY (`PublicationID`) REFERENCES `publication` (`PublicationID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

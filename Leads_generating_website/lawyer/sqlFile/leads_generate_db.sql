-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 07:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leads_generate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `ID` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ID`, `city`, `zipcode`) VALUES
(16, 'Dayton,OH', 45390),
(26, 'Cleveland,OH', 44101),
(36, 'Cincinnati,OH', 45203),
(37, 'Columbus,OH', 43205);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `ID` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `ZipCode` int(5) NOT NULL,
  `State` varchar(70) NOT NULL,
  `Lawyer_category` varchar(40) NOT NULL,
  `legal_matter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`ID`, `Name`, `Email`, `PhoneNo`, `ZipCode`, `State`, `Lawyer_category`, `legal_matter`) VALUES
(1, 'demo', 'demo@gmail.com', '1231231234', 11111, 'New York', 'Child Custody', 'nothing'),
(2, 'faraz', 'muhammadfaraz991@gmail.com', '1234567890', 11111, 'New York', 'Child Custody', 'not'),
(3, 'fara', 'muhammadfaraz991@gmail.com', '', 12341, 'Washington', 'Divorce', 'aa'),
(5, 'faraz', 'muhammadfaraz991@gmail.com', '0028312345', 11234, 'New York', 'Child Custody', 'nothing'),
(6, 'saa', 'muhammadfaraz991@gmail.com', '1234579829', 11234, 'Washington', 'Divorce', 'nothing'),
(12, 'faraz', 'muhammadfaraz991@gmail.com', '1234567891', 12344, 'New York', 'Divorce', 'nothing'),
(30, 'faraz', 'muhammadfaraz991@gmail.com', '1234567891', 12344, 'New York', 'Divorce', 'nothing'),
(31, 'faraz', 'muhammadfaraz991@gmail.com', '1234567891', 12344, 'New York', 'Divorce', 'nothing'),
(32, 'muhammadfaraz', 'muhammadfaraz991@gmail.com', '0123412345', 0, '', 'Child Custody', 'nothing'),
(33, 'muahhas', 'muhammadfaraz991@gmail.com', '1234567890', 12344, '', 'Divorce', 'nothing'),
(34, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(35, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(36, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(37, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(38, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(39, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(40, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(41, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(42, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(43, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(44, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(45, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(46, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(47, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(48, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(49, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(50, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(51, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(52, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(53, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(54, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(55, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(56, 'jjasd', 'muh@gmail.com', '1234521122', 12344, '', 'Child Custody', 'jjd'),
(57, 'jameel', 'jameelkha@gmail.com', '1234567898', 12344, '', 'Family', 'nothing'),
(58, 'jameel', 'jameelkha@gmail.com', '1234567898', 12344, '', 'Family', 'nothing'),
(59, 'farazkhan', 'farazkhan@gmail.com', '1009388293', 12344, '', 'Family', 'nothing'),
(60, 'farazkhan', 'farazkhan@gmail.com', '1009388293', 12344, '', '', 'nothing'),
(61, 'farazkhan', 'muhammadfaraz991@gmail.com', '1237729922', 12344, '', '', 'nothing'),
(62, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(63, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(64, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(65, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(66, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(67, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(68, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(69, 'hhkjkj', 'jsjhd@gmail.com', '7672728292', 12344, '', '', 'nothing'),
(70, 'hammad', 'hammad@gmail.com', '1234578821', 12344, '', '', 'nothing'),
(71, 'ffa', 'muhamadfaraz991@gmail.com', '1234321421', 12344, '', '', 'nols'),
(72, 'aaassad', 'farazcaption@gmail.com', '2334234112', 12344, '', '', 'nothin'),
(73, 'aaassad', 'farazcaption@gmail.com', '2334234112', 12344, '', '', 'nothin'),
(74, 'aaassad', 'farazcaption@gmail.com', '2334234112', 12344, '', '', 'nothin'),
(75, 'hhsdf', 'muhammadfaraz991@gmail.com', '1234567835', 12344, '', '', 'nothing'),
(76, 'hhsdf', 'muhammadfaraz991@gmail.com', '1234567835', 12344, '', '', 'nothing'),
(77, 'kkksad', 'muhammadfaraz00@gmail.com', '1234567891', 12344, '', '', 'nothing'),
(78, 'mdk', 'muhammad@gmail.com', '1234568322', 12344, '', '', 'aasd'),
(79, 'ahsan', 'ahsa@gma.com', '1234567890', 12344, '', '', 'erfsdfsf'),
(80, 'ahsan', 'ahsanghaffar@gmail.com', '1232131312', 35801, '', '', 'nothing'),
(81, 'faraz', 'farazhussain@gmail.com', '1232122222', 99501, '', '', 'Lorem ipsum dolor sit amet, con sectetu adipiscing elit, sed do eius mod tempor. Lorem ipsum dolor sit amet'),
(82, 'muhamm', 'muhammadfaraz991@gmail.com', '1111111111', 35801, '', '', 'nothing'),
(83, 'hello', 'heelo@gmail.com', '2992019293', 85001, '', '', 'nothing'),
(84, 'hello', 'kkss@gmail.com', '1234567878', 35801, '', '', 'nothin'),
(85, 'ahsan', 'ahsan@gmail.com', '1234567865', 85001, '', '', 'nothing'),
(86, 'ahhs', 'muhammadfara@gmail.com', '1234567423', 0, '', '', 'demo'),
(87, 'ahs', 'ahsan@gmail.com', '1234567897', 85001, '', '', 'demo'),
(88, 'jjs', 'asd@gmail.com', '1234569302', 0, '', '', 'nothing'),
(89, 'hhasd', 'asdlkj@gmail.com', '1243567890', 0, '', '', 'nothing'),
(90, 'hhash', 'asjdhadasd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(91, 'sahhh', 'jsah@gmail.com', '8752617283', 0, '', '', 'nothing'),
(92, 'hghagsd', 'kjdshfkjs@gmail.com', '6565121212', 0, '', '', 'nothing'),
(93, 'sjadkhasjkdh', 'kjfdhjaksdf@gmail.com', '1234567890', 0, '', '', 'nothing'),
(94, 'riaz', 'riaz@gmail.com', '1233321234', 0, '', '', 'nothing'),
(95, 'riaz', 'riaz@gmail.com', '1233321234', 0, '', '', 'nothing'),
(96, 'jdhf', 'kj@gmail.com', '1234567890', 0, '', '', 'nothi'),
(97, 'hasgd', 'lkasjdlk@gmail.com', '1234567890', 0, '', '', 'nothing'),
(98, 'asjhd', 'asdas@gmail.com', '1234567890', 0, '', '', 'nothing'),
(99, 'jjjjsjh', 'asjdkh@gmail.com', '1234567898', 0, '', '', 'messae'),
(100, 'hhhg', 'asdas@gmail.com', '1234567890', 0, '', '', 'asas'),
(101, 'asadas', 'muhammadfraz@gmail.com', '1234567895', 0, '', '', 'nothing'),
(102, 'faraz', 'asdasd@gmail.com', '1234567895', 0, '', '', 'notj'),
(103, 'hello', 'hello@gmail.com', '1234567890', 0, '', '', 'nothing'),
(104, 'hhhsa', 'sdajash@gmail.com', '1234567890', 0, '', '', 'nothing'),
(105, 'hjgjh', 'dtrd@gmail.com', '1234567890', 0, '', '', 'mnmn'),
(106, 'nnb', 'fgd@gmail.com', '2134567890', 0, '', '', 'ggg'),
(107, 'nnb', 'fgd@gmail.com', '2134567890', 0, '', '', 'ggg'),
(108, 'nnb', 'fgd@gmail.com', '2134567890', 0, '', '', 'ggg'),
(109, 'nnb', 'fgd@gmail.com', '2134567890', 0, '', '', 'ggg'),
(110, 'nnb', 'fgd@gmail.com', '2134567890', 0, '', '', 'ggg'),
(111, 'faraz', 'adasd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(112, 'faraz', 'ms@gmail.com', '1234567890', 0, '', '', 'nothing'),
(113, 'asd', 'asd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(114, 'asdasd', 'asjdahs@gmail.com', '1234567890', 0, '', '', 'nothinas'),
(115, 'asdasd', 'asjdahs@gmail.com', '1234567890', 0, '', '', 'nothinas'),
(116, 'asdasd', 'asjdahs@gmail.com', '1234567890', 0, '', '', 'nothinas'),
(117, 'asdas', 'sadasd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(118, 'faraz', 'farazmuham@gmail.com', '1234567890', 0, '', '', 'nothing'),
(119, 'sgjdghas', 'jashd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(120, 'jashjkd', 'jaskldj@gmail.com', '1234567890', 0, '', '', 'nothing'),
(121, 'jjjasas', 'jashj@gmail.com', '1234567890', 0, '', '', 'nothing'),
(122, 'jjashdjk', 'ajskdh@gmail.com', '1234567890', 0, '', '', 'nothing'),
(123, 'jasdasd', 'asdasd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(124, 'asdscxzc', 'asdasc@gmail.com', '1234567890', 0, '', '', 'nothing'),
(125, 'hhhhsa', 'hhas@gmail.com', '1234567890', 0, '', '', 'nothing'),
(126, 'hhhas', 'masm@gmail.com', '1234567891', 0, '', '', 'nothing'),
(127, 'hashgd', 'kjsha@gmail.com', '1234567890', 0, '', '', 'nothing'),
(128, 'muha', 'asjhdjas@gmail.com', '1234567890', 0, '', '', 'nothin'),
(129, 'jks', 'asjdk@gmail.com', '1234567890', 0, '', '', 'nothing'),
(130, 'hgha', 'asjhd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(131, 'hhas', 'ajshd@gmail.com', '1234567890', 0, '', '', 'nothing'),
(132, 'jakjsd', 'asdjk@gmail.com', '1234567890', 0, '', '', 'nothing'),
(133, 'asdasd', 'ffff@gmail.com', '1234567890', 0, '', '', 'nothing'),
(134, 'adash', 'jjashd@gmail.com', '1234567890', 0, '', '', 'nothimg');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_invoice`
--

CREATE TABLE `lawyer_invoice` (
  `id` int(11) NOT NULL,
  `LawyerID` int(11) NOT NULL,
  `LawyerName` varchar(200) NOT NULL,
  `TransactionID` int(100) NOT NULL,
  `ClientID` int(100) NOT NULL,
  `EntityType` varchar(100) NOT NULL,
  `EntityID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Division` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Invoice` int(100) NOT NULL,
  `Created` datetime(6) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_invoice`
--

INSERT INTO `lawyer_invoice` (`id`, `LawyerID`, `LawyerName`, `TransactionID`, `ClientID`, `EntityType`, `EntityID`, `Name`, `Email`, `Phone`, `Division`, `Amount`, `Type`, `Description`, `Invoice`, `Created`, `status`) VALUES
(52, 2, 'Faraz Hussain', 0, 1, 'Leads', 0, 'ahsan', 'ahsanghaffar@gmail.com', '1232131312', '', 10, '', '', 0, '2019-09-20 08:36:51.000000', 'CallBack'),
(53, 3, 'ahsan ghafar', 0, 1, 'Leads', 0, 'faraz', 'farazhussain@gmail.com', '1232122222', '', 10, '', '', 0, '2019-09-20 09:48:36.000000', 'New'),
(54, 2, 'Faraz Hussain', 0, 1, 'Leads', 0, 'muhamm', 'muhammadfaraz991@gmail.com', '1111111111', '', 10, '', '', 0, '2019-09-20 10:57:13.000000', 'New'),
(55, 2, 'Faraz Hussain', 0, 1, 'Leads', 0, 'hello', 'kkss@gmail.com', '1234567878', '', 10, '', '', 0, '2019-09-20 12:22:37.000000', 'New'),
(56, 5, 'muhammadfara', 0, 1, 'Leads', 0, 'ahs', 'ahsan@gmail.com', '1234567897', '', 10, '', '', 0, '2019-09-20 13:57:19.000000', 'New'),
(57, 4, 'hammad', 0, 1, 'Leads', 0, 'sahhh', 'jsah@gmail.com', '8752617283', '', 10, '', '', 0, '2019-09-22 18:21:00.000000', 'New'),
(58, 4, 'hammad', 0, 1, 'Leads', 0, 'hghagsd', 'kjdshfkjs@gmail.com', '6565121212', '', 10, '', '', 0, '2019-09-22 18:21:53.000000', 'New'),
(59, 4, 'hammad', 0, 1, 'Leads', 0, 'sjadkhasjkdh', 'kjfdhjaksdf@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-22 18:39:19.000000', 'New'),
(60, 4, 'hammad', 0, 1, 'Leads', 0, 'riaz', 'riaz@gmail.com', '1233321234', '', 10, '', '', 0, '2019-09-22 20:24:09.000000', 'New'),
(61, 4, 'hammad', 0, 1, 'Leads', 0, 'riaz', 'riaz@gmail.com', '1233321234', '', 10, '', '', 0, '2019-09-22 20:25:16.000000', 'New'),
(62, 4, 'hammad', 0, 1, 'Leads', 0, 'jdhf', 'kj@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-22 20:27:08.000000', 'New'),
(63, 7, 'faraz', 0, 1, 'Leads', 0, 'hasgd', 'lkasjdlk@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-22 22:17:30.000000', 'New'),
(64, 4, 'hammad', 0, 1, 'Leads', 0, 'hhhg', 'asdas@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-23 09:07:08.000000', 'New'),
(65, 4, 'hammad', 0, 1, 'Leads', 0, 'asadas', 'muhammadfraz@gmail.com', '1234567895', '', 10, '', '', 0, '2019-09-24 18:11:00.000000', 'New'),
(66, 7, 'faraz', 0, 1, 'Leads', 0, 'faraz', 'asdasd@gmail.com', '1234567895', '', 10, '', '', 0, '2019-09-24 18:11:51.000000', 'New'),
(67, 4, 'hammad', 0, 1, 'Leads', 0, 'hello', 'hello@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-24 18:25:47.000000', 'New'),
(68, 7, 'faraz', 0, 1, 'Leads', 0, 'hhhsa', 'sdajash@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 16:45:11.000000', 'New'),
(69, 7, 'faraz', 0, 1, 'Leads', 0, 'hjgjh', 'dtrd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 16:47:49.000000', 'New'),
(70, 4, 'hammad', 0, 1, 'Leads', 0, 'nnb', 'fgd@gmail.com', '2134567890', '', 10, '', '', 0, '2019-09-25 16:49:11.000000', 'New'),
(71, 4, 'hammad', 0, 1, 'Leads', 0, 'nnb', 'fgd@gmail.com', '2134567890', '', 10, '', '', 0, '2019-09-25 16:50:58.000000', 'New'),
(72, 4, 'hammad', 0, 1, 'Leads', 0, 'nnb', 'fgd@gmail.com', '2134567890', '', 10, '', '', 0, '2019-09-25 17:06:59.000000', 'New'),
(73, 7, 'faraz', 0, 1, 'Leads', 0, 'nnb', 'fgd@gmail.com', '2134567890', '', 10, '', '', 0, '2019-09-25 17:21:13.000000', 'New'),
(74, 4, 'hammad', 0, 1, 'Leads', 0, 'nnb', 'fgd@gmail.com', '2134567890', '', 10, '', '', 0, '2019-09-25 17:34:42.000000', 'New'),
(75, 4, 'hammad', 0, 1, 'Leads', 0, 'faraz', 'adasd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 18:16:29.000000', 'New'),
(76, 4, 'hammad', 0, 1, 'Leads', 0, 'faraz', 'ms@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 18:19:37.000000', 'New'),
(77, 4, 'hammad', 0, 1, 'Leads', 0, 'asd', 'asd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 18:22:27.000000', 'New'),
(78, 7, 'faraz', 0, 1, 'Leads', 0, 'asdasd', 'asjdahs@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-25 20:34:50.000000', 'New'),
(79, 7, 'faraz', 0, 1, 'Leads', 0, 'faraz', 'farazmuham@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-26 20:26:09.000000', 'New'),
(80, 7, 'faraz', 0, 0, 'Leads', 0, 'sgjdghas', 'jashd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:26:29.000000', ''),
(81, 4, 'hammad', 0, 0, 'Leads', 0, 'jashjkd', 'jaskldj@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:29:31.000000', ''),
(82, 4, 'hammad', 0, 0, 'Leads', 0, 'jjjasas', 'jashj@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:33:14.000000', ''),
(83, 7, 'faraz', 0, 0, 'Leads', 0, 'jjashdjk', 'ajskdh@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:34:07.000000', ''),
(84, 7, 'faraz', 0, 123, 'Leads', 0, 'jasdasd', 'asdasd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:36:19.000000', ''),
(85, 7, 'faraz', 0, 124, 'Leads', 0, 'asdscxzc', 'asdasc@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 09:37:22.000000', ''),
(86, 7, 'faraz', 0, 128, 'Leads', 0, 'muha', 'asjhdjas@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 17:25:08.000000', ''),
(87, 7, 'faraz', 0, 129, 'Leads', 0, 'jks', 'asjdk@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 17:41:45.000000', ''),
(88, 7, 'faraz', 0, 130, 'Leads', 0, 'hgha', 'asjhd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 17:48:55.000000', ''),
(89, 7, 'faraz', 0, 131, 'Leads', 0, 'hhas', 'ajshd@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 17:50:05.000000', ''),
(90, 4, 'hammad', 0, 132, 'Leads', 0, 'jakjsd', 'asdjk@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 17:50:38.000000', ''),
(91, 7, 'faraz', 0, 133, 'Leads', 0, 'asdasd', 'ffff@gmail.com', '1234567890', '', 10, '', '', 0, '2019-09-28 21:45:58.000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_profile`
--

CREATE TABLE `lawyer_profile` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `idhash` varchar(100) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Organization` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city2` varchar(100) NOT NULL,
  `city3` varchar(100) NOT NULL,
  `city4` varchar(100) NOT NULL,
  `Zipcode` int(5) NOT NULL,
  `Leads` int(100) NOT NULL,
  `total_Leads` int(100) NOT NULL,
  `PendingBalance` int(100) NOT NULL,
  `DummyLeads` int(100) NOT NULL,
  `Picture` varchar(120) NOT NULL,
  `Catogory` varchar(255) NOT NULL,
  `Description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_profile`
--

INSERT INTO `lawyer_profile` (`id`, `active`, `idhash`, `Name`, `Organization`, `Email`, `Password`, `Contact`, `state`, `city2`, `city3`, `city4`, `Zipcode`, `Leads`, `total_Leads`, `PendingBalance`, `DummyLeads`, `Picture`, `Catogory`, `Description`) VALUES
(1, 0, 'c4ca4238a0b923820dcc509a6f75849b', 'nnn', 'as', 'muhammadfaraz991@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12342123', 'Dayton,OH', 'Cleveland,OH', '', '', 12344, 117, 30, 0, 3, '56903f7e5244a044e949edb3864d3dad.PNG', 'Family', 'Whether you are faced with a divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family'),
(2, 1, 'c81e728d9d4c2f636f067f89cc14862c', 'Faraz Hussain', 'student', 'farazmuhammad1998@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '0213728192', 'Dayton,OH', '', '', '', 35801, 3, 0, 60, 0, 'h-goodrich-la_md.jpg', 'Family', 'hello world'),
(3, 0, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'ahsan ghafar', 'xyz', 'ahsanghaffar@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Dayton,OH', '', '', '', 99501, 1, 0, 30, 0, 'a-pirnia-ca_md.jpg', 'Family', 'Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.'),
(4, 0, 'a87ff679a2f3e71d9181a67b7542122c', 'hammad', 'student', 'hammadkhan@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1222222222', 'Dayton,OH', '', '', '', 35801, 19, 190, 0, 19, 'g-lippow-wi_md.jpg', 'Family', 'Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.'),
(5, 0, 'e4da3b7fbbce2345d7772b0674a318d5', 'muhammadfara', 'xyz', 'muhammadfaraz991@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1222222222', 'Dayton,OH', '', '', '', 85001, 1, 10, 20, 1, 'IMG_8697 faraz.jpg', 'Family', 'Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.'),
(6, 0, '1679091c5a880faf6fb5e6087eb1b2dc', 'ftuyu', 'abc', 'far@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2222222222', 'Dayton,OH', '', '', '', 12345, 0, 0, 40, 0, 'h-goodrich-la_md.jpg', 'Family', 'Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.'),
(7, 0, '8f14e45fceea167a5a36dedd4bea2543', 'faraz', 'stude', 'mfaraz@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 35801, 16, 160, 0, 16, 'a-pirnia-ca_md.jpg', 'Family', 'Whether you are faced with a pending divorce or need help in resolving a child custody or visitation rights issue, the legal challenges you face can seem overwhelming. Family law issues directly impact the most intimate relationships and it is our goal is to provide you immediate access to the legal assistance you need to make the right decisions for your future and your family.'),
(8, 0, 'c9f0f895fb98ab9159f51fd0297e236d', 'asjdkjh', 'asjkdh', 'mlshajdk@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 12345, 0, 0, 50, 0, '', '', ''),
(9, 0, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'asd', 'sadasd', 'm@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 12343, 0, 0, 60, 0, '', '', ''),
(10, 0, '', 'faraz khan', 'student', 'mfaraz1998@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 12345, 0, 0, 30, 0, 'a-pirnia-ca_md.jpg', 'Family', 'Represent clients in criminal and civil litigation and other legal proceedings, draw up legal documents, or manage or advise clients on legal transactions. May specialize in a single area or may practice broadly in many areas of law. Represent clients in court or before government agencies.'),
(11, 0, '6512bd43d9caa6e02c990b0a82652dca', 'faraz', 'student', 'mfaraz@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 35816, 0, 0, 40, 0, 'g-lippow-wi_md.jpg', 'Family', 'hello'),
(12, 0, '', 'talh', 'student', 'talha@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1234567890', 'Dayton,OH', '', '', '', 35801, 0, 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `LawyerID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `LawyerID`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 0, 'faraz', 'gggs@gmail.com', 4242, '10', '2019', 'Leads', '', 9000.00, 'USD', '9000', 'usd', 'txn_1FNazMHeE8qLdogmCqLIr7U3', 'succeeded', '2019-09-28 13:09:13', '2019-09-28 13:09:13'),
(2, 0, 'faraz', 'farazmuhammad1998@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbKEHeE8qLdogmwwo25r2t', 'succeeded', '2019-09-28 13:30:47', '2019-09-28 13:30:47'),
(3, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbO4HeE8qLdogmEpjVI6Q6', 'succeeded', '2019-09-28 13:34:45', '2019-09-28 13:34:45'),
(4, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbUdHeE8qLdogm3AM5ey84', 'succeeded', '2019-09-28 13:41:32', '2019-09-28 13:41:32'),
(5, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbVpHeE8qLdogmFBexCsrJ', 'succeeded', '2019-09-28 13:42:46', '2019-09-28 13:42:46'),
(6, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbXEHeE8qLdogmBSoFSMzZ', 'succeeded', '2019-09-28 13:44:14', '2019-09-28 13:44:14'),
(7, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbYzHeE8qLdogmn33TpkGu', 'succeeded', '2019-09-28 13:46:02', '2019-09-28 13:46:02'),
(8, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbaWHeE8qLdogmDxwJkwbW', 'succeeded', '2019-09-28 13:47:38', '2019-09-28 13:47:38'),
(9, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbb7HeE8qLdogmj9tJlNNu', 'succeeded', '2019-09-28 13:48:14', '2019-09-28 13:48:14'),
(10, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbbkHeE8qLdogmcTytZyWV', 'succeeded', '2019-09-28 13:48:53', '2019-09-28 13:48:53'),
(11, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbcCHeE8qLdogmVSLVG2e7', 'succeeded', '2019-09-28 13:49:21', '2019-09-28 13:49:21'),
(12, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbcwHeE8qLdogmOf1Vuelw', 'succeeded', '2019-09-28 13:50:07', '2019-09-28 13:50:07'),
(13, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbfSHeE8qLdogm4NL4ovoZ', 'succeeded', '2019-09-28 13:52:43', '2019-09-28 13:52:43'),
(14, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '10', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbfmHeE8qLdogmZx7J9c4X', 'succeeded', '2019-09-28 13:53:04', '2019-09-28 13:53:04'),
(15, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbx7HeE8qLdogmElJ0Jzo3', 'succeeded', '2019-09-28 14:10:58', '2019-09-28 14:10:58'),
(16, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNbz0HeE8qLdogmSDUXCE0s', 'succeeded', '2019-09-28 14:12:55', '2019-09-28 14:12:55'),
(17, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNc05HeE8qLdogmNM5lQCs1', 'succeeded', '2019-09-28 14:14:03', '2019-09-28 14:14:03'),
(18, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 5000.00, 'USD', '5000', 'usd', 'txn_1FNc4nHeE8qLdogmEXxEnz25', 'succeeded', '2019-09-28 14:18:54', '2019-09-28 14:18:54'),
(19, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNcI5HeE8qLdogmroBY2l84', 'succeeded', '2019-09-28 14:32:39', '2019-09-28 14:32:39'),
(20, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNcjZHeE8qLdogm45nUuEO0', 'succeeded', '2019-09-28 15:01:03', '2019-09-28 15:01:03'),
(21, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNckfHeE8qLdogm70VmiCqP', 'succeeded', '2019-09-28 15:02:10', '2019-09-28 15:02:10'),
(22, 5, 'muhammadfara', 'muhammadfaraz991@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNcmQHeE8qLdogmdqTcmrao', 'succeeded', '2019-09-28 15:04:00', '2019-09-28 15:04:00'),
(23, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '09', '2020', 'Leads', '', 2000.00, 'USD', '2000', 'usd', 'txn_1FNzGqHeE8qLdogmNCS5Jput', 'succeeded', '2019-09-29 15:04:53', '2019-09-29 15:04:53'),
(24, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '09', '2020', 'Leads', '', 4000.00, 'USD', '4000', 'usd', 'txn_1FNzHfHeE8qLdogmCiWn0DNW', 'succeeded', '2019-09-29 15:05:44', '2019-09-29 15:05:44'),
(25, 2, 'Faraz Hussain', 'farazmuhammad1998@gmail.com', 4242, '09', '2020', 'Leads', '', 4000.00, 'USD', '4000', 'usd', 'txn_1FNzIiHeE8qLdogmzcWjHmNk', 'succeeded', '2019-09-29 15:06:49', '2019-09-29 15:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `LawyerID` int(11) NOT NULL,
  `LawyerEmail` varchar(100) NOT NULL,
  `Report` varchar(120) NOT NULL,
  `Problem` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `LawyerID`, `LawyerEmail`, `Report`, `Problem`) VALUES
(1, 1, 'farazmuhammad1998@gmail.com', 'apple-touch-icon-precomposed.png', ''),
(2, 1, 'farazmuhammad1998@gmail.com', 'apple-touch-icon-precomposed.png', ''),
(3, 1, 'farazmuhammad1998@gmail.com', '', ''),
(4, 1, 'farazmuhammad1998@gmail.com', '', ''),
(5, 1, 'farazmuhammad1998@gmail.com', '', ''),
(6, 1, 'farazmuhammad1998@gmail.com', 'logo-sq-wbg.png', ''),
(7, 1, 'farazmuhammad1998@gmail.com', 'apple-touch-icon.png', 'hello world');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lawyer_invoice`
--
ALTER TABLE `lawyer_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `lawyer_invoice`
--
ALTER TABLE `lawyer_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

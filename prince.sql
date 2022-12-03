-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 07:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prince`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(0, 'Laptop'),
(1, 'Mouse'),
(2, 'Monitor'),
(3, 'Motherboard'),
(4, 'Processor'),
(5, 'Power Supply'),
(6, 'Headset'),
(7, 'CPU'),
(9, 'Others'),
(19, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE_NUMBER`, `ADDRESS`) VALUES
(9, 'Hailee', 'Steinfield', '', '09394566543', ''),
(11, 'A Walk in Customer', NULL, '', NULL, ''),
(14, 'Chuchay', 'Jusay', '', '09781633451', ''),
(15, 'Kimbert', 'Duyag', '', '09956288467', ''),
(16, 'Dieqcohr', 'Rufino', '', '09891344576', ''),
(17, 'Nath', 'Frones', '', '09564321221', ''),
(18, 'Nathaniel', 'Frones', '', '0987654443', ''),
(19, 'Poca', 'Hontas', 'pocahontas@gmail.com', '09786545654', 'Zamboanga City'),
(21, 'Elle', 'Fontaine', 'ellefontaine@gmail.com', '0987654443', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Eddie', 'Ramos', 'Male', 'eddie@gmail.com', '09265467898', 1, '2021-09-02', 113),
(2, 'Josuey', 'Mag-asos', 'Male', 'jmagaso@yahoo.com', '09091245761', 2, '2019-01-28', 156),
(4, 'Monica', 'Empinado', 'Female', 'monicapadernal@gmail.com', '09123357105', 1, '2019-03-06', 158),
(5, 'Jack', 'Red', 'Male', 'jack@gmail.com', '0934567845', 3, '2021-05-10', 159),
(6, 'James', 'Tuban', 'Male', 'jtuban4@gmail.com', '09878909890', 3, '2022-09-02', 160);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Technician'),
(4, 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(111, 'Negros Occidental', 'Bacolod City'),
(112, 'Negros Occidental', 'Bacolod City'),
(113, 'Zamboanga del Sur', 'Zamboanga'),
(114, 'Negros Occidental', 'Himamaylan'),
(115, 'Negros Oriental', 'Dumaguette City'),
(116, 'Negros Occidental', 'Isabella'),
(126, 'Negros Occidental', 'Binalbagan'),
(130, 'Cebu', 'Bogo City'),
(131, 'Negros Occidental', 'Himamaylan'),
(132, 'Negros', 'Jupiter'),
(133, 'Aincrad', 'Floor 91'),
(134, 'negros', 'binalbagan'),
(135, 'hehe', 'tehee'),
(136, 'PLANET YEKOK', 'KOKEY'),
(137, 'Camiguin', 'Catarman'),
(138, 'Camiguin', 'Catarman'),
(139, 'Negros Occidental', 'Binalbagan'),
(140, 'Batangas', 'Lemery'),
(141, 'Capiz', 'Panay'),
(142, 'Camarines Norte', 'Labo'),
(143, 'Camarines Norte', 'Labo'),
(144, 'Camarines Norte', 'Labo'),
(145, 'Camarines Norte', 'Labo'),
(146, 'Capiz', 'Pilar'),
(147, 'Negros Occidental', 'Moises Padilla'),
(148, 'a', 'a'),
(149, '1', '1'),
(150, 'Negros Occidental', 'Himamaylan'),
(151, 'Masbate', 'Mandaon'),
(152, 'Aklanas', 'Madalagsasa'),
(153, 'Batangas', 'Mabini'),
(154, 'Bataan', 'Morong'),
(155, 'Capiz', 'Pillar'),
(156, 'Negros Occidental', 'Bacolod'),
(157, 'Camarines Norte', 'Labo'),
(158, 'Negros Occidental', 'Binalbagan'),
(159, 'Zamboanga del Sur', 'Zamboanga City'),
(160, 'Zamboanga del Sur', 'Zamboanga City');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805'),
('Emman', 'Adventures', 116, 'emman@', '09123346576'),
('Bruce', 'Willis', 113, 'bruce@', NULL),
('Regine', 'Santos', 111, 'regine@', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `SERIAL_NO` varchar(255) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) DEFAULT NULL,
  `ISTATUS` varchar(20) DEFAULT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `SERIAL_NO`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ISTATUS`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`) VALUES
(1, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 15, '2019-03-02'),
(3, '20191003', '', 'Predator Helios 300 Gaming Laptop', 'Windows 10 Home\r\nIntelÂ® Coreâ„¢ i7-8750H processor Hexa-core 2.20 GHz\r\n15.6\" Full HD (1920 x 1080) ', 1, NULL, 1, 77850, 7, 15, '2019-03-02'),
(4, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 11, '2019-03-02'),
(5, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-03'),
(6, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 11, '2019-03-04'),
(8, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 11, '2019-03-05'),
(9, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 11, '2019-03-04'),
(10, '20191004', '', 'Fantech EG1', 'BEST FOR MOBILE PHONE GAMERS\r\nSPEAKER:10mm\r\nIMPEDANCE: 18+-15%\r\nFREQUENCY RESPONSE: 20 TO 20khz\r\nMICROPHONE : OMNI DIRECTIONAL\r\nJACK: AUDIO+MICROPHONE\r\nCOMBINED JACK 3.5 WIRE\r\nWIRE LENGTH: 1.3M\r\nWhat in inside:-1 pcs Female 3.5mm to Audio and\r\nmicrop', 1, NULL, 1, 859, 6, 13, '2019-03-06'),
(11, '20191004', '', 'Fantech EG1', 'a', 1, NULL, 1, 895, 6, 13, '2019-03-01'),
(12, '20191004', '', 'Fantech EG1', 'a', 1, NULL, 1, 895, 6, 13, '2019-03-01'),
(13, '20191004', '', 'Fantech EG1', 'a', 1, NULL, 1, 895, 6, 13, '2019-03-01'),
(14, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(15, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(16, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(17, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(18, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(19, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(20, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(21, '20191002', 'hello123', 'Newmen E120', 'haha', 1, NULL, 1, 550, 9, 15, '2019-03-06'),
(22, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 12, '2019-03-11'),
(23, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 12, '2019-03-11'),
(24, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 12, '2019-03-11'),
(25, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 12, '2019-03-11'),
(26, '20191001', '1123234543321', 'Lenovo ideapad 20059', 'Windows 8', 1, NULL, 1, 32999, 7, 12, '2019-03-11'),
(27, '20191005', '', 'A4tech OP-720', 'normal mouse', 1, NULL, 1, 289, 1, 16, '2019-03-13'),
(28, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(29, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(30, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(31, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(32, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(33, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(34, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(35, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(36, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20'),
(37, '20210011', '23456543138a', 'Intel Core i5', 'Intel core i5', 1, NULL, 1, 5000, 4, 13, '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `REPAIR_ID` int(11) NOT NULL,
  `JOB_ORDER_NO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `STATUS` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT 'assigned',
  `SERIAL_NO` varchar(50) DEFAULT NULL,
  `REPAIR_NAME` varchar(255) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`REPAIR_ID`, `JOB_ORDER_NO`, `CUST_ID`, `STATUS`, `SERIAL_NO`, `REPAIR_NAME`, `CATEGORY_ID`, `tstamp`) VALUES
(2, '6321d9f1e0e26', 9, 'assigned', '246810', 'Sample Modal', 0, '2022-09-14 21:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `STATUS_ID` int(11) NOT NULL,
  `STAT_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(11, 'InGame Tech', 114, '09457488521'),
(12, 'Asus', 115, '09635877412'),
(13, 'Razer Co.', 111, '09587855685'),
(15, 'Strategic Technology Co.', 116, '09124033805'),
(16, 'A4tech', 155, '09775673257');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`) VALUES
(3, 16, '3', '456,982.00', '48,962.36', '408,019.64', '48,962.36', '456,982.00', '500000', '2019-03-18', '0318160336'),
(4, 11, '2', '1,967.00', '210.75', '1,756.25', '210.75', '1,967.00', '2000', '2019-03-18', '0318160622'),
(5, 14, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2019-03-18', '0318170309'),
(6, 15, '1', '77,850.00', '8,341.07', '69,508.93', '8,341.07', '77,850.00', '80000', '2019-03-18', '0318170352'),
(7, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170511'),
(8, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170524'),
(9, 14, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170551'),
(10, 11, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '500', '2019-03-18', '0318170624'),
(11, 9, '2', '1,148.00', '123.00', '1,025.00', '123.00', '1,148.00', '2000', '2019-03-18', '0318170825'),
(12, 9, '1', '5,500.00', '589.29', '4,910.71', '589.29', '5,500.00', '6000', '2019-03-18 19:40 pm', '0318194016'),
(13, 17, '2', '78,139.00', '8,372.04', '69,766.96', '8,372.04', '78,139.00', '80000', '2021-05-05 06:17 am', '050561755'),
(14, 17, '2', '1,437.00', '153.96', '1,283.04', '153.96', '1,437.00', '1437', '2021-05-10 01:09 PM', '051070956'),
(15, 19, '1', '389,250.00', '41,705.36', '347,544.64', '41,705.36', '389,250.00', '400000', '2021-05-18 09:47 AM', '051834747'),
(16, 11, '1', '1,156.00', '123.86', '1,032.14', '123.86', '1,156.00', '1156', '2021-05-18 10:11 AM', '051841150');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`) VALUES
(7, '0318160336', 'Lenovo ideapad 20059', '2', '32999', 'Prince Ly', 'Manager'),
(8, '0318160336', 'Predator Helios 300 Gaming Laptop', '5', '77850', 'Prince Ly', 'Manager'),
(9, '0318160336', 'A4tech OP-720', '6', '289', 'Prince Ly', 'Manager'),
(10, '0318160622', 'Newmen E120', '2', '550', 'Prince Ly', 'Manager'),
(11, '0318160622', 'A4tech OP-720', '3', '289', 'Prince Ly', 'Manager'),
(12, '0318170309', 'Newmen E120', '1', '550', 'Prince Ly', 'Manager'),
(13, '0318170352', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Prince Ly', 'Manager'),
(14, '0318170511', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(15, '0318170524', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(16, '0318170551', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(17, '0318170624', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(18, '0318170825', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(19, '0318170825', 'Fantech EG1', '1', '859', 'Prince Ly', 'Manager'),
(20, '0318194016', 'Newmen E120', '10', '550', 'Josuey', 'Cashier'),
(21, '050561755', 'A4tech OP-720', '1', '289', 'Josuey', 'Cashier'),
(22, '050561755', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Josuey', 'Cashier'),
(23, '051070956', 'A4tech OP-720', '2', '289', 'Admin', 'Manager'),
(24, '051070956', 'Fantech EG1', '1', '859', 'Admin', 'Manager'),
(25, '051834747', 'Predator Helios 300 Gaming Laptop', '5', '77850', 'Eddie', 'Manager'),
(26, '051841150', 'A4tech OP-720', '4', '289', 'Eddie', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(7, 2, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2),
(9, 4, 'mncpdrnl', '8cb2237d0679ca88db6464eac60da96345513964', 2),
(10, 1, 'eddie', 'bacc1c505cb1756c59242c0a8ee25cd990a210e9', 2),
(11, 6, 'james', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`) USING BTREE;

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`REPAIR_ID`),
  ADD UNIQUE KEY `CUST_ID` (`CUST_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `REPAIR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`SUPPLIER_ID`);

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `repairs_ibfk_2` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_details` (`TRANS_D_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

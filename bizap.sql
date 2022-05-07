-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2021 at 02:09 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bizap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyincentive`
--

CREATE TABLE IF NOT EXISTS `dailyincentive` (
  `stafftag` varchar(10) NOT NULL,
  `staffincentive` varchar(20) NOT NULL,
  `fd` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyincentive`
--

INSERT INTO `dailyincentive` (`stafftag`, `staffincentive`, `fd`) VALUES
('1001', '50', '2020-2-1'),
('1005', '0', '2020-2-1'),
('1001', '140', '2020-2-1'),
('1005', '0', '2020-2-1'),
('1001', '95', '2020-2-1'),
('1001', '80', '2020-2-1'),
('1007', '260', '2020-2-1'),
('1007', '130', '2020-2-1'),
('1001', '140', '2020-2-1'),
('1007', '220', '2020-2-1'),
('1007', '780', '2020-2-1'),
('1007', '265', '2020-2-1'),
('1007', '60', '2020-2-1'),
('1005', '0', '2020-2-10'),
('1005', '0', '2020-4-9'),
('1001', '150', '2020-9-24');

-- --------------------------------------------------------

--
-- Table structure for table `debtpaymenttable`
--

CREATE TABLE IF NOT EXISTS `debtpaymenttable` (
  `customer` varchar(100) NOT NULL,
  `amountowed` double NOT NULL,
  `fulldate` date NOT NULL,
  `salesp` varchar(100) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `amountpd` double NOT NULL,
  `debtbal` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtpaymenttable`
--

INSERT INTO `debtpaymenttable` (`customer`, `amountowed`, `fulldate`, `salesp`, `day`, `month`, `year`, `amountpd`, `debtbal`) VALUES
('Victor Peters', 4500, '2020-02-01', '1001', 1, 2, 2020, 2000, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `debtsummary`
--

CREATE TABLE IF NOT EXISTS `debtsummary` (
  `customer` varchar(100) NOT NULL,
  `totaldebt` double NOT NULL,
  PRIMARY KEY (`customer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtsummary`
--

INSERT INTO `debtsummary` (`customer`, `totaldebt`) VALUES
('Victor Peters', 12500);

-- --------------------------------------------------------

--
-- Table structure for table `debttable`
--

CREATE TABLE IF NOT EXISTS `debttable` (
  `customer` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `fulldate` date NOT NULL,
  `salesp` varchar(100) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debttable`
--

INSERT INTO `debttable` (`customer`, `amount`, `fulldate`, `salesp`, `day`, `month`, `year`) VALUES
('Victor Peters', 4500, '2020-02-01', '1005', 1, 2, 2020),
('Victor Peters', 10000, '2020-02-10', '1001', 10, 2, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `typeofexpense` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(500) NOT NULL,
  `fulldate` date NOT NULL,
  `salesp` varchar(100) NOT NULL,
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`typeofexpense`, `amount`, `description`, `fulldate`, `salesp`, `day`, `month`, `year`) VALUES
('Reinvestment', 45000, '5 Crates of Heineken', '2020-02-01', '1005', 1, 2, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `incentive`
--

CREATE TABLE IF NOT EXISTS `incentive` (
  `incntv` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incentive`
--


-- --------------------------------------------------------

--
-- Table structure for table `incentives`
--

CREATE TABLE IF NOT EXISTS `incentives` (
  `stafftag` varchar(20) NOT NULL,
  `totalincentive` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incentives`
--

INSERT INTO `incentives` (`stafftag`, `totalincentive`) VALUES
('1007', 1715);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `altphone` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthmonth` varchar(20) NOT NULL,
  `birthday` int(10) NOT NULL,
  PRIMARY KEY (`fullname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`fullname`, `phone`, `altphone`, `address`, `email`, `birthmonth`, `birthday`) VALUES
('Victor Peters', '08035840779', '', 'Autograph', 'victor_peters57@yahoo.com', 'May', 26);

-- --------------------------------------------------------

--
-- Table structure for table `paidincentive`
--

CREATE TABLE IF NOT EXISTS `paidincentive` (
  `staffid` varchar(20) NOT NULL,
  `incentive` varchar(20) NOT NULL,
  `paiddate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paidincentive`
--


-- --------------------------------------------------------

--
-- Table structure for table `productcat`
--

CREATE TABLE IF NOT EXISTS `productcat` (
  `prodcat` varchar(100) NOT NULL,
  UNIQUE KEY `category` (`prodcat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcat`
--

INSERT INTO `productcat` (`prodcat`) VALUES
('Cigarette'),
('Drinks'),
('Food'),
('Photography'),
('Takeaway Pack');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ptype` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `curlevel` int(10) NOT NULL,
  `minlevel` int(10) NOT NULL,
  `profit` double NOT NULL,
  `costprice` int(10) NOT NULL,
  PRIMARY KEY (`pname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ptype`, `pname`, `price`, `curlevel`, `minlevel`, `profit`, `costprice`) VALUES
('Drinks', 'Star Radler', 500, 24, 24, 354, 146),
('Drinks', 'Monster', 1000, 18, 6, 625, 375),
('Drinks', 'Budweiser', 500, 38, 36, 258, 242),
('Drinks', 'Guinness Malt', 500, 15, 24, 383, 117),
('Drinks', 'Fayrouz', 250, 42, 24, 170, 80),
('Drinks', 'Guinness Medium size', 500, 24, 24, 283, 217),
('Drinks', 'Hero', 500, 32, 24, 332, 168),
('Drinks', 'Gulder', 500, 19, 12, 290, 210),
('Drinks', 'Smirnoff Ice', 500, 25, 24, 312, 188),
('Drinks', 'Heineken', 500, 116, 60, 258, 242),
('Drinks', 'Star', 500, 25, 12, 316, 184),
('Drinks', 'Origin', 500, 9, 12, 290, 210),
('Drinks', '33 Export', 500, 20, 10, 332, 168),
('Drinks', 'Water', 200, 140, 12, 148, 52),
('Drinks', 'Fearless', 500, 51, 12, 290, 210),
('Drinks', 'Soda', 250, 81, 36, 133, 117),
('Drinks', 'Life', 500, 53, 12, 275, 225),
('Drinks', 'Chivita Active', 700, 40, 10, 350, 350),
('Drinks', 'Hollandia', 800, 20, 10, 330, 470),
('Drinks', 'Cranberry', 2000, 19, 8, 1188, 812),
('Drinks', 'Power Horse', 1000, 18, 0, 729, 271),
('Drinks', 'Black Bullet', 1000, 18, 6, 729, 271),
('Drinks', 'Blue Bullet', 1000, 1, 6, 770, 230),
('Drinks', 'Red Bull', 1000, 32, 12, 625, 375),
('Drinks', 'Chi Exotic', 1000, 18, 8, 650, 350),
('Drinks', 'Snap', 500, 23, 12, 316, 184),
('Drinks', 'Harp', 500, 7, 0, 340, 160),
('Drinks', 'African Special', 500, 0, 0, 300, 200),
('Drinks', 'Carlo Rossi', 3000, -17, 5, 900, 2100),
('Drinks', 'Hennesy', 15000, 4, 2, 5000, 10000),
('Drinks', 'Smirnoff Vodka X1 Big', 5000, 5, 5, 3500, 1500),
('Drinks', 'Smirnoff Vodka X1 Small', 1000, 30, 12, 600, 400),
('Drinks', 'Jameson Big', 10000, 4, 2, 3500, 6500),
('Drinks', 'Jameson Small', 3500, 0, 0, 2000, 1500),
('Drinks', 'Dorado', 3000, 2, 5, 2080, 920),
('Drinks', 'Origin Bitters', 700, 13, 6, 400, 300),
('Drinks', 'Gordons', 1000, 1, 6, 700, 300),
('Drinks', 'Guinness Smooth', 500, 18, 0, 308, 192),
('Drinks', 'Baileys Cream Small', 1500, 13, 6, 1000, 500),
('Drinks', 'Climax', 1000, 11, 6, 800, 200),
('Drinks', 'Best Small', 1500, 5, 6, 1000, 500),
('Drinks', 'Andre Rose', 5000, 3, 0, 2500, 2500),
('Drinks', 'Campari Small', 3500, -5, 6, 2000, 1500),
('Drinks', 'Red Label', 10000, 2, 5, 5000, 5000),
('Drinks', 'Martinellis', 4500, 6, 3, 3000, 1500),
('Drinks', 'Legend', 500, 18, 12, 308, 192),
('Drinks', 'Red Label Small', 3500, 10, 6, 2000, 1500),
('Drinks', 'Langs', 7000, 3, 2, 3500, 3500),
('Takeaway Pack', 'Big Takeaway Pack', 100, 1, 10, 10, 90),
('Takeaway Pack', 'Small Takeaway Pack', 50, 1, 0, 10, 40),
('Food', 'Goat', 1000, 26, 5, 450, 550),
('Food', 'Chicken', 1000, 30, 5, 550, 450),
('Food', 'Assorted Peppersoup', 1000, 14, 5, 450, 550),
('Food', 'Catfish Peppersoup (Head)', 1500, 0, 5, 875, 625),
('Food', 'Catfish Peppersoup (Tail)', 1500, 0, 5, 875, 625),
('Food', 'Catfish Peppersoup (Middle)', 1000, 0, 5, 375, 625),
('Food', 'Nkwobi', 1000, 29, 5, 350, 650),
('Food', 'Isiewu', 3000, 1, 5, 1400, 1600),
('Food', 'Whit Rice', 500, 100, 5, 450, 50),
('Food', 'Jollof Rice', 700, 20, 5, 550, 150),
('Food', 'Croaker Fish', 2500, -4, 5, 1000, 1500),
('Food', 'Salad', 300, 1, 5, 200, 100),
('Food', 'Chips', 500, 1, 5, 340, 160),
('Photography', 'Photo Session', 3000, 999, 1, 3000, 0),
('Drinks', 'Hoest', 7000, 20, 10, 3400, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `day` int(10) NOT NULL,
  `month` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `stafftag` varchar(50) NOT NULL,
  `item1` varchar(100) NOT NULL,
  `price1` double NOT NULL,
  `qty1` double NOT NULL,
  `total1` double NOT NULL,
  `item2` varchar(100) NOT NULL,
  `price2` double NOT NULL,
  `qty2` double NOT NULL,
  `total2` double NOT NULL,
  `item3` varchar(100) NOT NULL,
  `price3` double NOT NULL,
  `qty3` double NOT NULL,
  `total3` double NOT NULL,
  `item4` varchar(100) NOT NULL,
  `price4` double NOT NULL,
  `qty4` double NOT NULL,
  `total4` double NOT NULL,
  `item5` varchar(100) NOT NULL,
  `price5` double NOT NULL,
  `qty5` double NOT NULL,
  `total5` double NOT NULL,
  `item6` varchar(100) NOT NULL,
  `price6` double NOT NULL,
  `qty6` double NOT NULL,
  `total6` double NOT NULL,
  `item7` varchar(100) NOT NULL,
  `price7` double NOT NULL,
  `qty7` double NOT NULL,
  `total7` double NOT NULL,
  `item8` varchar(100) NOT NULL,
  `price8` double NOT NULL,
  `qty8` double NOT NULL,
  `total8` double NOT NULL,
  `item9` varchar(100) NOT NULL,
  `price9` double NOT NULL,
  `qty9` double NOT NULL,
  `total9` double NOT NULL,
  `item10` varchar(100) NOT NULL,
  `price10` double NOT NULL,
  `qty10` double NOT NULL,
  `total10` double NOT NULL,
  `sumtotal` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `salesid` varchar(50) NOT NULL,
  `fulldate` date NOT NULL,
  `paytype` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`day`, `month`, `year`, `stafftag`, `item1`, `price1`, `qty1`, `total1`, `item2`, `price2`, `qty2`, `total2`, `item3`, `price3`, `qty3`, `total3`, `item4`, `price4`, `qty4`, `total4`, `item5`, `price5`, `qty5`, `total5`, `item6`, `price6`, `qty6`, `total6`, `item7`, `price7`, `qty7`, `total7`, `item8`, `price8`, `qty8`, `total8`, `item9`, `price9`, `qty9`, `total9`, `item10`, `price10`, `qty10`, `total10`, `sumtotal`, `discount`, `grandtotal`, `salesid`, `fulldate`, `paytype`) VALUES
(1, 2, 2020, '1001', 'Andre Rose', 5000, 1, 5000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 5000, 0, 5000, '0', '2020-02-01', ''),
(1, 2, 2020, '1005', 'Carlo Rossi', 3000, 9, 27000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 27000, 0, 27000, '0', '2020-02-01', ''),
(1, 2, 2020, '1001', 'Blue Bullet', 1000, 2, 2000, 'Baileys Cream Small', 1500, 8, 12000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 14000, 0, 14000, '0', '2020-02-01', 'cash'),
(1, 2, 2020, '1005', '33 Export', 500, 12, 6000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 6000, 0, 6000, '0', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', '33 Export', 500, 3, 1500, 'Heineken', 500, 16, 8000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 9500, 0, 9500, '1', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', 'Fayrouz', 250, 32, 8000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 8000, 0, 8000, '2', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Gordons', 1000, 13, 13000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13000, 0, 13000, '3', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Guinness Malt', 500, 13, 6500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 6500, 0, 6500, '4', '2020-02-01', 'Cash'),
(1, 2, 2020, '1001', 'Campari Small', 3500, 4, 14000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 14000, 0, 14000, '5', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Chivita Active', 700, 5, 3500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 'Guinness Medium size', 500, 7, 3500, '', 0, 0, 0, 'Cranberry', 2000, 2, 4000, '', 0, 0, 0, 11000, 0, 11000, '6', '2020-02-01', 'Cash'),
(1, 2, 2020, '1007', 'Best Small', 1500, 4, 6000, 'Campari Small', 3500, 6, 21000, 'Budweiser', 500, 4, 2000, 'Best Small', 1500, 5, 7500, 'Budweiser', 500, 5, 2500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 39000, 0, 39000, '7', '2020-02-01', 'Pos'),
(1, 2, 2020, '1007', '33 Export', 500, 4, 2000, 'Fayrouz', 250, 3, 750, 'Catfish Peppersoup (Head)', 1500, 1, 1500, 'Dorado', 3000, 3, 9000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13250, 0, 13250, '8', '2020-02-01', 'Transfer'),
(1, 2, 2020, '1007', 'Photo Session', 3000, 1, 3000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 3000, 0, 3000, '9', '2020-02-01', 'Cash'),
(10, 2, 2020, '1005', 'Campari Small', 3500, 7, 24500, 'Budweiser', 500, 3, 1500, 'Croaker Fish', 2500, 5, 12500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 38500, 2, 37730, '10', '2020-02-10', 'Pos'),
(9, 4, 2020, '1005', 'Budweiser', 500, 6, 3000, 'Best Small', 1500, 7, 10500, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 13500, 5, 12825, '11', '2020-04-09', 'Pos'),
(24, 9, 2020, '1001', 'Andre Rose', 5000, 3, 15000, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 15000, 0, 15000, '12', '2020-09-24', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `salescounter`
--

CREATE TABLE IF NOT EXISTS `salescounter` (
  `counter` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salescounter`
--

INSERT INTO `salescounter` (`counter`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE IF NOT EXISTS `salesreport` (
  `item` varchar(100) NOT NULL,
  `qty` int(20) NOT NULL,
  `total` double NOT NULL,
  `fulldate` date NOT NULL,
  `profit` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`item`, `qty`, `total`, `fulldate`, `profit`) VALUES
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Blue Bullet', 2, 2000, '2020-02-01', 1540),
('Baileys Cream Small', 8, 12000, '2020-02-01', 8000),
('Andre Rose', 1, 5000, '2020-02-01', 2500),
('Carlo Rossi', 9, 27000, '2020-02-01', 8100),
('Blue Bullet', 2, 2000, '2020-02-01', 1540),
('Baileys Cream Small', 8, 12000, '2020-02-01', 8000),
('33 Export', 12, 6000, '2020-02-01', 3984),
('33 Export', 3, 1500, '2020-02-01', 996),
('Heineken', 16, 8000, '2020-02-01', 4128),
('Fayrouz', 32, 8000, '2020-02-01', 5440),
('Gordons', 13, 13000, '2020-02-01', 9100),
('Guinness Malt', 13, 6500, '2020-02-01', 4979),
('Campari Small', 4, 14000, '2020-02-01', 8000),
('Chivita Active', 5, 3500, '2020-02-01', 1750),
('Guinness Medium size', 7, 3500, '2020-02-01', 1981),
('Cranberry', 2, 4000, '2020-02-01', 2376),
('Best Small', 4, 6000, '2020-02-01', 4000),
('Campari Small', 6, 21000, '2020-02-01', 12000),
('Budweiser', 4, 2000, '2020-02-01', 1032),
('Best Small', 5, 7500, '2020-02-01', 5000),
('Budweiser', 5, 2500, '2020-02-01', 1290),
('33 Export', 4, 2000, '2020-02-01', 1328),
('Fayrouz', 3, 750, '2020-02-01', 510),
('Catfish Peppersoup (Head)', 1, 1500, '2020-02-01', 875),
('Dorado', 3, 9000, '2020-02-01', 6240),
('Photo Session', 1, 3000, '2020-02-01', 3000),
('Campari Small', 7, 24500, '2020-02-10', 14000),
('Budweiser', 3, 1500, '2020-02-10', 774),
('Croaker Fish', 5, 12500, '2020-02-10', 5000),
('Budweiser', 6, 3000, '2020-04-09', 1548),
('Best Small', 7, 10500, '2020-04-09', 7000),
('Andre Rose', 3, 15000, '2020-09-24', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `stafftag` varchar(100) NOT NULL,
  `staffincentive` int(10) NOT NULL,
  PRIMARY KEY (`stafftag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fname`, `lname`, `sex`, `address`, `phone`, `dept`, `stafftag`, `staffincentive`) VALUES
('Harrison', 'David', 'Male', 'Port Harcourt', '08035840779', 'Bar', '1001', 1),
('Princewill', 'Okechukwu', 'Male', 'Ada George', '080358407774', 'Admin', '1005', 0),
('Christy', 'Mary', 'Female', 'Autograph', '080358407774', 'Finance', '1007', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `uname`, `pword`, `privilege`) VALUES
('victor', 'peters', 'victor', 'victor1', 'adminuser'),
('MaryChristy', 'Peters', 'MaryChristy', 'password', 'adminuser'),
('Princewill', 'Okechukwu', 'prince', 'prince1', 'adminuser'),
('Linda', 'Joseph', 'linda', 'linda1', 'basicuser'),
('Reginald', 'Okoh', 'reg', 'reg', 'adminuser'),
('Dike ', 'Godstime', 'dike', 'dike1', 'basicuser');

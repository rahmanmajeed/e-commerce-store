-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 07:05 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartlist`
--

CREATE TABLE IF NOT EXISTS `cartlist` (
  `user_id` int(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `cart_id` int(255) NOT NULL AUTO_INCREMENT,
  `Buyout` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cartlist`
--

INSERT INTO `cartlist` (`user_id`, `product_id`, `cart_id`, `Buyout`) VALUES
(7, '19119-PI', 11, 1),
(7, '25631-PI ', 12, 1),
(7, '19844-PI', 13, 1),
(7, '17801-PI', 14, 1),
(7, '25631-PI ', 15, 1),
(7, '14785-PI', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `access_level` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email_address`, `password`, `type`, `access_level`) VALUES
(1, 'admin@gmail.com', '1234', 'A', 1),
(2, 'ruposh.cse@gmail.com', '1234', 'C', 1),
(3, 'jerin@yahoo.com', '12345', 'C', 1),
(5, 'Bilkis@gmail.com', '1234', 'C', 1),
(7, 'majedur@gmail.com', '12345', 'C', 1),
(12, 'anik@gmail.com', '1234', 'C', 0),
(14, 'sajib@gmail.com', '1234', 'C', 1),
(15, 'rassel@gmail.com', '1234', 'C', 0),
(16, 'a.sayem35@yahoo.com', '12345', 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `user_id` int(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `delivery` int(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`user_id`, `customer_name`, `email_address`, `product_title`, `product_id`, `price`, `date`, `order_id`, `delivery`) VALUES
(7, 'Majedur Rahman', 'majedur@gmail.com', 'one plus x ', '19844-PI ', 220000, '02 May 2016', 1, 0),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'huawei p8 lite ', '17801-PI ', 19900, '02 May 2016', 2, 1),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'beats headphone ', '25291-PI ', 5000, '02 May 2016', 3, 1),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'Ryans Game PC-02 ', '25631-PI  ', 90000, '03 May 2016', 4, 1),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'Ryans Game PC-02 ', '25631-PI  ', 90000, '03 May 2016', 5, 0),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'sony vaio duo 13 ', '19119-PI ', 100000, '03 May 2016', 6, 0),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'huawei p8 lite ', '17801-PI ', 19900, '03 May 2016', 7, 0),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'one plus x ', '19844-PI ', 220000, '03 May 2016', 8, 0),
(7, 'Majedur Rahman', 'majedur@gmail.com', 'Ryans Game PC-02 ', '25631-PI  ', 90000, '03 May 2016', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `desp` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Processor` varchar(50) NOT NULL,
  `clcksped` varchar(50) NOT NULL,
  `Display` varchar(50) NOT NULL,
  `Ram` varchar(50) NOT NULL,
  `Storage` varchar(50) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `warrenty` int(10) NOT NULL,
  `londesp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `desp`, `product_id`, `price`, `image`, `category_id`, `Brand`, `Model`, `Processor`, `clcksped`, `Display`, `Ram`, `Storage`, `OS`, `warrenty`, `londesp`) VALUES
(8, 'Twinmos Tab', 'Ram-2GB, 12" Display ', '7283-PI', '18000', 'yoga8.jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(9, 'Asus RT-AC3200', ' 3200Mbps Wireless Router\r\nRange 5000sq Meters', '10469-PI', '25000', 'Asus-RT-AC3200-Tri-Band.jpg', 3, '', '', '', '', '', '', '', '', 0, ''),
(14, 'asus zenfone 2', 'slim gorila 3000 mah battery life', '3763-PI', '20000', 'asus-zenfone-2-1.jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(15, 'Acer Aspire E5-470', ' HDD- 39.62 cm (15.6)- Linux) (Charcoal) ... Acer ', '19433-PI', '45000', 'download (1).jpg', 1, '', '', '', '', '', '', '', '', 0, ''),
(16, 'dell xps 16', ' Up to a 1.7GHz dual-core Intel Core i5', '17033-PI', '80000', 'download (3).jpg', 1, 'Dell', 'xps', '2.30 ghz', '2.30', 'LED', '4gb', '128gb', 'free  dos', 1, 'gfgghgjhj'),
(17, 'sony vaio duo 13', ' Up to a 1.7GHz dual-core Intel Core i7-4650U CPU,', '19119-PI', '100000', 'sony-duo-13.jpg', 1, '', '', '', '', '', '', '', '', 0, ''),
(18, 'huawei p8 lite', ' 2200 mah,2gbram,16gb', '17801-PI', '19900', 'download (3).jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(19, 'Huawei Mate 8', ' 4gb ram,64gb rom fingerprint protected', '1455-PI', '60000', 'download (4).jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(20, 'one plus x', ' OnePlus, a brand known for its smartphone built a', '19844-PI', '220000', 'oneplus-x_ubergizmo_06.jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(21, 'oneplus one press shots 3', ' 3gb ram,64gb rom', '25132-PI', '220000', 'download (5).jpg', 2, '', '', '', '', '', '', '', '', 0, ''),
(22, 'tp link archer', ' AC1750 Wireless Dual Band Gigabit Router Archer C', '21130-PI', '12000', 'Archer-C7-01.jpg', 3, '', '', '', '', '', '', '', '', 0, ''),
(24, 'beats headphone', ' bettr sound good quality', '25291-PI', '5000', 'beats-headphones.jpg', 3, 'bits', '320p', 'n/a', 'n/a', 'n/a', 'n/a', '', '', 1, 'good quality sound'),
(25, 'gaming cpu', ' ultra cooler', '14785-PI', '12000', 'download (6).jpg', 3, '', '', '', '', '', '', '', '', 0, ''),
(26, 'ups ultra', ' PS is an absolute necessity for any important com', '12613-PI', '6000', 'download (7).jpg', 3, '', '', '', '', '', '', '', '', 0, ''),
(32, 'Acer Aspire E5-473', ' 2.0GHz,LED,4GB500GB HDD', '12943-PI', '32000', 'acer_re_e5_573_gray_iUwf.jpg', 1, '', '', '', '', '', '', '', '', 0, ''),
(33, 'Acer Aspire V3-574G-531H', ' Acer Aspire V3-574G-531H 5th Gen. Core i5 5200U (', '24594-PI', '520000', 'Acer-Aspire-V3_574G_531H.jpg', 1, '', '', '', '', '', '', '', '', 0, ''),
(40, 'Acer Aspire E5-473', ' Model - Dell Inspiron N5458, Processor - 5th Gen.', '20960-PI', '220000', 'Acer-Aspire-V3_574G_531H.jpg', 1, '', '', '', '', '', '', '', '', 0, ''),
(56, 'Ryans Game PC-02', 'high performance', '25631-PI ', '90000', 'Ryans_Game_PC_10.png', 1, 'Dell', 'HP 20-r039d', '4th. Gen Intel Core i3 4460T', '1.90GHz', '19.45', '4GB', '1TB HDD', 'Windows 8.1', 4, ' Model - HP 20-r039d, Processor - 4th. Gen Intel Core i3 4460T, Processor Clock Speed - 1.90GHz, CPU Cache - 6MB, Chipset - Intel H81, Monitor - 19.45');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `fname`, `lname`, `phone`, `address`, `gender`) VALUES
(2, 'Mehedi', 'Islam', '01735108437', 'Mirpur-6, Dhaka', 'male'),
(3, 'Jerin', 'Khan', '01835108437', 'Banani, Dhaka', 'Female'),
(5, 'Bilkis', 'Banu', '01673554569', 'Nikunjo', 'Female'),
(7, 'Majedur', 'Rahman', '01673554569', 'kazipara, Mirpur', 'Male'),
(12, 'Mr.', 'Anik', '01735108437', 'Mirpur-14, Dhaka', 'Male'),
(14, 'Jaber', 'Sajib', '01735108437', 'Mohakhali, Dhaka', 'Male'),
(15, 'Mr.', 'Rasel', '01735108437', 'Mohakhali, Dhaka', 'Male'),
(16, 'Md.', 'Sayem', '01731411365', 'a.sayem35@ovi.com', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

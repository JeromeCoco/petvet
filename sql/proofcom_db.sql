-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:16 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proofcom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `id` int(11) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `firstname` varchar(125) NOT NULL,
  `address` varchar(225) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `lastname`, `firstname`, `address`, `mobile`, `email`, `username`, `password`, `enabled`) VALUES
(3, 'test', 'haha', 'test', '09078652121', 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1),
(4, 'jeromewqwqw', 'cocossswqwq', 'caloocan city', '09078651995', 'jeormcoco1@gmail.com', 'jerom', '09f836894fc1fe9af6f429fc24dcccc2e6847fe0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `firstname` varchar(125) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `mon` tinyint(1) NOT NULL,
  `tue` tinyint(1) NOT NULL,
  `wed` tinyint(1) NOT NULL,
  `thur` tinyint(1) NOT NULL,
  `fri` tinyint(1) NOT NULL,
  `sat` tinyint(1) NOT NULL,
  `sun` tinyint(1) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `lastname`, `firstname`, `mobile`, `mon`, `tue`, `wed`, `thur`, `fri`, `sat`, `sun`, `time_in`, `time_out`, `enabled`) VALUES
(1, 'test', 'test', '123457890', 1, 0, 0, 0, 1, 0, 0, '08:00:00', '05:00:00', 0),
(2, 'test', 'test', '09078751231', 1, 1, 1, 1, 1, 1, 1, '08:00:00', '04:00:00', 0),
(3, 'test', 'test', '09456789455', 0, 0, 0, 0, 0, 0, 1, '07:00:00', '03:00:00', 1),
(4, 'test', 'test', '0989685867865', 0, 0, 0, 0, 0, 0, 1, '08:00:00', '05:00:00', 1),
(5, 'test', 'test', '90787697086', 0, 0, 0, 0, 0, 0, 1, '09:00:00', '05:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `cutomer_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `billing_name` varchar(225) NOT NULL,
  `billing_address` varchar(225) NOT NULL,
  `billing_email` varchar(50) NOT NULL,
  `billing_mobile` int(15) NOT NULL,
  `status` varchar(125) NOT NULL,
  `note` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT '1 - Male, 2 - Female'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(125) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `enabled`) VALUES
(1, 'test', '&lt;p&gt;test&lt;/p&gt;', '900.00', 'csd.png', 0),
(2, 'test', '&lt;p&gt;&lt;em&gt;&lt;strong&gt;twcdjk&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;', '90.00', 'COCO.png', 1),
(3, 'sample', '&lt;ol&gt;\r\n&lt;li&gt;&lt;em&gt;this is a test&lt;/em&gt;&lt;/li&gt;\r\n&lt;/ol&gt;', '700.00', 'imagesO93WZ1AT.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(125) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specie`
--

CREATE TABLE `specie` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specie`
--

INSERT INTO `specie` (`id`, `name`) VALUES
(1, 'Dog'),
(2, 'Mouse'),
(3, 'Cat'),
(4, 'Goldfish'),
(5, 'Dove');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`, `enabled`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'jerome', '09f836894fc1fe9af6f429fc24dcccc2e6847fe0', 1),
(3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1),
(4, 'test', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specie`
--
ALTER TABLE `specie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

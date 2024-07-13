-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 10:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asenterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `barcodeNumber` varchar(255) NOT NULL,
  `goodsName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `goodsAmount` varchar(255) NOT NULL,
  `goodsQuantity` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `buyerAdd` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `stateNameCode` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `invoiceMakerName` varchar(255) NOT NULL,
  `dateTime` varchar(255) NOT NULL,
  `invoiceFiles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `barcodeNumber`, `goodsName`, `description`, `brand`, `goodsAmount`, `goodsQuantity`, `discount`, `buyerName`, `buyerAdd`, `contactNumber`, `stateNameCode`, `warranty`, `invoiceMakerName`, `dateTime`, `invoiceFiles`) VALUES
(1, '89256729465687798729592795957835', 'Goods 3', '', '', '$8945679', '6 pcs', '30%', 'Pankaj Pal', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '5 year', 'Staff 3', '20240701064844', '../invoices/invoice_20240701064844.pdf'),
(2, '4876598346', 'Goods 2', '', '', '$2525', '1 pcs', '4%', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240701065032', '../invoices/invoice_20240701065032.pdf'),
(3, '23568297657846', 'Goods 2', '', '', '$9457', '1pcs', '2%', 'Roni Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '6 Month', 'Staff 2', '20240701065441', '../invoices/invoice_20240701065441.pdf'),
(7, '2875972857', 'Goods 3', '', '', '$2525', '1 pcs', '7%', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240701065918', '../invoices/invoice_20240701065918.pdf'),
(11, '8941133710081', 'Goods 2', '', '', '$1398.31', '1 pcs', '0%', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240701073803', '../invoices/invoice_20240701073803.pdf'),
(12, '7894561231054', 'Goods 2', '', '', '$2525', '1 pcs', '5%', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240701074111', '../invoices/invoice_20240701074111.pdf'),
(14, '5747868554', 'Goods 2', '', '', '$2525', '1 pcs', '5%', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240701074223', '../invoices/invoice_20240701074223.pdf'),
(15, '576845967283654', 'Goods 2', '', '', '$2525', '1 pcs', '5%', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240701074353', '../invoices/invoice_20240701074353.pdf'),
(56, '18676812376984123', 'Goods 2', '', '', '1000', '3', '5', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 ', 'Staff 3', '20240701113504', '../invoices/invoice_20240701113504.pdf'),
(99, '948612315413', 'Goods 1', '', '', '12000', '500', '10', 'ad', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240702081809', '../invoices/invoice_20240702081809.pdf'),
(108, '2376589257834953', 'Goods 1', '', '', '4576', '3', '3', 'ad', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240702085312', '../invoices/invoice_20240702085312.pdf'),
(241, '345879857858', 'Sting', '', '', '20', '2', '0', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240705112140', ''),
(626, '123', 'E Rickshaw with Battery', '', '', '12000', '1', '5', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240707-094836', ''),
(627, '456', 'LF ERK LFDTU12012L (120AH) 12+00 LF ERK LFDTU12012L (120AH) 12+00', '', '', '3000', '1', '5', 'Abhijit Dey', 'DALKOLA SBHASPALLY', '07319589678', 'West Bengal - 19', '1 year', 'Staff 2', '20240707-094836', 'invoice_20240707-094836.pdf'),
(628, '234', 'Battery Motor cycle', '', '', '3000', '1', '5', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240707-095551', ''),
(629, '345', 'Tyre of Bike', '', '', '10000', '1', '5', 'Abhijit Dey', 'DALKOLA SBHASPALLY, PIN 733201', '07319589678', 'West Bengal - 19', '1 year', 'Staff 3', '20240707-095551', 'invoice_20240707-095551.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcodeNumber` (`barcodeNumber`),
  ADD UNIQUE KEY `barcodeNumber_3` (`barcodeNumber`),
  ADD UNIQUE KEY `barcodeNumber_4` (`barcodeNumber`);
ALTER TABLE `sell` ADD FULLTEXT KEY `barcodeNumber_2` (`barcodeNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 01:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tabletype` tinyint(10) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `placement` tinyint(10) NOT NULL,
  `datebook` varchar(100) NOT NULL,
  `timebook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fname`, `lname`, `email`, `tabletype`, `phonenumber`, `placement`, `datebook`, `timebook`) VALUES
(4, 'Thanyapat', 'Prommoon', 'numpetpet1234@hotmail.com', 0, '0901052978', 1, '2023-06-12', '16:00'),
(6, 'Thanyapat4', 'Prommoon', 'numpetpet1234@hotmail.com', 0, '0969399241', 0, '2023-07-18', '17:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart1`
--

CREATE TABLE `cart1` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

CREATE TABLE `cart2` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart3`
--

CREATE TABLE `cart3` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `id` int(100) NOT NULL,
  `namebook` varchar(100) NOT NULL,
  `total_oders` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `namebook`, `total_oders`, `total_price`) VALUES
(60, 'Table1', 'Korean BBQ (size s)(349x2)  Korean Fired Chicken(75x1) เนื้อออสเตรเลีย(70x5) ', 1123),
(61, 'Table2', 'nabe (japanese sukiyaki) (size s)(349x1) French Fries(60x1) สันคอสไลด์(50x2) ', 509);

-- --------------------------------------------------------

--
-- Table structure for table `updatemenu_app`
--

CREATE TABLE `updatemenu_app` (
  `id3` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `updatemenu_app`
--

INSERT INTO `updatemenu_app` (`id3`, `name`, `price`, `image`) VALUES
(3000, 'Korean Fired Chicken', 75, 'Kchicken.png'),
(3001, 'French Fries', 60, 'frenchfrie.jpg'),
(3002, ' Nugget', 60, 'nugget.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `updatemenu_mis`
--

CREATE TABLE `updatemenu_mis` (
  `id4` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `updatemenu_mis`
--

INSERT INTO `updatemenu_mis` (`id4`, `name`, `price`, `image`) VALUES
(4000, 'สันคอสไลด์', 50, 'pork-คอ.jpg'),
(4001, 'สันนอกสไลด์', 50, 'pork-นอก.jpg'),
(4002, 'เนื้อออสเตรเลีย', 70, 'cow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `updatemenu_recom`
--

CREATE TABLE `updatemenu_recom` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `updatemenu_recom`
--

INSERT INTO `updatemenu_recom` (`id`, `name`, `price`, `image`) VALUES
(1000, ' Korean Fired Chicken', 75, 'Kchicken.png'),
(1005, 'Korean BBQ (size s)', 349, 'nb5.png'),
(1006, ' Tobbokkii', 75, 'tok.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `updatemenu_set`
--

CREATE TABLE `updatemenu_set` (
  `id2` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `updatemenu_set`
--

INSERT INTO `updatemenu_set` (`id2`, `name`, `price`, `image`) VALUES
(2000, ' Korean BBQ (size s)', 349, 'nb5.png'),
(2001, 'nabe (japanese sukiyaki) (size s)', 349, 'nb2.png'),
(2002, 'Chaew Hon (size s)', 319, 'nb4.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(3, 'nabe3', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'nabe', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart1`
--
ALTER TABLE `cart1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart3`
--
ALTER TABLE `cart3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updatemenu_app`
--
ALTER TABLE `updatemenu_app`
  ADD PRIMARY KEY (`id3`);

--
-- Indexes for table `updatemenu_mis`
--
ALTER TABLE `updatemenu_mis`
  ADD PRIMARY KEY (`id4`);

--
-- Indexes for table `updatemenu_recom`
--
ALTER TABLE `updatemenu_recom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updatemenu_set`
--
ALTER TABLE `updatemenu_set`
  ADD PRIMARY KEY (`id2`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `cart1`
--
ALTER TABLE `cart1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart3`
--
ALTER TABLE `cart3`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `updatemenu_app`
--
ALTER TABLE `updatemenu_app`
  MODIFY `id3` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;

--
-- AUTO_INCREMENT for table `updatemenu_mis`
--
ALTER TABLE `updatemenu_mis`
  MODIFY `id4` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4003;

--
-- AUTO_INCREMENT for table `updatemenu_recom`
--
ALTER TABLE `updatemenu_recom`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `updatemenu_set`
--
ALTER TABLE `updatemenu_set`
  MODIFY `id2` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2003;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

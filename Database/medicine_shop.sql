-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 07:15 AM
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
-- Database: `medicine_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminEmail` varchar(254) NOT NULL,
  `adminPassword` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminEmail`, `adminPassword`) VALUES
(1, 'mail.rownok@gmail.com', '76bbaf8c1cdd3d23b27d49686437d0d3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(39, 'Vigogel bal', '20.00', '3kNhY4kAl8E9tQTyy6kKC3Nx3UFgSRpbzTGxo2vD.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `prescription` varchar(254) NOT NULL,
  `bkashNumber` varchar(256) NOT NULL,
  `tnxNumber` varchar(256) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` decimal(30,0) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `prescription`, `bkashNumber`, `tnxNumber`, `product_name`, `quantity`, `total_price`, `order_date`, `status`) VALUES
(5, 5, 'Rownok Ripon', '01749475566', 'mail.rownok@gmail.com', 'Kalabagan,Dhaka,Bangladesh', '', '', '', 'Glow', 1, 50, '2023-09-14 11:14:07', 'confirmed'),
(6, 6, 'Al Almin Hossain', '01601424748', 'alamin@gmail.com', 'Hajaribag Dhaka', '', '', '', 'Hand Wash', 1, 100, '2023-09-14 11:21:17', 'on_the_way'),
(7, 5, 'Joy', '01701424748', 'mail.rownok@gmail.com', 'demo', '', '', '', 'Hand Wash', 6, 600, '2023-09-16 17:12:11', 'done'),
(8, 6, 'Rakib', '01749475566', 'alamin@gmail.com', 'dhaka', '', '', '', 'medicine1', 1, 10, '2023-09-22 10:48:52', 'Pending'),
(9, 6, 'Md Abraham ', '01712211221', 'abraham21@gmail.com', 'Dhaka', '', '01712211221', 'DTHRTHJRTH6546', 'Shampoo', 1, 10, '2023-09-22 15:03:45', 'confirmed'),
(12, 7, 'ahmed faysal', '+8801328298863', 'ahmedfaysal0176@gmail.com', 'Gauringor school, sodor lakshmipur ,\r\nLaxmipur Sadar , Bangladesh', '', '+8801328298863', 'KDJBJDF65465', 'medicine1', 1, 10, '2023-11-16 07:13:20', 'confirmed'),
(13, 7, 'ahmed faysal', '+8801328298863', 'ahmedfaysal0176@gmail.com', 'Gauringor school, sodor lakshmipur ,\r\nLaxmipur Sadar , Bangladesh', '', '+8801328298863', 'KDJBJDF65465', 'Hot Water Bag', 1, 320, '2023-11-18 05:32:46', 'Pending'),
(14, 7, 'ahmed faysal', '+8801328298863', 'ahmedfaysal0176@gmail.com', 'Gauringor school, sodor lakshmipur ,\r\nLaxmipur Sadar , Bangladesh', 'prescriptions/ripon-pp-02.jpg', '+8801328298863', 'KDJBJDF65465', 'Vigogel', 1, 180, '2023-11-18 05:35:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(19, 'Sergel 20', 'Generics:Esomeprazole 20mg', 50.00, 'sergel-20-1636287026630.webp', '2'),
(20, 'Clopid 75', 'Drug International Limited', 12.00, 'clopid-1636287396222.webp', '2'),
(22, 'Bisocor 2.5', 'Square Pharmaceuticals Limited', 70.00, 'bisocor-1636289033432.webp', '2'),
(23, 'Pantonix 20', 'Incepta Pharmaceuticals Ltd', 290.00, 'pantonix-20-1636287804472.webp', '1'),
(24, 'Pregaben 50', 'Incepta Pharmaceuticals Ltd', 14.00, 'pregaben-50-1635587012784.webp', '1'),
(25, 'Reset 500', 'Incepta Pharmaceuticals Ltd', 2.00, 'reset-500-mg-1629634739636.webp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`) VALUES
(1, 'Grocery'),
(2, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `phone`, `email`, `password`, `profile_image`) VALUES
(5, 'Rownok Ripon', '01749475566', 'mail.rownok@gmail.com', '76bbaf8c1cdd3d23b27d49686437d0d3', ''),
(6, 'Al Almin Hossain', '01750302654', 'alamin@gmail.com', 'cb601893c1269f7d7b8c2947158ca194', ''),
(7, 'Latu', '01452122141', 'latu@gmail.com', 'a5143066fefe8a3d85dddfcf96537e59', ''),
(8, 'Rofik', '01765565232', 'rofik@gmail.com', '33787df67fbb97f0043037920db277e4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

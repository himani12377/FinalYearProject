-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 12:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluegroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_contact`) VALUES
(4, 'Orange', 'orange@gmail.com', 'orange', '123'),
(6, ' Himani', 'himanigajjar007@gmail.com', '123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, ' Inspiration coins ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(2, 'Coin bags', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_postal` int(100) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_postal`, `customer_address`, `customer_contact`, `customer_ip`) VALUES
(2, 'Joe Wilson', 'JoeWilson4545@gmail.com', '12345', 'NEW ZEALAND', 'AUCKLAND', 2110, '27, Cavendish drive, Manukau', '0222345565', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` float NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `product_title`, `qty`, `order_date`, `order_status`) VALUES
(25, 2, 18, 1175252775, 'CN-56 Healing', 4, '2021-11-26', 'pending'),
(26, 2, 4.5, 307038579, 'CN-4 Believe', 1, '2021-11-26', 'pending'),
(27, 2, 22.5, 199674461, 'CN-13 \r\nFollow your Heart', 5, '2021-11-26', 'pending'),
(28, 2, 4.5, 199674461, 'CN-4 Believe', 1, '2021-11-26', 'pending'),
(29, 2, 4.5, 1976103452, 'CN-56 Healing', 1, '2021-11-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(10) NOT NULL,
  `gallery_img` varchar(100) NOT NULL,
  `gallery_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_img`, `gallery_content`) VALUES
(1, 'toshala.JPG', '                              \r\nToshala has travelled extensively -  in Bintan in 2013                       \r\n                          '),
(2, 'o.JPG', 'Toshala has toured through Europe, North America and Oceania as the piano accordionist in the international Gandharva-Loka Orchestra. This is the orchestra in concert in Paris in 2010'),
(3, 'g.JPG', ' As the storyteller in a play at the Highland Park library in Auckland\r\n                          '),
(4, 'sdf.JPG', 'Performing a repertoire of Sri Chinmoy\'s songs at the Te Atatu library in Auckland                            \r\n                                                        \r\n                          ');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `product_title`, `qty`, `order_status`) VALUES
(25, 2, 1175252775, '18', 'CN-56 Healing', 4, 'pending'),
(26, 2, 307038579, '29', 'CN-4 Believe', 1, 'pending'),
(27, 2, 199674461, '13', 'CN-13 \r\nFollow your Heart', 5, 'pending'),
(28, 2, 199674461, '29', 'CN-4 Believe', 1, 'pending'),
(29, 2, 1976103452, '18', 'CN-56 Healing', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `date`, `product_title`, `product_img`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 2, '2021-11-20 11:02:05', 'HW-1 My Dream Heart Warmers', 'HW-1 My Dream Heart Warmers.JPG', '11.50', '<p>safsf</p>', 'a'),
(2, 2, '2021-11-20 11:02:16', 'HW-2 Best Friends Heart Warmers ', 'HW-2 Best Friends Heart Warmers 1.JPG', '11.50', '<p>rt</p>', 'rt'),
(3, 2, '2021-11-24 06:26:53', 'HW-2 Angel Heart Warmers', 'HW-3 Angel Heart Warmers.JPG', '11.50', '<p>a</p>', 'a'),
(5, 2, '2021-11-20 11:14:02', 'HW-1 My Wedding Heart Warmers', 'HW-5 My Wedding Heart Warmers.JPG', '11.50', '<p>e</p>', 'w'),
(8, 1, '2021-11-02 03:28:15', 'CN-2 Faith', 'CN-2- Faith.jpg', '4.50', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti obcaecati, ex fuga culpa porro reprehenderit voluptates pariatur quibusdam, nihil debitis quisquam perspiciatis facilis et voluptatum minima molestiae ratione recusandae exercitationem?</p>', 'FAITH'),
(9, 1, '2021-10-14 23:49:47', 'CN-3 Guardian', 'CN-3-Guardian.jpg', '4.50', '', 'GUARDIAN'),
(10, 1, '2021-10-14 23:50:05', 'CN-4 Believe\r\n', 'CN-4-Believe.jpg', '4.50', '', 'Believe'),
(11, 1, '2021-10-14 23:50:21', 'CN-5 Angel', 'CN-5-Angel.jpg', '4.50', '', 'angel'),
(12, 1, '2021-10-14 23:50:31', 'CN-11 Love', 'CN-11-love.jpg', '4.50', '', 'love'),
(13, 1, '2021-10-14 23:50:51', 'CN-13 \r\nFollow your Heart', 'CN-13-follow your heart.jpg', '4.50', '', 'follow heart'),
(14, 1, '2021-10-14 23:59:39', 'CN-25 Grace', 'CN-25-grace.jpg', '4.50', '', 'grace'),
(15, 1, '2021-10-14 23:59:48', 'CN-27 Smile', 'CN-27-smile.jpg', '4.50', '', 'smile'),
(16, 1, '2021-10-15 00:00:01', 'CN-32 Good Luck', 'CN-32-good luck.jpg', '4.50', '', 'good luck'),
(17, 1, '2021-10-15 00:00:12', 'CN-34 Protection', 'CN-34-protection.jpg', '4.50', '', 'protection'),
(18, 1, '2021-10-15 00:00:37', 'CN-56 Healing', 'CN-56-healing.jpg', '4.50', '', 'healing'),
(29, 1, '2021-11-20 11:05:19', 'CN-4 Believe', 'CN-5-Angel.jpg', '4.50', '<p>sf</p>', 'dsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

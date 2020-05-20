-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 10:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `first` varchar(200) NOT NULL,
  `last` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `email`, `pass`) VALUES
(2, 'safayet ', 'shawn', 'safayetshawn95@gmail.com', '00f4d7f1bb38c0fe9a43001c8ade045b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `cname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`) VALUES
(2, 'Accessories'),
(4, 'Book'),
(5, 'Shows'),
(6, 'Cosmatics');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `orderid` int(20) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `orderid`, `pquantity`, `productprice`) VALUES
(1, 24, 0, '', '234'),
(2, 24, 0, '', '234'),
(3, 24, 0, '', '234'),
(5, 24, 0, '', '234'),
(6, 26, 0, '', '33333'),
(7, 24, 0, '', '234'),
(8, 26, 0, '', '33333'),
(9, 24, 0, '', '234'),
(10, 26, 0, '', '33333'),
(11, 24, 7, '', '234'),
(12, 26, 7, '', '33333'),
(13, 24, 8, '1', '234'),
(14, 26, 8, '1', '33333'),
(15, 24, 9, '1', '234'),
(16, 26, 9, '1', '33333'),
(17, 23, 10, '1', '6000'),
(18, 24, 10, '1', '234'),
(19, 26, 10, '3', '33333'),
(20, 31, 12, '1', '1222'),
(21, 26, 12, '2', '33333'),
(22, 24, 16, '1', '234'),
(23, 31, 16, '1', '1222'),
(24, 32, 16, '1', '456'),
(25, 24, 17, '1', '234'),
(26, 24, 18, '1', '234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, 8, '234', 'Order Placed', 'cod', '2020-04-17 19:46:24'),
(2, 8, '234', 'Order Placed', 'cod', '2020-04-17 19:50:03'),
(3, 8, '33567', 'Order Placed', 'cod', '2020-04-17 19:52:17'),
(4, 17, '33567', 'Order Placed', 'cod', '2020-04-17 20:00:45'),
(5, 17, '33567', 'Order Placed', 'cod', '2020-04-17 20:06:10'),
(6, 17, '33567', 'Order Placed', 'cod', '2020-04-17 20:09:29'),
(7, 17, '33567', 'Order Placed', 'cod', '2020-04-17 20:15:03'),
(8, 17, '33567', 'Order Placed', 'cod', '2020-04-17 22:15:30'),
(9, 17, '33567', 'Delivered', 'cod', '2020-04-17 22:19:34'),
(10, 18, '106233', 'In Process', 'cod', '2020-04-17 22:43:54'),
(11, 18, '0', 'Order Placed', 'cod', '2020-04-17 22:51:43'),
(12, 8, '67888', 'Cancelled', 'cod', '2020-04-18 14:32:17'),
(13, 8, '0', 'Order Placed', 'cod', '2020-04-18 21:02:00'),
(14, 8, '0', 'Order Placed', 'cod', '2020-04-19 13:30:50'),
(15, 8, '0', 'Order Placed', 'cod', '2020-04-22 19:38:09'),
(16, 20, '1912', 'Order Placed', 'cod', '2020-05-15 22:22:21'),
(17, 20, '234', 'Order Placed', 'cod', '2020-05-19 17:00:30'),
(18, 20, '234', 'Order Placed', 'cod', '2020-05-19 17:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracing`
--

CREATE TABLE `ordertracing` (
  `id` int(222) NOT NULL,
  `orderid` int(222) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertracing`
--

INSERT INTO `ordertracing` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(1, 0, 'Cancelled', 'Too expensive,not have enough money.. :)', '2020-04-20 14:07:15'),
(2, 12, 'Cancelled', 'not good', '2020-04-20 14:10:05'),
(3, 9, 'Delivered', 'It has been delivered !!!', '2020-04-20 18:32:22'),
(4, 9, 'Delivered', 'It has been delivered !!!', '2020-04-20 18:33:08'),
(5, 9, 'Delivered', 'good job', '2020-04-20 18:33:25'),
(6, 9, 'Delivered', 'good job', '2020-04-20 18:34:50'),
(7, 10, 'In Process', 'good, almost done', '2020-04-20 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cid` int(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cid`, `price`, `thumb`, `des`) VALUES
(23, 'Vivo U10 (Electric Blue, 5000 mAH 18W Fast Charge Battery, 3GB RAM, 32GB Storage) ', 2, '6000', 'product/mob.jpg', ' To avail No Cost EMI benefits, on part or all of the products in your order, please add the items individually to your cart and continue to the checkout process\r\n16.15 centimeters (6.35-inch) halo fullview display with 720 x 1544 pixels resolution '),
(24, 'Veirdo Men\'s Cotton Round Neck T-Shirt ', 2, '234', 'product/61z3TuBdTyL_UX679_.jpg', 'Veirdo Men\'s Cotton Round Neck T-Shirt '),
(25, 'Shri Balaji Pearl Jewellery Set for Women(S0BS05_Red)', 6, '234500', 'product/61OJTZbVqhL_UY535_.jpg', 'Shri Balaji Pearl Jewellery Set for Women(S0BS05_Red) (weeding special)'),
(26, 'Sanyo 80 cm (32 inches) Kaizen Series HD Ready Smart Certified Android IPS LED TV XT-32A170H (Black) (2019 Model) ', 2, '33333', 'product/81cUNi7ND9L_SX450_.jpg', 'Sanyo 80 cm (32 inches) Kaizen Series HD Ready Smart Certified Android IPS LED TV XT-32A170H (Black) (2019 Model) '),
(27, 'Lustree Vivo U10 Case Cover Protective + [Bumper] CASE, Vivo U10 Back Cover Case - Transparent Case ', 2, '1222', 'product/41KCn76Apm_SY450_.jpg', 'Lustree Vivo U10 Case Cover Protective + [Bumper] CASE, Vivo U10 Back Cover Case - Transparent Case '),
(28, 'Haier 80 cm (32 Inches) HD Ready LED TV LE32K6000B (Black)', 2, '230000', 'product/51jGCELP5zL_SY450_.jpg', 'Haier 80 cm (32 Inches) HD Ready LED TV LE32K6000B (Black) for family'),
(29, 'Shri Balaji Metal Jewellery Set for Women(S0BS08_Silver) ', 2, '200000', 'product/614jRJ9uPbUX625_.jpg', 'Shri Balaji Metal Jewellery Set for Women(S0BS08_Silver) '),
(30, 'Veirdo Men\'s Sleeveless Cotton T-Shirt - Camouflage ', 2, '230', 'product/Men.jpg', ' (army check) Veirdo Men\'s Sleeveless Cotton T-Shirt - Camouflage Veirdo Men\'s Sleeveless Cotton T-Shirt - Camouflage Veirdo Men\'s Sleeveless Cotton T-Shirt - Camouflage Veirdo Men\'s Sleeveless Cotton T-Shirt - Camouflage  (army check)'),
(31, 'The Power of Your Subconscious Mind (DELUXE HARDBOUND EDITION)', 4, '1222', 'product/51HUrtezH3L_SX322_BO1,204,203,200_.jpg', 'An exquisitely designed leather-bound edition of one of the most powerful self-help title, this book comes with a ribbon bookmark, gilded edges and beautiful endpapers. Ideal to be read and treasured, it makes for a perfect addition to any library. This r'),
(32, 'Make Your Own Luck: How to Increase Your Odds of Success in Sales, Startups, Corporate Career and Life ', 4, '456', 'product/book.jpg', ' No Cost EMI: Avail No Cost EMI on select cards for orders above â‚¹3000 Here\'s how\r\nBank Offer (2): Get 5% up to Rs. 1500 Instant Discount on ICICI Bank Credit EMI transactions and 10% up to Rs. 1500 Instant discount on ICICI Debit EMI transactions Here\''),
(33, 'Drinks', 2, '234', 'product/51HUrtezH3L_SX322_BO1,204,203,200_.jpg', 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(111) NOT NULL,
  `pid` int(111) NOT NULL,
  `uid` int(111) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(1, 26, 8, 'not bad', '0000-00-00 00:00:00'),
(2, 26, 8, 'Big Screen', '0000-00-00 00:00:00'),
(11, 26, 8, 'Nice color', '2020-04-20 23:59:12'),
(12, 26, 8, 'Nice color', '2020-04-21 00:00:06'),
(13, 27, 8, 'Nice Color', '2020-04-22 17:59:30'),
(14, 27, 8, 'Nice Color', '2020-04-22 18:08:54'),
(15, 27, 8, 'Nice Color', '2020-04-22 18:11:20'),
(16, 27, 8, 'Nice Color', '2020-04-22 18:12:03'),
(17, 27, 8, 'Nice Color', '2020-04-22 18:12:32'),
(18, 27, 8, 'Nice Color', '2020-04-22 18:14:28'),
(19, 27, 8, 'Nice Color', '2020-04-22 18:15:30'),
(20, 27, 8, 'Nice Color', '2020-04-22 18:15:49'),
(21, 27, 8, 'Nice Color', '2020-04-22 18:24:15'),
(22, 27, 8, 'Nice Color', '2020-04-22 18:24:44'),
(23, 27, 8, 'Nice Color', '2020-04-22 18:34:51'),
(24, 27, 8, 'Nice Color', '2020-04-22 18:48:06'),
(25, 30, 8, 'not bad', '2020-04-22 19:19:40'),
(26, 26, 20, 'good', '2020-05-19 17:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'shawn007@gmail.com', '92aca436522298aec2fab6d1f468766f', '2020-04-14 23:20:53'),
(2, '', '', '2020-04-15 20:34:40'),
(5, 'safayetshawn95@gmail.com', '$2y$10$/s.WLHZXBGTzv.6SoBf2SuceD5dB9Lcdn0ljmod4630TYj0PBAgSC', '2020-04-15 20:42:25'),
(7, 'bh3322123@gmail.com', '$2y$10$aPtR17B9ZikZegSkXqWeP.F5H09i8ocLG7SY251pvOyn5nBzblyQ.', '2020-04-15 20:45:53'),
(8, 'prokash89@gmail.com', '$2y$10$2EY/ALoARVe5wyIG7AriMeTg.11ZLW4dZ3Zq23gUPbm82FU9tJqWy', '2020-04-15 20:54:38'),
(9, 'himi93@gmail.com', '$2y$10$ufHFJeznj6KVXXDo8Ryzz.O504yXUz2P1FDlCJN5bni8kI6OQtEk2', '2020-04-15 20:57:18'),
(10, 'prokash8990@gmail.com', '$2y$10$FQaKnepne5/1KHdQYgS5/.b4qadWokRu7kSVHhTVkOob5We1KxgeK', '2020-04-15 21:00:33'),
(11, 'provin65@gmail.com', '$2y$10$wBVeVQi4TsoRrqTgIYP7pOs0Jv.sXvt5LHNZxF8Pi/NT1xGQ01swK', '2020-04-15 21:03:50'),
(12, 'provash88@gmail.com', '$2y$10$3y/7n379rWweG7prweqKZ..op.IwmbtGtAXctsOIPZ3SJkm.AVzD2', '2020-04-15 21:04:49'),
(13, 'rites_desh@gmail.com', '$2y$10$68PzlDtZ7KxDuUyLW7J9hOJMo475cduANLUNJsIluFPdIsC7xjrYO', '2020-04-15 21:10:09'),
(17, 'shawn0074@gmail.com', '$2y$10$NTDg.pYIp3YpxOCtHXggsOANILRm//wRH.1D/crIzeRBJVTtC8e2S', '2020-04-17 19:57:03'),
(18, 'prokash87@gmail.com', '$2y$10$q8Sf7w7SqxMCfR4sJJ5VEO8rilA5Ho9uYkcHd75IoGN1.680rQDL2', '2020-04-17 22:42:08'),
(20, 'bullet95@gmail.com', '$2y$10$dVWUGFvBQOGsLEmZ6SCKNOuUoCGFrOSemiFk1zyfpykAw72k8XVCu', '2020-05-15 22:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `uid`, `first`, `last`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(6, 8, 'Safayet', 'Shawn', 'US-BANGLA', '1208 Trade Road1', '12/3 Rose House1', 'Dhaka', 'Dhaka', 'AM', '12031', '017266819031'),
(9, 17, 'Safayet', 'Shawn', 'US-BANGLA', 'GREEN Road', '12/3 Rose House', 'nilpur', 'uslk', 'AT', '1234', '12345678977'),
(10, 18, 'prokas', 'Das', 'uk-llb', 'GREEN Road', '12/3 Rose House', 'nilpur', 'Dhaka', 'AF', '1203', '01726681903'),
(11, 20, 'Safayet', 'Shawn', 'US-BANGLA', '1208 Trade Road', '12/3 Rose House', 'Dhaka', 'Dhaka', '', '1203', '01726681903');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(200) NOT NULL,
  `pid` int(150) NOT NULL,
  `uid` int(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(1, 27, 8, '2020-04-22 18:48:53'),
(2, 24, 8, '2020-04-22 19:04:20'),
(3, 23, 20, '2020-05-19 17:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracing`
--
ALTER TABLE `ordertracing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ordertracing`
--
ALTER TABLE `ordertracing`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

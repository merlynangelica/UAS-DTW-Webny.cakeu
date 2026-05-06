-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasnycakeu`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `shipping_status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `payment_method`, `address`, `message`, `shipping_status`) VALUES
(1, 1, 57000, 'QRIS', 'di arya duta yaa', 'untuk matcha nya sugar nya normal yaa', 'Delivered'),
(2, 1, 90000, 'QRIS', 'lippo plaza', 'kasih alat makan ya kak', 'Delivered'),
(3, 3, 149000, 'COD', 'jln uph', 'kasi alat makan', 'Delivered'),
(4, 1, 57000, 'QRIS', 'jalan helvetia', '', 'Delivered'),
(5, 1, 57000, 'QRIS', 'jalan lippo', '', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 5, 1),
(3, 2, 1, 1),
(4, 2, 4, 1),
(5, 3, 1, 1),
(6, 3, 5, 1),
(7, 3, 6, 1),
(8, 3, 4, 1),
(9, 4, 1, 1),
(10, 4, 5, 1),
(11, 5, 1, 1),
(12, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `description`, `stock`) VALUES
(1, 'Matcha Latte', 45000, 'matcha.jpg', 'drink', 'Premium ceremonial-grade matcha blended with fresh milk for a smooth and rich flavor.', 9),
(2, 'Coffee Latte', 32000, 'coffee.jpg', 'drink', 'Smooth espresso combined with creamy milk, delivering a balanced and comforting taste.', 10),
(3, 'Chocolate Latte', 45000, 'chocolate.jpg', 'drink', 'Rich premium cocoa blended with milk for a velvety and indulgent chocolate experience.', 10),
(4, 'Burnt Cheesecake', 45000, 'cheesecake.jpg', 'dessert', 'Creamy and soft cheesecake with a slightly caramelized top, creating a rich and unique flavor.', 10),
(5, 'Cookies', 12000, 'cookies.jpg', 'dessert', 'Freshly baked soft cookies with a crispy edge and gooey center, perfect for every bite.', 9),
(6, 'Brownies', 47000, 'brownies.jpg', 'dessert', 'Fudgy chocolate brownies made with premium ingredients, rich in flavor and irresistibly moist.', 10),
(7, 'Thai Tea', 30000, 'thai tea.jpeg', 'drink', 'Authentic Thai tea mixed with creamy milk, delivering a fragrant aroma and perfectly sweet taste.', 10),
(8, 'Red Velvet Cake', 42000, 'red velvet.jpeg', 'dessert', 'Creamy red velvet blended with fresh milk, offering a smooth texture and rich sweet flavor.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'merlyn', 'merlynangelica06@gmail.com', '$2y$10$focfvH1bEDQeHA.B11/rUeCR9aaHWGKGzLW7NUit1wvrVcBFnIJBi', 'user'),
(2, 'ny.cakeu', 'nycakeu@gmail.com', '$2y$10$hzlfMUp7bA2NV7lAhwwvy.s2EtkzQBn8S9GIiroL.GJ3tRShFEjIG', 'admin'),
(3, 'chailine', 'chailine13@gmail.com', '$2y$10$gLtjSbh7Y3Qg39D.jYQlleVglRiPq8QRO4tqyyyvNXLOWHz2RL36e', 'user'),
(4, 'fanny', 'fannyanggata@gmail.com', '$2y$10$yW1t7W91h/Tde8Oc/ita1uuEfg6gCgrpqbGdLISRFI5tCsmDQB2kG', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

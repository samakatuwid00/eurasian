-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 09:33 AM
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
-- Database: `eurasian`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Cottage', 'cottage', 'cottagecottage', 0, 0, '1697203789-jpg', 'Bamboo', 'bamboo', 'bamboobamboo', '2023-10-13 13:29:49'),
(2, 'Rooms', 'rooms', 'roomsrooms', 0, 1, '1697203838-jpg', 'Rooms', 'roomsrooms', 'rooms', '2023-10-13 13:30:38'),
(3, 'Octagon', 'octagon', 'octagonoctagon', 0, 1, '1697203941-jpg', 'Octagon', 'octagonoctagon', 'octagon', '2023-10-13 13:32:21'),
(6, 'Pavilion', 'pavilion', 'pavilionpavilion', 0, 1, '1697600352-jpg', 'pavilion', 'pavilion', 'pavilion', '2023-10-18 03:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(1, 6, 'Bamboo Cottage', 'cottage', 'cottage', 'cottage', 0, '1697291172.jpg', 0, 0, 1, 'Bamboo Cottage', 'Bamboo Cottage', 'Bamboo Cottage', '2023-10-14 13:46:12'),
(5, 2, 'Bermuda', 'Bermuda', 'Bermuda', 'Bermuda', 0, '1697609170-jpg', 0, 0, 1, 'Bermuda', 'Bermuda', 'Bermuda', '2023-10-18 06:06:10'),
(6, 3, 'Pentagon', 'Pentagon', 'PentagonPentagon', 'PentagonPentagon', 0, '1697609233-jpg', 0, 0, 0, 'Pentagon', 'Pentagon', 'Pentagon', '2023-10-18 06:07:13'),
(7, 0, 'Native', 'Native', 'Native', 'Native', 0, '1697609338-jpg', 0, 0, 1, 'Native', 'Native', 'Native', '2023-10-18 06:08:58'),
(8, 1, 'Concrete', 'Concrete', 'ConcreteConcrete', 'ConcreteConcrete', 0, '1697612757-jpg', 0, 0, 0, 'Concrete', 'ConcreteConcrete', 'ConcreteConcrete', '2023-10-18 07:05:57'),
(9, 2, 'Elegance', 'Elegance', 'Elegance', 'Elegance', 0, '1697613527-jpg', 0, 0, 1, 'Elegance', 'Elegance', 'Elegance', '2023-10-18 07:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `confirmPass` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `address`, `password`, `role_as`, `confirmPass`) VALUES
(1, 'admin', 'admin', '2147483647', 'will follow up', 'admin', 1, 'admin'),
(2, 'user', 'test@gmail.com', '2147483647', 'will follow up', 'user', 0, 'user'),
(3, 'patrick', 'pat@gmail.com', '09566422784', 'will follow up', 'pat', 0, 'pat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

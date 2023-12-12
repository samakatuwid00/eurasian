-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 06:14 AM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_name` varchar(191) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `book_address` varchar(250) NOT NULL,
  `book_contact` varchar(250) NOT NULL,
  `book_email` varchar(250) NOT NULL,
  `book_persons` int(100) NOT NULL,
  `referenceNum` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `book_checkout` date NOT NULL,
  `book_status` tinyint(2) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `user_id`, `room_name`, `book_name`, `book_address`, `book_contact`, `book_email`, `book_persons`, `referenceNum`, `book_date`, `book_checkout`, `book_status`, `created_at`) VALUES
(17, 2, 'Mangrove', 'Roger', 'Pasacao', '1234567890', 'abayrogerjr07@gmail.com', 4, 1234567890, '2023-12-12', '2023-12-12', 127, '2023-12-12 03:23:46'),
(18, 54, 'PHS Room', 'Roger Abay', 'will follow up', '09566422783', 'abaygherjr07@gmail.com', 1, 2147483647, '2023-12-12', '2023-12-12', 127, '2023-12-12 03:25:27');

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
(9, 'Cottage', 'bamboocottage', 'Our Bamboo Cottages at Eurasian Paradise Resort invite you to unwind in style, surrounded by the beauty of nature.', 0, 1, '1701471287.jpg', 'Bamboo Cottage', 'Each cottage is thoughtfully crafted with locally sourced bamboo, ensuring a minimal ecological footprint. ', 'Bamboo Cottage', '2023-12-01 22:54:47'),
(11, 'Octagon', 'PHS Room', '\"Discover the epitome of luxury and relaxation at Octagon Resort, where modern elegance meets natural serenity. ', 0, 1, '1701471421.jpg', 'Octagon', ' With panoramic windows that frame stunning views, the Octagon Villas provide a seamless connection', 'PHS Room', '2023-12-01 22:57:01'),
(13, 'Rooms', 'Rooms', 'Indulge in paradise at our exquisite resort in Bermuda, where luxury meets the stunning beauty of the Atlantic.', 0, 1, '1701472069.jpg', 'Rooms', 'From breathtaking ocean views to world-class amenities, every detail is curated for an unforgettable escape. ', 'From breathtaking ocean views to world-class amenities, every detail is curated for an unforgettable escape. ', '2023-12-01 23:07:49'),
(14, 'Pavilion', 'pavilion', 'The Pavilions, nestled within lush surroundings, offer a private oasis where modern amenities seamlessly blend.', 0, 1, '1701472215-jpg', 'Pavilion', 'Enjoy spacious interiors, premium furnishings, and personalized service in an atmosphere of tranquility.', 'Enjoy spacious interiors, premium furnishings, and personalized service in an atmosphere of tranquility.', '2023-12-01 23:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `email`, `message`, `seen`) VALUES
(75, 'Roger Abay', 'abaygherjr07@gmail.com', 'hi', 1);

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
(18, 9, 'Bamboo Cottage', 'bamboo cottage', 'Discover a harmonious blend of eco-luxury and natural serenity in our Bamboo Cottages at Eurasian Paradise Resort. ', 'Experience a truly rejuvenating getaway at Bamboo Cottages, where sustainable elegance meets blissful retreat.', 1000, '1701473807.jpg', 6, 0, 1, 'Bamboo Cottage', 'Bamboo Cottage', 'Each cottage is an oasis of relaxation, providing a unique and environmentally conscious escape.', '2023-12-01 23:36:47'),
(20, 11, 'PHS Room', 'phsroom1', 'A PHS Room at our resort offers a luxurious and tranquil escape, combining modern comfort with a touch of paradise. ', 'Thoughtfully designed to provide a serene atmosphere, these rooms feature contemporary amenities, stunning views, and a harmonious blend of elegance and relaxation.', 2100, '1701267038.jpg', 5, 0, 1, 'PHS Room', 'PHS Room', 'A PHS Room at our resort offers a luxurious and tranquil escape, combining modern comfort with a touch of paradise. ', '2023-11-29 14:11:37'),
(21, 13, 'Bermuda', 'Bermuda', 'Your unforgettable escape begins at Eurasian Paradise Resort, where paradise meets perfection', 'Escape to the idyllic shores of Bermuda and experience the epitome of luxury at our exquisite resort', 1500, '1701472957-jpg', 6, 0, 1, 'Bermuda', 'Bermuda', 'Immerse yourself in the breathtaking beauty of pink-sand', '2023-12-01 23:29:27'),
(22, 14, 'Mangrove', 'Area', 'Our Mangrove Retreat at Eurasian Paradise Resort promises a secluded escape', 'Discover the beauty of these coastal havens from the comfort of your accommodation, where modern luxury seamlessly blends with the serenity of nature. ', 1000, '1701474458-jpg', 1000, 0, 0, 'Mangrove Area', 'Mangrove Area', 'Modern luxury seamlessly blends with the serenity of nature.', '2023-12-10 04:02:58');

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
  `status` tinyint(4) NOT NULL DEFAULT current_timestamp(),
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `confirmPass` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `address`, `status`, `password`, `role_as`, `confirmPass`, `verify_token`, `verify_status`, `created_at`) VALUES
(1, 'admin', 'admin@eurasian.com', '09566422783', 'will follow up', 0, 'admin', 1, 'admin', '', 1, '2023-11-12 03:05:27'),
(2, 'Roger', 'abayrogerjr07@gmail.com', '1234567890', 'Pasacao', 0, '123', 0, '123', '71994268ace5f3fd2fa777546663c8a2', 0, '2023-11-17 16:59:41'),
(54, 'Roger Abay', 'abaygherjr07@gmail.com', '09566422783', 'will follow up', 0, '123', 0, '123', '20515ef2522c1371ddf4bb3a42d8b9b6', 1, '2023-11-28 01:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

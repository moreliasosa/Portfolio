-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Apr 30, 2023 at 02:03 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int NOT NULL,
  `firstname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cord` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Zipcode` int NOT NULL,
  `property` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `obstruction` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `history` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shape` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` decimal(10,2) DEFAULT NULL,
  `perM` decimal(10,2) DEFAULT NULL,
  `ph` decimal(10,2) DEFAULT NULL,
  `minC` decimal(10,2) DEFAULT NULL,
  `nitro` decimal(10,2) DEFAULT NULL,
  `pho` decimal(10,2) DEFAULT NULL,
  `pot` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `firstname`, `lastname`, `email`, `cord`, `Zipcode`, `property`, `obstruction`, `history`, `color`, `shape`, `size`, `perM`, `ph`, `minC`, `nitro`, `pho`, `pot`) VALUES
(9, 'Sunnae', 'Hiler', 'email@email.com', '225 W 33 13 27 N 97 7 43 Denton TX 660 ft elevation', 76210, 'Single-Family', 'rocks', 'have alot of pets. Chickens, dogs and cats', 'blue', 'round', 6.00, 6.00, 6.00, 0.50, 0.00, 6.00, 6.00),
(11, 'Morelia', 'Sosa', 'm@msosa.com', '225 W 33 13 27 N 97 7 43 Denton TX 660 ft elevation', 75068, 'Single-Family', 'patio furniture', 'lied here for 10 years', 'red', 'square', 0.52, 4.01, 4.01, 0.31, 0.01, 5.01, 54.01),
(13, 'Eduardo', 'Romero', 'Romero.lalo1098@gmail.com', '225 W 33 13 27 N 97 7 43 Denton TX 660 ft elevation', 76177, 'Single-Family', 'grass', 'oil changes from cars', 'green', 'oval', 1.00, 1.00, 0.00, 0.10, 0.00, 0.00, 0.00),
(15, 'angelica', 'quintana', 'xangelicax93@yahooo.com', '225 W 33 13 27 N 97 7 43 Denton TX 660 ft elevation', 75067, 'Single-Family', '', '', 'turquoise', 'rectangle', 0.00, 0.00, 0.00, 0.10, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'moreliasosa', 'xmoreliaxsosa@gmail.com', '6099922198cd833eff47cd8cf854ab65'),
(2, 'Lalo_51243', 'Romero.lalo1098@gmail.com', 'f0a408580e4e4e0d8384c5e560a1ce4d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
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
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

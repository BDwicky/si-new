-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 09:28 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator with full access'),
(2, 'Superadmin', 'Super Administrator with system-wide privileges'),
(3, 'User', 'Regular user with basic access');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'UKM Silat', 24, '2025-07-16 12:59:58', '2025-07-16 12:59:58'),
(2, 'UKM Bola', 25, '2025-07-16 13:39:23', '2025-07-16 13:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_members`
--

CREATE TABLE `ukm_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ukm_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `role_in_ukm` varchar(30) DEFAULT 'anggota',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm_members`
--

INSERT INTO `ukm_members` (`id`, `user_id`, `ukm_id`, `status`, `role_in_ukm`, `created_at`, `updated_at`) VALUES
(1, 27, 1, 'approved', 'ketua', '2025-07-18 05:38:49', '2025-07-18 05:38:49'),
(2, 27, 2, 'pending', 'anggota', '2025-07-18 05:38:49', '2025-07-18 05:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `nim`, `phone`, `fakultas`, `program_studi`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'admin', 'admin@gmail.com', '', '', '', '', '$2y$10$d4AU0TBqLdKEDfF3GUuB6ehkZ.hfEcH/4icEg4Dwb11chFsqJ6flK', 1, '2025-07-14 07:55:25', '2025-07-14 07:55:25'),
(24, 'ukmsilat', 'UKM Silat', 'ukmsilat@test.id', NULL, '08123231234', NULL, NULL, '$2y$10$LysJxprAdrvAdaT6ukMgGOo5vO4.SXL9gMRWhk2qHvFuHXqZt59z2', 2, '2025-07-16 05:59:58', '2025-07-16 05:59:58'),
(25, 'ukmbola', 'UKM Bola', 'ukmbola@test.id', NULL, '123', NULL, NULL, '$2y$10$3XoNw7Ib.CLIqp6aY99vEee/cXTdHMvg58M.QgjGZB4SzyUYttXLW', 2, '2025-07-16 06:39:23', '2025-07-16 06:39:23'),
(27, 'mhs', 'mhs', 'mhs@test.id', '202211420053', '123', 'Fakultas Teknik', 'Informatika', '$2y$10$iormZ.SXT0lTxYpr68Qot.U./1QRULQFQ1F.ozf4xSHuIljebW3n6', 3, '2025-07-17 22:35:12', '2025-07-17 22:35:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ukm_members`
--
ALTER TABLE `ukm_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_membership` (`user_id`,`ukm_id`),
  ADD KEY `ukm_id` (`ukm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ukm_members`
--
ALTER TABLE `ukm_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ukm`
--
ALTER TABLE `ukm`
  ADD CONSTRAINT `ukm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ukm_members`
--
ALTER TABLE `ukm_members`
  ADD CONSTRAINT `ukm_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ukm_members_ibfk_2` FOREIGN KEY (`ukm_id`) REFERENCES `ukm` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

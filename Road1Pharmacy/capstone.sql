-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 05:16 AM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `role_as` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `role_as`, `picture`) VALUES
(2, 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '11th@gmail.com', 1, 'profile.jpg'),
(3, 'rdu1', '3bb5f9f037bafd994e930bce19d2aff6aa7f68d449838714da16e3f5e1cd7a91', '11thhokage@gmail.com', 3, 'userprofile1.jpg'),
(4, 'frontend1', 'c515aab4b06d70c7613a27e2782623c1ae025b557c291d72e29b6055bbca5b3f', 'hokage@gmail.com', 2, 'userprofile2.jpg'),
(5, 'frontend2', '20e9fc406ce47e90c133a530e6cc6edbc69f35c4d8c7001b5104f2e529452808', 'frontend2@gmail.com', 2, 'frontend2.jpg'),
(6, 'rdu2', '60f07aef1e7f335fc1b27297e146d2fcd5f82ae89ae3354445017b847258d2af', 'rdu2@gmail.com', 3, '2mb_nar2.jpg'),
(7, 'rdu3', '2f0ac71a35c22baab1eb777ee595b9521db9ea4b68649de7d83d95143168b5f2', 'rdu3@gmail.com', 3, 'rdu3.jpg'),
(8, 'frontend3', '3f570764b8ca90c8d61adfbd3a8289ea0254a00705fc2d400ab5b49c475c8f22', 'frontend3@gmail.com', 2, 'frontend3.jpg'),
(9, 'testfr2', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'robinandrew.zoup@gmail.com', 2, 'testfr.jpg'),
(10, 'testrdu5', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'paulbenedicts482@gmail.com', 3, 'testrdu5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_items`
--

CREATE TABLE `delivered_items` (
  `id` int(11) NOT NULL,
  `last_id` int(11) NOT NULL,
  `receipt_trans_number` varchar(256) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `unit_price` double NOT NULL,
  `item_qty` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivered_items`
--

INSERT INTO `delivered_items` (`id`, `last_id`, `receipt_trans_number`, `item_name`, `unit_price`, `item_qty`, `expiry_date`, `subtotal`) VALUES
(5, 104, '1234qaz', 'saridon 250mg', 4, 10, '2026-03-09', 40),
(6, 104, '1234qaz', 'erythromycin 500mg', 8, 10, '2025-09-09', 80),
(7, 105, 'QWE123', 'saridon 250mg', 4, 5, '2026-10-03', 20),
(9, 107, 'paul123', 'biogesic 500mg', 4, 10, '2026-03-11', 40),
(10, 108, 'laup321', 'Loratadine 120mg', 5, 5, '2026-03-11', 25),
(11, 109, 'ben123', 'Mefenamic Acid 250mg', 6, 10, '2026-03-11', 60),
(12, 11, 'ben123', 'Arseflora 25ml', 8, 10, '2026-03-11', 80),
(13, 110, 'lloyd123', 'Neozep 250mg', 4, 5, '2026-03-11', 20),
(14, 111, 'fgh1235', 'Drenex 30mg', 25, 20, '2026-03-12', 500),
(15, 14, 'fgh1235', 'Drenex 30mg', 25, 10, '2026-03-13', 250),
(16, 112, 'mnt-124', 'saridon 250mg', 5, 5, '2026-04-08', 25),
(17, 16, 'mnt-124', 'biogesic 500mg', 4, 10, '2026-04-08', 40),
(18, 113, 'zsef123', 'Loratadine 120mg', 5, 10, '2026-04-19', 50),
(19, 114, 'jki456', 'biogesic 500mg', 4, 10, '2026-04-20', 40);

-- --------------------------------------------------------

--
-- Table structure for table `deliver_received`
--

CREATE TABLE `deliver_received` (
  `post_trans_number` int(11) NOT NULL,
  `receipt_trans_number` varchar(256) NOT NULL,
  `date_received` date NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `received_by` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deliver_received`
--

INSERT INTO `deliver_received` (`post_trans_number`, `receipt_trans_number`, `date_received`, `vendor_name`, `total`, `received_by`) VALUES
(104, '1234qaz', '2024-03-09', 'vendor1', 120, 'rdu1'),
(105, 'QWE123', '2024-09-03', 'vendor1', 20, 'rdu1'),
(107, 'paul123', '2024-03-11', 'vendor1', 40, 'rdu1'),
(108, 'laup321', '0000-00-00', 'Vendor 6', 25, 'rdu1'),
(109, 'ben123', '2024-11-03', 'vendor1', 140, 'rdu1'),
(110, 'lloyd123', '2024-03-11', 'vendor1', 20, 'rdu1'),
(111, 'fgh1235', '2024-03-12', 'vendor1', 750, 'rdu1'),
(112, 'mnt-124', '2024-04-08', 'vendor1', 65, 'rdu1'),
(113, 'zsef123', '2024-04-19', 'vendor3', 50, 'rdu1'),
(114, 'jki456', '2024-04-20', 'vendor2', 40, 'rdu1');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `code` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `what_for` varchar(256) NOT NULL,
  `unit_price` double NOT NULL,
  `mark_up` int(2) NOT NULL,
  `price` double NOT NULL,
  `vendor_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`code`, `item_name`, `what_for`, `unit_price`, `mark_up`, `price`, `vendor_name`) VALUES
(3, 'saridon 250mg', 'headache', 5, 20, 6, 'vendor1'),
(4, 'erythromycin 500mg', 'tonsilitis', 8, 25, 10, 'vendor2'),
(5, 'biogesic 500mg', 'headache', 4, 25, 5, 'vendor3'),
(6, 'Loratadine 120mg', 'cough', 5, 20, 6, 'Vendor 4'),
(7, 'Neozep 250mg', 'cough', 4, 25, 5, 'Vendor 5'),
(8, 'Arseflora 25ml', 'asthma', 8, 20, 10, 'Vendor 6'),
(9, 'Mefenamic Acid 250mg', 'antibiotic', 6, 20, 7, 'Vendor 1'),
(10, 'Drenex 30mg', 'rheumatic', 25, 5, 26, 'juliet');

-- --------------------------------------------------------

--
-- Table structure for table `push_orders`
--

CREATE TABLE `push_orders` (
  `id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL DEFAULT '',
  `reason` varchar(250) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `push_orders`
--

INSERT INTO `push_orders` (`id`, `item_name`, `reason`, `qty`, `status`) VALUES
(1, 'saridon 250 mg', 'Low_on_Stock', 1, 'unread'),
(2, 'erythromycin 500 mg', 'Low_on_Stock', 2, 'read'),
(3, 'erythromycin 500 mg', 'Low_on_Stock', 1, 'read'),
(4, 'erythromycin 500 mg', 'Low_on_Stock', 11, 'read'),
(5, 'erythromycin 500 mg', 'Low_on_Stock', 11, 'read'),
(6, 'erythromycin 500 mg', 'Low_on_Stock', 11, 'read'),
(7, 'biogesic 500 mg', 'customer_request', 2, 'read'),
(8, 'erythromycin 500 mg', 'customer_request', 12, 'read'),
(9, 'erythromycin 500 mg', 'customer_request', 12, 'read'),
(10, 'biogesic 500 mg', 'Low_on_Stock', 12, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL DEFAULT '',
  `reason` varchar(250) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `item_name`, `reason`, `qty`, `expiry_date`, `status`) VALUES
(1, 'saridon250mg', 'Damaged', 1, '0000-00-00', 'read'),
(2, 'saridon250mg', 'Near_Expiration_Date', 1, '2024-02-29', 'read'),
(3, 'erythromycin500mg', 'Damaged', 1, '0000-00-00', 'read'),
(4, 'erythromycin500mg', 'Damaged', 1, '0000-00-00', 'read'),
(5, 'erythromycin500mg', 'Damaged', 100, '0000-00-00', 'read'),
(6, 'erythromycin500mg', 'Damaged', 100, '0000-00-00', 'read'),
(7, 'erythromycin500mg', 'Damaged', 123, '0000-00-00', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `training_items`
--

CREATE TABLE `training_items` (
  `id` int(11) NOT NULL,
  `words` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_items`
--

INSERT INTO `training_items` (`id`, `words`) VALUES
(1, 'saridon'),
(2, '250mg'),
(3, 'Neozep');

-- --------------------------------------------------------

--
-- Table structure for table `training_words`
--

CREATE TABLE `training_words` (
  `id` int(11) NOT NULL,
  `words` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_words`
--

INSERT INTO `training_words` (`id`, `words`) VALUES
(1, 'alternative'),
(2, 'suggest'),
(3, 'substitute');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `tender_amount` int(11) NOT NULL,
  `date_transacted` date NOT NULL,
  `time_transacted` time NOT NULL,
  `payment_mode` varchar(256) NOT NULL,
  `transact_by` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `tender_amount`, `date_transacted`, `time_transacted`, `payment_mode`, `transact_by`) VALUES
(5, 15, 20, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(6, 100, 100, '2024-03-06', '00:00:00', 'Gcash', 'frontend1'),
(7, 30, 30, '2024-03-06', '00:00:00', 'Gcash', 'frontend1'),
(8, 30, 30, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(9, 30, 50, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(10, 30, 50, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(11, 30, 50, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(12, 30, 50, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(13, 80, 90, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(14, 5, 5, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(15, 5, 5, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(16, 5, 5, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(17, 5, 5, '2024-03-06', '00:00:00', 'Cash', 'frontend1'),
(18, 20, 20, '2024-03-06', '00:00:00', 'Gcash', 'frontend2'),
(19, 20, 20, '2024-03-06', '00:00:00', 'Gcash', 'frontend2'),
(20, 15, 15, '2024-03-06', '00:00:00', 'Cash', 'frontend2'),
(21, 5, 5, '2024-03-06', '00:00:00', 'Cash', 'frontend2'),
(22, 5, 20, '2024-03-09', '00:00:00', 'Cash', 'frontend1'),
(23, 20, 50, '2024-03-09', '11:14:05', 'Cash', 'frontend2'),
(24, 75, 100, '2024-03-11', '08:55:49', 'Cash', 'frontend1'),
(25, 90, 90, '2024-03-11', '09:08:31', 'Cash', 'frontend1'),
(26, 50, 50, '2024-03-11', '09:15:58', 'Cash', 'frontend1'),
(27, 86, 100, '2024-03-11', '09:33:05', 'Cash', 'frontend2'),
(28, 7, 10, '2024-03-12', '14:37:35', 'Cash', 'frontend2'),
(29, 29, 29, '2024-03-12', '22:59:59', 'Cash', 'frontend1'),
(30, 260, 260, '2024-03-12', '23:15:59', 'Cash', 'frontend1'),
(31, 312, 350, '2024-03-12', '23:17:05', 'Cash', 'frontend1'),
(32, 6, 10, '2024-04-19', '23:24:21', 'Cash', 'frontend1'),
(33, 25, 50, '2024-04-20', '11:50:34', 'Cash', 'frontend1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_items`
--

CREATE TABLE `transactions_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions_items`
--

INSERT INTO `transactions_items` (`id`, `order_id`, `item_name`, `price`, `qty`) VALUES
(4, 5, 'erythromycin 500mg', 10, 1),
(5, 6, 'erythromycin 500mg', 10, 10),
(6, 7, 'erythromycin 500mg', 10, 3),
(7, 8, 'erythromycin 500mg', 10, 3),
(8, 9, 'erythromycin 500mg', 10, 3),
(9, 10, 'erythromycin 500mg', 10, 3),
(10, 11, 'erythromycin 500mg', 10, 3),
(11, 12, 'erythromycin 500mg', 10, 3),
(12, 13, 'biogesic 500mg', 5, 16),
(13, 14, 'saridon 250mg', 5, 1),
(14, 15, 'saridon 250mg', 5, 1),
(15, 16, 'saridon 250mg', 5, 1),
(16, 17, 'saridon 250mg', 5, 1),
(17, 18, 'saridon 250mg', 5, 4),
(18, 19, 'saridon 250mg', 5, 4),
(19, 20, 'saridon 250mg', 5, 3),
(20, 21, 'saridon 250mg', 5, 1),
(21, 22, 'saridon 250mg', 5, 1),
(22, 23, 'erythromycin 500mg', 10, 2),
(23, 24, 'saridon 250mg', 5, 15),
(24, 25, 'erythromycin 500mg', 10, 9),
(25, 26, 'saridon 250mg', 5, 10),
(26, 27, 'Loratadine 120mg', 6, 6),
(27, 27, 'biogesic 500mg', 5, 10),
(28, 28, 'Mefenamic Acid 250mg', 7, 1),
(29, 29, 'Arseflora 25ml', 10, 1),
(30, 29, 'Mefenamic Acid 250mg', 7, 2),
(31, 29, 'Neozep 250mg', 5, 1),
(32, 30, 'Drenex 30mg', 26, 10),
(33, 31, 'Drenex 30mg', 26, 12),
(34, 32, 'saridon 250mg', 6, 1),
(35, 33, 'biogesic 500mg', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_code` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `vendor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_code`, `item_name`, `item_qty`, `expiry_date`, `vendor_name`) VALUES
(37, 'Mefenamic Acid 250mg', 7, '2026-03-11', 'vendor1'),
(38, 'Arseflora 25ml', 9, '2026-03-11', 'vendor1'),
(39, 'Neozep 250mg', 4, '2026-03-11', 'vendor1'),
(41, 'Drenex 30mg', 8, '2026-03-13', 'vendor1'),
(42, 'saridon 250mg', 5, '2026-04-08', 'vendor1'),
(43, 'biogesic 500mg', 5, '2026-04-08', 'vendor1'),
(44, 'saridon 250mg', 2, '2024-05-01', 'vendor1'),
(45, 'Loratadine 120mg', 10, '2026-04-19', 'vendor3'),
(46, 'biogesic 500mg', 10, '2026-04-20', 'vendor2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered_items`
--
ALTER TABLE `delivered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_received`
--
ALTER TABLE `deliver_received`
  ADD PRIMARY KEY (`post_trans_number`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `push_orders`
--
ALTER TABLE `push_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_items`
--
ALTER TABLE `training_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_words`
--
ALTER TABLE `training_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions_items`
--
ALTER TABLE `transactions_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivered_items`
--
ALTER TABLE `delivered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `deliver_received`
--
ALTER TABLE `deliver_received`
  MODIFY `post_trans_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `push_orders`
--
ALTER TABLE `push_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training_items`
--
ALTER TABLE `training_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_words`
--
ALTER TABLE `training_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transactions_items`
--
ALTER TABLE `transactions_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

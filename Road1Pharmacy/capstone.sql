-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 03:23 AM
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
(19, 114, 'jki456', 'biogesic 500mg', 4, 10, '2026-04-20', 40),
(20, 115, 'tite', 'ACETYLCYSTEINE  200MG', 7.64, 1, '2026-05-14', 7.64),
(21, 116, 'hotdog', 'ACETYLCYSTEINE 200MG', 7.64, 1, '2027-02-15', 7.64),
(22, 117, 'twst123', 'ACETYLCYSTEINE 200MG', 7.64, 5, '2026-05-15', 38.2),
(23, 22, 'twst123', 'ACYCLOVIR 100MG', 9.82, 3, '2026-05-15', 29.46),
(24, 23, 'twst123', 'ACYCLOVIR 400MG', 5.67, 4, '2026-05-15', 22.68),
(30, 123, 'Found from Warehouse2024-05-23-19:42:12', 'ACYCLOVIR 100MG', 0, 2, '2026-05-23', 0),
(31, 124, 'Found from Warehouse 2024-05-23-20:14:29', 'ACETYLCYSTEINE 200MG', 0, 1, '2026-05-23', 0),
(32, 125, 'Subracted from warehouse 2024-05-23-22:22:52', 'ACETYLCYSTEINE 200MG', 0, 2, '2026-05-15', 0),
(33, 126, 'Subracted from warehouse 2024-05-23-22:23:07', 'ACETYLCYSTEINE 200MG', 0, 1, '2026-05-15', 0),
(34, 127, 'Subtract from warehouse 2024-05-23-22:33:20', 'ACETYLCYSTEINE 200MG', 0, 3, '2026-05-15', 0),
(35, 128, 'Found from Warehouse 2024-05-23-22:45:21', 'ACETYLCYSTEINE 200MG', 0, 1, '2026-05-15', 0),
(36, 129, 'Subtract from warehouse 2024-05-23-22:46:10', 'ACETYLCYSTEINE 200MG', 0, 1, '2026-05-15', 0);

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
(114, 'jki456', '2024-04-20', 'vendor2', 40, 'rdu1'),
(115, 'tite', '0000-00-00', 'applied pharmaceutical dnt/ beta drug', 7.64, 'rdu1'),
(116, 'hotdog', '2024-05-14', 'applied pharmaceutical dnt/ beta drug', 7.64, 'rdu1'),
(117, 'twst123', '2024-05-15', 'applied pharmaceutical dnt/ beta drug', 90.34, 'rdu1'),
(123, 'Found from Warehouse2024-05-23-19:42:12', '2024-05-23', 'applied pharmaceutical dnt/ beta drug', 0, 'Admin'),
(124, 'Found from Warehouse 2024-05-23-20:14:29', '2024-05-23', 'applied pharmaceutical dnt/ beta drug', 0, 'Admin'),
(125, 'Subracted from warehouse 2024-05-23-22:22:52', '2024-05-23', '', 0, 'Admin'),
(126, 'Subracted from warehouse 2024-05-23-22:23:07', '2024-05-23', '', 0, 'Admin'),
(127, 'Subtract from warehouse 2024-05-23-22:33:20', '2024-05-23', '', 0, 'Admin'),
(128, 'Found from Warehouse 2024-05-23-22:45:21', '2024-05-23', 'applied pharmaceutical dnt/ beta drug', 0, 'Admin'),
(129, 'Subtract from warehouse 2024-05-23-22:46:10', '2024-05-23', '', 0, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `greet_response`
--

CREATE TABLE `greet_response` (
  `id` int(11) NOT NULL,
  `response` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `greet_response`
--

INSERT INTO `greet_response` (`id`, `response`) VALUES
(1, 'Hi! Need a new medicine?'),
(2, 'Hello! Looking for alternatives?'),
(3, 'Greetings! Need a different med?'),
(4, 'Welcome! Which medicine to replace?'),
(5, 'Hey! Need a new med?');

-- --------------------------------------------------------

--
-- Table structure for table `instruction_response`
--

CREATE TABLE `instruction_response` (
  `id` int(11) NOT NULL,
  `instructions` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instruction_response`
--

INSERT INTO `instruction_response` (`id`, `instructions`) VALUES
(1, 'For alternatives, type: \'alternative\' followed by the medicine name and size. To check availability, type: \'check\' with the medicine name and size.'),
(2, 'Type \'alternative\' with the medicine name and size for options. Use \'check\' with the medicine name and size to see availability.'),
(3, 'Need alternatives? Type \'alternative\' plus medicine name and size. For availability, type \'check\' with medicine name and size.');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `code` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `what_for` varchar(256) NOT NULL,
  `unit_price` double NOT NULL,
  `mark_up` double NOT NULL,
  `price` double NOT NULL,
  `type` varchar(256) NOT NULL,
  `classification` varchar(256) NOT NULL,
  `vendor_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`code`, `item_name`, `what_for`, `unit_price`, `mark_up`, `price`, `type`, `classification`, `vendor_name`) VALUES
(114, 'ACETYLCYSTEINE 200MG', 'TBA', 7.64, 135.6, 18, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(115, 'ACYCLOVIR 100MG', 'TBA', 9.82, 52.75, 15, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(116, 'ACYCLOVIR 400MG', 'TBA', 5.67, 111.64, 12, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(117, 'ALLOPURINOL 100MG', 'TBA', 0.72, 177.78, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(118, 'ALLOPURINOL 300MG', 'TBA', 1.39, 187.77, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(119, 'AMBROXOL 30MG', 'TBA', 0.55, 263.64, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(120, 'AMBROXOL 75MG', 'TBA', 3.8, 373.68, 18, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(121, 'AMIODARONE 200MG', 'TBA', 6.39, 228.64, 21, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(122, 'AMLODIPINE 10MG', 'TBA', 0.62, 565.16, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(123, 'ATENOLOL 50MG', 'TBA', 1.22, 227.87, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(124, 'ATENOLOL 100MG', 'TBA', 1.99, 201.51, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(125, 'ATORVASTATIN 10MG', 'TBA', 0.77, 679.22, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(126, 'ATORVASTATIN 20MG', 'TBA', 0.98, 1124.49, 12, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(127, 'ATORVASTATIN 40MG', 'TBA', 2.93, 514.33, 18, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(128, 'AZITHROMYCIN 500MG', 'TBA', 11, 445.45, 60, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(129, 'BETAHISTINE 8MG', 'TBA', 2.55, 429.41, 14, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(130, 'BETAHISTINE 16MG', 'TBA', 3.15, 487.3, 19, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(131, 'BETAHISTINE 24MG', 'TBA', 9.45, 196.3, 28, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(132, 'BUTAMIRATE 50MG', 'TBA', 5.1, 153.9, 13, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(133, 'CANDESARTAN 8MG', 'TBA', 3.61, 232.41, 12, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(134, 'CAPTOPRIL 25MG', 'TBA', 0.37, 575.68, 3, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(135, 'CARBAMAZEPINE 200MG', 'TBA', 1.9, 321.05, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(136, 'CARBOCISTEINE 500MG', 'TBA', 0.97, 312.37, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(137, 'CARVIDELOL 6.25MG', 'TBA', 2.91, 140.55, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(138, 'CARVIDELOL 25MG', 'TBA', 4.12, 94.17, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(139, 'CEFACLOR 500MG', 'TBA', 6.22, 462.7, 35, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(140, 'CEFALEXIN 500MG', 'TBA', 2.33, 200.43, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(141, 'CEFIXIME 200MG', 'TBA', 4.5, 455.56, 25, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(142, 'CEFIXIME 400MG', 'TBA', 12.5, 156, 32, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(143, 'CEFUROXIME 500MG', 'TBA', 8.49, 347.59, 38, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(144, 'CELECOXIB 200MG', 'TBA', 1.93, 780.83, 17, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(145, 'CELECOXIB 400MG', 'TBA', 3.95, 836.71, 37, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(146, 'CETIRIZINE 30MG', 'TBA', 0.3, 900, 3, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(147, 'CHLORAMPHENICOL 500MG', 'TBA', 2.51, 178.88, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(148, 'CILOSTAZOL 100MG', 'TBA', 8.19, 339.56, 36, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(149, 'CIPROFLOXACIN 500MG', 'TBA', 1.72, 306.98, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(150, 'CLINDAMYCIN 300MG', 'TBA', 3.41, 163.93, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(151, 'CLONIDINE 75MCG', 'TBA', 3.85, 289.61, 15, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(152, 'CLONIDINE 150MCG', 'TBA', 3.72, 410.75, 19, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(153, 'CLOPIDOGREL 75MG', 'TBA', 0.95, 794.74, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(154, 'CO-AMOXICLAV 625MG', 'TBA', 9, 200, 27, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(155, 'COLCHICINE 500MG', 'TBA', 2.75, 9.09, 3, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(156, 'DICECLOFENAC 100MG', 'TBA', 0.65, 976.92, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(157, 'DIGOXINE 250MG', 'TBA', 2.9, 72.41, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(158, 'DIPHENHYDRAMINE 25MG', 'TBA', 0.58, 417.24, 3, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(159, 'DIPHENHYDRAMINE 50MG', 'TBA', 0.65, 669.23, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(160, 'DOXYCYLINE 100MG', 'TBA', 0.11, 4445.45, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(161, 'ERYTHROMYCINE 500MG', 'TBA', 4.5, 100, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(162, 'ESOMEPRAZOLE 40MG', 'TBA', 4.28, 530.84, 27, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(163, 'ETHAMBUTOL 400MG', 'TBA', 2.46, 143.9, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(164, 'ETORICOXIB 90MG', 'TBA', 6.93, 361.76, 32, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(165, 'ETORICOXIB 120MG', 'TBA', 8, 375, 38, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(166, 'FEBOXUSTAT 40MG', 'TBA', 8.57, 226.72, 28, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(167, 'FUROSEMIDE 20MG', 'TBA', 0.37, 170.27, 1, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(168, 'GABAPENTIN 300MG', 'TBA', 3.42, 1303.51, 48, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(169, 'GLIBENCLAMIDE 5MG', 'TBA', 0.23, 552.17, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(170, 'GLICLAZIDE 30MG', 'TBA', 2, 175, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(171, 'GLICLAZIDE 60MG', 'TBA', 4.5, 166.67, 12, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(172, 'GLIMEPERIDE 2MG', 'TBA', 0.91, 559.34, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(173, 'GLIMEPERIDE 4MG', 'TBA', 3.27, 511.06, 20, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(174, 'IBUPROFEN 200MG', 'TBA', 0.11, 1718.18, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(175, 'IBUPROFEN 400MG', 'TBA', 0.59, 577.97, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(176, 'IRBESARTAN 150MG', 'TBA', 3.52, 326.14, 15, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(177, 'IRBESARTAN 300MG', 'TBA', 7.29, 133.2, 17, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(178, 'KETOPROFEN 50MG', 'TBA', 1.23, 306.5, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(179, 'KETOROLAC 10MG', 'TBA', 6.5, 176.92, 18, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(180, 'LAGUNDI 300MG', 'TBA', 0.91, 339.56, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(181, 'LAGUNDI 600MG', 'TBA', 1.83, 337.16, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(182, 'LANZOPRAZOLE 30MG', 'TBA', 18.04, 55.21, 28, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(183, 'LEVITIRACETAM 500MG', 'TBA', 6.45, 55.21, 10, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(184, 'LEVOFLOXACIN 500MG', 'TBA', 3.6, 705.56, 29, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(185, 'LEVOTHYROXINE 50MCG', 'TBA', 1.72, 161.63, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(186, 'LEVOTHYROXINE 100MCG', 'TBA', 4.64, 72.41, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(187, 'LOPERAMIDE 2MG', 'TBA', 0.48, 525, 3, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(188, 'LORATADINE 10MG', 'TBA', 1.04, 573.08, 7, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(189, 'LOSARTAN 50MG', 'TBA', 0.6, 733.33, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(190, 'LOSARTAN 100MG', 'TBA', 1.5, 433.33, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(191, 'METFORMIN 500MG', 'TBA', 0.65, 207.69, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(192, 'METHYLDOPA 250MG', 'TBA', 3.85, 107.79, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(193, 'METHYLPREDNISOLONE 16MG', 'TBA', 6.95, 259.71, 25, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(194, 'METOPROLOL 50MG', 'TBA', 0.55, 263.64, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(195, 'METRONIDAZOLE 500MG', 'TBA', 0.85, 488.24, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(196, 'MONTELUKAST 5MG', 'TBA', 3.52, 169.89, 10, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(197, 'NAPROXEN SODIUM 500MG', 'TBA', 4.2, 90.48, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(198, 'NEBIVOLOL 5MG', 'TBA', 6.77, 461.3, 38, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(199, 'NITROFURANTOIN 100MG', 'TBA', 1.85, 170.27, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(200, 'OFLOXACIN 200MG', 'TBA', 1.8, 344.44, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(201, 'OFLOXACIN 400MG', 'TBA', 2.92, 413.7, 15, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(202, 'OMEPRAZOLE 40MG', 'TBA', 3.45, 247.83, 12, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(203, 'PANTOPRAZOLE 40MG', 'TBA', 3.57, 247.83, 13, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(204, 'PREDNISONE 5MG', 'TBA', 0.54, 176.24, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(205, 'PREDNISONE 20MG', 'TBA', 2.35, 112.77, 5, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(206, 'PREGABALIN 75MG', 'TBA', 2.98, 705.37, 24, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(207, 'REBAMIPIDE 100MG', 'TBA', 14.84, 115.63, 32, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(208, 'RIFAMPICIN 450MG', 'TBA', 7.5, 20, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(209, 'ROSUVASTATIN 10MG', 'TBA', 4.06, 343.35, 18, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(210, 'ROSUVASTATIN 20MG', 'TBA', 2.95, 747.46, 25, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(211, 'SALBUTAMOL 2MG', 'TBA', 0.17, 488.24, 1, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(212, 'SALBUTAMOL 4MG', 'TBA', 0.29, 417.24, 2, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(213, 'SIMVASTATIN 20MG', 'TBA', 0.76, 689.47, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(214, 'SODIUM BICARBONATE 650MG', 'TBA', 0.9, 288.89, 4, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(215, 'SPIRONOLACTONE 25MG', 'TBA', 3.19, 150.78, 8, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(216, 'TELMISARTAN 40MG', 'TBA', 1.93, 366.32, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(217, 'TELMISARTAN 80MG', 'TBA', 4.83, 210.56, 15, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(218, 'TRAMADOL 50MG', 'TBA', 1.02, 488.24, 6, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(219, 'TRANEXAMIC 500MG', 'TBA', 3.82, 240.31, 13, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(220, 'TRIMETAZIDINE 35MG', 'TBA', 2.77, 224.91, 9, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(221, 'URSEODEOXYCHOLIC ACID 250MG', 'TBA', 17.43, 123.75, 39, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(222, 'URSEODEOXYCHOLIC ACID 300MG', 'TBA', 18.43, 127.89, 42, 'Generic', 'medicine', 'applied pharmaceutical dnt/ beta drug'),
(223, 'GREEN CROSS REGULAR 70% 75ML', '', 22.05, 17.91, 26, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(224, 'GREEN CROSS REGULAR 70% 150ML', '', 32.45, 20.18, 39, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(225, 'GREEN CROSS REGULAR 70% 250ML', '', 46.46, 18.38, 55, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(226, 'GREEN CROSS REGULAR 70% 500ML', '', 82.51, 18.77, 98, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(227, 'GREEN CROSS W/ MOISTURIZER 70% 75ML', '', 18.67, 37.21, 26, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(228, 'GREEN CROSS W/ MOISTURIZER 70% 150ML', '', 32.98, 18.25, 39, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(229, 'GREEN CROSS W/ MOISTURIZER 70% 250ML', '', 48.61, 19.32, 58, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(230, 'GREEN CROSS W/ MOISTURIZER 70% 300ML', '', 80.04, 18.69, 95, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(231, 'GREEN CROSS W/ MOISTURIZER 70% 500ML', '', 84.36, 17.35, 99, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(232, 'GREEN CROSS ETHYL ALCOHOL 70% 75ML', '', 21.42, 21.38, 26, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(233, 'GREEN CROSS ETHYL ALCOHOL 70% 150ML', '', 33.79, 18.38, 40, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(234, 'GREEN CROSS ETHYL ALCOHOL 70% 250ML', '', 49.13, 18.05, 58, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(235, 'GREEN CROSS ETHYL ALCOHOL 70% 300ML', '', 80.04, 18.69, 95, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(236, 'GREEN CROSS ETHYL ALCOHOL 70% 500ML', '', 85.6, 15.65, 99, '', 'alcohol', 'RIGHT PRICE CORPORATION'),
(237, 'ACYCLOVIR CREAM 5G', '', 95, 268.42, 350, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(238, 'CALAMINE+ZINC OXIDE 3.5G', '', 34.56, 30.21, 45, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(239, 'CLOBETASOL CREAM 10G', '', 39.5, 264.56, 144, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(240, 'DICLOFENAC GEL 30G', '', 113.4, 120.46, 250, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(241, 'ERYTHROMYCIN 5G', '', 116.84, 62.62, 190, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(242, 'MUPIROCIN OINTMENT 5G', '', 46.2, 257.14, 165, 'Generic', 'creams and ointment', 'applied pharmaceutical dnt/ beta drug'),
(243, 'ALGESIA TABLET ', 'ANTI-INFLAMMATORY', 0, 0, 55, 'Branded', 'medicine', 'UNITED'),
(244, 'ABBOCATH GAUGE #18 ', '', 0, 0, 65, '', 'medical supp', 'Pamilijhan');

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
(4, 'erythromycin500mg', 'Damaged', 1, '0000-00-00', 'read'),
(5, 'erythromycin500mg', 'Damaged', 100, '0000-00-00', 'read'),
(6, 'erythromycin500mg', 'Damaged', 100, '0000-00-00', 'read'),
(7, 'erythromycin500mg', 'Damaged', 123, '0000-00-00', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `training_greetings`
--

CREATE TABLE `training_greetings` (
  `id` int(11) NOT NULL,
  `greetings` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_greetings`
--

INSERT INTO `training_greetings` (`id`, `greetings`) VALUES
(11, 'Hi! Looking for alternatives to a specific medicine? Tell me the name, and I\'ll help!'),
(12, 'Hello! Need an alternative medication? Provide the medicine name, and I\'ll find options for you.'),
(13, 'Greetings! I can recommend alternative medicines. Which medicine are you looking to replace?'),
(14, 'Welcome! Tell me the name of the medicine you\'re seeking an alternative for, and I\'ll check for you.'),
(15, 'Hey there! Need a different medicine? Let me know the current one, and I\'ll suggest alternatives.'),
(16, 'Good day! I\'m here to help you find alternative medications. What\'s the name of the medicine?'),
(17, 'Hi! Want a different medication option? Share the name of the medicine, and I\'ll find alternatives.'),
(18, 'Hello! I can suggest alternative medicines. What medication are you looking to replace?'),
(19, 'Welcome! Let me help you find alternative medicines. Which medicine do you need an alternative for?'),
(20, 'Hi there! Looking for a substitute medication? Tell me the current medicine name, and I\'ll find alternatives.');

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
(1, 'SARIDON'),
(2, '250MG'),
(3, 'NEOZEP'),
(5, '100MG'),
(8, '500MG'),
(9, 'TEST'),
(10, '2MG'),
(11, 'ACETYLCYSTEINE'),
(12, '200MG'),
(14, 'ACYCLOVIR'),
(15, '400MG'),
(16, 'ALLOPURINOL'),
(17, '300MG'),
(18, 'AMBROXOL'),
(19, '30MG'),
(20, '75MG'),
(21, 'AMIODARONE'),
(22, 'AMLODIPINE'),
(23, '10MG'),
(24, 'ATENOLOL'),
(25, '50MG'),
(26, 'ATORVASTATIN'),
(27, '20MG'),
(28, '40MG'),
(29, 'AZITHROMYCIN'),
(30, 'BETAHISTINE'),
(31, '8MG'),
(32, '16MG'),
(33, '24MG'),
(34, 'BUTAMIRATE'),
(35, 'CANDESARTAN'),
(36, 'CAPTOPRIL'),
(37, '25MG'),
(38, 'CARBAMAZEPINE'),
(39, 'CARBOCISTEINE'),
(40, 'CARVIDELOL'),
(41, '6.25MG'),
(42, 'CEFACLOR'),
(43, 'CEFALEXIN'),
(44, 'CEFIXIME'),
(45, 'CEFUROXIME'),
(46, 'CELECOXIB'),
(47, 'CETIRIZINE'),
(48, 'CHLORAMPHENICOL'),
(49, 'CILOSTAZOL'),
(50, ''),
(51, 'CIPROFLOXACIN'),
(52, 'CLINDAMYCIN'),
(53, 'CLONIDINE'),
(54, '75MCG'),
(55, '150MCG'),
(56, 'CLOPIDOGREL'),
(57, 'CO-AMOXICLAV'),
(58, '625MG'),
(59, 'COLCHICINE'),
(60, 'DICECLOFENAC'),
(61, 'DIGOXINE'),
(62, 'DIPHENHYDRAMINE'),
(63, 'DOXYCYLINE'),
(64, 'ERYTHROMYCINE'),
(65, 'ESOMEPRAZOLE'),
(66, 'ETHAMBUTOL'),
(67, 'ETORICOXIB'),
(68, '90MG'),
(69, '120MG'),
(70, 'FEBOXUSTAT'),
(71, 'FUROSEMIDE'),
(72, 'GABAPENTIN'),
(73, 'GLIBENCLAMIDE'),
(74, '5MG'),
(75, 'GLICLAZIDE'),
(76, '60MG'),
(77, 'GLIMEPERIDE'),
(78, '4MG'),
(79, 'IBUPROFEN'),
(80, 'IRBESARTAN'),
(81, '150MG'),
(82, 'KETOPROFEN'),
(83, 'KETOROLAC'),
(84, 'LAGUNDI'),
(85, '600MG'),
(86, 'LANZOPRAZOLE'),
(87, 'LEVITIRACETAM'),
(88, 'LEVOFLOXACIN'),
(89, 'LEVOTHYROXINE'),
(90, '50MCG'),
(91, '100MCG'),
(92, 'LOPERAMIDE'),
(93, 'LORATADINE'),
(94, 'LOSARTAN'),
(95, 'METFORMIN'),
(96, 'METHYLDOPA'),
(97, 'METHYLPREDNISOLONE'),
(98, 'METOPROLOL'),
(99, 'METRONIDAZOLE'),
(100, 'MONTELUKAST'),
(101, 'NAPROXEN'),
(102, 'SODIUM'),
(103, 'NEBIVOLOL'),
(104, 'NITROFURANTOIN'),
(105, 'OFLOXACIN'),
(106, 'OMEPRAZOLE'),
(107, 'PANTOPRAZOLE'),
(108, 'PREDNISONE'),
(109, 'PREGABALIN'),
(110, 'REBAMIPIDE'),
(111, 'RIFAMPICIN'),
(112, '450MG'),
(113, 'ROSUVASTATIN'),
(114, 'SALBUTAMOL'),
(115, 'SIMVASTATIN'),
(116, 'BICARBONATE'),
(117, '650MG'),
(118, 'SPIRONOLACTONE'),
(119, 'TELMISARTAN'),
(120, '80MG'),
(121, 'TRAMADOL'),
(122, 'TRANEXAMIC'),
(123, 'TRIMETAZIDINE'),
(124, '35MG'),
(125, 'URSEODEOXYCHOLIC'),
(126, 'ACID'),
(127, 'ALGESIA'),
(128, 'TABLET');

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
(33, 25, 50, '2024-04-20', '11:50:34', 'Cash', 'frontend1'),
(34, 12, 100, '2024-05-14', '18:26:02', 'Cash', 'frontend1'),
(35, 24, 26, '2024-05-14', '18:27:23', 'Cash', 'frontend1'),
(36, 18, 20, '2024-05-15', '16:20:05', 'Cash', 'frontend1'),
(37, 18, 50, '2024-05-15', '16:55:09', 'Cash', 'frontend1'),
(38, 18, 100, '2024-05-15', '17:42:04', 'Cash', 'frontend2'),
(39, 60, 100, '2024-05-15', '17:50:49', 'Cash', 'frontend2'),
(40, 15, 15, '2024-05-15', '17:52:55', 'Gcash', 'frontend2'),
(41, 18, 20, '2024-05-15', '18:24:06', 'Cash', 'frontend2'),
(42, 12, 12, '2024-05-15', '18:51:49', 'Gcash', 'frontend2');

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
(35, 33, 'biogesic 500mg', 5, 5),
(36, 34, 'SARIDON 250MG', 12, 1),
(37, 35, 'SARIDON 250MG', 12, 2),
(38, 36, 'ACETYLCYSTEINE 200MG', 18, 1),
(39, 37, 'ACETYLCYSTEINE 200MG', 18, 1),
(40, 38, 'ACETYLCYSTEINE 200MG', 18, 1),
(41, 39, 'ACETYLCYSTEINE 200MG', 18, 1),
(42, 39, 'ACYCLOVIR 100MG', 15, 2),
(43, 39, 'ACYCLOVIR 400MG', 12, 1),
(44, 40, 'ACYCLOVIR 100MG', 15, 1),
(45, 41, 'ACETYLCYSTEINE 200MG', 18, 1),
(46, 42, 'ACYCLOVIR 400MG', 12, 1);

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
(49, 'ACETYLCYSTEINE 200MG', 2, '2026-05-15', 'applied pharmaceutical dnt/ beta drug'),
(51, 'ACYCLOVIR 400MG', 2, '2026-05-15', 'applied pharmaceutical dnt/ beta drug'),
(58, 'ACYCLOVIR 100MG', 2, '2026-05-23', 'applied pharmaceutical dnt/ beta drug'),
(59, 'ACETYLCYSTEINE 200MG', 1, '2026-05-23', 'applied pharmaceutical dnt/ beta drug');

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
-- Indexes for table `greet_response`
--
ALTER TABLE `greet_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction_response`
--
ALTER TABLE `instruction_response`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `training_greetings`
--
ALTER TABLE `training_greetings`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `deliver_received`
--
ALTER TABLE `deliver_received`
  MODIFY `post_trans_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `greet_response`
--
ALTER TABLE `greet_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instruction_response`
--
ALTER TABLE `instruction_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

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
-- AUTO_INCREMENT for table `training_greetings`
--
ALTER TABLE `training_greetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `training_items`
--
ALTER TABLE `training_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `training_words`
--
ALTER TABLE `training_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transactions_items`
--
ALTER TABLE `transactions_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

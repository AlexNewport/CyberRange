-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2022 at 10:36 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Search`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `employeeId` int NOT NULL,
  `first` varchar(25) NOT NULL,
  `last` varchar(25) NOT NULL,
  `position` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `salary` int NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`employeeId`, `first`, `last`, `position`, `salary`, `address`) VALUES
(222, 'Ryan', 'Smith', 'Custodial', 60000, '552 Skodborg Drive'),
(223, 'Joanna', 'Marquez', 'Sales', 85000, '3324 State Route 49421'),
(224, 'Destiny', 'Jones', 'Sales', 85000, '104 Dog Street'),
(225, 'Bob', 'Gene', 'Accounting', 80000, '756 Right Avenue'),
(226, 'Silvia', 'Tanner', 'Security', 60000, '492 Oliver Boulevard'),
(227, 'Rod', 'Sipper', 'Managerial', 125000, '222 Tin Court'),
(228, 'Terry', 'Maws', 'CFO', 140000, '834 Mechanic Street'),
(229, 'Andrea', 'White', 'Senior Sales', 95000, '939 Grindle Street'),
(230, 'Anya', 'Katkiska', 'COO', 135000, '226 Pathway Drive'),
(231, 'Nigel', 'Turpin', 'Warehouse', 65000, '930 Indus Street'),
(232, 'Xie', 'Dandan', 'Senior Accounting', 100000, '536 14th Street'),
(233, 'Sam', 'Angle', 'Sales', 80000, '2201 96th Street'),
(234, 'Tiffany', 'Brown', 'Senior Warehouse', 85000, '449 Crab Street'),
(235, 'Stacey', 'Armallo', 'CEO', 155000, '106 Polly Street'),
(236, 'Gordon', 'Stevenson', 'Warehouse', 55000, '133 Trunk Avenue'),
(237, 'Patricia', 'Heinley', 'Quality Assurance', 90000, '259 Michigan Street'),
(238, 'Fred', 'Ritters', 'Warehouse', 70000, '2552 System Road'),
(239, 'Steve', 'Gallows', 'Sales', 80000, '900 Proper Street'),
(240, 'Reggie', 'Daxby', 'Sales', 80000, '832 Waxby Court'),
(241, 'Cao Xingjuan', 'Gene', 'IT Specialist', 120000, '499 Open Road'),
(280, 'Ryan', 'Reynolds', 'Human Resources', 80000, '134 Ink Road');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `orderId` int NOT NULL,
  `productId` int NOT NULL,
  `employeeId` int NOT NULL,
  `clientId` int NOT NULL,
  `date` date NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `totalPrice` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`orderId`, `productId`, `employeeId`, `clientId`, `date`, `quantity`, `totalPrice`) VALUES
(785, 455, 223, 1120, '2022-02-02', 75, '475.00'),
(786, 468, 229, 1178, '2022-02-04', 20, '168.00'),
(787, 467, 240, 1257, '2022-02-07', 80, '263.20'),
(788, 458, 233, 1287, '2022-02-07', 15, '90.00'),
(789, 473, 239, 1251, '2022-02-08', 100, '8950.00'),
(790, 479, 224, 1135, '2022-02-08', 50, '750.00'),
(791, 471, 229, 1121, '2022-02-09', 76, '150.00'),
(792, 458, 229, 1147, '2022-02-09', 145, '900.00'),
(793, 467, 233, 1210, '2022-02-09', 343, '1128.47'),
(794, 469, 239, 1192, '2022-02-10', 262, '3200.00'),
(795, 457, 224, 1130, '2022-02-11', 40, '175.00'),
(796, 471, 229, 1283, '2022-02-11', 54, '113.40'),
(797, 476, 223, 1233, '2022-02-11', 50, '435.00'),
(798, 464, 239, 1174, '2022-02-11', 133, '2451.19'),
(799, 455, 0, 1120, '2022-03-04', 50, '327.50');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `productId` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `stock` int NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `discontinued` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productId`, `name`, `stock`, `price`, `discontinued`) VALUES
(455, 'Bingles', 65, '6.55', 0),
(456, 'Bongles', 155, '12.30', 0),
(457, 'Doodles', 20, '4.65', 0),
(458, 'Jinnies', 70, '6.60', 0),
(459, 'Tingles', 50, '5.35', 0),
(460, 'Reekies', 95, '14.80', 0),
(461, 'Popples', 100, '8.90', 0),
(462, 'Roggles', 40, '17.52', 0),
(463, 'Spitts', 400, '23.45', 0),
(464, 'Touruples', 45, '18.43', 0),
(465, 'Caxes', 80, '12.35', 0),
(466, 'Yistles', 130, '11.74', 0),
(467, 'Lipstins', 175, '3.29', 0),
(468, 'Quelps', 192, '8.40', 0),
(469, 'Ploops', 142, '13.12', 0),
(470, 'Liotles', 550, '43.20', 0),
(471, 'Pizwizzes', 90, '2.10', 0),
(472, 'Nurtebs', 345, '73.40', 0),
(473, 'Miyakiznaks', 30, '94.00', 0),
(474, 'Wentinoes', 64, '53.80', 0),
(475, 'Bertveliens', 705, '17.40', 0),
(476, 'Peuds', 405, '8.70', 0),
(477, 'Underluds', 550, '30.68', 0),
(478, 'Polfers', 240, '24.60', 0),
(479, 'Loopbitskers', 40, '16.20', 0),
(480, 'Yastiffs', 0, '0.00', 1),
(481, 'Lintivs', 0, '0.00', 1),
(482, 'Reyels', 40, '0.00', 0),
(483, 'Polotsks', 850, '0.00', 0),
(484, 'Reprebbles', 55, '0.00', 0),
(485, 'Libniololitas', 152, '0.00', 0),
(486, 'Kilps', 0, '0.00', 1),
(487, 'Paswaps', 95, '0.00', 0),
(488, 'Krinspars', 0, '0.00', 0),
(489, 'Feldrintatins', 659, '0.00', 0),
(490, 'Grubbles', 0, '0.00', 1),
(491, 'Stinshirtins', 120, '0.00', 0),
(492, 'Bungles', 6, '0.00', 0),
(493, 'Witners', 0, '0.00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `orderId_2` (`orderId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `name` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

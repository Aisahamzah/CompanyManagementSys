-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 05:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `znnmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary_monthly` decimal(10,2) NOT NULL,
  `payroll_bonus` decimal(10,2) NOT NULL,
  `date_monthly` date NOT NULL,
  `kwsp_monthly` decimal(12,2) NOT NULL,
  `socso_monthly` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `user_id`, `salary_monthly`, `payroll_bonus`, `date_monthly`, `kwsp_monthly`, `socso_monthly`) VALUES
(1, 5475, '116.00', '0.00', '2019-02-01', '11.00', '12.00'),
(2, 5000, '116.00', '0.00', '2019-02-01', '11.00', '12.00'),
(3, 5077, '116.00', '0.00', '2019-02-01', '11.00', '12.00'),
(4, 5722, '116.00', '0.00', '2019-02-01', '11.00', '12.00'),
(5, 6274, '116.00', '0.00', '2019-02-01', '11.00', '12.00'),
(686, 5000, '112.50', '0.00', '2019-03-21', '13.00', '12.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=687;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

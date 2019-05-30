-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 02:16 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `adminpayroll`
--

CREATE TABLE `adminpayroll` (
  `adminPayroll_id` int(12) NOT NULL,
  `adminPayroll_kwsp` decimal(10,0) NOT NULL,
  `adminPayroll_socso` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminpayroll`
--

INSERT INTO `adminpayroll` (`adminPayroll_id`, `adminPayroll_kwsp`, `adminPayroll_socso`, `user_id`) VALUES
(1, '11', '12', 5475),
(2, '11', '12', 5000),
(3, '11', '12', 5077),
(5, '11', '12', 5722),
(6, '11', '12', 6274);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `claim_id` int(11) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `claim_date` date NOT NULL,
  `claim_desc` varchar(50) NOT NULL,
  `claim_attach` blob NOT NULL,
  `claim_price` double NOT NULL,
  `claim_status` varchar(20) NOT NULL,
  `claim_check` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`claim_id`, `user_id`, `claim_date`, `claim_desc`, `claim_attach`, `claim_price`, `claim_status`, `claim_check`) VALUES
(3, '5000', '2019-03-17', 'perjalanan', '', 30.4, 'new', 'uncheck'),
(4, '5000', '0000-00-00', 'air', 0x312e6a7067, 30, 'new', 'uncheck'),
(5, '5475', '2019-03-13', 'minyak', '', 50, 'new', 'uncheck'),
(6, '6274', '2019-03-03', 'minyak motor', '', 21, 'new', 'uncheck');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `leave_id` int(11) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `leave_startDate` date NOT NULL,
  `leave_endDate` date NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `leave_type_reason` varchar(200) NOT NULL,
  `leave_reason` varchar(50) NOT NULL,
  `leave_status` varchar(50) NOT NULL,
  `leave_check` varchar(20) NOT NULL,
  `leave_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`leave_id`, `user_id`, `leave_startDate`, `leave_endDate`, `leave_type`, `leave_type_reason`, `leave_reason`, `leave_status`, `leave_check`, `leave_message`) VALUES
(57, '6274', '2012-12-12', '2012-12-15', 'Cuti Tahunan', '', 'saje je cuti', 'LULUS', 'check', 'aaaaaaaaaaa'),
(58, '5077', '2019-03-07', '2019-03-09', 'Cuti Tahunan', '', 'nak cuti', 'LULUS', 'check', ''),
(62, '6274', '2019-03-21', '2019-03-22', 'Cuti Sakit', '', 'Sakit', 'LULUS', 'check', ''),
(68, '5475', '2019-03-21', '2019-03-22', 'Cuti Sakit', '', 'demam', 'DALAM PROSES', 'uncheck', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_info`
--

CREATE TABLE `leave_info` (
  `leave_info_id` int(11) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `total_leave` int(11) NOT NULL,
  `leave_remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_info`
--

INSERT INTO `leave_info` (`leave_info_id`, `user_id`, `total_leave`, `leave_remaining`) VALUES
(7, '6274', 16, 15),
(8, '5000', 16, 14),
(9, '5077', 16, 9),
(10, '5722', 16, 16),
(11, '5475', 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `user_id` varchar(12) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`user_id`, `user_password`, `user_position`) VALUES
('1011', '1011', 'boss'),
('1234', '1234', 'admin'),
('5000', '5000', 'staff'),
('5077', '5077', 'staff'),
('5475', '5475', 'staff'),
('5722', '5722', 'staff'),
('6274', '6274', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `med_date` date NOT NULL,
  `med_desc` varchar(50) NOT NULL,
  `med_price` decimal(10,0) NOT NULL,
  `med_attach` varchar(20) NOT NULL,
  `med_status` varchar(20) NOT NULL,
  `med_check` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`med_id`, `user_id`, `med_date`, `med_desc`, `med_price`, `med_attach`, `med_status`, `med_check`) VALUES
(1, 5077, '2019-03-15', 'injured', '20', '', 'new', 'check'),
(2, 5475, '2019-03-19', 'demam', '35', '1.jpg', 'new', 'check'),
(3, 6274, '2019-03-27', 'sakit sgt', '35', '', 'new', 'check'),
(4, 5000, '2019-02-01', 'sakit kaki', '10', '', 'new', 'check');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary_monthly` int(12) NOT NULL,
  `payroll_bonus` decimal(12,0) NOT NULL,
  `date_monthly` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `user_id`, `salary_monthly`, `payroll_bonus`, `date_monthly`) VALUES
(1, 5475, 147, '0', '2019-02-01'),
(2, 5000, 147, '0', '2019-02-01'),
(3, 5077, 147, '0', '2019-02-01'),
(4, 5722, 147, '0', '2019-02-01'),
(5, 6274, 147, '0', '2019-02-01'),
(21, 5475, 116, '0', '2019-01-01'),
(22, 5000, 116, '0', '2019-01-01'),
(23, 5077, 116, '0', '2019-01-01'),
(24, 5722, 116, '0', '2019-01-01'),
(25, 6274, 116, '0', '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(12) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_ic` varchar(50) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phoneNum` varchar(11) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_race` varchar(10) NOT NULL,
  `user_nationality` varchar(10) NOT NULL,
  `user_eContactName` varchar(100) NOT NULL,
  `user_eContactRelationship` varchar(10) NOT NULL,
  `user_eContactNum` varchar(11) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_position` varchar(10) NOT NULL,
  `date_startWork` date NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_ic`, `user_password`, `user_address`, `user_email`, `user_phoneNum`, `user_gender`, `user_status`, `user_race`, `user_nationality`, `user_eContactName`, `user_eContactRelationship`, `user_eContactNum`, `user_type`, `user_position`, `date_startWork`, `salary`) VALUES
('5000', 'Nurul Syafiqa Binti Roslan', '960101235000', '5000', 'No 50 Jalan Remia 6, Taman Kota Jaya, 81900, Kota Tinggi', 'nurulsyafiqaroslan@gmail.com', '0197084034', 'perempuan', 'berkahwin', 'melayu', 'malaysia', 'Roslan bin Khalid', 'Ayah', '0197118267', 'intern', 'staff', '2019-02-25', 150),
('5077', 'Muhammad Hazim bin Md Zulkeflee', '961125235077', '5077', 'No 17 Jalan Pulai 14 Taman Pulai Utama 81300 Johor Bahru Johor', 'hazimjim96@gmail.com', '01127658417', 'lelaki', 'bujang', 'melayu', 'malaysia', 'Md Zulkeflee bin Hj Haron', 'Ayah', '01991919912', 'intern', 'staff', '2019-02-25', 150),
('5475', 'Amir Haikal Bin Abdul Halim', '961101015475', '5475', '35, Jalan Padi Ria 18, Bandar Baru UDA , 81200, Johor Bahru, Johor', 'ameerhaical@gmail.com', '0169250411', 'lelaki', 'bujang', 'melayu', 'malaysia', 'U. Faridah bte U. Abdul Hamid', 'Ibu', '0177836385', 'intern', 'staff', '2019-02-25', 150),
('5722', 'Nuraqila Mazleen binti Abdul Rahim', '960111015722', '5722', '858, Jalan Senai Utama 4/3, Taman Senai Utama, 81400, Senai, Johor', 'aqilamazleen96@gmail.com', '0197778954', 'perempuan', 'bujang', 'melayu', 'malaysia', 'Abdul Rahim bin Hadadek', 'bapa', '0137294653', 'praktikal', 'staff', '2019-02-25', 150),
('6274', 'SITI NUR AISAH BINTI HAMZAH', '960605016274', '6274', 'NO 12 JALAN PUYUH LARKIN JAYA,80350,JOHOR BAHRU JOHOR', 'aisahamzah.ah@gmail.com', '01151902770', 'perempuan', 'bujang', 'melayu', 'malaysian', 'hamzah', 'bapa', '0293398350', 'intern', 'staff', '2019-06-01', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpayroll`
--
ALTER TABLE `adminpayroll`
  ADD PRIMARY KEY (`adminPayroll_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_info`
--
ALTER TABLE `leave_info`
  ADD PRIMARY KEY (`leave_info_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpayroll`
--
ALTER TABLE `adminpayroll`
  MODIFY `adminPayroll_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `leave_info`
--
ALTER TABLE `leave_info`
  MODIFY `leave_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

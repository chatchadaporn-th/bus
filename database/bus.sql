-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_table`
--

CREATE TABLE `bus_table` (
  `bus_id` int(5) NOT NULL COMMENT 'รหัสรถทัวร์',
  `bus_no` varchar(10) NOT NULL COMMENT 'ทะเบียนรถ',
  `bus_type` varchar(50) NOT NULL COMMENT 'ประเภทรถ',
  `bus_status` varchar(10) NOT NULL COMMENT 'สถานะรถ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus_table`
--

INSERT INTO `bus_table` (`bus_id`, `bus_no`, `bus_type`, `bus_status`) VALUES
(1, 'A01', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(2, 'A02', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(3, 'A03', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(4, 'A04', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(5, 'A05', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(6, 'A06', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(7, 'A07', 'Gold Class (VIP) 32 ที่นั่ง', '1'),
(9, 'A08', 'Gold Class (VIP) 32 ที่นั่ง', '1');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `path_id` int(5) NOT NULL COMMENT 'รหัสเส้นทาง',
  `origin` varchar(50) NOT NULL COMMENT 'ต้นทาง',
  `destination` varchar(50) NOT NULL COMMENT 'ปลายทาง',
  `pricepassenger` varchar(10) NOT NULL COMMENT 'ราคาโดยสาร',
  `bus_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`path_id`, `origin`, `destination`, `pricepassenger`, `bus_id`) VALUES
(1, 'ขอนเเก่น', 'มุกดาหาร', '200', 1),
(2, 'ขอนเเก่น', 'กุฉินารายณ์', '100', 2),
(3, 'ขอนเเก่น', 'คำชะอี', '100', 3),
(5, 'มุกดาหาร', 'ขอนเเก่น', '150', 4),
(6, 'กุฉินารายณ์', 'คำชะอี', '100', 5),
(7, 'คำชะอี', 'ขอนเเก่น', '100', 6),
(8, 'ขอนเเก่น', 'บุรีรัมย์', '300', 7),
(10, 'กรุงเทพ', 'ขอนเเก่น', '400', 9);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(5) NOT NULL COMMENT 'ไอดีตารางที่นั่ง',
  `seat_no` varchar(10) NOT NULL COMMENT 'เลขที่นั่ง',
  `reserve_by` varchar(255) NOT NULL COMMENT 'จองโดย',
  `seat_time` varchar(10) NOT NULL COMMENT 'รอบรถที่ของ',
  `seat_date` varchar(20) NOT NULL COMMENT 'วันที่จอง',
  `seat_pathid` varchar(5) NOT NULL COMMENT 'เส้นทางเดินรถ',
  `seat_ticket_run` varchar(5) NOT NULL COMMENT 'รหัสตั่ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_no`, `reserve_by`, `seat_time`, `seat_date`, `seat_pathid`, `seat_ticket_run`) VALUES
(154, 'a1', 'jisoo yaaa', '1', '23/03/2021', '1', '64001'),
(155, 'a2', 'jisoo yaaa', '1', '23/03/2021', '1', '64001'),
(156, 'b1', 'jisoo yaaa', '1', '23/03/2021', '1', '64053'),
(157, 'b2', 'jisoo yaaa', '1', '23/03/2021', '1', '64053'),
(158, 'a3', 'jisoo yaaa', '1', '23/03/2021', '1', '64054'),
(159, 'b4', 'jisoo yaaa', '1', '23/03/2021', '1', '64054'),
(160, 'a1', 'jisoo yaaa', '1', '24/03/2021', '1', '64055'),
(161, 'a2', 'jisoo yaaa', '1', '24/03/2021', '1', '64055'),
(162, 'b1', 'jisoo yaaa', '1', '24/03/2021', '1', '64056'),
(163, 'b2', 'jisoo yaaa', '1', '24/03/2021', '1', '64056'),
(164, 'f2', 'jisoo yaaa', '1', '24/03/2021', '1', '64057'),
(165, 'h1', 'jisoo yaaa', '1', '24/03/2021', '1', '64057'),
(166, 'f4', 'jisoo yaaa', '1', '24/03/2021', '1', '64058'),
(167, 'h2', 'jisoo yaaa', '1', '24/03/2021', '1', '64058');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE `tbl_cancel` (
  `c_id` int(11) NOT NULL,
  `c_ticketid` varchar(5) NOT NULL,
  `c_bank` varchar(100) NOT NULL,
  `c_acc` varchar(20) NOT NULL,
  `c_date` datetime(5) NOT NULL,
  `c_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cancel`
--

INSERT INTO `tbl_cancel` (`c_id`, `c_ticketid`, `c_bank`, `c_acc`, `c_date`, `c_status`) VALUES
(11, '36 ', '', '', '2021-03-09 11:50:23.00000', '2'),
(12, '43 ', '', '', '2021-03-10 00:53:02.00000', '2'),
(13, '42 ', '', '', '2021-03-10 00:54:45.00000', '2'),
(14, '44 ', '', '', '2021-03-10 00:55:47.00000', '2'),
(15, '45 ', '', '', '2021-03-20 14:17:33.00000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(5) NOT NULL,
  `payment_uid` varchar(100) NOT NULL,
  `payment_ticketid` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `bank_transfer` varchar(255) NOT NULL,
  `topup_date` date NOT NULL,
  `time` time NOT NULL,
  `file` text NOT NULL,
  `remark` text NOT NULL,
  `topup_status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_uid`, `payment_ticketid`, `amount`, `bank_transfer`, `topup_date`, `time`, `file`, `remark`, `topup_status`) VALUES
(9, 'jisoo yaaa', '40', 600, '‎กรุงไทย', '2021-03-10', '02:13:00', 'payment/145689213.jpg', '', '3'),
(10, 'jisoo yaaa', '64053', 400, '‎กรุงไทย', '2021-03-23', '19:41:00', 'payment/119069053_1265156657154101_8872996462385434074_n.jpg', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `u_id` int(7) NOT NULL,
  `u_username` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_name` varchar(150) NOT NULL,
  `u_tel` varchar(10) NOT NULL,
  `u_status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_username`, `u_password`, `u_name`, `u_tel`, `u_status`) VALUES
(1, 'root', '123456789', 'jisoo yaaa', '1234567890', '2'),
(2, 'root1', '123456789', 'ewww ewww', '1234567899', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_run`
--

CREATE TABLE `ticket_run` (
  `ticketidt` int(5) NOT NULL,
  `ticketid` varchar(5) NOT NULL,
  `seat_id` varchar(100) NOT NULL,
  `ticket_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `ticketdate` datetime NOT NULL,
  `t_sex` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_run`
--

INSERT INTO `ticket_run` (`ticketidt`, `ticketid`, `seat_id`, `ticket_tel`, `ticketdate`, `t_sex`, `status`) VALUES
(52, '64001', 'jisoo yaaa', '1234567890', '2021-03-23 17:40:17', 'ชาย', '1'),
(53, '64053', 'jisoo yaaa', '1234567890', '2021-03-23 17:40:43', 'หญิง', '3'),
(54, '64054', 'jisoo yaaa', '1234567890', '2021-03-23 17:44:13', 'ชาย', '1'),
(55, '64055', 'jisoo yaaa', '1234567890', '2021-03-24 00:20:15', 'ชาย', '1'),
(56, '64056', 'jisoo yaaa', '1234567890', '2021-03-24 00:20:41', 'หญิง', '1'),
(57, '64057', 'jisoo yaaa', '1234567890', '2021-03-24 00:21:46', 'หญิง', '1'),
(58, '64058', 'jisoo yaaa', '1234567890', '2021-03-24 00:22:00', 'ชาย', '1');

-- --------------------------------------------------------

--
-- Table structure for table `traveling`
--

CREATE TABLE `traveling` (
  `traveling_id` int(5) NOT NULL,
  `traveling_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traveling`
--

INSERT INTO `traveling` (`traveling_id`, `traveling_name`) VALUES
(1, 'ขอนเเก่น'),
(2, 'มุกดาหาร'),
(3, 'กุฉินารายณ์'),
(4, 'คำชะอี'),
(29, 'บุรีรัมย์'),
(30, 'กรุงเทพ'),
(31, 'ขอนเเก่น');

-- --------------------------------------------------------

--
-- Table structure for table `traveling_time`
--

CREATE TABLE `traveling_time` (
  `travelingt_id` int(5) NOT NULL,
  `travelingt_start` time NOT NULL,
  `travelingt_end` time NOT NULL,
  `path_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traveling_time`
--

INSERT INTO `traveling_time` (`travelingt_id`, `travelingt_start`, `travelingt_end`, `path_id`) VALUES
(1, '06:00:00', '09:00:00', 1),
(2, '07:00:00', '10:00:00', 1),
(3, '08:00:00', '11:00:00', 1),
(4, '06:00:00', '09:00:00', 2),
(5, '07:00:00', '10:00:00', 2),
(6, '08:00:00', '11:00:00', 2),
(7, '06:00:00', '09:00:00', 3),
(8, '07:00:00', '10:00:00', 3),
(9, '08:00:00', '11:00:00', 3),
(10, '06:00:00', '09:00:00', 5),
(11, '07:00:00', '10:00:00', 5),
(12, '08:00:00', '11:00:00', 5),
(13, '06:00:00', '09:00:00', 6),
(14, '07:00:00', '10:00:00', 6),
(15, '08:00:00', '11:00:00', 6),
(16, '06:00:00', '09:00:00', 7),
(17, '07:00:00', '10:00:00', 7),
(18, '08:00:00', '11:00:00', 7),
(20, '09:00:00', '12:00:00', 2),
(21, '09:00:00', '12:00:00', 1),
(22, '06:00:00', '10:00:00', 0),
(23, '07:00:00', '11:00:00', 8),
(25, '06:00:00', '13:00:00', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_table`
--
ALTER TABLE `bus_table`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`path_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `ticket_run`
--
ALTER TABLE `ticket_run`
  ADD PRIMARY KEY (`ticketidt`);

--
-- Indexes for table `traveling`
--
ALTER TABLE `traveling`
  ADD PRIMARY KEY (`traveling_id`);

--
-- Indexes for table `traveling_time`
--
ALTER TABLE `traveling_time`
  ADD PRIMARY KEY (`travelingt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_table`
--
ALTER TABLE `bus_table`
  MODIFY `bus_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรถทัวร์', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `path_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเส้นทาง', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีตารางที่นั่ง', AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_run`
--
ALTER TABLE `ticket_run`
  MODIFY `ticketidt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `traveling`
--
ALTER TABLE `traveling`
  MODIFY `traveling_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `traveling_time`
--
ALTER TABLE `traveling_time`
  MODIFY `travelingt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

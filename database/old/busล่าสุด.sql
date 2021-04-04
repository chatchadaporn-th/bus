-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 09:42 PM
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
(1, 'A01', 'Gold Class (VIP) 30 ที่นั่ง', '1'),
(2, 'A02', 'Gold Class (VIP) 30 ที่นั่ง', '1'),
(3, 'A03', ' Normal Class 40 ที่นั่ง', '1'),
(4, 'A04', ' Normal Class 40 ที่นั่ง', '1'),
(5, 'A05', ' Normal Class 40 ที่นั่ง', '1'),
(6, 'A06', ' Normal Class 40 ที่นั่ง', '1');

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
(1, 'ขอนเเก่น', 'มุกดาหาร', '150', 1),
(2, 'ขอนเเก่น', 'กุฉินารายณ์', '100', 2),
(3, 'ขอนเเก่น', 'คำชะอี', '100', 3),
(5, 'มุกดาหาร', 'ขอนเเก่น', '150', 4),
(6, 'กุฉินารายณ์', 'คำชะอี', '100', 5),
(7, 'คำชะอี', 'ขอนเเก่น', '100', 6);

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
(84, 'a1', 'เทส', '1', '03/03/2021', '1', '22'),
(85, 'a2', 'เทส', '1', '03/03/2021', '1', '22'),
(86, 'a3', 'เทส', '1', '03/03/2021', '1', '23'),
(87, 'a4', 'เทส', '1', '03/03/2021', '1', '23'),
(88, 'b1', 'แฟรงค์', '1', '03/03/2021', '1', ''),
(89, 'b2', 'แฟรงค์', '1', '03/03/2021', '1', ''),
(90, 'b1', 'เทส', '1', '03/03/2021', '1', '25'),
(91, 'b2', 'เทส', '1', '03/03/2021', '1', '25'),
(92, 'c1', 'เทส', '1', '03/03/2021', '1', '26'),
(93, 'c2', 'เทส', '1', '03/03/2021', '1', '26'),
(94, 'a1', 'เทส', '1', '04/03/2021', '1', '27'),
(95, 'a2', 'เทส', '1', '04/03/2021', '1', '27'),
(104, 'b1', 'jisoo yaaa', '1', '04/03/2021', '1', '32'),
(105, 'b2', 'jisoo yaaa', '1', '04/03/2021', '1', '32'),
(106, 'a3', 'jisoo yaaa', '1', '04/03/2021', '1', '33'),
(107, 'a4', 'jisoo yaaa', '1', '04/03/2021', '1', '33'),
(108, 'a1', 'jisoo yaaa', '2', '05/03/2021', '1', '34'),
(109, 'a2', 'jisoo yaaa', '2', '05/03/2021', '1', '34'),
(110, 'a1', 'jisoo yaaa', '3', '05/03/2021', '1', '35'),
(111, 'a2', 'jisoo yaaa', '3', '05/03/2021', '1', '35');

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
(2, '', '34', 300, '‎กรุงไทย', '2021-03-05', '20:52:00', 'payment/146937677_268430154661376_3301451439787782303_o.jpg', '', '1'),
(3, '', '35', 300, '‎กรุงไทย', '2021-03-05', '20:52:00', 'payment/Untitled-1.jpg', 'test', '1');

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
(1, 'root', '123456789', 'jisoo yaaa', '1234567890', '1'),
(2, 'root1', '123456789', 'ewww ewww', '1234567890', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_run`
--

CREATE TABLE `ticket_run` (
  `ticketid` int(5) NOT NULL,
  `seat_id` varchar(100) NOT NULL,
  `ticket_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `ticketdate` datetime NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_run`
--

INSERT INTO `ticket_run` (`ticketid`, `seat_id`, `ticket_tel`, `ticketdate`, `status`) VALUES
(22, 'เทส', '1234567890', '2021-03-03 01:31:45', '1'),
(23, 'เทส', '1234567890', '2021-03-03 01:32:36', '1'),
(24, 'แฟรงค', '1234567890', '2021-03-03 02:08:21', '1'),
(25, 'เทส', '1234567890', '2021-03-03 05:00:04', '1'),
(26, 'เทส', '1234567890', '2021-03-03 23:42:53', '1'),
(27, 'เทส', '1234567890', '2021-03-04 21:16:53', '1'),
(32, 'jisoo yaaa', '1234567890', '2021-03-04 21:25:25', '1'),
(33, 'jisoo yaaa', '1234567890', '2021-03-04 21:26:41', '1'),
(34, 'jisoo yaaa', '1234567890', '2021-03-05 00:43:55', '2'),
(35, 'jisoo yaaa', '1234567890', '2021-03-05 03:41:01', '2');

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
(4, 'คำชะอี');

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
(19, '09:00:00', '12:00:00', 7);

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
  ADD PRIMARY KEY (`ticketid`);

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
  MODIFY `bus_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรถทัวร์', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `path_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเส้นทาง', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีตารางที่นั่ง', AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_run`
--
ALTER TABLE `ticket_run`
  MODIFY `ticketid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `traveling`
--
ALTER TABLE `traveling`
  MODIFY `traveling_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `traveling_time`
--
ALTER TABLE `traveling_time`
  MODIFY `travelingt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

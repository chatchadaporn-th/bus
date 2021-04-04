-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 04:17 PM
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
(57, 'a1', 'เทส', '1', '25/02/2021', '1', '11'),
(58, 'a2', 'เทส', '1', '25/02/2021', '1', '11'),
(59, 'a2', 'เทส', '2', '25/02/2021', '1', '12'),
(60, 'b2', 'เทส', '2', '25/02/2021', '1', '12'),
(61, 'c3', 'เทส', '2', '25/02/2021', '1', '12'),
(62, 'd4', 'เทส', '2', '25/02/2021', '1', '12'),
(63, 'e2', 'เทส2', '1', '25/02/2021', '1', '13'),
(64, 'f4', 'เทส2', '1', '25/02/2021', '1', '13'),
(65, 'g2', 'เทส2', '1', '25/02/2021', '1', '13'),
(66, 'g3', 'เทส2', '1', '25/02/2021', '1', '13'),
(67, 'c1', 'เทส', '1', '25/02/2021', '1', '14'),
(68, 'c2', 'เทส', '1', '25/02/2021', '1', '14'),
(69, 'a1', 'เทส2', '1', '26/02/2021', '1', '15'),
(70, 'a2', 'เทส2', '1', '26/02/2021', '1', '15');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_run`
--

CREATE TABLE `ticket_run` (
  `ticketid` int(5) NOT NULL,
  `seat_id` varchar(5) NOT NULL,
  `ticket_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `ticketdate` datetime NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_run`
--

INSERT INTO `ticket_run` (`ticketid`, `seat_id`, `ticket_tel`, `ticketdate`, `status`) VALUES
(11, 'เทส', '1234567890', '2021-02-25 16:55:00', '1'),
(12, 'เทส', '1234567890', '2021-02-25 17:01:24', '1'),
(13, 'เทส2', '1234567890', '2021-02-25 17:02:54', '1'),
(14, 'เทส', '1234567890', '2021-02-25 17:04:16', '1'),
(15, 'เทส2', '1234567890', '2021-02-25 17:19:31', '1');

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
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีตารางที่นั่ง', AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `ticket_run`
--
ALTER TABLE `ticket_run`
  MODIFY `ticketid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 03:16 PM
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
(111, 'a2', 'jisoo yaaa', '3', '05/03/2021', '1', '35'),
(112, 'a1', 'เทส', '1', '05/03/2021', '1', '36'),
(113, 'a2', 'เทส', '1', '05/03/2021', '1', '36'),
(114, 'a3', 'เทส', '1', '05/03/2021', '1', '36'),
(115, 'a4', 'เทส', '1', '05/03/2021', '1', '36'),
(116, 'b1', 'jisoo yaaa', '1', '05/03/2021', '1', '37'),
(117, 'b2', 'jisoo yaaa', '1', '05/03/2021', '1', '37'),
(118, 'a1', 'jisoo yaaa', '1', '07/03/2021', '1', '38'),
(119, 'a2', 'jisoo yaaa', '1', '07/03/2021', '1', '38'),
(120, 'a3', 'jisoo yaaa', '1', '07/03/2021', '1', '38'),
(121, 'a4', 'jisoo yaaa', '1', '07/03/2021', '1', '38'),
(122, 'b1', 'jisoo yaaa', '1', '07/03/2021', '1', '39'),
(123, 'b2', 'jisoo yaaa', '1', '07/03/2021', '1', '39'),
(124, 'b3', 'jisoo yaaa', '1', '07/03/2021', '1', '39'),
(125, 'b4', 'jisoo yaaa', '1', '07/03/2021', '1', '39'),
(126, 'a1', 'jisoo yaaa', '1', '09/03/2021', '1', '40'),
(127, 'a2', 'jisoo yaaa', '1', '09/03/2021', '1', '40'),
(128, 'a3', 'jisoo yaaa', '1', '09/03/2021', '1', '40'),
(129, 'a4', 'jisoo yaaa', '1', '09/03/2021', '1', '40'),
(130, 'b1', 'jisoo yaaa', '1', '09/03/2021', '1', '41'),
(131, 'b2', 'jisoo yaaa', '1', '09/03/2021', '1', '42'),
(132, 'c2', 'jisoo yaaa', '1', '09/03/2021', '1', '42'),
(133, 'b3', 'jisoo yaaa', '1', '09/03/2021', '1', '43'),
(134, 'c1', 'jisoo yaaa', '1', '09/03/2021', '1', '43'),
(135, 'a1', 'jisoo yaaa', '1', '10/03/2021', '1', '44'),
(136, 'a2', 'jisoo yaaa', '1', '10/03/2021', '1', '44'),
(137, 'a1', 'jisoo yaaa', '1', '10/03/2021', '1', '45'),
(138, 'a2', 'jisoo yaaa', '1', '10/03/2021', '1', '45'),
(139, 'a1', 'ewww ewww', '1', '20/03/2021', '1', '46'),
(140, 'a2', 'ewww ewww', '1', '20/03/2021', '1', '46'),
(141, 'b2', 'ewww ewww', '1', '20/03/2021', '1', '46'),
(142, 'a1', 'jisoo yaaa', '10', '22/03/2021', '5', '47'),
(143, 'a2', 'jisoo yaaa', '10', '22/03/2021', '5', '47'),
(144, 'a3', 'jisoo yaaa', '10', '22/03/2021', '5', '47'),
(145, 'a4', 'jisoo yaaa', '10', '22/03/2021', '5', '47'),
(146, 'b1', 'jisoo yaaa', '10', '22/03/2021', '5', '48'),
(147, 'b2', 'jisoo yaaa', '10', '22/03/2021', '5', '48');

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
(9, 'jisoo yaaa', '40', 600, '‎กรุงไทย', '2021-03-10', '02:13:00', 'payment/145689213.jpg', '', '3');

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
(34, 'jisoo yaaa', '1234567890', '2021-03-05 00:43:55', '1'),
(35, 'jisoo yaaa', '1234567890', '2021-03-05 03:41:01', '1'),
(36, 'เทส', '1234567890', '2021-03-05 14:23:16', '5'),
(37, 'jisoo yaaa', '1234567890', '2021-03-05 22:38:50', '1'),
(38, 'jisoo yaaa', '1234567890', '2021-03-07 01:52:10', '1'),
(39, 'jisoo yaaa', '1234567890', '2021-03-07 01:52:26', '3'),
(40, 'jisoo yaaa', '1234567890', '2021-03-09 21:50:30', '3'),
(41, 'jisoo yaaa', '1234567890', '2021-03-09 21:52:08', '1'),
(42, 'jisoo yaaa', '1234567890', '2021-03-09 23:22:32', '5'),
(43, 'jisoo yaaa', '1234567890', '2021-03-09 23:22:54', '5'),
(44, 'jisoo yaaa', '1234567890', '2021-03-10 00:55:25', '5'),
(45, 'jisoo yaaa', '1234567890', '2021-03-10 00:56:03', '4'),
(46, 'ewww ewww', '1234567899', '2021-03-20 15:17:05', '1'),
(47, 'jisoo yaaa', '1234567890', '2021-03-22 19:57:10', '1'),
(48, 'jisoo yaaa', '1234567890', '2021-03-22 20:01:06', '1');

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
  MODIFY `seat_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีตารางที่นั่ง', AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_run`
--
ALTER TABLE `ticket_run`
  MODIFY `ticketid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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

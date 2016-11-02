-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 03:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hdts`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `instance` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignee`
--

CREATE TABLE `assignee` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `spoc` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `viewed` int(1) DEFAULT '0',
  `assign_date` date DEFAULT NULL,
  `viewed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(16) NOT NULL,
  `customer_no` int(10) NOT NULL,
  `name` varchar(16) NOT NULL,
  `division` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `thana` varchar(10) NOT NULL,
  `village` varchar(10) NOT NULL,
  `area` varchar(10) NOT NULL,
  `address1` varchar(16) NOT NULL,
  `address2` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `skill_id` int(3) NOT NULL,
  `department` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `skill_id`, `department`) VALUES
(1, 100, 'Operations'),
(2, 101, 'IT & Billing'),
(3, 104, 'Planning & Implementation\n'),
(4, 103, 'Marketing & Sales'),
(5, 777, 'Admin'),
(6, 102, 'System Operation'),
(7, 105, 'Customer Relationship Department'),
(8, 106, 'Procurement'),
(9, 107, 'Finance & Accounts'),
(10, 108, '3G Project'),
(11, 109, 'Regulatory Affair & Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `dept_groups`
--

CREATE TABLE `dept_groups` (
  `id` int(11) NOT NULL,
  `skill_id` varchar(128) NOT NULL,
  `short_name` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_groups`
--

INSERT INTO `dept_groups` (`id`, `skill_id`, `short_name`, `full_name`) VALUES
(1, '110', 'RA&CS', 'Regulatory Affair & Customer Service'),
(2, '101', 'IT&B', 'IT & Billing'),
(3, '102', 'SO', 'System Operation'),
(4, '103', 'M&S', 'Marketing & Sales'),
(5, '104', 'P&I', 'Planning & Implementation'),
(6, '105', 'SO(CTG)', 'System Operation (Chittagong)'),
(7, '106', 'CRM', 'Customer Relationship Department'),
(8, '107', 'Proc', 'Procurement'),
(9, '108', 'F&A', 'Finance & Accounts'),
(10, '109', '3G', '3G Project'),
(11, '201', 'P&I/SO', 'Group: 201'),
(12, '202', 'SO/IT&B', 'Group: 202'),
(13, '203', 'CRM/IT&B\r\n', 'Group: 203'),
(14, '204', 'M&S(VAS)/IT&B\r\n', 'Group: 204');

-- --------------------------------------------------------

--
-- Table structure for table `form1`
--

CREATE TABLE `form1` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(128) DEFAULT NULL,
  `district` varchar(128) DEFAULT NULL,
  `division` varchar(128) DEFAULT NULL,
  `thana` varchar(128) DEFAULT NULL,
  `loc` varchar(128) DEFAULT NULL,
  `problem` text,
  `set_m` varchar(128) DEFAULT NULL,
  `error_m` text,
  `alt_m` varchar(128) DEFAULT NULL,
  `3g_pac` varchar(128) DEFAULT NULL,
  `b_msisdn` varchar(128) DEFAULT NULL,
  `other_set` varchar(128) DEFAULT NULL,
  `signal_str` varchar(128) DEFAULT NULL,
  `top` varchar(128) DEFAULT NULL,
  `spec_time` varchar(128) DEFAULT NULL,
  `isd_no` varchar(128) DEFAULT NULL,
  `gprs_pack` varchar(128) DEFAULT NULL,
  `prob_duration` varchar(128) DEFAULT NULL,
  `vas` varchar(128) DEFAULT NULL,
  `cust_veri` varchar(128) DEFAULT NULL,
  `shortcode` varchar(128) DEFAULT NULL,
  `alt_name` varchar(128) DEFAULT NULL,
  `current_package` varchar(128) DEFAULT NULL,
  `req_fnf` varchar(128) DEFAULT NULL,
  `fnf_add_date` date DEFAULT NULL,
  `desired_pack` varchar(128) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `desired_fnf` varchar(128) DEFAULT NULL,
  `agent_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form2`
--

CREATE TABLE `form2` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(128) NOT NULL,
  `amount` varchar(128) DEFAULT NULL,
  `fnf` varchar(128) DEFAULT NULL,
  `fnf_d` varchar(128) DEFAULT NULL,
  `overc_p` varchar(128) DEFAULT NULL,
  `prob` text,
  `eleg_offer` varchar(128) DEFAULT NULL,
  `alt_no` varchar(128) DEFAULT NULL,
  `bon_date` date DEFAULT NULL,
  `agent_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form3`
--

CREATE TABLE `form3` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(128) NOT NULL,
  `address` text,
  `req_bill_month` varchar(128) DEFAULT NULL,
  `mod_address` text,
  `alt_no` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `call_date` date DEFAULT NULL,
  `prob` text,
  `current_bill` varchar(128) DEFAULT NULL,
  `msisdn` varchar(128) DEFAULT NULL,
  `agent_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form4`
--

CREATE TABLE `form4` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(128) NOT NULL,
  `recharge_method` varchar(128) DEFAULT NULL,
  `card_serial` varchar(128) DEFAULT NULL,
  `prob_duration` varchar(128) DEFAULT NULL,
  `error_m` varchar(128) DEFAULT NULL,
  `loc` varchar(128) DEFAULT NULL,
  `prob` varchar(128) DEFAULT NULL,
  `date_tried` date DEFAULT NULL,
  `paid_amount` varchar(128) DEFAULT NULL,
  `dis_amount` varchar(128) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(128) DEFAULT NULL,
  `alt_no` varchar(128) DEFAULT NULL,
  `agent_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_201`
--

CREATE TABLE `g_201` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `unit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_202`
--

CREATE TABLE `g_202` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `unit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_203`
--

CREATE TABLE `g_203` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `unit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_204`
--

CREATE TABLE `g_204` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `unit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(16) NOT NULL,
  `master_name` varchar(32) NOT NULL,
  `ms_code` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `master_name`, `ms_code`) VALUES
(1, '3G Related Complaint', 2),
(2, 'BILL ADJUSTMENTS', 3),
(3, 'BILL RECEIVING COMPLAINTS', 4),
(4, 'Credit control related complain', 5),
(5, 'GENERAL COMPLAINT', 6),
(6, 'NETWORK COMPLAINT', 7),
(7, 'Payment related', 8),
(9, 'SERVICE RELATED COMPLAINT', 9),
(10, 'Distributor/Retailer/Sales Man C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `skill_id` int(3) NOT NULL,
  `subject` varchar(512) DEFAULT NULL,
  `message` text,
  `username` varchar(32) NOT NULL,
  `instance` varchar(32) NOT NULL,
  `time` date NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0',
  `viewed_by` varchar(32) NOT NULL DEFAULT 'None',
  `viewed_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(128) NOT NULL,
  `progress` int(3) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `ticket_id`, `progress`, `date`, `username`) VALUES
(1, '201512111449825140158', 19, '2015-12-11 23:17:45', 'spocit'),
(2, '20160405145985043831', 10, '2016-04-07 11:21:28', 'admin'),
(3, '201611021478096553207', 12, '2016-11-02 20:23:46', 'admin'),
(4, '201611021478096553207', 50, '2016-11-02 20:38:14', 'spocPI'),
(5, '201611021478096553207', 100, '2016-11-02 20:44:04', 'spocPI');

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
  `id` int(16) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `skill_id` varchar(8) NOT NULL,
  `prob_desc` text NOT NULL,
  `solution` text NOT NULL,
  `time_count` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slave_slave`
--

CREATE TABLE `slave_slave` (
  `id` int(8) NOT NULL,
  `ms_code` int(8) NOT NULL,
  `ss_name` varchar(128) NOT NULL,
  `ss_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slave_slave`
--

INSERT INTO `slave_slave` (`id`, `ms_code`, `ss_name`, `ss_code`) VALUES
(1, 1, 'Distributor/Retailer/Sales Man Complaint\n', 103),
(2, 2, '3G Package Activation Complaint', 202),
(3, 2, '3G Package Deactivation Complaint', 101),
(4, 2, '3G Service Not working Complaint\n', 201),
(5, 3, 'FnF Overchaged', 101),
(6, 3, 'Payment not posted', 102),
(9, 3, 'Refill/Recharge Bonus\r\n', 101),
(10, 3, 'FINANCIAL ADJUSTMENTS\r\n', 203),
(11, 4, 'BILL NOT RECEIVED VIA POST\n', 101),
(12, 4, 'BILL NOT RECEIVED VIA EMAIL\r\n', 101),
(13, 5, 'OGBAR Complain\r\n', 101),
(14, 6, 'ECHO COMPLAINT\r\n', 101),
(15, 6, 'Call Drop Complaint\r\n', 101),
(16, 6, 'Outgoing Call Complaint\r\n', 101),
(17, 6, 'SMS Incoming Complaint\r\n', 101),
(18, 6, 'SMS Outgoing Complaint\r\n', 101),
(19, 6, 'Incoming Complaint\r\n', 101),
(20, 6, 'Signal Complaint\r\n', 101),
(21, 6, 'ISD Incoming Complaint\r\n', 101),
(22, 6, 'Non Coverage Area\r\n', 101),
(24, 7, 'Unable to Recharge Account\r\n', 102),
(25, 7, 'Payment not posted\r\n', 102),
(26, 8, 'Unable to divert/forward calls\r\n', 103),
(27, 8, 'Unable to Use GPRS\r\n', 103),
(28, 8, 'VAS Activation Complaint\r\n', 103),
(29, 8, 'VAS Deactivation Complaint\r\n', 103),
(30, 8, 'VAS Not Working Complaint\r\n', 103),
(31, 8, 'Delete FNFS\r\n', 103),
(32, 8, 'Postpaid Package plan change complaints\r\n', 103),
(33, 8, 'Prepaid Package plan change complaints\r\n', 103),
(34, 8, 'ADD FNFS\r\n', 103),
(35, 2, 'Other Adjustment Issue', 101);

-- --------------------------------------------------------

--
-- Table structure for table `sys_log`
--

CREATE TABLE `sys_log` (
  `id` int(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `logintime` datetime DEFAULT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(16) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `complain_channel` varchar(32) NOT NULL,
  `skill_id` varchar(8) NOT NULL,
  `start_date` datetime NOT NULL,
  `close_date` datetime DEFAULT NULL,
  `customer_no` varchar(20) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `prob_desc` text,
  `deadline` date DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `agent_id` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `complain_channel`, `skill_id`, `start_date`, `close_date`, `customer_no`, `subject`, `prob_desc`, `deadline`, `status`, `agent_id`) VALUES
(2, '201611021478096553207', '', '104', '2016-11-02 20:22:33', '2016-11-02 20:44:10', '01534653592', '3G RELATED COMPLAIN | 3G SERVICE NOT WORKING', NULL, NULL, 2, 'agent007');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` int(16) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `comment` text,
  `date` date NOT NULL,
  `username` varchar(128) NOT NULL,
  `est_close_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `ticket_id`, `comment`, `date`, `username`, `est_close_time`) VALUES
(1, '201611021478096553207', 'test', '2016-11-02', 'spocPI', NULL),
(2, '201611021478096553207', 'test', '2016-11-02', 'spocPI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `user_email` varchar(128) DEFAULT 'N/A',
  `phone` int(11) NOT NULL,
  `password` varchar(16) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `skill_id` varchar(8) NOT NULL,
  `unit` int(1) NOT NULL DEFAULT '0',
  `department` varchar(32) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_email`, `phone`, `password`, `full_name`, `skill_id`, `unit`, `department`) VALUES
(69, 'admin', 'info@teletalkbd.com', 1678665049, '123456', 'Admin', '', 1, 'N/A'),
(123, 'chapuadevil', 'N/A', 1534653592, '123456', 'Admin', '', 1, 'N/A'),
(127, 'spocOP', 'spocOP@operation.com', 1534653592, '123456', 'James Bond', '100', 2, 'N/A'),
(128, 'spocIT', 'spocIT@it.com', 1534653592, '123456', 'James Bond', '101', 2, 'N/A'),
(129, 'agent007', 'agent007@teletalk.com.bd', 1534653592, '123456', 'James Bond', '100', 0, 'N/A'),
(130, 'spocPI', 'spocPI@teletalk.com.bd', 1534653592, '123456', 'James Bond', '104', 2, 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignee`
--
ALTER TABLE `assignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_groups`
--
ALTER TABLE `dept_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form1`
--
ALTER TABLE `form1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form2`
--
ALTER TABLE `form2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `form3`
--
ALTER TABLE `form3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `form4`
--
ALTER TABLE `form4`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `g_201`
--
ALTER TABLE `g_201`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_202`
--
ALTER TABLE `g_202`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_203`
--
ALTER TABLE `g_203`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_204`
--
ALTER TABLE `g_204`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resolution`
--
ALTER TABLE `resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slave_slave`
--
ALTER TABLE `slave_slave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_log`
--
ALTER TABLE `sys_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignee`
--
ALTER TABLE `assignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dept_groups`
--
ALTER TABLE `dept_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `form1`
--
ALTER TABLE `form1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form3`
--
ALTER TABLE `form3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form4`
--
ALTER TABLE `form4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_201`
--
ALTER TABLE `g_201`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_202`
--
ALTER TABLE `g_202`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_203`
--
ALTER TABLE `g_203`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_204`
--
ALTER TABLE `g_204`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resolution`
--
ALTER TABLE `resolution`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slave_slave`
--
ALTER TABLE `slave_slave`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sys_log`
--
ALTER TABLE `sys_log`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

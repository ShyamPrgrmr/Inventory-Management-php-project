-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2019 at 05:03 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.3.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Nov 02, 2019 at 04:57 PM
--

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `admin`:
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('admin', 'Pass@123');

-- --------------------------------------------------------

--
-- Table structure for table `allocation_helper`
--
-- Creation: Oct 31, 2019 at 12:00 PM
--

CREATE TABLE `allocation_helper` (
  `iid` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `allocation_helper`:
--   `iid`
--       `item` -> `iid`
--

--
-- Dumping data for table `allocation_helper`
--

INSERT INTO `allocation_helper` (`iid`, `qty`) VALUES
('Item-0', 200),
('Item-1', 100),
('Item-2', 0),
('Item-3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delete-help`
--
-- Creation: Oct 16, 2019 at 12:14 PM
--

CREATE TABLE `delete-help` (
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `delete-help`:
--

-- --------------------------------------------------------

--
-- Table structure for table `deletehelp`
--
-- Creation: Oct 16, 2019 at 12:45 PM
--

CREATE TABLE `deletehelp` (
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `deletehelp`:
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--
-- Creation: Oct 06, 2019 at 08:10 AM
--

CREATE TABLE `department` (
  `did` varchar(100) NOT NULL,
  `d_name` varchar(250) NOT NULL,
  `d_type` varchar(100) NOT NULL,
  `d_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `department`:
--

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `d_name`, `d_type`, `d_number`) VALUES
('DEPT - 0', 'Production', 'Steel casting', 70),
('DEPT - 1', 'Production', 'Steel melting', 45),
('DEPT - 2', 'Machine ilu.', 'Casting', 45),
('DEPT - 3', 'Steel cast', 'Steel work', 78);

-- --------------------------------------------------------

--
-- Table structure for table `dept_head`
--
-- Creation: Oct 24, 2019 at 05:43 AM
--

CREATE TABLE `dept_head` (
  `did` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `dept_head`:
--   `did`
--       `department` -> `did`
--

--
-- Dumping data for table `dept_head`
--

INSERT INTO `dept_head` (`did`, `uid`) VALUES
('DEPT - 3', 'USER-3'),
('DEPT - 0', 'USER-0'),
('DEPT - 1', 'U'),
('DEPT - 2', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `indent`
--
-- Creation: Oct 22, 2019 at 12:35 PM
--

CREATE TABLE `indent` (
  `inid` varchar(50) NOT NULL,
  `iid` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `did` varchar(50) NOT NULL,
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `indent`:
--   `uid`
--       `user` -> `uid`
--   `did`
--       `department` -> `did`
--   `iid`
--       `item` -> `iid`
--

--
-- Dumping data for table `indent`
--

INSERT INTO `indent` (`inid`, `iid`, `uid`, `did`, `qty`) VALUES
('INDENT-0', 'Item-1', 'USER-0', 'DEPT - 0', 78),
('INDENT-1', 'Item-1', 'USER-2', 'DEPT - 0', 45),
('INDENT-2', 'Item-1', 'USER-2', 'DEPT - 0', 45);

-- --------------------------------------------------------

--
-- Table structure for table `indent_helper`
--
-- Creation: Oct 22, 2019 at 02:04 PM
--

CREATE TABLE `indent_helper` (
  `inid` varchar(50) NOT NULL,
  `r_date` date NOT NULL,
  `e_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `indent_helper`:
--   `inid`
--       `indent` -> `inid`
--

--
-- Dumping data for table `indent_helper`
--

INSERT INTO `indent_helper` (`inid`, `r_date`, `e_date`) VALUES
('INDENT-0', '2019-10-24', '2019-11-08'),
('INDENT-1', '2019-10-25', '2019-11-09'),
('INDENT-2', '2019-10-31', '2019-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `indent_reason`
--
-- Creation: Oct 24, 2019 at 01:39 PM
--

CREATE TABLE `indent_reason` (
  `inid` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `indent_reason`:
--   `inid`
--       `indent` -> `inid`
--

--
-- Dumping data for table `indent_reason`
--

INSERT INTO `indent_reason` (`inid`, `reason`) VALUES
('INDENT-0', 'Not  having stock.'),
('INDENT-1', 'Not having stock.'),
('INDENT-2', 'Out of stock!');

-- --------------------------------------------------------

--
-- Table structure for table `indent_status`
--
-- Creation: Oct 22, 2019 at 02:06 PM
--

CREATE TABLE `indent_status` (
  `inid` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `indent_status`:
--   `inid`
--       `indent` -> `inid`
--

--
-- Dumping data for table `indent_status`
--

INSERT INTO `indent_status` (`inid`, `status`) VALUES
('INDENT-0', '1'),
('INDENT-1', '3'),
('INDENT-2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--
-- Creation: Oct 15, 2019 at 01:34 PM
--

CREATE TABLE `item` (
  `iid` varchar(50) NOT NULL,
  `i_name` varchar(70) NOT NULL,
  `i_desc` varchar(255) DEFAULT NULL,
  `i_manu` varchar(50) NOT NULL,
  `i_dom` date NOT NULL,
  `i_doe` date NOT NULL,
  `i_state` varchar(10) NOT NULL,
  `i_hazard` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `item`:
--

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `i_name`, `i_desc`, `i_manu`, `i_dom`, `i_doe`, `i_state`, `i_hazard`) VALUES
('Item-0', 'Steel pipe', 'Steel pipe used in industries.', 'Kolpe Steel PVT. LTD.', '2019-10-17', '2019-10-07', 'solid', 'No hazards. use gloves while using it.'),
('Item-1', 'Steel rods ', 'Use in production.', 'SS steel PVT. LTD.', '2019-10-16', '2019-10-08', 'solid', 'no hazard.'),
('Item-2', 'Iron balls', 'Used in machines.', 'KL. Steel. PVT. LTD.', '2019-10-01', '2019-10-14', 'solid', 'No Hazards.'),
('Item-3', 'Steel pipe', 'production', 'lk.', '2019-10-10', '2019-10-06', 'solid', 'no hazard');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--
-- Creation: Oct 20, 2019 at 02:13 PM
--

CREATE TABLE `login_user` (
  `uid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `login_user`:
--

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`uid`, `password`, `confirm`) VALUES
('USER-0', 'Shyam123@@', 2),
('USER-1', 'USER-1', 1),
('USER-2', 'Shyam123@@', 2),
('USER-3', 'Shyam123@@', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--
-- Creation: Oct 07, 2019 at 04:12 PM
--

CREATE TABLE `rack` (
  `rid` varchar(14) NOT NULL,
  `wid` varchar(14) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_capacity` int(11) NOT NULL,
  `r_material` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `rack`:
--

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rid`, `wid`, `r_name`, `r_capacity`, `r_material`) VALUES
('RA-0', 'WARE-0', 'steel gage', 1200, 'solid'),
('RA-1', 'WARE-2', 'steel material', 1500, 'solid'),
('RA-2', 'WARE-2', 'steel pipe', 4500, 'liquid'),
('RA-3', 'WARE-1', 'Steel material', 1100, 'solid'),
('RA-4', 'WARE-1', 'any material', 400, 'solid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Oct 13, 2019 at 01:31 PM
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `did` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user`:
--   `did`
--       `department` -> `did`
--   `did`
--       `department` -> `did`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `did`, `fname`, `lname`, `gender`, `dob`, `doj`, `mobile`, `city`, `state`, `zip`) VALUES
('USER-0', 'DEPT - 0', 'Shyam', 'Pradhan', 'male', '2000-03-08', '2020-10-22', '8793127023', 'Amravati', 'Maharashtra', '444601'),
('USER-1', 'DEPT - 0', 'Ram', 'Pradhan', 'male', '1996-12-12', '2015-05-04', '7387954553', 'Delhi', 'Delhi', '222333'),
('USER-2', 'DEPT - 0', 'Abhinav', 'Shrma', 'male', '2019-10-09', '2019-10-07', '7898564785', 'Killi', 'Maha.', '78787878'),
('USER-3', 'DEPT - 3', 'Shyam', 'Konde', 'male', '2019-10-07', '2019-10-13', '7889546278', 'Amaravati', 'Wa', '778899');

-- --------------------------------------------------------

--
-- Table structure for table `user-management`
--
-- Creation: Oct 13, 2019 at 01:20 PM
--

CREATE TABLE `user-management` (
  `uid` varchar(50) NOT NULL,
  `did` varchar(50) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `joining_date` date NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user-management`:
--

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--
-- Creation: Oct 24, 2019 at 12:03 PM
--

CREATE TABLE `user_type` (
  `uid` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user_type`:
--   `uid`
--       `user` -> `uid`
--

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`uid`, `type`) VALUES
('USER-0', 0),
('USER-1', 1),
('USER-2', 1),
('USER-3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--
-- Creation: Oct 07, 2019 at 01:49 PM
--

CREATE TABLE `warehouse` (
  `wid` varchar(50) NOT NULL,
  `w_name` varchar(50) NOT NULL,
  `w_location` varchar(100) NOT NULL,
  `w_material` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `warehouse`:
--

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`wid`, `w_name`, `w_location`, `w_material`) VALUES
('WARE-0', 'Steel store', 'right side of IT department.', 'solid'),
('WARE-1', 'Steel store', 'left side of IT department.', 'solid'),
('WARE-2', 'Hardware-store', 'left-side', 'all'),
('WARE-3', 'Liquid-gas', 'near front gate', 'liquid');

-- --------------------------------------------------------

--
-- Table structure for table `ware_allocation`
--
-- Creation: Oct 31, 2019 at 11:13 AM
--

CREATE TABLE `ware_allocation` (
  `aid` varchar(50) NOT NULL,
  `wid` varchar(50) NOT NULL,
  `rid` varchar(50) NOT NULL,
  `iid` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `ware_allocation`:
--   `iid`
--       `item` -> `iid`
--   `rid`
--       `rack` -> `rid`
--   `wid`
--       `warehouse` -> `wid`
--

--
-- Dumping data for table `ware_allocation`
--

INSERT INTO `ware_allocation` (`aid`, `wid`, `rid`, `iid`, `qty`) VALUES
('WA-0', 'WARE-1', 'RA-4', 'Item-1', 100),
('WA-1', 'WARE-1', 'RA-3', 'Item-0', 100),
('WA-2', 'WARE-1', 'RA-3', 'Item-0', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation_helper`
--
ALTER TABLE `allocation_helper`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `deletehelp`
--
ALTER TABLE `deletehelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `dept_head`
--
ALTER TABLE `dept_head`
  ADD KEY `did` (`did`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `indent`
--
ALTER TABLE `indent`
  ADD PRIMARY KEY (`inid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `did` (`did`),
  ADD KEY `iid` (`iid`);

--
-- Indexes for table `indent_helper`
--
ALTER TABLE `indent_helper`
  ADD PRIMARY KEY (`inid`);

--
-- Indexes for table `indent_reason`
--
ALTER TABLE `indent_reason`
  ADD PRIMARY KEY (`inid`);

--
-- Indexes for table `indent_status`
--
ALTER TABLE `indent_status`
  ADD PRIMARY KEY (`inid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `user-management`
--
ALTER TABLE `user-management`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `ware_allocation`
--
ALTER TABLE `ware_allocation`
  ADD PRIMARY KEY (`aid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dept_head`
--
ALTER TABLE `dept_head`
  ADD CONSTRAINT `dept_head_ibfk_1` FOREIGN KEY (`did`) REFERENCES `department` (`did`);

--
-- Constraints for table `indent`
--
ALTER TABLE `indent`
  ADD CONSTRAINT `indent_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `indent_ibfk_2` FOREIGN KEY (`did`) REFERENCES `department` (`did`),
  ADD CONSTRAINT `indent_ibfk_3` FOREIGN KEY (`iid`) REFERENCES `item` (`iid`);

--
-- Constraints for table `indent_helper`
--
ALTER TABLE `indent_helper`
  ADD CONSTRAINT `indent_helper_ibfk_1` FOREIGN KEY (`inid`) REFERENCES `indent` (`inid`);

--
-- Constraints for table `indent_status`
--
ALTER TABLE `indent_status`
  ADD CONSTRAINT `indent_status_ibfk_1` FOREIGN KEY (`inid`) REFERENCES `indent` (`inid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`did`) REFERENCES `department` (`did`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

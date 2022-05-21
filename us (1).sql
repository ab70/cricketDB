-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 08:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `us`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin1', 'nurulabrar2369@gmail.com', '$2y$10$hD4pdbFtdOMqIrEiuv6p9eHTjE1fHVtX.mQDBTQtpFtOhrahpbC2e');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `name`) VALUES
(2, 'Bangladesh', 'BAN'),
(3, 'Australia', 'AUS'),
(4, 'England', 'ENG'),
(5, 'India', 'IND'),
(6, 'Pakistan', 'PAK'),
(7, 'South Africa', 'RSA'),
(8, 'New Zealand', 'NZ');

-- --------------------------------------------------------

--
-- Table structure for table `cricket_match`
--

CREATE TABLE `cricket_match` (
  `m_id` int(11) NOT NULL,
  `1st_team` int(11) NOT NULL,
  `1st_team_score` decimal(10,0) NOT NULL,
  `1st_team_wicket` decimal(10,0) NOT NULL,
  `2nd_team` int(11) NOT NULL,
  `2nd_team_score` decimal(10,0) NOT NULL,
  `2nd_team_wicket` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cricket_match`
--

INSERT INTO `cricket_match` (`m_id`, `1st_team`, `1st_team_score`, `1st_team_wicket`, `2nd_team`, `2nd_team_score`, `2nd_team_wicket`, `status`) VALUES
(1, 2, '16', '1', 3, '290', '7', 'live'),
(2, 4, '1', '0', 5, '0', '0', 'live');

-- --------------------------------------------------------

--
-- Table structure for table `match_info`
--

CREATE TABLE `match_info` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `venue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_info`
--

INSERT INTO `match_info` (`id`, `m_id`, `venue`) VALUES
(1, 1, 'Dhaka'),
(2, 2, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `match_official`
--

CREATE TABLE `match_official` (
  `m_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_official`
--

INSERT INTO `match_official` (`m_id`, `u_id`) VALUES
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `m_id`, `p_id`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 6),
(4, 1, 7),
(5, 1, 8),
(6, 1, 9),
(7, 1, 10),
(8, 1, 13),
(9, 1, 14),
(10, 1, 16),
(11, 1, 17),
(12, 1, 18),
(13, 1, 21),
(14, 1, 22),
(15, 1, 23),
(16, 1, 24),
(17, 1, 25),
(18, 1, 26),
(19, 1, 27),
(20, 1, 29),
(21, 1, 30),
(22, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `player_info`
--

CREATE TABLE `player_info` (
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_info`
--

INSERT INTO `player_info` (`p_id`) VALUES
(0),
(0);

-- --------------------------------------------------------

--
-- Table structure for table `player_infos`
--

CREATE TABLE `player_infos` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_infos`
--

INSERT INTO `player_infos` (`p_id`, `p_name`, `position`, `country_id`) VALUES
(1, 'Mashrafi Bin Mortuza', 'Bowler', 2),
(2, 'Babar Azam', 'Batsman', 6),
(3, 'Ashraful ', 'batsman', 2),
(4, 'Tamim Iqbal', 'batsman', 2),
(5, 'Mushfiqur Rahim', 'batsman', 2),
(6, 'Liton Das', 'wicketkeeper', 2),
(7, 'Sakib Al Hasan', 'All Rounder', 2),
(8, 'Mostafizur Rahman', 'Bowler', 2),
(9, 'Rubel Hasan', 'Bowler', 2),
(10, 'Mosaddek Hossain', 'Bowler', 2),
(11, 'Razzak Hossain', 'Bowler', 2),
(12, 'Sohag Gazi', 'Bowler', 2),
(13, 'Mahmudullah', 'Batsman', 2),
(14, 'Nasir Hossain', 'Bowler', 2),
(15, 'Akram Khan', 'Bowler', 2),
(16, 'Taskin Ahmed', 'Bowler', 2),
(17, 'Mominul Haque', 'Batsman', 2),
(18, 'Usman Kwaja', 'Batsman', 3),
(19, 'Ricky Ponting', 'Batsman', 3),
(20, 'Brait Lee', 'Bowler', 3),
(21, 'Shane Watson', 'All Rounder', 3),
(22, 'Adam Zampa', 'Bowler', 3),
(23, 'Criss Lynn', 'Batsman', 3),
(24, 'Mathew Haden', 'wicketkeeper', 3),
(25, 'Johnson', 'Bowler', 3),
(26, 'Steve Smith', 'Batsman', 3),
(27, 'Maxwell', 'All Rounder', 3),
(28, 'Pat Cummins', 'Bowler', 3),
(29, 'Lyon', 'Bowler', 3),
(30, 'Warner', 'Batsman', 3),
(31, 'A Finch', 'Batsman', 3),
(32, 'Head', 'Batsman', 3),
(33, 'Rizwan', 'wicketkeeper', 6),
(34, 'Umar Gul', 'Bowler', 6);

-- --------------------------------------------------------

--
-- Table structure for table `umpire`
--

CREATE TABLE `umpire` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umpire`
--

INSERT INTO `umpire` (`u_id`, `u_name`) VALUES
(1, 'Kumar Dharmasina'),
(2, 'Aleem Dar'),
(3, 'ian Gauld');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `rel6` (`p_id`),
  ADD KEY `rel7` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_name` (`country_name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cricket_match`
--
ALTER TABLE `cricket_match`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `rel4` (`1st_team`),
  ADD KEY `rel5` (`2nd_team`);

--
-- Indexes for table `match_info`
--
ALTER TABLE `match_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_official`
--
ALTER TABLE `match_official`
  ADD KEY `rel10` (`m_id`),
  ADD KEY `rel11` (`u_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_infos`
--
ALTER TABLE `player_infos`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `umpire`
--
ALTER TABLE `umpire`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cricket_match`
--
ALTER TABLE `cricket_match`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `match_info`
--
ALTER TABLE `match_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `player_infos`
--
ALTER TABLE `player_infos`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `umpire`
--
ALTER TABLE `umpire`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

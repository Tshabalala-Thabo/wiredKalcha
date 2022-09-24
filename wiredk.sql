-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40 101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiredk`
--

-- --------------------------------------------------------

--
-- Table structure for table `creded`
--

CREATE TABLE `creded` (
  `id` int(5) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `name`, `email`, `phone`, `message`, `note`, `seen`, `datetime`) VALUES
(10, 'thabo', '47thabo@gmail.com', '07111213', 'test message goes here', 'example message', 0, '2022-09-20 09:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `v_id` int(5) NOT NULL,
  `v_link` varchar(200) NOT NULL,
  `v_index` int(5) NOT NULL,
  `timestmp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `v_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`v_id`, `v_link`, `v_index`, `timestmp`, `v_type`) VALUES
(101, 'aqKGJgZyiHw', 0, '2022-09-15 02:08:52', 'm'),
(102, 'E6tp8DCAJ-0', 0, '2022-09-15 02:08:55', 'm'),
(103, 'jSMZoLjB9JE', 0, '2022-09-15 20:41:01', 'm'),
(111, 's_6UeLx-_c', 0, '0000-00-00 00:00:00', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creded`
--
ALTER TABLE `creded`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

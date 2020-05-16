-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 07:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnwithshohandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `naowas_mail_1`
--

CREATE TABLE `naowas_mail_1` (
  `id` int(11) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `sub` text NOT NULL,
  `message_body` varchar(1000) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `naowas_mail_1`
--

INSERT INTO `naowas_mail_1` (`id`, `email_id`, `sub`, `message_body`, `sent_time`) VALUES
(1, 'morshedbd01@gmail.com', 'Testing form', 'eeeeeeeeeeeeeeeeeeeeee', '2020-04-07 17:12:12'),
(2, 'morshedbd01@gmail.com', 'Please enter a correct email address.', 'Please enter a correct email address.\r\nPlease enter a correct email address.\r\nPlease enter a correct email address.\r\nPlease enter a correct email address.\r\nPlease enter a correct email address.\r\n', '2020-04-07 17:16:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `naowas_mail_1`
--
ALTER TABLE `naowas_mail_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `naowas_mail_1`
--
ALTER TABLE `naowas_mail_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

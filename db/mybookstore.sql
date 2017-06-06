-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2016 at 02:49 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mybookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(100) NOT NULL,
  `admin_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`) VALUES
('admin@gmail.com', '6408326db1aa83c86a1301f11b0d7c12');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `pro_id` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `price` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `conditions` text NOT NULL,
  `description` text NOT NULL,
  `views` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`pro_id`, `user_id`, `title`, `author`, `contact`, `price`, `date`, `category`, `conditions`, `description`, `views`) VALUES
('576425c7c05b5', 'rajattiwari1082@gmail.com', 'C programming', 'Sumita Arora', 9718617223, 2000, '17-06-16 06-31-03 pm', 'Entertainment', 'Average', 'This is sumita arora in average condition', 4),
('57642765117ac', 'rajattiwari1082@gmail.com', 'C programming', 'J.K. Rowling', 9718617223, 2000, '17-06-16 06-37-57 pm', '10th', 'Average', 'This is test', 5),
('5764283ea1a6c', 'rajattiwari1082@gmail.com', 'C programming', 'COreman', 9718617223, 200, '17-06-16 06-41-34 pm', 'ICSE', 'Average', 'This is test', 0),
('57642889d4d0e', 'rajattiwari1082@gmail.com', 'C programming', 'sumita arora', 9718617223, 2000, '17-06-16 06-42-49 pm', '10th', 'Excellent', 'This is test', 0),
('5764637de35ae', 'rajat1@gmail.com', 'DAA', 'Coreman', 8527981742, 500, '17-06-16 10-54-21 pm', 'Competition', 'Poor', 'Hi this is poor conditioned Daa book by coreman', 0),
('578e1c3b9fe8d', 'rajat@gmail.com', 'Harry Potter', 'J.K. Rowling', 8527981742, 2000, '19-07-16 02-25-31 pm', 'ICSE', 'Average', 'jghgjhghjggjhg', 0),
('578f1052245b2', 'rajattiwari1082@gmail.com', 'Harry Potter', 'Sumita Arora', 8527981742, 2000, '20-07-16 07-46-58 am', '10th', 'Average', 'this is test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `pro_id` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` int(7) NOT NULL,
  `file_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pro_id`, `file_name`, `file_size`, `file_type`) VALUES
('578f1052245b2', '0best-six-pack-abs.jpg', 20328, 'image/jpeg'),
('578f1052245b2', '1computer-science-with-c-class-11-400x400-imadgyat9aytsbdx.jpeg', 26607, 'image/jpeg'),
('578f1052245b2', '2cpmp2.jpeg', 99500, 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `mail_id` varchar(50) NOT NULL,
  `from` varchar(100) NOT NULL,
  `too` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`mail_id`, `from`, `too`, `message`, `date`) VALUES
('576d19b4893da', 'rajat@gmail.com', 'rajattiwari1082@gmail.com', 'Hi i wantkghkl;i;hl', '17-06-16 06-42-49 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `pass`, `phone`) VALUES
('Rajat', 'Tiwari', 'rajat12@gmail.com', 'd2ff3b88d34705e01d150c21fa7bde07', 9718617223),
('Rajat', 'Tiwari', 'rajat1@gmail.com', 'd2ff3b88d34705e01d150c21fa7bde07', 9718617223),
('Rajat', 'Tiwari', 'rajat@gmail.com', 'd2ff3b88d34705e01d150c21fa7bde07', 9718617223),
('Rajat', 'Tiwari', 'rajattiwari1082@gmail.com', 'd2ff3b88d34705e01d150c21fa7bde07', 9718617223);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
 ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
 ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

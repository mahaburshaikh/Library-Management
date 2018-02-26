-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 01:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author_name`, `faculty`, `dept`, `dept_id`) VALUES
(3, 'Peripheral', 'Abraham Lincoln', 'CSE', 'EEE', 1),
(5, 'MATH', 'Jordan Linn', 'CSE', 'MATH', 3),
(6, 'Accounting', 'Michel Vow', 'BBA', 'Accounting', 4),
(7, 'Horticulture', 'Jonson Snow', 'Agriculture', 'Horti', 5),
(8, 'Nutration Science', 'Harry Bold', 'NFS', 'Nutro', 6),
(9, 'soil', 'Chris Gayle', 'Land Management', 'Land Management', 7),
(10, 'Cyclon disaster', 'Garry Boult', 'DM', 'Diasaster', 8),
(11, 'Fish care', 'James din', 'Fisheries', 'Fish', 9),
(12, 'jjjjjj', 'fffff', 'CSE', 'EEE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `id` int(11) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`id`, `st_name`, `st_id`, `book_name`, `author_name`) VALUES
(1, 'Sabbir', 1402046, 'BBA', 'Romance'),
(14, 'pp', 88, 'jjjjjj', 'fffff'),
(15, 'md moshiur rahman khan', 1402006, 'Peripheral', 'Abraham Lincoln'),
(16, 'md moshiur rahman khan', 1402006, 'Peripheral', 'Abraham Lincoln'),
(17, 'md moshiur rahman khan', 1402006, 'jjjjjj', 'fffff');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(50) NOT NULL,
  `URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `serial_id` int(11) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_id` int(11) NOT NULL,
  `st_reg` int(11) NOT NULL,
  `st_fac` varchar(50) NOT NULL,
  `st_add` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`serial_id`, `st_name`, `st_id`, `st_reg`, `st_fac`, `st_add`, `username`, `password`) VALUES
(5, 'mahabur rahman', 1402048, 5397, 'cse', 'khulna', 'mahabur', 1234),
(6, 'imam shaikh', 1402077, 5399, 'bam', 'dhaka', 'imam', 3456),
(8, 'mosiur khan', 1402006, 5333, 'cse', 'mymensingh', 'mosiur', 123456),
(9, 'md moshiur rahman khan', 1402006, 5355, 'cse', 'mymensingh', 'moshi', 4567),
(10, 'md moshiur rahman khan', 1402006, 5355, 'cse', 'mymensingh', 'moshi', 4567),
(11, 'jjjjj', 9999, 8888, 'hhhhhhh', 'uhhj', 'uuuu', 7777);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginm`
--

CREATE TABLE `tbl_loginm` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loginm`
--

INSERT INTO `tbl_loginm` (`id`, `username`, `password`) VALUES
(4, 'admin', '422aef83d4d2e2ac30bac88ac4a9f024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`serial_id`);

--
-- Indexes for table `tbl_loginm`
--
ALTER TABLE `tbl_loginm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_loginm`
--
ALTER TABLE `tbl_loginm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

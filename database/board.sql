-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 09:53 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `board`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'd574d4bb40c84861791a694a999cce69', '2018-10-03 17:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'pending',
  `user_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `subject`, `description`, `department`, `date`, `status`, `user_id`) VALUES
(28, 'Metting', 'Staff meting Will be in the board on 2/10/2018 at faculty of science starting from 10:oo am - 12:30 pm', 'staff', '2018-10-03 17:49:53', 'Posted', ''),
(29, 'Exams', 'Exams are about to begin and all students without the examination clearance cards will not be allowed to seat for any examinations', 'Biology', '2018-10-04 06:30:27', 'Posted', '15/U/staff'),
(30, 'Graduations', 'The 2018/2019 graduation will take place at the eastern pitch in the university. Ensure that the graduation fees and clearance is done before the the graduation day reaches.', 'Computer Science', '2018-10-04 06:38:35', 'Posted', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(25) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL DEFAULT '202cb962ac59075b964b07152d234b70'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `surname`, `other_names`, `gender`, `image`, `date`, `password`) VALUES
('15/U/staff', 'Timothy', 'Bukeni', 'Male', 'IMG-20180515-WA0029.jpg', '2018-10-02 16:42:56', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_no` varchar(25) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `department` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL DEFAULT '202cb962ac59075b964b07152d234b70'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `surname`, `other_names`, `gender`, `department`, `contact`, `image`, `date`, `password`) VALUES
('14/U/2038/BIO/PD', 'Kimwera ', 'Deus', 'Male', 'Biology', '256706458216', 'IMG-20180324-WA0039.jpg', '2018-10-04 05:00:28', '202cb962ac59075b964b07152d234b70'),
('14/U/7890/ITD/PD', 'kakete', 'sam', 'Male', 'Computer Science', '256783692219', 'IMG-20180410-WA0017.jpg', '2018-10-04 04:56:48', '202cb962ac59075b964b07152d234b70'),
('15/U/1434/CHEM/PD', 'Mundruk', 'Ivan', 'Femal', 'Chemistry', '256758515015', 'IMG-20180321-WA0068.jpg', '2018-10-04 04:46:55', '202cb962ac59075b964b07152d234b70'),
('15/U/5676/PHY/PD', 'Esomu', 'Elijah', 'Male', 'Physics', '256779007760', 'IMG-20180321-WA0079.jpg', '2018-10-04 04:48:34', '202cb962ac59075b964b07152d234b70'),
('15/U/6769/ITD/PD', 'Kirabo', 'Faith', 'Femal', 'Computer Science', '256782676105', 'IMG-20180410-WA0026.jpg', '2018-10-04 04:50:28', '202cb962ac59075b964b07152d234b70'),
('15/U/8388/ITD/PD', 'Wamula', 'Bashir Saidi', 'Male', 'Computer Science', '256758479763', '674316_need-for-speed-wallpapers_1920x1080_h.jpg', '2018-10-04 04:57:13', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

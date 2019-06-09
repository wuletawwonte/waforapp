-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2019 at 11:21 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 5.6.40-6+ubuntu16.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waforapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnfg`
--

CREATE TABLE `cnfg` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnfg`
--

INSERT INTO `cnfg` (`id`, `name`, `value`) VALUES
(1, 'default_password', '123456'),
(2, 'student_council_amount', '15'),
(3, 'system_name', 'Wachamo Forrum Application'),
(4, 'system_name_short', 'WaForApp');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `did` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`did`, `code`, `name`, `description`, `created`) VALUES
(1, 'CmSc', 'Computer Science', 'Computer Science Studies about how computers operate and solves computer related problem', '2019-06-07 12:59:33'),
(2, 'IT', 'Information Technology', 'IT studies about computer technologies and related things. ', '2019-06-07 13:03:44'),
(3, 'PHY', 'Physics', 'Department of Physics', '2019-06-08 14:20:22'),
(4, 'SW', 'Software Engineering', 'This lsdsldfks ', '2019-06-09 08:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL DEFAULT 'Male',
  `email` varchar(50) NOT NULL,
  `department` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Student',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_number`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `sex`, `email`, `department`, `year`, `user_type`, `created`) VALUES
(1, '', 'Blen', 'Yosef', 'Kebede', 'blen.yosef', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '', 0, 0, 'Administrator', '2019-04-20 10:56:39'),
(2, 'Cmp9833/01', 'Alem', 'Zewdu', 'Zewdalem', 'alem.zewdu', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'alem.zewdu@yahoo.com', 1, 1, 'Student', '2019-06-08 07:57:04'),
(3, 'Cmr8976/03', 'Wuletaw', 'Wonte', 'Mitsa', 'wuletaw.wonte', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'wuletawwonte@yahoo.com', 1, 4, 'Student council', '2019-06-08 08:15:59'),
(4, 'IT0143/04', 'Endale', 'Woldegiorgis', 'Ketema', 'endale.woldegiorgis', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'endishwol@gmail.com', 2, 3, 'Student', '2019-06-08 08:16:32'),
(5, 'IT0023/04', 'Beimnet', 'Desalegn', 'Zeleke', 'beimnet.desalegn', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'bemishaye@yahoo.com', 2, 3, 'Student council', '2019-06-08 08:35:44'),
(6, 'PHY8965/08', 'Tekeste', 'Getnet', 'Enideg', 'tekeste.getnet', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'tekethegreat@yahoo.com', 3, 4, 'Student', '2019-06-08 14:21:15'),
(7, 'SWR002132', 'Eyerusalem', 'Oloba', 'Osake', 'eyerusalem.oloba', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'eyerusalem.oloba@yahoo.com', 4, 2, 'Student council', '2019-06-09 08:03:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnfg`
--
ALTER TABLE `cnfg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnfg`
--
ALTER TABLE `cnfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

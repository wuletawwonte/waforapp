-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2019 at 03:41 PM
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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer_content` text NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_answered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer_content`, `forum_id`, `user_id`, `date_answered`) VALUES
(1, 'What the heck', 1, 6, '2019-06-13 10:04:23'),
(2, 'God is Love indeed', 2, 6, '2019-06-13 10:05:22'),
(3, 'Really Really This is great. ', 2, 0, '2019-06-13 10:11:30'),
(4, '0', 0, 3, '2019-06-14 01:37:40'),
(5, 'What the heck is wrong with you?', 0, 3, '2019-06-14 01:38:48'),
(6, 'Computer science is thteksajf;alkdfj ', 3, 3, '2019-06-14 12:45:37');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `notice_id`, `comment_content`, `commenter_id`, `date_commented`) VALUES
(3, 2, 'what the heck', 2, '2019-06-11 12:21:44'),
(5, 1, 'This is me speaking to myself', 2, '2019-06-11 12:21:44'),
(6, 1, 'This is me speaking again to myself', 2, '2019-06-11 12:21:44'),
(7, 2, 'Good job Wule. Keep writing', 6, '2019-06-11 12:21:44'),
(11, 1, 'Don\'t worry Aliye Ill talk to you. The Notice you wrote is wonderfull. keep posting notices. ', 6, '2019-06-12 17:11:00'),
(13, 2, 'jiokpoki', 6, '2019-06-14 12:36:37');

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
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `fid` int(11) NOT NULL,
  `forum_question` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_asked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`fid`, `forum_question`, `user_id`, `date_asked`) VALUES
(1, 'How Wonderful it is to worship God from the bottom of our hearts?', 6, '2019-06-13 09:25:29'),
(2, 'በሰው ፡ ፍቅር ፡ የወደቀ ፡ እንኳን ፡ ይሰጥ ፡ የለ ፡ ወይ ፡ እራሱን(Betty Tezera)', 3, '2019-06-13 09:25:29'),
(3, 'What is computer science?', 6, '2019-06-14 12:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `nid` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`nid`, `title`, `content`, `status`, `user_id`, `date_posted`) VALUES
(1, 'Dear Customer, your dept is fully covered. ....', 'Many of you might have seen a message in your phone from tele saying \n"Dear Customer, your dept is fully covered. ..." \nHow sweet is it to see this message? I feel so much relief just by seeing this message. Because this message means that after all this payments I finally finished the dept I owe ethio telecom. ', 1, 2, '2019-06-10 09:07:34'),
(2, 'The key to Win a Battle', 'The key to winning a battle was knowing both your enemy and yourself. “If you know yourself but not the enemy, for every victory gained you will also suffer a defeat. If you know neither the enemy nor yourself, you will succumb in every battle.” \n', 1, 3, '2019-06-10 10:55:09');

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
  `avatar` varchar(100) NOT NULL DEFAULT 'avatardefault.png',
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

INSERT INTO `users` (`id`, `id_number`, `first_name`, `middle_name`, `last_name`, `avatar`, `username`, `password`, `sex`, `email`, `department`, `year`, `user_type`, `created`) VALUES
(1, '', 'Blen', 'Yosef', 'Kebede', 'avatardefault.png', 'blen.yosef', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '', 0, 0, 'Administrator', '2019-04-20 10:56:39'),
(2, 'Cmp9833/01', 'Alem', 'Zewdu', 'Zewdalem', 'avatar2.png', 'alem.zewdu', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'alem.zewdu@yahoo.com', 1, 1, 'Student council', '2019-06-08 07:57:04'),
(3, 'Cmr8976/03', 'Wuletaw', 'Wonte', 'Mitsa', 'icon.png', 'wuletaw.wonte', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'wuletawwonte@yahoo.com', 1, 4, 'Student council', '2019-06-08 08:15:59'),
(4, 'IT0143/04', 'Endale', 'Woldegiorgis', 'Ketema', 'avatardefault.png', 'endale.woldegiorgis', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'endishwol@gmail.com', 2, 3, 'Student', '2019-06-08 08:16:32'),
(5, 'IT0023/04', 'Beimnet', 'Desalegn', 'Zeleke', 'avatardefault.png', 'beimnet.desalegn', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'bemishaye@yahoo.com', 2, 3, 'Student council', '2019-06-08 08:35:44'),
(6, 'PHY8965/08', 'Tekeste', 'Getnet', 'Enideg', '45247893_2152860218262103_798568723953745920_n.jpg', 'tekeste.getnet', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'tekethegreat@yahoo.com', 3, 4, 'Student', '2019-06-08 14:21:15'),
(7, 'SWR002132', 'Eyerusalem', 'Oloba', 'Osake', 'avatardefault.png', 'eyerusalem.oloba', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'eyerusalem.oloba@yahoo.com', 4, 2, 'Student', '2019-06-09 08:03:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cnfg`
--
ALTER TABLE `cnfg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`nid`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cnfg`
--
ALTER TABLE `cnfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

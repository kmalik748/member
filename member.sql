-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 10:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `campaign` varchar(500) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `source` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_history`
--

INSERT INTO `donation_history` (`id`, `userID`, `campaign`, `payment_method`, `amount`, `source`, `date`) VALUES
(1, 2, 'Campaign Scheme 2', 'option2', '500.0', 'Friend', '2021-04-12'),
(2, 2, 'Campaign Scheme 3', 'option1', '1111', 'Print Advertisement', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `general` varchar(2) NOT NULL,
  `job` varchar(2) NOT NULL,
  `review` varchar(2) NOT NULL,
  `data` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `user_id`, `general`, `job`, `review`, `data`) VALUES
(1, 2, '0', '0', '0', '0'),
(2, 2, '0', '0', '0', '0'),
(3, 2, '0', '0', '0', '0'),
(4, 2, '', '', '', 'on'),
(5, 2, '', 'on', '', 'on'),
(6, 2, '', 'on', '', 'on'),
(7, 2, 'on', 'on', '', 'on'),
(8, 2, 'on', 'on', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`) VALUES
(2, 'Testing1'),
(3, 'aaaa'),
(4, 'Top level Memebr');

-- --------------------------------------------------------

--
-- Table structure for table `membership_history`
--

CREATE TABLE `membership_history` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `membershipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_history`
--

INSERT INTO `membership_history` (`id`, `userID`, `membershipID`) VALUES
(1, 4, 3),
(2, 8, 2),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `website` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `parentOrganization` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `acronym`, `website`, `email`, `instagram`, `twitter`, `facebook`, `linkedin`, `parentOrganization`, `address`, `phone`, `category_id`) VALUES
(1, 'Ahmed Corp', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', 1),
(2, 'Member365', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', 2),
(3, 'Blue Company Production', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(4, 'B4U', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(5, 'SalesForYou', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(6, 'Dream Big Company', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', 1),
(7, 'Deltashoppe', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(8, 'Side Acadimies', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myselff', 'twitter.com/myselff', 'facebook.com/myselff', 'linkedin.com/myselff', 'Association Plus', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_category`
--

CREATE TABLE `organization_category` (
  `id` int(11) NOT NULL,
  `cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_category`
--

INSERT INTO `organization_category` (`id`, `cat`) VALUES
(1, 'Corporate Membership'),
(2, 'Gold Membership');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `organizationID` int(50) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `salutation` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `password`, `organizationID`, `jobTitle`, `salutation`, `middle_name`, `last_name`, `dob`, `phone`, `gender`, `language`, `address`, `is_admin`) VALUES
(1, 'Kashif Ali', 'kashif@ali.com', 'kashif@ali.com', 0, '', '', '', '', '0000-00-00', '', '', '', '', 1),
(2, 'Test', 'user@new.com', 'kashif@ali.com', 7, 'Helper', 'Ms.', 'd', 'User', '2021-03-30', '031185747893', '-- Select Gender --', '-- Select Language --', '213 Legget Drive Ottawa, Ontario K2K 3B8 Canada', 0),
(3, 'a', 'a@b.c', 'a@b.c', 5, 'Manager', '-- Select --', '', 'c', '2021-04-04', '03118574789', 'Female', 'c', '213 Legget Drive Ottawa, Ontario K2K 3B8 Canada', 0),
(4, 'a', 'a@b.cc', 'a@b.cc', 4, 'Banker', 'Dr.', 'b', 'c', '2021-04-08', '11', 'Male', 'c', '22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_history`
--
ALTER TABLE `membership_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_category`
--
ALTER TABLE `organization_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_history`
--
ALTER TABLE `donation_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `membership_history`
--
ALTER TABLE `membership_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `organization_category`
--
ALTER TABLE `organization_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

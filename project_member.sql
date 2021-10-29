-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 01:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE `adminlogs` (
  `id` int(50) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogs`
--

INSERT INTO `adminlogs` (`id`, `admin_id`, `message`, `date_time`) VALUES
(10, 1, 'Inserted Engagement For UserID # 5 By Admin # 1', '2021-04-27 07:06:21.257622'),
(11, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 17:43:58.920632'),
(12, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 17:54:26.518529'),
(13, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:11:11.427006'),
(14, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:11:24.667764'),
(15, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:13:50.923129'),
(16, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:15:44.811643'),
(17, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:16:46.637179'),
(18, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:20:09.615789'),
(19, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:21:29.304347'),
(20, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:23:54.846672'),
(21, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:24:44.896534'),
(22, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:25:03.469597'),
(23, 1, 'Fax File Uploaded to User ID # 5', '2021-04-28 18:25:41.046746'),
(24, 1, 'File Uploaded to User ID # 5', '2021-04-28 18:57:28.322836'),
(25, 1, 'File Uploaded to User ID # 5', '2021-04-28 18:58:35.975705'),
(26, 1, 'File Uploaded to User ID # 5', '2021-04-28 18:59:31.604887'),
(27, 1, 'File Uploaded to User ID # 5', '2021-04-28 19:00:08.949023');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sender_name` varchar(40) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `name`, `sender_name`, `sender_email`, `title`, `content`, `date_time`) VALUES
(1, 'has', 'asd', 'askd', 'skdas', 'asdoiqjwd', '0000-00-00 00:00:00'),
(2, '1231', 'wqeqwe', 'w12', '21312', 'dwdsdfs', '2021-05-21 16:46:54'),
(3, 'Hello World!', 'Hello World!', 'Hello World!', 'Hello World!', 'Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!', '2021-05-21 17:18:05'),
(4, 'hadas', 'hadas', 'hadas', 'hadas', 'hadashadashadashadashadashadashadas', '2021-05-23 12:22:16'),
(5, 'adas', 'adas', 'adas', 'adas', 'adasadasadasadasadas', '2021-05-23 12:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`) VALUES
(1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `content`) VALUES
(1, 'Testing Certificate', 'Awesome Content inside'),
(2, 'New Certificate', 'For the new contracts.. ');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `name`, `role`, `description`) VALUES
(1, 'Committee 1', '', '    asdfasdfafd                                                                                                                                                                                                      '),
(4, 'Testing Committee', '', '34343434343434'),
(5, 'tessssttt', '', 'Testing Description');

-- --------------------------------------------------------

--
-- Table structure for table `committee_roles`
--

CREATE TABLE `committee_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee_roles`
--

INSERT INTO `committee_roles` (`id`, `role`) VALUES
(7, 'Portfolio Representative'),
(8, 'General Member'),
(9, 'testing'),
(10, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `communication_logs_calls`
--

CREATE TABLE `communication_logs_calls` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `call_date` date NOT NULL,
  `outcome` varchar(100) NOT NULL,
  `notes` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communication_logs_calls`
--

INSERT INTO `communication_logs_calls` (`id`, `user_id`, `call_date`, `outcome`, `notes`) VALUES
(6, 5, '2021-04-27', 'Donation', 'Some notes here');

-- --------------------------------------------------------

--
-- Table structure for table `communication_logs_faxes`
--

CREATE TABLE `communication_logs_faxes` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communication_logs_faxes`
--

INSERT INTO `communication_logs_faxes` (`id`, `user_id`, `date`, `type`) VALUES
(1, 5, '2021-04-14', 'incoming'),
(2, 5, '2021-04-13', 'incoming'),
(3, 5, '2021-04-28', 'outgoing'),
(4, 5, '2021-04-28', 'incoming'),
(5, 5, '2021-04-21', 'incoming'),
(6, 5, '2021-04-28', 'incoming'),
(7, 5, '2021-04-01', 'incoming'),
(8, 5, '2021-04-01', 'incoming'),
(9, 5, '2021-04-14', 'incoming'),
(10, 5, '2021-04-08', 'incoming'),
(11, 5, '2021-04-07', 'incoming'),
(12, 5, '2021-04-15', 'outgoing'),
(13, 5, '2021-04-14', 'outgoing');

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE `directory` (
  `id` int(11) NOT NULL,
  `directory_name` varchar(200) NOT NULL,
  `categories` varchar(200) NOT NULL,
  `classification` varchar(200) NOT NULL,
  `display` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`id`, `directory_name`, `categories`, `classification`, `display`) VALUES
(6, 'My Custom Directory Settings', 'Annual Membership,Gold Membership', 'Member Preferences', 'Public,Member Portal');

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
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
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `catagory` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `badge` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `region` varchar(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `catagory`, `name`, `badge`, `description`, `logo`, `banner`, `start_date`, `end_date`, `address1`, `address2`, `city`, `country`, `region`, `code`, `date_time`) VALUES
(1, 1, 'weqw', 'asdas', 'asdasd', 'el1.tif', 'eb1.jpg', '2311-12-31', '2021-01-31', 'sdasd', 'adasn', 'asdas', 'saasd', '0', '0', '2021-06-12 16:28:42'),
(2, 1, 'asdas', 'dsad', 'asdasdm', 'el2.tif', 'eb2.jpg', '1970-01-01', '1970-01-01', 'qweqwe1', 'dqwewq', 'sdasd', 'asdasd', 'appke', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fundraising`
--

CREATE TABLE `fundraising` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `goal` int(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fundraising`
--

INSERT INTO `fundraising` (`id`, `name`, `description`, `goal`, `startdate`, `enddate`) VALUES
(1, '111222', '34535345', 333, '2021-10-06', '2021-10-22'),
(2, 'New Scheme', 'Description goes here Description goes here Description goes here Description goes here', 500, '2021-10-16', '2021-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `slry_range` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `description`, `city`, `cat`, `type`, `slry_range`) VALUES
(1, '1', '3563636363636', '3', '5', 'Science', 'Full-Time', '500'),
(2, 'Content Writer ', 'Ace Motorsports', 'A content writer is required ', 'LA', 'Management', 'Contract', '350');

-- --------------------------------------------------------

--
-- Table structure for table `lms`
--

CREATE TABLE `lms` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms`
--

INSERT INTO `lms` (`id`, `name`, `content`, `message`, `visible`) VALUES
(1, 'abc1', '222', 'ghi3', 1);

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
-- Table structure for table `member_engagement`
--

CREATE TABLE `member_engagement` (
  `id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `date_now` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_engagement`
--

INSERT INTO `member_engagement` (`id`, `user_id`, `date_now`) VALUES
(1, 5, '2021-04-27'),
(2, 5, '2021-04-27'),
(3, 5, '2021-04-14'),
(4, 5, '2021-04-27'),
(5, 5, '2021-04-27');

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
(2, 'Member365', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', 2),
(3, 'Blue Company Production', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(4, 'B4U', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL),
(6, 'Dream Big Company', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', 1),
(7, 'Deltashoppe', 'Nick Acronym', 'mysite.com', 'acc@site.com', 'isnta.com/myself', 'twitter.com/myself', 'facebook.com/myself', 'linkedin.com/myself', 'Ahmed Complex', 'House # 148 C, Streed 28, New Society, UA', '0418294045491', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `b1` int(4) NOT NULL,
  `b2` int(4) NOT NULL,
  `b3` int(4) NOT NULL,
  `b4` int(4) NOT NULL,
  `b5` int(4) NOT NULL,
  `b6` int(4) NOT NULL,
  `b7` int(4) NOT NULL,
  `b8` int(4) NOT NULL,
  `b9` int(4) NOT NULL,
  `b10` int(4) NOT NULL,
  `b11` int(4) NOT NULL,
  `b12` int(4) NOT NULL,
  `b13` int(4) NOT NULL,
  `b14` int(4) NOT NULL,
  `b15` int(4) NOT NULL,
  `b16` int(4) NOT NULL,
  `b17` int(4) NOT NULL,
  `b18` int(4) NOT NULL,
  `b19` int(4) NOT NULL,
  `b20` int(4) NOT NULL,
  `b21` int(4) NOT NULL,
  `b22` int(4) NOT NULL,
  `b23` int(4) NOT NULL,
  `b24` int(4) NOT NULL,
  `b25` int(4) NOT NULL,
  `b26` int(4) NOT NULL,
  `b27` int(4) NOT NULL,
  `b28` int(4) NOT NULL,
  `b29` int(4) NOT NULL,
  `b30` int(4) NOT NULL,
  `b31` int(4) NOT NULL,
  `b32` int(4) NOT NULL,
  `b33` int(4) NOT NULL,
  `b34` int(4) NOT NULL,
  `b35` int(4) NOT NULL,
  `b36` int(4) NOT NULL,
  `b37` int(4) NOT NULL,
  `b38` int(4) NOT NULL,
  `b39` int(4) NOT NULL,
  `b40` int(4) NOT NULL,
  `uid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `uid`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5),
(9, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 5),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cat` varchar(1000) NOT NULL,
  `m_price` int(10) NOT NULL,
  `nm_price` int(10) NOT NULL,
  `banner` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `cat`, `m_price`, `nm_price`, `banner`) VALUES
(2, '1', '2', 'Drawing and Pastel', 3, 4, '9f644fefa531ef12d7c0e9b5be741606.png'),
(3, 'Car Tyres', 'Brand new car tyres', 'Training', 200, 250, '3d012185bb48fd5582e1163f4a200a45.png');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `Id` int(11) NOT NULL,
  `campaignID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`Id`, `campaignID`, `userID`) VALUES
(1, 3, 0),
(2, 3, 1),
(3, 3, 2),
(4, 4, 1),
(5, 4, 2),
(6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `name`, `cat`, `date1`, `date2`) VALUES
(1, 'Test Survey', 'Events', '2021-10-07', '2021-10-14'),
(2, 'Survey#2', 'Events', '2021-10-23', '2021-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `organizationID` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `salutation` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `password`, `organizationID`, `jobTitle`, `salutation`, `middle_name`, `last_name`, `dob`, `phone`, `gender`, `language`, `address`, `is_admin`) VALUES
(1, 'Kashif Ali', 'kashif@ali.com', 'kashif@ali.com', 2, '', 'Mr.', '', '', '2021-04-14', '', 'Male', 'English', '', 1),
(2, 'Test', 'user@new.com', 'kashif@ali.com', 7, 'Helper', 'Ms.', 'a', 'User', '2021-03-30', '031185747893', 'Male', 'English', '213 Legget Drive Ottawa, Ontario K2K 3B8 Canada', 0),
(5, 'Random', 'random@user.com', 'random', 6, 'Employee', 'M.', 'a', 'user', '3333-03-31', '3333838', 'Male', 'English', 'kadflajdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_files`
--

CREATE TABLE `users_files` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `date_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_files`
--

INSERT INTO `users_files` (`id`, `user_id`, `category`, `filename`, `date_time`) VALUES
(12, 5, 'Simple File', 'Gmail - Fwd_ Keysight Items.pdf', '2021-04-27'),
(13, 5, 'Simple File', 'Final Doc1.docx', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `videolibrary`
--

CREATE TABLE `videolibrary` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `embed` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videolibrary`
--

INSERT INTO `videolibrary` (`id`, `title`, `description`, `cat`, `embed`) VALUES
(1, 'Testing Youtube', 'Testing Video', 'For LMS', 'https://youtu.be/vLycNstjOl4'),
(2, 'Tutorial Video', 'How to use our CMS', 'For LMS', 'https://www.youtube.com/acemotorsports/videoLInk');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `name`, `cat`, `date1`, `date2`) VALUES
(1, 'New Vote', 'Canine Advanced', '2021-10-15', '2021-10-18'),
(2, 'Members Voting (Delayed)', 'Membership', '2021-10-22', '2021-10-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogs`
--
ALTER TABLE `adminlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_roles`
--
ALTER TABLE `committee_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communication_logs_calls`
--
ALTER TABLE `communication_logs_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communication_logs_faxes`
--
ALTER TABLE `communication_logs_faxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory`
--
ALTER TABLE `directory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraising`
--
ALTER TABLE `fundraising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms`
--
ALTER TABLE `lms`
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
-- Indexes for table `member_engagement`
--
ALTER TABLE `member_engagement`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_files`
--
ALTER TABLE `users_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videolibrary`
--
ALTER TABLE `videolibrary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `committee_roles`
--
ALTER TABLE `committee_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `communication_logs_calls`
--
ALTER TABLE `communication_logs_calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `communication_logs_faxes`
--
ALTER TABLE `communication_logs_faxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `directory`
--
ALTER TABLE `directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation_history`
--
ALTER TABLE `donation_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fundraising`
--
ALTER TABLE `fundraising`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lms`
--
ALTER TABLE `lms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `member_engagement`
--
ALTER TABLE `member_engagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `organization_category`
--
ALTER TABLE `organization_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videolibrary`
--
ALTER TABLE `videolibrary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

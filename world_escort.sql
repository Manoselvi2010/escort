-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escort_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ID` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ID`, `content`) VALUES
(1, 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `circle`
--

CREATE TABLE `circle` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `status` enum('discard','pending','blocked','approved') DEFAULT 'pending',
  `is_favourite` enum('no','yes') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle`
--

INSERT INTO `circle` (`id`, `member_id`, `friend_id`, `dated`, `status`, `is_favourite`) VALUES
(1, 3, 6, '2020-01-25 07:20:29', 'pending', 'no'),
(2, 3, 8, '2020-01-25 07:20:32', 'pending', 'yes'),
(3, 8, 1, '2020-01-27 13:25:43', 'pending', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ae1b79005289841082f86d5bba225861', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 1580128145, 'a:4:{s:9:\"user_data\";s:0:\"\";s:8:\"admin_id\";s:1:\"1\";s:10:\"admin_name\";s:5:\"admin\";s:14:\"is_admin_login\";b:1;}'),
('f9c60511e85d01bd69d4f2730e926ac5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 1580128262, 'a:4:{s:9:\"user_data\";s:0:\"\";s:4:\"city\";N;s:20:\"vertification_photos\";s:15:\"51580121848.jpg\";s:8:\"user_rec\";s:4:\"lara\";}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `ID` int(11) NOT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `email_content` text DEFAULT NULL,
  `dated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`ID`, `email_name`, `from_name`, `from_email`, `email_subject`, `email_content`, `dated`) VALUES
(9, 'Account Verification', 'Online Dating', 'info@codeareena.com', 'Email Verification', '<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"http://codeareena.com/online_dating\"><img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\" /></a></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<hr color=\"#CCCCCC\" /></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please click on the given below link to verify the email address.</strong><br />\r\n<a href=\"{SITE_URL}verification/{VERIFICATION_CODE}\">{SITE_URL}verification/{VERIFICATION_CODE}</a></div>', '2016-05-24 14:16:05'),
(10, 'Reset Password', 'Online Dating', 'info@codeareena.com', 'Password Recovery', '<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"{SITE_URL}\"><img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\"></a></div>\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please Click on the given below link to reset your password.</strong><br/>\r\n  <a href=\"{SITE_URL}user/reset/{VERIFICATION_CODE}\">{SITE_URL}user/reset/{VERIFICATION_CODE}</a></div>\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n  <hr color=\"#CCCCCC\">\r\n  <div align=\"center\"><a href=\"{SITE_URL}\">{SITENAME}</a></div>\r\n</div>', '2016-05-24 14:28:19'),
(11, 'Contact Us', '{USER_NAME}', '{USER_EMAIL}', 'Contact Us Form Submitted', '<style type=\"text/css\">.txt {\n	font-size:12px;\n	font-family:Arial, Helvetica, sans-serif;\n	color:#000;\n}\n</style>\n<table border=\"0\" class=\"txt\" width=\"500\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">A contact us form submitted.</td>\n		</tr>\n		<tr>\n			<td width=\"146\">&nbsp;</td>\n			<td width=\"344\">&nbsp;</td>\n		</tr>\n		<tr>\n			<td align=\"right\">First Name:</td>\n			<td>&nbsp;{FIRST_NAME}</td>\n		</tr>\n		<tr>\n			<td align=\"right\">Last Name:</td>\n			<td>&nbsp;{LAST_NAME}</td>\n		</tr>\n		<tr>\n			<td align=\"right\">Email:</td>\n			<td>&nbsp;{EMAIL}</td>\n		</tr>\n		<tr>\n			<td align=\"right\">Comment:</td>\n			<td>&nbsp;{COMMENT}</td>\n		</tr>\n		<tr>\n			<td align=\"right\">&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n	</tbody>\n</table>', '2016-05-24 14:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `image_comments`
--

CREATE TABLE `image_comments` (
  `img_comment_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `relationship_status` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `life_style` varchar(30) DEFAULT NULL,
  `smoking` enum('No','Yes') DEFAULT NULL,
  `drinking` enum('No','Yes') DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `photo` varchar(90) DEFAULT NULL,
  `looking_for` enum('Female','Male') DEFAULT NULL,
  `looking_age_from` varchar(25) DEFAULT NULL,
  `looking_age_to` varchar(30) DEFAULT NULL,
  `looking_marital_status` varchar(25) DEFAULT NULL,
  `looking_country` varchar(50) DEFAULT NULL,
  `looking_state` varchar(40) DEFAULT NULL,
  `looking_city` varchar(50) DEFAULT NULL,
  `sts` enum('blocked','inactive','active') DEFAULT 'inactive',
  `verification_code` varchar(100) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `first_login_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `is_logged_in` tinyint(1) NOT NULL,
  `sexuality` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `additional_number` int(255) NOT NULL,
  `phone_app` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `clothes_size` varchar(255) NOT NULL,
  `appearance` varchar(255) NOT NULL,
  `chest_waist_hips` varchar(255) NOT NULL,
  `breast_size` varchar(255) NOT NULL,
  `breast_type` varchar(255) NOT NULL,
  `hair_color` varchar(255) NOT NULL,
  `eyes_color` varchar(255) NOT NULL,
  `haircut` varchar(255) NOT NULL,
  `smoker` varchar(255) NOT NULL,
  `member_language` varchar(255) NOT NULL,
  `web_site` varchar(255) NOT NULL,
  `one_hour_apartment` int(100) NOT NULL,
  `two_hours_apartment` int(100) NOT NULL,
  `night_apartment` int(100) NOT NULL,
  `in_appartment` int(100) NOT NULL,
  `one_hour_outcall` int(100) NOT NULL,
  `two_hours_outcall` int(100) NOT NULL,
  `night_outcall` int(100) NOT NULL,
  `in_outcall` int(100) NOT NULL,
  `vertification_photos` varchar(255) NOT NULL,
  `verified_user` int(100) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `username`, `password`, `gender`, `dob`, `city`, `state`, `country`, `phone`, `relationship_status`, `marital_status`, `life_style`, `smoking`, `drinking`, `education`, `about_me`, `photo`, `looking_for`, `looking_age_from`, `looking_age_to`, `looking_marital_status`, `looking_country`, `looking_state`, `looking_city`, `sts`, `verification_code`, `dated`, `first_login_date`, `last_login_date`, `is_logged_in`, `sexuality`, `phone_number`, `additional_number`, `phone_app`, `age`, `height`, `weight`, `clothes_size`, `appearance`, `chest_waist_hips`, `breast_size`, `breast_type`, `hair_color`, `eyes_color`, `haircut`, `smoker`, `member_language`, `web_site`, `one_hour_apartment`, `two_hours_apartment`, `night_apartment`, `in_appartment`, `one_hour_outcall`, `two_hours_outcall`, `night_outcall`, `in_outcall`, `vertification_photos`, `verified_user`, `created_by`) VALUES
(1, 'lara', 'lara@gmail.com', 'lara', 'e10adc3949ba59abbe56e057f20f883e', 'Female', NULL, 'delhi', NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lara', '11579855617.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-25 05:43:19', 0, 'Straight', 2147483647, 2147483647, 'Whatsapp', 23, '150', '55', '52', '0', '23', 'A', 'Natural', 'Blonde', 'Gray', 'Shaved', 'Yes', 'Czech,', '25', 10, 10, 10, 1, 10, 10, 10, 1, '11579855618.jpg', 1, ''),
(2, 'watson', 'emmawatson@gmail.com', 'watson', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '1991-01-23', 'delhi', NULL, 'France', NULL, NULL, NULL, NULL, 'Yes', 'Yes', NULL, 'sfsd werisd ad mnbcadvsgdf sdvfsdgvf', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-27 11:56:30', 0, 'Straight', 78975414, 56456498, 'Viber', 27, '162', '58', '45', '0', '44', 'F', 'Natural', 'Black', 'Brown', '', 'No', 'French,', 'www.wqer.com', 45, 75, 85, 1, 45, 75, 85, 1, '', 1, ''),
(3, 'angelina', 'angelina@gmail.com', 'angelina', 'e10adc3949ba59abbe56e057f20f883e', 'Female', NULL, 'delhi', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '31579857781.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-25 06:07:06', 0, 'Straight', 0, 0, '', 0, '', '', '', '0', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '31579857781.jpg', 1, ''),
(4, 'jolie', 'jolie@gmail.com', 'jolie', 'e10adc3949ba59abbe56e057f20f883e', 'Female', NULL, 'mumbai', NULL, 'Kenya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdnfisd weurgiywer bvfcdvfa mkfnog', '41579857741.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-27 11:45:25', 0, 'Straight', 546897416, 216548, 'Whatsapp', 27, '168', '70', '47', '0', '42', 'D', 'Silicone', 'Black', 'Gray', '', 'Yes', 'Czech,', 'www.werwjr.com', 123, 70, 80, 1, 123, 70, 80, 1, '41579857741.jpg', 1, ''),
(5, 'lucifer', 'lucifer@gmail.com', 'lucifer', 'e10adc3949ba59abbe56e057f20f883e', 'Female', NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfsdjfo wierhweyr uhfushf avedyagd bciwfm', '51580121848.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-27 11:37:20', 0, 'Straight', 2147483647, 2345647, 'Viber', 22, '165', '50', '40', '0', '40', 'F', 'Natural', 'Brown', 'Brown', '', 'No', 'Spanish,', 'www.wqerwe.com', 100, 150, 150, 1, 100, 150, 150, 1, '51580121848.jpg', 1, ''),
(6, 'harry', 'harry@gmail.com', 'harry', 'e10adc3949ba59abbe56e057f20f883e', 'Male', NULL, NULL, NULL, 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wuerf mfbhdsf sdhfsdmsfm sdhfbsdhf mdfsdauf', '61580121407.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-27 11:33:08', 0, 'Straight', 2147483647, 146543, 'Facebook Messenger', 24, '167', '73', '45', '0', '127', 'E', 'Natural', 'Other', 'Blue', 'Shaved', 'Yes', 'French,', 'www.trewger.com', 50, 80, 30, 1, 73, 80, 30, 1, '61580121407.jpg', 1, ''),
(7, 'potter', 'potter@gmail.com', 'potter', 'e10adc3949ba59abbe56e057f20f883e', 'Male', NULL, NULL, NULL, 'Newzealand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jdsfsd yuaery zxcjzbj wqyeru bdhbf xzjcbjzxbcyu eyrur dbasbfau uerugewd  zchzder zcvnvngdfg dsbfshfds dsfdsfdsfns', '71580121098.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-24 00:00:00', NULL, '2020-01-27 11:27:32', 0, 'Straight', 2147483647, 1231456, 'Telegram Messenger', 23, '172', '70', '42', '0', '124', 'C', 'Silicone', 'Red', 'Brown', 'Shaved', 'Yes', 'English,', 'www.dtfdsr.com', 140, 170, 200, 1, 140, 170, 200, 1, '71580121098.jpg', 1, ''),
(8, 'kevin', 'kevin@gmail.com', 'kevin', 'e10adc3949ba59abbe56e057f20f883e', 'Male', NULL, NULL, NULL, 'Australia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfgdsfg yioy werqr', '81580120384.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, '2020-01-27 13:19:53', 0, 'Straight', 2147483647, 1237894, 'Viber', 24, '172', '85', '47', '0', '77', 'D', 'Silicone', 'Blonde', 'Green', 'Not shaved', 'Yes', 'Danish,', 'www.tdger.com', 15, 30, 40, 1, 25, 40, 50, 1, '81580120384.jpg', 1, ''),
(9, 'jack', 'jack@gmail.com', 'jack', 'e10adc3949ba59abbe56e057f20f883e', 'Male', NULL, 'paris', NULL, 'England', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pdkfpgdf wrtwet dsfsdaf', '91580120112.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-25 00:00:00', NULL, '2020-01-27 11:11:27', 0, 'Straight', 2147483647, 456478, 'Whatsapp', 25, '170', '75', '45', '0', '78', 'B', 'Natural', 'Brown', 'Gray', 'Partially', 'No', 'Czech,', 'www.tdfger.com', 20, 50, 100, 1, 30, 70, 120, 1, '91580120112.jpg', 1, ''),
(10, 'chan', 'chan@gmail.com', 'chan', 'e10adc3949ba59abbe56e057f20f883e', 'Male', NULL, 'paris', NULL, 'Germany', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rfoidsj sidjfpsdi aygre8', '101580119778.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2020-01-25 00:00:00', NULL, '2020-01-27 12:44:07', 0, 'Straight', 2147483647, 2147483647, 'Whatsapp', 28, '167', '80', '50', '0', '45', 'AA', 'Natural', 'Black', 'Brown', 'Not shaved', 'No', 'German,', 'www.ter.com', 10, 10, 10, 1, 10, 10, 10, 1, '101580119778.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `members_albums`
--

CREATE TABLE `members_albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(30) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_albums`
--

INSERT INTO `members_albums` (`album_id`, `album_name`, `mem_id`, `date_created`) VALUES
(1, '', 10, '2020-01-27 12:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `members_gallery`
--

CREATE TABLE `members_gallery` (
  `image_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `org_photo` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_service`
--

CREATE TABLE `member_service` (
  `member_id` int(100) NOT NULL,
  `member_service_id` int(100) NOT NULL,
  `member_subservice_id` int(100) NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_service`
--

INSERT INTO `member_service` (`member_id`, `member_service_id`, `member_subservice_id`, `created_by`) VALUES
(1, 5, 3, '1579855617'),
(1, 5, 4, '1579855617'),
(1, 5, 5, '1579855617'),
(1, 6, 7, '1579855617'),
(1, 6, 8, '1579855617'),
(1, 7, 13, '1579855617'),
(1, 7, 14, '1579855617'),
(1, 11, 34, '1579855617'),
(1, 11, 35, '1579855617'),
(1, 12, 36, '1579855617'),
(1, 12, 37, '1579855617'),
(1, 16, 46, '1579855617'),
(1, 16, 47, '1579855617'),
(10, 5, 3, '1580119776'),
(10, 5, 4, '1580119776'),
(10, 6, 7, '1580119777'),
(10, 6, 8, '1580119777'),
(10, 7, 13, '1580119777'),
(10, 7, 14, '1580119777'),
(10, 8, 16, '1580119777'),
(10, 8, 17, '1580119777'),
(10, 9, 24, '1580119777'),
(10, 9, 25, '1580119777'),
(10, 10, 32, '1580119777'),
(10, 11, 34, '1580119777'),
(10, 12, 36, '1580119777'),
(10, 13, 38, '1580119777'),
(10, 14, 40, '1580119777'),
(10, 15, 42, '1580119777'),
(10, 16, 44, '1580119777'),
(9, 5, 3, '1580120111'),
(9, 5, 4, '1580120111'),
(9, 5, 5, '1580120111'),
(9, 6, 7, '1580120111'),
(9, 6, 8, '1580120111'),
(9, 7, 13, '1580120111'),
(9, 8, 16, '1580120112'),
(9, 8, 17, '1580120112'),
(9, 9, 24, '1580120112'),
(9, 10, 32, '1580120112'),
(9, 10, 33, '1580120112'),
(9, 11, 34, '1580120112'),
(9, 12, 36, '1580120112'),
(9, 13, 38, '1580120112'),
(9, 14, 40, '1580120112'),
(9, 15, 42, '1580120112'),
(9, 16, 44, '1580120112'),
(8, 5, 5, '1580120383'),
(8, 5, 6, '1580120383'),
(8, 6, 8, '1580120383'),
(8, 6, 10, '1580120383'),
(8, 6, 11, '1580120383'),
(8, 7, 14, '1580120383'),
(8, 7, 15, '1580120383'),
(8, 8, 17, '1580120383'),
(8, 8, 19, '1580120383'),
(8, 9, 27, '1580120383'),
(8, 9, 28, '1580120383'),
(8, 10, 32, '1580120383'),
(8, 11, 34, '1580120383'),
(8, 13, 39, '1580120383'),
(8, 15, 42, '1580120383'),
(8, 16, 45, '1580120383'),
(7, 5, 3, '1580121097'),
(7, 5, 4, '1580121098'),
(7, 6, 7, '1580121098'),
(7, 6, 8, '1580121098'),
(7, 6, 12, '1580121098'),
(7, 7, 15, '1580121098'),
(7, 8, 17, '1580121098'),
(7, 8, 20, '1580121098'),
(7, 9, 25, '1580121098'),
(7, 9, 29, '1580121098'),
(7, 9, 31, '1580121098'),
(7, 10, 32, '1580121098'),
(7, 11, 35, '1580121098'),
(7, 12, 37, '1580121098'),
(7, 13, 39, '1580121098'),
(7, 15, 43, '1580121098'),
(7, 16, 46, '1580121098'),
(6, 5, 3, '1580121406'),
(6, 5, 5, '1580121406'),
(6, 6, 8, '1580121406'),
(6, 6, 10, '1580121406'),
(6, 6, 11, '1580121406'),
(6, 7, 13, '1580121406'),
(6, 7, 15, '1580121406'),
(6, 8, 17, '1580121407'),
(6, 8, 18, '1580121407'),
(6, 8, 22, '1580121407'),
(6, 9, 24, '1580121407'),
(6, 9, 25, '1580121407'),
(6, 9, 26, '1580121407'),
(6, 9, 29, '1580121407'),
(6, 10, 32, '1580121407'),
(6, 11, 35, '1580121407'),
(6, 12, 36, '1580121407'),
(6, 12, 37, '1580121407'),
(6, 13, 38, '1580121407'),
(6, 14, 41, '1580121407'),
(6, 15, 42, '1580121407'),
(6, 15, 43, '1580121407'),
(6, 16, 44, '1580121407'),
(6, 16, 45, '1580121407'),
(6, 16, 46, '1580121407'),
(5, 5, 3, '1580121847'),
(5, 5, 4, '1580121847'),
(5, 6, 7, '1580121847'),
(5, 6, 10, '1580121848'),
(5, 7, 15, '1580121848'),
(5, 8, 17, '1580121848'),
(5, 8, 19, '1580121848'),
(5, 8, 20, '1580121848'),
(5, 9, 25, '1580121848'),
(5, 9, 27, '1580121848'),
(5, 9, 28, '1580121848'),
(5, 10, 32, '1580121848'),
(5, 10, 33, '1580121848'),
(5, 11, 35, '1580121848'),
(5, 12, 36, '1580121848'),
(5, 12, 37, '1580121848'),
(5, 15, 42, '1580121848'),
(5, 15, 43, '1580121848'),
(5, 16, 44, '1580121848'),
(5, 16, 45, '1580121848'),
(4, 5, 3, '1580122073'),
(4, 5, 4, '1580122073'),
(4, 6, 7, '1580122073'),
(4, 6, 8, '1580122074'),
(4, 7, 13, '1580122074'),
(4, 7, 14, '1580122074'),
(4, 7, 15, '1580122074'),
(4, 8, 16, '1580122074'),
(4, 8, 17, '1580122074'),
(4, 9, 24, '1580122074'),
(4, 9, 25, '1580122074'),
(4, 9, 27, '1580122074'),
(4, 10, 33, '1580122074'),
(4, 11, 35, '1580122074'),
(4, 12, 37, '1580122074'),
(4, 13, 39, '1580122074'),
(4, 14, 41, '1580122074'),
(4, 15, 42, '1580122074'),
(4, 16, 45, '1580122074'),
(2, 5, 3, '1580122752'),
(2, 5, 4, '1580122752'),
(2, 5, 5, '1580122752'),
(2, 6, 7, '1580122752'),
(2, 6, 10, '1580122752'),
(2, 6, 11, '1580122752'),
(2, 6, 12, '1580122752'),
(2, 7, 15, '1580122752'),
(2, 8, 16, '1580122752'),
(2, 8, 17, '1580122752'),
(2, 8, 20, '1580122752'),
(2, 8, 21, '1580122753'),
(2, 8, 22, '1580122753'),
(2, 9, 24, '1580122753'),
(2, 9, 25, '1580122753'),
(2, 9, 27, '1580122753'),
(2, 9, 30, '1580122753'),
(2, 9, 31, '1580122753'),
(2, 10, 33, '1580122753'),
(2, 12, 36, '1580122753'),
(2, 12, 37, '1580122753'),
(2, 13, 38, '1580122753'),
(2, 13, 39, '1580122753'),
(2, 14, 40, '1580122753'),
(2, 14, 41, '1580122753'),
(2, 15, 42, '1580122753'),
(2, 15, 43, '1580122753'),
(2, 16, 44, '1580122753'),
(2, 16, 45, '1580122753');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `page_id` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `content` text DEFAULT NULL,
  `page_meta_title` varchar(155) NOT NULL,
  `page_meta_keywords` varchar(255) NOT NULL,
  `page_meta_desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_id`, `page`, `content`, `page_meta_title`, `page_meta_keywords`, `page_meta_desc`) VALUES
(1, 'terms', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare enim urna, id porta metus tincidunt cursus. Integer vestibulum luctus mauris in efficitur. Suspendisse metus sem, lacinia vitae ultrices id, dictum et erat. Vivamus sed ullamcorper purus, congue tincidunt velit. Nunc erat mauris, facilisis sed purus pretium, vulputate pellentesque lectus. Etiam sit amet lorem ut mauris ornare mattis. Donec egestas feugiat massa gravida auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate imperdiet mauris vel interdum. Curabitur vulputate imperdiet mi quis viverra. Nulla ultrices congue lectus, ac vestibulum nibh ornare tincidunt. Proin lacinia, magna in dignissim vehicula, eros lectus posuere elit, iaculis interdum purus diam a metus. Sed eget felis et ex varius malesuada. Donec commodo lectus vitae lectus lacinia, quis posuere quam elementum. Integer et dolor enim. Sed in tortor leo.<br />\n<br />\nMaecenas tellus tortor, porttitor sed lobortis a, bibendum quis metus. In quis nunc sit amet mi faucibus commodo pharetra vel nunc. Nunc mattis lacinia congue. Sed sagittis fringilla ligula ac rutrum. Integer rhoncus orci faucibus odio vestibulum eleifend. In pulvinar suscipit nisl finibus semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc tristique consectetur dignissim. Proin enim lorem, aliquam id sollicitudin eget, venenatis eu purus. Nam et ante risus.<br />\n<br />\nInteger massa lacus, ultrices ac erat et, eleifend bibendum eros. Donec posuere, mi ac vestibulum aliquet, ligula mi viverra ipsum, sit amet fermentum enim nisi sit amet odio. Proin feugiat, velit at volutpat sodales, neque nisi sollicitudin lorem, quis volutpat erat augue feugiat sapien. Morbi imperdiet lectus dolor, non imperdiet sem consectetur feugiat. Ut egestas massa magna. Morbi aliquet vestibulum bibendum. Nullam egestas metus vel neque rutrum pharetra. Donec imperdiet enim eu tellus tempor, luctus iaculis lacus blandit. Donec vitae justo nibh. Sed pellentesque diam sit amet odio condimentum, vel posuere lectus mollis. Integer viverra aliquam rhoncus. Donec sollicitudin quis ipsum dignissim dignissim.<br />\n<br />\nSed ac varius mauris. Nunc finibus, dolor et finibus sollicitudin, sapien justo ultricies sapien, nec pellentesque enim mauris accumsan lorem. Cras finibus, libero ac dignissim fermentum, tellus libero luctus dolor, vitae porta risus neque nec massa. Ut ultrices risus metus, eget facilisis libero varius et. Proin convallis ex laoreet vehicula tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec dapibus massa quis sem vehicula, sit amet ornare nisi semper. Etiam in ipsum ac purus feugiat gravida eget pulvinar felis. Morbi auctor eleifend ex sed dapibus. Fusce facilisis feugiat sem, eget congue nulla tincidunt ut. Sed diam turpis, pellentesque sed risus et, iaculis rhoncus odio. Vestibulum tristique bibendum mattis.<br />\n<br />\nFusce ut purus eu tellus viverra vestibulum. Nunc aliquet id metus non tincidunt. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam porttitor dui nec dui sagittis lacinia. Vestibulum tristique luctus tellus, a scelerisque nulla elementum a. Maecenas nec est vel massa dapibus varius. Morbi et enim vel neque eleifend blandit. Nunc convallis gravida urna, ac elementum dolor volutpat et. Nunc malesuada velit quis dolor vulputate, nec tempor nunc dapibus. Sed nec justo aliquet, cursus nunc nec, malesuada purus.</p>\n', 'Lorem Ipsum', 'test, test2, dating', 'Some content here'),
(2, 'about', '<div class=\\\"container\\\">\r\n<div class=\\\"row\\\">\r\n<div class=\\\"col-md-7\\\">\r\n<h2>Our Perfect Platform</h2>\r\n\r\n<p>Doctus omnesque duo ne, cu vel offendit erroribus. Laudem hendrerit pro ex, cum postea delectus ad. Te pro feugiat perpetua tractatos. Nam movet omnes id, usu te meis corpora. Augue doming quaestio vix at. Sumo duis ea sed, ut vix euismod lobortis prodesset, everti necessitatibus mei cu.<br />\r\n<br />\r\nNam ea eripuit assueverit, invenire delicatissimi ad pro, an dicam principes duo. Paulo prodesset duo ad. Duo eu summo verear. Natum gubergren definitionem id usu, graeco cetero ius ut.<br />\r\n<br />\r\nUnum postea sit an, iudico invenire expetenda ei sea, atqui fierent sed ut. Ex pri numquam indoctum suavitate, sed id movet mentitum consequat, cum et amet ipsum dolor. Unum postea sit an, iudico invenire expetenda ei sea, atqui fierent sed ut.</p>\r\n</div>\r\n\r\n<div class=\\\"col-md-5\\\">\r\n<div class=\\\"postimg\\\"><img alt=\\\"your alt text\\\" src=\\\"images/about-us-img1.jpg\\\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n\r\n<div class=\\\"textrow\\\">\r\n<div class=\\\"container\\\">\r\n<div class=\\\"row\\\">\r\n<div class=\\\"col-md-5\\\">\r\n<div class=\\\"postimg\\\"><img alt=\\\"your alt text\\\" src=\\\"images/about-us-img2.jpg\\\" /></div>\r\n</div>\r\n\r\n<div class=\\\"col-md-7\\\">\r\n<h2>Our Expertise</h2>\r\n\r\n<p>Doctus omnesque duo ne, cu vel offendit erroribus. Laudem hendrerit pro ex, cum postea delectus ad. Te pro feugiat perpetua tractatos. Nam movet omnes id, usu te meis corpora. Augue doming quaestio vix at. Sumo duis ea sed, ut vix euismod lobortis prodesset, everti necessitatibus mei cu.<br />\r\n<br />\r\nNam ea eripuit assueverit, invenire delicatissimi ad pro, an dicam principes duo. Paulo prodesset duo ad. Duo eu summo verear. Natum gubergren definitionem id usu, graeco cetero ius ut.</p>\r\n\r\n<ul class=\\\"orderlist\\\">\r\n	<li>Mauris convallis felis</li>\r\n	<li>Praesent vulputate diam</li>\r\n	<li>Vestibulum nec dui</li>\r\n	<li>Curabitur facilisis</li>\r\n	<li>Donec euismod urna</li>\r\n	<li>Mauris convallis felis</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'About Dating', 'About, Dating, Perfect', 'Doctus omnesque duo ne, cu vel offendit erroribus. Laudem hendrerit pro ex, cum postea delectus ad. Te pro feugiat perpetua tractatos. Nam movet omnes id, usu te meis corpora.'),
(3, 'privacy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare enim urna, id porta metus tincidunt cursus. Integer vestibulum luctus mauris in efficitur. Suspendisse metus sem, lacinia vitae ultrices id, dictum et erat. Vivamus sed ullamcorper purus, congue tincidunt velit. Nunc erat mauris, facilisis sed purus pretium, vulputate pellentesque lectus. Etiam sit amet lorem ut mauris ornare mattis. Donec egestas feugiat massa gravida auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate imperdiet mauris vel interdum. Curabitur vulputate imperdiet mi quis viverra. Nulla ultrices congue lectus, ac vestibulum nibh ornare tincidunt. Proin lacinia, magna in dignissim vehicula, eros lectus posuere elit, iaculis interdum purus diam a metus. Sed eget felis et ex varius malesuada. Donec commodo lectus vitae lectus lacinia, quis posuere quam elementum. Integer et dolor enim. Sed in tortor leo.<br />\n<br />\nMaecenas tellus tortor, porttitor sed lobortis a, bibendum quis metus. In quis nunc sit amet mi faucibus commodo pharetra vel nunc. Nunc mattis lacinia congue. Sed sagittis fringilla ligula ac rutrum. Integer rhoncus orci faucibus odio vestibulum eleifend. In pulvinar suscipit nisl finibus semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc tristique consectetur dignissim. Proin enim lorem, aliquam id sollicitudin eget, venenatis eu purus. Nam et ante risus.<br />\n<br />\nInteger massa lacus, ultrices ac erat et, eleifend bibendum eros. Donec posuere, mi ac vestibulum aliquet, ligula mi viverra ipsum, sit amet fermentum enim nisi sit amet odio. Proin feugiat, velit at volutpat sodales, neque nisi sollicitudin lorem, quis volutpat erat augue feugiat sapien. Morbi imperdiet lectus dolor, non imperdiet sem consectetur feugiat. Ut egestas massa magna. Morbi aliquet vestibulum bibendum. Nullam egestas metus vel neque rutrum pharetra. Donec imperdiet enim eu tellus tempor, luctus iaculis lacus blandit. Donec vitae justo nibh. Sed pellentesque diam sit amet odio condimentum, vel posuere lectus mollis. Integer viverra aliquam rhoncus. Donec sollicitudin quis ipsum dignissim dignissim.<br />\n<br />\nSed ac varius mauris. Nunc finibus, dolor et finibus sollicitudin, sapien justo ultricies sapien, nec pellentesque enim mauris accumsan lorem. Cras finibus, libero ac dignissim fermentum, tellus libero luctus dolor, vitae porta risus neque nec massa. Ut ultrices risus metus, eget facilisis libero varius et. Proin convallis ex laoreet vehicula tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec dapibus massa quis sem vehicula, sit amet ornare nisi semper. Etiam in ipsum ac purus feugiat gravida eget pulvinar felis. Morbi auctor eleifend ex sed dapibus. Fusce facilisis feugiat sem, eget congue nulla tincidunt ut. Sed diam turpis, pellentesque sed risus et, iaculis rhoncus odio. Vestibulum tristique bibendum mattis.<br />\n<br />\nFusce ut purus eu tellus viverra vestibulum. Nunc aliquet id metus non tincidunt. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam porttitor dui nec dui sagittis lacinia. Vestibulum tristique luctus tellus, a scelerisque nulla elementum a. Maecenas nec est vel massa dapibus varius. Morbi et enim vel neque eleifend blandit. Nunc convallis gravida urna, ac elementum dolor volutpat et. Nunc malesuada velit quis dolor vulputate, nec tempor nunc dapibus. Sed nec justo aliquet, cursus nunc nec, malesuada purus.</p>\n', '', '', ''),
(4, 'Disclaimer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare enim urna, id porta metus tincidunt cursus. Integer vestibulum luctus mauris in efficitur. Suspendisse metus sem, lacinia vitae ultrices id, dictum et erat. Vivamus sed ullamcorper purus, congue tincidunt velit. Nunc erat mauris, facilisis sed purus pretium, vulputate pellentesque lectus. Etiam sit amet lorem ut mauris ornare mattis. Donec egestas feugiat massa gravida auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate imperdiet mauris vel interdum. Curabitur vulputate imperdiet mi quis viverra. Nulla ultrices congue lectus, ac vestibulum nibh ornare tincidunt. Proin lacinia, magna in dignissim vehicula, eros lectus posuere elit, iaculis interdum purus diam a metus. Sed eget felis et ex varius malesuada. Donec commodo lectus vitae lectus lacinia, quis posuere quam elementum. Integer et dolor enim. Sed in tortor leo.\n<br><br>\nMaecenas tellus tortor, porttitor sed lobortis a, bibendum quis metus. In quis nunc sit amet mi faucibus commodo pharetra vel nunc. Nunc mattis lacinia congue. Sed sagittis fringilla ligula ac rutrum. Integer rhoncus orci faucibus odio vestibulum eleifend. In pulvinar suscipit nisl finibus semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc tristique consectetur dignissim. Proin enim lorem, aliquam id sollicitudin eget, venenatis eu purus. Nam et ante risus.\n<br><br>\nInteger massa lacus, ultrices ac erat et, eleifend bibendum eros. Donec posuere, mi ac vestibulum aliquet, ligula mi viverra ipsum, sit amet fermentum enim nisi sit amet odio. Proin feugiat, velit at volutpat sodales, neque nisi sollicitudin lorem, quis volutpat erat augue feugiat sapien. Morbi imperdiet lectus dolor, non imperdiet sem consectetur feugiat. Ut egestas massa magna. Morbi aliquet vestibulum bibendum. Nullam egestas metus vel neque rutrum pharetra. Donec imperdiet enim eu tellus tempor, luctus iaculis lacus blandit. Donec vitae justo nibh. Sed pellentesque diam sit amet odio condimentum, vel posuere lectus mollis. Integer viverra aliquam rhoncus. Donec sollicitudin quis ipsum dignissim dignissim.\n<br><br>\nSed ac varius mauris. Nunc finibus, dolor et finibus sollicitudin, sapien justo ultricies sapien, nec pellentesque enim mauris accumsan lorem. Cras finibus, libero ac dignissim fermentum, tellus libero luctus dolor, vitae porta risus neque nec massa. Ut ultrices risus metus, eget facilisis libero varius et. Proin convallis ex laoreet vehicula tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec dapibus massa quis sem vehicula, sit amet ornare nisi semper. Etiam in ipsum ac purus feugiat gravida eget pulvinar felis. Morbi auctor eleifend ex sed dapibus. Fusce facilisis feugiat sem, eget congue nulla tincidunt ut. Sed diam turpis, pellentesque sed risus et, iaculis rhoncus odio. Vestibulum tristique bibendum mattis.\n<br><br>\nFusce ut purus eu tellus viverra vestibulum. Nunc aliquet id metus non tincidunt. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam porttitor dui nec dui sagittis lacinia. Vestibulum tristique luctus tellus, a scelerisque nulla elementum a. Maecenas nec est vel massa dapibus varius. Morbi et enim vel neque eleifend blandit. Nunc convallis gravida urna, ac elementum dolor volutpat et. Nunc malesuada velit quis dolor vulputate, nec tempor nunc dapibus. Sed nec justo aliquet, cursus nunc nec, malesuada purus.', '', '', ''),
(5, 'Homepage', '<h3>Completely Free Online Dating Site Sign up now and meet someone!</h3>\n\n<p>Welcome to Datenow, We&#39;re 100% free for everything, if you join you will meet someone. We&#39;re one of the biggest dating sites around, try us out!</p>\n\n<div class=\\\"optiontxt free\\\">We don&#39;t charge for anything. Free is best--</div>\n\n<div class=\\\"optiontxt fake\\\">Fake profiles are deleted and banned.</div>\n\n<div class=\\\"optiontxt faces\\\">Always new faces to keep things fresh.</div>\n', '', '', ''),
(6, 'Homepage Bottom', '<div class=\\\"welcomeWrap\\\">\n<div class=\\\"inner\\\">\n<h3>Welcome to our Dating Site</h3>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam. Etiam ultricies, neque at aliquet placerat, risus nisi molestie nibh, condimentum venenatis turpis ante et sapien. Aliquam egestas nibh ac nisl lobortis, quis commodo tortor laoreet. Donec pellentesque metus a dolor porta molestie. Mauris viverra id purus at imperdiet.</p>\n<img src=\\\"http://codeareena.com/online_dating/glancePublic/images/social-image.png\\\"></div>\n</div>\n<div class=\\\"inner\\\">\n<div class=\\\"homeinfowrap\\\">\n<div class=\\\"clear\\\">&nbsp;</div>\n\n<ul class=\\\"homeinfo\\\">\n	<li>\n	<div class=\\\"inforint\\\"><img src=\\\"http://codeareena.com/online_dating/glancePublic/images/female0icon.png\\\">\n	<h3>Find Girls</h3>\n\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam.</p>\n	</div>\n	</li>\n	<li>\n	<div class=\\\"inforint\\\"><img src=\\\"http://codeareena.com/online_dating/glancePublic/images/connect-icon.png\\\">\n	<h3>We connect people</h3>\n\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam.</p>\n	</div>\n	</li>\n	<li>\n	<div class=\\\"inforint\\\"><img src=\\\"http://codeareena.com/online_dating/glancePublic/images/male-icon.png\\\">\n	<h3>Find Men</h3>\n\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis neque quis maximus tempor. Fusce ante lorem, volutpat id eleifend ac, finibus quis quam.</p>\n	</div>\n	</li>\n</ul>\n</div>\n</div>', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_settings`
--

CREATE TABLE `privacy_settings` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `email_setting` enum('public','friends','me') NOT NULL DEFAULT 'public',
  `phone_setting` enum('public','friends','me') NOT NULL DEFAULT 'public',
  `dob_setting` enum('public','friends','me') NOT NULL DEFAULT 'public',
  `location_setting` enum('public','friends','me') NOT NULL DEFAULT 'public',
  `msg_setting` enum('public','friends') NOT NULL DEFAULT 'public',
  `comment_setting` enum('public','friends') NOT NULL DEFAULT 'public',
  `gallery_setting` enum('public','friends','me') NOT NULL DEFAULT 'public'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_views`
--

CREATE TABLE `profile_views` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `dated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_views`
--

INSERT INTO `profile_views` (`id`, `member_id`, `ip_address`, `dated`) VALUES
(1, 1, '::1', '2020-01-24 09:18:17'),
(2, 2, '::1', '2020-01-24 10:04:27'),
(3, 4, '::1', '2020-01-24 10:13:35'),
(4, 3, '::1', '2020-01-24 10:22:44'),
(5, 5, '::1', '2020-01-24 10:39:34'),
(6, 8, '::1', '2020-01-24 15:02:47'),
(7, 7, '::1', '2020-01-25 05:51:56'),
(8, 6, '::1', '2020-01-25 06:21:24'),
(9, 10, '::1', '2020-01-25 08:21:42'),
(10, 9, '::1', '2020-01-25 08:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID` int(100) NOT NULL,
  `service` varchar(255) NOT NULL,
  `service_order` int(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 0,
  `created_by` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID`, `service`, `service_order`, `status`, `created_by`) VALUES
(5, 'Sex', 1, 1, 1578897630),
(6, 'Blowjob', 2, 1, 1578897786),
(7, 'Cum', 3, 1, 1578896492),
(8, 'Massage', 4, 1, 1578896501),
(9, 'BDSM', 5, 1, 1578896510),
(10, 'Extreme', 6, 1, 1578896519),
(11, 'Fisting', 7, 1, 1578896528),
(12, 'Golden shower', 8, 1, 1578896536),
(13, 'Kaviar', 9, 1, 1578896545),
(14, 'Lesbian show', 10, 1, 1578896554),
(15, 'Striptease', 11, 1, 1578897922),
(16, 'Additional', 12, 1, 1578896570);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `google_api` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `google_api`) VALUES
(1, 'sdfdsfdsfdsfdsfdsfdsfdsfdgfdgfdgdf');

-- --------------------------------------------------------

--
-- Table structure for table `subservice`
--

CREATE TABLE `subservice` (
  `ID` int(100) NOT NULL,
  `service_id` int(100) NOT NULL,
  `subservice` varchar(255) NOT NULL,
  `created_by` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subservice`
--

INSERT INTO `subservice` (`ID`, `service_id`, `subservice`, `created_by`) VALUES
(3, 5, 'A-level', 1578898035),
(4, 5, 'Classic sex', 1578898051),
(5, 5, 'Gang Bang', 1578898063),
(6, 5, 'Lesbian sex', 1578898075),
(7, 6, 'Anilingus', 1578898092),
(8, 6, 'Blowjob in the car', 1578898103),
(9, 6, 'Blowjob with condom', 1578898115),
(10, 6, 'Deep throat', 1578898126),
(11, 6, 'Muff diving', 1578898136),
(12, 6, 'OWO - blowjob without condom', 1578898146),
(13, 7, 'CIM - come in mouth', 1578898161),
(14, 7, 'COB - come on body', 1578898172),
(15, 7, 'Facial', 1578898183),
(16, 8, 'Acupressure', 1578898197),
(17, 8, 'Classic massage', 1578898206),
(18, 8, 'Erotic massage', 1578898217),
(19, 8, ' Professional massage', 1578898230),
(20, 8, 'Relaxing massage', 1578898243),
(21, 8, 'Sakura massage', 1578898254),
(22, 8, 'Thai massage', 1578898266),
(23, 8, 'Urological massage', 1578898279),
(24, 9, 'Bandage', 1578898298),
(25, 9, 'Domination', 1578898309),
(26, 9, 'Fem dom', 1578898322),
(27, 9, 'Fetish', 1578898332),
(28, 9, 'Role play', 1578898344),
(29, 9, 'Spanking', 1578898353),
(30, 9, 'Submissive', 1578898364),
(31, 9, 'Trampling', 1578898375),
(32, 10, 'Strapon', 1578898387),
(33, 10, 'Toys', 1578898397),
(34, 11, 'Fisting anal', 1578898410),
(35, 11, 'Fisting classic', 1578898426),
(36, 12, 'Golden shower delivering', 1578898439),
(37, 12, 'Golden shower receiving', 1578898451),
(38, 13, 'Kaviar delivering', 1578898462),
(39, 13, 'Kaviar receiving', 1578898472),
(40, 14, 'Light Lesbian Show', 1578898484),
(41, 14, 'Professional Lesbian Show', 1578898496),
(42, 15, 'Lap dance', 1578898508),
(43, 15, 'Professional Striptease', 1578898519),
(44, 16, 'Couples', 1578898528),
(45, 16, ' Escort', 1578898538),
(46, 16, 'Photo / Video', 1578898548),
(47, 16, 'Pornstars', 1578898558);

-- --------------------------------------------------------

--
-- Table structure for table `users_comments`
--

CREATE TABLE `users_comments` (
  `comment_id` int(11) NOT NULL,
  `mem_id_from` int(11) NOT NULL,
  `mem_id_to` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_comments`
--

INSERT INTO `users_comments` (`comment_id`, `mem_id_from`, `mem_id_to`, `date_comment`, `comments`) VALUES
(1, 1, 1, '2020-01-24 10:44:06', 'hai'),
(2, 1, 3, '2020-01-24 11:07:35', 'hello'),
(3, 1, 1, '2020-01-24 15:53:18', 'bye'),
(4, 10, 10, '2020-01-27 12:44:26', 'fsdsdg dhfghffg');

-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE `users_messages` (
  `messages_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_send` datetime NOT NULL,
  `msg_status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `image_comments`
--
ALTER TABLE `image_comments`
  ADD PRIMARY KEY (`img_comment_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_albums`
--
ALTER TABLE `members_albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `members_gallery`
--
ALTER TABLE `members_gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `privacy_settings`
--
ALTER TABLE `privacy_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_views`
--
ALTER TABLE `profile_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subservice`
--
ALTER TABLE `subservice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_comments`
--
ALTER TABLE `users_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circle`
--
ALTER TABLE `circle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image_comments`
--
ALTER TABLE `image_comments`
  MODIFY `img_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members_albums`
--
ALTER TABLE `members_albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members_gallery`
--
ALTER TABLE `members_gallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privacy_settings`
--
ALTER TABLE `privacy_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_views`
--
ALTER TABLE `profile_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subservice`
--
ALTER TABLE `subservice`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users_comments`
--
ALTER TABLE `users_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

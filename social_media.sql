-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2018 at 06:40 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'adiaditiwari@gmail.com', 'aditya');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(8, 8, 2, 'hey', 'Aditya Tiwari', '2018-06-15 01:50:16'),
(2, 8, 2, 'I am fine and tell me about you.', 'Aditya', '2018-06-12 05:57:55'),
(3, 8, 2, 'I am fine and tell me about you.', 'Aditya', '2018-06-12 05:58:01'),
(4, 8, 2, 'I am fine and tell me about you.', 'Aditya', '2018-06-12 05:58:17'),
(5, 8, 2, 'Great I hope you always happy.', 'Aditya', '2018-06-12 05:58:50'),
(6, 8, 2, 'Great I hope you always happy.', 'Aditya', '2018-06-12 05:59:00'),
(9, 8, 2, 'hey', 'Aditya Tiwari', '2018-06-15 01:50:26'),
(10, 12, 2, 'Really Great', 'Aditya Tiwari', '2018-06-16 14:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `msg_topic` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_date`) VALUES
(1, '2', '1', 'Hey ', '     \r\n How are you brother.', 'no_reply', 'unread', '2018-06-13 16:21:59'),
(2, '2', '2', 'Hey', '     \r\n        Hey Aditya.', 'no_reply', 'read', '2018-06-13 16:22:31'),
(3, '2', '2', 'Hello', '     hello aditya \r\n        ', '           hii', 'read', '2018-06-16 11:07:41'),
(4, '2', '2', 'Great', '     \r\n        Really Great', 'no_reply', 'unread', '2018-06-16 14:37:24'),
(5, '2', '2', 'Great', '     \r\n        Really Great', 'no_reply', 'unread', '2018-06-16 14:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`) VALUES
(1, 2, 3, 'Line break', 'what is the line break code in html.			\r\n             		', '2018-06-12 01:17:10'),
(13, 5, 3, 'What line break code in html', 'What line break code in html\r\n             		', '2018-06-22 12:52:58'),
(12, 2, 7, 'Great and Great Great', '   			\r\n             		Great Great Double Great', '2018-06-16 14:36:47'),
(7, 2, 5, 'Welcome to jQuery.', '   			\r\n             I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery.		', '2018-06-12 04:32:08'),
(8, 2, 5, 'Welcome to jQuery.', '   			\r\n             I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery. I love jQuery.		', '2018-06-12 05:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`) VALUES
(7, 'PHP&Mysql'),
(2, 'JavaScript'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'jQuery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` text NOT NULL,
  `user_reg_date` text NOT NULL,
  `user_last_login` text NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_reg_date`, `user_last_login`, `status`, `ver_code`, `posts`) VALUES
(5, 'Ramu', 'adityatiwari ', 'ramkumar@gmail.com', 'India', 'Male', '2018-06-26', 'pp.jpg', '2018-06-22 18:20:41', '2018-06-22 18:22:18', 'verified', 322784164, 'yes'),
(2, 'Aditya Tiwari', 'aditya  ', 'adiaditiwari@gmail.com', 'India', 'Male', '1993-08-02', 'bi1.jpg', '2018-06-10 10:37:58', '2018-06-16 20:06:10', 'verified', 1772931319, 'yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

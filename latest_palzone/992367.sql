-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2016 at 01:49 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `992367`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`username`, `password`) VALUES
('supratim', '98809c3f491160651ce442f657c62218'),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE IF NOT EXISTS `admin_notification` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `admin_notification`
--

INSERT INTO `admin_notification` (`nid`, `notification`) VALUES
(1, 'Supratim Bhattacharya     has logged in the website'),
(2, 'Supratim Bhattacharya    has logged out successfully'),
(3, 'Supratim Bhattacharya     has logged in the website'),
(4, 'Supratim Bhattacharya    has logged out successfully'),
(5, 'Sattyam Bhatt     has logged in the website'),
(6, 'Rahul     has logged in the website'),
(7, '    has logged out successfully'),
(8, 'Pallavi     has logged in the website'),
(9, 'A NEW USER HAS REGISTERED NOW    '),
(10, 'aditya     has logged in the website'),
(11, '    has logged out successfully'),
(12, 'Supratim Bhattacharya     has logged in the website'),
(13, 'Supratim Bhattacharya    has logged out successfully'),
(14, 'Supratim Bhattacharya     has logged in the website'),
(15, 'Pallavi     has logged in the website'),
(16, 'Pallavi    has logged out successfully'),
(17, 'Supratim Bhattacharya     has logged in the website'),
(18, 'Supratim Bhattacharya    has logged out successfully'),
(19, 'Aman     has logged in the website'),
(20, 'Aman has added a  pic in gallery'),
(21, 'Aman    has logged out successfully'),
(22, 'A NEW USER HAS REGISTERED NOW    '),
(23, 'Avinash Singh Yadav     has logged in the website'),
(24, 'Supratim Bhattacharya     has logged in the website'),
(25, 'Supratim Bhattacharya     has logged in the website'),
(26, 'Supratim Bhattacharya    has logged out successfully'),
(27, 'Prince Sharzeel     has logged in the website'),
(28, 'Prince Sharzeel has added a  pic in gallery'),
(29, 'Prince Sharzeel has changed his profile pic'),
(30, 'Prince Sharzeel has added a  pic in gallery'),
(31, 'Prince Sharzeel has changed his profile pic'),
(32, 'Agnivesh kumar Tiwari     has logged in the website'),
(33, 'shardul     has logged in the website'),
(34, 'shardul has added a  pic in gallery'),
(35, 'shardul has changed his profile pic'),
(36, 'shivam     has logged in the website'),
(37, 'Agnivesh kumar Tiwari has changed his profile pic'),
(38, 'Agnivesh kumar Tiwari has added a  pic in gallery'),
(39, 'A NEW USER HAS REGISTERED NOW    '),
(40, 'Shubham     has logged in the website'),
(41, 'Shubham    has logged out successfully'),
(42, 'Supratim Bhattacharya     has logged in the website'),
(43, 'Supratim Bhattacharya    has logged out successfully'),
(44, 'Supratim Bhattacharya     has logged in the website'),
(45, 'Supratim Bhattacharya    has logged out successfully'),
(46, 'Prince Sharzeel     has logged in the website'),
(47, 'Pallavi     has logged in the website'),
(48, 'Abhishek Anand     has logged in the website'),
(49, 'Abhishek Anand    has logged out successfully'),
(50, 'Pallavi     has logged in the website'),
(51, 'Pallavi    has logged out successfully'),
(52, 'Pallavi     has logged in the website'),
(53, 'Pallavi    has logged out successfully'),
(54, 'A NEW USER HAS REGISTERED NOW    '),
(55, 'GAUTAM KUMAR VARUN     has logged in the website'),
(56, 'Supratim Bhattacharya     has logged in the website'),
(57, 'Supratim Bhattacharya    has logged out successfully'),
(58, 'Supratim Bhattacharya     has logged in the website'),
(59, 'Supratim Bhattacharya    has logged out successfully'),
(60, 'A NEW USER HAS REGISTERED NOW    '),
(61, 'suraj kumar     has logged in the website'),
(62, 'suraj kumar    has logged out successfully'),
(63, 'Supratim Bhattacharya     has logged in the website'),
(64, 'Supratim Bhattacharya has added a  pic in gallery'),
(65, 'A NEW USER HAS REGISTERED NOW    '),
(66, 'len_95     has logged in the website'),
(67, 'Supratim Bhattacharya    has logged out successfully'),
(68, 'Supratim Bhattacharya     has logged in the website'),
(69, 'Supratim Bhattacharya    has logged out successfully'),
(70, 'A NEW USER HAS REGISTERED NOW    '),
(71, 'Shubham Kumar Gupta     has logged in the website'),
(72, 'Shubham Kumar Gupta has changed his profile pic'),
(73, 'A feedback has been sent by     Shubham Kumar Gupta'),
(74, 'Shubham Kumar Gupta    has logged out successfully'),
(75, 'Supratim Bhattacharya     has logged in the website'),
(76, 'Supratim Bhattacharya    has logged out successfully'),
(77, 'Supratim Bhattacharya     has logged in the website'),
(78, 'Supratim Bhattacharya    has logged out successfully'),
(79, 'Supratim Bhattacharya     has logged in the website'),
(80, 'Supratim Bhattacharya    has logged out successfully'),
(81, 'Pallavi     has logged in the website'),
(82, 'Pallavi    has logged out successfully'),
(83, 'BRAJENDRA RAI     has logged in the website'),
(84, 'A feedback has been sent by     BRAJENDRA RAI');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `category`) VALUES
(5, 'BOOTSTRAP'),
(1, 'C'),
(2, 'C++'),
(3, 'JAVA'),
(6, 'JAVASCRIPT'),
(7, 'PHP'),
(4, 'PYTHON');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `feedback_txt` varchar(300) NOT NULL,
  `star` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `feedback_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback_txt`, `star`, `date`) VALUES
(3, 4, 'hihihih', '5', ''),
(5, 4, 'hi everyone', '5', '1-7-2016 2:51'),
(8, 3, 'I think there should be good ui', '5', '8-7-2016 4:41'),
(10, 11, 'jk nbhnjkhbnjk', '1', '12-7-2016 11:31'),
(11, 3, 'xzxczczx', '2', '12-7-2016 20:33'),
(13, 3, 'czscszdcsdcsd', '2', '23-7-2016 13:30'),
(14, 18, 'GREAT WORK ADMINS', '5', '24-7-2016 15:37'),
(15, 20, 'photo nahi upload ho pat ba......', '5', '24-7-2016 15:57'),
(18, 28, 'great work by admin', '5', '24-7-2016 22:24'),
(19, 31, 'good job but need lots of improvement.', '4', '25-7-2016 2:38'),
(20, 32, 'Very Good', '5', '25-7-2016 12:36'),
(21, 3, 'sabdusadaskdsakdassv dhsadsaasjdasjdjkasdbasdasdaskdasnksadkasndasndkasdnasndasndasndanskn ncknaskasndas', '5', '29-7-2016 15:24'),
(22, 47, 'Great pals..keep up the good work', '5', '4-8-2016 12:45'),
(23, 55, '', '5', '12-8-2016 12:7'),
(24, 31, 'hi hutiyeee', '5', '18-8-2016 0:13');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE IF NOT EXISTS `group_chat` (
  `chat_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `chat_txt` text NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `group_chat_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=220 ;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`chat_id`, `user_id`, `chat_txt`, `time`) VALUES
(164, 7, 'Holla Everyone', ''),
(165, 3, 'Hi everyone', ''),
(166, 5, 'HI ALL OFF YOU', ''),
(168, 4, 'Good morning...How are you all', ''),
(169, 7, 'Hiii frnds', ''),
(174, 7, 'HIi', ''),
(175, 7, 'hello', ''),
(176, 3, 'HI Everyone', ''),
(179, 3, 'Hi', ''),
(183, 3, 'hi everyone\r\n\r\n', ''),
(184, 3, 'Hello everyone\r\n', ''),
(185, 11, 'hello bangali', ''),
(186, 7, 'hii supratim\r\n', ''),
(187, 3, 'hii pallavi', ''),
(188, 13, 'hi supu\r\n', ''),
(195, 3, 'werfdfsfds', ''),
(196, 14, 'dffdsfdf', ''),
(202, 16, 'raman rox', ''),
(204, 17, 'kya h y kyu h y\r\n', ''),
(207, 9, 'erklregvgjkr', ''),
(208, 18, 'HI FRIENDS', ''),
(209, 12, 'Hello Bewdo', ''),
(210, 12, 'Ka Krtr sn', ''),
(211, 20, 'aur bhai log mazze me...', ''),
(216, 31, 'congrats suppo...', ''),
(217, 32, 'bhai loog --- www.cpclips.com', ''),
(218, 44, 'hellooooo', ''),
(219, 20, 'bhai photo lag gaya be....', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `question` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `opt4` text NOT NULL,
  `answer` text NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `questions_ibfk_2` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `cid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `level`) VALUES
(1, 2, 'What is the full form of sql?', 'Structured Query Language', 'Structured Questioning Language', 'Standard Query Language', 'Standard Questioning Language	', 'Structured Query Language', '1'),
(2, 2, 'Who is the inventor of C?', 'Dennis Ritchie ', 'Devis Ramahana', 'Levein Redetoy', 'David Frenchmen', 'Dennis Ritchie ', '1'),
(3, 2, 'What is the full form of HTML?', 'Hyperlinks and Text Markup Language', 'erererferfe', 'Hyper Text Markup Language', 'Homelinks Text Markup Language', 'Hyper Text Markup Language', '1'),
(4, 2, 'What is the full form of php?', 'PHP: Hypertext Preprocessor', 'Private Home Page', 'Personal Hypertext Processor', 'Public Home Page', 'PHP: Hypertext Preprocessor', '1'),
(5, 2, 'What is the fullform of XML?', 'EXTENDED MARKUP LANGUAGE', 'EXTENDED MARKSHEET LANGUAGE', 'EXTENDED MARKABLE LANGUAGE', 'EXTENDED MULTIPLE LANGUAGE', 'EXTENDED MARKUP LANGUAGE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `slambook`
--

CREATE TABLE IF NOT EXISTS `slambook` (
  `name` varchar(255) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zodiac_sign` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `fav_movies` varchar(255) NOT NULL,
  `fav_singer` varchar(255) NOT NULL,
  `siblings` varchar(255) NOT NULL,
  `fav_actor` varchar(255) NOT NULL,
  `fav_actoress` varchar(255) NOT NULL,
  `fav_food` varchar(255) NOT NULL,
  `fav_passtime` varchar(255) NOT NULL,
  `friends` varchar(255) NOT NULL,
  `fav_personality` varchar(255) NOT NULL,
  `fav_place` varchar(255) NOT NULL,
  `fav_sports` varchar(255) NOT NULL,
  `fav_sports_personality` varchar(255) NOT NULL,
  `fav_songs` varchar(255) NOT NULL,
  `motto_in_life` varchar(255) NOT NULL,
  `happy_moments` varchar(255) NOT NULL,
  `embarrasing_moments` varchar(255) NOT NULL,
  `crush` varchar(255) NOT NULL,
  `places_visited` varchar(255) NOT NULL,
  `fear` varchar(255) NOT NULL,
  `strength` varchar(255) NOT NULL,
  `dont_like` varchar(255) NOT NULL,
  `say_love` text NOT NULL,
  `say_college` text NOT NULL,
  `say_to_me` text NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT 'player',
  `block` varchar(255) NOT NULL DEFAULT 'no',
  `online` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `birth_date`, `join_date`, `score`, `level`, `type`, `block`, `online`) VALUES
(1, 'abc', 'abc@.com', 'a', '0000-00-00', '2016-06-27 19:00:26', 0, 0, 'player', 'no', 'no'),
(2, 'asd', 'asd@.com', 'b', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(3, 'Supratim Bhattacharya', 'supratimbhattacharya1@gmail.com', '513106c051f94528f1d386926aa65e1a', '2016-07-21', '2016-08-17 18:02:05', 39, 0, 'admin', 'no', 'no'),
(4, 'Rahul', 'rahul1@gmail.com', '76419c58730d9f35de7ac538c2fd6737', '0000-00-00', '2016-08-06 21:22:14', 0, 0, 'admin', 'no', 'yes'),
(5, 'Anurag', 'anuragrockstheworld@gmail.com', '8fcc34c1ea7c8677982b9e451925e38a', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(6, 'Ajanta', 'ajanta1@gmail.com', '973b46724d3a3d8443bffd7972c5d602', '0000-00-00', '0000-00-00 00:00:00', 50, 0, 'player', 'no', 'no'),
(7, 'Pallavi', 'pallaviagrawal79@gmail.com', '9dee45a24efffc78483a02cfcfd83433', '0000-00-00', '2016-08-17 18:02:53', 17, 0, 'admin', 'no', 'no'),
(8, 'Yogesh', 'yogesh1@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(9, 'Aman', 'amananandrai@gmail.com', 'e1bf1cbcf0c2186ddda4c31d3f131765', '1995-08-22', '2016-08-07 17:47:52', 50, 0, 'admin', 'no', 'no'),
(10, 'Raman', 'raman@gmail.com', '912ec803b2ce49e4a541068d495ab570', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(11, 'Shardul singh', 'sharduls3196@gmail.com', 'b81ca96f567e856dae198ea9d17cf777', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'yes', 'no'),
(12, 'Abhishek Anand', 'anandabhishek145@gmail.com', '02c75fb22c75b23dc963c7eb91a062cc', '0000-00-00', '2016-08-08 20:10:15', 50, 0, 'admin', 'no', 'no'),
(13, 'Arun Kumar Gupta', 'arunkumargupta450@gmail.com', '722279e9e630b3e731464b69968ea4b4', '0000-00-00', '2016-08-05 17:23:50', 50, 0, 'player', 'no', 'yes'),
(14, 'PRASHANT KUMAR GUPTA', 'prashant@gmail.com', 'a6d09273f9efa2c651d3f84adf5e133e', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(15, 'Prince Sharzeel', 'prince@gmail.com', '2fe4658d3a95a25402f141324e587d20', '0000-00-00', '2016-08-04 20:36:10', 0, 0, 'player', 'no', 'yes'),
(16, 'Rishabh Verma', 'rishabh3211@gmail.com', '07289a6ff81bd148372298ec16525519', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(17, 'Ayush chaurasia', 'ayushchaurasia192@gmail.com', '66049c07d9e8546699fe0872fd32d8f6', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 'player', 'no', 'no'),
(18, 'Pankaj Singh', 'singhpankajmmm@gmail.com', '3287b48499934f20749ce5f9fe9c9bea', '0000-00-00', '2016-07-24 10:00:06', 0, 0, 'player', 'no', 'no'),
(19, 'sushilkumar', 'sushilv086@gmail.com', '60a46a229929464aa3c82d14bb66d629', '0000-00-00', '2016-07-24 10:06:02', 0, 0, 'player', 'no', 'no'),
(20, 'Agnivesh kumar Tiwari', 'agniveshtiwari9@gmail.com', 'ac3fb74c10c7d960fd93776d2956b878', '0000-00-00', '2016-08-07 19:04:57', 0, 0, 'admin', 'no', 'yes'),
(21, 'shivam', 'shivatheh123@gmail.com', '91dac900b4769c2ee35bf170b3a27f20', '0000-00-00', '2016-08-07 19:07:58', 0, 0, 'player', 'no', 'yes'),
(22, 'PRASHANT GUPTA', 'prashant1250084@gmail.com', '5afff914229eab23765c6b3887f01dcd', '0000-00-00', '2016-07-24 12:47:21', 50, 0, 'player', 'no', 'no'),
(23, 'Shubham', 'shubham.399@gmail.com', '40be4e59b9a2a2b5dffb918c0e86b3d7', '0000-00-00', '2016-07-24 13:13:27', 50, 0, 'player', 'no', 'no'),
(24, 'ARUN KUMAR GUPTA', 'arunkumar.yahoo.com@gmail.com', 'e202c0e9ee37bcd13a4ca05c32a5e56b', '0000-00-00', '2016-07-24 13:40:59', 0, 0, 'player', 'no', 'no'),
(25, 'Anim_rocks', 'animeshsinha93@gmail.com', '0c3516fa380732b760198668ff2b3348', '0000-00-00', '2016-07-24 13:45:44', 0, 0, 'player', 'no', 'no'),
(27, 'prakhar agrawal', 'prakharagrawal31@yahoo.com', '202cb962ac59075b964b07152d234b70', '0000-00-00', '2016-07-24 13:50:22', 0, 0, 'player', 'no', 'no'),
(28, 'MAHESH CHAUDHARY', 'asmdrmahesh108@gmail.com', '49bb197bec17b7d20b2df6b1f3c3434a', '0000-00-00', '2016-07-24 16:41:37', 0, 0, 'player', 'no', 'no'),
(29, 'shardul', 'shardul@shardul.shardul', 'f41027596d7fd0898977400a3c7672a9', '0000-00-00', '2016-07-26 17:07:28', 50, 0, 'player', 'yes', 'no'),
(30, 'hello', 'hello', '5d41402abc4b2a76b9719d911017c592', '0000-00-00', '2016-07-25 07:10:34', 0, 0, 'player', 'yes', 'no'),
(31, 'BRAJENDRA RAI', 'brajendrarai1@gmail.com', 'f3c1f5e8e61064b5c968ff0ddb56c844', '0000-00-00', '2016-08-04 20:38:44', 50, 0, 'player', 'no', 'yes'),
(32, 'shivendra singh', 'shivendracandy@gmail.com', '0e3b8c14cbedbdbcbe97b05ea7cfeae9', '0000-00-00', '2016-08-01 06:57:21', 50, 0, 'admin', 'no', 'no'),
(40, 'Ravikant', 'ravikantstar@facebook.com', '63dd3e154ca6d948fc380fa576343ba6', '0000-00-00', '2016-07-25 16:04:31', 50, 0, 'player', 'no', 'no'),
(41, 'Neha Jaiswal', 'sweetaneha60@gmail.com', '5ca7305d7db8e2ce231d9d214379a8dc', '0000-00-00', '2016-07-25 16:15:15', 50, 0, 'player', 'no', 'no'),
(42, 'EKANSH BAJPAI', 'ekansh.bajpai712@gmail.com', '64459d50c3465e012c11355a804aa968', '0000-00-00', '2016-07-25 16:37:07', 0, 0, 'player', 'no', 'no'),
(43, '&amp;quot;&amp;gt;&amp;lt;script&amp;gt;alert(0)&a', 'satish.metahorizon@gmail.com', '5aaec4275b65ed7ea277ebfcc9ee2e07', '0000-00-00', '2016-07-26 17:06:51', 0, 0, 'player', 'yes', 'no'),
(44, 'shardul', 'shardul3196@gmail.com', 'f41027596d7fd0898977400a3c7672a9', '0000-00-00', '2016-08-07 19:05:32', 50, 0, 'player', 'no', 'yes'),
(45, 'Knightx', 'knightx96@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', '0000-00-00', '2016-07-30 19:04:21', 0, 0, 'player', 'no', 'no'),
(46, 'tushar', 'verma.tushar1609@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '0000-00-00', '2016-07-30 21:04:44', 0, 0, 'player', 'no', 'no'),
(47, 'Sattyam Bhatt', 'mailmesatyambhatt@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00', '2016-08-06 11:16:40', 50, 0, 'player', 'no', 'yes'),
(48, 'gaurav', 'gauravsinghmmmut@gmail.com', 'e42c3c1f3c935fcaf213a9d6cc65aec4', '0000-00-00', '2016-08-05 03:50:20', 0, 0, 'player', 'no', 'no'),
(49, 'aditya', 'kbhanu749@gmail.com', '2de8bed6ac5b9811ba5f1d3e71c37cd4', '0000-00-00', '2016-08-07 13:46:43', 0, 0, 'player', 'no', 'yes'),
(50, 'Avinash Singh Yadav', 'avioptimusprime@gmail.com', 'a208e5837519309129fa466b0c68396b', '0000-00-00', '2016-08-07 17:55:14', 0, 0, 'player', 'no', 'yes'),
(51, 'Shubham', 'shubhamsingh@khush.com', '38eb2a19ed2c0e7cfe68ae8960cfa63b', '0000-00-00', '2016-08-08 02:26:32', 0, 0, 'player', 'no', 'no'),
(52, 'GAUTAM KUMAR VARUN', 'gautakumarvarun025@gmail.com', '2f6e80077b8f81502cfdb0804ac48c62', '0000-00-00', '2016-08-09 12:41:40', 0, 0, 'player', 'no', 'yes'),
(53, 'suraj kumar', 'skkumarsuraj9@gmail.com', '5dec33be756d5625954d267da93260c6', '0000-00-00', '2016-08-10 05:11:53', 0, 0, 'player', 'no', 'no'),
(54, 'len_95', 'len.7206@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0000-00-00', '2016-08-11 16:42:34', 50, 0, 'player', 'no', 'yes'),
(55, 'Shubham Kumar Gupta', 'guptask009@gmail.com', '30ed506b6b3d2455050e40ac8e7fcc30', '0000-00-00', '2016-08-12 18:42:06', 50, 0, 'admin', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_cover_pic`
--

CREATE TABLE IF NOT EXISTS `user_cover_pic` (
  `cover_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`cover_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `school` varchar(200) NOT NULL,
  `current_city` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `relationship_status` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `college` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `facebookid` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  KEY `user_info_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `job`, `school`, `current_city`, `hometown`, `relationship_status`, `mobile_no`, `college`, `country`, `gender`, `mail`, `facebookid`, `birthday`) VALUES
(3, 'dsfsdfdsf', 'ST.JOHNS,DLW', 'dsfsdfdsf', 'sdfsdfdsf', 'complicated', '324242124212421', 'sdfsddsf', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, 'dsfsdfdsf', 'ST.JOHNS,DLW', 'dsfsdfdsf', 'sdfsdfdsf', 'complicated', '324242124212421', 'sdfsddsf', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, 'dsfsdfdsf', 'ST.JOHNS,DLW', '', 'sdfsdfdsf', 'complicated', '324242124212421', 'sdfsddsf', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, 'dsfsdfdsf', 'ST.JOHNS,DLW', '', 'sdfsdfdsf', 'complicated', '324242124212421', '', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, 'dsfsdfdsf', 'ST.JOHNS,DLW', '', '', 'complicated', '324242124212421', '', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '324242124212421', '', 'sdfsdfsdfsdf', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '324242124212421', '', '', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '324242124212421', '', '', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', 'dfsdfdsfsdf@ifjdsijfd.jfdfuh', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(4, '', 'dfdsfsdfs', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', 'sfsdfsdfdsf', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', 'dfdsfsdfs', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', 'sfsdfsdfdsf', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', 'dfdsfsdfs', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', 'sfsdfsdfdsf', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', 'sfsdfsdfdsf', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', 'sfsdfsdfdsf', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', '', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', 'sdsedads', 'sdasdasdsa', 'open relationship', '2323123123', '', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', '', 'sdasdasdsa', 'open relationship', '2323123123', '', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', '', '', 'open relationship', '2323123123', '', 'asdasdsad', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', '', '', 'open relationship', '2323123123', '', '', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', '', '', 'open relationship', '', '', '', 'sadasd', 'dfasd@fdsfh.com', 'sadasd', '2016-07-18'),
(4, '', '', '', '', 'open relationship', '', '', '', 'sadasd', '', 'sadasd', '2016-07-18'),
(4, '', '', '', '', 'open relationship', '', '', '', 'sadasd', '', '', '2016-07-18'),
(4, '', '', '', '', '', '', '', '', 'sadasd', '', '', '2016-07-18'),
(4, '', '', '', '', '', '', '', '', '', '', '', '2016-07-18'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(4, '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', 'dsfsdfds', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', 'dsfsdfds', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', 'dsfsdfds', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', 'dsfsdfds', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', 'dsfsdfds', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', 'xzsdsadsad', 'complicated', '2324353545', '', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, 'sdsdfsf', 'Holy Cross', 'Gorakhpur', '', 'complicated', '2324353545', '', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '2324353545', '', 'dfsdfdsf', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '2324353545', '', '', 'male', 'erwerwer@dsads.dsd', 'sdasda', '2016-07-06'),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '2324353545', '', '', 'male', 'erwerwer@dsads.dsd', 'sdasda', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', 'erwerwer@dsads.dsd', 'sdasda', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', 'erwerwer@dsads.dsd', 'sdasda', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', 'sdasda', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', 'sdasda', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', 'complicated', '', '', '', 'male', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', '', '', '', '', 'male', '', '', ''),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(17, '', '', '', '', 'complicated', '', '', '', '', '', '', ''),
(17, '', '', '', '', 'complicated', '', '', '', '', '', '', ''),
(17, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(9, '', 'Holy Cross', 'Gorakhpur', '', '', '', '', '', '', '', '', ''),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', 'ST.JOHNS,DLW', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(7, '', '', 'GORAKHPUR', '', '', '', '', '', '', '', '', ''),
(7, '', '', 'GORAKHPUR', '', '', '', '', '', '', '', '', ''),
(7, '', '', 'GORAKHPUR', '', '', '', '', '', '', '', '', ''),
(12, '', 'MJRP Public School Ghazipur', 'Gorakhpur', 'Ghazipur', 'complicated', '', 'MMMUT', 'India', 'male', '', '', ''),
(12, '', 'MJRP Public School Ghazipur', 'Gorakhpur', 'Ghazipur', 'complicated', '', 'MMMUT', 'India', 'male', '', '', ''),
(20, '', 'Hanuman Inter College', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', 'Hanuman Inter College', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', '', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(21, '', '', '', '', '', '', '', '', '', '', '', ''),
(23, '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '', 'sunbeam', '', '', 'complicated', '', '', '', '', '', '', ''),
(24, '', 'sunbeam', '', '', 'complicated', '', '', '', '', '', '', ''),
(25, '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '', '', '', '', 'complicated', '', '', '', '', '', '', ''),
(24, '', '', '', '', 'complicated', '', '', '', '', '', '', ''),
(12, '', '', 'Gorakhpur', 'Ghazipur', 'complicated', '', 'MMMUT', 'India', 'male', '', '', ''),
(12, '', '', 'Gorakhpur', 'Ghazipur', 'complicated', '', 'MMMUT', 'India', 'male', '', '', ''),
(12, '', '', '', 'Ghazipur', 'complicated', '', 'MMMUT', 'India', 'male', '', '', ''),
(12, '', '', '', 'Ghazipur', 'complicated', '', '', 'India', 'male', '', '', ''),
(12, '', '', '', '', 'complicated', '', '', 'India', 'male', '', '', ''),
(12, '', '', '', '', 'complicated', '', '', 'India', 'male', '', '', ''),
(12, '', '', '', '', 'complicated', '', '', '', 'male', '', '', ''),
(12, '', '', '', '', '', '', '', '', 'male', '', '', ''),
(3, '', '', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', '', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', 'single', '', '', '', '', '', '', ''),
(31, '', '', 'gorakhpur', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(3, '', '', '', '', 'complicated', '', '', '', '', '', '', '2016-07-26'),
(9, '', 'Holy Cross', 'Gorakhpur', '', '', '', '', '', '', '', '', ''),
(9, '', 'Holy Cross', 'Gorakhpur', '', '', '', '', '', '', '', '', ''),
(9, '', '', 'Gorakhpur', '', '', '', '', '', '', '', '', ''),
(41, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '', '', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', '', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', '', 'GORAKHPUR', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', '', '', '', 'complicated', '', 'MMMUT', '', 'male', '', '', ''),
(20, '', '', '', '', 'complicated', '', '', '', 'male', '', '', ''),
(20, '', '', '', '', 'complicated', '', '', '', '', '', '', ''),
(55, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_notice`
--

CREATE TABLE IF NOT EXISTS `user_notice` (
  `notice_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `notice_txt` varchar(200) NOT NULL,
  `notice_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_notice`
--

INSERT INTO `user_notice` (`notice_id`, `user_id`, `notice_txt`, `notice_time`) VALUES
(1, 3, 'sdsadasdsadas', '0000-00-00 00:00:00'),
(2, 7, 'PALLAVI PLEASE LEARN PHP FAST', '0000-00-00 00:00:00'),
(3, 54, 'please give  your identifiable username', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE IF NOT EXISTS `user_notification` (
  `user_id` int(11) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nid`),
  KEY `user_notification_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`user_id`, `notification`, `nid`) VALUES
(1, 'YOUR ADMIN PRIVILEDGE HAS BEEN REVOKED', 59),
(4, 'YOUR ADMIN PRIVILEDGE HAS BEEN REVOKED...', 124),
(4, 'YOU HAVE BEEN PROVIDED THE ADMIN PRIVILEDGE ...PLEASE LOGIN WITH USERNAME AND PASSWORD TO admin_index.php', 125),
(15, 'Supratim Bhattacharya has liked  your post', 137),
(4, 'Supratim Bhattacharya has liked  your post', 150),
(4, 'Supratim Bhattacharya has commented on your post', 151),
(4, 'Supratim Bhattacharya has commented on your post', 152),
(4, 'Pallavi has liked  your post', 154),
(4, 'YOUR ADMIN PRIVILEDGE HAS BEEN REVOKED...', 162),
(4, 'YOU HAVE BEEN PROVIDED THE ADMIN PRIVILEDGE ...PLEASE LOGIN WITH USERNAME AND PASSWORD TO admin_index.php', 163),
(3, 'A NOTICE HAS BEEN SENT TO YOU PLEASE VISIT THE NOTICE SECTION', 240),
(3, 'Rahul has commented on your post', 241),
(3, 'Rahul has liked  your post', 242),
(3, 'Aman has liked  your post', 243),
(3, 'Pallavi has liked  your post', 244),
(7, 'A NOTICE HAS BEEN SENT TO YOU PLEASE VISIT THE NOTICE SECTION', 245),
(3, 'Pallavi has commented on your post', 246),
(47, 'Supratim Bhattacharya has commented on your post', 248),
(3, 'Agnivesh kumar Tiwari has liked  your post', 249),
(47, 'Agnivesh kumar Tiwari has liked  your post', 250),
(13, 'Aman has liked  your post', 251),
(44, 'Agnivesh kumar Tiwari has commented on your post', 259),
(44, 'Agnivesh kumar Tiwari has liked  your post', 260),
(7, 'Abhishek Anand has commented on your post', 261),
(7, 'Abhishek Anand has commented on your post', 262),
(20, 'suraj kumar has liked  your post', 263),
(54, 'A NOTICE HAS BEEN SENT TO YOU PLEASE VISIT THE NOTICE SECTION', 264),
(53, 'Supratim Bhattacharya has liked  your post', 265),
(55, 'YOU HAVE BEEN PROVIDED THE ADMIN PRIVILEDGE ...PLEASE LOGIN WITH USERNAME AND PASSWORD TO admin_index.php', 266),
(55, 'Supratim Bhattacharya has liked  your post', 267),
(55, 'Supratim Bhattacharya has commented on your post', 268);

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE IF NOT EXISTS `user_post` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `post_txt` text NOT NULL,
  `post_pic` varchar(200) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `priority` varchar(255) NOT NULL DEFAULT 'public',
  PRIMARY KEY (`post_id`),
  KEY `user_post_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_txt`, `post_pic`, `post_time`, `priority`) VALUES
(28, 7, 'Good evening frnds', '', '0000-00-00 00:00:00', 'public'),
(29, 4, 'Hi all my frnds!!!', '', '0000-00-00 00:00:00', 'public'),
(33, 3, 'Hi', '', '0000-00-00 00:00:00', 'public'),
(35, 7, 'Hi frnds...Is everything fine with all', '', '0000-00-00 00:00:00', 'public'),
(36, 7, 'Tell guise wat happened\r\n', '', '0000-00-00 00:00:00', 'public'),
(37, 7, 'Hi', '', '0000-00-00 00:00:00', 'public'),
(39, 11, 'hello', '', '0000-00-00 00:00:00', 'public'),
(40, 3, 'degusdhfusedgfsi', '', '0000-00-00 00:00:00', 'public'),
(41, 13, 'hi frndzs ', '', '0000-00-00 00:00:00', 'public'),
(42, 14, 'hi guyz', '', '0000-00-00 00:00:00', 'public'),
(44, 16, 'gazab bhai\r\n', '', '0000-00-00 00:00:00', 'public'),
(59, 17, 'hell ya where is my dp u developer', '', '0000-00-00 00:00:00', 'Public'),
(64, 21, 'suppu lage raho', '', '0000-00-00 00:00:00', 'Public'),
(65, 24, 'hi frnds welcom to this new world palzone', '', '0000-00-00 00:00:00', 'Public'),
(67, 15, '#testing_post', '', '0000-00-00 00:00:00', 'Public'),
(69, 29, 'hello', '', '0000-00-00 00:00:00', 'Public'),
(70, 31, 'hey palllies!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '', '0000-00-00 00:00:00', 'Public'),
(71, 32, 'check this out - www.cpclips.com', '', '0000-00-00 00:00:00', 'Public'),
(72, 15, 'Feeling Hungry', '', '0000-00-00 00:00:00', 'Public'),
(73, 44, 'Bang bouyyyy', '', '0000-00-00 00:00:00', 'Public'),
(74, 3, 'hi frnds', '', '0000-00-00 00:00:00', 'Public'),
(75, 3, 'GOOD MORNING PALLIES', '', '0000-00-00 00:00:00', 'Public'),
(76, 4, 'HEY WAT ABOUT U ALL...ARE U ALL ENJOYING', '', '0000-00-00 00:00:00', 'Public'),
(77, 3, 'JIDAWDIWDJWQIJDWQJDOWQ', '', '0000-00-00 00:00:00', 'Public'),
(78, 47, 'Hey pallies', '', '0000-00-00 00:00:00', 'Public'),
(79, 20, 'hello friends', '', '0000-00-00 00:00:00', 'Public'),
(80, 53, 'hello frd', '', '0000-00-00 00:00:00', 'Public'),
(81, 55, 'check out : randomangle.com', '', '0000-00-00 00:00:00', 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment`
--

CREATE TABLE IF NOT EXISTS `user_post_comment` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `post_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_post_comment_ibfk_1` (`user_id`),
  KEY `user_post_comment_ibfk_2` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `user_post_comment`
--

INSERT INTO `user_post_comment` (`comment_id`, `post_id`, `user_id`, `comment`) VALUES
(17, 28, 7, 'hahahaha'),
(18, 28, 3, 'kya hahahahah???'),
(19, 28, 4, 'hohohoho'),
(21, 29, 4, 'hehehe'),
(23, 33, 3, 'xfxfxd'),
(24, 33, 3, 'xfxfxd'),
(25, 36, 7, 'heheheh'),
(26, 36, 7, 'tell tell'),
(27, 36, 4, 'hehe'),
(28, 36, 4, 'hehe'),
(31, 35, 3, 'sdsds'),
(32, 35, 3, 'sdsds'),
(33, 28, 3, 'hahha'),
(35, 35, 7, 'hfkehfkrehkef'),
(37, 36, 3, 'vdwgjcgde'),
(39, 36, 11, 'hey'),
(40, 39, 3, 'sdfcsdfsdf'),
(41, 40, 13, 'hmm'),
(42, 39, 13, 'bsdk'),
(43, 39, 3, 'sfsfsdfsd'),
(44, 40, 3, 'ddcbjsdbcsdc'),
(45, 41, 3, 'hi arun'),
(47, 41, 14, 'hi arun'),
(48, 42, 3, 'gfbfghfd'),
(49, 41, 16, 'arun :)'),
(61, 42, 3, 'zxzxzs'),
(62, 42, 3, 'zxzxzs'),
(63, 59, 9, 'cfdsfsdfd'),
(65, 59, 20, 'aur dost kya hal hai........'),
(66, 59, 25, 'ggg'),
(67, 67, 21, 'HIIIII'),
(68, 67, 31, '1 2 4 mic testing'),
(71, 71, 3, 'Ya sure! man'),
(72, 71, 44, 'yughj'),
(73, 37, 7, 'hi guyz'),
(74, 37, 3, 'hi guyz'),
(76, 40, 7, 'fjsdijfsifds'),
(77, 35, 3, 'zxbcxczxslcsacsn'),
(78, 71, 44, 'hdjdjddjdiieidujdd'),
(79, 73, 44, 'ahdhsjs'),
(81, 40, 44, 'hdjjsjsjsjjejsj'),
(82, 73, 3, 'tbdjfjf'),
(83, 74, 3, 'asnasasdas'),
(84, 74, 3, 'nzxxksncsndcsd'),
(86, 74, 7, 'sdhshdesid'),
(87, 75, 4, 'good mrng my frnd'),
(88, 76, 3, 'no man....we are sucked up'),
(90, 76, 4, 'heheh wat happened man...?'),
(91, 76, 3, 'teachers are sucking.....'),
(92, 75, 4, 'bybye frnd...gotta go'),
(93, 75, 7, 'gud morning'),
(94, 74, 32, 'shdashdasd'),
(95, 71, 3, 'plz add cpyoutube for downloading from youtube'),
(96, 77, 4, 'nsdcsdfnsf'),
(97, 77, 7, 'ddfefeferf'),
(98, 73, 3, 'hgdfjhgfjgdsh'),
(99, 78, 3, 'Welcome Sattyam'),
(101, 73, 20, 'haaaaaaaaaa'),
(103, 64, 20, 'abe photo upload kar lo...'),
(104, 79, 20, 'mazze ba sab kuch.......'),
(105, 64, 21, 'nahi be nahi karenge'),
(106, 79, 21, 'zutta marenge fenk ke'),
(107, 64, 21, 'sasur ke bila gaye kya???'),
(108, 79, 20, 'zutta kha lo be....'),
(109, 73, 20, 'aur be ka ho raha haii'),
(111, 36, 12, 'heheh'),
(112, 81, 3, 'okey bro');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_status`
--

CREATE TABLE IF NOT EXISTS `user_post_status` (
  `status_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `user_post_status_ibfk_1` (`user_id`),
  KEY `user_post_status_ibfk_2` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `user_post_status`
--

INSERT INTO `user_post_status` (`status_id`, `user_id`, `post_id`, `status`) VALUES
(61, 7, 35, 'Like'),
(62, 7, 36, 'Like'),
(64, 7, 28, 'Like'),
(65, 7, 28, 'Like'),
(66, 7, 33, 'Like'),
(67, 7, 33, 'Like'),
(68, 3, 36, 'Like'),
(69, 3, 33, 'Like'),
(70, 3, 29, 'Like'),
(71, 3, 29, 'Like'),
(72, 3, 29, 'Like'),
(73, 3, 29, 'Like'),
(74, 3, 35, 'Like'),
(76, 3, 28, 'Like'),
(78, 11, 39, 'Like'),
(79, 3, 39, 'Like'),
(80, 13, 40, 'Like'),
(81, 13, 39, 'Like'),
(83, 13, 33, 'Like'),
(84, 3, 41, 'Like'),
(86, 14, 42, 'Like'),
(87, 14, 41, 'Like'),
(88, 15, 42, 'Like'),
(90, 16, 39, 'Like'),
(91, 16, 41, 'Like'),
(92, 17, 59, 'Like'),
(95, 18, 59, 'Like'),
(96, 18, 42, 'Like'),
(98, 20, 59, 'Like'),
(99, 20, 44, 'Like'),
(100, 27, 64, 'Like'),
(101, 25, 65, 'Like'),
(102, 25, 64, 'Like'),
(103, 15, 67, 'Like'),
(104, 3, 69, 'Like'),
(105, 3, 67, 'Like'),
(106, 3, 65, 'Like'),
(107, 31, 70, 'Like'),
(108, 31, 69, 'Like'),
(109, 31, 67, 'Like'),
(110, 32, 69, 'Like'),
(111, 32, 70, 'Like'),
(112, 3, 70, 'Like'),
(113, 3, 71, 'Like'),
(116, 3, 37, 'Like'),
(117, 7, 37, 'Like'),
(118, 3, 72, 'Like'),
(119, 15, 72, 'Like'),
(121, 7, 40, 'Like'),
(122, 3, 40, 'Like'),
(123, 3, 73, 'Like'),
(124, 44, 73, 'Like'),
(125, 3, 74, 'Like'),
(126, 7, 74, 'Like'),
(127, 3, 75, 'Like'),
(128, 4, 75, 'Like'),
(130, 4, 76, 'Like'),
(131, 3, 76, 'Like'),
(132, 7, 76, 'Like'),
(133, 7, 75, 'Like'),
(134, 32, 75, 'Like'),
(135, 4, 77, 'Like'),
(137, 9, 77, 'Like'),
(138, 7, 77, 'Like'),
(139, 20, 77, 'Like'),
(140, 20, 78, 'Like'),
(141, 3, 79, 'Like'),
(142, 9, 41, 'Like'),
(143, 21, 79, 'Like'),
(144, 20, 79, 'Like'),
(145, 20, 64, 'Like'),
(146, 20, 64, 'Like'),
(147, 20, 73, 'Like'),
(148, 3, 77, 'Like'),
(149, 53, 79, 'Like'),
(150, 3, 80, 'Like'),
(151, 3, 81, 'Like');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE IF NOT EXISTS `user_profile_pic` (
  `profile_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_profile_pic_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `user_profile_pic`
--

INSERT INTO `user_profile_pic` (`profile_id`, `user_id`, `image`, `image_path`) VALUES
(21, 3, '02-08-2016-1470163762.jpg', 'images/02-08-2016-1470163762.jpg'),
(22, 3, '02-08-2016-1470163762.jpg', 'images/02-08-2016-1470163762.jpg'),
(23, 4, '05-07-2016-1467705347.jpg', 'images/05-07-2016-1467705347.jpg'),
(24, 11, '12-07-2016-1468302832.png', 'images/12-07-2016-1468302832.png'),
(25, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(26, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(27, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(28, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(29, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(30, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(31, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(32, 14, '18-07-2016-1468852822.png', 'images/18-07-2016-1468852822.png'),
(33, 12, '24-07-2016-1469378722.jpg', './images/24-07-2016-1469378722.jpg'),
(34, 12, '24-07-2016-1469378722.jpg', './images/24-07-2016-1469378722.jpg'),
(35, 12, '24-07-2016-1469378722.jpg', './images/24-07-2016-1469378722.jpg'),
(36, 12, '24-07-2016-1469378722.jpg', './images/24-07-2016-1469378722.jpg'),
(46, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(47, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(48, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(49, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(50, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(51, 9, '24-07-2016-1469377264.jpg', './images/24-07-2016-1469377264.jpg'),
(52, 17, '23-07-2016-1469257374.png', 'images/23-07-2016-1469257374.png'),
(54, 28, '24-07-2016-1469378789.jpg', './images/24-07-2016-1469378789.jpg'),
(55, 12, '24-07-2016-1469378722.jpg', './images/24-07-2016-1469378722.jpg'),
(56, 28, '24-07-2016-1469378789.jpg', './images/24-07-2016-1469378789.jpg'),
(57, 28, '', ''),
(58, 28, '', ''),
(59, 9, '', ''),
(60, 23, '24-07-2016-1469383759.jpg', './images/24-07-2016-1469383759.jpg'),
(61, 9, '', ''),
(62, 9, '', ''),
(63, 23, '24-07-2016-1469383759.jpg', './images/24-07-2016-1469383759.jpg'),
(64, 23, '24-07-2016-1469383759.jpg', './images/24-07-2016-1469383759.jpg'),
(65, 21, '', ''),
(66, 29, '25-07-2016-1469456509.png', './images/25-07-2016-1469456509.png'),
(67, 30, '', ''),
(71, 31, '24-07-2016-1469394203.jpg', './images/24-07-2016-1469394203.jpg'),
(72, 31, '', ''),
(73, 32, '25-07-2016-1469430335.jpg', './images/25-07-2016-1469430335.jpg'),
(77, 29, '25-07-2016-1469456509.png', './images/25-07-2016-1469456509.png'),
(80, 9, '', ''),
(81, 40, '', ''),
(82, 41, '', ''),
(84, 42, '', ''),
(85, 42, '', ''),
(86, 43, '25-07-2016-1469492759', './images/25-07-2016-1469492759'),
(87, 43, '25-07-2016-1469492759', './images/25-07-2016-1469492759'),
(93, 7, '28-07-2016-1469697566.png', './images/28-07-2016-1469697566.png'),
(95, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(96, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(97, 13, '28-07-2016-1469725882.jpg', './images/28-07-2016-1469725882.jpg'),
(99, 7, '', ''),
(101, 7, '', ''),
(107, 15, '07-08-2016-1470596256.jpg', './images/07-08-2016-1470596256.jpg'),
(109, 45, '', ''),
(111, 7, '', ''),
(113, 7, '', ''),
(114, 7, '', ''),
(116, 7, '', ''),
(125, 3, '02-08-2016-1470163762.jpg', 'images/02-08-2016-1470163762.jpg'),
(127, 7, '', ''),
(128, 7, '', ''),
(129, 3, '02-08-2016-1470163762.jpg', 'images/02-08-2016-1470163762.jpg'),
(131, 4, '', ''),
(133, 4, '', ''),
(135, 4, '', ''),
(137, 7, '', ''),
(140, 32, '', ''),
(142, 32, '', ''),
(143, 32, '', ''),
(145, 7, '', ''),
(147, 3, '', ''),
(148, 3, '', ''),
(149, 3, '', ''),
(150, 3, '', ''),
(151, 3, '', ''),
(152, 3, '', ''),
(153, 4, '', ''),
(154, 3, '', ''),
(155, 3, '', ''),
(156, 3, '', ''),
(157, 7, '', ''),
(158, 9, '', ''),
(159, 7, '', ''),
(160, 7, '', ''),
(161, 3, '', ''),
(162, 7, '', ''),
(163, 3, '', ''),
(164, 7, '', ''),
(165, 3, '', ''),
(166, 3, '', ''),
(167, 3, '', ''),
(168, 3, '', ''),
(169, 3, '', ''),
(170, 3, '', ''),
(171, 3, '', ''),
(172, 3, '', ''),
(173, 3, '', ''),
(175, 31, '', ''),
(176, 3, '', ''),
(177, 9, '', ''),
(178, 3, '', ''),
(179, 3, '', ''),
(180, 47, '', ''),
(181, 3, '', ''),
(182, 3, '', ''),
(183, 4, '', ''),
(184, 4, '', ''),
(185, 3, '', ''),
(187, 31, '', ''),
(188, 31, '', ''),
(189, 4, '', ''),
(190, 3, '', ''),
(191, 3, '', ''),
(192, 4, '', ''),
(194, 48, '', ''),
(195, 3, '', ''),
(196, 4, '', ''),
(198, 3, '', ''),
(200, 13, '', ''),
(201, 4, '', ''),
(202, 3, '', ''),
(203, 3, '', ''),
(204, 47, '', ''),
(205, 4, '', ''),
(206, 7, '', ''),
(207, 49, '', ''),
(208, 3, '', ''),
(209, 3, '', ''),
(210, 7, '', ''),
(211, 3, '', ''),
(212, 9, '', ''),
(213, 9, '07-08-2016-1470591996.jpg', './images/07-08-2016-1470591996.jpg'),
(214, 50, '', ''),
(215, 3, '', ''),
(216, 3, '', ''),
(219, 15, '07-08-2016-1470596256.jpg', './images/07-08-2016-1470596256.jpg'),
(220, 20, '07-08-2016-1470596899.jpg', './images/07-08-2016-1470596899.jpg'),
(222, 44, '07-08-2016-1470596835.png', './images/07-08-2016-1470596835.png'),
(223, 21, '', ''),
(224, 20, '07-08-2016-1470596963.jpg', './images/07-08-2016-1470596963.jpg'),
(225, 51, '', ''),
(226, 3, '', ''),
(227, 3, '', ''),
(228, 15, '', ''),
(229, 7, '', ''),
(230, 12, '', ''),
(231, 7, '', ''),
(232, 7, '', ''),
(233, 52, '', ''),
(234, 3, '', ''),
(235, 3, '', ''),
(236, 53, '', ''),
(237, 3, '', ''),
(238, 3, '11-08-2016-1470933682.png', './images/11-08-2016-1470933682.png'),
(239, 54, '', ''),
(240, 3, '', ''),
(241, 55, '12-08-2016-1471026807.bmp', './images/12-08-2016-1471026807.bmp'),
(242, 3, '', ''),
(243, 3, '', ''),
(244, 3, '', ''),
(245, 7, '', ''),
(246, 31, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_question`
--

CREATE TABLE IF NOT EXISTS `user_question` (
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `score` bigint(20) NOT NULL,
  KEY `user_question_ibfk_1` (`uid`),
  KEY `user_question_ibfk_2` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_id` int(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD CONSTRAINT `group_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `user_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD CONSTRAINT `user_post_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_status_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD CONSTRAINT `user_profile_pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_question`
--
ALTER TABLE `user_question`
  ADD CONSTRAINT `user_question_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_question_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

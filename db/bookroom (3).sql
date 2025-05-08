-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 04:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `adminID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`adminID`, `email`, `password`, `fname`, `profile_pic`, `birthday`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin', 'logo.jpg', '0'),
(2, 'admin2@gmail.com', 'admin', 'Admin2', 'logo.jpg', '0'),
(3, 'member@gmail.com', 'member123', 'charles', '', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `author_account`
--

CREATE TABLE `author_account` (
  `authorID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `downloaded_books` int(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `fav_author_name` varchar(25) NOT NULL,
  `fav_book_title` varchar(25) NOT NULL,
  `fav_author_pic` varchar(25) NOT NULL,
  `fav_book_cover` varchar(25) NOT NULL,
  `account_status` varchar(11) NOT NULL,
  `total_books_posted` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `security_question` varchar(1000) NOT NULL,
  `security_answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author_account`
--

INSERT INTO `author_account` (`authorID`, `email`, `password`, `fname`, `profile_pic`, `downloaded_books`, `birthday`, `phone_number`, `gender`, `fav_author_name`, `fav_book_title`, `fav_author_pic`, `fav_book_cover`, `account_status`, `total_books_posted`, `location`, `security_question`, `security_answer`) VALUES
(1, 'author1@gmail.com', 'author', 'William', 'logo.jpg', 999, '11/12/2002', 0, 'Male', '', '', '', '', '', 0, 'Metro Manila', 'Who is your Mother?', 'Jenice'),
(2, 'author2@gmail.com', 'author', 'Hamster', 'logo.jpg', 989, '07/28/1992', 0, '', '', '', '', '', '', 0, '', '', ''),
(3, 'author3@gmail.com', 'author', 'James', 'logo.jpg', 950, '01/11/1999', 0, '', '', '', '', '', '', 0, '', '', ''),
(4, 'author4@gmail.com', 'author', 'Jerich', 'logo.jpg', 910, '08/15/2019', 0, '', '', '', '', '', '', 0, '', '', ''),
(5, 'author5@gmail.com', 'author', 'Leonor', 'logo.jpg', 870, '05/26/2005', 0, '', '', '', '', '', '', 0, '', '', ''),
(6, 'Hermoso@gmail.com', 'clarence', 'Clarence        ', 'logo.jpg', 0, '', 0, '', '', '', '', '', '', 0, '', '', ''),
(7, 'admin@gmail.com', 'admin', 'Clarence', '', 0, '1111-11-11', 0, 'Male', '', '', '', '', '', 0, '', '', ''),
(8, 'charles@gmail.com', 'asd', 'Clarences', '', 0, '1111-11-11', 0, 'Female', '', '', '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Title` varchar(255) NOT NULL,
  `bookID` int(255) NOT NULL,
  `authorID` int(255) NOT NULL,
  `downloaded_books` int(255) NOT NULL,
  `date_published` date NOT NULL,
  `status` varchar(11) NOT NULL,
  `bookCOVER` varchar(255) NOT NULL,
  `About` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Title`, `bookID`, `authorID`, `downloaded_books`, `date_published`, `status`, `bookCOVER`, `About`, `category`, `language`) VALUES
('Les Entremondes', 1, 1, 24, '2025-02-24', 'available', 'book-1.png', 'The Escapers Books is a digital platform centered  around  the Alien Investors series, offering fans immersive reading experience. It features personalized book recommendations, interactive content,and secrueaccess uisng face recognition, voice commands, and fingerprint autentication. The platform allowss users to explore the Alien invstors universe, track their reading progress and enggae with other fans in discussions.', 'SCIENCE', 'English'),
('The Ten Riddles of Earth Quicksmith', 2, 1, 10, '2025-02-24', 'available', 'book-2.png', 'The Escapers Books is a digital platform centered  around  the Alien Investors series, offering fans immersive reading experience. It features personalized book recommendations, interactive content,and secrueaccess uisng face recognition, voice commands, and fingerprint autentication. The platform allowss users to explore the Alien invstors universe, track their reading progress and enggae with other fans in discussions.', 'SCIENCE', 'English'),
('Subok lang', 3, 1, 0, '2025-02-24', 'archive', '', 'Hello Im under the water ', 'SCIENCE', 'English'),
('Not in Love', 4, 3, 123, '2025-02-24', 'available', 'notinlve.jpg', 'Rue Siebert might not have it all, but she has enough: a few friends she can always count on, the financial stability she yearned for as a kid, and a successful career as a biotech engineer at Kline, one of the most promising start-ups in the field of food science. Her world is stable, pleasant, and hard-fought. Until a hostile takeover and its offensively attractive front man threatens to bring it all crumbling down.\r\n', 'NOVEL', 'English'),
('The Fury', 5, 4, 123, '2025-02-24', 'available', 'thefury.jpg', 'A masterfully paced thriller about a reclusive ex–movie star and her famous friends whose spontaneous trip to a private Greek island is upended by a murder ― from the #1 New York Times bestselling author of The Silent Patient.\r\n', 'NARRATIVE', 'English'),
('Daydream', 6, 5, 123, '2025-02-24', 'available', 'daydream.jpg', 'When his procrastination lands him in a difficult class with his least favorite professor, Henry Turner knows he’s going to have to work extra hard to survive his junior year of college. And now with his new title of captain for the hockey team—which he didn’t even want—Henry absolutely cannot fail. Enter Halle Jacobs, a fellow junior who finds herself befriended by Henry when he accidentally crashes her book club.\r\n', 'NARRATIVE', 'English'),
('Lady Macbeth', 7, 6, 123, '2025-02-24', 'available', 'ladymacbeth.jpg', 'From #1 New York Times bestselling author Ava Reid comes a reimagining of Lady Macbeth, Shakespeare’s most famous villainess, giving her a voice, a past, and a power that transforms the story men have written for her.\r\n', 'SCIENCE', 'English'),
('Wild Love', 8, 7, 123, '2025-02-24', 'available', 'wildlove.jpg', 'Forbes may have labeled Ford Grant the Worlds Hottest Billionaire, but all he cares about is escaping the press and opening a recording studio in gorgeous small town Rose Hill. Something that comes to a screeching halt when he ends up face-to-face with a young girl who claims he is her biological father.\r\n', 'SCIENCE', 'English'),
('Subok lang', 9, 1, 0, '2025-04-07', 'archive', '', 'Hello Im under the water ', 'FANTASY', 'English'),
('Subok lang', 10, 1, 0, '2025-04-07', 'archive', '', 'Hello Im under the water ', 'FANTASY', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `memberID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `downloaded_books` int(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `fav_author_name` varchar(25) NOT NULL,
  `fav_book_title` varchar(25) NOT NULL,
  `fav_author_pic` varchar(25) NOT NULL,
  `fav_book_cover` varchar(25) NOT NULL,
  `account_status` varchar(11) NOT NULL,
  `total_books_posted` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `security_question` varchar(1000) NOT NULL,
  `security_answer` varchar(1000) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_account`
--

INSERT INTO `member_account` (`memberID`, `email`, `password`, `fname`, `profile_pic`, `downloaded_books`, `birthday`, `phone_number`, `gender`, `fav_author_name`, `fav_book_title`, `fav_author_pic`, `fav_book_cover`, `account_status`, `total_books_posted`, `location`, `security_question`, `security_answer`, `lname`) VALUES
(1, 'Smith@gmail.com', 'smith', 'Smith', 'sarahduterte.jpeg', 0, '2002-11-07', 0, 'Male', '', '', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recent_logs`
--

CREATE TABLE `recent_logs` (
  `timestamp` varchar(255) NOT NULL,
  `ID` int(255) NOT NULL,
  `ACTION` varchar(255) NOT NULL,
  `The_time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_logs`
--

INSERT INTO `recent_logs` (`timestamp`, `ID`, `ACTION`, `The_time`) VALUES
('02-20-2025 01:34 ', 1, 'Login', 32),
('02-20-2025 01:37 ', 1, 'Login', 33),
('02-20-2025 01:48 ', 1, 'Login', 34),
('02-20-2025 01:48 ', 1, 'Login', 35),
('02-20-2025 01:50 ', 1, 'Login', 36),
('02-20-2025 02:10 ', 1, 'Logout', 37),
('02-20-2025 06:05 ', 1, 'Login', 38),
('02-20-2025 07:23 ', 1, 'Login', 39),
('02-20-2025 07:24 ', 1, 'Login', 40),
('02-21-2025 01:17 ', 1, 'Login', 41),
('02-21-2025 01:20 ', 1, 'Logout', 42),
('02-21-2025 01:25 ', 1, 'Login', 43),
('02-21-2025 01:28 ', 1, 'Login', 44),
('02-21-2025 04:54 ', 1, 'Logout', 45),
('02-21-2025 04:54 ', 1, 'Login', 46),
('02-21-2025 04:54 ', 1, 'Login', 47),
('02-21-2025 04:54 ', 1, 'Logout', 48),
('02-21-2025 04:54 ', 2, 'Login', 49),
('02-21-2025 04:54 ', 2, 'Logout', 50),
('02-21-2025 04:54 ', 1, 'Login', 51),
('02-21-2025 04:54 ', 1, 'Logout', 52),
('02-24-2025 01:23 ', 1, 'Login', 53),
('02-24-2025 01:23 ', 1, 'Logout', 54),
('02-24-2025 01:23 ', 1, 'Login', 55),
('02-24-2025 01:24 ', 1, 'Logout', 56),
('02-24-2025 01:25 ', 2, 'Login', 57),
('02-24-2025 01:40 ', 2, 'Logout', 58),
('02-24-2025 01:45 ', 2, 'Login', 59),
('02-24-2025 01:45 ', 2, 'Logout', 60),
('02-24-2025 01:45 ', 1, 'Login', 61),
('02-24-2025 02:12 ', 1, 'Login', 62),
('02-24-2025 02:14 ', 1, 'Login', 63),
('02-24-2025 02:15 ', 1, 'Login', 64),
('02-24-2025 02:16 ', 1, 'Login', 65),
('02-24-2025 02:19 ', 1, 'Login', 66),
('02-24-2025 02:21 ', 1, 'Login', 67),
('02-24-2025 02:23 ', 1, 'Login', 68),
('02-24-2025 02:33 ', 1, 'Logout', 69),
('02-24-2025 02:33 ', 1, 'Login', 70),
('02-24-2025 02:33 ', 1, 'Logout', 71),
('02-24-2025 02:45 ', 1, 'Login', 72),
('02-24-2025 02:51 ', 1, 'Login', 73),
('02-24-2025 03:26 ', 1, 'Login', 74),
('02-24-2025 04:48 ', 1, 'Logout', 75),
('02-24-2025 07:06 ', 1, 'Login', 76),
('02-24-2025 07:06 ', 1, 'Login', 77),
('02-24-2025 07:06 ', 1, 'Login', 78),
('02-24-2025 07:06 ', 1, 'Login', 79),
('02-24-2025 07:06 ', 1, 'Login', 80),
('02-24-2025 07:06 ', 1, 'Login', 81),
('02-24-2025 07:07 ', 1, 'Login', 82),
('04-07-2025 07:43 ', 1, 'Login', 83),
('04-07-2025 07:43 ', 1, 'Logout', 84),
('04-07-2025 07:43 ', 1, 'Login', 85),
('04-07-2025 09:08 ', 1, 'Logout', 86),
('04-07-2025 09:08 ', 3, 'Login', 87),
('04-07-2025 09:08 ', 3, 'Logout', 88),
('04-07-2025 09:08 ', 1, 'Login', 89),
('04-07-2025 09:28 ', 1, 'Logout', 90),
('04-07-2025 09:28 ', 1, 'Login', 91),
('04-07-2025 09:30 ', 1, 'Logout', 92),
('04-07-2025 09:30 ', 1, 'Login', 93),
('04-07-2025 10:18 ', 1, 'Logout', 94),
('04-07-2025 10:18 ', 1, 'Login', 95),
('04-07-2025 10:18 ', 1, 'Logout', 96),
('04-07-2025 10:18 ', 1, 'Login', 97),
('04-07-2025 10:19 ', 1, 'Logout', 98),
('04-07-2025 10:19 ', 1, 'Login', 99),
('04-07-2025 10:20 ', 1, 'Logout', 100),
('04-07-2025 10:21 ', 1, 'Login', 101),
('04-07-2025 10:22 ', 1, 'Logout', 102),
('04-07-2025 10:22 ', 1, 'Login', 103),
('04-07-2025 10:26 ', 1, 'Logout', 104),
('04-07-2025 10:26 ', 1, 'Login', 105),
('04-07-2025 10:26 ', 1, 'Logout', 106),
('04-07-2025 10:26 ', 2, 'Login', 107);

-- --------------------------------------------------------

--
-- Table structure for table `save_book`
--

CREATE TABLE `save_book` (
  `memberID` int(255) NOT NULL,
  `savedBookID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `save_book`
--

INSERT INTO `save_book` (`memberID`, `savedBookID`) VALUES
(0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `author_account`
--
ALTER TABLE `author_account`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `recent_logs`
--
ALTER TABLE `recent_logs`
  ADD PRIMARY KEY (`The_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `adminID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `author_account`
--
ALTER TABLE `author_account`
  MODIFY `authorID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `memberID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recent_logs`
--
ALTER TABLE `recent_logs`
  MODIFY `The_time` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

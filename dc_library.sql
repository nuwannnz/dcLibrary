-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2016 at 08:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(3) NOT NULL,
  `author_fname` varchar(10) NOT NULL,
  `author_lname` varchar(10) NOT NULL,
  `author_description` text NOT NULL,
  `author_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_fname`, `author_lname`, `author_description`, `author_image`) VALUES
(1, 'kennwood', 'newman', '', 'author(1).png'),
(2, 'cary', 'clerk', '', 'author(2).png'),
(3, 'newman', 'newman', '', 'author(3).png'),
(4, 'clerk', 'kennedy', '', 'author(4).png'),
(5, 'kennedy', 'cary', '', 'author(5).png'),
(6, 'newton', 'clerk', '', 'author(6).png'),
(7, 'peter', 'john', '', 'author(7).png'),
(8, 'kennwood', 'newman', '', 'author(8).png'),
(9, 'clerk', 'kennedy', '', 'author(9).png'),
(10, 'peter', 'newman', '', 'author(10).png'),
(11, 'clerk', 'newton', '', 'author(11).png'),
(12, 'clerk', 'clerk', '', 'author(12).png'),
(13, 'john', 'john', '', 'author(13).png'),
(14, 'kennwood', 'john', '', 'author(14).png'),
(15, 'newton', 'john', '', 'author(15).png'),
(16, 'peter', 'cary', '', 'author(16).png'),
(17, 'cary', 'john', '', 'author(17).png'),
(18, 'newman', 'john', '', 'author(18).png'),
(19, 'john', 'kennwood', '', 'author(19).png'),
(20, 'newman', 'cary', '', 'author(20).png'),
(21, 'cary', 'john', '', 'author(21).png'),
(22, 'kennwood', 'clerk', '', 'author(22).png'),
(23, 'kennedy', 'peter', '', 'author(23).png'),
(24, 'peter', 'newton', '', 'author(24).png'),
(25, 'peter', 'john', '', 'author(25).png');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` int(20) NOT NULL,
  `book_title` varchar(30) NOT NULL,
  `book_description` text NOT NULL,
  `published_year` year(4) NOT NULL,
  `genre_id` int(2) NOT NULL,
  `num_of_reads` int(11) NOT NULL,
  `cover_image` varchar(20) DEFAULT NULL,
  `num_of_copies` int(2) NOT NULL,
  `page_count` int(4) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `book_title`, `book_description`, `published_year`, `genre_id`, `num_of_reads`, `cover_image`, `num_of_copies`, `page_count`, `added_date`) VALUES
(38065, 'The Grapes Of Wrath', '', 2016, 11, 0, 'book(12).png', 4, 613, '2016-09-24'),
(48144, 'Brave New World', '', 2016, 15, 0, 'book(13).png', 9, 362, '2016-09-24'),
(69428, 'The Dog In The Night Time', '', 2016, 19, 0, 'book(3).png', 6, 442, '2016-09-24'),
(78809, 'The Grapes Of Wrath', '', 2016, 13, 0, 'book(12).png', 2, 369, '2016-09-24'),
(89174, 'Horrible, No Good', '', 2016, 9, 0, 'book(13).png', 7, 510, '2016-09-24'),
(94490, 'The Grapes Of Wrath', '', 2016, 5, 0, 'book(10).png', 0, 774, '2016-09-24'),
(108035, 'A Confederacy Of Dunces', '', 2016, 19, 0, 'book(2).png', 9, 435, '2016-09-24'),
(108040, 'Horrible, No Good', '', 2016, 8, 0, 'book(6).png', 7, 549, '2016-09-24'),
(109892, 'Alexander And The Terrible', '', 2016, 9, 0, 'book(3).png', 5, 719, '2016-09-24'),
(111217, 'The Curious Incident', '', 2016, 9, 0, 'book(6).png', 6, 394, '2016-09-24'),
(117442, 'The Curious Incident', '', 2016, 1, 0, 'book(1).png', 10, 704, '2016-09-24'),
(123410, 'To Kill A Mockingbird', '', 2016, 15, 0, 'book(1).png', 0, 561, '2016-09-24'),
(131923, 'Alexander And The Terrible', '', 2016, 12, 0, 'book(7).png', 2, 589, '2016-09-24'),
(134473, 'The Curious Incident', '', 2016, 17, 0, 'book(6).png', 10, 886, '2016-09-24'),
(140116, 'Brave New World', '', 2016, 17, 0, 'book(10).png', 10, 698, '2016-09-24'),
(144165, 'The Curious Incident', '', 2016, 1, 0, 'book(5).png', 3, 516, '2016-09-24'),
(144823, 'The Unbearable Lightness Of Be', '', 2016, 12, 0, 'book(7).png', 1, 449, '2016-09-24'),
(151160, 'The Curious Incident', '', 2016, 8, 0, 'book(4).png', 9, 754, '2016-09-24'),
(151344, 'The Unbearable Lightness Of Be', '', 2016, 14, 0, 'book(9).png', 5, 616, '2016-09-24'),
(152401, 'Horrible, No Good', '', 2016, 1, 0, 'book(10).png', 2, 570, '2016-09-24'),
(156595, 'For Whom The Bell Tolls', '', 2016, 16, 0, 'book(8).png', 0, 465, '2016-09-24'),
(166113, 'Brave New World', '', 2016, 17, 0, 'book(6).png', 7, 676, '2016-09-24'),
(170814, 'For Whom The Bell Tolls', '', 2016, 9, 0, 'book(4).png', 2, 700, '2016-09-24'),
(183781, 'The Unbearable Lightness Of Be', '', 2016, 13, 0, 'book(5).png', 0, 781, '2016-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `isbn` int(20) NOT NULL,
  `author_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`isbn`, `author_id`) VALUES
(38065, 7),
(48144, 18),
(69428, 16),
(78809, 2),
(89174, 11),
(94490, 4),
(94490, 22),
(108035, 19),
(108040, 19),
(109892, 2),
(111217, 13),
(111217, 12),
(117442, 9),
(123410, 19),
(131923, 16),
(134473, 16),
(140116, 8),
(144165, 19),
(144165, 23),
(144823, 10),
(151160, 7),
(151344, 23),
(152401, 9),
(156595, 18),
(166113, 9),
(170814, 11),
(183781, 17);

-- --------------------------------------------------------

--
-- Table structure for table `book_checkin`
--

CREATE TABLE `book_checkin` (
  `checkin_id` int(4) NOT NULL,
  `checkout_id` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_checkin`
--

INSERT INTO `book_checkin` (`checkin_id`, `checkout_id`, `date`) VALUES
(1, 0, '2016-09-24'),
(2, 0, '2016-09-24'),
(3, 0, '2016-09-24'),
(4, 0, '2016-09-24'),
(5, 0, '2016-09-24'),
(6, 0, '2016-09-24'),
(7, 0, '2016-09-24'),
(8, 0, '2016-09-24'),
(9, 0, '2016-09-24'),
(10, 0, '2016-09-24'),
(11, 0, '2016-09-24'),
(12, 0, '2016-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `book_checkout`
--

CREATE TABLE `book_checkout` (
  `checkout_id` int(4) NOT NULL,
  `admin_id` int(2) NOT NULL,
  `user_reg_id` int(4) NOT NULL,
  `isbn` int(20) NOT NULL,
  `date` date NOT NULL,
  `return_date` date NOT NULL,
  `is_returned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_checkout`
--

INSERT INTO `book_checkout` (`checkout_id`, `admin_id`, `user_reg_id`, `isbn`, `date`, `return_date`, `is_returned`) VALUES
(1, 1, 0, 151160, '2016-09-24', '2016-09-24', 0),
(2, 2, 0, 152401, '2016-09-24', '2016-09-24', 0),
(3, 2, 0, 156595, '2016-09-24', '2016-09-24', 0),
(4, 1, 0, 144165, '2016-09-24', '2016-09-24', 0),
(5, 2, 0, 144823, '2016-09-24', '2016-09-24', 0),
(6, 1, 0, 109892, '2016-09-24', '2016-09-24', 0),
(7, 1, 0, 144165, '2016-09-24', '2016-09-24', 0),
(8, 1, 0, 144165, '2016-09-24', '2016-09-24', 0),
(9, 2, 0, 170814, '2016-09-24', '2016-09-24', 0),
(10, 1, 0, 78809, '2016-09-24', '2016-09-24', 0),
(11, 1, 0, 170814, '2016-09-24', '2016-09-24', 0),
(12, 1, 0, 69428, '2016-09-24', '2016-09-24', 0),
(13, 1, 0, 48144, '2016-09-24', '2016-09-24', 0),
(14, 2, 0, 166113, '2016-09-24', '2016-09-24', 0),
(15, 1, 0, 109892, '2016-09-24', '2016-09-24', 0),
(16, 1, 0, 94490, '2016-09-24', '2016-09-24', 0),
(17, 2, 0, 89174, '2016-09-24', '2016-09-24', 0),
(18, 1, 0, 89174, '2016-09-24', '2016-09-24', 0),
(19, 1, 0, 123410, '2016-09-24', '2016-09-24', 0),
(20, 1, 0, 134473, '2016-09-24', '2016-09-24', 0),
(21, 2, 0, 151160, '2016-09-24', '2016-09-24', 0),
(22, 1, 0, 38065, '2016-09-24', '2016-09-24', 0),
(23, 1, 0, 134473, '2016-09-24', '2016-09-24', 0),
(24, 1, 0, 38065, '2016-09-24', '2016-09-24', 0),
(25, 2, 0, 89174, '2016-09-24', '2016-09-24', 0),
(26, 1, 0, 151160, '2016-09-24', '2016-09-24', 0),
(27, 1, 0, 140116, '2016-09-24', '2016-09-24', 0),
(28, 2, 0, 144165, '2016-09-24', '2016-09-24', 0),
(29, 1, 0, 108040, '2016-09-24', '2016-09-24', 0),
(30, 2, 0, 134473, '2016-09-24', '2016-09-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(2) NOT NULL,
  `genre_title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_title`) VALUES
(5, 'Action and'),
(14, 'Anthology'),
(18, 'Art'),
(17, 'Comics'),
(4, 'Drama'),
(16, 'Encycloped'),
(19, 'Fantasy'),
(2, 'fiction'),
(9, 'Guide'),
(13, 'History'),
(8, 'Horror'),
(7, 'Mystery'),
(15, 'Poetry'),
(11, 'Religion'),
(6, 'Romance'),
(3, 'Satire'),
(1, 'Science'),
(12, 'Spirituali'),
(10, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `user_reg_id` int(4) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`user_reg_id`, `fname`, `lname`, `email`) VALUES
(1, 'cary', 'james', 'user_1@email.com'),
(2, 'peter', 'james', 'user_2@email.com'),
(3, 'newton', 'selena', 'user_3@email.com'),
(4, 'john', 'jeny', 'user_4@email.com'),
(5, 'kennwood', 'jeny', 'user_5@email.com'),
(6, 'kennwood', 'perri', 'user_6@email.com'),
(7, 'john', 'madona', 'user_7@email.com'),
(8, 'john', 'jeny', 'user_8@email.com'),
(9, 'peter', 'perri', 'user_9@email.com'),
(10, 'newton', 'wood', 'user_10@email.com'),
(11, 'brooke', 'rowling', 'user_11@email.com'),
(12, 'kennwood', 'jeny', 'user_12@email.com'),
(13, 'peter', 'madona', 'user_13@email.com'),
(14, 'newman', 'potter', 'user_14@email.com'),
(15, 'brooke', 'selena', 'user_15@email.com'),
(16, 'peter', 'wood', 'user_16@email.com'),
(17, 'newman', 'perri', 'user_17@email.com'),
(18, 'kennwood', 'james', 'user_18@email.com'),
(19, 'kennwood', 'potter', 'user_19@email.com'),
(20, 'clerk', 'rowling', 'user_20@email.com'),
(21, 'clerk', 'rowling', 'user_21@email.com'),
(22, 'newton', 'adele', 'user_22@email.com'),
(23, 'newton', 'selena', 'user_23@email.com'),
(24, 'cary', 'potter', 'user_24@email.com'),
(25, 'brooke', 'perri', 'user_25@email.com'),
(26, 'john', 'james', 'user_26@email.com'),
(27, 'newton', 'rowling', 'user_27@email.com'),
(28, 'newman', 'adele', 'user_28@email.com'),
(29, 'cary', 'jeny', 'user_29@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `isbn` int(20) NOT NULL,
  `user_reg_id` int(4) NOT NULL,
  `content` text NOT NULL,
  `rating` decimal(5,1) NOT NULL DEFAULT '0.0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_reg_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_image` varchar(30) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_reg_id`, `username`, `password`, `user_image`, `score`) VALUES
(1, 'cary1', '2ca1e58763cf7c3d8b011e404d15762aef672c20', 'user(1).png', 0),
(2, 'peter2', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(2).png', 0),
(3, 'newton3', '58eb625d2005707f7f70468fb1658b4fe0907e1b', 'user(3).png', 0),
(4, 'john4', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(4).png', 0),
(5, 'kennwood5', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(5).png', 0),
(6, 'kennwood6', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(6).png', 0),
(7, 'john7', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(7).png', 0),
(8, 'john8', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(8).png', 0),
(9, 'peter9', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(9).png', 0),
(10, 'newton10', '58eb625d2005707f7f70468fb1658b4fe0907e1b', 'user(10).png', 0),
(11, 'brooke11', '24dc32b1f2f31a5c0b81ac6c8eadbe4824639771', 'user(11).png', 0),
(12, 'kennwood12', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(12).png', 0),
(13, 'peter13', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(13).png', 0),
(14, 'newman14', '68bd0cf6ea11b3e5c1d0ae2490b262697ea3fe57', 'user(14).png', 0),
(15, 'brooke15', '24dc32b1f2f31a5c0b81ac6c8eadbe4824639771', 'user(15).png', 0),
(16, 'peter16', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(16).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_book_list`
--

CREATE TABLE `user_book_list` (
  `isbn` int(20) NOT NULL,
  `user_reg_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `user_reg_id` int(4) NOT NULL,
  `follower_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_genre`
--

CREATE TABLE `user_genre` (
  `user_id` int(4) NOT NULL,
  `genre_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_read`
--

CREATE TABLE `user_read` (
  `user_reg_id` int(4) NOT NULL,
  `isbn` int(20) NOT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `book_checkin`
--
ALTER TABLE `book_checkin`
  ADD PRIMARY KEY (`checkin_id`);

--
-- Indexes for table `book_checkout`
--
ALTER TABLE `book_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genre_title` (`genre_title`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`user_reg_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_reg_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `book_checkin`
--
ALTER TABLE `book_checkin`
  MODIFY `checkin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `book_checkout`
--
ALTER TABLE `book_checkout`
  MODIFY `checkout_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `user_reg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

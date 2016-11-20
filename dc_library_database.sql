-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2016 at 04:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_library_copy`
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'john', 'john1', '9631c1ef976a1d3c728f1b10ced27243631943ff'),
(2, 'peter', 'peter2', '1adb3f06a5883f48cae6133ff7788153538c900f');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(3) NOT NULL,
  `author_fname` varchar(10) NOT NULL,
  `author_lname` varchar(10) NOT NULL,
  `author_image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_fname`, `author_lname`, `author_image`) VALUES
(1, 'cary', 'wood', 'author(1).png'),
(2, 'newman', 'perri', 'author(2).png'),
(3, 'john', 'potter', 'author(3).png'),
(4, 'newman', 'adele', 'author(4).png'),
(5, 'kennedy', 'madona', 'author(5).png'),
(6, 'peter', 'madona', 'author(6).png'),
(7, 'john', 'rowling', 'author(7).png'),
(8, 'kennedy', 'perri', 'author(8).png'),
(9, 'cary', 'adele', 'author(9).png'),
(10, 'john', 'perri', 'author(10).png'),
(11, 'clerk', 'perri', 'author(11).png'),
(12, 'newman', 'madona', 'author(12).png'),
(13, 'cary', 'perri', 'author(13).png'),
(14, 'cary', 'james', 'author(14).png'),
(15, 'kennedy', 'james', 'author(15).png'),
(16, 'cary', 'madona', 'author(16).png'),
(17, 'kennedy', 'madona', 'author(17).png'),
(18, 'newton', 'madona', 'author(18).png'),
(19, 'newman', 'perri', 'author(19).png'),
(20, 'peter', 'potter', 'author(20).png'),
(21, 'newman', 'rihana', 'author(21).png'),
(22, 'peter', 'madona', 'author(22).png'),
(23, 'newman', 'wood', 'author(23).png'),
(24, 'kennedy', 'madona', 'author(24).png'),
(25, 'newton', 'madona', 'author(25).png');

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
(47036, 'The Unbearable Lightness Of Be', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 3, 338, 'book(3).png', 4, 555, '2016-10-26'),
(52957, 'Think and Grow Rich', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 16, 182, 'book(11).png', 1, 518, '2016-10-25'),
(54427, 'For Whom The Bell Tolls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 8, 147, 'book(7).png', 1, 636, '2016-10-25'),
(72958, 'She: A History of Adventure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2005, 17, 36, 'book(10).png', 0, 336, '2016-10-25'),
(74987, 'The Dog In The Night Time', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 16, 24, 'book(1).png', 3, 264, '2016-10-24'),
(75624, 'Anne of Green Gables', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 4, 118, 'book(16).png', 2, 783, '2016-10-24'),
(76375, 'The Godfather', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 1, 20, 'book(26).png', 9, 228, '2016-10-27'),
(78552, 'Harry Potter and the Deathly H', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1998, 6, 130, 'book(15).png', 7, 473, '2016-10-24'),
(82568, 'The Wind in the Willows', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2010, 1, 112, 'book(24).png', 10, 540, '2016-10-28'),
(89450, 'The Hunger Games', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 15, 8, 'book(25).png', 0, 726, '2016-10-23'),
(93654, 'Jaws', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 19, 178, 'book(27).png', 9, 841, '2016-10-26'),
(93791, 'What to Expect', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1990, 12, 214, 'book(28).png', 9, 694, '2016-10-27'),
(96501, 'The Eagle Has Landed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2005, 7, 89, 'book(17).png', 0, 324, '2016-10-26'),
(105599, 'Valley of the Dolls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 13, 256, 'book(22).png', 7, 599, '2016-10-26'),
(108748, 'To Kill A Mockingbird', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 13, 262, 'book(2).png', 7, 206, '2016-10-27'),
(108916, 'Alexander And The Terrible', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 10, 169, 'book(4).png', 5, 326, '2016-10-25'),
(112630, 'The Adventures of Huckleberry ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2010, 18, 166, 'book(29).png', 6, 871, '2016-10-24'),
(121268, 'A Confederacy Of Dunces', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 14, 170, 'book(6).png', 10, 634, '2016-10-27'),
(124752, 'The Odyssey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2005, 10, 358, 'book(20).png', 2, 874, '2016-10-29'),
(126526, 'The Late, Great Planet Earth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 19, 270, 'book(21).png', 5, 675, '2016-10-29'),
(129928, 'Who Moved My Cheese?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 19, 252, 'book(23).png', 7, 572, '2016-10-28'),
(131639, 'Harry Potter and the Goblet of', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 1, 218, 'book(14).png', 0, 765, '2016-10-28'),
(134193, 'Horrible, No Good', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 2, 334, 'book(5).png', 7, 638, '2016-10-26'),
(148136, 'The Lion, the Witch and the Wa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1995, 11, 295, 'book(9).png', 6, 547, '2016-10-25'),
(151540, 'The Adventures of Sherlock Hol', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 2, 337, 'book(13).png', 1, 338, '2016-10-24'),
(159564, 'Harry Potter and the Half-Bloo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 12, 66, 'book(12).png', 10, 309, '2016-10-26'),
(171265, 'Brave New World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 2, 119, 'book(8).png', 1, 358, '2016-10-25'),
(176886, 'Watership Down', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 7, 380, 'book(18).png', 8, 783, '2016-10-25'),
(191449, 'The Hobbit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 19, 323, 'book(19).png', 3, 283, '2016-10-25');

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
(47036, 18),
(52957, 22),
(54427, 10),
(72958, 3),
(74987, 4),
(75624, 8),
(75624, 12),
(76375, 21),
(78552, 7),
(82568, 9),
(89450, 1),
(89450, 11),
(93654, 4),
(93791, 12),
(96501, 17),
(105599, 21),
(108748, 25),
(108916, 20),
(108916, 1),
(112630, 16),
(121268, 18),
(124752, 11),
(126526, 6),
(129928, 14),
(131639, 2),
(134193, 18),
(148136, 18),
(151540, 5),
(159564, 2),
(171265, 14),
(176886, 15),
(191449, 23);

-- --------------------------------------------------------

--
-- Table structure for table `book_checkin`
--

CREATE TABLE `book_checkin` (
  `checkin_id` int(4) NOT NULL,
  `checkout_id` int(4) NOT NULL,
  `admin_id` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_checkin`
--

INSERT INTO `book_checkin` (`checkin_id`, `checkout_id`, `admin_id`, `date`) VALUES
(1, 11, 2, '2016-10-27'),
(2, 21, 2, '2016-10-28'),
(3, 29, 1, '2016-10-27'),
(4, 18, 2, '2016-10-27'),
(5, 4, 1, '2016-10-27'),
(6, 23, 1, '2016-10-27'),
(7, 25, 1, '2016-10-28'),
(8, 28, 2, '2016-10-27'),
(9, 27, 1, '2016-10-28'),
(10, 16, 1, '2016-10-28'),
(11, 5, 2, '2016-10-28'),
(12, 19, 2, '2016-10-27');

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
(1, 1, 13, 131639, '2016-10-25', '2016-10-28', 0),
(2, 1, 24, 191449, '2016-10-26', '2016-10-27', 0),
(3, 1, 13, 108916, '2016-10-25', '2016-10-27', 0),
(4, 1, 8, 112630, '2016-10-25', '2016-10-27', 1),
(5, 1, 18, 134193, '2016-10-26', '2016-10-27', 1),
(6, 2, 2, 191449, '2016-10-25', '2016-10-28', 0),
(7, 1, 10, 74987, '2016-10-26', '2016-10-28', 0),
(8, 2, 13, 121268, '2016-10-26', '2016-10-28', 0),
(9, 1, 7, 176886, '2016-10-26', '2016-10-28', 0),
(10, 1, 20, 159564, '2016-10-24', '2016-10-27', 0),
(11, 2, 6, 126526, '2016-10-24', '2016-10-28', 1),
(12, 2, 6, 112630, '2016-10-24', '2016-10-27', 0),
(13, 2, 14, 89450, '2016-10-25', '2016-10-27', 0),
(14, 1, 25, 52957, '2016-10-25', '2016-10-27', 0),
(15, 2, 8, 72958, '2016-10-26', '2016-10-28', 0),
(16, 2, 2, 76375, '2016-10-25', '2016-10-28', 1),
(17, 1, 1, 151540, '2016-10-25', '2016-10-28', 0),
(18, 2, 10, 129928, '2016-10-25', '2016-10-27', 1),
(19, 1, 15, 47036, '2016-10-25', '2016-10-27', 1),
(20, 2, 24, 159564, '2016-10-26', '2016-10-28', 0),
(21, 1, 24, 105599, '2016-10-24', '2016-10-28', 1),
(22, 2, 5, 126526, '2016-10-26', '2016-10-28', 0),
(23, 1, 14, 93654, '2016-10-24', '2016-10-28', 1),
(24, 1, 21, 131639, '2016-10-24', '2016-10-27', 0),
(25, 1, 8, 121268, '2016-10-24', '2016-10-27', 1),
(26, 1, 5, 54427, '2016-10-24', '2016-10-27', 0),
(27, 1, 2, 72958, '2016-10-25', '2016-10-28', 1),
(28, 2, 12, 93791, '2016-10-26', '2016-10-27', 1),
(29, 2, 12, 75624, '2016-10-24', '2016-10-28', 1),
(30, 2, 10, 76375, '2016-10-26', '2016-10-27', 0);

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
(1, 'John', 'Jenyp', 'user_1@email.com'),
(2, 'clerk', 'selena', 'user_2@email.com'),
(3, 'john', 'rowling', 'user_3@email.com'),
(4, 'john', 'chester', 'user_4@email.com'),
(5, 'kennwood', 'chester', 'user_5@email.com'),
(6, 'kennwood', 'madona', 'user_6@email.com'),
(7, 'john', 'adele', 'user_7@email.com'),
(8, 'kennedy', 'potter', 'user_8@email.com'),
(9, 'cary', 'adele', 'user_9@email.com'),
(10, 'cary', 'potter', 'user_10@email.com'),
(11, 'kennwood', 'potter', 'user_11@email.com'),
(12, 'kennwood', 'wood', 'user_12@email.com'),
(13, 'cary', 'james', 'user_13@email.com'),
(14, 'newman', 'chester', 'user_14@email.com'),
(15, 'peter', 'rowling', 'user_15@email.com'),
(16, 'cary', 'chester', 'user_16@email.com'),
(17, 'newton', 'jeny', 'user_17@email.com'),
(18, 'clerk', 'wood', 'user_18@email.com'),
(19, 'newman', 'potter', 'user_19@email.com'),
(20, 'brooke', 'selena', 'user_20@email.com'),
(21, 'kennedy', 'james', 'user_21@email.com'),
(22, 'newman', 'jeny', 'user_22@email.com'),
(23, 'newman', 'chester', 'user_23@email.com'),
(24, 'cary', 'jeny', 'user_24@email.com'),
(25, 'kennedy', 'wood', 'user_25@email.com'),
(26, 'newman', 'rihana', 'user_26@email.com'),
(27, 'john', 'perri', 'user_27@email.com'),
(28, 'newton', 'james', 'user_28@email.com'),
(29, 'brooke', 'madona', 'user_29@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `isbn` int(20) NOT NULL,
  `user_reg_id` int(4) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`isbn`, `user_reg_id`, `content`, `rating`, `date`) VALUES
(47036, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-21'),
(47036, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-05'),
(47036, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-10-11'),
(47036, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-06'),
(47036, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-10'),
(52957, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-29'),
(52957, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-18'),
(52957, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-10-18'),
(52957, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-15'),
(52957, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-16'),
(54427, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-05'),
(54427, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-02'),
(54427, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-17'),
(54427, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-10'),
(54427, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-25'),
(72958, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-16'),
(72958, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-14'),
(72958, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-22'),
(72958, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-30'),
(72958, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-12'),
(74987, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-28'),
(74987, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-17'),
(74987, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-26'),
(74987, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-06'),
(74987, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-19'),
(75624, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-30'),
(75624, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-18'),
(75624, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-14'),
(75624, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-01'),
(75624, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-12'),
(76375, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-29'),
(76375, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-10-18'),
(76375, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-09'),
(76375, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-14'),
(76375, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-18'),
(78552, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-31'),
(78552, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-31'),
(78552, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-25'),
(78552, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-03'),
(78552, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-13'),
(82568, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-01'),
(82568, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-12'),
(82568, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-04'),
(82568, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-26'),
(82568, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-10-06'),
(89450, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-30'),
(89450, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-13'),
(89450, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-23'),
(89450, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-20'),
(89450, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-18'),
(93654, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-10-18'),
(93654, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-27'),
(93654, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-28'),
(93654, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-06'),
(93654, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-04'),
(93791, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-10'),
(93791, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-24'),
(93791, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-19'),
(93791, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-25'),
(93791, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-18'),
(96501, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-10-14'),
(96501, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-15'),
(96501, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-09'),
(96501, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-02'),
(96501, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-04'),
(105599, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-10'),
(105599, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-31'),
(105599, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-10-18'),
(105599, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-24'),
(105599, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-17'),
(108748, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-10-01'),
(108748, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-14'),
(108748, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-19'),
(108748, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-03'),
(108748, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-22'),
(108916, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-06'),
(108916, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-16'),
(108916, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-19'),
(108916, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-10-08'),
(108916, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-27'),
(112630, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-27'),
(112630, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-16'),
(112630, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-17'),
(112630, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-23'),
(112630, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-17'),
(121268, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-27'),
(121268, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-29'),
(121268, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-11'),
(121268, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-29'),
(121268, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-01'),
(124752, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-17'),
(124752, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-14'),
(124752, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-08'),
(124752, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-09'),
(124752, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-04'),
(126526, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-30'),
(126526, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-06'),
(126526, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-04'),
(126526, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-21'),
(126526, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-19'),
(129928, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-19'),
(129928, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-16'),
(129928, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-07'),
(129928, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-20'),
(129928, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-28'),
(131639, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-18'),
(131639, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-26'),
(131639, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-16'),
(131639, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-20'),
(131639, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-06'),
(134193, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-12'),
(134193, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-22'),
(134193, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-10-12'),
(134193, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-05'),
(134193, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-10-11'),
(148136, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-15'),
(148136, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-07'),
(148136, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-18'),
(148136, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-10'),
(148136, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-10-10'),
(151540, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-10-12'),
(151540, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-10'),
(151540, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-27'),
(151540, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-21'),
(151540, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-30'),
(159564, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-30'),
(159564, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-23'),
(159564, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-12'),
(159564, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-23'),
(159564, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-26'),
(171265, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-08'),
(171265, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-29'),
(171265, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-10-11'),
(171265, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-09'),
(171265, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-16'),
(176886, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-22'),
(176886, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-25'),
(176886, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-02'),
(176886, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-07'),
(176886, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-16'),
(191449, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-25'),
(191449, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-24'),
(191449, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-17'),
(191449, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-09'),
(191449, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-26');

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
(1, 'john1', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(1).png', 0),
(2, 'clerk2', '8730465229eb61eb1d95c6b62143db3858f4b94a', 'user(2).png', 0),
(3, 'john3', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(3).png', 0),
(4, 'john4', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(4).png', 0),
(5, 'kennwood5', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(5).png', 0),
(6, 'kennwood6', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(6).png', 0),
(7, 'john7', '9631c1ef976a1d3c728f1b10ced27243631943ff', 'user(7).png', 0),
(8, 'kennedy8', '67481c3dfd4e1f8c2ff295aec2ae748d7db090e6', 'user(8).png', 0),
(9, 'cary9', '2ca1e58763cf7c3d8b011e404d15762aef672c20', 'user(9).png', 0),
(10, 'cary10', '2ca1e58763cf7c3d8b011e404d15762aef672c20', 'user(10).png', 0),
(11, 'kennwood11', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(11).png', 0),
(12, 'kennwood12', 'a16baa87e71c38e25edeee5c2dc6e31617610197', 'user(12).png', 0),
(13, 'cary13', '2ca1e58763cf7c3d8b011e404d15762aef672c20', 'user(13).png', 0),
(14, 'newman14', '68bd0cf6ea11b3e5c1d0ae2490b262697ea3fe57', 'user(14).png', 0),
(15, 'peter15', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(15).png', 0),
(16, 'cary16', '2ca1e58763cf7c3d8b011e404d15762aef672c20', 'user(16).png', 0),
(23, 'nkt', 'b19298f274134ea67b8aa35b8277d6661952eb98', 'user(23).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_book_list`
--

CREATE TABLE `user_book_list` (
  `isbn` int(20) NOT NULL,
  `user_reg_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_book_list`
--

INSERT INTO `user_book_list` (`isbn`, `user_reg_id`) VALUES
(108748, 1);

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
-- Dumping data for table `user_read`
--

INSERT INTO `user_read` (`user_reg_id`, `isbn`, `is_completed`) VALUES
(13, 131639, 0),
(13, 108916, NULL),
(2, 191449, 0),
(10, 74987, 0),
(13, 121268, NULL),
(7, 176886, 1),
(6, 112630, NULL),
(14, 89450, 0),
(8, 72958, 0),
(1, 151540, 1),
(5, 126526, 0),
(5, 54427, 1),
(10, 76375, 1);

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
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 05:31 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'john', 'john1', '9631c1ef976a1d3c728f1b10ced27243631943ff'),
(2, 'john', 'john2', '9631c1ef976a1d3c728f1b10ced27243631943ff');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(3) NOT NULL,
  `author_fname` varchar(10) NOT NULL,
  `author_lname` varchar(10) NOT NULL,
  `author_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_fname`, `author_lname`, `author_image`) VALUES
(1, 'kennwood', 'newman', 'author(1).png'),
(2, 'cary', 'clerk', 'author(2).png'),
(3, 'newman', 'newman', 'author(3).png'),
(4, 'clerk', 'kennedy', 'author(4).png'),
(5, 'kennedy', 'cary', 'author(5).png'),
(6, 'newton', 'clerk', 'author(6).png'),
(7, 'peter', 'john', 'author(7).png'),
(8, 'kennwood', 'newman', 'author(8).png'),
(9, 'clerk', 'kennedy', 'author(9).png'),
(10, 'peter', 'newman', 'author(10).png'),
(11, 'clerk', 'newton', 'author(11).png'),
(12, 'clerk', 'clerk', 'author(12).png'),
(13, 'john', 'john', 'author(13).png'),
(14, 'kennwood', 'john', 'author(14).png'),
(15, 'newton', 'john', 'author(15).png'),
(16, 'peter', 'cary', 'author(16).png'),
(17, 'cary', 'john', 'author(17).png'),
(18, 'newman', 'john', 'author(18).png'),
(19, 'john', 'kennwood', 'author(19).png'),
(20, 'newman', 'cary', 'author(20).png'),
(21, 'cary', 'john', 'author(21).png'),
(22, 'kennwood', 'clerk', 'author(22).png'),
(23, 'kennedy', 'peter', 'author(23).png'),
(24, 'peter', 'newton', 'author(24).png'),
(25, 'peter', 'john', 'author(25).png'),
(26, 'kennwood', 'wood', 'author(1).png'),
(27, 'peter', 'jeny', 'author(2).png'),
(28, 'newman', 'madona', 'author(3).png'),
(29, 'newton', 'potter', 'author(4).png'),
(30, 'newton', 'perri', 'author(5).png'),
(31, 'peter', 'madona', 'author(6).png'),
(32, 'kennedy', 'adele', 'author(7).png'),
(33, 'clerk', 'potter', 'author(8).png'),
(34, 'newton', 'rowling', 'author(9).png'),
(35, 'kennwood', 'jeny', 'author(10).png'),
(36, 'clerk', 'adele', 'author(11).png'),
(37, 'john', 'perri', 'author(12).png'),
(38, 'kennwood', 'jeny', 'author(13).png'),
(39, 'clerk', 'james', 'author(14).png'),
(40, 'newman', 'rowling', 'author(15).png'),
(41, 'peter', 'rowling', 'author(16).png'),
(42, 'cary', 'wood', 'author(17).png'),
(43, 'clerk', 'wood', 'author(18).png'),
(44, 'kennedy', 'wood', 'author(19).png'),
(45, 'john', 'james', 'author(20).png'),
(46, 'peter', 'madona', 'author(21).png'),
(47, 'newman', 'wood', 'author(22).png'),
(48, 'kennwood', 'jeny', 'author(23).png'),
(49, 'kennedy', 'adele', 'author(24).png'),
(50, 'clerk', 'wood', 'author(25).png');

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
(38132, 'The Eagle Has Landed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 16, 286, 'book(17).png', 5, 482, '2016-09-21'),
(39953, 'The Dog In The Night Time', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 15, 86, 'book(1).png', 5, 617, '2016-09-23'),
(60649, 'Valley of the Dolls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 5, 72, 'book(22).png', 3, 654, '2016-09-22'),
(63466, 'She: A History of Adventure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 4, 38, 'book(10).png', 7, 841, '2016-09-22'),
(71946, 'The Adventures of Huckleberry ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 15, 278, 'book(29).png', 8, 657, '2016-09-20'),
(73639, 'Jaws', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1995, 18, 398, 'book(27).png', 9, 360, '2016-09-22'),
(78498, 'Watership Down', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 2, 228, 'book(18).png', 7, 816, '2016-09-22'),
(78934, 'The Late, Great Planet Earth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 11, 140, 'book(21).png', 9, 223, '2016-09-18'),
(81103, 'The Odyssey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 15, 351, 'book(20).png', 2, 258, '2016-09-18'),
(81569, 'The Unbearable Lightness Of Be', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1998, 15, 226, 'book(3).png', 1, 555, '2016-09-22'),
(82990, 'The Lion, the Witch and the Wa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 5, 333, 'book(9).png', 7, 457, '2016-09-21'),
(87644, 'The Wind in the Willows', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 8, 390, 'book(24).png', 6, 867, '2016-09-19'),
(88187, 'Think and Grow Rich', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1997, 13, 191, 'book(11).png', 6, 299, '2016-09-21'),
(92586, 'To Kill A Mockingbird', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 7, 137, 'book(2).png', 3, 305, '2016-09-19'),
(97374, 'Harry Potter and the Goblet of', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 16, 49, 'book(14).png', 1, 643, '2016-09-23'),
(103120, 'For Whom The Bell Tolls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1990, 3, 194, 'book(7).png', 6, 326, '2016-09-22'),
(107584, 'Alexander And The Terrible', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 6, 52, 'book(4).png', 8, 214, '2016-09-20'),
(114569, 'Brave New World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1996, 11, 182, 'book(8).png', 5, 563, '2016-09-21'),
(118721, 'The Hunger Games', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1990, 13, 309, 'book(25).png', 9, 390, '2016-09-22'),
(131956, 'Who Moved My Cheese?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1990, 16, 343, 'book(23).png', 4, 580, '2016-09-19'),
(133628, 'Horrible, No Good', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 16, 175, 'book(5).png', 5, 246, '2016-09-22'),
(134735, 'The Adventures of Sherlock Hol', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2005, 3, 215, 'book(13).png', 0, 301, '2016-09-20'),
(138170, 'A Confederacy Of Dunces', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2000, 9, 106, 'book(6).png', 3, 398, '2016-09-24'),
(146874, 'Harry Potter and the Deathly H', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1998, 12, 159, 'book(15).png', 2, 665, '2016-09-20'),
(161991, 'The Godfather', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 13, 13, 'book(26).png', 8, 672, '2016-09-23'),
(162338, 'The Hobbit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1994, 10, 57, 'book(19).png', 4, 801, '2016-09-19'),
(166676, 'Harry Potter and the Half-Bloo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2004, 7, 51, 'book(12).png', 2, 830, '2016-09-21'),
(177647, 'What to Expect', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1990, 13, 309, 'book(28).png', 1, 676, '2016-09-24'),
(191677, 'Anne of Green Gables', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1993, 15, 112, 'book(16).png', 10, 664, '2016-09-20');

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
(38132, 15),
(39953, 19),
(60649, 7),
(63466, 19),
(71946, 10),
(73639, 12),
(73639, 22),
(78498, 8),
(78934, 23),
(81103, 23),
(81569, 3),
(81569, 3),
(82990, 9),
(87644, 26),
(88187, 1),
(92586, 9),
(97374, 19),
(103120, 7),
(103120, 15),
(107584, 8),
(114569, 25),
(118721, 24),
(131956, 18),
(133628, 8),
(134735, 23),
(138170, 17),
(146874, 7),
(161991, 14),
(162338, 9),
(166676, 26),
(177647, 16),
(191677, 25);

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
(1, 26, '2016-09-22'),
(2, 30, '2016-09-22'),
(3, 7, '2016-09-23'),
(4, 23, '2016-09-22'),
(5, 8, '2016-09-23'),
(6, 19, '2016-09-23'),
(7, 12, '2016-09-23'),
(8, 27, '2016-09-22'),
(9, 2, '2016-09-22'),
(10, 3, '2016-09-23'),
(11, 22, '2016-09-23'),
(12, 16, '2016-09-22'),
(13, 55, '2016-09-23'),
(14, 16, '2016-09-23'),
(15, 30, '2016-09-23'),
(16, 7, '2016-09-23'),
(17, 19, '2016-09-24'),
(18, 25, '2016-09-23'),
(19, 52, '2016-09-23'),
(20, 42, '2016-09-24'),
(21, 54, '2016-09-23'),
(22, 38, '2016-09-23'),
(23, 27, '2016-09-23'),
(24, 56, '2016-09-23');

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
(1, 2, 13, 81569, '2016-09-18', '2016-09-22', 0),
(2, 2, 21, 78934, '2016-09-19', '2016-09-23', 1),
(3, 1, 12, 161991, '2016-09-19', '2016-09-22', 1),
(4, 1, 2, 60649, '2016-09-20', '2016-09-22', 0),
(5, 2, 22, 177647, '2016-09-20', '2016-09-23', 0),
(6, 2, 12, 177647, '2016-09-21', '2016-09-22', 0),
(7, 2, 26, 60649, '2016-09-20', '2016-09-23', 1),
(8, 2, 26, 88187, '2016-09-19', '2016-09-22', 1),
(9, 1, 26, 63466, '2016-09-19', '2016-09-22', 0),
(10, 1, 16, 162338, '2016-09-20', '2016-09-22', 0),
(11, 2, 6, 118721, '2016-09-20', '2016-09-23', 0),
(12, 1, 9, 103120, '2016-09-21', '2016-09-22', 1),
(13, 2, 7, 38132, '2016-09-20', '2016-09-23', 0),
(14, 2, 9, 177647, '2016-09-19', '2016-09-23', 0),
(15, 1, 7, 38132, '2016-09-19', '2016-09-22', 0),
(16, 1, 27, 161991, '2016-09-20', '2016-09-22', 1),
(17, 2, 20, 133628, '2016-09-20', '2016-09-22', 0),
(18, 2, 20, 177647, '2016-09-21', '2016-09-22', 0),
(19, 2, 1, 81103, '2016-09-19', '2016-09-22', 1),
(20, 2, 23, 146874, '2016-09-19', '2016-09-22', 0),
(21, 1, 11, 103120, '2016-09-20', '2016-09-22', 0),
(22, 2, 17, 107584, '2016-09-20', '2016-09-22', 1),
(23, 1, 1, 134735, '2016-09-19', '2016-09-23', 1),
(24, 2, 9, 161991, '2016-09-19', '2016-09-22', 0),
(25, 1, 18, 87644, '2016-09-21', '2016-09-22', 1),
(26, 1, 23, 107584, '2016-09-20', '2016-09-22', 1),
(27, 1, 22, 162338, '2016-09-21', '2016-09-22', 1),
(28, 1, 26, 81103, '2016-09-21', '2016-09-22', 0),
(29, 1, 9, 191677, '2016-09-20', '2016-09-22', 0),
(30, 2, 3, 138170, '2016-09-20', '2016-09-22', 1),
(31, 1, 3, 38132, '2016-09-21', '2016-09-23', 0),
(32, 1, 18, 60649, '2016-09-20', '2016-09-24', 0),
(33, 2, 24, 161991, '2016-09-20', '2016-09-23', 0),
(34, 2, 10, 107584, '2016-09-20', '2016-09-23', 0),
(35, 1, 20, 88187, '2016-09-21', '2016-09-24', 0),
(36, 1, 17, 146874, '2016-09-21', '2016-09-23', 0),
(37, 1, 18, 78934, '2016-09-22', '2016-09-23', 0),
(38, 1, 2, 146874, '2016-09-22', '2016-09-23', 1),
(39, 2, 20, 191677, '2016-09-20', '2016-09-24', 0),
(40, 2, 3, 146874, '2016-09-22', '2016-09-24', 0),
(41, 2, 1, 107584, '2016-09-21', '2016-09-24', 0),
(42, 1, 22, 81103, '2016-09-21', '2016-09-23', 1),
(43, 2, 16, 81569, '2016-09-22', '2016-09-23', 0),
(44, 1, 29, 134735, '2016-09-20', '2016-09-24', 0),
(45, 1, 7, 134735, '2016-09-22', '2016-09-24', 0),
(46, 2, 2, 88187, '2016-09-21', '2016-09-23', 0),
(47, 1, 13, 97374, '2016-09-22', '2016-09-24', 0),
(48, 2, 16, 97374, '2016-09-21', '2016-09-23', 0),
(49, 2, 16, 82990, '2016-09-21', '2016-09-24', 0),
(50, 1, 12, 161991, '2016-09-22', '2016-09-23', 0),
(51, 1, 12, 177647, '2016-09-22', '2016-09-24', 0),
(52, 2, 8, 78498, '2016-09-20', '2016-09-23', 1),
(53, 2, 27, 78934, '2016-09-20', '2016-09-23', 0),
(54, 2, 6, 138170, '2016-09-19', '2016-09-23', 1),
(55, 2, 3, 118721, '2016-09-19', '2016-09-23', 1),
(56, 1, 18, 39953, '2016-09-21', '2016-09-24', 1),
(57, 2, 1, 166676, '2016-09-20', '2016-09-24', 0),
(58, 2, 19, 103120, '2016-09-22', '2016-09-23', 0),
(59, 1, 29, 103120, '2016-09-20', '2016-09-23', 0),
(60, 1, 13, 78934, '2016-09-21', '2016-09-23', 0);

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
(23, 'Nuwan', 'Karunarathna', 'nuwan@some.com'),
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
  `rating` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`isbn`, `user_reg_id`, `content`, `rating`, `date`) VALUES
(38132, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-10'),
(38132, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-28'),
(38132, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-10'),
(38132, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-14'),
(38132, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-10'),
(39953, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-22'),
(39953, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-14'),
(39953, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-22'),
(39953, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-29'),
(39953, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-06-28'),
(60649, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-06'),
(60649, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-17'),
(60649, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-09'),
(60649, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-12'),
(60649, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-08'),
(63466, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-24'),
(63466, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-22'),
(63466, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-04'),
(63466, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-04'),
(63466, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-08'),
(71946, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-30'),
(71946, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-27'),
(71946, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-16'),
(71946, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-03'),
(71946, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-02'),
(73639, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-03'),
(73639, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-06'),
(73639, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-11'),
(73639, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-04'),
(73639, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-07'),
(78498, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-14'),
(78498, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-28'),
(78498, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-04'),
(78498, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-02'),
(78498, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-23'),
(78934, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-18'),
(78934, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-27'),
(78934, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-30'),
(78934, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-30'),
(78934, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-14'),
(81103, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-06-20'),
(81103, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-28'),
(81103, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-09'),
(81103, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-18'),
(81103, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-23'),
(81569, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-04'),
(81569, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-31'),
(81569, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-07'),
(81569, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-23'),
(81569, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-12'),
(82990, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-09'),
(82990, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-22'),
(82990, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-12'),
(82990, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-02'),
(82990, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-05'),
(87644, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-13'),
(87644, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-02'),
(87644, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-24'),
(87644, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-06'),
(87644, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-01'),
(88187, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-03'),
(88187, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-06'),
(88187, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-04'),
(88187, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-06-21'),
(88187, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-14'),
(92586, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-05'),
(92586, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-05'),
(92586, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-04'),
(92586, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-17'),
(92586, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-05'),
(97374, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-17'),
(97374, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-12'),
(97374, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-01'),
(97374, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-01'),
(97374, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-09'),
(103120, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-09'),
(103120, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-25'),
(103120, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-28'),
(103120, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-16'),
(103120, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-04'),
(107584, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-06-21'),
(107584, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-23'),
(107584, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-19'),
(107584, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-06-22'),
(107584, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-03'),
(114569, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-06-21'),
(114569, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-27'),
(114569, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-15'),
(114569, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-29'),
(114569, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-01'),
(118721, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-11'),
(118721, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-04'),
(118721, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-24'),
(118721, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-17'),
(118721, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-02'),
(131956, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-06-24'),
(131956, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-22'),
(131956, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-22'),
(131956, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-08'),
(131956, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-07-31'),
(133628, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-05'),
(133628, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-30'),
(133628, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-04'),
(133628, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-06'),
(133628, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-13'),
(134735, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-06-25'),
(134735, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-26'),
(134735, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-06-30'),
(134735, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-11'),
(134735, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-19'),
(138170, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-12'),
(138170, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-09-06'),
(138170, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-24'),
(138170, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-08-20'),
(138170, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-27'),
(146874, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-05'),
(146874, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-11'),
(146874, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-07'),
(146874, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-14'),
(146874, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-03'),
(161991, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-21'),
(161991, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-15'),
(161991, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-14'),
(161991, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-07'),
(161991, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-06-22'),
(162338, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-07-17'),
(162338, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-08-07'),
(162338, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-02'),
(162338, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-01'),
(162338, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-20'),
(166676, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-09-16'),
(166676, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-07-04'),
(166676, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-07-31'),
(166676, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-08-30'),
(166676, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-09-10'),
(177647, 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 4, '2016-09-15'),
(177647, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 3, '2016-06-26'),
(177647, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-24'),
(177647, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-11'),
(177647, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-06-18'),
(191677, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 2, '2016-08-30'),
(191677, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-07-14'),
(191677, 16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 5, '2016-09-04'),
(191677, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-26'),
(191677, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem', 1, '2016-08-18'),
(177647, 23, 'sa', 1, '2016-09-30'),
(177647, 23, 'hello', 1, '2016-09-30'),
(177647, 23, 'hello as', 5, '2016-09-30'),
(177647, 23, 'hello assd', 5, '2016-09-30'),
(177647, 23, 'dsf', 4, '2016-09-30');

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
(16, 'peter16', '1adb3f06a5883f48cae6133ff7788153538c900f', 'user(16).png', 0),
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
(78934, 4),
(60649, 2),
(133628, 23),
(107584, 23);

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
-- Dumping data for table `user_read`
--

INSERT INTO `user_read` (`user_reg_id`, `isbn`, `is_completed`) VALUES
(13, 81569, 1),
(12, 161991, 0),
(2, 60649, NULL),
(12, 177647, 1),
(16, 162338, 1),
(6, 118721, 0),
(9, 103120, 0),
(7, 38132, NULL),
(9, 177647, 1),
(7, 38132, NULL),
(1, 81103, 1),
(11, 103120, 1),
(1, 134735, NULL),
(9, 161991, 1),
(9, 191677, 1),
(3, 138170, NULL),
(3, 38132, 0),
(10, 107584, 1),
(2, 146874, 1),
(3, 146874, NULL),
(1, 107584, 1),
(16, 81569, NULL),
(7, 134735, NULL),
(2, 88187, 0),
(13, 97374, NULL),
(16, 97374, 0),
(16, 82990, NULL),
(12, 161991, 0),
(12, 177647, 1),
(8, 78498, 1),
(6, 138170, NULL),
(3, 118721, 0),
(1, 166676, NULL),
(13, 78934, 1);

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
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `book_checkin`
--
ALTER TABLE `book_checkin`
  MODIFY `checkin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `book_checkout`
--
ALTER TABLE `book_checkout`
  MODIFY `checkout_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
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

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 05:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'vaghari', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `tasvir` text COLLATE utf8_unicode_ci NOT NULL,
  `pdf` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `subject`, `abstract`, `tasvir`, `pdf`) VALUES
(3, 'Pride and Prejudice', 'Jane Austen', 'romance', 'Pride and Prejudice is one of the classic romances of the famous English writer Jane Austen', 'p1.jpg', 'Doc1.pdf'),
(4, 'math1', 'Thomas Fincke', 'educational', 'Solve math problems', 'math1.png', 'Doc2.pdf'),
(5, 'Chemistry 3', 'Mojtaba Shamsipour', 'educational', 'Learning chemistry', 'chemistry1.jpg', 'Doc3.pdf'),
(6, 'history1', 'mr.y', 'historical', 'an old book in the field of history', 'h1.jpg', 'Doc5.pdf'),
(17, 'gone with the wind', 'mr.x', 'romance', 'old romance novel', 'Gone_with_the_Wind_cover.jpg', 'Doc6.pdf'),
(18, 'geography book', 'mrs.d', 'geography', 'the study in the field of geography ', '978-3-030-98523-3.jpg', 'Doc8.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(25) NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `confirmCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `mobile`, `address`, `password`, `confirmCode`, `activation`) VALUES
(5, 'maryam', 'karimi', 'mk@gmil.com', 5454, 'tabriz', 'cee631121c2ec9232f3a2f028ad5c89b', '', 'yes'),
(6, 'ali', 'aghayi', 'aghayi@gmail.com', 1452, 'tehran', 'e5841df2166dd424a57127423d276bbe', '', 'yes'),
(8, 'reza', 'moradi', 'r@gmail.com', 154, 'rasht', '7a53928fa4dd31e82c6ef826f341daec', '', 'yes'),
(9, 'vahid', 'yosefi', 'vahid@gmail.com', 1478, 'rasht', 'acf4b89d3d503d8252c9c4ba75ddbf6d', '', 'yes'),
(10, 'maede', 'vaghari', 'v@gamil.com', 111, 'rasht', 'f899139df5e1059396431415e770c6dd', '', 'yes'),
(15, 'mina', 'kazemi', 'mina@gmail.com', 913, 'rasht', '94f6d7e04a4d452035300f18b984988c', '', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

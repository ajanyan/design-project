-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 11:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design`
--

-- --------------------------------------------------------

--
-- Table structure for table `des`
--

CREATE TABLE `des` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `des`
--

INSERT INTO `des` (`Name`, `Email`, `Password`, `Role`) VALUES
('Ajanyan', 'ajanyan@gmail.com', 'asdf', 'admin'),
('aaa', 'aa@a.com', 'asdf', 'subadmin'),
('konchitha', 'konchitha@gmail.com', 'asdf', 'subadmin'),
('aaaaa', 'aaaaaa@gmail.com', 'asdf', 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Upload` varchar(100) DEFAULT NULL,
  `Review1` longtext,
  `Review2` longtext,
  `sub1` varchar(100) DEFAULT NULL,
  `sub2` varchar(100) DEFAULT NULL,
  `Status` varchar(5) DEFAULT NULL,
  `substatus1` varchar(10) DEFAULT NULL,
  `substatus2` varchar(10) DEFAULT NULL,
  `decision` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Upload`, `Review1`, `Review2`, `sub1`, `sub2`, `Status`, `substatus1`, `substatus2`, `decision`) VALUES
(1, 'Ajanyan P Pradeep', 'ajanyan@gmail.com', 'doc1', 'This is a demo review by reviewer 1', 'This is a demo review\r\nThis is a text', 'aaa', 'konchitha', 'Yes', 'Accept', 'Accept', 'Accept'),
(2, 'a', 'a@gmail.com', 'doc2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', 'a@gmail.com', 'doc3', 'khhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhh', 'aaa', 'konchitha', 'Yes', 'Accept', 'Accept', 'Accept');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `des`
--
ALTER TABLE `des`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `Upload` (`Upload`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

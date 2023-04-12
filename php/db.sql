-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221125.2e001c186a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 02:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `tst`
--

-- --------------------------------------------------------

--
-- Table structure for table `sfd`
--

CREATE TABLE `sfd` (
  `user_id` int(11) NOT NULL,
  `center` varchar(20) NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `q1` varchar(10) NOT NULL,
  `q2` varchar(10) NOT NULL,
  `q3` varchar(10) NOT NULL,
  `q4` varchar(10) NOT NULL,
  `q5` varchar(10) NOT NULL,
  `q6` varchar(10) NOT NULL,
  `q7` varchar(10) NOT NULL,
  `q8` varchar(10) NOT NULL,
  `q9` varchar(10) NOT NULL,
  `q10` varchar(10) NOT NULL,
  `q11` varchar(10) NOT NULL,
  `q12` varchar(10) NOT NULL,
  `q13` varchar(10) NOT NULL,
  `q14` varchar(10) NOT NULL,
  `q15` varchar(10) NOT NULL,
  `q16` varchar(10) NOT NULL,
  `q17` varchar(10) NOT NULL,
  `q18` varchar(10) NOT NULL,
  `q19` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `comment` varchar(10) NOT NULL,
  `sdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sfd`
--

INSERT INTO `sfd` (`user_id`, `center`, `faculty`, `course`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `name`, `code`, `comment`, `sdate`) VALUES
(1, 'konnagar', 'teacher 1', 'course 2', 'never', 'sometimes', 'frequently', 'never', 'sometimes', 'frequently', 'sometimes', 'never', 'frequently', 'frequently', 'mostly', 'frequently', 'mostly', 'sometimes', 'frequently', 'sometimes', 'mostly', 'sometimes', 'Average', 'MIles MOra', '1235', 'test strin', '2022-12-01'),
(2, 'dfdsf', 'dsfsfsdf', 'sdfdsfsdf', 'frequently', 'sometimes', 'frequently', 'sometimes', 'frequently', 'never', 'never', 'sometimes', 'mostly', 'mostly', 'sometimes', 'mostly', 'frequently', 'sometimes', 'frequently', 'frequently', 'sometimes', 'frequently', 'Excellent', 'sdfsdf', '4321', 'fhgsghrgfh', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `code`, `mobile`, `usertype`) VALUES
(1, 'user1', 'user@email.com', '1234', '1234567890', 'student'),
(2, 'admin', 'admin@email.com', '1234', '1234567890', 'student'),
(4, 'User 2', 'user2@email.com', '4321', '1234567890', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sfd`
--
ALTER TABLE `sfd`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sfd`
--
ALTER TABLE `sfd`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

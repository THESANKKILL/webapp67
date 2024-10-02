-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 05:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvd_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `birthdate` date NOT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `biography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `NAME`, `birthdate`, `nationality`, `biography`) VALUES
(110, 'Keanu Charles Reeves', '1964-09-02', 'เป็นนักแสดงชาวแคนาดา', 'หลังประสบความล้มเหลวในบ็อกซ์ออฟฟิศหลายเรื่อง การแสดงของรีฟส์ในภาพยนตร์สยองขวัญ อาถรรพ์มัจจุราชเหนือเมฆ (1997) ได้รับเสียงวิจารณ์ไปในทางที่ดี จากนั้นจึงเริ่มมีชื่อเสียงมากขึ้นจากการรับบทเป็นนีโอในชุดละครนิยายวิทยาศาสตร์ เดอะ เมทริกซ์ ที่เริ่มขึ้นใน ค.ศ. 1999 เขารับบทเป็นจอห์น คอนสแตนตินในคนพิฆาตผี (2005) และภาพยนตร์อื่น ๆ อย่าง บ้านทะเลสาบ บ่มรักปาฏิหาริย์ (2006) วันพิฆาตสะกดโลก (2008) และ สตรีท คิงส์ ตำรวจเดือดล่าล้างเดน (2008) หลังหยุดแสดงช่วงหนึ่ง รีฟส์ก็กลับมาด้วยการรับบทเป็นผู้ลอบสังหารในนามในชุดภาพยนตร์ จอห์น วิค ที่เริ่มต้นใน ค.ศ. 2014 ');

-- --------------------------------------------------------

--
-- Table structure for table `dvds`
--

CREATE TABLE `dvds` (
  `dvd_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `release_year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `Director` varchar(40) NOT NULL,
  `Description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dvds`
--

INSERT INTO `dvds` (`dvd_id`, `title`, `genre`, `release_year`, `price`, `Director`, `Description`) VALUES
(110, 'John Wick', 'แอ็คชั่น', 2014, 350.00, '', ''),
(111, 'loaded', '', 2014, 0.00, 'hh', 'god');

-- --------------------------------------------------------

--
-- Table structure for table `dvd_actors`
--

CREATE TABLE `dvd_actors` (
  `dvd_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dvd_actors`
--

INSERT INTO `dvd_actors` (`dvd_id`, `actor_id`) VALUES
(110, 110);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `actors` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `phone`, `address`, `actors`) VALUES
(110, 'loaded 99', 'loaded@gmail.com', '08514503554', '24/888', NULL),
(112, 'gg ez', 'god@gmail.com', '0851503259', '248/52', NULL),
(113, 'loaded99', 'lod@gmail.com', '0851503255', '24/885', NULL),
(114, 'loaded', 'ff@gmail.com', '0851503254', '88/77', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `dvd_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `dvds`
--
ALTER TABLE `dvds`
  ADD PRIMARY KEY (`dvd_id`) USING BTREE;

--
-- Indexes for table `dvd_actors`
--
ALTER TABLE `dvd_actors`
  ADD PRIMARY KEY (`dvd_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `dvd_id` (`dvd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `dvds`
--
ALTER TABLE `dvds`
  MODIFY `dvd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dvd_actors`
--
ALTER TABLE `dvd_actors`
  ADD CONSTRAINT `dvd_actors_ibfk_1` FOREIGN KEY (`dvd_id`) REFERENCES `dvds` (`dvd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dvd_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`dvd_id`) REFERENCES `dvds` (`dvd_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

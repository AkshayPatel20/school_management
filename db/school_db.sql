-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2018 at 03:42 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
CREATE TABLE IF NOT EXISTS `admin_tb` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(255) NOT NULL,
  `ad_firstname` varchar(255) NOT NULL,
  `ad_lastname` varchar(255) NOT NULL,
  `ad_password` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_role` varchar(255) NOT NULL,
  `ad_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`ad_id`, `ad_username`, `ad_firstname`, `ad_lastname`, `ad_password`, `ad_email`, `ad_role`, `ad_create_at`) VALUES
(1, 'admin', 'fadmin', 'ladmin', 'admin', 'admin@gmail.com', 'manager', '2018-12-20 08:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_tb`
--

DROP TABLE IF EXISTS `blacklist_tb`;
CREATE TABLE IF NOT EXISTS `blacklist_tb` (
  `blacklist_id` int(11) NOT NULL,
  `blacklist_name` varchar(255) NOT NULL,
  `blacklist_class` varchar(255) NOT NULL,
  `blacklist_rollno` varchar(255) NOT NULL,
  `blacklist_photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blacklist_tb`
--

INSERT INTO `blacklist_tb` (`blacklist_id`, `blacklist_name`, `blacklist_class`, `blacklist_rollno`, `blacklist_photo`) VALUES
(40, 'Snehal Narendra Patel', '4', '1480', 'http://[::1]/school_management/assets/img/student_photo/snehal.jpg'),
(35, 'Geeta Narendra  Patel', '8', '1475', 'http://[::1]/school_management/assets/img/student_photo/geeta1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

DROP TABLE IF EXISTS `student_db`;
CREATE TABLE IF NOT EXISTS `student_db` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `student_rollno` int(11) NOT NULL,
  `student_class` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_sex` varchar(255) NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `student_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_db`
--

INSERT INTO `student_db` (`student_id`, `student_name`, `student_rollno`, `student_class`, `student_password`, `student_sex`, `student_photo`, `student_create_at`, `student_modified_at`) VALUES
(36, 'Shreyansh shalendra hosalkar', 1619, '5', '$2y$10$j/Uq73LWdOlAB6aiaE0i8.nO2eAlHZZe5aC0QCrYCxtvI9A538cLa', 'Male', 'http://[::1]/school_management/assets/img/student_photo/shreya.jpg', '2018-12-28 08:03:02', '2018-12-28 10:16:23'),
(38, 'Akshay Narendra Patel', 1645, '5', '$2y$10$uoBJ4HSwuyuj1uWVpXKy2uOyliNStFHtjJH/rcA7o2ii4I0Ys/Jvi', 'Male', 'http://[::1]/school_management/assets/img/student_photo/akshay.jpg', '2018-12-28 10:57:03', '2018-12-28 10:57:03'),
(35, 'Geeta Narendra  Patel', 1475, '8', '$2y$10$SXgFV07dQjLdocwJJhDfVeXUHFn3BqJQTrUxuJOffLqu6twLXYN9O', 'Female', 'http://[::1]/school_management/assets/img/student_photo/geeta1.jpg', '2018-12-27 11:14:59', '2018-12-28 10:16:47'),
(40, 'Snehal Narendra Patel', 1480, '4', '$2y$10$qa6HpmVe4PfT0JQSg6SucOO77lw0caZfr88GpHUz1NIvulUwT2zNK', 'Female', 'http://[::1]/school_management/assets/img/student_photo/snehal.jpg', '2018-12-29 07:43:23', '2018-12-29 07:44:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

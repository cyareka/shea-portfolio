-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2023 at 09:04 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fernandez`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactmsg`
--

DROP TABLE IF EXISTS `contactmsg`;
CREATE TABLE IF NOT EXISTS `contactmsg` (
  `msg_name` varchar(30) NOT NULL,
  `msg_email` varchar(30) NOT NULL,
  `msg_content` varchar(1000) NOT NULL,
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactmsg`
--

INSERT INTO `contactmsg` (`msg_name`, `msg_email`, `msg_content`, `date_added`) VALUES
('Sheardeeh Fernandez', 'sheardeeh@gmail.com', 'cool', '2023-05-24 14:52:30'),
('Kyle Albaran', 'kfalbaran22@gmail.com', 'pretty', '2023-05-24 15:02:47'),
('Terrah', 'terrah@gmail.com', 'cool', '2023-05-24 16:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `proj_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `proj_image` longblob NOT NULL,
  `proj_title` varchar(40) NOT NULL,
  `proj_link` varchar(100) NOT NULL,
  `proj_desc` varchar(500) NOT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `proj_image`, `proj_title`, `proj_link`, `proj_desc`) VALUES
(1, 0x363436623533636433333330362e706e67, 'Wangsheng Funeral Parlor', 'https://cyareka.github.io/wangsheng-funeral-parlor/', 'A prerequisite project for The Odin Project'),
(2, 0x363436623538633334626463302e706e67, 'Genshin Impact AR Calculator', 'https://github.com/cyareka/ar-calculator', 'Calculate AR EXP needed and est. date of reaching that AR'),
(3, 0x363436623538653764633536642e706e67, 'Pangandam', 'https://github.com/cyareka/pangandam', 'A disaster inventory management system'),
(4, 0x363436623539303364643362612e706e67, 'Meal Plan System', 'https://github.com/cyareka/mealplan', 'Data Structures project for simple tracking of meals'),
(5, 0x363436626164623663356161302e6a7067, 'Hogwarts Alumni', 'https://github.com/cyareka/hogwarts-alumni', 'Alumni record written in Java with a Harry Potter theme.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

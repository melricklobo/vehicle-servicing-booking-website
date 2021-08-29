-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2021 at 05:51 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicecenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `date_booking` date NOT NULL,
  `kilometers_run` int NOT NULL,
  `pick_drop_opted` varchar(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `customer_fk` (`customer_id`),
  KEY `vehicle_fk` (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `customer_id`, `vehicle_id`, `date_booking`, `kilometers_run`, `pick_drop_opted`, `description`) VALUES
(1, 1, 2, '2021-02-24', 2000, 'no', 'krkrkr noise pls fix'),
(2, 2, 1, '2021-05-31', 5000, 'no', 'light'),
(13, 3, 3, '2021-02-25', 177, 'no', ''),
(25, 1, 2, '2021-02-23', 5026, 'no', 'light broke'),
(26, 1, 2, '2021-02-25', 5026, 'no', 'light broke again'),
(29, 3, 3, '2021-02-22', 45, 'no', 'nothing'),
(43, 3, 3, '2021-03-11', 32432, 'no', 'null'),
(44, 3, 3, '2021-03-16', 32432, 'no', 'null'),
(45, 3, 3, '2021-02-27', 6, 'no', 'null'),
(46, 3, 3, '2021-02-26', 3323, 'no', 'null'),
(47, 3, 3, '2021-03-03', 333, 'no', 'null'),
(48, 3, 3, '2021-03-19', 33, 'no', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_phno` varchar(10) NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phno`, `customer_email`, `customer_address`) VALUES
(1, 'Aishwarya', '7778789997', 'aishwarya@gmail.com', 'porvorim'),
(2, 'Melrick', '9994562898', 'melrick@gmail.com', 'mapusa'),
(3, 'Rushikesh Arlekar', '8888888888', 'ruarlekar@gmail.com', 'Mapusa'),
(6, 'Khushboo Shetkar', '8007014757', 'khushboo.shetkar43.k', 'Oxel'),
(8, 'Khushboo Shetkar', '8007014757', 'khushboo.shetkar43.k', 'Oxel'),
(9, 'kunal', '1234512345', 'kunal@gmail.com', 'vasco'),
(10, 'sanchai', '1234565432', 'sanchai@gmail.com', 'Parra'),
(11, 'Rushikesh Arlekar', '7887330486', 'ruarlekar1@gmail.com', 'H.no 78/127, Verla Freitas Vado, Mapusa, Bardez Goa'),
(12, 'Rushikesh Arlekar', '7887330486', 'ruarlekar11@gmail.co', 'H.no 78/127, Verla Freitas Vado, Mapusa, Bardez Goa'),
(13, 'Rushikesh Arlekar', '7887330486', 'ruarlekar111@gmail.c', 'H.no 78/127, Verla Freitas Vado, Mapusa, Bardez Goa'),
(14, 'lenin', '9999999999', 'lenin@gmail.com', 'Margao'),
(15, 'lenin', '9999999999', 'lenin1@gmail.com', 'Margao'),
(18, 'Rushikesh Arlekar', '7887330486', 'ruarlekar55@gmail.com', 'H.no 78/127'),
(19, 'sadsa', '1245785648', 'idk@gmail.com', 'sadas');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(50) NOT NULL,
  `employee_contact` varchar(11) NOT NULL,
  `employee_email` varchar(40) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_contact`, `employee_email`, `employee_address`) VALUES
(3, 'Denbear', '1234567890', 'den@gmail.com', 'aldona');

-- --------------------------------------------------------

--
-- Table structure for table `opted_services`
--

DROP TABLE IF EXISTS `opted_services`;
CREATE TABLE IF NOT EXISTS `opted_services` (
  `os_id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int NOT NULL,
  `service_id` int NOT NULL,
  PRIMARY KEY (`os_id`),
  KEY `appointment_fk` (`appointment_id`),
  KEY `service_fk` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opted_services`
--

INSERT INTO `opted_services` (`os_id`, `appointment_id`, `service_id`) VALUES
(1, 2, 2),
(2, 13, 2),
(3, 13, 1),
(4, 13, 1),
(5, 13, 3),
(6, 13, 1),
(7, 13, 3),
(8, 13, 1),
(9, 13, 3),
(10, 13, 1),
(11, 13, 3),
(12, 13, 1),
(13, 13, 3),
(14, 13, 1),
(15, 13, 3),
(16, 13, 1),
(17, 13, 3),
(18, 13, 2),
(19, 13, 1),
(20, 1, 2),
(21, 1, 2),
(22, 1, 3),
(23, 13, 1),
(24, 13, 1),
(25, 13, 3),
(26, 13, 2),
(27, 13, 2),
(28, 13, 1),
(29, 13, 2),
(30, 13, 1),
(31, 13, 3),
(32, 13, 2),
(33, 13, 1),
(34, 13, 1),
(35, 13, 3),
(36, 2, 2),
(37, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_offered`
--

DROP TABLE IF EXISTS `services_offered`;
CREATE TABLE IF NOT EXISTS `services_offered` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) NOT NULL,
  `service_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_offered`
--

INSERT INTO `services_offered` (`service_id`, `service_name`, `service_price`) VALUES
(1, 'Bike Wash', '100'),
(2, 'Air Check', '10'),
(3, 'Nitrogen', '50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `type`) VALUES
(1, 'ruarlekar@gmail.com', '12345', 'admin'),
(7, 'kunal@gmail.com', 'qwertyui', 'customer'),
(8, 'sanchai@gmail.com', '123456', 'employee'),
(9, 'ruarlekar1@gmail.com', '123455', 'customer'),
(10, 'ruarlekar11@gmail.com', '5555555', 'customer'),
(11, 'ruarlekar111@gmail.com', 'jvhvkhvh', 'customer'),
(12, 'lenin@gmail.com', '1234567', 'customer'),
(13, 'lenin1@gmail.com', 'eeeeeeee', 'customer'),
(16, 'ruarlekar55@gmail.com', '222222', 'customer'),
(17, 'melrick@gmail.com', '123456789', 'customer'),
(18, 'melrick@gmail.com', '123456789', 'customer'),
(19, 'emp1@gmail.com', '123456', 'employee'),
(20, 'idk@gmail.com', '124578963', 'customer'),
(26, 'den@gmail.com', 'denbear', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicle_id` int NOT NULL AUTO_INCREMENT,
  `vehicle_model` varchar(50) NOT NULL,
  `vehicle_registration_no` varchar(15) NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `customervehicle_fk` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_model`, `vehicle_registration_no`, `customer_id`) VALUES
(1, 'vespa', 'GA/03/AE/1783', 2),
(2, 'Activa', 'GA/05/K/7658', 1),
(3, 'Hero Passion Pro', 'GA/03/AK/7994', 3),
(34, 'maesto', 'GA/03/AA/2103', 14),
(38, 'jupiter', 'GA/03/AA/2199', 15),
(110, 'activa', 'GA/03/AB/8199', 18),
(111, 'Yamaha', 'GA/03/AO/1902', 19);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `vehicle_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`);

--
-- Constraints for table `opted_services`
--
ALTER TABLE `opted_services`
  ADD CONSTRAINT `appointment_fk` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`),
  ADD CONSTRAINT `service_fk` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`service_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `customervehicle_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

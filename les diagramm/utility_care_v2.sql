-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2026 at 12:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utility_care_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `status` enum('Scheduled','Completed','Cancelled') DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `patient_id`, `doctor_id`, `status`) VALUES
(1, '2026-01-05', '09:00:00', 1, 1, 'Scheduled'),
(2, '2026-01-05', '09:30:00', 2, 1, 'Completed'),
(3, '2026-01-05', '10:00:00', 3, 2, 'Scheduled'),
(4, '2026-01-06', '11:00:00', 4, 3, 'Cancelled'),
(5, '2026-01-06', '15:30:00', 1, 4, 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `location`) VALUES
(1, 'Cardiology', '1st Floor'),
(2, 'Dermatology', '2nd Floor'),
(3, 'Pediatrics', '3rd Floor'),
(4, 'General Medicine', 'Ground Floor'),
(5, 'blud', 'Building A - Floor 2');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `specialisation` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `specialisation`, `email`, `password`, `department_id`) VALUES
(1, 'Khalid', 'Rahimi', 'Cardiologist', 'k.rahimi@clinic.ma', NULL, 1),
(2, 'Nadia', 'Ouazzani', 'Dermatologist', 'n.ouazzani@clinic.ma', NULL, 2),
(3, 'Omar', 'Tahiri', 'Pediatrician', 'o.tahiri@clinic.ma', NULL, 3),
(4, 'Leila', 'Bennani', 'General Practitioner', 'l.bennani@clinic.ma', NULL, 4),
(5, 'khalil', 'el qaddabi', 'Cardiologist', 'khalilelqaddabi9@gmail.com', '$2y$10$qDaIXM7gtMf8euEPaBbE2egGp2FAFeaz/yKD1RvXvDOrre3NBJq2m', 1),
(6, 'khalil', 'el qaddabi', 'Cardiologist', 'khalilelqaddabi9@gmail.com', '$2y$10$fw3rHl3TW/1.dbFfxaGCiug4bjD/LaVqvUYSBeb857McsnzGc1jSy', 1),
(7, 'khalil', 'el qaddabi', 'Cardiologist', 'khalilelqaddabi9@gmail.com', '$2y$10$mMQlDqD8XlXPOf/4qIsYyOwxJcjRN5xTaPL2Snobq6RTLqqWCqpD.', 1),
(8, 'khalil', 'el qaddabi', 'Cardiologist', 'khalilelqaddabi9@gmail.com', '$2y$10$wh7HWY2RhUUz7tPW8RH6Tu7rHDNg/jRaaFPEfxst2mxOH3d.Yjg8e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `name`) VALUES
(1, 'Paracetamol 500mg'),
(2, 'Amoxicillin 1g'),
(3, 'Ibuprofen 400mg'),
(4, 'Omeprazole 20mg'),
(5, 'Salbutamol Inhaler'),
(6, 'Doliprane');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `date_of_birth`, `address`, `phone`, `email`, `password`) VALUES
(1, 'Ahmed', 'El Mansouri', '1990-03-15', '123 Rue Hassan II, Casablanca', '0612345678', 'ahmed.mansouri@example.com', NULL),
(2, 'Sara', 'Ben Ali', '1985-07-22', '45 Bd Zerktouni, Casablanca', '0678123456', 'sara.benali@example.com', NULL),
(3, 'Youssef', 'Kadiri', '2000-11-05', '12 Rue Fes, Rabat', '0654321876', 'youssef.kadiri@example.com', NULL),
(4, 'Fatima', 'El Amrani', '1978-01-30', '89 Av Mohammed V, Marrakech', '0698765432', 'fatima.amrani@example.com', NULL),
(5, 'khalil', 'el qaddabi', '2222-11-11', 'Ait Chikh Ali Ait Ourir', '0635022101', 'khalilelqaddabi9@gmail.com', '$2y$10$azUE8qFpqERhwWXu8UcIPuW3uVei2NSlMg0FUsPUlOb1FDSDP2tF6'),
(6, 'khalil', 'el qaddabi', '2004-12-06', 'Ait Chikh Ali Ait Ourir', '0635022101', 'khalilelqaddabi9@gmail.com', '$2y$10$lMZDNWp4ejZo2EeB9CNHWu7iiMra2pcCT3VSvbGxdpOOU0H.T9imW');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int NOT NULL,
  `date` date DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `patient_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `date`, `doctor_id`, `patient_id`) VALUES
(1, '2026-01-01', 1, 1),
(2, '2026-01-02', 2, 2),
(3, '2026-01-03', 3, 3),
(4, '2026-01-04', 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL,
  MODIFY CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  MODIFY CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

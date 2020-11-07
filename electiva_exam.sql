-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2020 at 05:15 AM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electiva_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `medical_record_id` int(11) NOT NULL COMMENT 'id de la cabecera medical_records',
  `consultation_date` datetime NOT NULL,
  `hospital_id` int(11) NOT NULL COMMENT 'hospital donde fue consultado',
  `service_id` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'servicio al que fue atendido',
  `doctor_dni` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'medico que atendio',
  `diagnosis` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'diagnostico',
  `treatment` varchar(400) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'tratamiento',
  `is_admitted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'es ingresado',
  `room` int(11) NOT NULL DEFAULT -1,
  `discharged_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `medical_record_id`, `consultation_date`, `hospital_id`, `service_id`, `doctor_dni`, `diagnosis`, `treatment`, `is_admitted`, `room`, `discharged_date`) VALUES
(2, 1, '2020-01-01 11:00:00', 1, 'sclinica', '123457', 'Diagnostico', 'Tratamiento', 0, -1, NULL),
(3, 1, '2020-01-01 11:00:00', 1, 'sclinica', '123457', 'Diagnostico', 'Tratamiento', 0, -1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `dni` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthdate` date NOT NULL,
  `hospital_id` int(11) NOT NULL COMMENT 'Hospital al que esta adscripto',
  `is_director` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`dni`, `name`, `last_name`, `birthdate`, `hospital_id`, `is_director`) VALUES
('123457', 'Juan', 'Perez', '1979-01-01', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_services`
--

CREATE TABLE `doctors_services` (
  `doctor_dni` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `service_id` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `doctors_services`
--

INSERT INTO `doctors_services` (`doctor_dni`, `service_id`, `hospital_id`) VALUES
('123457', 'sclinica', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL COMMENT 'codHospital',
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `location_id`, `phone`) VALUES
(1, 'Hospital 1 - Editado', 1, '021344556');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_services`
--

CREATE TABLE `hospitals_services` (
  `hospital_id` int(11) NOT NULL,
  `service_id` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `beds_total` int(11) NOT NULL DEFAULT 0,
  `beds_available` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `hospitals_services`
--

INSERT INTO `hospitals_services` (`hospital_id`, `service_id`, `beds_total`, `beds_available`) VALUES
(1, 'sclinica', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Asunción'),
(2, 'Lambare');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location_id` int(11) NOT NULL COMMENT 'ciudad donde vive',
  `address` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'direccion donde vive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `dni`, `name`, `last_name`, `birthdate`, `phone`, `email`, `location_id`, `address`) VALUES
(1, '3612894', 'Sergio', 'Alcaraz', '1992-10-05', '0987665421', 'mail@mail.com', 1, 'Calle 2');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comentary` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `comentary`) VALUES
('sclinica', 'Servicio Clínica médica', 'Con comentario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_record_id` (`medical_record_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `doctor_id` (`doctor_dni`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `doctors_services`
--
ALTER TABLE `doctors_services`
  ADD PRIMARY KEY (`doctor_dni`,`service_id`,`hospital_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `hospitals_services`
--
ALTER TABLE `hospitals_services`
  ADD PRIMARY KEY (`service_id`,`hospital_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codHospital', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`medical_record_id`) REFERENCES `medical_records` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `consultations_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `consultations_ibfk_3` FOREIGN KEY (`doctor_dni`) REFERENCES `doctors` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `consultations_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `doctors_services`
--
ALTER TABLE `doctors_services`
  ADD CONSTRAINT `doctors_services_ibfk_1` FOREIGN KEY (`doctor_dni`) REFERENCES `doctors` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctors_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctors_services_ibfk_3` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `hospitals_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hospitals_services`
--
ALTER TABLE `hospitals_services`
  ADD CONSTRAINT `hospitals_services_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hospitals_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

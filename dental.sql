-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 09:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(100) NOT NULL,
  `name` char(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `patient_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `name`, `appointment_date`, `appointment_time`, `patient_id`) VALUES
(1, 'adam', '2017-12-15', '14:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `medical_id` int(100) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `asthma` varchar(255) NOT NULL,
  `diabetes` varchar(255) NOT NULL,
  `hypertension` varchar(255) NOT NULL,
  `blooddyscrasias` varchar(255) NOT NULL,
  `heartdisease` varchar(255) NOT NULL,
  `congenitalheart` varchar(255) NOT NULL,
  `otherdisease` varchar(255) NOT NULL,
  `medictaken` varchar(255) NOT NULL,
  `patient_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`medical_id`, `allergies`, `asthma`, `diabetes`, `hypertension`, `blooddyscrasias`, `heartdisease`, `congenitalheart`, `otherdisease`, `medictaken`, `patient_id`) VALUES
(1, 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(100) NOT NULL,
  `name` char(100) NOT NULL,
  `matric_staffno` varchar(100) NOT NULL,
  `fac_dept` char(100) NOT NULL,
  `ic_passno` varchar(12) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `citizen` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `patient_consent` char(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `name`, `matric_staffno`, `fac_dept`, `ic_passno`, `position`, `gender`, `citizen`, `phoneno`, `address`, `patient_consent`, `id`) VALUES
(1, 'camila', 'd031410224', 'fke', '960304051224', 'Student', 'female', 'Malaysia', '014-4567890', 'melaka', 'approve', 1),
(2, 'adam', 'd445', 'ftk', '789', 'Student', 'male', 'Malaysia', '1234', 'perak', 'approve', 1),
(3, 'ila', 'b03162', 'ftmk', '9609', 'Staff', 'female', 'Malaysia', '019', 'no 8', '', 0),
(4, 'ila', 'b03162', 'ftmk', '9609', 'Staff', 'female', 'Malaysia', '019', 'no 8', 'approve', 0),
(5, 'nani', 'b03162', 'fkm', '9605', 'Staff', 'female', 'Malaysia', '017', 'sg besar', 'approve', 0),
(6, 'syahir', 'b03151', 'ftmk', '9603', 'Staff', 'male', 'Malaysia', '013', 'kelantan', 'approve', 0),
(7, 'umi', 'b03162', 'ftmk', '9610', 'Staff', 'female', 'Malaysia', '017', 'batu berendam', 'approve', 0),
(8, 'umi', 'b0987', 'ftmk', '45764', 'Student', 'female', 'Malaysia', '4567', 'melaka', 'approve', 0),
(12, 'zila', 'B031620003', 'FTMK', '961019565344', 'Student', 'female', 'Malaysia', '0132502570', 'Bandar Baru Bangi', 'approve', 0),
(13, 'ian', 'b03171', 'ftmk', '990910', 'Student', 'Male', 'malaysia', '013', 'melaka', 'approve', 0),
(14, 'azyan', 'b031620059', 'fkekk', '9605', 'Staff', 'Female', 'malaysia', '017', 'penang', 'approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_details`
--

CREATE TABLE `treatment_details` (
  `details_id` int(100) NOT NULL,
  `details_date` date NOT NULL,
  `tooth_type` int(100) NOT NULL,
  `details_notes` varchar(255) NOT NULL,
  `patient_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_details`
--

INSERT INTO `treatment_details` (`details_id`, `details_date`, `tooth_type`, `details_notes`, `patient_id`) VALUES
(1, '2017-12-17', 21, 'test', 1),
(2, '2017-12-17', 22, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_record`
--

CREATE TABLE `treatment_record` (
  `treatment_id` int(100) NOT NULL,
  `treatment_date` date NOT NULL,
  `tooth_type` int(100) NOT NULL,
  `treatment_note` varchar(255) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `gg_55` text NOT NULL,
  `gg_54` text NOT NULL,
  `gg_53` text NOT NULL,
  `gg_52` text NOT NULL,
  `gg_51` text NOT NULL,
  `gg_61` text NOT NULL,
  `gg_62` text NOT NULL,
  `gg_63` text NOT NULL,
  `gg_64` text NOT NULL,
  `gg_65` text NOT NULL,
  `gg_18` text NOT NULL,
  `gg_17` text NOT NULL,
  `gg_16` text NOT NULL,
  `gg_15` text NOT NULL,
  `gg_14` text NOT NULL,
  `gg_13` text NOT NULL,
  `gg_12` text NOT NULL,
  `gg_11` text NOT NULL,
  `gg_21` text NOT NULL,
  `gg_22` text NOT NULL,
  `gg_23` text NOT NULL,
  `gg_24` text NOT NULL,
  `gg_25` text NOT NULL,
  `gg_26` text NOT NULL,
  `gg_27` text NOT NULL,
  `gg_28` text NOT NULL,
  `gg_48` text NOT NULL,
  `gg_47` text NOT NULL,
  `gg_46` text NOT NULL,
  `gg_45` text NOT NULL,
  `gg_44` text NOT NULL,
  `gg_43` text NOT NULL,
  `gg_42` text NOT NULL,
  `gg_41` text NOT NULL,
  `gg_31` text NOT NULL,
  `gg_32` text NOT NULL,
  `gg_33` text NOT NULL,
  `gg_34` text NOT NULL,
  `gg_35` text NOT NULL,
  `gg_36` text NOT NULL,
  `gg_37` text NOT NULL,
  `gg_38` text NOT NULL,
  `gg_85` text NOT NULL,
  `gg_84` text NOT NULL,
  `gg_83` text NOT NULL,
  `gg_82` text NOT NULL,
  `gg_81` text NOT NULL,
  `gg_71` text NOT NULL,
  `gg_72` text NOT NULL,
  `gg_73` text NOT NULL,
  `gg_74` text NOT NULL,
  `gg_75` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_record`
--

INSERT INTO `treatment_record` (`treatment_id`, `treatment_date`, `tooth_type`, `treatment_note`, `patient_id`, `gg_55`, `gg_54`, `gg_53`, `gg_52`, `gg_51`, `gg_61`, `gg_62`, `gg_63`, `gg_64`, `gg_65`, `gg_18`, `gg_17`, `gg_16`, `gg_15`, `gg_14`, `gg_13`, `gg_12`, `gg_11`, `gg_21`, `gg_22`, `gg_23`, `gg_24`, `gg_25`, `gg_26`, `gg_27`, `gg_28`, `gg_48`, `gg_47`, `gg_46`, `gg_45`, `gg_44`, `gg_43`, `gg_42`, `gg_41`, `gg_31`, `gg_32`, `gg_33`, `gg_34`, `gg_35`, `gg_36`, `gg_37`, `gg_38`, `gg_85`, `gg_84`, `gg_83`, `gg_82`, `gg_81`, `gg_71`, `gg_72`, `gg_73`, `gg_74`, `gg_75`) VALUES
(1, '2017-12-08', 0, 'test', 1, 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(2, '0000-00-00', 0, '', 1, 'normal2', 'perlucabut', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(3, '0000-00-00', 0, '', 1, 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'xdegigi', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(4, '0000-00-00', 0, '', 1, 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'tunggul', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(5, '0000-00-00', 0, '', 1, 'normal2', 'normal2', 'untuktampal', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(6, '0000-00-00', 0, '', 1, 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'adatampal', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(7, '0000-00-00', 0, '', 1, 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'perlucabut', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(8, '0000-00-00', 0, '', 1, 'xdegigi', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(9, '2017-12-14', 0, '', 1, 'perlucabut', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(10, '2017-12-18', 0, '', 1, 'normal2', 'perlucabut', 'normal1', 'normal1', 'normal1', 'perlucabut', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(11, '2017-12-19', 0, '', 1, 'normal2', 'perlucabut', 'normal1', 'adatampal', 'normal1', 'perlucabut', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(12, '2017-12-20', 21, 'test', 1, 'normal2', 'perlucabut', 'normal1', 'adatampal', 'normal1', 'perlucabut', 'tunggul', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2'),
(13, '2017-12-18', 41, 'baik', 2, 'normal2', 'perlucabut', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal2', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal1', 'normal2', 'normal2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` char(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'registrar', '1', 'registrar'),
(2, 'dentist', '1', 'dentist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`medical_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `treatment_details`
--
ALTER TABLE `treatment_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `treatment_record`
--
ALTER TABLE `treatment_record`
  ADD PRIMARY KEY (`treatment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `medical_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `treatment_details`
--
ALTER TABLE `treatment_details`
  MODIFY `details_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `treatment_record`
--
ALTER TABLE `treatment_record`
  MODIFY `treatment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

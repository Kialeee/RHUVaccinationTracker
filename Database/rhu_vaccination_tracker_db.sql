-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhu_vaccination_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `sitio` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `fname`, `mname`, `lname`, `age`, `gender`, `nationality`, `province`, `city`, `barangay`, `sitio`, `username`, `password`, `date`) VALUES
(7, 506127339830593146, 'Eric', 'Wakobalo', 'Gimena', '24', 'Male', 'Filipino', 'Cebu', 'Rnda', 'Ambot asa', 'Duol Dagat', 'eric', 'cooleric', '2022-11-06 04:44:39'),
(12, 8096025, 'Teltel', 'Ali', 'Alesna', '25', 'Female', 'Filipino', 'Philippines', 'Carcar City', 'Pob. I', 'Caipilan', 'krystelle', 'krystellemarie', '2022-11-19 10:42:40'),
(15, 4745626352, 'Kirk', 'Alicaba', 'Alesna', '21', 'Male', 'Filipino', 'Cebu', 'Carcar City', 'Poblacion I', 'Caipilan', 'admin1', 'cooladmin1', '2023-01-06 05:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `sitio` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `fname`, `mname`, `lname`, `birthdate`, `age`, `gender`, `nationality`, `province`, `city`, `barangay`, `sitio`, `username`, `password`, `date`) VALUES
(82, 9320291395, 'Kerwin', 'Alicaba', 'Alesna', '2002-10-15', '20', 'Male', 'Filipino', 'Cebu', 'Carcar City', 'Poblacion I', 'Caipilan', 'user1', 'cooluser1', '2023-01-23 05:06:21'),
(83, 6355404328, 'Bob Argyle', 'Alesna', 'Ponla', '2012-10-08', '10', 'Male', 'Filipino', 'Cebu', 'Carcar City', 'Poblacion I', 'Caipilan', 'bob', 'bobargyle', '2023-01-24 07:37:13'),
(84, 5181755252, 'Eric', 'Lopez', 'Gimena', '1999-08-19', '23', 'Male', 'Filipino', 'Cebu', 'Carcar City', 'Poblacion I', 'Caipilan', 'ericgimena', 'dirtyeric', '2023-01-23 05:14:16'),
(85, 4358016701, 'Giannis Argyle', 'Alesna', 'Ponla', '2019-05-16', '3', 'Male', 'Filipino', 'Cebu', 'Carcar City', 'Poblacion I', 'Caipilan', 'giannis', 'giannisargyle', '2023-01-24 08:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) NOT NULL,
  `vacc1` varchar(255) NOT NULL,
  `quantity1` int(11) NOT NULL,
  `vacc2` varchar(255) NOT NULL,
  `quantity2` int(11) NOT NULL,
  `vacc3` varchar(255) NOT NULL,
  `quantity3` int(11) NOT NULL,
  `vacc4` varchar(255) NOT NULL,
  `quantity4` int(11) NOT NULL,
  `vacc5` varchar(255) NOT NULL,
  `quantity5` int(11) NOT NULL,
  `week_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `vacc1`, `quantity1`, `vacc2`, `quantity2`, `vacc3`, `quantity3`, `vacc4`, `quantity4`, `vacc5`, `quantity5`, `week_no`) VALUES
(69, 'Flu Vaccine', 150, 'Anti-rabies', 100, 'Apeke Vaccine', 1, 'AstraZeneca COVID-19 Vaccine', 150, 'COVID-19 Vaccine, mRNA', 350, '2023-W01'),
(70, 'Hepatitis B Vaccine (Recombinant)', 300, 'Alesna Vaccine', 560, 'Flu Vaccine', 150, 'Measles Vaccine', 90, 'Pfizer-BioNTech COVID-19 Vaccine', 500, '2023-W02'),
(71, 'Anti-rabies', 100, 'Measles Vaccine', 90, 'Alesna Vaccine', 560, 'Novavax COVID-19 Vaccine', 700, 'Apeke Vaccine', 1, '2023-W03'),
(72, 'Apeke Vaccine', 1, 'COVID-19 Vaccine, mRNA', 350, 'Anti-rabies', 100, 'Alesna Vaccine', 560, 'Sinovac', 450, '2023-W04'),
(73, 'Anti-rabies', 100, 'Apeke Vaccine', 1, 'AstraZeneca COVID-19 Vaccine', 150, 'Gealon Vaccine', 699, 'Moderna COVID-19 Vaccine/spikevax', 200, '2023-W05');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) NOT NULL,
  `vacc_code` bigint(20) NOT NULL,
  `vacc_administration_code` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `vacc_name` varchar(100) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `ndc10` varchar(20) NOT NULL,
  `ndc11` varchar(100) NOT NULL,
  `arrival_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `vacc_code`, `vacc_administration_code`, `manufacturer`, `vacc_name`, `quantity`, `ndc10`, `ndc11`, `arrival_date`, `expiry_date`) VALUES
(36, 10001, '101', 'Alesna Inc', 'Alesna Vaccine', 560, '1000000001', '10000000001', '2023-01-23', '2023-02-23'),
(37, 10002, '102', 'Dogshow Inc.', 'Anti-rabies', 100, '1000000002', '10000000002', '2023-01-23', '2023-02-23'),
(38, 10003, '103', 'Apeke Pharma Inc.', 'Apeke Vaccine', 1, '1000000003', '10000000003', '2023-01-23', '2023-02-23'),
(39, 10004, '104', 'AstraZeneca Inc.', 'AstraZeneca COVID-19 Vaccine', 150, '1000000004', '10000000004', '2023-01-23', '2023-02-23'),
(40, 10005, '105', 'Comirnaty Inc.', 'COVID-19 Vaccine, mRNA', 350, '1000000005', '10000000005', '2023-01-23', '2023-02-23'),
(41, 10006, '106', 'Nestle Inc.', 'Flu Vaccine', 150, '1000000006', '10000000006', '2023-01-23', '2023-02-23'),
(42, 10007, '107', 'Gealon Inc.', 'Gealon Vaccine', 699, '1000000007', '10000000007', '2023-01-23', '2023-02-23'),
(43, 10008, '108', 'World Health Organization', 'H1N1 Vaccine', 1200, '1000000008', '10000000008', '2023-01-23', '2023-02-23'),
(44, 10009, '109', 'Philippine Government', 'Hepatitis B Vaccine (Recombinant)', 300, '1000000009', '10000000009', '2023-01-23', '2023-02-23'),
(45, 10010, '110', 'Janssen Inc', 'Janssen COVID-19 Vaccine', 100, '1000000010', '10000000010', '2023-01-23', '2023-02-23'),
(46, 10011, '111', 'World Health Organization', 'Measles Vaccine', 90, '1000000011', '10000000011', '2023-01-23', '2023-02-23'),
(47, 10012, '112', 'Moderna, Inc', 'Moderna COVID-19 Vaccine/spikevax', 200, '1000000012', '10000000012', '2023-01-23', '2023-02-23'),
(48, 10013, '113', 'Novavax Inc.', 'Novavax COVID-19 Vaccine', 700, '1000000013', '10000000013', '2023-01-23', '2023-02-23'),
(49, 10014, '114', 'Pfizer, Inc', 'Pfizer-BioNTech COVID-19 Vaccine', 500, '1000000014', '10000000014', '2023-01-23', '2023-02-23'),
(50, 10015, '115', 'Sinovac Inc.', 'Sinovac', 450, '1000000015', '10000000015', '2023-01-23', '2023-02-23'),
(51, 10016, '116', 'Trumenba Inc.', 'Trumenba', 159, '1000000016', '10000000016', '2023-01-23', '2023-02-23'),
(53, 10018, '118', 'Devibar Incorporated', 'Devibar Vaccine', 355, '1000000018', '10000000018', '2023-01-25', '2023-02-25'),
(54, 10020, '120', 'Famat Incorporated', 'Famat Vaccine', 300, '1000000020', '10000000020', '2023-01-25', '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `vacc_backtracking_records`
--

CREATE TABLE `vacc_backtracking_records` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `vacc__name1` varchar(100) NOT NULL,
  `administered__by1` varchar(100) NOT NULL,
  `age__atm__taken1` int(11) NOT NULL,
  `date__taken1` date NOT NULL,
  `vacc__name2` varchar(100) NOT NULL,
  `administered__by2` varchar(100) NOT NULL,
  `age__atm__taken2` int(11) NOT NULL,
  `date__taken2` date NOT NULL,
  `vacc__name3` varchar(100) NOT NULL,
  `administered__by3` varchar(100) NOT NULL,
  `age__atm__taken3` int(11) NOT NULL,
  `date__taken3` date NOT NULL,
  `vacc__name4` varchar(100) NOT NULL,
  `administered__by4` varchar(100) NOT NULL,
  `age__atm__taken4` int(11) NOT NULL,
  `date__taken4` date NOT NULL,
  `vacc__name5` varchar(100) NOT NULL,
  `administered__by5` varchar(100) NOT NULL,
  `age__atm__taken5` int(11) NOT NULL,
  `date__taken5` date NOT NULL,
  `vacc__name6` varchar(100) NOT NULL,
  `administered__by6` varchar(100) NOT NULL,
  `age__atm__taken6` int(11) NOT NULL,
  `date__taken6` date NOT NULL,
  `vacc__name7` varchar(100) NOT NULL,
  `administered__by7` varchar(100) NOT NULL,
  `age__atm__taken7` int(11) NOT NULL,
  `date__taken7` date NOT NULL,
  `vacc__name8` varchar(100) NOT NULL,
  `administered__by8` varchar(100) NOT NULL,
  `age__atm__taken8` int(11) NOT NULL,
  `date__taken8` date NOT NULL,
  `vacc__name9` varchar(100) NOT NULL,
  `administered__by9` varchar(100) NOT NULL,
  `age__atm__taken9` int(11) NOT NULL,
  `date__taken9` date NOT NULL,
  `vacc__name10` varchar(100) NOT NULL,
  `administered__by10` varchar(100) NOT NULL,
  `age__atm__taken10` int(11) NOT NULL,
  `date__taken10` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacc_backtracking_records`
--

INSERT INTO `vacc_backtracking_records` (`id`, `user_id`, `vacc__name1`, `administered__by1`, `age__atm__taken1`, `date__taken1`, `vacc__name2`, `administered__by2`, `age__atm__taken2`, `date__taken2`, `vacc__name3`, `administered__by3`, `age__atm__taken3`, `date__taken3`, `vacc__name4`, `administered__by4`, `age__atm__taken4`, `date__taken4`, `vacc__name5`, `administered__by5`, `age__atm__taken5`, `date__taken5`, `vacc__name6`, `administered__by6`, `age__atm__taken6`, `date__taken6`, `vacc__name7`, `administered__by7`, `age__atm__taken7`, `date__taken7`, `vacc__name8`, `administered__by8`, `age__atm__taken8`, `date__taken8`, `vacc__name9`, `administered__by9`, `age__atm__taken9`, `date__taken9`, `vacc__name10`, `administered__by10`, `age__atm__taken10`, `date__taken10`) VALUES
(85, 4358016701, 'Anti-tetanus', 'Carcar Provincial Hostpital', 2, '2021-07-04', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(84, 5181755252, 'Pfizer', 'Ronda Health Center', 21, '2021-08-12', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(83, 6355404328, 'Anti-tetanus', 'Carcar Provincial Hostpital', 7, '2020-04-15', 'Anti-takig', 'Doctor Quackquack', 7, '2020-02-05', 'Watitiw Vaccine', 'Dr. Hilason', 4, '2017-06-12', 'Slither Vaccine', 'Dr. Vegapunk', 2, '2015-03-18', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(82, 9320291395, 'Anti-bukol', 'Caipilan Health Center', 12, '2015-03-10', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vacc_delivery_logs`
--

CREATE TABLE `vacc_delivery_logs` (
  `id` int(11) NOT NULL,
  `vacc_code` bigint(20) NOT NULL,
  `vacc_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `arrival_time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacc_delivery_logs`
--

INSERT INTO `vacc_delivery_logs` (`id`, `vacc_code`, `vacc_name`, `quantity`, `arrival_time`) VALUES
(32, 4237462, 'x', 20, '09:11:32 PM'),
(32, 4237462, 'x', 50, '09:23:42 PM'),
(26, 56789, 'x', 8, '08:31:42 AM'),
(36, 10001, '', 100, '12:40:34 PM'),
(37, 10002, '', 100, '12:41:58 PM'),
(38, 10003, '', 5, '12:43:01 PM'),
(39, 10004, '', 150, '12:44:09 PM'),
(40, 10005, '', 350, '12:44:58 PM'),
(41, 10006, '', 150, '12:48:28 PM'),
(42, 10007, '', 700, '12:49:44 PM'),
(43, 10008, '', 1200, '12:50:59 PM'),
(44, 10009, '', 300, '12:51:47 PM'),
(45, 10010, '', 100, '12:52:55 PM'),
(46, 10011, '', 90, '12:53:40 PM'),
(47, 10012, '', 200, '12:54:26 PM'),
(48, 10013, '', 700, '12:55:18 PM'),
(49, 10014, '', 500, '12:55:55 PM'),
(50, 10015, '', 450, '12:56:41 PM'),
(51, 10016, '', 160, '12:57:28 PM'),
(36, 10001, '', 400, '01:15:51 PM'),
(52, 10001, '', 60, '01:17:44 PM'),
(36, 10001, '', 50, '01:18:40 PM'),
(36, 10001, '', 10, '01:58:37 PM'),
(53, 10018, '', 355, '01:12:44 PM'),
(54, 10020, '', 300, '01:54:33 PM');

-- --------------------------------------------------------

--
-- Table structure for table `vacc_records`
--

CREATE TABLE `vacc_records` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `vacc_name1` varchar(100) NOT NULL,
  `administered_by1` varchar(100) NOT NULL,
  `age_atm_taken1` int(11) NOT NULL,
  `date_taken1` date NOT NULL,
  `vacc_name2` varchar(100) NOT NULL,
  `administered_by2` varchar(100) NOT NULL,
  `age_atm_taken2` int(11) NOT NULL,
  `date_taken2` date NOT NULL,
  `vacc_name3` varchar(100) NOT NULL,
  `administered_by3` varchar(100) NOT NULL,
  `age_atm_taken3` int(11) NOT NULL,
  `date_taken3` date NOT NULL,
  `vacc_name4` varchar(100) NOT NULL,
  `administered_by4` varchar(100) NOT NULL,
  `age_atm_taken4` int(11) NOT NULL,
  `date_taken4` date NOT NULL,
  `vacc_name5` varchar(100) NOT NULL,
  `administered_by5` varchar(100) NOT NULL,
  `age_atm_taken5` int(11) NOT NULL,
  `date_taken5` date NOT NULL,
  `vacc_name6` varchar(100) NOT NULL,
  `administered_by6` varchar(100) NOT NULL,
  `age_atm_taken6` int(11) NOT NULL,
  `date_taken6` date NOT NULL,
  `vacc_name7` varchar(100) NOT NULL,
  `administered_by7` varchar(100) NOT NULL,
  `age_atm_taken7` int(11) NOT NULL,
  `date_taken7` date NOT NULL,
  `vacc_name8` varchar(100) NOT NULL,
  `administered_by8` varchar(100) NOT NULL,
  `age_atm_taken8` int(11) NOT NULL,
  `date_taken8` date NOT NULL,
  `vacc_name9` varchar(100) NOT NULL,
  `administered_by9` varchar(100) NOT NULL,
  `age_atm_taken9` int(11) NOT NULL,
  `date_taken9` date NOT NULL,
  `vacc_name10` varchar(100) NOT NULL,
  `administered_by10` varchar(100) NOT NULL,
  `age_atm_taken10` int(11) NOT NULL,
  `date_taken10` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacc_records`
--

INSERT INTO `vacc_records` (`id`, `user_id`, `vacc_name1`, `administered_by1`, `age_atm_taken1`, `date_taken1`, `vacc_name2`, `administered_by2`, `age_atm_taken2`, `date_taken2`, `vacc_name3`, `administered_by3`, `age_atm_taken3`, `date_taken3`, `vacc_name4`, `administered_by4`, `age_atm_taken4`, `date_taken4`, `vacc_name5`, `administered_by5`, `age_atm_taken5`, `date_taken5`, `vacc_name6`, `administered_by6`, `age_atm_taken6`, `date_taken6`, `vacc_name7`, `administered_by7`, `age_atm_taken7`, `date_taken7`, `vacc_name8`, `administered_by8`, `age_atm_taken8`, `date_taken8`, `vacc_name9`, `administered_by9`, `age_atm_taken9`, `date_taken9`, `vacc_name10`, `administered_by10`, `age_atm_taken10`, `date_taken10`) VALUES
(85, 4358016701, 'Apeke Vaccine', 'RHU I', 3, '2023-01-24', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(84, 5181755252, 'Apeke Vaccine', 'RHI II', 23, '2023-01-23', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(83, 6355404328, 'Apeke Vaccine', 'RHU I', 10, '2023-01-23', 'Gealon Vaccine', 'RHU II', 10, '2023-01-23', 'Trumenba', 'RHU I', 10, '2023-01-25', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00'),
(82, 9320291395, 'Apeke Vaccine', 'RHU I', 20, '2023-01-23', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00', '', '', 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`),
  ADD KEY `fname` (`fname`),
  ADD KEY `mname` (`mname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `gender` (`gender`),
  ADD KEY `age` (`age`),
  ADD KEY `nationality` (`nationality`),
  ADD KEY `province` (`province`),
  ADD KEY `city` (`city`),
  ADD KEY `barangay` (`barangay`),
  ADD KEY `sitio` (`sitio`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `mname` (`mname`),
  ADD KEY `age` (`age`),
  ADD KEY `gender` (`gender`),
  ADD KEY `nationality` (`nationality`),
  ADD KEY `province` (`province`),
  ADD KEY `city` (`city`),
  ADD KEY `barangay` (`barangay`),
  ADD KEY `sitio` (`sitio`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacc_code` (`vacc_code`),
  ADD KEY `vacc_administration_code` (`vacc_administration_code`),
  ADD KEY `manufacturer` (`manufacturer`),
  ADD KEY `vacc_name` (`vacc_name`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `ndc10` (`ndc10`),
  ADD KEY `ndc11` (`ndc11`),
  ADD KEY `arrival_date` (`arrival_date`),
  ADD KEY `expiry_date` (`expiry_date`);

--
-- Indexes for table `vacc_backtracking_records`
--
ALTER TABLE `vacc_backtracking_records`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `vacc_delivery_logs`
--
ALTER TABLE `vacc_delivery_logs`
  ADD KEY `id` (`id`);

--
-- Indexes for table `vacc_records`
--
ALTER TABLE `vacc_records`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

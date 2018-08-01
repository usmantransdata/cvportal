-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 12:21 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trans_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_details`
--

DROP TABLE IF EXISTS `batch_details`;
CREATE TABLE `batch_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `batch_process_bit` int(11) NOT NULL DEFAULT '0',
  `total_record_count` int(11) NOT NULL DEFAULT '0',
  `batch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(191) NOT NULL,
  `instructions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_details`
--

INSERT INTO `batch_details` (`id`, `uploader_id`, `client_id`, `batch_process_bit`, `total_record_count`, `batch_name`, `status_id`, `instructions`, `due_date`, `created_at`) VALUES
(78, 47, 21, 0, 0, 'demo batch ammad', 2, 'non', '2018-02-09 15:42:18', '2018-02-12 09:53:30'),
(79, 47, 21, 0, 20, 'demo batch ammad', 5, 'non', '2018-02-09 15:43:22', '2018-02-12 10:33:29'),
(80, 55, 25, 0, 0, 'Demo Bath', 1, 'This is a demo batch', '2018-02-09 16:16:01', '2018-02-09 16:16:01'),
(81, 55, 25, 0, 20, 'Demo Batch', 4, 'demo', '2018-02-09 16:17:33', '2018-02-09 16:32:21'),
(82, 47, 21, 0, 20, 'new batch', 4, 'dsad', '2018-02-09 16:41:09', '2018-02-09 16:55:33'),
(83, 56, 26, 0, 20, 'Demo batch', 4, 'this is priority', '2018-02-09 17:13:24', '2018-02-09 17:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `batch_log`
--

DROP TABLE IF EXISTS `batch_log`;
CREATE TABLE `batch_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_status_id` int(11) NOT NULL,
  `status_change_date` int(11) NOT NULL,
  `updated_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_status`
--

DROP TABLE IF EXISTS `batch_status`;
CREATE TABLE `batch_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_status`
--

INSERT INTO `batch_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Submited'),
(3, 'In-Process'),
(4, 'Completed'),
(5, 'QA-Review');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact__person_phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `organization_name`, `contact_first_name`, `contact_last_name`, `contact_person_email`, `contact__person_phoneNumber`, `address1`, `address2`, `country`, `city`, `state`, `zip`, `created_at`) VALUES
(21, 'Trans Data', 'hecki', 'client', 'heckias47@gmail.com', '521321ds32', '', '', '23d1as3', '', '', '', '2018-02-06 14:12:42'),
(25, 'Osman llc', 'Osman', 'Khalid', 'usman@transdata.biz', '031245645', '', '', 'lahr', '', '', '', '2018-02-09 16:10:06'),
(26, 'ammad llc', 'ammad', 'samar', 'ammadsamar11@gmail.com', '1231321', '', '', 'lhr', '', '', '', '2018-02-09 17:08:20'),
(34, 'Fiaz llc', 'muhammad', 'fiaz', 'muhammad.fiaz@transdata.biz', '03104852112', 'lahore', 'lahore', 'pakistan', 'lahore', 'punjab', '55055', '2018-02-12 12:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `company_managers`
--

DROP TABLE IF EXISTS `company_managers`;
CREATE TABLE `company_managers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_managers`
--

INSERT INTO `company_managers` (`id`, `user_id`, `client_id`, `created_at`, `updated_at`) VALUES
(25, 26, 21, '2018-02-01 05:25:33', '2018-02-07 05:48:17'),
(26, 25, 24, '2018-02-02 05:39:07', '2018-02-07 05:48:21'),
(27, 26, 25, '2018-02-09 11:19:44', '2018-02-09 11:19:44'),
(28, 25, 26, '2018-02-09 12:19:11', '2018-02-09 12:19:11'),
(29, 25, 30, '2018-02-12 06:10:09', '2018-02-12 06:10:09'),
(30, 25, 31, '2018-02-12 06:28:09', '2018-02-12 06:28:09'),
(31, 25, 32, '2018-02-12 06:42:07', '2018-02-12 06:42:07'),
(32, 25, 33, '2018-02-12 07:04:53', '2018-02-12 07:04:53'),
(33, 26, 34, '2018-02-12 07:25:35', '2018-02-12 07:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `compare_data`
--

DROP TABLE IF EXISTS `compare_data`;
CREATE TABLE `compare_data` (
  `id` int(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compare_data`
--

INSERT INTO `compare_data` (`id`, `batch_id`, `first_name`, `last_name`, `title`, `phone_number`, `validation`, `disposition`, `organization`, `address1`, `address2`, `health_status`, `created_at`) VALUES
(1, 79, 'Philip', 'High', 'OWNER', '(319) 377-1899', '\\N', '\\N', '', 'IA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(2, 79, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(3, 79, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(4, 79, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', '\\N', '\\N', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(5, 79, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', '\\N', '\\N', '', 'FL', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(6, 79, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', '\\N', '\\N', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(7, 79, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(8, 79, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(9, 79, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', '\\N', '\\N', '', 'TN', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(10, 79, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', '\\N', '\\N', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(11, 79, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', '\\N', '\\N', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(12, 79, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', '\\N', '\\N', '', 'MI', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(13, 79, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', '\\N', '\\N', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(14, 79, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', '\\N', '\\N', '', 'GA', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(15, 79, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', '\\N', '\\N', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(16, 79, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', '\\N', '\\N', '', 'OK', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(17, 79, 'Denise', 'Thompson', 'FOUNDER', 'N', '\\N', '\\N', '', 'OH', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(18, 79, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', '\\N', '\\N', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(19, 79, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', '\\N', '\\N', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(20, 79, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', '\\N', '\\N', '', 'ME', 'United States', 'Good Record', '2018-02-09 16:04:43'),
(21, 81, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'Verified', 'working', '', 'IA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(22, 81, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'Verified', 'promoted', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(23, 81, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'Verified', 'working', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(24, 81, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'Verified', 'promoted', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(25, 81, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'Verified', 'working', '', 'FL', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(26, 81, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'Verified', 'promoted', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(27, 81, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'Not Verified', 'left employee', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(28, 81, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'Not Verified', 'number invalid', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(29, 81, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'Not Verified', 'invalid number', '', 'TN', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(30, 81, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'Not Verified', 'location changed', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(31, 81, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'Not Verified', 'location changed', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(32, 81, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'Not Verified', 'location changed', '', 'MI', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(33, 81, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'Not Verified', 'location changed', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(34, 81, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'Verified', 'working', '', 'GA', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(35, 81, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'Not Verified', 'left employee', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(36, 81, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'Verified', 'working', '', 'OK', 'United States', 'Good Record', '2018-02-09 16:32:11'),
(37, 81, 'Denise', 'Thompson', 'FOUNDER', 'N', 'Not Verified', 'invalid name', '', 'OH', 'United States', 'Good Record', '2018-02-09 16:32:12'),
(38, 81, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'Verified', 'working', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:32:12'),
(39, 81, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'Verified', 'working', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:32:12'),
(40, 81, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'Verified', 'working', '', 'ME', 'United States', 'Good Record', '2018-02-09 16:32:12'),
(41, 82, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'valid', 'on ', 'Trans Data', 'IA', 'United States', 'Good Record', '2018-02-09 16:55:27'),
(42, 82, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:27'),
(43, 82, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:27'),
(44, 82, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'valid', 'on ', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(45, 82, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'valid', 'on ', 'Trans Data', 'FL', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(46, 82, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'valid', 'on ', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(47, 82, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(48, 82, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(49, 82, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'valid', 'on ', 'Trans Data', 'TN', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(50, 82, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'valid', 'on ', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(51, 82, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'valid', 'on ', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(52, 82, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'valid', 'on ', 'Trans Data', 'MI', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(53, 82, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'valid', 'on ', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(54, 82, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'valid', 'on ', 'Trans Data', 'GA', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(55, 82, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'valid', 'on ', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(56, 82, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'valid', 'on ', 'Trans Data', 'OK', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(57, 82, 'Denise', 'Thompson', 'FOUNDER', 'N', 'valid', 'on ', 'Trans Data', 'OH', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(58, 82, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'valid', 'on ', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(59, 82, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'valid', 'on ', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(60, 82, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'valid', 'on ', 'Trans Data', 'ME', 'United States', 'Good Record', '2018-02-09 16:55:28'),
(61, 83, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'valid', 'yes', 'Trans Data', 'IA', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(62, 83, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(63, 83, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(64, 83, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'not valid', 'yes', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(65, 83, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'not valid', 'yes', 'Trans Data', 'FL', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(66, 83, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'not valid', 'yes', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(67, 83, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(68, 83, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(69, 83, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'not valid', 'yes', 'Trans Data', 'TN', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(70, 83, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'not valid', 'yes', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(71, 83, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'not valid', 'yes', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(72, 83, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'not valid', 'yes', 'Trans Data', 'MI', 'United States', 'Good Record', '2018-02-09 17:29:01'),
(73, 83, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'not valid', 'yes', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(74, 83, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'not valid', 'yes', 'Trans Data', 'GA', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(75, 83, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'not valid', 'yes', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(76, 83, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'not valid', 'yes', 'Trans Data', 'OK', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(77, 83, 'Denise', 'Thompson', 'FOUNDER', 'N', 'not valid', 'yes', 'Trans Data', 'OH', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(78, 83, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'not valid', 'yes', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(79, 83, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'not valid', 'yes', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 17:29:02'),
(80, 83, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'not valid', 'yes', 'Trans Data', 'ME', 'United States', 'Good Record', '2018-02-09 17:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_health`
--

DROP TABLE IF EXISTS `contact_health`;
CREATE TABLE `contact_health` (
  `id` int(10) UNSIGNED NOT NULL,
  `health_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_batch`
--

DROP TABLE IF EXISTS `content_batch`;
CREATE TABLE `content_batch` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number1` int(11) NOT NULL,
  `phone_number2` int(11) NOT NULL,
  `phone_number3` int(11) NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_19_110712_create_batch_details_table', 1),
(4, '2018_01_19_111758_create_roles_table', 1),
(6, '2018_01_19_111827_create_order_batch_table', 1),
(7, '2018_01_19_134511_create_batch_status_table', 2),
(8, '2018_01_19_134603_create_batch_log_table', 3),
(9, '2018_01_19_134954_create_contact_health_table', 3),
(11, '2018_01_22_120842_add_disposition_column_to_order_bach_table', 5),
(12, '2018_01_23_145953_add_organization_column_to_order_batch_table', 6),
(13, '2018_01_19_111811_create_client_table', 7),
(14, '2018_01_30_155138_create_verify_users_table', 8),
(15, '2018_01_30_155346_add_verified_column_to_users_table', 8),
(16, '2018_01_31_153742_create_company_managers_table', 9),
(17, '2018_02_01_095428_add_instructions_column_to_batch_detail_table', 10),
(18, '2018_02_01_155448_add_status_id_column_to_batch_details_table', 11),
(19, '2018_02_07_144443_create_compare_data_table', 12),
(20, '2018_02_09_132102_add_disposition_column_to_compare_table', 13),
(21, '2018_02_09_164446_add_organization_column_to_compare_table', 14),
(22, '2018_02_12_113559_add_country_column_to_client_table', 15),
(23, '2018_02_12_114815_add_address1_column_to_client_table', 16),
(24, '2018_02_12_161948_create_content_batch_table', 17),
(25, '2018_02_13_090309_add_acount_status_column_to_users_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `order_batch`
--

DROP TABLE IF EXISTS `order_batch`;
CREATE TABLE `order_batch` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_batch`
--

INSERT INTO `order_batch` (`id`, `batch_id`, `first_name`, `last_name`, `title`, `phone_number`, `validation`, `disposition`, `organization`, `address1`, `address2`, `health_status`, `created_at`) VALUES
(1, 79, 'Philip', 'High', 'OWNER', '(319) 377-1899', '\\N', '\\N', '', 'IA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(2, 79, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(3, 79, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(4, 79, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', '\\N', '\\N', '', 'PN', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(5, 79, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', '\\N', '\\N', '', 'FL', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(6, 79, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', '\\N', '\\N', '', 'TX', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(7, 79, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(8, 79, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', '\\N', '\\N', '', 'CA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(9, 79, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', '\\N', '\\N', '', 'TN', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(10, 79, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', '\\N', '\\N', '', 'IL', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(11, 79, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', '\\N', '\\N', '', 'VT', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(12, 79, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', '\\N', '\\N', '', 'MI', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(13, 79, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', '\\N', '\\N', '', 'VT', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(14, 79, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', '\\N', '\\N', '', 'GA', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(15, 79, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', '\\N', '\\N', '', 'IL', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(16, 79, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', '\\N', '\\N', '', 'OK', 'United States', 'Good Record', '2018-02-09 15:55:18'),
(17, 79, 'Denise', 'Thompson', 'FOUNDER', 'N', '\\N', '\\N', '', 'OH', 'United States', 'Good Record', '2018-02-09 15:55:19'),
(18, 79, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', '\\N', '\\N', '', 'TX', 'United States', 'Good Record', '2018-02-09 15:55:19'),
(19, 79, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', '\\N', '\\N', '', 'PN', 'United States', 'Good Record', '2018-02-09 15:55:19'),
(20, 79, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', '\\N', '\\N', '', 'ME', 'United States', 'Good Record', '2018-02-09 15:55:19'),
(21, 81, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'Verified', 'working', '', 'IA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(22, 81, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'Verified', 'promoted', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(23, 81, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'Verified', 'working', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(24, 81, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'Verified', 'promoted', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(25, 81, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'Verified', 'working', '', 'FL', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(26, 81, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'Verified', 'promoted', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(27, 81, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'Not Verified', 'left employee', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(28, 81, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'Not Verified', 'number invalid', '', 'CA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(29, 81, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'Not Verified', 'invalid number', '', 'TN', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(30, 81, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'Not Verified', 'location changed', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(31, 81, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'Not Verified', 'location changed', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(32, 81, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'Not Verified', 'location changed', '', 'MI', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(33, 81, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'Not Verified', 'location changed', '', 'VT', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(34, 81, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'Verified', 'working', '', 'GA', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(35, 81, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'Not Verified', 'left employee', '', 'IL', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(36, 81, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'Verified', 'working', '', 'OK', 'United States', 'Good Record', '2018-02-09 16:32:20'),
(37, 81, 'Denise', 'Thompson', 'FOUNDER', 'N', 'Not Verified', 'invalid name', '', 'OH', 'United States', 'Good Record', '2018-02-09 16:32:21'),
(38, 81, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'Verified', 'working', '', 'TX', 'United States', 'Good Record', '2018-02-09 16:32:21'),
(39, 81, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'Verified', 'working', '', 'PN', 'United States', 'Good Record', '2018-02-09 16:32:21'),
(40, 81, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'Verified', 'working', '', 'ME', 'United States', 'Good Record', '2018-02-09 16:32:21'),
(41, 82, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'valid', 'on ', 'Trans Data', 'IA', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(42, 82, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(43, 82, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(44, 82, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'valid', 'on ', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(45, 82, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'valid', 'on ', 'Trans Data', 'FL', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(46, 82, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'valid', 'on ', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(47, 82, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(48, 82, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'valid', 'on ', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 16:55:32'),
(49, 82, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'valid', 'on ', 'Trans Data', 'TN', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(50, 82, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'valid', 'on ', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(51, 82, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'valid', 'on ', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(52, 82, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'valid', 'on ', 'Trans Data', 'MI', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(53, 82, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'valid', 'on ', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(54, 82, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'valid', 'on ', 'Trans Data', 'GA', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(55, 82, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'valid', 'on ', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(56, 82, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'valid', 'on ', 'Trans Data', 'OK', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(57, 82, 'Denise', 'Thompson', 'FOUNDER', 'N', 'valid', 'on ', 'Trans Data', 'OH', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(58, 82, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'valid', 'on ', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(59, 82, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'valid', 'on ', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(60, 82, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'valid', 'on ', 'Trans Data', 'ME', 'United States', 'Good Record', '2018-02-09 16:55:33'),
(61, 83, 'Philip', 'High', 'OWNER', '(319) 377-1899', 'valid', 'yes', 'Trans Data', 'IA', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(62, 83, 'Alex', 'Toren', 'MANAGER', '(805) 381-9111', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(63, 83, 'Dera', 'Campbell', 'SENIOR DIRECTOR ', '(415) 203-8536', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(64, 83, 'Sarah', 'Dauerman', 'AUDIT STAFF ', '(614) 586-7141', 'not valid', 'yes', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(65, 83, 'Chantel', 'Hatton', 'RSVP PROGRAM COORDINATOR', '(904) 807-2018', 'not valid', 'yes', 'Trans Data', 'FL', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(66, 83, 'Janelle', 'T Steinberg', 'SENIOR LOAN OFFICER ', '(425) 947-1961', 'not valid', 'yes', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(67, 83, 'Deepak', 'Jain', 'STRATEGIC ACCOUNT MANAGER', 'N', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(68, 83, 'Dulce', 'Baranda', 'SENIOR APPLICATION SPECIALIST', 'N', 'not valid', 'yes', 'Trans Data', 'CA', 'United States', 'Good Record', '2018-02-09 17:30:47'),
(69, 83, 'Sam', 'Pung', 'OWNER', '(901) 495-6500', 'not valid', 'yes', 'Trans Data', 'TN', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(70, 83, 'Darla', 'Martin', 'ASSOCIATE', '(312) 880-3513', 'not valid', 'yes', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(71, 83, 'Kanwarpreet', 'S Sethi', 'SENIOR SOFTWARE ARCHITECT ', '(215) 279-7831', 'not valid', 'yes', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(72, 83, 'Frank', 'Bernier', 'COLLEGE PLACEMENT COORDINATOR, WORKS', '(517) 267-2111', 'not valid', 'yes', 'Trans Data', 'MI', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(73, 83, 'Liz', 'Brown-higdon', 'SITE MANAGER', '(802) 655-2536', 'not valid', 'yes', 'Trans Data', 'VT', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(74, 83, 'Mike', 'Skibicki', 'CEO', '(706) 692-5488', 'not valid', 'yes', 'Trans Data', 'GA', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(75, 83, 'Julie', 'Fitzwater', 'CONTROLLER', '(847) 356-2323', 'not valid', 'yes', 'Trans Data', 'IL', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(76, 83, 'Jill', 'Saulen', 'CUSTOMER SERVICE REPRESENTATIVE ', '(918) 446-6672', 'not valid', 'yes', 'Trans Data', 'OK', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(77, 83, 'Denise', 'Thompson', 'FOUNDER', 'N', 'not valid', 'yes', 'Trans Data', 'OH', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(78, 83, 'Dan', 'Moldenhauer', 'ACCOUNT DIRECTOR', '(210) 829-9000', 'not valid', 'yes', 'Trans Data', 'TX', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(79, 83, 'Alpheus', 'Seabi', 'FINANCE DEPARTMENT', '2711541109', 'not valid', 'yes', 'Trans Data', 'PN', 'United States', 'Good Record', '2018-02-09 17:30:48'),
(80, 83, 'Alex', 'B Rainville', 'SUMMER ASSOCIATE ', '(402) 964-2745', 'not valid', 'yes', 'Trans Data', 'ME', 'United States', 'Good Record', '2018-02-09 17:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`) VALUES
(1, 'Super-Admin', '2018-01-30 15:42:10'),
(2, 'Manager', '2018-01-23 15:16:04'),
(3, 'QA-Agent', '2018-01-23 15:16:04'),
(4, 'Admin', '2018-01-23 15:16:04'),
(5, 'Client', '2018-01-23 15:16:04'),
(6, 'Agent', '2018-01-23 15:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `acount_status` int(11) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `verified`, `acount_status`, `password`, `role_id`, `client_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'hecki', 'hecki@gmail.com', 1, 1, '$2y$10$tUA.sCfAoy79skle6L/ou.qPKEANVyoT0nTBSA7kN02sz167HsQ.2', 1, 0, 'STkAPdrI1CRos4YeC7cPgP5r0CexXN3RKwlUAtM0MryQ9IhnwojvmirW7Fiu', NULL, NULL),
(25, 'Hecki', 'last', 'last@gmail.com', 1, 1, '$2y$10$CVhZckFC6OtVkPAbukZuoeWZ472CJRtgMc8qoG4Xb/dZpVt7S6lKO', 2, 0, 'W4Ho2J0w0yopKhYkLNhpwcBB56uLfafoB6QMN5N9e1YicMzSY1ZbcYM3R3G5', '2018-01-24 07:34:33', '2018-02-13 04:21:18'),
(26, 'manager', 'last', 'manager@gmail.com', 1, 1, '$2y$10$CVhZckFC6OtVkPAbukZuoeWZ472CJRtgMc8qoG4Xb/dZpVt7S6lKO', 2, 0, 'sbjqQpxx12H8O9YDvg8D7WDFBq47oZ9B6ZfIGFhiFPckAakiuZ6LNgAUHdk0', '2018-01-24 07:37:25', '2018-02-13 04:06:54'),
(47, 'Client', 'Client', 'heckias47@gmail.com', 1, 1, '$2y$10$awqsL2FvU3jhUk4Wwdy8RuyJnBUO1Iwf/BmHhXldmYIJ0dgR5sCv.', 5, 21, 'YU8OeRcOG7230WdryS6hIyuaGHOPdjPGn22W57JznRbWyanWQmsi515tn5Q6', '2018-01-31 11:14:06', '2018-02-13 04:21:24'),
(54, 'I am', 'Admin', 'admin@gmail.com', 1, 1, '$2y$10$nE5Upk/bErB6BYyu0xk7ZeP3gcoUPh/JxuWiTh99395c.3Bcc4Vlq', 4, 0, 'BN8JBjyaq2P4miQKSRd3Keoxu4gDF0ZvdPuV5MgU4oI7Qfbvai9O2BU7GAKo', '2018-02-07 08:50:17', '2018-02-13 04:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

DROP TABLE IF EXISTS `verify_users`;
CREATE TABLE `verify_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 34, 'MZApOOcwUzKBk8wUurr4Gqnzl1WKeAyHMeXvItKL', '2018-01-30 11:12:06', '2018-01-30 11:12:06'),
(2, 35, 'jeDmo1ZgSLUVWMM86lE9m8npPSYF3zhrVMot5MBo', '2018-01-30 11:14:57', '2018-01-30 11:14:57'),
(3, 36, 'D6ejMOAqF6s3x7c400yJXpX3OpWF1hB1v35mfnXG', '2018-01-30 11:18:11', '2018-01-30 11:18:11'),
(4, 37, 'RdELw66BDou19IUdZn7dnjHiVGuzgtYOIQmzaPbn', '2018-01-30 11:24:35', '2018-01-30 11:24:35'),
(5, 38, 'WIkPcJIOH1L8kFn9rAfCv8FHVmGoCC9rt63WNBEh', '2018-01-30 11:27:24', '2018-01-30 11:27:24'),
(7, 1, 'WIkPcJIOH1L8kFn9rAfCv8FHVmGoCC9rt63WNBEh\r\n', '2018-01-29 19:00:00', NULL),
(8, 39, 'A0gBEUNYLmrLR2Fn3YFoIeEhUCviCW1KVsr0GeCN', '2018-01-30 11:35:39', '2018-01-30 11:35:39'),
(9, 40, 'kMMRn6Co1FGzA2ERTXmwYT87WDoDX1ngP3ZdHeye', '2018-01-31 04:31:27', '2018-01-31 04:31:27'),
(10, 41, 'QgL13JYxJN2jiNwi1uYtqxhMsVkTNUmnF3hEABxZ', '2018-01-31 06:10:35', '2018-01-31 06:10:35'),
(11, 42, '7muohaiB5ckRRdGxx7sE0KGXJbMOxTdWcsdKWWVU', '2018-01-31 06:16:24', '2018-01-31 06:16:24'),
(12, 43, 'd3Dm6Cvqa2fauh5uCz5kfHjR4Mxca6gfsllrkq6N', '2018-01-31 07:42:10', '2018-01-31 07:42:10'),
(13, 44, 'Rnj39pilSSv9CsJaq01Rb5n8BAUgP6iErE2Q32Ad', '2018-01-31 07:47:45', '2018-01-31 07:47:45'),
(14, 46, 'unZ7fvTuUsN8cOwrUICwGuO5Y5nCJuA95NlnOMli', '2018-01-31 11:07:38', '2018-01-31 11:07:38'),
(15, 47, 'LleK149DYpVdwYSohtIqbHjjj9Huer3jqjKhgeGu', '2018-01-31 11:14:06', '2018-01-31 11:14:06'),
(16, 49, 'mZiz8qRuws7zy4G2Ux3CNGZFcz3EtqTBnVfOKVVk', '2018-02-02 05:38:38', '2018-02-02 05:38:38'),
(17, 50, 'kCvcVY7MwmKsPsJUQtM90RLcxm3x1rjxs9p1osmx', '2018-02-02 06:17:30', '2018-02-02 06:17:30'),
(18, 52, '1dk0vA8mbyxxAIik1xS9YINIKBOEXdeEqnWNCuXQ', '2018-02-02 07:20:20', '2018-02-02 07:20:20'),
(19, 55, 'aCcsaclSvyNLzuGC7WWkYqGDObxRocMrSazAAgDK', '2018-02-09 11:10:06', '2018-02-09 11:10:06'),
(20, 56, 'q9e2GsznCTe6R4fjhEqXxmORDi79Wcl5OoYdeA7K', '2018-02-09 12:08:20', '2018-02-09 12:08:20'),
(21, 60, 'DwOhHk9gn0DKrgLoW7YSsWP0gXuphLnmBJ41j3v3', '2018-02-12 06:10:09', '2018-02-12 06:10:09'),
(22, 61, 'jt5eE7JMfDh1kHhaew68CkH5IvVZnELnMDFWmdjZ', '2018-02-12 06:28:09', '2018-02-12 06:28:09'),
(23, 62, 'X0FZQfxa0lpc8BxobQ22iWvNiuIoTtVM6A1Cs5rN', '2018-02-12 06:42:07', '2018-02-12 06:42:07'),
(24, 63, 'GqQsQtJa1BcFyuvVaKLPWJxgqii0967GUHWjsd0E', '2018-02-12 07:04:53', '2018-02-12 07:04:53'),
(25, 65, 'suTU0l99wiCV2JUlP8kl96pGatewfS7EYmUvEHAp', '2018-02-12 07:25:35', '2018-02-12 07:25:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_details`
--
ALTER TABLE `batch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_log`
--
ALTER TABLE `batch_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_status`
--
ALTER TABLE `batch_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_contact_person_email_unique` (`contact_person_email`);

--
-- Indexes for table `company_managers`
--
ALTER TABLE `company_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_health`
--
ALTER TABLE `contact_health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_batch`
--
ALTER TABLE `content_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_batch`
--
ALTER TABLE `order_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_details`
--
ALTER TABLE `batch_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `batch_log`
--
ALTER TABLE `batch_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_status`
--
ALTER TABLE `batch_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `company_managers`
--
ALTER TABLE `company_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact_health`
--
ALTER TABLE `contact_health`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_batch`
--
ALTER TABLE `content_batch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_batch`
--
ALTER TABLE `order_batch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

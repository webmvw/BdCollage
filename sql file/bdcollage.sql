-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 12:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcollage`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL COMMENT 'employee_id = user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(8, 20, '2021-04', 17734, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(9, 21, '2021-04', 14017, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(10, 22, '2021-04', 15000, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(11, 24, '2021-04', 11600, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(12, 29, '2021-04', 29000, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(13, 30, '2021-04', 15000, '2021-04-07 08:32:47', '2021-04-07 08:32:47'),
(14, 31, '2021-04', 12000, '2021-04-07 08:32:47', '2021-04-07 08:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2021-04-01', 5400, 'for buy stationery product.', '1617813839Journal-Voucher-Example-2.jpg', '2021-04-07 10:43:59', '2021-04-07 10:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL COMMENT 'student_id=user_id',
  `department_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `student_id`, `department_id`, `session_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(3, 15, 1, 1, 1, '2021-04', 3200, '2021-04-07 01:22:22', '2021-04-07 01:22:22'),
(4, 33, 1, 1, 1, '2021-04', 3600, '2021-04-07 01:22:22', '2021-04-07 01:22:22'),
(5, 34, 1, 1, 1, '2021-04', 3400, '2021-04-07 01:22:22', '2021-04-07 01:22:22'),
(6, 35, 1, 1, 1, '2021-04', 3400, '2021-04-07 01:22:22', '2021-04-07 01:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id = student_id',
  `department_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `department_id`, `session_id`, `roll`, `created_at`, `updated_at`) VALUES
(1, 10, 3, 1, 66718101, '2021-03-29 07:42:54', '2021-04-04 07:28:22'),
(2, 11, 1, 2, 66619101, '2021-03-29 08:03:09', '2021-04-04 07:34:33'),
(3, 12, 2, 4, NULL, '2021-03-29 09:13:04', '2021-03-29 09:13:04'),
(4, 13, 4, 2, NULL, '2021-03-29 09:14:45', '2021-03-29 09:14:45'),
(5, 14, 4, 4, NULL, '2021-03-29 09:19:11', '2021-03-29 09:19:11'),
(6, 15, 1, 1, 66618101, '2021-03-29 09:20:55', '2021-04-04 07:38:05'),
(7, 16, 2, 2, 66419101, '2021-03-29 09:22:51', '2021-04-04 07:15:50'),
(8, 17, 2, 2, 66419102, '2021-03-29 09:25:16', '2021-04-04 07:15:50'),
(9, 25, 3, 1, 66718102, '2021-04-04 01:22:02', '2021-04-04 07:28:22'),
(10, 26, 3, 2, NULL, '2021-04-04 01:23:59', '2021-04-04 01:23:59'),
(11, 27, 4, 1, NULL, '2021-04-04 01:26:18', '2021-04-04 01:26:18'),
(12, 28, 1, 4, 66620101, '2021-04-04 01:29:55', '2021-04-04 07:26:57'),
(13, 32, 3, 4, NULL, '2021-04-05 02:45:35', '2021-04-05 02:45:35'),
(14, 33, 1, 1, 66618102, '2021-04-05 02:47:00', '2021-04-05 02:51:49'),
(15, 34, 1, 1, 66618103, '2021-04-05 02:48:45', '2021-04-05 02:51:49'),
(16, 35, 1, 1, 66618104, '2021-04-05 02:50:54', '2021-04-05 02:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `department_code`, `created_at`, `updated_at`) VALUES
(1, 'Computer', '666', '2021-03-29 03:13:39', '2021-03-29 03:13:39'),
(2, 'Civil', '664', '2021-03-29 03:14:13', '2021-03-29 03:14:13'),
(3, 'Electrical', '667', '2021-03-29 03:15:05', '2021-03-29 03:15:05'),
(4, 'Mechanical', '670', '2021-03-29 03:16:02', '2021-03-29 03:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Principle', '2021-03-27 11:09:56', '2021-03-27 11:09:56'),
(2, 'Vice-Principle', '2021-03-27 11:10:12', '2021-03-27 11:10:12'),
(3, 'Admin Officer', '2021-03-27 11:10:24', '2021-03-27 11:10:24'),
(4, 'Instructor', '2021-03-27 11:10:49', '2021-03-27 11:10:49'),
(5, 'Junior Instructor', '2021-03-27 11:11:05', '2021-03-27 11:11:05'),
(6, 'Account Officer', '2021-03-27 11:11:20', '2021-03-27 11:11:20'),
(7, 'Marketing Officer', '2021-03-27 11:11:33', '2021-03-27 11:11:33'),
(8, 'Office Assistant', '2021-03-27 11:11:57', '2021-03-27 11:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 20, '2021-03-29 07:42:54', '2021-03-29 07:42:54'),
(2, 2, NULL, 10, '2021-03-29 08:03:09', '2021-03-29 08:03:09'),
(3, 3, NULL, 10, '2021-03-29 09:13:04', '2021-03-29 09:13:04'),
(4, 4, NULL, 30, '2021-03-29 09:14:45', '2021-03-29 09:14:45'),
(5, 5, NULL, 10, '2021-03-29 09:19:11', '2021-03-29 09:19:11'),
(6, 6, NULL, 20, '2021-03-29 09:20:55', '2021-03-29 09:20:55'),
(7, 7, NULL, 30, '2021-03-29 09:22:51', '2021-03-29 22:36:43'),
(8, 8, NULL, 10, '2021-03-29 09:25:16', '2021-03-29 09:25:16'),
(9, 9, NULL, 5, '2021-04-04 01:22:02', '2021-04-04 01:22:02'),
(10, 10, NULL, 10, '2021-04-04 01:23:59', '2021-04-04 01:23:59'),
(11, 11, NULL, 10, '2021-04-04 01:26:18', '2021-04-04 01:26:18'),
(12, 12, NULL, 30, '2021-04-04 01:29:55', '2021-04-04 01:29:55'),
(13, 13, NULL, 10, '2021-04-05 02:45:35', '2021-04-05 02:45:35'),
(14, 14, NULL, 10, '2021-04-05 02:47:00', '2021-04-05 02:47:00'),
(15, 15, NULL, 15, '2021-04-05 02:48:45', '2021-04-05 02:48:45'),
(16, 16, NULL, 15, '2021-04-05 02:50:54', '2021-04-05 02:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `employee_assign_leaves`
--

CREATE TABLE `employee_assign_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cl` int(11) DEFAULT NULL,
  `ml` int(11) DEFAULT NULL,
  `lwp` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_assign_leaves`
--

INSERT INTO `employee_assign_leaves` (`id`, `employee_id`, `cl`, `ml`, `lwp`, `created_at`, `updated_at`) VALUES
(2, 20, 12, 11, 5, '2021-03-31 22:33:49', '2021-04-01 11:31:32'),
(3, 21, 15, 15, 0, '2021-03-31 22:42:31', '2021-03-31 22:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'user_id=employee_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(14, 20, '2020-09-01', 'Present', '2021-04-03 02:28:50', '2021-04-03 02:28:50'),
(15, 21, '2020-09-01', 'Absent', '2021-04-03 02:28:50', '2021-04-03 02:28:50'),
(16, 22, '2020-09-01', 'Present', '2021-04-03 02:28:50', '2021-04-03 02:28:50'),
(17, 24, '2020-09-01', 'Present', '2021-04-03 02:28:50', '2021-04-03 02:28:50'),
(22, 20, '2021-01-01', 'Present', '2021-04-03 02:30:04', '2021-04-03 02:30:04'),
(23, 21, '2021-01-01', 'Present', '2021-04-03 02:30:04', '2021-04-03 02:30:04'),
(24, 22, '2021-01-01', 'Present', '2021-04-03 02:30:04', '2021-04-03 02:30:04'),
(25, 24, '2021-01-01', 'Present', '2021-04-03 02:30:04', '2021-04-03 02:30:04'),
(26, 20, '2021-04-01', 'Absent', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(27, 21, '2021-04-01', 'Present', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(28, 22, '2021-04-01', 'Present', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(29, 24, '2021-04-01', 'Absent', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(30, 29, '2021-04-01', 'Present', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(31, 30, '2021-04-01', 'Present', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(32, 31, '2021-04-01', 'Leave', '2021-04-05 03:50:10', '2021-04-05 03:50:10'),
(33, 20, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(34, 21, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(35, 22, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(36, 24, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(37, 29, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(38, 30, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(39, 31, '2021-04-02', 'Present', '2021-04-05 03:50:40', '2021-04-05 03:50:40'),
(40, 20, '2021-04-03', 'Absent', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(41, 21, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(42, 22, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(43, 24, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(44, 29, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(45, 30, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(46, 31, '2021-04-03', 'Present', '2021-04-05 03:51:01', '2021-04-05 03:51:01'),
(47, 20, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(48, 21, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(49, 22, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(50, 24, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(51, 29, '2021-04-04', 'Absent', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(52, 30, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(53, 31, '2021-04-04', 'Present', '2021-04-05 03:51:20', '2021-04-05 03:51:20'),
(54, 20, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(55, 21, '2021-04-05', 'Absent', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(56, 22, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(57, 24, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(58, 29, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(59, 30, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37'),
(60, 31, '2021-04-05', 'Present', '2021-04-05 03:51:37', '2021-04-05 03:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cl` int(11) DEFAULT NULL,
  `ml` int(11) DEFAULT NULL,
  `lwp` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `cl`, `ml`, `lwp`, `start_date`, `end_date`, `leave_reason`, `created_at`, `updated_at`) VALUES
(1, 20, 3, NULL, NULL, '2019-08-20', '2019-08-22', 'Family Problem', '2021-04-01 01:57:57', '2021-04-01 01:57:57'),
(2, 20, NULL, NULL, 5, '2020-02-01', '2020-02-01', 'Family Problem', '2021-04-01 01:59:15', '2021-04-01 01:59:15'),
(3, 20, NULL, 2, NULL, '2020-09-01', '2020-09-02', 'For Fever.', '2021-04-01 02:08:26', '2021-04-01 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment_salary` double DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 20, 18000, 18000, 0, '2018-09-09', '2021-03-31 11:49:13', '2021-03-31 11:49:13'),
(2, 20, 18000, 19000, 1000, '2021-04-01', '2021-03-31 12:01:40', '2021-03-31 12:01:40'),
(3, 21, 12000, 12000, 0, '2017-08-20', '2021-03-31 12:06:11', '2021-03-31 12:06:11'),
(4, 21, 12000, 13000, 1000, '2020-11-01', '2021-03-31 12:07:08', '2021-03-31 12:07:08'),
(5, 21, 13000, 14500, 1500, '2021-04-01', '2021-03-31 12:30:43', '2021-03-31 12:30:43'),
(6, 22, 15000, 15000, 0, '2019-07-21', '2021-04-02 23:24:45', '2021-04-02 23:24:45'),
(7, 24, 12000, 12000, 0, '2019-10-20', '2021-04-02 23:29:30', '2021-04-02 23:29:30'),
(8, 29, 30000, 30000, 0, '2018-10-02', '2021-04-04 01:42:51', '2021-04-04 01:42:51'),
(9, 30, 15000, 15000, 0, '2018-02-01', '2021-04-04 01:45:01', '2021-04-04 01:45:01'),
(10, 31, 12000, 12000, 0, '2019-09-25', '2021-04-04 01:48:11', '2021-04-04 01:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Semester Final', '2021-03-26 12:36:57', '2021-03-26 12:36:57'),
(5, 'Midturm', '2021-03-26 23:13:45', '2021-03-26 23:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_amounts`
--

CREATE TABLE `fee_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_amounts`
--

INSERT INTO `fee_amounts` (`id`, `fee_category_id`, `department_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 2000, '2021-03-23 11:59:53', '2021-03-23 11:59:53'),
(2, 3, 1, 1600, '2021-03-23 11:59:54', '2021-03-23 11:59:54'),
(3, 3, 3, 1500, '2021-03-23 11:59:54', '2021-03-23 11:59:54'),
(4, 3, 4, 2000, '2021-03-23 11:59:54', '2021-03-23 11:59:54'),
(9, 4, 1, 2500, '2021-03-24 04:20:13', '2021-03-24 04:20:13'),
(10, 4, 2, 2500, '2021-03-24 04:20:13', '2021-03-24 04:20:13'),
(11, 4, 3, 2500, '2021-03-24 04:20:13', '2021-03-24 04:20:13'),
(12, 4, 4, 2500, '2021-03-24 04:20:14', '2021-03-24 04:20:14'),
(27, 1, 1, 4000, '2021-03-26 11:43:37', '2021-03-26 11:43:37'),
(28, 1, 2, 4500, '2021-03-26 11:43:37', '2021-03-26 11:43:37'),
(29, 1, 3, 3800, '2021-03-26 11:43:37', '2021-03-26 11:43:37'),
(30, 1, 4, 4500, '2021-03-26 11:43:37', '2021-03-26 11:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', '2021-03-22 10:17:49', '2021-03-22 10:17:49'),
(3, 'Monthly Fee', '2021-03-22 10:33:08', '2021-03-22 10:33:08'),
(4, 'Exam Fee', '2021-03-22 10:33:19', '2021-03-22 10:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `grade_points`
--

CREATE TABLE `grade_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_point` double DEFAULT NULL,
  `start_mark` double DEFAULT NULL,
  `end_mark` double DEFAULT NULL,
  `start_point` double DEFAULT NULL,
  `end_point` double DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_points`
--

INSERT INTO `grade_points` (`id`, `grade_name`, `grade_point`, `start_mark`, `end_mark`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', 4, 80, 100, 4, 4, 'Excellent', '2021-04-06 03:03:49', '2021-04-09 22:25:53'),
(2, 'A', 3.75, 75, 79, 3.75, 3.99, 'Very Good', '2021-04-06 03:05:12', '2021-04-08 00:01:22'),
(3, 'A-', 3.5, 70, 74, 3.5, 3.74, 'Good', '2021-04-06 03:06:36', '2021-04-08 00:01:37'),
(4, 'B+', 3.25, 65, 69, 3.25, 3.49, 'Excellent Average', '2021-04-06 03:09:10', '2021-04-08 00:02:21'),
(5, 'B', 3, 60, 64, 3, 3.24, 'Very Good Average', '2021-04-06 03:10:04', '2021-04-08 00:02:41'),
(6, 'B-', 2.75, 55, 59, 2.75, 2.99, 'Good Average', '2021-04-06 03:11:18', '2021-04-08 00:03:02'),
(7, 'C+', 2.5, 50, 54, 2.5, 2.74, 'Disappoint', '2021-04-06 03:12:47', '2021-04-08 00:03:27'),
(8, 'C', 2.25, 45, 49, 2.25, 2.49, 'Disappoint', '2021-04-06 03:14:43', '2021-04-08 00:03:38'),
(9, 'D', 2, 40, 44, 2, 2.24, 'Bad', '2021-04-06 03:15:09', '2021-04-08 00:03:50'),
(10, 'F', 0, 0, 39, 0, 0, 'Fail', '2021-04-06 03:15:57', '2021-04-08 00:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_03_22_160045_create_fee_categories_table', 3),
(11, '2021_03_23_034235_create_fee_amounts_table', 4),
(12, '2021_03_26_182449_create_exams_table', 5),
(16, '2021_03_27_051831_create_subjects_table', 6),
(17, '2021_03_27_103312_create_semesters_table', 7),
(18, '2021_03_27_165545_create_designations_table', 8),
(20, '2014_10_12_000000_create_users_table', 9),
(21, '2021_03_16_045908_create_roles_table', 9),
(23, '2021_03_29_034116_create_discount_students_table', 10),
(24, '2021_03_29_034058_create_assign_students_table', 11),
(25, '2021_03_29_042907_create_sessions_table', 12),
(27, '2021_03_18_175953_create_departments_table', 13),
(29, '2021_03_31_044946_create_employee_salary_logs_table', 14),
(30, '2021_04_01_034925_create_employee_assign_leaves_table', 15),
(31, '2021_04_01_044439_create_employee_leaves_table', 16),
(32, '2021_04_03_034944_create_employee_attendances_table', 17),
(34, '2021_04_06_080737_create_grade_points_table', 19),
(36, '2021_04_06_174551_create_account_student_fees_table', 20),
(37, '2021_04_07_130759_create_account_employee_salaries_table', 21),
(38, '2021_04_07_154705_create_account_other_costs_table', 22),
(39, '2021_04_05_155824_create_student_marks_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-03-28 21:22:10', '2021-03-28 21:22:10'),
(2, 'Teacher', '2021-03-28 21:22:10', '2021-03-28 21:22:10'),
(3, 'Student', '2021-03-28 21:22:10', '2021-03-28 21:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Semester', '2021-03-27 04:42:35', '2021-03-27 04:42:35'),
(2, 'Second Semester', '2021-03-27 04:44:09', '2021-03-27 04:44:09'),
(3, 'Third Semester', '2021-03-27 04:44:21', '2021-03-27 04:44:21'),
(4, 'Forth Semester', '2021-03-27 04:44:33', '2021-03-27 04:44:33'),
(5, 'Fifth Semester', '2021-03-27 04:45:01', '2021-03-27 04:45:01'),
(6, 'Six Semester', '2021-03-27 04:45:13', '2021-03-27 04:45:13'),
(7, 'Seven Semester', '2021-03-27 04:45:28', '2021-03-27 04:54:24'),
(9, 'Eight Semester', '2021-03-27 05:05:34', '2021-03-27 05:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', '2021-03-28 22:40:14', '2021-03-28 22:40:14'),
(2, '2019-2020', '2021-03-28 22:40:28', '2021-03-28 22:40:28'),
(4, '2020-2021', '2021-03-28 22:45:33', '2021-03-28 22:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `department_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `marks` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `department_id`, `session_id`, `semester_id`, `subject_id`, `exam_id`, `marks`, `created_at`, `updated_at`) VALUES
(5, 15, 1, 1, 1, 4, 2, 76, '2021-04-08 01:04:10', '2021-04-08 01:04:10'),
(6, 33, 1, 1, 1, 4, 2, 88, '2021-04-08 01:04:10', '2021-04-08 01:04:10'),
(7, 34, 1, 1, 1, 4, 2, 90, '2021-04-08 01:04:10', '2021-04-08 01:04:10'),
(8, 35, 1, 1, 1, 4, 2, 74, '2021-04-08 01:04:10', '2021-04-08 01:04:10'),
(17, 15, 1, 1, 1, 1, 2, 80, '2021-04-10 10:37:44', '2021-04-10 10:37:44'),
(18, 33, 1, 1, 1, 1, 2, 82, '2021-04-10 10:37:44', '2021-04-10 10:37:44'),
(19, 34, 1, 1, 1, 1, 2, 75, '2021-04-10 10:37:44', '2021-04-10 10:37:44'),
(20, 35, 1, 1, 1, 1, 2, 80, '2021-04-10 10:37:45', '2021-04-10 10:37:45'),
(21, 15, 1, 1, 4, 10, 2, 128, '2021-04-10 10:45:34', '2021-04-10 10:45:34'),
(22, 33, 1, 1, 4, 10, 2, 105, '2021-04-10 10:45:34', '2021-04-10 10:45:34'),
(23, 34, 1, 1, 4, 10, 2, 135, '2021-04-10 10:45:34', '2021-04-10 10:45:34'),
(24, 35, 1, 1, 4, 10, 2, 126, '2021-04-10 10:45:34', '2021-04-10 10:45:34'),
(25, 15, 1, 1, 4, 9, 2, 165, '2021-04-10 10:46:36', '2021-04-10 10:46:36'),
(26, 33, 1, 1, 4, 9, 2, 155, '2021-04-10 10:46:36', '2021-04-10 10:46:36'),
(27, 34, 1, 1, 4, 9, 2, 169, '2021-04-10 10:46:36', '2021-04-10 10:46:36'),
(28, 35, 1, 1, 4, 9, 2, 160, '2021-04-10 10:46:36', '2021-04-10 10:46:36'),
(29, 15, 1, 1, 4, 8, 2, 130, '2021-04-10 10:47:21', '2021-04-10 10:47:21'),
(30, 33, 1, 1, 4, 8, 2, 110, '2021-04-10 10:47:21', '2021-04-10 10:47:21'),
(31, 34, 1, 1, 4, 8, 2, 135, '2021-04-10 10:47:21', '2021-04-10 10:47:21'),
(32, 35, 1, 1, 4, 8, 2, 132, '2021-04-10 10:47:21', '2021-04-10 10:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `semester_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mark` double NOT NULL,
  `tc` double DEFAULT NULL,
  `tf` double DEFAULT NULL,
  `pc` double DEFAULT NULL,
  `pf` double DEFAULT NULL,
  `cradit` double NOT NULL,
  `pass_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '40',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_code`, `department_id`, `semester_id`, `total_mark`, `tc`, `tf`, `pc`, `pf`, `cradit`, `pass_mark`, `created_at`, `updated_at`) VALUES
(1, 'Computer Application', 66611, 1, '1', 100, NULL, NULL, 50, 50, 2, '40', '2021-03-27 10:10:42', '2021-03-27 10:10:42'),
(2, 'Electrical Engineering  Fundamentals', 66712, 1, '1', 200, 60, 90, 25, 25, 4, '40', '2021-03-27 10:13:34', '2021-03-27 10:13:34'),
(3, 'Database Application', 66621, 1, '2', 100, NULL, NULL, 50, 50, 2, '40', '2021-03-27 10:15:41', '2021-03-27 10:15:41'),
(4, 'IT support System-I', 66622, 1, '2', 100, NULL, NULL, 50, 50, 2, '40', '2021-03-27 10:16:34', '2021-03-27 10:16:34'),
(5, 'Analog Electronics', 66823, 1, '2', 200, 60, 90, 25, 25, 4, '40', '2021-03-27 10:18:37', '2021-03-27 10:18:37'),
(6, 'Programming Essentials', 66631, 1, '3', 150, 40, 60, 25, 25, 3, '40', '2021-03-27 10:20:14', '2021-03-27 10:20:14'),
(7, 'Web Design', 66632, 1, '3', 100, NULL, NULL, 50, 50, 2, '40', '2021-03-27 10:21:06', '2021-03-27 10:21:06'),
(8, 'Object Oriented Programming', 66641, 1, '4', 150, 40, 60, 25, 25, 3, '40', '2021-03-27 10:22:41', '2021-03-27 10:22:41'),
(9, 'Data Communication System', 66644, 1, '4', 200, 40, 60, 50, 50, 4, '40', '2021-03-27 10:24:03', '2021-03-27 10:24:03'),
(10, 'Computer Peripherals', 66645, 1, '4', 150, 20, 30, 50, 50, 3, '40', '2021-03-27 10:25:49', '2021-03-27 10:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3 COMMENT '1:admin|2:teacher|3:student',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1:active|0:inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `join_date`, `designation_id`, `salary`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Masud Rana', 'masudrana.bbpi@gmail.com', NULL, '$2y$10$vG56BtcszRyBtMKF3jdl6ui35yz6wCHy0dOJwqcXbfMvjxAK1ExEq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-03-28 21:22:10', '2021-03-28 21:22:10'),
(10, 'Md. Mehedi Hasan', 'mehedi512@gmail.com', NULL, '$2y$10$8uvyD4kJz/TEFIcRirZ5AeRZqQLE5fjvvJ6l82AIDtHaNLtOzXYNO', 1745842511, 'Bogura', 'Male', '1617025374mosarrof hossain.jpg', 'Md. Bukul Mia', 'Nurunnahar Begum', 'Islam', '6672018-20190001', '1998-08-24', 5049, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 07:42:54', '2021-03-29 07:42:54'),
(11, 'Md. Nakibul Hasan', 'nakibul1213@gmail.com', NULL, '$2y$10$OcQCcTtsVJKR5MUGiQQhJuFfYW.rlL.zu4d5h21v4vnJjd6e.9coq', 1245487548, 'Gobindogonj, Gaibanda', 'Male', '1617026589nokibul hasan.jpg', 'Md. Kamal Hossain', 'Mst. Roksana Begum', 'Islam', '6662019-20200001', '1999-10-25', 4618, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 08:03:09', '2021-03-29 08:03:09'),
(12, 'Nasim Mahmud', 'nasimmah512@gmail.com', NULL, '$2y$10$Niko0es0q0iS.bymcZqESeonJ6CgyOmOUDxwsH1EK3jA.1P74iFgy', 1745825315, 'Rangpur', 'Male', '1617030784nasim.jpg', 'Monir hossain', 'monira khatun', 'Hindu', '6642020-20210001', '2002-05-23', 9708, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:13:04', '2021-03-29 09:13:04'),
(13, 'Moharia Khaton', 'moharani@gmail.com', NULL, '$2y$10$6oplxAiV4L.g29I1hCSm1OwEcnmcfZ72/HYdfQq3dOCwfyE.18e4W', 1612541598, 'Hobiganj', 'Female', '1617030884moharani.jpg', 'Mukbul hasan', 'Asma begum', 'Islam', '6702019-20200001', '2004-04-29', 5622, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:14:44', '2021-03-29 09:14:44'),
(14, 'Mamunur Rahman', 'mamur247@gmail.com', NULL, '$2y$10$QUOPYivyJIBFslEgoGOjT.cb.gcQAtTcw4o8s4bL2Nz78iaZMmjau', 1742123215, 'Sirajgonj', 'Male', '1617031151manunur rahman.jpg', 'Momin Mia', 'Jahanara khatun', 'Islam', '6702020-20210001', '2005-01-30', 3933, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:19:11', '2021-03-29 09:19:11'),
(15, 'Ammar Hossain', 'ammar420@gmail.com', NULL, '$2y$10$cc4ZdHXwg3zvj8jQTmOm.e9Zjd/iSoX2R15sYNzZw9W.DF6wjUvMy', 1345854589, 'Bogura', 'Male', '1617031255ammar.jpg', 'Mukbul mia', 'monora khatun', 'Islam', '6662018-20190001', '1998-12-20', 1585, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:20:55', '2021-03-29 09:20:55'),
(16, 'Rohima khatun', 'rohima520@gmail.com', NULL, '$2y$10$USXj8FOmZttOmC2LbCSbreGIA.wlGmW88xlI8n19se1J1jqgjYx.W', 1445256541, 'Bogura', 'Female', '1617079003Rohima khatun.jpg', 'Abdus Salam', 'Habiba begum', 'Islam', '6642019-20200001', '2001-12-12', 1105, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:22:51', '2021-03-29 22:36:43'),
(17, 'Jisan Ahmed', 'jisan1213@gmail.com', NULL, '$2y$10$gCbhMu.fkS4MysC6fkUmQOmGW4P9rjGCCJjUBMae8SnNavJubLRiy', 1345812345, 'capainobabgonj', 'Male', '1617031516jisan ahmed.jpg', 'Alamgir Hossain', 'Momota Akter', 'Islam', '6642019-20200008', '2005-10-27', 4946, NULL, NULL, NULL, 3, 1, NULL, '2021-03-29 09:25:16', '2021-03-29 09:25:16'),
(20, 'Md. Masud Rana', 'masudmn1213@gmail.com', NULL, '$2y$10$bUKCbsdDWu7PSjyOzRs3UuaQfQhO2ZvcUYpbLquFYrt/X4voVIuuC', 1794352889, 'Narsingdi', 'Male', '16172129531594791903.jpg', 'Md. Nurul Islam', 'Delara Begum', 'Islam', '666-20180909-0001', '1997-12-12', 9431, '2018-09-09', 5, 19000, 2, 1, NULL, '2021-03-31 11:49:13', '2021-03-31 12:01:40'),
(21, 'Ebrahim Khan', 'ebrahim123@gmail.com', NULL, '$2y$10$spoGY3VgDwuHBhLnhWa4gOrxgnT0yVO.V9GliHegLkSvIDgyMI/e.', 1715985264, 'Mirpur, Dhaka', 'Male', '1617213971delower.jpg', 'Md. Nurul Islam', 'Monira Khatun', 'Islam', '670-20170820-0021', '1995-11-24', 2576, '2017-08-20', 4, 14500, 2, 1, NULL, '2021-03-31 12:06:11', '2021-03-31 12:30:43'),
(22, 'Md. Altab Hossain', 'altab1213@gmail.com', NULL, '$2y$10$vE3S7ESfnuZHEtinBY76Luz556PdqTzL.eZ2DY93NTm8SucaI9JJS', 1445628549, 'Natore', 'Male', NULL, 'Monjorul Haque', 'Monora Khaton', 'Islam', '667-20190721-0022', '1992-12-28', 3622, '2019-07-21', 4, 15000, 2, 1, NULL, '2021-04-02 23:24:45', '2021-04-02 23:24:45'),
(24, 'Moharani Khaton', 'moharani512@gmail.com', NULL, '$2y$10$1hnxITna6JLyFsl93Hov9.w4Uqx2btuOO/JGmibGsqK2AaTr84y76', 1754254874, 'Hobigonj', 'Female', '1617427770moharani.jpg', 'Mukbul Hasan', 'Bilkis Begum', 'Hindu', '664-20191020-0023', '1995-07-01', 2581, '2019-10-20', 5, 12000, 2, 1, NULL, '2021-04-02 23:29:30', '2021-04-02 23:29:30'),
(25, 'Nasim Mahmud', 'nasim567@gmail.com', NULL, '$2y$10$yTZB/RPpi./dk4B3nigZW.iWVmyOzHiIXiPl/qDREl7HtaCn/WEO.', 1754251589, 'Bogura', 'Male', '1617520922nasim(19153).jpg', 'Md. Rajuddin', 'Asma Akter', 'Islam', '6672018-20190002', '2003-02-26', 1468, NULL, NULL, NULL, 3, 1, NULL, '2021-04-04 01:22:02', '2021-04-04 01:22:02'),
(26, 'Asraful Alam', 'asraf920@gmail.com', NULL, '$2y$10$5vf552J/Hvrm.ePcL8m0dOl1Cqvn3sThU.sX2BYfRPo9vlIm6o0Km', 1765653265, 'Sirajgonj', 'Male', '1617521039mushfiqur rahman(19115).jpg', 'Alam Mia', 'Hosne Ara Begum', 'Islam', '6672019-20200001', '2004-10-13', 2607, NULL, NULL, NULL, 3, 1, NULL, '2021-04-04 01:23:59', '2021-04-04 01:23:59'),
(27, 'Nasim Mahmud', 'nasimmia123@gmail.com', NULL, '$2y$10$NFgQLXgqH3zz/y0t1riIT.3DWkefEZfdjknNmKjoHLQZklkzF84rK', 1712121524, 'Joypurhat', 'Male', '1617521178nasim mahmud(19118).jpg', 'Ali Hossain', 'Eva Akter', 'Hindu', '6702018-20190001', '2003-11-30', 1260, NULL, NULL, NULL, 3, 1, NULL, '2021-04-04 01:26:18', '2021-04-04 01:26:18'),
(28, 'Sakib Mia', 'sakibsonahata@gmail.com', NULL, '$2y$10$eCjg7g9Di9deJl2dxrQmeeIjgKcoHZvZNhNWIBzO2Fx8Q6oOhbrBi', 1345154124, 'Bogura', 'Male', '1617521395amanullah(19141).jpg', 'Monir Hossain', 'Salma Begum', 'Islam', '6662020-20210001', '2005-12-25', 5578, NULL, NULL, NULL, 3, 1, NULL, '2021-04-04 01:29:55', '2021-04-04 01:29:55'),
(29, 'Md. Nuzrul Islam', 'nuzrul120@gmail.com', NULL, '$2y$10$IvAj.f67UMKu/jyeEXscCuxBMxsmNtjor7li145RQHANO8DeIDUz6', 1745845215, 'Cumilla', 'Male', '1617522171professional-development-tools-for-teachers.jpg', 'Nurul Islam Nahid', 'Sumaiya Akter', 'Islam', '666-20181002-0025', '1985-12-30', 1521, '2018-10-02', 4, 30000, 2, 1, NULL, '2021-04-04 01:42:51', '2021-04-04 01:42:51'),
(30, 'Saima Akter', 'saima520@gmail.com', NULL, '$2y$10$utDnMZ7UXvp1JLT6AkNWeObYLvM3mNrs9Y2HOjK.ZwS.n46uqjKCu', 1215865985, 'Bogura', 'Female', '1617522301TEACHER-875.jpg', 'Md. Juhirul Islam', 'Halima Begum', 'Islam', '667-20180201-0030', '1992-08-23', 8738, '2018-02-01', 4, 15000, 2, 1, NULL, '2021-04-04 01:45:01', '2021-04-04 01:45:01'),
(31, 'Salma Khan', 'salma320@gmail.com', NULL, '$2y$10$pFFrIXnirDoy3bzgyhwMyOVU8seYKgrO72CLoRBAJ4j1J5NXoL2kq', 1945874587, 'Rangpur', 'Female', '1617522491iteach-texas-mobile-header.jpg', 'Monir Khan', 'Runa laila', 'Islam', '670-20190925-0031', '1994-05-12', 6456, '2019-09-25', 5, 12000, 2, 1, NULL, '2021-04-04 01:48:11', '2021-04-04 01:48:11'),
(32, 'Rahad Mia', 'rahadmia720@gmail.com', NULL, '$2y$10$n7v6fk680a4ancP4uIjKMOLL.M3x.YeJx7U9X7N91HcuOYN.n4TJG', 1745842511, 'Sirajgonj', 'Male', '1617612335abu tareq.jpg', 'Menu Ahmed', 'Sultana Rajiya', 'Islam', '6672020-20210001', '2005-05-14', 4320, NULL, NULL, NULL, 3, 1, NULL, '2021-04-05 02:45:35', '2021-04-05 02:45:35'),
(33, 'Md. Masud Rana', 'masud560@gmail.com', NULL, '$2y$10$Sxopp6Bi0WU7wGTZX0D9fOsvFO3Nnzq/Y0wUHJd3eosw0eT8Xyhvq', 1945845874, 'Gaibanda', 'Male', '1617612420masud rana.jpg', 'Roton Mia', 'Selina Akter', 'Islam', '6662018-20190007', '1998-08-25', 9567, NULL, NULL, NULL, 3, 1, NULL, '2021-04-05 02:47:00', '2021-04-05 02:47:00'),
(34, 'Muktarul Islam', 'mukter420@gmail.com', NULL, '$2y$10$uVljaRx6BSQ5YeFNwqbSVOpgftF51TLFnlo.eJ0tDooLXat0OhyRW', 1712154151, 'Panchagor', 'Male', '1617612525moktarul islam.jpg', 'Abdur Rashid', 'Julakha Akter', 'Islam', '6662018-20190015', '1998-04-26', 6233, NULL, NULL, NULL, 3, 1, NULL, '2021-04-05 02:48:45', '2021-04-05 02:48:45'),
(35, 'Eyakrokjjaman Rony', 'rony1213@gmail.com', NULL, '$2y$10$bZP4TsgR7SjokbyTRo9XBewAS4jW6mH.7unKxjuhztgdKaOJ4UKjq', 1945451412, 'Panchagor', 'Male', '1617612654rony.jpg', 'Karim Mia', 'Rahela Akter', 'Islam', '6662018-20190016', '1999-08-05', 5265, NULL, NULL, NULL, 3, 1, NULL, '2021-04-05 02:50:54', '2021-04-05 02:50:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`),
  ADD UNIQUE KEY `departments_department_code_unique` (`department_code`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_assign_leaves`
--
ALTER TABLE `employee_assign_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `grade_points`
--
ALTER TABLE `grade_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`),
  ADD UNIQUE KEY `subjects_subject_code_unique` (`subject_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_assign_leaves`
--
ALTER TABLE `employee_assign_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade_points`
--
ALTER TABLE `grade_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

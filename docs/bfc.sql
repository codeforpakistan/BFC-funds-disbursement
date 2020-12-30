-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 11:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `tbl_admin_role_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `awais` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `tbl_admin_role_id`, `username`, `password`, `name`, `email`, `image`, `gender`, `status`, `record_add_by`, `record_add_date`, `tbl_district_id`, `awais`) VALUES
(1, 1, 'admin', '17c4520f6cfd1ab53d8745e84681eb49', 'Benevolent Fund Cell', 'adminbfc@bfc.com', '9.jpeg', 'male', 1, 1, '', 1, '2020-07-07 20:06:04'),
(5, 1, 'nazim', 'nazim', 'Nazim', 'nazim@gmail.com', '15.png', 'male', 1, 1, '2020-07-08 11:43:59', 1, '2020-07-08 06:43:59'),
(6, 5, 'awais', 'awais', 'awais', 'awaiskhan.se@hotmail.com', '5.jpg', 'male', 1, 1, '2020-07-15 09:59:46', 2, '2020-07-15 04:59:46'),
(7, 7, 'idrees', 'idrees', 'Muhammad Awais Khan', 'awaiskhan.se@hotmail.comaaaa', '14.jpg', 'male', 1, 1, '2020-08-13 14:19:01', 1, '2020-08-13 09:19:01'),
(8, 6, 'asifkhan', 'test123', 'Asif Khan', 'iamasafkhan@gmail.com', 'hvac.jpg', 'male', 1, 1, '2020-09-29 11:36:58', 2, '2020-09-29 06:36:58'),
(9, 6, 'dcuser', 'dcuser', 'Test DC User', 'testdc@user.com', 'hvac_1.jpg', 'male', 1, 1, '2020-10-20 14:30:28', 2, '2020-10-20 09:30:28'),
(10, 6, 'dcmalakand', 'fa5fa2e7072b2fb5a8ac19f6980fad4b', 'DC Malakand', 'dc_malakand@bfkp.com', 'team-3-270x282.jpg', 'male', 1, 1, '2020-11-04 11:18:19', 3, '2020-11-04 06:18:19'),
(11, 7, 'secretariat', 'ad82204a9121a87d4be7f3d2ad1b0702', 'Secretariat Office', 'secretariat@test.com', 'single-img-two.jpg', 'male', 1, 1, '2020-11-06 09:17:55', 0, '2020-11-06 04:17:55'),
(12, 2, 'secretary', '889b2b111b4bc3adb722f0fcff480901', 'Secretary Office', 'secretary@test.com', 'team-3-270x282_1.jpg', 'male', 1, 1, '2020-11-10 08:59:11', 0, '2020-11-10 03:59:11'),
(13, 4, 'Superintendent', '3a116f3be76e1e7d165e379bb7de8216', 'Superintendent', 'Superintendent@bfkp.com', 'single-img-two_1.jpg', 'male', 1, 1, '2020-11-17 11:23:44', 0, '2020-11-17 06:23:44'),
(14, 6, 'dcbannu', '320257fa348209843056fb72bc5a9154', 'DC Bannu', 'dcbannu@test.com', 'single-img-two_2.jpg', 'male', 1, 1, '2020-11-19 13:08:24', 4, '2020-11-19 08:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_role`
--

DROP TABLE IF EXISTS `tbl_admin_role`;
CREATE TABLE `tbl_admin_role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_role`
--

INSERT INTO `tbl_admin_role` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Super Admin', 1, 1, '2020-07-20 02:48:43'),
(2, 'Secretary Office', 1, 1, '2020-07-20 02:49:58'),
(3, 'Account Section', 1, 1, '2020-07-20 02:50:15'),
(4, 'Gazetted Officer', 1, 1, '2020-07-20 02:50:43'),
(5, 'Issue Branch', 1, 1, '2020-07-20 02:51:03'),
(6, 'DC Office', 1, 1, '2020-07-20 02:51:11'),
(7, 'Secretariat Office', 1, 1, '2020-07-20 02:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

DROP TABLE IF EXISTS `tbl_banks`;
CREATE TABLE `tbl_banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'HBL', 1, 1, '2020-08-20 14:48:41'),
(2, 'UBL', 1, 1, '2020-08-20 14:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batches`
--

DROP TABLE IF EXISTS `tbl_batches`;
CREATE TABLE `tbl_batches` (
  `id` int(11) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `record_add_date` varchar(255) NOT NULL,
  `record_add_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `status_dated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_batches`
--

INSERT INTO `tbl_batches` (`id`, `batch_no`, `application_no`, `tbl_grants_id`, `tbl_district_id`, `record_add_date`, `record_add_by`, `status`, `status_dated`) VALUES
(1, '20201221-1', '10000005', 6, 3, '2020-12-21 02:10:44', '1', 1, '2020-12-21'),
(2, '20201221-1', '10000004', 5, 3, '2020-12-21 02:10:45', '1', 1, '2020-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bfc_list_bank`
--

DROP TABLE IF EXISTS `tbl_bfc_list_bank`;
CREATE TABLE `tbl_bfc_list_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_code` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL,
  `tbl_banks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bfc_list_bank`
--

INSERT INTO `tbl_bfc_list_bank` (`id`, `name`, `branch_code`, `status`, `record_add_by`, `record_add_date`, `tbl_banks_id`) VALUES
(1, 'Thana', '1419', 1, 1, '2020-08-20 14:49:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case_status`
--

DROP TABLE IF EXISTS `tbl_case_status`;
CREATE TABLE `tbl_case_status` (
  `id` int(11) NOT NULL COMMENT 'This table is for the status of case like finalized or pending etc',
  `name` varchar(45) NOT NULL,
  `label` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_case_status`
--

INSERT INTO `tbl_case_status` (`id`, `name`, `label`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Pending', 'label label-warning', 1, 1, '2020-08-13 13:05:13'),
(2, 'Complete', 'label label-success', 1, 1, '2020-08-13 13:05:13'),
(3, 'In Process', 'label label-primary', 1, 1, '2020-11-25 04:33:00'),
(4, 'Approved', 'label label-success', 1, 1, '2020-11-25 04:33:19'),
(5, 'Rejected', 'label label-danger', 1, 1, '2020-11-25 04:33:39'),
(6, 'Cancelled', 'label label-warning', 1, 1, '2020-11-25 04:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Department of Administration', 1, 1, '2020-10-22 10:35:07'),
(2, 'Department of Agriculture', 1, 1, '2020-10-22 10:35:07'),
(3, 'Department of Auqaf', 1, 1, '2020-10-22 10:35:07'),
(4, 'Department of Communication & Works', 1, 1, '2020-10-22 10:35:07'),
(5, 'Department of Elementary & Secondary Educatio', 1, 1, '2020-10-22 10:35:07'),
(6, 'Department of Energy & Power', 1, 1, '2020-10-22 10:35:07'),
(7, 'Department of Environment', 1, 1, '2020-10-22 10:35:07'),
(8, 'Department of Excise & Taxation', 1, 1, '2020-10-22 10:35:07'),
(9, 'Department of Finance', 1, 1, '2020-10-22 10:35:07'),
(10, 'Department of Food', 1, 1, '2020-10-22 10:35:07'),
(11, 'Department of Health', 1, 1, '2020-10-22 10:35:07'),
(12, 'Department of Housing', 1, 1, '2020-10-22 10:35:07'),
(13, 'Department of Industries', 1, 1, '2020-10-22 10:35:07'),
(14, 'Department of Information', 1, 1, '2020-10-22 10:35:07'),
(15, 'Department of Irrigation', 1, 1, '2020-10-22 10:35:07'),
(16, 'Department of Law', 1, 1, '2020-10-22 10:35:07'),
(17, 'Department of Local Government', 1, 1, '2020-10-22 10:35:07'),
(18, 'Department of Minerals Development', 1, 1, '2020-10-22 10:35:07'),
(19, 'Department of Planning & Development', 1, 1, '2020-10-22 10:35:07'),
(20, 'Department of Revenue & Estate', 1, 1, '2020-10-22 10:35:07'),
(21, 'Department of Sports & Tourism', 1, 1, '2020-10-22 10:35:07'),
(22, 'Department of Transport', 1, 1, '2020-10-22 10:35:07'),
(23, 'Department of Zakat & Ushr', 1, 1, '2020-10-22 10:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Mardan', 1, 1, '2020-07-20 02:51:59'),
(2, 'Peshawar', 1, 1, '2020-07-20 02:52:09'),
(3, 'Malakand', 1, 1, '2020-09-29 11:43:12'),
(4, 'Bannu', 1, 1, '2020-11-19 12:58:30'),
(5, 'Lakki Marwat', 1, 1, '2020-11-19 12:58:42'),
(6, 'Dera Ismail Khan', 1, 1, '2020-11-19 12:58:51'),
(7, 'Tank', 1, 1, '2020-11-19 12:59:01'),
(8, 'Abbottabad', 1, 1, '2020-11-19 12:59:13'),
(9, 'Batagram', 1, 1, '2020-11-19 12:59:23'),
(10, 'Haripur', 1, 1, '2020-11-19 12:59:32'),
(11, 'Mansehra', 1, 1, '2020-11-19 12:59:42'),
(12, 'Hangu', 1, 1, '2020-11-19 12:59:54'),
(13, 'Karak', 1, 1, '2020-11-19 13:00:03'),
(14, 'Kohat', 1, 1, '2020-11-19 13:00:12'),
(15, 'Buner', 1, 1, '2020-11-19 13:00:22'),
(16, 'Chitral', 1, 1, '2020-11-19 13:00:31'),
(17, 'Lower Dir', 1, 1, '2020-11-19 13:00:40'),
(18, 'Shangla', 1, 1, '2020-11-19 13:00:49'),
(19, 'Swat', 1, 1, '2020-11-19 13:01:14'),
(20, 'Upper Dir', 1, 1, '2020-11-19 13:01:33'),
(21, 'Swabi', 1, 1, '2020-11-19 13:02:29'),
(22, 'Charsadda', 1, 1, '2020-11-19 13:02:56'),
(23, 'Nowshera', 1, 1, '2020-11-19 13:03:10'),
(24, 'Kohistan', 1, 1, '2020-11-19 13:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_info`
--

DROP TABLE IF EXISTS `tbl_emp_info`;
CREATE TABLE `tbl_emp_info` (
  `id` int(11) NOT NULL,
  `grantee_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `marital_status` varchar(45) NOT NULL,
  `tbl_department_id` int(11) NOT NULL,
  `tbl_post_id` int(11) NOT NULL,
  `pay_scale` varchar(45) NOT NULL,
  `pay_scale_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `other_address` varchar(255) DEFAULT NULL,
  `cnic_no` varchar(15) NOT NULL,
  `personnel_no` varchar(45) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_emp_info`
--

INSERT INTO `tbl_emp_info` (`id`, `grantee_name`, `father_name`, `contact_no`, `marital_status`, `tbl_department_id`, `tbl_post_id`, `pay_scale`, `pay_scale_id`, `tbl_district_id`, `office_address`, `other_address`, `cnic_no`, `personnel_no`, `dob`, `record_add_by`, `record_add_date`, `status`) VALUES
(1, 'awais', 'khan', '1111111111111', 'married', 1, 1, 'BS-01', 1, 2, 'asdas', 'adasd', '1111111111111', 'asdasd', '2020-08-19', 1, '2020-08-13 13:05:49', 1),
(2, 'Asif', 'Raza Khan', '03459270525', 'married', 1, 1, 'BS-02', 2, 2, 'Malakand', 'Malakand 2', '1540279479435', '123654789', '2020-08-31', 1, '2020-08-24 01:58:00', 1),
(3, 'Ali Muhammad', 'Ali Khan', '35465432156', 'married', 2, 2, 'BS-16', 16, 2, 'This is test address', 'Other addrress', '1540279864425', '321654', '1996-06-12', 1, '2020-09-23 13:05:48', 1),
(4, 'Shahab Hussain', 'Hussain Ali', '03459270525', 'married', 22, 2, 'BS-16', 16, 3, 'Test address is here', 'other address goes here', '1540279479435', '2575525', '1986-06-18', 10, '2020-11-04 12:19:33', 1),
(5, 'Irfan', 'Raza', '034559887622', 'married', 21, 2, 'BS-16', 16, 2, 'This is test office address', 'This is test other address', '1540298749879', '100225', '1980-06-17', 1, '2020-11-17 11:06:16', 1),
(6, 'Dawood', 'Raza', '5464654466', 'married', 22, 2, 'BS-16', 16, 2, 'test office address', 'test other address', '5154027955986', '2020', '2020-11-17', 13, '2020-11-17 11:31:44', 1),
(7, 'Ahmad', 'Ali', '216354321351', 'married', 23, 2, 'BS-16', 16, 3, 'This is test office address', 'this is test other address', '1540298765432', '23546321', '2020-12-13', 11, '2020-12-13 15:52:04', 1),
(8, 'Zahid Hussain', 'Shahid Hussain', '033312365478', 'married', 23, 1, 'BS-01', 1, 3, 'This is test address', 'This is other address', '1544022344278', '23322211', '2020-12-21', 10, '2020-12-21 00:28:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_funeral_grant`
--

DROP TABLE IF EXISTS `tbl_funeral_grant`;
CREATE TABLE `tbl_funeral_grant` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `record_no` varchar(45) NOT NULL,
  `record_no_year` varchar(45) NOT NULL,
  `doa` varchar(45) NOT NULL,
  `name_deceased` varchar(45) NOT NULL COMMENT 'Name of Deceased',
  `dor` varchar(45) NOT NULL,
  `los` varchar(255) NOT NULL,
  `dept_letter_no` varchar(45) NOT NULL,
  `dept_letter_no_date` varchar(100) NOT NULL,
  `grant_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) NOT NULL,
  `tbl_case_status_id` int(11) NOT NULL,
  `tbl_payment_mode_id` int(11) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_verification` varchar(3) NOT NULL DEFAULT 'no',
  `sign_of_applicant` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_office_dept_seal` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of office/department with official seal',
  `s_n_dept_admin_seal` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of department/administrative department with official seal',
  `cnic_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'CNIC of Govt. Servant (Check box)',
  `payroll_attach` varchar(3) NOT NULL DEFAULT 'no',
  `dc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death Certificate (Check box)',
  `bf_contribution_attach` varchar(3) NOT NULL DEFAULT 'no',
  `boards_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'when yes record will be lock',
  `ac_edit` int(11) NOT NULL DEFAULT 0 COMMENT 'in account section who will received the record',
  `sent_to_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'record lock once send to secretary',
  `approve_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'when record will approve by secretary .. send back to account section for send to bank ',
  `sent_to_bank` int(11) NOT NULL DEFAULT 0 COMMENT 'complete process.\nrecord will be full lock. no editing after this without secretary approval',
  `feedback_website` varchar(100) DEFAULT NULL COMMENT 'this will provide status feedback on website …\nchange every time during process',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `repeat_case` int(11) NOT NULL DEFAULT 0 COMMENT 'this is for if repeat case were found… by default its value is 0 … if found value change it to 1 and record is lock from further proceedings ',
  `tbl_emp_info_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_funeral_grant`
--

INSERT INTO `tbl_funeral_grant` (`id`, `application_no`, `record_no`, `record_no_year`, `doa`, `name_deceased`, `dor`, `los`, `dept_letter_no`, `dept_letter_no_date`, `grant_amount`, `deduction`, `net_amount`, `tbl_case_status_id`, `tbl_payment_mode_id`, `tbl_list_bank_branches_id`, `account_no`, `bank_verification`, `sign_of_applicant`, `s_n_office_dept_seal`, `s_n_dept_admin_seal`, `cnic_attach`, `payroll_attach`, `dc_attach`, `bf_contribution_attach`, `boards_approval`, `ac_edit`, `sent_to_secretary`, `approve_secretary`, `sent_to_bank`, `feedback_website`, `record_add_by`, `record_add_date`, `repeat_case`, `tbl_emp_info_id`, `tbl_district_id`, `gazette`) VALUES
(1, '10000003', '24323222', '2020', '2001-01-30', 'Ali', '2012-01-31', '11 year(s) 0 month(s) 3 and day(s)', '2322456', '2020-12-21', '6000', '0', '6000', 3, 2, 2, '24324232211', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 0, 0, 0, 0, '', 10, '2020-12-21 00:31:46', 0, 8, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_funeral_payments`
--

DROP TABLE IF EXISTS `tbl_funeral_payments`;
CREATE TABLE `tbl_funeral_payments` (
  `id` int(11) NOT NULL COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount',
  `tbl_pay_scale_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `amount` varchar(50) NOT NULL DEFAULT '0' COMMENT 'is date se pehly or baad mey,  ya kab se apply how ha',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(255) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_funeral_payments`
--

INSERT INTO `tbl_funeral_payments` (`id`, `tbl_pay_scale_id`, `from_date`, `to_date`, `amount`, `record_add_by`, `record_add_date`, `tbl_grants_id`, `status`) VALUES
(1, 1, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(2, 2, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(3, 3, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(4, 4, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(5, 5, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(6, 6, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(7, 7, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(8, 8, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(9, 9, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(10, 10, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(11, 11, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(12, 12, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(13, 13, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(14, 14, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0),
(15, 15, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grantee_type`
--

DROP TABLE IF EXISTS `tbl_grantee_type`;
CREATE TABLE `tbl_grantee_type` (
  `id` int(11) NOT NULL COMMENT 'table for grant type like widow etc\nthis table is used in lump sum grant',
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grantee_type`
--

INSERT INTO `tbl_grantee_type` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Widow', 1, 1, '2020-08-27 12:26:11'),
(2, 'Type 2', 1, 1, '2020-08-27 12:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grants`
--

DROP TABLE IF EXISTS `tbl_grants`;
CREATE TABLE `tbl_grants` (
  `id` int(11) NOT NULL COMMENT 'table for grants like retirement grant, scholarship grant',
  `name` varchar(45) NOT NULL,
  `tbl_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grants`
--

INSERT INTO `tbl_grants` (`id`, `name`, `tbl_name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Scholarship Grants', 'tbl_scholaarship_grant', 1, 1, '2020-09-23 13:41:54'),
(2, 'Funeral Grants', 'tbl_funeral_grant', 1, 1, '2020-09-23 13:42:03'),
(3, 'Retirement Grants', 'tbl_retirement_grant', 1, 1, '2020-09-23 13:42:12'),
(4, 'Monthly Grants', 'tbl_monthly_grant', 1, 1, '2020-09-23 13:55:12'),
(5, 'Interest Free Loan Grants', 'tbl_interest_free_loan', 1, 1, '2020-09-23 13:55:24'),
(6, 'Lumpsum Grants', 'tbl_lump_sum_grant', 1, 1, '2020-09-23 13:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grants_has_tbl_emp_info_gerund`
--

DROP TABLE IF EXISTS `tbl_grants_has_tbl_emp_info_gerund`;
CREATE TABLE `tbl_grants_has_tbl_emp_info_gerund` (
  `id` int(11) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `tbl_emp_info_id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `batch_status` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grants_has_tbl_emp_info_gerund`
--

INSERT INTO `tbl_grants_has_tbl_emp_info_gerund` (`id`, `tbl_grants_id`, `tbl_emp_info_id`, `application_no`, `tbl_district_id`, `role_id`, `added_by`, `gazette`, `date_added`, `batch_status`, `status`) VALUES
(1, 1, 4, '10000001', 3, 6, 10, 1, '2020-12-21 00:09:24', 0, 3),
(2, 3, 4, '10000002', 3, 6, 10, 1, '2020-12-21 00:13:57', 0, 3),
(3, 2, 8, '10000003', 3, 6, 10, 0, '2020-12-21 00:31:46', 0, 3),
(4, 5, 8, '10000004', 3, 6, 10, 0, '2020-12-21 00:41:29', 1, 3),
(5, 6, 4, '10000005', 3, 6, 10, 1, '2020-12-21 01:15:45', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grant_payments`
--

DROP TABLE IF EXISTS `tbl_grant_payments`;
CREATE TABLE `tbl_grant_payments` (
  `id` int(11) NOT NULL COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount',
  `tbl_pay_scale_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `amount` varchar(50) NOT NULL DEFAULT '0' COMMENT 'is date se pehly or baad mey,  ya kab se apply how ha',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(255) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grant_payments`
--

INSERT INTO `tbl_grant_payments` (`id`, `tbl_pay_scale_id`, `from_date`, `to_date`, `amount`, `record_add_by`, `record_add_date`, `tbl_grants_id`, `status`) VALUES
(1, 1, '2010-07-01', '2016-12-19', '20000', 1, '2020-09-23 14:36:32', 3, 1),
(2, 2, '2010-07-01', '2016-12-19', '20000', 1, '2020-09-23 14:36:32', 3, 1),
(3, 3, '2010-07-01', '2016-12-19', '20000', 1, '2020-09-23 14:36:32', 3, 1),
(4, 4, '2010-07-01', '2016-12-19', '20000', 1, '2020-09-23 14:36:32', 3, 1),
(5, 5, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(6, 6, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(7, 7, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(8, 8, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(9, 9, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(10, 10, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(11, 11, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(12, 12, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(13, 13, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(14, 14, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(15, 15, '2010-07-01', '2016-12-19', '30000', 1, '2020-09-23 14:36:32', 3, 1),
(16, 16, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(17, 17, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(18, 18, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(19, 19, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(20, 20, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(21, 21, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(22, 22, '2010-07-01', '2016-12-19', '55000', 1, '2020-09-23 14:36:32', 3, 1),
(23, 1, '2016-12-20', '0000-00-00', '230000', 1, '2020-09-23 14:36:32', 3, 1),
(24, 2, '2016-12-20', '0000-00-00', '230000', 1, '2020-09-23 14:36:32', 3, 1),
(25, 3, '2016-12-20', '0000-00-00', '230000', 1, '2020-09-23 14:36:32', 3, 1),
(26, 4, '2016-12-20', '0000-00-00', '230000', 1, '2020-09-23 14:36:32', 3, 1),
(27, 5, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(28, 6, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(29, 7, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(30, 8, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(31, 9, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(32, 10, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(33, 11, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(34, 12, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(35, 13, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(36, 14, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(37, 15, '2016-12-20', '0000-00-00', '330000', 1, '2020-09-23 14:36:32', 3, 1),
(38, 16, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(39, 17, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(40, 18, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(41, 19, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(42, 20, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(43, 21, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(44, 22, '2016-12-20', '0000-00-00', '500000', 1, '2020-09-23 14:36:32', 3, 1),
(45, 1, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(46, 2, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(47, 3, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(48, 4, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(49, 5, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(50, 6, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(51, 7, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(52, 8, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(53, 9, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(54, 10, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(55, 11, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(56, 12, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(57, 13, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(58, 14, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(59, 15, '0000-00-00', '2017-12-19', '6000', 1, '2020-09-28 09:36:32', 2, 1),
(60, 1, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(61, 2, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(62, 3, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(63, 4, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(64, 5, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(65, 6, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(66, 7, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(67, 8, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(68, 9, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(69, 10, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(70, 11, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(71, 12, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(72, 13, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(73, 14, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(74, 15, '2017-12-20', '0000-00-00', '10000', 1, '2020-09-28 09:36:32', 2, 1),
(75, 1, '2017-07-01', '0000-00-00', '250000', 1, '2020-09-28 09:36:32', 6, 1),
(76, 2, '2017-07-01', '0000-00-00', '250000', 1, '2020-09-28 09:36:32', 6, 1),
(77, 3, '2017-07-01', '0000-00-00', '250000', 1, '2020-09-28 09:36:32', 6, 1),
(78, 4, '2017-07-01', '0000-00-00', '250000', 1, '2020-09-28 09:36:32', 6, 1),
(79, 5, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(80, 6, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(81, 7, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(82, 8, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(83, 9, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(84, 10, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(85, 11, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(86, 12, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(87, 13, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(88, 14, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(89, 15, '2017-07-01', '0000-00-00', '350000', 1, '2020-09-28 09:36:32', 6, 1),
(90, 16, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(91, 17, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(92, 18, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(93, 19, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(94, 20, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(95, 21, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1),
(96, 22, '2017-07-01', '0000-00-00', '500000', 1, '2020-09-28 09:36:32', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interestfreeloan_payments`
--

DROP TABLE IF EXISTS `tbl_interestfreeloan_payments`;
CREATE TABLE `tbl_interestfreeloan_payments` (
  `id` int(11) NOT NULL COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount',
  `tbl_pay_scale_id` int(11) NOT NULL,
  `tbl_pay_scale_id_to` int(11) NOT NULL,
  `tbl_loan_types_id` int(11) NOT NULL,
  `mode_of_installments` varchar(255) NOT NULL,
  `min_service` int(11) NOT NULL,
  `remaining_service` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `amount` varchar(50) NOT NULL DEFAULT '0' COMMENT 'is date se pehly or baad mey,  ya kab se apply how ha',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(255) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_interestfreeloan_payments`
--

INSERT INTO `tbl_interestfreeloan_payments` (`id`, `tbl_pay_scale_id`, `tbl_pay_scale_id_to`, `tbl_loan_types_id`, `mode_of_installments`, `min_service`, `remaining_service`, `from_date`, `to_date`, `amount`, `record_add_by`, `record_add_date`, `tbl_grants_id`, `status`) VALUES
(1, 1, 17, 1, 'Rs.200/- P.M.', 0, 0, '0000-00-00', '0000-00-00', '8000', 1, '2020-09-28 09:36:32', 5, 1),
(2, 1, 17, 2, 'Rs.1,340/- P.M.  In 60 equal installments. (No permission for extension in the period of return else profit on the loan will be imposed at the profit rate of GP Fund of that year.)', 5, 5, '0000-00-00', '0000-00-00', '80000', 1, '2020-09-28 09:36:32', 5, 1),
(3, 1, 17, 3, 'Rs.2080/- P.M.  In 120 equal installments. (No permission for extension in the period of return else profit on the loan will be imposed at the profit rate of GP Fund of that year.)', 10, 10, '0000-00-00', '0000-00-00', '250000', 1, '2020-09-28 09:36:32', 5, 1),
(4, 17, 22, 4, 'Rs.3334/- P.M.  In 60 equal installments. (No permission for extension in the period of return else profit on the loan will be imposed at the profit rate of GP Fund of that year.)', 5, 5, '0000-00-00', '0000-00-00', '200000', 1, '2020-09-28 09:36:32', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest_free_loan`
--

DROP TABLE IF EXISTS `tbl_interest_free_loan`;
CREATE TABLE `tbl_interest_free_loan` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `tbl_emp_info_id` int(11) NOT NULL,
  `pay_scale_id` int(11) NOT NULL,
  `dao` varchar(255) NOT NULL,
  `ddo_code` varchar(255) NOT NULL,
  `ddo_address` varchar(255) NOT NULL,
  `marital_status` varchar(45) NOT NULL,
  `personnel_no` varchar(255) NOT NULL,
  `tbl_loan_type_id` int(11) NOT NULL,
  `grantee_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `cnic_no` varchar(13) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `tbl_department_id` int(11) NOT NULL,
  `tbl_post_id` int(11) NOT NULL,
  `tbl_pay_scale_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  `dor` date NOT NULL,
  `los` varchar(255) NOT NULL,
  `grant_amount` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `present_add` varchar(255) NOT NULL,
  `permanent_add` varchar(255) NOT NULL,
  `duty_place` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `applicant_sign` varchar(255) NOT NULL,
  `tbl_bank_branch_id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `bank_verification` varchar(3) NOT NULL,
  `hod_attached` varchar(3) NOT NULL,
  `dc_admin` varchar(3) NOT NULL,
  `tbl_case_status` int(11) NOT NULL,
  `boards_approval` varchar(3) NOT NULL,
  `ac_edit` int(11) NOT NULL,
  `sent_to_secretary` int(11) NOT NULL,
  `approve_secretary` int(11) NOT NULL,
  `sent_to_bank` int(11) NOT NULL,
  `feedback_website` int(11) NOT NULL,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` date NOT NULL,
  `repeat_case` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interest_free_loan`
--

INSERT INTO `tbl_interest_free_loan` (`id`, `application_no`, `tbl_emp_info_id`, `pay_scale_id`, `dao`, `ddo_code`, `ddo_address`, `marital_status`, `personnel_no`, `tbl_loan_type_id`, `grantee_name`, `father_name`, `cnic_no`, `office_address`, `tbl_department_id`, `tbl_post_id`, `tbl_pay_scale_id`, `tbl_district_id`, `gazette`, `dob`, `doa`, `dor`, `los`, `grant_amount`, `deduction`, `net_amount`, `present_add`, `permanent_add`, `duty_place`, `contact_no`, `applicant_sign`, `tbl_bank_branch_id`, `account_no`, `bank_verification`, `hod_attached`, `dc_admin`, `tbl_case_status`, `boards_approval`, `ac_edit`, `sent_to_secretary`, `approve_secretary`, `sent_to_bank`, `feedback_website`, `record_add_by`, `record_add_date`, `repeat_case`) VALUES
(1, '10000004', 8, 1, 'Malakand', '2342223', 'Batkhela Malakand', 'married', '23322211', 3, 'Zahid Hussain', 'Shahid Hussain', '1544022344278', 'This is test address', 23, 1, 0, 3, 0, '2020-12-21', '2003-06-10', '2035-10-16', '32 year(s) 4 month(s) 14 and day(s)', 250000, 0, 250000, 'test street', 'test permanent address', 'Malakand', '033312365478', 'Zahid Khan', 2, '32424324234', 'No', 'No', 'No', 3, '0', 0, 0, 0, 0, 0, 10, '2020-12-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_legal_heirs`
--

DROP TABLE IF EXISTS `tbl_legal_heirs`;
CREATE TABLE `tbl_legal_heirs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` varchar(45) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `tbl_emp_info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_bank_branches`
--

DROP TABLE IF EXISTS `tbl_list_bank_branches`;
CREATE TABLE `tbl_list_bank_branches` (
  `id` int(11) NOT NULL,
  `tbl_banks_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_code` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_list_bank_branches`
--

INSERT INTO `tbl_list_bank_branches` (`id`, `tbl_banks_id`, `name`, `branch_code`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 1, 'Batkhela', '1420', 1, 1, '2020-08-20 14:49:51'),
(2, 1, 'Thana', '1419', 1, 1, '2020-08-20 14:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_types`
--

DROP TABLE IF EXISTS `tbl_loan_types`;
CREATE TABLE `tbl_loan_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loan_types`
--

INSERT INTO `tbl_loan_types` (`id`, `title`, `status`) VALUES
(1, 'Bicycle Advance', 1),
(2, 'Motorcycle Advance', 1),
(3, 'House Building Advance', 1),
(4, 'Motorcar Advance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logger`
--

DROP TABLE IF EXISTS `tbl_logger`;
CREATE TABLE `tbl_logger` (
  `id` bigint(20) NOT NULL,
  `tbl_name` varchar(50) NOT NULL,
  `tbl_name_id` int(11) NOT NULL,
  `action_type` varchar(100) NOT NULL,
  `detail` longtext NOT NULL,
  `record_add_by` int(11) DEFAULT 0,
  `record_add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_logger`
--

INSERT INTO `tbl_logger` (`id`, `tbl_name`, `tbl_name_id`, `action_type`, `detail`, `record_add_by`, `record_add_date`) VALUES
(1, 'tbl_department', 1, 'add', '<tr><td><strong>Department Name</strong></td><td>Asdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 13:05:07'),
(2, 'tbl_case_status', 1, 'add', '<tr><td><strong>Case Status Name</strong></td><td>Asdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 13:05:13'),
(3, 'tbl_pay_scale', 1, 'add', '<tr><td><strong>Pay Scale Name</strong></td><td>Asdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 13:05:18'),
(4, 'tbl_pay_scale', 1, 'update', '<tr><td><strong>Pay Scale Name</strong></td><td>Asdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 13:05:21'),
(5, 'tbl_post', 1, 'add', '<tr><td><strong>Post Name</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 13:05:29'),
(6, 'tbl_emp_info', 1, 'add', '<tr><td><strong>Grantee Name</strong></td><td>asadas</td><td><strong>Father Name</strong></td><td>dasad</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Post</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-08-13 13:05:49'),
(7, 'tbl_emp_info', 1, 'update', '<tr><td><strong>Grantee Name</strong></td><td>asadas</td><td><strong>Father Name</strong></td><td>dasad</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Post</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-08-13 13:37:34'),
(8, 'tbl_emp_info', 1, 'update', '<tr><td><strong>Grantee Name</strong></td><td>awais</td><td><strong>Father Name</strong></td><td>khaan</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Post</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-08-13 13:37:54'),
(9, 'tbl_emp_info', 1, 'update', '<tr><td><strong>Grantee Name</strong></td><td>awais</td><td><strong>Father Name</strong></td><td>khan</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Post</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-08-13 13:38:01'),
(10, 'tbl_admin_role', 8, 'add', '<tr><td><strong>Role Name</strong></td><td>Asadasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 14:19:20'),
(11, 'tbl_admin_role', 8, 'update', '<tr><td><strong>Role Name</strong></td><td>Asadasdasdasd</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-13 14:19:24'),
(12, 'tbl_payment_mode', 1, 'add', '<tr><td><strong>Payment Mode Name</strong></td><td>Cash</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:44:28'),
(13, 'tbl_payment_mode', 2, 'add', '<tr><td><strong>Payment Mode Name</strong></td><td>Bank Transfer</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:44:43'),
(14, 'tbl_banks', 1, 'add', '<tr><td><strong>Bank Name</strong></td><td>HBL</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:48:41'),
(15, 'tbl_banks', 2, 'add', '<tr><td><strong>Bank Name</strong></td><td>UBL</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:48:47'),
(16, 'tbl_bfc_list_bank', 1, 'add', '<tr><td><strong>BFC Bank Branch Name</strong></td><td>Thana</td><td><strong>Branch Code</strong></td><td>1419</td></tr><tr><td><strong>Bank Name</strong></td><td>HBL</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:49:16'),
(17, 'tbl_list_bank_branches', 1, 'add', '<tr><td><strong>Bank Branch Name</strong></td><td>Batkhela</td><td><strong>Branch Code</strong></td><td>1420</td></tr><tr><td><strong>Bank Name</strong></td><td>HBL</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:49:51'),
(18, 'tbl_list_bank_branches', 2, 'add', '<tr><td><strong>Bank Branch Name</strong></td><td>Thana</td><td><strong>Branch Code</strong></td><td>1419</td></tr><tr><td><strong>Bank Name</strong></td><td>HBL</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-20 14:52:59'),
(19, 'tbl_emp_info', 2, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Asif</td><td><strong>Father Name</strong></td><td>Raza Khan</td><td><strong>Contact No</strong></td><td>03459270525</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540279479435</td><td><strong>Date Of Birth</strong></td><td>31-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>123654789</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Post</strong></td><td>Asdasd</td><td><strong>Pay Scale</strong></td><td>Asdasd</td></tr><tr><td><strong>Office Address</strong></td><td>Malakand</td><td><strong>Other Address</strong></td><td>Malakand 2</td></tr>', 1, '2020-08-24 01:58:00'),
(20, 'tbl_scholaarship_grant', 2, 'add', '<tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>test</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-08-24</td></tr><tr><td><strong>Marks Obtained</strong></td><td>test</td><td><strong>Total Marks</strong></td><td>est</td><td><strong>Percentage</strong></td><td>test</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>tes</td><td><strong>grant amount</strong></td><td>tes</td></tr><td><strong>deduction</strong></td><td>test</td><td><strong>net amount</strong></td><td>test</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>1</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>test</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>No</td></tr><td><strong>sent_to_secretary</strong></td><td>No</td><td><strong>approve_secretary</strong></td><td>No</td><td><strong>ac_edit</strong></td><td>No</td></tr><td><strong>sent_to_bank</strong></td><td>No</td><td><strong>feedback_website</strong></td><td>test</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-08-24 02:24:39'),
(21, 'tbl_retirement_grant', 1, 'add', '<tr><td><strong>Record no</strong></td><td>123654</td><td><strong>record_no_year</strong></td><td>2004</td><td><strong>Date of appointment </strong></td><td>2020-09-01</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-08-03</td><td><strong>los</strong></td><td>test</td><td><strong>dept_letter_no</strong></td><td>265431</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-08-27</td><td><strong>grant_amount</strong></td><td>100000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>99000</td><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>321534313541</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td>0</td><td><strong>sent_to_secretary</strong></td><td>0</td></tr><tr><td><strong>approve_secretary</strong></td><td>0</td><td><strong>sent_to_bank</strong></td><td>0</td><td><strong>feedback_website</strong></td><td>This is test website feeback</td></tr>', 1, '2020-08-25 14:36:08'),
(22, 'tbl_funeral_grant', 2, 'add', '<tr><td><strong>Record no</strong></td><td>21313123</td><td><strong>record_no_year</strong></td><td>2442</td><td><strong>Date of appointment </strong></td><td>2020-08-27</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>test namw</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-08-31</td><td><strong>los</strong></td><td>234</td><td><strong>dept_letter_no</strong></td><td>4234234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-08-06</td><td><strong>grant_amount</strong></td><td>234234</td><td><strong>deduction</strong></td><td>234</td></tr><tr><td><strong>net amount</strong></td><td>234234</td><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>24234234234</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>payroll_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td>1</td><td><strong>sent_to_secretary</strong></td><td>1</td></tr><tr><td><strong>approve_secretary</strong></td><td>1</td><td><strong>sent_to_bank</strong></td><td>1</td><td><strong>feedback_website</strong></td><td>This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback</td></tr>', 1, '2020-08-26 02:54:48'),
(23, 'tbl_monthly_grant', 1, 'add', '<tr><td><strong>Record no</strong></td><td>2123123</td><td><strong>record_no_year</strong></td><td>123123</td><td><strong>Date of appointment </strong></td><td>2020-07-29</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-07-28</td><td><strong>los</strong></td><td>23213</td><td><strong>dept_letter_no</strong></td><td>123123</td></tr><tr><td><strong>From month</strong></td><td>123</td><td><strong>To month</strong></td><td>123</td><td><strong>Total month</strong></td><td>123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-08-25</td><td><strong>grant_amount</strong></td><td>12</td><td><strong>deduction</strong></td><td>12</td></tr><tr><td><strong>net amount</strong></td><td>12</td><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>1</td><td><strong>account_no</strong></td><td>12312312313213</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>cnic_widow_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td></tr><tr><td><strong>disc_attach</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>retirement_attach</strong></td><td>Yes</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>invalidation_attach</strong></td><td>Yes</td><td><strong>family_attach</strong></td><td>Yes</td></tr><tr><td><strong>bf_contribution_attach_copy3</strong></td><td>Yes</td><td><strong>no_marriage_attach</strong></td><td>Yes</td><td><strong>undertaking_attach</strong></td><td>Yes</td></tr><tr><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td>1</td><td><strong>sent_to_secretary</strong></td><td>1</td></tr><tr><td><strong>approve_secretary</strong></td><td>1</td><td><strong>sent_to_bank</strong></td><td>1</td><td><strong>feedback_website</strong></td><td>This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback</td></tr>', 1, '2020-08-26 13:11:39'),
(24, 'tbl_grantee_type', 1, 'add', '<tr><td><strong>Grantee Type Name</strong></td><td>Type 1</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-27 12:26:11'),
(25, 'tbl_grantee_type', 2, 'add', '<tr><td><strong>Grantee Type Name</strong></td><td>Type 2</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-08-27 12:26:19'),
(26, 'tbl_lump_sum_grant', 1, 'add', '<tr><td><strong>Gov Emp Name</strong></td><td>Asif Khan</td><td><strong>Wife Name</strong></td><td>NA</td><td><strong>Son Name</strong></td><td>NA</td></tr><tr><td><strong>Daughter Name</strong></td><td>NA</td><td><strong>tbl_grantee_type_id</strong></td><td>2</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>321321321</td><td><strong>Record_no_year</strong></td><td>2004</td><td><strong>Date of appointment </strong></td><td>2020-08-25</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-08-18</td><td><strong>los</strong></td><td>test</td><td><strong>dept_letter_no</strong></td><td>test123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-08-20</td><td><strong>grant_amount</strong></td><td>20000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>19000</td><td><strong>succession</strong></td><td>This is test succession This is test succession This is test succession</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>32135465432165</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td>0</td></tr><tr><td><strong>sent_to_secretary</strong></td><td>0</td><td><strong>approve_secretary</strong></td><td>0</td><td><strong>sent_to_bank</strong></td><td>0</td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\">This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback This is test feedback</td></tr>', 1, '2020-08-27 13:44:00'),
(27, 'tbl_scholaarship_grant', 3, 'add', '<tr><td><strong>Department</strong></td><td>Asdasd</td><td><strong>Duty place</strong></td><td>Batkhela</td><td><strong>std name</strong></td><td>Asif Khan</td></tr><tr><td><strong>Class pass</strong></td><td>SSC</td><td><strong>Exam pass</strong></td><td>Matriculation</td><td><strong>Result date</strong></td><td>2020-08-19</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>63</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Thana</td><td><strong>grant amount</strong></td><td>1000</td></tr><td><strong>deduction</strong></td><td>50</td><td><strong>net amount</strong></td><td>950</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>3216541654</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td>1</td><td><strong>approve_secretary</strong></td><td>1</td><td><strong>ac_edit</strong></td><td>1</td></tr><td><strong>sent_to_bank</strong></td><td>1</td><td><strong>feedback_website</strong></td><td>kTest feedback</td><td><strong>employee ID</strong></td><td>2</td></tr>', 1, '2020-08-31 09:18:32'),
(28, 'tbl_post', 1, 'update', '<tr><td><strong>Post Name</strong></td><td>Nayib Qasid</td><td><strong>Pay Scale</strong></td><td>BS-01</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 11:08:27'),
(29, 'tbl_post', 2, 'add', '<tr><td><strong>Post Name</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 11:17:54'),
(30, 'tbl_emp_info', 3, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Ali Muhammad</td><td><strong>Father Name</strong></td><td>Ali Khan</td><td><strong>Contact No</strong></td><td>35465432156</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540279864425</td><td><strong>Date Of Birth</strong></td><td>12-06-1996</td></tr><tr><td><strong>Personnel No</strong></td><td>321654</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department Of Biology</td><td><strong>Post</strong></td><td>Nayib Qasid</td><td><strong>Pay Scale</strong></td><td>BS-01</td></tr><tr><td><strong>Office Address</strong></td><td>This is test address</td><td><strong>Other Address</strong></td><td>Other addrress</td></tr>', 1, '2020-09-23 13:05:48'),
(31, 'tbl_scholaarship_grant', 4, 'add', '<tr><td><strong>Department</strong></td><td>Department Of Biology</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Ahmad</td></tr><tr><td><strong>Class pass</strong></td><td>3</td><td><strong>Exam pass</strong></td><td>SSC</td><td><strong>Result date</strong></td><td>2020-09-15</td></tr><tr><td><strong>Marks Obtained</strong></td><td>850</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>65</td></tr><tr><td><strong>Institute name</strong></td><td>Govt School</td><td><strong>institute address</strong></td><td>This is school address</td><td><strong>grant amount</strong></td><td>48000.00</td></tr><td><strong>deduction</strong></td><td>1000</td><td><strong>net amount</strong></td><td>47000</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>3165431654</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>3</td></tr>', 1, '2020-09-23 13:31:33'),
(32, 'tbl_grants', 1, 'add', '<tr><td><strong>Grants Name</strong></td><td>Scholarship Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:41:54'),
(33, 'tbl_grants', 2, 'add', '<tr><td><strong>Grants Name</strong></td><td>Funeral Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:42:03'),
(34, 'tbl_grants', 3, 'add', '<tr><td><strong>Grants Name</strong></td><td>Retirement Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:42:12'),
(35, 'tbl_grants', 4, 'add', '<tr><td><strong>Grants Name</strong></td><td>Monthly Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:55:12'),
(36, 'tbl_grants', 5, 'add', '<tr><td><strong>Grants Name</strong></td><td>Interest Free Loan Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:55:24'),
(37, 'tbl_grants', 6, 'add', '<tr><td><strong>Grants Name</strong></td><td>Lumpsum Grants</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-23 13:55:39'),
(38, 'tbl_grant_payments', 1, 'add', '<tr><td><strong>Pay Scale</strong></td><td>BS-01</td><td><strong>Grant</strong></td><td>Retirement Grants</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>From Date</strong></td><td>08-09-2020</td><td><strong>To Date</strong></td><td>09-10-2020</td><td><strong>Amount</strong></td><td>2000</td></tr>', 1, '2020-09-23 14:36:32'),
(39, 'tbl_grant_payments', 1, 'update', '<tr><td><strong>Pay Scale</strong></td><td>BS-01</td><td><strong>Grant</strong></td><td>Retirement Grants</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>From Date</strong></td><td>01-07-2010</td><td><strong>To Date</strong></td><td>19-12-2016</td><td><strong>Amount</strong></td><td>20000</td></tr>', 1, '2020-09-23 14:37:48'),
(40, 'tbl_retirement_grant', 2, 'add', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>2323213</td><td><strong>record_no_year</strong></td><td>12313212</td><td><strong>Date of appointment </strong></td><td>2020-09-17</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-09-22</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 5 and day(s)</td><td><strong>dept_letter_no</strong></td><td>3213</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-09-22</td><td><strong>grant_amount</strong></td><td>230000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>229000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>12313123</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-09-28 08:17:30'),
(41, 'tbl_emp_info', 1, 'update', '<tr><td><strong>Grantee Name</strong></td><td>awais</td><td><strong>Father Name</strong></td><td>khan</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Post</strong></td><td>Nayib Qasid</td><td><strong>Pay Scale</strong></td><td>BS-03</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-09-28 12:45:34'),
(42, 'tbl_emp_info', 1, 'update', '<tr><td><strong>Grantee Name</strong></td><td>awais</td><td><strong>Father Name</strong></td><td>khan</td><td><strong>Contact No</strong></td><td>1111111111111</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1111111111111</td><td><strong>Date Of Birth</strong></td><td>19-08-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>asdasd</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Post</strong></td><td>Nayib Qasid</td><td><strong>Pay Scale</strong></td><td>BS-01</td></tr><tr><td><strong>Office Address</strong></td><td>asdas</td><td><strong>Other Address</strong></td><td>adasd</td></tr>', 1, '2020-09-28 12:46:44'),
(43, 'tbl_district', 3, 'add', '<tr><td><strong>District Name</strong></td><td>Malakand</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-09-29 11:43:12'),
(44, 'tbl_scholaarship_grant', 5, 'add', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>MAlakand</td><td><strong>std name</strong></td><td>Irfan</td></tr><tr><td><strong>Class pass</strong></td><td>2</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>2020-09-23</td></tr><tr><td><strong>Marks Obtained</strong></td><td>800</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>45</td></tr><tr><td><strong>Institute name</strong></td><td>Govt degree college</td><td><strong>institute address</strong></td><td>Address</td><td><strong>grant amount</strong></td><td>32000.00</td></tr><td><strong>deduction</strong></td><td>10000</td><td><strong>net amount</strong></td><td>22000</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>123123213213</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>2</td></tr>', 1, '2020-09-30 12:16:37'),
(45, 'tbl_emp_info', 3, 'update', '<tr><td><strong>Grantee Name</strong></td><td>Ali Muhammad</td><td><strong>Father Name</strong></td><td>Ali Khan</td><td><strong>Contact No</strong></td><td>35465432156</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540279864425</td><td><strong>Date Of Birth</strong></td><td>12-06-1996</td></tr><tr><td><strong>Personnel No</strong></td><td>321654</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department Of Biology</td><td><strong>Post</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td></tr><tr><td><strong>Office Address</strong></td><td>This is test address</td><td><strong>Other Address</strong></td><td>Other addrress</td></tr>', 1, '2020-10-01 13:20:29'),
(46, 'tbl_retirement_grant', 3, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>12345</td><td><strong>record_no_year</strong></td><td>2002</td><td><strong>Date of appointment </strong></td><td>2020-10-11</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-10-21</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 10 and day(s)</td><td><strong>dept_letter_no</strong></td><td>12312312</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-27</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>10000</td></tr><tr><td><strong>net amount</strong></td><td>490000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>12313123213</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-02 11:06:55'),
(47, 'tbl_funeral_grant', 3, 'add', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>132123213</td><td><strong>record_no_year</strong></td><td>2016</td><td><strong>Date of appointment </strong></td><td>2013-06-12</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Khan Muhammad</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2017-12-19</td><td><strong>los</strong></td><td>4 year(s) 6 month(s) 8 and day(s)</td><td><strong>dept_letter_no</strong></td><td>123123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-21</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>5000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1231321313123</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-02 12:20:19'),
(48, 'tbl_scholaarship_grant', 6, 'add', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>Mardan</td><td><strong>std name</strong></td><td>Irfan</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>2020-10-20</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Mardan Govt School</td><td><strong>institute address</strong></td><td>This is test address</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>16000</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1231231231</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>1</td></tr>', 1, '2020-10-05 02:14:26'),
(49, 'tbl_retirement_grant', 4, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2020-10-20</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-11-07</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 18 and day(s)</td><td><strong>dept_letter_no</strong></td><td>354132132</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-20</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2354653</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-05 02:21:16'),
(50, 'tbl_funeral_grant', 4, 'add', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123123</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2016-02-02</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali Raza</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2016-10-05</td><td><strong>los</strong></td><td>0 year(s) 8 month(s) 2 and day(s)</td><td><strong>dept_letter_no</strong></td><td>12313123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-29</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>6000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>131312312313</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-05 02:29:09'),
(51, 'tbl_lump_sum_grant', 2, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Asif Khan</td><td><strong>Wife Name</strong></td><td>Ali</td><td><strong>Son Name</strong></td><td>Shayaan</td></tr><tr><td><strong>Daughter Name</strong></td><td>Arham</td><td><strong>tbl_grantee_type_id</strong></td><td>2</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>231313123</td><td><strong>Record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2020-10-05</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-11-06</td><td><strong>los</strong></td><td>0 year(s) 1 month(s) 1 and day(s)</td><td><strong>dept_letter_no</strong></td><td>3535345</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-30</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>100</td></tr><tr><td><strong>net amount</strong></td><td>499900</td><td><strong>succession</strong></td><td>test</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>24242424234</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-10-05 04:17:00'),
(52, 'tbl_interest_free_loan', 2, 'add', '<tr><td><strong>tbl_emp_info_id</strong></td><td>3</td><td><strong>pay_scale</strong></td><td>BS-16</td><td><strong>pay_scale_id</strong></td><td>16</td></tr><tr><td><strong>dao</strong></td><td></td><td><strong>ddo_code</strong></td><td>test</td><td><strong>ddo_address</strong></td><td>test</td></tr><tr><td><strong>marital_status</strong></td><td>married</td><td><strong>personnel_no</strong></td><td>321654</td><td><strong>tbl_loan_type_id</strong></td><td>2</td></tr><tr><td><strong>grantee_name</strong></td><td>Ali Muhammad</td><td><strong>father_name</strong></td><td>Ali Khan</td><td><strong>cnic_no</strong></td><td>1540279864425</td></tr><td><strong>office_address</strong></td><td>This is test address</td><td><strong>tbl_department_id</strong></td><td>Department Of Biology</td><td><strong>tbl_post_id</strong></td><td>2</td></tr><td><strong>tbl_district_id</strong></td><td>2</td><td><strong>dob</strong></td><td>1996-06-12</td><td><strong>doa</strong></td><td>2009-03-12</td></tr><td><strong>dor</strong></td><td>2031-07-16</td><td><strong>los</strong></td><td>22 year(s) 4 month(s) 9 and day(s)</td><td><strong>grant_amount</strong></td><td>80000</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net_amount</strong></td><td>80000</td><td><strong>present_add</strong></td><td>test street</td></tr><td><strong>permanent_add</strong></td><td>test</td><td><strong>duty_place</strong></td><td>test</td><td><strong>contact_no</strong></td><td>test</td></tr><td><strong>applicant_sign</strong></td><td>test</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>32234234324</td></tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-10-12 09:56:13'),
(53, 'tbl_scholaarship_grant', 6, 'update', '<tr><td><strong>Grantee Name</strong></td><td></td><td><strong>Father Name</strong></td><td></td><td><strong>Contact No</strong></td><td></td></tr><tr><td><strong>Marital Status</strong></td><td></td><td><strong>CNIC No</strong></td><td></td><td><strong>Date Of Birth</strong></td><td></td></tr><tr><td><strong>Personnel No</strong></td><td></td><td><strong>District</strong></td><td></td><td><strong>Status</strong></td><td>Inactive</td></tr><tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Post</strong></td><td></td><td><strong>Pay Scale</strong></td><td>BS-01</td></tr><tr><td><strong>Office Address</strong></td><td></td><td><strong>Other Address</strong></td><td></td></tr>', 1, '2020-10-13 12:08:58'),
(54, 'tbl_scholaarship_grant', 6, 'update', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>Mardan</td><td><strong>std name</strong></td><td>Irfan</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>20-10-2020</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Mardan Govt School</td><td><strong>institute address</strong></td><td>This is test address 1</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><td><strong>deduction</strong></td><td>100</td><td><strong>net amount</strong></td><td>15900</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1231231231-1</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>1</td></tr>', 1, '2020-10-13 12:12:26');
INSERT INTO `tbl_logger` (`id`, `tbl_name`, `tbl_name_id`, `action_type`, `detail`, `record_add_by`, `record_add_date`) VALUES
(55, 'tbl_scholaarship_grant', 6, 'update', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>Mardan</td><td><strong>std name</strong></td><td>Irfan</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>20-10-2020</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Mardan Govt School</td><td><strong>institute address</strong></td><td>This is test address 1</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><td><strong>deduction</strong></td><td>100</td><td><strong>net amount</strong></td><td>15900</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1231231231</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>1</td></tr>', 1, '2020-10-13 12:14:08'),
(56, 'tbl_scholaarship_grant', 5, 'update', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Dawood</td></tr><tr><td><strong>Class pass</strong></td><td>2</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>23-09-2020</td></tr><tr><td><strong>Marks Obtained</strong></td><td>800</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>45</td></tr><tr><td><strong>Institute name</strong></td><td>Govt degree college</td><td><strong>institute address</strong></td><td>Address</td><td><strong>grant amount</strong></td><td>32000.00</td></tr><td><strong>deduction</strong></td><td>10000</td><td><strong>net amount</strong></td><td>22000</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>123123213213</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>2</td></tr>', 1, '2020-10-13 12:27:13'),
(57, 'tbl_scholaarship_grant', 6, 'update', '<tr><td><strong>Department</strong></td><td>Department of Computer Science</td><td><strong>Duty place</strong></td><td>Mardan 2</td><td><strong>std name</strong></td><td>Irfan Khan</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>20-10-2020</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Mardan Govt School</td><td><strong>institute address</strong></td><td>This is test address 1</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><td><strong>deduction</strong></td><td>100</td><td><strong>net amount</strong></td><td>15900</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1231231231</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>1</td></tr>', 1, '2020-10-13 12:27:55'),
(58, 'tbl_scholaarship_grant', 7, 'add', '<tr><td><strong>Department</strong></td><td>Department Of Biology</td><td><strong>Duty place</strong></td><td>Peshawar</td><td><strong>std name</strong></td><td>Khan Ali</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>Fsc</td><td><strong>Result date</strong></td><td>2019-10-01</td></tr><tr><td><strong>Marks Obtained</strong></td><td>800</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>72.73</td></tr><tr><td><strong>Institute name</strong></td><td>Edwardes College Peshawar</td><td><strong>institute address</strong></td><td>Peshawar</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>1</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2121212121212</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>3</td></tr>', 1, '2020-10-13 13:28:26'),
(59, 'tbl_retirement_grant', 5, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123abc</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2020-10-20</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-11-07</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 18 and day(s)</td><td><strong>dept_letter_no</strong></td><td>354132132abc</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-20</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>499000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2354653abc</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>payroll_attach</strong></td><td>Yes</td><td><strong>dob_ac_attach</strong></td><td>Yes</td><td><strong>retirement_attach</strong></td><td>Yes</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>ppo_attach</strong></td><td>Yes</td></tr><tr><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-13 14:46:03'),
(60, 'tbl_funeral_grant', 4, 'update', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123123</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2016-02-02</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali Raza</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2016-10-05</td><td><strong>los</strong></td><td>0 year(s) 8 month(s) 2 and day(s)</td><td><strong>dept_letter_no</strong></td><td>12313123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2029-10-20</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>5000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>131312312313</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>payroll_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-13 15:29:31'),
(61, 'tbl_funeral_grant', 4, 'update', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123123</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2016-02-02</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali Raza</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2016-10-05</td><td><strong>los</strong></td><td>0 year(s) 8 month(s) 2 and day(s)</td><td><strong>dept_letter_no</strong></td><td>12313123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-20</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>5000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>131312312313</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>payroll_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-19 09:19:58'),
(62, 'tbl_funeral_grant', 4, 'update', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>123123123</td><td><strong>record_no_year</strong></td><td>2009</td><td><strong>Date of appointment </strong></td><td>2016-02-02</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali Raza</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2016-10-05</td><td><strong>los</strong></td><td>0 year(s) 8 month(s) 2 and day(s)</td><td><strong>dept_letter_no</strong></td><td>12313123</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-20</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>5000</td><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>131312312313</td><td><strong>bank_verification</strong></td><td>Yes</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>payroll_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>Yes</td><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-10-20 09:05:31'),
(63, 'tbl_lump_sum_grant', 3, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Abdul</td><td><strong>Wife Name</strong></td><td>Gul</td><td><strong>Son Name</strong></td><td>Ali</td></tr><tr><td><strong>Daughter Name</strong></td><td>Sadia</td><td><strong>tbl_grantee_type_id</strong></td><td>2</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>5566133</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>1994-01-20</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2030-10-20</td><td><strong>los</strong></td><td>36 year(s) 9 month(s) 8 and day(s)</td><td><strong>dept_letter_no</strong></td><td>122</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-15</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>499000</td><td><strong>succession</strong></td><td>this is test succession description</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>1419123654789</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-10-20 09:08:28'),
(64, 'tbl_lump_sum_grant', 4, 'add', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Abdul</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>3</td><td><strong>tbl_grantee_type_id</strong></td><td>1</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>1223312</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2000-01-04</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2029-10-16</td><td><strong>los</strong></td><td>29 year(s) 9 month(s) 19 and day(s)</td><td><strong>dept_letter_no</strong></td><td>242424</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-21</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>499000</td><td><strong>succession</strong></td><td>test succession description</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>1419123654798</td><td><strong>bank_verification</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>cnic_widow_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td></tr><tr><td><strong>family_attach</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dob_ac_attach</strong></td><td>Yes</td></tr><tr><td><strong>single_widow_attach</strong></td><td>Yes</td><td><strong>no_marriage_attach</strong></td><td>Yes</td><td><strong>disc_attach</strong></td><td>Yes</td></tr><tr><td><strong>undertaking</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-10-20 10:48:33'),
(65, 'tbl_lump_sum_grant', 4, 'update', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Abdul</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>3</td><td><strong>tbl_grantee_type_id</strong></td><td>1</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>1223312</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2000-01-04</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2029-10-16</td><td><strong>los</strong></td><td>29 year(s) 9 month(s) 19 and day(s)</td><td><strong>dept_letter_no</strong></td><td>242424</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2021-10-20</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>499000</td><td><strong>succession</strong></td><td>test succession description</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>1419123654798</td><td><strong>bank_verification</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>cnic_widow_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>Yes</td></tr><tr><td><strong>family_attach</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dob_ac_attach</strong></td><td>Yes</td></tr><tr><td><strong>single_widow_attach</strong></td><td>Yes</td><td><strong>no_marriage_attach</strong></td><td>Yes</td><td><strong>disc_attach</strong></td><td>Yes</td></tr><tr><td><strong>undertaking</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>Yes</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-10-20 11:35:01'),
(66, 'tbl_lump_sum_grant', 4, 'update', '<tr><td><strong>Employee ID</strong></td><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Abdul</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>3</td><td><strong>tbl_grantee_type_id</strong></td><td>1</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>111111111</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2000-01-04</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2029-10-16</td><td><strong>los</strong></td><td>29 year(s) 9 month(s) 19 and day(s)</td><td><strong>dept_letter_no</strong></td><td>242424</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-10-20</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>10000</td></tr><tr><td><strong>net amount</strong></td><td>490000</td><td><strong>succession</strong></td><td>test succession description</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>1419123654798</td><td><strong>bank_verification</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>Yes</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>cnic_widow_attach</strong></td><td>Yes</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>Yes</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dob_ac_attach</strong></td><td>Yes</td></tr><tr><td><strong>single_widow_attach</strong></td><td>Yes</td><td><strong>no_marriage_attach</strong></td><td>Yes</td><td><strong>disc_attach</strong></td><td>Yes</td></tr><tr><td><strong>undertaking</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>Yes</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-10-20 11:35:37'),
(67, 'tbl_interest_free_loan', 3, 'add', '<tr><td><strong>tbl_emp_info_id</strong></td><td>2</td><td><strong>pay_scale</strong></td><td>BS-02</td><td><strong>pay_scale_id</strong></td><td>2</td></tr><tr><td><strong>dao</strong></td><td></td><td><strong>ddo_code</strong></td><td>234234</td><td><strong>ddo_address</strong></td><td>test street</td></tr><tr><td><strong>marital_status</strong></td><td>married</td><td><strong>personnel_no</strong></td><td>123654789</td><td><strong>tbl_loan_type_id</strong></td><td>1</td></tr><tr><td><strong>grantee_name</strong></td><td>Asif</td><td><strong>father_name</strong></td><td>Raza Khan</td><td><strong>cnic_no</strong></td><td>1540279479435</td></tr><td><strong>office_address</strong></td><td>Malakand</td><td><strong>tbl_department_id</strong></td><td>Department of Computer Science</td><td><strong>tbl_post_id</strong></td><td>1</td></tr><td><strong>tbl_district_id</strong></td><td>2</td><td><strong>dob</strong></td><td>2020-08-31</td><td><strong>doa</strong></td><td>2010-02-02</td></tr><td><strong>dor</strong></td><td>2030-06-12</td><td><strong>los</strong></td><td>20 year(s) 4 month(s) 13 and day(s)</td><td><strong>grant_amount</strong></td><td>8000</td></tr><td><strong>deduction</strong></td><td>1000</td><td><strong>net_amount</strong></td><td>7000</td><td><strong>present_add</strong></td><td>Malakand Division</td></tr><td><strong>permanent_add</strong></td><td>test</td><td><strong>duty_place</strong></td><td>test</td><td><strong>contact_no</strong></td><td>03459270525</td></tr><td><strong>applicant_sign</strong></td><td>test</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1419123654789</td></tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>hod_attached</strong></td><td>Yes</td><td><strong>dc_admin</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-10-20 12:10:36'),
(68, 'tbl_interest_free_loan', 4, 'add', '<tr><td><strong>tbl_emp_info_id</strong></td><td>1</td><td><strong>pay_scale</strong></td><td>BS-01</td><td><strong>pay_scale_id</strong></td><td>1</td></tr><tr><td><strong>dao</strong></td><td></td><td><strong>ddo_code</strong></td><td>test</td><td><strong>ddo_address</strong></td><td>test</td></tr><tr><td><strong>marital_status</strong></td><td>married</td><td><strong>personnel_no</strong></td><td>asdasd</td><td><strong>tbl_loan_type_id</strong></td><td>1</td></tr><tr><td><strong>grantee_name</strong></td><td>awais</td><td><strong>father_name</strong></td><td>khan</td><td><strong>cnic_no</strong></td><td>1111111111111</td></tr><td><strong>office_address</strong></td><td>asdas</td><td><strong>tbl_department_id</strong></td><td>Department of Computer Science</td><td><strong>tbl_post_id</strong></td><td>1</td></tr><td><strong>tbl_district_id</strong></td><td>2</td><td><strong>dob</strong></td><td>2020-08-19</td><td><strong>doa</strong></td><td>2010-05-13</td></tr><td><strong>dor</strong></td><td>2031-01-27</td><td><strong>los</strong></td><td>20 year(s) 8 month(s) 20 and day(s)</td><td><strong>grant_amount</strong></td><td>8000</td></tr><td><strong>deduction</strong></td><td>100</td><td><strong>net_amount</strong></td><td>7900</td><td><strong>present_add</strong></td><td>test</td></tr><td><strong>permanent_add</strong></td><td>test</td><td><strong>duty_place</strong></td><td>test</td><td><strong>contact_no</strong></td><td>1111111111111</td></tr><td><strong>applicant_sign</strong></td><td>test</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>1419123654789</td></tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-10-20 12:14:01'),
(69, 'tbl_emp_info', 4, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Shahab Hussain</td><td><strong>Father Name</strong></td><td>Hussain Ali</td><td><strong>Contact No</strong></td><td>03459270525</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540279479435</td><td><strong>Date Of Birth</strong></td><td>18-06-1986</td></tr><tr><td><strong>Personnel No</strong></td><td>2575525</td><td><strong>District</strong></td><td>Malakand</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Post</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td></tr><tr><td><strong>Office Address</strong></td><td>Test address is here</td><td><strong>Other Address</strong></td><td>other address goes here</td></tr>', 10, '2020-11-04 12:19:33'),
(70, 'tbl_scholaarship_grant', 8, 'add', '<tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Akif Shahab</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>2020</td><td><strong>Result date</strong></td><td>2020-02-04</td></tr><tr><td><strong>Marks Obtained</strong></td><td>850</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>77.27</td></tr><tr><td><strong>Institute name</strong></td><td>Govt High School no 1</td><td><strong>institute address</strong></td><td>College Road Thana Bazar</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><td><strong>deduction</strong></td><td>100</td><td><strong>net amount</strong></td><td>15900</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>14196543214653</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>Yes</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 10, '2020-11-04 12:49:02'),
(71, 'tbl_funeral_grant', 5, 'add', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>234234234</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2011-02-01</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Xyz khan</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2030-11-13</td><td><strong>los</strong></td><td>19 year(s) 9 month(s) 16 and day(s)</td><td><strong>dept_letter_no</strong></td><td>234234234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-02</td><td><strong>grant_amount</strong></td><td>10000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>10000</td><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>564631654</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-11-10 16:06:09'),
(72, 'tbl_scholaarship_grant', 9, 'add', '<tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-11-17</td></tr><tr><td><strong>Marks Obtained</strong></td><td>345</td><td><strong>Total Marks</strong></td><td>543</td><td><strong>Percentage</strong></td><td>63.54</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>343534535354</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 1, '2020-11-11 08:58:47'),
(73, 'tbl_scholaarship_grant', 10, 'add', '<tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-12-01</td></tr><tr><td><strong>Marks Obtained</strong></td><td>234</td><td><strong>Total Marks</strong></td><td>432</td><td><strong>Percentage</strong></td><td>54.17</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>234234324324</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 1, '2020-11-11 09:01:58'),
(74, 'tbl_scholaarship_grant', 11, 'add', '<tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-11-24</td></tr><tr><td><strong>Marks Obtained</strong></td><td>234</td><td><strong>Total Marks</strong></td><td>554</td><td><strong>Percentage</strong></td><td>42.24</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2342342342</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 1, '2020-11-11 10:15:53'),
(75, 'tbl_scholaarship_grant', 12, 'add', '<tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-11-09</td></tr><tr><td><strong>Marks Obtained</strong></td><td>232</td><td><strong>Total Marks</strong></td><td>423</td><td><strong>Percentage</strong></td><td>54.85</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>24234234234</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 1, '2020-11-11 10:52:43'),
(76, 'tbl_interest_free_loan', 11, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000008</td></tr><tr><td><strong>Employee ID</strong></td><td>4</td><td><strong>Pay Scale</strong></td><td>BS-16</td><td><strong>Pay Scale ID</strong></td><td>16</td></tr><tr><td><strong>Date of appointment</strong></td><td></td><td><strong>DDO Code</strong></td><td>test</td><td><strong>DDO Address</strong></td><td>test</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>Personnel No</strong></td><td>2575525</td><td><strong>Loan Type</strong></td><td>House Building Advance</td></tr><tr><td><strong>Grantee Name</strong></td><td>Shahab Hussain</td><td><strong>Father Name</strong></td><td>Hussain Ali</td><td><strong>CNIC</strong></td><td>1540279479435</td></tr><td><strong>Office Address</strong></td><td>Test address is here</td><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Post Scale</strong></td><td>BS-02</td></tr><td><strong>District</strong></td><td>Malakand</td><td><strong>Date of Birth</strong></td><td>1986-06-18</td><td><strong>Date of Appointment</strong></td><td>2006-06-05</td></tr><td><strong>Date of Retirement</strong></td><td>2031-06-18</td><td><strong>Length of Service</strong></td><td>25 year(s) 0 month(s) 19 and day(s)</td><td><strong>Grant Amount</strong></td><td>250000</td></tr><td><strong>Deduction</strong></td><td>0</td><td><strong>Net Amount</strong></td><td>250000</td><td><strong>Present Address</strong></td><td>test street</td></tr><td><strong>Permanent Address</strong></td><td>test</td><td><strong>Duty Place</strong></td><td>test</td><td><strong>Contact No</strong></td><td>03459270525</td></tr><td><strong>Applicant Sign</strong></td><td>test</td><td><strong>Bank Branch</strong></td><td>2</td><td><strong>account_no</strong></td><td>234234234</td></tr><td><strong>tbl_case_status_id</strong></td><td>2</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-11-11 11:51:23'),
(77, 'tbl_scholaarship_grant', 13, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000009</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Ali</td></tr><tr><td><strong>Class pass</strong></td><td>1</td><td><strong>Exam pass</strong></td><td>Science</td><td><strong>Result date</strong></td><td>2020-11-17</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Thana</td><td><strong>grant amount</strong></td><td>16000.00</td></tr><tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>16000.00</td><td><strong>tbl_case_status_id</strong></td><td></td></tr><tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>225546654</td></tr><tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td></td></tr><tr><td><strong>head_institute</strong></td><td></td><td><strong>office_seal_hod</strong></td><td></td><td><strong>hod_sign</strong></td><td></td></tr><tr><td><strong>bank_verification</strong></td><td></td><td><strong>Pay Roll</strong></td><td>Yes</td><td><strong>DMC attach</strong></td><td>Yes</td></tr><tr><td><strong>cnic attach</strong></td><td>Yes</td><td><strong>grade attach</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr>', 1, '2020-11-16 04:48:42'),
(78, 'tbl_scholaarship_grant', 14, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000010</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Ali</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>Science</td><td><strong>Result date</strong></td><td>2020-11-23</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Thana</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td></td></tr><tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>1</td><td><strong>account_no</strong></td><td>3165415413232</td></tr><tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td></td></tr><tr><td><strong>head_institute</strong></td><td></td><td><strong>office_seal_hod</strong></td><td></td><td><strong>hod_sign</strong></td><td></td></tr><tr><td><strong>bank_verification</strong></td><td></td><td><strong>Pay Roll</strong></td><td>Yes</td><td><strong>DMC attach</strong></td><td>Yes</td></tr><tr><td><strong>cnic attach</strong></td><td>Yes</td><td><strong>grade attach</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr>', 1, '2020-11-16 05:41:21');
INSERT INTO `tbl_logger` (`id`, `tbl_name`, `tbl_name_id`, `action_type`, `detail`, `record_add_by`, `record_add_date`) VALUES
(79, 'tbl_scholaarship_grant', 15, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000011</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>3</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-11-09</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>950</td><td><strong>Percentage</strong></td><td>60.11</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>48000.00</td></tr><tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>48000.00</td><td><strong>tbl_case_status_id</strong></td><td></td></tr><tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>23423424234</td></tr><tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td></td></tr><tr><td><strong>head_institute</strong></td><td></td><td><strong>office_seal_hod</strong></td><td></td><td><strong>hod_sign</strong></td><td></td></tr><tr><td><strong>bank_verification</strong></td><td></td><td><strong>Pay Roll</strong></td><td>Yes</td><td><strong>DMC attach</strong></td><td>Yes</td></tr><tr><td><strong>cnic attach</strong></td><td>Yes</td><td><strong>grade attach</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr>', 1, '2020-11-16 07:06:23'),
(80, 'tbl_scholaarship_grant', 19, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000015</td></tr><tr><td><strong>Department</strong></td><td>Department of Food</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>2</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-11-23</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>1000</td><td><strong>Percentage</strong></td><td>57.10</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td></td></tr><tr><td><strong>deduction</strong></td><td></td><td><strong>net amount</strong></td><td></td><td><strong>tbl_case_status_id</strong></td><td></td></tr><tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>1</td><td><strong>account_no</strong></td><td>2423424234</td></tr><tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td></td></tr><tr><td><strong>head_institute</strong></td><td></td><td><strong>office_seal_hod</strong></td><td></td><td><strong>hod_sign</strong></td><td></td></tr><tr><td><strong>bank_verification</strong></td><td></td><td><strong>Pay Roll</strong></td><td>Yes</td><td><strong>DMC attach</strong></td><td>Yes</td></tr><tr><td><strong>cnic attach</strong></td><td>Yes</td><td><strong>grade attach</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr>', NULL, '2020-11-17 10:36:06'),
(81, 'tbl_emp_info', 5, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Irfan</td><td><strong>Father Name</strong></td><td>Raza</td><td><strong>Contact No</strong></td><td>034559887622</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540298749879</td><td><strong>Date Of Birth</strong></td><td>17-06-1980</td></tr><tr><td><strong>Personnel No</strong></td><td>100225</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Sports & Tourism</td><td><strong>Post</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td></tr><tr><td><strong>Office Address</strong></td><td>This is test office address</td><td><strong>Other Address</strong></td><td>This is test other address</td></tr>', 1, '2020-11-17 11:06:16'),
(82, 'tbl_scholaarship_grant', 20, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000016</td></tr><tr><td><strong>Department</strong></td><td>Department of Sports & Tourism</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Asad</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>Science</td><td><strong>Result date</strong></td><td>2020-11-17</td></tr><tr><td><strong>Marks Obtained</strong></td><td>571</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>67.18</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Test inst Address</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>1000</td><td><strong>net amount</strong></td><td>39000</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>79065465466</td></tr><td><strong>std_signature</strong></td><td>Yes</td><td><strong>gov_servent_sign</strong></td><td>Yes</td><td><strong>seal_institute</strong></td><td>Yes</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>Yes</td><td><strong>hod_sign</strong></td><td>Yes</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dmc_attach</strong></td><td>Yes</td></tr><td><strong>cnic_attach</strong></td><td>Yes</td><td><strong>grade_attach</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>5</td></tr>', 1, '2020-11-17 11:13:56'),
(83, 'tbl_lump_sum_grant', 5, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000017</td></tr><tr><td><strong>Employee ID</strong></td><td>5</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Raza</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>3</td><td><strong>tbl_grantee_type_id</strong></td><td>1</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>123654</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2010-02-02</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2032-10-12</td><td><strong>los</strong></td><td>22 year(s) 8 month(s) 14 and day(s)</td><td><strong>dept_letter_no</strong></td><td>559904</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-11-17</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>499000</td><td><strong>succession</strong></td><td>This is test succession</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>1</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>354313213215</td><td><strong>bank_verification</strong></td><td>Yes</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>Yes</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>Yes</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>Yes</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>Yes</td><td><strong>dob_ac_attach</strong></td><td>Yes</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>Yes</td><td><strong>boards_approval</strong></td><td>1</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-11-17 11:16:56'),
(84, 'tbl_emp_info', 6, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Dawood</td><td><strong>Father Name</strong></td><td>Raza</td><td><strong>Contact No</strong></td><td>5464654466</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>5154027955986</td><td><strong>Date Of Birth</strong></td><td>17-11-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>2020</td><td><strong>District</strong></td><td>Peshawar</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Post</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td></tr><tr><td><strong>Office Address</strong></td><td>test office address</td><td><strong>Other Address</strong></td><td>test other address</td></tr>', 13, '2020-11-17 11:31:44'),
(85, 'tbl_district', 4, 'add', '<tr><td><strong>District Name</strong></td><td>Bannu</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:58:30'),
(86, 'tbl_district', 5, 'add', '<tr><td><strong>District Name</strong></td><td>Lakki Marwat</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:58:42'),
(87, 'tbl_district', 6, 'add', '<tr><td><strong>District Name</strong></td><td>Dera Ismail Khan</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:58:51'),
(88, 'tbl_district', 7, 'add', '<tr><td><strong>District Name</strong></td><td>Tank</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:01'),
(89, 'tbl_district', 8, 'add', '<tr><td><strong>District Name</strong></td><td>Abbottabad</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:13'),
(90, 'tbl_district', 9, 'add', '<tr><td><strong>District Name</strong></td><td>Batagram</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:23'),
(91, 'tbl_district', 10, 'add', '<tr><td><strong>District Name</strong></td><td>Haripur</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:32'),
(92, 'tbl_district', 11, 'add', '<tr><td><strong>District Name</strong></td><td>Mansehra</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:42'),
(93, 'tbl_district', 12, 'add', '<tr><td><strong>District Name</strong></td><td>Hangu</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 12:59:54'),
(94, 'tbl_district', 13, 'add', '<tr><td><strong>District Name</strong></td><td>Karak</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:03'),
(95, 'tbl_district', 14, 'add', '<tr><td><strong>District Name</strong></td><td>Kohat</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:12'),
(96, 'tbl_district', 15, 'add', '<tr><td><strong>District Name</strong></td><td>Buner</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:22'),
(97, 'tbl_district', 16, 'add', '<tr><td><strong>District Name</strong></td><td>Chitral</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:31'),
(98, 'tbl_district', 17, 'add', '<tr><td><strong>District Name</strong></td><td>Lower Dir</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:40'),
(99, 'tbl_district', 18, 'add', '<tr><td><strong>District Name</strong></td><td>Shangla</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:00:49'),
(100, 'tbl_district', 19, 'add', '<tr><td><strong>District Name</strong></td><td>Swat</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:01:14'),
(101, 'tbl_district', 20, 'add', '<tr><td><strong>District Name</strong></td><td>Upper Dir</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:01:33'),
(102, 'tbl_district', 21, 'add', '<tr><td><strong>District Name</strong></td><td>Swabi</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:02:29'),
(103, 'tbl_district', 22, 'add', '<tr><td><strong>District Name</strong></td><td>Charsadda</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:02:56'),
(104, 'tbl_district', 23, 'add', '<tr><td><strong>District Name</strong></td><td>Nowshera</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:03:10'),
(105, 'tbl_district', 24, 'add', '<tr><td><strong>District Name</strong></td><td>Kohistan</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-19 13:06:05'),
(106, 'tbl_scholaarship_grant', 21, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000018</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>Dawood</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>Annual</td><td><strong>Result date</strong></td><td>2020-11-25</td></tr><tr><td><strong>Marks Obtained</strong></td><td>890</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>80.91</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Thana</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000</td><td><strong>tbl_case_status_id</strong></td><td>1</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>516545165465</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>6</td></tr>', 1, '2020-11-22 19:36:32'),
(107, 'tbl_scholaarship_grant', 22, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000019</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>2020</td><td><strong>Result date</strong></td><td>2020-11-11</td></tr><tr><td><strong>Marks Obtained</strong></td><td>850</td><td><strong>Total Marks</strong></td><td>1100</td><td><strong>Percentage</strong></td><td>77.27</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>2</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>3216431646161</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>6</td></tr>', 1, '2020-11-22 19:55:15'),
(108, 'tbl_case_status', 3, 'add', '<tr><td><strong>Case Status Name</strong></td><td>In Process</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-25 04:33:00'),
(109, 'tbl_case_status', 4, 'add', '<tr><td><strong>Case Status Name</strong></td><td>Approved</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-25 04:33:19'),
(110, 'tbl_case_status', 5, 'add', '<tr><td><strong>Case Status Name</strong></td><td>Rejected</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-25 04:33:39'),
(111, 'tbl_case_status', 6, 'add', '<tr><td><strong>Case Status Name</strong></td><td>Cancelled</td><td><strong>Status</strong></td><td>Active</td></tr>', 1, '2020-11-25 04:33:48'),
(112, 'tbl_scholaarship_grant', 23, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000020</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Adnan Khan</td></tr><tr><td><strong>Class pass</strong></td><td>2</td><td><strong>Exam pass</strong></td><td>Science</td><td><strong>Result date</strong></td><td>2020-11-30</td></tr><tr><td><strong>Marks Obtained</strong></td><td>580</td><td><strong>Total Marks</strong></td><td>850</td><td><strong>Percentage</strong></td><td>68.24</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>test address</td><td><strong>grant amount</strong></td><td>32000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>32000</td><td><strong>tbl_case_status_id</strong></td><td>3</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>316543154555</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>6</td></tr>', 1, '2020-11-25 10:10:04'),
(113, 'tbl_retirement_grant', 6, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000021</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>5165432165</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2020-11-17</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-12-04</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 17 and day(s)</td><td><strong>dept_letter_no</strong></td><td>1513132</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-11-17</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>165431016</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-11-25 10:15:45'),
(114, 'tbl_funeral_grant', 6, 'add', '<tr><td><strong>Employee ID</strong></td><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>321543231</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2020-11-01</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-11-30</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 29 and day(s)</td><td><strong>dept_letter_no</strong></td><td>203135132</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-08</td><td><strong>grant_amount</strong></td><td>10000</td><td><strong>deduction</strong></td><td>1000</td></tr><tr><td><strong>net amount</strong></td><td>9000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>24234234324</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-11-25 10:17:00'),
(115, 'tbl_interest_free_loan', 12, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000023</td></tr><tr><td><strong>Employee ID</strong></td><td>3</td><td><strong>Pay Scale</strong></td><td>BS-16</td><td><strong>Pay Scale ID</strong></td><td>16</td></tr><tr><td><strong>Date of appointment</strong></td><td></td><td><strong>DDO Code</strong></td><td>324234</td><td><strong>DDO Address</strong></td><td>test</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>Personnel No</strong></td><td>321654</td><td><strong>Loan Type</strong></td><td>Bicycle Advance</td></tr><tr><td><strong>Grantee Name</strong></td><td>Ali Muhammad</td><td><strong>Father Name</strong></td><td>Ali Khan</td><td><strong>CNIC</strong></td><td>1540279864425</td></tr><td><strong>Office Address</strong></td><td>This is test address</td><td><strong>Department</strong></td><td>Department of Agriculture</td><td><strong>Post Scale</strong></td><td>BS-02</td></tr><td><strong>District</strong></td><td>Peshawar</td><td><strong>Date of Birth</strong></td><td>1996-06-12</td><td><strong>Date of Appointment</strong></td><td>2020-11-01</td></tr><td><strong>Date of Retirement</strong></td><td>2024-11-13</td><td><strong>Length of Service</strong></td><td>4 year(s) 0 month(s) 13 and day(s)</td><td><strong>Grant Amount</strong></td><td>8000</td></tr><td><strong>Deduction</strong></td><td>0</td><td><strong>Net Amount</strong></td><td>8000</td><td><strong>Present Address</strong></td><td>Test Name</td></tr><td><strong>Permanent Address</strong></td><td>test</td><td><strong>Duty Place</strong></td><td>test</td><td><strong>Contact No</strong></td><td>35465432156</td></tr><td><strong>Applicant Sign</strong></td><td>test</td><td><strong>Bank Branch</strong></td><td>2</td><td><strong>account_no</strong></td><td>2424234</td></tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-11-25 10:42:30'),
(116, 'tbl_interest_free_loan', 13, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000024</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td><strong>Pay Scale</strong></td><td>BS-16</td><td><strong>Pay Scale ID</strong></td><td>16</td></tr><tr><td><strong>Date of appointment</strong></td><td></td><td><strong>DDO Code</strong></td><td>234</td><td><strong>DDO Address</strong></td><td>test</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>Personnel No</strong></td><td>2020</td><td><strong>Loan Type</strong></td><td>Motorcycle Advance</td></tr><tr><td><strong>Grantee Name</strong></td><td>Dawood</td><td><strong>Father Name</strong></td><td>Raza</td><td><strong>CNIC</strong></td><td>5154027955986</td></tr><td><strong>Office Address</strong></td><td>test office address</td><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Post Scale</strong></td><td>BS-02</td></tr><td><strong>District</strong></td><td>Peshawar</td><td><strong>Date of Birth</strong></td><td>2020-11-17</td><td><strong>Date of Appointment</strong></td><td>2014-06-10</td></tr><td><strong>Date of Retirement</strong></td><td>2027-10-05</td><td><strong>Length of Service</strong></td><td>13 year(s) 3 month(s) 28 and day(s)</td><td><strong>Grant Amount</strong></td><td>80000</td></tr><td><strong>Deduction</strong></td><td>0</td><td><strong>Net Amount</strong></td><td>80000</td><td><strong>Present Address</strong></td><td>test</td></tr><td><strong>Permanent Address</strong></td><td>test</td><td><strong>Duty Place</strong></td><td>test</td><td><strong>Contact No</strong></td><td>5464654466</td></tr><td><strong>Applicant Sign</strong></td><td>test</td><td><strong>Bank Branch</strong></td><td>2</td><td><strong>account_no</strong></td><td>234234234</td></tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 1, '2020-11-25 11:07:32'),
(117, 'tbl_lump_sum_grant', 6, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000025</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>test</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>3</td><td><strong>tbl_grantee_type_id</strong></td><td>1</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>231313</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2020-11-01</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-12-12</td><td><strong>los</strong></td><td>0 year(s) 1 month(s) 10 and day(s)</td><td><strong>dept_letter_no</strong></td><td>test</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-11-25</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>succession</strong></td><td>test</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>23423424243</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 1, '2020-11-25 11:12:00'),
(118, 'tbl_scholaarship_grant', 24, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000027</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-12-22</td></tr><tr><td><strong>Marks Obtained</strong></td><td>234</td><td><strong>Total Marks</strong></td><td>532</td><td><strong>Percentage</strong></td><td>43.98</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>3</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2342424234</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>6</td></tr>', 1, '2020-12-08 16:25:56'),
(119, 'tbl_retirement_grant', 7, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000028</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>313</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2012-01-31</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2037-09-14</td><td><strong>los</strong></td><td>25 year(s) 7 month(s) 20 and day(s)</td><td><strong>dept_letter_no</strong></td><td>2424234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-30</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>4</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>32234234234234</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 1, '2020-12-09 11:00:33'),
(120, 'tbl_scholaarship_grant', 25, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000029</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-12-07</td></tr><tr><td><strong>Marks Obtained</strong></td><td>543</td><td><strong>Total Marks</strong></td><td>643</td><td><strong>Percentage</strong></td><td>84.45</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>3</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>1</td><td><strong>account_no</strong></td><td>2312313212</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>6</td></tr>', 1, '2020-12-10 00:48:28'),
(121, 'tbl_retirement_grant', 8, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000030</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>23234234</td><td><strong>record_no_year</strong></td><td>2342</td><td><strong>Date of appointment </strong></td><td>2020-12-10</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2021-01-08</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 29 and day(s)</td><td><strong>dept_letter_no</strong></td><td>23423</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-23</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>1</td><td><strong>account_no</strong></td><td>234234324</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 13, '2020-12-10 00:49:45'),
(122, 'tbl_retirement_grant', 9, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000031</td></tr><tr><td><strong>Employee ID</strong></td><td>6</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>3223424324</td><td><strong>record_no_year</strong></td><td>2121</td><td><strong>Date of appointment </strong></td><td>2020-12-10</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2021-01-07</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 28 and day(s)</td><td><strong>dept_letter_no</strong></td><td>24324234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-29</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2423423423</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 13, '2020-12-10 00:58:04'),
(123, 'tbl_emp_info', 7, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Ahmad</td><td><strong>Father Name</strong></td><td>Ali</td><td><strong>Contact No</strong></td><td>216354321351</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1540298765432</td><td><strong>Date Of Birth</strong></td><td>13-12-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>23546321</td><td><strong>District</strong></td><td>Malakand</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Zakat & Ushr</td><td><strong>Post</strong></td><td>Computer Operator</td><td><strong>Pay Scale</strong></td><td>BS-16</td></tr><tr><td><strong>Office Address</strong></td><td>This is test office address</td><td><strong>Other Address</strong></td><td>this is test other address</td></tr>', 11, '2020-12-13 15:52:04'),
(124, 'tbl_scholaarship_grant', 26, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000032</td></tr><tr><td><strong>Department</strong></td><td>Department of Zakat & Ushr</td><td><strong>Duty place</strong></td><td>test</td><td><strong>std name</strong></td><td>test</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>test</td><td><strong>Result date</strong></td><td>2020-12-29</td></tr><tr><td><strong>Marks Obtained</strong></td><td>546</td><td><strong>Total Marks</strong></td><td>643</td><td><strong>Percentage</strong></td><td>84.91</td></tr><tr><td><strong>Institute name</strong></td><td>test</td><td><strong>institute address</strong></td><td>test</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>3</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>34234234324</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>7</td></tr>', 11, '2020-12-13 16:22:47'),
(125, 'tbl_retirement_grant', 10, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000033</td></tr><tr><td><strong>Employee ID</strong></td><td>7</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>23423424</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2020-12-13</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-12-30</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 17 and day(s)</td><td><strong>dept_letter_no</strong></td><td>234234234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-31</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>2342424234342</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 11, '2020-12-13 16:31:02'),
(126, 'tbl_interest_free_loan', 14, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000034</td></tr><tr><td><strong>Employee ID</strong></td><td>7</td><td><strong>Pay Scale</strong></td><td>BS-16</td><td><strong>Pay Scale ID</strong></td><td>16</td></tr><tr><td><strong>Date of appointment</strong></td><td></td><td><strong>DDO Code</strong></td><td>2342</td><td><strong>DDO Address</strong></td><td>test</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>Personnel No</strong></td><td>23546321</td><td><strong>Loan Type</strong></td><td>House Building Advance</td></tr><tr><td><strong>Grantee Name</strong></td><td>Ahmad</td><td><strong>Father Name</strong></td><td>Ali</td><td><strong>CNIC</strong></td><td>1540298765432</td></tr><td><strong>Office Address</strong></td><td>This is test office address</td><td><strong>Department</strong></td><td>Department of Zakat & Ushr</td><td><strong>Post Scale</strong></td><td>BS-02</td></tr><td><strong>District</strong></td><td>Malakand</td><td><strong>Date of Birth</strong></td><td>2020-12-13</td><td><strong>Date of Appointment</strong></td><td>2004-09-06</td></tr><td><strong>Date of Retirement</strong></td><td>2034-10-17</td><td><strong>Length of Service</strong></td><td>30 year(s) 1 month(s) 17 and day(s)</td><td><strong>Grant Amount</strong></td><td>250000</td></tr><td><strong>Deduction</strong></td><td>0</td><td><strong>Net Amount</strong></td><td>250000</td><td><strong>Present Address</strong></td><td>test</td></tr><td><strong>Permanent Address</strong></td><td>test</td><td><strong>Duty Place</strong></td><td>test</td><td><strong>Contact No</strong></td><td>216354321351</td></tr><td><strong>Applicant Sign</strong></td><td>test</td><td><strong>Bank Branch</strong></td><td>2</td><td><strong>account_no</strong></td><td>2342432423</td></tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 11, '2020-12-13 16:45:55');
INSERT INTO `tbl_logger` (`id`, `tbl_name`, `tbl_name_id`, `action_type`, `detail`, `record_add_by`, `record_add_date`) VALUES
(127, 'tbl_lump_sum_grant', 7, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000035</td></tr><tr><td><strong>Employee ID</strong></td><td>7</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>test</td><td><strong>Wife Name</strong></td><td>2</td><td><strong>Son Name</strong></td><td>2</td></tr><tr><td><strong>Daughter Name</strong></td><td>2</td><td><strong>tbl_grantee_type_id</strong></td><td>2</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>232342342</td><td><strong>Record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2007-01-30</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2034-11-15</td><td><strong>los</strong></td><td>27 year(s) 9 month(s) 22 and day(s)</td><td><strong>dept_letter_no</strong></td><td>234234234</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-30</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>succession</strong></td><td>test</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>2323423422</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 11, '2020-12-13 16:53:38'),
(128, 'tbl_scholaarship_grant', 1, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000001</td></tr><tr><td><strong>Department</strong></td><td>Department of Transport</td><td><strong>Duty place</strong></td><td>Malakand</td><td><strong>std name</strong></td><td>Muhammad Bilal</td></tr><tr><td><strong>Class pass</strong></td><td>4</td><td><strong>Exam pass</strong></td><td>Science</td><td><strong>Result date</strong></td><td>2020-12-29</td></tr><tr><td><strong>Marks Obtained</strong></td><td>850</td><td><strong>Total Marks</strong></td><td>1050</td><td><strong>Percentage</strong></td><td>80.95</td></tr><tr><td><strong>Institute name</strong></td><td>Lalazar</td><td><strong>institute address</strong></td><td>Thana Malakand</td><td><strong>grant amount</strong></td><td>40000.00</td></tr><td><strong>deduction</strong></td><td>0</td><td><strong>net amount</strong></td><td>40000.00</td><td><strong>tbl_case_status_id</strong></td><td>3</td></tr><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>793132123123</td></tr><td><strong>std_signature</strong></td><td>No</td><td><strong>gov_servent_sign</strong></td><td>No</td><td><strong>seal_institute</strong></td><td>No</td></tr><td><strong>head_institute</strong></td><td>No</td><td><strong>office_seal_hod</strong></td><td>No</td><td><strong>hod_sign</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dmc_attach</strong></td><td>No</td></tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>grade_attach</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td></tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>ac_edit</strong></td><td></td></tr><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td><td><strong>employee ID</strong></td><td>4</td></tr>', 10, '2020-12-21 00:09:24'),
(129, 'tbl_retirement_grant', 1, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000002</td></tr><tr><td><strong>Employee ID</strong></td><td>4</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>5100122</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2003-12-29</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2015-06-21</td><td><strong>los</strong></td><td>11 year(s) 5 month(s) 24 and day(s)</td><td><strong>dept_letter_no</strong></td><td>221313</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-21</td><td><strong>grant_amount</strong></td><td>55000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>55000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>43242423422</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td>No</td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>ppo_attach</strong></td><td>No</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 10, '2020-12-21 00:13:57'),
(130, 'tbl_emp_info', 8, 'add', '<tr><td><strong>Grantee Name</strong></td><td>Zahid Hussain</td><td><strong>Father Name</strong></td><td>Shahid Hussain</td><td><strong>Contact No</strong></td><td>033312365478</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>CNIC No</strong></td><td>1544022344278</td><td><strong>Date Of Birth</strong></td><td>21-12-2020</td></tr><tr><td><strong>Personnel No</strong></td><td>23322211</td><td><strong>District</strong></td><td>Malakand</td><td><strong>Status</strong></td><td>Active</td></tr><tr><td><strong>Department</strong></td><td>Department of Zakat & Ushr</td><td><strong>Post</strong></td><td>Nayib Qasid</td><td><strong>Pay Scale</strong></td><td>BS-01</td></tr><tr><td><strong>Office Address</strong></td><td>This is test address</td><td><strong>Other Address</strong></td><td>This is other address</td></tr>', 10, '2020-12-21 00:28:59'),
(131, 'tbl_funeral_grant', 1, 'add', '<tr><td><strong>Employee ID</strong></td><td>8</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Record no</strong></td><td>24323222</td><td><strong>record_no_year</strong></td><td>2020</td><td><strong>Date of appointment </strong></td><td>2001-01-30</td></tr><tr><td colspan=\"3\"><strong>name deceased</strong></td><td>Ali</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2012-01-31</td><td><strong>los</strong></td><td>11 year(s) 0 month(s) 3 and day(s)</td><td><strong>dept_letter_no</strong></td><td>2322456</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-21</td><td><strong>grant_amount</strong></td><td>6000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>6000</td><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td></tr><tr><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td><td><strong>account_no</strong></td><td>24324232211</td><td><strong>bank_verification</strong></td><td>No</td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>payroll_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td><td><strong>retirement_attach</strong></td><td></td></tr><tr><td><strong>bf_contribution_attach</strong></td><td>No</td><td><strong>cnic_attach</strong></td><td>No</td><td><strong>&nbsp;</strong></td><td>&nbsp;</td></tr><tr><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td><td><strong>sent_to_secretary</strong></td><td></td></tr><tr><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td><td><strong>feedback_website</strong></td><td></td></tr>', 10, '2020-12-21 00:31:46'),
(132, 'tbl_interest_free_loan', 1, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000004</td></tr><tr><td><strong>Employee ID</strong></td><td>8</td><td><strong>Pay Scale</strong></td><td>BS-01</td><td><strong>Pay Scale ID</strong></td><td>1</td></tr><tr><td><strong>Date of appointment</strong></td><td></td><td><strong>DDO Code</strong></td><td>2342223</td><td><strong>DDO Address</strong></td><td>Batkhela Malakand</td></tr><tr><td><strong>Marital Status</strong></td><td>married</td><td><strong>Personnel No</strong></td><td>23322211</td><td><strong>Loan Type</strong></td><td>House Building Advance</td></tr><tr><td><strong>Grantee Name</strong></td><td>Zahid Hussain</td><td><strong>Father Name</strong></td><td>Shahid Hussain</td><td><strong>CNIC</strong></td><td>1544022344278</td></tr><td><strong>Office Address</strong></td><td>This is test address</td><td><strong>Department</strong></td><td>Department of Zakat & Ushr</td><td><strong>Post Scale</strong></td><td>BS-01</td></tr><td><strong>District</strong></td><td>Malakand</td><td><strong>Date of Birth</strong></td><td>2020-12-21</td><td><strong>Date of Appointment</strong></td><td>2003-06-10</td></tr><td><strong>Date of Retirement</strong></td><td>2035-10-16</td><td><strong>Length of Service</strong></td><td>32 year(s) 4 month(s) 14 and day(s)</td><td><strong>Grant Amount</strong></td><td>250000</td></tr><td><strong>Deduction</strong></td><td>0</td><td><strong>Net Amount</strong></td><td>250000</td><td><strong>Present Address</strong></td><td>test street</td></tr><td><strong>Permanent Address</strong></td><td>test permanent address</td><td><strong>Duty Place</strong></td><td>Malakand</td><td><strong>Contact No</strong></td><td>033312365478</td></tr><td><strong>Applicant Sign</strong></td><td>Zahid Khan</td><td><strong>Bank Branch</strong></td><td>2</td><td><strong>account_no</strong></td><td>32424324234</td></tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>hod_attached</strong></td><td>No</td><td><strong>dc_admin</strong></td><td>No</td></tr><td><strong>bank_verification</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>submit</strong></td><td>submit</td></tr>', 10, '2020-12-21 00:41:29'),
(133, 'tbl_lump_sum_grant', 1, 'add', '<tr><td><strong>Application Number</strong></td>\n                     <td colspan=\"5\">10000005</td></tr><tr><td><strong>Employee ID</strong></td><td>4</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><strong>Gov Emp Name</strong></td><td>Ali</td><td><strong>Wife Name</strong></td><td>1</td><td><strong>Son Name</strong></td><td>1</td></tr><tr><td><strong>Daughter Name</strong></td><td>1</td><td><strong>tbl_grantee_type_id</strong></td><td>2</td><td><strong></strong></td><td> </td></tr><tr><td><strong>Record no</strong></td><td>1313123</td><td><strong>Record_no_year</strong></td><td>1010</td><td><strong>Date of appointment </strong></td><td>2020-12-02</td></tr><tr><td><strong>Date of Retirement</strong></td><td>2020-12-30</td><td><strong>los</strong></td><td>0 year(s) 0 month(s) 28 and day(s)</td><td><strong>dept_letter_no</strong></td><td>243242432342</td></tr><tr><td><strong>dept_letter_no_date</strong></td><td>2020-12-30</td><td><strong>grant_amount</strong></td><td>500000</td><td><strong>deduction</strong></td><td>0</td></tr><tr><td><strong>net amount</strong></td><td>500000</td><td><strong>succession</strong></td><td>test succession</td><td><strong></strong></td><td></td></tr><tr><td><strong>tbl_case_status_id</strong></td><td>3</td><td><strong>tbl_payment_mode_id</strong></td><td>2</td><td><strong>tbl_list_bank_branches_id</strong></td><td>2</td></tr><tr><td><strong>account_no</strong></td><td>35324224367</td><td><strong>bank_verification</strong></td><td>No</td><td><strong></strong></td><td></td></tr><tr><td><strong>sign_of_applicant</strong></td><td>No</td><td><strong>s_n_office_dept_seal</strong></td><td>No</td><td><strong>s_n_dept_admin_seal</strong></td><td>No</td></tr><tr><td><strong>cnic_attach</strong></td><td>No</td><td><strong>cnic_widow_attach</strong></td><td>No</td><td><strong>dc_attach</strong></td><td>No</td></tr><tr><td><strong>family_attach</strong></td><td>No</td><td><strong>payroll_lpc_attach</strong></td><td>No</td><td><strong>dob_ac_attach</strong></td><td>No</td></tr><tr><td><strong>single_widow_attach</strong></td><td>No</td><td><strong>no_marriage_attach</strong></td><td>No</td><td><strong>disc_attach</strong></td><td>No</td></tr><tr><td><strong>undertaking</strong></td><td>No</td><td><strong>boards_approval</strong></td><td>0</td><td><strong>ac_edit</strong></td><td></td></tr><tr><td><strong>sent_to_secretary</strong></td><td></td><td><strong>approve_secretary</strong></td><td></td><td><strong>sent_to_bank</strong></td><td></td></tr><tr><td><strong>feedback_website</strong></td><td colspan=\"5\"></td></tr>', 10, '2020-12-21 01:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lump_sum_grant`
--

DROP TABLE IF EXISTS `tbl_lump_sum_grant`;
CREATE TABLE `tbl_lump_sum_grant` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `gov_emp_name` varchar(100) NOT NULL,
  `wife` int(11) NOT NULL,
  `son` int(11) NOT NULL,
  `daughter` int(11) NOT NULL,
  `tbl_grantee_type_id` int(11) NOT NULL,
  `record_no` varchar(45) NOT NULL,
  `record_no_year` varchar(45) NOT NULL,
  `doa` varchar(45) NOT NULL,
  `dor` varchar(45) NOT NULL,
  `los` varchar(255) NOT NULL,
  `dept_letter_no` varchar(45) NOT NULL,
  `dept_letter_no_date` varchar(100) NOT NULL,
  `grant_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) NOT NULL,
  `succession` varchar(255) NOT NULL DEFAULT 'no',
  `tbl_case_status_id` int(11) NOT NULL,
  `tbl_payment_mode_id` int(11) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_verification` varchar(3) NOT NULL DEFAULT 'no',
  `sign_of_applicant` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_office_dept_seal` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_dept_admin_seal` varchar(3) NOT NULL DEFAULT 'no',
  `cnic_attach` varchar(3) NOT NULL DEFAULT 'no',
  `cnic_widow_attach` varchar(3) NOT NULL DEFAULT 'no',
  `dc_attach` varchar(3) NOT NULL DEFAULT 'no',
  `family_attach` varchar(3) NOT NULL DEFAULT 'no',
  `payroll_lpc_attach` varchar(3) NOT NULL DEFAULT 'no',
  `dob_ac_attach` varchar(3) NOT NULL DEFAULT 'no',
  `single_widow_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Single Widow Certificate  (Check box)',
  `no_marriage_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'No Marriage & Non-Separation Certificate (Check box)',
  `disc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death in Service Certificate (Check box)',
  `undertaking` varchar(3) NOT NULL DEFAULT 'no' COMMENT '"Undertaking on Plain paper to the effect that are no other claimants to the grant except\r list of family members (Check box)"',
  `boards_approval` varchar(3) NOT NULL COMMENT 'when yes record will be lock',
  `ac_edit` int(11) NOT NULL DEFAULT 0 COMMENT 'in account section who will received the record',
  `sent_to_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'record lock once send to secretary',
  `approve_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'when record will approve by secretary .. send back to account section for send to bank ',
  `sent_to_bank` int(11) NOT NULL DEFAULT 0 COMMENT 'complete process.\nrecord will be full lock. no editing after this without secretary approval',
  `feedback_website` varchar(100) DEFAULT NULL COMMENT 'this will provide status feedback on website …\nchange every time during process',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `repeat_case` int(11) NOT NULL DEFAULT 0 COMMENT 'this is for if repeat case were found… by default its value is 0 … if found value change it to 1 and record is lock from further proceedings ',
  `tbl_emp_info_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lump_sum_grant`
--

INSERT INTO `tbl_lump_sum_grant` (`id`, `application_no`, `gov_emp_name`, `wife`, `son`, `daughter`, `tbl_grantee_type_id`, `record_no`, `record_no_year`, `doa`, `dor`, `los`, `dept_letter_no`, `dept_letter_no_date`, `grant_amount`, `deduction`, `net_amount`, `succession`, `tbl_case_status_id`, `tbl_payment_mode_id`, `tbl_list_bank_branches_id`, `account_no`, `bank_verification`, `sign_of_applicant`, `s_n_office_dept_seal`, `s_n_dept_admin_seal`, `cnic_attach`, `cnic_widow_attach`, `dc_attach`, `family_attach`, `payroll_lpc_attach`, `dob_ac_attach`, `single_widow_attach`, `no_marriage_attach`, `disc_attach`, `undertaking`, `boards_approval`, `ac_edit`, `sent_to_secretary`, `approve_secretary`, `sent_to_bank`, `feedback_website`, `record_add_by`, `record_add_date`, `repeat_case`, `tbl_emp_info_id`, `tbl_district_id`, `gazette`) VALUES
(1, '10000005', 'Ali', 1, 1, 1, 2, '1313123', '1010', '2020-12-02', '2020-12-30', '0 year(s) 0 month(s) 28 and day(s)', '243242432342', '2020-12-30', '500000', '0', '500000', 'test succession', 3, 2, 2, '35324224367', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '0', 0, 0, 0, 0, '', 10, '2020-12-21 01:15:45', 0, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly_grant`
--

DROP TABLE IF EXISTS `tbl_monthly_grant`;
CREATE TABLE `tbl_monthly_grant` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `record_no` varchar(45) NOT NULL,
  `record_no_year` varchar(45) NOT NULL,
  `doa` varchar(45) NOT NULL,
  `dor` varchar(45) NOT NULL,
  `los` varchar(255) NOT NULL,
  `dept_letter_no` varchar(45) NOT NULL,
  `dept_letter_no_date` varchar(100) NOT NULL,
  `from_month` varchar(100) NOT NULL,
  `to_month` varchar(100) NOT NULL,
  `total_month` varchar(100) NOT NULL,
  `grant_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) NOT NULL,
  `tbl_case_status_id` int(11) NOT NULL,
  `tbl_payment_mode_id` int(11) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_verification` varchar(3) NOT NULL DEFAULT 'no',
  `sign_of_applicant` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_office_dept_seal` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of office/department with official seal',
  `s_n_dept_admin_seal` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of department/administrative department with official seal',
  `cnic_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'CNIC of Govt. Servant (Check box)',
  `cnic_widow_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'CNIC of Widow (Check box)',
  `dc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death Certificate (Check box)',
  `disc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death in Service Certificate (Check box)',
  `payroll_lpc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'PayRoll / LPC (Check box)',
  `retirement_attach` varchar(3) NOT NULL DEFAULT 'no',
  `bf_contribution_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'BF Contribution Certificate (Check box)',
  `invalidation_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Invalidation Certificate (Check box)',
  `family_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'List of Family Members (Check box)',
  `bf_contribution_attach_copy3` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'BF Contribution Certificate (Check box)',
  `no_marriage_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'No Marriage & Non-Separation Certificate (Check box)',
  `undertaking_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT '"Undertaking on Plain paper to the effect that are no other claimants to the grant except\r list of family members (Check box)"',
  `boards_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'when yes record will be lock',
  `ac_edit` int(11) NOT NULL DEFAULT 0 COMMENT 'in account section who will received the record',
  `sent_to_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'record lock once send to secretary',
  `approve_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'when record will approve by secretary .. send back to account section for send to bank ',
  `sent_to_bank` int(11) NOT NULL DEFAULT 0 COMMENT 'complete process.\nrecord will be full lock. no editing after this without secretary approval',
  `feedback_website` varchar(100) DEFAULT NULL COMMENT 'this will provide status feedback on website …\nchange every time during process',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `repeat_case` int(11) NOT NULL DEFAULT 0 COMMENT 'this is for if repeat case were found… by default its value is 0 … if found value change it to 1 and record is lock from further proceedings ',
  `tbl_emp_info_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_mode`
--

DROP TABLE IF EXISTS `tbl_payment_mode`;
CREATE TABLE `tbl_payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_mode`
--

INSERT INTO `tbl_payment_mode` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Cash', 1, 1, '2020-08-20 14:44:28'),
(2, 'Bank Transfer', 1, 1, '2020-08-20 14:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_scale`
--

DROP TABLE IF EXISTS `tbl_pay_scale`;
CREATE TABLE `tbl_pay_scale` (
  `id` int(11) NOT NULL COMMENT 'table pay scale like scale 1 , scale 2 etc',
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pay_scale`
--

INSERT INTO `tbl_pay_scale` (`id`, `name`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'BS-01', 1, 1, '2020-08-13 13:05:18'),
(2, 'BS-02', 1, 1, '2020-08-13 13:05:18'),
(3, 'BS-03', 1, 1, '2020-08-13 13:05:18'),
(4, 'BS-04', 1, 1, '2020-08-13 13:05:18'),
(5, 'BS-05', 1, 1, '2020-08-13 13:05:18'),
(6, 'BS-06', 1, 1, '2020-08-13 13:05:18'),
(7, 'BS-07', 1, 1, '2020-08-13 13:05:18'),
(8, 'BS-08', 1, 1, '2020-08-13 13:05:18'),
(9, 'BS-09', 1, 1, '2020-08-13 13:05:18'),
(10, 'BS-10', 1, 1, '2020-08-13 13:05:18'),
(11, 'BS-11', 1, 1, '2020-08-13 13:05:18'),
(12, 'BS-12', 1, 1, '2020-08-13 13:05:18'),
(13, 'BS-13', 1, 1, '2020-08-13 13:05:18'),
(14, 'BS-14', 1, 1, '2020-08-13 13:05:18'),
(15, 'BS-15', 1, 1, '2020-08-13 13:05:18'),
(16, 'BS-16', 1, 1, '2020-08-13 13:05:18'),
(17, 'BS-17', 1, 1, '2020-08-13 13:05:18'),
(18, 'BS-18', 1, 1, '2020-08-13 13:05:18'),
(19, 'BS-19', 1, 1, '2020-08-13 13:05:18'),
(20, 'BS-20', 1, 1, '2020-08-13 13:05:18'),
(21, 'BS-21', 1, 1, '2020-08-13 13:05:18'),
(22, 'BS-22', 1, 1, '2020-08-13 13:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tbl_pay_scale_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `name`, `tbl_pay_scale_id`, `status`, `record_add_by`, `record_add_date`) VALUES
(1, 'Nayib Qasid', 1, 1, 1, '2020-08-13 13:05:29'),
(2, 'Computer Operator', 16, 1, 1, '2020-09-23 11:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retirement_grant`
--

DROP TABLE IF EXISTS `tbl_retirement_grant`;
CREATE TABLE `tbl_retirement_grant` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `record_no` varchar(45) NOT NULL,
  `record_no_year` varchar(45) NOT NULL,
  `doa` varchar(45) NOT NULL,
  `dor` varchar(45) NOT NULL,
  `los` varchar(255) NOT NULL,
  `dept_letter_no` varchar(45) NOT NULL,
  `dept_letter_no_date` varchar(100) NOT NULL,
  `grant_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) DEFAULT '0',
  `net_amount` varchar(255) NOT NULL,
  `tbl_case_status_id` int(11) NOT NULL,
  `tbl_payment_mode_id` int(11) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_verification` varchar(3) NOT NULL DEFAULT 'no',
  `sign_of_applicant` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_office_dept_seal` varchar(3) NOT NULL DEFAULT 'no',
  `s_n_dept_admin_seal` varchar(3) NOT NULL DEFAULT 'no',
  `payroll_attach` varchar(3) NOT NULL DEFAULT 'no',
  `dob_ac_attach` varchar(3) NOT NULL DEFAULT 'no',
  `retirement_attach` varchar(3) NOT NULL DEFAULT 'no',
  `bf_contribution_attach` varchar(3) NOT NULL DEFAULT 'no',
  `cnic_attach` varchar(3) NOT NULL DEFAULT 'no',
  `ppo_attach` varchar(3) NOT NULL DEFAULT 'no',
  `boards_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'when yes record will be lock',
  `ac_edit` int(11) NOT NULL DEFAULT 0 COMMENT 'in account section who will received the record',
  `sent_to_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'record lock once send to secretary',
  `approve_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'when record will approve by secretary .. send back to account section for send to bank ',
  `sent_to_bank` int(11) NOT NULL DEFAULT 0 COMMENT 'complete process.\nrecord will be full lock. no editing after this without secretary approval',
  `feedback_website` varchar(100) DEFAULT NULL COMMENT 'this will provide status feedback on website …\nchange every time during process',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `repeat_case` int(11) NOT NULL DEFAULT 0 COMMENT 'this is for if repeat case were found… by default its value is 0 … if found value change it to 1 and record is lock from further proceedings ',
  `tbl_emp_info_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_retirement_grant`
--

INSERT INTO `tbl_retirement_grant` (`id`, `application_no`, `record_no`, `record_no_year`, `doa`, `dor`, `los`, `dept_letter_no`, `dept_letter_no_date`, `grant_amount`, `deduction`, `net_amount`, `tbl_case_status_id`, `tbl_payment_mode_id`, `tbl_list_bank_branches_id`, `account_no`, `bank_verification`, `sign_of_applicant`, `s_n_office_dept_seal`, `s_n_dept_admin_seal`, `payroll_attach`, `dob_ac_attach`, `retirement_attach`, `bf_contribution_attach`, `cnic_attach`, `ppo_attach`, `boards_approval`, `ac_edit`, `sent_to_secretary`, `approve_secretary`, `sent_to_bank`, `feedback_website`, `record_add_by`, `record_add_date`, `repeat_case`, `tbl_emp_info_id`, `tbl_district_id`, `gazette`) VALUES
(1, '10000002', '5100122', '2020', '2003-12-29', '2015-06-21', '11 year(s) 5 month(s) 24 and day(s)', '221313', '2020-12-21', '55000', '0', '55000', 3, 2, 2, '43242423422', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 0, 0, 0, 0, '', 10, '2020-12-21 00:13:57', 0, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholaarship_grant`
--

DROP TABLE IF EXISTS `tbl_scholaarship_grant`;
CREATE TABLE `tbl_scholaarship_grant` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `parent_dept` varchar(45) NOT NULL,
  `duty_place` varchar(255) NOT NULL,
  `std_name` varchar(45) NOT NULL,
  `class_pass` varchar(45) NOT NULL,
  `exam_pass` varchar(255) NOT NULL,
  `result_date` varchar(45) NOT NULL,
  `mo` varchar(100) NOT NULL,
  `tm` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `institute_add` varchar(100) NOT NULL,
  `grant_amount` varchar(255) NOT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) NOT NULL,
  `tbl_case_status_id` int(11) NOT NULL,
  `tbl_payment_mode_id` int(11) NOT NULL,
  `tbl_list_bank_branches_id` int(11) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_verification` varchar(3) NOT NULL DEFAULT 'no',
  `std_signature` varchar(3) NOT NULL DEFAULT 'no',
  `gov_servent_sign` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of office/department with official seal',
  `seal_institute` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Sign & name of the head of department/administrative department with official seal',
  `head_institute` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'CNIC of Govt. Servant (Check box)',
  `office_seal_hod` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'CNIC of Widow (Check box)',
  `hod_sign` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death Certificate (Check box)',
  `payroll_lpc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'Death in Service Certificate (Check box)',
  `dmc_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'PayRoll / LPC (Check box)',
  `cnic_attach` varchar(3) NOT NULL DEFAULT 'no',
  `grade_attach` varchar(3) NOT NULL DEFAULT 'no' COMMENT 'BF Contribution Certificate (Check box)',
  `boards_approval` int(11) NOT NULL DEFAULT 0 COMMENT 'when yes record will be lock',
  `ac_edit` int(11) NOT NULL DEFAULT 0 COMMENT 'in account section who will received the record',
  `sent_to_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'record lock once send to secretary',
  `approve_secretary` int(11) NOT NULL DEFAULT 0 COMMENT 'when record will approve by secretary .. send back to account section for send to bank ',
  `sent_to_bank` int(11) NOT NULL DEFAULT 0 COMMENT 'complete process.\nrecord will be full lock. no editing after this without secretary approval',
  `feedback_website` varchar(100) DEFAULT NULL COMMENT 'this will provide status feedback on website …\nchange every time during process',
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(50) NOT NULL,
  `repeat_case` int(11) NOT NULL DEFAULT 0 COMMENT 'this is for if repeat case were found… by default its value is 0 … if found value change it to 1 and record is lock from further proceedings ',
  `tbl_emp_info_id` int(11) NOT NULL,
  `tbl_district_id` int(11) NOT NULL,
  `gazette` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_scholaarship_grant`
--

INSERT INTO `tbl_scholaarship_grant` (`id`, `application_no`, `parent_dept`, `duty_place`, `std_name`, `class_pass`, `exam_pass`, `result_date`, `mo`, `tm`, `percentage`, `institute_name`, `institute_add`, `grant_amount`, `deduction`, `net_amount`, `tbl_case_status_id`, `tbl_payment_mode_id`, `tbl_list_bank_branches_id`, `account_no`, `bank_verification`, `std_signature`, `gov_servent_sign`, `seal_institute`, `head_institute`, `office_seal_hod`, `hod_sign`, `payroll_lpc_attach`, `dmc_attach`, `cnic_attach`, `grade_attach`, `boards_approval`, `ac_edit`, `sent_to_secretary`, `approve_secretary`, `sent_to_bank`, `feedback_website`, `record_add_by`, `record_add_date`, `repeat_case`, `tbl_emp_info_id`, `tbl_district_id`, `gazette`, `status`) VALUES
(1, '10000001', '22', 'Malakand', 'Muhammad Bilal', '4', 'Science', '29-12-2020', '850', '1050', '80.95', 'Lalazar', 'Thana Malakand', '40000.00', '0', '40000.00', 3, 2, 2, '793132123123', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 0, 0, 0, 0, NULL, 10, '2020-12-21 00:09:24', 0, 4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship_classes`
--

DROP TABLE IF EXISTS `tbl_scholarship_classes`;
CREATE TABLE `tbl_scholarship_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `no_of_scholarships` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `record_add_by` tinyint(4) NOT NULL,
  `record_add_date` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_scholarship_classes`
--

INSERT INTO `tbl_scholarship_classes` (`id`, `class_name`, `no_of_scholarships`, `amount`, `record_add_by`, `record_add_date`, `status`) VALUES
(1, 'SSC', 50, 16000.00, 1, '2020-08-20 14:44:43', 1),
(2, 'Intermediate', 50, 32000.00, 1, '2020-08-20 14:44:43', 1),
(3, 'Professional Colleges / Universities', 50, 48000.00, 1, '2020-08-20 14:44:43', 1),
(4, 'B.A / B.Sc.', 50, 40000.00, 1, '2020-08-20 14:44:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship_payment`
--

DROP TABLE IF EXISTS `tbl_scholarship_payment`;
CREATE TABLE `tbl_scholarship_payment` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `record_add_by` int(11) NOT NULL,
  `record_add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

DROP TABLE IF EXISTS `tbl_transactions`;
CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `tbl_grants_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `bank_transaction_id` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `application_no`, `tbl_grants_id`, `amount`, `bank_transaction_id`, `date_added`, `added_by`) VALUES
(1, '10000004', 5, '150000', '2254387', '2020-12-21', 1),
(2, '10000004', 5, '100000', '7836394664', '2020-12-21', 1),
(3, '10000006', 5, '100000', '47872205', '2020-12-21', 1),
(4, '10000006', 5, '100000', '20948752', '2020-12-21', 1),
(5, '10000005', 6, '100000', '0974524392', '2020-12-21', 1),
(6, '10000005', 6, '10000', '9082745209837', '2020-12-21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_tbl_admin_tbl_admin_role_idx` (`tbl_admin_role_id`),
  ADD KEY `indexes` (`record_add_by`),
  ADD KEY `fk_tbl_admin_tbl_district1_idx` (`tbl_district_id`);

--
-- Indexes for table `tbl_admin_role`
--
ALTER TABLE `tbl_admin_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`record_add_by`);

--
-- Indexes for table `tbl_batches`
--
ALTER TABLE `tbl_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bfc_list_bank`
--
ALTER TABLE `tbl_bfc_list_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`record_add_by`),
  ADD KEY `fk_tbl_bfc_list_bank_tbl_banks1_idx` (`tbl_banks_id`);

--
-- Indexes for table `tbl_case_status`
--
ALTER TABLE `tbl_case_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_emp_info`
--
ALTER TABLE `tbl_emp_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_department1_idx` (`tbl_department_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_post1_idx` (`tbl_post_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_district1_idx` (`tbl_district_id`);

--
-- Indexes for table `tbl_funeral_grant`
--
ALTER TABLE `tbl_funeral_grant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_payment_mode1_idx` (`tbl_payment_mode_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_case_status1_idx` (`tbl_case_status_id`),
  ADD KEY `fk_tbl_funeral_grant_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_funeral_payments`
--
ALTER TABLE `tbl_funeral_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_pay_scale1_idx` (`tbl_pay_scale_id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_grants1_idx` (`tbl_grants_id`);

--
-- Indexes for table `tbl_grantee_type`
--
ALTER TABLE `tbl_grantee_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`record_add_by`);

--
-- Indexes for table `tbl_grants`
--
ALTER TABLE `tbl_grants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_grants_has_tbl_emp_info_gerund`
--
ALTER TABLE `tbl_grants_has_tbl_emp_info_gerund`
  ADD PRIMARY KEY (`id`,`tbl_grants_id`,`tbl_emp_info_id`),
  ADD KEY `fk_tbl_grants_has_tbl_emp_info_tbl_emp_info1_idx` (`tbl_emp_info_id`),
  ADD KEY `fk_tbl_grants_has_tbl_emp_info_tbl_grants1_idx` (`tbl_grants_id`);

--
-- Indexes for table `tbl_grant_payments`
--
ALTER TABLE `tbl_grant_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_pay_scale1_idx` (`tbl_pay_scale_id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_grants1_idx` (`tbl_grants_id`);

--
-- Indexes for table `tbl_interestfreeloan_payments`
--
ALTER TABLE `tbl_interestfreeloan_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_pay_scale1_idx` (`tbl_pay_scale_id`),
  ADD KEY `fk_tbl_retirement_grant_payments_tbl_grants1_idx` (`tbl_grants_id`);

--
-- Indexes for table `tbl_interest_free_loan`
--
ALTER TABLE `tbl_interest_free_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_legal_heirs`
--
ALTER TABLE `tbl_legal_heirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`account_no`),
  ADD KEY `fk_tbl_legal_heirs_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_legal_heirs_tbl_grants1_idx` (`tbl_grants_id`),
  ADD KEY `fk_tbl_legal_heirs_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_list_bank_branches`
--
ALTER TABLE `tbl_list_bank_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`record_add_by`),
  ADD KEY `fk_tbl_list_bank_branches_tbl_banks1_idx` (`tbl_banks_id`);

--
-- Indexes for table `tbl_loan_types`
--
ALTER TABLE `tbl_loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logger`
--
ALTER TABLE `tbl_logger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lump_sum_grant`
--
ALTER TABLE `tbl_lump_sum_grant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_payment_mode1_idx` (`tbl_payment_mode_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_case_status1_idx` (`tbl_case_status_id`),
  ADD KEY `fk_tbl_lump_sum_grant_tbl_grantee_type1_idx` (`tbl_grantee_type_id`),
  ADD KEY `fk_tbl_lump_sum_grant_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_monthly_grant`
--
ALTER TABLE `tbl_monthly_grant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_payment_mode1_idx` (`tbl_payment_mode_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_case_status1_idx` (`tbl_case_status_id`),
  ADD KEY `fk_tbl_monthly_grant_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_pay_scale`
--
ALTER TABLE `tbl_pay_scale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `indexes` (`record_add_by`),
  ADD KEY `fk_tbl_post_tbl_pay_scale1_idx` (`tbl_pay_scale_id`);

--
-- Indexes for table `tbl_retirement_grant`
--
ALTER TABLE `tbl_retirement_grant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_payment_mode1_idx` (`tbl_payment_mode_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_case_status1_idx` (`tbl_case_status_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_scholaarship_grant`
--
ALTER TABLE `tbl_scholaarship_grant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_payment_mode1_idx` (`tbl_payment_mode_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_list_bank_branches1_idx` (`tbl_list_bank_branches_id`),
  ADD KEY `fk_tbl_retirement_grant_tbl_case_status1_idx` (`tbl_case_status_id`),
  ADD KEY `fk_tbl_scholaarship_grant_tbl_emp_info1_idx` (`tbl_emp_info_id`);

--
-- Indexes for table `tbl_scholarship_classes`
--
ALTER TABLE `tbl_scholarship_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scholarship_payment`
--
ALTER TABLE `tbl_scholarship_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin_role`
--
ALTER TABLE `tbl_admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_batches`
--
ALTER TABLE `tbl_batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bfc_list_bank`
--
ALTER TABLE `tbl_bfc_list_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_case_status`
--
ALTER TABLE `tbl_case_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This table is for the status of case like finalized or pending etc', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_emp_info`
--
ALTER TABLE `tbl_emp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_funeral_grant`
--
ALTER TABLE `tbl_funeral_grant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_funeral_payments`
--
ALTER TABLE `tbl_funeral_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_grantee_type`
--
ALTER TABLE `tbl_grantee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'table for grant type like widow etc\nthis table is used in lump sum grant', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_grants`
--
ALTER TABLE `tbl_grants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'table for grants like retirement grant, scholarship grant', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_grants_has_tbl_emp_info_gerund`
--
ALTER TABLE `tbl_grants_has_tbl_emp_info_gerund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_grant_payments`
--
ALTER TABLE `tbl_grant_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_interestfreeloan_payments`
--
ALTER TABLE `tbl_interestfreeloan_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this table is for check to how much grant amount is issued … and also check from and to date of amount', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_interest_free_loan`
--
ALTER TABLE `tbl_interest_free_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_legal_heirs`
--
ALTER TABLE `tbl_legal_heirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_bank_branches`
--
ALTER TABLE `tbl_list_bank_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_loan_types`
--
ALTER TABLE `tbl_loan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logger`
--
ALTER TABLE `tbl_logger`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_lump_sum_grant`
--
ALTER TABLE `tbl_lump_sum_grant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_monthly_grant`
--
ALTER TABLE `tbl_monthly_grant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pay_scale`
--
ALTER TABLE `tbl_pay_scale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'table pay scale like scale 1 , scale 2 etc', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_retirement_grant`
--
ALTER TABLE `tbl_retirement_grant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_scholaarship_grant`
--
ALTER TABLE `tbl_scholaarship_grant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_scholarship_classes`
--
ALTER TABLE `tbl_scholarship_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_scholarship_payment`
--
ALTER TABLE `tbl_scholarship_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bfc_list_bank`
--
ALTER TABLE `tbl_bfc_list_bank`
  ADD CONSTRAINT `fk_tbl_bfc_list_bank_tbl_banks1` FOREIGN KEY (`tbl_banks_id`) REFERENCES `tbl_banks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

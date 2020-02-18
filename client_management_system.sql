-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 01:03 PM
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
-- Database: `client_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `devision_id` int(11) NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `devision_id`, `area_name`, `created_at`, `updated_at`) VALUES
(8, 3, 'Mirpur', '2019-06-22 06:30:26', '2019-06-22 06:30:26'),
(9, 1, 'Mirpur', '2019-06-22 07:49:42', '2019-06-22 07:49:42'),
(10, 1, 'Mohamadpur', '2019-06-22 07:50:37', '2019-06-22 07:50:37'),
(11, 1, 'Dhanmondi', '2019-06-22 07:53:29', '2019-06-22 07:53:29'),
(12, 1, 'Gulshan', '2019-06-22 07:53:45', '2019-06-22 07:53:45'),
(13, 1, 'Badda', '2019-06-22 07:53:59', '2019-06-22 07:53:59'),
(14, 1, 'Banani', '2019-06-22 07:54:18', '2019-06-22 07:54:18'),
(15, 1, 'Baridhara', '2019-06-22 07:54:35', '2019-06-22 07:54:35'),
(16, 1, 'Basundhara', '2019-06-22 07:54:50', '2019-06-22 07:54:50'),
(17, 1, 'Cantonment', '2019-06-22 07:55:04', '2019-06-22 07:55:04'),
(18, 1, 'Elephant Road', '2019-06-22 07:55:27', '2019-06-22 07:55:27'),
(19, 1, 'Jatrabari', '2019-06-22 07:55:40', '2019-06-22 07:55:40'),
(20, 1, 'Lalbag', '2019-06-22 07:56:00', '2019-06-22 07:56:00'),
(21, 1, 'Malibag-Mogbazar', '2019-06-22 07:56:11', '2019-06-22 07:58:41'),
(22, 1, 'Mohakhali', '2019-06-22 07:56:28', '2019-06-22 07:56:28'),
(23, 1, 'Motijheel', '2019-06-22 07:56:41', '2019-06-22 07:56:41'),
(24, 1, 'kamrangir char', '2019-06-26 14:53:26', '2019-06-26 14:53:26'),
(25, 2, 'Noakhali', '2019-07-02 08:28:56', '2019-07-02 08:28:56'),
(26, 1, 'Uttara', '2019-07-02 08:30:27', '2019-07-02 08:30:27'),
(27, 5, 'Bogura', '2019-07-07 14:31:30', '2019-07-07 14:31:30'),
(28, 5, 'Rajshahi sodor', '2019-07-08 14:07:09', '2019-07-08 14:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `cpanels`
--

CREATE TABLE `cpanels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpanel_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpanel_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpanel_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cpanel_url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpanels`
--

INSERT INTO `cpanels` (`id`, `cpanel_domain_name`, `cpanel_user`, `cpanel_password`, `created_at`, `updated_at`, `cpanel_url`) VALUES
(5, 'Laravel cpanel:https://server229.web-hosting.com:2083/', 'ss', 'sss', '2020-02-18 05:40:44', '2020-02-18 05:40:44', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mobile_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT 0,
  `position_id` int(11) NOT NULL,
  `profession_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `customer_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_remendar_date` date DEFAULT NULL,
  `customer_view` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for unview notification  customer and 1 for view customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_mobile`, `customer_mobile_two`, `customer_email`, `division_id`, `area_id`, `customer_status`, `position_id`, `profession_id`, `type_id`, `customer_remark`, `customer_address`, `customer_remendar_date`, `customer_view`, `created_at`, `updated_at`) VALUES
(33, 'Mohammad Mojibur Rahman', '01911735315', NULL, 'bhuiyanmojib@gmail.com', 1, 9, 0, 14, 8, 6, 'Import & Distributor  Computer & electronics Goods  Sales & Service', '1/A-B, Darussalam Road , Shop No.31 (3rd Floor) Capital Tower, Mirpur-1 Dhaka-1216', NULL, 0, '2019-06-26 14:11:50', '2019-06-26 14:11:50'),
(34, 'Destar Network Service', '01822001592', NULL, NULL, 1, 9, 0, 8, 8, 6, 'Network Service', 'House-2 Road-2 Block -G Mirpur-1 Dhaka', NULL, 0, '2019-06-26 14:15:46', '2019-06-26 14:15:46'),
(35, 'Md Abdul Bari Talukder', '01760269302', '01775550430', NULL, 1, 9, 0, 14, 8, 5, 'Landmark Business', '103, Muktobangla Shopping Complex, 7th Floor Mirpur-1', NULL, 0, '2019-06-26 14:17:41', '2019-06-26 14:17:41'),
(36, 'World Fashion', '01917521465', '01989386626', NULL, 1, 9, 0, 8, 8, 7, NULL, 'Mirpur Shoping Center, Shop No 232-233 1st Floor, Mirpur-2', NULL, 0, '2019-06-26 14:20:20', '2019-06-26 14:20:20'),
(37, 'Auto Galaxy', '+88-02-9116173-4', '01767385040', 'autogalaxy816@gmail.com', 1, 15, 0, 8, 8, 9, NULL, NULL, NULL, 0, '2019-06-26 14:22:18', '2019-06-26 14:31:21'),
(38, 'Ananna', '01867785097', '01867785098', NULL, 1, 21, 0, 8, 8, 7, NULL, NULL, NULL, 0, '2019-06-26 14:23:47', '2019-06-26 14:23:47'),
(39, 'Binaka Bd', '01970111120', NULL, 'abchemicalbd@gmail.com', 1, 9, 0, 7, 8, 4, NULL, NULL, NULL, 0, '2019-06-26 14:30:17', '2019-06-26 14:30:17'),
(40, 'Md Razu', '01812092794', NULL, NULL, 1, 21, 0, 14, 8, 5, 'Gold Plated Jewwllery', '50/D Fortune Shopping Mall Mouchalk Dhaka', NULL, 0, '2019-06-26 14:34:20', '2019-06-26 14:34:20'),
(41, 'Md Anwar Hossain Shanju', '01726055155', '01552317571', NULL, 1, 21, 0, 14, 8, 7, NULL, 'Fortune Shopping Complex Shop No 11 Outer Circular Road', NULL, 0, '2019-06-26 14:37:19', '2019-06-26 14:37:19'),
(42, 'Lt Col Kabir Uddain Ahmed', '01819485466', '01769012540', 'kabir3036@yahoo.com', 1, 9, 0, 17, 14, 12, NULL, NULL, NULL, 0, '2019-06-26 14:49:41', '2019-06-26 14:49:41'),
(43, 'Dr Md Shahidul Islam Akon', '9121387', '9121588', 'shahid.akon@yhaoo.com', 1, 10, 0, 13, 2, 4, NULL, NULL, NULL, 0, '2019-06-26 14:51:17', '2019-06-26 14:51:17'),
(44, 'Sumaiya Products', '01728433057', NULL, NULL, 1, 24, 0, 14, 8, 7, 'gg', 'ggg', '2019-07-24', 0, '2019-06-26 14:54:14', '2019-07-02 08:35:44'),
(45, NULL, '09638904890', NULL, NULL, 2, 25, 0, 7, 8, 5, 'Ecommerce Website Make . Primary Talk', 'Noakhali', '2019-07-03', 0, '2019-07-02 08:29:13', '2019-07-02 08:29:13'),
(46, NULL, '01749504519', NULL, NULL, 1, 26, 0, 7, 8, 5, 'Ecommerce Website , Talk primary', NULL, '2019-07-03', 0, '2019-07-02 08:31:10', '2019-07-02 08:31:10'),
(47, 'Unknown', '01807118814', NULL, NULL, 2, 25, 0, 0, 0, 0, 'Daily need Design er ecommerce needed .......', NULL, '2019-07-08', 0, '2019-07-06 17:46:25', '2019-07-07 14:47:11'),
(48, 'Md. Sajib', '01632555666', NULL, NULL, 1, 11, 0, 7, 8, 4, 'Himel Shop Korte chai        \r\n2nd: Phone recieve korenai    at 7/7/2019', NULL, '2019-07-10', 0, '2019-07-06 17:48:07', '2019-07-07 14:48:07'),
(50, 'Zel Huqe', '01717799402', NULL, NULL, 5, 0, 0, 0, 0, 7, NULL, NULL, '2019-07-09', 0, '2019-07-07 14:35:23', '2019-07-07 14:35:23'),
(51, 'Zel Huqe', '01717799402', NULL, NULL, 5, 27, 0, 19, 10, 7, 'Ecommerce Site nibe, Affate merketing & Drop Shipping    . Price 9,999 BDT. \r\nBut We Suggest 20 GB Hosting , price 13,999 bdt only', NULL, '2019-07-09', 0, '2019-07-07 14:37:53', '2019-07-07 14:46:00'),
(52, 'Md Rubel', '01714954418', NULL, NULL, 3, 0, 0, 17, 7, 0, 'School Management Software With Finger Print', NULL, '2019-07-08', 0, '2019-07-07 19:16:32', '2019-07-07 19:16:32'),
(53, 'Md Rubel', '01714954418', NULL, NULL, 3, 8, 1, 7, 7, 4, 'School Management With Finger Print', NULL, '2019-07-08', 0, '2019-07-07 19:17:56', '2019-12-24 03:02:21'),
(54, 'Akherujjaman', '01309454691', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 'website / kono service nibe, phone dite hobe', '2019-07-09', 0, '2019-07-09 08:51:53', '2019-07-09 08:51:53'),
(55, 'Md. Rezaur Rahma', '01634500500', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, '2019-07-09 15:44:08', '2019-07-09 15:44:08'),
(56, 'Md Harun Ur Rashid', '01711540760', NULL, NULL, 1, 11, 2, 8, 8, 5, 'multi Vendor ecommerce', NULL, NULL, 0, '2019-07-09 16:20:13', '2020-02-18 03:51:04'),
(57, 'Md Moniruzzaman Robin', '01710020008', NULL, NULL, 0, 0, 1, 0, 0, 0, 'Ajke call dite hobe', NULL, '2019-07-10', 0, '2019-07-10 05:13:04', '2019-12-24 03:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `division_id` int(11) UNSIGNED NOT NULL,
  `division_name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `division_name`, `bn_name`) VALUES
(1, 'Dhaka', 'ঢাকা'),
(2, 'Chattogram', 'চট্টগ্রাম'),
(3, 'Barishal', 'বরিশাল'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ'),
(9, 'Unknown', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

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
(3, '2019_06_18_083021_create_customers_table', 1),
(4, '2019_06_18_083944_create_areas_table', 2),
(5, '2019_06_18_084034_create_professions_table', 2),
(6, '2019_06_18_084109_create_positions_table', 2),
(7, '2019_06_18_084126_create_types_table', 2),
(8, '2019_07_13_052823_create_services_table', 3),
(9, '2019_07_13_093049_create_service_categories_table', 4),
(10, '2019_12_24_051944_create_cpanels_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_name`, `created_at`, `updated_at`) VALUES
(7, 'MD', '2019-06-18 06:48:42', '2019-06-22 08:03:47'),
(8, 'Manager', '2019-06-18 07:56:28', '2019-06-18 07:56:28'),
(12, 'CEO', '2019-06-22 08:04:02', '2019-06-22 08:04:02'),
(13, 'Asst. Manager', '2019-06-22 08:04:31', '2019-06-22 08:04:31'),
(14, 'Proprietor', '2019-06-26 14:00:56', '2019-06-26 14:00:56'),
(15, 'Chairman', '2019-06-26 14:01:34', '2019-06-26 14:01:34'),
(16, 'Executive Officer', '2019-06-26 14:46:53', '2019-06-26 14:46:53'),
(17, 'Officer', '2019-06-26 14:48:49', '2019-06-26 14:48:49'),
(18, 'Consultant', '2019-06-26 14:51:42', '2019-06-26 14:51:42'),
(19, 'Senior Executive', '2019-07-07 14:39:42', '2019-07-07 14:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `profession_id` bigint(20) UNSIGNED NOT NULL,
  `profession_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`profession_id`, `profession_name`, `created_at`, `updated_at`) VALUES
(2, 'Doctor', '2019-06-18 06:11:21', '2019-06-26 14:38:04'),
(4, 'Engineering', '2019-06-18 06:31:11', '2019-06-26 14:38:28'),
(5, 'Professor', '2019-06-18 06:31:49', '2019-06-26 14:38:43'),
(7, 'Teacher', '2019-06-18 07:56:49', '2019-06-26 14:38:51'),
(8, 'Business', '2019-06-22 06:49:15', '2019-06-22 06:49:15'),
(9, 'Gov. Job', '2019-06-22 06:50:01', '2019-06-22 06:50:01'),
(10, 'Private Job', '2019-06-22 06:50:20', '2019-06-22 06:50:20'),
(11, 'Banker', '2019-06-22 06:52:09', '2019-06-22 06:52:09'),
(12, 'Journalists', '2019-06-22 06:56:12', '2019-06-22 06:56:12'),
(13, 'Lawyer', '2019-06-22 06:56:28', '2019-06-22 23:27:47'),
(14, 'Army / Military', '2019-06-22 06:56:57', '2019-06-22 06:56:57'),
(15, 'Models', '2019-06-22 06:57:07', '2019-06-22 06:57:07'),
(16, 'Painters', '2019-06-22 06:57:32', '2019-06-22 06:57:32'),
(17, 'Photographers', '2019-06-22 06:57:46', '2019-06-22 06:57:46'),
(19, 'Programmers', '2019-06-22 06:58:22', '2019-06-22 06:58:22'),
(20, 'Scientists', '2019-06-22 06:58:35', '2019-06-22 06:58:35'),
(21, 'Social workers', '2019-06-22 06:58:47', '2019-06-22 06:58:47'),
(22, 'Students', '2019-06-22 06:59:07', '2019-06-22 06:59:07'),
(23, 'Tailors', '2019-06-22 06:59:17', '2019-06-22 06:59:17'),
(24, 'Trainer', '2019-06-22 06:59:28', '2019-06-26 14:44:51'),
(25, 'Designer', '2019-06-22 07:00:00', '2019-06-22 07:00:00'),
(26, 'Driver', '2019-06-22 07:00:13', '2019-06-22 07:00:13'),
(29, 'Police', '2019-06-26 14:40:24', '2019-06-26 14:40:24'),
(30, 'Privt. Job', '2019-07-07 14:38:45', '2019-07-07 14:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for domain 2 for hoistin 3 for sevice  4 for  domain and hosting	',
  `service_name` int(11) DEFAULT NULL,
  `service_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_hosting_space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_present_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_renue_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_start_date` datetime DEFAULT NULL,
  `service_end_date` datetime DEFAULT NULL,
  `service_renue_start_date` datetime DEFAULT NULL,
  `service_renue_end_date` datetime DEFAULT NULL,
  `service_name_price` bigint(20) DEFAULT NULL,
  `service_name_renue_price` bigint(20) DEFAULT NULL,
  `service_name_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `customer_id`, `service_status`, `service_name`, `service_domain_name`, `service_hosting_space`, `service_present_price`, `service_renue_price`, `service_start_date`, `service_end_date`, `service_renue_start_date`, `service_renue_end_date`, `service_name_price`, `service_name_renue_price`, `service_name_remark`, `service_remark`, `created_at`, `updated_at`) VALUES
(14, 19, 'domain,,,service', 1, 'www.iu.com', NULL, '2000', '3000', '2019-07-31 00:00:00', '2019-07-31 00:00:00', '2019-07-24 00:00:00', '2019-07-30 00:00:00', 255, 555, 'hhh', '555', NULL, NULL),
(15, 31, ',,domain_hosting,service', 5, 'www.kajerhaat.com', '2G', '300', '400', '2019-08-01 00:00:00', '2019-08-08 00:00:00', '2019-07-31 00:00:00', '2019-08-08 00:00:00', 3000, 4000, NULL, '', NULL, NULL),
(16, 57, 'domain', NULL, 'Dhaka bazar', NULL, '25411', '36541', '2019-12-09 00:00:00', '2020-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, 'fff', NULL, NULL),
(17, 53, 'domain', NULL, 'gtomarket.com', NULL, '25411', '36541', '2019-12-16 00:00:00', '2019-12-17 00:00:00', NULL, NULL, NULL, NULL, NULL, 'ok', NULL, NULL),
(18, 53, ',,domain_hosting', NULL, 'Dhaka bazar', '2gb', '25411', '36541', '2019-12-11 00:00:00', '2020-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, '544', NULL, NULL),
(19, 53, ',,domain_hosting,service', 2, 'shopnershop.com', '20Gb', '25411', '400', '2019-12-09 00:00:00', '2020-01-04 00:00:00', '2019-12-03 00:00:00', '2020-01-02 00:00:00', 3000, 40000, 'no', 'Good', NULL, NULL),
(20, 53, 'domain_hostingservice', 1, 'gtomarket.com', '20Gb', '25411', '', '2019-12-26 00:00:00', '2019-12-25 00:00:00', '2019-12-18 00:00:00', '2019-12-05 00:00:00', 3000, 25444, 'dd', '', NULL, NULL),
(21, 53, 'domainservice', 2, 'Dhaka bazar', NULL, '25411', '36541', '2019-12-23 00:00:00', '2019-12-18 00:00:00', '2019-12-11 00:00:00', '2019-12-18 00:00:00', 3000, 25444, 'ddd', 'ddd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `service_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`service_category_id`, `service_category_name`, `created_at`, `updated_at`) VALUES
(1, 'website service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`, `created_at`, `updated_at`) VALUES
(4, 'Medical', NULL, '2019-06-22 08:05:31'),
(5, 'Buseness', '2019-06-22 06:41:06', '2019-06-22 06:41:06'),
(6, 'IT Buseness', '2019-06-22 06:41:18', '2019-06-26 13:59:18'),
(7, 'Fashaion', '2019-06-22 06:41:32', '2019-06-22 06:41:32'),
(8, 'Hospital', '2019-06-26 13:59:46', '2019-06-26 13:59:46'),
(9, 'Auto & car Business', '2019-06-26 14:06:30', '2019-06-26 14:06:30'),
(10, 'Real Estate & Housing', '2019-06-26 14:18:40', '2019-06-26 14:18:40'),
(11, 'Jewellery', '2019-06-26 14:34:59', '2019-06-26 14:34:59'),
(12, 'Officer', '2019-06-26 14:43:40', '2019-06-26 14:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Anisur  ffffffff', 'info@ddd.ffffff', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `cpanels`
--
ALTER TABLE `cpanels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`division_id`);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`profession_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`service_category_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cpanels`
--
ALTER TABLE `cpanels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `profession_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `service_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

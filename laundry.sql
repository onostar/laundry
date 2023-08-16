-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 07:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_qty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `store`, `item`, `transaction`, `previous_qty`, `quantity`, `posted_by`, `post_date`) VALUES
(1, 1, 3, 'sales_return', 0, 0, 1, '2023-08-16 13:26:55'),
(2, 1, 2, 'sales_return', 1, 1, 1, '2023-08-16 18:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank`, `account_number`) VALUES
(1, 'Access Bank', '0030596252'),
(3, 'Opay', '7068897068');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `department`, `category`, `price`) VALUES
(26, '1', 'Shirts', 0),
(27, '1', 'Gowns', 0);

-- --------------------------------------------------------

--
-- Table structure for table `check_ins`
--

CREATE TABLE `check_ins` (
  `guest_id` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` datetime NOT NULL,
  `check_out_date` datetime NOT NULL,
  `amount_due` int(25) NOT NULL,
  `status` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(11) NOT NULL,
  `stay_extended` int(11) NOT NULL,
  `date_extended` datetime NOT NULL,
  `extended_by` int(11) NOT NULL,
  `checked_out` datetime NOT NULL,
  `checked_out_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company`, `logo`, `date_created`) VALUES
(1, 'Klinax Servicing Company', 'chef pee.png', '2023-04-23 14:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_numbers` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer`, `phone_numbers`, `customer_address`, `customer_email`, `reg_date`) VALUES
(1, 'Kelly Ikpefua', '07068897068', '3 Ikponwosa Street, Okabere', 'onostarkels@gmail.com', '2023-07-22 11:57:07'),
(2, 'Onyema Chima', '07057456881', '24 Sapele Road Benin', 'onyema@mail.com', '2023-07-23 10:12:24'),
(3, 'James Brown', '08076566555', '33 Kjk Jkaj J', 'knj', '2023-08-10 14:42:19'),
(4, 'New Customer', '0805667888', 'Jlkhaeflkjh', 'nil', '2023-08-15 11:49:45'),
(5, 'Klinax', '080123456678', 'Jklhjkl', 'jknkjl', '2023-08-15 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_trail`
--

CREATE TABLE `customer_trail` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_trail`
--

INSERT INTO `customer_trail` (`id`, `customer`, `description`, `amount`, `store`, `posted_by`, `post_date`) VALUES
(1, 1, 'Credit sales', 500, 1, 1, '2023-07-23 09:36:53'),
(2, 2, 'Credit sales', 2000, 1, 1, '2023-07-23 10:12:47'),
(3, 5, 'Credit sales', 1800, 1, 1, '2023-08-15 12:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `debtor_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `debt_status` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`debtor_id`, `customer`, `invoice`, `amount`, `store`, `debt_status`, `posted_by`, `post_date`) VALUES
(1, 1, 'WS230723101777991', 500, 1, 0, 1, '2023-07-23 09:36:53'),
(2, 2, 'WS230723111873601', 2000, 1, 0, 1, '2023-07-23 10:12:47'),
(3, 5, 'LA150823011709521', 1800, 1, 0, 1, '2023-08-15 12:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department`) VALUES
(1, 'Male Clothes'),
(2, 'Female Clothings');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `expense_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` datetime NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `store`, `posted_by`, `expense_head`, `amount`, `details`, `expense_date`, `post_date`) VALUES
(1, 1, 1, '1', 4000, 'Fuel For Diesel', '2023-08-15 00:00:00', '2023-08-15 12:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `expense_heads`
--

CREATE TABLE `expense_heads` (
  `exp_head_id` int(11) NOT NULL,
  `expense_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_heads`
--

INSERT INTO `expense_heads` (`exp_head_id`, `expense_head`) VALUES
(1, 'Fuel, Diesel And Lubricants'),
(2, 'Transportation'),
(3, 'Airtime And Calls');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `batch_number` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` int(255) NOT NULL,
  `sales_price` int(255) NOT NULL,
  `pack_size` int(11) NOT NULL,
  `express` int(11) NOT NULL,
  `wholesale` int(11) NOT NULL,
  `wholesale_pack` int(11) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `department`, `category`, `item_name`, `cost_price`, `sales_price`, `pack_size`, `express`, `wholesale`, `wholesale_pack`, `reorder_level`, `barcode`, `item_status`, `date_created`) VALUES
(1, '1', 26, 'T-shirts', 0, 600, 0, 1000, 400, 0, 10, '00', 0, '2023-07-22 11:14:43'),
(2, '1', 26, 'Long Sleeve', 0, 600, 0, 1000, 300, 0, 10, '000', 0, '2023-07-22 11:15:17'),
(3, '1', 27, 'Gowns', 0, 1000, 0, 1500, 0, 0, 10, '99', 0, '2023-07-22 11:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu`) VALUES
(1, 'Admin menu'),
(2, 'Orders'),
(3, 'Inventory'),
(4, 'Financial mgt'),
(5, 'Reports'),
(6, 'Financial reports');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_payments`
--

CREATE TABLE `multiple_payments` (
  `id` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payments`
--

CREATE TABLE `other_payments` (
  `payment_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `sales_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` int(11) NOT NULL,
  `amount_due` int(20) NOT NULL,
  `store` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `discount` int(20) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `sales_type`, `customer`, `amount_due`, `store`, `amount_paid`, `discount`, `payment_mode`, `bank`, `post_date`, `posted_by`, `invoice`) VALUES
(1, 'Wholesale', 1, 2400, 1, 2400, 0, 'Cash', 0, '2023-07-23 09:32:28', 1, 'WS230723101222981'),
(2, 'Wholesale', 1, 500, 1, 500, 0, 'Credit', 0, '2023-07-23 09:36:53', 1, 'WS230723101777991'),
(3, 'Wholesale', 2, 2000, 1, 0, 0, 'Credit', 0, '2023-07-23 10:12:47', 1, 'WS230723111873601'),
(4, 'Wholesale', 2, 2400, 1, 2400, 0, 'Cash', 0, '2023-07-24 08:52:27', 1, 'WS240723091528861'),
(5, 'Wholesale', 2, 300, 1, 300, 0, 'Cash', 0, '2023-08-10 14:11:20', 1, 'WS100823031808981'),
(6, 'Wholesale', 1, 1800, 1, 1800, 0, 'Cash', 0, '2023-08-10 14:32:43', 1, 'WS100823031664331'),
(7, 'Wholesale', 3, 1500, 1, 1500, 0, 'Cash', 0, '2023-08-10 14:42:59', 1, 'WS100823031955131'),
(8, 'Wholesale', 3, 400, 1, 400, 0, 'Cash', 0, '2023-08-11 10:06:26', 2, 'WS110823112458791'),
(9, 'Wholesale', 1, 1000, 1, 1000, 0, 'Cash', 0, '2023-08-11 14:40:01', 1, 'LA110823031955031'),
(10, 'Wholesale', 4, 3200, 1, 2500, 700, 'Cash', 0, '2023-08-15 11:54:06', 1, 'LA150823121408671'),
(11, 'Wholesale', 5, 1800, 1, 0, 0, 'Credit', 0, '2023-08-15 12:00:38', 1, 'LA150823011709521'),
(12, 'Wholesale', 5, 1500, 1, 1500, 0, 'Cash', 0, '2023-08-16 10:17:50', 1, 'KL160823111407731');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` int(11) NOT NULL,
  `cost_price` int(255) NOT NULL,
  `sales_price` int(255) NOT NULL,
  `vendor` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `posted_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remove_items`
--

CREATE TABLE `remove_items` (
  `remove_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `previous_qty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `removed_by` int(11) NOT NULL,
  `removed_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remove_reasons`
--

CREATE TABLE `remove_reasons` (
  `remove_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remove_reasons`
--

INSERT INTO `remove_reasons` (`remove_id`, `reason`) VALUES
(1, 'Expiration'),
(2, 'Damages');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `right_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right_id`, `menu`, `sub_menu`, `user`) VALUES
(13, 1, 62, 3),
(14, 2, 60, 3),
(15, 2, 16, 3),
(16, 1, 51, 4),
(17, 6, 46, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `sales_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `sales_status` int(11) NOT NULL,
  `laundry_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `collection_date` datetime NOT NULL,
  `issued_date` datetime NOT NULL,
  `issued_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item`, `store`, `sales_type`, `customer`, `invoice`, `quantity`, `price`, `total_amount`, `cost`, `posted_by`, `sales_status`, `laundry_status`, `job_type`, `post_date`, `collection_date`, `issued_date`, `issued_by`) VALUES
(11, 3, 1, 'Laundry', 1, 'WS230723101222981', 1, 1200, 1200, 0, 1, 2, 'D', '', '2023-07-23 09:30:42', '2023-07-25 00:00:00', '2023-07-23 18:49:20', 1),
(12, 2, 1, 'Laundry', 1, 'WS230723101222981', 2, 600, 1200, 0, 1, 2, 'D', '', '2023-07-23 09:30:57', '2023-07-25 00:00:00', '2023-07-23 18:49:20', 1),
(13, 1, 1, 'Laundry', 1, 'WS230723101777991', 1, 500, 500, 0, 1, 2, 'D', '', '2023-07-23 09:36:35', '2023-07-26 00:00:00', '2023-07-23 19:54:20', 1),
(14, 3, 1, 'Laundry', 2, 'WS230723111873601', 2, 1000, 2000, 0, 1, 2, 'D', '', '2023-07-23 10:12:35', '2023-07-26 00:00:00', '2023-08-10 23:21:38', 1),
(16, 3, 1, 'Laundry', 2, 'WS240723091528861', 2, 1200, 2400, 0, 1, 2, 'W', '', '2023-07-24 08:50:40', '2023-07-25 00:00:00', '2023-08-10 23:21:47', 1),
(17, 1, 1, 'Laundry', 1, 'WS080823071102731', 4, 700, 2800, 0, 1, 0, '', '', '2023-08-08 06:33:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, 1, 1, 'Laundry', 1, 'WS080823071835871', 1, 500, 500, 0, 1, 0, '', '', '2023-08-08 06:49:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 2, 1, 'Laundry', 1, 'WS080823071398011', 1, 600, 600, 0, 1, 0, 'C', '', '2023-08-08 07:06:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(25, 1, 1, 'Laundry', 2, 'WS090823041127181', 1, 500, 500, 0, 1, 0, 'C', 'Wash & Iron', '2023-08-09 15:20:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(27, 1, 1, 'Laundry', 1, 'WS090823061238611', 1, 500, 500, 0, 1, 0, 'C', 'wash', '2023-08-09 17:50:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(29, 2, 1, 'Laundry', 2, 'WS100823031808981', 1, 300, 300, 0, 1, 2, 'W', 'iron', '2023-08-10 14:10:34', '2023-08-12 00:00:00', '0000-00-00 00:00:00', 0),
(30, 1, 1, 'Laundry', 1, 'WS100823031664331', 2, 500, 1000, 0, 1, 2, 'D', 'Wash & Iron', '2023-08-10 14:29:49', '2023-08-12 00:00:00', '2023-08-15 06:30:22', 1),
(31, 1, 1, 'Laundry', 1, 'WS100823031664331', 2, 400, 800, 0, 1, 2, 'I', 'iron', '2023-08-10 14:32:15', '2023-08-12 00:00:00', '0000-00-00 00:00:00', 0),
(32, 2, 1, 'Laundry', 3, 'WS100823031955131', 2, 600, 1200, 0, 1, 2, 'D', 'Wash & Iron', '2023-08-10 14:42:34', '2023-08-12 00:00:00', '2023-08-10 23:47:09', 1),
(33, 2, 1, 'Laundry', 3, 'WS100823031955131', 1, 300, 300, 0, 1, 2, 'D', 'iron', '2023-08-10 14:42:42', '2023-08-12 00:00:00', '2023-08-10 23:47:09', 1),
(34, 1, 1, 'Laundry', 3, 'WS110823112458791', 1, 400, 400, 0, 2, 2, 'D', 'iron', '2023-08-11 10:05:45', '2023-08-13 00:00:00', '2023-08-14 17:32:51', 1),
(38, 3, 1, 'Laundry', 1, 'LA110823031955031', 1, 1000, 1000, 0, 1, 2, 'D', 'Wash & Iron', '2023-08-11 14:39:41', '2023-08-13 00:00:00', '2023-08-14 17:24:35', 1),
(40, 1, 1, 'Laundry', 1, 'LA110823031676031', 2, 500, 1000, 0, 1, 0, 'C', 'Wash & Iron', '2023-08-11 14:59:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(42, 1, 1, 'Laundry', 1, 'LA150823111737641', 1, 500, 500, 0, 1, 0, 'C', 'Wash & Iron', '2023-08-15 11:02:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(43, 1, 1, 'Laundry', 4, 'LA150823121408671', 2, 600, 1200, 0, 1, 2, 'C', 'Wash & Iron', '2023-08-15 11:50:07', '2023-08-17 00:00:00', '0000-00-00 00:00:00', 0),
(44, 3, 1, 'Laundry', 4, 'LA150823121408671', 1, 1400, 1400, 0, 1, 2, 'C', 'Wash & Iron', '2023-08-15 11:50:38', '2023-08-17 00:00:00', '0000-00-00 00:00:00', 0),
(45, 2, 1, 'Laundry', 5, 'LA150823011709521', 3, 600, 1800, 0, 1, 2, 'W', 'Wash & Iron', '2023-08-15 12:00:12', '2023-08-16 00:00:00', '0000-00-00 00:00:00', 0),
(55, 3, 1, 'Laundry', 5, 'KL160823111407731', 0, 1500, 0, 0, 1, 2, 'C', 'Express', '2023-08-16 10:17:19', '2023-08-16 16:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE `sales_returns` (
  `return_id` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returned_by` int(11) NOT NULL,
  `return_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_returns`
--

INSERT INTO `sales_returns` (`return_id`, `invoice`, `store`, `item`, `quantity`, `amount`, `reason`, `returned_by`, `return_date`) VALUES
(1, 'KL160823111407731', 1, 3, 0, 0, '0', 1, '2023-08-16 13:26:55'),
(2, 'KL160823071524671', 1, 2, 1, 600, 'Wrong Input', 1, '2023-08-16 18:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_name`, `phone_number`, `home_address`, `created`) VALUES
(1, 'Paul Ikpefua', '08035716496', '23 Sapele Road', '2022-12-12 13:23:51'),
(2, 'Jerome Boateng', '0807766609090', '24 Sapele Road', '2022-12-12 13:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustments`
--

CREATE TABLE `stock_adjustments` (
  `adjust_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `adjusted_by` int(11) NOT NULL,
  `previous_qty` int(11) NOT NULL,
  `new_qty` int(11) NOT NULL,
  `adjust_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `store` varchar(124) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `company`, `store`, `store_address`, `phone_number`, `date_created`) VALUES
(1, 1, 'Upper Adesuwa', '42 Pz road, off sapele road, Benin city', '07068897068, 07057456881', '2023-04-23 15:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `sub_menu_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `sub_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`sub_menu_id`, `menu`, `sub_menu`, `url`) VALUES
(1, 1, 'Add users', 'add_user'),
(2, 1, 'Disable user', 'disable_user'),
(3, 1, 'Activate User', 'activate_user'),
(4, 1, 'Reset Password', 'reset_password'),
(5, 1, 'Add Category', 'add_department'),
(6, 1, 'Add Sub-category', 'add_category'),
(7, 1, 'Add Items', 'add_item'),
(8, 1, 'Modify Item Name', 'modify_item'),
(9, 1, 'Add Bank', 'add_bank'),
(10, 1, 'Manage Item Prices', 'item_price'),
(11, 1, 'Add Remove Reasons', 'add_remove_reasons'),
(15, 2, 'Sales Return', 'sales_return'),
(16, 2, 'Reprint Receipt', 'print_receipt'),
(24, 4, 'Add Expense Head', 'add_exp_head'),
(25, 4, 'Post expense', 'post_expense'),
(26, 5, 'Item List', 'item_list'),
(27, 5, 'Bank List', 'bank_list'),
(29, 5, 'Sales Return Report', 'sales_return_report'),
(38, 5, 'Item history', ''),
(41, 6, 'Revenue Report', 'revenue_report'),
(42, 6, 'Cash Sales List', 'cash_list'),
(43, 6, 'POS Sales List', 'pos_list'),
(44, 6, 'Transfer Sales List', 'transfer_list'),
(45, 6, 'Cashier Report', 'cashier_report'),
(46, 6, 'Revenue By Category', 'revenue_by_category'),
(47, 6, 'Profit And Loss Statement', 'profit_and_loss'),
(48, 6, 'Expense Report', 'expense_report'),
(49, 5, 'Revenue By Items', 'highest_selling'),
(50, 5, 'Most Washed Items', 'fast_selling'),
(51, 1, 'Change Category', 'change_category'),
(60, 2, 'New Order', 'wholesale'),
(62, 1, 'Add Customer', 'add_customer'),
(63, 5, 'Customer List', 'customer_list'),
(66, 6, 'Customer Statement', 'customer_statement'),
(67, 6, 'Credit Sales List', 'credit_sales_list'),
(68, 6, 'Debtors Report', 'debtors_list'),
(69, 4, 'Pay Debt', 'pay_debt'),
(70, 6, 'Debt Payment Report', 'debt_payment_report'),
(71, 3, 'Wash Clothes', 'wash_clothes'),
(72, 3, 'Iron Clothes', 'iron_clothes'),
(73, 1, 'Add menu', 'add_menu'),
(74, 1, 'Add sub-menu', 'add_sub_menu'),
(76, 1, 'Edit Sub-menu', 'edit_sub_menu'),
(77, 3, 'Issue Items', 'completed_job'),
(78, 3, 'Due For Collection', 'due_collection'),
(79, 5, 'Items Issued Report', 'delivery_report'),
(80, 1, 'Add Store', 'add_store'),
(81, 1, 'Update Store Details', 'update_store'),
(82, 1, 'Add User Rights', 'add_rights'),
(83, 4, 'Fund Wallet', 'fund_wallet'),
(84, 5, 'List Of Users', 'user_list');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transfer_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `from_store` int(11) NOT NULL,
  `to_store` int(11) NOT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `transfer_status` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `accept_by` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `username`, `user_role`, `user_password`, `phone_number`, `email_address`, `home_address`, `status`, `store`, `reg_date`) VALUES
(1, 'Administrator', 'Sysadmin', 'Admin', '$2y$10$BU4JP2GURjls1XHh/0aNQejcNvLVFcPuis6yVM3CnXMC0U175eE92', '', '', '', 1, 1, '2022-09-27 13:47:21'),
(2, 'Kelly', 'Onostar', 'Sales Rep', '$2y$10$/guc2yjTsVg5qYFtRfF/GOQ6eOVHa.191HDFyKHz..U2TzYDIutN2', '', '', '', 0, 1, '2023-07-24 09:27:07'),
(3, 'Admin', 'Admin', 'Admin', '$2y$10$z2nYDcMovL9PHQoqjZ4ZHuOYbuVHyoW4vFJeGErCSUsFXIiYDXBye', '', '', '', 0, 1, '2023-08-12 15:22:43'),
(4, 'User', 'User', 'Sales Rep', '$2y$10$2IwUOiN78WlEkYhwJGkw8eL9RL1xj3ivuj76gktB2BFDOUySfQM42', '', '', '', 0, 1, '2023-08-15 11:35:48'),
(5, 'John Smith', 'Smith', 'Sales Rep', '123', '08100653703', 'test@mail.com', '23 pz road', 0, 1, '2023-08-16 10:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor`, `contact_person`, `phone`, `email_address`, `created_date`) VALUES
(1, 'Oswin Supermarket', 'Mr Oswin', '07057456881', 'oswin@mail.com', '2022-12-10 11:20:54'),
(2, 'Druccicare Pharmacy', 'Pharm Chris Oisakede', '08076765445', 'druci@mail.com', '2022-12-10 11:26:07'),
(3, 'Anambra Supermarket', 'Anambra', '09000', 'ma@mail.com', '2023-01-09 21:24:12'),
(4, 'Initial Stock', 'Nil', '090909', 'nil', '2023-05-31 12:39:18'),
(5, 'K And K Enterprise', 'Kk Dwon', '090989878878', 'kmail@gmail.com', '2023-06-25 21:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `check_ins`
--
ALTER TABLE `check_ins`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_trail`
--
ALTER TABLE `customer_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`debtor_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_heads`
--
ALTER TABLE `expense_heads`
  ADD PRIMARY KEY (`exp_head_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `multiple_payments`
--
ALTER TABLE `multiple_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_payments`
--
ALTER TABLE `other_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `remove_items`
--
ALTER TABLE `remove_items`
  ADD PRIMARY KEY (`remove_id`);

--
-- Indexes for table `remove_reasons`
--
ALTER TABLE `remove_reasons`
  ADD PRIMARY KEY (`remove_id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`right_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_returns`
--
ALTER TABLE `sales_returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  ADD PRIMARY KEY (`adjust_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`sub_menu_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `check_ins`
--
ALTER TABLE `check_ins`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_trail`
--
ALTER TABLE `customer_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `debtor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_heads`
--
ALTER TABLE `expense_heads`
  MODIFY `exp_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `multiple_payments`
--
ALTER TABLE `multiple_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_payments`
--
ALTER TABLE `other_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remove_items`
--
ALTER TABLE `remove_items`
  MODIFY `remove_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remove_reasons`
--
ALTER TABLE `remove_reasons`
  MODIFY `remove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `right_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  MODIFY `adjust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

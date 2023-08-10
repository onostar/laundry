-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 05:34 PM
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
(1, 'Demo Laundry', 'chef pee.png', '2023-04-23 14:46:39');

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
(2, 'Onyema Chima', '07057456881', '24 Sapele Road Benin', 'onyema@mail.com', '2023-07-23 10:12:24');

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
(2, 2, 'Credit sales', 2000, 1, 1, '2023-07-23 10:12:47');

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
(2, 2, 'WS230723111873601', 2000, 1, 0, 1, '2023-07-23 10:12:47');

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
  `pack_price` int(11) NOT NULL,
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

INSERT INTO `items` (`item_id`, `department`, `category`, `item_name`, `cost_price`, `sales_price`, `pack_size`, `pack_price`, `wholesale`, `wholesale_pack`, `reorder_level`, `barcode`, `item_status`, `date_created`) VALUES
(1, '1', 26, 'T-shirts', 0, 500, 0, 0, 0, 0, 10, '00', 0, '2023-07-22 11:14:43'),
(2, '1', 26, 'Long Sleeve', 0, 600, 0, 0, 0, 0, 10, '000', 0, '2023-07-22 11:15:17'),
(3, '1', 27, 'Gowns', 0, 1000, 0, 0, 0, 0, 10, '99', 0, '2023-07-22 11:16:43');

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
(2, 'Sales management'),
(3, 'Inventory'),
(4, 'Financial management'),
(5, 'Reports'),
(6, 'Financial reports'),
(7, 'General Info');

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
(4, 'Wholesale', 2, 2400, 1, 2400, 0, 'Cash', 0, '2023-07-24 08:52:27', 1, 'WS240723091528861');

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
(4, 1, 1, 2),
(5, 1, 2, 2),
(6, 4, 25, 2);

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
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `collection_date` datetime NOT NULL,
  `issued_date` datetime NOT NULL,
  `issued_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item`, `store`, `sales_type`, `customer`, `invoice`, `quantity`, `price`, `total_amount`, `cost`, `posted_by`, `sales_status`, `laundry_status`, `post_date`, `collection_date`, `issued_date`, `issued_by`) VALUES
(11, 3, 1, 'Laundry', 1, 'WS230723101222981', 1, 1200, 1200, 0, 1, 2, 'D', '2023-07-23 09:30:42', '2023-07-25 00:00:00', '2023-07-23 18:49:20', 1),
(12, 2, 1, 'Laundry', 1, 'WS230723101222981', 2, 600, 1200, 0, 1, 2, 'D', '2023-07-23 09:30:57', '2023-07-25 00:00:00', '2023-07-23 18:49:20', 1),
(13, 1, 1, 'Laundry', 1, 'WS230723101777991', 1, 500, 500, 0, 1, 2, 'D', '2023-07-23 09:36:35', '2023-07-26 00:00:00', '2023-07-23 19:54:20', 1),
(14, 3, 1, 'Laundry', 2, 'WS230723111873601', 2, 1000, 2000, 0, 1, 2, 'I', '2023-07-23 10:12:35', '2023-07-26 00:00:00', '2023-05-23 18:49:20', 0),
(16, 3, 1, 'Laundry', 2, 'WS240723091528861', 2, 1200, 2400, 0, 1, 2, 'I', '2023-07-24 08:50:40', '2023-07-25 00:00:00', '0000-00-00 00:00:00', 0);

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
(1, 1, 'PZ office', '42 Pz road, off sapele road, Benin city', '07068897068, 07057456881', '2023-04-23 15:36:25');

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
(12, 2, 'Direct sales', ''),
(13, 2, 'Sales order', ''),
(14, 2, 'Post sales order', ''),
(15, 2, 'Sales Return', 'sales_return'),
(16, 2, 'Reprint Receipt', 'print_receipt'),
(17, 3, 'set reorder level', ''),
(18, 3, 'stock balance', ''),
(19, 3, 'stockin purchases', ''),
(20, 3, 'Add supplier', ''),
(21, 3, 'Adjust quantity', ''),
(22, 3, 'Remove item', ''),
(23, 3, 'Adjust expiration', ''),
(24, 4, 'Add Expense Head', 'add_exp_head'),
(25, 4, 'Post expense', 'post_expense'),
(26, 5, 'Item List', 'item_list'),
(27, 5, 'Bank list', ''),
(28, 5, 'List of suppliers', ''),
(29, 5, 'Sales return report', ''),
(30, 5, 'Stock Adjustment report', ''),
(31, 5, 'Item removed report', ''),
(33, 5, 'Purchase reports', ''),
(34, 5, 'Out of stock', ''),
(35, 5, 'Soon to expire', ''),
(36, 5, 'Expired items', ''),
(37, 5, 'Reached reorder level', ''),
(38, 5, 'Item history', ''),
(39, 5, 'Purchase by item', ''),
(40, 5, 'Purchase per vendor', ''),
(41, 6, 'Sales Report', 'revenue_report'),
(42, 6, 'Cash sales list', ''),
(43, 6, 'POS sales list', ''),
(44, 6, 'Transfer Sales list', ''),
(45, 6, 'Cashier Report', ''),
(46, 6, 'Revenue by category', ''),
(47, 6, 'Profit and Loss statement', ''),
(48, 6, 'Expense report', ''),
(49, 5, 'highest selling items', ''),
(50, 5, 'fast selling items', ''),
(51, 1, 'Change Category', 'change_category'),
(52, 1, 'Update item Barcode', ''),
(53, 3, 'Transfer items', ''),
(54, 3, 'Pending transfer', ''),
(55, 3, 'Accept items', ''),
(56, 3, 'Returned transfer', ''),
(57, 5, 'Transferred items Report', ''),
(58, 5, 'Accept items report', ''),
(59, 3, 'All store balance', ''),
(60, 2, 'Collect Items', 'wholesale'),
(61, 2, 'wholesale order', ''),
(62, 1, 'Add Customer', 'add_customer'),
(63, 5, 'Customer List', 'customer_list'),
(64, 6, 'Retail sales', ''),
(65, 6, 'Wholesale Report', ''),
(66, 6, 'Customer statement', ''),
(67, 6, 'credit sales list', ''),
(68, 6, 'Debtors report', ''),
(69, 4, 'Pay debt', ''),
(70, 6, 'Debt payment report', ''),
(71, 3, 'Wash Clothes', 'wash_clothes'),
(72, 3, 'Iron Clothes', 'iron_clothes'),
(73, 1, 'Add menu', 'add_menu'),
(74, 1, 'Add sub-menu', 'add_sub_menu'),
(75, 7, 'Check Info', 'check_info'),
(76, 1, 'Edit Sub-menu', 'edit_sub_menu'),
(77, 3, 'Completed Job', 'completed_job'),
(78, 3, 'Due For Collection', 'due_collection');

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
  `status` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `username`, `user_role`, `user_password`, `status`, `store`, `reg_date`) VALUES
(1, 'Administrator', 'Admin', 'Admin', '$2y$10$BU4JP2GURjls1XHh/0aNQejcNvLVFcPuis6yVM3CnXMC0U175eE92', 1, 1, '2022-09-27 13:47:21'),
(2, 'Kelly', 'Onostar', 'Sales Rep', '$2y$10$/guc2yjTsVg5qYFtRfF/GOQ6eOVHa.191HDFyKHz..U2TzYDIutN2', 0, 1, '2023-07-24 09:27:07');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_trail`
--
ALTER TABLE `customer_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `debtor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `right_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

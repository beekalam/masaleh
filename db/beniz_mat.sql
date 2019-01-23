-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 11:31 AM
-- Server version: 5.5.31
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beniz_masaleh`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `value`) VALUES
(1, 'wallet_discount', '11'),
(3, 'rules', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `parent` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `orders` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `parent`, `pic`, `orders`, `depth`) VALUES
(18, 'کارواش', 0, '1537695709.png', 0, 0),
(19, 'پنچر گیری', 0, '1537695723.png', 0, 0),
(35, 'کارواش عادی', 18, '', 0, 0),
(37, 'کارواش معمولی', 18, '', 0, 0),
(45, 'تعویض لنت و روغن', 0, '1538988622.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `national_code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `vehicle_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `pelak` varchar(10) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `description` text,
  `wallet_credit` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `mobile`, `code`, `national_code`, `address`, `email`, `password`, `vehicle_id`, `status`, `pelak`, `pic`, `description`, `wallet_credit`, `created_at`) VALUES
(1, 'mohammad', 'mansouri', '09359012419', '6921', '51399865845', 'address test', 'beekalam@gmail.com', NULL, 1, 1, '985285', '1538042627.png', '5561511561', 67880, NULL),
(2, 'ali', 'kala', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, NULL),
(3, 'digi', 'kala', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, NULL),
(5, NULL, NULL, '546456456', '8882', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-14 14:15:20'),
(6, 'مهدی', 'م', '09179177113', '6544', '3331', 'شیراز', 'mn', NULL, 3, 1, '12-0-13-23', '1538209483.jpeg', 'تست', 83762, '2018-08-14 14:18:56'),
(7, NULL, NULL, '234234234', '9850', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-14 14:27:07'),
(8, NULL, NULL, '23232', '1777', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 3670, '2018-08-14 14:32:57'),
(9, NULL, NULL, '454545', '5231', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-14 14:33:17'),
(10, NULL, NULL, '3333', '7616', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 3670, '2018-08-14 14:35:48'),
(11, NULL, NULL, '09173121485 ', '3550', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-15 16:32:13'),
(12, NULL, NULL, '0917716054', '8087', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 1420, '2018-08-17 16:30:17'),
(13, NULL, NULL, '9177171717', '1488', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-17 19:17:20'),
(14, NULL, NULL, '9177172717', '2520', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 3670, '2018-08-17 19:17:49'),
(15, NULL, NULL, '09226123978', '4497', NULL, NULL, NULL, NULL, 0, 0, '', '', '', 3670, '2018-08-26 17:32:50'),
(16, NULL, NULL, '09177160548', '6094', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 6170, '2018-08-31 10:31:37'),
(17, NULL, NULL, '09171111226', '6994', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 3670, '2018-09-02 18:27:57'),
(18, NULL, NULL, '09121724230', '6709', NULL, NULL, NULL, NULL, 0, 1, '', '', '', 3670, '2018-09-09 18:22:08'),
(19, NULL, NULL, '00491751647231', '8272', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, '2018-10-07 22:24:25');

--
-- Triggers `customers`
--
DELIMITER $$
CREATE TRIGGER `trigger_customers_created_at` BEFORE INSERT ON `customers` FOR EACH ROW BEGIN
SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_suggestions`
--

CREATE TABLE `customer_suggestions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `suggestion` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_suggestions`
--

INSERT INTO `customer_suggestions` (`id`, `customer_id`, `suggestion`, `created_at`) VALUES
(1, 1, 'مفت نمی ارزه', '2018-10-08 13:12:04'),
(2, 1, 'مفت نمی ارزه', '2018-10-14 09:53:59');

--
-- Triggers `customer_suggestions`
--
DELIMITER $$
CREATE TRIGGER `trigger_user_suggestions_created_at` BEFORE INSERT ON `customer_suggestions` FOR EACH ROW BEGIN 
SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_request_date` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `user_address` varchar(1024) DEFAULT NULL,
  `order_status` enum('ORDER_CREATED','ORDER_PAID','ORDER_CANCELLED') NOT NULL DEFAULT 'ORDER_CREATED',
  `to_pay` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL,
  `pay_method` enum('BANK_PAYMENT','WALLET_PAYMENT','CASH_PAYMENT') NOT NULL DEFAULT 'BANK_PAYMENT',
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `user_request_date`, `code`, `user_address`, `order_status`, `to_pay`, `date`, `time`, `pay_method`, `title`, `description`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(7, 12, 14, '', 1537494306, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 12500, '', '', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-21 06:15:06', '0000-00-00 00:00:00'),
(8, 12, 14, '', 1537511916, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 12500, '', '', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-21 11:08:36', '0000-00-00 00:00:00'),
(9, 12, 14, '', 1537511956, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 12500, '', '', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-21 11:09:16', '0000-00-00 00:00:00'),
(10, 12, 14, '', 1537511982, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 12500, '', '', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-21 11:09:42', '0000-00-00 00:00:00'),
(11, 12, 14, '', 1537512790, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 12500, '', '', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-21 11:23:10', '0000-00-00 00:00:00'),
(12, 12, 20, '', 1537613380, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-22 14:19:40', '0000-00-00 00:00:00'),
(13, 6, 20, '', 1537614665, 'h', 'ORDER_CREATED', 0, '1397/6/31', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-22 14:41:05', '0000-00-00 00:00:00'),
(14, 6, 20, '', 1537616014, 'test', 'ORDER_CREATED', 0, '1397/6/31', '12:56', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-22 15:03:34', '0000-00-00 00:00:00'),
(15, 6, 20, '', 1537694082, 'انا', 'ORDER_CREATED', 0, '1397/7/1', '04:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-23 12:44:42', '0000-00-00 00:00:00'),
(16, 16, 21, '', 1537724507, '29.60282804761329,52.537718117237084', 'ORDER_CREATED', 0, '1397/7/13', '11:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-23 21:11:47', '0000-00-00 00:00:00'),
(17, 16, 21, '', 1537724508, '29.60282804761329,52.537718117237084', 'ORDER_CREATED', 0, '1397/7/13', '11:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-23 21:11:48', '0000-00-00 00:00:00'),
(18, 16, 21, '', 1537724508, '29.60282804761329,52.537718117237084', 'ORDER_CREATED', 0, '1397/7/13', '11:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-23 21:11:48', '0000-00-00 00:00:00'),
(19, 16, 21, '', 1537724602, '29.604145384980768,52.55008578300476', 'ORDER_CREATED', 0, '1397/7/2', '02:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-23 21:13:22', '0000-00-00 00:00:00'),
(20, 16, 21, '', 1537911304, '29.624302,52.531835', 'ORDER_CREATED', 0, '1397/7/4', '09:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-26 01:05:04', '0000-00-00 00:00:00'),
(21, 17, 21, '', 1538116521, '29.62292701200396,52.527382895350456', 'ORDER_CREATED', 0, '1397/7/14', '08:15', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-28 10:05:21', '0000-00-00 00:00:00'),
(22, 12, 20, '', 1538204020, 'شیراز - چهار راه زندان', 'ORDER_PAID', 0, '1397-01-01', '10:55', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-29 10:23:40', '2018-09-29 10:32:57'),
(23, 12, 20, '', 1538220335, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-29 14:55:35', '0000-00-00 00:00:00'),
(24, 12, 20, '', 1538221315, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-29 15:11:55', '0000-00-00 00:00:00'),
(25, 12, 20, '', 1538285802, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 09:06:42', '0000-00-00 00:00:00'),
(26, 12, 20, '', 1538285868, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 09:07:48', '0000-00-00 00:00:00'),
(27, 12, 20, '', 1538285873, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 0, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 09:07:53', '0000-00-00 00:00:00'),
(28, 12, 20, '', 1538286142, 'شیراز - چهار راه زندان', 'ORDER_PAID', 0, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 09:12:22', '0000-00-00 00:00:00'),
(29, 6, 20, '', 1538290937, 'gf', 'ORDER_PAID', 1350, '1397/7/12', '04:18', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:32:17', '0000-00-00 00:00:00'),
(30, 12, 21, '', 1538290949, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2250, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:32:29', '0000-00-00 00:00:00'),
(31, 1, 21, '', 1538290990, 'شیراز - چهار راه زندان', 'ORDER_CANCELLED', 2250, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:33:10', '2018-10-14 11:41:50'),
(32, 6, 20, '', 1538291019, 'gf', 'ORDER_CREATED', 1500, '1397/7/12', '04:18', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:33:39', '0000-00-00 00:00:00'),
(33, 1, 21, '', 1538291123, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2250, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:35:23', '0000-00-00 00:00:00'),
(34, 1, 21, '', 1538291180, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2250, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:36:20', '0000-00-00 00:00:00'),
(35, 1, 21, '', 1538291247, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2250, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:37:27', '0000-00-00 00:00:00'),
(36, 6, 20, '', 1538291266, 'jgg', 'ORDER_PAID', 1350, '1397/7/10', '03:19', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:37:46', '0000-00-00 00:00:00'),
(37, 6, 20, '', 1538291294, 'jgg', 'ORDER_CREATED', 1500, '1397/7/10', '03:19', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:38:14', '0000-00-00 00:00:00'),
(38, 6, 20, '', 1538291935, 'jgg', 'ORDER_CREATED', 1500, '1397/7/10', '03:19', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:48:55', '0000-00-00 00:00:00'),
(39, 6, 20, '', 1538292138, 'vcf', 'ORDER_CREATED', 1500, '1397/7/18', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:52:18', '0000-00-00 00:00:00'),
(40, 6, 20, '', 1538292211, 'bg', 'ORDER_CREATED', 1500, '1397/7/11', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:53:31', '0000-00-00 00:00:00'),
(41, 6, 20, '', 1538292289, 'rud', 'ORDER_CREATED', 1500, '1397/7/11', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:54:49', '0000-00-00 00:00:00'),
(42, 6, 20, '', 1538292398, 'rud', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:56:38', '0000-00-00 00:00:00'),
(43, 6, 20, '', 1538292542, 'rud', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 10:59:02', '0000-00-00 00:00:00'),
(44, 6, 20, '', 1538292708, 'rfd', 'ORDER_CREATED', 1500, '1397/7/10', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:01:48', '0000-00-00 00:00:00'),
(45, 6, 20, '', 1538292967, 'gf', 'ORDER_CREATED', 1500, '1397/7/11', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:06:07', '0000-00-00 00:00:00'),
(46, 6, 20, '', 1538293079, 'hg', 'ORDER_CREATED', 1500, '1397/7/10', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:07:59', '0000-00-00 00:00:00'),
(47, 6, 20, '', 1538293191, 'gff', 'ORDER_CREATED', 1500, '1397/7/10', '05:25', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:09:52', '0000-00-00 00:00:00'),
(48, 6, 20, '', 1538293392, 'sdd', 'ORDER_CREATED', 1500, '1397/7/18', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:13:12', '0000-00-00 00:00:00'),
(49, 6, 20, '', 1538293457, 'cff', 'ORDER_CREATED', 1500, '1397/7/18', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:14:17', '0000-00-00 00:00:00'),
(50, 6, 20, '', 1538293505, 'gff', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:15:05', '0000-00-00 00:00:00'),
(51, 6, 20, '', 1538293739, 'ff', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:18:59', '0000-00-00 00:00:00'),
(52, 6, 20, '', 1538293837, 'vff', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:20:37', '0000-00-00 00:00:00'),
(53, 6, 20, '', 1538293914, 'hgg', 'ORDER_CREATED', 1500, '1397/7/10', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:21:54', '0000-00-00 00:00:00'),
(54, 1, 21, '', 1538294160, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2225, '1397-01-01', '10:55', 'WALLET_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:26:00', '0000-00-00 00:00:00'),
(55, 6, 20, '', 1538294317, 'uuu', 'ORDER_CREATED', 1500, '1397/7/8', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:28:37', '0000-00-00 00:00:00'),
(56, 6, 20, '', 1538294491, 'uuu', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:31:31', '0000-00-00 00:00:00'),
(57, 6, 20, '', 1538294573, 'tgg', 'ORDER_CANCELLED', 1500, '1397/7/12', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:32:53', '2018-10-14 13:56:05'),
(58, 6, 20, '', 1538294676, 'hhh', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:34:36', '0000-00-00 00:00:00'),
(59, 6, 20, '', 1538294700, 'gg', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:35:00', '0000-00-00 00:00:00'),
(60, 6, 20, '', 1538295447, 'ttt', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:47:27', '0000-00-00 00:00:00'),
(61, 6, 20, '', 1538295451, 'ttt', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:47:31', '0000-00-00 00:00:00'),
(62, 6, 20, '', 1538295855, 'vvv', 'ORDER_CREATED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:54:15', '0000-00-00 00:00:00'),
(63, 6, 20, '', 1538295881, 'ttt', 'ORDER_CANCELLED', 1500, '1397/7/8', '00:00', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-09-30 11:54:41', '2018-10-14 14:00:15'),
(64, 6, 20, '', 1538378586, 'رللل', 'ORDER_CANCELLED', 1500, '1397/7/9', '04:20', 'BANK_PAYMENT', NULL, NULL, NULL, NULL, '2018-10-01 10:53:06', '2018-10-14 13:56:17'),
(65, 1, 21, '', 1538379285, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2225, '1397-01-01', '10:55', 'WALLET_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-01 11:04:45', '0000-00-00 00:00:00'),
(66, 6, 20, '', 1538379809, 'ddfdfdfdfdfdf', 'ORDER_CANCELLED', 1500, '1397/7/9', '03:19', 'BANK_PAYMENT', 'sdf', NULL, 'null', 'null', '2018-10-01 11:13:29', '2018-10-14 13:53:02'),
(67, 16, 21, '', 1538567225, 'آجا کمک احللح', 'ORDER_CANCELLED', 2500, '1397/7/12', '02:15', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-03 15:17:05', '2018-10-14 17:41:57'),
(68, 1, 21, '', 1539420747, 'شیراز - چهار راه زندان', 'ORDER_PAID', 2225, '1397-01-01', '10:55', 'WALLET_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-13 12:22:27', '0000-00-00 00:00:00'),
(69, 1, 21, '', 1539506949, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 21423, '1397-01-01', '14:55:00', 'BANK_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-14 12:19:09', '0000-00-00 00:00:00'),
(70, 6, 21, '', 1539507392, 'لاا', 'ORDER_CANCELLED', 21423, '۱۳۹۷-۰۷-۲۷', '09:00:00', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-14 12:26:32', '2018-10-14 13:43:48'),
(71, 1, 21, '', 1539507552, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 21423, '1397-01-01', '14:55:00', 'BANK_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-14 12:29:12', '0000-00-00 00:00:00'),
(72, 1, 21, '', 1539507569, 'شیراز - چهار راه زندان', 'ORDER_CREATED', 21423, '1397-01-01', '14:55', 'BANK_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-14 12:29:29', '0000-00-00 00:00:00'),
(73, 6, 21, '', 1539507675, 'ثی', 'ORDER_CANCELLED', 21423, '۱۳۹۷-۰۷-۲۲', '02:00:00', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-14 12:31:15', '2018-10-14 13:43:41'),
(74, 6, 21, '', 1539507866, 'رر', 'ORDER_CANCELLED', 21423, '۱۳۹۷-۰۷-۲۲', '02:00:00', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-14 12:34:26', '2018-10-14 13:35:17'),
(75, 6, 21, '', 1539517334, 'ل', 'ORDER_CREATED', 21423, '۱۳۹۷-۰۷-۲۲', '01:00:00', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-14 15:12:14', '0000-00-00 00:00:00'),
(76, 6, 21, '', 1539517479, 'قق', 'ORDER_PAID', 8900, '۱۳۹۷-۰۷-۲۲', '03:00:00', 'WALLET_PAYMENT', '', NULL, '', '', '2018-10-14 15:14:39', '0000-00-00 00:00:00'),
(77, 6, 21, '', 1539518435, 'hhg', 'ORDER_CANCELLED', 21423, '۱۳۹۷-۰۷-۲۲', '01:00:00', 'BANK_PAYMENT', '', NULL, '', '', '2018-10-14 15:30:35', '2018-10-14 15:30:40'),
(78, 1, 23, '', 1539583399, 'شیراز - چهار راه زندان', 'ORDER_CANCELLED', 12321, '1397-07-25', '14:55:00', 'BANK_PAYMENT', 'test title', 'test description', '29.999', '52.333', '2018-10-15 09:33:19', '2018-10-15 10:46:02');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `orders_created_at` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
SET NEW.created_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `orders_updated_at` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_old`
--

CREATE TABLE `orders_old` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_request_date` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `order_type` enum('CART_ORDER','FINAL_ORDER') NOT NULL,
  `shippment_address` varchar(512) DEFAULT NULL,
  `shippment_date` datetime DEFAULT NULL,
  `user_address` varchar(1024) DEFAULT NULL,
  `order_status` enum('ORDER_CREATED','ORDER_CONFIRMED','ORDER_SHIPPED','ORDER_DELIVERED','ORDER_PREPAYMENT_DONE','ORDER_PAID') NOT NULL DEFAULT 'ORDER_CREATED',
  `prepayment_percent` tinyint(4) DEFAULT NULL COMMENT 'درصد پیش پرداخت',
  `prepayment_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_old`
--

INSERT INTO `orders_old` (`id`, `customer_id`, `created_at`, `updated_at`, `user_request_date`, `code`, `order_type`, `shippment_address`, `shippment_date`, `user_address`, `order_status`, `prepayment_percent`, `prepayment_amount`) VALUES
(2, 1, '2018-07-30 12:53:29', '2018-07-31 14:57:27', '2018-11-08 00:00:00', NULL, 'FINAL_ORDER', '', NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CONFIRMED', NULL, NULL),
(5, 1, '2018-08-11 11:12:48', '2018-08-12 14:07:03', '2018-11-08 00:00:00', NULL, 'FINAL_ORDER', NULL, NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CONFIRMED', 40, NULL),
(7, 1, '2018-08-12 10:09:20', '2018-08-12 14:07:30', '1397-05-25 00:00:00', NULL, 'FINAL_ORDER', NULL, NULL, 'شیراز', 'ORDER_CONFIRMED', 40, NULL),
(8, 1, '2018-08-12 12:28:15', '2018-08-12 14:07:37', '1397-05-21 00:00:00', NULL, 'FINAL_ORDER', NULL, NULL, 'غغ', 'ORDER_CONFIRMED', 10, NULL),
(9, 1, '2018-08-12 12:28:37', '2018-08-12 14:07:43', '1397-05-21 00:00:00', NULL, 'FINAL_ORDER', NULL, NULL, 'شیراز', 'ORDER_CONFIRMED', 38, NULL),
(10, 1, '2018-08-12 13:57:37', '2018-08-12 14:07:53', '1397-05-24 00:00:00', 1534066057, 'FINAL_ORDER', NULL, NULL, 'ششش', 'ORDER_CONFIRMED', 9, NULL),
(11, 1, '2018-08-12 14:22:52', '2018-08-12 14:23:00', '1397/5/31', 1534067572, 'FINAL_ORDER', NULL, NULL, 'زاب', 'ORDER_CREATED', NULL, NULL),
(12, 1, '2018-08-12 15:13:54', '2018-08-14 09:45:16', '1397/5/23', 1534070634, 'FINAL_ORDER', NULL, NULL, 'fhf', 'ORDER_CREATED', NULL, NULL),
(13, 1, '2018-08-16 12:07:00', '2018-08-16 12:07:56', '1397/5/26', 1534405020, 'FINAL_ORDER', NULL, NULL, 'uuuuu', 'ORDER_CREATED', NULL, NULL),
(14, 1, '2018-08-16 12:08:31', '2018-08-16 12:09:16', '1397/5/31', 1534405111, 'FINAL_ORDER', NULL, NULL, 'ghg', 'ORDER_CONFIRMED', 40, NULL),
(15, 1, '2018-08-17 16:30:54', '2018-08-17 18:26:57', '1397/5/26', 1534507254, 'FINAL_ORDER', NULL, NULL, 'ااذدننثثارذ', 'ORDER_CREATED', NULL, NULL),
(16, 1, '2018-08-17 18:27:38', '2018-08-17 18:27:51', '1397/5/28', 1534514258, 'FINAL_ORDER', NULL, NULL, 'تتلر', 'ORDER_CREATED', NULL, NULL),
(17, 1, '2018-08-17 18:30:06', '2018-08-20 10:20:04', '1397/5/29', 1534514406, 'FINAL_ORDER', NULL, NULL, 'vhf', 'ORDER_CREATED', NULL, NULL),
(18, 1, '2018-08-26 12:25:11', '2018-08-26 12:25:24', '1397/6/6', 1535270111, 'FINAL_ORDER', NULL, NULL, 'h', 'ORDER_CREATED', NULL, NULL),
(19, 1, '2018-08-26 17:34:05', '2018-08-29 12:02:54', '1397/6/7', 1535288645, 'FINAL_ORDER', NULL, NULL, 'hhh', 'ORDER_CREATED', NULL, NULL),
(20, 1, '2018-09-01 14:06:49', '2018-09-02 09:31:52', '2018-12-08', 1535794609, 'FINAL_ORDER', NULL, NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CREATED', NULL, NULL),
(21, 1, '2018-09-02 09:32:39', '2018-09-02 09:32:57', '2018-12-08', 1535864559, 'FINAL_ORDER', NULL, NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CREATED', NULL, NULL),
(22, 1, '2018-09-02 09:34:05', '2018-09-02 09:34:25', '2018-12-08', 1535864645, 'FINAL_ORDER', NULL, NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CREATED', NULL, NULL),
(23, 1, '2018-09-02 09:37:04', '2018-09-02 09:37:21', '2018-12-08', 1535864824, 'FINAL_ORDER', NULL, NULL, 'شیراز خیابان اردیبهشت برج it', 'ORDER_CREATED', NULL, NULL),
(24, 1, '2018-09-02 14:12:29', '2018-09-10 13:35:48', 'انتخاب', 1535881349, 'FINAL_ORDER', NULL, NULL, '', 'ORDER_CREATED', NULL, NULL),
(25, 1, '2018-09-10 13:40:25', '2018-09-16 09:25:35', 'انتخاب', 1536570625, 'FINAL_ORDER', NULL, NULL, '', 'ORDER_CREATED', NULL, NULL),
(26, 1, '2018-09-16 11:15:49', '0000-00-00 00:00:00', '', 1537080349, 'CART_ORDER', NULL, NULL, NULL, 'ORDER_CREATED', NULL, NULL);

--
-- Triggers `orders_old`
--
DELIMITER $$
CREATE TRIGGER `trigger_orders_created_at` BEFORE INSERT ON `orders_old` FOR EACH ROW BEGIN
SET NEW.created_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triggers_orders_updated_at` BEFORE UPDATE ON `orders_old` FOR EACH ROW BEGIN
SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `admin_confirmed_price` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`id`, `order_id`, `product_id`, `quantity`, `admin_confirmed_price`) VALUES
(2, 2, 17, 3, NULL),
(3, 2, 19, 1, NULL),
(4, 3, 17, 3, 2500),
(5, 4, 17, 3, 0),
(6, 5, 17, 1, 2500),
(7, 6, 17, 3, 0),
(8, 5, 14, 1, 1499),
(9, 7, 14, 1, 1499),
(10, 7, 17, 1, 2500),
(11, 8, 14, 1, 1499),
(12, 9, 14, 1, 1499),
(13, 10, 14, 1, 1499),
(14, 11, 14, 1, 0),
(15, 12, 14, 1, 0),
(16, 13, 14, 1, 0),
(17, 14, 19, 2, 3600),
(18, 15, 17, 221, 0),
(19, 16, 17, 61, 0),
(20, 17, 17, 61, 0),
(21, 17, 14, 1, 0),
(22, 18, 14, 1, 0),
(23, 19, 14, 1, 0),
(24, 20, 14, 1, 0),
(25, 21, 17, 3, 0),
(26, 22, 17, 3, 0),
(27, 23, 17, 3, 0),
(28, 24, 14, 1, 0),
(29, 25, 14, 1, 0),
(31, 26, 17, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `main_cat_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `num_buys` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `main_cat_id`, `price`, `date`, `image`, `sub_cat_id`, `reseller_id`, `visits`, `num_buys`, `created_at`, `updated_at`) VALUES
(20, 'تعویض روغن', 'تعویض روغن مرغوب', 17, 1500, NULL, '', 22, NULL, 178, 0, '2018-09-22 10:15:27', '2018-10-08 09:50:33'),
(21, 'کارواش در محل', 'کارواش در محل', 18, 2500, NULL, '', 35, NULL, 130, 0, '2018-09-22 10:19:01', '2018-10-15 09:05:22'),
(23, 'موتورشویی', 'مدت زمان اجرا 4ساعت می باشد. خشکشویی صندلی، جرم گیری و واکس داشبورد', 18, 0, NULL, '', 35, NULL, 24, 0, '2018-10-04 14:51:46', '2018-10-14 19:07:11');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `trigger_products_before_insert` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
SET NEW.created_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_products_updated_at` BEFORE UPDATE ON `products` FOR EACH ROW BEGIN
SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `customer_id`, `comment`, `status`) VALUES
(6, 14, 1, 'آشغال بود ، آشغال', 0),
(7, 14, 6, 'عالی', 0),
(8, 17, 6, 'تست', 0),
(9, 19, 6, 'عالی', 0),
(10, 20, 6, 'عالی', 0),
(11, 21, 6, 'تست', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(13, 21, '1538652305.jpg'),
(14, 20, '1538652393.jpg'),
(15, 23, '1538652505.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resellers`
--

CREATE TABLE `resellers` (
  `id` int(11) NOT NULL,
  `reseller_firstname` varchar(255) DEFAULT NULL,
  `reseller_lastname` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resellers`
--

INSERT INTO `resellers` (`id`, `reseller_firstname`, `reseller_lastname`, `created_at`, `updated_at`) VALUES
(1, 'احمد', 'عابد زاده', '2018-07-31 10:16:32', NULL);

--
-- Triggers `resellers`
--
DELIMITER $$
CREATE TRIGGER `trigger_resellers_updated_at` BEFORE UPDATE ON `resellers` FOR EACH ROW BEGIN 
SET NEW.updated_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_reserller_created_at` BEFORE INSERT ON `resellers` FOR EACH ROW BEGIN 
SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `service_dates`
--

CREATE TABLE `service_dates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `product_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT '0',
  `used_capacity` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_dates`
--

INSERT INTO `service_dates` (`id`, `date`, `from_time`, `to_time`, `product_id`, `capacity`, `used_capacity`) VALUES
(1, '2018-09-23', '02:00:00', '02:00:00', 20, 5, 0),
(2, '2018-09-30', '14:00:00', '04:00:00', 20, 1, 0),
(4, '2018-10-02', '14:00:00', '04:00:00', 20, 1, 0),
(6, '2018-10-04', '02:00:00', '13:01:00', 20, 1, 0),
(13, '2018-03-21', '14:00:00', '19:00:00', 21, 1, 0),
(16, '2018-10-01', '08:00:00', '00:00:00', 20, 1, 0),
(17, '2018-09-29', '08:00:00', '10:00:00', 20, 1, 0),
(22, '2018-10-14', '01:00:00', '18:00:00', 21, 1, 0),
(23, '2018-10-16', '01:00:00', '22:01:00', 23, 20, 0),
(24, '2018-10-17', '02:01:00', '15:00:00', 23, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `description`) VALUES
(7, '1533369627.jpeg', ''),
(8, '1537696012.jpeg', ''),
(9, '1537696027.jpeg', ''),
(10, '1537696037.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_desc`) VALUES
(1, 'عدد', NULL),
(2, 'تن', NULL),
(3, 'پاکت', NULL),
(4, 'کیلو', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `family` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(5) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_number` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `meli_code` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `user_name`, `password`, `gender`, `phone_number`, `mobile_number`, `meli_code`, `image`, `created_at`, `role`, `isadmin`) VALUES
(11, 'امین', 'فراحی', 'amin.farahi@ymail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'مرد', '37202461', '09171395594', '2280473313', '1519194885.jpg', NULL, 1, 0),
(12, 'کاربر ', 'ادمین', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'مرد', '', '2', '1', '1517727506.jpg', NULL, 1, 1),
(13, 'تست', 'ت', 'test@test.test', '356a192b7913b04c54574d18c28d46e6395428ab', 'مرد', '23423', '234234', '24234234', '1519198799.png', NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vehicle_brand` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_brand`, `vehicle_model`, `pic`) VALUES
(1, '206', 'صندوق دار', NULL),
(12, 'ام وی ام', '110', '1539423807'),
(13, 'ام وی ام', '315', '1539423818'),
(14, 'ام وی ام', '530', '1539423828'),
(15, 'بنز', 'کلاس A', '1539423865'),
(16, 'بنز', 'کلاس B', '1539423883');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_product_prices`
--

CREATE TABLE `vehicle_product_prices` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_product_prices`
--

INSERT INTO `vehicle_product_prices` (`id`, `vehicle_id`, `product_id`, `price`) VALUES
(40, 11, 20, 10000),
(41, 11, 21, 500),
(42, 11, 23, 0),
(43, 16, 20, 1000),
(44, 16, 21, 10000),
(45, 16, 23, 10000),
(46, 15, 20, 20000),
(47, 15, 21, 25000),
(48, 15, 23, 50000),
(49, 1, 20, 900),
(50, 1, 21, 21423),
(51, 1, 23, 12321),
(52, 14, 20, 12000),
(53, 14, 21, 40000),
(54, 14, 23, 15000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_category_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_category_detail` (
`id` int(255)
,`sub_cat_name` varchar(255)
,`parent_cat` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_customer_suggestions`
-- (See below for the actual view)
--
CREATE TABLE `view_customer_suggestions` (
`customer_suggestions_id` int(11)
,`suggestion` text
,`customer_suggestions_created_at` datetime
,`id` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`mobile` varchar(255)
,`code` varchar(255)
,`national_code` varchar(255)
,`address` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`vehicle_id` int(11)
,`status` int(11)
,`pelak` varchar(10)
,`pic` varchar(255)
,`description` text
,`wallet_credit` bigint(20)
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_orders_list`
-- (See below for the actual view)
--
CREATE TABLE `view_orders_list` (
`id` int(11)
,`customer_id` int(11)
,`product_id` int(11)
,`user_request_date` varchar(255)
,`code` int(11)
,`user_address` varchar(1024)
,`order_status` enum('ORDER_CREATED','ORDER_PAID','ORDER_CANCELLED')
,`to_pay` int(11)
,`created_at` datetime
,`updated_at` datetime
,`title` varchar(255)
,`description` text
,`price` int(255)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`mobile` varchar(255)
,`address` varchar(255)
,`email` varchar(255)
,`vehicle_id` int(11)
,`vehicle_brand` varchar(255)
,`vehicle_model` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order_lines_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_order_lines_detail` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products_list`
-- (See below for the actual view)
--
CREATE TABLE `view_products_list` (
`id` int(255)
,`title` varchar(255)
,`description` text
,`main_cat_id` int(255)
,`reseller_id` int(11)
,`sub_cat_id` int(11)
,`sub_cat` varchar(255)
,`visits` int(11)
,`created_at` datetime
,`updated_at` datetime
,`num_buys` int(11)
,`main_cat` varchar(255)
,`reseller_firstname` varchar(255)
,`reseller_lastname` varchar(255)
,`images` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product_comments`
-- (See below for the actual view)
--
CREATE TABLE `view_product_comments` (
`id` int(11)
,`product_id` int(11)
,`customer_id` int(11)
,`comment` text
,`status` tinyint(4)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`title` varchar(255)
,`description` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_cart`
-- (See below for the actual view)
--
CREATE TABLE `view_user_cart` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_user_orders` (
);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `wallets`
--
DELIMITER $$
CREATE TRIGGER `trigger_wallets_created_at` BEFORE INSERT ON `wallets` FOR EACH ROW BEGIN SET NEW.created_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_wallets_upated_at` BEFORE UPDATE ON `wallets` FOR EACH ROW BEGIN SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `amount`, `customer_id`, `order_id`, `created_at`) VALUES
(1, 1200, 1, NULL, '2018-09-29 10:05:40'),
(2, 1200, 1, NULL, '2018-09-29 11:14:41'),
(3, 1200, 1, NULL, '2018-09-29 11:14:45'),
(4, 70, 6, NULL, '2018-09-29 13:01:27'),
(5, 2250, 1, NULL, '2018-09-30 10:35:23'),
(6, 2250, 1, NULL, '2018-09-30 10:36:20'),
(7, 2250, 1, 35, '2018-09-30 10:37:27'),
(8, 1350, 6, 36, '2018-09-30 10:37:46'),
(9, 2225, 1, 54, '2018-09-30 11:26:00'),
(10, 2225, 1, 65, '2018-10-01 11:04:45'),
(11, 2225, 1, 68, '2018-10-13 12:22:27'),
(12, 8900, 6, 76, '2018-10-14 15:14:39');

--
-- Triggers `wallet_transactions`
--
DELIMITER $$
CREATE TRIGGER `trigger_wallet_transactions_created_at` BEFORE INSERT ON `wallet_transactions` FOR EACH ROW BEGIN SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `view_category_detail`
--
DROP TABLE IF EXISTS `view_category_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`beniz_masaleh`@`localhost` SQL SECURITY DEFINER VIEW `view_category_detail`  AS  select `c`.`id` AS `id`,`c`.`cat_name` AS `sub_cat_name`,`c1`.`cat_name` AS `parent_cat` from (`category` `c` join `category` `c1` on((`c`.`parent` = `c1`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_customer_suggestions`
--
DROP TABLE IF EXISTS `view_customer_suggestions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`beniz_masaleh`@`localhost` SQL SECURITY DEFINER VIEW `view_customer_suggestions`  AS  select `customer_suggestions`.`id` AS `customer_suggestions_id`,`customer_suggestions`.`suggestion` AS `suggestion`,`customer_suggestions`.`created_at` AS `customer_suggestions_created_at`,`customers`.`id` AS `id`,`customers`.`firstname` AS `firstname`,`customers`.`lastname` AS `lastname`,`customers`.`mobile` AS `mobile`,`customers`.`code` AS `code`,`customers`.`national_code` AS `national_code`,`customers`.`address` AS `address`,`customers`.`email` AS `email`,`customers`.`password` AS `password`,`customers`.`vehicle_id` AS `vehicle_id`,`customers`.`status` AS `status`,`customers`.`pelak` AS `pelak`,`customers`.`pic` AS `pic`,`customers`.`description` AS `description`,`customers`.`wallet_credit` AS `wallet_credit`,`customers`.`created_at` AS `created_at` from (`customer_suggestions` join `customers` on((`customer_suggestions`.`customer_id` = `customers`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_orders_list`
--
DROP TABLE IF EXISTS `view_orders_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`beniz_masaleh`@`localhost` SQL SECURITY DEFINER VIEW `view_orders_list`  AS  select `orders`.`id` AS `id`,`orders`.`customer_id` AS `customer_id`,`orders`.`product_id` AS `product_id`,`orders`.`user_request_date` AS `user_request_date`,`orders`.`code` AS `code`,`orders`.`user_address` AS `user_address`,`orders`.`order_status` AS `order_status`,`orders`.`to_pay` AS `to_pay`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`products`.`title` AS `title`,`products`.`description` AS `description`,`products`.`price` AS `price`,`customers`.`firstname` AS `firstname`,`customers`.`lastname` AS `lastname`,`customers`.`mobile` AS `mobile`,`customers`.`address` AS `address`,`customers`.`email` AS `email`,`customers`.`vehicle_id` AS `vehicle_id`,`vehicles`.`vehicle_brand` AS `vehicle_brand`,`vehicles`.`vehicle_model` AS `vehicle_model` from (((`orders` left join `products` on((`orders`.`product_id` = `products`.`id`))) left join `customers` on((`orders`.`customer_id` = `customers`.`id`))) left join `vehicles` on((`customers`.`vehicle_id` = `vehicles`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_order_lines_detail`
--
DROP TABLE IF EXISTS `view_order_lines_detail`;
-- Error reading structure for table beniz_masaleh.view_order_lines_detail: #1356 - View 'beniz_masaleh.view_order_lines_detail' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them

-- --------------------------------------------------------

--
-- Structure for view `view_products_list`
--
DROP TABLE IF EXISTS `view_products_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`beniz_masaleh`@`localhost` SQL SECURITY DEFINER VIEW `view_products_list`  AS  select `products`.`id` AS `id`,`products`.`title` AS `title`,`products`.`description` AS `description`,`products`.`main_cat_id` AS `main_cat_id`,`products`.`reseller_id` AS `reseller_id`,`products`.`sub_cat_id` AS `sub_cat_id`,`view_category_detail`.`sub_cat_name` AS `sub_cat`,`products`.`visits` AS `visits`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`products`.`num_buys` AS `num_buys`,`view_category_detail`.`parent_cat` AS `main_cat`,`resellers`.`reseller_firstname` AS `reseller_firstname`,`resellers`.`reseller_lastname` AS `reseller_lastname`,group_concat(`product_images`.`image` separator ',') AS `images` from (((`products` left join `view_category_detail` on((`products`.`sub_cat_id` = `view_category_detail`.`id`))) left join `product_images` on((`products`.`id` = `product_images`.`product_id`))) left join `resellers` on((`products`.`reseller_id` = `resellers`.`id`))) group by `products`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_product_comments`
--
DROP TABLE IF EXISTS `view_product_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`beniz_masaleh`@`localhost` SQL SECURITY DEFINER VIEW `view_product_comments`  AS  select `product_comments`.`id` AS `id`,`product_comments`.`product_id` AS `product_id`,`product_comments`.`customer_id` AS `customer_id`,`product_comments`.`comment` AS `comment`,`product_comments`.`status` AS `status`,`customers`.`firstname` AS `firstname`,`customers`.`lastname` AS `lastname`,`products`.`title` AS `title`,`products`.`description` AS `description` from ((`product_comments` left join `products` on((`product_comments`.`product_id` = `products`.`id`))) left join `customers` on((`product_comments`.`customer_id` = `customers`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_cart`
--
DROP TABLE IF EXISTS `view_user_cart`;
-- Error reading structure for table beniz_masaleh.view_user_cart: #1356 - View 'beniz_masaleh.view_user_cart' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them

-- --------------------------------------------------------

--
-- Structure for view `view_user_orders`
--
DROP TABLE IF EXISTS `view_user_orders`;
-- Error reading structure for table beniz_masaleh.view_user_orders: #1356 - View 'beniz_masaleh.view_user_orders' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_suggestions`
--
ALTER TABLE `customer_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_old`
--
ALTER TABLE `orders_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resellers`
--
ALTER TABLE `resellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_dates`
--
ALTER TABLE `service_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`user_name`),
  ADD UNIQUE KEY `api_token` (`image`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_product_prices`
--
ALTER TABLE `vehicle_product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customer_suggestions`
--
ALTER TABLE `customer_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `orders_old`
--
ALTER TABLE `orders_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `resellers`
--
ALTER TABLE `resellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_dates`
--
ALTER TABLE `service_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vehicle_product_prices`
--
ALTER TABLE `vehicle_product_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

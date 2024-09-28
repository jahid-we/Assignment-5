-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carreantalapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL,
  `brand` varchar(55) NOT NULL,
  `model` varchar(55) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(55) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(400) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Corolla', 'Toyota', 'Corolla', 2020, 'suv', 50.00, 1, 'https://i.ibb.co.com/Tb5y4KC/bg-1.jpg', 1, '2024-09-26 02:20:53', '2024-09-28 09:29:33'),
(2, 'Honda Civic', 'Honda', 'Civic', 2019, 'Sedan', 45.00, 1, 'https://i.ibb.co.com/CsfzNPB/image-3.jpg', 1, '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(3, 'Ford Explorer', 'Ford', 'Explorer', 2021, 'SUV', 80.00, 0, 'https://i.ibb.co.com/SXQKjr6/car-12.jpg', 1, '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(4, 'Chevrolet Camaro', 'Chevrolet', 'Camaro', 2018, 'minivan', 90.00, 1, 'https://i.ibb.co.com/F6kP6my/car-10.jpg', 1, '2024-09-26 02:20:53', '2024-09-28 08:43:28'),
(5, 'Jeep Wrangler', 'Jeep', 'Wrangler', 2021, 'coupe', 85.00, 0, 'https://i.ibb.co.com/qFkGxp2/car-9.jpg', 1, '2024-09-26 02:20:53', '2024-09-28 08:43:16'),
(6, 'Nissan Altima', 'Nissan', 'Altima', 2019, 'Sedan', 55.00, 1, 'https://i.ibb.co.com/n0LFWQt/car-8.jpg', 1, '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(8, 'Audi A6', 'Audi', 'A6', 2021, 'Sedan', 95.00, 1, 'https://i.ibb.co.com/LnJYrcY/car-6.jpg', 1, '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(9, 'Tesla Model 3', 'Tesla', 'Model 3', 2022, 'Sedan', 100.00, 1, 'https://i.ibb.co.com/RDcPpXz/car-3.jpg', 1, '2024-09-26 02:20:53', '2024-09-26 02:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"9cbc7540-faf0-469f-b549-9f74ee55b8cb\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"1\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-28 15:57:37.830237\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727539057, 1727366258),
(2, 'default', '{\"uuid\":\"eabfeb28-85bc-4b6f-9d10-ca82d6104bd7\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"5\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-28 16:45:01.123402\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727541901, 1727369101),
(3, 'default', '{\"uuid\":\"d825453a-8b0f-4f33-bdd2-b443ddaad09b\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"6\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-28 16:45:08.070146\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727541908, 1727369108),
(4, 'default', '{\"uuid\":\"257c34c9-ce5c-4074-8834-7f7c65bbb945\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"8\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-28 17:09:22.328030\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727543362, 1727370562),
(5, 'default', '{\"uuid\":\"1f9b91ed-7b85-4a87-9051-37853c718b5f\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"9\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 05:14:48.975729\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727586888, 1727414089),
(6, 'default', '{\"uuid\":\"87e1905d-99c3-42ea-9a14-412bffc8a892\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"10\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 05:21:58.375211\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727587318, 1727414518),
(7, 'default', '{\"uuid\":\"25ef6b8a-8e66-42f5-a746-c790a63637d7\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"12\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 06:00:15.048457\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727589615, 1727416815),
(8, 'default', '{\"uuid\":\"fb77a008-1278-4ffa-ab12-62089fefa351\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"12\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 06:19:05.744374\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727590745, 1727417945),
(9, 'default', '{\"uuid\":\"dd9adb32-3e4c-4d5c-b293-d512c0e82f62\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"11\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 06:19:07.148276\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727590747, 1727417947),
(10, 'default', '{\"uuid\":\"38eb7b52-e8c1-4560-b93e-e001b32c3689\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:1:\\\"7\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 06:19:09.265480\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727590749, 1727417949),
(11, 'default', '{\"uuid\":\"c6d08109-652d-4cbb-93e3-55ad66295a3f\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"12\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-29 06:32:17.003833\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727591537, 1727418737),
(12, 'default', '{\"uuid\":\"291048f0-8323-4d2b-a6a0-77541d29b507\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"13\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 12:50:27.714559\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727700627, 1727527828),
(13, 'default', '{\"uuid\":\"3e660062-bc7c-48ec-8946-7c3902219ccf\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"15\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:13:47.765162\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727702027, 1727529227),
(14, 'default', '{\"uuid\":\"793ee573-b023-4ef6-9702-5a36510cadfc\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"16\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:14:41.809490\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727702081, 1727529281),
(15, 'default', '{\"uuid\":\"45cb16de-b2e1-42a0-ac3b-100ce849ab89\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"14\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:43:16.066610\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727703796, 1727530996),
(16, 'default', '{\"uuid\":\"8a88a603-2094-4a6f-849a-6fac1086d840\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"17\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:43:38.212436\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727703818, 1727531018),
(17, 'default', '{\"uuid\":\"4c8c5c1f-26ea-4bac-8fa1-1fcf7b283612\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"19\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:58:17.430063\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727704697, 1727531897),
(18, 'default', '{\"uuid\":\"49093c03-2990-4a10-8de2-24a1b51903f3\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"18\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:58:21.532577\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727704701, 1727531901),
(19, 'default', '{\"uuid\":\"458d81fc-a0f5-4f75-a20e-1dc9dfde2fa9\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"20\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 13:59:39.530087\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727704779, 1727531979),
(20, 'default', '{\"uuid\":\"d44bbb3a-9223-4387-ad44-53444e3e1ac1\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"23\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 14:46:00.982490\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727707560, 1727534761),
(21, 'default', '{\"uuid\":\"2987198a-87ce-4fa6-b324-d921c3eabb11\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"22\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 14:46:04.567930\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727707564, 1727534764),
(22, 'default', '{\"uuid\":\"d2857c07-1998-46da-b5f6-77e8876a2fd3\",\"displayName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\DeleteRentalJob\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\DeleteRentalJob\\\":2:{s:11:\\\"\\u0000*\\u0000rentalId\\\";s:2:\\\"24\\\";s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-30 15:24:20.950568\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1727709860, 1727537060);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_09_15_175330_create_users_table', 1),
(3, '2024_09_15_175435_create_cars_table', 1),
(4, '2024_09_15_175512_create_rentals_table', 1),
(5, '2024_09_20_171851_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('Ongoing','Completed','Cancelled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(24, 8, 2, '2024-09-28', '2024-09-30', 90.00, 'Cancelled', '2024-09-28 09:23:38', '2024-09-28 09:24:20'),
(25, 2, 2, '2024-09-28', '2024-09-29', 45.00, 'Ongoing', '2024-09-28 09:30:26', '2024-09-28 09:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL DEFAULT '0',
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `otp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Jahid Hasan', 'jahidhasan370919@gmail.com', '01701367333', '123 Admin St.', '1234', '0', 'admin', '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(2, 'Customer One', 'j.hasan629578@gmail.com', '0987654321', '456 Customer Ave.', '1234', '104519', 'customer', '2024-09-26 02:20:53', '2024-09-28 06:17:35'),
(3, 'Customer Two', 'customer2@example.com', '1122334455', '789 Customer Blvd.', 'password', '0', 'customer', '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(4, 'Customer Three', 'customer3@example.com', '5566778899', '123 Shopping St.', 'password123', '0', 'customer', '2024-09-26 02:20:53', '2024-09-26 02:20:53'),
(8, 'Jahid Hasan Bro', 'JahidHasa22n@gmail.com', '01723232664', 'BrahmanBaria,Bangladesh.', '1234', '0', 'admin', '2024-09-28 09:22:02', '2024-09-28 09:27:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

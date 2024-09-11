-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 10:52 AM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `title`, `description`, `mission`, `vision`, `contact_email`, `contact_phone`, `image_url`, `Updated_at`) VALUES
(1, 'Osiris Online Market (Store)', 'Founded in 2020, our store is dedicated to offering a wide selection of high-quality, carefully curated products to customers all over the world. From handcrafted items to the latest tech gadgets, we believe in providing value and variety, ensuring that every customer can find something they love. Our team works tirelessly to source the best products while delivering an exceptional shopping experience through our user-friendly platform and outstanding customer support.', 'Our mission is to offer our customers high-quality products at affordable prices, ensuring a seamless shopping experience and excellent customer service with every interaction.', 'To become the world’s leading online marketplace where people can find, discover, and purchase the finest quality products, improving lives with every purchase', 'mohamed.abbass356@gmail.com', '+201123519556', 'info.png', '2024-09-10 17:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT 'admindef.png',
  `admin_role` text DEFAULT 'subManger'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `admin_role`) VALUES
(3, 'mohamed', 'mohamed.abbass356@gmail.com', NULL, '$2y$10$q2VcXABNPo8BiMQVW./jf.heJrvleSte6yzD6IEIehxL2rfwWCtiu', '', '2024-07-23 07:43:29', '2024-07-26 12:38:25', 'admindef.png', 'Manger'),
(5, 'mahmoud ali ahmed', 'ahmed.memo356@gmail.com', NULL, '$2y$10$SEdmscrMvMLW9Jd7olhqaeQlLZd2eLhqk3MZgRrd05oJT7jVA6EsW', NULL, '2024-07-27 17:20:58', '2024-07-27 20:59:48', '172211165862.png', 'subManger'),
(6, 'Amemo', 'memo@gmail.com', NULL, '$2y$10$KwH0OpD7pSy/./nzNE8xGuwwiwjUbatUyTu9GOgeuu2A4MQ44VJdC', NULL, '2024-08-13 08:34:35', NULL, '17235380752.jpg', 'subManger'),
(7, 'Mohsen', 'mohsen@gmail.com', NULL, '$2y$10$D6FVDuwNInE7dekkFV3Yieaf5ebgxFXFV6WRwPf8PiYHyKCqxv3.y', NULL, '2024-08-13 08:44:29', NULL, 'admindef.png', 'subManger');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `CartItemID` int(11) NOT NULL,
  `CartID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `state` text NOT NULL DEFAULT 'ready',
  `notifi` text NOT NULL DEFAULT 'notification',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`CartItemID`, `CartID`, `ProductID`, `Quantity`, `state`, `notifi`, `CreatedAt`) VALUES
(6, 3, 12, 1, 'Confirmed', 'notification', '2024-09-08 08:58:43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cartproduct_view`
-- (See below for the actual view)
--
CREATE TABLE `cartproduct_view` (
`cartitem_id` int(11)
,`CartID` int(11)
,`state` text
,`userid` int(11)
,`product_id` int(11)
,`product_name` varchar(100)
,`Product_price` decimal(10,2)
,`products_qnt` int(11)
,`total_price` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `imagepath` text NOT NULL DEFAULT 'category.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `description`, `imagepath`) VALUES
(9, 'Phones', 'Phones are versatile devices used for communication, entertainment, and productivity, ranging from basic models to advanced smartphones with powerful features.', '172552268342.jpg'),
(10, 'SmartWatches', 'Smartwatches are wearable devices that offer fitness tracking, notifications, and app access, combining convenience with style and technology.', '1725522827161.jpg'),
(11, 'TV', 'TVs are entertainment devices that display video content, offering a range of features from streaming to high-definition visuals for an immersive viewing experience.', '17255229475.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_19_093229_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(10) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `size` text NOT NULL DEFAULT 'med',
  `quantity` int(10) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `Status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `userID`, `OrderDate`, `product_id`, `product_name`, `size`, `quantity`, `TotalAmount`, `invoice_no`, `Status`) VALUES
(2, 3, '2024-09-08 09:06:47', 12, 'Samsung Galaxy Smart Watch', 'med', 1, 4850.00, 1725786407, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('lolo@gmail.com', '$2y$10$3.xlI8QHc8jeiJSSNssbv.JYrkoFMJVuTNWBxiZnEn7PnUFuKym.e', '2024-09-04 09:22:08'),
('mohamed@gmail.com', '$2y$10$PiVvW4mPatyAiPUPKtTgz.rPqwPGCCIwIme51bucoiSG4WUiEbmae', '2024-07-25 08:20:00');

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `PhotoID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `PhotoURL` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`PhotoID`, `ProductID`, `PhotoURL`, `CreatedAt`) VALUES
(4, 8, '172552588999.jpeg', '2024-09-05 08:44:49'),
(5, 8, '1725525889100.jpeg', '2024-09-05 08:44:49'),
(6, 8, '1725525889152.jpeg', '2024-09-05 08:44:49'),
(7, 8, '172552588911.jpg', '2024-09-05 08:44:49'),
(8, 9, '1725526083163.jpeg', '2024-09-05 08:48:03'),
(9, 9, '1725526083100.jpeg', '2024-09-05 08:48:03'),
(10, 9, '1725526083241.jpeg', '2024-09-05 08:48:03'),
(11, 10, '172552765442.jpeg', '2024-09-05 09:14:14'),
(12, 10, '172552765439.jpeg', '2024-09-05 09:14:14'),
(13, 11, '172577947683.jpeg', '2024-09-08 07:11:16'),
(14, 11, '1725779476137.jpeg', '2024-09-08 07:11:16'),
(15, 11, '1725779476122.jpg', '2024-09-08 07:11:16'),
(16, 12, '1725779521170.jpeg', '2024-09-08 07:12:00'),
(17, 12, '172577952166.jpeg', '2024-09-08 07:12:00'),
(18, 12, '1725779521116.jpeg', '2024-09-08 07:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `categoryID` int(11) DEFAULT NULL,
  `categoryname` varchar(225) NOT NULL,
  `CreateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `CreatedByAdminID` int(11) DEFAULT NULL,
  `LastModifiedByAdminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `stock`, `categoryID`, `categoryname`, `CreateAt`, `CreatedByAdminID`, `LastModifiedByAdminID`) VALUES
(8, 'Iphone 15Pro', 'The iPhone 15 Pro is Apple\'s latest premium smartphone, featuring a sleek titanium design and advanced technology. It boasts a powerful A17 Pro chip for faster performance, a 6.1-inch Super Retina XDR display, and a ProMotion feature for smoother visuals. The phone comes with an upgraded camera system, offering a 48MP main camera with enhanced low-light capabilities, improved zoom, and professional-level photo and video features. Additionally, it includes USB-C charging, longer battery life, and runs on iOS 17, providing a top-tier experience for users.', 4000.00, 15, 9, 'Phones', '2024-09-05 08:39:57', 3, NULL),
(9, 'Samsung Galaxy S24 Ultra', 'The Samsung Galaxy S24 Ultra is a high-end smartphone that combines cutting-edge technology with premium design. It features a stunning 6.8-inch Dynamic AMOLED display with a high refresh rate for smooth visuals and vibrant colors. Powered by the latest Snapdragon or Exynos chipset (depending on the region), the S24 Ultra offers exceptional performance and speed.  The device boasts a versatile quad-camera system, including a 200MP main sensor, ultra-wide, telephoto, and periscope zoom lenses, providing impressive photo and video quality. It supports advanced features like 8K video recording and enhanced low-light performance.', 65000.00, 20, 9, 'Phones', '2024-09-05 08:41:16', 3, NULL),
(10, 'Samsung Smart 43-Inch TV', 'The Samsung Smart 43-Inch TV offers an immersive viewing experience with its vibrant 4K UHD display. Its sleek and modern design fits seamlessly into any room, while its high-definition screen delivers crisp and detailed visuals.  Equipped with Samsung\'s Smart TV platform, it provides access to a wide range of streaming services, apps, and content with ease. The TV features built-in Wi-Fi for seamless internet connectivity, allowing you to enjoy your favorite shows, movies, and games without additional devices.  With support for various connectivity options, including HDMI and USB ports, the Samsung Smart TV allows you to connect external devices effortlessly. Additionally, its intuitive remote and voice control features make navigating menus and finding content simple and convenient.  Whether you\'re watching sports, movies, or playing games, the Samsung Smart 43-Inch TV enhances your entertainment experience with its sharp image quality and user-friendly smart features.', 26000.00, 100, 11, 'TV', '2024-09-05 08:56:13', 3, NULL),
(11, 'T800 Smart Watch', 'The T800 Smart Watch is a versatile and stylish wearable designed to enhance your daily life with advanced features and functionality. It features a sleek, modern design with a vibrant touch display that provides clear and intuitive navigation.  Key Features:  Health Monitoring: Tracks your heart rate, blood pressure, and blood oxygen levels, helping you keep an eye on your health and fitness. Fitness Tracking: Includes multiple sports modes and GPS functionality to monitor your workouts, steps, and calories burned. Smart Notifications: Receive call, message, and app notifications directly on your wrist, so you stay connected without needing to check your phone constantly. Customizable Watch Faces: Personalize the watch face to match your style and preferences. Long Battery Life: Offers extended battery life to keep up with your busy schedule, with minimal need for frequent recharging. Water Resistance: Built to withstand everyday water exposure, making it suitable for various activities and weather conditions. With its combination of practicality and style, the T800 Smart Watch is an ideal companion for those seeking to balance technology, fitness, and convenience.', 800.00, 150, 10, 'SmartWatches', '2024-09-05 09:23:16', 3, NULL),
(12, 'Samsung Galaxy Smart Watch', 'The Samsung Galaxy Smart Watch is a high-performance wearable that combines advanced technology with a stylish design. It is designed to enhance your daily life through comprehensive health monitoring, fitness tracking, and smart features.  Key Features:  Health Monitoring: Equipped with sensors for heart rate monitoring, ECG, blood oxygen level measurement, and sleep tracking, helping you keep track of your health and wellness. Fitness Tracking: Supports multiple workout modes, built-in GPS, and detailed activity tracking to assist with various fitness goals, whether you’re running, cycling, or swimming. Smart Notifications: Seamlessly integrates with your smartphone to deliver notifications for calls, messages, emails, and app alerts directly to your wrist. Customizable Watch Faces: Allows you to personalize the display with various watch faces and widgets to match your style and preferences. Long Battery Life: Offers extended battery life to keep you connected and on track without frequent recharges. Water Resistance: Designed to withstand water exposure, making it ideal for swimming and use in different weather conditions. The Samsung Galaxy Smart Watch is an excellent choice for those seeking a blend of functionality, style, and cutting-edge technology, offering an enhanced user experience for both health management and daily connectivity.', 4850.00, 30, 10, 'SmartWatches', '2024-09-05 09:27:30', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` >= 1 and `Rating` <= 5),
  `Comment` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `CartID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`CartID`, `userID`, `CreatedAt`) VALUES
(3, 3, '2024-08-17 12:46:18'),
(4, 6, '2024-08-19 14:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phoneNum` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phoneNum`, `password`, `remember_token`, `created_at`, `updated_at`, `blocked`) VALUES
(3, 'mohamed', 'lolo@gmail.com', NULL, '01123519556', '$2y$10$tdEZmrs0djmrf1H/HO5DNeaI4XdlcWK/GuBdM/cZ9IKllcs7flake', NULL, NULL, '2024-09-06 17:33:45', 0),
(6, 'jody', 'loly@gmail.com', NULL, '', '$2y$10$aYmmVw7cVSPowRTjGMJxq.oImva1zd3nAHyxXKInCOF454h81jkAC', NULL, NULL, '2024-09-10 18:56:17', 1);

-- --------------------------------------------------------

--
-- Structure for view `cartproduct_view`
--
DROP TABLE IF EXISTS `cartproduct_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cartproduct_view`  AS SELECT `cartitems`.`CartItemID` AS `cartitem_id`, `cartitems`.`CartID` AS `CartID`, `cartitems`.`state` AS `state`, `shoppingcart`.`userID` AS `userid`, `products`.`ProductID` AS `product_id`, `products`.`Name` AS `product_name`, `products`.`Price` AS `Product_price`, `cartitems`.`Quantity` AS `products_qnt`, `products`.`Price`* `cartitems`.`Quantity` AS `total_price` FROM ((`cartitems` join `products` on(`cartitems`.`ProductID` = `products`.`ProductID`)) join `shoppingcart` on(`cartitems`.`CartID` = `shoppingcart`.`CartID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`CartItemID`),
  ADD KEY `CartID` (`CartID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`PhotoID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `CreatedByAdminID` (`CreatedByAdminID`),
  ADD KEY `LastModifiedByAdminID` (`LastModifiedByAdminID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `userID` (`userID`);

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
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `CartItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `PhotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`CartID`) REFERENCES `shoppingcart` (`CartID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

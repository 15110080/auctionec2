-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2018 lúc 05:10 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ec02_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bidder`
--

CREATE TABLE `bidder` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bidder`
--

INSERT INTO `bidder` (`id`, `name`, `username`, `password`, `address`, `phone_number`, `created_at`) VALUES
(1, 'Long', 'dulong@gmail.com', '1', 'HCM', '123456', '2018-04-29 09:11:28'),
(3, 'Minh', 'nhutminh@gmail.com', '123456', 'HCM', '123456', '2018-05-09 16:32:15'),
(2, 'Chau', 'ChauLe@gmail.com', '123456', 'HCM', '123456', '2018-05-09 16:31:38'),
(4, 'Tai', 'tailam@gmail.com', '1607', 'BH-DN', '01235451879', '2018-05-10 01:59:19'),
(5, 'Hoc', 'thaihoc@gmail.com', '12356', 'KG', '0911789317', '2018-05-10 02:01:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bidder_auctionproduct`
--

CREATE TABLE `bidder_auctionproduct` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_bidder` int(10) UNSIGNED NOT NULL,
  `bid_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bidder_auctionproduct`
--

INSERT INTO `bidder_auctionproduct` (`id_product`, `id_bidder`, `bid_price`, `created_at`) VALUES
(1, 1, 1000, '2018-10-26 03:00:16'),
(1, 1, 2000, '2018-10-25 20:00:16'),
(1, 2, 2000, '2018-10-25 20:00:16'),
(1, 3, 3000, '2018-10-25 20:00:16'),
(9, 3, 734500, '2018-05-10 13:10:47'),
(2, 1, 1080000, '2018-05-09 07:49:59'),
(1, 1, 13000, '2018-05-09 07:50:26'),
(1, 1, 23000, '2018-05-09 07:50:39'),
(1, 1, 33000, '2018-05-09 07:50:40'),
(1, 1, 43000, '2018-05-09 07:50:41'),
(1, 1, 53000, '2018-05-09 07:50:43'),
(1, 1, 63000, '2018-05-09 07:50:47'),
(7, 2, 830000, '2018-05-10 13:07:43'),
(2, 2, 13525000, '2018-05-10 13:03:21'),
(3, 4, 5425000, '2018-05-10 13:06:54'),
(3, 4, 2112000, '2018-05-10 03:36:49'),
(3, 2, 2325000, '2018-05-10 03:37:25'),
(3, 5, 2715000, '2018-05-10 03:37:48'),
(9, 2, 270000, '2018-05-10 03:38:30'),
(9, 4, 326000, '2018-05-10 03:38:44'),
(7, 3, 550000, '2018-05-10 12:21:21'),
(7, 2, 600000, '2018-05-10 12:21:52'),
(7, 4, 670000, '2018-05-10 12:22:14'),
(8, 5, 35000000, '2018-05-10 12:41:18'),
(8, 2, 37000000, '2018-05-10 12:44:39'),
(8, 4, 40000000, '2018-05-10 12:45:01'),
(11, 1, 25500000, '2018-05-10 12:53:46'),
(8, 5, 42350000, '2018-05-10 13:11:37'),
(11, 3, 56980000, '2018-05-10 13:13:20'),
(11, 2, 97540000, '2018-05-10 13:14:14'),
(6, 4, 2350000, '2018-05-10 13:14:50'),
(6, 5, 3467000, '2018-05-10 13:15:02'),
(6, 3, 3789000, '2018-05-10 13:15:25'),
(5, 1, 563460000, '2018-05-10 13:16:24'),
(5, 4, 754681000, '2018-05-10 13:16:46'),
(5, 3, 924570000, '2018-05-10 13:33:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_bidder` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_bidder`, `total_price`) VALUES
(1, 1, 590271000),
(2, 2, 152092000),
(3, 3, 986626500),
(4, 4, 805564000),
(5, 5, 83532000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bidder` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_bidder`, `date_order`, `total`, `payment`, `created_at`) VALUES
(1, 1, '2017-03-21', 400000, 'ATM', '2017-03-21 07:29:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `price`) VALUES
(1, 1, 1, 160000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `price`, `image`, `state`, `created_at`) VALUES
(1, 'OPPO F1 Plus', 1, 'Điện thoại của Sếp', 10000000, 'oppo.jpg', 1, '2018-10-26 03:00:16'),
(2, 'Iphone 6s plus', 1, 'Thiết kế Apple iPhone 6s Plus 64GB Chính hãng', 15000000, 'iphone.jpg', 1, '2018-10-25 20:00:16'),
(3, 'AppleWatch Series 1', 3, 'Đồng hồ thông minh, chính hãng', 7235000, 'applewatchsr1.jpg', 1, '2018-05-10 02:45:55'),
(4, 'Laptop Dell Vostro 5560', 4, 'Máy tính xách tay chính hãng', 14550000, 'laptop-dell.jpg', 1, '2018-05-10 02:49:01'),
(5, 'Audi R8', 2, 'Thiết kế sang trọng và đẳng cấp', 1200000000, 'audi.jpg', 1, '2018-05-10 02:58:14'),
(6, 'Tai nghe AirPod i7', 7, 'Tai nghe Bluetooth phiên bản mới', 4500000, 'airpod.jpg', 1, '2018-05-10 03:03:54'),
(7, 'Máy nghe nhạc Sony', 5, 'Máy nghe nhạc âm thanh nổi mới và chính hãng', 2650000, 'sony-musicplayer.jpg', 1, '2018-05-10 03:05:30'),
(8, 'Tranh Les femmes d’Alger', 9, 'Được vẽ và phác thảo bởi Pablo Picasso', 57000000, 'Les femmes d’Alger.jpg', 1, '2018-05-10 03:07:53'),
(9, 'Áo T-shirt Avenger', 6, 'Được thiết kế với chất liệu cotton xịn', 1300000, 'tshirt-avenger.jpg', 1, '2018-05-10 03:09:13'),
(10, 'Bình gốm sứ kiểu Nhật Bản', 8, 'Phong cách thiết kế theo xu hướng Nhật Bản', 48902000, 'gom-su.jpg', 1, '2018-05-10 03:18:02'),
(11, 'Bát sứ nghìn năm của Trung Quốc', 10, 'chiếc bát sứ có niên đại từ năm 960 đến năm 1127', 157920000, 'bat-su.jpg', 1, '2018-05-10 03:20:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seller`
--

CREATE TABLE `seller` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seller`
--

INSERT INTO `seller` (`id`, `name`, `address`, `phone_number`, `code`, `created_at`) VALUES
(1, 'Long', 'HCM', '123456', '', '2017-03-24 07:14:32'),
(2, 'Tài', 'BH-DN', '1235789', '251', '2018-05-10 13:45:51'),
(3, 'Hoc', 'HCM', '12376549', '234', '2018-05-10 13:46:46'),
(4, 'Minh', 'HCM', '0167895888', '', '2018-05-10 13:54:39'),
(5, 'Châu', 'HCM', '0126789123', '', '2018-05-10 13:55:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seller_auctionproduct`
--

CREATE TABLE `seller_auctionproduct` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_seller` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seller_auctionproduct`
--

INSERT INTO `seller_auctionproduct` (`id_product`, `id_seller`, `created_at`) VALUES
(1, 1, '2018-10-26 03:00:16'),
(2, 3, '2018-05-10 13:56:29'),
(3, 1, '2018-05-10 13:56:36'),
(4, 5, '2018-05-10 13:56:41'),
(5, 4, '2018-05-10 13:56:52'),
(6, 4, '2018-05-10 13:57:04'),
(7, 3, '2018-05-10 13:57:10'),
(8, 2, '2018-05-10 13:57:14'),
(9, 5, '2018-05-10 13:57:19'),
(10, 2, '2018-05-10 13:57:33'),
(11, 1, '2018-05-10 13:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Xe'),
(3, 'Đồng hồ'),
(4, 'Laptop'),
(5, 'Máy nghe nhạc'),
(6, 'Thời trang'),
(7, 'Tai nghe'),
(8, 'Đồ gốm, sứ'),
(9, 'Tranh'),
(10, 'Đồ vật cổ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bidder`
--
ALTER TABLE `bidder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

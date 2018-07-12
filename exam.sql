-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 12, 2018 lúc 12:55 PM
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
-- Cơ sở dữ liệu: `exam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'Beer', 'Thuốc trị bệnh nhút nhát', '2018-07-01 17:00:00', NULL),
(4, 'Rượu', 'Dùng để tiêu sầu', '2018-07-01 17:00:00', NULL),
(5, 'Tobaco', 'Dùng để hút', '2018-07-01 17:00:00', NULL),
(6, 'Beer Giả', 'Thuốc trị bệnh sống lâu', '2018-07-01 17:00:00', NULL),
(7, 'Beer test', 'Thuốc trị mẹ gì thì không biết', '2018-07-01 17:00:00', NULL),
(8, 'Beer rừ', 'Thuốc trị bệnh của người nhật', '2018-07-01 17:00:00', NULL),
(9, 'Test', 'chỉ là để test thôi', '2018-07-01 17:00:00', NULL),
(10, 'tada', 'O la la', '2018-07-12 10:28:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_29_102848_create_admin_table', 2),
(4, '2018_06_29_102919_create_category_table', 2),
(5, '2018_06_29_102948_create_product_table', 2),
(6, '2018_07_03_090809_update_product_table', 3),
(7, '2018_07_06_075017_add_level_status_to_user_table', 4),
(8, '2018_07_11_063756_create_pages_table', 5),
(9, '2018_07_11_065401_update_product_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `Product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_sku`, `product_price`, `Product_image`, `category_id`, `created_at`, `updated_at`) VALUES
(11, 'Heineikennn', 'ken321', 18000, 'public/product/aekb6G0nl6RKfWgkQoV4XHW7getERUljYecWPcJJ.jpeg', 5, '2018-07-10 17:00:00', '2018-07-11 04:18:14'),
(12, 'Huda', 'HUE123', 11000, 'public/product/NSnylIBNMSoPogttsWvEbh44vmO4d4yAZjyxSMvo.jpeg', 4, '2018-07-10 17:00:00', '2018-07-11 03:58:21'),
(13, 'Tao Meo', 'meo321', 65000, 'public/product/zOt7EbsEjWHZqyItgODwlkAY71pqMSotZjxnTY6Y.png', 6, '2018-07-10 17:00:00', NULL),
(14, 'Tiger aa', 'TG321', 20000, 'public/product/Qn9dmkpzQpWUdPEzfGFZ7XpHBbHtcjnSLJidtslR.png', 4, '2018-07-10 17:00:00', '2018-07-11 04:08:41'),
(15, 'Tiger Bạc test', 'TG456', 22000, 'public/product/sFCFCWwZ26kOyYbtxHN78ofMzhv3BGLGW0Kol60H.jpeg', 1, '2018-07-10 17:00:00', '2018-07-11 04:30:24'),
(17, 'Saigon Special', 'SGS123', 12500, 'public/product/HoBnH15KRrhEKUb1uWA6IYZDcwG9rxzJuFRuYPUP.png', 1, '2018-07-10 17:00:00', NULL),
(18, 'Heineiken', 'kennei123', 19000, 'public/product/Vv1MMkL3RmaRgU6e7zdxrlnzrgnvL1haFlLdb0Pp.jpeg', 1, '2018-07-10 17:00:00', NULL),
(21, 'Heineikener', 'rerere', 21000, 'public/product/QHBfsrzrBtAzrXXCogt4gGSomXOsD1jNv2GmqMIL.jpeg', 1, '2018-07-10 17:00:00', NULL),
(28, 'swqswqsd123', 'HUE123adsa', 12300, 'public/product/BEXSxbSIG33yza1HST0ptMdmmyEY9khCmVOlydcA.png', 4, '2018-07-10 17:00:00', '2018-07-12 02:18:20'),
(29, 'Tao cho', 'tao4321', 78000, 'public/product/ik8BwzNJYB5OyriS7siJdPL4B0wo4xvLhHmiHgs0.png', 4, '2018-07-10 17:00:00', '2018-07-12 02:18:38'),
(30, 'Sài Gòn Đỏ', 'SGD1234', 9000, 'public/product/hV53WZvoPULB0GdBJ2lJG38GVepAe6occoq0G8Y4.png', 1, '2018-07-10 17:00:00', NULL),
(31, 'ssasadasadsd', 'dwqdqwdwq', 12300, 'public/product/vnUiLyP1WKurljZFVwvaEmX1XlSr95yjPYDwOln8.jpeg', 7, '2018-07-10 17:00:00', NULL),
(32, 'test asc', 'asc123', 12300, 'public/product/ZDt6vauMiwHBQn1FhwfVXLdhru6jYoQv7gDyMABG.jpeg', 9, '2018-07-12 09:41:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `first_name`, `last_name`, `date_of_birth`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(45, 'Lionel Messi', 'misspensi@gmail.com', '$2y$10$f8flNd//f2ezlQsz.S/RFOUKV3JQ8s6E/QwQkg0f0/YG06lNibVMC', 0, 0, 'Lionel', 'Messi', '2012-01-03', 'public/avatars/fE3MObeQAPIok22bBs2xBJ7rKqMugWzxcFJhqmPM.jpeg', NULL, '2018-07-06 04:00:03', '2018-07-12 00:39:06'),
(46, 'Nguyen Văn Quang', 'quang123@gmail.com', '$2y$10$j0Ny3IrnigwJlLrWR0neG.xz9LGtpjHw7lZQS4QGnvaHuJ59BatDy', 0, 0, 'Nguyen', 'Quang', '2018-07-01', 'public/avatars/zsIMAltmZvCNdXloWB63hLKORzR8WfumZhZYPgPR.jpeg', NULL, '2018-07-08 21:36:53', '2018-07-11 03:21:35'),
(48, 'Nguyen Thi Test', 'test@gmail.com', '$2y$10$vRqiZcT0/c3O.FCIKFuq3OY4zsmTMvF9AbfPaL2I5R.pM4Ow7upqO', 0, 0, 'Nguyen', 'Test', '2018-07-01', 'public/avatars/sb1iwZidMs68yYtK7NpWWQaH7yrMANfc6VlX4KwC.jpeg', 'ZXuHbvJQCPpuVawIK0ECBFIjgz2OQpFCqkRTPq4iwOXFcVnJg6LjKoGDbBl7', '2018-07-09 01:36:41', '2018-07-12 01:36:10'),
(49, 'Nguyen Minh Râu', 'quang123456@gmail.com', '$2y$10$d46V51vRiRz2EJFW5H68AepQrdJ6dH/j6MRxiRUFgy.1BCNZRrHe.', 0, 0, 'Nguyen', 'Râu', '2016-02-01', 'public/avatars/gak2IxhfA8MBZ6OTZsN5gZVHWu1P7yK8BwNr7xXq.jpeg', NULL, '2018-07-09 20:33:10', '2018-07-09 20:33:10'),
(51, 'Administrator', 'admin@gmail.com', '$2y$10$7Tl3BQWbDtqnHhP7gAqyP.ebYqIPIyIpHc4AOdszGWPJlPI/aVMLK', 1, 0, 'Nguyen', 'Quang', '1991-06-05', 'public/avatars/k9RQd2KI8y7kattgIp4ObFI2BqHdwqQvAeI6ODKl.jpeg', 'eKt1IsjwDD2UjrcIjXLvkGqJhMr13YhvT7cQmFO0LfSJ1DhcAnFVwclxwjOT', '2018-07-10 21:47:50', '2018-07-10 21:47:50'),
(52, 'Hà Duy Kiên', 'kane@gmail.com', '$2y$10$a8WKVifhK/YIM6tdVakOZuaHhsT9c.i3Xw1.GksKUXf8jytpkKCna', 0, 0, 'Hà', 'Kiên', '1995-02-13', 'public/avatars/fQaI5EldH3B0kKWUYBB6uUHDfGnY6O9B88GHXMtX.jpeg', NULL, '2018-07-12 00:37:02', '2018-07-12 00:37:02'),
(56, 'Ro bin Hút', 'robin@gmail.com', '$2y$10$PC0a7lj2UOYjQg6gT9Gf4u0zCRMd4iGazl61uDnpxzycIiyA2OAxK', 0, 0, 'Ro', 'Hút', '2018-07-01', 'public/avatars/rPdYHp6H9BrAOZyYdxKNYmruPtLSJqVSbalMK7MW.jpeg', NULL, '2018-07-12 02:26:40', '2018-07-12 02:26:40'),
(57, 'BatMan', 'batman@gmail.com', '$2y$10$Lm5NiuZ21sgcD0O0fkjAlO1I/sTtxhyiplsVB6/FDfDbbXZ9hQ6Cu', 0, 0, 'Bat', 'Man', '2018-07-01', 'public/avatars/1z6badsVgSu5YGhAF5FWX3aUNcOHGwOLhiFEaC3E.jpeg', NULL, '2018-07-12 03:21:09', '2018-07-12 03:21:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_category_name_unique` (`category_name`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_product_name_unique` (`product_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2023 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banquanao3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `taiKhoan` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `taiKhoan`, `password`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'admin_1', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Quần áo công sở', '2023-04-26 16:25:17', '2023-05-15 12:12:10'),
(2, 'Quần áo thể thao', '2023-04-26 16:53:19', '2023-05-15 12:21:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_sanPham` int(11) NOT NULL,
  `tieuDe` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `id_sanPham`, `tieuDe`, `price`, `soluong`, `user_id`) VALUES
(54, 10, 'Quần âu', 2400, 1, 2),
(55, 9, 'Quần âu', 24000000, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(19, 3, 'thi', '1231232131', 'admin@gmail.com', 'thu tiền khi nhận hàng', 'dsfdsfdsfd', 'Quần âu (24000000 x 1) - ', 24000000, '2023-06-07', 'completed'),
(20, 1, 'sdafsdfd', '1231232131', 'admin@gmail.com', 'thẻ tín dụng', '123213', 'Áo thun (24000000 x 1) - ', 24000000, '2023-06-07', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tieuDe` varchar(200) NOT NULL,
  `price` float DEFAULT NULL,
  `hinhAnh` varchar(500) DEFAULT NULL,
  `moTa` longtext DEFAULT NULL,
  `id_danhmuc` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tieuDe`, `price`, `hinhAnh`, `moTa`, `id_danhmuc`, `create_at`, `update_at`) VALUES
(1, 'Quần âu', 10000, 'https://360.com.vn/wp-content/uploads/2022/08/QACTK203-1.jpg', 'fafafafaf', 1, NULL, NULL),
(2, 'Áo Thun', 10000, 'https://onoff.vn/media/catalog/product/cache/ecd9e5267dd6c36af89d5c309a4716fc/18TS22S137.jpg', '', 2, '2023-05-15 09:10:53', '2023-05-15 09:10:53'),
(3, 'Áo thun', 30000, 'https://onoff.vn/media/catalog/product/cache/ecd9e5267dd6c36af89d5c309a4716fc/18TS22S137.jpg', '', 1, '2023-05-15 09:40:57', '2023-05-15 09:40:57'),
(4, 'Áo phông', 30000000, 'https://onoff.vn/media/catalog/product/cache/ecd9e5267dd6c36af89d5c309a4716fc/18TS22S137.jpg', '', 1, '2023-05-15 09:04:58', '2023-05-15 09:04:58'),
(5, 'Quần âu', 30000000, 'https://360.com.vn/wp-content/uploads/2022/08/QACTK203-1.jpg', '', 1, '2023-05-15 09:21:58', '2023-05-15 09:21:58'),
(6, 'Quần âu', 10000, 'https://360.com.vn/wp-content/uploads/2022/08/QACTK203-1.jpg', '', 1, '2023-05-15 09:36:58', '2023-05-15 09:36:58'),
(7, 'Áo phông', 30000000, 'https://lh6.googleusercontent.com/1WWORgYVP-3pC52_-ApTr68JbM-lFWaQubf5vFEZk5CQdarywyOxvvkUQ8OIDTAyUVrD2khohxj2auYdgbo0cZkUnjhPSQoP-mKhnFxwwc3upgwGLyWXqRrsg6esTiA8VQZdhQAe', '', 1, '2023-05-15 10:06:00', '2023-05-15 10:06:00'),
(8, 'Quần âu', 30000000, 'https://360.com.vn/wp-content/uploads/2022/08/QACTK203-1.jpg', '', 1, '2023-05-15 10:27:00', '2023-05-15 10:27:00'),
(9, 'Áo thun', 30000000, 'https://onoff.vn/media/catalog/product/cache/ecd9e5267dd6c36af89d5c309a4716fc/18TS22S137.jpg', '', 1, '2023-05-15 10:41:00', '2023-05-15 10:41:00'),
(10, 'Áo phông', 3000, 'https://cf.shopee.vn/file/6aba1d32171c02c7e0c3d59a5f75fbb8', 'qÆ°qq', 1, '2023-05-15 10:22:01', '2023-05-15 10:22:01'),
(11, 'Áo phông', 10000, 'https://helensew.vn/wp-content/uploads/2021/05/613b9bc7ad3d0ea3aa94b4e3441dd8c0.jpg', '', 1, '2023-05-15 10:24:02', '2023-05-15 10:24:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `hoTen` varchar(30) NOT NULL,
  `taiKhoan` varchar(30) NOT NULL,
  `matKhau` varchar(40) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `diaChi` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`hoTen`, `taiKhoan`, `matKhau`, `sdt`, `diaChi`, `email`, `id`) VALUES
('sdafsdfd', 'thi123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1231232131', '123213', 'admin@gmail.com', 1),
('thi', 'thi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1231232131', 'asdsasadsaasdasd', 'thinguyen016831@gmail.com', 2),
('thi', 'thi1234', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1231232131', 'dsfdsfdsfd', 'admin@gmail.com', 3),
('thi', 'thi113', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1231232131', '123', 'thing@gmail.com', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

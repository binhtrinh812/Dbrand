-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 07:34 PM
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
-- Cơ sở dữ liệu: `dbrand`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `order_id`, `name`, `total`, `code`, `created_at`, `status`) VALUES
(6170, 9885, 'Trịnh Ngọc Bình', 1850000, 0, '2023-10-30 16:54:14', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `create_at`, `updated_at`, `status`, `active`) VALUES
(1, 'Áo Polo', '2022-09-01 15:19:51', '2022-09-01 15:19:51', 1, 1),
(2, 'Áo Vest', '2022-09-01 15:20:00', '2022-09-01 15:20:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`) VALUES
(99, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Phường Trung Sơn Trầm, Thị xã Sơn Tây, Thành phố Hà Nội', 1, '2023-10-05 14:55:03'),
(100, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã Đức Hạnh, Huyện Bảo Lâm, Tỉnh Cao Bằng', 1, '2023-10-05 14:56:06'),
(101, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã An Lâm, Huyện Nam Sách, Tỉnh Hải Dương', 1, '2023-10-05 14:57:06'),
(102, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã Long Châu, Huyện Yên Phong, Tỉnh Bắc Ninh', 1, '2023-10-05 14:59:38'),
(103, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Phường Trung Hưng, Thị xã Sơn Tây, Thành phố Hà Nội', 1, '2023-10-05 15:03:19'),
(104, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Phường Trung Sơn Trầm, Thị xã Sơn Tây, Thành phố Hà Nội', 1, '2023-10-05 15:03:34'),
(105, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Xã Đông Quang, Huyện Ba Vì, Thành phố Hà Nội', 1, '2023-10-05 15:04:19'),
(106, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Phường Hàng Buồm, Quận Hoàn Kiếm, Thành phố Hà Nội', 1, '2023-10-05 15:04:51'),
(107, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Xã Cẩm Lĩnh, Huyện Ba Vì, Thành phố Hà Nội', 1, '2023-10-06 13:23:31'),
(108, 'Nguyễn Thị Machi', 'machinguyen@gmail.com', '0374084556', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã An Thượng, Huyện Yên Thế, Tỉnh Bắc Giang', 1, '2023-10-13 14:24:27'),
(109, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã Đức Hạnh, Huyện Bảo Lâm, Tỉnh Cao Bằng', 1, '2023-10-31 20:57:59'),
(110, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Phường Cẩm Bình, Thành phố Cẩm Phả, Tỉnh Quảng Ninh', 1, '2023-11-29 02:05:36'),
(111, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Xã Dương Xá, Huyện Gia Lâm, Thành phố Hà Nội', 1, '2023-11-30 01:09:58'),
(112, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã Nam Cao, Huyện Bảo Lâm, Tỉnh Cao Bằng', 1, '2023-11-30 16:15:13'),
(113, 'Trịnh Ngọc Bình', 'binhtrinh8122002@gmail.com', '0374989546', 'U01-L68 KĐT Đô Nghĩa - Yên Lộ - Yên Nghĩa - Hà Đông, Xã Duyên Hà, Huyện Thanh Trì, Thành phố Hà Nội', 1, '2023-11-30 16:16:09'),
(114, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Phường Hùng Vương, Thị xã Phú Thọ, Tỉnh Phú Thọ', 1, '2023-11-30 17:08:41'),
(115, 'Bình Trịnh', 'binhtrinh8122002@gmail.com', '0374989546', '31B-Ngõ 3-Hà Trì 4-Hà Cầu-Hà Đông-Hà Nội, Xã Văn Quán, Huyện Lập Thạch, Tỉnh Vĩnh Phúc', 1, '2023-11-30 17:20:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `product_id`, `name`, `phone`, `rate`, `comment`, `created_at`) VALUES
(52, 99, 'Trịnh Ngọc Bình', '0374989546', 0, 'u', '2023-11-29 02:10:11'),
(53, 99, 'Trịnh Ngọc Bình', '0374989546', 0, 'u', '2023-11-29 02:10:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback_img`
--

CREATE TABLE `feedback_img` (
  `id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `payment` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `note`, `status`, `payment`, `created_at`) VALUES
(93, 111, '', 1, 'code', '2023-11-30 01:09:58'),
(1352, 112, '', 1, 'code', '2023-11-30 16:15:13'),
(2505, 115, '', 1, 'code', '2023-11-30 17:20:06'),
(2736, 113, '', 2, 'code', '2023-11-30 16:16:09'),
(2739, 104, '', 1, 'code', '2023-10-05 15:03:34'),
(3140, 114, '', 2, 'code', '2023-11-30 17:08:41'),
(4942, 107, 'CUte', 1, 'code', '2023-10-06 13:23:31'),
(5708, 108, '', 1, 'code', '2023-10-13 14:24:27'),
(6331, 105, '', 1, 'code', '2023-10-05 15:04:19'),
(9559, 109, '', 1, 'code', '2023-10-31 20:57:59'),
(9870, 106, '', 1, 'code', '2023-10-05 15:04:51'),
(9885, 103, '', 3, 'code', '2023-10-05 15:03:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_name`, `product_size`, `price`, `quantity`, `total`, `status`) VALUES
(172, 9885, 91, 'Giày tây nam phối viền GNLA101-20-N', 38, 1850000, 1, 1850000, 1),
(173, 9870, 91, 'Giày tây nam phối viền GNLA101-20-N', 38, 1850000, 1, 1850000, 1),
(174, 4942, 91, 'Giày tây nam phối viền GNLA101-20-N', 38, 1850000, 1, 1850000, 1),
(175, 5708, 91, 'Giày tây nam phối viền GNLA101-20-N', 38, 1850000, 2, 3700000, 1),
(176, 9559, 91, 'Giày tây nam phối viền GNLA101-20-N', 38, 1850000, 2, 3700000, 1),
(178, 93, 99, 'Trịnh Ngọc Bình', 40, 222222, 1, 222222, 1),
(179, 1352, 108, 'Áo Polo Interlock Pique Trơn - 10S23POL031', 38, 390000, 2, 780000, 1),
(180, 2736, 109, 'Áo Polo Interlock Pique Sọc Ngang - 10S23POL023', 38, 399000, 1, 399000, 1),
(181, 3140, 109, 'Áo Polo Interlock Pique Sọc Ngang - 10S23POL023', 38, 399000, 1, 399000, 1),
(182, 2505, 106, 'Áo Polo Interlock Pique - 10S23POL031', 38, 200000, 1, 200000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `avatar`, `created_at`, `updated_at`, `description`, `status`, `active`) VALUES
(12, 1, 'Giày da nam kiểu dáng Oxford', 1800000, '1662051729product-3-0.jpg', '2022-09-02 00:02:09', '2022-09-02 00:02:09', '<p><a href=\"https://laforce.vn/giay-da-nam-kieu-dang-oxford-gnlaaz01-1-d/\">Giày da nam kiểu dáng Oxford</a></p>', 1, -1),
(13, 1, 'Giày da nam vân da rắn nâu đỏ', 1300000, '1662051863product-4.jpg', '2022-09-02 00:04:23', '2022-09-02 00:04:23', '<p><a href=\"https://laforce.vn/giay-da-nam-van-ca-sau-mau-nau-gnlabc001-ndo/\">Giày da nam vân da rắn nâu đỏ</a></p>', 1, -1),
(73, 1, 'Giày Oxford nam phối màu nâu đỏ', 1450000, '1662604069product-5-0.jpg', '2022-09-08 09:27:49', '2022-09-08 09:27:49', '<p><strong>Giày Oxford nam phối màu nâu đỏ</strong></p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, -1),
(74, 2, 'Giày lười nam họa tiết kẻ ca rô', 1700000, '1662604135product-7-0.jpg', '2022-09-08 09:28:55', '2022-09-08 09:28:55', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Họa tiết đai da vắt ngang lưỡi giày cách điệu</li><li>Sản phẩm <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày mọi nam</strong></a> cách điệu với họa tiết nổi ở thân giày tạo cảm giác nam tính</li><li>Mũi giày tròn, bo viền chắc chắn</li><li>Màu: Đen</li></ul>', 1, -1),
(75, 2, 'Giày lười da nam GNLA2122-N', 1750000, '1662604183product-8-0.jpg', '2022-09-08 09:29:43', '2022-09-08 09:29:43', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Thiết kế&nbsp;<a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> họa tiết đan caro độc đáo tạo sự trẻ trung</li><li>Mũi giày tròn</li><li>Đế giày thiết kế chống trơn, trượt</li><li>Màu: Nâu</li></ul>', 1, -1),
(77, 1, 'Giày da Oxford Brogue GNLA9632-1301-D', 1750000, '1662947518product-9-1.jpg', '2022-09-12 08:51:58', '2022-09-12 08:51:58', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Kiểu dáng <a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam</strong></a> với màu sắc trang nhã, hài hòa.</li><li>Thiết kế hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul>', 1, -1),
(78, 1, 'Giày tây nam Oxford Brogues GNLA08-8-D', 2100000, '1662947631product-10-0.jpg', '2022-09-12 08:53:51', '2022-09-12 08:53:51', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Màu sắc trang nhã, hài hòa.</li><li>Phong cách <a href=\"https://laforce.vn/giay-oxford-nam/\"><strong>giày Oxford nam</strong></a> hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul><p>&gt;</p>', 1, -1),
(79, 1, 'Giày tây buộc dây Cap Toe Derby GNLA21021-N', 1950000, '1662947743product-11.jpg', '2022-09-12 08:55:43', '2022-09-12 08:55:43', '<ul><li>Chất liệu da bò nhập khẩu 100%, siêu bền đẹp</li><li>Phom giày mũi nhọn, viền hoạ tiết trên mũi giày</li><li>Đế xẻ rãnh chống trơn trượt</li><li>Màu: Nâu</li><li>Mẫu&nbsp;<a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam cao cấp</strong></a>&nbsp;độc quyền tại Đồ da LaForce</li></ul>', 1, -1),
(80, 2, 'Giày lười da nam Penny Loafer GNLA1199-D', 1150000, '1662947846product-12-0.jpg', '2022-09-12 08:57:26', '2022-09-12 08:57:26', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Thiết kế dạng Penny Loafer với đai da vắt ngang thân giày</li><li>Sản phẩm&nbsp;<a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a>&nbsp;thích hợp đi cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước:&nbsp;</strong>38 – 43</li></ul>', 1, -1),
(81, 2, 'Giày nam Penny Loafer da lộn GNLA0828-N', 1600000, '1662947971product-13-0.jpg', '2022-09-12 08:59:31', '2022-09-12 08:59:31', '<ul><li><strong>Chất liệu</strong>: Da thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Mẫu <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> với màu sắc trang nhã, hài hòa.</li><li>Thiết kế hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Nâu&nbsp;</li><li><strong>Kích thước: </strong>38 – 43</li></ul>', 1, -1),
(82, 2, 'Giày lười nam Penny Loafer GNLA8878-102-D', 1600000, '1662948116product-14.jpg', '2022-09-12 09:01:56', '2022-09-12 09:01:56', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Họa tiết đai da vắt ngang lưỡi giày</li><li>Dáng <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> mũi tròn</li><li>Đế giày thiết kế chống trơn, trượt</li><li>Màu: Đen&nbsp;</li></ul>', 1, -1),
(83, 1, 'Giầy nam họa tiết vân da rắn', 1450000, '1663228752product-1-0.jpg', '2022-09-15 14:59:12', '2022-09-15 14:59:12', '<ul><li>Chất liệu da bò nhập khẩu 100%, siêu bền đẹp</li><li>Thiết kế <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> họa tiết giả vân da cá sấu sang trọng</li><li>Đường chỉ may tỉ mỉ theo tiêu chuẩn Châu Âu</li><li>Màu: Đen</li></ul><p>&gt;</p><p>&gt;</p>', 1, -1),
(84, 1, 'Giày da Oxford nam', 1200000, '1663228840product-2-0.jpg', '2022-09-15 15:00:40', '2022-09-15 15:00:40', '<ul><li>Thiết kế hiện đại</li><li>Kiểu dáng:&nbsp;<a href=\"https://laforce.vn/giay-oxford-nam/\"><strong>giày tây nam Oxford&nbsp;&nbsp;</strong></a></li><li>Đếxẻ rãnh chống trơn trượt</li><li>Mũi tròn hiện đại, dễ kết hợp trang phục</li><li>Đường chỉ may tỉ mỉ theo tiêu chuẩn châu Âu</li><li>Màu: nâu</li></ul><p>&gt;</p>', 1, -1),
(87, 1, 'Giày Oxford Brogues nâu GNLA0819-N', 1700000, '1663813222product-0.jpg', '2022-09-13 09:20:22', '2022-09-22 09:20:22', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Kiểu dáng oxford họa tiết brogues cổ điển sang trọng.</li><li>Kiểu dáng <a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam</strong></a> hiện đại, trang nhã phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Nâu</li><li><strong>Kích thước: </strong>38 – 43</li></ul><p>&gt;</p>', 1, -1),
(88, 2, 'Giày da Penny Loafer GNLA19-5-D', 1650000, '1663813362giay-da-luoi-nam-dai-ngang-gnla19-5-d-1-1.jpg', '2022-09-04 09:22:42', '2022-09-22 09:22:42', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Màu sắc trang nhã, hài hòa.</li><li>Thiết kế <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười da nam</strong></a> hiện đại, trẻ trung phù hợp với các quý ông năng động.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul><p>&gt;</p>', 1, -1),
(89, 2, 'Giày nam Penny Loafer GNLA8246-D', 1800000, '1663813493giay-nam-penny-loafer-gnla8246-d-1.jpg', '2022-09-13 09:24:53', '2022-09-22 09:24:53', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Màu sắc trang nhã, hài hòa.</li><li>Dáng <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Kết hợp cùng quần âu, kaki, trang phục thanh lịch.&nbsp;</li><li><strong>Màu</strong>: Đen</li><li><strong>Kích thước: </strong>38 – 43</li></ul><p>&gt;</p>', 1, -1),
(90, 2, 'Giày nam giả vân da cá sấu viền xỏ dây GNLA55298-3-N', 1700000, '1663813746giay-nam-gia-van-da-ca-sau-vien-xo-day-gnla55298-3-n.jpg', '2022-09-15 09:29:06', '2022-09-22 09:29:06', '<ul><li>Từng đường may kép tỉ mỉ, chắc chắn chạy quanh giày</li><li>Thiết kế thắt dây chạy quanh miệng, thắt nơ đằng trước mũi giày</li><li><a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>Giày lười nam</strong></a> dáng mũi tròn hiện đại</li><li>Đế giày thiết kế chống trơn, trượt</li><li>Màu: Nâu</li><li>Chất liệu da bò nhập khẩu 100%</li><li>Da được xử lý theo đúng quy trình nên sử dụng càng lâu thì giày sẽ càng mềm mại, dẻo dai, bền màu và tăng độ bóng mịn</li></ul><p>&gt;</p>', 1, -1),
(91, 1, 'Giày tây nam phối viền GNLA101-20-N', 1850000, '1663813854giay-tay-nam-phoi-vien-gnla101-20-n.jpg', '2022-09-22 09:30:54', '2022-09-22 09:30:54', '<ul><li>Mũi giày tròn&nbsp;</li><li>Đường chỉ may tỉ mỉ, chắc chắn theo tiêu chuẩn xuất khẩu Châu Âu</li><li>Họa tiết đục lỗ tạo hoa văn độc đáo</li><li>Thiết kế thắt dây hiện đại</li><li>Mẫu <a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam</strong></a> với thiết kế đế chống trơn, trượt</li><li>Màu: Nâu vàng</li><li>Chất liệu da bò nhập khẩu 100%</li><li>Da được xử lý theo đúng quy trình nên sử dụng càng lâu thì giày sẽ càng mềm mại, dẻo dai, bền màu và tăng độ bóng mịn</li></ul>', 1, -1),
(92, 1, 'Giày tây Spectator hai màu da GNLA81711-05-NV', 2400000, '1663814056giay-tay-spectator-hai-mau-da-gnla81711-05-nv.jpg', '2022-09-13 09:34:16', '2022-09-22 09:34:16', '<ul><li>Đường chỉ may tỉ mỉ, chắc chắn theo tiêu chuẩn xuất khẩu Châu Âu</li><li>Kiểu dáng <a href=\"https://laforce.vn/giay-tay-nam/\"><strong>giày tây nam</strong></a> phối hợp hai màu da nâu, trắng cơ bản</li><li>Mũi giày tròn bo viền&nbsp;chắc chắn</li><li>Màu: Nâu vàng</li><li>Chất liệu da bò nhập khẩu 100%</li><li>Da được xử lý theo đúng quy trình nên sử dụng càng lâu thì giày sẽ càng mềm mại, dẻo dai, bền màu và tăng độ bóng mịn&nbsp;</li></ul><p>&gt;</p>', 1, -1),
(93, 1, 'Giày Boots nam da bò GNLA36700-R58-XN', 2900000, '1663814152giay-boots-nam-da-bo-gnla36700-r58-xn-1.jpg', '2022-09-13 09:35:52', '2022-09-22 09:35:52', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Thiết kế dáng boot cao cổ sành điệu</li><li>Sơn bóng với cách phối màu xanh, nâu hiện đại</li><li>Màu sắc trang nhã, hài hòa.</li><li>Kết hợp cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Nâu -&nbsp;</li><li><strong>Kích thước:&nbsp;</strong>38 – 43</li></ul><p>&nbsp;</p><ul><li>Chất liệu da bò nhập khẩu 100% từ châu Âu.</li><li>Da được xử lý theo đúng quy trình nên sử dụng càng lâu thì giày sẽ càng mềm mại, dẻo dai, bền màu và tăng độ bóng mịn.&nbsp;</li><li>Dễ dàng vệ sinh và bảo quản.</li></ul><p>&gt;</p><p>&gt;</p>', 1, -1),
(94, 1, 'Giày Monk Strap GNLAMJDP30-17-CF', 1800000, '1663814231giay-monk-strap-sang-trong-gnlamjdp30-17-cf-2.jpg', '2022-09-13 09:37:11', '2022-09-22 09:37:11', '<ul><li><strong>Chất liệu</strong>: Da bò thật toàn bộ từ châu Âu</li><li>Đường may chi tiết, tỉ mỉ theo tiêu chuẩn.</li><li>Đế giày chắc chắn, chống trơn trượt.</li><li>Màu sắc trang nhã, hài hòa.</li><li>Thiết kế hiện đại, sang trọng phù hợp với các quý ông lịch lãm.</li><li>Sản phẩm <a href=\"https://laforce.vn/giay-luoi-nam/\"><strong>giày lười nam</strong></a> thích hợp đi cùng quần âu, kaki, trang phục lịch sự.&nbsp;</li><li><strong>Màu</strong>: Nâu Cafe</li><li><strong>Kích thước: </strong>38 – 43</li><li>&nbsp;</li><li>Chất liệu da bò nhập khẩu 100% từ châu Âu.</li><li>Da được xử lý theo đúng quy trình nên sử dụng càng lâu thì giày sẽ càng mềm mại, dẻo dai, bền màu và tăng độ bóng mịn.&nbsp;</li><li>Dễ dàng vệ sinh và bảo quản.</li></ul><p>&gt;</p>', 1, -1),
(99, 1, 'Trịnh Ngọc Bình', 222222, '1701197542logo.png', '2023-11-29 01:52:22', '2023-11-29 01:52:22', '<p>121212</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, -1),
(100, 2, 'Bình Trịnh', 43234, '1701330098icon-shortcut-logo.png', '2023-11-30 14:41:38', '2023-11-30 14:41:38', '<p>34324</p><p>&nbsp;</p><p>&gt;</p>', 1, -1),
(101, 1, 'Trịnh Ngọc Bình', 2454, '1701330212news (1).jpg', '2023-11-30 14:43:32', '2023-11-30 14:43:32', '<p>4235</p>', 1, -1),
(102, 1, 'Bình Trịnh', 432432, '1701330256banner-product.jpg', '2023-11-30 14:44:16', '2023-11-30 14:44:16', '<p>12341234</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p><p>&gt;</p><p>&gt;</p><p>&gt;</p>', 1, -1),
(103, 1, 'Áo Polo Phối Màu - 10S23POL032', 299000, '1701334733goods_468546_sub14.png', '2023-11-30 15:58:53', '2023-11-30 15:58:53', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo Polo phom dáng Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế basic với cổ dệt jacquard nổi bật, chỉn chu, tay áo bo rib trẻ trung, màu sắc thời thượng, tạo nên dấu ấn thanh lịch, thời thượng cho quý ông.<br><br>CHẤT LIỆU:<br>- 95% Cotton Organic thoáng khí, thấm mồ hôi vượt trội và thân thiện với làn da<br>- 5% Spandex đem đến độ co giãn nhẹ<br><br>MÀU SẮC: Be 2; Xanh tím than 24; Trắng 6; Đỏ booc đô 6<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(104, 1, 'Áo Polo Tay Bo - 10S23POL054', 299000, '1701334818goods_459713_sub14.png', '2023-11-30 16:00:18', '2023-11-30 16:00:18', '<p><strong>Thông tin sản phẩm</strong></p><p>&nbsp;</p><p>&nbsp;</p><p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&gt;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(105, 1, 'Áo Polo Vải Gân - 10S23POL013', 199000, '1701334872goods_457905_sub15.png', '2023-11-30 16:01:12', '2023-11-30 16:01:12', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(106, 1, 'Áo Polo Interlock Pique - 10S23POL031', 200000, '1701334914goods_458186_sub14.png', '2023-11-30 16:01:54', '2023-11-30 16:01:54', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(107, 1, 'Áo Polo Tay Bo Trơn- 10S23POL099', 399000, '1701334948goods_457936_sub14.png', '2023-11-30 16:02:28', '2023-11-30 16:02:28', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(108, 1, 'Áo Polo Interlock Pique Trơn - 10S23POL031', 390000, '1701334977goods_457834_sub15.png', '2023-11-30 16:02:57', '2023-11-30 16:02:57', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(109, 1, 'Áo Polo Interlock Pique Sọc Ngang - 10S23POL023', 399000, '1701335015goods_445174_sub14.png', '2023-11-30 16:03:35', '2023-11-30 16:03:35', '<p>FORM DÁNG: Regular Fit<br>THIẾT KẾ:<br>- Áo thun ngắn tay phom Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế khỏe khoắn, màu sắc cơ bản dễ kết hợp với nhiều trang phục khác mang tới diện mạo trẻ trung, lịch lãm cho người mặc.<br><br>CHẤT LIỆU:<br>- 95% Cotton thấm hút tốt, thoáng khí, thân thiện với làn da<br>- 5% Spandex tạo độ co giãn nhẹ khi hoạt động<br><br>MÀU SẮC: Đen&nbsp;1; Trắng&nbsp;6; Xanh tím than 24; Đỏ 86; Be 2; Vàng 42<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(110, 1, 'Áo Polo Bo Cổ Chữ V - 10S23POL015', 299000, '1701362751goods_457904_sub15.png', '2023-11-30 23:45:51', '2023-11-30 23:45:51', '<p>FORM DÁNG: Regular Fit<br><br>THIẾT KẾ:<br>- Áo Polo phom dáng Regular Fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế được lấy cảm hứng từ họa tiết logo Aristino cách điệu tạo nên ấn tượng mạnh mẽ. Màu sắc nam tính dễ dàng phối hợp với các trang phục khác nhau để tạo nên diện mạo lịch lãm<br><br>CHẤT LIỆU:<br>- 87.6% Nylon cho bề mặt vải độ mịn mượt, mỏng nhẹ<br>- 12.4% Spandex tạo độ co giãn nhẹ<br><br>MÀU SẮC: Xanh cổ vịt 64 in, Xanh lá mạ 3 in, Trắng 6 in<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&gt;</p>', 1, 1),
(111, 1, 'Áo Polo Tay Ngắn - 10S23POL012', 199000, '1701362803goods_457937_sub14.png', '2023-11-30 23:46:43', '2023-11-30 23:46:43', '<p>FORM DÁNG: Regular Fit<br><br>THIẾT KẾ:<br>- Áo Polo phom dáng Regular fit suông nhẹ nhưng vẫn vừa vặn, tôn dáng tối đa khi mặc<br>- Thiết kế basic với cổ dệt jacquard phối màu nổi bật, chỉn chu, tay áo bo rib trẻ trung, tạo nên dấu ấn thanh lịch, thời thượng cho quý ông.<br><br>CHẤT LIỆU:<br>- 95% Cotton Organic thoáng khí, thấm mồ hôi vượt trội và thân thiện với làn da<br>- 5% Spandex đem đến độ co giãn nhẹ<br><br>MÀU SẮC: Xanh tím than 24; Be 78; Trắng&nbsp;6; Đỏ booc đô 6<br><br>SIZE: S/M/L/XL/XXL</p><p>&nbsp;</p><p>&gt;</p>', 1, 1),
(112, 2, 'Bộ Veston - VES231495', 2500000, '1701363224Bo-vest-nam-ASU00302-tim-than-4-x900x900x4.png', '2023-11-30 23:53:08', '2023-11-30 23:53:08', '<p>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển<br><br>Chất liệu: TR Spandex</p><p>&nbsp;</p><p>&nbsp;</p><p>&gt;</p><p>&gt;</p>', 1, 1),
(113, 2, 'Bộ Veston - VES22284', 3500000, '1701363302Bo-vest-nam-Aristino-ASU00102-Xam-3-x900x900x4.png', '2023-11-30 23:55:02', '2023-11-30 23:55:02', '<p>Mô tả sản phẩm:</p><p>&nbsp;</p><p>Form dáng: Refular fit tạo cảm giác thoải mái cho người mặc<br>Chất liệu: 70% polyesster, 27% rayon, 3% spandex.<br>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển.</p><p>&gt;</p>', 1, 1),
(114, 2, 'Bộ Veston - VES231211', 2850000, '1701363355NTC_8739x900x900x4.png', '2023-11-30 23:55:55', '2023-11-30 23:55:55', '<p>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>&nbsp;</p><p>Chất liệu:TR Spandex</p><p>&gt;</p>', 1, 1),
(115, 2, 'Bộ Veston - VES231423', 3200000, '1701363477bo-suit-nam-aristino-ASUR02-03x900x900x4.png', '2023-11-30 23:57:57', '2023-11-30 23:57:57', '<p>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>&nbsp;</p><p>Chất liệu: TR Spandex</p><p>&gt;</p>', 1, 1),
(116, 2, 'Bộ Veston - VES232132', 3500000, '1701363516bo-suit-nam-aristino-ASUR01-02x900x900x4.png', '2023-11-30 23:58:36', '2023-11-30 23:58:36', '<p>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>&nbsp;</p><p>Chất liệu: TR Spandex</p><p>&gt;</p>', 1, 1),
(117, 2, 'Bộ Veston - VES23543', 220000, '1701363563bo-suit-nam-aristino-ASUR01-11x900x900x4.png', '2023-11-30 23:59:23', '2023-11-30 23:59:23', '<p>Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>&nbsp;</p><p>Chất liệu: TR Spandex</p><p>&gt;</p>', 1, 1),
(118, 2, 'Bộ Veston - VES222122', 2500000, '1701363592bo-suit-nam-aristino-ASU00501-05x900x900x4.png', '2023-11-30 23:59:52', '2023-11-30 23:59:52', '<p>- Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.<br>- Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>- Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>- Chất liệu: TR Spandex</p>', 1, 1),
(119, 2, 'Bộ Veston - VES231488', 3200000, '1701363764bo-suit-nam-aristino-ASU00501-02x900x900x4.png', '2023-12-01 00:00:17', '2023-12-01 00:00:17', '<p>- Bộ Vest Nam được thiết kế và đảm bảo chất lượng theo tiêu chuẩn Nhật Bản.</p><p>- Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.</p><p>- Chất liệu vải nhẹ, thoáng, dễ dàng trong vận động và di chuyển</p><p>- Chất liệu: TR Spandex</p>', 1, 1),
(120, 2, 'Bộ Veston - VES22212', 2600000, '1701363969dsc08728.jpg', '2023-12-01 00:06:09', '2023-12-01 00:06:09', '<p>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải TR Spandex nhẹ, thoáng, dễ dàng trong vận động và di chuyển.</p>', 1, -1),
(121, 2, 'Bộ Veston - VES22321', 2700000, '1701363992iamgesd.jpg', '2023-12-01 00:06:32', '2023-12-01 00:06:32', '<p>Form áo cứng cáp với lớp đệm giúp tôn lên vóc dáng mạnh mẽ, lịch lãm của nam giới.<br>Chất liệu vải TR Spandex nhẹ, thoáng, dễ dàng trong vận động và di chuyển.</p>', 1, -1),
(122, 1, 'Trịnh Ngọc Bình', 555, '1701366004Bàn phím.png', '2023-12-01 00:40:04', '2023-12-01 00:40:04', '<p>4</p>', 1, -1),
(123, 1, 'T1 2023 T1 Uniform Worlds Jersey', 4444000, '1701368014longbao.jpg', '2023-12-01 01:13:34', '2023-12-01 01:13:34', '<p>- <i><strong>\"MỘT MÌNH\"</strong></i> T1 lại phải đối mặt với 4 đại cự đầu của LMHT<strong> </strong>Trung Quốc và họ thắng hết.</p><p>- Các đội tuyển LPL đã rất cố gắng và đã thắng được T1 một ván duy nhất.</p><p>- T1 là hy vọng của LCK, các thành viên T1 đã nhập cuộc và đả bại đối thủ Weibo Gaming với tỷ số 3-0 hoàn hảo.</p>', 1, 1),
(124, 1, '2023 T1 Uniform PINK Jersey', 444000, '17013688840468889e886f58719baa973f7c78feb1.jpg', '2023-12-01 01:14:51', '2023-12-01 01:14:51', '<p>- Là một sản phẩm của nhà vô địch CKTG 2023.</p><p>- Giúp bạn trải nghiệm cảm giác của nhà vô địch mạnh nhất lịch sử Liên minh huyền thoại.</p>', 1, 1),
(125, 1, '2023 T1 Uniform Spring Jersey', 444000, '1701368839074b1a368bc5f92f073d15aa2b0e2525.png', '2023-12-01 01:19:31', '2023-12-01 01:19:31', '<p>- Là một sản phẩm của nhà vô địch CKTG 2023.</p><p>- Giúp bạn trải nghiệm cảm giác của nhà vô địch mạnh nhất lịch sử Liên minh huyền thoại.</p>', 1, 1),
(126, 1, '2023 T1 MSI Uniform Jersey', 444000, '170136897086efecb9f03d602a53b24a84f01f67e4.jpg', '2023-12-01 01:29:30', '2023-12-01 01:29:30', '<p>- Là một sản phẩm của nhà vô địch CKTG 2023.</p><p>- Giúp bạn trải nghiệm cảm giác của nhà vô địch mạnh nhất lịch sử Liên minh huyền thoại.</p>', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'member'),
(10, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(6, '3XL'),
(7, '4XL'),
(3, 'L'),
(2, 'M'),
(1, 'S'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`product_id`, `quantity`, `size_id`, `created_at`) VALUES
(13, 8, 1, '2022-09-18 14:42:18'),
(13, 10, 2, '2022-09-18 14:42:18'),
(13, 10, 3, '2022-09-18 14:42:18'),
(13, 9, 4, '2022-09-18 14:42:18'),
(13, 10, 5, '2022-09-18 14:42:18'),
(13, 9, 6, '2022-09-18 14:42:18'),
(12, 10, 1, '2022-09-18 14:42:18'),
(12, 10, 2, '2022-09-18 14:42:18'),
(12, 10, 3, '2022-09-18 14:42:18'),
(12, 8, 4, '2022-09-18 14:42:18'),
(12, 10, 5, '2022-09-18 14:42:18'),
(12, 10, 6, '2022-09-18 14:42:18'),
(73, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 9, 4, '2022-09-18 14:42:18'),
(73, 9, 5, '2022-09-18 14:42:18'),
(73, 10, 6, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(74, 10, 6, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(75, 10, 2, '2022-09-18 14:42:18'),
(75, 10, 3, '2022-09-18 14:42:18'),
(75, 10, 4, '2022-09-18 14:42:18'),
(75, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 6, '2022-09-18 14:42:18'),
(73, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 9, 4, '2022-09-18 14:42:18'),
(73, 9, 5, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(73, 10, 2, '2022-09-18 14:42:18'),
(73, 10, 3, '2022-09-18 14:42:18'),
(73, 9, 4, '2022-09-18 14:42:18'),
(73, 9, 5, '2022-09-18 14:42:18'),
(74, 10, 1, '2022-09-18 14:42:18'),
(74, 10, 2, '2022-09-18 14:42:18'),
(74, 10, 3, '2022-09-18 14:42:18'),
(74, 10, 4, '2022-09-18 14:42:18'),
(74, 10, 5, '2022-09-18 14:42:18'),
(75, 10, 1, '2022-09-18 14:42:18'),
(75, 10, 2, '2022-09-18 14:42:18'),
(75, 10, 3, '2022-09-18 14:42:18'),
(75, 10, 4, '2022-09-18 14:42:18'),
(75, 10, 5, '2022-09-18 14:42:18'),
(77, 10, 1, '2022-09-18 14:42:18'),
(77, 10, 2, '2022-09-18 14:42:18'),
(77, 10, 3, '2022-09-18 14:42:18'),
(77, 9, 4, '2022-09-18 14:42:18'),
(77, 10, 5, '2022-09-18 14:42:18'),
(78, 10, 1, '2022-09-18 14:42:18'),
(78, 10, 2, '2022-09-18 14:42:18'),
(78, 10, 3, '2022-09-18 14:42:18'),
(78, 10, 4, '2022-09-18 14:42:18'),
(78, 10, 5, '2022-09-18 14:42:18'),
(79, 10, 1, '2022-09-18 14:42:18'),
(79, 10, 2, '2022-09-18 14:42:18'),
(79, 10, 3, '2022-09-18 14:42:18'),
(79, 10, 4, '2022-09-18 14:42:18'),
(79, 10, 5, '2022-09-18 14:42:18'),
(80, 10, 1, '2022-09-18 14:42:18'),
(80, 10, 2, '2022-09-18 14:42:18'),
(80, 10, 3, '2022-09-18 14:42:18'),
(80, 10, 4, '2022-09-18 14:42:18'),
(80, 10, 5, '2022-09-18 14:42:18'),
(81, 10, 1, '2022-09-18 14:42:18'),
(81, 10, 2, '2022-09-18 14:42:18'),
(81, 10, 3, '2022-09-18 14:42:18'),
(81, 10, 4, '2022-09-18 14:42:18'),
(81, 10, 5, '2022-09-18 14:42:18'),
(82, 10, 1, '2022-09-18 14:42:18'),
(82, 10, 2, '2022-09-18 14:42:18'),
(82, 10, 3, '2022-09-18 14:42:18'),
(82, 10, 4, '2022-09-18 14:42:18'),
(82, 10, 5, '2022-09-18 14:42:18'),
(83, 10, 1, '2022-09-18 14:42:18'),
(83, 9, 2, '2022-09-18 14:42:18'),
(83, 6, 6, '2022-09-18 14:42:18'),
(83, 10, 1, '2022-09-18 14:42:18'),
(83, 9, 2, '2022-09-18 14:42:18'),
(83, 6, 6, '2022-09-18 14:42:18'),
(84, 20, 2, '2022-09-19 00:37:09'),
(84, 20, 4, '2022-09-19 00:37:09'),
(84, 16, 5, '2022-09-19 00:37:09'),
(87, 20, 1, '2022-09-22 09:50:55'),
(87, 20, 2, '2022-09-22 09:50:56'),
(87, 20, 3, '2022-09-22 09:50:56'),
(87, 20, 4, '2022-09-22 09:50:56'),
(87, 20, 5, '2022-09-22 09:50:56'),
(87, 20, 6, '2022-09-22 09:50:56'),
(91, 19, 1, '2022-09-22 09:51:17'),
(91, 20, 2, '2022-09-22 09:51:17'),
(91, 20, 3, '2022-09-22 09:51:17'),
(91, 19, 4, '2022-09-22 09:51:17'),
(91, 15, 5, '2022-09-22 09:51:17'),
(91, 18, 6, '2022-09-22 09:51:17'),
(92, 20, 3, '2022-09-22 09:51:37'),
(92, 20, 4, '2022-09-22 09:51:37'),
(92, 20, 5, '2022-09-22 09:51:37'),
(92, 20, 6, '2022-09-22 09:51:37'),
(93, 20, 1, '2022-09-22 09:51:58'),
(93, 20, 2, '2022-09-22 09:51:58'),
(93, 20, 3, '2022-09-22 09:51:58'),
(93, 20, 4, '2022-09-22 09:51:58'),
(93, 19, 5, '2022-09-22 09:51:58'),
(93, 19, 6, '2022-09-22 09:51:58'),
(89, 20, 1, '2022-09-22 09:52:15'),
(89, 20, 2, '2022-09-22 09:52:15'),
(89, 20, 3, '2022-09-22 09:52:15'),
(89, 20, 4, '2022-09-22 09:52:15'),
(89, 20, 5, '2022-09-22 09:52:15'),
(89, 20, 6, '2022-09-22 09:52:15'),
(94, 20, 1, '2022-09-22 09:52:55'),
(94, 20, 2, '2022-09-22 09:52:55'),
(94, 20, 3, '2022-09-22 09:52:55'),
(94, 20, 4, '2022-09-22 09:52:55'),
(94, 20, 5, '2022-09-22 09:52:55'),
(94, 20, 6, '2022-09-22 09:52:55'),
(90, 10, 1, '2022-09-22 09:54:18'),
(90, 10, 2, '2022-09-22 09:54:18'),
(90, 10, 3, '2022-09-22 09:54:18'),
(90, 10, 4, '2022-09-22 09:54:18'),
(90, 10, 5, '2022-09-22 09:54:18'),
(90, 9, 6, '2022-09-22 09:54:18'),
(88, 10, 2, '2022-09-22 09:54:31'),
(88, 10, 3, '2022-09-22 09:54:31'),
(88, 10, 4, '2022-09-22 09:54:31'),
(88, 10, 5, '2022-09-22 09:54:31'),
(88, 10, 6, '2022-09-22 09:54:31'),
(93, 9, 5, '2022-09-22 09:57:57'),
(93, 9, 6, '2022-09-22 09:57:57'),
(99, 88, 3, '2023-11-29 01:52:55'),
(102, 5, 3, '2023-11-30 14:48:28'),
(102, 5, 2, '2023-11-30 14:50:24'),
(102, 55, 2, '2023-11-30 14:51:15'),
(102, 65, 6, '2023-11-30 14:51:56'),
(100, 44, 6, '2023-11-30 14:52:07'),
(109, 4, 2, '2023-11-30 16:03:54'),
(108, 33, 3, '2023-11-30 16:04:00'),
(107, 22, 1, '2023-11-30 16:04:07'),
(106, 55, 5, '2023-11-30 16:04:13'),
(105, 65, 3, '2023-11-30 16:04:23'),
(104, 23, 6, '2023-11-30 16:04:32'),
(103, 56, 3, '2023-11-30 16:04:42'),
(109, 22, 1, '2023-11-30 16:47:50'),
(109, 22, 2, '2023-11-30 16:47:50'),
(109, 22, 3, '2023-11-30 16:47:50'),
(109, 22, 4, '2023-11-30 16:47:50'),
(109, 22, 5, '2023-11-30 16:47:50'),
(109, 22, 6, '2023-11-30 16:47:50'),
(108, 234, 1, '2023-11-30 16:48:01'),
(108, 234, 2, '2023-11-30 16:48:01'),
(108, 234, 3, '2023-11-30 16:48:01'),
(108, 234, 4, '2023-11-30 16:48:01'),
(108, 234, 5, '2023-11-30 16:48:01'),
(108, 234, 6, '2023-11-30 16:48:01'),
(107, 65, 1, '2023-11-30 16:48:11'),
(107, 65, 2, '2023-11-30 16:48:11'),
(107, 65, 3, '2023-11-30 16:48:11'),
(107, 65, 4, '2023-11-30 16:48:11'),
(107, 65, 5, '2023-11-30 16:48:11'),
(107, 65, 6, '2023-11-30 16:48:11'),
(106, 88, 1, '2023-11-30 16:48:25'),
(106, 88, 2, '2023-11-30 16:48:25'),
(106, 88, 3, '2023-11-30 16:48:25'),
(106, 88, 4, '2023-11-30 16:48:25'),
(106, 88, 5, '2023-11-30 16:48:25'),
(106, 88, 6, '2023-11-30 16:48:25'),
(105, 34, 1, '2023-11-30 16:48:36'),
(105, 34, 2, '2023-11-30 16:48:36'),
(105, 34, 3, '2023-11-30 16:48:36'),
(105, 34, 4, '2023-11-30 16:48:36'),
(105, 34, 5, '2023-11-30 16:48:36'),
(105, 34, 6, '2023-11-30 16:48:36'),
(104, 45, 1, '2023-11-30 16:48:49'),
(104, 45, 2, '2023-11-30 16:48:49'),
(104, 45, 3, '2023-11-30 16:48:49'),
(104, 45, 4, '2023-11-30 16:48:49'),
(104, 45, 5, '2023-11-30 16:48:49'),
(104, 45, 6, '2023-11-30 16:48:49'),
(104, 99, 1, '2023-11-30 16:49:00'),
(104, 99, 2, '2023-11-30 16:49:00'),
(104, 99, 3, '2023-11-30 16:49:00'),
(104, 99, 4, '2023-11-30 16:49:00'),
(104, 99, 5, '2023-11-30 16:49:00'),
(104, 99, 6, '2023-11-30 16:49:00'),
(103, 88, 1, '2023-11-30 16:49:12'),
(103, 88, 2, '2023-11-30 16:49:12'),
(103, 88, 3, '2023-11-30 16:49:12'),
(103, 88, 4, '2023-11-30 16:49:12'),
(103, 88, 5, '2023-11-30 16:49:12'),
(103, 88, 6, '2023-11-30 16:49:12'),
(110, 12, 1, '2023-11-30 23:48:02'),
(110, 12, 2, '2023-11-30 23:48:02'),
(110, 12, 3, '2023-11-30 23:48:02'),
(110, 12, 4, '2023-11-30 23:48:02'),
(110, 12, 5, '2023-11-30 23:48:02'),
(110, 12, 6, '2023-11-30 23:48:02'),
(111, 43, 1, '2023-11-30 23:48:16'),
(111, 43, 2, '2023-11-30 23:48:16'),
(111, 43, 3, '2023-11-30 23:48:16'),
(111, 43, 4, '2023-11-30 23:48:16'),
(111, 43, 5, '2023-11-30 23:48:16'),
(111, 43, 6, '2023-11-30 23:48:16'),
(112, 77, 1, '2023-11-30 23:53:27'),
(112, 77, 2, '2023-11-30 23:53:27'),
(112, 77, 3, '2023-11-30 23:53:27'),
(112, 77, 4, '2023-11-30 23:53:27'),
(112, 77, 5, '2023-11-30 23:53:27'),
(112, 77, 6, '2023-11-30 23:53:27'),
(115, 43, 1, '2023-11-30 23:58:52'),
(115, 43, 2, '2023-11-30 23:58:52'),
(115, 43, 3, '2023-11-30 23:58:52'),
(115, 43, 4, '2023-11-30 23:58:52'),
(115, 43, 5, '2023-11-30 23:58:52'),
(115, 43, 6, '2023-11-30 23:58:52'),
(113, 54, 1, '2023-12-01 00:00:29'),
(113, 54, 2, '2023-12-01 00:00:29'),
(113, 54, 3, '2023-12-01 00:00:29'),
(113, 54, 4, '2023-12-01 00:00:29'),
(113, 54, 5, '2023-12-01 00:00:29'),
(113, 54, 6, '2023-12-01 00:00:29'),
(116, 55, 1, '2023-12-01 00:00:40'),
(116, 55, 2, '2023-12-01 00:00:40'),
(116, 55, 3, '2023-12-01 00:00:40'),
(116, 55, 4, '2023-12-01 00:00:40'),
(116, 55, 5, '2023-12-01 00:00:40'),
(116, 55, 6, '2023-12-01 00:00:40'),
(114, 33, 1, '2023-12-01 00:00:58'),
(117, 15, 1, '2023-12-01 00:01:11'),
(117, 15, 2, '2023-12-01 00:01:11'),
(117, 15, 3, '2023-12-01 00:01:11'),
(117, 15, 4, '2023-12-01 00:01:11'),
(117, 15, 5, '2023-12-01 00:01:11'),
(117, 15, 6, '2023-12-01 00:01:11'),
(118, 19, 1, '2023-12-01 00:02:18'),
(118, 19, 2, '2023-12-01 00:02:18'),
(118, 19, 3, '2023-12-01 00:02:18'),
(118, 19, 4, '2023-12-01 00:02:18'),
(118, 19, 5, '2023-12-01 00:02:18'),
(118, 19, 6, '2023-12-01 00:02:18'),
(119, 23, 1, '2023-12-01 00:02:29'),
(119, 23, 2, '2023-12-01 00:02:29'),
(119, 23, 3, '2023-12-01 00:02:29'),
(119, 23, 4, '2023-12-01 00:02:29'),
(119, 23, 5, '2023-12-01 00:02:29'),
(119, 23, 6, '2023-12-01 00:02:29'),
(122, 4, 1, '2023-12-01 00:40:17'),
(123, 4, 6, '2023-12-01 01:14:16'),
(123, 4, 7, '2023-12-01 01:14:16'),
(123, 4, 3, '2023-12-01 01:14:16'),
(123, 4, 2, '2023-12-01 01:14:16'),
(123, 4, 1, '2023-12-01 01:14:16'),
(123, 4, 4, '2023-12-01 01:14:16'),
(123, 4, 5, '2023-12-01 01:14:16'),
(124, 44, 6, '2023-12-01 01:15:03'),
(124, 44, 7, '2023-12-01 01:15:03'),
(124, 44, 3, '2023-12-01 01:15:03'),
(124, 44, 2, '2023-12-01 01:15:03'),
(124, 44, 1, '2023-12-01 01:15:03'),
(124, 44, 4, '2023-12-01 01:15:03'),
(124, 44, 5, '2023-12-01 01:15:03'),
(125, 444, 6, '2023-12-01 01:20:21'),
(125, 444, 7, '2023-12-01 01:20:21'),
(125, 444, 3, '2023-12-01 01:20:21'),
(125, 444, 2, '2023-12-01 01:20:21'),
(125, 444, 1, '2023-12-01 01:20:21'),
(125, 444, 4, '2023-12-01 01:20:21'),
(125, 444, 5, '2023-12-01 01:20:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'null',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `avatar`, `status`, `created_at`, `role_id`) VALUES
(3, 'binhtrinh8122002@gmail.com', '123456', 'Trinh Ngoc Binh', 'null', 1, '2022-09-19 23:55:18', 10),
(4, 'minhdang@gmail.com', '123456', 'Nguyen Truong Minh Dang', 'null', 1, '2022-09-30 21:31:35', 1),
(5, 'machinguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Viet Hao', 'null', 1, '2023-10-13 13:09:02', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD KEY `fk_bill_order` (`order_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback_img`
--
ALTER TABLE `feedback_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imgfb_fb` (`feedback_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_order` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_order_detail` (`order_id`),
  ADD KEY `fk_products_order_detail` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size` (`size`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD KEY `fk_store_product` (`product_id`),
  ADD KEY `fk_store_size` (`size_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `feedback_img`
--
ALTER TABLE `feedback_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_bill_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `feedback_img`
--
ALTER TABLE `feedback_img`
  ADD CONSTRAINT `fk_imgfb_fb` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_order` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orders_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_order_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_store_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_store_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

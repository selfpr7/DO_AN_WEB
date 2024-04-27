-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2023 lúc 03:56 AM
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
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `cartpid` int(11) NOT NULL,
  `cartquantity` int(11) NOT NULL,
  `cartuid` int(11) NOT NULL,
  `cartstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cimage` text NOT NULL,
  `cdesc` longtext NOT NULL,
  `cstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cid`, `cname`, `cimage`, `cdesc`, `cstatus`) VALUES
(1, 'IPhone', 'Apple.png', '', 1),
(2, 'Samsung', 'Samsung.jpg', 'Hãng điện thoại lớn nhất Hàn Quốc', 1),
(3, 'Xiaomi', 'Xiaomi.png', 'Hãng điện thoại lớn nhất Trung Quốc', 1),
(4, 'Oppo', 'Oppo.jpg', 'Hãng điện thoại Hãng điện thoại nổi tiếng Trung Quốc', 1),
(5, 'Realme', 'Realme.png', 'Hãng điện thoại tầm trung nổi tiếng Trung Quốc', 1),
(8, 'Vivo', 'Vivo.png', 'Hãng điện thoại Trung Quốc', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `colorid` int(11) NOT NULL,
  `colorname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `colorstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`colorid`, `colorname`, `colorstatus`) VALUES
(1, 'BLACK', 1),
(2, 'TITAN', 1),
(3, 'WHITE', 1),
(4, 'GOLD', 1),
(5, 'BLUE', 1),
(6, 'GREEN', 1),
(7, 'RED', 1),
(8, 'YELLOW', 1),
(9, 'PINK', 1),
(10, 'PURPLE', 1),
(11, 'BLUE SKY', 1),
(12, 'GRAY', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `coid` int(11) NOT NULL,
  `coDate` date NOT NULL DEFAULT current_timestamp(),
  `coContent` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `coStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `configid` int(11) NOT NULL,
  `configram` varchar(10) NOT NULL,
  `configrom` varchar(10) NOT NULL,
  `configstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`configid`, `configram`, `configrom`, `configstatus`) VALUES
(1, '4GB', '32GB', 1),
(2, '4GB', '64GB', 1),
(3, '4GB', '128GB', 1),
(4, '4GB', '256GB', 1),
(5, '6GB', '64GB', 1),
(6, '6GB', '128GB', 1),
(7, '6GB', '256GB', 1),
(8, '6GB', '512GB', 1),
(9, '6GB', '1TB', 1),
(10, '8GB', '128GB', 1),
(11, '8GB', '256GB', 1),
(12, '8GB', '512GB', 1),
(13, '8GB', '1TB', 1),
(14, '12GB', '128GB', 1),
(15, '12GB', '256GB', 1),
(16, '12GB', '512GB', 1),
(17, '12GB', '1TB', 1),
(18, '16GB', '256GB', 1),
(19, '16GB', '512GB', 1),
(21, '16GB', '1TG', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `payid` int(11) NOT NULL,
  `receivername` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ostatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`oid`, `uid`, `payid`, `receivername`, `address`, `email`, `phone`, `ostatus`) VALUES
(1, 4, 1, 'Huỳnh minh hiếu', 'Hoàng Mai- Hà Nội', 'minhhieu2003@gmail.com', '0813941026', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`oid`, `pid`, `quantity`, `price`) VALUES
(1, 1, 2, 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `payname` varchar(100) NOT NULL,
  `payimage` text NOT NULL,
  `paystatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payid`, `payname`, `payimage`, `paystatus`) VALUES
(1, 'Thanh toán khi nhận hàng', '', 1),
(2, 'Chuyển khoản', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pimage` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pdesc` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pprice` bigint(20) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `pstatus` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `porder` int(11) NOT NULL,
  `configid` int(11) NOT NULL,
  `pdiscount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`pid`, `pname`, `pimage`, `pdesc`, `pprice`, `pquantity`, `pstatus`, `cid`, `sid`, `colorid`, `porder`, `configid`, `pdiscount`) VALUES
(1, 'IPhone XS MAX', 'iphone-xs-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 98, 1, 1, 1, 4, 90, 5, 5),
(2, 'IPhone XS MAX', 'iphone-xs-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 4, 90, 6, 5),
(3, 'IPhone XS MAX', 'iphone-xs-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 4, 90, 7, 5),
(4, 'IPhone XS MAX', 'iphone-xs-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 1, 1, 1, 90, 5, 5),
(5, 'IPhone XS MAX', 'iphone-xs-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 1, 90, 6, 5),
(6, 'IPhone XS MAX', 'iphone-xs-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 1, 90, 7, 5),
(7, 'IPhone XS MAX', 'iphone-xs-max-white.png', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 1, 1, 3, 90, 5, 5),
(8, 'IPhone XS MAX', 'iphone-xs-max-white.png', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 3, 90, 6, 5),
(9, 'IPhone XS MAX', 'iphone-xs-max-white.png', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 3, 90, 7, 5),
(10, 'IPhone 11', 'iphone11-black.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 1, 90, 5, 5),
(11, 'IPhone 11', 'iphone11-black.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 1, 90, 6, 5),
(12, 'IPhone 11', 'iphone11-black.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 1, 90, 7, 5),
(13, 'IPhone 11', 'iphone11-white.png', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 3, 90, 5, 5),
(14, 'IPhone 11', 'iphone11-white.png', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 3, 90, 6, 5),
(15, 'IPhone 11', 'iphone11-white.png', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 3, 90, 7, 5),
(16, 'IPhone 11', 'iphone11-red.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 1, 1, 7, 90, 5, 5),
(17, 'IPhone 11', 'iphone11-red.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 7, 90, 6, 5),
(18, 'IPhone 11', 'iphone11-red.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 7, 90, 7, 5),
(19, 'IPhone 11 PRO', 'iphone11-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 1, 90, 5, 5),
(20, 'IPhone 11 PRO', 'iphone11-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 1, 90, 6, 5),
(21, 'IPhone 11 PRO', 'iphone11-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 1, 90, 7, 5),
(22, 'IPhone 11 PRO', 'iphone11-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 3, 90, 5, 5),
(23, 'IPhone 11 PRO', 'iphone11-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 3, 90, 6, 5),
(24, 'IPhone 11 PRO', 'iphone11-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 3, 90, 7, 5),
(25, 'IPhone 11 PRO', 'iphone11-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 1, 1, 4, 90, 5, 5),
(26, 'IPhone 11 PRO', 'iphone11-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 4, 90, 6, 5),
(27, 'IPhone 11 PRO', 'iphone11-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 4, 90, 7, 5),
(28, 'IPhone 11 PRO MAX', 'iphone11-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 1, 90, 5, 5),
(29, 'IPhone 11 PRO MAX', 'iphone11-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 1, 90, 6, 5),
(30, 'IPhone 11 PRO MAX', 'iphone11-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 1, 90, 7, 5),
(31, 'IPhone 11 PRO MAX', 'iphone11-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 3, 90, 5, 5),
(32, 'IPhone 11 PRO MAX', 'iphone11-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 3, 90, 6, 5),
(33, 'IPhone 11 PRO MAX', 'iphone11-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 3, 90, 7, 5),
(34, 'IPhone 11 PRO MAX', 'iphone11-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 1, 1, 4, 90, 5, 5),
(35, 'IPhone 11 PRO MAX', 'iphone11-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 4, 90, 6, 5),
(36, 'IPhone 11 PRO MAX', 'iphone11-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 4, 90, 7, 5),
(37, 'IPhone 12', 'iphone12-black.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 1, 90, 5, 5),
(38, 'IPhone 12', 'iphone12-black.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 1, 90, 6, 5),
(39, 'IPhone 12', 'iphone12-black.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 1, 90, 7, 5),
(40, 'IPhone 12', 'iphone12-white.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 3, 90, 5, 5),
(41, 'IPhone 12', 'iphone12-white.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 3, 90, 6, 5),
(42, 'IPhone 12', 'iphone12-white.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 3, 90, 7, 5),
(43, 'IPhone 12', 'iphone12-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 1, 1, 5, 90, 5, 5),
(44, 'IPhone 12', 'iphone12-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 5, 90, 6, 5),
(45, 'IPhone 12', 'iphone12-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 5, 90, 7, 5),
(46, 'IPhone 12 PRO', 'iphone12-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 1, 90, 5, 5),
(47, 'IPhone 12 PRO', 'iphone12-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 1, 90, 6, 5),
(48, 'IPhone 12 PRO', 'iphone12-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 1, 90, 7, 5),
(49, 'IPhone 12 PRO', 'iphone12-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 5, 90, 5, 5),
(50, 'IPhone 12 PRO', 'iphone12-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 5, 90, 6, 5),
(51, 'IPhone 12 PRO', 'iphone12-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 5, 90, 7, 5),
(52, 'IPhone 12 PRO', 'iphone12-pro-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 1, 1, 4, 90, 5, 5),
(53, 'IPhone 12 PRO', 'iphone12-pro-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 4, 90, 6, 5),
(54, 'IPhone 12 PRO', 'iphone12-pro-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 4, 90, 7, 5),
(55, 'IPhone 12 PRO MAX', 'iphone12-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 1, 90, 5, 5),
(56, 'IPhone 12 PRO MAX', 'iphone12-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 1, 90, 6, 5),
(57, 'IPhone 12 PRO MAX', 'iphone12-pro-max-black.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 1, 90, 7, 5),
(58, 'IPhone 12 PRO MAX', 'iphone12-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 5, 90, 5, 5),
(59, 'IPhone 12 PRO MAX', 'iphone12-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 5, 90, 6, 5),
(60, 'IPhone 12 PRO MAX', 'iphone12-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 5, 90, 7, 5),
(61, 'IPhone 12 PRO MAX', 'iphone12-pro-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 1, 1, 4, 90, 5, 5),
(62, 'IPhone 12 PRO MAX', 'iphone12-pro-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 4, 90, 6, 5),
(63, 'IPhone 12 PRO MAX', 'iphone12-pro-max-gold.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 4, 90, 7, 5),
(64, 'IPhone 13', 'iphone13-black.png', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 1, 90, 5, 5),
(65, 'IPhone 13', 'iphone13-black.png', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 1, 90, 6, 5),
(66, 'IPhone 13', 'iphone13-black.png', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 1, 90, 7, 5),
(67, 'IPhone 13', 'iphone13-white.png', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 3, 90, 5, 5),
(68, 'IPhone 13', 'iphone13-white.png', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 3, 90, 6, 5),
(69, 'IPhone 13', 'iphone13-white.png', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 3, 90, 7, 5),
(70, 'IPhone 13', 'iphone13-red.png', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 1, 1, 7, 90, 5, 5),
(71, 'IPhone 13', 'iphone13-red.png', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 7, 90, 6, 5),
(72, 'IPhone 13', 'iphone13-red.png', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 7, 90, 7, 5),
(73, 'IPhone 13 PRO', 'iphone13-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 5, 90, 5, 5),
(74, 'IPhone 13 PRO', 'iphone13-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 5, 90, 6, 5),
(75, 'IPhone 13 PRO', 'iphone13-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 5, 90, 7, 5),
(76, 'IPhone 13 PRO', 'iphone13-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 4, 90, 5, 5),
(77, 'IPhone 13 PRO', 'iphone13-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 4, 90, 6, 5),
(78, 'IPhone 13 PRO', 'iphone13-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 4, 90, 7, 5),
(79, 'IPhone 13 PRO', 'iphone13-pro-green.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 1, 1, 6, 90, 5, 5),
(80, 'IPhone 13 PRO', 'iphone13-pro-green.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 6, 90, 6, 5),
(81, 'IPhone 13 PRO', 'iphone13-pro-green.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 6, 90, 7, 5),
(82, 'IPhone 13 PRO MAX', 'iphone13-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 5, 90, 5, 5),
(83, 'IPhone 13 PRO MAX', 'iphone13-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 5, 90, 6, 5),
(84, 'IPhone 13 PRO MAX', 'iphone13-pro-max-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 5, 90, 7, 5),
(85, 'IPhone 13 PRO MAX', 'iphone13-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 4, 90, 5, 5),
(86, 'IPhone 13 PRO MAX', 'iphone13-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 4, 90, 6, 5),
(87, 'IPhone 13 PRO MAX', 'iphone13-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 4, 90, 7, 5),
(88, 'IPhone 13 PRO MAX', 'iphone13-pro-max-green.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 1, 1, 6, 90, 5, 5),
(89, 'IPhone 13 PRO MAX', 'iphone13-pro-max-green.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 1, 1, 6, 90, 6, 5),
(90, 'IPhone 13 PRO MAX', 'iphone13-pro-max-green.jpg', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 6, 90, 7, 5),
(91, 'IPhone 14', 'iphone14-black.png', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 1, 90, 5, 5),
(92, 'IPhone 14', 'iphone14-black.png', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 1, 90, 6, 5),
(93, 'IPhone 14', 'iphone14-black.png', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 1, 90, 7, 5),
(94, 'IPhone 14', 'iphone14-red.png', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 7, 90, 5, 5),
(95, 'IPhone 14', 'iphone14-red.png', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 7, 90, 6, 5),
(96, 'IPhone 14', 'iphone14-red.png', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 7, 90, 7, 5),
(97, 'IPhone 14', 'iphone14-white.png', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 1, 1, 3, 90, 5, 5),
(98, 'IPhone 14', 'iphone14-white.png', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 3, 90, 6, 5),
(99, 'IPhone 14', 'iphone14-white.png', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 3, 90, 7, 5),
(100, 'IPhone 14 PRO', 'iphone14-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 4, 90, 5, 5),
(101, 'IPhone 14 PRO', 'iphone14-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 4, 90, 6, 5),
(102, 'IPhone 14 PRO', 'iphone14-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 4, 90, 7, 5),
(103, 'IPhone 14 PRO', 'iphone14-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 3, 90, 5, 5),
(104, 'IPhone 14 PRO', 'iphone14-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 3, 90, 6, 5),
(105, 'IPhone 14 PRO', 'iphone14-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 3, 90, 7, 5),
(106, 'IPhone 14 PRO', 'iphone14-pro-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 1, 1, 10, 90, 5, 5),
(107, 'IPhone 14 PRO', 'iphone14-pro-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 10, 90, 6, 5),
(108, 'IPhone 14 PRO', 'iphone14-pro-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 10, 90, 7, 5),
(109, 'IPhone 14 PRO MAX', 'iphone14-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 4, 90, 5, 5),
(110, 'IPhone 14 PRO MAX', 'iphone14-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 21000000, 100, 1, 1, 1, 4, 90, 6, 5),
(111, 'IPhone 14 PRO MAX', 'iphone14-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 1, 1, 4, 90, 7, 5),
(112, 'IPhone 14 PRO MAX', 'iphone14-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 3, 90, 5, 5),
(113, 'IPhone 14 PRO MAX', 'iphone14-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 21000000, 100, 1, 1, 1, 3, 90, 6, 5),
(114, 'IPhone 14 PRO MAX', 'iphone14-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 1, 1, 3, 90, 7, 5),
(115, 'IPhone 14 PRO MAX', 'iphone14-pro-max-purpler.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 10, 90, 5, 5),
(116, 'IPhone 14 PRO MAX', 'iphone14-pro-max-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 21000000, 100, 1, 1, 1, 10, 90, 6, 5),
(117, 'IPhone 14 PRO MAX', 'iphone14-pro-max-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 1, 1, 10, 90, 7, 5),
(118, 'IPhone 15', 'iphone15-black.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 1, 90, 10, 5),
(119, 'IPhone 15', 'iphone15-black.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 1, 90, 11, 5),
(120, 'IPhone 15', 'iphone15-black.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 1, 90, 12, 5),
(121, 'IPhone 15', 'iphone15-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 8, 90, 10, 5),
(122, 'IPhone 15', 'iphone15-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 8, 90, 11, 5),
(123, 'IPhone 15', 'iphone15-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 8, 90, 12, 5),
(124, 'IPhone 15', 'iphone15-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 1, 1, 9, 90, 10, 5),
(125, 'IPhone 15', 'iphone15-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 1, 1, 9, 90, 11, 5),
(126, 'IPhone 15', 'iphone15-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 1, 1, 9, 90, 12, 5),
(127, 'IPhone 15 PRO', 'iphone15-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 1, 1, 4, 90, 10, 5),
(128, 'IPhone 15 PRO', 'iphone15-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 25000000, 100, 1, 1, 1, 4, 90, 11, 5),
(129, 'IPhone 15 PRO', 'iphone15-pro-gold.png', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 4, 90, 12, 5),
(130, 'IPhone 15 PRO', 'iphone15-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 1, 1, 3, 90, 10, 5),
(131, 'IPhone 15 PRO', 'iphone15-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 25000000, 100, 1, 1, 1, 3, 90, 11, 5),
(132, 'IPhone 15 PRO', 'iphone15-pro-white.jpg', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 3, 90, 12, 5),
(133, 'IPhone 15 PRO', 'iphone15-pro-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 1, 1, 2, 90, 10, 5),
(134, 'IPhone 15 PRO', 'iphone15-pro-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 25000000, 100, 1, 1, 1, 2, 90, 11, 5),
(135, 'IPhone 15 PRO', 'iphone15-pro-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 2, 90, 12, 5),
(136, 'IPhone 15 PRO MAX', 'iphone15-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 3, 90, 10, 5),
(137, 'IPhone 15 PRO MAX', 'iphone15-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 27000000, 100, 1, 1, 1, 3, 90, 11, 5),
(138, 'IPhone 15 PRO MAX', 'iphone15-pro-max-white.jpg', 'Mẫu điện thoại mới nhất 2023', 28000000, 100, 1, 1, 1, 3, 90, 12, 5),
(139, 'IPhone 15 PRO MAX', 'iphone15-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 4, 90, 10, 5),
(140, 'IPhone 15 PRO MAX', 'iphone15-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 27000000, 100, 1, 1, 1, 4, 90, 11, 5),
(141, 'IPhone 15 PRO MAX', 'iphone15-pro-max-gold.png', 'Mẫu điện thoại mới nhất 2023', 28000000, 100, 1, 1, 1, 4, 90, 12, 5),
(142, 'IPhone 15 PRO MAX', 'iphone15-pro-max-titanjpg', 'Mẫu điện thoại mới nhất 2023', 26000000, 100, 1, 1, 1, 2, 90, 10, 5),
(143, 'IPhone 15 PRO MAX', 'iphone15-pro-max-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 27000000, 100, 1, 1, 1, 2, 90, 11, 5),
(144, 'IPhone 15 PRO MAX', 'iphone15-pro-max-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 28000000, 100, 1, 1, 1, 2, 90, 12, 5),
(145, 'Samsung Galaxy S20', 'samsungs20-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 2, 2, 5, 90, 10, 5),
(146, 'Samsung Galaxy S20', 'samsungs20-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 5, 90, 11, 5),
(147, 'Samsung Galaxy S20', 'samsungs20-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 5, 90, 12, 5),
(148, 'Samsung Galaxy S20', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 2, 2, 1, 90, 10, 5),
(149, 'Samsung Galaxy S20', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 1, 90, 11, 5),
(150, 'Samsung Galaxy S20', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 1, 90, 12, 5),
(151, 'Samsung Galaxy S20', 'samsungs20-green.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 2, 2, 6, 90, 10, 5),
(152, 'Samsung Galaxy S20', 'samsungs20-green.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 6, 90, 11, 5),
(153, 'Samsung Galaxy S20', 'samsungs20-green.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 6, 90, 12, 5),
(154, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-black.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 1, 90, 10, 5),
(155, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-black.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 1, 90, 11, 5),
(156, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-black.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 2, 2, 1, 90, 12, 5),
(157, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 12, 90, 10, 5),
(158, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 12, 90, 11, 5),
(159, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 2, 2, 12, 90, 12, 5),
(160, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 2, 2, 9, 90, 10, 5),
(161, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 2, 2, 9, 90, 11, 5),
(162, 'Samsung Galaxy S20 Plus', 'samsungs20-plus-pink.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 2, 2, 9, 90, 12, 5),
(163, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 2, 2, 1, 90, 10, 5),
(164, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 2, 2, 1, 90, 11, 5),
(165, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 2, 2, 1, 90, 12, 5),
(166, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 2, 2, 12, 90, 10, 5),
(167, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 2, 2, 12, 90, 11, 5),
(168, 'Samsung Galaxy S20 Ultra', 'samsungs20-ultra-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 2, 2, 12, 90, 12, 5),
(169, 'Samsung Galaxy S21', 'samsungs21-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 15000000, 100, 1, 2, 2, 10, 90, 11, 5),
(170, 'Samsung Galaxy S21', 'samsungs21-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 2, 2, 10, 90, 12, 5),
(171, 'Samsung Galaxy S21', 'samsungs21-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 10, 90, 13, 5),
(172, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-gold.png', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 2, 2, 4, 90, 11, 5),
(173, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-gold.png', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 4, 90, 12, 5),
(174, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-gold.png', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 4, 90, 13, 5),
(175, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 2, 2, 10, 90, 11, 5),
(176, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 10, 90, 12, 5),
(177, 'Samsung Galaxy S21 Plus', 'samsungs21-plus-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 10, 90, 13, 5),
(178, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 1, 90, 11, 5),
(179, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 1, 90, 12, 5),
(180, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 1, 90, 13, 5),
(181, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-bluesky.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 11, 90, 11, 5),
(182, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-bluesky.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 11, 90, 12, 5),
(183, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-bluesky.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 11, 90, 13, 5),
(184, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 2, 2, 2, 90, 11, 5),
(185, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 2, 90, 12, 5),
(186, 'Samsung Galaxy S21 Ultra', 'samsungs21-ultra-titan.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 2, 90, 13, 5),
(187, 'Samsung Galaxy S22', 'samsungs22-white.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 3, 90, 14, 5),
(188, 'Samsung Galaxy S22', 'samsungs22-white.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 3, 90, 15, 5),
(189, 'Samsung Galaxy S22', 'samsungs22-white.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 2, 2, 3, 90, 16, 5),
(190, 'Samsung Galaxy S22', 'samsungs22-black.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 2, 2, 3, 90, 14, 5),
(191, 'Samsung Galaxy S22', 'samsungs22-black.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 3, 90, 15, 5),
(192, 'Samsung Galaxy S22', 'samsungs22-black.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 2, 2, 3, 90, 16, 5),
(193, 'Samsung Galaxy S22 Plus', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 1, 90, 14, 5),
(194, 'Samsung Galaxy S22 Plus', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 2, 2, 1, 90, 15, 5),
(195, 'Samsung Galaxy S22 Plus', 'samsungs20-black.jpg', 'Mẫu điện thoại mới nhất 2023', 21000000, 100, 1, 2, 2, 1, 90, 16, 5),
(196, 'Samsung Galaxy S22 Plus', 'samsungs20-white.jpg', 'Mẫu điện thoại mới nhất 2023', 19000000, 100, 1, 2, 2, 3, 90, 14, 5),
(197, 'Samsung Galaxy S22 Plus', 'samsungs20-white.jpg', 'Mẫu điện thoại mới nhất 2023', 20000000, 100, 1, 2, 2, 3, 90, 15, 5),
(198, 'Samsung Galaxy S22 Plus', 'samsungs20-white.jpg', 'Mẫu điện thoại mới nhất 2023', 21000000, 100, 1, 2, 2, 3, 90, 16, 5),
(199, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 2, 2, 1, 90, 14, 5),
(200, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 23000000, 100, 1, 2, 2, 1, 90, 15, 5),
(201, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-black.jpg', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 2, 2, 1, 90, 16, 5),
(202, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-red.jpg', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 2, 2, 7, 90, 14, 5),
(203, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-red.jpg', 'Mẫu điện thoại mới nhất 2023', 23000000, 100, 1, 2, 2, 7, 90, 15, 5),
(204, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-red.jpg', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 2, 2, 7, 90, 16, 5),
(205, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-white.jpg', 'Mẫu điện thoại mới nhất 2023', 22000000, 100, 1, 2, 3, 1, 90, 14, 5),
(206, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-white.jpg', 'Mẫu điện thoại mới nhất 2023', 23000000, 100, 1, 2, 3, 1, 90, 15, 5),
(207, 'Samsung Galaxy S22 Ultra', 'samsungs22-ultra-white.jpg', 'Mẫu điện thoại mới nhất 2023', 24000000, 100, 1, 2, 3, 1, 90, 16, 5),
(208, 'OPPO A77S', 'oppo-a77s-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 4, 4, 5, 90, 6, 5),
(209, 'OPPO A77S', 'oppo-a77s-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 4, 4, 5, 90, 7, 5),
(210, 'OPPO A77S', 'oppo-a77s-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 4, 4, 5, 90, 8, 5),
(211, 'OPPO A78', 'oppo-a78-black.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 4, 4, 1, 90, 6, 5),
(212, 'OPPO A78', 'oppo-a78-black.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 4, 4, 1, 90, 7, 5),
(213, 'OPPO A78', 'oppo-a78-black.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 4, 4, 1, 90, 8, 5),
(214, 'OPPO N2 FLIP', 'oppo-n2-flip-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 16000000, 100, 1, 4, 4, 10, 90, 6, 5),
(215, 'OPPO N2 FLIP', 'oppo-n2-flip-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 17000000, 100, 1, 4, 4, 10, 90, 7, 5),
(216, 'OPPO N2 FLIP', 'oppo-n2-flip-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 18000000, 100, 1, 4, 4, 10, 90, 8, 5),
(217, 'OPPO RENO 10 5G', 'oppo-reno10-5g-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 4, 4, 5, 90, 6, 5),
(218, 'OPPO RENO 10 5G', 'oppo-reno10-5g-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 4, 4, 5, 90, 7, 5),
(219, 'OPPO RENO 10 5G', 'oppo-reno10-5g-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 4, 4, 5, 90, 8, 5),
(220, 'OPPO RENO 10 5G', 'oppo-reno10-5g-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 12000000, 100, 1, 4, 4, 12, 90, 6, 5),
(221, 'OPPO RENO 10 5G', 'oppo-reno10-5g-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 13000000, 100, 1, 4, 4, 12, 90, 7, 5),
(222, 'OPPO RENO 10 5G', 'oppo-reno10-5g-gray.jpg', 'Mẫu điện thoại mới nhất 2023', 14000000, 100, 1, 4, 4, 12, 90, 8, 5),
(223, 'REALME 9 PRO', 'realme-9-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 5, 5, 5, 90, 6, 5),
(224, 'REALME 9 PRO', 'realme-9-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 5, 5, 5, 90, 7, 5),
(225, 'REALME 9 PRO', 'realme-9-pro-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 5, 5, 5, 90, 8, 5),
(226, 'REALME 11', 'realme-11-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 5, 5, 8, 90, 6, 5),
(227, 'REALME 11', 'realme-11-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 5, 5, 8, 90, 7, 5),
(228, 'REALME 11', 'realme-11-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 5, 5, 8, 90, 8, 5),
(229, 'REALME C30S', 'realme-c30s-black.jpg', 'Mẫu điện thoại mới nhất 2023', 4000000, 100, 1, 5, 5, 1, 90, 6, 5),
(230, 'REALME C30S', 'realme-c30s-black.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 5, 5, 1, 90, 7, 5),
(231, 'REALME C30S', 'realme-c30s-black.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 5, 5, 1, 90, 8, 5),
(232, 'REALME C55', 'realme-c55-black.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 5, 5, 1, 90, 6, 5),
(233, 'REALME C55', 'realme-c55-black.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 5, 5, 1, 90, 7, 5),
(234, 'REALME C55', 'realme-c55-black.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 5, 5, 1, 90, 8, 5),
(235, 'REALME GTNEO 5', 'realme-gtneo5-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 5, 5, 10, 90, 11, 5),
(236, 'REALME GTNEO 5', 'realme-gtneo5-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 5, 5, 10, 90, 12, 5),
(237, 'REALME GTNEO 5', 'realme-gtneo5-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 10000000, 100, 1, 5, 5, 10, 90, 13, 5),
(238, 'VIVO V25E', 'vivo-v25e-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 3000000, 100, 1, 8, 8, 8, 90, 6, 5),
(239, 'VIVO V25 PRO', 'vivo-v25-pro-black.jpg', 'Mẫu điện thoại mới nhất 2023', 4000000, 100, 1, 8, 8, 1, 90, 6, 5),
(240, 'VIVO V29E', 'vivo-v29e-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 8, 8, 5, 90, 6, 5),
(241, 'VIVO Y02A', 'vivo-y02a-black.jpg', 'Mẫu điện thoại mới nhất 2023', 6000000, 100, 1, 8, 8, 1, 90, 6, 5),
(242, 'VIVO Y02T', 'vivo-y02t-purple.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 8, 8, 10, 90, 6, 5),
(243, 'XIAOMI 13T PRO', 'xiaomi-13t-pro-2-blue.jpg', 'Mẫu điện thoại mới nhất 2023', 11000000, 100, 1, 3, 3, 5, 90, 8, 5),
(244, 'XIAOMI BLACK SHARK 2', 'xiaomi-black-shark2.jpg', 'Mẫu điện thoại mới nhất 2023', 9000000, 100, 1, 3, 3, 1, 90, 8, 5),
(245, 'XIAOMI LITE', 'xiaomi-lite-black.jpg', 'Mẫu điện thoại mới nhất 2023', 8000000, 100, 1, 3, 3, 1, 90, 8, 5),
(246, 'XIAOMI NOTE 12', 'xiaomi-note12-green.jpg', 'Mẫu điện thoại mới nhất 2023', 5000000, 100, 1, 3, 3, 6, 90, 8, 5),
(247, 'XIAOMI POCO X5 PRO', 'xiaomi-poco-x5-pro-yellow.jpg', 'Mẫu điện thoại mới nhất 2023', 7000000, 100, 1, 3, 3, 8, 90, 8, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `sid` int(11) NOT NULL,
  `sname` text NOT NULL,
  `saddress` text NOT NULL,
  `sphone` text NOT NULL,
  `stax` text NOT NULL,
  `sstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`sid`, `sname`, `saddress`, `sphone`, `stax`, `sstatus`) VALUES
(1, 'APPLE', 'USA', '0959475393', '1234-9999', 1),
(2, 'SAMSUNG', 'Việt Nam', '0959999393', '8888-9999', 1),
(3, 'XIAOMI', 'Trung Quốc', '0995983993', '6666-9999', 1),
(4, 'OPPO', 'Trung Quốc', '0899999999', '3333-9999', 1),
(5, 'REALME', 'Trung Quốc', '0794489393', '6666-8888', 1),
(7, 'ASUS', 'Trung Quốc', '111111111', '1', 1),
(8, 'VIVO', 'Trung Quốc', '0798599393', '1234-5678', 1),
(9, 'VINSMART', 'Việt Nam', '959475396', '4041', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `ufullname` text NOT NULL,
  `uusername` text NOT NULL,
  `upassword` text NOT NULL,
  `uaddress` text NOT NULL,
  `ubirthyear` date NOT NULL,
  `ugender` int(11) NOT NULL,
  `uphone` text NOT NULL,
  `uemail` text NOT NULL,
  `ulevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`uid`, `ufullname`, `uusername`, `upassword`, `uaddress`, `ubirthyear`, `ugender`, `uphone`, `uemail`, `ulevel`) VALUES
(1, 'Nguyễn Việt Hoàng', 'nguyenviethoang2003', '2003', 'Hà Nội', '2003-02-06', 0, '0813941024', 'hoangkdks622003@gmail.com', 0),
(2, 'Chu Văn Thiết', 'quangthiet2003', '2003', 'Ba Vì - Hà Nội', '2003-03-05', 0, '0986478372', 'quangthiet2003@gmail.com', 1),
(3, 'Phạm Tiến Đạt', 'dat09_dat1_lit', '2003', 'Ha Noi', '0000-00-00', 0, '0817575169', 'dat09@gmail.com', 1),
(4, 'Huỳnh minh hiếu', 'minhhieu2003', '2003', 'Hoàng Mai- Hà Nội', '0000-00-00', 0, '0813941026', 'minhhieu2003@gmail.com', 2),
(5, 'Đỗ Hữu Phúc', 'phuclem2003', '2003', 'Hà Nội', '0000-00-00', 0, '0977438325', 'phuc2003@gmail.com', 2),
(6, 'Nguyễn Anh tài', 'tai2003', '2003', 'hà nội', '0000-00-00', 0, '4', 'tai2003@gmail.com', 2),
(8, 'Nguyễn Việt Hoàng', 'nguyenviethoang2003', '2003', 'Hà Nội', '0000-00-00', 0, '0813941024', 'hoangkdks@gmail.com', 1),
(9, 'phạm phi long', 'long2003', '2003', 'hà nội', '0000-00-00', 0, '0298938938', 'long2003@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorid`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`coid`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configid`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`oid`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `colorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `configid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

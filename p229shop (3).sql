-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2021 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `p229shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `img_banner` varchar(255) NOT NULL,
  `text_banner` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id_brand` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`id_brand`, `brand`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(10, 'Achilles'),
(14, 'Biti\'s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `category_name`, `id_parent`) VALUES
(1, 'Giày', NULL),
(2, 'Quần', NULL),
(3, 'Áo', NULL),
(4, 'Khác', NULL),
(8, 'Quần short nữ', 8),
(9, 'Áo tay ngắn', 3),
(13, 'Quần dài', 2),
(14, 'Giày thể thao', 1),
(16, 'Áo thun nam', 3),
(17, 'Áo khoác nam', 3),
(18, 'Áo khoác nữ', 3),
(19, 'Áo thun nữ', 3),
(20, 'Quần short nam', 2),
(21, 'Quần bó nam', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id_city` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_city`
--

INSERT INTO `tbl_city` (`id_city`, `id_country`, `city`) VALUES
(1, 1, 'Huế'),
(2, 1, 'Đà Nẵng'),
(4, 1, 'Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_class_instruct`
--

CREATE TABLE `tbl_class_instruct` (
  `id_class` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `text` text NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_class_instruct`
--

INSERT INTO `tbl_class_instruct` (`id_class`, `id_page`, `text`, `class`) VALUES
(1, 1, 'Nhấn vào đây để tìm kiếm sản phẩm', '.search_user'),
(2, 1, 'Hãy đăng nhập vào và sử dụng chức năng của người dùng', '.user'),
(3, 1, 'Bấm vào để kiểm tra giỏ hàng hoặc thanh toán', '.checkout '),
(4, 1, 'Sản phẩm chính của cửa hàng chúng tôi', '.box'),
(6, 1, 'Lựa chọn sản phẩm theo ý muốn của bạn', '.navbar_menu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `text_comment` text NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createComment` datetime NOT NULL,
  `parent_id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `star`, `text_comment`, `id_product`, `id_user`, `createComment`, `parent_id_comment`) VALUES
(35, 4, 'Sản phẩm này tuyệt vời quá bà con cô bác ơi', 77460, 14, '2021-11-22 11:38:19', 0),
(36, 0, 'Cảm ơn anh trai đã mua nha', 77460, 14, '2021-11-22 11:38:29', 35),
(37, 5, 'Sản phẩm tuyệt vời quá mấy a trai. Tui mua hẳn 2 cái về mang cho nó đã', 77460, 14, '2021-11-23 09:47:32', 0),
(38, 4, 'Sản phẩm tuyệt vời quá mấy a trai. Tui mua hẳn 2 cái về mang cho nó đã', 77460, 14, '2021-11-23 09:47:46', 0),
(45, 4, 'Áo cũng đẹp đấy ', 77460, 5, '2021-12-01 11:11:36', 0),
(46, 4, 'Áo này mặc cũng mát', 20327, 5, '2021-12-01 11:12:54', 0),
(47, 4, 'Áo này mặc cũng mát', 20327, 5, '2021-12-01 11:12:54', 0),
(48, 4, 'Sản phẩm này khá là tốt', 171407, 4049, '2021-12-07 12:34:22', 0),
(49, 0, 'Đúng là như vậy', 171407, 4049, '2021-12-07 12:34:43', 48),
(50, 4, 'Quần đẹp lắm ', 955126, 14, '2021-12-08 07:41:16', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_contact` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `support` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_fb` varchar(255) NOT NULL,
  `link_tw` varchar(255) NOT NULL,
  `link_ins` varchar(255) NOT NULL,
  `link_youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_contact`, `phone`, `email`, `address`, `support`, `logo`, `link_fb`, `link_tw`, `link_ins`, `link_youtube`) VALUES
(1, '0935640559', 'tiennguyentran201@gmail.com', 'Trường Đại học Công nghệ thông tin truyền thông Việt - Hàn', '<ul><li>Ch&iacute;nh s&aacute;ch<ul><li>Ch&iacute;nh s&aacute;ch thanh to&aacute;n</li><li>Ch&iacute;nh s&aacute;ch vận chuyển</li><li>Ch&iacute;nh s&aacute;ch đổi trả bảo h&agrave;nh</li><li>Ch&iacute;nh s&aacute;ch bảo mật</li></ul></li></ul>', 'anhtest5-removebg-preview.png', 'https://www.facebook.com/P229-Sport-Shop-109694361329627', '', 'https://www.instagram.com/noodle.jar/', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id_country` int(11) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_country`
--

INSERT INTO `tbl_country` (`id_country`, `country`) VALUES
(1, 'Việt Nam'),
(5, 'Hàn Quốc'),
(6, 'Nhật Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id_discount` int(11) NOT NULL,
  `text_discount` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_discount`
--

INSERT INTO `tbl_discount` (`id_discount`, `text_discount`, `discount`, `status`) VALUES
(1, 'Black Friday', 22, 0),
(5, 'Discount', 10, 1),
(6, 'Discount', 12, 1),
(9, 'Discount', 22, 1),
(10, 'Discount ', 30, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_discount_product`
--

CREATE TABLE `tbl_discount_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_discount_product`
--

INSERT INTO `tbl_discount_product` (`id`, `id_product`, `id_discount`) VALUES
(34, 626327, 6),
(40, 669125, 6),
(41, 982043, 6),
(42, 44284, 9),
(52, 826706, 1),
(53, 555735, 5),
(54, 322389, 6),
(55, 77460, 5),
(56, 77460, 1),
(59, 641815, 6),
(60, 955126, 9),
(61, 681471, 6),
(70, 20327, 5),
(71, 20327, 1),
(82, 171407, 5),
(83, 171407, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img`
--

CREATE TABLE `tbl_img` (
  `id` int(11) NOT NULL,
  `id_imgcolor` int(11) NOT NULL,
  `id_imgdesc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_img`
--

INSERT INTO `tbl_img` (`id`, `id_imgcolor`, `id_imgdesc`) VALUES
(15, 9605, 116),
(16, 9605, 117),
(17, 9605, 118),
(18, 9605, 122),
(19, 9606, 119),
(20, 9606, 120),
(21, 9606, 121),
(22, 9607, 123),
(23, 9607, 124),
(24, 9607, 125),
(25, 9608, 126),
(26, 9608, 127),
(27, 9608, 128),
(30, 9610, 130),
(32, 9601, 113),
(33, 9601, 114),
(34, 9601, 115),
(35, 9602, 111),
(36, 9602, 112),
(37, 9604, 108),
(38, 9604, 109),
(39, 9604, 110),
(40, 9611, 131),
(41, 9617, 144),
(42, 9617, 145),
(43, 9618, 146),
(44, 9618, 147),
(45, 9619, 148),
(46, 9619, 149),
(47, 9619, 150),
(48, 9620, 151),
(49, 9620, 152),
(50, 9620, 153),
(51, 9621, 154),
(52, 9621, 155),
(53, 9621, 156),
(54, 9622, 157),
(55, 9622, 158),
(56, 9622, 159),
(57, 9623, 160),
(58, 9623, 161),
(59, 9623, 162),
(60, 9624, 163),
(61, 9624, 164),
(62, 9624, 165),
(63, 9625, 166),
(64, 9625, 167),
(65, 9625, 168),
(66, 9626, 169),
(67, 9626, 170),
(68, 9626, 171),
(69, 9627, 172),
(70, 9627, 173),
(71, 9627, 174),
(72, 9627, 175),
(73, 9627, 176),
(74, 9628, 177),
(75, 9628, 178),
(76, 9628, 179),
(77, 9628, 180),
(78, 9628, 181),
(79, 9628, 182),
(80, 9629, 183),
(81, 9629, 184),
(82, 9629, 185),
(83, 9629, 186),
(84, 9630, 188),
(85, 9630, 189),
(86, 9630, 190),
(87, 9630, 191),
(88, 9631, 192),
(89, 9631, 193),
(90, 9631, 194),
(91, 9632, 195),
(92, 9632, 196),
(93, 9632, 197),
(94, 9633, 198),
(95, 9633, 199),
(96, 9633, 200),
(97, 9634, 201),
(98, 9634, 202),
(99, 9634, 203),
(100, 9634, 204),
(101, 9635, 205),
(102, 9635, 206),
(103, 9635, 207),
(104, 9635, 208),
(105, 9636, 209),
(106, 9636, 210),
(107, 9636, 211),
(108, 9636, 212),
(109, 9637, 213),
(110, 9637, 214),
(111, 9637, 215),
(112, 9637, 216),
(113, 9638, 217),
(114, 9638, 218),
(115, 9638, 219),
(116, 9638, 220),
(117, 9639, 221),
(118, 9639, 222),
(119, 9639, 223),
(120, 9639, 224),
(121, 9640, 225),
(122, 9640, 226),
(123, 9640, 227),
(124, 9640, 228),
(125, 9641, 229),
(126, 9641, 230),
(127, 9641, 231),
(128, 9641, 232),
(174, 9645, 248),
(175, 9645, 249),
(176, 9645, 250),
(177, 9645, 251),
(178, 9645, 252),
(179, 9646, 243),
(180, 9646, 244),
(181, 9646, 245),
(182, 9646, 246),
(183, 9646, 247);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_imgcolor`
--

CREATE TABLE `tbl_imgcolor` (
  `id_imgcolor` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_imgcolor`
--

INSERT INTO `tbl_imgcolor` (`id_imgcolor`, `img_name`) VALUES
(9601, 'Nike_Jordan_Proto_Max1-removebg-preview.png'),
(9602, 'NikeJordanProtoMax-removebg-preview.png'),
(9604, 'jordan-proto-max-720-shoes-TFlVqB-removebg-preview.png'),
(9605, 'Nike Air Vapormax.png'),
(9606, 'Nike Air Vapormax1.png'),
(9607, 'Quan_Tech_QuickDraw_DJen_H40207_01_laydown-removebg-preview.png'),
(9608, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_01_laydown-removebg-preview.png'),
(9610, 'Ao-achilles-xam-1-600x600-removebg-preview.png'),
(9611, 'Ao-achilles-xanh-duong-1-600x600-removebg-preview.png'),
(9617, 'Quan_short_3_Soc_Own_the_Run_DJen_GQ9352_01_laydown-removebg-preview.png'),
(9618, 'Quan_short_3_Soc_Own_the_Run_Xam_H36466_01_laydown-removebg-preview.png'),
(9619, 'Ao_polo_3_Soc_Tennis_Club_DJo_H34698_01_laydown-removebg-preview.png'),
(9620, 'Ao_polo_3_Soc_Tennis_Club_trang_GL5416_01_laydown-removebg-preview.png'),
(9621, 'Ao_Thun_Aeromotion_H29179_01_laydown-removebg-preview.png'),
(9622, 'Ao_Thun_Aeromotion_Mau_xanh_da_troi_H29177_01_laydown-removebg-preview.png'),
(9623, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_01_laydown-removebg-preview.png'),
(9624, 'Ao_Thun_Own_the_Run_Hong_GJ9967_01_laydown-removebg-preview.png'),
(9625, 'Ao_Thun_Own_the_Run_Mau_xanh_da_troi_H34494_01_laydown-removebg-preview.png'),
(9626, 'Ao_Thun_Own_the_Run_Xam_H34487_01_laydown-removebg-preview.png'),
(9627, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_01_laydown-removebg-preview.png'),
(9628, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_01_laydown-removebg-preview.png'),
(9629, 'Ao_khoac_3_Soc_Marathon_trang_GK6061_01_laydown-removebg-preview.png'),
(9630, 'Ao_khoac_3_Soc_Marathon_trang_H31042_01_laydown-removebg-preview.png'),
(9631, 'Ao_thun_Fast_Primeblue_DJen_GN4406_01_laydown-removebg-preview.png'),
(9632, 'Ao_thun_Fast_Primeblue_mau_xanh_la_H11276_01_laydown-removebg-preview.png'),
(9633, 'Ao_thun_Fast_Primeblue_trang_H32236_01_laydown-removebg-preview (1).png'),
(9634, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_GN4409_01_laydown-removebg-preview.png'),
(9635, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_01_laydown-removebg-preview.png'),
(9636, 'PB_ALWAYSOM_SHO_DJen_GT3883_01_laydown-removebg-preview.png'),
(9637, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_01_laydown-removebg-preview.png'),
(9638, 'PB_ALWAYSOM_SHO_trang_H11097_01_laydown-removebg-preview.png'),
(9639, 'Giay_Chay_Bo_UltraBoost_21_Tokyo_trang_S23863_01_standard-removebg-preview.png'),
(9640, 'Giay_UltraBoost_21_trang_S23869_01_standard-removebg-preview.png'),
(9641, 'Giay_UltraBoost_21_Xam_FY3952_01_standard-removebg-preview.png'),
(9645, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (8).png'),
(9646, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_imgcolor_product`
--

CREATE TABLE `tbl_imgcolor_product` (
  `id` int(11) NOT NULL,
  `id_imgcolor` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_imgcolor_product`
--

INSERT INTO `tbl_imgcolor_product` (`id`, `id_imgcolor`, `id_product`) VALUES
(1, 9606, 626327),
(2, 9605, 626327),
(13, 9608, 669125),
(14, 9607, 669125),
(15, 9604, 982043),
(16, 9602, 982043),
(17, 9601, 982043),
(18, 9611, 44284),
(19, 9610, 44284),
(38, 9620, 826706),
(39, 9619, 826706),
(40, 9623, 555735),
(41, 9622, 555735),
(42, 9621, 555735),
(43, 9626, 322389),
(44, 9625, 322389),
(45, 9624, 322389),
(46, 9628, 77460),
(47, 9627, 77460),
(53, 9635, 641815),
(54, 9634, 641815),
(55, 9638, 955126),
(56, 9637, 955126),
(57, 9636, 955126),
(58, 9641, 681471),
(59, 9640, 681471),
(60, 9639, 681471),
(72, 9633, 20327),
(73, 9632, 20327),
(74, 9631, 20327),
(85, 9646, 171407),
(86, 9645, 171407);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_imgdesc`
--

CREATE TABLE `tbl_imgdesc` (
  `id_imgdesc` int(11) NOT NULL,
  `name_imgdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_imgdesc`
--

INSERT INTO `tbl_imgdesc` (`id_imgdesc`, `name_imgdesc`) VALUES
(108, 'jordan-proto-max-720-shoes-TFlVqB-removebg-preview (1).png'),
(109, 'jordan-proto-max-720-shoes-TFlVqB-removebg-preview (2).png'),
(110, 'jordan-proto-max-720-shoes-TFlVqB-removebg-preview (3).png'),
(111, '2140840_2_L-removebg-preview.png'),
(112, 'Nike_Jordan_Proto_Max1-removebg-preview2.png'),
(113, '5cf60252-95e7-4ded-9adb-885b73a16f8e.b5f1b96b95c83e4e6236ef4ff35f4c58_eb020e1e728244eba63a8d97ebc2d854_1024x1024-removebg-preview.png'),
(114, '2019_jordan_proto_max_720_metallic_silver_gym_red_black_bq6623_002_p4_f2a1dbbd410b4486b756d7ef628dec15_1024x1024-removebg-preview.png'),
(115, '2140839_2_L-removebg-preview.png'),
(116, '2140580_1_L-removebg-preview.png'),
(117, '2140580_2_L-removebg-preview.png'),
(118, '2140580_4_L-removebg-preview.png'),
(119, '2140581_1_L-removebg-preview.png'),
(120, '2140581_4_L-removebg-preview.png'),
(121, 'Nike Air Vapormax2.png'),
(122, 'Nike Air Vapormax3.png'),
(123, 'Quan_Tech_QuickDraw_DJen_H40207_23_hover_model-removebg-preview.png'),
(124, 'Quan_Tech_QuickDraw_DJen_H40207_25_model-removebg-preview.png'),
(125, 'Quan_Tech_QuickDraw_DJen_H40207_41_detail-removebg-preview.png'),
(126, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_21_model-removebg-preview.png'),
(127, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_25_model-removebg-preview.png'),
(128, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_42_detail-removebg-preview.png'),
(130, 'Ao-achilles-xam-2-600x600-removebg-preview.png'),
(131, 'Ao-achilles-xanh-duong-2-600x600-removebg-preview.png'),
(144, 'Quan_short_3_Soc_Own_the_Run_DJen_GQ9352_21_model-removebg-preview.png'),
(145, 'Quan_short_3_Soc_Own_the_Run_DJen_GQ9352_41_detail-removebg-preview.png'),
(146, 'Quan_short_3_Soc_Own_the_Run_Xam_H36466_21_model-removebg-preview.png'),
(147, 'Quan_short_3_Soc_Own_the_Run_Xam_H36466_25_model-removebg-preview.png'),
(148, 'Ao_polo_3_Soc_Tennis_Club_DJo_H34698_21_model-removebg-preview.png'),
(149, 'Ao_polo_3_Soc_Tennis_Club_DJo_H34698_23_hover_model-removebg-preview.png'),
(150, 'Ao_polo_3_Soc_Tennis_Club_DJo_H34698_41_detail-removebg-preview.png'),
(151, 'Ao_polo_3_Soc_Tennis_Club_trang_GL5416_23_hover_model-removebg-preview.png'),
(152, 'Ao_polo_3_Soc_Tennis_Club_trang_GL5416_41_detail-removebg-preview.png'),
(153, 'Ao_polo_3_Soc_Tennis_Club_trang_GL5416_42_detail-removebg-preview.png'),
(154, 'Ao_Thun_Aeromotion_H29179_21_model-removebg-preview.png'),
(155, 'Ao_Thun_Aeromotion_H29179_23_hover_model-removebg-preview.png'),
(156, 'Ao_Thun_Aeromotion_H29179_41_detail-removebg-preview.png'),
(157, 'Ao_Thun_Aeromotion_Mau_xanh_da_troi_H29177_21_model-removebg-preview.png'),
(158, 'Ao_Thun_Aeromotion_Mau_xanh_da_troi_H29177_23_hover_model-removebg-preview.png'),
(159, 'Ao_Thun_Aeromotion_Mau_xanh_da_troi_H29177_42_detail-removebg-preview.png'),
(160, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_21_model-removebg-preview.png'),
(161, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_23_hover_model-removebg-preview.png'),
(162, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_41_detail-removebg-preview.png'),
(163, 'Ao_Thun_Own_the_Run_Hong_GJ9967_21_model-removebg-preview.png'),
(164, 'Ao_Thun_Own_the_Run_Hong_GJ9967_23_hover_model-removebg-preview.png'),
(165, 'Ao_Thun_Own_the_Run_Hong_GJ9967_42_detail-removebg-preview.png'),
(166, 'Ao_Thun_Own_the_Run_Mau_xanh_da_troi_H34494_21_model-removebg-preview.png'),
(167, 'Ao_Thun_Own_the_Run_Mau_xanh_da_troi_H34494_23_hover_model-removebg-preview.png'),
(168, 'Ao_Thun_Own_the_Run_Mau_xanh_da_troi_H34494_42_detail-removebg-preview.png'),
(169, 'Ao_Thun_Own_the_Run_Xam_H34487_21_model-removebg-preview.png'),
(170, 'Ao_Thun_Own_the_Run_Xam_H34487_23_hover_model-removebg-preview.png'),
(171, 'Ao_Thun_Own_the_Run_Xam_H34487_41_detail-removebg-preview.png'),
(172, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_21_model-removebg-preview.png'),
(173, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_23_hover_model-removebg-preview.png'),
(174, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_25_model-removebg-preview.png'),
(175, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_41_detail-removebg-preview.png'),
(176, 'Ao_khoac_3_Soc_Marathon_DJen_GM1410_42_detail-removebg-preview.png'),
(177, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_21_model-removebg-preview.png'),
(178, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_22_model-removebg-preview.png'),
(179, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_23_hover_model-removebg-preview.png'),
(180, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_25_model-removebg-preview.png'),
(181, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_41_detail-removebg-preview.png'),
(182, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_43_detail-removebg-preview.png'),
(183, 'Ao_khoac_3_Soc_Marathon_trang_GK6061_21_model-removebg-preview.png'),
(184, 'Ao_khoac_3_Soc_Marathon_trang_GK6061_22_model-removebg-preview.png'),
(185, 'Ao_khoac_3_Soc_Marathon_trang_GK6061_23_hover_model-removebg-preview.png'),
(186, 'Ao_khoac_3_Soc_Marathon_trang_GK6061_43_detail-removebg-preview.png'),
(188, 'Ao_khoac_3_Soc_Marathon_trang_H31042_21_model-removebg-preview.png'),
(189, 'Ao_khoac_3_Soc_Marathon_trang_H31042_23_hover_model-removebg-preview.png'),
(190, 'Ao_khoac_3_Soc_Marathon_trang_H31042_41_detail-removebg-preview.png'),
(191, 'Ao_khoac_3_Soc_Marathon_trang_H31042_42_detail-removebg-preview.png'),
(192, 'Ao_thun_Fast_Primeblue_DJen_GN4406_21_model-removebg-preview.png'),
(193, 'Ao_thun_Fast_Primeblue_DJen_GN4406_23_hover_model-removebg-preview.png'),
(194, 'Ao_thun_Fast_Primeblue_DJen_GN4406_25_model-removebg-preview.png'),
(195, 'Ao_thun_Fast_Primeblue_mau_xanh_la_H11276_21_model-removebg-preview.png'),
(196, 'Ao_thun_Fast_Primeblue_mau_xanh_la_H11276_22_model-removebg-preview.png'),
(197, 'Ao_thun_Fast_Primeblue_mau_xanh_la_H11276_23_hover_model-removebg-preview.png'),
(198, 'Ao_thun_Fast_Primeblue_trang_H32236_21_model-removebg-preview.png'),
(199, 'Ao_thun_Fast_Primeblue_trang_H32236_22_model-removebg-preview.png'),
(200, 'Ao_thun_Fast_Primeblue_trang_H32236_23_hover_model-removebg-preview.png'),
(201, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_GN4409_21_model-removebg-preview.png'),
(202, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_GN4409_23_hover_model-removebg-preview.png'),
(203, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_GN4409_25_model-removebg-preview.png'),
(204, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_GN4409_42_detail-removebg-preview.png'),
(205, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_21_model-removebg-preview.png'),
(206, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_22_model-removebg-preview.png'),
(207, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_23_hover_model-removebg-preview.png'),
(208, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_42_detail-removebg-preview.png'),
(209, 'PB_ALWAYSOM_SHO_DJen_GT3883_21_model-removebg-preview.png'),
(210, 'PB_ALWAYSOM_SHO_DJen_GT3883_23_hover_model-removebg-preview.png'),
(211, 'PB_ALWAYSOM_SHO_DJen_GT3883_25_model-removebg-preview.png'),
(212, 'PB_ALWAYSOM_SHO_DJen_GT3883_42_detail-removebg-preview.png'),
(213, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_21_model-removebg-preview.png'),
(214, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_23_hover_model-removebg-preview.png'),
(215, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_25_model-removebg-preview.png'),
(216, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_41_detail-removebg-preview.png'),
(217, 'PB_ALWAYSOM_SHO_trang_H11097_21_model-removebg-preview.png'),
(218, 'PB_ALWAYSOM_SHO_trang_H11097_23_hover_model-removebg-preview.png'),
(219, 'PB_ALWAYSOM_SHO_trang_H11097_25_model-removebg-preview.png'),
(220, 'PB_ALWAYSOM_SHO_trang_H11097_41_detail-removebg-preview.png'),
(221, 'Giay_Chay_Bo_UltraBoost_21_Tokyo_trang_S23863_02_standard_hover-removebg-preview.png'),
(222, 'Giay_Chay_Bo_UltraBoost_21_Tokyo_trang_S23863_03_standard-removebg-preview.png'),
(223, 'Giay_Chay_Bo_UltraBoost_21_Tokyo_trang_S23863_04_standard-removebg-preview.png'),
(224, 'Giay_Chay_Bo_UltraBoost_21_Tokyo_trang_S23863_05_standard-removebg-preview.png'),
(225, 'Giay_UltraBoost_21_trang_S23869_02_standard_hover-removebg-preview.png'),
(226, 'Giay_UltraBoost_21_trang_S23869_03_standard-removebg-preview.png'),
(227, 'Giay_UltraBoost_21_trang_S23869_04_standard-removebg-preview.png'),
(228, 'Giay_UltraBoost_21_trang_S23869_05_standard-removebg-preview.png'),
(229, 'Giay_UltraBoost_21_Xam_FY3952_02_standard-removebg-preview.png'),
(230, 'Giay_UltraBoost_21_Xam_FY3952_03_standard-removebg-preview.png'),
(231, 'Giay_UltraBoost_21_Xam_FY3952_04_standard-removebg-preview.png'),
(232, 'Giay_UltraBoost_21_Xam_FY3952_010_hover_standard-removebg-preview.png'),
(243, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (1).png'),
(244, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (2).png'),
(245, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (3).png'),
(246, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (4).png'),
(247, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (5).png'),
(248, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (6).png'),
(249, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (7).png'),
(250, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (9).png'),
(251, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (10).png'),
(252, 'jordan-why-not-zer04-pf-basketball-shoe-P3c3Rp-removebg-preview (11).png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img_size`
--

CREATE TABLE `tbl_img_size` (
  `id` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_imgcolor` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_img_size`
--

INSERT INTO `tbl_img_size` (`id`, `id_size`, `id_imgcolor`, `quantity`, `sell`) VALUES
(30, 127, 9606, 18, 0),
(31, 122, 9606, 29, 0),
(32, 121, 9606, 20, 0),
(33, 120, 9606, 50, 0),
(34, 119, 9606, 30, 0),
(35, 118, 9606, 30, 0),
(36, 117, 9606, 30, 0),
(37, 116, 9606, 30, 0),
(38, 115, 9606, 30, 0),
(39, 114, 9606, 30, 0),
(40, 127, 9605, 30, 0),
(41, 122, 9605, 30, 0),
(42, 121, 9605, 30, 0),
(43, 120, 9605, 30, 0),
(44, 119, 9605, 30, 0),
(45, 114, 9605, 30, 0),
(46, 115, 9605, 30, 0),
(47, 116, 9605, 30, 0),
(48, 117, 9605, 27, 0),
(49, 118, 9605, 30, 0),
(50, 109, 9608, 29, 0),
(51, 110, 9608, 37, 3),
(52, 113, 9611, 39, 0),
(53, 112, 9611, 30, 0),
(55, 110, 9611, 27, 3),
(56, 109, 9611, 29, 0),
(57, 113, 9610, 30, 0),
(58, 112, 9610, 30, 0),
(59, 110, 9610, 30, 0),
(60, 109, 9610, 30, 0),
(61, 119, 9604, 29, 0),
(62, 120, 9602, 29, 1),
(63, 119, 9602, 20, 0),
(64, 114, 9602, 18, 2),
(65, 115, 9602, 20, 0),
(66, 116, 9602, 17, 3),
(67, 117, 9602, 20, 0),
(68, 118, 9602, 20, 0),
(69, 119, 9604, 18, 2),
(70, 118, 9604, 20, 0),
(71, 117, 9604, 20, 0),
(72, 116, 9604, 20, 0),
(73, 115, 9604, 20, 0),
(74, 114, 9604, 20, 0),
(75, 120, 9601, 19, 1),
(76, 119, 9601, 17, 3),
(77, 114, 9601, 20, 0),
(78, 115, 9601, 20, 0),
(79, 116, 9601, 19, 1),
(80, 112, 9608, 18, 2),
(81, 113, 9608, 20, 0),
(82, 113, 9607, 20, 0),
(83, 112, 9607, 18, 2),
(84, 110, 9607, 18, 2),
(85, 109, 9607, 19, 1),
(86, 109, 9618, 30, 0),
(87, 110, 9618, 30, 0),
(88, 112, 9618, 30, 0),
(89, 113, 9618, 30, 0),
(90, 109, 9617, 30, 0),
(91, 110, 9617, 30, 0),
(92, 112, 9617, 30, 0),
(93, 113, 9617, 30, 0),
(94, 110, 9620, 30, 0),
(95, 112, 9620, 30, 0),
(96, 113, 9620, 20, 0),
(97, 109, 9619, 20, 0),
(98, 110, 9619, 20, 0),
(99, 112, 9619, 20, 0),
(100, 113, 9619, 20, 0),
(101, 113, 9623, 30, 0),
(102, 112, 9623, 28, 2),
(103, 110, 9623, 28, 2),
(104, 113, 9622, 30, 0),
(105, 112, 9622, 30, 0),
(106, 110, 9622, 30, 0),
(107, 113, 9621, 30, 0),
(108, 112, 9621, 25, 5),
(109, 110, 9621, 30, 0),
(110, 113, 9626, 30, 0),
(111, 112, 9626, 30, 0),
(112, 110, 9626, 29, 1),
(113, 113, 9625, 30, 0),
(114, 112, 9625, 30, 0),
(115, 110, 9625, 30, 0),
(116, 113, 9624, 30, 0),
(117, 112, 9624, 30, 0),
(118, 110, 9624, 30, 0),
(120, 129, 9628, 26, 4),
(121, 113, 9628, 28, 2),
(122, 112, 9628, 25, 5),
(123, 110, 9628, 27, 3),
(124, 129, 9627, 30, 0),
(125, 110, 9627, 28, 2),
(126, 112, 9627, 30, 0),
(127, 113, 9627, 30, 0),
(128, 129, 9630, 20, 0),
(129, 112, 9630, 20, 0),
(130, 110, 9630, 20, 0),
(131, 109, 9630, 19, 1),
(132, 129, 9629, 20, 0),
(133, 112, 9629, 20, 0),
(134, 110, 9629, 20, 0),
(135, 109, 9629, 20, 0),
(136, 129, 9633, 20, 0),
(137, 112, 9633, 20, 0),
(138, 110, 9633, 20, 0),
(139, 109, 9633, 18, 2),
(140, 129, 9632, 20, 0),
(141, 112, 9632, 20, 0),
(142, 110, 9632, 17, 3),
(143, 109, 9632, 20, 0),
(144, 129, 9631, 20, 0),
(145, 112, 9631, 20, 0),
(146, 110, 9631, 20, 0),
(147, 109, 9631, 20, 0),
(148, 129, 9634, 20, 0),
(149, 112, 9634, 19, 1),
(150, 110, 9634, 20, 0),
(151, 109, 9634, 20, 0),
(152, 129, 9635, 20, 0),
(153, 112, 9635, 20, 0),
(154, 110, 9635, 15, 5),
(155, 109, 9635, 20, 0),
(156, 129, 9638, 20, 0),
(157, 112, 9638, 20, 0),
(158, 110, 9638, 20, 0),
(159, 109, 9638, 19, 1),
(160, 129, 9637, 20, 0),
(161, 112, 9637, 20, 0),
(162, 110, 9637, 18, 2),
(163, 109, 9637, 20, 0),
(164, 129, 9636, 20, 0),
(165, 112, 9636, 20, 0),
(166, 110, 9636, 20, 0),
(167, 109, 9636, 20, 0),
(168, 121, 9641, 30, 0),
(169, 120, 9641, 30, 0),
(170, 119, 9641, 30, 0),
(171, 114, 9641, 28, 2),
(172, 115, 9641, 30, 0),
(173, 116, 9641, 30, 0),
(174, 117, 9641, 30, 0),
(175, 118, 9641, 30, 0),
(176, 121, 9640, 30, 0),
(177, 120, 9640, 30, 0),
(178, 119, 9640, 30, 0),
(179, 114, 9640, 30, 0),
(180, 115, 9640, 30, 0),
(181, 116, 9640, 30, 0),
(182, 117, 9640, 30, 0),
(183, 121, 9639, 30, 0),
(184, 120, 9639, 30, 0),
(185, 119, 9639, 30, 0),
(186, 114, 9639, 30, 0),
(187, 115, 9639, 30, 0),
(188, 116, 9639, 30, 0),
(189, 117, 9639, 30, 0),
(190, 118, 9646, 20, 0),
(191, 117, 9646, 20, 0),
(192, 116, 9646, 20, 0),
(193, 115, 9646, 20, 0),
(194, 118, 9645, 20, 0),
(195, 117, 9645, 30, 0),
(196, 116, 9645, 30, 0),
(197, 115, 9645, 30, 0),
(198, 119, 9645, 30, 0),
(199, 114, 9645, 30, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `img_profile` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`, `username`, `phone`, `img_profile`, `code`, `type`) VALUES
(5, 'tiennguyentran201@gmail.com', '2a26569e98b26668f39e98e6baef2d54', 'Trần Tiến ', '0935640559', 'z2291102527507_b4c32c4dda5d69e6add5ba1eaef6c2d1.jpg', '0', 2),
(9, 'ngoctien@gmail.com', '2a26569e98b26668f39e98e6baef2d54', 'Ngoc Tien', '0935xxxxxxx', 'facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg', '0', 0),
(14, 'tientumtim201@gmail.com', '2a26569e98b26668f39e98e6baef2d54', 'Nguyễn Trần Tiến', '0905343491', '191736606_171310201666179_8028458714529778871_n.jpg', '823948', 0),
(4049, 'ua25052004@gmail.com', '8e8fe632000e47e05eef419be7762a3d', 'Nguyễn Như Ý', '08992437555', '043a03c97b179749ce06.jpg', '0', 0),
(4833, 'anhduccva94@gmail.com', '3178914d6e429889da9de8df2a3b8928', 'Trần Lê Anh Đức', '0905132132', '250491052_1748849405310455_708711169477241118_n.jpg', '0', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `day` varchar(40) NOT NULL,
  `hour` varchar(30) NOT NULL,
  `date` varchar(255) NOT NULL,
  `sender_phone` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `day`, `hour`, `date`, `sender_phone`, `sender_name`, `email`, `receiver_name`, `receiver_phone`, `country`, `city`, `district`, `address`, `total`, `username`, `order_status`) VALUES
(14479, '2021-11-19', '07:16:10pm', '2021-11-19 - 07:16:10pm', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '6020000', 'Nguyễn Trần Tiến', 'Đang chờ xử lí'),
(15366, '2021-11-20', '10:14:58pm', '2021-11-20 - 10:14:58pm', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '4520000', 'Nguyễn Trần Tiến', 'Mới'),
(23889, '2021-11-19', '07:36:32pm', '2021-11-19 - 07:36:32pm', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '4722000', 'Nguyễn Trần Tiến', 'Đang chờ xử lí'),
(24980, '2021-12-4', '03:20:40pm', '2021-12-4 - 03:20:40pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '7500000', 'Nguyễn Như Ý', 'Đang chờ xử lí'),
(27763, '2021-12-7', '03:50:23pm', '2021-12-7 - 03:50:23pm', '0905132132', 'Trần Lê Anh Đức', 'anhduccva94@gmail.com', 'Nguyễn Trần Tiến', '091321235', 'Việt Nam', 'Huế', 'Thành phố Huế', '20/4 Kim Long', '6400000', 'Trần Lê Anh Đức', 'Mới'),
(32932, '2021-12-4', '03:14:04pm', '2021-12-4 - 03:14:04pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '4000000', 'Nguyễn Như Ý', 'Mới'),
(32938, '2021-11-19', '11:49:59pm', '2021-11-19 - 11:49:59pm', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '2020000', 'Nguyễn Trần Tiến', 'Đang chờ xử lí'),
(44115, '2021-12-7', '12:09:07am', '2021-12-7 - 12:09:07am', '0935640559', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Trần Tiến', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '20/4 Kim Long', '4875000', 'Nguyễn Như Ý', 'Mới'),
(45014, '2021-11-20', '08:22:42am', '2021-11-20 - 08:22:42am', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '4020000', 'Nguyễn Trần Tiến', 'Đang chờ xử lí'),
(47145, '2021-11-29', '04:10:34pm', '2021-11-29 - 04:10:34pm', '0912312313', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '2044000', 'Nguyễn Trần Tiến', 'Đã hoàn thành'),
(48333, '2021-12-4', '03:07:33pm', '2021-12-4 - 03:07:33pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '6000000', 'Nguyễn Như Ý', 'Mới'),
(50172, '2021-12-4', '03:17:15pm', '2021-12-4 - 03:17:15pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '6000000', 'Nguyễn Như Ý', 'Mới'),
(63585, '2021-11-20', '10:21:58pm', '2021-11-20 - 10:21:58pm', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '63 Nguyễn Trọng Nhân', '1420000', 'Nguyễn Trần Tiến', 'Mới'),
(64500, '2021-11-28', '11:27:39pm', '2021-11-28 - 11:27:39pm', '0935xxxxxxx', 'Tran Tien', 'tiennguyentran201@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '1220000', 'Trần Tiến', 'Mới'),
(68665, '2021-11-22', '08:40:01am', '2021-11-22 - 08:40:01am', '0935640559', 'Nguyễn Trần Tiến', 'tientumtim201@gmail.com', 'Nguyễn Như Ý', '0899243755', 'Việt Nam', 'Huế', 'Huyện Hương Trà', '63 Nguyễn Trọng Nhân', '1420000', 'Nguyễn Trần Tiến', 'Mới'),
(72099, '2021-12-4', '03:11:58pm', '2021-12-4 - 03:11:58pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '4200000', 'Nguyễn Như Ý', 'Mới'),
(73003, '2021-12-1', '11:12:27pm', '2021-12-1 - 11:12:27pm', '0912312313', 'Tran Tien', 'tiennguyentran201@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '3020000', 'Trần Tiến', 'Mới'),
(83998, '2021-12-4', '03:15:08pm', '2021-12-4 - 03:15:08pm', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Như Ý', '0912312313', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '6000000', 'Nguyễn Như Ý', 'Mới'),
(88705, '2021-12-4', '11:48:14am', '2021-12-4 - 11:48:14am', '0912312313', 'Nguyễn Như Ý', 'ua25052004@gmail.com', 'Nguyễn Trần Tiến', '0935640559', 'Việt Nam', 'Huế', 'Thành phố Huế', '36 Nguyễn Trọng Nhân', '7400000', 'Nguyễn Như Ý', 'Đang chờ xử lí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id_order_details` int(11) NOT NULL,
  `id_img_size` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_size` varchar(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id_order_details`, `id_img_size`, `id_order`, `product_img`, `product_size`, `product_name`, `quantity`) VALUES
(12, 69, 14479, 'jordan-proto-max-720-shoes-TFlVqB-removebg-preview.png', '39', 'Jordan Proto-Max 720', 2),
(13, 79, 14479, 'Nike_Jordan_Proto_Max1-removebg-preview.png', '42', 'Jordan Proto-Max 720', 1),
(14, 83, 23889, 'Quan_Tech_QuickDraw_DJen_H40207_01_laydown-removebg-preview.png', '0', 'Quần TECH QUICKDRAW', 2),
(15, 55, 23889, 'Ao-achilles-xanh-duong-1-600x600-removebg-preview.png', '0', 'Áo thun thể thao Achilles', 3),
(16, 51, 32938, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_01_laydown-removebg-preview.png', '0', 'Quần TECH QUICKDRAW', 1),
(17, 51, 45014, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_01_laydown-removebg-preview.png', '0', 'Quần TECH QUICKDRAW', 2),
(18, 123, 15366, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_01_laydown-removebg-preview.png', '0', 'Áo khoác 3 sọc Marathon', 3),
(19, 103, 63585, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_01_laydown-removebg-preview.png', '0', 'Áo thun AEROMOTION', 2),
(20, 102, 68665, 'Ao_Thun_Aeromotion_mau_xanh_la_H29178_01_laydown-removebg-preview.png', '0', 'Áo thun AEROMOTION', 2),
(21, 159, 64500, 'PB_ALWAYSOM_SHO_trang_H11097_01_laydown-removebg-preview.png', '0', 'PB ALWAYSOM SHO', 1),
(22, 131, 47145, 'Ao_khoac_3_Soc_Marathon_trang_H31042_01_laydown-removebg-preview.png', 'M', 'Áo khoác 3 sọc Marathon', 1),
(23, 112, 47145, 'Ao_Thun_Own_the_Run_Xam_H34487_01_laydown-removebg-preview.png', 'XL', 'Áo thun OWN THE RUN', 1),
(24, 121, 73003, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_01_laydown-removebg-preview.png', 'XXL', 'Áo khoác 3 sọc Marathon Nam', 2),
(25, 171, 88705, 'Giay_UltraBoost_21_Xam_FY3952_01_standard-removebg-preview.png', '40', 'Giày ULTRABOOST 21', 2),
(26, 108, 88705, 'Ao_Thun_Aeromotion_H29179_01_laydown-removebg-preview.png', 'L', 'Áo thun AEROMOTION', 3),
(27, 120, 48333, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_01_laydown-removebg-preview.png', 'S', 'Áo khoác 3 sọc Marathon Nam', 4),
(28, 154, 72099, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_01_laydown-removebg-preview.png', 'XL', 'Quần 2 trong 1 FAST PRIMEBLUE', 4),
(29, 80, 32932, 'Quan_Tech_QuickDraw_mau_xanh_la_H40209_01_laydown-removebg-preview.png', 'L', 'Quần TECH QUICKDRAW', 2),
(30, 76, 83998, 'Nike_Jordan_Proto_Max1-removebg-preview.png', '39', 'Jordan Proto-Max 720', 3),
(31, 66, 50172, 'NikeJordanProtoMax-removebg-preview.png', '42', 'Jordan Proto-Max 720', 3),
(32, 122, 24980, 'Ao_khoac_3_Soc_Marathon_trang_GK6111_01_laydown-removebg-preview.png', 'L', 'Áo khoác 3 sọc Marathon Nam', 5),
(36, 139, 44115, 'Ao_thun_Fast_Primeblue_trang_H32236_01_laydown-removebg-preview (1).png', 'M', 'Áo thun FAST PRIMEBLUE', 2),
(37, 142, 44115, 'Ao_thun_Fast_Primeblue_mau_xanh_la_H11276_01_laydown-removebg-preview.png', 'XL', 'Áo thun FAST PRIMEBLUE', 3),
(38, 154, 44115, 'Quan_short_2_trong_1_Fast_Primeblue_DJen_H32234_01_laydown-removebg-preview.png', 'XL', 'Quần 2 trong 1 FAST PRIMEBLUE', 1),
(39, 84, 27763, 'Quan_Tech_QuickDraw_DJen_H40207_01_laydown-removebg-preview.png', 'XL', 'Quần TECH QUICKDRAW', 2),
(40, 162, 27763, 'PB_ALWAYSOM_SHO_Mau_xanh_da_troi_GT3882_01_laydown-removebg-preview.png', 'XL', 'PB ALWAYSOM SHO', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_page_instruct`
--

CREATE TABLE `tbl_page_instruct` (
  `id_page` int(11) NOT NULL,
  `page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_page_instruct`
--

INSERT INTO `tbl_page_instruct` (`id_page`, `page`) VALUES
(1, 'homepage');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(40) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date_up` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `date_update` varchar(255) NOT NULL,
  `staff_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `product_name`, `description`, `price`, `id_brand`, `id_category`, `date_up`, `status`, `date_update`, `staff_name`) VALUES
(20327, 'Áo thun FAST PRIMEBLUE', '<ul><li>Khai ph&aacute; tốc độ của bạn.</li><li>Chiếc &aacute;o thun họa tiết da b&aacute;o adidas n&agrave;y mang đến cho bạn phong c&aacute;ch t&aacute;o bạo khi c&aacute;n đ&iacute;ch.</li><li>D&aacute;ng &aacute;o hộp v&agrave; lửng vừa s&agrave;nh điệu vừa gi&uacute;p bạn thoải m&aacute;i vận động. C&ocirc;ng nghệ AEROREADY gi&uacute;p bạn lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; tập trung tới bước chạy cuối c&ugrave;ng.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primeblue, chất liệu t&aacute;i chế hiệu năng cao c&oacute; sử dụng sợi Parley Ocean Plastic.</li></ul>', 850000, 1, 19, '20/11/2021 10:10:06am', 0, '28/11/2021  04:24:03pm', 'Tran Tien'),
(44284, 'Áo thun thể thao Achilles', '<ul><li>&Aacute;o thun thể thao&nbsp;<strong>Achilles </strong>l&agrave; một trong những mẫu &aacute;o thể thao &ldquo;Thần Thoại Hy Lạp&rdquo; của 2020 năm nay.</li><li>&Aacute;o được thiết kế với phong c&aacute;ch thời trang, năng động, c&ugrave;ng với chất liệu co giản 4 chiều.</li><li>Đ&acirc;y sẽ l&agrave; một trong những mẫu trang phục kh&ocirc;ng thể thiếu khi đồng h&agrave;nh c&ugrave;ng bạn đến ph&ograve;ng tập hay bất cứ m&ocirc;n thể thao n&agrave;o.</li></ul>', 300000, 10, 9, '05/11/2021 02:59:36pm', 0, 'November 16, 2021, 11:01 am', 'Tran Tien'),
(77460, 'Áo khoác 3 sọc Marathon Nam', '<ul><li>Trang phục của bạn mang &yacute; nghĩa rất quan trọng.</li><li>Chiếc &aacute;o kho&aacute;c adidas n&agrave;y l&agrave;m từ chất liệu t&aacute;i chế, thể hiện cam kết của adidas hướng tới chấm dứt r&aacute;c thải nhựa.</li><li>H&atilde;y tự h&agrave;o thể hiện phong c&aacute;ch thể thao đầy t&aacute;o bạo. Bạn đang tạo ra sự kh&aacute;c biệt.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primegreen, thuộc d&ograve;ng chất liệu t&aacute;i chế hiệu năng cao.</li></ul>', 1500000, 1, 17, '20/11/2021 09:19:40am', 2, '20/11/2021  09:19:40am', 'Tran Tien'),
(171407, 'Nike Westbrook', '<ul><li>Tốc độ l&agrave; vũ kh&iacute; bất ly th&acirc;n của Russell Westbrook. Anh ấy vượt ra ngo&agrave;i cuộc thi, x&acirc;y dựng động lực v&agrave; vận động theo c&aacute;ch của m&igrave;nh v&agrave;o guồng quay nổi bật. Cue Jordan &#39;Tại sao kh&ocirc;ng?&#39; Zer0.4, chiếc đầu ti&ecirc;n c&oacute; t&iacute;nh năng Zoom k&eacute;p xếp chồng l&ecirc;n nhau ở b&agrave;n ch&acirc;n trước.</li><li>Đ&oacute; l&agrave; một hệ thống đệm cực nhạy được thiết kế để gi&uacute;p anh ta chuyển h&oacute;a tốc độ th&agrave;nh lực v&agrave; tập trung tấn c&ocirc;ng. Phi&ecirc;n bản PF n&agrave;y sử dụng đế ngo&agrave;i si&ecirc;u bền, l&yacute; tưởng cho c&aacute;c s&acirc;n ngo&agrave;i trời.</li></ul>', 1500000, 2, 14, '06/12/2021 06:03:06pm', 2, '06/12/2021  06:03:06pm', 'Tran Tien'),
(322389, 'Áo thun OWN THE RUN', '<ul><li>Tủ đồ của bạn đầy những chiếc &aacute;o thun chạy bộ kh&ocirc;ng ph&ugrave; hợp lắm. Qu&aacute; d&agrave;y hoặc qu&aacute; mỏng.</li><li>Qu&aacute; rộng hoặc qu&aacute; chật. Nhưng nằm tr&ecirc;n c&ugrave;ng đống đồ chất cao kia sẽ lu&ocirc;n l&agrave; chiếc &aacute;o thun adidas Own The Run n&agrave;y.</li><li>Với chất liệu t&aacute;i chế thể hiện cam kết bền vững của ch&uacute;ng t&ocirc;i, chiếc &aacute;o n&agrave;y gi&uacute;p bạn lu&ocirc;n thoải m&aacute;i tr&ecirc;n đường chạy d&agrave;i ng&agrave;y Chủ Nhật hay cự ly 5K giờ nghỉ trưa thứ Hai. Đừng bao giờ h&agrave;i l&ograve;ng với những g&igrave; kh&ocirc;ng ph&ugrave; hợp</li></ul>', 800000, 1, 16, '20/11/2021 04:39:47am', 0, '20/11/2021  04:39:47am', 'Tran Tien'),
(555735, 'Áo thun AEROMOTION', '<ul><li>Tr&aacute;nh sự cố &quot;lộ h&agrave;ng&quot; khi dồn sức tập tạ hay dạy hội bạn chơi b&oacute;ng rổ.</li><li>Chiếc &aacute;o thun tập luyện adidas n&agrave;y c&oacute; thiết kế si&ecirc;u nhẹ, co gi&atilde;n v&agrave; chuyển động linh hoạt c&ugrave;ng bạn, với kiểu d&aacute;ng &ocirc;m s&aacute;t gi&uacute;p kh&ocirc;ng ch&uacute;t ph&acirc;n t&acirc;m.</li><li>C&ocirc;ng nghệ AEROREADY thấm h&uacute;t ẩm gi&uacute;p bạn lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i, đồng thời c&aacute;c mảng phối lưới b&ecirc;n h&ocirc;ng tạo cảm gi&aacute;c tho&aacute;ng m&aacute;t.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primegreen, thuộc d&ograve;ng chất liệu t&aacute;i chế hiệu năng cao.</li></ul>', 700000, 1, 16, '20/11/2021 04:14:44am', 2, '20/11/2021  04:14:44am', 'Tran Tien'),
(626327, 'Nike Air Vapormax  2019', '<ul><li>Được thiết kế để chạy nhưng được sử dụng tr&ecirc;n đường phố, Nike Air VaporMax 2019 c&oacute; lớp đệm Air Max nhẹ nhất, linh hoạt nhất cho đến nay.</li><li>Chất liệu dệt co gi&atilde;n bao bọc b&agrave;n ch&acirc;n của bạn để c&oacute; sự hỗ trợ nhẹ v&agrave; ổn định, trong khi phần gia cố b&ecirc;n ngo&agrave;i ở g&oacute;t ch&acirc;n giữ chặt phần sau b&agrave;n ch&acirc;n của bạn.</li></ul>', 1500000, 2, 14, '05/11/2021 02:09:36pm', 2, '29/10/2021 03:26:52pm', 'Tran Tien'),
(641815, 'Quần 2 trong 1 FAST PRIMEBLUE', '<ul><li>Khi nhiệt độ bắt đầu tăng cao, h&atilde;y thay quần legging bằng chiếc quần short chạy bộ 2 trong 1 adidas n&agrave;y.</li><li>Quần may bằng chất vải mềm mại v&agrave; tho&aacute;ng kh&iacute; k&egrave;m quần b&oacute; b&ecirc;n trong cho cảm gi&aacute;c n&acirc;ng đỡ.</li><li>Thiết kế cố định chắc chắn nhờ lưng quần cao v&agrave; d&acirc;y r&uacute;t.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primeblue, chất liệu t&aacute;i chế hiệu năng cao c&oacute; sử dụng sợi Parley Ocean Plastic.</li></ul>', 1050000, 1, 8, '20/11/2021 01:33:32pm', 2, '20/11/2021  01:33:32pm', 'Tran Tien'),
(669125, 'Quần TECH QUICKDRAW', '<ul><li>Khi đ&atilde; trễ hẹn, bạn muốn xỏ ch&acirc;n v&agrave;o một chiếc quần thật nhanh gọn.</li><li>Hoặc sau khi ho&agrave;n th&agrave;nh buổi tập, bạn muốn duy tr&igrave; cảm gi&aacute;c tự do vận động như khi ở ph&ograve;ng gym.</li><li>Chiếc quần adidas n&agrave;y ch&iacute;nh l&agrave; c&acirc;u trả lời d&agrave;nh cho bạn. Chất vải twill si&ecirc;u nhẹ gi&uacute;p bạn thoải m&aacute;i suốt ng&agrave;y d&agrave;i. Cạp chun đảm bảo độ &ocirc;m cố định.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primegreen, thuộc d&ograve;ng chất liệu t&aacute;i chế hiệu năng cao.</li></ul>', 2000000, 1, 13, '05/11/2021 04:06:29pm', 2, '05/11/2021  04:06:29pm', 'Tran Tien'),
(681471, 'Giày ULTRABOOST 21', '<ul><li>Nỗ lực v&igrave; ch&iacute;nh bản th&acirc;n bạn. Đ&ocirc;i gi&agrave;y chạy bộ adidas Ultraboost 21 n&agrave;y gi&uacute;p mọi chuyện dễ d&agrave;ng hơn. Si&ecirc;u nhẹ nhưng vẫn giữ nguy&ecirc;n độ n&acirc;ng đỡ, th&acirc;n gi&agrave;y adidas Primeknit+ th&iacute;ch ứng theo h&igrave;nh d&aacute;ng b&agrave;n ch&acirc;n khi chuyển động.</li><li>Lớp đệm Boost đ&agrave;n hồi cho cảm gi&aacute;c trợ lực như lời nhắc bạn lu&ocirc;n c&oacute; thể cố gắng th&ecirc;m một sải bước, một d&atilde;y phố hay thậm ch&iacute; hẳn một dặm. (Nhớ th&ecirc;m v&agrave;i b&agrave;i h&aacute;t v&agrave;o playlist chạy bộ. Biết đ&acirc;u bạn sẽ cần đến.)</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primeblue, chất liệu t&aacute;i chế hiệu năng cao c&oacute; sử dụng sợi Parley Ocean Plastic. 50% th&acirc;n gi&agrave;y l&agrave;m bằng vải dệt, 75% vải dệt bằng sợi Primeblue.</li><li>Kh&ocirc;ng sử dụng polyester nguy&ecirc;n sinh.</li></ul>', 3000000, 1, 14, '20/11/2021 04:02:06pm', 0, '20/11/2021  04:02:06pm', 'Tran Tien'),
(826706, 'Áo Polo 3 Sọc Tennis ', '<ul><li>Chơi theo c&aacute;ch của ri&ecirc;ng bạn. Chiếc &aacute;o polo tennis AEROREADY n&agrave;y thấm h&uacute;t ẩm để gi&uacute;p bạn t&igrave;m thấy nhịp điệu của ri&ecirc;ng m&igrave;nh.</li><li>C&aacute;c mảng phối lưới tr&ecirc;n vai v&agrave; b&ecirc;n h&ocirc;ng tăng cường lưu th&ocirc;ng kh&iacute; v&agrave; giảm thời gian nghỉ hồi sức.</li><li>&Aacute;o c&oacute; sử dụng chất liệu t&aacute;i chế, thể hiện cam kết của adidas hướng tới chấm dứt r&aacute;c thải nhựa.</li><li>Sản phẩm n&agrave;y may bằng vải c&ocirc;ng nghệ Primegreen, thuộc d&ograve;ng chất liệu t&aacute;i chế hiệu năng cao.</li></ul>', 850000, 1, 9, '16/11/2021 03:59:13pm', 0, '16/11/2021  03:59:13pm', 'Tran Tien'),
(955126, 'PB ALWAYSOM SHO', '', 1200000, 1, 20, '20/11/2021 03:16:41pm', 2, '20/11/2021  03:16:41pm', 'Tran Tien'),
(982043, 'Jordan Proto-Max 720', '<ul><li>Lấy cảm hứng từ chuyến bay ngo&agrave;i kh&ocirc;ng gian, Jordan Proto-Max 720 mang đến sự thoải m&aacute;i cả ng&agrave;y với h&igrave;nh ảnh tương lai.</li></ul>', 2000000, 2, 14, '05/11/2021 04:24:47pm', 2, '05/11/2021  04:24:47pm', 'Tran Tien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id_size` int(11) NOT NULL,
  `size` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`id_size`, `size`) VALUES
(109, 'M'),
(110, 'XL'),
(112, 'L'),
(113, 'XXL'),
(114, '40'),
(115, '41'),
(116, '42'),
(117, '43'),
(118, '44'),
(119, '39'),
(120, '38'),
(121, '37'),
(122, '36'),
(127, '35'),
(129, 'S');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `id_slide` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `text_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_slide`
--

INSERT INTO `tbl_slide` (`id_slide`, `img1`, `img2`, `text_slide`) VALUES
(1, 'Nike_Jordan_Proto_Max1-removebg-preview.png', 'NikeJordanProtoMax-removebg-preview.png', 'Nike '),
(2, 'Nike Air Vapormax.png', 'Nike Air Vapormax1.png', 'Nike Air');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id_state` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_state`
--

INSERT INTO `tbl_state` (`id_state`, `id_city`, `state`, `total`) VALUES
(1, 1, 'Thành phố Huế', '20000'),
(2, 1, 'Huyện A Lưới', '20000'),
(3, 1, 'Huyện Nam Đông', '25000'),
(4, 1, 'Huyện Phong Điền', '20000'),
(5, 1, 'Huyện Phú Lộc', '20000'),
(6, 1, 'Huyện Phú Vang', '20000'),
(7, 1, 'Huyện Quảng Điền', '20000'),
(8, 1, 'Huyện Hương Thủy', '20000'),
(9, 1, 'Huyện Hương Trà', '20000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `id_voucher` int(11) NOT NULL,
  `code_voucher` varchar(100) NOT NULL,
  `total` int(30) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`id_voucher`, `code_voucher`, `total`, `id_user`) VALUES
(8, 'FCJsT5dam1JB', 100000, 4833),
(9, 'FCJsT5dam255', 100000, 4049),
(10, 'UATsT5dam201', 100000, 4049);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_country` (`id_country`);

--
-- Chỉ mục cho bảng `tbl_class_instruct`
--
ALTER TABLE `tbl_class_instruct`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `id_page` (`id_page`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id_country`);

--
-- Chỉ mục cho bảng `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id_discount`);

--
-- Chỉ mục cho bảng `tbl_discount_product`
--
ALTER TABLE `tbl_discount_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_discount` (`id_discount`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_imgcolor` (`id_imgcolor`),
  ADD KEY `id_imgdesc` (`id_imgdesc`);

--
-- Chỉ mục cho bảng `tbl_imgcolor`
--
ALTER TABLE `tbl_imgcolor`
  ADD PRIMARY KEY (`id_imgcolor`);

--
-- Chỉ mục cho bảng `tbl_imgcolor_product`
--
ALTER TABLE `tbl_imgcolor_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_imgcolor` (`id_imgcolor`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_imgdesc`
--
ALTER TABLE `tbl_imgdesc`
  ADD PRIMARY KEY (`id_imgdesc`);

--
-- Chỉ mục cho bảng `tbl_img_size`
--
ALTER TABLE `tbl_img_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_imgcolor` (`id_imgcolor`);

--
-- Chỉ mục cho bảng `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id_order_details`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_img_size`);

--
-- Chỉ mục cho bảng `tbl_page_instruct`
--
ALTER TABLE `tbl_page_instruct`
  ADD PRIMARY KEY (`id_page`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id` (`staff_name`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id_state`),
  ADD KEY `id_city` (`id_city`);

--
-- Chỉ mục cho bảng `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id_voucher`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_class_instruct`
--
ALTER TABLE `tbl_class_instruct`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id_discount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_discount_product`
--
ALTER TABLE `tbl_discount_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `tbl_imgcolor`
--
ALTER TABLE `tbl_imgcolor`
  MODIFY `id_imgcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9651;

--
-- AUTO_INCREMENT cho bảng `tbl_imgcolor_product`
--
ALTER TABLE `tbl_imgcolor_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tbl_imgdesc`
--
ALTER TABLE `tbl_imgdesc`
  MODIFY `id_imgdesc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT cho bảng `tbl_img_size`
--
ALTER TABLE `tbl_img_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT cho bảng `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7940;

--
-- AUTO_INCREMENT cho bảng `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89494;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id_order_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_page_instruct`
--
ALTER TABLE `tbl_page_instruct`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=982044;

--
-- AUTO_INCREMENT cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD CONSTRAINT `tbl_banner_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_login` (`id`);

--
-- Các ràng buộc cho bảng `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `tbl_country` (`id_country`);

--
-- Các ràng buộc cho bảng `tbl_class_instruct`
--
ALTER TABLE `tbl_class_instruct`
  ADD CONSTRAINT `tbl_class_instruct_ibfk_1` FOREIGN KEY (`id_page`) REFERENCES `tbl_page_instruct` (`id_page`);

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`),
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_login` (`id`);

--
-- Các ràng buộc cho bảng `tbl_discount_product`
--
ALTER TABLE `tbl_discount_product`
  ADD CONSTRAINT `tbl_discount_product_ibfk_1` FOREIGN KEY (`id_discount`) REFERENCES `tbl_discount` (`id_discount`),
  ADD CONSTRAINT `tbl_discount_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Các ràng buộc cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD CONSTRAINT `tbl_img_ibfk_1` FOREIGN KEY (`id_imgcolor`) REFERENCES `tbl_imgcolor` (`id_imgcolor`),
  ADD CONSTRAINT `tbl_img_ibfk_2` FOREIGN KEY (`id_imgdesc`) REFERENCES `tbl_imgdesc` (`id_imgdesc`);

--
-- Các ràng buộc cho bảng `tbl_imgcolor_product`
--
ALTER TABLE `tbl_imgcolor_product`
  ADD CONSTRAINT `tbl_imgcolor_product_ibfk_1` FOREIGN KEY (`id_imgcolor`) REFERENCES `tbl_imgcolor` (`id_imgcolor`),
  ADD CONSTRAINT `tbl_imgcolor_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Các ràng buộc cho bảng `tbl_img_size`
--
ALTER TABLE `tbl_img_size`
  ADD CONSTRAINT `tbl_img_size_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `tbl_size` (`id_size`),
  ADD CONSTRAINT `tbl_img_size_ibfk_2` FOREIGN KEY (`id_imgcolor`) REFERENCES `tbl_imgcolor` (`id_imgcolor`);

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`),
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`id_img_size`) REFERENCES `tbl_img_size` (`id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `tbl_brand` (`id_brand`),
  ADD CONSTRAINT `tbl_product_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`);

--
-- Các ràng buộc cho bảng `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD CONSTRAINT `tbl_state_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `tbl_city` (`id_city`);

--
-- Các ràng buộc cho bảng `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD CONSTRAINT `tbl_voucher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

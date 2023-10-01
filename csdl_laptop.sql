-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2023 lúc 05:08 PM
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
-- Cơ sở dữ liệu: `csdl_laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'admin2', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(7, 'admin3', 'c4ca4238a0b923820dcc509a6f75849b', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageurl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `imageurl`) VALUES
(1, 'HP', 'HP', 'hp.png'),
(2, 'ACER', 'ACER', 'acer.png'),
(3, 'DELL', 'DELL', 'dell.png'),
(4, 'ASUS', 'ASUS', 'asus.png'),
(5, 'Lenovo', 'Lenovo', 'lenovo.png'),
(6, 'MacBook', 'MacBook', 'macbook.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `customerid`, `productid`, `quantity`, `price`) VALUES
(41, 6, 41, 1, 0),
(66, 1, 41, 1, 19999000),
(67, 1, 42, 2, 23990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Văn Phòng', 'Văn Phòng'),
(2, 'Sinh Viên', 'Sinh Viên'),
(3, 'Gamming', 'Gamming'),
(4, 'Đồ họa', 'Đồ họa'),
(5, 'Mỏng nhẹ', 'Mỏng nhẹ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `cardname` varchar(255) DEFAULT NULL,
  `harddrive` varchar(255) DEFAULT NULL,
  `screen` varchar(255) DEFAULT NULL,
  `connect` varchar(255) DEFAULT NULL,
  `operatingsystem` varchar(255) DEFAULT NULL,
  `battery` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `configuration`
--

INSERT INTO `configuration` (`id`, `productid`, `cpu`, `ram`, `cardname`, `harddrive`, `screen`, `connect`, `operatingsystem`, `battery`) VALUES
(4, 15, 'Intel Core i7-12700H (3.5GHz~4.7GHz) 14 Cores 20 Threads', '16GB DDR5 ', 'Intel Iris Xe Graphics', '512GB SSD M.2 PCIe Gen 4.0', '16.1 inch FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC', '1 x HDMI 2.1 ,1 x Multi SD card reader,1 x Mic-in/ Headphone-out combo jack,1 x RJ45', 'Windows 11 Home', '4 Cells'),
(5, 16, 'Intel Core i5-1335U (10 cores/ 12 threads, up to 4.6 GHz, 12MB Cache)', '8GB DDR4 3200MHz', 'Intel Iris Xe Graphics', '512GB M.2 PCIeNVMe SSD', '14-inch FHD (1920 x 1080) Touch-Screen, IPS, edge-to-edge glass, micro-edge', '1x HDMI 2.1 ,1x Jack 3.5mm ,1x SD Card ,1x AC smart pin', 'Windows 10 Home', '3 Cells'),
(7, 18, '10th Generation Intel® Core™ i5-10310U (4-Core, 6MB Cache, up to 4.4GHz Max Turbo Frequency)', '16GB DDR4 2666MHz ', 'Intel® UHD Graphics 630', '256GB PCIe M.2 SSD', '15.6 inch', '3 x USB 3.1 Gen1 Type-A ,1 x USB 3.1 Gen1 Type-C (DisplayPort 1.4) hỗ trợ sạc ,1 x HDMI 2.1,1 x Multi SD card reader ,1 x Mic-in/ Headphone-out combo jack', 'Windows 10 Home', '53 Wh Lithium-Ion'),
(8, 19, 'AMD Ryzen 5 6600H (3.3GHz~4.5GHz) 6 Cores 12 Threads', '8GB DDR5 ', 'NVIDIA GeForce RTX 3050  4GB GDDR6', '512GB SSD M.2 PCIe Gen 4.0', '16.1 inch FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC', '3 x USB 3.1 Gen1 Type-A ,1 x USB 3.1 Gen1 Type-C (DisplayPort 1.4) hỗ trợ sạc ,1 x HDMI 2.1 ,1 x Multi SD card reader ,1 x Mic-in/ Headphone-out combo jack', 'Windows 11 Home', '3-cells'),
(9, 20, 'Intel Core i5-11400H', '8GB DDR4 3200MHz , 2x SO-DIMM slot', 'NVIDIA® GeForce RTX™ 3050 4GB', '512GB NVMe SSD', '15.6 inch FHD (1920x1080)IPS, Non-Glare, 144Hz', '1x Type A USB 2.0 ,1x Type C USB 3.2 Gen 2', 'Windows 11 64 Bit', '3-cells'),
(12, 23, 'Intel Core i5-12500H Processor (3.30GHz up to 4.50GHz, 12 nhân 16 luồng)', '8GB DDR4 on board (1 khe trống)', 'Intel® Iris® Xe Graphics', '512GB M.2 NVMe™ PCIe® 3.0 SSD', '15.6 Inch OLED Full HD (1920×1080)', 'Wi-Fi 6(802.11ax)+Bluetooth 5.0 (Dual band) 2*2', 'Windows 11 64 Bit', '70WHrs, 3S1P, 3-cell Li-ion'),
(13, 24, '12th Gen Intel® Core™ i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz, 14 cores: 6 P-cores and 8 E-cores)', '8GB DDR5-4800 SO-DIMM', 'Intel® Iris® Xe Graphics', '512GB M.2 NVMe PCle 3.0 SSD', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel, 45% NTSC', '1x RJ45 LAN port,1x Thunderbolt™ 4 support DisplayPort™,1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC,2x USB 3.2 Gen 1 Type-A//1x 3.5mm Combo Audio Jack', 'Windows 11 64 Bit', '56WHrs, 4S1P,4-cel Li-ion'),
(14, 25, 'Intel Core i5 12450H', 'DDR5 8GB upto 4800MHz (2 khe RAM)', 'Intel® Iris® Xe Graphics', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '15.6\" FullHD (1920 x 1080). 144Hz, IPS Panel, 45% NTSC', '1x RJ45 LAN port ,1x Thunderbolt™ 4 support DisplayPort™ ,1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC ,2x USB 3.2 Gen 1 Type-A//1x 3.5mm Combo Audio Jack', 'Windows 11 64 Bit', '76WHrs, 4S1P, 4-cell Li-ion '),
(15, 26, 'Intel Core i5 1240P (12 nhân 16 luồng, 12 MB Intel® Smart Cache)', '8GB LPDDR5 bus 4800Mhz', 'Intel® Iris® Xe Graphics', '256GB M.2 PCIe NVMe', '14 Inch OLED, 2.8K (2880x1800) 100% sRGB', 'Wi-Fi 5|Bluetooth® 5.0', 'Windows 10 bản quyền', '75Wh '),
(16, 27, 'Intel® Core™ i5-11400H (2.70 GHz Hexa-core 6 Core™)', '8GB DDR4 3200Mhz, 2 Khe', 'NVIDIA® GeForce GTX 1650 4GB GDDR6', '512GB SSD M.2 PCIe', '15.6-inch FHD (1920x1080) IPS, 144Hz, Anti-Glare', 'IEEE 802.11 a/b/g/n/ac/ax Gigabit Ethernet Bluetooth 5.2', 'Windows 11 bản quyền', '4-cell '),
(17, 28, 'Chip M1', '16GB', '8-core GPU', '512GB SSD', '13.3 inches', '2 cổng Thunderbolt / USB 4 ports', 'macOS Big Sur', '58.2-watt-hour lithium-polymer, 61W USB-C Power Adapter'),
(18, 29, 'Chip M2', '16GB', '16 nhân GPU ,16 nhân Neural Engine', '512GB SSD', '120Hz, Liquid Retina, Mini LED, XDR ,14.2 inches', '1 x 3.5mm', 'MacOS', '70Wh'),
(19, 30, 'Chip M2', '8GB', '10 nhân GPU', '256GB SSD', '13 inches', 'Thunderbolt 3 (lên đến 40Gb/s) ,USB 4 (lên đến 40Gb/s) ,USB 3.1 Gen 2 (lên đến 10Gb/s) ,Cổng 3.5mm', 'MacOS', '58.2Whrs'),
(20, 31, 'Core i5 6200U', '8GB DDR4 (R1605S)', 'Intel VGA', '256GB SSD M.2 PCIe', '13.3 Inch Full HD / 3K', '2xUSB 3.0; SD card reader (SD, SDHC, SDXC); headset jack; 1xThunderbolt™', 'Windows 10 bản quyền', '60Whe '),
(21, 32, 'Intel Core i7 - 11850H', '32GB DDR4 ', 'Quadro T1200m', '512GB NVMe SSD', '15\" FHD+, 250 nits with Numeric Keypad and G-Key', 'USB type C', 'Windows 11 bản quyền', '4-cell '),
(22, 33, 'Intel® Core™ i7-1255U (10 nhân 12 luồng, 4.7Ghx)', '16GB DDR4 Bus 3200MHz', 'Intel Iris Xe Graphics', '512GB SSD M.2 PCIe NVMe ', '14 Inch Full HD+, Touch cảm ứng, WVA, TrueLife, Narrow Border, Pen Support', 'USB', 'Windows 11 bản quyền', '4-cell '),
(23, 34, 'Intel Core i5 - 1135G7', '16GB DDR4 (R1605S)', 'Intel VGA', '512GB SSD M.2 PCIe', '15.6 Inch Full HD, 250 nits, WVA, Anti-Glare, LED Backlit Qwerty Backlit Keyboard with Numeric Keypad and G-Key', 'USB C', 'Windows 11 bản quyền', '4-cell '),
(24, 35, 'AMD Ryzen R5-5625U (16MB Cache, 2.30GHZ up to 4.30GHz, 6 cores, 12 Threads)', '16GB DDR4', 'Đồ họa AMD Radeon', 'Ổ cứng thể rắn SSD 512GB M.2 PCIe NVMe', 'Màn hình 14,0 inch FHD+ (1920 x 1200) 60Hz, Chống lóa 250nits WVA với Hỗ trợ ComfortView', 'MediaTek Wi-Fi 6 MT7921', 'Windows bản quyền', '4-cell '),
(26, 37, 'Apple M2 8 nhân', '8GB', '10 nhận GPU ,16 nhân Neural Engine', '256GB SSD', 'Hỗ trợ xuất hình ảnh 6K 60HZ qua cổng Thunderbolt Xuất hình ảnh 4K qua cổng HDMI', 'Ổ cứng SSD, Wi-Fi 6 Giao tiếp & kết nối', 'MacOS Ventura', '4-cell '),
(27, 38, '10 nhân GPU, 16 nhân Neural Engine', '8GB', '10 nhận GPU ,16 nhân Neural Engine', '256GB', 'Liquid Retina Display', '2 x Thunderbolt 3 ,Jack tai nghe 3.5 mm ,MagSafe 3', 'MacOS Ventura', '52,6 Wh'),
(28, 39, 'Intel Core i5-1240P', '8GB LPDDR5', 'Intel Iris Xe Graphics', 'SSD 256GB NMVe', '16 Inch 2K 100% sRGB 400nits', 'MediaTek Wi-Fi 6 MT7921', 'Windows 11 bản quyền', '71Wh'),
(30, 41, 'Intel Core i5-12500H', '16GB DDR4', 'NVIDIA GeForce RTX 3050 Ti', 'SSD 512GB NVMe', '15.6 Inch Full HD 120Hz', 'USB type C', 'Windows bản quyền', '52,6 Wh'),
(31, 42, 'Intel Core i5 - 12500H', 'RAM 8GB DDR5', 'NVIDIA RTX 3050 4GB', 'SSD 512GB NVMe', '15.6 Inch Full HD, 165Hz, 100% sRGB', ' Wi-Fi 6 Giao tiếp & kết nối', 'Windows 10 bản quyền', '4-cell ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `recoverycode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `address`, `created_at`, `updated_at`, `status`, `recoverycode`) VALUES
(1, 'Nguyễn Văn Sơn', 'vanson05032002@gmail.com', '0342788463', 'c4ca4238a0b923820dcc509a6f75849b', 'Vĩnh Phúc', '2023-06-04 10:09:43', '2023-06-21 08:06:50', 0, 'hO4V9eBc9VIOkndXWDMe5ClTH94MI6j6dFXzJXdJ67LkZiXO2n'),
(3, 'Nguyễn Văn Sơn', 'vanson05032002o@gmail.com', '03427884636', '25d55ad283aa400af464c76d713c07ad', 'Hà Nam', NULL, '2023-06-21 08:12:34', 0, NULL),
(6, 'Nguyễn Thị Lan Anh', 'lananh00@gmail.com', '0123456789', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:02:29', '2023-06-19 16:21:57', 0, NULL),
(7, 'Nguyễn Tùng Lâm', 'tunglam@gmail.com', '099999999', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:04:14', '2023-06-19 16:21:59', 0, NULL),
(8, 'Trần Thanh Tùng', 'thanhtung@gmail.com', '0123456799', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:07:09', '2023-06-20 18:58:08', 1, NULL),
(9, 'admin', 'admin@gmail.com', '0342788460', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-06-18 19:10:12', '2023-06-19 16:22:15', 1, NULL),
(10, 'Son Nguyen', 'vanson050320023@gmail.com', '03427884633', 'c4ca4238a0b923820dcc509a6f75849b', 'Viet Nam', '2023-06-21 08:11:05', '2023-06-21 08:11:05', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `productid`, `url`) VALUES
(55, 15, 'Laptop HP VICTUS 16-d1187TX 7C0S4PA (1).jpg'),
(56, 15, 'Laptop HP VICTUS 16-d1187TX 7C0S4PA (2).jpg'),
(57, 15, 'Laptop HP VICTUS 16-d1187TX 7C0S4PA (3).jpg'),
(58, 16, 'Laptop HP Envy X360 2 in 1 14-es0013dx 7H9Y4UA (1).jpg'),
(59, 16, 'Laptop HP Envy X360 2 in 1 14-es0013dx 7H9Y4UA (1).png'),
(60, 16, 'Laptop HP Envy X360 2 in 1 14-es0013dx 7H9Y4UA (2).png'),
(64, 18, 'Laptop HP Elitebook 840 G7 - Intel core i5 10310u (1).jpg'),
(65, 18, 'Laptop HP Elitebook 840 G7 - Intel core i5 10310u (2).jpg'),
(66, 18, 'Laptop HP Elitebook 840 G7 - Intel core i5 10310u (3).jpg'),
(67, 19, 'Laptop HP VICTUS 16-e1107AX 7C140PA (1).jpg'),
(68, 19, 'Laptop HP VICTUS 16-e1107AX 7C140PA (2).jpg'),
(69, 19, 'Laptop HP VICTUS 16-e1107AX 7C140PA (3).jpg'),
(75, 20, 'ASUSTUF2021_1.jpg'),
(76, 20, 'ASUSTUF2021_2.png'),
(77, 20, 'ASUSTUF2021_3.jpg'),
(78, 23, 'ASUS15X_1.jpg'),
(79, 23, 'ASUS15X_2.jpg'),
(80, 23, 'ASUS15X_3.jpg'),
(81, 24, 'ASUSTUF2022_1.jpg'),
(82, 24, 'ASUSTUF2022_2.jpg'),
(83, 24, 'ASUSTUF2022_3.jpg'),
(84, 25, 'ASUSDASH2022_1.jpg'),
(85, 25, 'ASUSDASH2022_2.jpg'),
(86, 25, 'ASUSDASH2022_3.jpg'),
(87, 26, 'ASUSZENBOOK_1.jpg'),
(88, 26, 'ASUSZENBOOK_2.jpg'),
(89, 26, 'ASUSZENBOOK_3.jpg'),
(90, 27, 'ACERNITRO_1.jpg'),
(91, 27, 'ACERNITRO_2.jpg'),
(92, 27, 'ACERNITRO_3.jpg'),
(93, 28, '_0001_macbook_pro_13-in_space_gray_with_intel_processor_pure_side_left_screen__usen_4.webp'),
(94, 28, 'mac_16gb_1.webp'),
(95, 28, 'mbp-spacegray-select-202011_2_1.webp'),
(96, 29, 'm2_pro_14.webp'),
(97, 29, 'mbp14-silver-select-202301_1.webp'),
(98, 29, 'routers_compare__dg2f68dd3y0y_large_3.webp'),
(99, 30, 'hero_13__d1tfa5zby7e6_large00.webp'),
(100, 30, 'mbp-spacegray-select-202206.webp'),
(101, 30, 'pro-m2.webp'),
(102, 31, 'Dell XPS 13 9350 - Intel Core i5 (1).jpg'),
(103, 31, 'Dell XPS 13 9350 - Intel Core i5 (1).png'),
(104, 31, 'Dell XPS 13 9350 - Intel Core i5 (2).png'),
(105, 32, 'Dell Precision 5560 - Intel Core i7 - 11850H  Quadro T1200M  15.6 Inch Full HD+ (1).png'),
(106, 32, 'Dell Precision 5560 - Intel Core i7 - 11850H  Quadro T1200M  15.6 Inch Full HD+ (2).png'),
(107, 32, 'Dell Precision 5560 - Intel Core i7 - 11850H  Quadro T1200M  15.6 Inch Full HD+ (3).png'),
(108, 33, ' Dell Inspiron 14 7420 4X4J0 2in1 (2022) - Intel Core i7-1255U  14 inch Full HD+ Touch.jpg'),
(109, 33, ' Dell Inspiron 14 7420 4X4J0 2in1 (2023) - Intel Core i7-1255U  14 inch Full HD+ Touch.jpg'),
(110, 33, ' Dell Inspiron 14 7420 4X4J0 2in1 (2024) - Intel Core i7-1255U  14 inch Full HD+ Touch.jpg'),
(111, 34, 'Dell Inspiron 15 3511 R1605S - Intel Core i5 - 1135G7  15.6 Inch Full HD (1).jpg'),
(112, 34, 'Dell Inspiron 15 3511 R1605S - Intel Core i5 - 1135G7  15.6 Inch Full HD (2).jpg'),
(113, 34, 'Dell Inspiron 15 3511 R1605S - Intel Core i5 - 1135G7  15.6 Inch Full HD (3).jpg'),
(114, 35, 'Dell Inspiron 14 5425-VNYK0  AMD R5-5625U  16GB RAM  14 inch Full HD+ Touch (1).jpg'),
(115, 35, 'Dell Inspiron 14 5425-VNYK0  AMD R5-5625U  16GB RAM  14 inch Full HD+ Touch (1).png'),
(116, 35, 'Dell Inspiron 14 5425-VNYK0  AMD R5-5625U  16GB RAM  14 inch Full HD+ Touch (2).jpg'),
(120, 37, 'Mac mini M2 2023  (1).webp'),
(121, 37, 'Mac mini M2 2023  (2).webp'),
(122, 37, 'Mac mini M2 2023  (3).webp'),
(123, 37, 'Mac mini M2 2023  (4).webp'),
(124, 38, 'Apple Macbook Air M2 2022 8GB 256GB (1).webp'),
(125, 38, 'Apple Macbook Air M2 2022 8GB 256GB (2).webp'),
(126, 38, 'Apple Macbook Air M2 2022 8GB 256GB (3).webp'),
(130, 39, 'Laptop Lenovo Yoga 7 16IAP7.jpg'),
(131, 39, 'Laptop Lenovo Yoga 7 16IAP7-82QG000.jpg'),
(132, 39, 'Laptop Lenovo Yoga 7 16IAP7-82QG0001US - I).jpg'),
(136, 41, 'Laptop Lenovo Ideapad Gaming 3 2022 15IAH7 82S90086VN (1).jpg'),
(137, 41, 'Laptop Lenovo Ideapad Gaming 3 2022 15IAH7 82S90086VN (2).jpg'),
(138, 41, 'Laptop Lenovo Ideapad Gaming 3 2022 15IAH7 82S90086VN (3).jpg'),
(139, 42, 'Lenovo Legion 5 15IAH7 82RC008LVN (1).jpg'),
(140, 42, 'Lenovo Legion 5 15IAH7 82RC008LVN (2).jpg'),
(141, 42, 'Lenovo Legion 5 15IAH7 82RC008LVN (3).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderid`, `customerid`, `productid`, `quantity`, `price`) VALUES
(57, 37, 1, 42, 1, 23990000),
(59, 37, 1, 39, 3, 17990000),
(61, 39, 1, 42, 1, 23990000),
(62, 39, 1, 27, 4, 18490000),
(64, 41, 1, 16, 8, 16590000),
(65, 42, 9, 41, 1, 19999000),
(66, 42, 9, 39, 1, 17990000),
(67, 43, 9, 41, 1, 19999000),
(68, 43, 9, 39, 1, 17990000),
(69, 44, 1, 41, 1, 19999000),
(70, 45, 1, 42, 1, 23990000),
(71, 45, 1, 37, 1, 14790000),
(72, 46, 10, 41, 1, 19999000),
(73, 46, 10, 42, 1, 23990000),
(74, 46, 10, 39, 1, 17990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `email`, `note`, `payment`, `created_at`, `updated_at`, `status`) VALUES
(37, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-04-20 15:08:01', '2023-06-21 08:15:42', 4),
(38, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-04-21 15:16:21', '2023-06-21 08:15:52', 3),
(39, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-05-09 15:20:42', '2023-06-21 08:16:01', 4),
(40, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-05-11 15:22:46', '2023-06-21 08:16:07', 4),
(41, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-05-13 15:25:43', '2023-06-21 08:16:13', 4),
(42, 'admin', 'admin', '0342788460', 'admin@gmail.com', '', 'Chuyển khoản', '2023-06-18 19:11:04', '2023-06-21 08:15:12', 4),
(43, 'admin', 'admin', '0342788460', 'admin@gmail.com', '', 'Tiền mặt', '2023-06-18 19:14:15', '2023-06-21 08:15:07', 4),
(44, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 'Tiền mặt', '2023-06-18 19:22:50', '2023-06-18 19:23:01', 1),
(45, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', 'nono', 'Chuyển khoản', '2023-06-21 08:02:49', '2023-06-21 08:15:02', 4),
(46, 'Son Nguyen', 'Viet Nam', '03427884633', 'vanson050320023@gmail.com', '', 'Tiền mặt', '2023-06-21 08:14:29', '2023-06-21 08:14:57', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `categoryid`, `brandid`, `name`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 'VICTUS 16-d1187TX 7C0S4PA', 'HP Victus 16 i7 là một sản phẩm thực sự đáng được cân nhắc nếu bạn đang tìm kiếm một sản phẩm laptop gaming thực sự mạnh mẽ có thể cân mọi tựa game nặng, làm đồ họa mượt mà, cấu hình cực “cháy”: i7 gen 12 mới nhất. Chiếc laptop/máy tính xách tay đến từ dò', 20, 30290000, '2023-06-04 18:26:48', '2023-06-04 18:51:48'),
(16, 2, 1, 'Envy X360 2 in 1 14-es0013dx 7H9Y4UA', 'HP Envy x360 14 nằm trong phân khúc laptop mỏng nhẹ hiện đại, cao cấp xoay gập 360 độ đến từ thương hiệu laptop HP. Là chiếc laptop được trang bị chip đời 13 mới nhất nhà Intel, nên cấu hình khỏe xử lý mọi tác vụ văn phòng trong nháy mắt kèm card đồ họa I', 35, 16590000, '2023-06-04 18:31:03', '2023-06-04 18:31:03'),
(18, 4, 1, 'Elitebook 840 G7 - Intel core i5 10310u', 'Nếu bạn đang muốn tìm kiếm cho mình một chiếc máy tính xách tay hay laptop văn phòng giá rẻ, có thiết kế đẹp sang và có cấu hình vừa đủ để xử lý tốt các công việc văn phòng hiện nay thì đừng bỏ qua mẫu laptop HP Elitebook 840 G7 này nhé! Được xuất xứ từ t', 5, 12990000, '2023-06-04 18:42:22', '2023-06-04 18:42:22'),
(19, 4, 1, 'VICTUS 16-e1107AX 7C140PA', 'Sản phẩm laptop/máy tính xách tay HP Victus 16 chính là một sự lựa chọn hoàn hảo nhất nếu bạn đang muốn sở hữu một \"chiến binh gaming\" cực kỳ đẳng cấp đến từ thương hiệu nổi tiếng laptop HP. Chắc chắn rằng chiếc laptop gaming này sẽ mang đến một sự “thuyế', 20, 18990000, '2023-06-04 18:45:41', '2023-06-04 18:45:41'),
(20, 3, 4, 'TUF Gaming 2021 FX506HCB-HN144W', 'Laptop/máy tính xách tay Asus TUF F15 FX506HCB là chiếc laptop gaming tầm trung nổi bật của hãng laptop Asus. Với sự hoàn hảo từ thiết kế bên ngoài cho đến hiệu năng bên trong, chiếc Asus TUF F15 này có thể nói là chiếc laptop Asus core i5 đáng mua nhất h', 5, 19990000, '2023-06-04 18:47:36', '2023-06-04 18:47:36'),
(23, 5, 4, 'Vivobook 15X OLED A1503ZA-L1421W', 'Asus Vivobook 15X OLED hiện đang là một trong những mẫu Ultrabook đặc biệt nhất trong tầm giá 18 triệu đến từ \"nhà\" laptop Asus. Bởi lẽ chiếc laptop văn phòng Asus Vivobook này không chỉ sở hữu ngoại hình thời trang, \"bắt trend\" màn OLED CHUẨN MÀU 100%DCI', 15, 16190000, '2023-06-04 19:59:12', '2023-06-04 19:59:12'),
(24, 3, 4, 'TUF 2022 F15 FX507ZC-HN124W', 'Asus Tuf 15 2022 hứa hẹn sẽ là siêu phẩm laptop gaming đáng mua nhất cho game thủ năm nay. Asus Tuf với trang bị chip Intel mới nhất cho hiệu năng cực khủng. Bên cạnh đó tản nhiệt và thiết kế của dòng máy tính xách tay / laptop này cũng được cải tiến đáng', 25, 25190000, '2023-06-04 20:02:07', '2023-06-04 20:02:07'),
(25, 3, 4, 'TUF Dash 2022 F15 FX517ZC HN077W', 'Asus Tuf Dash F15 2022 - laptop gaming làm hài lòng mọi game thủ. Chiếc laptop / máy tính xách tay này hoàn hảo từ hiệu năng cho đến thiết kế. Với trang bị chip Intel đời mới nhất Asus Tuf F15 mang đến trải nghiệm chiến game cực đỉnh. Cùng tìm hiểu ngay c', 5, 20990000, '2023-06-04 20:04:49', '2023-06-04 20:04:49'),
(26, 5, 4, 'Zenbook Q409ZA-90NB0WC1', 'Asus Zenbook Q409ZA là chiếc laptop mỏng nhẹ được hãng laptop Asus mới cho ra mắt vào năm 2022 nhưng ngay lập tức trở thành một siêu phẩm laptop/máy tính xách tay hot hit không kém những người “anh em” tiền nhiệm của dòng Asus Zenbook là Asus Zenbook 14 Q', 10, 14590000, '2023-06-04 20:07:32', '2023-06-04 20:07:32'),
(27, 3, 2, 'Acer Nitro 5 Eagle AN515-57-5669  Intel Core i5-11400H  GTX 1650  144Hz', 'Acer Nitro 5 Eagle AN515-57-5669 NITRO 5 CHÍNH HÃNG RẺ NHẤT THỊ TRƯỜNG\r\nHiệu năng khỏe - Tản mát nhất tầm giá - LED RGB 4 vùng cá tính\r\n- Máy sở hữu ngoại hình cứng cáp, cool ngầu vốn có của dòng Nitro 5, tông màu đỏ đen chủ đạo cùng các đường cắt vát táo', 10, 18490000, '2023-06-04 20:09:39', '2023-06-04 20:09:39'),
(28, 1, 6, 'Apple MacBook Pro 13 Touch Bar M1 16GB 512GB 2020', '- Xử lý đồ hoạ mượt mà - Chip M1 cho phép thao tác trên các phần mềm AI, Photoshop, Render Video, phát trực tiếp ở độ phân giải 4K\r\n- Chất lượng hiển thị sắc nét - Độ phân giải retina màu sắc rực rỡ, tấm nền IPS cho góc nhìn 178 độ\r\n- Bảo mật cao - Trang ', 5, 38990000, '2023-06-04 20:19:58', '2023-06-04 20:19:58'),
(29, 4, 6, 'MacBook Pro 14 inch M2 Pro 2023 (10 CPU - 16 GPU - 16GB - 512GB)', '- Thiết kế sang trọng - Vỏ kim loại cùng trọng lượng chỉ 1.6kg dễ dàng mang theo mọi nơi\r\n- Hiển thị chân thật - Kích thước màn hình 14 inch cùng tần số quét lên đến 120Hz\r\n- Cấu hình mạnh mẽ - Ram 16GB cùng SSD 512 GB đa nhiệm mượt mà, tránh tình trạng g', 5, 48290000, '2023-06-04 20:23:14', '2023-06-04 20:23:14'),
(30, 4, 6, 'Apple Macbook Pro 13 M2 2022 8GB 256GB', 'Chip M2 mới nhất - hiệu năng hàng đầu, thoải mái sử dụng các phần mềm đồ hoạ hay render video\r\nMàn hình Retina - màu sắc hiển thị sống động tạo ra không gian giải trí đỉnh cao\r\nThiết kế sang trọng - Trọng lượng máy chỉ 1.4kg, độ dày chỉ 15.6mm giúp bạn dễ', 5, 29790000, '2023-06-04 20:26:15', '2023-06-04 20:26:15'),
(31, 1, 3, 'Dell XPS 13 9350 - Intel Core i5', 'Dell XPS 9350 - Laptop cao cấp, giá rẻ nhất thị trường\r\n- Thiết kế cực sang, cực mỏng nhẹ với lớp vỏ màu bạc giúp bạn thu hút mọi ánh nhìn ngay từ lần gặp đầu tiên. Lớp vỏ kim loại chất lượng cũng giúp máy cực bền nên bạn không cần quá lo lắng về những va đập thường ngày\r\n- Khả năng làm việc nhanh và ổn định với chip i5, RAM 8GB xử lý cùng lúc nhiều công việc không bị đơ hay treo máy\r\n- XPS vốn được định hình là dòng laptop cao cấp, dành cho những người có thu nhập cao tôn lên đẳng cấp người dùng, nên khi cầm Dell XPS 9350 bạn sẽ trông thật chuyên nghiệp', 10, 8390000, '2023-06-09 15:38:13', '2023-06-09 15:38:13'),
(32, 1, 3, 'Dell Precision 5560', 'Dell Precision 5560 Cấu hình khủng ẩn thân trong thân hình \"XPS\" siêu mỏng nhẹ Xử lý mượt mọi bản vẽ 3D phức tạp\r\n- Sở hữu ngoại hình trông như những chiếc XPS cao cấp nên máy có được thiết kế mỏng nhẹ, hiện đại bật đẳng cấp và vô cùng chắc chắn khi được chế tạo từ chất liệu cao cấp. Bạn có thể dễ dàng mang máy di chuyển đến nhiều nơi để làm việc mà không gặp bất kì sự cản trở nào\r\n- Cấu hình của máy \"dư sức\" xử gọn mọi tác vụ đồ họa cơ bản cho tới các bản vẽ 3D phức tạp cần nhiều hiệu ứng, bởi máy được trang bị chip Core i5 gen 11 cùng card đồ họa chuyên biệt NVIDIA Quadro T1200M, RAM 16GB và SSD 256GBcho hiệu năng đồ họa vượt trội so với các phiên bản tiền nhiệm\r\n- Chất lượng hiển thị hình ảnh vô cũng sắc nét, màu sắc chân thực và sống động, hỗ trợ tốt cho nhu cầu thiết kế hình ảnh, video, các tác vụ liên quan đến sáng tạo hình ảnh bởi có sự hỗ trợ độ phân giải Full HD cùng với kích thước 15.6 inch', 20, 29990000, '2023-06-09 15:40:08', '2023-06-09 15:40:08'),
(33, 1, 1, 'Dell Inspiron 14 7420 4X4J0 2in1 (2022)', 'Dell Inspiron 7420 Chip Gen 12th mới nhất - Xoay gập 360 độ  Màn cảm ứng tiện lợi\r\n- Cấu hình chip core i5 gen 12 mới nhất với 10 nhân 12 luồng cho hiệu năng xử lý cực khỏe, làm mượt mọi tác vụ từ đơn giản đến phức tạp, code, đồ họa 2D, chiến game mượt\r\n- Thiết kế mỏng nhẹ, hiện đại. Bản lề xoay gập 360 độ tiện lợi. Vỏ màu bạc Full kim loại cao cấp, chống va đập tốt, bền bỉ dùng trong nhiều năm\r\n- Màn hình 14 inch, độ phân giải Full HD cảm ứng đa điểm cực nhạy giúp bạn có được trải nghiệm hình ảnh tuyệt vời nhất', 20, 18690000, '2023-06-09 15:41:40', '2023-06-09 15:41:40'),
(34, 1, 3, 'Dell Inspiron 15 3511 R1605S', 'Dell Inspiron 15 3511 R1605S - Chiếc laptop giá rẻ hàng đầu dành cho dân văn phòng\r\n- Thiết kế lịch lãm, bền bỉ cùng trọng lượng nhẹ giúp bạn dễ dàng đem máy theo bên người; đồng thời không cần lo lắng đến vấn đề va đập hay trầy xước máy\r\n- Hiệu năng ổn định, đa nhiệm mượt mà với chip core i5 thế hệ thứ 11, RAM 16GB và SSD 512GB giúp máy hoạt động ổn định trong nhu cầu học tập và lướt web, giải quyết tốt các tác vụ văn phòng trên các ứng dụng soạn thảo văn bản Word, nhập liệu Excel,... thậm chí là làm đồ họa 2D nhẹ nhàng\r\n- Màn 15.6 inch Full HD, viền mỏng đem đến cho bạn những trải nghiệm tuyệt vời với khung hình rộng, màu sắc hài hòa, các chi tiết được thể hiện sắc nét qua từng chi tiết', 20, 14390000, '2023-06-09 15:43:57', '2023-06-09 15:43:57'),
(35, 4, 3, 'Dell Inspiron 14 5425-VNYK0', 'Dell Inspiron 5425 Thiết kế mỏng nhẹ - Màn cảm ứng tiện lợi - Làm việc, học tập, đồ họa 2D mượt mà\r\n- Thiết kế ấn tượng với lớp vỏ màu bạc vừa toát lên vẻ sang trọng, hiện đại, vừa có được sự chắc chắn cho khả năng chịu lực va đập tốt\r\n- Cấu hình chip R5 5625U 6 nhân 12 luồng cho hiệu năng xử lý cực khỏe, làm mượt mọi tác vụ từ đơn giản đến phức tạp, code, đồ họa 2D, chiến game mượt\r\n- Màn hình 14 inch, độ phân giải Full HD+ cảm ứng đa điểm cực nhạy giúp bạn có được trải nghiệm hình ảnh tuyệt vời nhất', 32, 13990000, '2023-06-09 15:45:52', '2023-06-09 15:45:52'),
(37, 4, 6, 'Mac mini M2 2023 ', '- Hiệu năng vượt trội với con chip M2 cùng 10 nhân GPU - Chạy tốt các tác vụ như render video, chỉnh sửa hình ảnh\r\n- Đa nhiệm tốt, mở cùng lúc nhiều ứng dụng với dung lượng ram lên đến 8GB\r\n- SSD 256GB giúp máy khởi động nhanh chóng, cho phép người dùng lưu trữ nhiều dữ liệu\r\n- Thiết kế nhỏ gọn cùng trọng lượng chỉ 1.18kg - dễ dàng di chuyển mọi lúc mọi nơi\r\n- Hệ điều hành MacOS Ventura mang đến khả năng bảo mật vượt trội, bảo vệ mọi dữ liẹu của người dùng', 5, 14790000, '2023-06-09 15:58:14', '2023-06-09 15:58:14'),
(38, 1, 6, 'Apple Macbook Air M2 2022', ' Thiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\n- Hiệu năng hàng đầu - Chip Apple m2, 10 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\n- Đa nhiệm mượt mà - Ram 8GB, SSD 256GB cho phép vừa làm việc, vừa nghe nhạc\r\n- Màn hình sắc nét - Độ phân giải 2560 x 1664 cùng độ sáng 500 nits\r\n- Âm thanh sống động - 4 loa tramg bị công nghệ dolby atmos và âm thanh đa chiều', 5, 27890000, '2023-06-09 16:00:24', '2023-06-09 16:00:24'),
(39, 1, 5, 'Lenovo Yoga 7 16IAP7-82QG0001US', '-Màn hình có kích thước 16 inch cùng độ phân giải 2.5K, độ chuẩn màu 100% sRGB cho chất lượng hiển thị cực đẳng cấp, rõ nét và tươi mới đến từng chi tiết nhỏ nhất. Chế độ cảm ứng đa điểm hỗ trợ tốt trong việc ghi chép, check dữ liệu một cách nhanh chóng.\r\n-Thiết kế mỏng nhẹ, màu sắc thời thượng, sang trọng nhưng không kém phần chắc chắn khi có lớp vỏ được làm từ kim loại rất cứng cáp, mang lại cảm giác an tâm khi sử dụng. Bản lề 360 có thể chuyển đổi được nhiều kiểu dáng của máy đáp ứng mọi nhu cầu sử dụng.\r\n-Đáp ứng đa dạng tác vụ với chip Intel Core i5 Tiger Lake 1240p mạnh mẽ cùng card đồ họa Intel Iris Xe Graphics. Dù là những tác vụ đơn giản hay chuyên nghiệp cũng đều được xử lý mượt mà.\r\n-Dung lượng pin 71Wh cho thời lượng sử dụng lâu khoảng 8-9 giờ đồng hồ, bạn có thể thoải mái mang đi mọi nơi mà không phải lo về vấn đề sạc pin.', 12, 17990000, '2023-06-09 16:04:05', '2023-06-09 16:04:05'),
(41, 3, 5, 'Lenovo Ideapad Gaming 3 2022', '- Sẵn sàng tham gia mọi thử thách trên đấu trường game với sự kết hợp của bộ vi xử lý Intel core i5-12500H gen 12 đời mới 2022 + Card rời RTX 3050Ti cân mượt mọi tựa game HOT nhất hay các tác vụ nặng như thiết kế, đồ họa 3D, edit video,...\r\n\r\n- Sẵn 16GB RAM cho khả năng đa nhiệm mượt. SSD 512GB cho tốc độ xử lý dữ liệu nhanh chóng\r\n\r\n- Màn 15.6 inch FHD cùng tấm nền IPS trải nghiệm hình ảnh rất sắc nét, chân thật dưới góc nhìn rộng đến 178 độ. Tấn số quét 120Hz chơi game cực nhanh và chính xác\r\n\r\n- Ngoại hình hút mắt với màu trắng sứ ấn tượng, thiết kế đổi mới mang nhiều đặc trưng của phân khúc cao cấp là Lenovo Legion 5 song vẫn giữ được độ bền bỉ cao\r\n\r\n- Hệ thống tản được tối ưu hơn giúp máy kiểm soát nhiệt độ tốt, luôn mát mẻ khi sử dụng', 5, 19999000, '2023-06-09 16:08:30', '2023-06-09 16:08:30'),
(42, 3, 5, 'Legion 5 15IAH7 82RC008LVN', '- Cấu hình cực khủng với chip Intel i5 12500H mới nhất có 12 nhân 16 luồng kết hợp cùng card AMD RTX 3050 cho hiệu năng siêu khỏe không ngại một tựa game bom tấn nào hay đồ họa 3D chuyên nghiệp cực mượt. Phiên bản HOT nhất 2022 với giá rẻ nhất thị trường tại Laptop88 - Chỉ từ 26 triệu!\r\n\r\n- Màn hình lý tưởng cho cả chơi game và đồ họa với tần số quét lên đến 165Hz giúp mọi chuyển động trong game cực kỳ nhanh mượt và độ sáng đạt 300 nits cùng độ phủ màu 100% sRGB cho các thiết kế đồ họa lên màu cực chuẩn đẹp.\r\n\r\n- Hệ thống tản nhiệt vượt trội với công nghệ Coldfront nhiều cánh quạt và các khe tản nhiệt lớn giúp cho máy luôn mát mẻ, không sợ tụt xung trong quá trình chơi game\r\n\r\n- Thiết kế mạnh mẽ với mặt A kim loại bền bỉ, build máy cực kỳ cứng cáp, chắc chắn, khung máy mỏng và thanh thoát hơn phiên bản tiền nhiệm', 5, 23990000, '2023-06-09 16:10:10', '2023-06-09 16:10:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetailid` (`orderid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `brandid` (`brandid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `configuration`
--
ALTER TABLE `configuration`
  ADD CONSTRAINT `configuration_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brandid`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

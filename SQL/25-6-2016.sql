-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2016 at 05:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_tkpstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `username`, `password`, `fullname`, `address`, `phonenumber`) VALUES
(1, 'nhimspec', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Bá Tuấn Khoa', '186 Nguyễn Trãi - Tây Lộc - Huế', '01224433516'),
(2, 'minhtri', '96e79218965eb72c92a549dd5a330112', 'Minh Tri', '123 le huan', '094039456'),
(3, 'phu', '202cb962ac59075b964b07152d234b70', 'Phu', '85 nguyen trai', '09432524324');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent_id`) VALUES
(1, 'Điện Thoại', 0),
(2, 'LapTop', 0),
(3, 'Apple', 1),
(4, 'Dell', 2),
(5, 'Nokia', 1),
(6, 'Samsung', 1),
(7, 'Asus', 2),
(10, 'Tablet', 0),
(11, 'Sony', 1),
(13, 'Huawei', 1),
(14, 'Lenovo', 1),
(15, 'HTC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `product_id` int(50) NOT NULL,
  `attach` varchar(200) NOT NULL COMMENT 'Đính Kèm',
  `guar` varchar(200) NOT NULL COMMENT 'Bảo Hành',
  `cpu` varchar(200) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `hdisk` varchar(100) NOT NULL COMMENT 'đĩa cứng',
  `screen` varchar(100) NOT NULL,
  `touch` varchar(100) NOT NULL COMMENT 'cảm ứng',
  `graphic` varchar(100) NOT NULL,
  `disc` varchar(100) NOT NULL COMMENT 'Đĩa Quang',
  `webcam` varchar(100) NOT NULL,
  `coat` varchar(100) NOT NULL COMMENT 'Vỏ',
  `commun` varchar(200) NOT NULL COMMENT 'Cổng Giao Tiếp',
  `connect` varchar(100) NOT NULL COMMENT 'Kết nối khác',
  `pin` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laptop_promotions`
--

CREATE TABLE `laptop_promotions` (
  `id` int(11) NOT NULL,
  `product_id` int(50) NOT NULL,
  `promotion_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `attach` varchar(200) NOT NULL COMMENT 'Đính kèm',
  `guar` varchar(200) NOT NULL COMMENT 'Bảo hành',
  `screen` varchar(50) NOT NULL COMMENT 'Màn Hình',
  `os` varchar(50) NOT NULL COMMENT 'Hệ Điều Hành',
  `f_camera` varchar(50) NOT NULL COMMENT 'Camera Trước',
  `b_camera` varchar(50) NOT NULL COMMENT 'Camera Sau',
  `cpu` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `in_memory` varchar(50) NOT NULL COMMENT 'Bộ nhớ trong',
  `sim` varchar(50) NOT NULL,
  `sup_memory` varchar(50) NOT NULL COMMENT 'hổ trợ thẻ nhớ',
  `connection` varchar(50) NOT NULL COMMENT 'Kết nối',
  `pin` varchar(50) NOT NULL COMMENT 'Dung Lượng Pin',
  `s_function` varchar(50) NOT NULL COMMENT 'Chức Năng Đặc Biệt',
  `product_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `attach`, `guar`, `screen`, `os`, `f_camera`, `b_camera`, `cpu`, `ram`, `in_memory`, `sim`, `sup_memory`, `connection`, `pin`, `s_function`, `product_id`) VALUES
(1, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '1 GB', '16 GB', '1 Sim, Nano SIM', 'Không', '4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 1),
(2, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '128 GB', '1 Sim, Nano SIM', 'Không', 'WiFi, 3G, 4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 2),
(3, ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng - Xem điểm bảo hành', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '128 GB', '1 Sim, Nano SIM', 'Không', '4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 3),
(4, ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', ' Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng - Xem điểm bảo hành', 'LED-backlit IPS LCD, 4.7", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '128 GB', '1 Sim, Nano SIM', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '1715 mAh', 'Mở khóa bằng vân tay', 4),
(5, ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '16 GB', '1 Sim, Nano SIM', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 5),
(6, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim ', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 4.7", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '64 GB', '1 Sim, Nano SIM', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '1715 mAh', 'Mở khóa bằng vân tay', 6),
(7, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 8.0', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '64 GB', '1 Sim, Nano SIM', 'Không', 'WiFi, 3G, 4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 7),
(8, ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5', 'Android 5.1 (Lollipop)', '5 MP', '23 MP', '	Snapdragon 810 8 nhân 64-bit, 4 nhân 1.5 GHz Cort', '3 GB', '32 GB', '2 SIM 2 sóng, Nano SIM', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 6', '3430 mAh', 'Mở khóa bằng vân tay, Sạc pin nhanh', 8),
(9, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '16 GB', '1 Sim, Nano SIM', 'Không', '4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 9),
(10, ' Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 12 tháng, sạc 6 tháng', 'Super AMOLED, 5.5', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'Exynos 7580 8 nhân 64-bit, 1.5 GHz', '2 GB', '16 GB', '2 SIM 2 sóng, Micro SIM', 'MicroSD, 200 GB', 'WiFi, 3G, Không hỗ trợ 4G', '3000 mAh', 'Không', 10),
(11, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'Qualcomm Snapdragon 616 8 nhân 64-bit, 4 nhân 1.5 ', '2 GB', '16 GB', '2 SIM 2 sóng, 1 Nano + 1 Micro', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 4', '3000 mAh', 'Mở khóa bằng vân tay, Chạm 2 lần sáng màn hình', 11),
(12, 'Hộp, Sạc, Sách hướng dẫn, Cáp, Miếng dán màn hình, Ốp lưng', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'MTK6753 8 nhân 64-bit, 1.3 GHz', '2 GB', '32 GB', '2 SIM 2 sóng, Micro SIM', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 4', '3300 mAh', 'Mở khóa bằng vân tay', 12),
(13, 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp ', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'Super LCD 2, 5.5', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'MTK6753 8 nhân 64-bit, 1.3 GHz', '2 GB', '16 GB', '2 SIM 2 sóng, Nano SIM', 'MicroSD, 200 GB', 'WiFi, 3G, Không hỗ trợ 4G', '2800 mAh', 'Dolby Audio™, HTC BoomSound™', 13),
(14, 'Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'AMOLED, 5.7', 'Windows 10 (for Mobile)', '5 MP', '20 MP', 'Snapdragon 810 8 nhân 64-bit, 4 nhân 1.5 GHz Corte', '3 GB', '32 GB', '1 Sim, Nano SIM', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 6', '3340 mAh', 'Microsoft Continuum, Quét mống mắt, Sạc pin kh', 14);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `imgurl` varchar(200) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `imgurl`, `product_name`, `category_id`, `price`) VALUES
(1, 'img/iphone-6s-plus-64gb-400-400x450.png', 'iPhone 6s Plus 64GB', 3, 24690000),
(2, 'img/iphone-6-plus-128gb.png', 'iPhone 6 Plus 128GB', 3, 24790000),
(3, 'img/iphone-6s-plus-128gb-400-1-400x450.png', 'iPhone 6s Plus 128GB', 3, 27490000),
(4, 'img/iphone-6s-128gb-hong-1-400x450.png', 'iPhone 6s 128GB', 3, 24690000),
(5, 'img/iphone-6s-plus-rosegold-400x450.png', 'iPhone 6s Plus 16GB', 3, 21790000),
(6, 'img/iphone-6s-64gb-400x450-400x450.png', 'iPhone 6s 64GB', 3, 21790000),
(7, 'img/iphone-6-plus-64gb-3-400x460.png', 'iPhone 6 Plus 64GB', 3, 20590000),
(8, 'img/sony-xperia-z5-premium-detail-400x460.png', 'Sony Xperia Z5 Premium Dual', 11, 17990000),
(9, 'img/iphone-6-plus-16gb-64gb128gb-400x450.png', 'iPhone 6 Plus 16GB', 3, 17490000),
(10, 'img/samsung-galaxy-j7-1-400x533.png', 'Samsung Galaxy J7', 6, 4990000),
(11, 'img/huawei-gr5-hero-400x460.png', 'Huawei GR5', 13, 4990000),
(12, 'img/lenovo-a7010-400x460.png', 'Lenovo A7010 (K4 Note)', 14, 4990000),
(13, 'img/htc-desire-728-400-400x400.png', 'HTC Desire 728G', 15, 4990000),
(14, 'img/microsoft-lumia-950-xl-3-400x460.png', 'Microsoft Lumia 950 XL', 5, 9990000);

-- --------------------------------------------------------

--
-- Table structure for table `product_promotions`
--

CREATE TABLE `product_promotions` (
  `id` int(200) NOT NULL,
  `product_id` int(50) NOT NULL,
  `promotion_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_promotions`
--

INSERT INTO `product_promotions` (`id`, `product_id`, `promotion_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(13, 5, 3),
(14, 5, 3),
(15, 5, 3),
(16, 6, 1),
(17, 6, 2),
(18, 6, 3),
(19, 7, 4),
(20, 7, 2),
(21, 7, 3),
(22, 8, 7),
(23, 8, 3),
(24, 9, 2),
(25, 9, 4),
(26, 9, 3),
(27, 10, 3),
(28, 11, 7),
(29, 11, 3),
(30, 12, 11),
(31, 12, 3),
(32, 13, 12),
(33, 13, 3),
(34, 14, 10),
(35, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `promotion` varchar(255) NOT NULL,
  `category_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotion`, `category_id`) VALUES
(1, 'Trả góp 0% hoặc Trả góp 1% hoặc Tặng voucher 600.000 - 12 triệu', 1),
(2, 'Cơ hội trúng 1 trong 3 xe Liberty dành cho KH khu vực Hà Nội', 1),
(3, 'Giảm ngay 5% khi Mua Laptop/ Tablet', 1),
(4, 'Tặng PMH 2 triệu', 1),
(5, 'Dành riêng cho S7, S7 Edge: Luxury Elite ', 1),
(6, 'Độc quyền: Bảo hành chính hãng 2 năm hoặc Trả góp 0% hoặc Phiếu mua hàng 700.000đ', 1),
(7, 'Trả góp lãi suất 0%', 1),
(8, 'Tặng tai nghe Bluetooth LE905', 1),
(9, 'Cơ hội trúng 30 chuyến du lịch trên tàu 5 sao', 1),
(10, 'Tặng Dock chuyển đổi', 1),
(11, 'Tặng Kính thực tế ảo ANTVR', 1),
(12, 'Tặng Sạc dự phòng Eco 10,000mAh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptop_promotions`
--
ALTER TABLE `laptop_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_promotions`
--
ALTER TABLE `product_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laptop_promotions`
--
ALTER TABLE `laptop_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_promotions`
--
ALTER TABLE `product_promotions`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

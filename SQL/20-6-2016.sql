-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 01:56 AM
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
(1, 'nhimspec', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Bá Tuấn Khoa', '186 Nguyễn Trãi - Tây Lộc - Huế', '01224433516');

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
(10, 'Tablet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(255) NOT NULL COMMENT 'giá',
  `promotion` varchar(300) NOT NULL COMMENT 'khuyến mãi',
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
  `imgurl` varchar(200) NOT NULL,
  `sup_memory` varchar(50) NOT NULL COMMENT 'hổ trợ thẻ nhớ',
  `connection` varchar(50) NOT NULL COMMENT 'Kết nối',
  `pin` varchar(50) NOT NULL COMMENT 'Dung Lượng Pin',
  `s_function` varchar(50) NOT NULL COMMENT 'Chức Năng Đặc Biệt',
  `parent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `promotion`, `attach`, `guar`, `screen`, `os`, `f_camera`, `b_camera`, `cpu`, `ram`, `in_memory`, `sim`, `imgurl`, `sup_memory`, `connection`, `pin`, `s_function`, `parent_id`) VALUES
(1, 'iPhone 6s Plus 64GB', 24690000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Libery d&agrave;nh cho KH khu vực H&agrave; Nội (đến 30/06)</li>\r\n	<li>Trả g&oacute;p 0% hoặc Trả g&oacute;p 1% hoặc Tặng voucher 600.000 - 12 triệu (đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet (đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim ', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '64 GB', '1 Sim, Nano SIM', 'img/iphone-6s-plus-64gb-400-400x450.png', 'Không', '4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 3),
(2, 'iPhone 6 Plus 128GB', 24790000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '128 GB', '1 Sim, Nano SIM', 'img/iphone-6-plus-128gb.png', 'Không', 'WiFi, 3G, 4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 3),
(3, 'iPhone 6s Plus 128GB', 27490000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Trả g&oacute;p 0%&nbsp;hoặc Tặng voucher 600.000 - 12 triệu&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng - Xem điểm bảo hành', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '128 GB', '1 Sim, Nano SIM', 'img/iphone-6s-plus-128gb-400-1-400x450.png', 'Không', '4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 3),
(4, 'iPhone 6s 128GB', 24690000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Trả g&oacute;p 0%&nbsp;hoặc Tặng voucher 600.000 - 12 triệu&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', ' Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng - Xem điểm bảo hành', 'LED-backlit IPS LCD, 4.7", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '128 GB', '1 Sim, Nano SIM', 'img/iphone-6s-128gb-hong-1-400x450.png', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '1715 mAh', 'Mở khóa bằng vân tay', 3),
(5, 'iPhone 6s Plus 16GB', 21790000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Trả g&oacute;p 0%&nbsp;hoặc&nbsp;Trả g&oacute;p 1%&nbsp;hoặc Tặng voucher 600.000 - 12 triệu&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến ', ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '16 GB', '1 Sim, Nano SIM', 'img/iphone-6s-plus-rosegold-400x450.png', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '2750 mAh', 'Mở khóa bằng vân tay', 3),
(6, 'iPhone 6s 64GB', 21790000, '<ul>\r\n<li>Trả góp 0% hoặc Trả góp 1% hoặc Tặng voucher 600.000 - 12 triệu</li>\r\n<li>Cơ hội trúng 1 trong 3 xe Liberty dành cho KH khu vực Hà Nội</li>\r\n<li>Giảm ngay 5% khi Mua Laptop/ Tablet </li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim ', 'thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 4.7", Retina HD', 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '2 GB', '64 GB', '1 Sim, Nano SIM', 'img/iphone-6s-64gb-400x450-400x450.png', 'Không', 'WiFi, 3G, 4G LTE Cat 6', '1715 mAh', 'Mở khóa bằng vân tay', 3),
(7, 'iPhone 6 Plus 64GB', 20590000, '<ul>\r\n	<li>Tặng PMH 2 triệu&nbsp;(đến 30/06)</li>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 8.0', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '64 GB', '1 Sim, Nano SIM', 'img/iphone-6-plus-64gb-3-400x460.png', 'Không', 'WiFi, 3G, 4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 3),
(11, 'Sony Xperia Z5 Premium Dual', 17990000, '<ul>\r\n	<li>Trả g&oacute;p l&atilde;i suất 0%&nbsp;Xem chi tiết&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', ' Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5", IPS-LCD', 'Android 5.1 (Lollipop)', '5 MP', '23 MP', '	Snapdragon 810 8 nhân 64-bit, 4 nhân 1.5 GHz Cort', '3 GB', '32 GB', '2 SIM 2 sóng, Nano SIM', 'img/sony-xperia-z5-premium-detail-400x460.png', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 6', '3430 mAh', 'Mở khóa bằng vân tay, Sạc pin nhanh', 0),
(13, 'iPhone 6 Plus 16GB', 17490000, '<ul>\r\n	<li>Cơ hội tr&uacute;ng 1 trong 3 xe Liberty d&agrave;nh cho KH khu vực H&agrave; Nội&nbsp;Xem chi tiết(đến 30/06)</li>\r\n	<li>Tặng PMH 2 triệu&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim', 'Thân máy 12 tháng, pin 12 tháng, sạc 12 tháng', 'LED-backlit IPS LCD, 5.5", Retina HD', 'iOS 9', '1.2 MP', '8 MP', 'Apple A8 2 nhân 64-bit, 1.4 GHz', '1 GB', '16 GB', '1 Sim, Nano SIM', 'img/iphone-6-plus-16gb-64gb128gb-400x450.png', 'Không', '4G LTE Cat 4', '2915 mAh', 'Mở khóa bằng vân tay', 3),
(16, 'Samsung Galaxy J7', 4990000, '<p>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</p>\r\n', ' Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 12 tháng, sạc 6 tháng', 'Super AMOLED, 5.5", HD', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'Exynos 7580 8 nhân 64-bit, 1.5 GHz', '1.5 GB', '16 GB', '2 SIM 2 sóng, Micro SIM', 'img/samsung-galaxy-j7-1-400x533.png', 'MicroSD, 128 GB', 'WiFi, 3G, Không hỗ trợ 4G', '3000 mAh', 'Không', 0),
(17, 'Huawei GR5', 4990000, '<ul>\r\n	<li>Trả g&oacute;p l&atilde;i suất 0%&nbsp;Xem chi tiết&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5", Full HD', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'Qualcomm Snapdragon 616 8 nhân 64-bit, 4 nhân 1.5 ', '2 GB', '16 GB', '2 SIM 2 sóng, 1 Nano + 1 Micro', 'img/huawei-gr5-hero-400x460.png', 'MicroSD, 128 GB', 'WiFi, 3G, 4G LTE Cat 4', '3000 mAh', 'Mở khóa bằng vân tay, Chạm 2 lần sáng màn hình', 0),
(19, 'Lenovo A7010 (K4 Note)', 4990000, '<ul>\r\n	<li>Tặng K&iacute;nh thực tế ảo ANTVR&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Sạc, Sách hướng dẫn, Cáp, Miếng dán màn hình, Ốp lưng', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'IPS LCD, 5.5", Full HD', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'MTK6753 8 nhân 64-bit, 1.3 GHz', '2 GB', '32 GB', '2 SIM 2 sóng, Micro SIM', 'img/lenovo-a7010-400x460.png', 'MicroSD, 128 GB', 'WiFi, 3G, 4G LTE Cat 4', '3300 mAh', 'Mở khóa bằng vân tay', 0),
(20, 'HTC Desire 728G', 4990000, '<p>Tặng Sạc dự ph&ograve;ng Eco 10,000mAh&nbsp;Xem h&igrave;nh(đến 30/06)</p>\r\n\r\n<p>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</p>\r\n\r\n<p>Mua sim Vina B&ugrave;m 50 gi&aacute; chỉ từ 75.000đ: Miễn ph&iacute; 10 ph&uacute;t đầu cho tất cả cuộc gọi nội mạng...&nbsp;Xem 3 ưu đ&atilde;i</p>\r\n', 'Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp ', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'Super LCD 2, 5.5", HD', 'Android 5.1 (Lollipop)', '5 MP', '13 MP', 'MTK6753 8 nhân 64-bit, 1.3 GHz', '1.5 GB', '16 GB', '2 SIM 2 sóng, Nano SIM', 'img/htc-desire-728-400-400x400.png', 'MicroSD, 2 TB', 'WiFi, 3G, Không hỗ trợ 4G', '2800 mAh', 'Dolby Audio™, HTC BoomSound™', 0),
(22, 'Microsoft Lumia 950 XL', 9990000, '<ul>\r\n	<li>Tặng Dock chuyển đổi&nbsp;Xem h&igrave;nh&nbsp;(đến 30/06)</li>\r\n	<li>Giảm ngay 5% khi Mua Laptop/ Tablet&nbsp;(đến 30/06)</li>\r\n</ul>\r\n', 'Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp', 'Thân máy 12 tháng, pin 6 tháng, sạc 6 tháng', 'AMOLED, 5.7", Quad HD', 'Windows 10 (for Mobile)', '5 MP', '20 MP', 'Snapdragon 810 8 nhân 64-bit, 4 nhân 1.5 GHz Corte', '3 GB', '32 GB', '1 Sim, Nano SIM', 'img/microsoft-lumia-950-xl-3-400x460.png', 'MicroSD, 200 GB', 'WiFi, 3G, 4G LTE Cat 6', '3340 mAh', 'Microsoft Continuum, Quét mống mắt, Sạc pin kh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `promotion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotion`) VALUES
(1, 'Trả góp 0% hoặc Trả góp 1% hoặc Tặng voucher 600.000 - 12 triệu'),
(2, 'Cơ hội trúng 1 trong 3 xe Liberty dành cho KH khu vực Hà Nội'),
(3, 'Giảm ngay 5% khi Mua Laptop/ Tablet'),
(4, 'Tặng PMH 2 triệu'),
(5, 'Dành riêng cho S7, S7 Edge: Luxury Elite '),
(6, 'Độc quyền: Bảo hành chính hãng 2 năm\r\nhoặc Trả góp 0% hoặc Phiếu mua hàng 700.000đ'),
(7, 'Trả góp lãi suất 0%'),
(8, 'Tặng tai nghe Bluetooth LE905'),
(9, 'Cơ hội trúng 30 chuyến du lịch trên tàu 5 sao'),
(10, 'Tặng Dock chuyển đổi');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

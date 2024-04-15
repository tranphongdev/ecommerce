-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2023 lúc 07:18 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phongshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(50) NOT NULL,
  `name_pro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_order`, `id_pro`, `image`, `quantity`, `price`, `name_pro`) VALUES
(9, 7, 15, 'upload/asus-tuf-gaming-f15-fx506hf-i5-hn014w-thumb-600x600.jpg', 3, 19990000, 'Laptop Asus TUF Gaming F15 FX506HF i5 '),
(10, 7, 13, 'upload/loa-vi-tinh-2-1-ava-ledmi-n171-thumb-600x600.jpg', 1, 400000, 'Loa vi tính 2.1 AVA+ Led Mini N171'),
(11, 8, 14, 'upload/asus-va27ehf-27-inch-fhd-thumb-1-600x600.jpg', 2, 3790000, 'Màn hình Asus VA27EHF 27 inch'),
(12, 9, 12, 'upload/iphone-15-pro-max-gold-thumbnew-600x600.jpg', 2, 50900000, 'Điện thoại iPhone 15 Pro Max 1TB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `date_create`, `date_update`) VALUES
(1, 'Latops', '2023-11-03 16:36:33', '0000-00-00 00:00:00'),
(2, 'Đồng Hồ Điện Tử', '2023-11-03 18:07:05', '0000-00-00 00:00:00'),
(3, 'Thiết Bị Đeo Thông Minh', '2023-11-03 18:07:39', '0000-00-00 00:00:00'),
(4, 'Đĩa Game', '2023-11-03 18:07:59', '0000-00-00 00:00:00'),
(5, 'Máy Game Console', '2023-11-03 18:08:10', '0000-00-00 00:00:00'),
(6, 'Phụ Kiện Console', '2023-11-03 18:08:18', '0000-00-00 00:00:00'),
(7, 'Tai Nghe', '2023-11-03 18:08:29', '0000-00-00 00:00:00'),
(8, 'Linh Phụ Kiện', '2023-11-03 18:08:43', '0000-00-00 00:00:00'),
(9, 'Loa', '2023-11-03 18:08:52', '0000-00-00 00:00:00'),
(10, 'Tivi Box', '2023-11-03 18:08:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `madh` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `ptthanhtoan` tinyint(3) NOT NULL DEFAULT 1,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `madh`, `fullname`, `address`, `phone`, `email`, `note`, `ptthanhtoan`, `total`) VALUES
(7, 'PHONG-ELT170320', 'Khánh Phong', 'Nam Định', 982374213, 'khanhphong@gmail.com', 'alooo', 1, 60370000),
(8, 'PHONG-ELT603571', 'Nguyễn Tuấn', 'Vụ Bản - Nam Định', 92831234, 'tuan@gmail.com', 'Oklasdasdqweqwe', 2, 7580000),
(9, 'PHONG-ELT617205', 'Trần Đình Phong', 'Thị Trần Gôi - Vụ Bản - Nam Định', 924387912, 'dinhphong@gmail.com', 'Giao hàng buổi trưa, thời gian khác bận !!!', 1, 101800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_prd` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `price_old` int(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `hot` tinyint(3) NOT NULL DEFAULT 1,
  `new` tinyint(3) NOT NULL DEFAULT 1,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_prd`, `image`, `price`, `price_old`, `id_category`, `description`, `hot`, `new`, `date_create`) VALUES
(5, 'Màn hình ViewSonic ColorPro VP2456 ', 'upload/viewsonic-colorpro-vp2456-24-inch-fhd-thumb-1-600x600.webp', 5490000, 4590000, 10, 'Loại màn hình:\r\n\r\nPhẳng\r\nMàn hình:\r\n\r\n24 inchFull HD (1920 x 1080)60 Hz\r\nCông nghệ màn hình:\r\n\r\nCông nghệ chống nháy - Flicker-freeChống chói Anti-Glare108% sRGBGiảm ánh sáng xanh\r\nTấm nền:\r\n\r\nIPS\r\nSố lượng màu:\r\n\r\n16.7 triệu màu\r\nĐộ tương phản:\r\n\r\n1000:1\r\nThời gian đáp ứng:\r\n\r\n5ms (GTG)\r\nGóc nhìn:\r\n\r\n178°(Dọc) / 178°(Ngang)\r\nTiện ích:\r\n\r\nThay đổi được chiều caoĐiều chỉnh được độ nghiêng của màn hìnhXoay màn hình 90 độ\r\nCổng kết nối:\r\n\r\n1 x HDMI 1.41 x USB Type-B3 x USB 3.21 x USB Type C 3.2 (hỗ trợ DisplayPort và 60W Power Charger)1 x DisplayPort', 1, 1, '2023-11-03 18:33:58'),
(6, 'Màn hình ViewSonic VA2209-H 21.5 inch', 'upload/tivi.jpg', 3290000, 3090000, 10, 'Loại màn hình:\r\n\r\nPhẳng\r\nMàn hình:\r\n\r\n21.5 inchFull HD (1920 x 1080)75 Hz\r\nCông nghệ màn hình:\r\n\r\nCông nghệ chống nháy - Flicker-freeChống chói Anti-Glare104% sRGBGiảm ánh sáng xanh\r\nTấm nền:\r\n\r\nIPS\r\nSố lượng màu:\r\n\r\n16.7 triệu màu\r\nĐộ tương phản:\r\n\r\n1000:1\r\nThời gian đáp ứng:\r\n\r\n4ms (GTG)\r\nGóc nhìn:\r\n\r\n178°(Dọc) / 178°(Ngang)\r\nTiện ích:\r\n\r\nĐiều chỉnh được độ nghiêng của màn hình\r\nCổng kết nối:\r\n\r\n1 x HDMI 1.41 x VGAJack tai nghe 3.5 mm', 0, 1, '2023-11-03 18:39:41'),
(7, 'Màn hình HP M22f 21.5 inch', 'upload/hp-m22f-21-5-inch-fhd-thumb-600x600.jpg', 3290000, 3090000, 10, 'Loại màn hình:\r\n\r\nPhẳng\r\nMàn hình:\r\n\r\n21.5 inchFull HD (1920 x 1080)75 Hz\r\nCông nghệ màn hình:\r\n\r\nAnti-FlickerAMD FreeSyncChống chói Anti-GlareLED Backlight99% sRGBGiảm ánh sáng xanh\r\nTấm nền:\r\n\r\nIPS\r\nĐộ tương phản:\r\n\r\n1000:1\r\nThời gian đáp ứng:\r\n\r\n5ms (GTG)\r\nGóc nhìn:\r\n\r\n178°(Dọc) / 178°(Ngang)\r\nTiện ích:\r\n\r\nGập màn hình lên xuống\r\nCổng kết nối:\r\n\r\n1 x VGAHDMI', 1, 1, '2023-11-03 18:37:18'),
(9, 'Laptop Acer Gaming Nitro 5 AN515 58', 'upload/acer-nitro-5-an515-58-769j-i7-nhqfhsv003-thumb-600x600.jpg', 31790000, 24490000, 1, 'CPU:\r\n\r\ni712700H2.30 GHz\r\nRAM:\r\n\r\n8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz\r\nỔ cứng:\r\n\r\n512 GB SSD NVMe PCIe 4.0 (Có thể tháo ra, lắp thanh khác tối đa 1 TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộngHỗ trợ khe cắm HDD SATA 2.5 inch mở rộng (nâng cấp tối đa 1 TB)\r\nMàn hình:\r\n\r\n15.6\"Full HD (1920 x 1080) 144Hz\r\nCard màn hình:\r\n\r\nCard rờiRTX 3050 4GB\r\nCổng kết nối:\r\n\r\n1 x USB Type-C (hỗ trợ USB, DisplayPort, Thunderbolt 4)HDMILAN (RJ45)3 x USB 3.2Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 11 Home SL\r\nThiết kế:\r\n\r\nVỏ nhựa\r\nKích thước, khối lượng:\r\n\r\nDài 360.4 mm - Rộng 271.09 mm - Dày 25.9 mm - Nặng 2.5 kg\r\nThời điểm ra mắt:\r\n\r\n2022', 1, 0, '2023-11-03 18:47:06'),
(10, 'Đồng hồ thông minh Xiaomi Watch 2 Pro', 'upload/xiaomi-watch-2-pro-tb-600x600.jpg', 6290000, 5990000, 2, 'Màn hình:\r\n\r\nAMOLED1.43 inch\r\nThời lượng pin:\r\n\r\nLên đến 65 giờ\r\nKết nối với hệ điều hành:\r\n\r\nAndroid 8.0 trở lên dùng Google Mobile Service\r\nMặt:\r\n\r\nKính cường lực Sapphire46 mm\r\nTính năng cho sức khỏe:\r\n\r\nĐếm số bước chânĐo nồng độ oxy (SpO2)Theo dõi giấc ngủĐo nhịp timTheo dõi chu kỳ kinh nguyệtNhiệt độ trên daTheo dõi nhịp tim 24hTheo dõi mức độ căng thẳng 24hTheo dõi Nồng độ oxy trong máu 24hĐo độ mặn của xươngĐo tỷ lệ trao đổi chất cơ bảnĐo lượng mỡ trong cơ thể', 1, 1, '2023-11-03 18:54:44'),
(11, 'Chuột Không dây Bluetooth Silent Rapoo M500', 'upload/chuot-bluetooth-silent-rapoo-m500-thumb-7-600x600.jpg', 500000, 250000, 8, 'Tương thích:\r\n\r\nmacOS (MacBook, iMac)Windows\r\nĐộ phân giải:\r\n\r\n1600 DPI\r\nCách kết nối:\r\n\r\nĐầu thu USB ReceiverBluetooth\r\nĐộ dài dây / Khoảng cách kết nối:\r\n\r\n10 m\r\nLoại pin:\r\n\r\n2 viên pin AA\r\nTrọng lượng:\r\n\r\n190 g\r\nThương hiệu của:\r\n\r\nTrung Quốc\r\nSản xuất tại:\r\n\r\nTrung Quốc\r\nHãng\r\n\r\nRapoo.', 1, 0, '2023-11-03 18:59:41'),
(12, 'Điện thoại iPhone 15 Pro Max 1TB', 'upload/iphone-15-pro-max-gold-thumbnew-600x600.jpg', 50900000, 46990000, 3, 'Màn hình:\r\n\r\nOLED6.7\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 17\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A17 Pro 6 nhân\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n1 TB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4422 mAh20 W', 1, 0, '2023-11-03 19:01:32'),
(13, 'Loa vi tính 2.1 AVA+ Led Mini N171', 'upload/loa-vi-tinh-2-1-ava-ledmi-n171-thumb-600x600.jpg', 400000, 360000, 9, 'Tổng công suất:\r\n\r\n11 W\r\nNguồn:\r\n\r\nCắm điện dùng\r\nSố lượng kênh:\r\n\r\n2.1 kênh\r\nTiện ích:\r\n\r\nCó đèn LED\r\nPhím điều khiển:\r\n\r\nTăng/giảm âm lượngChỉnh Bass\r\nThương hiệu của:\r\n\r\nThế Giới Di Động\r\nHãng\r\n\r\nAVA+', 0, 1, '2023-11-03 19:03:47'),
(14, 'Màn hình Asus VA27EHF 27 inch', 'upload/asus-va27ehf-27-inch-fhd-thumb-1-600x600.jpg', 3790000, 3000000, 10, 'Loại màn hình:\r\n\r\nPhẳng\r\nMàn hình:\r\n\r\n27 inchFull HD (1920 x 1080)100 Hz\r\nCông nghệ màn hình:\r\n\r\nEye CareQuickFitLọc ánh sáng xanhCông nghệ chống nháy - Flicker-freeNhiệt độ màu (4 chế độ)Asus SplendidVividPixelAdaptive SyncCông nghệ Trace FreeChế độ chơi Game\r\nTấm nền:\r\n\r\nIPS\r\nSố lượng màu:\r\n\r\n16.7 triệu màu\r\nĐộ tương phản:\r\n\r\nASUS (ASCR): 100000000:1\r\nThời gian đáp ứng:\r\n\r\n1ms (MPRT)\r\nGóc nhìn:\r\n\r\n178°(Dọc) / 178°(Ngang)\r\nTiện ích:\r\n\r\nĐiều chỉnh được độ nghiêng của màn hình\r\nCổng kết nối:\r\n\r\nHDMI', 0, 1, '2023-11-03 20:54:52'),
(15, 'Laptop Asus TUF Gaming F15 FX506HF i5 ', 'upload/asus-tuf-gaming-f15-fx506hf-i5-hn014w-thumb-600x600.jpg', 19990000, 16990000, 1, 'CPU:\r\n\r\ni511400H2.7GHz\r\nRAM:\r\n\r\n8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz\r\nỔ cứng:\r\n\r\nHỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)\r\nMàn hình:\r\n\r\n15.6\"Full HD (1920 x 1080) 144Hz\r\nCard màn hình:\r\n\r\nCard rờiRTX 2050 4GB\r\nCổng kết nối:\r\n\r\n1 x Thunderbolt 4 (hỗ trợ DisplayPort)HDMILAN (RJ45)3 x USB 3.2Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nWindows 11 Home SL\r\nThiết kế:\r\n\r\nVỏ nhựa - nắp lưng bằng kim loại\r\nKích thước, khối lượng:\r\n\r\nDài 359 mm - Rộng 256 mm - Dày 22.8 ~ 24.5 mm - Nặng 2.3 kg\r\nThời điểm ra mắt:\r\n\r\n2023', 0, 1, '2023-11-03 21:14:14'),
(16, 'Bàn Phím Cơ Có Dây Gaming Razer', 'upload/co-co-day-gaming-razer-blackwidow-thumb-600x600.jpeg', 3200000, 1760000, 8, 'Tương thích:\r\n\r\nWindows\r\nCách kết nối:\r\n\r\nKết nối Wired - Attached\r\nĐèn LED:\r\n\r\nRGB\r\nSố phím:\r\n\r\n104 phím\r\nThương hiệu của:\r\n\r\nMỹ', 1, 1, '2023-11-03 21:17:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `date_create`) VALUES
(2, 'Khánh Phong', 'phongdev', '123', 'phongdev@gmail.com', '2023-11-02 16:45:30'),
(3, 'Khánh Phong', 'phongdev', '123', 'phongdev@gmail.com', '2023-11-02 16:45:30'),
(4, 'Khánh Phong', 'phongdev', '123', 'phongdev@gmail.com', '2023-11-02 16:45:30'),
(5, 'Khánh Phong', 'phongdev', '123', 'phongdev@gmail.com', '2023-11-02 16:45:30'),
(6, 'Khánh Phong', 'phongdev', '123', 'phongdev@gmail.com', '2023-11-02 16:45:30'),
(7, 'Thịnh Bom', 'sang', '123', 'thinh@gmail.com', '2023-11-02 23:58:45'),
(9, 'Tuấn', 'tuan', '123', 'tuan@gmail.com', '2023-11-03 00:05:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_catagory` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_catagory` FOREIGN KEY (`id_category`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

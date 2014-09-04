-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2012 at 07:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` int(5) NOT NULL AUTO_INCREMENT COMMENT 'mã hóa đơn',
  `tendn` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên đăng nhập',
  `masp` int(3) NOT NULL COMMENT 'mã sản phẩm',
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `ngaymua` date NOT NULL COMMENT 'ngày mua hàng',
  PRIMARY KEY (`mahd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='hóa đơn' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `tendn`, `masp`, `soluong`, `ngaymua`) VALUES
(6, 'admin', 1, 1, '2012-06-12'),
(8, 'user', 1, 1, '2012-06-12'),
(10, 'user', 51, 1, '2012-06-12'),
(11, 'user', 41, 1, '2012-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `uid` int(1) NOT NULL,
  `tendn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(15) NOT NULL,
  `cmnd` int(10) NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`,`tendn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng khách hàng';

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`uid`, `tendn`, `matkhau`, `hoten`, `email`, `sdt`, `cmnd`, `diachi`) VALUES
(1, 'admin', 'admin', 'Quản trị viên', 'hnquang112@yahoo.com.vn', 1222971698, 123456789, 'VT'),
(2, 'user', 'user', 'Normal User', 'user@company.com', 1234567890, 123456789, 'UIT');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(3) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm',
  `tensp` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `hangsx` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'hãng sản xuất',
  `gia` int(10) NOT NULL COMMENT 'giá',
  `mota` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  PRIMARY KEY (`masp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng sản phẩm' AUTO_INCREMENT=53 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `hangsx`, `gia`, `mota`) VALUES
(1, 'C3-01 TOUCH AND TYPE', 'NOKIA', 3839000, 'Điện thoại thiết kế đặc biệt chạm và bấm\r\nMàn hình cảm ứng điện trở 2.4 inches\r\nMáy ảnh 5.0 MP với đèn Flash Led\r\nBộ nhớ 30MB, Ram 64MB, Rom 128MB\r\nHỗ trợ thẻ nhớ lên đến 32GB\r\nHỗ trợ mạng xã hội Facebook,Twitte\r\nỨng dụng Flash Lite 3.0\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth\r\n'),
(2, 'N9 64GB', 'NOKIA', 12999000, '"Hệ điều hành MeeGo 1.2 Harmattan\r\nMàn hình AMOLED 16 triệu màu, rộng 3.9 inches\r\nKính Corning® Gorilla® chống xước\r\nMáy ảnh 8.0 MP với ống kính Carl Zeiss\r\nVi xử lý 1GHz, Ram 1GB, bộ nhớ 64GB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, la bàn số\r\nDocument viewer (Word, Excel, PowerPoint, PDF)"\r\n'),
(3, 'N9 16GB', 'NOKIA', 10999000, '"Hệ điều hành MeeGo 1.2 Harmattan\r\nMàn hình AMOLED 16 triệu màu, rộng 3.9 inches\r\nKính Corning® Gorilla® chống xước\r\nMáy ảnh 8.0 MP với ống kính Carl Zeiss\r\nVi xử lý 1GHz, Ram 1GB, bộ nhớ 16GB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, la bàn số\r\nDocument viewer (Word, Excel, PowerPoint, PDF)"\r\n'),
(4, 'E7', 'NOKIA', 9999000, '"Hệ điều hành Symbian ^3\r\nMàn hình cảm ứng điện dung đa điểm\r\nMáy ảnh 8 MP với Flash kép\r\nNghe nhạc xem phim nhiều định dạng\r\nKết nối Tivi qua cổng HDMI\r\nHệ thống âm thanh Dolby Digital Plus\r\nMạng 3G, kết nối Wifi, Bluetooth 3.0\r\nỨng dụng Microsoft office (Word, Excel, PowerPoint, PDF)"\r\n'),
(5, 'X7-00', 'NOKIA', 8699000, '"Màn hình OLED, 16 triệu màu, rộng 4.0 inches\r\nHệ điều hành mới nhất của Symbian Anna\r\nMáy ảnh 8.0 MP, hỗ trợ Flash kép\r\nTích hợp 2 loa, và mic chuyên dụng\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nỨng dụng Quickoffice xem file văn bản"\r\n'),
(6, 'C7', 'NOKIA', 7479000, '"Hệ điều hành Symbian\r\nMàn hình cảm ứng điện dung\r\nMáy ảnh 8 MP với Flash kép\r\nMáy nghe nhạc, xem phim nhiều định dạng\r\nMạng 3G, kết nối Wifi, GPS, Bluetooth\r\nXem văn bản (Word, Excel, PowerPoint, PDF)\r\nKết nối Tivi và Web Tivi"\r\n'),
(7, '701', 'NOKIA', 7299000, '"Sử dụng hệ điều hành Symbian Belle\r\nMàn hình cảm ứng điện dung LED-backlit IPS TFT 16 triệu màu\r\nMáy ảnh 8.0 MP đèn Led Flash, Fixed focus\r\nQuay phim HD 720p\r\nVi xử lý 1GHz, bộ nhớ 8GB, hộ trợ thẻ 32GB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, Flash Lite 4.0, la bàn số\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth tốc độ cao"\r\n'),
(8, 'N8', 'NOKIA', 6999000, '"Hệ điều hành Symbian\r\nMáy ảnh 12 MP, máy ảnh phụ VGA\r\nMạng 3G với HSDPA, 7.2 Mbps\r\nHSUPA, 5.76 Mbps\r\nWi-Fi 802.11 b/g, UPnP technology\r\nDocument viewer (Word, Excel, PowerPoint, PDF)\r\nĐài FM, tích hợp máy phát FM\r\nJack tai nghe 3.5mm, Out Tivi với HDMI and composite, Flash Lite v4.0"\r\n'),
(9, '700', 'NOKIA', 6899000, '"Sử dụng hệ điều hành Symbian Belle\r\nMàn hình AMOLED cảm ứng điện dung 16 triệu màu\r\nMáy ảnh 5.0 MP đèn Led Flash, Fixed focus\r\nVi xử lý 1GHz, bộ nhớ 2GB, Ram 512MB, Rom 1GB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, Flash Lite 4.0, la bàn số\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth tốc độ cao"\r\n'),
(10, 'E6', 'NOKIA', 6799000, '"Thiết kế thời trang với bàn phím Qwerty\r\nHệ điều hành Symbian Anna\r\nMáy ảnh 8.0 MP, hỗ trợ flash kép, camera phụ\r\nQuay phim HD chuẩn 720p\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nỨng dụng QuickOffice soạn thảo văn bản, kết nối Tivi"\r\n'),
(11, 'PRADA 3.0', 'LG', 14199000, '"Hệ điều hành Android 2.3 (Gingerbread)\r\nMàn hình cảm ứng điện dung 16 triệu màu, 4.3 inches\r\nMáy ảnh 8.0 MP tự động lấy nét, đèn LED Flash \r\nVi xử lý Dual-core 1 GHz Cortex-A9\r\nHỗ trợ mạng xã hội, la bàn số\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nKết nối 3G, Wi-Fi, EDGE, GPRS, Bluetooth, A-GPS "\r\n'),
(12, 'OPTIMUS 3D P920', 'LG', 12099000, '"Màn hình 3D LCD 16 triệu màu, rộng 4.3 inches\r\nCảm ứng điện dung đa điểm\r\nHệ điều hành Android 2.2 Froyo (có thể nâng cấp lên 2.3)\r\nMáy ảnh 5.0 MP, hỗ trợ máy ảnh phụ\r\nQuay phim HD 3D\r\nĐịnh vị toàn cầu với A-GPS\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nBộ nhớ trong 8GB, Ram 512MB\r\nHỗ trợ thẻ nhớ lên đến 32GB\r\nKết nối 3G, Wi-Fi, Bluetooth, EDGE, GPRS \r\nHỗ trợ soạn thảo văn bản"\r\n'),
(13, 'OPTIMUS 2X P990', 'LG', 11099000, '"Hệ điều hành Android 2.2 Froyo\r\nChip xử lý 2 nhân (NVIDIA Tegra 2 Dual-Core 1GHz)\r\nMáy ảnh 8.0 MP, hỗ trợ quay phim Full HD 1080p\r\nMáy ảnh phụ 1.3 MP, thực hiện videocall\r\nXem phim Full HD, cổng kết nối HDMI và âm thanh 7.1\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nPin dung lượng cao 1500 mAh"\r\n'),
(14, 'OPTIMUS BLACK P970', 'LG', 7799000, '"Sử dụng hệ điều hành Android 2.2 Froyo\r\nBộ nhớ trong 2GB hỗ trợ thẻ lên đến 32GB\r\nMàn hình TFT, 16 triệu màu, rộng 4.0 inches\r\nMáy ảnh 5.0 MP hỗ trợ quay phim HD 720p\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nKết nối 3G, Wifi, bluetooth\r\nHỗ trợ xem file văn bản"\r\n'),
(15, 'OPTIMUS SOL E730', 'LG', 7199000, '"Hệ điều hành Android 2.3\r\nMàn hình cảm ứng điện dung 3.8 inches\r\nMáy ảnh 5.0 MP với lấy nét tự động\r\nVi xử lý 1 GHz, Ram 512MB, Rom 2GB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, la bàn số\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth tốc độ cao"\r\n'),
(16, 'OPTIMUS HUB E510', 'LG', 5499000, '"Hệ điều hành Android 2.3.4\r\nMàn hình cảm ứng điện dung TFT 3.5 inches\r\nMáy ảnh 5.0 MP tự động lấy nét, nhận diện khuôn mặt và nụ cười\r\nHỗ trợ chức năng làm đẹp hình ảnh Beauty Shot\r\nHỗ trợ mạng xã hội, la bàn số\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nĐịnh vị toàn cầu với A-GPS\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth\r\nXem và chỉnh sửa văn bản"\r\n'),
(17, 'OPTIMUS NET P698', 'LG', 4499000, '"Sử dụng hệ điều hành Android 2.3 (Gingerbread)\r\nMàn hình cảm ứng điện dung 3.2 inches\r\nHỗ trợ 2 Sim 2 sóng online\r\nVi xử lý 800MHz, Ram 512MB, Bộ nhớ 150MB\r\nMáy ảnh 3.2 MP với tự động lấy nét\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk\r\nHỗ trợ mạng xã hội, la bàn số\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth, A-GPS"\r\n'),
(18, 'OPTIMUS ONE P500', 'LG', 4499000, '"Hệ điều hành Android 2.2\r\nMáy ảnh 3.0 MP, lấy né tự động\r\nMạng 3G với tốc độ truyền tari7.2Mbps\r\nKết nối mạng Wifi, GPS, Bluetooth\r\nĐài FM tích hợp"\r\n'),
(19, 'OPTIMUS PRO C660', 'LG', 3899000, '"Sử dụng hệ điều hành Android OS, v2.3.3\r\nChụp hình sắc nét với máy ảnh 3.15 MP\r\nĐịnh vị toàn cầu với A-GPS\r\nĐài FM radio với RDS\r\nBộ nhớ 150MB hỗ trợ thẻ lên đến 32GB\r\nKết nối 3G, wifi, bluetooth tốc độ cao\r\nHỗ trợ mạng xã hội\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nHỗ trợ xem file văn bản"\r\n'),
(20, 'OPTIMUS ME P350', 'LG', 3199000, '"Màn hình cảm ứng rộng 2.8 inches\r\nHệ điều hành Android 2.2 Froyo\r\nMáy ảnh 3 MP, lấy nét tự động\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nĐài FM radio với RDS\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth A2DP\r\nỨng dụng xem file văn bản"\r\n'),
(21, 'GALAXY NOTE N7000', 'SAMSUNG', 15999000, '"Bút S Pen cho phép viết vẽ trên màn hình cảm ứng điện dung\r\nHệ điều hành: Android 2.3 (Gingerbread)\r\nCPU: ARM Cortex A9 1,4GHz dual-core processor - Ram: 1 GB\r\nBộ nhớ trong: 16 GB - Thẻ nhớ ngoài MicroSD (T-Flash) lên đến 32 GB\r\nMàn hình Super AMOLED 16 triệu màu, rộng 5.3 inches\r\nCamera: 8.0 MP (3264x2448 pixels), hỗ trợ Tự động lấy nét, Đèn flash LED, Chạm lấy nét, Nhận diện khuôn mặt và nụ cười, Chống rung\r\nDung lượng pin: 2500 mAh"\r\n'),
(22, 'GALAXY S II I9100G', 'SAMSUNG', 12499000, '"Điện thoại thiết kế cực mỏng\r\nMàn hình Super AMOLED Plus 16 triệu màu\r\nSử dụng hệ điều hành Android 2.3\r\nMáy ảnh 8.0 MP tự động lấy nét, nhận diện khuôn mặt và nụ cười\r\nHỗ trợ quay phim chuẩn HD 1080p\r\nĐịnh vị toàn cầu với A-GPS\r\nKết nối 3G, Wifi, Bluetooth\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk\r\nHỗ trợ đọc và soạn thảo văn bản"\r\n'),
(23, 'GALAXY S I9003 16GB', 'SAMSUNG', 11499000, '"Điện thoại sử dụng hệ điều hành Android 2.2 Froyo\r\nMàn hình Super Clear LCD 16 triệu màu, rộng 4.0 inches\r\nMáy ảnh 5.0 MP (2592 x 1944 pixels)\r\nĐài FM radio với RDS\r\nĐịnh vị toàn cầu với A-GPS\r\nNghe nhạc: MP3, WAV, WMA, eAAC+\r\nXem Phim: 3GP, DivX, H.263, H.264(MPEG4-AVC), MP4, WMV\r\nKết nối 3G, Wi-Fi, Bluetooth tốc độ cao\r\nỨng dụng soạn thảo văn bản"\r\n'),
(24, 'GALAXY TAB', 'SAMSUNG', 10499000, '"Hệ điều hành Android v2.2 (Froyo)\r\nMàn hình cảm ứng đa điểm cực rộng 7 inches\r\nXem phim Full HD\r\nThinkfree Office (Word, Excel, PowerPoint, PDF)\r\nMạng 3G với HSDPA, 7.2 Mbps\r\nHSUPA, 5.76 Mbps\r\nBộ nhớ trong 16/32 GB"\r\n'),
(25, 'GALAXY TAB P1000', 'SAMSUNG', 9190000, '"Hệ điều hành Android v2.2 (Froyo)\r\nMàn hình cảm ứng đa điểm cực rộng 7 inches\r\nXem phim Full HD\r\nThinkfree Office (Word, Excel, PowerPoint, PDF)\r\nMạng 3G với HSDPA, 7.2 Mbps\r\nHSUPA, 5.76 Mbps\r\nBộ nhớ trong 16/32 GB"\r\n'),
(26, 'S8530 WAVE II', 'SAMSUNG', 9399000, '"Hệ điều hành Bada 1.2\r\nMáy ảnh 5.0 MP, hỗ trợ máy ảnh phụ\r\nQuay phim chuẩn HD\r\nMạng 3G với tốc độ truyền tải 7.2 Mbps\r\nCông nghệ âm thanh DNSe (Digital Natural Sound Engine)\r\nKết nối Wifi, Tivi, Bluetooth,.."\r\n'),
(27, 'GALAXY S I9003 4GB', 'SAMSUNG', 8199000, '"Điện thoại siêu tốc độ\r\nThiết kế cực mỏng cùng màn hình SUPER CLEAR LCD\r\nHệ điều hành Android 2.2 Froyo Máy ảnh 5.0 MP, quay phim HD\r\nChip xử lý 1 GHz, RAM 478 MB\r\nBộ nhớ trong 4 GB\r\nAdobe Flash 10.1, giao diện người dùng sống động\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nỨng dụng soạn thảo văn bản"\r\n'),
(28, 'WAVE 3 S8600', 'SAMSUNG', 8089000, '"Hệ điều hành Bada 2.0\r\nMàn hình Super AMOLED 16 triệu màu 4.0 inches\r\nMáy ảnh 5.0 MP đèn Led Flash, tự động lấy nét\r\nNhận diện khuôn mặt và nụ cười, chạm lấy nét, chống rung\r\nMở khóa thông minh, nhận diện chữ viết tay\r\nVi xử lý 1.4 GHz, bộ nhớ 4GB, hỗ trợ thẻ 32GB\r\nChức năng ChatON\r\nKết nối 3G, Wife, EDGE, GPRS, Bluetooth, A-GPS"\r\n'),
(29, 'GALAXY W I8150', 'SAMSUNG', 7949000, '"Sử dụng hệ điều hành Android 2.3\r\nMàn hình cảm ứng điện dung 16 triệu màu 3.7 inches\r\nMáy ảnh 5.0 MP đèn LED Flash, tự động lấy nét\r\nVi xử lý 1.4 GHz, Ram 512MB, Rom 2GB, Bộ nhớ 1.7GB\r\nHỗ trợ mạng xã hội, Adobe flash\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk\r\nWord, Excel, PowerPoint, PDF\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth, A-GPS"\r\n'),
(30, 'S5830 ACE', 'SAMSUNG', 6399000, '"Hệ điều hành Andoird 2.2 Froyo\r\nMáy ảnh 5.0 MP (2592 x 1944 pixels)\r\nĐài FM radio với RDS\r\nNghe nhạc: MP3, WAV, WMA, eAAC+\r\nXem Phim: 3GP, H.263, H.264(MPEG4-AVC), MP4, WMV\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth V2.1 với A2DP\r\nỨng dụng xem file văn bản"\r\n'),
(31, 'XPERIA ARC S LT18I', 'SONY ERICSSON', 12190000, '"Hệ điều hành Android 2.3.4\r\nMàn hình TFT 16 triệu màu 4.2 inches\r\nMáy ảnh 8.1MP đèn Led Flash, AF, nhân diện khuôn mặt và nụ cười\r\nChụp toàn cảnh với chức năng 3D sweep panorama\r\nBộ nhớ trong 1GB,hữu dụng 320MB\r\nVi xử lý 1,4GHz, Ram 512MB\r\nHỗ trợ mạng xã hội, Adobe Flash 10.2\r\nLoại bỏ tiếng ồn với micro chuyên dụng\r\nMặt kính thiết kế đặc biệt chống trầy\r\nKết nối 3G, Wi-Fi, EDGE, GPRS, Bluetooth, HDMI"\r\n'),
(32, 'XPERIA ARC LT15I', 'SONY ERICSSON', 10990000, '"Một trong 3 smartphone mỏng nhất thế giới\r\nHệ điều hành Android 2.3\r\nMàn hình Super Clear LCD 16 triệu màu với mặt kính chống trầy\r\nGiao diện Timescape dễ sử dụng\r\nCông nghệ Sony Mobile Bravia, cho phép bật/tắt như card màn hình rời trên một số mẫu laptop\r\nKết nối 3G, Wi-Fi 802.11 b/g/n,A-GPS, Bluetooth, HDMI\r\nỨng dụng xem file văn bản , Adobe Flash 10.1"\r\n'),
(33, 'XPERIA PRO MK16I', 'SONY ERICSSON', 9790000, '"Hệ điều hành Android 2.3\r\nMàn hình TFT 16 triệu màu 3.7 inches\r\nMáy ảnh 8.1MP đèn Led Flash, AF, nhân diện khuôn mặt và nụ cười\r\nBộ nhớ trong 1GB,hữu dụng 320MB\r\nVi xử lý 1GHz, Ram 512MB\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, Adobe Flash 10.1\r\nKết nối 3G, Wi-Fi, EDGE, GPRS, Bluetooth, HDMI"\r\n'),
(34, 'XPERIA PLAY R800I', 'SONY ERICSSON', 8900000, '"Hệ điều hành Android 2.3\r\nPhím chơi game chuyên dụng\r\nMáy ảnh 5.0 MP (2592 x 1944 pixels)\r\nNghe nhạc: MP3, WAV, WMA, eAAC+\r\nXem Phim: H.263, H.264(MPEG4-AVC), MP4, WMV\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth V2.1 với A2DP\r\nỨng dụng soạn thảo văn bản"\r\n'),
(35, 'XPERIA RAY ST18I', 'SONY ERICSSON', 7990000, '"Màn hình 16 triệu màu với mặt kính chống trầy\r\nMáy ảnh 8.1 MP , quay phim HD 720p\r\nHệ điều hành Android 2.3\r\nGiao diện Timescape dễ sử dụng\r\nCông nghệ Sony Mobile Bravia\r\nKết nối 3G, Wi-Fi 802.11 b/g/n,A-GPS, Bluetooth, HDMI\r\nỨng dụng xem file văn bản "\r\n'),
(36, 'XPERIA ACTIVE ST17I', 'SONY ERICSSON', 7690000, '"Thiết kế sành điệu dành cho thể thao\r\nMàn hình TFT 16 triệu màu, rộng 3.0 inches\r\nBộ nhớ trong 1GB hữu dụng 320MB\r\nChống bụi bẩn và chống thấm nước\r\nHệ điều hành Android 2.3\r\nMáy ảnh 5.0 MP, hỗ trợ quay phim 720p\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, GPS, Bluetooth\r\nỨng dụng kết nối web xã hội"\r\n'),
(37, 'XPERIA NEO V MT11I', 'SONY ERICSSON', 7650000, '"Hệ điều hành Android 2.3\r\nMàn hình TFT 16 triệu màu 3.7 inches\r\nMặt kính chống trầy xước\r\nBộ nhớ trong 1GB, hữu dụng 320MB\r\nBộ vi xử lý Scorpion 1GHz, Ram 512MB\r\nMáy ảnh 5.0 MP, quay phim HD 720p\r\nChụp toàn cảnh với 3D sweep panorama\r\nHỗ trợ mạng xã hội, la bàn số, Adobe Flash 10.1\r\nĐịnh vị toàn cầu với A-GPS\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth, HDMI"\r\n'),
(38, 'XPERIA MINI PRO SK17', 'SONY ERICSSON', 6610000, '"Bàn phím chữ hoàn hảo và các chức năng thông minh giúp nhắn tin nhanh\r\nHệ điều hành Android 2.3\r\nMáy ảnh 5.0 MP, máy ảnh phụ thực hiện Videocall\r\nQuay phim HD và Màn hình Reality tích hợp công nghệ Mobile BRAVIA® Engine\r\nKết nối 3G, Wi-Fi 802.11 b/g/n,A-GPS, Bluetooth\r\nỨng dụng xem file văn bản, Google Search, Maps, Gmail, YouTube, Calendar, Google Talk"\r\n'),
(39, 'LIVE WITH WALKMAN WT', 'SONY ERICSSON', 5990000, '"Hệ điều hành Android 2.3\r\nMàn hình cảm ứng điện dung 16 triệu màu 3.2 inches\r\nMáy ảnh 5.0 MP đèn Led flash, chống rung\r\nTự động lấy nét, chạm lấy nét, nhận diện khuôn mặt và nụ cười\r\nVi xử lý 1 GHz, bộ nhớ 320MB, Ram 512MB\r\nLoa ngoài hỗ trợ công nghệ Sony xLOUD\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, la bàn số\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth tốc độ cao"\r\n'),
(40, 'XPERIA MINI ST15I', 'SONY ERICSSON', 5390000, '"Điện thoại thông minh, quay phim HD nhỏ nhất thế giới\r\nHệ điều hành Android 2.3\r\nVideo HD và Màn hình Reality tích hợp công nghệ Mobile BRAVIA® Engine\r\nMáy ảnh 5.0 MP, hỗ trợ Flash\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nỨng dụng xem file văn bản\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk"\r\n'),
(41, 'EVO 3D', 'HTC', 15890000, '"Hệ điều hành Android 2.3 (Gingerbread)\r\nMàn hình 3D LCD 16 triệu màu, rộng 4.3 inches\r\nMáy ảnh 5.0 MP, đèn led flash kép, lấy nét tự động\r\nNghe nhạc: MP3 - Xem Phim: MP4\r\nKết nối GPRS, EDGE, 3G, Wifi, A-GPS, Bluetooth\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk, Picasa\r\nHỗ trợ mạng xã hội ảo: Facebook, Flickr, Twitter"\r\n'),
(42, 'SENSATION XL', 'HTC', 14900000, '"Hệ điều hành Android 2.3\r\nMàn hình S-LCD 16 triệu màu 4.7 inches\r\nMáy ảnh 8.0 MP tự động lấy nét, đèn Led Flash kép\r\nVi xử lý 1.5GHz, Ram 768MB, Bộ nhớ trong 16GB\r\nHỗ trợ âm thanh và tai nghe Beats\r\nĐịnh vị toàn cầu với A-GPS\r\nHỗ trợ mạng xã hội, la bàn số, Adobe Flash\r\nLoại bỏ tiếng ồn với Micro chuyên dụng\r\nGoogle Search, Maps, Gmail, YouTube, Calendar, Google Talk"\r\n'),
(43, 'SENSATION', 'HTC', 13999000, '"Màn hình Super LCD 16 triệu màu, rộng 4.3 inches\r\nHệ điều hành Android 2.3\r\nMáy ảnh 8.0 MP, quay phim Full HD 1080p\r\nChip xử lý kép 1.2 GHz\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth\r\nỨng dụng xem file văn bản"\r\n'),
(44, 'SENSATION XE', 'HTC', 13900000, '"Hệ điều hành Android 2.3.4\r\nMàn hình S-LCD 16 triệu màu 4.3 inches\r\nMáy ảnh 8.0 MP tự động lấy nét, đèn Led Flash\r\nVi xử lý hai nhân 1.5GHz, Ram 768MB, Bộ nhớ 4GB\r\nHỗ trỡ quay phim HD 1080p\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk\r\nHỗ trợ mạng xã hội, la bàn số\r\nKết nối 3G, Wife, EDGE, GPRS, Bluetooth, A-GPS"\r\n'),
(45, 'RHYME', 'HTC', 12800000, '"Hệ điều hành Android 2.3.4\r\nMàn hình S-LCD 16 triệu màu 3.7 inches\r\nMáy ảnh 5.0 MP tự động lấy nét, đèn Led Flash\r\nHỗ trợ quay phim HD 720p\r\nVi xử lý 1GHz, Ram 768MB, bộ nhớ 4GB\r\nĐịnh vị toàn cầu với A-GPS\r\nGoogle Search, Maps, Gmail, YouTube, Google Talk, Picasa\r\nHỗ trợ mạng xã hội, la bàn số\r\nLoại bỏ tiếng ồn với micro chuyên dụng\r\nKết nối 3G, Wifi, EDGE, GPRS, Bluetooth tốc độ cao"\r\n'),
(46, 'DESIRE HD', 'HTC', 12499000, '"Hệ điều hành Android 2.2 Froyo\r\nMàn hình cảm ứng đa điểm, rộng 4.3 inches\r\nMáy ảnh 8.0 MP, hỗ trợ LED flash kép\r\nMạng 3G với HSDPA, 14.4 Mbps\r\nHSUPA, 5.76 Mbps\r\nKết nối Wifi, A-GPS, Bluetooth"\r\n'),
(47, 'DESIRE Z', 'HTC', 12300000, '"Hệ điều hành Android 2.2 Froyo\r\nMàn hình cảm ứng đa điểm, rộng 3.7 inches\r\nMáy ảnh 5 MP, hỗ trợ LED flash\r\nMạng 3G với HSDPA, 7.2 Mbps\r\nHSUPA, 2 Mbps\r\nKết nối Wifi, Bluetooth, A-GPS"\r\n'),
(48, 'DESIRE S', 'HTC', 11700000, '"Hệ điều hành Android 2.3\r\nMàn hình Super Clear LCD 16 triệu màu, rộng 3.7 inches\r\nMáy ảnh 5.0 MP (2592 x 1944 pixels)\r\nĐài FM radio với RDS\r\nNghe nhạc: AAC+, MP3, WAV, WMA\r\nXem Phim: DivX, H.263, H.264(MPEG4-AVC), MP4, WMV\r\nKết nối 3G, Wi-Fi 802.11 b/g, A-GPS, Bluetooth V2.1 với A2DP\r\nỨng dụng xem file văn bản"\r\n'),
(49, 'RHYME 2', 'HTC', 11500000, '"Quay phim chuẩn HD 720p\r\nHệ điều hành Android 2.3.4\r\nCPU: Qualcomm MSM8255, 1 GHz Scorpion, Ram 768MB,\r\nBộ nhớ trong 4GB - Hỗ trợ thẻ nhớ ngoài MicroSD đến 32GB\r\nMàn hình S-LCD 16 triệu màu rộng 3.7 inches\r\nMáy ảnh 5.0 MP tự động lấy nét, đèn Led Flash\r\nDung lượng pin: Li-Ion 1600 mAh"\r\n'),
(50, 'HD7', 'HTC', 10990000, '"Hệ điều hành Microsoft Windows Phone 7\r\nMàn hình Super Clear LCD 16 triệu màu, rộng 4.3 inches\r\nMáy ảnh 5.0 MP (2592 x 1944 pixels)\r\nNghe nhạc: MP3, WMA, WAV, eAAC+\r\nXem Phim: 3GP, MP4, H.264(MPEG4-AVC), H.263, WMV\r\nKết nối 3G, Wi-Fi 802.11 b/g/n, A-GPS, Bluetooth V2.1 với A2DP\r\nỨng dụng soạn thảo văn bản"\r\n'),
(51, 'iPhone 4S', 'Apple', 14390000, 'Sử dụng hệ điều hành iOS 5 hệ điều hành mới nhất của Apple dành cho iPhone. Màn hình LED-backlit IPS TFT 16 triệu màu 3.5 inches. Cảm ứng điện dung đa điểm, mặt kính chống trầy xước. Máy ảnh 8.0 MP quay phim HD 1080p. Vi xử lý hai nhân 1GHz, Apple A5 chipset, bộ nhớ 16GB. Hỗ trợ mạng xã hội, la bàn số, google maps. Loại bỏ tiếng ồn với micro chuyên dụng. Định vị toàn cầu với A-GPS. Kết nối 3G, Wifi, EDGE, GPRS tốc độ cao'),
(52, 'C3-00', 'NOKIA', 2199000, 'Thiết kế dạng thanh chắc chắn với bàn phím Qwerty\r\nMáy ảnh 2.0 MP, hỗ trợ quay phim\r\nMáy nghe nhạc MP3/WAV/WMA/eAAC+\r\nĐài FM tích hợp, jack tai nghe 3.5mm\r\nKết nối Wifi, Bluetooth, USB\r\nFlash Lite v3.0\r\nMạng xã hội');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

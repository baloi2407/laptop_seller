-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2024 lúc 04:43 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mysqli`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numbers` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user_name`, `password`, `name`, `numbers`, `email`) VALUES
(8, 'admin', '$2y$10$/MOr3htJKu6v9gc3q2gJyeIlSMQRXmjxQ2qTuUge1GJX6SVLoeivC', 'admin', '031245678', 'helloworld@gmail.com'),
(11, 'admin2', '$2y$10$ctcFV1rfDcfd1FrTFBFWNe6sWZ.8vTKe7sg49disTOqfmU.2AwDSC', 'admin2', '031245679', 'helloworld2@gmail.com'),
(12, 'admin10', '$2y$10$ukIRp4KBOnm0X34eVUyjCuE7Byn7d758L8UDleJnGiQKGGdVDk19W', 'Nguyễn Văn Minh Quang', '0312456789', 'helloworld9@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `ten_banner` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `ten_banner`, `images`, `trang_thai`) VALUES
(8, 'Banner mua 2', 'banner-mtb-1400x431.jpg', 'Hoạt động'),
(9, 'Banner mua 1', 'banner-road-bike-1400x431.jpg', 'Hoạt động'),
(10, 'Banner mua 3', 'banner-KID-1400x431.jpg', 'Hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_sanpham` int(50) NOT NULL,
  `soluongsp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`id_hoadon`, `id_sanpham`, `soluongsp`) VALUES
(43, 68, 1),
(43, 65, 1),
(44, 71, 1),
(44, 73, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietphieunhap`
--

CREATE TABLE `tbl_chitietphieunhap` (
  `id_phieunhap` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietphieunhap`
--

INSERT INTO `tbl_chitietphieunhap` (`id_phieunhap`, `id_sanpham`, `id_ncc`, `soluong`, `dongia`) VALUES
(17, 65, 1, 10, 890000),
(17, 68, 2, 10, 1550000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tong_tien` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `pptt` varchar(100) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id_hoadon`, `id_user`, `diachi`, `tong_tien`, `sdt`, `date`, `pptt`, `trangthai`, `time`) VALUES
(43, 12, 'abc', '2440000', '0123456789', '2024-04-11', 'Ví điện tử', 'Đã hủy', '24-04-11 11:17:56 PM'),
(44, 12, '', '5340000', '0123456789', '2024-04-11', 'Ví điện tử', 'Đơn hàng đã hoàn tất', '24-04-11 11:25:56 PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id_nhacungcap` int(11) NOT NULL,
  `tenncc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`id_nhacungcap`, `tenncc`) VALUES
(1, 'FPT Group'),
(2, 'Điện Máy Xanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id_permis` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qladmin` varchar(255) NOT NULL,
  `qluser` varchar(255) NOT NULL,
  `qlhd` varchar(255) NOT NULL,
  `qlsp` varchar(255) NOT NULL,
  `qlcate` varchar(255) NOT NULL,
  `qlncc` varchar(255) NOT NULL,
  `qlbanner` varchar(255) NOT NULL,
  `qlnhaphang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_permission`
--

INSERT INTO `tbl_permission` (`id_permis`, `name`, `qladmin`, `qluser`, `qlhd`, `qlsp`, `qlcate`, `qlncc`, `qlbanner`, `qlnhaphang`) VALUES
(1, 'admin', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,'),
(5, 'admin1', '', '', '', '', '', '', '', ''),
(8, 'admin2', '', '', '', '', '', '', '', ''),
(9, 'Nguyễn Văn Minh Quang', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,'),
(10, 'Nguyễn Văn Minh Quang', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,'),
(11, 'Nguyễn Văn Minh Quang', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,'),
(12, 'Nguyễn Văn Minh Quang', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,', 'xem,them,xoa,sua,');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phanloaisp`
--

CREATE TABLE `tbl_phanloaisp` (
  `id_loaisp` int(11) NOT NULL,
  `ten_loaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phanloaisp`
--

INSERT INTO `tbl_phanloaisp` (`id_loaisp`, `ten_loaisp`) VALUES
(1, 'Xe đạp trẻ em'),
(2, 'Xe đạp thể thao'),
(3, 'Xe đạp địa hình'),
(4, 'Xe đạp touring'),
(7, 'Xe đạp đua'),
(8, 'Xe đạp nữ'),
(9, 'Xe đạp fixed gear'),
(11, 'Xe đạp phổ thông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `id_phieunhap` int(11) NOT NULL,
  `ngaynhap` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` varchar(100) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieunhap`
--

INSERT INTO `tbl_phieunhap` (`id_phieunhap`, `ngaynhap`, `soluong`, `tongtien`, `trangthai`) VALUES
(14, '2024-04-07', 10, '10900000', 'Đã nhận hàng. Đã thanh toán'),
(16, '2024-04-11', 20, '24400000', 'Đã nhận hàng. Đã thanh toán'),
(17, '2024-04-16', 20, '24400000', 'Chưa nhận hàng. Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `loaisp` int(10) NOT NULL,
  `mota` longtext NOT NULL,
  `gia` varchar(255) NOT NULL,
  `trangthai` varchar(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `soluong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `ten_sanpham`, `loaisp`, `mota`, `gia`, `trangthai`, `images`, `soluong`) VALUES
(62, 'Xe Đạp Trẻ Em Youth YBQ 14 – Bánh 14 Inch', 1, 'Xe Đạp Trẻ Em Youth YBQ, Bánh 14 Inches không chỉ là một phương tiện di chuyển, mà còn là một cách tuyệt vời để bé khám phá thế giới xung quanh một cách sáng tạo và an toàn.\r\n\r\nChơi Và Học:\r\n\r\nVới thiết kế chức năng tập thăng bằng, Xe Đạp Trẻ Em Youth YBQ giúp bé phát triển kỹ năng cân bằng và tự tin từ những bước đi đầu tiên. Đặc biệt, xe được trang bị đèn LED thú vị trên khung sườn, tạo ra không gian đạp xe vui nhộn cho bé cả vào ban ngày lẫn buổi tối.\r\n\r\nAn Toàn Và Đáng Tin Cậy:\r\n\r\nKhung xe chắc chắn và hệ thống phanh hiệu quả giúp đảm bảo an toàn cho bé trong mọi chuyến đi. Bố mẹ có thể yên tâm khi bé tham gia vào các hoạt động ngoài trời.\r\n\r\nTrải Nghiệm Độc Đáo:\r\n\r\nXe Đạp Trẻ Em Youth YBQ không chỉ là một phương tiện di chuyển, mà còn là một người bạn đồng hành đáng tin cậy, giúp bé tạo ra những kỷ niệm đáng nhớ và trải nghiệm thú vị. Chọn ngay chiếc xe đầu tiên cho bạn với Xe Đạp Trẻ Em Youth YBQ cực kỳ chất lượng nhé! ', '1090000', '1', 'YBQ_Yellow-768x768.jpg', 100),
(63, 'Xe Đạp Trẻ Em Youth YBQ 14 – Bánh 14 Inche', 1, '', '1090000', '1', 'YBQ_Yellow-768x768.jpg', 160),
(64, 'Xe Đạp Trẻ Em Youth MAX BIKE Nina 14 – Bánh 14 Inches', 1, '1. Thiết Kế Ngọt Ngào\r\nXe đạp Youth MAX BIKE Nina 14 được thiết kế với gam màu pastel dễ thương, làm nổi bật sự nữ tính và dễ thương của mọi công chúa nhỏ. Mỗi chi tiết chăm chút tỉ mỉ từ yên xe đến ghi đông, tạo nên một diện mạo đầy cuốn hút và đáng yêu.\r\n\r\n2. Bánh Phụ Dễ Dàng Tập Làm Quen Xe Đạp\r\nVới trang bị bánh phụ, chiếc xe đạp Nina 14 giúp các bé dễ dàng học lái và tự tin hơn khi thử sức trên con đường. Quá trình học tập và rèn luyện kỹ năng điều khiển xe sẽ trở nên thú vị và an toàn hơn bao giờ hết.\r\n\r\n3. Khung Thép Chắc Chắn, Bền Bỉ\r\nKhung xe đạp được làm từ chất liệu thép chắc chắn, đảm bảo độ bền và độ an toàn tối đa cho người sử dụng, đặc biệt là trẻ em nhỏ. Youth MAX BIKE Nina 14 là sự lựa chọn đáng tin cậy cho bậc phụ huynh lo lắng về sức khỏe và an toàn của con em.\r\n\r\n4. Trang Bị Đèn LED Đẹp Mắt\r\nĐiểm nhấn đặc biệt của chiếc xe đạp Youth MAX BIKE Nina 14 là bộ đèn LED trang trí xinh xắn được tích hợp trên khung sườn. Không chỉ tăng cường sự an toàn khi di chuyển vào buổi tối mà còn tạo điểm nhấn thẩm mỹ cho chiếc xe, khiến bé yêu tự hào khi sở hữu.\r\n\r\n5. Sự Thích Mê Cho Công Chúa Nhỏ\r\nVới sự kết hợp hoàn hảo giữa thiết kế đẹp mắt, tính năng an toàn và sự tiện lợi, chiếc xe đạp trẻ em Youth MAX BIKE Nina 14 chắc chắn sẽ trở thành món quà không thể thiếu trong những dịp lễ quan trọng của bé.\r\n\r\nYouth MAX BIKE Nina 14 không chỉ là một chiếc xe đạp thông thường mà còn là người bạn đồng hành tin cậy của các bé trên mọi chặng đường. Với thiết kế đẹp mắt, chất bền bỉ và tính an toàn, đây sẽ là lựa chọn hoàn hảo cho các phụ huynh muốn', '10990000', '1', 'Lisa_Pink.jpg', 110),
(65, 'Xe Đạp Trẻ Em 12 Inch GH Bike [GIÁ RẺ]', 1, 'Mô tả chung\r\nMã sản phẩm: 12T11\r\nThương Hiệu: GH BIKE\r\nSản Xuất: Đài Loan\r\nKích Thước: 12 Inch\r\nMàu Sắc: Đỏ, Xanh, Vàng, Cam và Lá\r\nĐộ tuổi thích hợp: 2 tuổi – 4 tuổi\r\nTìm hiểu thương hiệu GH Bike\r\nNMT BIKE là thương hiệu xe đạp có xuất xứ từ Đài Loan. Sau nhiều năm hình thành và phát triển, NMT BIKE đã không ngừng nâng cao chất lượng sản phẩm mà mình kinh doanh. Vì vậy, nhiều hộ gia đình Việt Nam đã tin tưởng sử dụng các sản phẩm NMT BIKE không chỉ có chất lượng tốt mà còn có giá thành cạnh tranh.', '890000', '1', '6-600x400-1.jpg', 119),
(66, 'Xe Đạp Trẻ Em HMT Inox 20 Inch – Hàng Công Ty', 1, 'Mô tả chung\r\nMã sản phẩm: 20@500/72\r\nThương Hiệu: HMT\r\nSản Xuất: Việt Nam\r\nKích Thước: 20 Inch\r\nMàu Sắc: Xanh dương, Cam, Xanh lá\r\nĐộ tuổi thích hợp: 7 tuổi – 10 tuổi\r\nXe Đạp Trẻ Em 20 Inch @500 Inox nhỏ gọn, cá tính\r\nXe đạp trẻ em HMT là dòng xe tiêu chuẩn được sản xuất theo tiêu chuẩn Việt Nam, với khung Inox siêu bền, được trang trí niềng xe nhiều màu sắc bắt mắt, thiết kế phong cách thể thao cá tính, chắc chắn sẽ là người bạn đồng hành tuyệt vời cho các bé.\r\n\r\nXe Đạp là món quà đặc biệt của các bậc cha mẹ dành cho đứa con thân yêu, giúp bé phát triển về thể chất cũng như tinh thần. Hơn nữa, cho bé chạy xe chính là cách tạo cho bé có trách nhiệm từ nhỏ và học cách tự lập.', '1290000', '1', 'xe-dap-tre-em-500-inox-20-inch-768x510.jpg', 100),
(67, 'Xe Đạp Trẻ Em XAMING Nữ 2 Gióng 12 Inch', 1, 'Mô Tả Cơ Bản \r\nMã sản phẩm: 12g25\r\nThương Hiệu: XAMING\r\nSản Xuất: Đài Loan\r\nKích Thước: 12 Inch\r\nMàu Sắc: Đỏ, Xanh Tím và Hồng\r\nĐộ tuổi thích hợp: 2 tuổi – 4 tuổi. ', '1350000', '1', 'Xe-Dap-Tre-Em-XAMING-Nu-2-Giong-12-Inch-2-768x510.png', 100),
(68, 'Xe Đạp Trẻ Em Xaming Baga 20 Inch', 1, 'Mô Tả Cơ Bản\r\nMã sản phẩm: 20T22\r\nThương hiệu: Xaming\r\nSản xuất: Đài Loan\r\nKích thước: 20 Inch\r\nPhân loại: Xe đạp trẻ em\r\nMàu sắc: Đỏ, Xanh\r\nĐộ tuổi thích hợp: 7 tuổi – 10 tuổi, chiều cao 1m3-1m45 ', '1550000', '1', 'hinh-xe-dap-tre-em-xaming-t22-20-inch-768x510.jpg', 109),
(69, 'Xe Đạp Địa Hình Fascino FS126S 26 Inch', 2, 'Mô Tả Cơ Bản\r\nMã sản phẩm: FS126S\r\nThương Hiệu: Fascino\r\nSản xuất: Đài Loan\r\nKích thước: 26 inch\r\nMàu sắc: Đen Đỏ, Đen Xanh, Trắng Ghi, Xanh Đổi màu 71, Xanh Đổi màu 73\r\nPhân loại: Xe đạp địa hình', '2490000', '1', 'fascino-fs126s-26-inch-xanh-den-768x510.jpg', 100),
(70, 'Xe Đạp Địa Hình MTB Shukyo S650 24 Inch', 2, 'Mô Tả Cơ Bản\r\nMã sản phẩm: 24S650\r\nThương Hiệu: Shukyo\r\nKích thước: 24 Inch\r\nMàu sắc: Đen đỏ; Đen cam; Đen xanh; Đen lá\r\nPhân loại: Xe đạp địa hình ', '2490000', '1', 'xe-dap-dia-hinh-shukyo-s650-26-inch-1-1-768x510.jpg', 100),
(71, 'Xe Đạp Địa Hình MTB Shukyo S400 24 Inch – Khung Thép | Shimano | Phanh Đĩa', 2, 'Mã sản phẩm: 24s400\r\nThương hiệu: Shukyo\r\nMàu sắc: Đen đỏ; Đen xanh; Trắng đỏ; Trắng xanh; Xanh ngọc\r\nKích thước: 26 Inch\r\nPhân loại: Xe đạp địa hình ', '2550000', '1', 'xe-dap-dia-hinh-mtb-shukyo-s400-2-768x510.jpg', 99),
(72, 'Xe Đạp Địa Hình Fornix FX24 24 Inch', 2, 'Mã sản phẩm: FX24\r\nThương hiệu: Fornix\r\nKích thước: 24 inch\r\nNhập khẩu: Đài Loan\r\nMàu sắc: Đen đỏ, Đen lá, Đen xanh, Đen cam, Xanh cam, Đỏ Đen\r\nĐộ tuổi thích hợp: Trên 10 tuổi ', '3290000', '1', 'xe-dap-dia-hinh-fornix-fx24-24-inch-mau-trang-do-768x510.jpg', 100),
(73, 'Xe Đạp Địa Hình MTB Shukyo S200 26 Inch – Khung Thép | Shimano | Phanh Đĩa', 2, 'Mã sản phẩm: 26s200\r\nThương hiệu: Shukyo\r\nMàu sắc: Ghi vàng, Ghi cam, Đen đỏ, Đen xanh\r\nKích thước: 26 Inch\r\nPhân loại: Xe đạp địa hình ', '2790000', '1', 'xe-dap-dia-hinh-mtb-shukyo-s400-2-768x510.jpg', 99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `hoten`, `sdt`, `email`, `user_name`, `password`) VALUES
(1, 'Ai-chan', '0123456781', 'aotich@gmail.com', 'aotich', '$2y$10$khO8G2d3hS0EAj1SrBtHq.79XoFQTu2WtCSI.maDPVindAReYY9Uu'),
(12, 'admin', '0123456789', 'aotich3@gmail.com', 'admin', '$2y$10$cx3e1uUo/bakx.9tSxyjh.CKHiREAdZ.Kj5zDAURJIoX9RZNLAiyy'),
(13, 'admin', '0123456789', 'aotich1000@gmail.com', 'aotich1000', '$2y$10$5o.DSZuJVOMkZ0TvTsxcMu3J1vkn65jSyG40C0oQU0dLTM5JZMrWm'),
(14, 'abc', '0123456789', 'asd@d.com', 'admin2', '$2y$10$o6Cy3cSitXVtJR6mFJ35zOuWm8NEvPgKIiS7FhhrMkUq/6uBrIsC2'),
(15, 'Ai-chan', '0123456789', 'aotich2000@gmail.com', 'aotich1234', '$2y$10$rYz.W7R4xHH0dwv8fQTSS.gb3TD75tTW2S5JiskIqlE79SVPRPZta'),
(16, 'nguyễn văn a', '0123456789', 'aotich10@gmail.com', 'admin5', '$2y$10$rPjqCq0qKe1kQfUWlhx6le6xhtgCieV2vDM/hgP.s6JESNayk/Ciu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD KEY `abc` (`id_hoadon`);

--
-- Chỉ mục cho bảng `tbl_chitietphieunhap`
--
ALTER TABLE `tbl_chitietphieunhap`
  ADD PRIMARY KEY (`id_phieunhap`,`id_sanpham`),
  ADD KEY `nhaphang` (`id_phieunhap`),
  ADD KEY `sanphamnhap` (`id_sanpham`),
  ADD KEY `id_ncc` (`id_ncc`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `hoadon_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Chỉ mục cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id_permis`);

--
-- Chỉ mục cho bảng `tbl_phanloaisp`
--
ALTER TABLE `tbl_phanloaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  ADD PRIMARY KEY (`id_phieunhap`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `sdq` (`loaisp`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id_nhacungcap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id_permis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_phanloaisp`
--
ALTER TABLE `tbl_phanloaisp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  MODIFY `id_phieunhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `abc` FOREIGN KEY (`id_hoadon`) REFERENCES `tbl_hoadon` (`id_hoadon`);

--
-- Các ràng buộc cho bảng `tbl_chitietphieunhap`
--
ALTER TABLE `tbl_chitietphieunhap`
  ADD CONSTRAINT `id_ncc` FOREIGN KEY (`id_ncc`) REFERENCES `tbl_nhacungcap` (`id_nhacungcap`),
  ADD CONSTRAINT `nhaphang` FOREIGN KEY (`id_phieunhap`) REFERENCES `tbl_phieunhap` (`id_phieunhap`),
  ADD CONSTRAINT `sanphamnhap` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `hoadon_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `sdq` FOREIGN KEY (`loaisp`) REFERENCES `tbl_phanloaisp` (`id_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE DATABASE IF NOT EXISTS trasua CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE trasua;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tendangnhap VARCHAR(50),
    matkhau VARCHAR(100)
);

CREATE TABLE douong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tendouong VARCHAR(100),
    loai VARCHAR(50),
    gia INT,
    mota VARCHAR(255),
    conban INT DEFAULT 1
);

CREATE TABLE donhang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenkhach VARCHAR(100),
    sdt VARCHAR(20),
    diachi VARCHAR(255),
    ghichu VARCHAR(255),
    tongtien INT,
    trangthai VARCHAR(30),
    ngaydat DATETIME
);

CREATE TABLE chitiet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_donhang INT,
    tendouong VARCHAR(100),
    soluong INT,
    gia INT
);

INSERT INTO admin (tendangnhap, matkhau) VALUES ('admin', MD5('123456'));

INSERT INTO douong (tendouong, loai, gia, mota, conban) VALUES
('Trà sữa trân châu đường đen', 'Trà sữa', 35000, 'Trân châu nấu đường đen thơm ngọt', 1),
('Trà sữa matcha', 'Trà sữa', 40000, 'Matcha Nhật Bản béo nhẹ', 1),
('Trà sữa truyền thống', 'Trà sữa', 30000, 'Vị trà sữa quen thuộc', 1),
('Hồng trà macchiato', 'Trà sữa', 38000, 'Hồng trà phủ lớp kem cheese', 1),
('Trà đào cam sả', 'Trà trái cây', 38000, 'Đào miếng, cam tươi, sả thơm', 1),
('Trà vải', 'Trà trái cây', 35000, 'Trà xanh với vải thiều', 1),
('Trà chanh dây', 'Trà trái cây', 32000, 'Chua nhẹ, mát lạnh', 1),
('Cà phê sữa đá', 'Cà phê', 25000, 'Cà phê phin truyền thống', 1),
('Bạc xỉu', 'Cà phê', 28000, 'Nhiều sữa, ít cà phê', 1),
('Matcha đá xay', 'Đá xay', 45000, 'Matcha xay mịn mát lạnh', 1),
('Socola đá xay', 'Đá xay', 45000, 'Socola đậm vị', 1),
('Trà sữa khoai môn', 'Trà sữa', 38000, 'Khoai môn nghiền (tạm hết)', 0);

INSERT INTO donhang (id, tenkhach, sdt, diachi, ghichu, tongtien, trangthai, ngaydat) VALUES
(1, 'Nguyễn Văn An', '0901234567', '12 Nguyễn Trãi, Hà Nội', '', 95000, 'Hoàn thành', '2026-08-04 09:15:00'),
(2, 'Trần Thị Bình', '0912345678', '45 Lê Lợi, Hà Nội', 'Ít đá', 83000, 'Hoàn thành', '2026-08-12 14:30:00'),
(3, 'Lê Hoàng Cường', '0923456789', '8 Trần Phú, Hà Nội', '', 105000, 'Đã hủy', '2026-08-20 19:45:00'),
(4, 'Nguyễn Văn An', '0901234567', '12 Nguyễn Trãi, Hà Nội', '', 68000, 'Hoàn thành', '2026-09-02 10:00:00'),
(5, 'Hoàng Thu Hà', '0934567890', '3 Hai Bà Trưng, Hà Nội', 'Ít đường', 109000, 'Hoàn thành', '2026-09-09 16:20:00'),
(6, 'Vũ Đức Anh', '0945678901', '99 Kim Mã, Hà Nội', '', 120000, 'Hoàn thành', '2026-09-23 20:10:00'),
(7, 'Nguyễn Văn An', '0901234567', '12 Nguyễn Trãi, Hà Nội', '', 73000, 'Hoàn thành', '2026-10-06 11:05:00'),
(8, 'Đỗ Mai Lan', '0956789012', '27 Láng Hạ, Hà Nội', 'Giao giờ nghỉ trưa', 104000, 'Đang pha chế', '2026-10-13 15:40:00'),
(9, 'Bùi Quang Huy', '0967890123', '60 Cầu Giấy, Hà Nội', '', 65000, 'Chờ xác nhận', '2026-10-15 08:30:00');

INSERT INTO chitiet (id_donhang, tendouong, soluong, gia) VALUES
(1, 'Trà sữa trân châu đường đen', 2, 35000),
(1, 'Cà phê sữa đá', 1, 25000),
(2, 'Matcha đá xay', 1, 45000),
(2, 'Trà đào cam sả', 1, 38000),
(3, 'Trà vải', 3, 35000),
(4, 'Trà sữa matcha', 1, 40000),
(4, 'Bạc xỉu', 1, 28000),
(5, 'Trà chanh dây', 2, 32000),
(5, 'Socola đá xay', 1, 45000),
(6, 'Trà sữa truyền thống', 4, 30000),
(7, 'Trà sữa trân châu đường đen', 1, 35000),
(7, 'Hồng trà macchiato', 1, 38000),
(8, 'Trà đào cam sả', 2, 38000),
(8, 'Bạc xỉu', 1, 28000),
(9, 'Cà phê sữa đá', 1, 25000),
(9, 'Trà sữa matcha', 1, 40000);

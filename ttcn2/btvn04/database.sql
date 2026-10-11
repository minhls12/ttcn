CREATE DATABASE quanly_sanpham;
USE quanly_sanpham;

CREATE TABLE sanpham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tensp VARCHAR(100),
    gia INT,
    soluong INT,
    mota VARCHAR(255)
);

INSERT INTO sanpham (tensp, gia, soluong, mota) VALUES
('Laptop', 15000000, 10, 'Laptop van phong'),
('Chuot', 250000, 50, 'Chuot khong day'),
('Ban phim', 800000, 30, 'Ban phim red switch'),
('Man hinh', 3500000, 15, 'Man hinh full HD'),
('Tai nghe', 1200000, 20, 'Tai nghe chong on');
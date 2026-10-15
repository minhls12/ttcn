<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

if (isset($_POST['them'])) {
    $ten = $_POST['tendouong'];
    $loai = $_POST['loai'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $conban = $_POST['conban'];

    $sql = "INSERT INTO douong (tendouong, loai, gia, mota, conban)
            VALUES ('$ten', '$loai', '$gia', '$mota', '$conban')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Lỗi rồi: " . mysqli_error($conn);
    }
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Them mon</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Thêm món</h2>
<form method="post" action="">
    Tên: <input type="text" name="tendouong"><br><br>
    Loại: <input type="text" name="loai"><br><br>
    Giá: <input type="text" name="gia"><br><br>
    Mô tả: <input type="text" name="mota"><br><br>
    Còn bán (1 = còn, 0 = hết): <input type="text" name="conban" value="1"><br><br>
    <input type="submit" name="them" value="Thêm">
    <a href="index.php">Quay lại</a>
</form>
</body>
</html>

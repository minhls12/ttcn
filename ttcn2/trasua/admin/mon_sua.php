<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$id = $_GET['id'];

$kq = mysqli_query($conn, "SELECT * FROM douong WHERE id = $id");
$row = mysqli_fetch_array($kq);

if (isset($_POST['sua'])) {
    $ten = $_POST['tendouong'];
    $loai = $_POST['loai'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $conban = $_POST['conban'];

    $sql = "UPDATE douong SET tendouong = '$ten', loai = '$loai', gia = '$gia', mota = '$mota', conban = '$conban' WHERE id = $id";

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
<title>Sua mon</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Sửa món</h2>
<form method="post" action="">
    Tên: <input type="text" name="tendouong" value="<?php echo $row['tendouong']; ?>"><br><br>
    Loại: <input type="text" name="loai" value="<?php echo $row['loai']; ?>"><br><br>
    Giá: <input type="text" name="gia" value="<?php echo $row['gia']; ?>"><br><br>
    Mô tả: <input type="text" name="mota" value="<?php echo $row['mota']; ?>"><br><br>
    Còn bán (1 = còn, 0 = hết): <input type="text" name="conban" value="<?php echo $row['conban']; ?>"><br><br>
    <input type="submit" name="sua" value="Cập nhật">
    <a href="index.php">Quay lại</a>
</form>
</body>
</html>

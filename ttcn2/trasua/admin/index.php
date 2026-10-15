<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$kq = mysqli_query($conn, "SELECT * FROM douong");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Quan ly mon</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Danh sách món</h2>
<a href="mon_them.php">Thêm món mới</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Loại</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Còn bán</th>
        <th>Hành động</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($kq)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['tendouong'] . "</td>";
        echo "<td>" . $row['loai'] . "</td>";
        echo "<td>" . $row['gia'] . "</td>";
        echo "<td>" . $row['mota'] . "</td>";
        echo "<td>" . $row['conban'] . "</td>";
        echo "<td><a href='mon_sua.php?id=" . $row['id'] . "'>Sửa</a> | <a href='mon_xoa.php?id=" . $row['id'] . "'>Xóa</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

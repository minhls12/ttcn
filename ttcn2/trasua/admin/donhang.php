<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$kq = mysqli_query($conn, "SELECT * FROM donhang ORDER BY id DESC");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Don hang</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Lịch sử đơn hàng</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Mã đơn</th>
        <th>Ngày đặt</th>
        <th>Khách</th>
        <th>SĐT</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th></th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($kq)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['ngaydat'] . "</td>";
        echo "<td>" . $row['tenkhach'] . "</td>";
        echo "<td>" . $row['sdt'] . "</td>";
        echo "<td>" . $row['tongtien'] . "</td>";
        echo "<td>" . $row['trangthai'] . "</td>";
        echo "<td><a href='donhang_chitiet.php?id=" . $row['id'] . "'>Xem</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

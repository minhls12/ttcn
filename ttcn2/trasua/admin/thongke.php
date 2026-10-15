<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$loai = "thang";
if (isset($_GET['loai'])) {
    $loai = $_GET['loai'];
}

if ($loai == "thang") {
    $sql = "SELECT MONTH(ngaydat) AS ky, COUNT(*) AS sodon, SUM(tongtien) AS tong
            FROM donhang WHERE trangthai != 'Đã hủy' GROUP BY MONTH(ngaydat) ORDER BY ky";
} else {
    $sql = "SELECT WEEK(ngaydat) AS ky, COUNT(*) AS sodon, SUM(tongtien) AS tong
            FROM donhang WHERE trangthai != 'Đã hủy' GROUP BY WEEK(ngaydat) ORDER BY ky";
}
$kq = mysqli_query($conn, $sql);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Thong ke</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Thống kê đơn hàng</h2>
<a href="thongke.php?loai=thang">Theo tháng</a> |
<a href="thongke.php?loai=tuan">Theo tuần</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th><?php echo $loai == "thang" ? "Tháng" : "Tuần"; ?></th>
        <th>Số đơn</th>
        <th>Doanh thu</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($kq)) {
        echo "<tr>";
        echo "<td>" . $row['ky'] . "</td>";
        echo "<td>" . $row['sodon'] . "</td>";
        echo "<td>" . $row['tong'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

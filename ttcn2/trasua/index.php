<?php
include "ketnoi.php";

$tukhoa = "";
if (isset($_GET['tukhoa'])) {
    $tukhoa = $_GET['tukhoa'];
}

$sql = "SELECT * FROM douong WHERE conban = 1 AND tendouong LIKE '%$tukhoa%'";
$kq = mysqli_query($conn, $sql);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Tiem tra sua May</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>TIỆM TRÀ SỮA MÂY</h1>
<a href="index.php">Thực đơn</a> |
<a href="datmon.php">Đặt đồ uống</a> |
<a href="tracuu.php">Tra cứu đơn hàng</a> |
<a href="admin/dangnhap.php">Quản trị</a>
<hr>

<h2>Thực đơn</h2>
<form method="get" action="">
    Tìm món: <input type="text" name="tukhoa">
    <input type="submit" value="Tìm">
</form>
<br>

<table border="1" cellpadding="10">
    <tr>
        <th>Tên</th>
        <th>Loại</th>
        <th>Mô tả</th>
        <th>Giá</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($kq)) {
        echo "<tr>";
        echo "<td>" . $row['tendouong'] . "</td>";
        echo "<td>" . $row['loai'] . "</td>";
        echo "<td>" . $row['mota'] . "</td>";
        echo "<td>" . $row['gia'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

<?php
include "ketnoi.php";
?>
<html>
<head>
<meta charset="UTF-8">
<title>Tra cuu don hang</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>TIỆM TRÀ SỮA MÂY</h1>
<a href="index.php">Thực đơn</a> |
<a href="datmon.php">Đặt đồ uống</a> |
<a href="tracuu.php">Tra cứu đơn hàng</a> |
<a href="admin/dangnhap.php">Quản trị</a>
<hr>

<h2>Tra cứu đơn hàng</h2>
<form method="post" action="">
    Nhập SĐT: <input type="text" name="sdt">
    <input type="submit" name="tim" value="Tra cứu">
</form>

<?php
if (isset($_POST['tim'])) {
    $sdt = $_POST['sdt'];
    $kq = mysqli_query($conn, "SELECT * FROM donhang WHERE sdt = '$sdt'");

    while ($row = mysqli_fetch_array($kq)) {
        echo "<hr>";
        echo "Mã đơn: " . $row['id'] . "<br>";
        echo "Ngày đặt: " . $row['ngaydat'] . "<br>";
        echo "Tên: " . $row['tenkhach'] . "<br>";
        echo "Trạng thái: " . $row['trangthai'] . "<br>";

        $kq2 = mysqli_query($conn, "SELECT * FROM chitiet WHERE id_donhang = " . $row['id']);
        while ($ct = mysqli_fetch_array($kq2)) {
            echo "- " . $ct['tendouong'] . " x " . $ct['soluong'] . "<br>";
        }
        echo "Tổng tiền: " . $row['tongtien'] . "<br>";
    }
}
?>
</body>
</html>

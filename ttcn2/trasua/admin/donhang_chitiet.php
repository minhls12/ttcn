<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$id = $_GET['id'];

if (isset($_POST['capnhat'])) {
    $tt = $_POST['trangthai'];
    mysqli_query($conn, "UPDATE donhang SET trangthai = '$tt' WHERE id = $id");
}

$kq = mysqli_query($conn, "SELECT * FROM donhang WHERE id = $id");
$row = mysqli_fetch_array($kq);

$kq2 = mysqli_query($conn, "SELECT * FROM chitiet WHERE id_donhang = $id");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Chi tiet don hang</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>QUẢN TRỊ</h1>
<a href="index.php">Quản lý món</a> |
<a href="donhang.php">Đơn hàng</a> |
<a href="thongke.php">Thống kê</a> |
<a href="dangxuat.php">Đăng xuất</a>
<hr>

<h2>Đơn hàng số <?php echo $row['id']; ?></h2>
Khách: <?php echo $row['tenkhach']; ?><br>
SĐT: <?php echo $row['sdt']; ?><br>
Địa chỉ: <?php echo $row['diachi']; ?><br>
Ghi chú: <?php echo $row['ghichu']; ?><br>
Ngày đặt: <?php echo $row['ngaydat']; ?><br>
Trạng thái hiện tại: <b><?php echo $row['trangthai']; ?></b><br>
<br>

<?php
while ($ct = mysqli_fetch_array($kq2)) {
    echo "- " . $ct['tendouong'] . " x " . $ct['soluong'] . " (" . $ct['gia'] . ")<br>";
}
?>
<br>
Tổng tiền: <?php echo $row['tongtien']; ?>
<br><br>

<form method="post" action="">
    Đổi trạng thái:
    <select name="trangthai">
        <option>Chờ xác nhận</option>
        <option>Đang pha chế</option>
        <option>Hoàn thành</option>
        <option>Đã hủy</option>
    </select>
    <input type="submit" name="capnhat" value="Cập nhật">
</form>
<br>
<a href="donhang.php">Quay lại</a>
</body>
</html>

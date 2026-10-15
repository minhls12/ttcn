<?php
include "ketnoi.php";

$thongbao = "";

if (isset($_POST['dat'])) {
    $ten = $_POST['tenkhach'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ghichu = $_POST['ghichu'];
    $sl = $_POST['soluong'];
    
    $tong = 0;
    foreach ($sl as $id => $so) {
        if ($so > 0) {
            $kq2 = mysqli_query($conn, "SELECT * FROM douong WHERE id = $id");
            $r = mysqli_fetch_array($kq2);
            $tong = $tong + $r['gia'] * $so;
        }
    }

    if ($tong == 0) {
        $thongbao = "Chưa chọn món nào!";
    } else {
        $sql = "INSERT INTO donhang (tenkhach, sdt, diachi, ghichu, tongtien, trangthai, ngaydat)
                VALUES ('$ten', '$sdt', '$diachi', '$ghichu', $tong, 'Chờ xác nhận', NOW())";
        mysqli_query($conn, $sql);
        
        $kq3 = mysqli_query($conn, "SELECT MAX(id) FROM donhang");
        $r3 = mysqli_fetch_array($kq3);
        $madon = $r3[0];

        foreach ($sl as $id => $so) {
            if ($so > 0) {
                $kq4 = mysqli_query($conn, "SELECT * FROM douong WHERE id = $id");
                $r4 = mysqli_fetch_array($kq4);
                mysqli_query($conn, "INSERT INTO chitiet (id_donhang, tendouong, soluong, gia)
                                     VALUES ($madon, '" . $r4['tendouong'] . "', $so, " . $r4['gia'] . ")");
            }
        }
        $thongbao = "Đặt hàng thành công! Mã đơn của bạn là " . $madon;
    }
}

$kq = mysqli_query($conn, "SELECT * FROM douong WHERE conban = 1");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Dat do uong</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>TIỆM TRÀ SỮA MÂY</h1>
<a href="index.php">Thực đơn</a> |
<a href="datmon.php">Đặt đồ uống</a> |
<a href="tracuu.php">Tra cứu đơn hàng</a> |
<a href="admin/dangnhap.php">Quản trị</a>
<hr>

<h2>Đặt đồ uống</h2>
<font color="red"><?php echo $thongbao; ?></font>

<form method="post" action="">
    <table border="1" cellpadding="10">
        <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($kq)) {
            echo "<tr>";
            echo "<td>" . $row['tendouong'] . "</td>";
            echo "<td>" . $row['gia'] . "</td>";
            echo "<td><input type='text' name='soluong[" . $row['id'] . "]' value='0' size='3'></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    Họ tên: <input type="text" name="tenkhach"><br><br>
    SĐT: <input type="text" name="sdt"><br><br>
    Địa chỉ: <input type="text" name="diachi"><br><br>
    Ghi chú: <input type="text" name="ghichu"><br><br>
    <input type="submit" name="dat" value="Đặt hàng">
</form>
</body>
</html>

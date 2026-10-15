<?php
session_start();
include "../ketnoi.php";

if (isset($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $kq = mysqli_query($conn, "SELECT * FROM admin WHERE tendangnhap = '$user' AND matkhau = '$pass'");

    if (mysqli_num_rows($kq) > 0) {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
    } else {
        echo "<font color='red'>Sai tài khoản hoặc mật khẩu!</font>";
    }
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Dang nhap</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>ĐĂNG NHẬP QUẢN TRỊ</h2>
<form method="post" action="">
    Tài khoản: <input type="text" name="user"><br><br>
    Mật khẩu: <input type="password" name="pass"><br><br>
    <input type="submit" name="dangnhap" value="Đăng nhập">
</form>
<br>
<a href="../index.php">Về trang khách</a>
</body>
</html>

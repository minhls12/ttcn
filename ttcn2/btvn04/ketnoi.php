<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_sanpham");

if (!$conn) {
    die("Ket noi that bai: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
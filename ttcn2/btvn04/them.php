<?php
include "ketnoi.php";

if (isset($_POST['them'])) {
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];

    $sql = "INSERT INTO sanpham (tensp, gia, soluong, mota)
            VALUES ('$tensp', '$gia', '$soluong', '$mota')";

    if (mysqli_query($conn, $sql)) {
        echo "Them thanh cong!";
        header("Location: index.php");
    } else {
        echo "Loi roi: " . mysqli_error($conn);
    }
}
?>
<html>
<head>
    <title>Them san pham</title>
</head>
<body>
    <h1>THEM SAN PHAM</h1>
    <form method="post" action="">
        Ten san pham: <input type="text" name="tensp"><br><br>
        Gia: <input type="text" name="gia"><br><br>
        So luong: <input type="text" name="soluong"><br><br>
        Mo ta: <input type="text" name="mota"><br><br>
        <input type="submit" name="them" value="Them">
        <a href="index.php">Quay lai</a>
    </form>
</body>
</html>
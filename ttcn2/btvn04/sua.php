<?php
include "ketnoi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM sanpham WHERE id = $id";
$kq = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($kq);

if (isset($_POST['sua'])) {
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];

    $sql2 = "UPDATE sanpham SET
                tensp = '$tensp',
                gia = '$gia',
                soluong = '$soluong',
                mota = '$mota'
             WHERE id = $id";

    if (mysqli_query($conn, $sql2)) {
        header("Location: index.php");
    } else {
        echo "Loi roi: " . mysqli_error($conn);
    }
}
?>
<html>
<head>
    <title>Sua san pham</title>
</head>
<body>
    <h1>SUA SAN PHAM</h1>
    <form method="post" action="">
        Ten san pham: <input type="text" name="tensp" value="<?php echo $row['tensp']; ?>"><br><br>
        Gia: <input type="text" name="gia" value="<?php echo $row['gia']; ?>"><br><br>
        So luong: <input type="text" name="soluong" value="<?php echo $row['soluong']; ?>"><br><br>
        Mo ta: <input type="text" name="mota" value="<?php echo $row['mota']; ?>"><br><br>
        <input type="submit" name="sua" value="Cap nhat">
        <a href="index.php">Quay lai</a>
    </form>
</body>
</html>
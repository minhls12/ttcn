<?php
include "ketnoi.php";

$sql = "SELECT * FROM sanpham";
$kq = mysqli_query($conn, $sql);
?>
<html>
<head>
    <title>Quan ly san pham</title>
</head>
<body>
    <h1>DANH SACH SAN PHAM</h1>
    <a href="them.php">Them san pham moi</a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Ten san pham</th>
            <th>Gia</th>
            <th>So luong</th>
            <th>Mo ta</th>
            <th>Hanh dong</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($kq)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['tensp'] . "</td>";
            echo "<td>" . $row['gia'] . "</td>";
            echo "<td>" . $row['soluong'] . "</td>";
            echo "<td>" . $row['mota'] . "</td>";
            echo "<td>
                    <a href='sua.php?id=" . $row['id'] . "'>Sua</a> |
                    <a href='xoa.php?id=" . $row['id'] . "'>Xoa</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
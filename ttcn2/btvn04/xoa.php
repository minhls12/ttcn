<?php
include "ketnoi.php";

$id = $_GET['id'];

$sql = "DELETE FROM sanpham WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: index.php");
?>
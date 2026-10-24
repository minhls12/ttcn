<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: dangnhap.php");
    exit();
}
include "../ketnoi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM douong WHERE id = $id");
header("Location: index.php");
?>

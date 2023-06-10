<?php
session_start();
include('../../../database/config.php');
$id_cart = $_GET['id'];
$sql = "delete from giohang where id = '$id_cart'";
$result = mysqli_query($connect, $sql) or die("loi try van");

//XÓA SẢN PHẨM

header('Location:../../../index.php?quanly=giohang');
?>

<!-- dfd -->
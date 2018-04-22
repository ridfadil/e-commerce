<?php
include "database.php";
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE id=$id");
header("Location:lihat_produk_admin.php");
?>
<?php
include "database.php";
$id = $_GET['id'];
$result = mysqli_query($mysqli,"DELETE FROM user WHERE id='$id'");
header("Location:data_user_admin.php");
?>
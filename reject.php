<?php
include('DBconn.php');

$user_id = $_GET['user_id'];

$sql = "DELETE FROM `register` WHERE `user_id` = $user_id";
$result=$conn->query($sql);

$sql1 = "DELETE FROM `login` WHERE `user_id` = $user_id";
$result=$conn->query($sql1);

header("Location:admin_panel.php");
?>

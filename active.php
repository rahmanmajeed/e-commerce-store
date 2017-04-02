<?php
include('DBconn.php');

$user_id = $_GET['user_id'];
$sql1 = "UPDATE `login` SET access_level='1' WHERE `user_id` = $user_id";
$result=$conn->query($sql1);

header("Location:admin_panel.php");
?>


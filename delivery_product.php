<?php

include('DBconn.php');
  $p_id = $_GET['id'];
//$sql = "DELETE FROM `ecommerce`.`cartlist` WHERE `cartlist`.`product_id` = '$p_id'";
$sql = "UPDATE `ecommerce`.`order_list` SET `delivery` = '1' WHERE `order_list`.`order_id` = '$p_id';";
$result=$conn->query($sql);

//$sql1 = "DELETE FROM `login` WHERE `user_id` = $user_id";
//$result=$conn->query($sql1);

header("Location:order_list.php");






?>
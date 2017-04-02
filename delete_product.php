<?php
  include('DBconn.php');
  $p_id = $_GET['prdct_id'];
$sql = "DELETE FROM `ecommerce`.`product` WHERE `product`.`product_id` = '$p_id'";
$result=$conn->query($sql);

//$sql1 = "DELETE FROM `login` WHERE `user_id` = $user_id";
//$result=$conn->query($sql1);

header("Location:admin_panel.php");



?>
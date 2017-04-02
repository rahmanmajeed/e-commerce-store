<?php
  include('DBconn.php');
  $p_id = $_GET['id'];
$sql = "delete from cartlist where product_id='$p_id'";
//$result=$conn->query($sql);

//$sql1 = "DELETE FROM `login` WHERE `user_id` = $user_id";
//$result=$conn->query($sql1);
if(mysqli_query($conn,$sql))
{
	header("Location:user_account.php");
}
else
{
	echo"Query Problem...";
}

?>
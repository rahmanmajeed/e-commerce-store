<?php
include('DBconn.php');
session_start();
require 'Super_Admin.php';
$obj_sup = new Super_Admin();
if (isset($_GET['status'])) {
    if (isset($_GET['logout']) == 'true') {
        $obj_sup->logout();
    }
}
$user_id = $_SESSION['user_id'];
if ($user_id == NULL) {
    header('Location: login.php');
}
$result = $obj_sup->select_user_by_email_address($_SESSION['user_id']);
$client_info = mysql_fetch_assoc($result);
$u_id = $client_info['user_id'];
?>

<html>
<head>
<title>User Panel</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link rel="stylesheet" href="css/user_backend.css" type="text/css" />
<style>
a[name="panel"]:hover {
	background-color: #666;
	cursor: default;
}
</style>
</head>
<body>


<div id="main">
<ul>
  <li><a href="?status=logout&logout=true" > Sign Out</a></li> 
  <li ><?php echo "<a href=\"update_user.php?id=$client_info[user_id]\">Update Profile</a>"?></li>     
  <li style="float:left" ><a href="#" class="active" name="panel" ><?php echo "Welcome: ". $client_info['fname']." ".$client_info['lname'];?></a></li> 
  <li><a href="after_login.php">Shopping</a></li> 
  <li><a href="cart.php" >My Cart</a></li> 
</ul>
<hr>

  <div id="sd1">
  <table class="sidtxt">
  <tr><td width="186" style="font-size:16px" ><p><b style="color:#c8e6c9">Hi,<br><?php echo $client_info['fname']?> Have a Good Day </b></p></td></tr>
  <tr><td><?php echo "<b style='color:#3e2723'>Contact</b><br>"."Email: ".$client_info['email_address']."<br>"."Cell: ".$client_info['phone'];?></td></tr>
  <tr><td><?php echo "Today is ". date("l")."<br>".date("d F Y")?></td></tr>
  </table>
<?php 
$result = mysql_query("SELECT SUM(price) AS TotalItemsOrdered FROM order_list where user_id='$u_id'"); 
$row = mysql_fetch_assoc($result); 
echo "<p style='color:#3e2723'>Total Purchase</p>"."<p style='font-size:25px'>".$sum = $row['TotalItemsOrdered']." Tk. </p>";
?>


  </div>
  
<div id="content" align="center">
<table width="1397" class="product-table">
<!--<caption>Purchase Record</caption>-->
<tr bgcolor="#8d6e63 " style="color:#FFF">
<td ><b>Purchased Product</b></td>
<td ><b>Product ID</b></td>
<td ><b>Price</b></td>
<td ><b>Order Date</b></td>
<td ><b>Order ID</b></td>
</tr>
<?php 
$select = "SELECT * FROM `order_list` WHERE `user_id`='$u_id'";
$result=$conn->query($select);
while($row = $result->fetch_assoc()){  
?>
<tr>
<td><?php echo "<a href=\"view_details_after_log.php?id=$row[product_id]\">".$row['product_title']."</a>" ?></td>
<td>	<?php echo $row['product_id'] ?>			</td>
<td>	<?php echo $row['price']." BDT" ?>					</td>
<td>	<?php echo $row['date'] ?>					</td>
<td>	<?php echo $row['order_id'] ?>				</td>
</tr>
<?php }?>
</table>








</div>

</div>



</body>
</html>

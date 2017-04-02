<?php
include('DBconn.php');
 $p_id=$_GET['id'];
 //echo $p_id;
 /*$psql="select * from product where product_id='$p_id'";
 $pres=$conn->query($psql);
 while($prow=$pres->fetch_assoc()){
	 $ptitle=$prow['title'];
	 $price=$prow['price'];
 }*/


?>


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
//$p_id=$_GET['id'];
//echo $p_id;
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
   <li style="float:left" ><a href="user_account.php" name="panel" style="color:#090"><b><?php echo $client_info['fname']." ".$client_info['lname'];?></b></a></li> 
  <li><a href="after_login.php">Shopping</a></li>  
  <li><a href="cart.php" class="active">My Cart</a></li>
</ul>
<div>
<hr>
<table width="1397" class="product-table">
<!--<caption>Purchase Record</caption>-->
<tr bgcolor="#8d6e63 " style="color:#FFF">
<td ><b>Product Name</b></td>
<td ><b>Product ID</b></td>
<td ><b>Price</b></td>
<td colspan=2 align="center"><b>Action</b></td>

</tr>
<?php 
//$select = "SELECT * FROM `cartlist` WHERE `user_id`='$u_id'";
//$select.="select * from product where product_id='$p_id'";
$select="select cartlist.product_id,cartlist.cart_id,product.product_id,product.title,product.price from cartlist inner join product on cartlist.product_id=product.product_id where cartlist.user_id='$u_id' and cartlist.Buyout=0";
	$result=$conn->query($select);
//$result1=$conn->query($select1);
while($row = $result->fetch_assoc()){  
$caid=$row['cart_id'];

?>
<tr>
<td><?php echo $row['title'];?></td>
<td>	<?php echo $row['product_id'] ?>			</td>
<td>	<?php echo $row['price']." BDT" ;?>					</td>
<?php echo "<td align='center' bgcolor='#efebe9 '> <a style='text-decoration:none' href=\"buy.php?id=$row[product_id]&cid=$caid\">Buy</a></td>"	?>		
<?php echo "<td align='center' bgcolor='#efebe9 '> <a style='text-decoration:none' href=\"delete_cart.php?id=$row[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
</td>" ?>

</tr>
<?php }?>

</table>
</body>
</html>
<?php 
//$user_id= '1' ;
include('DBconn.php');


if (isset($_POST['buy']) || isset($_POST['add_to_cart']) )
 {
	session_start();
	require 'Super_Admin.php';
	$obj_sup = new Super_Admin();
	if (isset($_GET['status'])) {
		if (isset($_GET['logout']) == 'true') {
			$obj_sup->logout();
		}
	}	
	$user_id = $_SESSION['user_id'];
	if ($user_id == NULL) 
	{
		header('Location: login.php');
	}
	else
	{		
		header('Location: buy.php');		
	}
	$result = $obj_sup->select_user_by_email_address($_SESSION['user_id']);
	$client_info = mysql_fetch_assoc($result);
	
	
}

?>


<!DOCTYPE html>
<html>
<head>
<title>view all</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link href="css/view_product.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#fafafa">


<ul>
  <li ><a href="login.php">Sign IN</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li style="float:left"><a href="index.php">Home</a></li>
  
   <li class="dropdown" style="float:left">
    <a href="#" class="dropbtn"  >Categories</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"categories.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"categories.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"categories.php?id=3\">Accessories</a>"?>
    
	</div>
   </li>      
</ul>
<center>
<table width="90%" class="cat-table" >
<tr bgcolor="#8d6e63" class="cat-table"><td width="12%" style="color:#FFF"><b>Brand</b></td><td width="31%" style="color:#FFF" ><b>Model</b></td><td width="19%" align="center" style="color:#FFF"><b>Image</b></td><td width="25%" style="color:#FFF"><b>Despcription</b></td><td width="13%"  style="color:#FFF"><b>Price</b></td></tr>
<?php
include('DBconn.php');
  $cid=$_GET['id'];
  //echo $cid;
  $sql="select * from product where category_id='$cid' ORDER BY ID DESC";
  $result=$conn->query($sql);
  while($row=$result->fetch_assoc()){
	  ?>
<tr class="exept-table" >
<td>	<?php echo $row['Brand'] ?>	</td>
<td>	<?php echo "<a href=\"view_details.php?id=$row[product_id]\">".$row['title']."</a>" ?> 
<br><br>
<form action="#" method="post" name="myform">
<input type="submit" name="add_to_cart" value="Add Cart">
<input type="submit" name="buy" value="Buy" >
</form>
</td>
<td align="center">	<img src="product_image/<?php echo $row['image'] ?>" alt="imaage" width="100" height="100" > 
</td>
<td>	<?php echo $row['desp'] ?>	</td>
<td style='color:#33691e'>	<?php echo $row['price'].""."<b> Tk.</b>" ?>	</td>

</tr>
 <?php }?>

</table>

</center>
</body>
</html>
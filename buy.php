
<?php
include('DBconn.php');
$pid=$_GET['id'];
$cid=$_GET['cid'];
echo $cid;
$sql="SELECT * FROM `product` WHERE `product_id`='$pid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$title=$row['title'];
	$image=$row['image'];
	$prid=$row['product_id'];
	$wrn=$row['warrenty'];
	$des=$row['desp'];
	$os=$row['OS'];
	$strge=$row['Storage'];
	$pros=$row['Processor'];
	$brand=$row['Brand'];
	$model=$row['Model'];
	$csped=$row['clcksped'];
	$disp=$row['Display'];
	$ram=$row['Ram'];
	$price=$row['price'];
	$long_des=$row['londesp'];
}

?>
<?php 
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
		header('Location: test.php');		
	}
	$result = $obj_sup->select_user_by_email_address($_SESSION['user_id']);
	$client_info = mysql_fetch_assoc($result);
}

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

?>

<!DOCTYPE html>
<head>
<title><?php echo $client_info['fname']." ".$client_info['lname'];?></title>
<link href="css/view_product.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body bgcolor="#fafafa">


<ul>
  <li ><a href="?status=logout&logout=true" > Sign Out</a></li> 
  <li style="float:left" ><a href="user_account.php" name="panel" style="color:#090"><b><?php echo $client_info['fname']." ".$client_info['lname'];?></b></a></li> 
  <li><a href="#about">About</a></li>
  <li class="active"><a href="after_login.php">Shopping</a></li> 
   <li class="dropdown" style="float:left">
    <a href="#" class="dropbtn" >Categories</a>
    <div class="dropdown-content">
      <a href="#">Desktop & Laptop</a>
      <a href="#">Mobile & Tab</a>
      <a href="#">Accessories</a>
	</div>
   </li>      
</ul>


<div class="container prod">
<H3><?php echo $title ?> </H3>

<div class="row">
    <div class="col-50">
    	<table width="100%" class="product-table">
          <tr>
            <td width="30%" bgcolor="#efebe9">Product Id</td>
            <td width="70%"><?php echo $prid;?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Band</td>
            <td width="70%"><?php echo $brand?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Model</td>
            <td width="70%"><?php echo $model?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Processor</td>
            <td width="70%"><?php echo $pros ?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Clock Speed</td>
            <td width="70%"><?php echo $csped?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Display</td>
            <td width="70%"><?php echo $disp?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">RAM</td>
            <td width="70%"><?php echo $ram ?></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#efebe9">Storage</td>
            <td width="70%"><?php echo $strge?></td>
          </tr><tr>
            <td width="30%" bgcolor="#efebe9">Operating System</td>
            <td width="70%"><?php echo $os?></td>
          </tr><tr>
            <td width="30%" bgcolor="#efebe9">Warrenty</td>
            <td width="70%"><?php echo $wrn." Year"?></td>
          </tr>
          </tr><tr>
            <td width="30%" bgcolor="#efebe9">Long Description</td>
            <td width="70%"><?php echo $long_des?></td>
          </tr>        
        </table>

        </div>
         <div class="col-50" align="center"><br><br>
         <img src="product_image/<?php echo $image ?>" alt="image" height="50%" width="50%">
         <br><br><b style="color:#300"><?php echo "Price: ". $price." Tk.";?></b>
         <form action="#" method="post"><br>
         <input type="submit" name="order" value="Confirm Order"><br>
         
         <input type="text" name="user_id" value="<?php echo $client_info['user_id'] ?>" style="visibility:hidden">
         <input type="text" name="customer_name" value="<?php echo $client_info['fname']." ".$client_info['lname'];?>" style="visibility:hidden">
         <input type="text" name="email_address" value="<?php echo $client_info['email_address'] ?>" style="visibility:hidden">
         <input type="text" name="product_title" value="<?php echo $title ?> " style="visibility:hidden">
         <input type="text" name="product_id" value="<?php echo $prid;?> " style="visibility:hidden">
         <input type="text" name="price" value="<?php echo $price ?>" style="visibility:hidden">
         <input type="text" name="date" value="<?php echo date("d F Y")?>" style="visibility:hidden">
         </form>
         
        </div>
        
</div>





</body>
</html>

<?php

if(isset($_POST['order']))
{	
$user_id = $_POST['user_id'];
$user_name = $_POST['customer_name'];
$email_address = $_POST['email_address'];
$product_title = $_POST['product_title'];
$product_id = $_POST['product_id'];
$price = $_POST['price'];
$date = $_POST['date'];

$sql = "INSERT INTO `order_list`(`user_id`, `customer_name`, `email_address`, `product_title`, `product_id`, `price`, `date`) VALUES ('$user_id','$user_name','$email_address','$product_title','$product_id','$price','$date')";
$sql1 = "UPDATE `ecommerce`.`cartlist` SET `Buyout` = '1' WHERE `cartlist`.`cart_id` = '$cid';";
 /*if ($conn->query($sql) === TRUE) {
	echo '<script language="javascript">';
	echo 'alert("Order successfully Done")';
	echo '</script>';
	exit;
	//header('location: recipt.php');
    } */
	if(mysqli_query($conn,$sql)){
		mysqli_query($conn,$sql1);
		echo '<script language="javascript">';
	echo 'alert("Order successfully Done")';
	echo '</script>';
	header('location: user_account.php');
		
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



}


?>
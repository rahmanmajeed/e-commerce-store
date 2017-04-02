<?php 
//$user_id= '1' ;
include('DBconn.php');

/*----------------------- buy ---------------------*/
if (isset($_POST['buy']))
 {
	$p_id = $_POST['product_id'];
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
		header("Location: buy.php?id=".$p_id);		
	}
	$result = $obj_sup->select_user_by_email_address($_SESSION['user_id']);
	$client_info = mysql_fetch_assoc($result);
}
/*----------------------- add cart---------------------*/

if (isset($_POST['add_to_cart']))
 {
	$p_id = $_POST['product_id'];
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
		$u_id = $_POST['u_id'];
		$p_id = $_POST['product_id'];		
		$sql = "INSERT INTO `cartlist`(`user_id`,`product_id`)  VALUES ('$u_id','$p_id')";
		
		if ($conn->query($sql) === TRUE) 
		{
			header('Location: after_login.php');	
		} 
		
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
		$conn->close();				
	}
	
	$result = $obj_sup->select_user_by_email_address($_SESSION['user_id']);
	$client_info = mysql_fetch_assoc($result);
}

/*---------------------------------------------------*/
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
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
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
      <?php echo "<a href=\"loggedcategories.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"loggedcategories.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"loggedcategories.php?id=3\">Accessories</a>"?>
	</div>
   </li>      
</ul>

<div>
<div>
<img src="images/e-commerce-banner.jpg" width="1349" height="382" alt="imaage" >
<marquee class="ban"><p>Customer support and satisfaction is our main strength. We are working really hard every moment to make your online shopping Secure & delightful.  |   Hotline: 01735108437</p></marquee>
</div>

<div class="body"  >
<!--------------- 	1st Panel 	--------------->

<div class="container prod">
	<H3>DESKTOP | LAPTOP</H3>
    <div class="row">

<?php 
$select = "SELECT * FROM `product` WHERE `category_id` = '1' ORDER BY ID DESC LIMIT 5";
$result=$conn->query($select);
while($row = $result->fetch_assoc()){  
?>
    	
        <div class="col-20" align="center" >
       		<form action="#" method="POST" name="myform">			
                <img src="product_image/<?php echo $row['image'] ?>" alt="imaage" height="50%" width="50%"  >
                <a <?php echo" href='view_details_after_log.php?id=$row[product_id]' "?> target="_blank" class="p pp">
                <h4 style="color:#069"><?php echo $row['title'] ?></h4>
                <p><?php echo $row['desp'] ?></p>
                <p style="color:#3e2723"><b><?php echo "TK. ".$row['price'] ?></b></p>
                </a>
                <div>
                <input type="submit" name="add_to_cart" value="Add to Cart" onclick="alert('Added successfully')">
                <input type="submit" name="buy" value="Buy">
                <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" style="visibility:hidden" >
                <input type="text" name="u_id" value="<?php echo $client_info['user_id']; ?>" style="visibility:hidden" >
                </div>
                
			</form>                         			
        </div>
        
<?php }?>
       
    </div>
</div>



<!--------------- 	2nd Panel 	--------------->

<div class="container prod">
	<H3>SMART PHONE | TAB</H3>
    <div class="row">

<?php 
$select = "SELECT * FROM `product` WHERE `category_id` = '2' ORDER BY ID DESC LIMIT 5";
$result=$conn->query($select);
while($row = $result->fetch_assoc()){  
?>
    	
<div class="col-20" align="center" >
       		<form action="#" method="POST" name="myform">			
                <img src="product_image/<?php echo $row['image'] ?>" alt="imaage" height="50%" width="50%"  >
                <a <?php echo" href='view_details_after_log.php?id=$row[product_id]' "?> target="_blank" class="p pp">
                <h4 style="color:#069"><?php echo $row['title'] ?></h4>
                <p><?php echo $row['desp'] ?></p>
                <p style="color:#3e2723"><b><?php echo "TK. ".$row['price'] ?></b></p>
                </a>
                <div>
                <input type="submit" name="add_to_cart" value="Add to Cart" onclick="alert('Added successfully')">
                <input type="submit" name="buy" value="Buy">
                <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" style="visibility:hidden" >
                <input type="text" name="u_id" value="<?php echo $client_info['user_id']; ?>" style="visibility:hidden" >
                </div>
                
			</form>                         			
        </div>
           
<?php }?>
       
    </div>
</div>


<!--------------- 	3rd Panel 	--------------->


<div class="container prod">
	<H3>ACCESSORIES</H3>
    <div class="row">

<?php 
$select = "SELECT * FROM `product` WHERE `category_id` = '3' ORDER BY ID DESC LIMIT 5";
$result=$conn->query($select);
while($row = $result->fetch_assoc()){  
?>
    	
        <div class="col-20" align="center" >
       		<form action="#" method="POST" name="myform">			
                <img src="product_image/<?php echo $row['image'] ?>" alt="imaage" height="50%" width="50%"  >
                <a <?php echo" href='view_details_after_log.php?id=$row[product_id]' "?> target="_blank" class="p pp">
                <h4 style="color:#069"><?php echo $row['title'] ?></h4>
                <p><?php echo $row['desp'] ?></p>
                <p style="color:#3e2723"><b><?php echo "TK. ".$row['price'] ?></b></p>
                </a>
                <div>
                <input type="submit" name="add_to_cart" value="Add to Cart" onclick="alert('Added successfully')">
                <input type="submit" name="buy" value="Buy">
                <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" style="visibility:hidden" >
                <input type="text" name="u_id" value="<?php echo $client_info['user_id']; ?>" style="visibility:hidden" >
                </div>
                
			</form>                         			
        </div>
        
<?php }?>
       
    </div>
</div>



<!------------   END  ------------->
</div>
</div>

<div>
<footer style="background-color:#757575">
<br><center>
<img src="images/mlogo.png" height="50px" width="200px">
<img src="images/footer.png" height="50px" width="100px">
Copyright (c) 2016 All Rights Reserved
</center>
</footer>
</div>

</body>
</html>

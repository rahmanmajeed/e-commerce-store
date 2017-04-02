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

if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$desp = $_POST['desp'];
	$product_id = $_POST['product_id'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	$category_id = $_GET['id'];
	
	$brnd=$_POST['brand'];
	$mdl=$_POST['model'];
	$processor=$_POST['pro'];
	$clkspd=$_POST['clckspd'];
	$scren=$_POST['display'];
	$Ram=$_POST['ram'];
	$strg=$_POST['strge'];
	$opsys=$_POST['os'];
	$warren=$_POST['war'];
	$ldes=$_POST['longdes'];
	

$sql = "INSERT INTO `product` (`title`, `desp`, `product_id`, `price`, `image`, `category_id`, `Brand`, 

`Model`, `Processor`, `clcksped`, `Display`, `Ram`, `Storage`, `OS`, `warrenty`, `londesp`) VALUES ('$title', '$desp', 

'$product_id ','$price', '$image', '$category_id ', '$brnd', '$mdl', '$processor', '$clkspd', '$scren', '$Ram', '$strg', '$opsys', '$warren', '$ldes');"; 	
	if(mysqli_query($conn,$sql))
  {
	  //mysqli_query($conn,$sql1);
	header('Location:admin_panel.php');
  }
  else
  {
	  echo"Sql Error".$sql;
	 // echo"Sql Error".$sql1;
  }
}

$category_id = $_GET['id'];

?>
 
<!DOCTYPE html>
<head>
<title>upload</title>
<link href="css/view_product.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>


<body>
<ul>
  <li><a href="?status=logout&logout=true" > Sign Out</a></li> 
   
   <li class="dropdown" >
    <a href="#" class="active" class="dropbtn" >Upload</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"upload.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"upload.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"upload.php?id=3\">Accessories</a>"?>
	</div>
   </li>    
   <li style="float:left" ><a href="admin_panel.php"  name="panel">Admin Panel</a></li>
   <li><a href="order_list.php" >Order List</a></li>   
</ul>
<hr>
<div class="container prod">
<H3 align="right">Full Specification</H3>
<form method="post" action="#" >
<div class="row">
    <div class="col-50" align="center">
<table class="product-table">
<tr>
<td>Product Title</td>
<td><input type="text" style="text-align:center" name="title" placeholder="Product Name" required /></td>
</tr>


<tr>
<td>Product ID</td>
<td><input type="text" style="text-align:center" name="product_id" placeholder="Product ID" required value="<?php echo rand().'-PI';?>" /></td>
</tr>

<tr>
<td>Price</td> 
<td><input type="text" style="text-align:center" name="price" placeholder="Price" required /></td>
</tr>

<tr>
<td>Image</td> 
<td><input type="file" style="text-align:center" name="image" required /></td>
</tr>


<tr>
<td>Short Desciption</td>
<td><textarea required name="desp" placeholder="Short Description"> </textarea>	</td>
</tr>
  
<tr>
<td><input type="submit" name="submit" value="Upload" /></td> 
<td><input type="reset" /></td>
</tr>

</table>

</div>
     
<div class="col-50" align="center">
<table class="product-table">
<tr>
<td width="156">Brand</td>
<td width="285"><input type="text" style="text-align:center" name="brand"  placeholder="Brand Name" /></td>
</tr>

<tr>
<td>Model</td><td><input type="text" style="text-align:center" name="model"  placeholder="Model" /></td>
</tr>

<tr>
<td>Processor</td>
<td><input type="text" style="text-align:center" name="pro"  placeholder="Processor" /></td>
</tr>

<tr>
<td>Clock Speed</td>
<td><input type="text" style="text-align:center" name="clckspd"  placeholder="Clock Speed " /></td>
</tr>

<tr>
<td>Display type</td>
<td ><input type="text" style="text-align:center" name="display"  placeholder="Display" /></td>
</tr>

<tr>
<td>Ram type</td>
<td><input type="text" style="text-align:center" name="ram"  placeholder="Ram" /></td>
</tr>

<tr>
<td>Storage </td>
<td><input type="text" style="text-align:center" name="strge"  placeholder="Storage" /></td>
</tr>

<tr>
<td>Operating System</td>
<td><input type="text" style="text-align:center" name="os"  placeholder="Operation System" /></td>
</tr>

<tr>
<td>Warrently</td>
<td > 
  <select name="war">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
</td>
</tr>


<tr>
<td >Long Desciption</td>
<td><textarea required name="longdes" placeholder="Long Despcription"> </textarea>	</td>
</tr>

</table>         
         
</div>
</form>       
</div>



</body>
</html>
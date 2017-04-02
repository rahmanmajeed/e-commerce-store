<?php
  include('DBconn.php');
   $p_id=$_GET['prdct_id'];
   $sql = "SELECT * FROM `product` where product_id='$p_id'";
   $result=$conn->query($sql);
   while($row=$result->fetch_assoc())
   {
	$title=$row['title'];
	$desp=$row['desp'];
	$pr_id=$row['product_id'];
	$price=$row['price'];
	$image=$row['image'];
	$brand=$row['Brand'];
	$Model=$row['Model'];
	$prs=$row['Processor'];
	$clkspd=$row['clcksped'];
	$disp=$row['Display'];
	$ram=$row['Ram'];
	$strge=$row['Storage'];
	$os=$row['OS'];
	$war=$row['warrenty'];
	$ldesp=$row['londesp'];
	$cat=$row['category_id'];
	
	   
   }
   if(isset($_POST['submit']))
{
	$ptitle=$_POST['title'];
	$psdesp=$_POST['descrp'];
	$prce=$_POST['price'];
	$pimage=$_POST['image'];
	$pbrand=$_POST['brand'];
	$pmodel=$_POST['model'];
	$pprocs=$_POST['processor'];
	$pclck=$_POST['clocksped'];
	$pdisplay=$_POST['display'];
	$pram=$_POST['ram'];
	
	$pstrg=$_POST['storage'];
	$pos=$_POST['os'];
	$pwar=$_POST['warrenty'];
	$pldesp=$_POST['ldesp'];
$sql1 = "UPDATE `ecommerce`.`product` SET 
`title` = '$ptitle', desp = '$psdesp', `price` = '$prce', `image` = '$pimage', `Brand` = '$pbrand', `Model` = '$pmodel',
 `Processor` = '$pprocs', `clcksped` = '$pclck', `Display` = '$pdisplay', `Ram` = '$pram', `Storage` = '$pstrg',
 `OS` = '$pos', `warrenty` = '$pwar', `londesp` = '$pldesp' WHERE `product`.`product_id` ='$p_id';";
if(mysqli_query($conn,$sql1)){
	header('Location:admin_panel.php');
} 
else
{
	echo"query problem";
}
	
}
  



?>
<html>
<head>
<title>Update Product</title>
</head>
<link href="css/view_product.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />

<body>
<ul>
  <li><a href="?status=logout&logout=true" > Sign Out</a></li> 
   
   <li class="dropdown" >
    <a href="#"  class="dropbtn" >Upload</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"upload.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"upload.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"upload.php?id=3\">Accessories</a>"?>
	</div>
   </li>    
   <li style="float:left" class="active" ><a href="admin_panel.php"  name="panel">Admin Panel</a></li>
   <li><a href="order_list.php" >Order List</a></li>   
</ul>
<hr>
<div class="container prod">
<H3 align="right">Full Specification</H3>
<form method="post" action="#" >
<div class="row">
    <div class="col-50" align="center">
<table class="product-table">
<tr><td>Product Title</td><td><input type="text" name="title" value="<?php echo $title;?>"></td></tr> 
<tr><td>Short Description</td><td height="10%"><input type="text" name="descrp" value="<?php echo $desp;?>"></td></tr>
<tr><td>Product ID</td><td height="10%"><?php echo $pr_id;?></td></tr>
<tr><td>Price</td><td height="10%"><input type="text" name="price" value="<?php echo $price;?>"></td></tr>
<tr><td >Image</td> <td><input type="file"  name="image" ><br><?php echo $image;?></td></tr>
<tr>
<td><input type="submit" name="submit" value="Update" /></td> 
<td><input type="reset" /></td>
</tr>

</table>

</div>
     
<div class="col-50" align="center">
<table class="product-table">
<tr><td>Brand</td><td height="10%"><input type="text" name="brand" value="<?php echo $brand;?>"></td></tr>
<tr><td>Model</td><td height="10%"><input type="text" name="model" value="<?php echo $Model;?>"></td></tr>
<tr><td>Processor</td><td height="10%"><input type="text" name="processor" value="<?php echo $prs;?>"></td></tr>
<tr><td>Clock Speed</td><td height="10%"><input type="text" name="clocksped" value="<?php echo $clkspd;?>"></td></tr>
<tr><td>Display Type</td><td height="10%"><input type="text" name="display" value="<?php echo $disp;?>"></td></tr>
<tr><td>Ram Type</td><td height="10%"><input type="text" name="ram" value="<?php echo $ram;?>"></td></tr>
<tr><td>Storage</td><td height="10%"><input type="text" name="storage" value="<?php echo $strge;?>"></td></tr>
<tr><td>OS Type</td><td height="10%"><input type="text" name="os" value="<?php echo $os;?>"></td></tr>
<tr>
<td>Warrenty</td>
<td > 
<select name="warrenty">
	<option <?php if($war == "1"){ echo "selected";}?>>1</option>
	<option <?php if($war == "2"){ echo "selected";}?>>2</option>
	<option <?php if($war == "3"){ echo "selected";}?>>3</option>
	<option <?php if($war == "4"){ echo "selected";}?>>4</option>
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

<!-- Update Query -->

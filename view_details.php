<?php
include('DBconn.php');
$pid=$_GET['id'];
//echo $pid;
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

<html>
<header>
<title>View Details</title>
<link href="css/view_product.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
</header>
<body>
<ul>
  <li ><a href="login.php">Sign IN</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li style="float:left"><a href="index.php">Home</a></li>
  
   <li class="dropdown" style="float:left">
    <a href="#" class="dropbtn" >Categories</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"categories.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"categories.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"categories.php?id=3\">Accessories</a>"?>
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
            <td width="30%" bgcolor="#efebe9">Brand</td>
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
        </div>
        
</div>


</body>
</html>
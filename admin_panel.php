<?php
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
include('DBconn.php');
?>


<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link rel="stylesheet" href="css/backend.css" type="text/css" />
<link rel="stylesheet" href="css/hoverstyle.css" type="text/css"/>
<link rel="stylesheet" href="css/modal.css" type="text/css"/>
<style>
a[name="panel"]:hover {
	background-color: #666;
	cursor: default;
}
</style>

</head>

<body bgcolor="#a1887f">
<div id="main">
<ul>
  <li><a href="?status=logout&logout=true" > Sign Out</a></li> 
   
   <li class="dropdown" >
    <a href="#" class="dropbtn" >Upload</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"upload.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"upload.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"upload.php?id=3\">Accessories</a>"?>
	</div>
   </li>    
   <li style="float:left" ><a href="#" class="active" name="panel">Admin Panel</a></li> 
   <li><a href="#" id="myBtn">Backup</a></li> 
   <li><a href="order_list.php">Order List</a></li> 
</ul>
<hr>

<div id="sd1">
<table class="product-table">
<tr bgcolor="#5d4037" style="color:#FFF">
<td ><b>New Registered</b></td>
<td colspan="2" align="center"><b>Action</b></td>
</tr>
<?php 
$select = "SELECT `user_id` , `email_address`, `access_level` FROM `login` WHERE `access_level`= 0";
$result=$conn->query($select);
while($row = $result->fetch_assoc()){  
?>
<tr bgcolor="#eeeeee ">
<td>
<?php echo $row['email_address'] ?>
</td>
<?php echo "<td align='center'> <a style='text-decoration:none' href=\"active.php?user_id=$row[user_id]\" onClick=\"return confirm('Are you sure to activate this User?')\">Approve</a>
</td>" ?>	
<?php echo "<td align='center'> <a style='text-decoration:none' href=\"reject.php?user_id=$row[user_id]\" onClick=\"return confirm('Are you sure to Reject this user?')\">Reject</a>
</td>" ?>

</tr>
<?php }?>
</table>

</div>
  
<div id="content" align="center">
<table width="1050" class="product-table">
<!--<caption>Purchase Record</caption>-->
<tr bgcolor="#8d6e63 " style="color:#FFF">
<td width="356"><b>Product Title</b></td>
<td width="191" align="center"><b>Image</b></td>
<td width="487"><b>Description</b></td>
</tr>
<?php 
$sql = "SELECT title,desp,image,product_id from product ORDER BY ID DESC";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){  
?>

   <tr >
   <td><?php echo "<a href=\"details.php?id=$row[product_id]\">".$row['title']."</a>" ?></a><br><br>
   <?php echo "<a style='text-decoration:none' href=\"update_product.php?prdct_id=$row[product_id]\">Update</a>"?>
   <?php echo "<a style='text-decoration:none' href=\"delete_product.php?prdct_id=$row[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>" ?>
   </td>
  
   <td align="center"><img src="product_image/<?php echo $row['image']?>" alt="image" height="100" width="100"></td>
   <td> <?php echo $row['desp']?></td>	

   </tr>
   <?php }?>
   </table>

</div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">x</span>
    <div align="center">
    <br><br><br>
    <a href="backup_client_list.php" style="text-decoration:none">User Info</a><br><br>
	<a href="backup_product_list.php" style="text-decoration:none">Product Info</a>
    </div>
  </div>
</div>


<!-- The Modal -->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>


</body>
</html>

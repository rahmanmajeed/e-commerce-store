<?php
session_start();
include('DBconn.php');
//echo $user_id = $_GET['id'];
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
if(isset($_POST['update']))
{	

	$old=$_POST['old_password'];
	if($client_info['password'] == $old)
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email_address'];
		$pass=$_POST['new_password'];
		$phoneno=$_POST['phone'];
		$addres=$_POST['address'];
		
		$sql = "UPDATE `login` SET `email_address` = '$email', `password` = '$pass' WHERE `login`.`user_id` = '$user_id'";
		$sql0 = "UPDATE `register` SET `phone` = '$phoneno', `address` = '$addres' ,`fname` = '$fname',`lname` = '$lname' WHERE `register`.`user_id` = '$user_id'";
		if(mysqli_query($conn,$sql))
		{
			mysqli_query($conn,$sql0);
			header("Location: user_account.php");
		}
		else
		{
			echo"qurey problem";
		}

	}
	
	   else if($client_info['password'] != $old)
	{
		print "<script type=\"text/javascript\"> alert('Old Password not Match'); </script>";
	}
	
}

?>
<html>
<head>
<title>User Panel</title>
<link rel="stylesheet" href="css/register_form.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<style>
a[name="panel"]:hover {
	background-color: #666;
	cursor: default;
}

input[name="lname"],input[name="new_password"],button[name="update"] {
    width:94%
}
</style>
</head>
<body>
<ul>
  <li ><a href="?status=logout&logout=true" > Sign Out</a></li> 
  <li class="active" ><?php echo "<a href=\"update_user.php?id=$client_info[user_id]\">Update Profile</a>"?></li>     
  <li style="float:left" ><a href="user_account.php" name="panel" style="color:#090"><b><?php echo $client_info['fname']." ".$client_info['lname'];?></b></a></li> 
  <li><a href="after_login.php">Shopping</a></li>  
</ul><br>

    <center>
        <form action="#" method="post" name="myform">
                            
                    <?php
                    if (isset($message)) {
                        echo $message;
                        unset($message);
                    }
                    ?>
               
				<table width="520">
                <tr>
                <td><input type="text" name="fname" value="<?php echo $client_info['fname'];?>" placeholder="First Name" required></td>
                <td><input type="text" name="lname" value="<?php echo $client_info['lname'];?>" placeholder="Last Name"></td>
                </tr>
                
                <tr>
                <td colspan="2">
                <input type="email" name="email_address" value="<?php echo $client_info['email_address'];?>" placeholder="Your e-mail" required>
                </td>
                </tr>
                
                <tr>
                <td>
                <input type="password" name="old_password" value="" placeholder="Old Password" required  >
                </td>
                
                 <td>
                <input type="password" name="new_password" value="" placeholder="New Password" required>
                </td>
                </tr>
                
                 <tr>
                <td colspan="2">
                <input type="text" name="phone" value="<?php echo $client_info['phone'];?>" placeholder="Phone NO" required>
                </td>
                </tr>
                
                
                 <tr>
                <td colspan="2">
                <input type="text" name="address" value="<?php echo $client_info['address'];?>"  placeholder="Street Address"  required >
                </td>
                </tr>
                    
                
<tr>
<td width="254"><button type="reset" name="reset" value="Reset">Reset</button>			</td>
<td width="254"><button type="submit" name="update" >Update</button> </td>
</tr>
</table>
                       
        </form>
       
        </center>


</body>
</html>
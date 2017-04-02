<?php
//error_reporting(0);
require 'Super_Admin.php';
$obj_sup = new Super_Admin();
if (isset($_POST['btn_signup'])) {

	$password = $_POST['password'];
	$retypepass = $_POST['re-password'];
	
	if($password === $retypepass)
	{
		$message = $obj_sup->save_register($_POST);
	}
    else if($password != $retypepass)
	{
		print "<script type=\"text/javascript\"> alert('Password not Match'); </script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="css/register_form.css" type="text/css" />
<link rel="stylesheet" href="css/navigation.css" type="text/css" />
<link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/usercheck.js"></script>
<style>
input[name="lname"],input[name="re-password"] {
    width:94%
}

</style>


</head>
    
<body>
<ul>
  <li class="active"><a href="login.php">Sign Up</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li  style="float:left"><a href="index.php">Home</a></li>
  
   <li class="dropdown" style="float:left">
    <a href="#" class="dropbtn" >Categories</a>
    <div class="dropdown-content">
      <?php echo "<a href=\"categories.php?id=1\">Desktop & Laptop</a>"?>
      <?php echo "<a href=\"categories.php?id=2\">Mobile & Tab</a>"?>
      <?php echo "<a href=\"categories.php?id=3\">Accessories</a>"?>
	</div>
   </li>      
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
                <td><input type="text" name="fname" value="" placeholder="First Name" required></td>
                <td><input type="text" name="lname" value="" placeholder="Last Name"></td>
                </tr>
                
                <tr>
                <td colspan="2">
				<div class="web">
				<div class='input'>
                <input type="email" name="email_address" id="email_address" value="" placeholder="Your e-mail" required>
				<div class="availability" id="availability"></div>
				</div>
                </td>
                </tr>
                
                <tr>
                <td>
                <input type="password" name="password" value="" placeholder="Password" required  >
                </td>
                
                 <td>
                <input type="password" name="re-password" value="" placeholder="Re-type Password" required>
                </td>
                </tr>
                
                 <tr>
                <td colspan="2">
                <input type="text" name="phone" value="" placeholder="Phone NO" required>
                </td>
                </tr>
                
                
                 <tr>
                <td colspan="2">
                <input type="text" name="address" value="" placeholder="Street Address" required >
                </td>
                </tr>
                
                
<tr>	
<td><input type="radio" name="gender" id="radio1" class="radio" value="Male" checked/> <label for="radio1">Male</label></td>	
<td><input type="radio" name="gender" id="radio2" class="radio" value="Female" /> <label for="radio2">Female</label></td>		
</tr>
                
<tr>
<td width="254"><button type="reset" name="reset" value="Reset">Reset</button>			</td>
<td width="254"><button type="submit" name="btn_signup" value="Submit">Sign Up</button> </td>
</tr>
</table>
                       
        </form>
       
        </center>
    </body>
</html>

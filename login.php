<?php
require 'varify.php';
$obj_login = new Login();

if (isset($_POST['btn_login'])) 
{
    $message = $obj_login->user_login_check($_POST);
}

if (isset($_SESSION['user_id'])) 
{
    $user_id = $_SESSION['user_id'];

    if ($user_id == NULL) 
	{
        if ($_SESSION['type'] == 'A' || $_SESSION['type'] == 'a') 
		{
            header('Location: admin_panel.php');
        } 
		
		else if ($_SESSION['type'] == 'C' || $_SESSION['type'] == 'c') 
		{
            header('Location: user_account.php');
        }
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/navigation.css" type="text/css" />
        <link href="css/hoverstyle.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
<ul>
  <li class="active"><a href="login.php">Sign IN</a></li>
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
        <div id="login-form">
            <form method="post">
                <table align="center" width="30%" border="0">
                    <tr>
                        <td><input type="text" name=" email_address" placeholder="Your Email" required /></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" placeholder="Your Password" required /></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="btn_login">Sign In</button></td>
                    </tr>
                    <tr>
                        <td><a href="register.php">Sign Up Here</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>
</html>
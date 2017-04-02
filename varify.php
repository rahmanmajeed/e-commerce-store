<?php
session_start();
require 'db_connect.php';

class Login {

    public function __construct() 
	{
        $db_connect = new Db_Connect();
    }

    public function user_login_check($data) 
	{

        $email_address = $data['email_address'];
        $password = $data['password'];
        $query = "SELECT *FROM login WHERE email_address='$email_address' and password='$password'";

        if (mysql_query($query)) 
		{
            $resourse_id = mysql_query($query);
            $user_info = mysql_fetch_assoc($resourse_id);

            if ($user_info) 
			{
                if ($user_info['access_level'] == '1') 
				{
                    $_SESSION['user_id'] = $user_info['user_id'];
                    $_SESSION['type'] = $user_info['type'];

                    if ($user_info['type'] === "A" || $user_info['type'] == "a") 
					{
                        header('Location: admin_panel.php');
                    } 
					
					else if ($user_info['type'] === "C" || $user_info['type'] == "c") 
					{
                        header('Location: user_account.php');
                    }
                }
				
				else if($user_info['access_level'] != '1')
				{	
					print "<script type=\"text/javascript\"> alert('Account is not Activated. Please try later !!'); </script>";					
				}
            }
			
			else{
					print "<script type=\"text/javascript\"> alert('Invalid User ID or Password'); </script>";
            	}
        } 
		
		else 
		{
            die('Query Problem' . mysql_error());
        }
    }
}

?>

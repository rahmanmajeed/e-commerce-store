<?php
//error_reporting(0);
require 'db_connect.php';
class Super_Admin {
    
    public function __construct() {
        $db_connect = new Db_Connect();
    }
    
    public function save_register($data){
		
		
$query1="INSERT INTO register(fname,lname,phone,address,gender)" . "VALUES('$data[fname]','$data[lname]','$data[phone]','$data[address]','$data[gender]')";  
$query2="INSERT INTO login(email_address,password,type,access_level)" . "VALUES('$data[email_address]','$data[password]','C','0')";
        
        if(mysql_query($query1))
		{
            mysql_query($query2);
            header("location:login.php");                      
        }  
		else 
		{
            die("Query Problem" . mysql_error());
        }
    }
          public function select_user_by_email_address($user_id) {
         $query = "SELECT login.* , register.* FROM login INNER JOIN register ON login.user_id = register.user_id WHERE login.user_id =$user_id";

        if (mysql_query($query)) {
            $result_query = mysql_query($query);
            return $result_query;
        } else {
            die("Query Problem" . mysql_error());
        }
    }
	
	
    
   public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['access_level']);

        header('Location:login.php');
    }  
	
     
   
}

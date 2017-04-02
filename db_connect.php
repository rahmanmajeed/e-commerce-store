<?php
error_reporting(0);
class Db_Connect {

    public function __construct() 
	{
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'ecommerce';
        $conn = mysql_connect($hostname, $username, $password);
		
        if ($conn) 
		{
            mysql_select_db($dbname);
            //echo 'Databse Server Connected';
        } 
		
		else 
		{
            die("Database Server Not Connected" . mysql_error());
        }
    }

}






<?php
   $server="localhost";
   $username="root";
   $password="";
   $db="ecommerce";
   $conn=mysqli_connect($server,$username,$password,$db);
   if(!$conn)
   {
	   die("Connection Failed".mysqli_connect_error());
   }
   //echo "conncet Sucessfully";
?>
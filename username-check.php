<?php
	include 'DBconn.php';	
	$email = $conn->real_escape_string($_POST['email_address']);
	$sqlUser='SELECT email_address FROM login WHERE email_address = "'.$email.'"';
	$resUser=$conn->query($sqlUser);
	if($resUser === false) {
		trigger_error('Error: ' . $conn->error, E_USER_ERROR);
	} else {
		echo $rows_returned = $resUser->num_rows;
	}
	
?>
$(document).ready(function(){
	//when user type in text box then execute the function
	$('#email_address').keyup(function(){
		//get the username 
		var user_name = $('#email_address').val();
		//if user name length is less than two then execute this condition
		if(user_name.length > 3) {
			//else show the cheking_text and run the function to check
			$('#availability').html('Loading..');
			//take the user_name in post_string variable
			var post_string = 'email_address='+user_name;
			$.ajax({
				//data transfer type
				type : 'POST',
				//data receive
				data : post_string,
				//check user through this username-check.php file
				url  : 'username-check.php',
				success: function(responseText){
					if(responseText == 0){
						$('#availability').html('<span class="success">E-mail name available</span>');
					}
					else if(responseText > 0){
						$('#availability').html('<span class="error">E-mail already exists</span>');
					}
					else{
						alert('Problem with mysql query');
					}
				}
			});
		}else{
			$('#availability').html('');
		}
	});
});
<?php 
	/*header('Access-Control-Allow-Origin: *'); 
		header('Access-Control-Allow-Methods: GET, POST');
		header('Content-Type: application/json; charset=utf-8');
		//https://developer.wordpress.org/reference/functions/wp_login/
		//https://codex.wordpress.org/Function_Reference/get_userdata
		///wp-content/plugins/custom-my-account-for-woocommerce/woocommerce/myaccount
		$postData = file_get_contents("php://input");
		//if post data
		
		$request = json_decode($postData);
		$name = $request->name;
		$email = $request->email;
		$number = $request->phone;
		$message = $request->question;
		
		
	*/
	require( '../../wp-load.php' );
	$username="venujakku@gmail.com";
	$pass="venuvenu";
	
	$user=wp_authenticate( $username,$pass );;
	//print_r($user);
	
	if(isset($user->data))
	{
		if(isset($user->data->ID))
		{
			
			echo $user->data->user_email;
			
			echo "<br/>Login Success";
			}
		
		
	}
	else
	{
		//if(isset($user->errors))
		{
			echo "Invalid Password";
		}
	}
	
	
	
?>
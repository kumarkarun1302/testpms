<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	//https://developer.wordpress.org/reference/functions/wp_login/
	//https://codex.wordpress.org/Function_Reference/get_userdata
	///wp-content/plugins/custom-my-account-for-woocommerce/woocommerce/myaccount
	$postData = file_get_contents("php://input");
	//if post data
	
	$request = json_decode($postData);
	$email = $request->email;
	$password = $request->password;
	
	
	require( '../../wp-load.php' );
	
	$user=wp_authenticate( $email,$password );;
	// print_r($user);
	//exit;
	if(isset($user->data))
	{
		if(isset($user->data->ID))
		{
			
			$data = $user->data;
		}
		
		
	}
	else
	{
		$data = 0;
		header ('HTTP/1.1 401 Unauthorised',true,401);
	}	
	ob_clean();
	echo json_encode($data);
	
	
	
?>
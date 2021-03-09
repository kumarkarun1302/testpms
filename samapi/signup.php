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
	$firstname = $request->firstname;
	$lastname = $request->lastname;
	$email = $request->email;
	$password = $request->password;
	$user_nicename = $firstname.' '.$lastname;
	require( '../wp-load.php' );

/*$user = wp_create_user( $user_nicename, $password, $email);
$second_db = new wpdb('root', '', 'wordpress', 'localhost');
$results = $second_db->get_results('select user_nicename from wp_users');
print_r($results);*/
		
	ob_clean();
	echo json_encode($user);
	
	
	
?>
<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->user_id;	
	
	//sample data  - comment below line for live 
	$user_id=4;
	
	
	
	if($user_id>0)
	{
		require( '../../wp-load.php' );
		
		ob_clean();
		$user_info = get_userdata($user_id);
		$user_array=array();
		$user_array['user_login']=$user_info->data->user_login;
		$user_array['display_name']=$user_info->data->display_name;
		$user_array['user_email']=$user_info->data->user_email;
		  
		echo json_encode($user_array);
		exit;
		
		
		
	}
	//echo $user_info->data->user_login;
	//exit;
	//echo '-----------------';
	//$loginid=$user_info->data->user_login;
	
	
	
	
	
	
	
	
	
	?>
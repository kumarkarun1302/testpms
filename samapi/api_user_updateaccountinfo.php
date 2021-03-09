<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->userId;	
	$first_name = $request->fname;	
	$last_name = $request->lname;	
	
	//sample data  - comment below line for live 
	 //$user_id=4;
	//$first_name = 'First Name 1';	
	//$last_name = 'Last Name 1';	
	
	
	if($user_id>0)
	{
		require( '../../wp-load.php' );
		
		ob_clean();
		
		$strquery="update   wp_usermeta  SET meta_value='".$first_name."'  WHERE user_id='".$user_id."'  and meta_key='first_name'  ";
		$wp_usermeta = $wpdb->get_results( $strquery, OBJECT );
		
		
		$strquery="update   wp_usermeta  SET meta_value='".$last_name."'  WHERE user_id='".$user_id."'  and meta_key='last_name'  ";
		$wp_usermeta = $wpdb->get_results( $strquery, OBJECT );
		
		
		//after update read the data from table
		$strquery="SELECT * FROM wp_usermeta   WHERE user_id='".$user_id."'   ";
		$wp_usermeta = $wpdb->get_results( $strquery, OBJECT );
		
		$user_array=array();
		$user_array['user_first_name']=$wp_usermeta[1]->meta_value;
		$user_array['user_last_name']=$wp_usermeta[2]->meta_value;
		
		
		$user_info = get_userdata($user_id);
		
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
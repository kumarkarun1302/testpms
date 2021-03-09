<?php 
	
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->userId;	
	
	
	require( '../../wp-load.php' );
	global $wpdb;
	
	$strquery="SELECT * FROM radio_feeds  ORDER BY created_datetime DESC";
	$results = $wpdb->get_results( $strquery, OBJECT );
	
	$radiolist_array=array();
	
	foreach ($results as $post)
	{ 
		 
		$single_post=array();
		$single_post['post_title']=$post->title;
		$single_post['post_created_datetime']=$post->created_datetime;
		$single_post['post_radio_link']='http://careandcure.co.uk/radiofeeds/'.$post->id.'.mp3';
		
		$radiolist_array[]=$single_post;
	}
	
	
	ob_clean();
	echo json_encode($radiolist_array);
	exit;
	
	 
	
	
	
?>
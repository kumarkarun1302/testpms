<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->userId;	
	require( '../../wp-load.php' );
	//sample data  - comment below line for live 
	global $wpdb;
	$results = new WP_Query('category_name=announcements&posts_per_page=10');
	
	$health_tipsarray=array();
	
	while ( $results->have_posts() )
	{ 
		$results->the_post(); 
		$post_id =  get_the_ID();
		$post_details=get_post($my_postid);
		
		$single_post=array();
		$single_post['post_title']=$post_details->post_title;
		$single_post['post_content']=$post_details->post_content;
		
		$health_tipsarray[]=$single_post;
	}
	
	
	
	echo json_encode($health_tipsarray);
	exit;
	
	
	
	
	
	
	
?>
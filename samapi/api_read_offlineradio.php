<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	//$request = json_decode($postData);
	//$user_id = $request->userId;	
	$radion_live=0;
	date_default_timezone_set("Europe/London");
	require( '../../wp-load.php' );
	
	$result = $wpdb->get_results ( "SELECT * FROM radio_time" );
	
	foreach ( $result as $print )   {
    	$day=$print->day;
    	$start_time=$print->start_time;
    	$end_time=$print->end_time;
		$play_offline=$print->off_pl_yes;
	}
	if(date("l")==$day){
		if(date('H')>=$start_time && date('H')<=$end_time){
			//echo "Time is between 12PM to 4PM";
			$radion_live=1;
		}
		else{
			//echo "Open b/w 12pm to 4pm only";
			$radion_live=0;
		}
	}
	else {
		//echo "Today is not Monday";
		$radion_live=0;
	}
	 
	ob_clean();
	echo $radion_live;
	exit;
	
	
	
	
?>
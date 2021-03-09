<?php 
	$finalarray=array();
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear1";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear2";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear3";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear4";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear5";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	$itemarray=array(); 
	$itemarray["name"]="Burt Bear6";
	$itemarray["profilePic"]="assets/img/speakers/bear.jpg";
	$itemarray["name"]="Burt is a Bear."; 
	$finalarray[]=$itemarray;
	
	ob_clean();
	echo json_encode($finalarray);
	 
	
	
	
	
	
	
	
	
	
	
	?>
<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->userId;	
	//print_r( $request);
	//sample data  - comment below line for live 
	 //$user_id=4;
	 $orders_list=array();
	//echo json_encode($orders_list);
	//echo $user_id;
	
	//exit;
	
	if($user_id!='')
	{
		require( '../../wp-load.php' );
		
		ob_clean();
		
		
		$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
		'numberposts' => $order_count,
		'meta_key'    => '_customer_user',
		'meta_value'  => $user_id,
		'post_type'   => wc_get_order_types( 'view-orders' ),
		'post_status' => array_keys( wc_get_order_statuses() )
		) ) );
		
		
		
		
		
		$counteri=1;
		$orders_list=array();
		foreach ( $customer_orders as $customer_order )
		{
			$order = wc_get_order( $customer_order );
			$order->populate( $customer_order );
			$item_count = $order->get_item_count();
			
			$order_details=array();
			$order_details['order_number']=$order->get_order_number();
			$order_details['order_date']=date( 'Y-m-d', strtotime( $order->order_date ) );
			
			$order_details['order_total']=$order->total;
			$order_details['order_items_count']=$item_count;
			
			$orders_list[]=$order_details;
			
		}
		
		
		echo json_encode($orders_list);
		exit;
		
		
		
	}
	else
	
	{
		echo json_encode($orders_list);
		exit;
	}
	//echo $user_info->data->user_login;
	//exit;
	//echo '-----------------';
	//$loginid=$user_info->data->user_login;
	
	
	
	
	
	
	
	
	
?>
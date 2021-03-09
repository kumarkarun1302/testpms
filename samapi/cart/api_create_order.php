<?php 
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	$user_id = $request->user_id;	
	$user_email = $request->user_email;	
	
	
	require( '../../../wp-load.php' );
	//$user_email='venujakku@gmail.com';
	$address = array(
	'first_name' => 'Fresher',
	'last_name'  => 'StAcK OvErFloW',
	'company'    => 'stackoverflow',
	'email'      => 'venujakku@gmail.com',
	'phone'      => '777-777-777-777',
	'address_1'  => '31 Main Street',
	'address_2'  => '', 
	'city'       => 'Chennai',
	'state'      => 'TN',
	'postcode'   => '12345',
	'country'    => 'IN'
	);
	
	
	$user_id = email_exists( $user_email); 
	// $order = wc_create_order();
	$order = wc_create_order(array('customer_id' => $user_id));
	$order->add_product( get_product( '17196' ), 2 ); //(get_product with id and next is for quantity)
	
	 
	$order->set_address( $address, 'billing' );
	$order->set_address( $address, 'shipping' );
	$shipping = new WC_Shipping_Rate();
	$order->calculate_shipping();
	//$shipping = new WC_Shipping_Rate( $id, $label, $cost, $taxes, $method_id );
	$order->add_shipping( $shipping );
	
	//     $order->add_coupon('Fresher','10','2'); // accepted param $couponcode, $couponamount,$coupon_tax
	$order->calculate_totals();
	
	$order->update_status('pending');
	$order->calculate_shipping();
	$order->calculate_totals();
	
	ob_clean();
	echo json_encode($order);
	
	$order_id = "16852";
	$email_class = 'WC_Email_Customer_Invoice';
	
	
	
	
	$wc_emails = new WC_Emails();
	$emails = $wc_emails->get_emails();
	
	$new_email = $emails[$email_class]; 
	$new_email->trigger($order_id);
	
	
	$new_email->send( $this->get_recipient().',venujakku@gmail.com', $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	
	echo $new_email->get_content();
	
	 
	
?>
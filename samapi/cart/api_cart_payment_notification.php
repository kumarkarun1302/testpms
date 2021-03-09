<?php
	//error_reporting(0);
	// include WordPress' wp-load
	include("../../../wp-load.php");
	
	
	//-------Create ORder
	
	
	
	
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	
	$postData = file_get_contents("php://input");
	$request = json_decode($postData);
	
	$user_email = $request->useremailid;	
	$billadd = $request->billadd;	
	$showCartItemsjson = $request->CartItems;	
	//$user_email='venujakku@gmail.com';
	//get_userdata( $userid );
	$userdetails=get_user_by( 'email', $user_email );
	
	//print_r($userdetails);
	//exit;
	
	//$showCartItemsjson='{"id":1,"name":"Megne Plus","product_price":"24.99","product_description":"","profilePic":"http://careandcure.co.uk/wp-content/uploads/2016/11/12.png","about":"","quantity":1}"';
	//print_r($showCartItemsjson);
	$cartitems=json_decode($showCartItemsjson);
	//echo "dddddddddddddd";
	print_r($cartitems);
	//exit;
	require( '../../../wp-load.php' );
	
	$address = array(
	'first_name' => $userdetails->display_name,
	'last_name'  => '',
	'company'    => '',
	'email'      => $user_email,
	'phone'      => '',
	'address_1'  => $billadd,
	'address_2'  => '', 
	'city'       => '',
	'state'      => '',
	'postcode'   => '',
	'country'    => ''
	);
	
	//Create user account
	 
	{
		
		$user_id = username_exists( $user_email );
		
		
		
		echo $user_id.'- user_id <br/>';
		
		if ( $user_id=='' ) 
		{
	
	 $from='info@careandcure.com' ;   
		$headersfrom='';
		$headersfrom .= 'MIME-Version: 1.0' . "\r\n";
		$headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headersfrom .= 'From: '.$from.' '. "\r\n";
		$headersfrom .= 'cc: info@careandcure.com '. "\r\n";
		$headersfrom .= 'bcc:admin@careandcure.co.uk, itsupport5589@gmail.com '. "\r\n";
		 
			echo $user_id.'- user_id is empty <br/>';
			$user_id = email_exists( $user_email );
			if ( $user_id=='' ) 
			{
				echo $user_id.'- user_id is empty <br/>';
				
				echo 'User Id is Empty</br/>';
				$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
				//echo '<br/> Email id Not  Exist '.$random_password;
				$name='Hello ';
				$userdata = array(
				'user_login'  => $user_email,
				
				'user_pass'   => $random_password, // When creating an user, `user_pass` is expected.
				'first_name'   => $name ,//  
				'user_email' =>   $user_email,
				'display_name' =>   $name ,
				'nickname' =>   $name ,
				'user_nicename' =>  $name
				);
				
				
				//$uid = wp_create_user(  $_POST['clientEmail'],$random_password,$values[2]['value']);
				
				$user_id = wp_insert_user($userdata);
				
				$reggistermail_content= '<table style="width: 600px; font-size: 11px; border-collapse: collapse;">
				
				<tr>
				
				
				
				<td colspan="2" style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Your Account Information</td>
				
				
				
				
				
				</tr>
				
				<tr>
				
				
				
				<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Username</td>
				
				<td style="border: 1px solid #eee; padding: 10px;">'. $user_email .'</td>
				
				
				
				</tr>
				<tr>
				
				
				
				<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Password</td>
				
				<td style="border: 1px solid #eee; padding: 10px;">'. $random_password .'</td>
				
				
				
				</tr>
				<tr>
				
				
				
				<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Login Link</td>
				
				<td style="border: 1px solid #eee; padding: 10px;"><h2 class="title" style="text-align: center;">
				
				<a href="'.get_home_url().'/index.php/login/" style="    color: #a01b11;">Login</a>
				</h2>
				</td>
				
				
				
				</tr>
				
				</table>';
				
				$subject='Careandcure - New account info';
				
				//$to=  'venujakku@gmail.com';
				
				$to=  ''.$user_email.'';
				//$to=  'venujakku@gmail.com,'.$email;
				
				echo mail($to,$subject,$reggistermail_content,$headersfrom).'-------------------';
				
				echo $reggistermail_content;
				
				 print_r($user_id);
				if(!is_array($user_id))
				{
					
				}
				else
				{
					$user_id='';
				}
				
			}
			
		}
		
	}
	//-----------------------------------------------------------------
	
	
	
	$user_id = email_exists( $user_email); 
	// $order = wc_create_order();
	$order = wc_create_order(array('customer_id' => $user_id));
	
	//echo $order->id;
	//	exit;
	
	foreach($cartitems as $cartitem)
	{
		
		$order->add_product( get_product( $cartitem->id ),$cartitem->quantity ); //(get_product with id and next is for quantity)
	}
	//$order->add_product( get_product( '16756' ), 2 ); //(get_product with id and next is for quantity)
	
	
	$order->set_address( $address, 'billing' );
	$order->set_address( $address, 'shipping' );
	$shipping = new WC_Shipping_Rate();
	//$order->calculate_shipping();
	//$shipping = new WC_Shipping_Rate( $id, $label, $cost, $taxes, $method_id );
	//$order->add_shipping( $shipping );
	
	//     $order->add_coupon('Fresher','10','2'); // accepted param $couponcode, $couponamount,$coupon_tax
	$order->calculate_totals();
	
	$order->update_status('pending');
	//$order->calculate_shipping();
	$order->calculate_totals();
	//print_r($order);
	//ob_clean();
	//echo json_encode($order);
	
	
	
	
	//-----------------------
	
	
	
	














/*// verbose errors
ini_set('display_errors', 1);
error_reporting(E_ALL);*/

$order_id = $order->id;
$email_class = $_REQUEST['email'];

if ($email_class == null) {
$email_class = 'WC_Email_Customer_Invoice';
}

if (!isset ($order_id)) {
global $wpdb;
$latestOrderID = $wpdb->get_results("SELECT max(ID) as ID FROM wp_posts WHERE post_type = 'shop_order';", OBJECT);
$order_id = $latestOrderID[0]->ID;
};

$wc_emails = new WC_Emails();
$emails = $wc_emails->get_emails();

$new_email = $emails[$email_class]; 
$new_email->trigger($order_id);
//echo $new_email->get_content();

//$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
ob_clean();
echo $order->id;
//return;
?>
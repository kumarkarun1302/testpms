<?php 
			header('Access-Control-Allow-Origin: *'); 
			header('Access-Control-Allow-Methods: GET, POST');
			header('Content-Type: application/json; charset=utf-8');
			//https://developer.wordpress.org/reference/functions/wp_login/
			//https://codex.wordpress.org/Function_Reference/get_userdata
			///wp-content/plugins/custom-my-account-for-woocommerce/woocommerce/myaccount
	$postData = file_get_contents("php://input");
	//if post data
	 $from='info@careandcure.com' ;   
		$headersfrom='';
		$headersfrom .= 'MIME-Version: 1.0' . "\r\n";
		$headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headersfrom .= 'From: '.$from.' '. "\r\n";
		//$headersfrom .= 'cc: info@careandcure.com '. "\r\n";
		//$headersfrom .= 'bcc:admin@careandcure.co.uk, itsupport5589@gmail.com '. "\r\n";
		 
		$request = json_decode($postData);
		$name = $request->name;
		$email = $request->email;
		$number = $request->phone;
		$message = $request->question;
		
		if($name !="" &&  $number !="" &&  $email !="" &&  $message !="" )   
		{
			
			 
			
			require( '../../wp-load.php' );
			
			global $current_user;//call app sessions id
			get_currentuserinfo();
			$user_id='';
			if(isset($current_user->ID))
			{
				$user_id=$current_user->ID;
			}
			
			if($user_id=='')
			{
				
				$user_id = username_exists( $email );
				
				
				
				
				
				if ( $user_id=='' ) 
				{
					
					$user_id = email_exists( $email );
					if ( $user_id=='' ) 
					{
						
						
						echo 'User Id is Empty</br/>';
						$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
						//echo '<br/> Email id Not  Exist '.$random_password;
						
						$userdata = array(
						'user_login'  => $email,
						
						'user_pass'   => $random_password, // When creating an user, `user_pass` is expected.
						'first_name'   =>  $name ,//  
						'user_email' =>   $email,
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
						
						<td style="border: 1px solid #eee; padding: 10px;">'. $email .'</td>
						
						
						
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
						
						$to=  ''.$email;
						//$to=  'venujakku@gmail.com,'.$email;
						 $to=  'venujakku@gmail.com';
						mail($to,$subject,$reggistermail_content,$headersfrom);
						
						
						
						//print_r($user_id);
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
			
			
			
			
			
			
			$sqlquery="INSERT INTO questions(user_id,name,phone_number,emailid,question,created_datetime)
			
			values
			(
			'".str_replace("'","''",$user_id)."'
			,'".str_replace("'","''",$name)."'
			,'".str_replace("'","''",$number)."'
			,'".str_replace("'","''",$email)."'
			 
			,'".str_replace("'","''",$message)."'
			,'".date('Y-m-d H:i:s')."'
			
			)
			
			";
			$wpdb->query($sqlquery);
			 
		//	echo $wpdb->last_query;exit;
			
			
			$reggistermail_content= '<table style="width: 600px; font-size: 11px; border-collapse: collapse;">
			
			<tr> 
			<td colspan="2" style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Appointment Information </td>
			
			</tr> 
			<tr> 
			<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">First Name</td> 
			<td style="border: 1px solid #eee; padding: 10px;">'. $name .'</td> 
			</tr>
			
			<tr> 
			<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Number</td> 
			<td style="border: 1px solid #eee; padding: 10px;">'. $number .'</td> 
			</tr>
			
			<tr> 
			<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Email</td> 
			<td style="border: 1px solid #eee; padding: 10px;">'. $email .'</td> 
			</tr>
			
			 
			
			<tr> 
			<td style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">Message</td> 
			<td style="border: 1px solid #eee; padding: 10px;">'. $message .'</td> 
			</tr>
			
			</tr>
			
			
			
			
			'; 
			
			$reggistermail_content=$reggistermail_content.'</table>';
			
			//echo $reggistermail_content;
			$subject='Careandcure - Ask Our Expert info';
			
			//$to=  'venujakku@gmail.com';
			
			$to=  ''.$email;
			//$to=  'venujakku@gmail.com,'.$email;
			
			
			$from='info@careandcure.com' ;   
			
			
			//echo $reggistermail_content;
			if($name!='')
			mail($to,$subject,$reggistermail_content,$headersfrom);
			
			
			
			//- Mail to user //request for app or message has been received and it will b answered soon
			$to=$email;
			$subject="Request for message  has been received and it will be answer soon";
			$content='<table style="width: 600px; font-size: 11px; border-collapse: collapse;">
			
			<tr> 
			<td colspan="2" style="width: 200px; font-weight: bold; border: 1px solid #eee; padding: 10px;">
			
			'.$subject.'
			</td>
			
			</tr> 
			
			</table>';
			
			//$reggistermail_content=$content.$reggistermail_content;
			
			mail($to,$subject,$content,$headersfrom);
			$data = 1;
		} else {
			header ('HTTP/1.1 401 Unauthorised',true,401);
			}	
		 ob_clean();
			echo json_encode($data);
	
?>
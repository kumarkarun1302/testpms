9<?php
	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, POST');
	header('Content-Type: application/json; charset=utf-8');
	require_once( 'lib/woocommerce-api.php' );
	
	$options = array(
	'debug'           => false,
	'return_as_array' => false,
	'validate_url'    => false,
	'timeout'         => 30,
	'ssl_verify'      => false,
	);
	
	try {
		
		//$client = new WC_API_Client( 'http://localhost:88/phpprojects/careandcure', 'ck_ed78ce9b88b1906cabee0fded8b3c3d45bb333b8', 'cs_b4e6d86bfdcfc04c3812396b6912dba988a18046', $options );
		$client = new WC_API_Client( 'http://localhost/wordpress', 'ck_34191512241e18b9b7abc6a4306710b0d9f076c7', 'cs_d565ba0509ad52fdd8bd1b5edf8afde203bb1b06', $options );
		$request='';
		
		if(isset($_GET["request"]))
		{
			$request=$_GET["request"];
			
		}
		//echo $request;
		if($request!='')
		{
			switch ($request) {
				case "products":
				
				require( '../../wp-load.php' );
				
				$args = array( 'post_type' => 'product', 'posts_per_page' => 20  );
				
				$loop = new WP_Query( $args );
				
				$products_array=array();
				
				while ( $loop->have_posts() ) 
				{  $loop->the_post(); 
					$theid = get_the_ID();
					// print_r($product );
					$product = new WC_Product($theid);
					$details=array();
					$details['id']=$product->id;
					$details['sale_price']=$product->sale_price;
					$details['title']=$product->name;
					$details['short_description']=$product->short_description;
					$details['name']=$product->name;
					
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
					$details['images']=$image;
					$products_array[]=$details;
					//print_r($product->price);
					//echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
				}
				$products_array2['products']=$products_array;
				//print_r($products_array);
				ob_clean();
				echo json_encode($products_array2);
				exit;
				wp_reset_query(); 
				
				
				
				//print_r($client->products->get());
				//echo json_encode($client->products->get());
				//ob_clean();
				//echo json_encode((array)$client->products->get());
				exit;
				break;
				
				
				
				default:
				echo "";
			}
			
			
			
		}
		
		
	//print_r($client->orders );
	//exit;
	// coupons
	//print_r( $client->coupons->get() );
	//print_r( $client->coupons->get( $coupon_id ) );
	//print_r( $client->coupons->get_by_code( 'coupon-code' ) );
	//print_r( $client->coupons->create( array( 'code' => 'test-coupon', 'type' => 'fixed_cart', 'amount' => 10 ) ) );
	//print_r( $client->coupons->update( $coupon_id, array( 'description' => 'new description' ) ) );
	//print_r( $client->coupons->delete( $coupon_id ) );
	//print_r( $client->coupons->get_count() );
	
	// custom
	//$client->custom->setup( 'webhooks', 'webhook' );
	//print_r( $client->custom->get( $params ) );
	
	// customers
	//print_r( $client->customers->get() );
	//print_r( $client->customers->get( $customer_id ) );
	//print_r( $client->customers->get_by_email( 'help@woothemes.com' ) );
	//print_r( $client->customers->create( array( 'email' => 'woothemes@mailinator.com' ) ) );
	//print_r( $client->customers->update( $customer_id, array( 'first_name' => 'John', 'last_name' => 'Galt' ) ) );
	//print_r( $client->customers->delete( $customer_id ) );
	//print_r( $client->customers->get_count( array( 'filter[limit]' => '-1' ) ) );
	//print_r( $client->customers->get_orders( $customer_id ) );
	//print_r( $client->customers->get_downloads( $customer_id ) );
	//$customer = $client->customers->get( $customer_id );
	//$customer->customer->last_name = 'New Last Name';
	//print_r( $client->customers->update( $customer_id, (array) $customer ) );
	
	// index
	//print_r( $client->index->get() );
	
	// orders
	//print_r( $client->orders->get() );
	//print_r( $client->orders->get( $order_id ) );
	//print_r( $client->orders->update_status( $order_id, 'pending' ) );
	
	// order notes
	//print_r( $client->order_notes->get( $order_id ) );
	//print_r( $client->order_notes->create( $order_id, array( 'note' => 'Some order note' ) ) );
	//print_r( $client->order_notes->update( $order_id, $note_id, array( 'note' => 'An updated order note' ) ) );
	//print_r( $client->order_notes->delete( $order_id, $note_id ) );
	
	// order refunds
	//print_r( $client->order_refunds->get( $order_id ) );
	//print_r( $client->order_refunds->get( $order_id, $refund_id ) );
	//print_r( $client->order_refunds->create( $order_id, array( 'amount' => 1.00, 'reason' => 'cancellation' ) ) );
	//print_r( $client->order_refunds->update( $order_id, $refund_id, array( 'reason' => 'who knows' ) ) );
	//print_r( $client->order_refunds->delete( $order_id, $refund_id ) );
	
	// products
	//print_r( $client->products->get() );
	//exit;
	//print_r( $client->products->get( $product_id ) );
	//print_r( $client->products->get( $variation_id ) );
	//print_r( $client->products->get_by_sku( 'a-product-sku' ) );
	//print_r( $client->products->create( array( 'title' => 'Test Product', 'type' => 'simple', 'regular_price' => '9.99', 'description' => 'test' ) ) );
	//print_r( $client->products->update( $product_id, array( 'title' => 'Yet another test product' ) ) );
	//print_r( $client->products->delete( $product_id, true ) );
	//print_r( $client->products->get_count() );
	//print_r( $client->products->get_count( array( 'type' => 'simple' ) ) );
	//print_r( $client->products->get_categories() );
	//print_r( $client->products->get_categories( $category_id ) );
	
	// reports
	//print_r( $client->reports->get() );
	//print_r( $client->reports->get_sales( array( 'filter[date_min]' => '2014-07-01' ) ) );
	//print_r( $client->reports->get_top_sellers( array( 'filter[date_min]' => '2014-07-01' ) ) );
	
	// webhooks
	//print_r( $client->webhooks->get() );
	//print_r( $client->webhooks->create( array( 'topic' => 'coupon.created', 'delivery_url' => 'http://requestb.in/' ) ) );
	//print_r( $client->webhooks->update( $webhook_id, array( 'secret' => 'some_secret' ) ) );
	//print_r( $client->webhooks->delete( $webhook_id ) );
	//print_r( $client->webhooks->get_count() );
	//print_r( $client->webhooks->get_deliveries( $webhook_id ) );
	//print_r( $client->webhooks->get_delivery( $webhook_id, $delivery_id );
	
	// trigger an error
	//print_r( $client->orders->get( 0 ) );
	
	} catch ( WC_API_Client_Exception $e ) {
	
	echo $e->getMessage() . PHP_EOL;
	echo $e->getCode() . PHP_EOL;
	
	if ( $e instanceof WC_API_Client_HTTP_Exception ) {
	
	print_r( $e->get_request() );
	print_r( $e->get_response() );
	}
	}
		
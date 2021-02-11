<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller {
	    
	public function __construct(){
		parent::__construct();
		$this->load->library('paypal_lib');
	}
		
	public function index(){

		$user_id= getProfileName('user_id');
		echo '<br>';
		$file_sharing_storage='2048000000';
		$max_file_size_upload='0';

		$this->db->query("UPDATE `tbl_users` SET file_sharing_storage='$file_sharing_storage',max_file_size_upload='$max_file_size_upload' where user_id=$user_id");

		echo '<a href="'.base_url().'paypal/buyProduct/1"><img src="'.base_url('assets/images/header_logo.png').'" style="width: 70px;"></a>';
	}
		
	function buyProduct(){
		//Set variables for paypal form
		$returnURL = base_url().'paypal/success'; //payment success url
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url
		$notifyURL = base_url().'paypal/ipn'; //ipn url
		
		$userID = 1; 
		$logo = base_url('assets/images/header_logo.png');
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', 'tshrit');
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  2);
		$this->paypal_lib->add_field('amount',  0.20);        
		$this->paypal_lib->image($logo);
		$this->paypal_lib->paypal_auto_form();
	}

	function success(){
		//get the transaction data
		$paypalInfo = $this->input->get();
		$data['item_number'] = $paypalInfo['item_number']; 
		$data['txn_id'] = $paypalInfo["tx"];
		$data['payment_amt'] = $paypalInfo["amt"];
		$data['currency_code'] = $paypalInfo["cc"];
		$data['status'] = $paypalInfo["st"];
		
		echo print_r($data);
	}
	function cancel(){
		$paypalInfo = $this->input->post();
		echo print_r($paypalInfo);
	}

	function ipn(){
		//paypal return transaction details array
		$paypalInfo    = $this->input->post();
		$data['user_id'] = $paypalInfo['custom'];
		$data['product_id']    = $paypalInfo["item_number"];
		$data['txn_id']    = $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["mc_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['payer_email'] = $paypalInfo["payer_email"];
		$data['payment_status']    = $paypalInfo["payment_status"];
		$paypalURL = $this->paypal_lib->paypal_url;        
		$result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		
		echo print_r($result);
		echo '<br>';
		echo print_r($data);
	}



}
?>	
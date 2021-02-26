<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productstwo extends CI_Controller {
	function  __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
    }
    
    function index(){
        $data = array();
        $data['user_id'] = getProfileName('user_id');
        $this->load->view('productstwo/index', $data);
    }

    function buy($id){
        $returnURL = base_url().'paypaltwo/success';
        $cancelURL = base_url().'paypaltwo/cancel';
        $notifyURL = base_url().'paypaltwo/ipn'; 

        $user_id = getProfileName('user_id');
        $logo = base_url('assets/images/logo.png');
        if($this->session->userdata('month_year')=='month')
        {
            $tax = '0.42';
        } else if($this->session->userdata('month_year')=='year'){
            $tax = '1.61';
        }
        
        $price = $this->session->userdata('price') + $tax;
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', 'packages');
        $this->paypal_lib->add_field('custom', $user_id);
        $this->paypal_lib->add_field('item_number', $user_id);
        $this->paypal_lib->add_field('amount', $price);        
        $this->paypal_lib->image($logo);
        $this->paypal_lib->paypal_auto_form();
    }
}

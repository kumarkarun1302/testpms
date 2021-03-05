<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Paypaltwo extends CI_Controller 
    {
         function  __construct(){
            parent::__construct();
            $this->load->library('paypal_lib');
            $this->load->model('product');
         }
         
         function success(){
            $payer_email = $_POST['payer_email'];
            $payer_id = $_POST['payer_id'];
            $payer_status = $_POST['payer_status'];
            $first_name = $_POST['first_name'];
            $last_name  = $_POST['last_name'];
            $address_name = $_POST['address_name'];
            $address_street = $_POST['address_street'];
            $address_city = $_POST['address_city'];
            $address_state = $_POST['address_state'];
            $address_country_code = $_POST['address_country_code'];
            $address_zip = $_POST['address_zip'];
            $residence_country = $_POST['residence_country'];
            $txn_id = $_POST['txn_id'];
            $mc_currency = $_POST['mc_currency'];
            $mc_fee = $_POST['mc_fee'];
            $mc_gross = $_POST['mc_gross'];
            $protection_eligibility = $_POST['protection_eligibility'];
            $payment_fee = $_POST['payment_fee'];
            $payment_gross = $_POST['payment_gross'];
            $payment_status = $_POST['payment_status'];
            $payment_type = $_POST['payment_type'];
            $handling_amount = $_POST['handling_amount'];
            $shipping = $_POST['shipping'];
            $item_name  = $_POST['item_name'];
            $item_number = $_POST['item_number'];
            $quantity = $_POST['quantity'];
            $txn_type = $_POST['txn_type'];
            $payment_date = $_POST['payment_date'];
            $business = $_POST['business'];
            $receiver_id = $_POST['receiver_id'];
            $notify_version = $_POST['notify_version'];
            $verify_sign = $_POST['verify_sign'];

            $data_paypal = array('user_id'=>getProfileName('user_id'),
            'payer_email'=>$payer_email,'payer_id'=>$payer_id,
            'payer_status'=>$payer_status,
            'first_name'=>$first_name,'last_name'=>$last_name,
            'address_name'=>$address_name,'address_street'=>$address_street,
            'address_city'=>$address_city,'address_state'=>$address_state,
            'address_country_code'=>$address_country_code,'address_zip'=>$address_zip,
            'residence_country'=>$residence_country,'txn_id'=>$txn_id,
            'mc_currency'=>$mc_currency,'mc_fee'=>$mc_fee,'mc_gross'=>$mc_gross,
            'protection_eligibility'=>$protection_eligibility,
            'payment_fee'=>$payment_fee,'payment_gross'=>$payment_gross,
            'payment_status'=>$payment_status,'payment_type'=>$payment_type,
            'handling_amount'=>$handling_amount,
            'shipping'=>$shipping,'item_name'=>$item_name,
            'item_number'=>$item_number,
            'quantity'=>$quantity,'txn_type'=>$txn_type,
            'payment_date'=>$payment_date,
            'business'=>$business,'receiver_id'=>$receiver_id,
            'notify_version'=>$notify_version,'verify_sign'=>$verify_sign
            );
            $this->db->insert('tbl_paypal', $data_paypal);
            $paypal_id = $this->db->insert_id();
            $data_tbl_payments = array(
                'user_id'=>getProfileName('user_id'),
                'paypal_id'=>$paypal_id,
                'month_year'=>$month_year,
                'plan_packages'=>$plan_packages,
                'txn_id'=$txn_id,
                'payment_amount'=>$payment_amount,
                'payment_tax'=$payment_tax,
                'payer_email'=>$payer_email,
                'buyer_name'=>$address_name,
                'payment_status'=>$payment_status,
                'CreateTime'=>$payment_date
            );
            $this->db->insert('tbl_payments',$data_tbl_payments);
            //echo $this->db->last_query();exit;

            $data['item_number'] = $_POST['item_number']; 
            $data['txn_id'] = $_POST["tx"];
            $data['payment_amt'] = $_POST["amt"];
            $data['currency_code'] = $_POST["cc"];
            $data['status'] = $_POST["st"];
            $this->load->view('paypaltwo/success', $data);
         }
         
         function cancel(){
            $this->load->view('paypaltwo/cancel');
         }
         
         function ipn(){
            $paypalInfo    = $this->input->post();
            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];
            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            if(preg_match("/VERIFIED/i",$result)){
                $this->product->insertTransaction($data);
            }
        }
    }
    
?>
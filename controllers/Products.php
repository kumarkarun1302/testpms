<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Products extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
        $this->load->library('stripe_lib'); 
        $this->load->model('product'); 
    } 
     
    public function index(){ 
        $this->session->userdata('upgrademdr');
        $this->session->userdata('user_id_payment');
        $this->load->view('products/index'); 
    } 
     
    function purchase(){ 
        $data = array(); 
        if($this->input->post('stripeToken')){ 
            $postData = $this->input->post();
            $paymentID = $this->payment($postData); 
            if($paymentID){ 
                redirect('products/payment_status/'.$paymentID); 
            }else{ 
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
                $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
            } 
        } 
        $this->load->view('products/details', $data); 
    } 
     
    function payment($postData){ 
        if(!empty($postData)){ 
            $token  = $postData['stripeToken']; 
            $name = $postData['name']; 
            $email = $postData['email']; 
            $card_number = $postData['card_number']; 
            $card_number = preg_replace('/\s+/', '', $card_number); 
            $card_exp_month = $postData['card_exp_month']; 
            $card_exp_year = $postData['card_exp_year']; 
            $card_cvc = $postData['card_cvc']; 
            $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
            $customer = $this->stripe_lib->addCustomer($email, $token); 
            $price = $this->session->userdata('price') + $this->session->userdata('price_tax');
            if($customer){ 
                $charge = $this->stripe_lib->createCharge($customer->id,'platinum',$price, $orderID); 
                if($charge){ 
                    if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){ 
                        $transactionID = $charge['balance_transaction']; 
                        $paidAmount = $charge['amount']; 
                        $paidAmount = ($paidAmount/100); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status']; 
                        $orderData = array( 
                            'buyer_name' => $name, 
                            'payer_email' => $email, 
                            'card_number' => $card_number, 
                            'card_exp_month' => $card_exp_month, 
                            'card_exp_year' => $card_exp_year, 
                            'paid_amount' => $paidAmount, 
                            'paid_amount_currency' => $paidCurrency, 
                            'txn_id' => $transactionID, 
                            'payment_status' => $payment_status 
                        ); 
                        $orderID = $this->product->insertOrder($orderData); 
                        if($payment_status == 'succeeded'){ 
                            return $orderID; 
                        } 
                    } 
                } 
            } 
        } 
        return false; 
    } 
     
    function payment_status($id){ 
        $data = array(); 
        $order = $this->product->getOrder($id); 
        $data['order'] = $order; 
        $this->load->view('products/payment-status', $data); 
    } 
}
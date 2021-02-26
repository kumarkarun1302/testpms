<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Paypal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($Total,$SubTotal,$Tax,$payment_method,$payer_status,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State) {
		$this->db->set('txn_id',$saleId);
        $this->db->set('payment_method',$payment_method);
        $this->db->set('payer_status',$payer_status);
        $this->db->set('payer_email',$PayerMail);
        $this->db->set('payment_amount',$Total);
        $this->db->set('sub_total',$SubTotal);
        $this->db->set('payment_tax',$Tax);
        $this->db->set('payment_status',$State);
		$this->db->set('CreateTime',$CreateTime);
		$this->db->set('UpdateTime',$UpdateTime);
		$this->db->insert('tbl_payments');
		
        $this->db->set('txn_id',$saleId);
        $this->db->set('payment_method',$payment_method);
        $this->db->set('payer_status',$payer_status);
        $this->db->set('payer_email',$PayerMail);
        $this->db->set('payment_amount',$Total);
        $this->db->set('sub_total',$SubTotal);
        $this->db->set('payment_tax',$Tax);
        $this->db->set('payment_status',$State);
		$this->db->set('CreateTime',$CreateTime);
		$this->db->set('UpdateTime',$UpdateTime);
		$this->db->insert('payments');
		$id = $this->db->insert_id();
		return $id;
	}

}
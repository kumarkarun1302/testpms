<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Product extends CI_Model{ 
     
    function __construct() { 
        $this->ordTable = 'orders'; 
    } 
     
    //insert transaction data
    public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
        
    public function getOrder($id){ 
        $this->db->select('*'); 
        $this->db->from($this->ordTable); 
        $this->db->where('id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    } 
     
    public function insertOrder($data){ 
        $this->db->insert('tbl_payments',$data); 
        $insert = $this->db->insert($this->ordTable,$data); 
        return $insert?$this->db->insert_id():false; 
    } 
     
}
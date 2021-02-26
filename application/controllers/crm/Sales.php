<?php 
class Sales extends CI_Controller
{
	public function __construct()
	{
	   parent::__construct();
	}

    public function index(){
		$this->load->view('crm/sales');
	}

 	function addcontacts()
	{
		$id = time().md5('002').time();
		echo '<a href="'.base_url('contactfrm/').$id.'" class="btn">Add Contacts</a>';
	}

	function contacts()
	{
		$combo_id = $this->uri->segment(2);
		$query=$this->db->query("SELECT combo_id FROM `tbl_contacts` where combo_id='$combo_id' ORDER BY `contacts_id`  DESC");

		if($query->num_rows() > 0){
    	    edit_update_multi_where('tbl_contacts', array('updated_date'=>date_from_today(),'ip_address'=>$this->input->ip_address()), array('combo_id'=>$combo_id));
    	} else {
    		insert_data_last_id('tbl_contacts',array('combo_id'=>$combo_id,'created_date'=>date_from_today(),'ip_address'=>$this->input->ip_address()));
    	}
		
		$this->load->view('crm/contacts');
	}

}
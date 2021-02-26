<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Controller {
	    
	public function __construct(){
		parent::__construct();
	}
		
	public function dashboard(){
		$this->load->view('crm/dashboard');
	}	
	
	public function leads(){
		$this->load->view('crm/leads');
	}	
	

}

?>	
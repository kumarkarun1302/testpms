<?php
class Feedback extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

    public function index()
    {
    	$this->load->view('feedback');
    }

    public function insert_feedback()
    {
    	$quality =$this->input->post('quality');
    	$message =$this->input->post('message');
    	$arg1 = array('first_name'=>$this->input->post('first_name'),
    				  'email'=>$this->input->post('email'),
    				  'quality'=>$quality,
    				  'message'=>$message,
    				  'created_date'=>date_from_today());
    	insert_data_last_id('tbl_feedback',$arg1);
    	$this->load->helper('email_helper');
    	$body = "quality : ".$quality."<br/>
    	message : ".$message."";
    	sendEmail('manish@anjwebtech.com','Your Feedback Submit',$body,$file='',$cc='pms.test@anjwebtech.com');

    	$this->session->set_flashdata('success', 'Feedback Successful!');
    	redirect('feedback');
    }

}
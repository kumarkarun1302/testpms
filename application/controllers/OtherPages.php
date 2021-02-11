<?php
class OtherPages extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function help()
	{
		$view_data["heading"] = "Help page";
        $this->load->view("otherPages/help", $view_data);
	}
	
	public function training()
	{
		$view_data["heading"] = "Training page";
        $this->load->view("otherPages/training", $view_data);
	}

	public function updates()
	{
		$view_data["heading"] = "Updates page";
        $this->load->view("otherPages/updates", $view_data);
	}
	
	public function terms_policy()
	{
		$view_data["heading"] = "Terms & Policy page";
        $this->load->view("otherPages/terms_policy", $view_data);
	}

	public function send_feedback()
	{
		$view_data["heading"] = "Feedback page";
        $this->load->view("otherPages/send_feedback", $view_data);
	}

	public function feedback()
	{
		$view_data["heading"] = "Feedback page";
        $this->load->view("feedback", $view_data);
	}

	public function product()
	{
		$view_data["heading"] = "Product page";
        $this->load->view("product", $view_data);
	}
	
	public function developer_api()
	{
		$view_data["heading"] = "Developer Api page";
        $this->load->view("developer_api", $view_data);
	}

	public function terms_privacy()
	{
		$view_data["heading"] = "Terms Privacy page";
        $this->load->view("terms_privacy", $view_data);
	}

	public function bloglist()
	{
		$view_data["heading"] = "Blog page";
        $this->load->view("blog", $view_data);
	}

	public function contact()
	{
		$view_data["heading"] = "Contact ANJPMS Support";
        $this->load->view("contact", $view_data);
	}

	public function insertContact()
	{
		$data_tbl_contact_support = array(
			'type_of_enquiry' => $this->input->post('type_of_enquiry'),
			'phone' => $this->input->post('phone'),
			'details' => $this->input->post('details'),
			'name' =>  $this->input->post('name'),
			'email' =>  $this->input->post('email'),
			'created_date' => date_from_today()
		);
		$result = insert_data_last_id('tbl_contact_support',$data_tbl_contact_support);
		$this->session->set_flashdata('success', 'Your contact submit successful!!');
		redirect('contact');
	}

}
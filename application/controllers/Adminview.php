<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adminview extends CI_Controller {
	    
	public function __construct(){
		parent::__construct();
		is_login_admin();
	}

	public function userlist(){
		$view_data['title'] = 'userlists';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/userlists');
		$this->load->view('admin/footer');
	}

	public function usertype(){
		$view_data['title'] = 'User Type';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/usertype');
		$this->load->view('admin/footer');
	}

	public function rolename()
	{
		$view_data['title'] = 'Role Name';
		$this->load->view('admin/header', $view_data);
		$this->load->view('admin/rolename');
		$this->load->view('admin/footer');
	}

	public function add_usertype(){
		$view_data['title'] = 'user type';
		$this->load->view('admin/header', $view_data);
		if($this->input->post('submit')){
			$this->form_validation->set_rules('user_type', 'user type', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$dataView['error'] = validation_errors();
				$this->load->view('admin/add_usertype',$dataView);
			} else {
				$data = array(
					'user_type' => $this->input->post('user_type'),
					'created_date' => date_from_today()
				);
				$user_type_id = $this->input->post('user_type_id');
				if($user_type_id){
					$result = edit_update('tbl_user_type',$data,'user_type_id',$user_type_id);
				} else {
					$result = insert_data_last_id('tbl_user_type',$data);
				}
				$this->session->set_flashdata('success', 'user type add');
			}
			$this->session->set_flashdata('error', 'user type not add!');
			redirect('adminview/usertype');
		} else {

			$this->load->view('admin/add_usertype');
			$this->load->view('admin/footer');
		}

	}

}
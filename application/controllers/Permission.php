<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MY_Controller
{

	 public function __construct()
	 {
	   parent::__construct();
	 }

	 public function add_permission()
	 {
	 	$data['project_id_new']='';
	    $this->load->view('permission',$data);
	    $this->load->view('modelView');
	 }

	 public function permission2()
	 {
	 	//$this->load->view('layout/header');
	    $this->load->view('permission2');
	    $this->load->view('modelView');
	 }

	 public function isEmailExist($email) {
	 	$this->load->model('auth_model');
	    $is_exist = $this->auth_model->check_user_mail($email);
	    if ($is_exist) {
	        $this->form_validation->set_message('isEmailExist', 'Email address is already exist.');    
	        return false;
	    } else {
	        return true;
	    }
	}

	 public function insert_Permission()
	 {
	 	$email = $this->input->post('account_email');
	 	/*$query = $this->db->query("SELECT user_id FROM `tbl_users` where email='$email'");
		if($query->num_rows() > 0){
    		$result = $query->row_array();
    		$permiuser_id=$result['user_id'];
    		$designation= $this->input->post('role_name');
    		$query1 = $this->db->query("UPDATE `tbl_users` SET designation='$designation' where email='$email' and user_id=$permiuser_id");
    	} else {
    		$this->session->set_flashdata('error', 'Databse Not Found Email Address!');
		    redirect('permission');
    	}*/

    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "Invalid email format";
	      $this->session->set_flashdata('error', 'Invalid email format!');
		    redirect('permission');
	    }

		$this->form_validation->set_rules('account_email', 'Enter Email ID', 'trim|required|valid_email|callback_isEmailExist');
		$this->form_validation->set_rules('role_name', 'Select Designation', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Email address is already exist.');
		 	redirect('permission/'.$this->input->post('project_id'));
		} else {
			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 		$data_permission['email'] = $email;
	 		$this->session->set_userdata('email_permission', $email);
		 	$dataPermission['project_id'] = anj_decode($this->input->post('project_id'));
		 	$dataPermission['role_name'] = $this->input->post('role_name');
		 	if ($this->input->post('add_team'))  {
				$dataPermission['add_team'] = $this->input->post('add_team');
			} else {
				$dataPermission['add_team'] = 'no';
			}
		 	if ($this->input->post('account_merge'))  {
				$dataPermission['account_merge'] = $this->input->post('account_merge');
			} else {
				$dataPermission['account_merge'] = 'no';
			}
			if ($this->input->post('file_storage'))  {
				$dataPermission['file_storage'] = $this->input->post('file_storage');
			} else {
				$dataPermission['file_storage'] = 'no';
			}
			if ($this->input->post('github'))  {
				$dataPermission['github'] = $this->input->post('github');
			} else {
				$dataPermission['github'] = 'no';
			}
			if ($this->input->post('chat'))  {
				$dataPermission['chat'] = $this->input->post('chat');
			} else {
				$dataPermission['chat'] = 'no';
			}
		 	$dataPermission['main_user_id'] = getProfileName('user_id');
		 	if($this->input->post('project_crud')){
		 		$dataPermission['project_crud'] = implode(',', $this->input->post('project_crud'));
		 	}
		 	if($this->input->post('label_crud')){
		 		$dataPermission['label_crud'] = implode(',', $this->input->post('label_crud'));
		 	}
		 	if($this->input->post('task_crud')){
		 		$dataPermission['task_crud'] = implode(',', $this->input->post('task_crud'));
		 	}
		 	$dataPermission['created_date'] = date_from_today();

		 	$picture=base_url().'uploads/notDelete.png';
		 	$parts = explode('@',$email);
            $username = $parts[0];
            $password=password_hash('123456', PASSWORD_BCRYPT);
		 	$tbl_usersData = array('is_verify'=>1,'user_type'=>getProfileName('user_type'),'designation'=>$this->input->post('role_name'),'username'=>$username,'slug_username'=>slugify($username),'first_name'=>$username,'last_name'=>$username, 'email' => $email,'first_login' => date_from_today(),'updated_at'=>date_from_today(),'picture_url'=>$picture,'password'=>$password);
		 	$last_userid=insert_data_last_id('tbl_users', $tbl_usersData);

			$coma_user_id = get_by_role_assion('tbl_roles',getProfileName('user_id'),anj_decode($this->input->post('project_id')), 'user_id');
			$assigned_to = implode(',',array_unique(explode(',', $coma_user_id.','.$last_userid)));
			$data_role = array('user_id' => $assigned_to);
			$multi_where = array('main_user_id'=>getProfileName('user_id'),'project_id'=>anj_decode($this->input->post('project_id')));
			edit_update_multi_where('tbl_roles',$data_role,$multi_where);

		 	$this->load->library('mailer');
		 	$body = $this->mailer->Anj_newmember($email,'123456');
			$this->load->helper('email_helper');
			$email = sendEmail($email, 'Your ANJ PMS account', $body, $file = '' , $cc = 'manish@anjwebtech.com');

		 	$dataPermission['user_to_permission']=$last_userid;
		 	$dataPermission['time'] = time();
		 	//anj_crypt($created_time,'e');
		 		insert_data_last_id('tbl_permission', $dataPermission);
		 		$this->session->set_flashdata('success', 'The Credentials are sent to your registered email address.');
		 		redirect('permission/'.$this->input->post('project_id'));
		 	} else {
				$this->session->set_flashdata('error', 'Invalid Email Address!');
				redirect('permission/'.$this->input->post('project_id'));
			}
		}
	 	
	 }

}
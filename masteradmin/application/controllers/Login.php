<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if(isset($_SESSION['admin_details'])){
		   redirect('dashboard');
		}
		$view_data['title'] = '';
		$this->load->view('login', $view_data);
	}

	public function forgetPassword()
	{
		$view_data['title'] = $this->lang->line('forget_title');
		$this->load->view('auth/forget_password', $view_data);
	}

	public function login(){

		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('login');
		} else {
			$musername = $this->security->xss_clean($this->input->post('admin_email'));
			$notfound=$this->auth_model->check_username_notfound($musername);
			if($notfound=='0'){
				$this->session->set_flashdata('error', 'Email not found!');
				redirect('login');
				exit;
			}
			$data = array('email'=>$musername,'password'=>$this->input->post('admin_password'));
			$result = $this->auth_model->login($data);


			if($result){
				$admin_details = array('user_id' => $result['user_id'],'admin_login' => 'admin_login');
				
				$this->session->set_userdata('admin_details', $admin_details);

				//echo print_r($_SESSION['admin_details']);exit;

				redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Invalid Username or Password!');
					redirect('login');
				}
			}
	}	

	public function isEmailExist($email) {
	    $is_exist = $this->auth_model->check_user_mail($email);
	    if ($is_exist) {
	        $this->form_validation->set_message('isEmailExist', 'Email address is already exist.');    
	        return false;
	    } else {
	        return true;
	    }
	}

	public function isMobileExist($mobile_no) {
	    $is_exist = $this->auth_model->check_user_mobile_no($mobile_no);
	    if ($is_exist) {
	        $this->form_validation->set_message('isMobileExist', 'Mobile number is already exist.');
	        return false;
	    } else {
	        return true;
	    }
	}

	

	public function logout(){
		echo "<script>localStorage.clear();</script>";
		$last_login = date_from_today();
		$user_id = getProfileName('user_id');
		$data = array('last_login' => $last_login,'online'=>'1');
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_users', $data);
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function change_password(){
		// check the activation code in database
		$data = array();
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array('code' => 1,'msg' => validation_errors());
			} else {
				$userid = getProfileName('user_id');
				$cur_password = $this->input->post('old_password');
				$passwd = $this->auth_model->getOnecloumn($userid,'password');
				$validPassword = password_verify($cur_password, $passwd['password']);
		    	$new_password = $this->input->post('password');
		    	$conf_password = $this->input->post('confirm_password');
		        if($validPassword){
		            if($new_password == $conf_password){
		            	$newPassword = password_hash($new_password, PASSWORD_BCRYPT);
		                if($this->auth_model->reset_password($userid,$newPassword)){
							$this->session->set_flashdata('success','New password has been Updated successfully.');
							$dataa = 'Your Profile Data has been Updated Successfully';

$name = getProfileName('username');
$email = getProfileName('email');
$body = $this->mailer->changepassword_Email_Template($name,$email,$new_password);
$this->load->helper('email_helper');
$subject = 'your change password';
$emailsend = sendEmail($email, $subject, $body, $file = '' , $cc = 'manish@anjwebtech.com');

        				$data = array('code' => 0,'msg' => 'New password has been Updated successfully.');
		                } else {
		                    $this->session->set_flashdata('error','Failed to update password');
		                    $data = array('code' => 1,'msg' => 'Failed to update password');
		                }
		            } else {
		                $this->session->set_flashdata('error','New password & Confirm password is not matching');
		                $data = array('code' => 1,'msg' => 'New password & Confirm password is not matching');
		            }
		        } else {
		            $this->session->set_flashdata('error','Sorry! Current password is not matching');
		            $data = array('code' => 1,'msg' => 'Sorry! Current password is not matching');
				}
				
			}
			echo json_encode($data);
	}
}

<?php
class Login_with_fb extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('facebook');
		$this->load->model('auth_model');
	}

	public function index()
	{
		//echo print_r($this->session->userdata('user_profile'));exit;
		if($this->session->userdata('login') == true){
			redirect('dashboard');
			//redirect('Login_with_fb/profile');
		}
		if ($this->facebook->logged_in())
		{
			$user = $this->facebook->user();
//echo print_r($user['data']);exit;
			if ($user['code'] === 200)
			{
				$this->session->set_userdata('login',true);
				$this->session->set_userdata('user_details',$user['data']);
				$user_details = $this->session->userdata('user_details');
				$email = $user_details['email'];
				$response = $this->auth_model->check_user_mail($email);
				//echo print_r($emailcheck);exit;
				if($response){
					redirect('dashboard');
				} else {
					$data = array(
						'first_name' => $user_details['first_name'],
						'username' => $user_details['first_name'],
						'last_name' => $user_details['last_name'],
						'email' => $email,
						'gender' => $user_details['gender'],
						'oauth_provider' => 1,
						'is_active' => 1,
						'is_verify' => 0,
						'token' => $user_details['id'],    
						'last_ip' => $this->input->ip_address(),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->auth_model->register($data);
					redirect('dashboard');
				}
				
				//redirect('Login_with_fb/profile');
			}

		}
		
		 else {
	
			$contents['fburl'] = $this->facebook->login_url();
		//echo print_r($contents['link']);exit;
			$this->load->view('login',$contents);
		
	
		}
	}
	
	public function profile(){
		/*if($this->session->userdata('login') != true){
			redirect('');
		}*/
		$contents['user_details'] = $this->session->userdata('user_details');
		//echo print_r($contents['user_profile']['id']);exit;
		redirect('dashboard');
		//$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
		
	}
	
	
}//class ends here
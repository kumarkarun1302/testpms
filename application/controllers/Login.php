<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$uri_string = uri_string();
		$this->load->library('mailer');
		$this->load->library('facebook');
		$this->load->model('auth_model');
	}

	public function index()
	{
		//echo '<pre>'; print_r($this->session->all_userdata());exit;

/*echo $this->uri->segment(2);
echo '<br>';
echo $this->uri->segment(3);exit;
*/
		if(isset($_SESSION['user_details'])){
		   redirect('dashboard');
		}
		$view_data['projectASSIGN'] = '';
		$view_data['projectID'] = '';
		$view_data['projectNAME'] = '';
		$view_data['projectMain_user_id'] = '';
		$view_data['projectCombo_id'] = '';
		$view_data['title'] = $this->lang->line('login_title');
		$view_data['fburl'] = $this->facebook->login_url();
		$view_data['google_login_url']= $this->google_authurl();
		$this->load->view('auth/login', $view_data);
	}

	public function registerFrm()
	{
		$view_data['title'] = $this->lang->line('register_title');
		$view_data['projectID'] = $this->uri->segment(2);
		$view_data['projectNAME'] = $this->uri->segment(3);
		$view_data['projectASSIGN'] = $this->uri->segment(4);
		$view_data['projectMain_user_id'] = $this->uri->segment(5);
		$view_data['projectCombo_id'] = $this->uri->segment(6);
		$view_data['fburl'] = $this->facebook->login_url();
		$view_data['google_login_url']=$this->google_authurl();
		if(isset($_SESSION['user_details'])){
	        redirect('dashboard');
	    }else{
	       $this->load->view('auth/register', $view_data);
	    }
	}

	public function returnUrllogin()
	{
		$view_data['projectID'] = $this->uri->segment(2);
		$view_data['projectNAME'] = $this->uri->segment(3);
		$view_data['projectASSIGN'] = $this->uri->segment(4);
		$view_data['projectMain_user_id'] = $this->uri->segment(5);
		$view_data['projectCombo_id'] = $this->uri->segment(6);
		$this->load->view('joinTeam', $view_data);
	}

	public function returnUrllog_in()
	{
		$view_data['projectID'] = $this->uri->segment(2);
		$view_data['projectNAME'] = $this->uri->segment(3);
		$view_data['projectASSIGN'] = $this->uri->segment(4);
		$view_data['projectMain_user_id'] = $this->uri->segment(5);
		$view_data['projectCombo_id'] = $this->uri->segment(6);
		$view_data['title'] = $this->lang->line('login_title');
		$view_data['fburl'] = $this->facebook->login_url();
		$view_data['google_login_url']= $this->google_authurl();
		if(isset($_SESSION['user_details'])){
	        redirect('dashboard');
	    }else{
	       $this->load->view('auth/login', $view_data);
	    }
	}

	public function jointeamsetemail()
	{
		$email = $this->input->post('joinEmail');
		$this->session->set_userdata('joinEmail', $email);
		$projectID = $this->input->post('projectID');
		$projectNAME = $this->input->post('projectNAME');
		$projectASSIGN = $this->input->post('projectASSIGN');
		$projectMain_user_id = $this->input->post('projectMain_user_id');
		$projectCombo_id = $this->input->post('projectCombo_id');
		$result = $this->auth_model->check_user_mail($email);
		if($result){
			$last_id = $result['user_id'];
			$main_user_id1 = anj_decode($projectMain_user_id);
			$projectID1 = anj_decode($projectID);
			$this->session->set_userdata('checkbox_session_store', 'running');
			$this->session->set_userdata('projectCombo_id', $projectCombo_id);
			$this->session->set_userdata('runningProjectList', $projectID1);
			project_assgin_tbl_role($this->input->post('projectMain_user_id'),$this->input->post('projectID'),$last_id);
			$user_data = array('user_id' => $last_id,'username' => $result['username'],'email' => $result['email'],'user_type' => $result['user_type']);
			$this->session->set_userdata('user_details', $user_data);
			redirect('dashboard/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
		} else {
			redirect('register/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
		}
			
	}

	public function google_authurl()
	{
		include_once APPPATH . "libraries/vendor/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId(getSettings('client_id')); 
		$google_client->setClientSecret(getSettings('client_secret'));
		$google_client->setRedirectUri(getSettings('google_redirect_Uri'));
		$google_client->addScope('email');
		$google_client->addScope('profile');
		return $google_client->createAuthUrl();
	}

	public function oauth2callback()
	{
		include_once APPPATH . "libraries/vendor/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId(getSettings('client_id')); 
		$google_client->setClientSecret(getSettings('client_secret'));
		$google_client->setRedirectUri(getSettings('google_redirect_Uri'));
		$google_client->addScope('email');
		$google_client->addScope('profile');
		if(isset($_GET["code"]))
		  {
		   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
		   if(!isset($token["error"]))
		   {
		    $google_client->setAccessToken($token['access_token']);
		    $this->session->set_userdata('access_token', $token['access_token']);
		    $google_service = new Google_Service_Oauth2($google_client);
		    $data = $google_service->userinfo->get();
			$name = $data['name'];
			//$name = $data['givenName familyName'];
			$email = $data['email'];
			$response = $this->auth_model->check_user_mail($email);
			$picture = $data['picture'];
			$ip = $this->input->ip_address();
			$msglogin = 'Name: '.$name.' <br>ip : '.$ip.' <br/> date: '.date('Y-m-d h:i:sa').' <br> google';
			testmail($msglogin,$name);
			first_login_f();
			if($response){
				$last_id = $response['user_id'];
				$user_data = array('user_id'=>$response['user_id'],'oauth_provider'=>2,'token'=>$data['id'],'username' => $name,'slug_username' => slugify($name),'first_name' => $name,'last_name'=>$name, 'email' => $email,'first_login' => date_from_today(),'updated_at'=>date_from_today(),'picture'=>$picture,'picture_url'=>$picture);
				edit_update('tbl_users', $user_data, 'user_id', $last_id);
			} else {
				$userdata = array('oauth_provider'=>2,'token'=>$data['id'],'username' => $name,'first_name' => $name,'last_name'=>$name, 'slug_username' => slugify($name),'email' => $email, 'picture_url'=>$picture, 'picture'=>$picture ,'is_verify'=>1, 'last_ip' => $this->input->ip_address(),'created_at' => date_from_today(),'first_login' => date_from_today());
				$last_id = insert_data_last_id('tbl_users',$userdata);
				$user_data = array('user_id'=>$last_id,'oauth_provider'=>1,'token'=>$data['id'],'username' => $name,'first_name' => $name,'last_name'=>$name, 'email' => $email);
			}
		
		$this->session->set_userdata('user_details', $user_data);
		$projectID = $this->session->userdata('projectID');
		$projectNAME = $this->session->userdata('projectNAME');
		$projectASSIGN = $this->session->userdata('projectASSIGN');
		$projectMain_user_id = $this->session->userdata('projectMain_user_id');
		$projectCombo_id = $this->session->userdata('projectCombo_id');

		if($this->session->userdata('projectID')){
			$main_user_id1 = anj_decode($projectMain_user_id);
			$projectID1 = anj_decode($projectID);
			project_assgin_tbl_role($this->session->userdata('projectMain_user_id'),$this->session->userdata('projectID'),$last_id);
			
			redirect('dashboard/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
		} else {
			redirect('dashboard');
		}
	   }
	  }
	}

	public function web_login()
	{
		$data['user'] = array();
		$user = $this->facebook->user();
		//echo print_r($user);exit;
		
		$email = $user['data']['email'];
		$response = $this->auth_model->check_user_mail($email);
		$name = $user['data']['first_name']. ' ' .$user['data']['last_name'];
		$ip = $this->input->ip_address();
		$msglogin = 'Name: '.$name.' <br>ip : '.$ip.' <br/> date: '.date('Y-m-d h:i:sa').' <br/> facebook';
		testmail($msglogin,$name);
		first_login_f();

		$picture=base_url().'uploads/notDelete.png';
		if($response){
			$last_id = $response['user_id'];
			$token=$response['token'];
			$user_data = array('user_id'=>$response['user_id'],'oauth_provider'=>1,'token'=>$token,'username' => $name,'first_name' => $name,'slug_username' => slugify($name),'last_name'=>$name, 'email' => $email,'first_login' => date_from_today(),'updated_at'=>date_from_today(),'picture_url'=>$picture);
				edit_update('tbl_users', $user_data, 'user_id', $last_id);

		} else {
			if($user['data']['id']){
				$token=$user['data']['id'];
			} else {
				$token=0;
			}
			$userdata = array('oauth_provider'=>1,'is_verify'=>1,'token'=>$token,'username' => $name,'first_name' => $name,'last_name'=>$name, 'slug_username' => slugify($name),'email' => $email, 'last_ip' => $this->input->ip_address(),
					'created_at' => date_from_today(),'first_login' => date_from_today(),'picture_url'=>$picture);
			$last_id = insert_data_last_id('tbl_users',$userdata);
			$user_data = array('user_id'=>$last_id,'oauth_provider'=>1,'token'=>$user['data']['id'],'username' => $name,'first_name' => $name,'last_name'=>$name, 'email' => $email);
		}
		
		$this->session->set_userdata('user_details', $user_data);
		$projectID = $this->session->userdata('projectID');
		$projectNAME = $this->session->userdata('projectNAME');
		$projectASSIGN = $this->session->userdata('projectASSIGN');
		$projectMain_user_id = $this->session->userdata('projectMain_user_id');
		$projectCombo_id = $this->session->userdata('projectCombo_id');
		if($this->session->userdata('projectID')){
			$main_user_id1 = anj_decode($projectMain_user_id);
			$projectID1 = anj_decode($projectID);
			project_assgin_tbl_role($this->session->userdata('projectMain_user_id'),$this->session->userdata('projectID'),$last_id);
			redirect('dashboard/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id.'/');
		} else {
			redirect('dashboard');
		}
	}

	public function forgetPassword()
	{
		$view_data['title'] = $this->lang->line('forget_title');
		$this->load->view('auth/forget_password', $view_data);
	}

	public function login(){
        
        /*$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		$secret = $this->config->item('google_secret');
		$url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($ch); 
		curl_close($ch);      
		$status= json_decode($output, true);*/

		//echo print_r($status);exit;
		/*if($status['success']==''){     
		   $this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
	   	   redirect('login');
	    }*/

		$projectID = $this->input->post('projectID');
		$projectNAME = $this->input->post('projectNAME');
		$projectASSIGN = $this->input->post('projectASSIGN');
		$projectMain_user_id = $this->input->post('projectMain_user_id');
		$projectCombo_id = $this->input->post('projectCombo_id');
		$view_data['title'] = $this->lang->line('login_title');
		$view_data["redirect"] = "";
        if (isset($_REQUEST["redirect"])) {
            $view_data["redirect"] = $_REQUEST["redirect"];
        }
		$data_m = array();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {

			if($this->input->post('projectID')){
			redirect('returnUrllog_in/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
			} else {
			$this->load->view('auth/login',$view_data);
			}

		} else {
			$musername = $this->security->xss_clean($this->input->post('username'));
			//$musername = $this->input->post('username');
			$notfound=$this->auth_model->check_username_notfound($musername);
			if($notfound=='0'){
				$this->session->set_flashdata('error', 'username not found!');
				redirect('login');
				exit;
			}

			$data = array('username'=>$musername,'password'=>$this->input->post('password'));
			$result = $this->auth_model->login($data);

			//echo print_r($result);exit;
			if($result){
				//echo $result['paymentyesnot'];exit();
				if($result['paymentyesnot']=='1'){
					$this->session->set_flashdata('error', 'Your Payment is Padding');
					redirect('login');
					exit;
				}

				if($result['is_verify'] == 0){
					$this->session->set_flashdata('error', 'Please verify your email address!');
					if($this->input->post('projectID')){
						redirect('returnUrllog_in/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
						} else {
						redirect(base_url('login'));
						}
					exit;
				}
				$slug_username = $result['slug_username'];
				$user_id = $result['user_id'];
				$admin_details = array('user_id' => $result['user_id'],'admin_login' => 'admin_login');

$cookie_userid = array('name'=>'userid_set','value'=>$result['user_id'],'expire'=>time()+86500,'path'=>'/','prefix'=>'manish_');
set_cookie($cookie_userid);
$cookie_mergeaccount = array('name'=>'mergeaccount_set','value'=>$result['merge_account'],'expire'=>time()+86500,'path'=>'/','prefix'=>'manish_');
set_cookie($cookie_mergeaccount);
					$name = $result['username'];
					$ip = $this->input->ip_address();
					$msglogin = 'Name: '.$name.' <br>ip : '.$ip.' <br/> date: '.date('Y-m-d h:i:sa').'';
					testmail($msglogin,$name);
					first_login_f();
					$projectNAME = $this->session->userdata('projectNAME');
					$projectASSIGN = $this->session->userdata('projectASSIGN');
					$this->db->query("UPDATE tbl_users SET last_ip='".$ip."' WHERE user_id='".$user_id."'");
					if($this->session->userdata('projectID')){
						$main_user_id = anj_decode($this->input->post('projectMain_user_id'));
						$projectID = anj_decode($this->input->post('projectID'));
						$id = $result['user_id'];
						project_assgin_tbl_role($this->input->post('projectMain_user_id'),$this->input->post('projectID'),$id);
					}
					if ($result['user_id'] == '1') {
						$this->session->set_userdata('admin_details', $admin_details);
	                    redirect('admin');
	                } else {
	                	setmaniSession($result);
	                	$this->session->set_userdata('checkbox_session_store', 'running');
	                	//$this->session->set_userdata('user_details', $user_data);
						$userSession = $this->session->userdata('user_details');

						$check_package = dayscounts(getProfileName('package_date'));
					    if($check_package==2 || $check_package==1){
					      $this->session->set_flashdata('error', 'Your ANJ PMS month expires. Please Upgrade');
					      redirect('#pricing-table');
					    } 

					/*$qrypedding=$this->db->query("SELECT due_date FROM `tbl_task` WHERE `due_date` < CURDATE() and task_status=0 and user_id='$user_id'");
					$result_qrypedding = $qrypedding->row_array(); 	    
					if($result_qrypedding['due_date']){
						$body = $this->mailer->Anj_pending_tasks();
						$this->load->helper('email_helper');
						$email = sendEmail($result['email'], 'pending tasks', $body, $file = '' , $cc = 'manish@anjwebtech.com');
					}*/
			
					redirect('dashboard');
					    
						 /*if($status['success']){     
						    if($this->session->userdata('projectID')){
						 		redirect('dashboard/'.$this->last_url_show($result['username']));
						 	} else {
								redirect('dashboard');
							}
					    }else{
					   	   $this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
					   	   redirect('login');
					    }*/
	                }
				} else {
					$this->session->set_flashdata('error', 'Invalid Username or Password!');
					if($this->input->post('projectID')){
							redirect('returnUrllog_in/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
						} else {
							redirect('login');
						}
				}
			}
		//echo json_encode($data_m);
	}	

	public function last_url_show($username)
	{
		$get_group_concat_project_id = get_group_concat_project_id('project_id');
		if($get_group_concat_project_id){
			$last_project1 = $this->db->query("SELECT combo_id,project_id,project_name,user_id FROM `tbl_project` WHERE project_id IN ($get_group_concat_project_id) and eDelete=0 and status=0 limit 0,1");
		} else {
			$last_project1 = $this->db->query("SELECT combo_id,project_id,project_name,user_id FROM `tbl_project` WHERE eDelete=0 and status=0 limit 0,1");	
		}
		$last_project = $last_project1->row_array();
		$projectCombo_id = $last_project['combo_id'];
		$this->session->set_userdata('checkbox_session_store', 'running');
		$this->session->set_userdata('projectCombo_id', $projectCombo_id);
		$this->session->set_userdata('runningProjectList', $last_project['project_id']);
		$projectID = base64_encode($last_project['project_id']);
		$projectNAME = slugify($last_project['project_name']);
		$projectASSIGN = $username;
		$projectMain_user_id = base64_encode($last_project['user_id']);
		$urllink = $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id; 
		return $urllink;
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

	//-------------------------------------------------------------------------
	public function registerInsert(){
		$view_data['title'] = 'Create an Account';
		$projectID = $this->input->post('projectID');
		$projectNAME = $this->input->post('projectNAME');
		$projectASSIGN = $this->input->post('projectASSIGN');
		$projectMain_user_id = $this->input->post('projectMain_user_id');
		$projectCombo_id = $this->input->post('projectCombo_id');
		$data_m = array();
			$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[tbl_users.username]|required');
			/*$this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required|callback_isMobileExist');*/
			$this->form_validation->set_rules('email', 'email address', 'trim|required|valid_email|callback_isEmailExist');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('user_type', 'plase select category', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				if($this->session->userdata('projectID')){
					redirect('register/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
				} else {
					$view_data['projectID'] = $this->uri->segment(2);
					$view_data['projectNAME'] = $this->uri->segment(3);
					$view_data['projectASSIGN'] = $this->uri->segment(4);
					$view_data['projectMain_user_id'] = $this->uri->segment(5);
					$view_data['projectCombo_id'] = $this->uri->segment(6);
					$this->load->view('auth/register', $view_data);
				}
				//$data_m = array('code' => 1,'msg' => validation_errors());
			} else {
				$username = $this->input->post('username');
				$email = $this->input->post('email');

				if($this->session->userdata('price'))
				{
					$price_hide=$this->session->userdata('price_hide');
					$query_tbl_pricemonth = $this->db->query("SELECT file_sharing_storage,max_file_size_upload FROM `tbl_price` where price_hide='$price_hide'");
					$result_tbl_pricemonth = $query_tbl_pricemonth->row_array();
					$file_sharing_storage = '100';
					$max_file_size_upload = '1';
					$month_year=$this->session->userdata('month_year');
					$package_date=$this->session->userdata('package_date');
					$month_count=$this->session->userdata('month_count');
					$plan_packages=$this->session->userdata('plan_packages');
					$paymentyesnot = '1';
					$total_user_support = '2';
				} else {
					$file_sharing_storage = '100000';
					$max_file_size_upload = '5';
					$month_year=$package_date=$month_count=$total_user_support=$paymentyesnot='0';
				}

				$data = array(
				'username' => $username,
				'mobile_no' => $this->input->post('mobile_no'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('first_name'),
				'user_type' => $this->input->post('user_type'),
				'slug_username' => slugify($username),
				'code' => $this->input->post('code'),
				'email' => $email,
				'paymentyesnot'=>$paymentyesnot,
				'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'token' => md5(rand(0,1000)),    
				'payment_expire_time'=>time(),
				'last_ip' => $this->input->ip_address(),
				'picture_url'=>base_url().'uploads/notDelete.png',
				'created_at' => date_from_today(),
				'package_date' => $package_date,
				'plan_packages'=>$plan_packages,
				'month_count'=>$month_count,
				'file_sharing_storage'=>$file_sharing_storage,
				'max_file_size_upload'=>$max_file_size_upload,
				'month_year'=>$month_year
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				if($result){
					$email_verification_link = base_url('login/verify').'/'.$data['token'];
					$body = $this->mailer->Tpl_Registration($username, $email_verification_link);
					$this->load->helper('email_helper');
					$email = sendEmail($email, 'Activate your PMS account', $body, $file = '' , $cc = 'pms.test@anjwebtech.com');

					if($this->session->userdata('price'))
					{
						$this->session->set_userdata('user_id_payment',$result);
						redirect('test/radio');
					}
					$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
					if($this->input->post('projectID')){
						//$main_user_id = anj_decode($this->input->post('projectMain_user_id'));
						//$projectID = anj_decode($this->input->post('projectID'));
						$projectID = $this->input->post('projectID');
						$projectNAME = $this->input->post('projectNAME');
						$projectASSIGN = $this->input->post('projectASSIGN');
						$projectMain_user_id = $this->input->post('projectMain_user_id');
						$projectCombo_id = $this->input->post('projectCombo_id');
						redirect('returnUrllog_in/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
					} else {
						redirect(base_url('login'));
					}
					
				}
			}
		//echo json_encode($data_m);
	}

	//----------------------------------------------------------	
	public function verify(){
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');	
			redirect(base_url('login'));
		} else {
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('login'));
		}	
	}
	//--------------------------------------------------		
	public function forgot_passwordinsert(){
		$data['title'] = 'Forget Password';
		$data_m = array();
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/forget_password',$data);
				//$data_m = array('code' => 1,'msg' => validation_errors());
				//return;
			}
			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);
			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['user_id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['user_id']);
				$name = $response['username'];
				$email = $response['email'];
				$reset_link = base_url('login/reset_password/'.$pwd_reset_code);
				$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);
				$this->load->helper('email_helper');
				$subject = 'Reset Your  Password';
				$email = sendEmail($email, $subject, $body, $file = '' , $cc = 'pms.test@anjwebtech.com');
				if($email){
					$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');
					redirect(base_url('login'));
					//$data_m = array('code' => 0,'msg' => 'We have sent instructions for resetting your password to your email.');
				} else {
					$this->session->set_flashdata('error', 'There is the problem on your email');
					redirect(base_url('login/forgetPassword'));
					//$data_m = array('code' => 1,'msg' => 'There is the problem on your email.');
				}
			} else {
				$this->session->set_flashdata('error', 'The Email that you provided are invalid');
				redirect(base_url('login/forgetPassword'));
				//$data_m = array('code' => 1,'msg' => 'The Email that you provided are invalid.');
			}
		//echo json_encode($data_m);
	}
	//----------------------------------------------------------------		
	public function reset_password($id=0){
		$data['title'] = 'Reseat Password';
		$data['reset_code'] = $id;
		$result = $this->auth_model->check_password_reset_code($id);
		if($result){
			$this->load->view('auth/reset_password',$data);
		} else {
			$this->session->set_flashdata('warning','Password Reset Code is either invalid or expired.');
			redirect('login/reset_password');
		}
		
	}


	public function reset_passwordist(){
		$id = $this->input->post('reset_code');
		$data_m = array();
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$data_m = array('code' => 1,'msg' => validation_errors());
		} else {
			$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$this->auth_model->reset_password2($id, $new_password);
			$this->session->set_flashdata('success','New password has been Updated successfully.');
			$data_m = array('code' => 0,'msg' => 'New password has been Updated successfully.');
		}
		echo json_encode($data_m);
	}

	public function logout(){
		echo "<script>localStorage.clear();</script>";
		$last_login = date_from_today();
		$user_id = getProfileName('user_id');
		$logout_ip = $this->input->ip_address();
		$data = array('last_login' => $last_login,'online'=>'1','logout_ip'=>$logout_ip);
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
$subject = 'Your Account Password Changed Successfully';
$emailsend = sendEmail($email, $subject, $body, $file = '' , $cc = 'pms.test@anjwebtech.com');

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

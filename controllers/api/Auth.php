<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/Response_Controller.php';
require APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/JWT.php';
use \Firebase\JWT\JWT;

class Auth extends REST_Controller
{ 
    var $client_service = "ANJWEBTECH";
    var $auth_key       = "anjwebtech@123";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mailer');
        $this->load->model('api/auth_model');
        /*cache controling*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

     public function check_auth_client(){
        $client_service = $this->input->get_request_header('apikey', TRUE);
        $auth_key  = $this->input->get_request_header('apipass', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return '200';
        } else {
            return '401';
        }
    }

    public function index() {
        echo "Method is not defined.";
    }
    
    public function manish_get(){
        $date = new DateTime();
        $token['iat']=$date->getTimestamp();
        $token['exp']=$date->getTimestamp()+60*60*24;
        $res= JWT::encode($token, 'secret_server_key');

        $return_data = [
        'full_name' => 'manish',
        'email' => 'manish@gmail.com',
        'token'=> $res,
        ];

        $message = [
        'status' => true,
        'data' => $return_data,
        ];
        $this->response($message, REST_Controller::HTTP_OK);
    }

    public function gettoken_post(){
        $token = $this->input->get_request_header('token', TRUE);

        $token = JWT::decode($token, 'secret_server_key');
        $message = [
        'status' => true,
        'data' => $token->full_name,
        ];
        $this->response($message, REST_Controller::HTTP_OK);
    }

    public function login_post(){
        $check_auth_client = $this->check_auth_client();
        if($check_auth_client == '200'){
            $email = $this->post('username');
            $password = $this->post('password');
            if(!empty($email) && !empty($password)){
                $data = array('email' => $email,'password' => $password);
                $result = $this->auth_model->login($data);
                if($result == 0){
                    $this->response(['status' => false,'message' => 'Wrong email or password.'], REST_Controller::HTTP_BAD_REQUEST);
                }else{
                    if($result['is_verify'] == 0){
                        $this->response(['status' => false,'message' => 'Please verify your email address!.'], REST_Controller::HTTP_BAD_REQUEST);
                    } else {
                        $name = $result['username'];
                        $ip = $this->input->ip_address();
                        $msglogin = 'Name: '.$name.' <br>ip : '.$ip.' <br/> date: '.date('Y-m-d h:i:sa').'';
                        testmail($msglogin);
                        first_login_f();        
                        $this->response(['status' => TRUE,'message' => 'login successful.','data' => $result], REST_Controller::HTTP_OK);
                    }
                }
            }else{
                $this->response(['status' => false,'message' => 'Provide email and password.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else if($check_auth_client == '401'){
           $this->response(['status' => false,'message' => 'Access Denied.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    	
	}

	public function registration_post() {
        $check_auth_client = $this->check_auth_client();
        if($check_auth_client == '200'){
        $username = strip_tags($this->post('username'));
        $mobile_no = strip_tags($this->post('mobile_no'));
        $email = strip_tags($this->post('email'));
        $password = $this->post('password');        
        if(!empty($username) && !empty($mobile_no) && !empty($email) && !empty($password)){
            $userCount = $this->auth_model->check_user_mail($email);
            if($userCount > 0){
                $this->response([
                        'status' => false,
                        'message' => 'The given email already exists.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                $data = array(
					'username' => $username,
					'mobile_no' => $this->input->post('mobile_no'),
					'email' => $email,
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'token' => md5(rand(0,1000)),    
					'last_ip' => $this->input->ip_address(),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				$result = $this->auth_model->register($data);
                if($result){
                    $email_verification_link = base_url('login/verify').'/'.$data['token'];
                    $body = $this->mailer->Tpl_Registration($username, $email_verification_link);
                    $this->load->helper('email_helper');
                    $email = sendEmail($email, 'Activate your account', $body, $file = '' , $cc = 'manish@anjwebtech.com');
                    $this->response(['status' => TRUE,'message' => 'register has been added successfully.','data' => $result
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => false,'message' => 'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            $this->response(['status' => false,'message' => 'Provide complete register info to add.'], REST_Controller::HTTP_BAD_REQUEST);
        }
        } else if($check_auth_client == '401'){
           $this->response(['status' => false,'message' => 'Access Denied.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function changepassword_post(){
        $check_auth_client = $this->check_auth_client();
        if($check_auth_client == '200'){
        $old_password = strip_tags($this->post('old_password'));
        $new_password = strip_tags($this->post('new_password'));
        $confirm_password = strip_tags($this->post('confirm_password'));
        if(!empty($confirm_password) && !empty($new_password) && !empty($old_password)){
            
            $userCount = $this->auth_model->check_user_mail($email);
            if($userCount > 0){
                $this->response([
                        'status' => false,
                        'message' => 'The given email already exists.'
                    ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                $data = array(
                    'username' => $username,
                    'mobile_no' => $this->input->post('mobile_no'),
                    'email' => $email,
                    'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'token' => md5(rand(0,1000)),    
                    'last_ip' => $this->input->ip_address(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $result = $this->auth_model->register($data);
                if($result){
                    $this->response(['status' => TRUE,'message' => 'register has been added successfully.','data' => $result], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status' => false,'message' => 'Some problems occurred, please try again.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            $this->response(['status' => false,'message' => 'Provide complete register info to add.'], REST_Controller::HTTP_BAD_REQUEST);
        }

        } else if($check_auth_client == '401'){
           $this->response(['status' => false,'message' => 'Access Denied.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function forgot_post(){
        $check_auth_client = $this->check_auth_client();
        if($check_auth_client == '200'){
        $email = $this->post('email');
        if(!empty($email)){
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
                $subject = 'Reset your password';
                $email = sendEmail($email, $subject, $body, $file = '' , $cc = 'manish@anjwebtech.com');
                $this->response(['status' => TRUE,'message' => 'We have sent instructions for resetting your password to your email.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status' => false,'message' => 'The Email that you provided are invalid.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response(['status' => false,'message' => 'The Email that you provided are invalid.'], REST_Controller::HTTP_BAD_REQUEST);
        }
        } else if($check_auth_client == '401'){
           $this->response(['status' => false,'message' => 'Access Denied.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}


<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Users extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'UserModel');
    }

    /**
     * User Register
     * --------------------------
     * @param: fullname
     * @param: username
     * @param: email
     * @param: password
     * --------------------------
     * @method : POST
     * @link : api/user/register
     */
    public function register_post()
    {
        header("Access-Control-Allow-Origin: *");
        $_POST = $this->security->xss_clean($_POST);
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
        $userCount = $this->UserModel->check_user_mail($this->input->post('email', TRUE));
        if($userCount > 0){
            $this->response(['status' => false,'message' => 'The given email already exists.'], REST_Controller::HTTP_NOT_FOUND);
        }else{
            $tot = md5(rand(0,1000));
            $email = $this->input->post('email', TRUE);
            $username = $this->input->post('username');
            $first_name = $this->input->post('fullname');
            $code = $this->input->post('code');
            if($username){
                $username = $username;
            } else {
                $parts = explode('@',$email);
                $username = $parts[0];
            }
            $picture_url='https://anjpms.com/uploads/notDelete.png';
            $insert_data = [
                'mobile_no' => $this->input->post('mobile_no', TRUE),
                'user_type' => $this->input->post('user_type'),
                'email' => $email,
                'slug_username'=> slugify($username),
                'username' => $username,'first_name' =>$first_name,
                'last_name' => $first_name,'code' => $code,
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'token' => $tot,'web_app'=>1,
                'last_ip' => $this->input->ip_address(),
                'created_at' => date_from_today(),
                'updated_at' => date_from_today(),
                'picture_url'=>$picture_url
            ];
            
            $email_verification_link = 'https://anjpms.com/login/verify/'.$tot;
            $body = $this->mailer->Tpl_Registration($this->input->post('username', TRUE), $email_verification_link);
            $this->load->helper('email_helper');
            sendEmail($this->input->post('email', TRUE), 'Activate your APP PMS account', $body, $file = '' , $cc = 'pms.test@anjwebtech.com');
            $last_user_id = $this->UserModel->insert_user($insert_data);
            $output = $this->UserModel->getResponse($last_user_id);
            $return_data = $this->getTokenRespone($output);
            if ($output > 0 AND !empty($output)) {
                $message = ['status' => true,'data' => $return_data,'message' => "registration successful"];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                $message = ['status' => FALSE,'message' => "Not Register Your Account."];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
      }
    }


    /**
     * User Login API
     * --------------------
     * @param: username or email
     * @param: password
     * --------------------------
     * @method : POST
     * @link: api/user/login
     */
    public function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) 
            && preg_match('/@.+\./', $email);
    }

// login credentials use to mobile tbl_account_use
    public function getTokenRespone($output){
        $user_id = $output['user_id'];
        $queryqs = $this->db->query("SELECT user_id FROM `tbl_project` WHERE user_id=$user_id");
        if($queryqs->num_rows()==''){
            newloginBydefultProject1($user_id,$output['username']);
        }

        $query = $this->db->query("SELECT `user_id` FROM `tbl_users` WHERE web_app='0' and user_id='".$user_id."'");
        $result = $query->row_array();
        if($result['user_id']){
            $query = $this->db->query("INSERT INTO `tbl_account_use`(`user_id`, `created_date`) VALUES ('".$user_id."','".date_from_today()."')");
        } else {
            $email=$output['email'];
            $parts = explode('@',$email);
            $username = $parts[0];
            $slug_username = slugify($username);
            $query = $this->db->query("UPDATE `tbl_users` SET slug_username='$slug_username',first_name='$username',last_name='$username',web_app='1' WHERE user_id='".$user_id."'");
        }
        
        $this->load->library('Authorization_Token');
        $token_data['user_id'] = $user_id;
        $token_data['username'] = $output['username'];
        $token_data['designation'] = $output['designation'];
        $token_data['full_name'] = $output['first_name'];
        $token_data['email'] = $output['email'];
        $token_data['code'] = $output['code'];
        $token_data['mobile_no'] = $output['mobile_no'];
        $token_data['user_type'] = $output['user_type'];
        $token_data['picture'] = $output['picture'];
        $token_data['file_sharing_storage'] = $output['file_sharing_storage'];
        $token_data['created_at'] = $output['created_at'];
        $token_data['updated_at'] = $output['updated_at'];
        $token_data['picture_url']=$output['picture_url'];
        $token_data['time'] = time();
        $user_token = $this->authorization_token->generateToken($token_data);
        $return_data = [
            'user_id' => $user_id,
            'designation' => $output['designation'],
            'username' => $output['username'],
            'full_name' => $output['first_name'],
            'user_type' => $output['user_type'],
            'email' => $output['email'],
            'code' => $output['code'],
            'mobile_no' => $output['mobile_no'],
            'file_sharing_storage' => $output['file_sharing_storage'],
            'picture' => $output['picture'],
            'picture_url'=>$output['picture_url'],
            'created_at' => $output['created_at'],
            'token' => $user_token,
        ];
        return $return_data;
    }

    public function logout_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            log_message('info', 'function profile_post', false); 
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $this->session->sess_destroy();
            $this->db->query("UPDATE `tbl_merge_users` SET user_id='0' where main_account='$user_idpost'");
            //echo $this->db->last_query();exit;
            $this->load->library('Authorization_Token');
            $this->token_expire_time=0;
            $tokendata['token']='0';
            $headers = $this->input->request_headers();
            $user_token = $this->authorization_token->generateToken($tokendata);
            $return_data = $this->authorization_token->tokenIsExist($headers);
            $message = ['status' => true,'message' =>"User logout successful"];
            $this->response($message, REST_Controller::HTTP_OK);

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");
        $_POST = $this->security->xss_clean($_POST);
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('login_type', 'login type', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $message = array('status' => false,'error' => $this->form_validation->error_array(),'message' => validation_errors());
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            $login_type = $this->input->post('login_type');
            if($login_type==0){

                $datama = array('username' => $this->input->post('username'),'password' => $this->input->post('password'));
                $output = $this->UserModel->login($datama);
                
                if (!empty($output) AND $output != FALSE)
                {
                    if($output['is_verify'] == 0){
                        $message = array('status' => false,'message' => 'Please verify your email address!');
                        $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                        exit;
                    }
                    $return_data = $this->getTokenRespone($output);
                    $message = ['status' => true,'data' => $return_data,'message' => "User login successful"];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    $message = ['status' => FALSE,'message' => "Invalid Username or Password"];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }

            } else if($login_type==1){


                $userCount = $this->UserModel->check_user_mail($this->input->post('username', TRUE));

                if($userCount > 0){
                    $output = $userCount;
                    $return_data = $this->getTokenRespone($output);
                    $message = ['status' => true, 'data' => $return_data, 'message' => "login successful"];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    $username = $this->input->post('username');
                    

                    if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $username) )  {
                        $insert_data = array('oauth_provider'=>1,'token'=>$this->input->post('id'),'username' => $this->input->post('name'),'first_name' => $this->input->post('name'),'last_name'=>$this->input->post('name'), 'email' => $this->input->post('username'),'picture_url'=>$this->input->post('picture'),'picture'=>$this->input->post('picture'),'is_verify'=>1,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'));
                        $last_user_id = $this->UserModel->insert_user($insert_data);
                        //echo $last_user_id;
                        $output = $this->UserModel->getResponse($last_user_id);
                        //echo $output;exit;
                        $return_data = $this->getTokenRespone($output);
                        $message = ['status' => true, 'data' => $return_data, 'message' => "login successful"];
                        $this->response($message, REST_Controller::HTTP_OK);
                    } else {
                        $message = array('status' => false,'error' => '404','message' => 'Login fails with Facebook, try with another account or Signup');
                        $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                    }

                }


            } else if($login_type==2){
                $userCount = $this->UserModel->check_user_mail($this->input->post('username', TRUE));
                if($userCount > 0){
                    $output = $userCount;
                    $return_data = $this->getTokenRespone($output);
                    $message = ['status' => true, 'data' => $return_data, 'message' => "login successful"];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{

                    $username = $this->input->post('username');
                    //if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $username) )  {
                        if($this->input->post('picture')){
                            $img = $this->input->post('picture');
                        } else {
                            $img = '';
                        }
                        $insert_data = array('oauth_provider'=>2,'token'=>$this->input->post('id'),'username' => $this->input->post('name'),'first_name' => $this->input->post('name'),'last_name'=>$this->input->post('name'), 'email' => $this->input->post('username'),'picture_url'=>$img,'picture'=>$img,'is_verify'=>1,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'));
                        $last_user_id = $this->UserModel->insert_user($insert_data);
                        $output = $this->UserModel->getResponse($last_user_id);
                        $return_data = $this->getTokenRespone($output);
                        $message = ['status' => true, 'data' => $return_data, 'message' => "login successful"];
                        $this->response($message, REST_Controller::HTTP_OK);
                    } else {
                        $message = array('status' => false,'error' => '404','message' => 'Login fails with Gmail, try with another account or Signup.');
                        $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                    }
                }
            }

            
        }
    }

    public function forgot_password_post()
    {
        header("Access-Control-Allow-Origin: *");
        $_POST = $this->security->xss_clean($_POST);
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $message = array('status' => false,'error' => $this->form_validation->error_array(),'message' => validation_errors());
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            $email = $this->input->post('email');
            $response = $this->UserModel->check_user_mail($email);
            if($response){
                $rand_no = rand(0,1000);
                $pwd_reset_code = md5($rand_no.$response['user_id']);
                $query = $this->db->query("select `email` from `tbl_users` where user_id='".$response['user_id']."'");
                $result = $query->row_array();
                //echo $this->db->last_qury();exit;
                $name = $response['username'];
                $email = $response['email'];

                $reset_link = 'https://anjpms.com/login/reset_password/'.$pwd_reset_code;
                $body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);
                $subject = 'Reset your password';
                $email = sendEmail($email, $subject, $body, $file = '' , $cc = 'pms.test@anjwebtech.com');
                $message = ['status' => true,'message' => "We have sent instructions for resetting your password to your email"];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                $message = array('status' => false,'message' => 'The Email that you provided are invalid');
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function changePassword_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $user_id = $is_valid_token['data']->user_id;
            $cur_password = $this->input->post('old_password');
            $passwd = get_one_value('tbl_users', 'password', 'user_id', $user_id);
            $validPassword = password_verify($cur_password, $passwd);
            $new_password = $this->input->post('password');
            $conf_password = $this->input->post('confirm_password');
    if($validPassword){
        if($new_password == $conf_password){
            $newPassword = password_hash($new_password, PASSWORD_BCRYPT);
            if($this->UserModel->reset_password($user_id,$newPassword)){
                $m = 'New password has been Updated successfully.';
                $name = '';
                $email = '';
                $body = $this->mailer->changepassword_Email_Template($name,$email,$new_password);
                $this->load->helper('email_helper');
                $subject = 'your change password';
                $emailsend = sendEmail($email, $subject, $body, $file = '' , $cc = 'pms.test@anjwebtech.com');
                $message = ['status'=>true,'message'=>'New password has been Updated successfully.'];
                        $this->response($message, REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['status'=>FALSE,'message'=>'Failed to update password'], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['status'=>FALSE,'message'=>'New password & Confirm password is not matching'], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['status'=>FALSE,'message'=>'Sorry! Current password is not matching'], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['status'=>FALSE,'message'=>$is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function profile_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            log_message('info', 'function profile_post', false); 
            $picture = $this->input->post('picture');
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
              if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
              }

            $output = $this->UserModel->getResponse($user_idpost);
            $image_parts = explode(";base64,", $_POST['picture']);
            $image_type_aux = explode("image/", $image_parts[0]);
            //$image_base64 = base64_decode($image_parts[1]);
            $extension = $image_type_aux[1];
            $image = $_POST['picture'];
            
            if($this->input->post('full_name')){
                $full_name=$this->input->post('full_name');
            } else {
                $full_name=$output['first_name'];
            }

            if($this->input->post('mobile_no')){
                $mobile_no=$this->input->post('mobile_no');
            } else {
                $mobile_no=$output['mobile_no'];
            }
            
            if($_FILES["picture"]["name"]){
                $config['upload_path']    = '../uploads/';
                $config['allowed_types']  = '*';
                $config['max_size']             = 1000000;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('picture')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo print_r($error);
                } else {
                    $data_picture = $this->upload->data();
                    $picture_url = 'https://anjpms.com/uploads/'.$data_picture['file_name'];
                    $insert_data = array(
                    'first_name' => $full_name,
                    'last_name'=>$full_name, 
                    'mobile_no' => $mobile_no,
                    'picture'=> $data_picture['file_name'],
                    'picture_url'=> $picture_url);
                }
                $image_base64 = base64_decode($image_parts[1]);
                $file = '../uploads/' . time() . '.'.$extension;
                file_put_contents($file, $image_base64);
                $picture = substr($file,11);
                $picture_url = 'https://anjpms.com/uploads/'.$picture;
            } else {
                $insert_data = array(
                'first_name' => $full_name,
                'last_name'=>$full_name, 
                'mobile_no' => $mobile_no);
            }
            $multi_where = array('user_id'=>$user_id);
            edit_update_multi_where('tbl_users', $insert_data, $multi_where);
            $returndata = get_multi_value('tbl_users', 'user_id', $user_id, 'row');
            $table_id_value = $returndata['user_type'];
            $user_type = get_one_value('tbl_user_type', 'user_type', 'user_type_id', $table_id_value);
                $return_data['user_id'] = $returndata['user_id'];
                $return_data['designation'] = $returndata['designation'];
                $return_data['user_type'] = $user_type;
                $return_data['username'] = $returndata['username'];
                $return_data['email'] = $returndata['email'];
                $return_data['picture'] = $returndata['picture'];
                $return_data['picture_url'] = $returndata['picture_url'];
                $return_data['full_name'] = $returndata['first_name'];
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Profile Data'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function view_profile_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            log_message('info', 'function profile_post', false); 
            
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            $merge_account_show = $this->input->post('merge_account_show');
            if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }

            $reslutmi=checkallreadyaccount($merge_account_show);

            if($user_idpost==$merge_account_show){
                $output1 = $this->UserModel->getResponse($user_idpost);
                $message = ['status' => true, 'data' => $output1, 'message' => 'View Profile Data'];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                if($reslutmi){
                    $output = $this->UserModel->getResponse($merge_account_show);
                    $this->load->library('Authorization_Token');
                    $token_data['user_id'] = $output['user_id'];
                    $token_data['username'] = $output['username'];
                    $token_data['designation'] = $output['designation'];
                    $token_data['full_name'] = $output['first_name'];
                    $token_data['email'] = $output['email'];
                    $token_data['code'] = $output['code'];
                    $token_data['mobile_no'] = $output['mobile_no'];
                    $token_data['user_type'] = $output['user_type'];
                    $token_data['picture'] = $output['picture'];
                    $token_data['file_sharing_storage'] = $output['file_sharing_storage'];
                    $token_data['created_at'] = $output['created_at'];
                    $token_data['updated_at'] = $output['updated_at'];
                    $token_data['picture_url']=$output['picture_url'];
                    $token_data['time'] = time();
                    $user_token = $this->authorization_token->generateToken($token_data);
                    $token_data['token'] = $user_token;
                    $message = ['status' => true, 'data' => $token_data, 'message' => 'View Profile Data'];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    $this->response(['status'=>FALSE,'message'=>'merge account not found'], REST_Controller::HTTP_NOT_FOUND);
                    exit;
                }
            }
            
            
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
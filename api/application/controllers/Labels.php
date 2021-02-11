<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Labels extends \Restserver\Libraries\REST_Controller
{
    public $tbl_status = "tbl_status";
    public $tbl_task = "tbl_task";
    public $tbl_project = "tbl_project";
    public $tbl_roles = "tbl_roles";
    public $tbl_users = 'tbl_users';

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function labelList_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $project_id = $this->input->post('project_id');
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
                if($chekckproject==''){
                    $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $user_id = $is_valid_token['data']->user_id;
            $resultm = get_multi_value($this->tbl_status,'project_id',$project_id,'row');
            $main_user_id = $resultm['user_id'];
            $m_msg = 'List';
            $multiwhere=array('user_id' =>$user_id,'project_id'=>$project_id);
            $return_data = getProjectByStatus($user_id,$project_id,$main_user_id);
            $json_response = array();
            foreach ($return_data as $statusRow) {
                $row_array['label_id'] = $statusRow["id"];
                $row_array['label_name'] = $statusRow["status_name"]; 
                $row_array['combo_id'] = $statusRow["combo_id"];
                array_push($json_response,$row_array);
            }
            $message = ['status' => true, 'data' => $json_response, 'message' => 'label '.$m_msg];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function labelAdd_post(){
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $status_name = $this->input->post('label_name');
            $project_id = $this->input->post('project_id');
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
                if($chekckproject==''){
                    $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $user_id = $is_valid_token['data']->user_id;
            $main_user_id = get_one_value($this->tbl_project, 'user_id', 'project_id', $project_id);
            $combo_id = get_one_value($this->tbl_project, 'combo_id', 'project_id', $project_id);
            $query = $this->db->query("SELECT orderBY FROM `$this->tbl_status` WHERE combo_id='$combo_id' and project_id='$project_id' and eDelete=0 ORDER BY `orderBY` DESC limit 0,1");
            $result_array = $query->row_array();
            $orderBY = $result_array['orderBY'];
            $orderBY = $orderBY+1;
            $status_data = array('combo_id'=>$combo_id,'project_id'=>$project_id,'user_id'=>$user_id,'status_name'=>$status_name,'orderBY'=>$orderBY);
            $last_status_id = add_insert('tbl_status', $status_data);
            $status_id_multi = get_by_role_assion($this->tbl_roles, $main_user_id, $project_id, 'status_id');
            $multi_where=array('main_user_id' =>$main_user_id,'project_id'=>$project_id,'combo_id'=>$combo_id);
            $roles_data = array('status_id' => $status_id_multi.','.$last_status_id);
            edit_update_multi_where($this->tbl_roles,$roles_data,$multi_where);
            $return_data = get_multi_value($this->tbl_status, 'id', $last_status_id,'row');
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Add New Label'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function labelEdit_post(){
    	header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $label_id = $this->input->post('label_id');
        	$status_name = $this->input->post('label_name');
			$user_id = $is_valid_token['data']->user_id;
            $project_id = get_one_value($this->tbl_status, 'project_id', 'id', $label_id);
            $multi_where=array('id' =>$label_id,'project_id'=>$project_id);
            $update_data = array('status_name' => $status_name);
            edit_update_multi_where($this->tbl_status,$update_data,$multi_where);            
        	$return_data = get_multi_value($this->tbl_status, 'id', $label_id,'row');
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Edit Label'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function labelAction_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $label_id = $this->input->post('label_id');
            $label_action = $this->input->post('label_action');

            $project_id = get_one_value($this->tbl_status, 'project_id', 'id', $label_id);
            $user_id = $is_valid_token['data']->user_id;
            $result1 = get_multi_value($this->tbl_status,'id',$label_id,'row');
            $resultm = get_multi_value($this->tbl_status,'project_id',$project_id,'row');
            $main_user_id = $resultm['user_id'];
            $m_msg = 'List';

            if($label_action=='delete'){
                $update_data = array('eDelete'=>1);
                $multi_where_status=array('id' =>$label_id);
                edit_update_multi_where($this->tbl_status, $update_data, $multi_where_status);
                $multi_where_task=array('status_id' =>$label_id);
                edit_update_multi_where($this->tbl_task, $update_data, 'status_id', $multi_where_task);
                $m_msg = 'delete';
            } else if($label_action=='copy'){
                $u_data = array('user_id'=>$result1['user_id'],'project_id'=>$project_id,'status_name'=>$result1['status_name'],'orderBY'=>$result1['orderBY'],'combo_id'=>$result1['combo_id']);
                $lastid = add_insert($this->tbl_status,$u_data);
                $resultmanish = get_multi_value($this->tbl_task, 'status_id', $label_id,'result');
                foreach ($resultmanish as $key => $result) {
                $uu_data = array('user_id'=>$result['user_id'],'title'=>$result['title'],'description'=>$result['description'],'project_id'=>$result['project_id'],'status_id'=>$lastid,'position_id'=>$result['position_id'],'created_at'=>date_from_today(),'combo_id'=>$result['combo_id']);
                    add_insert($this->tbl_task,$uu_data);
                }
                $m_msg = 'copy';
            } 

            $multiwhere=array('user_id' =>$user_id,'project_id'=>$project_id);
            $return_data = getProjectByStatus($user_id,$project_id,$main_user_id);
            $json_response = array();
            foreach ($return_data as $statusRow) {
                $row_array['label_id'] = $statusRow["id"];
                $row_array['label_name'] = $statusRow["status_name"]; 
                $row_array['combo_id'] = $statusRow["combo_id"];
                array_push($json_response,$row_array);
            }

            $message = ['status' => true, 'data' => $json_response, 'message' => 'label '.$m_msg];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }  

    public function sendNotification_post()
    {
        $ms = sendPushNotificationToFCMSever('33823847899','maksjk');
        echo print_r($ms);
    }

    public function searchEmail_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $user_id = $is_valid_token['data']->user_id;
            $email_search = $this->input->post('email_search');
            $query = $this->db->query("select user_id as task_assigned,email from tbl_users where user_id!=1 and user_id!='$user_id' and email LIKE '%$email_search%'");
            $return_data = $query->result_array();
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Email List'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function addTeam_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $user_id = $is_valid_token['data']->user_id;
            $txt_search = $this->input->post('email');
            //$txt_search = implode(',',$txt_search);
            $this->load->library('mailer');
            $txt_search = explode(',', $txt_search);
            $totalemail = count($txt_search);
            $project_id = $this->input->post('project_id');
            $this->load->model('user_model');
            $user_type = $is_valid_token['data']->user_type;
            $sender_name = $is_valid_token['data']->username;
            $task_link = $this->input->post('inviteCopyLink');
            $multi_userid = array();
            foreach ($txt_search as $key => $value) {
                $txt_search1 = $txt_search[$key];
                $check_user_mail = $this->user_model->check_user_mail($txt_search1);
                if($check_user_mail){
                    $user_id = $check_user_mail['user_id'];
                    $username = $check_user_mail['username'];
                } else {
                    $parts = explode('@',$txt_search1);
                    $username = $parts[0];
                    $picture_url='https://anjpms.com/uploads/notDelete.png';
                    $user_id = add_insert($this->tbl_users,array('username'=>$username,'user_type'=>$user_type,'slug_username'=> slugify($username),'email'=>$txt_search1,'is_verify'=>1,'web_app'=>1,'created_at'=>date_from_today(),'picture_url'=>$picture_url));
                }
                $subject = $sender_name.' invited you to join the board '.$username.' on ANJ PMS';
                $body = $this->mailer->Anj_inviteTeam($sender_name, $username, $task_link);
                $this->load->helper('email_helper');
                $send_email = sendEmail($txt_search1, $subject, $body);
                array_push($multi_userid, $user_id);
            }
            $msg = $username.'/'.$txt_search1;
            testmail($msg,$txt_search1);
            $multi_userid = implode(',', $multi_userid);
            $main_user_id = get_one_value($this->tbl_project, 'user_id', 'project_id', $project_id);
            $combo_id = get_one_value($this->tbl_project, 'combo_id', 'project_id', $project_id);
            $coma_user_id = get_by_role_assion($this->tbl_roles, $main_user_id, $project_id, 'user_id');
            $assigned_to = implode(',',array_unique(explode(',', $coma_user_id.','.$multi_userid)));
            $data_role = array('user_id' => $assigned_to);
            $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$project_id);
            edit_update_multi_where($this->tbl_roles,$data_role,$multi_where);
            $return_data = manish_image($main_user_id,$project_id,$combo_id);
            $message = ['status'=>true,'data' => $return_data,'message'=>'Add New Member This Project'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function deleteTeam_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            //$user_id = $is_valid_token['data']->user_id;
            $project_id = $this->input->post('project_id');
            $user_id = $this->input->post('user_id');
            $main_user_id = get_one_value($this->tbl_project, 'user_id', 'project_id', $project_id);
            $combo_id = get_one_value($this->tbl_project, 'combo_id', 'project_id', $project_id);
            $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$project_id' and combo_id='$combo_id'");
            $get_comma_value_by_user = $query->row_array();
            $new_value_userID = removeFromString($get_comma_value_by_user['user_id'],$user_id);
            $role_data = array('user_id'=>$new_value_userID);
            $multi_where=array('main_user_id' =>$main_user_id,'project_id'=>$project_id,'combo_id'=>$combo_id);
            edit_update_multi_where('tbl_roles',$role_data,$multi_where);
            $assigned_to_data = array('assigned_to'=>$new_value_userID);
            $multi_whereassigned = array('project_id'=>$project_id,'combo_id'=>$combo_id);
            $return_data = manish_image($main_user_id,$project_id,$combo_id);
            $message = ['status'=>true,'data'=>$return_data,'message'=>'Delete Team Member this project'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
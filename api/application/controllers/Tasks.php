<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Tasks extends \Restserver\Libraries\REST_Controller
{
    public $tbl_status = "tbl_status";
    public $tbl_task = "tbl_task";
    public $tbl_project = "tbl_project";
    public $tbl_roles = "tbl_roles";
    public $tbl_users = 'tbl_users';
    public $tbl_merge_users = 'tbl_merge_users';

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function addcomment_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            $picture = $this->input->post('picture');
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
              $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
              exit;
            }
            $project_id = $this->input->post('project_id');
            $task_id = $this->input->post('task_id');
            $comment = $this->input->post('comment');
            $comment_data = array('project_id'=>$project_id,'user_id'=>$user_idpost,'task_id'=>$task_id,'comment'=>$comment,'created_date'=>date_from_today());
            add_insert('tbl_comment', $comment_data);
            $sql = $this->db->query("SELECT t1.comment,t1.created_date,t2.username FROM tbl_comment as t1 left join tbl_users as t2 ON (t1.user_id=t2.user_id) where t1.project_id=$project_id and t1.task_id=$task_id ORDER BY t1.comment_id DESC");
            $return_data = $sql->result_array();
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Add Comment in task'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function viewcomment_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            $picture = $this->input->post('picture');
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
              $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
              exit;
            }
            $project_id = $this->input->post('project_id');
            $task_id = $this->input->post('task_id');
            $sql = $this->db->query("SELECT t1.comment,t1.created_date,t2.username FROM tbl_comment as t1 left join tbl_users as t2 ON (t1.user_id=t2.user_id) where t1.project_id=$project_id and t1.task_id=$task_id ORDER BY t1.comment_id DESC");
            $return_data = $sql->result_array();
            $message = ['status' => true, 'data' => $return_data, 'message' => 'view Comment in task'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function taskImages_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            $picture = $this->input->post('picture');
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
              if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
              }
              $multiplefile = $_FILES['multiplefile'];
              $data = [];
              $combo_id=time();
              $task_id = $this->input->post('task_id');
              $count = count($_FILES['multiplefile']['name']);
              for($i=0;$i<$count;$i++){
                if(!empty($_FILES['multiplefile']['name'][$i])){
                  $_FILES['file']['name'] = $_FILES['multiplefile']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['multiplefile']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['multiplefile']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['multiplefile']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['multiplefile']['size'][$i];
                  $config['upload_path'] = '../uploads/task/'; 
                  $config['allowed_types'] = '*';
                  $config['max_size'] = '5000';
                  //$config['file_name'] = time().$i;
                  $this->load->library('upload',$config); 
                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $insert_data = array(
                        'user_id' => $user_id,
                        'task_id'=>$task_id, 
                        'combo_id' => $combo_id,
                        'created_date'=>date_from_today(),
                        'file_size'=>$uploadData['file_size'],
                        'file_name'=> $filename);
                    add_insert('tbl_multiple_image',$insert_data);
                  }
                }
              }
            $querycom = $this->db->query("SELECT GROUP_CONCAT(multiple_image_id) as multiple_image_id FROM `tbl_multiple_image` WHERE combo_id='$combo_id' and task_id='$task_id' and user_id='$user_id'");
            $result_arraycom = $querycom->row_array();
            $task_file = $result_arraycom['multiple_image_id'];
            edit_update_multi_where('tbl_task',array('task_file'=>$task_file),array('id'=>$task_id));
            $return_data = $this->getlistbyfiles($task_id,$user_id);
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Task Files Lists'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getlistbyfiles($task_id,$user_id,$multiple_image_id='')
    {
        if($multiple_image_id){
            $query = $this->db->query("SELECT  `file_name`FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id=$multiple_image_id ORDER BY `tbl_multiple_image`.`multiple_image_id` DESC");
            return $query->row_array();
        } else {
            $query = $this->db->query("SELECT `multiple_image_id`, `file_name`, `created_date`, `file_size` FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' ORDER BY `tbl_multiple_image`.`multiple_image_id` DESC");
            return $query->result_array();
        }
    }

    public function task_image_view_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
            $picture = $this->input->post('picture');
            $user_id = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $task_id = $this->input->post('task_id');
            $multiple_image_id = $this->input->post('multiple_image_id');
            if($this->input->post('type')=='download'){
                $return_data = $this->getlistbyfiles($task_id,$user_id,$multiple_image_id);
                $return_data['file_name'] = 'https://anjpms.com/uploads/task/'.$return_data['file_name'];
            } else if($this->input->post('type')=='view'){
                $return_data = $this->getlistbyfiles($task_id,$user_id);

            } else if($this->input->post('type')=='delete'){
                $this->db->query("DELETE FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id=$multiple_image_id");
                $return_data = $this->getlistbyfiles($task_id,$user_id);
            }

            /*$json_response = array();
            foreach ($return_data as $row) {
                $statusid= $row["status_id"];
                $task_status = get_one_value('tbl_status','status_name','id',$statusid);
                $row_array['task_id'] = $row["id"];
                $row_array['task_name'] = $row["title"]; 
                $row_array['task_description'] = $row["description"];
                $row_array['due_date'] = date_fjy($row["due_date"]);
                $row_array['assigned_to'] = $row["assigned_to"]; 
                $row_array['created_at'] = date_fjy($row["created_at"]);
                $row_array['task_priority'] = $priority;
                $row_array['task_status'] = $task_status;
                $row_array['task_file'] = $row['task_file'];
                array_push($json_response,$row_array);
            }*/

            $message = ['status' => true, 'data' => $return_data, 'message' => 'Task Files Lists'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function taskAdd_post(){
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            log_message('info', 'function taskAdd_post', false);            
            $task_name = $this->input->post('task_name');
            $status_id = $this->input->post('task_status');
            $project_id = $this->input->post('project_id');
            $combo_id = $this->input->post('combo_id');
            $user_id = $is_valid_token['data']->user_id;
            
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
            if($chekckproject==''){
                $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }

            $chekcktask_status = get_one_value($this->tbl_status, 'id', 'id', $status_id);
            if($chekcktask_status==''){
                $this->response(['status'=>FALSE,'message'=>'task status Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            if($this->input->post('task_duedate')){
                $task_duedate = $this->input->post('task_duedate');
            } else {
                $task_duedate = date_from_today();
            }
            //$extension = 'jpg';
            $attachment_file = $_POST['attachment_file'];
            if($attachment_file){
                $image_parts = explode(";base64,", $_POST['attachment_file']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $extension = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $file = '../uploads/' . time() . '.'.$extension;
                file_put_contents($file, $image_base64);
                $task_file = substr($file,11);
                $um_data = array('assigned_to'=>$this->input->post('task_assigned'),'user_id'=>$user_id,'title'=>$task_name,'status_id'=>$status_id,'project_id'=>$project_id,'combo_id'=>$combo_id,'description' => $this->input->post('task_description'),'due_date' => $task_duedate,'priority' => $this->input->post('task_priority'),'task_file'=>$task_file);
            } else {
                $um_data = array('assigned_to'=>$this->input->post('task_assigned'),'user_id'=>$user_id,'title'=>$task_name,'status_id'=>$status_id,'project_id'=>$project_id,'combo_id'=>$combo_id,'description' => $this->input->post('task_description'),'due_date' => $task_duedate,'priority' => $this->input->post('task_priority'));
            }
            $task_id = add_insert($this->tbl_task, $um_data);        
            $return_data = getProjectByTask($status_id,$project_id);
            $json_response = array();
            foreach ($return_data as $row) {
                  if($row["priority"]=='1'){
                      $priority = 'low';
                  } else if($row["priority"]=='2'){
                    $priority = 'medium';
                  } else if($row["priority"]=='3'){
                    $priority = 'high';
                  } else {
                    $priority = 'low';
                  }
                  $statusid= $row["status_id"];
                  $task_status = get_one_value('tbl_status','status_name','id',$statusid);
                $row_array['task_id'] = $row["id"];
                $row_array['task_name'] = $row["title"]; 
                $row_array['task_description'] = $row["description"];
                $row_array['due_date'] = $row["due_date"];
                $row_array['assigned_to'] = $row["assigned_to"]; 
                $row_array['created_at'] = $row["created_at"];
                $row_array['task_priority'] = $priority;
                $row_array['task_status'] = $task_status;
                $row_array['task_file'] = $row['task_file'];
                array_push($json_response,$row_array);
            }
            $message = ['status' => true, 'data' => $json_response, 'message' => 'Task Add'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function taskEdit_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
        log_message('info', 'function taskEdit_post', false);    
            $task_id = $this->input->post('task_id');
            $user_id = $is_valid_token['data']->user_id;
            $data_array = array(
                'title' => $this->input->post('task_name'),
                'description' => $this->input->post('task_description'),
                'assigned_to' => $this->input->post('task_assigned'),
                'due_date' => $this->input->post('task_duedate'),
                'priority' => $this->input->post('task_priority'),
                'status_id'=> $this->input->post('task_status'));
            $multi_where = array('id' =>$task_id);
            edit_update_multi_where($this->tbl_task,$data_array,$multi_where);
            $project_id = get_one_value($this->tbl_task,'project_id','id', $task_id);
            $status_id = get_one_value($this->tbl_task,'status_id','id', $task_id);
            $main_user_id = get_one_value($this->tbl_task,'user_id','id', $task_id);
            $multiwhere = array('user_id' =>$user_id,'project_id'=>$project_id);
            $return_data = show_tasklist($user_id,$project_id,$main_user_id);
            $message = ['status'=>true,'data'=>$return_data,'message'=>'Taks Update'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }   

    public function taskList_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){ 
        log_message('info', 'function taskList_post', false);    
            $project_id = $this->input->post('project_id');
            $user_idpost = $this->input->post('user_id');
            $user_id = $is_valid_token['data']->user_id;
            /*if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'token not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }*/
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
            if($chekckproject==''){
                $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $main_user_id = get_one_value($this->tbl_project,'user_id','project_id', $project_id);;
            $return_data = show_tasklist($user_id,$project_id,$main_user_id);
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Task list'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function taskAction_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){
            $user_id = $is_valid_token['data']->user_id;
            log_message('info', 'function taskAction_post', false);  
            $project_id = $this->input->post('project_id'); 
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'token not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
            if($chekckproject==''){
                $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }   
            $task_id = $this->input->post('task_id');
            $chekcktask = get_one_value($this->tbl_task, 'id', 'id', $task_id);
            if($chekcktask==''){
                $this->response(['status'=>FALSE,'message'=>'Task Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $task_action = $this->input->post('task_action');
            if($task_action=='copy'){
                $result = get_multi_value($this->tbl_task,'id',$task_id,'row');
                $task_data = array('user_id'=>$user_id,'title'=>$result['title'],'description'=>$result['description'],'project_id'=>$result['project_id'],'status_id'=>$result['status_id'],'position_id'=>$result['position_id'],'created_at'=>date_from_today(),'combo_id'=>$result['combo_id'],'assigned_to'=>$result['assigned_to'],'due_date'=>$result['due_date'],'task_file'=>$result['task_file']);
                add_insert($this->tbl_task,$task_data);
            } else if($task_action=='delete'){
                $task_whare = array('id'=>$task_id);
                edit_update_multi_where($this->tbl_task, array('eDelete'=>1), $task_whare);
            } else if($task_action=='detail'){
                $this->taskDetails_post();
                return true;
            }
            $main_user_id = get_one_value($this->tbl_project,'user_id','project_id', $project_id);
            $return_data = show_tasklist($user_id,$project_id,$main_user_id);
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Task list'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function taskDetails_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){                
            $task_id = $this->input->post('task_id');
             log_message('info', 'function taskDetails_post', false); 
            $user_id = $is_valid_token['data']->user_id;
            $return_data = get_multi_value($this->tbl_task,'id',$task_id,'row');
            $message = ['status' => true, 'data' => $return_data, 'message' => 'Task Details'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
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
            $user_idpost = $this->input->post('user_id');
            if($user_id!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'token not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $project_id = $this->input->post('project_id');
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
            if($chekckproject==''){
                $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $this->load->library('mailer');
            $txt_search = explode(',', $txt_search);
            $totalemail = count($txt_search);
            
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
                    $user_id = add_insert($this->tbl_users,array('username'=>$username,'user_type'=>$user_type,'first_name'=>slugify($username),'last_name'=>slugify($username),'slug_username'=>slugify($username),'email'=>$txt_search1,'is_verify'=>1,'web_app'=>1,'created_at'=>date_from_today(),'picture_url'=>$picture_url));
                }
                $subject = $sender_name.' invited you to join the board '.$username.' on ANJ PMS';
                $body = $this->mailer->Anj_inviteTeam($sender_name, $username, $task_link);
                $this->load->helper('email_helper');
                $send_email = sendEmail($txt_search1, $subject, $body);
                array_push($multi_userid, $user_id);
            }
            $msg = $username;
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
            $message = ['status'=>true,'data' => $return_data,'message'=>'add new member this project'];
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
            $useraid = $is_valid_token['data']->user_id;
            $project_id = $this->input->post('project_id');
            $user_id = $this->input->post('assgin_id');
            $user_idpost = $this->input->post('user_id');
            if($useraid!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'token not found!'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $qry = $this->db->query("SELECT user_id FROM `$this->tbl_roles` where CONCAT(',', user_id, ',') like '%,$user_id,%'");
            $checkroleid = $qry->row_array();
            if($checkroleid['user_id']==''){
                $this->response(['status'=>FALSE,'message'=>'assgin id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $chekckproject = get_one_value($this->tbl_project, 'project_id', 'project_id', $project_id);
            if($chekckproject==''){
                $this->response(['status'=>FALSE,'message'=>'Project Id Not Found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $main_user_id = get_one_value($this->tbl_project, 'user_id', 'project_id', $project_id);
            $combo_id = get_one_value($this->tbl_project, 'combo_id', 'project_id', $project_id);
            $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$project_id' and combo_id='$combo_id'");
            $get_comma_value_by_user = $query->row_array();
            $new_value_userID = removeFromString($get_comma_value_by_user['user_id'],$user_id);
            $role_data = array('user_id'=>$new_value_userID);
            $multi_where=array('main_user_id' =>$main_user_id,'project_id'=>$project_id,'combo_id'=>$combo_id);
            edit_update_multi_where($this->tbl_roles,$role_data,$multi_where);
            $return_data = manish_image($main_user_id,$project_id,$combo_id);
            $message = ['status'=>true,'data'=>$return_data,'message'=>'delete team member this project'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function viewTeam_post()
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
            $main_user_id = get_one_value($this->tbl_project, 'user_id', 'project_id', $project_id);
            $combo_id = get_one_value($this->tbl_project, 'combo_id', 'project_id', $project_id);
            $return_data = manish_image($main_user_id,$project_id,$combo_id);
            $message = ['status' => true, 'data' => $return_data, 'message' => 'list of team members this project'];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function mergeAccount_post()
    {
        header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
            $user_ID = $is_valid_token['data']->user_id;
            $user_idpost = $this->input->post('user_id');
            if($user_ID!=$user_idpost){
                $this->response(['status'=>FALSE,'message'=>'token not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $this->form_validation->set_rules('email_search', 'email id not found', 'trim|required');
            if ($this->form_validation->run() == FALSE){
                $message = array('status'=>false,'error'=>$this->form_validation->error_array(),'message'=>validation_errors());
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            } else {
            $email_search = $this->input->post('email_search');
            $user_id = get_one_value($this->tbl_users, 'user_id', 'email', $email_search);
            $qry = $this->db->query("SELECT user_id FROM `$this->tbl_merge_users` where main_account=$user_idpost and CONCAT(',', user_id, ',') like '%,$user_id,%'");
            $checkallreadyaccount = $qry->row_array();
            $return_data = $this->getListmarge_show($user_ID);
            if($checkallreadyaccount){
                $this->response(['status'=>FALSE,'message'=>'email id already exists','data'=>$return_data], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            if($user_id==''){
                $this->response(['status'=>FALSE,'message'=>'email id not found'], REST_Controller::HTTP_NOT_FOUND);
                exit;
            }
            $qry1=$this->db->query("SELECT main_account,user_id FROM `$this->tbl_merge_users` where main_account='".$user_ID."'");
            $qry_result1 = $qry1->row_array();
            $main_account = $qry_result1['main_account'];
            if($main_account){
                $twoid = $qry_result1['user_id'].','.$user_id;
                $arg1 = array('user_id'=>$twoid,'created_date'=>date_from_today());
                $multi_where = array('main_account'=>$main_account);
                edit_update_multi_where($this->tbl_merge_users, $arg1, $multi_where);
            } else {
                $arg1 = array('main_account'=>$user_ID,'user_id'=>$user_id,'created_date'=>date_from_today());
                add_insert($this->tbl_merge_users, $arg1);
            }
            $return_data = $this->getListmarge_show($user_ID);
            $message = ['status'=>true,'data'=>$return_data,'message'=>'account merge successfully'];
            $this->response($message, REST_Controller::HTTP_OK);
          }
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getListmarge_show($user_ID)
    {
        $qryR = $this->db->query("SELECT user_id FROM `$this->tbl_merge_users` where main_account='$user_ID'");
        $qryResult = $qryR->row_array();
        $muuserid =$qryResult['user_id'];
        if($muuserid){
            $qryRR = $this->db->query("SELECT user_id,username,email,picture_url FROM `tbl_users` where user_id IN ($muuserid)");
        return $qryRR->result_array();
        }
    }

    public function sendNotification_post()
    {
        $multiplefile = $_POST['file'];
        $files = array();

        echo count($multiplefile);
        foreach ($multiplefile as $key => $value) {
            
            $image_parts = explode(";base64,", $value);

            echo $key;
            $image_type_aux = explode("image/", $image_parts[0]);
            $extension = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = '../uploads/task/' . time() . '.'.$extension;
            file_put_contents($file, $image_base64);
            array_push($files, $image_parts);
        }
        //echo print_r($files);
    }

}
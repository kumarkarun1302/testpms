<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Projects extends \Restserver\Libraries\REST_Controller
{
    public $tbl_status = "tbl_status";
    public $tbl_task = "tbl_task";
    public $tbl_project = "tbl_project";
    public $tbl_roles = "tbl_roles";

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

     public function insertRoleProject($user_id,$combo_id,$project_id){
        $orderBY1 = 1;
        $orderBY2 = 2;
        $orderBY3 = 3;
        $status_data = array(
                   array(
                      'status_name' => 'TO DO',
                      'combo_id' => $combo_id,
                      'project_id' => $project_id,
                      'user_id' => $user_id,
                      'orderBY' => $orderBY1
                   ),
                   array(
                      'status_name' => 'IN PROGRESS',
                      'combo_id' => $combo_id,
                      'project_id' => $project_id,
                      'user_id' => $user_id,
                      'orderBY' => $orderBY2
                   ),
                   array(
                      'status_name' => 'DONE',
                      'combo_id' => $combo_id,
                      'project_id' => $project_id,
                      'user_id' => $user_id,
                      'orderBY' => $orderBY3
                   )
                );
        $last_statusID = $this->db->insert_batch($this->tbl_status,$status_data);

        $query = $this->db->query("SELECT GROUP_CONCAT(id) as id FROM `$this->tbl_status` WHERE combo_id='$combo_id' and project_id='$project_id'");
        $result_array = $query->row_array();
        $last_statusID = $result_array['id'];
        $this->db->insert($this->tbl_roles,array('status_id'=>$last_statusID,'combo_id'=>$combo_id,'main_user_id'=>$user_id,'user_id'=>$user_id,'project_id'=>$project_id,'created_date'=>date_from_today()));
    }

    public function addProject_post()
    {
        header("Access-Control-Allow-Origin: *");
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            $_POST = $this->security->xss_clean($_POST);
            $crud_type = $this->input->post('crud_type');
            $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $message = array('status' => false,'error' => $this->form_validation->error_array(),'message' => validation_errors());
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            } else {
                $project_id = $this->input->post('project_id');
                $user_id = $is_valid_token['data']->user_id;
                if($project_id){
                	$insert_data = [
	                    'user_id' => $user_id,
	                    'project_name' => $this->input->post('project_name', TRUE),
	                    'project_slug' => slugify($this->input->post('project_name')),
	                    'client_id' => $this->input->post('client_name'),
	                    'project_description' => $this->input->post('project_description', TRUE),
	                    'start_date' => $this->input->post('start_date'),
	                    'deadline' => $this->input->post('deadline'),
                      'category'=>$this->input->post('category'),
	                    'updated_date' => date_from_today(),
	                ];
                	$output = $this->project_model->update_project($insert_data,$project_id);
                	$m_msg = 'edit';

                  $username = get_one_value('tbl_users','username','user_id',$user_id);
                  $combo_id = get_one_value('tbl_project','combo_id','project_id',$project_id);
                  $projectID = anj_encode($project_id);
                  $projectNAME = slugify($this->input->post('project_name'));
                  $projectASSIGN = slugify($username);
                  $projectMain_user_id = anj_encode($user_id);
                  $url = '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$combo_id;
                  $project_link = 'https://anjpms.com/Invite/anj'.$url;
                  $this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");

	        	} else {
	        		$combo_id = time();
	        		$insert_data = [
	                    'user_id' => $user_id,
	                    'project_name' => $this->input->post('project_name', TRUE),
	                    'project_slug' => slugify($this->input->post('project_name')),
	                    'client_id' => $this->input->post('client_name'),
	                    'project_description' => $this->input->post('project_description', TRUE),
	                    'start_date' => $this->input->post('start_date'),
	                    'deadline' => $this->input->post('deadline'),
                      'category'=>$this->input->post('category'),
	                    'created_date' => date_from_today(),
	                    'combo_id' => $combo_id,
	                ];
	        		$output = $this->project_model->add_Project($insert_data);
	        		$m_msg = 'edit';
              $username = get_one_value('tbl_users','username','user_id',$user_id);
              $projectID = anj_encode($output);
              $projectNAME = slugify($this->input->post('project_name'));
              $projectASSIGN = slugify($username);
              $projectMain_user_id = anj_encode($user_id);
              $url = '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$combo_id;
              $project_link = 'https://anjpms.com/Invite/anj'.$url;
              $this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$output."'");

	        		$this->insertRoleProject($user_id,$combo_id,$output);
	        	}
	        	$return_data = $this->project_model->getResponse($output);
                if ($output > 0 AND !empty($output))
                {
                    $message = ['status' => true,'data' => $return_data,'message' => "Project '".$m_msg."'"];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    $message = ['status' => FALSE,'message' => 'Project not "'.$m_msg.'"'];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function projectList_post(){
    	header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
        	$project_status = $this->input->post('project_status');
        	$user_id = $is_valid_token['data']->user_id;

          if($project_status=='3'){
            $projectstatus = 'holding';
          } else if($project_status=='2'){
            $projectstatus = 'completed';
          } else if($project_status=='4'){
            $projectstatus = 'canceled';
          } else if($project_status=='0'){
            $projectstatus = 'Running';
          }

        	$return_data = $this->project_model->getProjectlist($user_id,$project_status);
          if($return_data){
            $total_project = count($return_data);
          } else { $total_project = $return_data = 0; }
        	
          $json_response = array();
          foreach ($return_data as $row) {
            $project_id = $row["project_id"];
            $combo_id = $row["combo_id"];
            $query_status = $this->db->query("select count(id) as status_id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0");
            $status_total = $query_status->row_array();

            $query_task = $this->db->query("select count(id) as task_id from tbl_task where project_id=$project_id and combo_id=$combo_id and eDelete=0");
            $task_total = $query_task->row_array();

            $query_task = $this->db->query("select count(task_id) as comments from tbl_comment where project_id=$project_id");
            $task_total_comments = $query_task->row_array();

              $row_array['project_id'] = $project_id;
              $row_array['project_name'] = $row["project_name"];
              $row_array['project_description'] = $row["project_description"]; 
              $row_array['combo_id'] = $combo_id;
              $row_array['Start_Date'] = $row["start_date"];
              $row_array['End_Date'] = $row["deadline"]; 
              $row_array['client_name'] = $row["client_id"];
              $row_array['total_labels'] = $status_total["status_id"];
              $row_array['total_tasks'] = $task_total["task_id"]; 
              $row_array['total_comments'] = $task_total_comments["comments"];
              array_push($json_response,$row_array);
          }

          $message = ['status' => true, 'total_project'=>$total_project, 'data' => $json_response, 'message' => "Project List ".$projectstatus];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function projectAction_post(){
      header("Access-Control-Allow-Origin: *");    
        $this->load->library('Authorization_Token');
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE){    
          $project_status = $this->input->post('project_status');
          $user_id = $is_valid_token['data']->user_id;
          $user_idpost = $this->input->post('user_id');
          if($user_id!=$user_idpost){
            $this->response(['status'=>FALSE,'message'=>'user_id not found'], REST_Controller::HTTP_NOT_FOUND);
            exit;
          }
          $project_id = $this->input->post('project_id');
          if($project_status=='hold'){
            $projectstatus = '3';
          } else if($project_status=='completed'){
            $projectstatus = '2';
          } else if($project_status=='canceled'){
            $projectstatus = '4';
          } else if($project_status=='unhold'){
            $projectstatus = '0';
          }
          
          $query = $this->db->query("UPDATE `tbl_project` SET status=$projectstatus WHERE project_id='".$project_id."'");
          $project_name = get_one_value($this->tbl_project,'project_name','project_id', $project_id);
          $message = ['status'=>true,'message'=>$project_name." Project is ".$project_status];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
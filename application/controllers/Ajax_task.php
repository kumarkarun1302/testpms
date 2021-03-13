<?php
class Ajax_task extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->library('mailer');
    }

    public function get_project_details_id()
    {
       $project_id = $this->input->post('project_id');
       $combo_id = $this->input->post('projectCombo_id');  
       $query_status = $this->db->query("select * from tbl_project where project_id=$project_id and combo_id=$combo_id limit 1");
       echo json_encode($query_status->row_array()); 
    }

    public function hold_project_name()
    {
       $project_id = $this->input->post('project_id');
       $checkbox_projectholdVAL = $this->input->post('checkbox_projectholdVAL');
       $projectID = $this->input->post('projectID');
       $projectNAME = $this->input->post('projectNAME');
       $projectASSIGN = $this->input->post('projectASSIGN');
       $projectMain_user_id = $this->input->post('projectMain_user_id');
       $project_type_status = $this->input->post('project_type_status');
       
       if($project_type_status == 'hold'){
            $data = array('status'=>3);            
            $this->session->set_userdata('holdProjectList', $project_id);

       } else if($project_type_status == 'running'){
            $data = array('status'=>0);
            $this->session->set_userdata('runningProjectList', $project_id);
       }
       
       $this->session->set_userdata('checkbox_session_store', $project_type_status);
       $msgg = $projectASSIGN.' Project is '.$project_type_status;
       send_message_notification($msgg);

        edit_update('tbl_project', $data, 'project_id', $project_id);

        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>$project_type_status.' project','activity'=>$projectNAME,'created_date'=>date_from_today()));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function completed_project()
    {
       $project_id = $this->input->post('project_id');
       $data = array('status'=>2);
       edit_update('tbl_project', $data, 'project_id', $project_id);
        $projectID = $this->input->post('projectID');
        $projectNAME = $this->input->post('projectNAME');
        $this->session->set_userdata('checkbox_session_store', 'completed');
        $projectASSIGN = $this->input->post('projectASSIGN');
        $this->session->set_userdata('completedProjectList', $project_id);
        $projectMain_user_id = $this->input->post('projectMain_user_id');
        $msgg = $projectASSIGN.' Project is Completed';
        send_message_notification($msgg);
        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'completed project','activity'=>$projectNAME,'created_date'=>date_from_today()));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function delete_project()
    {
       $project_id = $this->input->post('project_id');
       $data = array('status'=>4);
       edit_update('tbl_project', $data, 'project_id', $project_id);
       $this->session->set_userdata('checkbox_session_store', 'canceled');
       $this->session->set_userdata('canceledProjectList', $project_id);
       $projectID = $this->input->post('projectID');
        $projectNAME = $this->input->post('projectNAME');
        $projectASSIGN = $this->input->post('projectASSIGN');
        $projectMain_user_id = $this->input->post('projectMain_user_id');
        
        $msgg = $projectASSIGN.' Project is delete';
        send_message_notification($msgg);
        $checkbox_projectdelVAL = $this->input->post('checkbox_projectdelVAL');
        
        /*foreach ($checkbox_projectdelVAL as $key) {
            $this->db->query("UPDATE `tbl_project` SET `status`='4' where project_id='$key'");
        }*/

        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'delete project','activity'=>$projectNAME,'created_date'=>date_from_today()));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }


    public function get_hold_project_list()
    {
        $user_id = getProfileName('user_id');
        $project_id = $this->input->post('project_id');
        $combo_id = $this->input->post('projectCombo_id');
        $project_type_status = $this->input->post('project_type_status');
        $query = $this->db->query("select project_name,project_description,client_id,start_date,deadline from tbl_project where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $project_list = $query->row_array();
        $query_status = $this->db->query("select count(id) as status_id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $status_total = $query_status->row_array();
        $query_task = $this->db->query("select count(id) as task_id from tbl_task where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $task_total = $query_task->row_array();
        $query_task = $this->db->query("select count(task_id) as comments from tbl_comment where project_id=$project_id limit 1");
        $task_total_comments = $query_task->row_array();

        $html = '<div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                    <div class="company">
                        <div class="company-title">
                        <input type="hidden" id="project_type_status" value="'.$project_type_status.'">
                            <h5>'.$project_list['project_name'].'</h5>
                        </div>
                        <div class="company-content">
                            <div class="col-sm-12 company-details">
                                <div class="company-details-desc"><b>Description : </b>'.$project_list['project_description'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-client"><b>Client: </b> '.$project_list['client_id'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-startDate"><b>Start Date : </b>'.$project_list['start_date'].'</div>
                                <div class="company-details-deadLine"><b>DeadLine : </b>'.$project_list['deadline'].'</div>
                            </div>
                        </div>
                        <div class="company-footer">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Labels 
                                    </div>
                                    '.$status_total['status_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Tasks 
                                    </div>
                                    '.$task_total['task_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Comments 
                                    </div>
                                    '.$task_total_comments['comments'].'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $html;
    }

    public function get_completed_project_list()
    {
        $user_id = getProfileName('user_id');
        $project_id = $this->input->post('project_id');
        $combo_id = $this->input->post('projectCombo_id');
        $query = $this->db->query("select project_name,project_description,client_id,start_date,deadline from tbl_project where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $project_list = $query->row_array();
        $query_status = $this->db->query("select count(id) as status_id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $status_total = $query_status->row_array();
        $query_task = $this->db->query("select count(id) as task_id from tbl_task where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $task_total = $query_task->row_array();
        $query_task = $this->db->query("select count(task_id) as comments from tbl_comment where project_id=$project_id limit 1");
        $task_total_comments = $query_task->row_array();

        $html = '<div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                    <div class="company">
                        <div class="company-title">
                            <h5>'.$project_list['project_name'].'</h5>
                        </div>
                        <div class="company-content">
                            <div class="col-sm-12 company-details">
                                <div class="company-details-desc"><b>Description : </b>'.$project_list['project_description'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-client"><b>Client: </b> '.$project_list['client_id'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-startDate"><b>Start Date : </b>'.$project_list['start_date'].'</div>
                                <div class="company-details-deadLine"><b>DeadLine : </b>'.$project_list['deadline'].'</div>
                            </div>
                        </div>
                        <div class="company-footer">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Labels 
                                    </div>
                                    '.$status_total['status_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Tasks 
                                    </div>
                                    '.$task_total['task_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Comments 
                                    </div>
                                    '.$task_total_comments['comments'].'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $html;
    }

    public function get_delete_project_list()
    {
        $user_id = getProfileName('user_id');
        $project_id = $this->input->post('project_id');
        $combo_id = $this->input->post('projectCombo_id');
        $query = $this->db->query("select project_name,project_description,client_id,start_date,deadline from tbl_project where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $project_list = $query->row_array();
        $query_status = $this->db->query("select count(id) as status_id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $status_total = $query_status->row_array();
        $query_task = $this->db->query("select count(id) as task_id from tbl_task where project_id=$project_id and combo_id=$combo_id and eDelete=0 limit 1");
        $task_total = $query_task->row_array();
        $query_task = $this->db->query("select count(task_id) as comments from tbl_comment where project_id=$project_id limit 1");
        $task_total_comments = $query_task->row_array();
        $html = '<div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                    <div class="company">
                        <div class="company-title">
                            <h5>'.$project_list['project_name'].'</h5>
                        </div>
                        <div class="company-content">
                            <div class="col-sm-12 company-details">
                                <div class="company-details-desc"><b>Description : </b>'.$project_list['project_description'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-client"><b>Client: </b> '.$project_list['client_id'].'</div>
                            </div>
                            <div class="col-sm-12 company-details">
                                <div class="company-details-startDate"><b>Start Date : </b>'.$project_list['start_date'].'</div>
                                <div class="company-details-deadLine"><b>DeadLine : </b>'.$project_list['deadline'].'</div>
                            </div>
                        </div>
                        <div class="company-footer">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Labels 
                                    </div>
                                    '.$status_total['status_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Tasks 
                                    </div>
                                    '.$task_total['task_id'].'
                                </div>
                                <div class="col-md-4 col-xs-4 text-center border-right">
                                    <div class="font-bold">
                                        Comments 
                                    </div>
                                    '.$task_total_comments['comments'].'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $html;
    }

    public function send_email_inviteteam()
    {
        $this->load->model('auth_model');
        $sender_name = $this->input->post('projectASSIGN');
        $task_name = $this->input->post('projectASSIGN');
        $task_link = $this->input->post('inviteCopyLink');        
        $user_type = getProfileName('user_type');
        $txt_search = $this->input->post('txt_search');
        $txt_search = implode(',',$txt_search);
        $txt_search = explode(',', $txt_search);
        $totalemail = count($txt_search);
        $main_user_id = anj_decode($this->input->post('projectMain_user_id'));
        $projectID = anj_decode($this->input->post('projectID'));
        $project_id = $projectID;
        $query_status = $this->db->query("select user_id from tbl_roles where main_user_id=$main_user_id and project_id=$project_id limit 1");
        $resultrole = $query_status->row_array();
        $count = count(explode(',',$resultrole['user_id'])) - 1;
        $total_user_support = getProfileName('total_user_support');
        if($totalemail >= $total_user_support){
            echo '1';
            return false;
        }
        if($count >= $total_user_support){
            echo '1';
            return false;
        }        
        $projectname = get_by_id('tbl_project','project_name','project_id',$project_id);
        $project_name = $projectname['project_name'];
        $multi_userid = array();
        $picture_url = base_url().'uploads/notDelete.png';
        foreach ($txt_search as $key => $value) {
            $txt_search1 = $txt_search[$key];
            $check_user_mail = $this->auth_model->check_user_mail($txt_search1);
            if($check_user_mail){
                $user_id = $check_user_mail['user_id'];
                $username = $check_user_mail['username'];
            } else {
                $parts = explode('@',$txt_search1);
                $username = $parts[0];
                $user_id = insert_data_last_id('tbl_users',array('username'=>$username,'user_type'=>$user_type,'email'=>$txt_search1,'is_verify'=>1,'created_at'=>date_from_today(),'picture_url'=>$picture_url));
            }
            insert_data_last_id('tbl_page_refresh',array('user_id'=>$user_id));
            $tbl_notifications_data = array('title'=>$project_name,'notifications_name'=>$project_name,'main_user_id'=>$main_user_id,'user_id'=>$user_id,'url'=>$task_link,'created_date'=>date_from_today());
            notification_insertDB($tbl_notifications_data);
            $subject = $sender_name.' invited you to join the board '.$username.' on ANJ PMS';
            $body = $this->mailer->Anj_inviteTeam($sender_name, $username, $task_link);
            $this->load->helper('email_helper');
            $send_email = sendEmail($txt_search1, $subject, $body);
            send_message_notification($subject);
            array_push($multi_userid, $user_id);
        }
        $multi_userid = implode(',', $multi_userid);
        $coma_user_id = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'user_id');
        $assigned_to = implode(',',array_unique(explode(',', $coma_user_id.','.$multi_userid)));
        $data_role = array('user_id' => $assigned_to);
        $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID);
        edit_update_multi_where('tbl_roles',$data_role,$multi_where);
        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'add invite','activity'=>'project invite','created_date'=>date_from_today()));
        echo 0;
    }

    public function getSearch()
    {
        $type = $this->input->post('type');
        $email = $this->input->post('search');
        $user_id = getProfileName('user_id');
        $query = $this->db->query("select email,username from tbl_users where user_id!=1 and user_id!='$user_id' and email LIKE '%$email%'");
        $result_array_serach = $query->result_array();
        echo json_encode($result_array_serach);
    }

    public function get_search_data()
    {
        $serach_any_data = $this->input->post('serach_any_data');
        $query = $this->db->query("select project_name from tbl_project where project_name='$serach_any_data'");
        $result_array_serach = $query->result_array();
        echo json_encode($result_array_serach);
    }

    public function delete_team_one_by_one()
    {
        $projectID = anj_decode($this->input->post('projectID'));
        $main_user_id = anj_decode($this->input->post('projectMain_user_id')); 
        $projectCombo_id = $this->input->post('projectCombo_id');
        $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$projectID' and combo_id='$projectCombo_id' limit 1");
        $get_comma_value_by_user = $query->row_array();
        $user_id = $this->input->post('user_id');
        $new_value_userID = removeFromString($get_comma_value_by_user['user_id'],$user_id);
        
        $role_data = array('user_id'=>$new_value_userID);
        $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID,'combo_id'=>$projectCombo_id);
        edit_update_multi_where('tbl_roles',$role_data,$multi_where);
        $assigned_to_data = array('assigned_to'=>$new_value_userID);
        $multi_whereassigned = array('project_id'=>$projectID,'combo_id'=>$projectCombo_id);
        //edit_update_multi_where('tbl_task',$assigned_to_data,$multi_whereassigned);
    }

    public function ger_comma_value_by_user()
    {
        $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$projectID' and combo_id='$projectCombo_id'");
        $statusResult = $query->result_array();
    }
    
    public function editTaskStatus(){
        $status_id = $this->input->get('status_id');
        $task_id = $this->input->get('task_id');
        $this->dashboard_model->editTaskStatus($status_id,$task_id);
    }
    
    public function editTaskStatus1(){
        $result = $this->input->post('data');
        $result = json_decode($result);
        $counter = 1;
        foreach ($result as $key => $val) {
        $this->db->query("UPDATE tbl_status SET orderBY = '".$counter."' WHERE id = '".$val."'");
            $counter++;
        }
        echo print_r($result);
    }
    
    public function get_value_edit_task()
    {
        $task_id = $this->input->post('task_id');
        $result = get_by_id('tbl_task', '*', 'id', $task_id);
        echo json_encode($result); 
    }

    public function get_assingName_task()
    {
        $user_id = $this->input->post('user_id');
        $qry = $this->db->query("select email,username from tbl_users where user_id=$user_id limit 1");
        $result = $qry->row_array();
        echo $result['username'];  
    }

    public function submit_addTeam()
    {
        $projectID = anj_decode($this->input->post('projectID'));
        $projectNAME = $this->input->post('projectNAME');
        $projectASSIGN = $this->input->post('projectASSIGN');
        $main_user_id = anj_decode($this->input->post('projectMain_user_id')); 
        $projectCombo_id = $this->input->post('projectCombo_id');
        $checkbox_addteam_val = $this->input->post('checkbox_addteam_val');
        $checkbox_addteam_val = implode(",",$checkbox_addteam_val);
        $use = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'user_id');
        //$assigned_to = implode(',',array_unique(explode(',', $use.','.$checkbox_addteam_val)));
        $assigned_to = getProfileName('user_id').','.$checkbox_addteam_val;
        $tbl_notifications_data = array(
        'main_user_id'=>$main_user_id,
        'user_id'=>getProfileName('user_id'),
        'title'=>$projectASSIGN,
        'url'=>'New Project Add',
        'notifications_name'=>'New Project Add','created_date'=>date_from_today());
        notification_insertDB($tbl_notifications_data);
        $role_data = array('user_id' => $assigned_to);
        $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID);
        edit_update_multi_where('tbl_roles',$role_data,$multi_where);
        echo $this->manish_image($main_user_id,$projectID,$projectCombo_id);
    }

    public function show_header_team_image()
    {
        $projectID = anj_decode($this->input->post('projectID'));
        $main_user_id = anj_decode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $this->manish_image($main_user_id,$projectID,$projectCombo_id);
    }

    public function editTask()
    {
        $edit_task_id = $this->input->post('edit_task_id');
        $main_user_id = anj_decode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        $task_status = $this->input->post('edit_task_status');
        $projectID = anj_decode($this->input->post('projectID'));
        $use = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'user_id');
        $edit_task_assigned_to = $this->input->post('edit_task_assigned_to');
        $assigned_to = $use.','.$edit_task_id;
        //$assigned_to = implode(',',array_unique(explode(',', $use.','.$edit_task_assigned_to)));
        $data_array = array('title' => $this->input->post('edit_task_title'),
            'description' => $this->input->post('edit_task_description'),
            'assigned_to' => $edit_task_assigned_to,
            'start_date' => $this->input->post('start_date'),
            'due_date' => $this->input->post('due_date'),
            'priority' => $this->input->post('edit_task_priority'),
            'status_id'=>$task_status
        );
        edit_update('tbl_task',$data_array,'id',$edit_task_id);
        $role_data = array('task_id' => $assigned_to);
        $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID);
        edit_update_multi_where('tbl_roles',$role_data,$multi_where);
        $tbl_notifications_data = array(
        'main_user_id'=>getProfileName('user_id'),
        'user_id'=>$edit_task_assigned_to,
        'title'=>$this->input->post('edit_task_title'),
        'url'=>$this->input->post('url'),
        'notifications_name'=>$this->input->post('edit_task_title'),'created_date'=>date_from_today());
        notification_insertDB($tbl_notifications_data);
        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'edit task','activity'=>$this->input->post('edit_task_title'),'created_date'=>date_from_today()));
        echo $this->manish_image($main_user_id,$projectID,$projectCombo_id);
    }   

    public function manish_image($main_user_id,$projectID,$projectCombo_id)
    {
        $html = '';
        $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$projectID' and combo_id='$projectCombo_id'");
        $statusResult = $query->result_array();
        foreach ($statusResult as $statusRow) {
        $user_image_array = $this->dashboard_model->getProject_userImage($statusRow["user_id"]);
        $getProject_userImage_count_4=$this->dashboard_model->getProject_userImage_count_4($statusRow["user_id"]);
        foreach ($user_image_array as $value) {
            $imaname = get_user_img($value['user_id']);
            $name_tool = $value['username'].' ('.$value['email'].')';
            $html .='<a href="javascript:void(0)" class="team-item" data-toggle="modal" data-target="#removeTeamMemberModal" onclick="getdata_addteam()"><img src="'.$imaname.'" data-toggle="tooltip" data-placement="top" title="'.$name_tool.'" alt="'.$name_tool.'" data-original-title="'.$name_tool.'"></a>';
        } 
        $total = $getProject_userImage_count_4['fourcount'];
        if($total > 0){
            $html .='<a href="javascript:void(0)" class="teamCount-item" data-toggle="modal" data-target="#removeTeamMemberModal" onclick="getdata_addteam()"><span class="countNo">'.$total.'+</span></a>';
        }
       } 
       return $html;
    }

}
<?php
class Ajax_comman extends MY_Controller
{
	public function __construct(){
		parent::__construct();
	}

    public function addrole_submit() {
        insert_data_last_id('tbl_rolename',array('who_add_new_role'=>getProfileName('user_id'),'created_date'=>date_from_today(),'user_type'=>getProfileName('user_type'),'designation'=>$this->input->post('designation')));
        echo getusertypeDropDownList(getProfileName('user_type'));
     }

    public function checked_email() {
        $this->load->model('auth_model');
        $is_exist = $this->auth_model->check_user_mail($this->input->post('email'));
        if ($is_exist) {
            echo "Sorry! email has already taken. Please try another.";
        }
    }

    public function access_permission()
    {
        $project_id = $this->input->post('project_id');
        if($this->input->post('project_permission_val')){
            $project_permission_val = implode(',',$this->input->post('project_permission_val'));
        } else { $project_permission_val=''; }
        
        if($this->input->post('label_permission_val')){
            $label_permission_val = implode(',',$this->input->post('label_permission_val'));
        } else { $label_permission_val=''; } 
        
        if($this->input->post('task_permission_val')){
            $task_permission_val = implode(',',$this->input->post('task_permission_val'));
        } else { $task_permission_val=''; }
        
        $dataU = array('add_team' => $this->input->post('add_team'),
            'add_account' => $this->input->post('add_account'),
            'project_crud' => $project_permission_val,
            'label_crud' => $label_permission_val,
            'task_crud' => $task_permission_val );
        $multi_where = array('project_id'=>$project_id);
        edit_update_multi_where('tbl_roles', $dataU, $multi_where);
        $multi_user_id = get_role_data('user_id',$project_id);

        $multi_user_id = explode(',', $multi_user_id);
        foreach ($multi_user_id as $value) {
            $tbl_notifications_data = array('main_user_id'=>getProfileName('user_id'),'user_id'=>$value,'title'=>'Access Permission','url'=>$this->input->post('url'), 'notifications_name'=>'Access Permission','updated_date'=>date_from_today(),'created_date'=>date_from_today());
            notification_insertDB($tbl_notifications_data);
        }
        echo current_url();

    }

    public function addaccountemail_insert()
    {
        $email = $this->input->post('addaccountemail');
        $result = get_by_id('tbl_users', 'user_id', 'email', $email);
        $user_id = $result['user_id'];
        $qry1 = $this->db->query("SELECT main_account,user_id FROM `tbl_merge_users` where main_account='".getProfileName('user_id')."' limit 1");
        $qry_result1 = $qry1->row_array();
        $main_account = $qry_result1['main_account'];
        if($main_account){
            $twoid = $qry_result1['user_id'].','.$user_id;
            $arg1 = array('user_id'=>$twoid,'created_date'=>date_from_today());
            $multi_where = array('main_account'=>$main_account);
            edit_update_multi_where('tbl_merge_users', $arg1, $multi_where);
        } else {
            $arg1 = array('main_account'=>getProfileName('user_id'),'user_id'=>$user_id,'created_date'=>date_from_today());
            insert_data_last_id('tbl_merge_users', $arg1);
        }
    }

    public function search(){
      $user_id=getProfileName('user_id');
        $term = $this->input->get('term');
        $this->db->like('project_name', $term);
        $this->db->where('user_id', $user_id);
        $tbl_project = $this->db->get("tbl_project")->result();
        /*$json_response = array();
        foreach ($tbl_project as $key => $value) {
          $json_row["id"] = $value['project_id'];
          $json_row["value"] = $value['project_name'];
          $json_row["label"] = $value['project_name'];
          array_push($json_response,$json_row);
        }*/
        echo json_encode($tbl_project);
    }

    public function email_search(){
      $ignore = array(1, getProfileName('user_id'));
      $term = $this->input->get('term');
      $this->db->select('email');
      $this->db->like('email', $term);
      $this->db->where_not_in('user_id',$ignore);
      $tbl_users = $this->db->get("tbl_users")->result();
      echo json_encode($tbl_users);
    }

    public function serach_any_data()
    {
    	$search_word = $this->input->post('search');
        $tbl_project1=$this->db->query("SELECT project_name,project_id FROM `tbl_project` where user_id='".getProfileName('user_id')."' and project_name like '%$search_word%'");
        $tbl_project=$tbl_project1->result_array();
        $tbl_task1=$this->db->query("SELECT title,id FROM `tbl_task` where user_id='".getProfileName('user_id')."' and title like '%,$search_word,%'");
        $tbl_task=$tbl_task1->result_array();
        $tbl_status1=$this->db->query("SELECT status_name,id FROM `tbl_status` where user_id='".getProfileName('user_id')."' and status_name like '%,$search_word,%'");
        $tbl_status=$tbl_status1->result_array();
          $html = '<div>';
          $html .='
          <div class="panel panel-default">';
            foreach ($tbl_project as $key => $value) {
              $html .='<div class="panel-body">'.$value['project_name'].'</div>';
            }
          $html .='</div>';
          $html .='
          <div class="panel panel-default">';
            foreach ($tbl_task as $key => $value) {
              $html .='<div class="panel-body">'.$value['title'].'</div>';
            }
          $html .='</div>';
          $html .='
          <div class="panel panel-default">';
            foreach ($tbl_status as $key => $value) {
              $html .='<div class="panel-body">'.$value['status_name'].'</div>';
            }
          $html .='</div>';
          $html .='</div>';
      echo $html;
    }

    public function tbl_page_refresh()
    {
        $qry = $this->db->query("DELETE FROM `tbl_page_refresh` WHERE  user_id ='".getProfileName('user_id')."'");
        echo $this->input->post('inviteCopyLink');
    }

    public function get_assing_project_email()
    {
        $html = '';
        $main_user_id = anj_decode($this->input->post('projectMain_user_id')); 
        $projectID = anj_decode($this->input->post('projectID'));
        $coma_user_id = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'user_id');
        $qry = $this->db->query("select user_id,email from tbl_users where user_id!=1 and user_id!='".getProfileName('user_id')."' and user_id IN ($coma_user_id)");
        $result = $qry->result_array(); 
        foreach ($result as $key => $value) {
            
            $checked='checked';
            $html .= '<div class="form-check inviteTeamCheck"><input class="form-check-input" type="checkbox" id="defaultcheck'.$value['user_id'].'" name="checkbox_projecthold" value="'.$value['user_id'].'" '.$checked.'><label class="form-check-label" for="defaultcheck'.$value['user_id'].'">'.$value['email'].'</label></div>';
        } 
        echo $html;
    }
    
    public function getEmailID_list()
    {
        $html = '';
        $qry = $this->db->query("select user_id,email from tbl_users where user_id!=1 and user_id!='".getProfileName('user_id')."'");
        $result = $qry->result_array(); 
        foreach ($result as $key => $val) {
            $html .='<option value="'.$val['email'].'" data-badge="">'.$val['email'].'</option>';
        } 
        echo $html;
    }

	public function edit_task_assigned_to_drop()
    {
        $html = '<option value="0" selected>Select assigned to task</option>';
        $project_id = anj_decode($this->input->post('projectID'));
        $main_user_id = anj_decode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');

        $project_assgin_to_user = get_by_role_assion('tbl_roles', $main_user_id, $project_id, 'user_id');
        if($project_assgin_to_user){
            $qry = $this->db->query("select username,user_id,email from tbl_users where user_id!=1 and user_id IN ($project_assgin_to_user)");
            $result = $qry->result_array(); 
            foreach ($result as $key => $val) {
                $html .='<option value="'.$val['user_id'].'">'.$val['username'].' ('.$val['email'].')</option>';
            } 
        }
        echo $html;
    }

	public function ajax_background()
    {
        echo bg(anj_decode($this->input->post('projectID')));
    }

    public function ajax_getNotificationList()
    {
        $user_id = getProfileName('user_id');
        //$getNotificationList = get_by_all('tbl_notifications', '*', 'user_id', $user_id);
        $getNotificationList = $this->db->query("SELECT `notifications_id`,`main_user_id`,`user_id`,`url`,`notifications_name`,`created_date`,`updated_date` FROM `tbl_notifications` where user_id=$user_id and eStatus=0 ORDER BY `tbl_notifications`.`notifications_id` DESC");
        $getNotificationList = $getNotificationList->result_array();
        $totalno = count($getNotificationList);
        $html = '';
        if($getNotificationList){
        foreach ($getNotificationList as $key => $value) {
            $imaname = get_user_img($value['user_id']);
            if($value['created_date']=='0000-00-00 00:00:00'){
                $date = $value['updated_date'];
            } else {
                $date = $value['created_date'];
            }
            $html .='<li>
                    <a href="'.base_url('ajax/notification_read/').$value['notifications_id'].'" class="notificationDetails">
                    <div class="notificationImg">
                        <img src="'.$imaname.'" class="img-fluid" alt="'.$value['notifications_name'].'">
                    </div>
                    <div class="notificationNamedate">
                        <h4>'.$value['notifications_name'].'</h4>
                        <div class="DateTime">
                            <h6 class="notificationDate"><i class="far fa-calendar-alt"></i>'.date('Y-m-d',strtotime($date)).'</h6><h6 class="notificationTime"><i class="far fa-clock"></i>'.time_elapsed_string($date).'</h6>
                        </div>
                    </div>
                    </a>
                </li>';
        }
      } else {
        $html .='<li class="static-message"><div class="static-message-icon"><div class="icon"><i class="fas fa-info"></i></div></div><div class="static-message-text">You don&#x27;t have any notifications</div></li>';
      }
        if($totalno==0){
            $color = '#ff4927';
            $totalno = '';
        } else {
            $color = '#ff4927';
            $totalno = $totalno;
        }
        $newResults = array('list'=>$html,'total'=>$totalno,'color'=>$color);
        echo json_encode($newResults);
    }

    public function ajax_showAllTeamModal()
    {
        $projectID = anj_decode($this->input->post('projectID'));
        $main_user_id = anj_decode($this->input->post('projectMain_user_id')); 
        $projectCombo_id = $this->input->post('projectCombo_id');
        $html = '<ul class="removeTeamMemberList">';
        $query = $this->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$projectID' and combo_id='$projectCombo_id'");
        $statusResult = $query->result_array();
        foreach ($statusResult as $statusRow) {
            $user_id = $statusRow["user_id"];
            $new_value_userID = removeFromString($user_id,$main_user_id);
            if($new_value_userID){
                $usermage_array = $this->db->query("select user_id,picture,picture_url,oauth_provider,username from tbl_users where user_id IN ($user_id) order by user_id DESC");
                $user_image_array = $usermage_array->result_array();
                foreach ($user_image_array as $value) {
                $imaname = get_user_img($value['user_id']);

                
                if($value['user_id']==$main_user_id){
                    
                    $html .='<li><a href="javascript:void(0)" class="team_member_item">
<img src="'.$imaname.'" data-toggle="modal" placement="top" title="'.$value['username'].'" alt="'.$value['username'].'" data-original-title="'.$value['username'].'" width="100" data-target="#permissionModal">
                        <h4 class="memberName">'.$value['username'].' </h4></a>
                        </li>';
                } else {
                    $html .='<li><a href="javascript:void(0)" class="team_member_item">
<img src="'.$imaname.'" placement="top" title="'.$value['username'].'" alt="'.$value['username'].'" data-original-title="'.$value['username'].'" width="100" >
                        <h4 class="memberName">'.$value['username'].'</h4>';
                            
                        $html .='<button class="removeTeamIcon" data-user_id="41" onclick="delete_team('.$value['user_id'].')"><i class="far fa-times-circle"></i></button>';
                        $html .='</a>
                        </li>';
                }

                            
                }
            }            
       } 
       $html .='</ul>';
       echo $html;
    }

    public function ajax_edit_task_status()
    {
    	$html = '';
    	$project_id = $this->input->post('project_id');
    	$combo_id = $this->input->post('combo_id');
        if($combo_id){
        $qrytbl_status = $this->db->query("select status_name,id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0");
        $resulttbl_status = $qrytbl_status->result_array(); 
	        foreach ($resulttbl_status as $key => $val) {
	        	$html .='<option value="'.$val['id'].'">'.$val['status_name'].'</option>';
	        }
    	}
        echo $html;
    }

    public function ajax_show_project_time()
    {
      $project_id = $this->input->post('project_id');
      $qrytbl_status = get_by_id('tbl_project', 'deadline', 'project_id', $project_id);
      echo $qrytbl_status['deadline'];
    }


}
<?php
function dayscounts($date2){
    $diff = strtotime($date2) - strtotime(date("Y-m-d H:i:s"));
    return abs(round($diff / 86400));
}

function newloginBydefultProject1(){
    $combo_id = time() + 1;
    $ci = & get_instance();
    $project_slug = slugify('Communication Software');
    $data1 = array(
        'project_name'=>'Communication Software',
        'project_slug'=>$project_slug,
        'project_description'=>'You can communicate through your ecommerce project management software but it’s always good to have an alternative communication channel. One that isn’t email, in any case.',
        'start_date'=>date_from_today(),
        'deadline'=>date('Y-m-d H:i:s', strtotime(date_from_today(). ' +30 days')),
        'category'=>'php,ajax',
        'client_id'=>'ANJ Webtech',
        'created_date'=>date_from_today(),
        'user_id'=>getProfileName('user_id'),
        'combo_id'=>$combo_id,
        'status'=>0,
        'project_priority'=>'Urgent',
        'billing_type_id'=>'Project Hours',
        'estimated_hours'=>'40',
        'project_phase'=>'3',
        'project_demo_url'=>'http://google.com'
        );
    $project_id = insert_data_last_id('tbl_project',$data1);
    $projectID = anj_encode($project_id);
    $projectASSIGN = slugify(getProfileName('username'));
    $projectMain_user_id = anj_encode(getProfileName('user_id'));
    $projectCombo_id = $combo_id;
    $project_link = base_url().'Invite/anj/'.$projectID.'/'.$project_slug.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    $ci->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
    for($i=1;$i<=3;$i++){
      $last_id = defult_label_add($combo_id,$project_id,$i);
      if($i==1){
        defult_task_add($combo_id,$project_id,$last_id);
      }
    }
}


function newloginBydefultProject2(){
    $combo_id = time() + 2;
    $ci = & get_instance();
    $project_slug = slugify('File Sharing Software');
    $data = array(
    'project_name' => 'File Sharing Software',
    'project_slug' =>$project_slug,
    'project_description'=>'File sharing software allows you to upload files directly into the cloud or transfer them directly to the destination. Probably the most common file sharing platform is Google’s G Suite, but that’s not the only option out there.',
    'start_date' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +10 days')),
    'deadline' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +90 days')),
    'category' =>  'Java',
    'client_id' =>  'Paul Molive',
    'created_date' => date_from_today(),
    'user_id' => getProfileName('user_id'),
    'combo_id'=> $combo_id,
    'status'=>2,
    'project_priority'=>'Urgent',
    'billing_type_id'=>'Project Hours',
    'estimated_hours'=>'80',
    'project_phase'=>'3',
    'project_demo_url'=>'http://google.com'
    );
    $project_id = insert_data_last_id('tbl_project',$data);
    $projectID = anj_encode($project_id);
    $projectASSIGN = slugify(getProfileName('username'));
    $projectMain_user_id = anj_encode(getProfileName('user_id'));
    $projectCombo_id = $combo_id;
    $project_link = base_url().'Invite/anj/'.$projectID.'/'.$project_slug.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    $ci->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
    for($i=1;$i<=3;$i++){
      $last_id = defult_label_add($combo_id,$project_id,$i);
      if($i==1){
        defult_task_add($combo_id,$project_id,$last_id);
      }
    }
}


function newloginBydefultProject3(){
    $combo_id = time() + 4;
    $ci = & get_instance();
    $project_slug = slugify('Time Tracking and Billing Software');
    $data1 = array(
        'project_name' => 'Time Tracking and Billing Software',
        'project_slug' => $project_slug,
        'project_description'=>'Time tracking and billing software allows you to monitor how long you actually work on the tasks and then, analyze whether these numbers are up to your expectations. It’s also useful when you work with contractors and freelancers paid per hour.',
        'start_date' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +10 days')),
        'deadline' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +60 days')),
        'category' =>  'Laravel',
        'client_id' =>  'Gail Forcewind',
        'created_date' => date_from_today(),
        'user_id' => getProfileName('user_id'),
        'combo_id'=> $combo_id,
        'status'=>3,
        'project_priority'=>'Urgent',
        'billing_type_id'=>'Project Hours',
        'estimated_hours'=>'120',
        'project_phase'=>'3',
        'project_demo_url'=>'http://google.com'
        );
    $project_id = insert_data_last_id('tbl_project',$data1);
    $projectID = anj_encode($project_id);
    $projectASSIGN = slugify(getProfileName('username'));
    $projectMain_user_id = anj_encode(getProfileName('user_id'));
    $projectCombo_id = $combo_id;
    $project_link = base_url().'Invite/anj/'.$projectID.'/'.$project_slug.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    $ci->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
    for($i=1;$i<=3;$i++){
      $last_id = defult_label_add($combo_id,$project_id,$i);
      if($i==1){
        defult_task_add($combo_id,$project_id,$last_id);
      }
    }
}


function newloginBydefultProject4(){
    $combo_id = time() + 12;
    $ci = & get_instance();
    $project_slug = slugify('CRM Software');
    $data1 = array(
        'project_name' => 'CRM Software',
        'project_slug' => $project_slug,
        'project_description'=>'CRM stands for customer relationship management and it’s a crucial part for ecommerce businesses. Seeing as customers are an indispensable part of your business, including their management in your ecommerce projects won’t be a rare occurrence.With help of CRM software you can discover where your clients are mostly coming from and what channels of communications they prefer. With this information, you can manage your future project’s resources and allocate them to the right customer acquisition channels.',
        'start_date' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +10 days')),
        'deadline' =>  date('Y-m-d H:i:s', strtotime(date_from_today(). ' +20 days')),
        'category' =>  'Laravel',
        'client_id' =>  'Gail Forcewind',
        'created_date' => date_from_today(),
        'user_id' => getProfileName('user_id'),
        'combo_id'=> $combo_id,
        'status'=>4,
        'project_priority'=>'Urgent',
        'billing_type_id'=>'Project Hours',
        'estimated_hours'=>'220',
        'project_phase'=>'3',
        'project_demo_url'=>'http://google.com'
        );
    $project_id = insert_data_last_id('tbl_project',$data1);
    $projectID = anj_encode($project_id);
    $projectASSIGN = slugify(getProfileName('username'));
    $projectMain_user_id = anj_encode(getProfileName('user_id'));
    $projectCombo_id = $combo_id;
    $project_link = base_url().'Invite/anj/'.$projectID.'/'.$project_slug.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    $ci->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
    for($i=1;$i<=3;$i++){
      $last_id = defult_label_add($combo_id,$project_id,$i);
      if($i==1){
        defult_task_add($combo_id,$project_id,$last_id);
      }
    }
}
function defult_label_add($combo_id,$project_id,$i)
{
    $ci = & get_instance();
    if($i==1){ 
        $i=0;
        $status_name = 'TO DO';
    } else if($i==2){
        $i=0;
        $status_name = 'IN PROGRESS';
    } else if($i==3){
        $i=1;
        $status_name = 'DONE';
    }
    $status_data = array(
                  'status_name' => $status_name,
                  'combo_id' => $combo_id,
                  'project_id' => $project_id,
                  'user_id' => getProfileName('user_id'),
                  'orderBY' => $i
            );
    return insert_data_last_id('tbl_status',$status_data);
}

function defult_task_add($combo_id,$project_id,$status_id)
{
    $ci = & get_instance();
    $task_data1 = array(
                  'title' => 'title...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => getProfileName('user_id'),
                  'assigned_to' => getProfileName('user_id'),
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>3
                );
    insert_data_last_id('tbl_task',$task_data1);
    $task_data2 = array(
                  'title' => 'Front End Implementation...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => getProfileName('user_id'),
                  'assigned_to' => getProfileName('user_id'),
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>1
                );
    insert_data_last_id('tbl_task',$task_data2);
    $task_data3 = array(
                  'title' => 'Data imports end implementation...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => getProfileName('user_id'),
                  'assigned_to' => getProfileName('user_id'),
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>2
                );
    insert_data_last_id('tbl_task',$task_data3);

    $query = $ci->db->query("SELECT GROUP_CONCAT(id) as id FROM `tbl_status` WHERE combo_id='$combo_id' and project_id='$project_id'");
    $result_array = $query->row_array();
    $last_statusID = $result_array['id'];
    return insert_data_last_id('tbl_roles',array('status_id'=>$last_statusID,'combo_id'=>$combo_id,'main_user_id'=>getProfileName('user_id'),'user_id'=>getProfileName('user_id'),'project_id'=>$project_id,'created_date'=>date_from_today()));
}

function total_project()
{
    $checkarray = array('user_id'=>getProfileName('user_id'),'status'=>0);
    return count(get_by_all_whereArray('tbl_project', '*', $checkarray));
}

function accessOnlyMembers($project_id) {
    $user_type = getProfileName('user_type');
    //if($user_type == 'corporate' || $user_type == 'school' || $user_type == 'individual'){
    if(get_show_project_id('main_user_id',$project_id)==getProfileName('user_id'))
    {
        return 1;
    } else {
        return 0;
    }
}

function accessOnlyMain($project_id) {
    if(get_role_data('main_user_id',$project_id) == getProfileName('user_id'))
    {
        return true;
    } else {
        return false;
    }
}

function get_role_permission($cloumn_id,$project_id){
    $ci = & get_instance();
    $designation = getProfileName('designation');
    if($project_id){
    $query=$ci->db->query("SELECT $cloumn_id FROM `tbl_permission` WHERE role_name='$designation' order by permission_id desc LIMIT 1");
    $result_array = $query->row_array();
    return $result_array[$cloumn_id];
    } else {
        return 'no';
    }
}

function get_role_data($cloumn_id,$project_id,$role_name=''){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    if($project_id){
    $query=$ci->db->query("SELECT $cloumn_id FROM `tbl_roles` WHERE project_id=$project_id order by roles_id desc LIMIT 1");
    $result_array = $query->row_array();
    return $result_array[$cloumn_id];
    } else {
        return 0;
    }
}

function get_show_project_id($cloumn_id,$project_id){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    if($project_id){
    $query = $ci->db->query("SELECT $cloumn_id FROM `tbl_roles` WHERE CONCAT(',', user_id, ',') like '%,$user_id,%' and main_user_id=$user_id and project_id=$project_id order by roles_id desc LIMIT 1");
    $result_array = $query->row_array();
    return $result_array[$cloumn_id];
    } else {
        return 0;
    }
}

function get_group_concat_project_id($cloumn_id){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    $query = $ci->db->query("SELECT GROUP_CONCAT($cloumn_id) as $cloumn_id FROM `tbl_roles` WHERE CONCAT(',', user_id, ',') like '%,$user_id,%'");
    $result_array = $query->row_array();
    return $result_array[$cloumn_id];
}

function getDropDownList_project_id($status=''){
    $ci = & get_instance();
    $ci->load->database();
    $get_group_concat_project_id = get_group_concat_project_id('project_id');
    if($get_group_concat_project_id){
        if($status){
            $query = $ci->db->query("SELECT * FROM `tbl_project` WHERE project_id IN ($get_group_concat_project_id) and eDelete=0 and status=$status ORDER BY `tbl_project`.`project_id` DESC");
        } else {
            $query = $ci->db->query("SELECT * FROM `tbl_project` WHERE project_id IN ($get_group_concat_project_id) and eDelete=0 ORDER BY `tbl_project`.`project_id` DESC");
        }
        
        $result = $query->result_array();
        return $result;
    }
    return false;
}

function getDropDownList_project_user_id($table,$show_cloumn,$orderby_id,$orderby,$status){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    $ci->load->database();
    $ci->db->select($show_cloumn);
    $ci->db->from($table);
    $ci->db->where(array('status'=>$status,'eDelete'=>0));
    $ci->db->where('user_id',$user_id);
    $ci->db->order_by($orderby_id,$orderby);
    $query=$ci->db->get();
    return $query->result_array();
}

function getDropDownList_project($table,$show_cloumn,$orderby_id,$orderby,$status){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    $ci->load->database();
    $ci->db->select($show_cloumn);
    $ci->db->from($table);
    $ci->db->where(array('status'=>$status,'eDelete'=>0));
    $ci->db->where('user_id',$user_id);
    $ci->db->order_by($orderby_id,$orderby);
    $query=$ci->db->get();
    return $query->result_array();
}

function getDropDownList2($table,$show_cloumn,$orderby_id,$orderby,$status){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select($show_cloumn);
    $ci->db->from($table);
    $ci->db->where(array('status'=>$status,'eDelete'=>0));
    $ci->db->order_by($orderby_id,$orderby);
    $query=$ci->db->get();
    return $query->result_array();
}

function get_by_id_Order($table, $column_id)
{
    $ci = & get_instance();
    $ci->db->select($column_id);
    $ci->db->from($table);
    $ci->db->where('eDelete', 0);
    $ci->db->order_by($column_id, 'DESC');
    $query = $ci->db->get();
    $result = $query->row_array();
    return $result[$column_id];
}

function project_assgin_tbl_role($main_user_id,$projectID,$user_id){
    $main_user_id = anj_decode($main_user_id);
    $projectID = anj_decode($projectID);
    $coma_user_id = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'user_id');
    $assigned_to = implode(',',array_unique(explode(',', $coma_user_id.','.$user_id)));
    $data_role = array('user_id' => $assigned_to);
    $multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID);
    edit_update_multi_where('tbl_roles',$data_role,$multi_where);
}

function get_by_role_assion($table, $main_user_id, $project_id, $column_id)
{
    $ci = & get_instance();
    $ci->db->select($column_id)->from($table)->where(array('eDelete'=>0,'main_user_id'=>$main_user_id, 'project_id'=>$project_id));
    $query = $ci->db->get();
    $result = $query->row_array();
    return $result[$column_id];
}

function getProjectName($key,$project_id){
    $CI = & get_instance();
    $id = getProfileName('user_id');
    $query = $CI->db->get_where('tbl_project', array('project_id' => $project_id));
    $result = $query->row_array();
    return  $result[$key];
}

function getuser_type($user_type_id){
    $CI = & get_instance();
    $query = $CI->db->get_where('tbl_user_type', array('user_type_id' => $user_type_id));
    $result = $query->row_array();
    return  $result['user_type'];
}

function getusertypeDropDownList($user_type){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('designation');
    $ci->db->from('tbl_rolename');
    $ci->db->where(array('user_type'=>$user_type,'eDelete'=>0));
    $ci->db->order_by('rolename_id','desc');
    $query=$ci->db->get();
    $result = $query->result_array();
    $html = '';
    foreach ($result as $key => $value) {
        $html .= '<option value="'.$value["designation"].'">'.$value["designation"].'</option>';
    }
    return $html;
}

function getProjectTotal($key){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    $query = $ci->db->query("SELECT client_id FROM `tbl_project` WHERE user_id=$user_id");
    return  $query->num_rows();
}


function get_tbl_price($price_hide,$key){
    $ci = & get_instance();
    $query=$ci->db->query("SELECT * FROM `tbl_price` WHERE price_hide='$price_hide' order by price_id desc LIMIT 1");
    $result_array = $query->row_array();
    return $result_array[$key];
}

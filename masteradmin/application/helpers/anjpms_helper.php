<?php

function getSettings($setting_name=''){
    $ci = & get_instance();
    $ci->load->database();
    if($setting_name){
        $ci->db->select('setting_value');
        $ci->db->from('tbl_settings');
        $ci->db->where('eDelete',0);
        $ci->db->where("setting_name",$setting_name);
        $query=$ci->db->get();
        $re = $query->row_array();
        return $re['setting_value'];
    } else {
        $ci->db->select('*');
        $ci->db->from('tbl_settings');
        $ci->db->where('eDelete',0);
        $query=$ci->db->get();
        $re = $query->result_array();
        return $re;
    }
    
}


function defult_label_add($combo_id,$project_id,$i,$projassing)
{
    $ci = & get_instance();
    if($i==1){ 
        $status_name = 'TO DO';
    } else if($i==2){
        $status_name = 'IN PROGRESS';
    } else if($i==3){
        $status_name = 'DONE';
    }
    $status_data = array(
                  'status_name' => $status_name,
                  'combo_id' => $combo_id,
                  'project_id' => $project_id,
                  'user_id' => $projassing,
                  'orderBY' => $i
            );
    return insert_data_last_id('tbl_status',$status_data);
}

function defult_task_add($combo_id,$project_id,$status_id,$projassing)
{
    $ci = & get_instance();
    $task_data = array(
                  'title' => 'title...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => $projassing,
                  'assigned_to' => $projassing,
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id
                );
    insert_data_last_id('tbl_task',$task_data);

    $query = $ci->db->query("SELECT GROUP_CONCAT(id) as id FROM `tbl_status` WHERE combo_id='$combo_id' and project_id='$project_id'");
    $result_array = $query->row_array();
    $last_statusID = $result_array['id'];
    return insert_data_last_id('tbl_roles',array('status_id'=>$last_statusID,'combo_id'=>$combo_id,'main_user_id'=>$projassing,'user_id'=>$projassing,'project_id'=>$project_id,'created_date'=>date_from_today()));
}

function notification_insertDB($tbl_notifications_data){
   $ci = & get_instance();
   $notifications_id = insert_data_last_id('tbl_notifications',$tbl_notifications_data);
   return true;
}

function anj_encode($text){
  return str_replace('=', '', strtr(base64_encode($text), '+/', '-_'));
}

function anj_decode($text){
  return str_replace('=', '', strtr(base64_decode($text), '+/', '-_'));
}

function is_login_admin(){ 
  if(isset($_SESSION['admin_details'])){
      return true;
  }else{
     redirect( base_url(''), 'refresh');
  }
}

function getProfileName($key){
    $CI = & get_instance();
    $id = getSession('user_id');
    $query = $CI->db->get_where('tbl_users', array('user_id' => $id));
    $result = $query->row_array();
    return  $result[$key];
}

function gettbl_users($user_id,$key){
  $ci = & get_instance();
  $query = $ci->db->get_where('tbl_users', array('user_id' => $user_id));
  $result = $query->row_array();
  return $result[$key];
}

function gettbl_project($project_id,$key){
  $ci = & get_instance();
  $query = $ci->db->get_where('tbl_project', array('project_id' => $project_id));
  $result = $query->row_array();
  return $result[$key];
}

function gettbl_priority($priority_id,$key){
  $ci = & get_instance();
  $query = $ci->db->get_where('tbl_priority', array('priority_id' => $priority_id));
  $result = $query->row_array();
  return $result[$key];
}

function check_user_mail($email)
{
  $ci = & get_instance();
  $result = $ci->db->get_where('tbl_users', array('email' => $email));
  if($result->num_rows() > 0){
    $result = $result->row_array();
    return $result;
  } else {
    return false;
  }
}


function getSession($key){
    $CI = & get_instance();
    $userSession = $CI->session->userdata('admin_details');
    return  $userSession[$key];
}

function date_from_today()
{
    return date('Y-m-d H:i:s');
}

function get_dataBY_admin($table,$column_id)
{
    $ci = & get_instance();
    $ci->db->select('*');
    $ci->db->from($table);
    $ci->db->where('eDelete',0);
    $ci->db->order_by($column_id,'desc');
    $query = $ci->db->get();
    return $query->result_array();
}

function getTable($select,$table,$column_id){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select($select);
    $ci->db->from($table);
    $ci->db->where('eDelete',0);
    $ci->db->order_by($column_id,'desc');
    $query=$ci->db->get();
    return $query->result_array();
}

function getuser_type($user_type_id){
    $CI = & get_instance();
    $query = $CI->db->get_where('tbl_user_type', array('user_type_id' => $user_type_id));
    $result = $query->row_array();
    return  $result['user_type'];
}

function insert_data_last_id($tablename, $arg1)
{
    $ci = & get_instance();
    $ci->db->insert($tablename, $arg1);
    if ($ci->db->affected_rows() > 0) {
        return $last_insert_id = $ci->db->insert_id();
    } else {
        return NULL;
    }
}

function edit_update($table, $data, $column_id, $id){
    $ci = & get_instance();
    $ci->db->where($column_id, $id);
    $ci->db->update($table, $data);
    return true;
}

function edit_update_multi_where($table, $data, $multi_where){
    $ci = & get_instance();
    $ci->db->where($multi_where);
    $ci->db->update($table, $data);
    return true;
}

function getusertypeDropDownList($user_type){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('designation');
    $ci->db->from('tbl_rolename');
    $ci->db->where(array('user_type'=>$user_type,'eDelete'=>0));
    $query=$ci->db->get();
    $result = $query->result_array();
    $html = '';
    foreach ($result as $key => $value) {
        $html .= '<option value="'.$value["designation"].'">'.$value["designation"].'</option>';
    }
    return $html;
}

function gettbl_rolenameDropDown(){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('designation');
    $ci->db->from('tbl_rolename');
    $ci->db->where(array('eDelete'=>0));
    $query=$ci->db->get();
    return $query->result_array();
}

function gettbl_user_typeDropDown(){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('tbl_user_type');
    $ci->db->where(array('eDelete'=>0));
    $query=$ci->db->get();
    return $query->result_array();
}


if ( !function_exists('slugify')){
    function slugify($text)
    {
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, '-');
      $text = preg_replace('~-+~', '-', $text);
      $text = strtolower($text);
      if (empty($text)) {
        return 'n-a';
      }
      return $text;
    }
}

function fileUploadd($filename,$foldername='',$allowed_types='*')
{
    $ci = & get_instance();
    $config['upload_path']    = '../uploads/'.$foldername;
    $config['allowed_types'] = '*';
    $ci->load->library('upload', $config);
    if ( ! $ci->upload->do_upload($filename)) {
        $error = array('error' => $ci->upload->display_errors());
        return $error;
    } else {
        $data = $ci->upload->data();
        return $data;
    }
}

?>
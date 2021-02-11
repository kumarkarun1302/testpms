<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function anj_encode($text){
  return str_replace('=', '', strtr(base64_encode($text), '+/', '-_'));
}

function anj_decode($text){
  return str_replace('=', '', strtr(base64_decode($text), '+/', '-_'));
}

function testmail($message,$name)
{
    $ci = & get_instance();
    $config['useragent']            = "CodeIgniter";
    $config['mailpath']             = "/usr/bin/sendmail";
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://mail.anjwebtech.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '20';
    $config['smtp_user']    = 'pms.test@anjwebtech.com';
    $config['smtp_pass']    = 'dT*}E&awppG@';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; 
    $config['validation'] = TRUE;      
    $ci->email->initialize($config);
    $ci->email->from('info@anjwebtech.com', $name);
    $ci->email->to('manish@anjwebtech.com');
    $ci->email->subject($message);
    $ci->email->message($message);  
    $ci->email->send();
    return true;
    //echo $ci->email->print_debugger();
}

 function sendPushNotificationToFCMSever($device_id, $message) {
  
  $url = 'https://fcm.googleapis.com/fcm/send';
  $api_key = 'AAAAB-AO9ds:APA91bH3yOAZl8b_cK-lM3eLN25aqHvBVcWTXc9x_wyHzDng7RqmDqf3xanqTteEJKnm5s1ImnNkKpD-K7AxXBTl9yOVKXTpiDbwdPItCiruq8mKefVPu_WW0DBv6UQSAx4v8fWvW8rn';
  $fields = array (
      'registration_ids' => array (
              $device_id
      ),
      'data' => array (
          "title" => "test from server",
          "body" => "test lorem ipsum"
      )
  );
  $headers = array(
  'Content-Type:application/json',
  'Authorization:key='.$api_key
  );
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($ch);
  if ($result === FALSE) {
  die('FCM Send Error: ' . curl_error($ch));
  } else {
      curl_close($ch);
      //print_r($result);
      return $result;
  }
  return $result;
}

function getProjectByStatus($user_id,$project_id,$main_user_id){
  $ci = & get_instance();
  $query = $ci->db->query("SELECT `s`.*,`r`.user_id FROM `tbl_roles` as `r` LEFT JOIN `tbl_status` as `s` ON `r`.`combo_id`=`s`.`combo_id` WHERE `s`.`eDelete` = 0 AND `r`.`main_user_id` = $main_user_id and `r`.`project_id` = $project_id and CONCAT(',', `r`.user_id, ',') like '%,$user_id,%' ORDER BY `orderBY` DESC");
  //echo $ci->db->last_query();exit;
  return $query->result_array();
}

function getProjectByTask($status_id,$project_id){
  $ci = & get_instance();
    $ci->db->select('*')->from('tbl_task')->where(array('status_id'=>$status_id,'project_id'=>$project_id,'eDelete'=>0))->order_by("id",'DESC');
    $query=$ci->db->get();
//echo $ci->db->last_query();exit;
    return $query->result_array();
}

function show_tasklist($user_id,$project_id,$main_user_id) {
  $ci = & get_instance();
  $statusResult = getProjectByStatus($user_id,$project_id,$main_user_id);
  $json_response = array();
  foreach ($statusResult as $statusRow) {
    $status_id = $statusRow["id"];
    $project_id = $statusRow["project_id"];
    $taskResult = getProjectByTask($status_id,$project_id);
    $row_array = array();
    $row_array['status_id'] = $status_id; 
    $row_array['label_name'] = $statusRow["status_name"];        
    $row_array['Tasks'] = array();
    foreach ($taskResult as $taskRow) { 
      if($taskRow["priority"]=='1'){
          $priority = 'low';
      } else if($taskRow["priority"]=='2'){
        $priority = 'medium';
      } else if($taskRow["priority"]=='1'){
        $priority = 'high';
      }
      $statusid= $taskRow["status_id"];
      $task_status = get_one_value('tbl_status','status_name','id',$statusid);
      //$assigned_to = $taskRow["assigned_to"];
      $assigned_to = get_by_role_assion('tbl_roles', $main_user_id, $project_id, 'user_id');
      $query = $ci->db->query("SELECT GROUP_CONCAT(username, ' (', email, ')') as task_assigned_name FROM `tbl_users` WHERE user_id IN ($assigned_to)");
      $username = $query->row_array();
      $row_array['Tasks'][] = array(
              'task_id' => $taskRow["id"],
              'task_name' => $taskRow["title"],
              'task_description' => $taskRow["description"],
              'task_assigned' => $assigned_to,
              'task_assigned_name' => $username['task_assigned_name'],
              'task_duedate' => $taskRow["due_date"],
              'task_priority' => $priority,
              'task_status' => $task_status
            );
    }
    array_push($json_response,$row_array);
  }
  return $json_response;
}

function checkallreadyaccount($user_id)
{
  $ci = & get_instance();
  $qry=$ci->db->query("SELECT user_id FROM tbl_merge_users where CONCAT(',', user_id, ',') like '%,$user_id,%'");
  return $qry->row_array();
}

function manish_image($main_user_id,$project_id,$combo_id)
{
    $ci = & get_instance();
    $json_response = array();
    $query = $ci->db->query("select user_id from tbl_roles where main_user_id='$main_user_id' and project_id='$project_id' and combo_id='$combo_id'");
    $statusResult = $query->result_array();
    foreach ($statusResult as $statusRow) {
      $user_id = $statusRow["user_id"];
      $user_image_array = getProject_userImage($user_id);
      $getProject_userImage_count_4 = getProject_userImage_count_4($user_id);
    foreach ($user_image_array as $value) {
        $row_array['assgin_id'] = $value['user_id'];
        $row_array['name'] = $value['username'].' ('.$value['email'].')';
        $row_array['picture_url'] = get_user_img($value['user_id']);
        array_push($json_response,$row_array);
    } 
    $row_array['total'] = $getProject_userImage_count_4['fourcount'];
    
   } 
   return $json_response;
}

function getProject_userImage($user_id){
  $ci = & get_instance();
  $query = $ci->db->query("SELECT `user_id`,`username`,`email` FROM `tbl_users` WHERE `user_id` IN ($user_id)");
  return $query->result_array();
}

function get_user_img($user_id){ 
  $CI = & get_instance();
  $query = $CI->db->query("SELECT `picture_url` FROM `tbl_users` WHERE `user_id`=$user_id");
  $result = $query->row_array();
  return $result['picture_url'];
}

function getProject_userImage_count_4($user_id){
  $ci = & get_instance();
  $query = $ci->db->query("SELECT (count(picture) - 4) as fourcount FROM `tbl_users` WHERE `user_id` IN ($user_id)");
//echo $this->db->last_query();exit;
  return $query->row_array();
}

function date_from_today() {
    $CI = & get_instance();
    return date('Y-m-d H:i:s');
}

function add_insert($table, array $data) {
    $ci = & get_instance();
    $ci->db->insert($table, $data);
    return $ci->db->insert_id();
}

function edit_update_multi_where($table, $data, $multi_where){
    $ci = & get_instance();
    $ci->db->where($multi_where);
    $ci->db->update($table, $data);
    return true;
}

function get_by_role_assion($table, $main_user_id, $project_id, $column_id)
{
    $ci = & get_instance();
    $ci->db->select($column_id)->from($table)->where(array('eDelete'=>0,'main_user_id'=>$main_user_id, 'project_id'=>$project_id));
    $query = $ci->db->get();
    $result = $query->row_array();
    return $result[$column_id];
}

function check_projectid($project_id)
{
  $ci = & get_instance();
  $ci->db->select('project_id')->from('tbl_project')->where(array('eDelete'=>0, 'project_id'=>$project_id));
  $query = $ci->db->get();
  if($query->num_rows() > 0){
    return true;
  } else {
    return 'not';
  }
}

function get_one_value($table, $column_id, $table_id, $table_id_value)
{
    $CI = & get_instance();
    $CI->db->select($column_id)->from($table)->where(array('eDelete'=>0, $table_id=>$table_id_value));
    $query = $CI->db->get();
    $result = $query->row_array();
    return $result[$column_id];
}

function get_multi_value($table, $table_id, $table_id_value,$result){
    $CI = & get_instance();
    $CI->db->select('*')->from($table)->where(array('eDelete'=>0, $table_id=>$table_id_value));
    $query = $CI->db->get();
    if($result=='row'){ return $query->row_array(); } else if($result=='result'){ return $query->result_array(); }
}

function get_table_value($table,$multiwhere){
    $ci = & get_instance();
    $ci->db->select('*')->from($table)->where('eDelete',0)->where($multiwhere);
    $query = $ci->db->get();
    return $query->result_array();
}

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

if ( !function_exists('removeFromString')){
    function removeFromString($str, $item) {
        $parts = explode(',', $str);
        while(($i = array_search($item, $parts)) !== false) {
            unset($parts[$i]);
        }
        return implode(',', $parts);
    }
}

if (!function_exists('date_fjy')) 
{
    function date_fjy($datetime) 
    {
       return date('F j, Y',strtotime($datetime));
    }
}

function newloginBydefultProject1($user_id,$username){
    $combo_id = time() + 1;
    $ci = & get_instance();
    $project_slug = slugify('Time Tracking application');
    $data1 = array(
        'project_name'=>'Time Tracking application',
        'project_slug'=>$project_slug,
        'project_description'=>'You can communicate through your ecommerce project management software but it’s always good to have an alternative communication channel. One that isn’t email, in any case.',
        'start_date'=>date_from_today(),
        'deadline'=>date('Y-m-d H:i:s', strtotime(date_from_today(). ' +30 days')),
        'category'=>'java,php',
        'client_id'=>'Petey Cruiser',
        'created_date'=>date_from_today(),
        'user_id'=>$user_id,
        'combo_id'=>$combo_id,
        'status'=>0
        );
    $project_id = add_insert('tbl_project',$data1);
    $projectID = anj_encode($project_id);
    $projectASSIGN = slugify($username);
    $projectMain_user_id = anj_encode($user_id);
    $projectCombo_id = $combo_id;
    $project_link = 'https://anjpms.com/Invite/anj/'.$projectID.'/'.$project_slug.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    $ci->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
    for($i=1;$i<=3;$i++){
      $last_id = defult_label_add($combo_id,$project_id,$i,$user_id);
      if($i==1){
        defult_task_add($combo_id,$project_id,$last_id,$user_id);
      }
    }
}


function defult_label_add($combo_id,$project_id,$i,$user_id)
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
                  'user_id' => $user_id,
                  'orderBY' => $i
            );
    return add_insert('tbl_status',$status_data);
}

function defult_task_add($combo_id,$project_id,$status_id,$user_id)
{
    $ci = & get_instance();
    $task_data1 = array(
                  'title' => 'title...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => $user_id,
                  'assigned_to' => $user_id,
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>3
                );
    add_insert('tbl_task',$task_data1);
    $task_data2 = array(
                  'title' => 'Front End Implementation...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => $user_id,
                  'assigned_to' => $user_id,
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>1
                );
    add_insert('tbl_task',$task_data2);
    $task_data3 = array(
                  'title' => 'Data imports end implementation...',
                  'description' => 'description...',
                  'due_date' => date_from_today(),
                  'user_id' => $user_id,
                  'assigned_to' => $user_id,
                  'combo_id' => $combo_id,
                  'project_id'=>$project_id,
                  'created_at'=>date_from_today(),
                  'status_id'=>$status_id,
                  'priority'=>2
                );
    add_insert('tbl_task',$task_data3);

    $query = $ci->db->query("SELECT GROUP_CONCAT(id) as id FROM `tbl_status` WHERE combo_id='$combo_id' and project_id='$project_id'");
    $result_array = $query->row_array();
    $last_statusID = $result_array['id'];
    return add_insert('tbl_roles',array('status_id'=>$last_statusID,'combo_id'=>$combo_id,'main_user_id'=>$user_id,'user_id'=>$user_id,'project_id'=>$project_id,'created_date'=>date_from_today()));
}


?>
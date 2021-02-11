<?php

function anj_crypt($string,$action='e') {
  $secret_key = '!@#$%^&*()+qwertyazxcvbnm*?=;[{ZXCVBNMLKJHGFDSAQWERTYUIOP}]';
  $secret_iv=hash('sha512',$secret_key);
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha512', $secret_key );
  $iv = substr( hash( 'sha512', $secret_iv ), 0, 256);
  if( $action == 'e' ) {
      $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }
  else if( $action == 'd' ){
      $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }
  return $output;
}

function anj_encode($text){
  return str_replace('=', '', strtr(base64_encode($text), '+/', '-_'));
}

function anj_decode($text){
  return str_replace('=', '', strtr(base64_decode($text), '+/', '-_'));
}


function send_one_message_notification($text,$user_id){
  $content      = array("en" => $text);
  $hashes_array = array();
  array_push($hashes_array, array(
    "text" => $text,
    "icon" => base_url()."assets/images/notifi.png",
    "url" => base_url()
  ));
    $fields = array(
      'app_id' => "295a45d3-aff0-4e46-b87f-31f276611acd",
      'include_external_user_ids'=>array($user_id),
      'data' => array("anj" => "web"),
      'contents' => $content
    );
  $fields = json_encode($fields);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charset=utf-8',
      'Authorization: Basic ZTgzYzYyMmMtYjExMC00ZTM1LThlZWMtZWQ3YzY4ZWZjYjQx'
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}

function send_message_notification($text){
  $content      = array("en" => $text);
  $hashes_array = array();
  array_push($hashes_array, array(
    "text" => $text,
    "icon" => base_url()."assets/images/notifi.png",
    "url" => base_url()
  ));
    $fields = array(
      'app_id' => "295a45d3-aff0-4e46-b87f-31f276611acd",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'contents' => $content
    );
  
  $fields = json_encode($fields);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charset=utf-8',
      'Authorization: Basic ZTgzYzYyMmMtYjExMC00ZTM1LThlZWMtZWQ3YzY4ZWZjYjQx'
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}

function insert_my_activity($insertmyactivity){
   $ci = & get_instance();
   $insert_my_activity_data = array('user_id'=>getProfileName('user_id'),'created_date'=>date_from_today());
   $data = array();
   array_push($data, $insertmyactivity);
   array_push($data, $insert_my_activity_data);
   insert_data_last_id('tbl_my_activity',$data);
   return true;
}

function notification_insertDB($tbl_notifications_data){
   $ci = & get_instance();
   $notifications_id = insert_data_last_id('tbl_notifications',$tbl_notifications_data);
   return true;
}

function getCountry(){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('tbl_country');
    $ci->db->where('eDelete',0);
    $ci->db->order_by("country","ASC");
    $query=$ci->db->get();
    return $query->result_array();
}

function getState($countryid){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('tbl_state');
    $ci->db->where(array("eDelete"=>0, "countryid"=>$countryid));
    $ci->db->order_by("state","ASC");
    $query=$ci->db->get();
    echo $ci->db->last_query();
    return $query->result_array();
}

function getCity($stateid){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('tbl_city');
    $ci->db->where(array("eDelete"=>0, "stateid"=>$stateid));
    $ci->db->order_by("city","ASC");
    $query=$ci->db->get();
    return $query->result_array();
}

function getProfileName($key){
    $CI = & get_instance();
    
    /*if($CI->session->userdata('joinaccount')){
      $slug_username = $CI->session->userdata('joinaccount');
      $id = getsession_mergeAccount($slug_username);
    } else {*/
      $id = getSession('user_id');
    //}
    $query = $CI->db->get_where('tbl_users', array('user_id' => $id));
    $result = $query->row_array();
    return  $result[$key];
}

function getsession_mergeAccount($slug_username){
  $ci = & get_instance();
  $query = $ci->db->query("SELECT user_id FROM `tbl_users` WHERE `slug_username`='$slug_username'");
  $result = $query->row_array();
  return $result['user_id'];
}

function getsession_manish($user_id){
  $ci = & get_instance();
  $query = $ci->db->query("SELECT * FROM `tbl_users` WHERE `user_id`='$user_id'");
  $result = $query->row_array();
  return $result;
}

function getSession($key){
    $CI = & get_instance();
    $userSession = $CI->session->userdata('user_details');
    return  $userSession[$key];
}

function setmaniSession($result){
    $CI = & get_instance();
    $user_data = array('user_id' => $result['user_id'],'username' => $result['username'],'email' => $result['email'],'user_type' => $result['user_type'],'slug_username' => $slug_username, 'merge_account'=>$result['merge_account'],'main_merge_account'=>$result['merge_account'],'merge_account_userID'=>$result['user_id'],'file_sharing_storage'=>$result['file_sharing_storage']);
    return  $CI->session->set_userdata('user_details', $user_data);
}

function getSessionadmin($key){
    $CI = & get_instance();
    $admin_details = $CI->session->userdata('admin_details');
    return  $admin_details[$key];
}

function date_from_today()
{
    $CI = & get_instance();
    return date('Y-m-d H:i:s');
}

function is_login_admin(){ 
    $CI = & get_instance();
  if(isset($_SESSION['admin_details'])){
      return true;
  }else{
     redirect( base_url(''), 'refresh');
  }
}

function is_login(){ 
  if(isset($_SESSION['user_details'])){
      return true;
  }else{
     redirect( base_url(''), 'refresh');
  }
}

function update_duedate(){ 
  $CI = & get_instance();
  $query = $CI->db->query("UPDATE `tbl_task` SET `due_date`=CURDATE() WHERE `due_date` IN (CURDATE() - INTERVAL 1 DAY)");
  return true;
}

function get_user_img($user_id){ 
  $CI = & get_instance();
  $query = $CI->db->query("SELECT `picture`,`oauth_provider`,`picture_url` FROM `tbl_users` WHERE `user_id`=$user_id");
  $result = $query->row_array();
  if($result['picture'] == ''){
      $imaname = base_url('uploads/').'notDelete.jpg';
  } else {
    if($result['oauth_provider'] == 2){
      $imaname = $result['picture'];
    } else {
      $imaname = base_url('').'uploads/'.$result['picture'];
    } 
  }
  return $result['picture_url'];
}

function get_one_value($table,$column_id,$table_id,$table_id_value){ 
  $CI = & get_instance();
  $CI->db->select($column_id)->from($table)->where(array('eDelete'=>0, $table_id=>$table_id_value));
  $query = $CI->db->get();
  $result = $query->row_array();
  return $result[$column_id];
}

function get_anjdrive_data($dummy_cryptcode){ 
  $CI = & get_instance();
  $user_id = getProfileName('user_id');
  $CI->db->select('*')->from('tbl_anjdrive');
  $CI->db->where_in('eDelete', array(0,2));
  $CI->db->where('dummy_cryptcode',$dummy_cryptcode);
  $CI->db->where('user_id',$user_id);
  $query = $CI->db->get();
  if($query->num_rows() > 0){
    return $query->row_array();
  } else {
    return 0;
  }
}

function get_anjdrive_datacopy($dummy_cryptcode){ 
  $CI = & get_instance();
  $user_id = getProfileName('user_id');
  $CI->db->select('*')->from('tbl_anjdrive');
  $CI->db->where_in('eDelete', array(0,2));
  $CI->db->where('dummy_cryptcode',$dummy_cryptcode);
  $CI->db->where('user_id',$user_id);
  $query = $CI->db->get();
  if($query->num_rows() > 0){
    return $query->result_array();
  } else {
    return 0;
  }
}

function all_file_type_anjdrive($username,$value){
    if($value['file_ext']=='.mp4' || $value['file_ext']=='.mkv' || $value['file_ext']=='.avi' || $value['file_ext']=='.avi') {
        $html ='<video id="player" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" height="150" controls controlsList="download" style="display: block;margin-left: auto;margin-right: auto;    max-width: 100%;max-height: 100%;">
            <source src="'.anjdrive_imageget($username,$value['file'],$value['file_folder'],$value['folder']).'" type="video/mp4" title="video">
          </video>';
    } else if($value['file_ext']=='.jpg' || $value['file_ext']=='.jpeg' || $value['file_ext']=='.png' || $value['file_ext']=='.gif' || $value['file_ext']=='.ico' || $value['file_ext']=='.doc'){
        
        $html ='<a href="javascript:void(0)"  data-id="'.$value['dummy_cryptcode'].'"><img src="'.anjdrive_imageget($username,$value['file'],$value['file_folder'],$value['folder']).'" class="img-rounded" height="150" style="display: block;margin-left: auto;margin-right: auto;  max-width: 100%;max-height: 100%;height:200px;"></a>';
    
    } else if($value['file_ext']=='.gz'){

        $html ='<a href="javascript:void(0)"  data-id="'.$value['dummy_cryptcode'].'" width=100><img src="'.base_url('drive_assets/archive.png').'" style="display: block;margin-left: auto;margin-right: auto;    max-width: 100%;max-height: 100%;"></a>';

    } else {
        $html ='<a href="javascript:void(0)"  data-id="'.$value['dummy_cryptcode'].'" width=100><img src="'.base_url('drive_assets/image.png').'" style="display: block;margin-left: auto;margin-right: auto;width: 100px;height: 100px;"></a>';
    }
  return $html;
}

function all_file_type_anjdrive_div($edelete){ 
  $CI = & get_instance();
  $user_id = getProfileName('user_id');
  $query = $CI->db->query("SELECT COUNT(drive_id) as total,`drive_id`, `user_id`, `share_other_people`, `file`, `file_ext`, `folder`, `eDelete`, `created_date`, `dummy_cryptcode`, `created_time`, `file_type`, `file_folder` FROM `tbl_anjdrive` where user_id=$user_id and eDelete=$edelete GROUP by dummy_cryptcode ORDER BY `tbl_anjdrive`.`drive_id`  DESC");
  $drive_images = $query->result_array();
  $i = 0;
  $wrap_count = 4;
  $html = '';
  foreach($drive_images as $key => $value){ 
    $user_valueid = $value['user_id'];
    $username = get_one_value('tbl_users','username','user_id',$user_valueid);
    $i+=1;
    if($i%$wrap_count==1) {
      $html .= '<div class="row">';
    }
    $html .= "<div class='col-lg-3 col-md-4 col-sm-6 col-12'>
<a href='javascript:void(0)' class='deleteFolderBox' data-toggle='modal' data-target='#deleteDriveFolderModal' onclick='deldriveid('".$value['dummy_cryptcode']."')'>";
                      $html .='<div class="deleteFolderImg">
                          <img src="'.base_url('assets/images/deleteFolder.png').'" class="img-fluid" alt="">
                      </div>
                      <div class="deleteFolderContent">
                          <h4>'.$value['file'].'</h4>
                          <p class="small_folder_show">
                              <span class="sm_folder_item">'.$value['file_size'].' KB</span>
                          </p>
                          <p class="folderDeleteTime">'.date('M d,Y H:i:s A',strtotime($value['created_date'])).'</p>
                      </div>
                      <div class="deleteFolderIcon">
                          <i class="far fa-trash-alt"></i>
                      </div>
                  </a>
              </div>';
    
      if($i%$wrap_count==0) {
        $html .='</div>';
      }
   } 
  if($i%$wrap_count!=0) {
        $html .='</div>';
  } 
  return $html;
}

function anjdrive_imageget($username,$file,$file_folder,$folder = ''){ 
  $CI = & get_instance();
  if($file_folder==1){
    $filenamepath = $file;
  } else if($file_folder==2){
    $filenamepath = $folder.'/'.$file;
  }
  $anjdrive = base_url().'drive_file/'.$username.'/'.$filenamepath;
  return $anjdrive;
}

function anjdrive_getsize(){ 
  $ci = & get_instance();
  $user_id=getProfileName('user_id');
  $q=$ci->db->query("SELECT sum(file_size) as file_size FROM `tbl_anjdrive` where user_id=$user_id and eDelete IN (0,2)");
  $r = $q->row_array();
  if($r['file_size']){
    return $r['file_size'];
  } else {
    return 0;
  }

}

function anj_formatSizeUnits($bytes)
{
  $sizes = ['B', 'KB', 'MB', 'GB'];
}


function anj_progressBar($type)
{
  $ci = & get_instance();
  $user_id = getProfileName('user_id');
  $q=$ci->db->query("SELECT sum(file_size) as file_size FROM `tbl_anjdrive` where user_id=$user_id and eDelete IN (0,2)");
  $r = $q->row_array();
  $sizee = '1024';
  $hundr = '100';
  $total = $r['file_size'] / $sizee; 
  $limit = getProfileName('file_sharing_storage');
  $a = $r['file_size'] / $limit;
  $width = $a * $hundr;
  if($width >= '100'){ $width='100'; }
  if($type='width'){
    return round($width);
  } else if($type='total'){
    return round($total);
  }
}

function anjDrive_disabled()
{
  $ci = & get_instance();
  $user_id = getProfileName('user_id');
  $q=$ci->db->query("SELECT sum(file_size) as file_size FROM `tbl_anjdrive` where user_id=$user_id");
  $r = $q->row_array();
  if(round($r['file_size']) > '99900'){
    return 'disabled';
  } else {
    return '';
  }

}



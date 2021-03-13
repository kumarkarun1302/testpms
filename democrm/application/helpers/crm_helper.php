<?php

function testmail($message,$name)
{
    $ci = & get_instance();
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://mail.anjwebtech.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
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

function invoice_num($input, $pad_len = 3, $prefix = null) {
    if ($pad_len <= strlen($input))
        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

    if (is_string($prefix))
        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
}

function autonumber(){
  $ci = & get_instance();
  $ci->db->select('order_number_leads');
  $ci->db->from('tbl_leads');
  $ci->db->order_by('order_number_leads','desc');
  $ci->db->limit(1);
  $query = $ci->db->get();
  $r = $query->row_array();
return $r['order_number_leads'];
  //echo invoice_num(20, 10, $custom_name);
}

function customName(){
  return "leads-";
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
<?php

if ( !function_exists('getData_txtfile')){
    function getData_txtfile() {
        $file = fopen("assets/logo.txt","r");
        while(! feof($file)){
        return fgets($file). "<br />";
        }
        fclose($file);
    }
}

if ( !function_exists('show_date_time')){
    function show_date_time($end_date) {
        $start_time = date('H:i:s');
        $current_datetime = date('Y-m-d H:i:s', time());
        $start_datetime = new DateTime($end_date);
        $end_datetime = new DateTime($current_datetime);
        $since_start = $start_datetime->diff($end_datetime);
        //echo $since_start->s.' seconds remaining';
        if($current_datetime >= $end_date){
            $m_date = "<sapn style='color:red'>expired</sapn>";
        } else {
            $a = ($since_start->days * 24)+$since_start->h.' hours ';
            $b = $since_start->i.' minutes ';
            $c = $since_start->s.' secs';
            $m_date = $a.$b;
        }
        return $m_date;
    }
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

if ( !function_exists('time_elapsed_string')){
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

if ( !function_exists('json_output')){
    function json_output($statusHeader,$response)
    {
        $ci =& get_instance();
        $ci->output->set_content_type('application/json');
        $ci->output->set_status_header($statusHeader);
        $ci->output->set_output(json_encode($response));
    }
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


if (!function_exists('make_slug'))
{
    function make_slug($string)
    {
        $lower_case_string = strtolower($string);
        $string1 = preg_replace('/[^a-zA-Z0-9 ]/s', '', $lower_case_string);
        return strtolower(preg_replace('/\s+/', '-', $string1));        
    }
}

if (!function_exists('date_ymd')) 
{
    function date_ymd($datetime) 
    {
       return date('Y-m-d',strtotime($datetime));
    }
}

if (!function_exists('date_fjy')) 
{
    function date_fjy($datetime) 
    {
       return date('F j, Y',strtotime($datetime));
    }
}

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

function first_login_f(){
    $first_login = date_from_today();
    $user_id = getProfileName('user_id');
    $data = array('first_login' => $first_login);
    edit_update('tbl_users', $data, 'user_id', $user_id);
}

function bg($projectID){
    $ci = & get_instance();
    $runningProject_id = $ci->session->userdata('runningProject_id');
    $result = get_by_id('tbl_project', 'background', 'project_id', $projectID);
    return $result['background'];
}

function bgcolor(){
    $ci = & get_instance();
    $result = get_by_id('tbl_project', 'background_color', 'project_id', '1');
    return $result['background_color'];
}

function fileUploadd($filename,$foldername='',$allowed_types='*')
{
    $ci = & get_instance();
    $config['upload_path']    = './uploads/'.$foldername;
    $config['allowed_types']  = $allowed_types;
    //$config['max_width']          = '50';
    //$config['max_height']         = '50';
    //$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
    $config['max_size']             = 1000000;
    $ci->load->library('upload', $config);
    if ( ! $ci->upload->do_upload($filename)) {
        $error = array('error' => $ci->upload->display_errors());
        return $error;
    } else {
        $data = $ci->upload->data();
        return $data;
    }
}

function getSettings($setting_name=''){
    $ci = & get_instance();
    $ci->load->database();
    if($setting_name){
        $ci->db->select('setting_value');
        $ci->db->from(ANJ_TBL_SETTINGS);
        $ci->db->where('eDelete',0);
        $ci->db->where("setting_name",$setting_name);
        $query=$ci->db->get();
        $re = $query->row_array();
        return $re['setting_value'];
    } else {
        $ci->db->select('*');
        $ci->db->from(ANJ_TBL_SETTINGS);
        $ci->db->where('eDelete',0);
        $query=$ci->db->get();
        $re = $query->result_array();
        return $re;
    }
    
}

function viewPages($page,$view_data){
    $CI = & get_instance();
    $view_data['title'] = $CI->lang->line($page.'_title');
    $CI->load->view('layout/header', $view_data);
    $CI->load->view($page, $view_data);
    $CI->load->view('layout/footer', $view_data);
}

function checkUser_type($user_type=''){
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT user_type_id FROM tbl_user_type WHERE eDelete = '0'");
    $re = $query->row_array();
    //return $re['user_type_id'];
    return $query->result_array();
}

function notification_insert_db($array){
    insert_data_last_id('tbl_notifi', $array);
}


function get_languageList(){
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT language_name,language_image FROM tbl_language WHERE eDelete = '0'");
    //echo $ci->db->last_query();exit;
    return $query->result_array();
}

/**
 * return a list of language by scanning the files from language directory.
 * @return array
 */
if (!function_exists('get_language_list')) {
    function get_language_list() {
        $language_dropdown = array();
        $dir = "./application/language/";
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file && $file != "." && $file != ".." && $file != "index.html") {
                        $language_dropdown[$file] = $file;
                    }
                }
                closedir($dh);
            }
        }
        return $language_dropdown;
    }
}

function email_temp_header(){
    return '<body style="margin: 0; padding: 0;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
    <tr>
      <td style="padding: 10px 0 30px 0;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
          <tr>
            <td align="center" bgcolor="#0984cb" style="padding: 25px 0 25px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
              <img src="'.base_url('assets/images/logo.png').'" alt="ANJ PMS" title="ANJ PMS" width="200" height="55" style="display: block;background: #fff;padding: 5px 10px;border-radius: 5px;" />
            </td>
          </tr>';
}

function email_temp_footer(){
        return "<tr>
        <td bgcolor='#1d3d71' style='padding: 30px 30px 30px 30px;'>
              <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                  <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;' width='70%'>
                    © Copyright ".date('Y')." | All Rights Reserved. <br/>
                    by <a href='https://anjwebtech.com' style='color: #ffffff;'><font color='#ffffff'>ANJ Webtech Private Limited.</font></a>
                  </td>
                  <td align='right' width='30%'>
                    <table border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://www.facebook.com/ANJWebTech/' style='color: #ffffff; font-size: 38px;'>
                          <img src='".base_url('assets/images/facebook.png')."' alt='facebook' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://www.linkedin.com/company/anj-web-tech/about/' style='color: #ffffff; font-size: 38px;'>
                            <img src='".base_url('assets/images/linkedin.png')."' alt='linkedin' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block; margin-right:10px;'>
                          <a href='https://twitter.com/AnjWebTech' style='color: #ffffff; font-size: 38px'>
                            <img src='".base_url('assets/images/twitter.png')."' alt='Twitter' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        <td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;display: inline-block;'>
                          <a href='https://twitter.com/AnjWebTech' style='color: #ffffff; font-size: 38px'>
                            <img src='".base_url('assets/images/instagram.png')."' alt='Twitter' width='32' height='32' style='display: block;' border='0' />
                          </a>
                        </td>
                        
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
            </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
    }

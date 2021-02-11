<?php
//this curl is for linkedin
public function curl($url,$parameters)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_POST, 1);
    
    $headers = [];

    $headers[] = "Content-Type: application/x-www-form-urlencoded";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    return $result;
}

if ( !function_exists('export_csv'))
{
     function export_csv($file_name,$args_fileheader,$args_table_attr,$table_name,$where=null)
    {
        $newfilename = "CSV_".$file_name.date("YmdH_i_s").'.csv';
        header('Content-type:text/csv');
        header('Content-Disposition:attachment; filename='.$newfilename);
        header('Cache-Control:no-store,no-cache,must-revalidate');
        header('Cache-Control:post-check=0,pre-check=0');
        header('Pragma:no-cache');
        header('Expires:0');
        header('Content-type:text/csv');
         $handle = fopen("php://output", "w");
         fputcsv($handle,$args_fileheader);
         $CI =& get_instance();
         $CI->load->database();
         $CI->db->select($args_table_attr);
         $CI->db->from($table_name);
         if(!empty($where)){
            $CI->db->where($where); 
         }
         $query = $CI->db->get();
         $data['tasks'] = $query->result_array();
         foreach ($data['tasks'] as $key => $row) 
         {
             fputcsv($handle,$row);
         }
         fclose($handle);
         exit;
    } 
} 

if (!function_exists('convert_time_to_24hours_format')) {
    function convert_time_to_24hours_format($time = "00:00 AM") {
        if (!$time)
            $time = "00:00 AM";
        if (strpos($time, "AM")) {
            $time = trim(str_replace("AM", "", $time));
            $check_time = explode(":", $time);
            if ($check_time[0] == 12) {
                $time = "00:" . get_array_value($check_time, 1);
            }
        } else if (strpos($time, "PM")) {
            $time = trim(str_replace("PM", "", $time));
            $check_time = explode(":", $time);
            if ($check_time[0] > 0 && $check_time[0] < 12) {
                $time = $check_time[0] + 12 . ":" . get_array_value($check_time, 1);
            }
        }
        $time .= ":00";
        return $time;
    }
}

if (!function_exists('get_array_value')) {
    function get_array_value(array $array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
    }
}


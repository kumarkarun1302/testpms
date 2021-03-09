<?php

/* record insert */
if (!function_exists('insert_data')) {
    function insert_data($tablename, $arg1)
    {
        $ci = & get_instance();
        $ci->db->insert($tablename, $arg1);
        if ($ci->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

if (!function_exists('insert_data_last_id')) {
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
}
/*  END record insert */ 

/* record upadte */
if (!function_exists('edit_update')) {
    function edit_update($table, $data, $column_id, $id){
        $ci = & get_instance();
        //$table = substr($table, 4);
        $ci->db->where($column_id, $id);
        $ci->db->update($table, $data);
        return true;
    }
}

if (!function_exists('edit_update_multi_where')) {
    function edit_update_multi_where($table, $data, $multi_where){
        $ci = & get_instance();
        $ci->db->where($multi_where);
        $ci->db->update($table, $data);
        return true;
    }
}
/*  END record upadte */ 


/* record select */
if (!function_exists('get_by_id')) {
    function get_by_id($table, $selected_column, $column_id, $id)
    {
        $ci = & get_instance();
        $ci->db->select($selected_column);
        $ci->db->from($table);
        $ci->db->where($column_id, $id);
        $ci->db->order_by($column_id, 'DESC');
        $ci->db->limit(1);
        $query = $ci->db->get();
        return $query->row_array();
    }
}

if (!function_exists('get_by_all')) {
    function get_by_all($table, $selected_column, $column_id, $id)
    {
        $ci = & get_instance();
        $ci->db->select($selected_column);
        $ci->db->from($table);
        $ci->db->where('eDelete', 0);
        $ci->db->where($column_id, $id);
        $query = $ci->db->get();
        return $query->result_array();
    }
}
/// admin data fetch ///

function get_dataBY_admin($table)
{
    $ci = & get_instance();
    $ci->db->select('*');
    $ci->db->from($table);
    $ci->db->where('eDelete', 0);
    $query = $ci->db->get();
    return $query->result_array();
}


function get_by_all_whereArray($table, $selected_column, $checkarray)
{
    $ci = & get_instance();
    $ci->db->select($selected_column);
    $ci->db->from($table);
    $ci->db->where('eDelete', 0);
    $ci->db->where($checkarray);
    $query = $ci->db->get();
    return $query->result_array();
}

function fetch_last_record($table,$column_id)
{
    $ci = & get_instance();
    $ci->db->select($column_id);
    $ci->db->from($table);
    $ci->db->order_by($column_id, 'DESC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return NULL;
    }
}

/* END record select */


/* record delete */
function delete_record($table, $arg, $column_id)
{
    $ci = & get_instance();
    $db_debug = $ci->db->db_debug;
    $ci->db->db_debug = FALSE;
    $ci->db->where([$column_id => $arg]);
    $ci->db->delete($table);
    if ($ci->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    $ci->db->db_debug = $db_debug;
}

function delete_image($path, $id, $table, $column)
{
    $ci = & get_instance();
    $image_path = $path;
    $args = $id;
    $data = $ci->get_by_id($table, $id, $column);
    if ($data[$column] != "default.jpg") {
        @@unlink($image_path . $data[$column]);
    }
}

function delete_all($table)
{
    $ci = & get_instance();
    $db_debug = $ci->db->db_debug;
    $ci->db->db_debug = FALSE;
    $ci->db->truncate($table);
    if ($ci->db->affected_rows() > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
    $ci->db->db_debug = $db_debug;
}

/* END record delete */

function getTablename(){
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'anjwekhs_anjwebtech_pms'");
    return $query->result_array();
}

function getTablecolumn_names($table){
    $ci = & get_instance();
    $ci->load->database();
    $query = $ci->db->query("SHOW COLUMNS FROM ".$table."");
    $result = $query->result_array();
    $data = array();
    foreach ($result as $key => $value) {
        $data1 = $value['Field'];
        array_push($data,$data1);
    }
    return $data;
}

function getDropDownList($table,$show_cloumn,$orderby_id,$orderby){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select($show_cloumn);
    $ci->db->from($table);
    $ci->db->where('eDelete',0);
    $ci->db->order_by($orderby_id,$orderby);
    $query=$ci->db->get();
    return $query->result_array();
}

/* record select */
/* END record select */


/* record select */
/* END record select */

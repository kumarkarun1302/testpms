<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_Model extends CI_Model
{
    protected $tbl_project = 'tbl_project';

    public function add_Project(array $data) {
        $this->db->insert($this->tbl_project, $data);
        return $this->db->insert_id();
    }

    public function get_by_role_assion($table, $main_user_id, $project_id, $column_id)
    {
        $this->db->select($column_id)->from($table)->where(array('eDelete'=>0,'main_user_id'=>$main_user_id, 'project_id'=>$project_id));
        $query = $this->db->get();
        $result = $query->row_array();
        return $result[$column_id];
    }

    public function update_project(array $data,$project_id) {
        $this->db->update($this->tbl_project, $data, ['project_id'=>$project_id]);
        return $project_id;
    }

    public function get_group_concat_project_id($user_id){
        $query = $this->db->query("SELECT GROUP_CONCAT(project_id) as project_id FROM `tbl_roles` WHERE CONCAT(',', user_id, ',') like '%,$user_id,%'");
        $result_array = $query->row_array();
        return $result_array['project_id'];
    }

    public function getProjectlist($user_id,$status)
    {
        $getgroupconcatprojectid = $this->get_group_concat_project_id($user_id);
        if($getgroupconcatprojectid){
            $result = $this->db->query("SELECT * FROM `tbl_project` WHERE project_id IN ($getgroupconcatprojectid) and eDelete=0 and status=$status");
        } else {
            $result = $this->db->query("SELECT * FROM `tbl_project` WHERE user_id=$user_id and eDelete=0 and status=$status");
        }
        
        if($result->num_rows() > 0){
            $result = $result->result_array();
            return $result;
        } else {
            return false;
        }
    }

    public function getResponse($project_id)
    {
        $result = $this->db->get_where($this->tbl_project, array('project_id' => $project_id));
        if($result->num_rows() > 0){
            $result = $result->row_array();
            return $result;
        } else {
            return false;
        }
    }

    public function delete_article(array $data)
    {
        $query = $this->db->get_where($this->tbl_project, $data);
        if ($this->db->affected_rows() > 0) {
            $this->db->delete($this->tbl_project, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }   
        return false;
    }


}
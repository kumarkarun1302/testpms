<?php
class Dashboard_model extends CI_Model{
	public $table = "tbl_status";
	
	public function getTasklist_all($project_id_new,$projectMain_user_id){
		$user_id = getProfileName('user_id');
		$query = $this->db->query("SELECT `s`.*,`r`.user_id FROM `tbl_roles` as `r` LEFT JOIN `tbl_status` as `s` ON `r`.`combo_id`=`s`.`combo_id` WHERE `s`.`eDelete` = 0 AND `r`.`main_user_id` = $projectMain_user_id and `r`.`project_id` = $project_id_new and CONCAT(',', `r`.user_id, ',') like '%,$user_id,%' ORDER BY `orderBY` ASC");
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

	public function get_all_users(){
		return $this->db->count_all($this->table);
	}

	public function addTaskStatus($data){
		$this->db->insert('tbl_task', $data);
		return true;
	}

	public function updateTaskStatus($data,$task_id){
		$this->db->where('id', $task_id);
		$this->db->update('tbl_task', $data);
		return true;
	}

	public function addStatus($data){
		$this->db->insert('tbl_status', $data);
		return true;
	}

	public function editTaskStatus($status_id, $task_id) {
        $data = array('status_id' => $status_id);
		$this->db->where('id', $task_id);
		$this->db->update('tbl_task', $data);
    }

    public  function getProjectTaskByassgin($status_id, $project_id, $main_user_id) {
    	$assigned_to = get_by_role_assion('tbl_roles', $main_user_id, $project_id, 'user_id');
		$user_id = getProfileName('user_id');
		$query = $this->db->query("SELECT * FROM `tbl_task` WHERE CONCAT(',', assigned_to, ',') like '%,$user_id,%' and project_id=$project_id and status_id=$status_id and `eDelete`='0' order by due_date ASC,priority DESC");
		//echo $this->db->last_query();exit;
        return $query->result_array();
    }

	public  function getProjectTaskByStatus($statusId, $project_id) {
        $this->db->select('tt.*');
		$this->db->from('tbl_task as tt');
		$this->db->where('tt.status_id', $statusId);
		$this->db->where('tt.project_id', $project_id);
		$this->db->where('tt.eDelete', 0);
		$this->db->order_by("tt.due_date ASC, tt.priority DESC");
		$query=$this->db->get();
        return $query->result_array();
    }

    public function getAssign_user_image($user_id){
    	$query = $this->db->query("SELECT `user_id`,`picture`,`oauth_provider`,`username`,`email` FROM `tbl_users` WHERE `user_id` IN ($user_id)");
    	return $query->result_array();
    }

    public function getProject_userImage($user_id){
    	$query = $this->db->query("SELECT `user_id`,`picture`,`oauth_provider`,`username`,`email` FROM `tbl_users` WHERE `user_id` IN ($user_id) limit 0,4");
    	return $query->result_array();
    }

    public function getProject_userImage_count_4($user_id){
    	$query = $this->db->query("SELECT (count(picture) - 4) as fourcount FROM `tbl_users` WHERE `user_id` IN ($user_id)");
    	//echo $this->db->last_query();exit;
    	return $query->row_array();
    }

    public function gettodolistassgin($status,$project_id_new,$projectMain_user_id){
		$user_id = getProfileName('user_id');
		$query = $this->db->query("SELECT `s`.*,`r`.user_id FROM `tbl_roles` as `r` LEFT JOIN `tbl_status` as `s` ON `r`.`combo_id`=`s`.`combo_id` WHERE `s`.`eDelete` = 0 and CONCAT(',', `r`.user_id, ',') like '%,$user_id,%' and `r`.`project_id` = $project_id_new");
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}



	public function gettodolist($status,$project_id_new,$projectMain_user_id){
		$user_id = getSession('user_id');
		$status_id = get_by_role_assion('tbl_roles', $projectMain_user_id, $project_id_new, 'status_id');
		$query = $this->db->query("SELECT `s`.*,`r`.user_id FROM `tbl_roles` as `r` LEFT JOIN `tbl_status` as `s` ON `r`.`combo_id`=`s`.`combo_id` WHERE `s`.`eDelete` = 0 AND `r`.`main_user_id` = $projectMain_user_id and `r`.`project_id` = $project_id_new and CONCAT(',', `r`.user_id, ',') like '%,$user_id,%'");
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}

	public function ajax_upload($post_order_ids){
		if(count($post_order_ids)>0){
			for($order_no= 0; $order_no < count($post_order_ids); $order_no++){
				$this->db->query("UPDATE li_ajax_post_load SET post_order_no = '".($order_no+1)."' WHERE post_id = '".$post_order_ids[$order_no]."'");
				return true;
			} 
		} else {
			return false;
		}
	}

	public function get_active_users(){
		$this->db->where('is_active', 1);
		return $this->db->count_all_results($this->table);
	}
	public function get_deactive_users(){
		$this->db->where('is_active', 0);
		return $this->db->count_all_results($this->table);
	}
}

?>

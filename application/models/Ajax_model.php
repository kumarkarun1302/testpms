<?php
	class Ajax_model extends CI_Model{

		public $table = "tbl_users";
		
		public function get_all_users(){
			return $this->db->count_all($this->table);
		}

		public function getalllist(){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('eDelete',0);
			$this->db->order_by("user_id","DESC");
			$query=$this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
		}

		public function get_selected_list($cloumn,$table){
			$this->db->select($cloumn);
			$this->db->from($table);
			$this->db->order_by("user_id","DESC");
			$query=$this->db->get();
			return $query->result_array();
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

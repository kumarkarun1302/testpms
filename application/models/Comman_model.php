<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Comman_model extends CI_Model{
		public $table = "tbl_project";
		public $id = "project_id";
		
		public function get_all_data(){
			return $this->db->count_all($this->table);
		}

		public function add_insert($data){
			$this->db->insert($this->table, $data);
			return true;
		}

		public function edit_update($data,$idvalue){
			$this->db->where($id, $idvalue);
			$this->db->update($this->table, $data);
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

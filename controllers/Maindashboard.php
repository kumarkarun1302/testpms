<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maindashboard extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
	}
		
	public function index(){
		
		$view_data['project_id_new'] = '';
		$user_id = getProfileName('user_id');
		$view_data['maindashboard_user_id'] = $user_id;
		
		$query123 = $this->db->query("SELECT DISTINCT t2.client_id FROM `tbl_roles` as t1 join tbl_project as t2 ON (t1.project_id=t2.project_id) WHERE CONCAT(',', t1.user_id, ',') like '%,$user_id,%'");
		$view_data['total_client'] = $query123->num_rows();
		
		$query = $this->db->query("SELECT t1.project_id FROM `tbl_roles` as t1 join tbl_project as t2 ON (t1.project_id=t2.project_id) WHERE CONCAT(',', t1.user_id, ',') like '%,$user_id,%' and t2.status=2");
		
		$view_data['total_completed'] = $query->num_rows();

		$query_running = $this->db->query("SELECT t1.project_id FROM `tbl_roles` as t1 join tbl_project as t2 ON (t1.project_id=t2.project_id) WHERE CONCAT(',', t1.user_id, ',') like '%,$user_id,%' and t2.status=0");
		$view_data['total_running'] = $query_running->num_rows();

		$query_running = $this->db->query("SELECT project_id FROM `tbl_status` WHERE user_id=$user_id");
		$view_data['total_section'] = $query_running->num_rows();

		$query_task = $this->db->query("SELECT project_id FROM `tbl_task` WHERE user_id=$user_id");
		$view_data['total_task'] = $query_task->num_rows();

		$query_completed = $this->db->query("SELECT project_id FROM `tbl_task` WHERE user_id=$user_id and task_status=2");
		$view_data['total_task_completed'] = $query_completed->num_rows();

		$query_tbl_feedback = $this->db->query("SELECT feedback_id FROM `tbl_feedback`");
		$view_data['total_tbl_feedback'] = $query_tbl_feedback->num_rows();

		$query_chart =  $this->db->query("SELECT user_id,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_project) * 100 AS avg FROM tbl_project GROUP BY user_id"); 
		$record_chart = $query_chart->result();
		$data_chart = [];
		foreach($record_chart as $row) {
			$userid=$row->user_id;
			$query=$this->db->query("SELECT username FROM `tbl_users` WHERE `user_id`='$userid'");
  			$result=$query->row_array();
			$data_chart[] = array('name'=>$result['username'],'y'=>(int) $row->avg);
		}
      $view_data['chart_data'] = json_encode($data_chart);
      //$view_data['chart_data'] = '';

      $query_chart_cloumn =  $this->db->query("SELECT user_type,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_users) * 100 AS avg FROM tbl_users where user_type!=0 GROUP BY user_type"); 
		$record_chart_cloumn = $query_chart_cloumn->result();
		$data_chart_cloumn = [];
		foreach($record_chart_cloumn as $row) {
			$user_type=$row->user_type;
			$query=$this->db->query("SELECT user_type FROM `tbl_user_type` WHERE `user_type_id`='$user_type'");
  			$result=$query->row_array();
			$data_chart_cloumn[] = array('name'=>$result['user_type'],'y'=>(int) $row->avg,'drilldown'=>$result['user_type']);
		}

		if(anjDrive_disabled()=='disabled'){
			$view_data['manishurl'] = base_url('#pricing-table');
		} else {
			$view_data['manishurl'] = base_url('anj_drive');
		}
      $view_data['chart_data_cloumn'] = json_encode($data_chart_cloumn);
      //$view_data['chart_data_cloumn'] = '';
		//echo print_r(json_encode($data_chart_cloumn));exit;
	  $this->load->view('main_dashboard',$view_data);

	}
		
	
	public function pie_chart_js() {
   
      
      $this->load->view('pie_chart',$data);
    }

}

?>	
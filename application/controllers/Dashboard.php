<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
	}
		
	public function index(){
	    $user_id = getProfileName('user_id');
	    $queryqs = $this->db->query("SELECT user_id FROM `tbl_project` WHERE user_id=$user_id");
	    if($queryqs->num_rows()==''){
	    	newloginBydefultProject1();
	    	//newloginBydefultProject2();
	    	//newloginBydefultProject3();
	    	//newloginBydefultProject4();
	    }
		$user_data = $this->session->userdata('user_details');
		update_duedate();
		$this->load->helper('gdrive_helper');
	    header('Content-Type: text/html; charset=utf-8');
		$this->session->set_userdata('checkbox_session_store', $this->session->userdata('checkbox_session_store'));

		if($this->session->userdata('runningProjectList')){
			$this->session->unset_userdata('holdProjectList');
	        $this->session->unset_userdata('canceledProjectList');
	        $this->session->unset_userdata('completedProjectList');
		}
		if($this->session->userdata('holdProjectList')){
			$this->session->unset_userdata('runningProjectList');
	        $this->session->unset_userdata('canceledProjectList');
	        $this->session->unset_userdata('completedProjectList');
		}
		if($this->session->userdata('canceledProjectList')){
			$this->session->unset_userdata('runningProjectList');
			$this->session->unset_userdata('holdProjectList');
	        $this->session->unset_userdata('completedProjectList');
		}
		if($this->session->userdata('completedProjectList')){
			$this->session->unset_userdata('runningProjectList');
			$this->session->unset_userdata('holdProjectList');
	        $this->session->unset_userdata('canceledProjectList');
		}

		$user_type = getProfileName('user_type');
		$projectid=anj_decode($this->uri->segment(2));
		
		$view_data['project_id_new'] = anj_decode($this->uri->segment(2));
		$view_data['manish_id'] = $this->uri->segment(2);
		$this->session->set_userdata('site_lang',  "english");
		$view_data['projectID'] = $this->uri->segment(2);
		$view_data['projectNAME'] = $this->uri->segment(3);
		$view_data['projectASSIGN'] = $this->uri->segment(4);
		$view_data['projectMain_user_id'] = $this->uri->segment(5);
		//$view_data['projectCombo_id'] = $this->session->userdata('projectCombo_id');
		$view_data['projectCombo_id'] = $this->uri->segment(6);
		$view_data['gdrivelink'] = getAuthorizationUrl("", "");
		$main_user_id = anj_decode($this->uri->segment(5));
		$project_id = anj_decode($this->uri->segment(2));
		$view_data['project_assgin_to_user'] = get_by_role_assion('tbl_roles', $main_user_id, $project_id, 'user_id');
		$view_data['project_crud'] = explode(',', trim(get_role_permission('project_crud',anj_decode($this->uri->segment(2)))));
		$user_id = getProfileName('user_id');
		$view_data['maindashboard_user_id'] = $user_id;

		if(anjDrive_disabled()=='disabled'){
			$view_data['manishurl'] = base_url('#pricing-table');
		} else {
			$view_data['manishurl'] = base_url('anj_drive');
		}
		
		if($this->uri->segment(2)){
			$check_can_com=$this->db->query("SELECT status FROM `tbl_project` WHERE user_id=$user_id and project_id=$projectid");
			$view_data['check_can_com'] = $check_can_com->row_array();
			$this->load->view('layout/header', $view_data);
			$this->load->view('dashboard', $view_data);
			$this->load->view('modelView', $view_data);
			$this->load->view('layout/footer', $view_data);
		} else {

		$query = $this->db->query("SELECT client_id FROM `tbl_project` WHERE user_id=$user_id");
		$view_data['total_client'] = getProjectTotal('client_id');

		$query = $this->db->query("SELECT project_id FROM `tbl_project` WHERE user_id=$user_id and status=2");
		$view_data['total_completed'] = $query->num_rows();

		$query_running = $this->db->query("SELECT project_id FROM `tbl_project` WHERE user_id=$user_id and status=0");
		$view_data['total_running'] = $query_running->num_rows();

		$query_running = $this->db->query("SELECT project_id FROM `tbl_status` WHERE user_id=$user_id");
		$view_data['total_section'] = $query_running->num_rows();

		$query_task = $this->db->query("SELECT project_id FROM `tbl_task` WHERE user_id=$user_id");
		$view_data['total_task'] = $query_task->num_rows();

		$query_completed = $this->db->query("SELECT project_id FROM `tbl_task` WHERE user_id=$user_id and task_status=2");
		$view_data['total_task_completed'] = $query_completed->num_rows();

		$query_chart =  $this->db->query("SELECT project_name,category,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_project where user_id=$user_id) * 100 AS avg FROM tbl_project where user_id=$user_id GROUP BY category"); 
		$record_chart = $query_chart->result();
		$data_chart = [];
		foreach($record_chart as $row) {
			$data_chart[] = array('name'=>$row->project_name,'y'=>(int) $row->avg);
		}
	    $view_data['chart_data'] = json_encode($data_chart);
	      
	    //$query_chart_cloumn =  $this->db->query("SELECT user_type,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_users) * 100 AS avg FROM tbl_users where user_type!=0 GROUP BY user_type"); 
	    $query_chart_cloumn=$this->db->query("SELECT role_name,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM `tbl_permission` WHERE main_user_id=$user_id) * 100 AS avg FROM tbl_permission WHERE main_user_id=$user_id GROUP by role_name"); 
		$record_chart_cloumn = $query_chart_cloumn->result();
		$data_chart_cloumn = [];
		foreach($record_chart_cloumn as $row) {
			$data_chart_cloumn[] = array('name'=>$row->role_name,'y'=>(int) $row->avg,'drilldown'=>$row->role_name);
		}
      $view_data['chart_data_cloumn'] = json_encode($data_chart_cloumn);

    $query_tbl_feedback = $this->db->query("SELECT feedback_id FROM `tbl_feedback`");
	$view_data['total_tbl_feedback'] = $query_tbl_feedback->num_rows();

	$query_packedbubble =  $this->db->query("SELECT project_id,project_name FROM `tbl_project` where user_id=$user_id ORDER BY `tbl_project`.`project_id`  DESC limit 5"); 
	$record_packedbubble = $query_packedbubble->result_array();
	$json_response = array();
	foreach($record_packedbubble as $key => $value) {
		$project_id=$value['project_id'];
		$row_array = array();
		$row_array['name'] = $value['project_name'];        
		$row_array['data'] = array();
		$query=$this->db->query("SELECT title FROM `tbl_task` WHERE `project_id`='$project_id'");
		$result=$query->result_array();
		foreach ($result as $key => $val) {
			$row_array['data'][] = array(
			'name' => $val['title'],
			'value' => 100,
			);
		}
		array_push($json_response, $row_array);
	}
	$view_data['data_packedbubble'] = json_encode($json_response);

	      	//$this->load->view('layout/header', $view_data);
			$this->load->view('main_dashboard', $view_data);
			$this->load->view('modelView', $view_data);
			//$this->load->view('layout/footer', $view_data);
		}
		
	}
		
	public function editTaskStatus1(){
		$result = $this->input->post('data');
		$result = json_decode($result);
		$counter = 1;
		foreach ($result as $key => $val) {
		$this->db->query("UPDATE tbl_status SET orderBY = '".$counter."' WHERE id = '".$val."'");
			$counter++;
		}
		echo print_r($result);
	}

	public function switchLang($language = "") {
		$this->session->set_userdata('site_lang',  $language);
	    redirect('');
	}

}

?>	
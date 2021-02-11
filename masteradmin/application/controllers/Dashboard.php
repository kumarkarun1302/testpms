<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
	}
		
	public function index(){
		$admin_details = $this->session->userdata('admin_details');
		
		$query_total_projects = $this->db->query("SELECT project_id FROM `tbl_project`");
		$view_data['total_projects'] = $query_total_projects->num_rows();

		$query_total_task = $this->db->query("SELECT id FROM `tbl_task`");
		$view_data['total_task'] = $query_total_task->num_rows();

		$query_total_users = $this->db->query("SELECT user_id FROM `tbl_users` WHERE user_id!=1");
		$view_data['total_users'] = $query_total_users->num_rows();

		$query_total_role = $this->db->query("SELECT who_add_new_role FROM `tbl_rolename`");
		$view_data['total_role'] = $query_total_role->num_rows();

		$query_chart_cloumn =  $this->db->query("SELECT user_type,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_users) * 100 AS avg FROM tbl_users where user_type!=0 GROUP BY user_type"); 
		$record_chart_cloumn = $query_chart_cloumn->result();
		$data_chart_cloumn = [];
		foreach($record_chart_cloumn as $row) {
			$user_type=$row->user_type;
			$query=$this->db->query("SELECT user_type FROM `tbl_user_type` WHERE `user_type_id`='$user_type'");
				$result=$query->row_array();
			$data_chart_cloumn[] = array('name'=>$result['user_type'],'y'=>(int) $row->avg,'drilldown'=>$result['user_type']);
		}
		$view_data['chart_data_cloumn'] = json_encode($data_chart_cloumn);

		// last 10 project list //

		$query_chart_cloumn_lastproject =  $this->db->query("SELECT project_name,client_id,COUNT(1) AS total,COUNT(1) / (SELECT COUNT(1) FROM tbl_project) * 100 AS avg FROM tbl_project GROUP BY client_id"); 
		$record_chart_cloumn_lastproject = $query_chart_cloumn_lastproject->result();
		$data_chart_cloumn_lastproject = [];
		foreach($record_chart_cloumn_lastproject as $row) {
			$data_chart_cloumn_lastproject[] = array('name'=>$row->client_id,'y'=>(int) $row->avg,'drilldown'=>$row->project_name);
		}
		$view_data['cht_cloumn_data_project'] = json_encode($data_chart_cloumn_lastproject);

		//echo print_r($view_data['cht_cloumn_data_project']);exit;

		$this->load->view('header', $view_data);
		$this->load->view('dashboard', $view_data);
	}
		
	public function userlist(){
		$view_data['title'] = 'userlists';
		$this->load->view('header',$view_data);
		$this->load->view('userlists');
		$this->load->view('footer');
	}

	public function usertype(){
		$view_data['title'] = 'User Type';
		$this->load->view('header',$view_data);
		$this->load->view('usertype');
		$this->load->view('footer');
	}

	public function rolename()
	{
		$view_data['title'] = 'Role Name';
		$this->load->view('header', $view_data);
		$this->load->view('rolename');
		$this->load->view('footer');
	}

	public function rolepermissionlist(){
		$view_data['title'] = 'rolepermissionlist';
		$this->load->view('header',$view_data);
		$this->load->view('rolepermissionlist');
		$this->load->view('footer');
	}

	public function tasklist()
	{
		$view_data['title'] = 'tasklist';
		$this->load->view('header', $view_data);
		$this->load->view('tasklist');
		$this->load->view('footer');
	}

	public function projectlist()
	{
		$this->load->view('header');
		$this->load->view('projectlist');
		$this->load->view('footer');
	}

	public function settingsView(){
		$view_data['title'] = 'settings';
		$this->load->view('header',$view_data);
		$this->load->view('settingsView');
		$this->load->view('footer');
	}

	public function bloglists(){
		$view_data['title'] = 'Blog Lists';
		$this->load->view('header',$view_data);
		$this->load->view('bloglists');
		$this->load->view('footer');
	}

	public function packageview(){
		$view_data['title'] = 'Package Lists';
		$this->load->view('header',$view_data);
		$this->load->view('packageview');
		$this->load->view('footer');
	}


	public function feedbacklist(){
		$view_data['title'] = 'feedback Lists';
		$this->load->view('header',$view_data);
		$this->load->view('feedbacklist');
		$this->load->view('footer');
	}

	
}

?>	
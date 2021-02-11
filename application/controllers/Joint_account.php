<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Joint_account extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	
	public function peg(){
		echo $this->uri->segment(2);
		$slug_username = $this->uri->segment(2);
		getsession_mergeAccount($slug_username);
		$this->session->set_userdata('joinaccount',  $slug_username);
		$result = getsession_manish(getsession_mergeAccount($slug_username));
		$merge_account = getProfileName('merge_account');
		$merge_account_userID = getProfileName('user_id');
		$user_data = array('user_id' => $result['user_id'],'username' => $result['username'],'email' => $result['email'],'user_type' => $result['user_type'],'slug_username' => $slug_username, 'main_merge_account'=>$merge_account,'merge_account_userID'=>$merge_account_userID);
		$this->session->set_userdata('user_details', $user_data);
		redirect('dashboard');
	}

	public function pegqw(){
		$this->load->helper('gdrive_helper');
	    header('Content-Type: text/html; charset=utf-8');
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
		$slug_username = $this->uri->segment(2);
		getsession_mergeAccount($slug_username);
		$this->session->set_userdata('joinaccount',  $slug_username);
		$result = getsession_manish(getsession_mergeAccount($slug_username));
		$merge_account = getProfileName('merge_account');
		$merge_account_userID = getProfileName('user_id');
		$user_data = array('user_id' => $result['user_id'],'username' => $result['username'],'email' => $result['email'],'user_type' => $result['user_type'],'slug_username' => $slug_username, 'main_merge_account'=>$merge_account,'merge_account_userID'=>$merge_account_userID);
		$this->session->set_userdata('user_details', $user_data);
		$user_type = getProfileName('user_type');
		$view_data['project_id_new'] = anj_decode($this->uri->segment(2));
		$view_data['manish_id'] = $this->uri->segment(2);
		$this->session->set_userdata('site_lang',  "english");
		$view_data['projectID'] = $this->uri->segment(2);
		$view_data['projectNAME'] = $this->uri->segment(3);
		$view_data['projectASSIGN'] = $this->uri->segment(4);
		$view_data['projectMain_user_id'] = $this->uri->segment(5);
		$view_data['projectCombo_id'] = $this->uri->segment(6);
		$view_data['gdrivelink'] = getAuthorizationUrl("", "");
		$main_user_id = anj_decode($this->uri->segment(5));
		$project_id = anj_decode($this->uri->segment(2));
		$view_data['project_assgin_to_user'] = get_by_role_assion('tbl_roles', $main_user_id, $project_id, 'user_id');
		redirect('dashboard');
		$this->load->view('layout/header', $view_data);
		$this->load->view('dashboard', $view_data);
		$this->load->view('modelView', $view_data);
		$this->load->view('layout/footer', $view_data);
	}

}

?>	
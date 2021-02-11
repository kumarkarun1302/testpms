<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index(){
		/*$view_data['projectID'] = '';
		$view_data['projectNAME'] = '';
		$view_data['projectASSIGN'] = '';
		$view_data['projectMain_user_id'] = '';
		$view_data['projectCombo_id'] = $view_data['project_id_new'] = '';
		$this->load->view('layout/header',$view_data);*/
		$this->load->view('admin/404');
	}
}
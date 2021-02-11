<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	    
	public function __construct(){
		parent::__construct();
		is_login_admin();
		$this->load->model('ajax_model');
	}

	public function index(){
		$view_data['title'] = 'dashboard';
		if(isset($_SESSION['admin_details'])){
			$this->load->view('admin/header',$view_data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/footer');
		} else {
			//$this->load->view('auth/login');
			redirect( base_url(''), 'refresh');
		}
	}

	public function dashboard(){
		$view_data['title'] = 'dashboard';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function notificationView(){
		$view_data['title'] = 'notification';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/notificationView');
		$this->load->view('admin/footer');
	}

	public function templatev(){
		$view_data['title'] = 'emailtemplates';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/addemailtemplates');
		$this->load->view('admin/footer');
	}

	public function emailtemplatesView(){
		$view_data['title'] = 'emailtemplates';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/emailtemplatesView');
		$this->load->view('admin/footer');
	}

	public function categoryView(){
		$view_data['title'] = 'category';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/categoryView');
		$this->load->view('admin/footer');
	}

	public function settingsView(){
		$view_data['title'] = 'settings';
		$this->load->view('admin/header',$view_data);
		$this->load->view('admin/settingsView');
		$this->load->view('admin/footer');
	}
	
	public function clientsView(){
		$view_data['getCountry'] = getCountry();
		$view_data['getTablename'] = getTablename();
		$this->load->view('admin/header');
		$this->load->view('admin/clientsView');
		$this->load->view('admin/footer');
	}

	public function profileView(){
		$view_data['profileDetails'] = $this->auth_model->get_user_detail();
		viewPages('profile',$view_data);
	}

	public function calendar(){
		$this->load->library('calendar');
		$this->load->view('admin/header');
		$this->load->view('admin/calendar');
		$this->load->view('admin/footer');
	}

	public function projectView1(){
		$this->load->view('admin/header');
		$this->load->view('admin/project');
		$this->load->view('admin/footer');
	}

	public function projectView(){
		$this->load->view('admin/header');
		$this->load->view('admin/addproject');
		$this->load->view('admin/footer');
	}

	public function addProjects(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('project_name', 'Project title', 'trim|required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
			$this->form_validation->set_rules('deadline', 'Deadline Date', 'trim|required');
			$this->form_validation->set_rules('client_id', 'Client Name', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$dataView['error'] = validation_errors();
			$this->load->view('admin/project',$dataView);
		} else {
			$data = array(
				'project_name' => $this->input->post('project_name'),
				'project_description' => $this->input->post('project_description'),
				'start_date' =>  $this->input->post('start_date'),
				'deadline' =>  $this->input->post('deadline'),
				'client_id' =>  $this->input->post('client_id'),
				'created_date' => date_from_today()
			);
			echo print_r($data);exit;
			$project_id = $this->input->post('project_id');
			if($project_id){
				$result = edit_update('tbl_project',$data,'project_id',$project_id);
			} else {
				$result = insert_data_last_id('tbl_project',$data);
			}
			$this->session->set_flashdata('success', 'Project Add');
		}
		$this->session->set_flashdata('error', 'Project Not Add!');

		redirect($this->input->post('website_addProject'));
	 }
	}

	public function addClients(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('clients_name', 'Clients Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('country', 'country', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$dataView['error'] = validation_errors();
			$this->load->view('admin/clients',$dataView);
		} else {
				$data = array(
					'company_name' => $this->input->post('company_name'),
					'email' => $this->input->post('email'),
					'clients_name' => $this->input->post('clients_name'),
					'website' => $this->input->post('website'),
					'phone' =>  $this->input->post('phone'),
					'country' =>  $this->input->post('country'),
					'city' =>  $this->input->post('city'),
					'created_date' => date_from_today()
				);
				$client_id = $this->input->post('client_id');
				if($client_id){
					$result = edit_update('tbl_clients',$data,'client_id',$client_id);
				} else {
					$result = insert_data_last_id('tbl_clients',$data);
				}
			}
			//$this->session->set_flashdata('error', 'Invalid Username or Password!');
			redirect('dashboard');
		}
	}

	public function create_users_pdf(){
			$this->load->helper('pdf_helper'); 
			$html = '
			<h3>Users List</h3>
			<table border="1" style="width:100%">
				<thead>
					<tr class="headerrow">
						<th>Username</th>
					</tr>
				</thead>
				<tbody>					
					<tr class="oddrow">
						<td>123</td>
					</tr>';
				$html .=	'</tbody>
				</table>			
			 ';
			//ob_clean();
			//flush();
			$mpdf = new mPDF();
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Codeglamour - Users List");
			$mpdf->SetAuthor("Codeglamour");
			$mpdf->watermark_font = 'Codeglamour';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');		 
			$mpdf->WriteHTML($html);
			$filename = 'in';
			$mpdf->Output($filename . '.pdf', 'D');			
			//exit;
		}

	public function settingInsert(){
		foreach ($_POST as $key => $value) {
			$this->db->query("UPDATE tbl_settings SET setting_value = '".$value."' WHERE setting_name = '".$key."'");
		}
		redirect('settings');
	}
	
	public function addEmailtemplates(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('template_name', 'template title', 'trim|required');
			$this->form_validation->set_rules('email_subject', 'email subject', 'trim|required');
			$this->form_validation->set_rules('custom_message', 'custom_message', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$dataView['error'] = validation_errors();
			$this->load->view('admin/emailtemplatesView',$dataView);
		} else {
			$data = array(
				'template_name' => $this->input->post('template_name'),
				'email_subject' => $this->input->post('email_subject'),
				'custom_message' =>  $this->input->post('custom_message'),
				'created_date' => date_from_today()
			);
			//echo print_r($data);exit;
			$email_templates_id = $this->input->post('email_templates_id');
			if($email_templates_id){
				$result = edit_update('tbl_email_templates',$data,'email_templates_id',$email_templates_id);
			} else {
				$result = insert_data_last_id('tbl_email_templates',$data);
			}
			//echo $this->db->last_query();exit;
			$this->session->set_flashdata('success', 'email templates add');
		}
		$this->session->set_flashdata('error', 'email templates not add!');
		redirect('admin/emailtemplatesView');
	 }
	}

	public function addNotification(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('template_name', 'template title', 'trim|required');
			$this->form_validation->set_rules('email_subject', 'email subject', 'trim|required');
			$this->form_validation->set_rules('custom_message', 'custom_message', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$dataView['error'] = validation_errors();
			$this->load->view('admin/emailtemplatesView',$dataView);
		} else {
			$data = array(
				'template_name' => $this->input->post('template_name'),
				'email_subject' => $this->input->post('email_subject'),
				'custom_message' =>  $this->input->post('custom_message'),
				'created_date' => date_from_today()
			);
			$email_templates_id = $this->input->post('email_templates_id');
			if($email_templates_id){
				$result = edit_update('tbl_email_templates',$data,'email_templates_id',$email_templates_id);
			} else {
				$result = insert_data_last_id('tbl_email_templates',$data);
			}
			$this->session->set_flashdata('success', 'email templates add');
		}
		$this->session->set_flashdata('error', 'email templates not add!');
		redirect('admin');
	 }
	}

	public function ajax_user_activeInactive()
	{
		$user_id = $this->input->post('user_id');
		$status = $this->input->post('status');
		$data = array('is_verify' => $status);
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_users', $data);
		//echo $this->db->last_query();
		echo '1';		
	}

	public function ajax_lat_long()
	{
		$latitude = $this->input->post('lat');
		$longitude = $this->input->post('long');
		$logintype = $this->input->post('logintype');
		$user_id = getSession('user_id');
		if($logintype=='last'){
			$data = array('last_latitude' => $latitude, 'last_longitude' => $longitude);
		} else {
			$data = array('first_latitude' => $latitude, 'first_longitude' => $longitude);
		}
		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_users', $data);
		if($logintype=='last'){
			$this->session->sess_destroy();
		}
	}

	public function add_role()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/add_role');
		$this->load->view('admin/footer');
	}

	public function insert_rolename(){
			$this->form_validation->set_rules('user_type', 'user type', 'trim|required');
			$this->form_validation->set_rules('designation', 'designation', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$dataView['error'] = validation_errors();
			$this->load->view('admin/add_role',$dataView);
		} else {
			$data = array(
				'user_type' => $this->input->post('user_type'),
				'designation' =>  $this->input->post('designation'),
				'created_date' => date_from_today()
			);
			$rolename_id = $this->input->post('rolename_id');
			if($rolename_id){
				$result = edit_update('tbl_rolename',$data,'rolename_id',$rolename_id);
			} else {
				$result = insert_data_last_id('tbl_rolename',$data);
			}
			$this->session->set_flashdata('success', 'Role name add');
		}
		$this->session->set_flashdata('error', 'Role name not add!');
		redirect('rolename');
	}	

	public function ajax_listTable()
	{
		$table = $this->input->post('table');
		$get_all_list = get_dataBY_admin($table);
			if($table=='tbl_rolename'){
				$html = $this->gettbl_rolenameTable($get_all_list,$table);
			} else if($table=='tbl_users'){
				$html = $html = $this->gettbl_usersTable($get_all_list,$table);
			} else if($table=='tbl_user_type'){
				$html = $this->gettbl_user_typeTable($get_all_list,$table);
			}
		echo $html;		
	}

	public function gettbl_usersTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonActive = (($val['is_verify'] == 1)?'block':'none');
            $buttonInActive = (($val['is_verify'] == 0)?'block':'none');
			$buttonStatus = '<a href="javaScript:void(0)" title="Active" style="display:'.$buttonActive.'" id="activeBtn'.$val['user_id'].'" onclick="activeInactive('.$val['user_id'].',0);" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a>
			<a href="javaScript:void(0)" title="In active" style="display:'.$buttonInActive.'" id="inactiveBtn'.$val['user_id'].'" onclick="activeInactive('.$val['user_id'].',1);" class="btn btn-danger btn-sm"> <i class="fa fa-thumbs-down"></i></a>';
			$buttonDel = '<button class="btn" onclick="ajaxdelete_tbl_users('.$val['user_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['username'].'</td>
				<td>'.$val['email'].'</td>
				<td>'.$buttonStatus.'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		return $html;
	}
	
	public function gettbl_user_typeTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adminview/add_usertype/').$val['user_type_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_user_type('.$val['user_type_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['user_type'].'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		return $html;		
	}

	public function gettbl_rolenameTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('admin/add_role/').$val['rolename_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_rolename('.$val['rolename_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['user_type'].'</td>
				<td>'.$val['designation'].'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		return $html;
	}

	public function ajax_delete_table()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$data = array('eDelete' => 1);
		if($table=='tbl_users'){
			$this->db->where('user_id', $id);
		} else {
			$tableid = substr($table, 4);
			$table_id = $tableid.'_id';
			$this->db->where($table_id, $id);
		}
		$this->db->update($table, $data);
		return '1';		
	}

	public function ajaxroledelete()
	{
		$rolename_id = $this->input->post('rolename_id');
		$data = array('eDelete' => 1);
		$this->db->where('rolename_id', $rolename_id);
		$this->db->update('tbl_rolename', $data);
		return '1';		
	}

}	

?>	
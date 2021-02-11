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

	public function profileView(){
		$view_data['profileDetails'] = $this->auth_model->get_user_detail();
		viewPages('profile',$view_data);
	}

	public function projectView1(){
		$this->load->view('header');
		$this->load->view('project');
		$this->load->view('footer');
	}

	public function projectView(){
		$this->load->view('header');
		$this->load->view('addproject');
		$this->load->view('footer');
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
			$mpdf->SetTitle("manish sanghani - Users List");
			$mpdf->SetAuthor("manish sanghani");
			$mpdf->watermark_font = 'manish sanghani';
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
		$this->load->view('header');
		$this->load->view('add_role');
		$this->load->view('footer');
	}	

	public function ajax_listTable()
	{
		$table = $this->input->post('table');
		$eDelete = array('eDelete'=>0);
		//$get_all_list = get_dataBY_admin($table,'user_id');
			if($table=='tbl_rolename'){
				$html = $this->gettbl_rolenameTable(get_dataBY_admin($table,'rolename_id'),$table);
			} else if($table=='tbl_users'){
				$html = $html = $this->gettbl_usersTable(get_dataBY_admin($table,'user_id'),$table);
			} else if($table=='tbl_user_type'){
				$html = $this->gettbl_user_typeTable(get_dataBY_admin($table,'user_type_id'),$table);
			} else if($table=='tbl_project'){
				$html = $this->gettbl_projectTable(get_dataBY_admin($table,'project_id'),$table);
			} else if($table=='tbl_task'){
				$html = $this->gettbl_taskTable(get_dataBY_admin($table,'id'),$table);
			} else if($table=='tbl_permission'){
				$html = $this->gettbl_permissionTable(get_dataBY_admin($table,'permission_id'),$table);
			}
		echo $html;		
	}

	public function gettbl_projectTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_project/').$val['project_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_project('.$val['project_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['project_name'].'</td>
				<td>'.$val['category'].'</td>
				<td>'.$val['client_id'].'</td>
				<td>'.$val['start_date'].'</td>
				<td>'.$val['deadline'].'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		return $html;		
	}

	public function ajax_listTabletbl_task()
	{
		$html = ''; $i=1;
		$this->db->select('*');
		$this->db->from('tbl_task');
		$this->db->where('eDelete',0);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		foreach ($query->result_array() as $key => $val) {
			if($val["priority"]==3){
	            $priority = 'HIGH';
	        } else if($val["priority"]==2){
	            $priority = 'medium';
	        } else if($val["priority"]==1){
	            $priority = 'low';
	        }
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_task/').$val['id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_task('.$val['id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.gettbl_project($val['project_id'],'project_name').'</td>
				<td>'.$val['title'].'</td>
				<td>'.$val['due_date'].'</td>
				<td>'.gettbl_priority($val['priority'],'name').'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		echo $html;		
	}

	public function ajax_listTabletbl_blog()
	{
		$html = ''; $i=1;
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->where('eDelete',0);
		$this->db->order_by('blog_id','desc');
		$query = $this->db->get();
		foreach ($query->result_array() as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_blog/').$val['blog_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_blog('.$val['blog_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['title'].'</td>
				<td>'.$val['blog_image'].'</td>
				<td>'.$val['categories'].'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		echo $html;		
	}

	public function gettbl_permissionTable($get_all_list,$table)
	{
		$html = '<input type="hidden" id="table_id" value="'.$table.'">'; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_permission/').$val['permission_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete('.$val['permission_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.gettbl_users($val['main_user_id'],'username').'</td>
				<td>'.gettbl_users($val['user_to_permission'],'username').'</td>
				<td>'.$val['role_name'].'</td>
				<td>'.$buttonDel.'</td>
					</tr>';
			$i++;
		}
		return $html;		
	}

	public function gettbl_usersTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonActive = (($val['is_verify'] == 1)?'block':'none');
            $buttonInActive = (($val['is_verify'] == 0)?'block':'none');
			$buttonStatus = '<a href="javaScript:void(0)" title="Active" style="display:'.$buttonActive.'" id="activeBtn'.$val['user_id'].'" onclick="activeInactive('.$val['user_id'].',0);" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a>
			<a href="javaScript:void(0)" title="In active" style="display:'.$buttonInActive.'" id="inactiveBtn'.$val['user_id'].'" onclick="activeInactive('.$val['user_id'].',1);" class="btn btn-danger btn-sm"> <i class="fa fa-thumbs-down"></i></a>';
			
			$buttonDel = '<a href="'.base_url('dashboard/add_user/').$val['user_id'].'">EDIT</a>
			|
			<button class="btn" onclick="ajaxdelete_tbl_users('.$val['user_id'].')">Delete</button>';

			if($val['user_id']!='1'){
				$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['username'].'</td>
				<td>'.$val['email'].'</td>
				<td>'.getuser_type($val['user_type']).'</td>
				<td>'.$val['designation'].'</td>
				<td>'.$buttonStatus.'</td>
				<td>'.$buttonDel.'</td>
				</tr>';
				$i++;
			} 
		}
		return $html;
	}
	
	public function gettbl_user_typeTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_usertype/').$val['user_type_id'].'">Edit</a> 
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

	public function ajax_listTabletbl_feedback()
	{
		$html = ''; $i=1;
		$this->db->select('*');
		$this->db->from('tbl_feedback');
		$this->db->order_by('feedback_id','desc');
		$query = $this->db->get();
		//echo print_r($query->result_array());exit;
		foreach ($query->result_array() as $key => $val) {
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.$val['first_name'].'</td>
				<td>'.$val['email'].'</td>
				<td>'.$val['quality'].'</td>
			   </tr>';
			$i++;
		}
		return $html;		
	}

	public function gettbl_rolenameTable($get_all_list,$table)
	{
		$html = ''; $i=1;
		foreach ($get_all_list as $key => $val) {
			$buttonDel = '<a class="btn" href="'.base_url('adddb/add_role/').$val['rolename_id'].'">Edit</a> 
			| <button class="btn" onclick="ajaxdelete_tbl_rolename('.$val['rolename_id'].')">Delete</button>';
			$html .= '<tr>
				<td>'.$i.'</td>
				<td>'.getuser_type($val['user_type']).'</td>
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

	public function ajaxdelete_tbl_blog()
	{
		$blog_id = $this->input->post('blog_id');
		$data = array('eDelete' => 1);
		$this->db->where('blog_id', $blog_id);
		$this->db->update('tbl_blog', $data);
		return '1';		
	}

	public function ajaxdelete_tbl_feedback()
	{
		$feedback_id=$this->input->post('feedback_id');
		$this->db->query("DELETE FROM `tbl_feedback` WHERE feedback_id=$feedback_id");
		echo base_url('dashboard/feedbacklist');		
	}

	public function ajaxroledelete()
	{
		$rolename_id = $this->input->post('rolename_id');
		$data = array('eDelete' => 1);
		$this->db->where('rolename_id', $rolename_id);
		$this->db->update('tbl_rolename', $data);
		return '1';		
	}

	public function ajaxdelete()
	{
		$table = $this->input->post('table');
		$table_id = $this->input->post('table_id');
		$data = array('eDelete' => 1);
		if($table=='tbl_permission'){
			$this->db->where('permission_id', $table_id);
		} else if($table=='tbl_task'){
			$this->db->where('id', $table_id);
		} else if($table=='tbl_project'){
			$this->db->where('project_id', $table_id);
		}
		
		$this->db->update($table, $data);
		return '1';		
	}

	public function ajaxdelete_tbl_project()
	{
		$project_id = $this->input->post('project_id');
		$data = array('eDelete' => 1);
		$this->db->where('project_id', $project_id);
		$this->db->update('tbl_project', $data);
		return '1';		
	}

	public function ajaxdelete_tbl_task()
	{
		$task_id = $this->input->post('task_id');
		$data = array('eDelete' => 1);
		$this->db->where('id', $task_id);
		$this->db->update('tbl_task', $data);
		return '1';		
	}

	public function ajax_getLabels()
	{
		$project_id = $this->input->post('project_id');
		$projectuser_id=gettbl_project($project_id,'user_id');
		$combo_id = gettbl_project($project_id,'combo_id');
		$status_id = $this->input->post('status_id');
		$html = '';
		$this->db->select('*');
		$this->db->from('tbl_status');
		$this->db->where('eDelete',0);
		$this->db->where('project_id',$project_id);
		$query = $this->db->get();
		foreach ($query->result_array() as $key => $val) {
			if($status_id==$val["id"]){ $selected = 'selected'; } else { $selected = ''; }
			$html .= '<option value="'.$val['id'].'" '.$selected.'>'.$val['status_name'].'</option>';
		}
		
		$data_m = array('html'=>$html,'combo_id'=>$combo_id,'projectuser_id'=>$projectuser_id);
		echo json_encode($data_m);		
	}


}	

?>	
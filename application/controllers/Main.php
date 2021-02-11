<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller {
	    
		public function __construct(){
			parent::__construct();
			$this->load->model('comman_model');
		}

		public function export_csv(){ 
			$filename = 'users_'.date('Y-m-d').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");
			$file = fopen('php://output', 'w');
			$header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date"); 
			fputcsv($file, $header);
			/*foreach ($user_data as $key=>$line){ 
				fputcsv($file,$line); 
			}*/
			fclose($file); 
			exit; 
		}

		

		public function ajaxfileupload() {

			//echo print_r($_POST);
		    $config['upload_path'] = 'uploads/';
		    $config['allowed_types'] = '*';
		    $config['encrypt_name'] = TRUE;
		    $config['max_size'] = '10240'; //1 MB

		    if (isset($_FILES['category_image']['name'])) {
		        if (0 < $_FILES['category_image']['error']) {
		            echo 'Error during file upload' . $_FILES['category_image']['error'];
		        } else {
		            if (file_exists('uploads/' . $_FILES['category_image']['name'])) {
		                echo 'File already exists : uploads/' . $_FILES['category_image']['name'];
		            } else {
		                $this->load->library('upload', $config);
		                if (!$this->upload->do_upload('category_image')) {
		                    echo $this->upload->display_errors();
		                } else {
		                    echo 'File successfully uploaded : uploads/' . $_FILES['category_image']['name'];
		                }
		            }
		        }
		    } else {
		        echo 'Please choose a file';
		    }
		}

		public function boardsInsert(){
			//print_r($_POST);exit;

			$data = array(
					'boards_name' => $this->input->post('boards_name'),
					'boards_descrption' => $this->input->post('boards_descrption'),
					'boards_backgroundcolor' => $this->input->post('boards_backgroundcolor'),
					'boards_category' =>  $this->input->post('boards_category'),
					'created_date' => date_from_today()
				);
			insert_data('tbl_boards',$data);
		}

		public function categoryInsert(){
			$table = 'tbl_category';
			$id = $this->input->post($table.'_id');

			if($id){
				if($_FILES['category_image']['name']){
					$data = fileUploadd('category_image');
					$category_image = $data['file_name'];
				} else {
					$category_image = $this->input->post('category_nameOLD');
				}
				$data1 = array(
						'category_name' => $this->input->post('category_name'),
						'category_image' => $category_image,
						'created_date' => date_from_today()
					);
				edit_update($table,$data1,$id);
			} else {
				$data = fileUploadd('category_image');
				$data1 = array(
						'category_name' => $this->input->post('category_name'),
						'category_image' => $data['file_name'],
						'created_date' => date_from_today()
					);
				insert_data($table,$data1);
			}
			
				
			}
			
		}
		
		public function langueInsert(){
			$language_name = $this->input->post('language_name'); 
			$data = fileUploadd('language_image');
			$data1 = array(
					'language_name' => $this->input->post('language_name'),
					'language_image' => $data['file_name'],
					'created_date' => date_from_today()
				);
			insert_data('tbl_language',$data1);
		}

		public function dynamictable(){
			print_r($_POST);
		}

		public function ajax_tablecolumn_names(){
			$table = $this->input->post('table_name');
			$getTablecolumn_names = getTablecolumn_names($table);
		}

		public function ajax_city(){
			$state_id = $this->input->post('state_id');
			$getCity = getCity($state_id);
			$html = '';
			foreach ($getCity as $key => $val) {
				$html .= '<option value="'.$val['city_id'].'">'.$val['city'].'</option>';
			}
			echo $html;
		}

		public function ajax_state(){
			$country_id = $this->input->post('country_id');
			$getState = getState($country_id);
			$html = '';
			foreach ($getState as $key => $val) {
				$html .= '<option value="'.$val['state_id'].'">'.$val['state'].'</option>';
			}
			echo $html;
		}

		public function addProjects(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('project_name', 'Project title', 'trim|required');
				$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('deadline', 'Deadline Date', 'trim|required');
				$this->form_validation->set_rules('client_id', 'Client Name', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$dataView['error'] = validation_errors();
				$this->load->view('project',$dataView);
			}
			else {
				$data = array(
					'project_name' => $this->input->post('project_name'),
					'project_description' => $this->input->post('project_description'),
					'start_date' =>  $this->input->post('start_date'),
					'deadline' =>  $this->input->post('deadline'),
					'client_id' =>  $this->input->post('client_id'),
					'created_date' => date_from_today()
				);
				$project_id = $this->input->post('project_id');
				if($project_id){
					$result = $this->comman_model->edit_update($data,$project_id);
				} else {
					$result = $this->comman_model->add_insert($data);
				}
			}
			//$this->session->set_flashdata('error', 'Invalid Username or Password!');
			redirect('dashboard');
		}
	}

	public function addClients(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('country', 'country', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('project');
		}
		else {
				$data = array(
					'company_name' => $this->input->post('company_name'),
					'email' => $this->input->post('email'),
					'website' => $this->input->post('website'),
					'phone' =>  $this->input->post('phone'),
					'country' =>  $this->input->post('country'),
					'city' =>  $this->input->post('city'),
					'client_name' =>  $this->input->post('client_name'),
					'created_date' => date_from_today()
				);
				$client_id = $this->input->post('client_id');
				if($client_id){
					$result = $this->comman_model->edit_update($data,$client_id);
				} else {
					$result = $this->comman_model->add_insert($data);
				}
			}
			//$this->session->set_flashdata('error', 'Invalid Username or Password!');
			redirect('dashboard');
		}
	}
	
}

?>	
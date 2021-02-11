<?php if (! defined('BASEPATH')) {
 exit('No direct script access allowed');
}
class Dropzone extends MY_Controller
{

	public function fileUpload(){
		if(!empty($_FILES['file']['name'])){
			$config['upload_path'] = './uploads/';	
			$config['allowed_types'] = '*';
			$config['max_size']    = '1024000';
			$config['file_name'] = $_FILES['file']['name'];
			$this->load->library('upload',$config);			
			// File upload
			if($this->upload->do_upload('file')){
				// Get data about the file
				$fileData = $this->upload->data();
				$uploadData['file_name'] = $fileData['file_name'];
				$uploadData['task_id'] = $this->input->post('edit_task_id');
				$uploadData['user_id'] = getProfileName('user_id');
				insert_data_last_id('tbl_multiple_image', $uploadData);
				echo print_r($fileData);exit;
			}
		}
	}

}
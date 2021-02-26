<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
	}

	public function like_unlike()
	{
		$ip_address =$this->input->ip_address();
		$blog_id=$this->input->post('blog_id');
		//$this->db->query("INSERT INTO `like_unlike`(`blog_id`, `ip_address`) VALUES ('$blog_id','$ip_address')");
		//$this->db->query("UPDATE `tbl_blog` SET `like_blog`=like_blog+1 WHERE blog_id=$blog_id");		
		echo $ip_address.'/'.$blog_id;	
	}

	public function like_unlike1()
	{
		$ip_address =$this->input->ip_address();
		$blog_id=$this->input->post('blog_id');
		switch($this->input->post('action')){
			case "like":
				$this->db->query("INSERT INTO `like_unlike`(`blog_id`, `ip_address`) VALUES ('$blog_id','$ip_address')");
				//if(!empty($result)) {
					$this->db->query("UPDATE `tbl_blog` SET `like_blog`=like_blog+1 WHERE blog_id=$blog_id");				
				//}			
			break;		
			case "unlike":
				$this->db->query("DELETE FROM `like_unlike` WHERE ip_address='$ip_address' and blog_id=$blog_id");
				//if(!empty($result)) {
					$this->db->query("UPDATE `tbl_blog` SET `like_blog`=like_blog - 1 WHERE blog_id=$blog_id and like_blog > 0");
				//}
			break;		
		}
	}

	public function upload_multiple_upload()
	{
		   //sleep(3);
		   $combo_id=time();
		   $user_id=getProfileName('user_id');
		   $task_id=$this->input->post('task_id');
		   if($_FILES["edit_task_file"]["name"] != '')
  		   {
		   $output = '';
		   $config["upload_path"] = './uploads/task/';
		   $config["allowed_types"] = '*';
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   for($count = 0; $count<count($_FILES["edit_task_file"]["name"]); $count++)
		   {
		    $_FILES["file"]["name"] = $_FILES["edit_task_file"]["name"][$count];
		    $_FILES["file"]["type"] = $_FILES["edit_task_file"]["type"][$count];
		    $_FILES["file"]["tmp_name"] = $_FILES["edit_task_file"]["tmp_name"][$count];
		    $_FILES["file"]["error"] = $_FILES["edit_task_file"]["error"][$count];
		    $_FILES["file"]["size"] = $_FILES["edit_task_file"]["size"][$count];
			    if($this->upload->do_upload('file'))
			    {
			     $data = $this->upload->data();
			     $file_name = $data["file_name"];
			     insert_data_last_id('tbl_multiple_image',array('user_id'=>getProfileName('user_id'),'file_name'=>$file_name,'task_id'=>$task_id,'created_date'=>date_from_today(),'combo_id'=>$combo_id,'file_size'=>$data['file_size']));
			    //echo $this->db->last_query();exit;
			    }
		   }

		$querycom = $this->db->query("SELECT GROUP_CONCAT(multiple_image_id) as multiple_image_id FROM `tbl_multiple_image` WHERE combo_id='$combo_id' and task_id='$task_id' and user_id='$user_id'");
	    $result_arraycom = $querycom->row_array();
	    $task_file = $result_arraycom['multiple_image_id'];
	    edit_update('tbl_task',array('task_file'=>$task_file),'id',$task_id);

		echo $this->getlistbyfiles($task_id);
		//echo $output;   
	  }

	}

	public function ajax_getimgBYtask()
	{
	   $user_id=getProfileName('user_id');
	   $task_id=$this->input->post('task_id');
	   echo $this->getlistbyfiles($task_id);  
	}

	public function viewtaksfiles()
	{
	   $user_id=getProfileName('user_id');
	   $task_id=$this->input->post('task_id');
	   $taskfile=$this->input->post('task_file');
	   $query1 = $this->db->query("SELECT task_file FROM `tbl_task` WHERE id='$task_id' and user_id='$user_id'");
       $resultarray=$query1->row_array();
       $task_file=$resultarray['task_file'];
       $query = $this->db->query("SELECT file_name FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id IN ($task_file) limit 0,1");
       $result_array = $query->row_array();
       echo $result_array['file_name'];
	}


	public function delete_task_file()
	{
	   $user_id=getProfileName('user_id');
	   $multiple_image_id=$this->input->post('multiple_image_id');
	   $task_id=$this->input->post('task_id');
	   $query = $this->db->query("SELECT file_name FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id=$multiple_image_id");
       $result_array = $query->row_array();
	   unlink("uploads/task/".$result_array['file_name']);
	   $this->db->query("DELETE FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id=$multiple_image_id");
	   echo $result_array['file_name'];
	}

	public function getlistbyfiles($task_id)
	{
	   $user_id=getProfileName('user_id');
	   $query = $this->db->query("SELECT * FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id'");
    	$result_array = $query->result_array();
    	$output='';
    	foreach ($result_array as $key => $value) {
    		$output .= '<tr>
                        <td class="w_file_type">
                           <div class="file-type">
                              <span class="files-icon"><i class="far fa-file-pdf"></i></span>
                           </div>
                        </td>
                        <td class="w_files_info">
                           <div class="files-info">
                              <span class="file-name text-ellipsis"><a href="#">'.$value['file_name'].'</a></span>
                              <span class="file-author"><span class="file-date">'.date('M d,Y H:i:s A',strtotime($value['created_date'])).'</span>
                              <div class="file-size">Size: '.$value['file_size'].' KB</div>
                           </div>
                        </td>
                        <td class="w_files_action">
                           <div class="post-toolbar-b">
                              <button class="btn btn-file_download" onclick="download_task_file('.$value['multiple_image_id'].','.$value['task_id'].')"><i class="fas fa-download"></i> Download</button>
                              <button class="btn btn-file_delete" onclick="delete_task_file('.$value['multiple_image_id'].','.$value['task_id'].')"><i class="far fa-trash-alt"></i> Delete</button>
                           </div>
                        </td>
                     </tr>';
    	}
		return $output;   
	}

	 public function download_files()
    {
        $multiple_image_id = $this->uri->segment(3);
        $task_id = $this->uri->segment(4);
        $user_id = getProfileName('user_id');
        $this->load->helper('download');
        $query = $this->db->query("SELECT file_name FROM `tbl_multiple_image` WHERE task_id='$task_id' and user_id='$user_id' and multiple_image_id=$multiple_image_id");
    	$result_array = $query->row_array();
        $url = 'https://anjpms.com/uploads/task/'.$result_array['file_name'];
        //$url = file_get_contents($url);
        $url = read_file($url);
        $file_name = $result_array['file_name'];
        force_download($file_name, $url);
    }

}
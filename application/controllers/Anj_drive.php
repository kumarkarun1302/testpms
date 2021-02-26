<?php
class Anj_drive extends MY_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
    	// if(anjDrive_disabled()){
    	// 	redirect("#pricing-table");
    	// }

    	$user_id = getProfileName('user_id');
    	$viewdata['user_id'] = $user_id;
		$query = $this->db->query("SELECT COUNT(drive_id) as total,`drive_id`, `user_id`, `file`, `file_ext`, `folder`, `eDelete`, `created_date`, `dummy_cryptcode`, `created_time`, `file_type`, `file_size`, `is_image`, `file_folder`,`orig_name` FROM `tbl_anjdrive` where user_id=$user_id and `file_folder` != '0' and eDelete IN (0,2) GROUP by dummy_cryptcode ORDER BY `tbl_anjdrive`.`drive_id`  DESC");
		$data['drive_images'] = $query->result_array();
		$this->load->view('anj_drive/header',$data);
        $this->load->view('anj_drive/driveModal',$data);

        $viewdata['drive_grid_layout'] = $this->session->set_userdata('drive_grid_layout', 'grid');
        $this->session->unset_userdata('drive_list_layout');

		if($this->uri->segment(2)){
			$viewdata['new_foldername'] = $this->uri->segment(2);
			$viewdata['tbl_anjdrive_id'] = $this->uri->segment(3);
			$this->load->view('anj_drive/folder_file',$viewdata);
		} else {
			$this->load->view('anj_drive/drive_file',$data);
		}
    }

    public function list()
    {
    	$user_id = getProfileName('user_id');
    	$viewdata['user_id'] = $user_id;
		$query = $this->db->query("SELECT COUNT(drive_id) as total,`drive_id`, `user_id`, `file`, `file_ext`, `folder`, `eDelete`, `created_date`, `dummy_cryptcode`, `created_time`, `file_type`, `file_size`, `is_image`, `file_folder`,`orig_name` FROM `tbl_anjdrive` where user_id=$user_id and `file_folder` != '0' and eDelete IN (0,2) GROUP by dummy_cryptcode ORDER BY `tbl_anjdrive`.`drive_id`  DESC");
		$data['drive_images'] = $query->result_array();
		$this->load->view('anj_drive/header',$data);
        $this->load->view('anj_drive/driveModal',$data);
        
        $viewdata['drive_list_layout'] = $this->session->set_userdata('drive_list_layout', 'list');
		$this->session->unset_userdata('drive_grid_layout');

		if($this->uri->segment(2)){
			$viewdata['new_foldername'] = $this->uri->segment(2);
			$viewdata['tbl_anjdrive_id'] = $this->uri->segment(3);
			$this->load->view('anj_drive/folder_file',$viewdata);
		} else {
			$this->load->view('anj_drive/drive_file',$data);
		}
    }

    public function upgrade()
    {
		$this->load->view('anj_drive/upgrade');
    }

    function formatSize($size){
    	$base = log($size) / log(1024);
  $suffix = array("", "KB", "MB", "GB", "TB");
  $f_base = floor($base);
  return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
		/*if($bytes < 512000) {
			$bytes = $bytes / 1024;
			$bytes = round($bytes). ' MB';
			return $bytes;

		} elseif($bytes > 1024000) {
			$bytes = $bytes / 1024 / 1024;
			$bytes = round($bytes). ' GB';
			return $bytes;
		} else if($bytes < 1024000000) {
			$bytes = $bytes / 1024 / 1024 / 1024;
			$bytes = round($bytes). ' TB';
			return $bytes;
		}*/
	}

    public function upgradeINsert()
    {
    	echo $this->formatSize('22020096000');exit;
    	$user_id=getProfileName('user_id');
		$file_sharing_storage=getProfileName('file_sharing_storage');
		echo $this->uri->segment(3);
		$this->db->query("UPDATE `tbl_users` SET file_sharing_storage=$file_sharing_storage where user_id=$user_id");
    }

    public function shared_me()
    {	
    	$user_id=getProfileName('user_id');
    	$query = $this->db->query("SELECT COUNT(drive_id) as total, `share_other_people`, `file`,`folder`, `eDelete`, `created_date`, `dummy_cryptcode`, `file_size`, `file_folder` FROM `tbl_anjdrive` where user_id=$user_id and `file_folder` != '0' GROUP by dummy_cryptcode ORDER BY `tbl_anjdrive`.`drive_id`  DESC");
		$data['drive_images'] = $query->result_array();
    	$this->load->view('anj_drive/header');
        $this->load->view('anj_drive/driveModal',$data);
		$this->load->view('anj_drive/shared_me');
    }

    public function upload_file()
    {
	    $foldername = slugify($this->input->post('foldername'));
	    $name_array = array();
	    $dynamic_folder = getProfileName('username');
  		if(!is_dir($dynamic_folder)) { mkdir('drive_file/'.$dynamic_folder, 0777); } 
		
		$created_time = time();
		$dummy_cryptcode = anj_crypt($created_time,'e');

		$folderfile = $_FILES['userfile']['name'][0];
			if(!is_dir($foldername)) { mkdir('drive_file/'.$dynamic_folder.'/'.$foldername, 0777); }
			$count = count($_FILES['userfile']['size']);
			foreach($_FILES as $key=>$value)
			for($s=0; $s<=$count-1; $s++) {
				$_FILES['userfile']['name']=$value['name'][$s];
				$_FILES['userfile']['type']    = $value['type'][$s];
				$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
				$_FILES['userfile']['error']       = $value['error'][$s];
				$_FILES['userfile']['size']    = $value['size'][$s];   
				$config['upload_path'] = './drive_file/'.$dynamic_folder.'/'.$foldername;
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				$this->upload->do_upload();
				$data = $this->upload->data();
				$name_array[] = $data['file_name'];
				if($data['is_image']==1){
					$image_width = $data['image_width'];
					$image_height = $data['image_height'];
				} else {
					$image_width = 0;
					$image_height = 0;
				}
				$drive_data = array('user_id'=>getProfileName('user_id'),'file'=> $data['file_name'],'folder'=>$foldername,'created_date'=>date_from_today(),'dummy_cryptcode'=>$dummy_cryptcode,'created_time'=>$created_time,
					'file_ext'=>$data['file_ext'],
					'file_type'=>$data['file_type'],
					'file_size'=>$data['file_size'],
					'is_image'=>$data['is_image'],
					'image_width'=>$image_width,
					'image_height'=>$image_height,
					'image_type'=>$data['image_type'],
					'image_size_str'=>$data['image_size_str'],
					'orig_name'=>$data['orig_name'],
					'file_folder'=>2,
					'share_other_people'=>0
					);
				insert_data_last_id('tbl_anjdrive',$drive_data);
				//echo $this->db->last_query();exit;
			}
	  redirect("anj_drive");
    }

     public function one_to_one_file()
     {
     	$dynamic_folder = getProfileName('username');
  		if(!is_dir($dynamic_folder)) { mkdir('drive_file/'.$dynamic_folder, 0777); } 
		$created_time = time();
		$dummy_cryptcode = anj_crypt($created_time,'e');
		$abcd = '1024';
		$fixsize = round($_FILES["one_file"]['size'] / $abcd / $abcd,2);
		$limit = getProfileName('file_sharing_storage');
        $db_limit = round(anjdrive_getsize());
        $remember_limits = $limit - $db_limit;
        $mins = $_FILES["one_file"]['size'] / 1024;
        
        if ($mins > $remember_limits) {
        	$this->session->set_flashdata('error', 'You are out of space. Try to delete some files. Please <b>upgrade</b>.');
			redirect("anj_drive");
			exit;
        }

        $max_file_size_upload = getProfileName('max_file_size_upload');
		if($fixsize > $max_file_size_upload){  
			$this->session->set_flashdata('error', 'You cannot upload a file that exceeds '.$max_file_size_upload.' MB in size. Please try it again.');
			redirect("anj_drive");
			exit;
		}

		$config['upload_path']    = './drive_file/'.$dynamic_folder;
		$config['allowed_types']  = '*';
		$config['remove_spaces'] = true;
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('one_file')) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$dataone = $this->upload->data();
			//echo print_r($dataone);exit;
			if($dataone['is_image']==1){
				$image_width = $dataone['image_width'];
				$image_height = $dataone['image_height'];
			} else {
				$image_width = 0;
				$image_height = 0;
			}
			$drive_dataone = array('user_id'=>getProfileName('user_id'),'file'=> $dataone['file_name'],'folder'=>$dynamic_folder,'created_date'=>date_from_today(),'dummy_cryptcode'=>$dummy_cryptcode,'created_time'=>$created_time,
			'file_ext'=>$dataone['file_ext'],
			'file_type'=>$dataone['file_type'],
			
			'file_size'=>$dataone['file_size'],
			'is_image'=>$dataone['is_image'],
			'image_width'=>$image_width,
			'image_height'=>$image_height,
			'image_type'=>$dataone['image_type'],
			'image_size_str'=>$dataone['image_size_str'],
			'orig_name'=>$dataone['orig_name'],
			'file_folder'=>1,
			'share_other_people'=>0
			);
			insert_data_last_id('tbl_anjdrive',$drive_dataone);
			//echo $this->db->last_query();exit;
		}
		echo '1';
		//redirect("anj_drive");
    }

    public function folder_upload_file()
    {
	    $foldername = slugify($this->input->post('new_foldername'));
	    $drive_id = $this->input->post('tbl_anjdrive_id');
	    $name_array = array();
	    $dynamic_folder = getProfileName('username');
  		if(!is_dir($dynamic_folder)) { mkdir('drive_file/'.$dynamic_folder, 0777); } 
		$created_time = time();
		$dummy_cryptcode = anj_crypt($created_time,'e');
		$folderfile = $_FILES['userfile']['name'][0];
			if(!is_dir($foldername)) { mkdir('drive_file/'.$dynamic_folder.'/'.$foldername, 0777); }
			$count = count($_FILES['userfile']['size']);
			foreach($_FILES as $key=>$value)
			for($s=0; $s<=$count-1; $s++) {
				$_FILES['userfile']['name']=$value['name'][$s];
				$_FILES['userfile']['type']    = $value['type'][$s];
				$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
				$_FILES['userfile']['error']       = $value['error'][$s];
				$_FILES['userfile']['size']    = $value['size'][$s];   
				$config['upload_path'] = './drive_file/'.$dynamic_folder.'/'.$foldername;
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				$this->upload->do_upload();
				$data = $this->upload->data();
				$name_array[] = $data['file_name'];
				if($data['is_image']==1){
					$image_width = $data['image_width'];
					$image_height = $data['image_height'];
				} else {
					$image_width = 0;
					$image_height = 0;
				}
				$drive_data = array('user_id'=>getProfileName('user_id'),'file'=> $data['file_name'],'folder'=>$foldername,'created_date'=>date_from_today(),
					'created_time'=>$created_time,
					'file_ext'=>$data['file_ext'],
					'file_type'=>$data['file_type'],
					'file_size'=>$data['file_size'],
					'is_image'=>$data['is_image'],
					'image_width'=>$image_width,
					'image_height'=>$image_height,
					'image_type'=>$data['image_type'],
					'image_size_str'=>$data['image_size_str'],
					'orig_name'=>$data['orig_name'],
					'file_folder'=>2,
					'share_other_people'=>0
					);
				edit_update('tbl_anjdrive', $drive_data, 'dummy_cryptcode', $drive_id);
				//echo $this->db->last_query();exit;
			}
	  redirect("anj_drive");
    }

    public function insert_create_folder(){
    	$created_time = time();
		$dummy_cryptcode = anj_crypt($created_time,'e');
    	$create_folder = $this->input->post('create_folder_textbox');
    	$drive_dataone = array(
    		'user_id'=>getProfileName('user_id'),
    		'folder'=>$create_folder,
    		'created_date'=>date_from_today(),
    		'dummy_cryptcode'=>$dummy_cryptcode,
    		'created_time'=>$created_time,
			);
    	insert_data_last_id('tbl_anjdrive',$drive_dataone);
    	$this->session->set_flashdata('success', 'Folder Created Successfully.');
    	echo "f/".$create_folder.'/'.$dummy_cryptcode;
    	//redirect("f/".$create_folder.'/'.$dummy_cryptcode);
    }

    public function insert_upload_url(){
		error_reporting(0);
		ini_set('display_errors', 0);
		$data_m = array();
		$url = $this->input->post('upload_url');
		$url_check=getimagesize($url);
		$file_headers = @get_headers($url);
		/*if(!is_array($url_check)){
		  $msg = "Server has not responded. No headers or file to show.";
		} else {
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
		    $msg = "File Doesn't Exist, Access Denied, URL Moved etc";
		  } else {*/
		  	$filename = substr($url, strrpos($url, '/') + 1);
			$msg = file_put_contents('drive_file/'.$filename, file_get_contents($url));
		 /* }
		}*/
		$data_m = array('msg'=>$msg);
		echo json_encode($data_m);
	}

	 public function other_share()
    {
    	$share_other_people = $this->input->post('share_other_people');
    	$dummy_cryptcode = $this->input->post('modaldummy_cryptcode');
    	$anj_link_url = $this->input->post('anj_link_url');
    	$massage_link = $this->input->post('massage_link');
    	$invitname = getProfileName('username');
    	$user_id = getProfileName('user_id');
    	$url = base_url();

    	$this->db->query("UPDATE `tbl_anjdrive` SET share_other_people=share_other_people+1 where dummy_cryptcode='$dummy_cryptcode'");

		/*$query = $this->db->query("SELECT GROUP_CONCAT(share_other_people) as m FROM `tbl_anjdrive` WHERE user_id='$user_id' and dummy_cryptcode='$dummy_cryptcode'");
		$result_array = $query->row_array();
		$shareotherpeople = $result_array['m'].','.$share_other_people;
    	$drive_data = array('share_other_people'=>$shareotherpeople);
    	edit_update('tbl_anjdrive', $drive_data, 'dummy_cryptcode', $dummy_cryptcode);*/
    	//echo $this->db->last_query();exit;

    	$body = "<div style='width:100%;height:100%;margin:0;padding:0;background-color:#ffffff;font-family:Arial,Verdana,Helvetica,Lucida Grande,sans-serif' bgcolor='#ffffff'>
<table style='max-width:600px;min-width:300px' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'>
<tbody>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align='center'><a href='".base_url()."' target='_blank' data-saferedirecturl='https://www.google.com/url?q=".base_url()."'>
<img src='".base_url()."/assets/images/logo.png' alt='ANJ Drive' style='width:190px;height:71px;display:block;border:none;outline:none;text-decoration:none'>
</a></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align='center'>
   <table width='95%' cellspacing='0' cellpadding='0' border='0' align='center'>
	  <tbody>
		 <tr>
			<td style='text-align:left' align='left'>
			   <p align='left'>
			   Hello! 
			   <br><br>
			   
			   <span class='im'><b>".$invitname."</b> has invited you to access files / folders on ANJDrive, and left you this message: <br>
			   </span></p>
			   <br>
			   <table width='100%' cellspacing='0' cellpadding='6' border='0'>
				  <tbody>
					  <tr>
						<td><a href='".$anj_link_url."' style='color:#1155cc;text-decoration:none' target='_blank' data-saferedirecturl='https://www.google.com/url?q=".base_url()."'>".$anj_link_url."</a>
						</td>
					 </tr>
					 <tr>
						<td><b>Massage</b>: ".$massage_link."</td>
					 </tr>
				  </tbody>
			   </table>
			   <span>
				  <br>	
				  <p align='left'><font style='line-height:30px;font-family:Arial,Verdana,Helvetica,Lucida Grande,sans-serif;font-size:16px' color='#111111'> Don't have an ANJDrive account yet? <a href='".$url."' style='text-decoration:none;color:#1155cc' target='_blank' >Sign up here</a>.</font>
				  <br><br>

				  <font style='line-height:30px;font-family:Arial,Verdana,Helvetica,Lucida Grande,sans-serif;font-size:16px' color='#111111'>Regards, 
				  <br>ANJ webtech Team 
				  </font><br><font style='line-height:30px;font-family:Arial,Verdana,Helvetica,Lucida Grande,sans-serif;font-size:16px' color='#3068cd'>
				  <a href='".base_url()."' style='text-decoration:none;color:#1155cc' target='_blank' data-saferedirecturl='https://www.google.com/url?q=".base_url()."'>".base_url()."</a><br></font></p>
			   </span>
			</td>
		 </tr>
	  </tbody>
   </table>
</td>
</tr>
</tbody>
</table>
</div>";
		$subject = $invitname.' has shared files with you';
		$this->load->helper('email_helper');
        $send_email = sendEmail($share_other_people, $subject, $body);
		redirect('anj_drive');
    }

}
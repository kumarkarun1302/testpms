<?php defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function recurse_copy( $src, $dst ) { 
        $dir = opendir( $src ); 
        @mkdir( dirname( $dst ) );
        while( false !== ( $file = readdir( $dir ) ) ) { 
            if( $file != '.' && $file != '..' ) { 
                if( is_dir( $src . DS . $file ) ) { 
                    recurse_copy( $src . DS . $file, $dst . DS . $file ); 
                } else { 
                    copy( $src . DS . $file, $dst . DS . $file ); 
                } 
            } 
        } 
        closedir( $dir ); 
    }

    public function one_file($full_path,$username,$destination)
    {
        $i = $_SERVER['DOCUMENT_ROOT'].'/anjwebtech_pms/';
        if( !copy($full_path, $destination) ) {  
            return "File can't be copied! \n";  
        }  
        else {  
            return "File has been copied! \n";  
        } 
    }

    public function copy()
    {
        $dummy_cryptcode = $this->uri->segment(3);
        $result = get_anjdrive_data($dummy_cryptcode);
        $full_path = $result['full_path'];
        $foldername = $this->input->post('foldername');
        $foldername = 'jnal';
        $dynamic_folder = getProfileName('username');
        if(!is_dir($foldername)) { mkdir('drive_file/'.$dynamic_folder.'/'.$foldername, 0755); } 
        $i = $_SERVER['DOCUMENT_ROOT'].'/anjwebtech_pms/';
        $destination = $i.'drive_file/'.$dynamic_folder.'/'.$foldername.'/'.$result['file'];
        //echo $this->one_file($full_path,$username,$destination);
        echo $this->folderCopy($dynamic_folder,$result['folder'],$foldername);
    }

    public function folderCopy($dynamic_folder,$old_foldername,$new_foldername)
    {
        $source = 'drive_file/'.$dynamic_folder.'/'.$old_foldername.'/';
        $destination = 'drive_file/'.$dynamic_folder.'/'.$new_foldername.'/';
        foreach(glob($source.'*.*') as $file) {
            $file_to_go = str_replace($source,$destination,$file);
          copy($file, $file_to_go);
        }
    }

    public function anj()
    {
        $dummy_cryptcode = $this->uri->segment(3);
        $result = get_anjdrive_data($dummy_cryptcode);
        
        $this->db->select('*')->from('tbl_anjdrive');
        $this->db->where_in('eDelete', array(0,2));
        $this->db->where('dummy_cryptcode',$dummy_cryptcode);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $viewdata['display_files'] = $query->row_array();
            //$this->load->view('anj_drive/header',$viewdata);
            $this->load->view('anj_drive/display_files',$viewdata);
            $this->load->view('anj_drive/driveModal',$viewdata);
        } else {
            redirect('Error404');
        }
    /*echo $this->uri->segment(2);
    echo '<br>';
    echo $this->uri->segment(3);exit;*/

        /*if($result > 0){
            $viewdata['display_files'] = $result;
            $this->load->view('anj_drive/header',$viewdata);
            $this->load->view('anj_drive/display_files',$viewdata);
            $this->load->view('anj_drive/driveModal',$viewdata);
        } else {
           redirect('Error404');
        }*/
    }

    public function download_files()
    {
        $dummy_cryptcode = $this->uri->segment(3);
        //$dummy_cryptcode = $this->input->post('dummy_cryptcode');
        $this->load->helper('download');
        $display_files = get_anjdrive_data($dummy_cryptcode);
        $user_id = $display_files['user_id'];
        $username = get_one_value('tbl_users','username','user_id',$user_id);
        $url = anjdrive_imageget($username,$display_files['file'],$display_files['file_folder'],$display_files['folder']);
        $url = file_get_contents($url);
        $file_name = $display_files['file'];
        force_download($file_name, $url);
    }

    public function delete_restore_items()
    {
    	$user_id = getProfileName('user_id');
        $dummy_cryptcode = $this->input->post('dummy_cryptcode');
        $eDelete = $this->input->post('eDelete');
        $this->db->query("UPDATE `tbl_anjdrive` SET `eDelete`=$eDelete where dummy_cryptcode='$dummy_cryptcode' and user_id=$user_id");
        /*if($eDelete=='2'){
            $this->session->set_flashdata('success', 'Your file has been delete.');
        } else if($eDelete=='3'){
            $this->session->set_flashdata('success', 'Are you sure you want to permanently delete the folder? This action will wipe the folder from our server and make it unrecoverable.');
        }*/
        $this->session->set_flashdata('success', 'Your file has been delete.');
        echo 1;
    }

    public function emptytrash_items()
    {
        $user_id = getProfileName('user_id');
        $this->db->query("UPDATE `tbl_anjdrive` SET `eDelete`=2 where user_id='$user_id' and eDelete=1");
        echo 1;
    }

    public function copy_files()
    {
        $dummy_cryptcode = $this->input->post('del_id');
        $display_files = get_anjdrive_datacopy($dummy_cryptcode);
        $created_time = time();
        $dummycryptcode = anj_crypt($created_time,'e');
        //echo print_r($display_files);exit;
        foreach ($display_files as $key => $data) {
            $drive_data = array(
            'user_id'=>$data['user_id'],
            'file'=> $data['file'],
            'folder'=>$data['folder'],
            'created_date'=>date_from_today(),
            'dummy_cryptcode'=>$dummycryptcode,
            'created_time'=>$created_time,
            'file_ext'=>$data['file_ext'],
            'file_type'=>$data['file_type'],
            'file_path'=>$data['file_path'],
            'full_path'=>$data['full_path'],
            'file_size'=>$data['file_size'],
            'is_image'=>$data['is_image'],
            'image_width'=>$data['image_width'],
            'image_height'=>$data['image_height'],
            'image_type'=>$data['image_type'],
            'image_size_str'=>$data['image_size_str'],
            'orig_name'=>$data['orig_name'],
            'file_folder'=>$data['file_folder'],
            );
            insert_data_last_id('tbl_anjdrive',$drive_data);
        }
        echo 1;
    }

    public function trash()
    {
        $trashview['trash_view'] = all_file_type_anjdrive_div('1');
        $this->load->view('anj_drive/header',$trashview);
        $this->load->view('anj_drive/trash',$trashview);
        $this->load->view('anj_drive/driveModal',$trashview);
    }

    public function get_value_anjdrive1()
    {
        $dummy_cryptcode = $this->input->post('dummy_cryptcode');
    $query=$this->db->query("SELECT * FROM `tbl_anjdrive` WHERE dummy_cryptcode='$dummy_cryptcode'");
        $result_array = $query->result_array();
        echo json_encode($result_array);
    }

    public function get_value_anjdrive()
    {
        $dummy_cryptcode = $this->input->post('dummy_cryptcode');
        $display_files = get_anjdrive_data($dummy_cryptcode);
        
    $html = '';
$query=$this->db->query("SELECT * FROM `tbl_anjdrive` WHERE dummy_cryptcode='$dummy_cryptcode'");
$result_array = $query->result_array();
    $i=1;
    foreach ($result_array as $key => $value) {
        $date = date('M d,Y H:i:s A',strtotime($value['created_date']));
        $size = $value['file_size'].' kb';
        $file_type = $value['file_type'];

        if($value['file_folder']=='1'){
          $showfilename = $value['file'];
          $img = base_url('drive_assets/archive.png');

        } else if($value['file_folder']=='2'){
          $showfilename = $value['file'];
          $showfilename = ucwords(str_replace("-"," ",$showfilename));
          $img = anjdrive_imageget(getProfileName('username'),$value['file'],$value['file_folder'],$value['folder']);
        }

        if($i==1){
            $html .= '<div class="row" id="fileViewFolderName">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="folderHeading">'.ucwords(str_replace("-"," ",$value['folder'])).'</div>
            </div>
            </div>
            <div class="row" id="fileViewItemSlider">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" ><div class="owl-carousel owl-theme" >';
        }

        $html .='<div class="item">
                <div class="fileViewItem">
                    <div class="fileViewItemImg">
                        <img src="'.$img.'" class="img-fluid" alt="">
                        <div class="fileViewItemName">
                            <a href="'.$img.'" download="'.$value['file'].'">'.$showfilename.'</a>
                        </div>
                    </div>
                    <div class="fileViewItemDesc">
                        <div class="itemDescDate">
                            <span class="f-name">Date</span>
                            <span class="d-view">'.$date.'</span>
                        </div>
                        <div class="itemSize">
                            <span class="f-name">Size</span>
                            <span class="s-view">'.$size.'</span>
                        </div>
                        <div class="itemType">
                            <span class="f-name">File Type</span>
                            <span class="t-view">'.$file_type.'</span>
                        </div>
                    </div>
                </div>
            </div>';
   $i++; }
        $html .='</div>
            </div>
        </div>';
        echo $html;
    }

    public function filerequestlist()
    {
        $this->load->view('anj_drive/header');
        $this->load->view('anj_drive/filerequestlist');
    }
    
    public function insert_filerequest()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $user_id = getProfileName('user_id');
        insert_data_last_id('tbl_file_request', array('user_id'=>$user_id,'title'=>$title,'description'=>$description,'created_date' => date_from_today()));
        redirect('anj_drive');
    }


}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adddb extends MY_Controller {
        
    public function __construct(){
        parent::__construct();
    }    
    
    public function get_month_year()
    {
        $month_year=$this->input->post('month_year');
        $query=$this->db->get_where('tbl_price', array('month_year'=>$month_year));
        echo json_encode($query->row_array()); 
    }

    public function packageUpdate_custom()
    {
        $updatedata = array('total_user_support'=>$this->input->post('total_user_support'));
        $multi_where = array('month_year'=>'custom');
        edit_update_multi_where('tbl_price',$updatedata, $multi_where); 
        $this->session->set_flashdata('success', 'Custom Plan Update Successfully');
        redirect('dashboard/packageview');
    }

    public function packageUpdate_free()
    {
        $total_user_support=$this->input->post('total_user_support'); 
        $max_file_size_upload=$this->input->post('max_file_size_upload');
        $file_sharing_storage=$this->input->post('file_sharing_storage');
        $updatedata = array('file_sharing_storage'=>$file_sharing_storage,'max_file_size_upload'=>$max_file_size_upload,'total_user_support'=>$total_user_support);
        $multi_where = array('month_year'=>'free');
        edit_update_multi_where('tbl_price',$updatedata, $multi_where); 
        
        $this->db->query("ALTER TABLE `tbl_users` CHANGE `max_file_size_upload` `max_file_size_upload` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '$max_file_size_upload' COMMENT 'store in MB';");
        $this->db->query("ALTER TABLE `tbl_users` CHANGE `file_sharing_storage` `file_sharing_storage` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '$file_sharing_storage';");

        $this->session->set_flashdata('success', 'Basic Plan Update Successfully');
        redirect('dashboard/packageview');
    }

    public function packageUpdate()
    {
        $total_user_support=$this->input->post('total_user_support'); 
        $updatedata = array('file_sharing_storage'=>$this->input->post('file_sharing_storage'),'max_file_size_upload'=>$this->input->post('max_file_size_upload'),'price'=>$this->input->post('price'),'price_hide'=>password_hash($this->input->post('price'), PASSWORD_BCRYPT));
        
        $multi_where = array('month_year'=>$this->input->post('month_year'));
        edit_update_multi_where('tbl_price',$updatedata, $multi_where); 

        $this->db->query("UPDATE `tbl_price` SET `total_user_support`='$total_user_support'");
        $this->session->set_flashdata('success', 'Successfully Update');
        redirect('dashboard/packageview');
    }

    public function add_usertype(){
        $view_data['title'] = 'user type';
        $this->load->view('header', $view_data);
        if($this->input->post('submit')){
            $this->form_validation->set_rules('user_type', 'user type', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_usertype',$dataView);
            } else {
                $data = array(
                    'user_type' => $this->input->post('user_type'),
                    'created_date' => date_from_today()
                );
                $user_type_id = $this->input->post('user_type_id');
                if($user_type_id){
                    $result = edit_update('tbl_user_type',$data,'user_type_id',$user_type_id);
                } else {
                    $result = insert_data_last_id('tbl_user_type',$data);
                }
                $this->session->set_flashdata('success', 'user type add');
            }
            $this->session->set_flashdata('error', 'user type not add!');
            redirect('dashboard/usertype');
        } else {
            $this->load->view('add_usertype');
            $this->load->view('footer');
        }
    }

    public function add_blog(){
        $view_data['title'] = 'user type';
        $this->load->view('header', $view_data);
        if($this->input->post('submit')){
            $this->form_validation->set_rules('title', 'blog title', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_blog',$dataView);
            } else {
                if($_FILES['blog_image']['name']){
                    $dataaa = fileUploadd('blog_image');
                    $blog_image = $dataaa['file_name'];
                } else {
                    $blog_image = $this->input->post('blog_imageOLD');
                }
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'tags' => $this->input->post('tags'),
                    'categories' => $this->input->post('categories'),
                    'blog_image'=>$blog_image,
                    'created_date' => date_from_today()
                );
                $blog_id = $this->input->post('blog_id');
                if($blog_id){
                    $result = edit_update('tbl_blog',$data,'blog_id',$blog_id);
                } else {
                    $result = insert_data_last_id('tbl_blog',$data);
                }
                $this->session->set_flashdata('success', 'blog add');
            }
            $this->session->set_flashdata('error', 'blog not add!');
            redirect('dashboard/bloglists');
        } else {
            $this->load->view('add_blog');
            $this->load->view('footer');
        }
    }

    public function add_user(){
        $view_data['title'] = 'user';
        $this->load->view('header', $view_data);
        if($this->input->post('submit')){
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_user',$dataView);
            } else {
                if($_FILES['picture']['name']){
                    $dataaa = fileUploadd('picture');
                    $picture = $dataaa['file_name'];
                } else {
                    $picture = $this->input->post('pictureOLD');
                }
                $picture_url='https://www.anjpms.com/uploads/'.$picture;
                if($this->input->post('password')){
                    $password=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                } else {
                    $password=$this->input->post('passwordOLD');
                }
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $data = array(
                    'username' => $username,
                    'mobile_no' => $this->input->post('mobile_no'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'designation' => $this->input->post('designation'),
                    'user_type' => $this->input->post('user_type'),
                    'slug_username' => slugify($username),
                    'code' => $this->input->post('code'),
                    'email' => $email,
                    'password' => $password,
                    'token' => md5(rand(0,1000)),     
                    'last_ip' => $this->input->ip_address(),
                    'picture'=>$picture,
                    'picture_url'=>$picture_url,
                    'created_at' => date_from_today()
                );
                $user_id = $this->input->post('user_id');
                if($user_id){
                    $result = edit_update('tbl_users',$data,'user_id',$user_id);
                } else {
                    $result = insert_data_last_id('tbl_users',$data);
                }
                $this->session->set_flashdata('success', 'user add');
            }
            $this->session->set_flashdata('error', 'user not add!');
            redirect('dashboard/userlist');
        } else {
            $this->load->view('add_user');
            $this->load->view('footer');
        }
    }

    public function add_role(){
        $this->load->view('header');
        if($this->input->post('submit')){
            $this->form_validation->set_rules('user_type', 'user type', 'trim|required');
            $this->form_validation->set_rules('designation', 'designation', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_role',$dataView);
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
            redirect('dashboard/rolename');
        } else {
            $this->load->view('add_role');
            $this->load->view('footer');
        }
    }

    public function add_project(){
        $this->load->view('header');
        if($this->input->post('submit')){
            $this->form_validation->set_rules('project_name', 'project name', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_project',$dataView);
            } else {
                $project_documentation = 0;
                $combo_id = time();
                $projassing= $this->input->post('user_id');
                $data = array(
                    'project_name' => $this->input->post('project_name'),
                    'project_slug' => slugify($this->input->post('project_name')),
                    'project_description' => $this->input->post('project_description'),
                    'start_date' =>  $this->input->post('start_date'),
                    'deadline' =>  $this->input->post('deadline'),
                    'category' =>  ucfirst($this->input->post('category')),
                    'client_id' =>  $this->input->post('client_id'),
                    'created_date' => date_from_today(),
                    'user_id' => $projassing,
                    'combo_id'=> $combo_id,
                    'project_documentation' =>$project_documentation
                );
                $project_id = $this->input->post('edit_project_id');
                if($project_id){
                    //$result = edit_update('tbl_project',$data,'project_id',$project_id);
                    $this->editProjects($_POST);
                } else {
                    $result = insert_data_last_id('tbl_project',$data);
                    $project_id_new = anj_encode($result);
                    $projectID = anj_encode($result);
                    $projectNAME = slugify($this->input->post('project_name'));
                    $projectASSIGN = slugify(getProfileName('username'));
                    $projectMain_user_id = anj_encode($projassing);
                    for($i=1;$i<=3;$i++){
                      $lastidlabel = defult_label_add($combo_id,$result,$i,$projassing);
                      if($i==1){
                        defult_task_add($combo_id,$result,$lastidlabel,$projassing);
                      }
                    }
                }
                $projectCombo_id = $combo_id;
                $url = $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
                $project_link = 'https://www.anjpms.com/Invite/anj/'.$url;
                $tbl_notifications_data = array('main_user_id'=>$projassing,'user_id'=>$projassing,'title'=>$this->input->post('project_name'),'url'=>$project_link,'notifications_name'=>$this->input->post('project_name'),'created_date'=>date_from_today());
                notification_insertDB($tbl_notifications_data);
                $this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$result."'");
                $this->session->set_flashdata('success', 'project add');
            }
            $this->session->set_flashdata('error', 'project not add!');
            redirect('dashboard/projectlist');
        } else {
            $this->load->view('add_project');
            $this->load->view('footer');
        }
    }

    public function editProjects($data){

      $project_id = $data['edit_project_id'];
      $project_name = $data['project_name'];
      $project_documentation = 0;
      $edit_data = array('project_name'=>$project_name,
                         'client_id'=>$data['client_id'],
                         'start_date'=>$data['start_date'],
                         'deadline'=>$data['deadline'],
                         'category' => ucfirst($this->input->post('category')),
                         'project_description'=>$data['project_description']);
      edit_update('tbl_project',$edit_data,'project_id',$project_id);
      $project_id_new = anj_encode($project_id);
      $projectID = anj_encode($project_id);
      $projectNAME = slugify($project_name);
      $projectASSIGN = slugify(getProfileName('username'));
      $projectMain_user_id = anj_encode(getProfileName('user_id'));
      $projectCombo_id = $this->input->post('editprojectCombo_id');
      $url = '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
        $project_link = 'https://www.anjpms.com/Invite/anj'.$url;
        $tbl_notifications_data = array('main_user_id'=>getProfileName('user_id'),'user_id'=>getProfileName('user_id'),'title'=>$project_name,'url'=>$project_link,'notifications_name'=>$project_name);

        $this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");
      notification_insertDB($tbl_notifications_data);
      insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'edit project','activity'=>'project edit','updated_date'=>date_from_today()));
      $this->session->set_flashdata('success', 'Project Edit successful!');
      redirect('dashboard/projectlist');
    }
    
    public function add_task(){
        $this->load->view('header');
        if($this->input->post('submit')){
            $this->form_validation->set_rules('title', 'task title', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $dataView['error'] = validation_errors();
                $this->load->view('add_task',$dataView);
            } else {
                if($this->input->post('assigned_to'))
                {
                    $edit_task_assigned_to=implode(',',$this->input->post('assigned_to'));
                } else {
                    $edit_task_assigned_to=$this->input->post('projectuser_id');
                }
                $data = array(
                    'project_id'=>$this->input->post('project_id'),
                    'title'=>$this->input->post('title'),
                    'description'=>$this->input->post('description'),
                    'user_id'=>$this->input->post('projectuser_id'),
                    'combo_id'=>$this->input->post('combo_id'),
                    'assigned_to'=>$edit_task_assigned_to,
                    'due_date'=>date("Y-m-d",strtotime($this->input->post('due_date'))),
                    'priority'=>isset($_POST['priority'])?$_POST['priority']:1,
                    'status_id'=>$this->input->post('status_id'),
                    'created_at'=>date_from_today()
                );
                $task_id = $this->input->post('task_id');
                if($task_id){
                    $result = edit_update('tbl_task',$data,'id',$task_id);
                } else {
                    $result = insert_data_last_id('tbl_task',$data);
                }
                $this->session->set_flashdata('success', 'Task name add');
            }
            $this->session->set_flashdata('error', 'Task name not add!');
            redirect('dashboard/tasklist');

        } else {
            $this->load->view('add_task');
            $this->load->view('footer');
        }
    }

    public function add_permission(){
        $this->load->view('header');
        if($this->input->post('submit')){
                $permission_id = $this->input->post('permission_id');
                if($permission_id){
                    $result = $this->edit_Permission('tbl_rolename',$data,'permission_id',$permission_id);
                } else {
                    $result = $this->insert_Permission();
                }
                $this->session->set_flashdata('success', 'Role permission add');
            $this->session->set_flashdata('error', 'Role permission not add!');
            redirect('dashboard/rolepermissionlist');
        } else {
            $this->load->view('add_permission');
            $this->load->view('footer');
        }
    }

    public function isEmailExist($email) {
        $is_exist = check_user_mail($email);
        if ($is_exist) {
            $this->form_validation->set_message('isEmailExist', 'Email address is already exist.');    
            return false;
        } else {
            return true;
        }
    }

    public function edit_Permission()
    {
        $email = $this->input->post('account_email');
            
            $data_permission['email'] = $email;
            $dataPermission['role_name'] = $this->input->post('role_name');
            if ($this->input->post('add_team'))  {
                $dataPermission['add_team'] = $this->input->post('add_team');
            } else {
                $dataPermission['add_team'] = 'no';
            }
            if ($this->input->post('account_merge'))  {
                $dataPermission['account_merge'] = $this->input->post('account_merge');
            } else {
                $dataPermission['account_merge'] = 'no';
            }
            if ($this->input->post('file_storage'))  {
                $dataPermission['file_storage'] = $this->input->post('file_storage');
            } else {
                $dataPermission['file_storage'] = 'no';
            }
            if ($this->input->post('github'))  {
                $dataPermission['github'] = $this->input->post('github');
            } else {
                $dataPermission['github'] = 'no';
            }
            if ($this->input->post('chat'))  {
                $dataPermission['chat'] = $this->input->post('chat');
            } else {
                $dataPermission['chat'] = 'no';
            }
            
        if($this->input->post('project_crud')){
            $dataPermission['project_crud'] = implode(',', $this->input->post('project_crud'));
        }
        if($this->input->post('label_crud')){
            $dataPermission['label_crud'] = implode(',', $this->input->post('label_crud'));
        }
        if($this->input->post('task_crud')){
            $dataPermission['task_crud'] = implode(',', $this->input->post('task_crud'));
        }
        $dataPermission['updated_date'] = date_from_today();
        $multi_where = array('permission_id'=>$this->input->post('permission_id'));
        edit_update_multi_where('tbl_permission',$dataPermission,$multi_where);
        $this->session->set_flashdata('success', 'Role Updated');
        redirect('dashboard/rolepermissionlist');
    }

    public function insert_Permission()
     {
        $email = $this->input->post('account_email');
        //$this->form_validation->set_rules('account_email', 'Enter Email ID', 'trim|required|valid_email|callback_isEmailExist');
        $this->form_validation->set_rules('role_name', 'Select Designation', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Email address is already exist.');
            redirect('adddb/add_permission/'.$this->input->post('project_id'));
        } else {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data_permission['email'] = $email;
            $this->session->set_userdata('email_permission', $email);
            $dataPermission['project_id'] = anj_decode($this->input->post('project_id'));
            $dataPermission['role_name'] = $this->input->post('role_name');
            if ($this->input->post('add_team'))  {
                $dataPermission['add_team'] = $this->input->post('add_team');
            } else {
                $dataPermission['add_team'] = 'no';
            }
            if ($this->input->post('account_merge'))  {
                $dataPermission['account_merge'] = $this->input->post('account_merge');
            } else {
                $dataPermission['account_merge'] = 'no';
            }
            if ($this->input->post('file_storage'))  {
                $dataPermission['file_storage'] = $this->input->post('file_storage');
            } else {
                $dataPermission['file_storage'] = 'no';
            }
            if ($this->input->post('github'))  {
                $dataPermission['github'] = $this->input->post('github');
            } else {
                $dataPermission['github'] = 'no';
            }
            if ($this->input->post('chat'))  {
                $dataPermission['chat'] = $this->input->post('chat');
            } else {
                $dataPermission['chat'] = 'no';
            }
            if($this->input->post('project_crud')){
                $dataPermission['project_crud'] = implode(',', $this->input->post('project_crud'));
            }
            if($this->input->post('label_crud')){
                $dataPermission['label_crud'] = implode(',', $this->input->post('label_crud'));
            }
            if($this->input->post('task_crud')){
                $dataPermission['task_crud'] = implode(',', $this->input->post('task_crud'));
            }
            $dataPermission['created_date'] = date_from_today();
            $picture='https://www.anjpms.com/uploads/notDelete.png';
            $parts = explode('@',$email);
            $username = $parts[0];
            $password=password_hash('123456', PASSWORD_BCRYPT);
            $tbl_usersData = array('is_verify'=>1,'user_type'=>$this->input->post('user_type'),'designation'=>$this->input->post('role_name'),'username'=>$username,'slug_username'=>slugify($username),'first_name'=>$username,'last_name'=>$username, 'email' => $email,'first_login' => date_from_today(),'updated_at'=>date_from_today(),'picture_url'=>$picture,'password'=>$password);
            $last_userid=insert_data_last_id('tbl_users', $tbl_usersData);
            $dataPermission['main_user_id'] = getProfileName('user_id');
            $dataPermission['user_to_permission']=$last_userid;
            $dataPermission['time'] = time();
                insert_data_last_id('tbl_permission', $dataPermission);
                $this->session->set_flashdata('success', 'The Credentials are sent to your registered email address.');
                redirect('dashboard/rolepermissionlist');
            } else {
                $this->session->set_flashdata('error', 'Invalid Email Address!');
                redirect('dashboard/rolepermissionlist');
            }
        }
        
     }

}

?>  
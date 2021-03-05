<?php
class Projects extends MY_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function editProjects($data){

      $project_id = $data['edit_project_id'];
      $project_name = $data['project_name'];

      /*if($_FILES['project_documentation']['name']){
          $dataaa = fileUploadd('project_documentation');
          $project_documentation = $dataaa['file_name'];
      } else {
          $project_documentation = $this->input->post('project_documentationOLD');
      }*/
      $project_documentation = 0;
      $edit_data = array('project_name'=>$project_name,
                          'client_id'=>$data['client_id'],
                          'start_date'=>$data['start_date'],
                          'deadline'=>$data['deadline'],
                          'category' => ucfirst($this->input->post('category')),
                          'project_priority' =>  $this->input->post('project_priority'),
                          'billing_type_id' =>  $this->input->post('billing_type_id'),
                          'estimated_hours' =>  $this->input->post('estimated_hours'),
                          'project_phase' =>  $this->input->post('project_phase'),
                          'project_demo_url' =>  $this->input->post('project_demo_url'),
                          'updated_date'=>date_from_today(),
                          'project_description'=>$data['project_description']);
      edit_update('tbl_project',$edit_data,'project_id',$project_id);

//echo $this->db->last_query();exit;
      $project_id_new = anj_encode($project_id);
      $projectID = anj_encode($project_id);
      $projectNAME = slugify($project_name);
      $projectASSIGN = slugify(getProfileName('username'));
      $projectMain_user_id = anj_encode(getProfileName('user_id'));

      $projectCombo_id = $this->input->post('editprojectCombo_id');
      $url = '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
$project_link = base_url().'Invite/anj'.$url;

$tbl_notifications_data = array('main_user_id'=>getProfileName('user_id'),'user_id'=>getProfileName('user_id'),'title'=>$project_name,'url'=>$project_link,'notifications_name'=>$project_name,'updated_date'=>date_from_today());

$this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$project_id."'");

      notification_insertDB($tbl_notifications_data);
      $msgg = getProfileName('user_id').' edit project ('.$project_name.' )';
      send_message_notification($msgg);
      $activity = $msgg;
      insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'edit project','activity'=>$activity,'updated_date'=>date_from_today()));
      redirect($this->input->post('website_addProject').$url);
    }

    public function addProjects(){

            /*$this->form_validation->set_rules('project_name', 'Project title', 'trim|required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
            $this->form_validation->set_rules('deadline', 'Deadline Date', 'trim|required');
            $this->form_validation->set_rules('client_id', 'Client Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $dataView['error'] = validation_errors();

            $this->load->view('dashboard',$dataView);
        } else {*/
            $combo_id = time();
            /*if($_FILES['project_documentation']['name']){
                $dataaa = fileUploadd('project_documentation');
                $project_documentation = $dataaa['file_name'];
            } else {
                $project_documentation = $this->input->post('project_documentationOLD');
            }*/
            $project_documentation = 0;
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'project_slug' => slugify($this->input->post('project_name')),
                'project_description' => $this->input->post('project_description'),
                'start_date' =>  $this->input->post('start_date'),
                'deadline' =>  $this->input->post('deadline'),
                'category' =>  ucfirst($this->input->post('category')),
                'client_id' =>  $this->input->post('client_id'),
                'created_date' => date_from_today(),
                'user_id' => $this->input->post('pms_user_id'),
                'combo_id'=> $combo_id,
                'project_documentation' =>$project_documentation,
                'project_priority' =>  $this->input->post('project_priority'),
                'billing_type_id' =>  $this->input->post('billing_type_id'),
                'estimated_hours' =>  $this->input->post('estimated_hours'),
                'project_phase' =>  $this->input->post('project_phase'),
                'project_demo_url' =>  $this->input->post('project_demo_url')
            );
            $project_id = $this->input->post('edit_project_id');
            if($project_id){
                $this->editProjects($_POST);
            } else {
                $result = insert_data_last_id('tbl_project',$data);
                $project_id_new = anj_encode($result);
                $projectID = anj_encode($result);
                $projectNAME = slugify($this->input->post('project_name'));
                $projectASSIGN = slugify(getProfileName('username'));
                $projectMain_user_id = anj_encode(getProfileName('user_id'));

                for($i=1;$i<=3;$i++){
                  $lastidlabel = defult_label_add($combo_id,$result,$i);
                  if($i==1){
                    defult_task_add($combo_id,$result,$lastidlabel);
                  }
                }

            }
            $this->session->set_userdata('checkbox_session_store', 'running');
            $this->session->set_userdata('runningProjectList', $result);
            $this->session->set_userdata('projectCombo_id', $combo_id);
        //}
            $projectCombo_id = $combo_id;
            $url = $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
            $project_link = base_url().'Invite/anj/'.$url;
            $tbl_notifications_data = array('main_user_id'=>getProfileName('user_id'),'user_id'=>getProfileName('user_id'),'title'=>$this->input->post('project_name'),'url'=>$project_link,'notifications_name'=>$this->input->post('project_name'),'created_date'=>date_from_today());
            notification_insertDB($tbl_notifications_data);
            $this->db->query("UPDATE tbl_project SET project_link='".$project_link."' WHERE project_id='".$result."'");
		        $msgg = getProfileName('username').' create new project ('.$this->input->post('project_name').' ) and start Date :'.$this->input->post('start_date').' End Date: '.$this->input->post('deadline');
            $manishno = send_message_notification($msgg);
            $activity = $msgg;
            insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'add project','activity'=>$activity,'created_date'=>date_from_today()));
            redirect($this->input->post('website_addProject').'/'.$url);
    }

}
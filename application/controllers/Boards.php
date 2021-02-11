<?php 
class Boards extends MY_Controller
{
	public $tbl_status = "tbl_status";
	public $tbl_task = "tbl_task";

	public function __construct()
	{
	   parent::__construct();
	}

    public function copyStatus(){
		$status_id = $this->input->post('status_id');
		$project_id = $this->input->post('project_id');
		$result1 = get_by_id($this->tbl_status, '*', 'id', $status_id);
		//echo $this->db->last_query();
		$data = array('user_id'=>getProfileName('user_id'),'project_id'=>$project_id,'status_name'=>$result1['status_name'],'orderBY'=>$result1['orderBY'],'combo_id'=>$result1['combo_id']);
		$lastid = insert_data_last_id($this->tbl_status,$data);
		$resultmanish = get_by_all($this->tbl_task, '*', 'status_id', $status_id);
		foreach ($resultmanish as $key => $result) {
			$data = array('user_id'=>getProfileName('user_id'),'title'=>$result['title'],'description'=>$result['description'],'project_id'=>$result['project_id'],'status_id'=>$lastid,'position_id'=>$result['position_id'],'created_at'=>date_from_today(),'combo_id'=>$result['combo_id'],'priority'=>$result['priority'],'due_date'=>$result['due_date'],'task_file'=>$result['task_file']);
			insert_data($this->tbl_task,$data);
		}

		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$status_id,'activity_2'=>'copy label','created_date'=>date_from_today()));
		//echo $this->db->last_query();
		echo '1';
	}

	public function copyTask(){
		$task_id = $this->input->post('status_id');
		$result = get_by_id($this->tbl_task, '*', 'id', $task_id);
		$user_id = getProfileName('user_id');
		$data = array('user_id'=>$user_id,'title'=>$result['title'],'description'=>$result['description'],'project_id'=>$result['project_id'],'status_id'=>$result['status_id'],'position_id'=>$result['position_id'],'created_at'=>date_from_today(),'combo_id'=>$result['combo_id'],'assigned_to'=>$result['assigned_to'],'due_date'=>$result['due_date'],'task_file'=>$result['task_file'],'priority'=>$result['priority']);
		insert_data($this->tbl_task,$data);

		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$task_id,'activity_2'=>'copy task','created_date'=>date_from_today()));
	}

	public function moveStatus(){
		$status_id = $this->input->post('status_id');
		$orderBY = $this->input->post('orderBY');
		$orderBY = $orderBY+1;
		$data = array('orderBY'=>$orderBY);
		edit_update($this->tbl_status, $data, 'id', $status_id);
		//echo $this->db->last_query();
	}

	public function moveTask(){
		$status_id = $this->input->post('status_id');
		$task_id = $this->input->post('task_id');
		$data = array('status_id'=>$status_id);
		edit_update($this->tbl_task, $data, 'id', $task_id);
	}

	public function addTask(){
		$data = array('assigned_to'=>getProfileName('user_id'),'user_id'=>getProfileName('user_id'),'title'=>$this->input->post('title'),'status_id'=>$this->input->post('status_id'),'project_id'=>$this->input->post('project_id'),'combo_id'=>$this->input->post('projectCombo_id'),'due_date'=>date_from_today(),'created_at'=>date_from_today(),'start_date'=>date_from_today());
		$task_id = insert_data_last_id($this->tbl_task, $data);
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$this->input->post('title'),'activity_2'=>'Add task','created_date'=>date_from_today()));
	}

	public function addStatus(){
		$status_name = $this->input->post('status_name');
		$orderBY = get_by_id_Order($this->tbl_status,'orderBY');
		$user_id = getProfileName('user_id');
		$orderBY = $orderBY+1;
		$data = array('combo_id'=>$this->input->post('projectCombo_id'),'project_id'=>$this->input->post('project_id'),'user_id'=>getProfileName('user_id'),'status_name'=>$status_name);
		$last_status_id = insert_data_last_id($this->tbl_status, $data);
		$main_user_id = anj_decode($this->input->post('projectMain_user_id'));
		$projectID = anj_decode($this->input->post('projectID'));
		$use = get_by_role_assion('tbl_roles', $main_user_id, $projectID, 'status_id');
		
		$multi_where = array('main_user_id' =>$main_user_id,'project_id'=>$projectID,'combo_id'=>$this->input->post('projectCombo_id'));
		$data1 = array('status_id' => $use.','.$last_status_id);
		edit_update_multi_where('tbl_roles',$data1,$multi_where);
		
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$last_status_id,'activity_2'=>'Add label','created_date'=>date_from_today()));

		//echo $this->db->last_query();exit;
		echo 1;
	}

	public function renameStatus(){
		$status_id = $this->input->post('status_id');
		$status_name = $this->input->post('status_name');
		$data = array('status_name'=>$status_name);
		edit_update($this->tbl_status, $data, 'id', $status_id);
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$status_name,'activity_2'=>'rename label','created_date'=>date_from_today()));
	}

	public function renameTask(){
		$title = $this->input->post('status_name');
		$task_id = $this->input->post('status_id');
		$data = array('title'=>$title);
		edit_update($this->tbl_task, $data, 'id', $task_id);
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$title,'activity_2'=>'rename task','created_date'=>date_from_today()));
		echo 1;
	}

	public function deleteStatus(){
		$status_id = $this->input->post('status_id');
		$tablename = $this->input->post('tablename');
		$data = array('eDelete'=>1);
		edit_update($this->tbl_status, $data, 'id', $status_id);
		edit_update($this->tbl_task, $data, 'status_id', $status_id);
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$status_id,'activity_2'=>'delete label','created_date'=>date_from_today()));
		echo 1;
	}

	public function deleteTask(){
		$task_id = $this->input->post('status_id');
		$data = array('eDelete'=>1);
		edit_update($this->tbl_task, $data, 'id', $task_id);
		insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity'=>$task_id,'activity_2'=>'delete task','created_date'=>date_from_today()));
		echo 1;
	}

 
}
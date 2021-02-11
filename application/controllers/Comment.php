<?php
class Comment extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->library('mailer');
    }

    public function comment_add()
    {
    	$project_id = anj_decode($this->input->post('projectID'));
    	$task_id = $this->input->post('edit_task_id');
    	$comment = $this->input->post('comment');
    	$comment_data = array('project_id'=>$project_id,'user_id'=>getProfileName('user_id'),'task_id'=>$task_id,'comment'=>$comment,'created_date'=>date_from_today());
    	insert_data_last_id('tbl_comment', $comment_data);

        insert_data_last_id('tbl_my_activity',array('user_id'=>getProfileName('user_id'),'activity_type'=>'add comment','activity'=>$this->input->post('comment'),'activity_2'=>$project_id,'created_date'=>date_from_today()));
    }

    public function comment_list()
    {
    	$task_id = $this->input->post('task_id');
    	$sql = $this->db->query("SELECT * FROM tbl_comment where task_id=$task_id ORDER BY comment_id DESC");
    	$result_array_serach = $sql->result_array();
    	$record_set = '';
    	foreach ($result_array_serach as $key => $val) {
            $user_id = $val['user_id'];
            $sql1 = $this->db->query("SELECT username FROM tbl_users where user_id=$user_id");
            $result_array1 = $sql1->row_array();
            $imaname = get_user_img($val['user_id']);
    		$record_set .= '<div class="timeline-item green">
                            <span class="date">'.date('g:i a',strtotime($val['created_date'])).'</span>
                            <h6>'.$val['comment'].'</h6>
                            <span>Project Lead: <a href="javascript:void(0);" title="Fidel Tonn">'.$result_array1['username'].'</a></span>
                         </div>
            ';
    	}
    	echo $record_set;
    }

}
<?php
class Ajax extends MY_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('dashboard_model','ajax_model'));
	}

    public function user_auth()
    {
        if(isset($_SESSION['last_active_time']))
        {
            if((time() - $this->session->userdata('last_active_time'))>10000)
            {
                    echo "logout";
            }
        } else{
            $this->session->set_userdata('last_active_time',time());
        }  
    }

    public function like_unlike()
    {
        $ip_address =$this->input->ip_address();
        $blog_id=$this->input->post('blog_id');
        //$this->db->query("INSERT INTO `like_unlike`(`blog_id`, `ip_address`) VALUES ('$blog_id','$ip_address')");
        //$this->db->query("UPDATE `tbl_blog` SET `like_blog`=like_blog+1 WHERE blog_id=$blog_id");     
        echo $blog_id;  
    }

    public function ajax_tasklists()
    {
        $this->ajax_tasklists_show();
    }

    public function ajax_all_project()
    {
        if($this->session->userdata('checkbox_session_store')=='running') {
            $status = '0';
        } else if($this->session->userdata('checkbox_session_store')=='hold') {
            $status = '3';
        } else if($this->session->userdata('checkbox_session_store')=='completed') {
            $status = '2';
        } else if($this->session->userdata('checkbox_session_store')=='canceled') {
            $status = '4';
        } else {
            $status = '0';
        }

        $html = '
    <div class="container-fluid">
        <div class="row">';

$running = getDropDownList_project_id($status);

$get_group_concat_project_id = get_group_concat_project_id('project_id');
$queryrunning = $this->db->query("SELECT * FROM `tbl_project` WHERE project_id IN ($get_group_concat_project_id) and eDelete=0 and status=$status ORDER BY `tbl_project`.`project_id` DESC");
$running = $queryrunning->result_array();
    //echo print_r($get_group_concat_project_id);exit;

        if($running) { 
        foreach ($running as $key => $value) {
$project_id = $value['project_id'];
$combo_id = $value['combo_id'];
$project_name = $value['project_name'];
$user_id = $value['user_id'];

$query_status = $this->db->query("select count(id) as status_id from tbl_status where project_id=$project_id and combo_id=$combo_id and eDelete=0");
$status_total = $query_status->row_array();
$query_task = $this->db->query("select count(id) as task_id from tbl_task where project_id=$project_id and combo_id=$combo_id and eDelete=0");
$task_total = $query_task->row_array();
$query_task = $this->db->query("select count(task_id) as comments from tbl_comment where project_id=$project_id");
$task_total_comments = $query_task->row_array();

$username1 = get_by_id('tbl_users','username','user_id',$user_id);

$projectID = anj_encode($project_id);
$projectNAME = slugify($project_name);
$projectASSIGN = slugify($username1['username']);
$projectMain_user_id = anj_encode($user_id);

$start_date = $value['start_date'];
$deadline = $value['deadline'];
$seconds = strtotime($deadline) - strtotime($start_date);
$hours = $seconds / 60 /  60;
$hours = round($hours,2) . " hour(s)";

$url = '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$combo_id;

            $html .='
            <div class="project-block col-lg-3 col-md-3 col-sm-6 col-12 p-2">
                <div class="inner-box">
                    <div class="project_name">
                    <h4><a data-toggle="tooltip" data-placement="top" title="'.$project_name.'" href="'.base_url('dashboard'.$url).'">'.$project_name.'</a></h4>
                    </div>
                    <div class="project_client_name">
                        <h4><b>Client</b> : '.$value['client_id'].'</h4>
                        <h4><b>Category</b> : '.$value['category'].'</h4>
                    </div>
                    <div class="project_date">
                        <ul>
                            <li><b>End Date</b> : '.show_date_time($deadline).'</li>
                        </ul>
                    </div>
                <div class="project_label_task_comments_block">
                    <ul>
                        <li class="project_label_box"><b>Labels</b> : <span class="value_label">'.$status_total['status_id'].'</span></li>
                        <li class="project_task_box"><b>Tasks</b> : <span class="value_label">'.$task_total['task_id'].'</span></li>
                        <li class="project_comment_box"><b>Comments</b> : <span class="value_label">'.$task_total_comments['comments'].'</span></li>
                    </ul>
                </div>
                </div>
            </div>';
        }
        $html .='</div>
    </div>';

      } else { $html = ''; }
        echo $html;
    }

	public function ajax_tasklists_show()
	{
        $status_check = $this->input->post('status');
        $projectMain_user_id = $this->input->post('projectMain_user_id');
        $user_type = getProfileName('user_type');
        $maniuser_id = getProfileName('user_id');
        $project_id_new = $this->input->post('project_id_new');
        $projectMain_user_id = anj_decode($projectMain_user_id);
        if($project_id_new==''){
            echo '1';exit;
        }
        
        $task_crudparts = explode(',', trim(get_role_permission('task_crud',$project_id_new)));
        $label_crudparts = explode(',', trim(get_role_permission('label_crud',$project_id_new)));

		$statusResult = $this->dashboard_model->getTasklist_all($project_id_new,$projectMain_user_id);
        
        
        $checkproid=get_by_id('tbl_project','project_id','project_id',$project_id_new);
        
        if(!$checkproid['project_id']){
            echo '<h1>Not Found Project, Tasks. Please add New Project After use</h1>';
            redirect('404_override');
            exit;
        }

		$html = '';
		$i=1;
//echo print_r($statusResult);
		foreach ($statusResult as $statusRow) {

$mandone = $statusRow['status_name'];
$status_idstatusid=$statusRow['id'];

$manishdisable='';
if($mandone=='done' || $mandone=='DONE'){
    $query_label_done = $this->db->query("UPDATE `tbl_task` SET task_status='2' WHERE project_id=$project_id_new and user_id=$maniuser_id and status_id=$status_idstatusid");
   // echo $this->db->last_query();exit;
    $manishdisable = 'pointer-events: none;opacity: 0.4;';
} else {
    $query_label_done = $this->db->query("UPDATE `tbl_task` SET task_status='0' WHERE project_id=$project_id_new and user_id=$maniuser_id and status_id=$status_idstatusid");
   // echo $this->db->last_query();exit;
    $manishdisable = 'pointer-events: none;opacity: 0.4;';   
}



            if(accessOnlyMembers($project_id_new)==1){
		      $taskResult = $this->dashboard_model->getProjectTaskByStatus($statusRow["id"], $statusRow['project_id']);
            } else {
                $taskResult = $this->dashboard_model->getProjectTaskByassgin($statusRow["id"], $statusRow['project_id'],$projectMain_user_id);
            }
	?>
<script type="text/javascript">
	$(document).ready(function(){
     var url = '<?php echo base_url('ajax_task/editTaskStatus'); ?>';
     var url1 = '<?php echo base_url('ajax_task/editTaskStatus1'); ?>';
     
     $( ".weblog-section" ).sortable({
        connectWith: ".weblog-section",
        items: "#list-demo > div",
        revert: 0,
        helper: 'clone',
        revertDuration:0,
        helper: function(evt, el){
            console.log(el.clone())
            var $originals = el.parent();
            var $helper = el.clone();
            $helper.parent().each(function(index)
            {
                $(this).width($originals.eq(index).width());
            });
            $helper.css("background-color", "rgb(223, 240, 249)");
            return $helper;
        },
        receive: function (e, ui) {
          var status_id = ui.item.parent('.weblog-section').attr('datastatusid');
          var task_id = $(ui.item).data("task-id");
			if (typeof status_id === "undefined") {
			status_id = ui.item.parent().attr('datamanish');
			} else {
			status_id = status_id;
			}
             $.ajax({ url: url+'?status_id='+status_id+'&task_id='+task_id,
                  success: function(response){
                    project_status_check();
                  }
             });
        },
    });
    
    $( ".weblog-section" ).disableSelection();
    //$('.weblog-section').sortable('refresh');

    $( ".weblog" ).sortable({
        connectWith: ".item-body",
        items: ".weblog-section",
        revert: false,
        start: function (e, ui) {
           console.log('start: '+ui.item.index())
        },
        update: function (e, ui) {
          console.log('update: '+ui.item.index())
          var status_id =  ui.item.next().attr('dataorderBY');
            var status_id = $(ui.item).data("status-id");
            var orderBY = ui.item.index();
            var order = $('.weblog').sortable('serialize'); 
            var result = $(this).sortable('toArray', {attribute: 'dataorderBY'});
            console.log(result)
            var list = new Array();
            $('.weblog').find('.weblog-section').each(function(){
            var id=$(this).attr('datastatusid');    
            list.push(id);
            });
            var data=JSON.stringify(list);
            console.log(data)
            var result = JSON.stringify(result);
            var result = new Array(result);
            $.ajax({ url: url1, type: 'POST',  data: {data:data},datatype: 'json',
                success: function(message) {
                    project_status_check();
                }
            });
        },
        stop: function(e, ui) {
            console.log($.map($(this).find('li'), function(el) {
                return el.id + ' = ' + $(el).index();
            }));
        }
    });
    $( ".weblog" ).disableSelection();
    $('.weblog').sortable('refresh');
});

</script>
<?php
$tbl_status = 'tbl_status';
$html .='<div class="card boardListWrapper weblog-section" id="sort_'.$statusRow["id"].'" data-status-id="'.$statusRow["id"].'" dataorderBY="'.$statusRow["orderBY"].'" datastatusid="'.$statusRow["id"].'" data-statusmain-id="'.$statusRow["id"].'">
        <div class="boardList boardListContent">
            <div class="card-header">
                <h3 class="card-title" contenteditable="true">'.$statusRow["status_name"].'</h3>
                <div class="card-options" style="'.$manishdisable.'">';

$html .='<div class="item-action dropdown ml-2">
<a href="javascript:void(0)" data-toggle="dropdown">
<i class="fas fa-ellipsis-v"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">';

if(in_array('copy', $label_crudparts) == '1' || getProfileName('designation')=='Master') {

    $html .='<a href="javascript:void(0)" tablename="tbl_status" statusRow_id="'.$statusRow["id"].'" onclick="copy_to_status(this);" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>';
}

if(in_array('copy', $label_crudparts) == '1' || getProfileName('designation')=='Master') {
$htmlaas ='<a href="javascript:void(0)" tablename="tbl_status" orderBY="'.$statusRow["orderBY"].'" statusRow_id="'.$statusRow["id"].'" onclick="move_to_status(this);" class="dropdown-item" data-toggle="modal" data-target="#moveCardModal" style="display:none;"><i class="dropdown-icon fa fa-folder"></i> Move to</a>';

}

if(in_array('edit', $label_crudparts) == '1' || getProfileName('designation')=='Master') {
$html .='<a href="javascript:void(0)" tablename="tbl_status" status_name="'.$statusRow["status_name"].'" statusRow_id="'.$statusRow["id"].'" class="dropdown-item" data-toggle="modal" data-target="#anotherListModal" onclick="rename_to_status(this);"><i class="dropdown-icon fa fa-edit"></i> Edit</a>';
}
//if(accessOnlyMembers($project_id_new)==1){
if(in_array('delete', $label_crudparts) == '1' || getProfileName('designation')=='Master') {
    $html .='<a href="javascript:void(0)" tablename="tbl_status" statusRow_id="'.$statusRow["id"].'" class="dropdown-item" data-toggle="modal" data-target="#deleteCardModal" onclick="delete_to_status(this);""><i class="dropdown-icon fa fa-trash" ></i> Delete</a>';
}


$html .='</div></div></div></div>

            <div class="card-body" id="list-demo" datamanish="'.$statusRow["id"].'">';

if (! empty($taskResult)) {
foreach ($taskResult as $taskRow) { 

    if($taskRow["task_status"]==2){
        $badgeclass ='badge badge-success ml-auto';
        $priority = 'RESOLVED';
    } else {
        if($taskRow["priority"]==3){
            $badgeclass ='badge badge-danger ml-auto';
            $priority = 'HIGH';
        } else if($taskRow["priority"]==2){
            $badgeclass ='badge badge-warning ml-auto';
            $priority = 'medium';
        } else if($taskRow["priority"]==1){
            $badgeclass ='badge badge-info ml-auto';
            $priority = 'low';
        }
    }
      
      //data-toggle="modal" data-target="#editTaskModal"
    
        $html .='<div class="item item-body" id="sort'.$statusRow["id"].'" data-status-id="'.$taskRow["status_id"].'" data-task-id="'.$taskRow["id"].'" datastatusid="'.$statusRow["id"].'" data-taskNameid="'.$taskRow["id"].'" >
            <div class="itemHeading">
                <h6 class="m-0 d-flex align-items-center"><span class="title">'.$taskRow["title"].'</span> <span class="'.$badgeclass.'">'.$priority.'</span></h6>
                <div class="card-options">';


$html .='<div class="item-action dropdown ml-2">
                        <a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </a><div class="dropdown-menu dropdown-menu-right">';

//if(accessOnlyMembers($project_id_new)==1){

if(in_array('copy', $task_crudparts) == '1' || getProfileName('designation')=='Master') {

    $html .='
        <a href="javascript:void(0)" tablename="tbl_task" statusRow_id="'.$taskRow["id"].'" onclick="copy_to_status(this)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>';
}
if(in_array('edit', $task_crudparts) == '1' || getProfileName('designation')=='Master') {

        $html .='<a href="javascript:void(0)" tablename="tbl_task" class="dropdown-item" data-toggle="modal" data-target="#editTaskModal" data-status-id="'.$statusRow["id"].'" data-task-id="'.$taskRow["id"].'"><i class="dropdown-icon fa fa-edit"></i> Edit Task</a>';
}
if(in_array('view', $task_crudparts) == '1' || getProfileName('designation')=='Master') {

$html .='<a href="javascript:void(0)" tablename="tbl_task" class="dropdown-item" data-toggle="modal" data-target="#viewTaskDetailModal" data-task-id="'.$taskRow["id"].'" style="display:none;"><i class="dropdown-icon fa fa-eye"></i> View Task</a>';
}
if(in_array('delete', $task_crudparts) == '1' || getProfileName('designation')=='Master') {

       $html .=' <a href="javascript:void(0)" tablename="tbl_task" statusRow_id="'.$taskRow["id"].'" class="dropdown-item" data-toggle="modal" data-target="#deleteCardModal" onclick="delete_to_status(this)"><i class="dropdown-icon fa fa-trash" ></i> Delete</a>';

//} else {

    $htmlaswe ='<a href="javascript:void(0)" tablename="tbl_task" class="dropdown-item" data-toggle="modal" data-target="#viewTaskDetailModal" data-task-id="'.$taskRow["id"].'"><i class="dropdown-icon fa fa-eye"></i> View Task</a>';

}

$html .='</div></div></div></div>

        <p class="task_Desc">'.$taskRow["description"].'</p>';
        
        $htmla='<ul class="taskAttachFileImg">';
            if($taskRow['task_file']){
                $imaname = base_url('').'uploads/'.$taskRow['task_file']; 
                $htmla='<li>
                <a href="'.$imaname.'" download="'.$taskRow['task_file'].'"><img src="'.$imaname.'" data-toggle="tooltip" data-placement="top" title="'.$taskRow['title'].'" alt="'.$taskRow['title'].'" data-original-title="'.$taskRow['title'].'"> <span class="attachName">Attach File</span></a>
                </li>';
            }                
        $htmla='</ul>';
        
        $html .='<div class="teamIconDateFooter">
                    <ul class="taskAssignUser_img">';
                        if($taskRow['assigned_to']!=0){
                            $assign_user_image = $this->dashboard_model->getAssign_user_image($taskRow["assigned_to"]);
                            foreach ($assign_user_image as $key => $value) {
                                    $imaname = get_user_img($value['user_id']);
                                    $html .='<li>
                                    <img src="'.$imaname.'" data-toggle="tooltip" data-placement="top" title="'.$value['email'].'" alt="'.$value['email'].'" data-original-title="'.$value['email'].'">
                                    </li>';
                            }
                            
                        }                
        $html .='</ul>';
        //Due_Date
        if($taskRow['due_date']!='0000-00-00'){
        $html .='<p class="taskDueDate"><i class="far fa-clock"></i>
        '.date("M j", strtotime($taskRow['due_date'])).'
        </p>';
        }

$html .='</div></div>';
    
	} } 
  	
  	$html .= '</div>';
  
//if(accessOnlyMembers($project_id_new)==1){

if(in_array('add', $task_crudparts) == '1' || getProfileName('designation')=='Master') {
if($i==1){
$html .='<div class="card-footer text-muted card-composer-container">
                <a href="#" class="open-card-composer" data-toggle="modal" data-target="#anotherCardModal" onclick="add_new_task('.$statusRow["id"].')">
                    <span class="icon-add"><i class="fas fa-plus"></i> Add To Task</span>
                </a>
            </div>';
    $i++; }
}
        $html .='</div>
    </div>';

}

if(in_array('add', $label_crudparts) == '1' || getProfileName('designation')=='Master') {
        if(total_project()=='0'){ $newproject_ajaxcheck = 'onclick="checkProjectaddornot()"'; } else {
            $newproject_ajaxcheck = 'data-toggle="modal" data-target="#newstatusModal"';
        }
		$html .='<div class="card boardListWrapper addBoardList">
                <div class="boardList boardListContent">
                    <form>
                        <a href="javascript:void()" class="add-card-list" '.$newproject_ajaxcheck.'>
                            <span class="icon-add"><i class="fas fa-plus"></i> Add To Label</span>
                        </a>
                    </form>
                </div>
            </div>';
}

		echo $html;		
	}

    public function checkbox_session_store()
    {
        $this->session->set_userdata('checkbox_session_store', $this->input->post('val'));
        $project_id = $this->input->post('projectID');
        $projectID = $project_id;
        $projectNAME = slugify($this->input->post('project_name'));
        $projectASSIGN = slugify(getProfileName('username'));
        $projectMain_user_id = $this->input->post('projectMain_user_id');
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function inviteteam()
    {
        $main_user_id = anj_decode($this->input->post('projectMain_user_id'));
        $projectID = anj_decode($this->input->post('projectID'));
        $where = array('project_id'=>$projectID, 'user_id'=>$main_user_id);
        $projectNAME = $this->input->post('projectNAME');
        $projectASSIGN = $this->input->post('projectASSIGN');
        $projectCombo_id = $this->input->post('projectCombo_id');
        $query = $this->db->query("SELECT GROUP_CONCAT(id) as id FROM `tbl_status` WHERE project_id='".$projectID."' and user_id='".$main_user_id."'");
        $result = $query->row_array();
        $status_id = $result['id'];
    }

    public function ajaxfileupload() {
        if($_FILES['picture']['name']){
            $data = fileUploadd('picture');
            $picture = $data['file_name'];
        } else {
            $picture = $this->input->post('pictureOLD');
        }
        $data1 = array(
            'first_name' => $this->input->post('first_name'),
            //'email' => $this->input->post('email'),
            //'username' => $this->input->post('username'),
            'mobile_no' => $this->input->post('mobile_no'),
            'picture' => $picture,
            'picture_url' => base_url().'uploads/'.$picture,
            'updated_at' => date_from_today()
        );
        $id = getProfileName('user_id');
        edit_update('tbl_users',$data1,'user_id',$id);
        $projectID = $this->input->post('projectID');
        $projectNAME = $this->input->post('projectNAME');
        $projectASSIGN = $this->input->post('projectASSIGN');
        $projectMain_user_id = $this->input->post('projectMain_user_id');
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function ajaxfileupload_background() {
        $data = array();
        if($_FILES['background_image_name']['name']){
            $data1 = fileUploadd('background_image_name');
            $data = $data1;
            $background = $data1['file_name'];
        } else {
            $background = $this->input->post('background_image_nameOLD');
        }
        $projectID = anj_decode($this->input->post('projectID'));
        $runningProject_id = $this->session->userdata('runningProject_id');
        $data1 = array('background' => $background,'background_color'=>$this->input->post('background_color_name'));
        edit_update('tbl_project',$data1,'project_id',$projectID);
        //echo json_encode($data);
        echo 1;
    }

    public function runningProjectList()
    {
        $this->session->unset_userdata('holdProjectList');
        $this->session->unset_userdata('canceledProjectList');
        $this->session->unset_userdata('completedProjectList');
        $this->session->set_userdata('runningProjectList', $this->input->post('runningProjectList'));
        $this->session->set_userdata('projectCombo_id', $this->input->post('projectCombo_id'));
        $project_id = $this->input->post('runningProjectList');
        $this->session->set_userdata('runningProject_id', $project_id);
        $projectID = anj_encode($project_id);
        $projectNAME = slugify($this->input->post('project_name'));
        $projectASSIGN = slugify(getProfileName('username'));
        $projectMain_user_id = anj_encode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function holdProjectList()
    {
        $this->session->unset_userdata('runningProjectList');
        $this->session->unset_userdata('canceledProjectList');
        $this->session->unset_userdata('completedProjectList');
        $this->session->set_userdata('holdProjectList', $this->input->post('holdProjectList'));
        $project_id = $this->input->post('holdProjectList');
        $projectID = anj_encode($project_id);
        $projectNAME = slugify($this->input->post('project_name'));
        $projectASSIGN = slugify(getProfileName('username'));
        $projectMain_user_id = anj_encode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function canceledProjectList()
    {
        $this->session->unset_userdata('runningProjectList');
        $this->session->unset_userdata('holdProjectList');
        $this->session->unset_userdata('completedProjectList');
        $this->session->set_userdata('canceledProjectList', $this->input->post('canceledProjectList'));
        $project_id = $this->input->post('canceledProjectList');
        $projectID = anj_encode($project_id);
        $projectNAME = slugify($this->input->post('project_name'));
        $projectASSIGN = slugify(getProfileName('username'));
        $projectMain_user_id = anj_encode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function completedProjectList()
    {
        $this->session->unset_userdata('runningProjectList');
        $this->session->unset_userdata('holdProjectList');
        $this->session->unset_userdata('canceledProjectList');
        $this->session->set_userdata('completedProjectList', $this->input->post('completedProjectList'));
        $project_id = $this->input->post('completedProjectList');
        $this->session->set_userdata('runningProject_id', $project_id);
        $projectID = anj_encode($project_id);
        $projectNAME = slugify($this->input->post('project_name'));
        $projectASSIGN = slugify(getProfileName('username'));
        $projectMain_user_id = anj_encode($this->input->post('projectMain_user_id'));
        $projectCombo_id = $this->input->post('projectCombo_id');
        echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id;
    }

    public function notification_read()
    {
        $notifications_id = $this->uri->segment(3, 0);
        $this->db->query("UPDATE tbl_notifications SET eStatus = '1' WHERE notifications_id = '".$notifications_id."'");
        $getNotificationList = get_by_id('tbl_notifications','url','notifications_id',$notifications_id);
        redirect($getNotificationList['url']);       
    }

    public function notification_send()
    {
        $query = $this->db->query("select * from `tbl_notifi`");
        $key = $query->row_array();
        $totalno = count($key);
        //echo json_encode(print_r($query));exit;
        $array=array(); 
        $rows=array();
        $record = 0;
         $data['title'] = $key['title'];
         $data['msg'] = $key['notif_msg'];
         $data['icon'] = 'https://anjwebtech.com/wp-content/uploads/2020/07/anjwebtech_logo.png';
         $data['url'] = base_url();
         $rows[] = $data;
         $record++;
        $array['notif'] = $rows;
        $array['count'] = $totalno;
        if($totalno==0){
            $array['result'] = false;
        } else {
            $array['result'] = true;
        }
        //delete_all('tbl_notifi');
        echo json_encode($array);
    }

    public function ajax_tasklists_status()
    {
        echo $this->input->post('status');
    }
		
}
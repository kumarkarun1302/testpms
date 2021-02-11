   <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">

<ul class="left-side-navbar navbar-item flex-row pl-2">
   
<?php 
$get_group_concat_project_id = get_group_concat_project_id('project_id');
if($get_group_concat_project_id){
    $queryrunning = $this->db->query("SELECT * FROM `tbl_project` WHERE project_id IN ($get_group_concat_project_id) and eDelete=0 and status=0");
    $running = $queryrunning->result_array();
} else {
    $running = getDropDownList_project_id('0');
}

$running2 = getDropDownList_project_id('2'); 
$running3 = getDropDownList_project_id('3'); 
$running4 = getDropDownList_project_id('4');  
?>
    <li class="nav-item dropdown" style="display: none;">
<button class="btn btn-secondary dropdown-toggle statusProjectIcon" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-list"></i>
</button>
<div class="dropdown-menu dropdown-menu-left statusProjectIcon-dropdown" aria-labelledby="statusProjectIcon-dropdown">
<ul>
<?php
    if($this->session->userdata('checkbox_session_store')=='running'){ 
        $checked1 = 'checked';
    } else {
        $checked1 = '';
    }
    if($this->session->userdata('checkbox_session_store')=='hold'){ 
        $checked3 = 'checked';
    } else {
        $checked3 = '';
    }
    if($this->session->userdata('checkbox_session_store')=='canceled'){ 
        $checked4 = 'checked';
    } else {
        $checked4 = '';
    }
    if($this->session->userdata('checkbox_session_store')=='completed'){ 
        $checked2 = 'checked';
    } else {
        $checked2 = '';
    }

?>

<li class="dropdown-item">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="running" id="projectList_checkbox" name="projectList_checkbox" <?php echo $checked1; ?>>
<label class="form-check-label" for="projectList_checkbox">Running projects (<?php if($running){ echo count($running); } else { echo '0'; } ?>)</label>
</div>
</li>

<li class="dropdown-item">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="hold" id="projectList_checkbox" name="projectList_checkbox" <?php echo $checked3; ?>>
<label class="form-check-label" for="projectList_checkbox">Hold projects (<?php if($running3){ echo count($running3); } else { echo '0'; } ?>)</label>
</div>
</li>
<li class="dropdown-item">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="completed" id="projectList_checkbox" name="projectList_checkbox" <?php echo $checked2; ?>>
<label class="form-check-label" for="projectList_checkbox">Compeleted projects (<?php if($running2){ echo count($running2); } else { echo '0'; } ?>)</label>
</div>
</li>
<li class="dropdown-item">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="canceled" id="projectList_checkbox" name="projectList_checkbox" <?php echo $checked4; ?>>
<label class="form-check-label" for="projectList_checkbox">Canceled / Trash projects (<?php if($running4){ echo count($running4); } else { echo '0'; } ?>)</label>
</div>
</li>
</ul>
</div>
</li>

<!-- <li class="nav-item">
    <a href="javascript:void(0)" class="contentEdit"><?php //echo getProjectName('project_name',anj_decode($this->uri->segment(2))); ?></a>
</li> -->

<?php 
if($this->session->userdata('checkbox_session_store')=='running'){ ?>
    <li class="nav-item" id="running_hideshow" style="">
    <select class="custom-select" id="runningProjectList" name="runningProjectList">
        <option value="">Running Project</option>
    <?php foreach ($running as $val) {
           if ($this->session->userdata('runningProjectList')==$val['project_id']) {
                 $selected = "selected"; } else { $selected = ""; } ?>
    <option data-combo_id="<?php echo $val["combo_id"]; ?>" data-user_id="<?php echo $val["user_id"]; ?>" data-project_name="<?php echo $val["project_name"]; ?>" value="<?php echo $val["project_id"]; ?>" <?php echo $selected; ?>><?php echo $val["project_name"]; ?></option>
    <?php }  ?>
    </select>
    </li>
<?php } ?>

<?php if($this->session->userdata('checkbox_session_store')=='hold'){ ?>
<li class="nav-item" id="hold_hideshow" style="">
<select class="custom-select" id="holdProjectList" name="holdProjectList">
<option value="">Hold Project</option>
<?php foreach ($running3 as $val) { 
    if ($this->session->userdata('holdProjectList')==$val['project_id']) {
             $selected = "selected";
       } else {
             $selected = "";
       } ?>
<option data-combo_id="<?php echo $val["combo_id"]; ?>" data-user_id="<?php echo $val["user_id"]; ?>" data-project_name="<?php echo $val["project_name"]; ?>" value="<?php echo $val["project_id"]; ?>" <?php echo $selected; ?>><?php echo $val["project_name"]; ?></option>
<?php } ?>
</select>
</li>
<?php } ?>

<?php if($this->session->userdata('checkbox_session_store')=='completed'){ ?>
<li class="nav-item" id="completed_hideshow" >
<select class="custom-select" id="completedProjectList" name="completedProjectList">
<option value="">Completed Project</option>
<?php foreach ($running2 as $val) {
if ($this->session->userdata('completedProjectList')==$val['project_id']) {
             $selected = "selected";
       } else {
             $selected = "";
       } ?>
<option data-combo_id="<?php echo $val["combo_id"]; ?>" data-user_id="<?php echo $val["user_id"]; ?>" data-project_name="<?php echo $val["project_name"]; ?>" value="<?php echo $val["project_id"]; ?>" <?php echo $selected; ?>><?php echo $val["project_name"]; ?></option>
<?php } ?>
</select>
</li>
<?php } ?>

<?php if($this->session->userdata('checkbox_session_store')=='canceled'){ ?>
<li class="nav-item" id="canceled_hideshow" style="">
<select class="custom-select" id="canceledProjectList" name="canceledProjectList">
<option value="">Canceled / Trash Project</option>
<?php foreach ($running4 as $val) { 
    if ($this->session->userdata('canceledProjectList')==$val['project_id']) {
             $selected = "selected";
       } else {
             $selected = "";
       } ?>
<option data-combo_id="<?php echo $val["combo_id"]; ?>" data-user_id="<?php echo $val["user_id"]; ?>" data-project_name="<?php echo $val["project_name"]; ?>" value="<?php echo $val["project_id"]; ?>" <?php echo $selected; ?>><?php echo $val["project_name"]; ?></option>
<?php } ?>
</select>
</li> 
<?php } ?>



<li class="nav-item dropdown">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle addProjectIcon" id="addProjectIcon-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Add New Project"><i class="fas fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-left addProjectIcon-dropdown">
        
<?php if(in_array('add', $project_crud)=='1' || getProfileName('designation')=='Master') { ?>
    <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#addProjectCardModal" data-project="add"><i class="dropdown-icon fa fa-plus-square"></i> ADD</a>
<?php } ?>


<?php if($check_can_com['status']=='0' || $check_can_com['status']=='1' || $check_can_com['status']=='3'){ ?>
<?php if(in_array('edit', $project_crud)=='1' || getProfileName('designation')=='Master') {  ?>

<?php if($this->uri->segment(2)){ ?>
    <?php if($this->session->userdata('checkbox_session_store')!='completed' && $this->session->userdata('checkbox_session_store')!='canceled'){ ?>

        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#addProjectCardModal" data-project="edit" title="running project id edit"><i class="dropdown-icon fa fa-edit"></i> EDIT</a>

<?php if(in_array('hold', $project_crud)=='1' || getProfileName('designation')=='Master') {  ?>

            <?php if($this->session->userdata('checkbox_session_store')=='hold') { ?>

                <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#holdProjectCardModal" data-projecthold="running" title="Running Project is Unhold"><i class="dropdown-icon fa fa-pause"></i> UnHold</a>

            <?php } else { ?>

                <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#holdProjectCardModal" data-projecthold="hold" title="Running Project is Hold"><i class="dropdown-icon fa fa-pause"></i> Hold</a>

            <?php } ?>
<?php } ?>

<?php if(in_array('delete', $project_crud)=='1' || getProfileName('designation')=='Master') {  ?>
        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#deleteProjectCardModal" title="Running Project is delete"><i class="dropdown-icon fa fa-times"></i> Delete </a>
<?php } ?>

<?php if(in_array('completed', $project_crud)=='1' || getProfileName('designation')=='Master') {  ?>
        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#completedProjectCardModal" title="Running Project is completed"><i class="dropdown-icon fa fa-check-circle"></i> Completed</a>
<?php } ?>

<?php } ?>

<?php } } ?>
<?php } ?>

    </div>
</li>

    <li class="nav-item dropdown" style="display: none;">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle projectStatusIcon" id="developer-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Project Status</span>
        </a>
        <div class="dropdown-menu  dropdown-menu-left projectStatusIcon-dropdown" aria-labelledby="projectStatusIcon-dropdown">
            <a href="javascript:void(0)" onclick="project_status_check('0')" class="dropdown-item">New</a>
            <a href="javascript:void(0)" onclick="project_status_check('1')" class="dropdown-item">Pending</a>
            <a href="javascript:void(0)" onclick="project_status_check('2')" class="dropdown-item">Completed</a>
            <a href="javascript:void(0)" onclick="project_status_check('3')" class="dropdown-item">Hold</a>
            <a href="javascript:void(0)" onclick="project_status_check('4')" class="dropdown-item">Canceled</a>
        </div>
    </li>
<?php //} ?>

<div id="teamProfile">

</div>

<?php //if(accessOnlyMembers($project_id_new)==1){
if($projectID){
    $addclass_addteam = 'onclick="inviteCopyLink()" data-toggle="modal" data-target="#inviteaddTeamModal"'; 
    $permissionclass = 'data-target="#permissionModal" data-toggle="modal"';
    $permissionclass = 'href="'.base_url("permission/$projectID").'"';
} else { 
    $addclass_addteam = 'onclick="inviteCopyLink_validation()"'; 
    $permissionclass = 'onclick="permissionclass_validation()"';
} ?>

<?php 
if(get_role_permission('add_team',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
    
<li class="nav-item">
    <a href="javascript:void(0);" class="nav-link" id="addTeam-dropdown" <?php echo $addclass_addteam; ?> data-toggle="tooltip" data-placement="top" title="Recive email and inbox notifications when people make important completed to task">Add Team</a>
</li>

<?php }  ?>

<li class="nav-item" style="display: none;">
    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="master assign to permission" class="nav-link" id="addTeam-dropdown" <?php echo $permissionclass; ?>>Permission</a>
</li>

<?php 
if(getProfileName('designation')=='Master'){ ?>
<li class="nav-item">
    <a class="nav-link" id="addTeam-dropdown" <?php echo $permissionclass; ?> target="_blank" data-toggle="tooltip" data-placement="top" title="master assign to permission">Permission</a>
</li>
<?php } ?>

            </ul>

            <ul class="right-side-navbar navbar-item flex-row ml-md-auto pr-2">
                <li class="nav-item addBoardProject">
                    <a href="#" class="addBoardProjectBtn dropdown-toggle" id="dropdownMenuButton" data-target="#addProjectCardModal" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-project="add">
                        <i class="fas fa-plus"></i> Add to Project
                    </a>
                </li>
                <li class="nav-item backToDashboard">
                    <a href="<?php echo base_url('dashboard'); ?>" class="backToDashboardBtn">
                        <i class="fas fa-chevron-left"></i> Back To Dashboard
                    </a>
                </li>
                <!-- <li class="nav-item dropdown appList-dropdown" id="show_project_time1">
                    
                </li> -->
            </ul> 

            <!-- <ul class="right-side-navbar navbar-item flex-row ml-md-auto pr-2">
                <li class="nav-item dropdown appList-dropdown">
                    <a href="<?php //echo base_url('calendar'); ?>" class="nav-link dropdown-toggle homeIcon" id="calendar-dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-calendar-alt"></i> Calendar 
                    </a>
                </li>
            </ul> -->
        </header>
    </div>
    <!--  END NAVBAR  -->
<?php $check_package = dayscounts(getProfileName('package_date')); 
if($check_package==2 || $check_package==1){ ?>
<div class="alert alert-danger">
Your ANJ PMS month expires. Please <a href="<?php echo base_url('#pricing-table'); ?>">Upgrade</a>
</div>
<?php } ?>
<!--  BEGIN MAIN CONTAINER  -->
<input type="hidden" name="project_id_new_INSERT" id="project_id_new_INSERT" value="<?php echo $project_id_new; ?>" autocomplete="off">
<input type="hidden" name="manish_id" id="manish_id" value="<?php echo $manish_id; ?>">
<input type="hidden" name="projectID" id="projectID" value="<?php echo $projectID; ?>">
<input type="hidden" name="projectNAME" id="projectNAME" value="<?php echo $projectNAME; ?>">
<input type="hidden" name="projectASSIGN" id="projectASSIGN" value="<?php echo $projectASSIGN; ?>">
<input type="hidden" name="projectMain_user_id" id="projectMain_user_id" value="<?php echo $projectMain_user_id; ?>">
<input type="hidden" name="projectCombo_id" id="projectCombo_id" value="<?php echo $projectCombo_id; ?>" autocomplete="off">
<input type="hidden" name="project_status_change" id="project_status_change" autocomplete="off">

<?php

/*$user_data = $this->session->userdata('user_details');
echo "<pre>";
echo print_r($user_data);*/
?>
	<div class="project_list_area" style="display: none;">

	</div>

	<div class="board-container" id="container">
	        <div id="board" class="boardScroll weblog">

	        </div>
	    </div>
	</div>
	
<!-- END MAIN CONTAINER -->


<?php
/*$seconds = strtotime("2020-11-11 20:10:18") - time();
$days = floor($seconds / 86400);
$seconds %= 86400;
$hours = floor($seconds / 3600);
$seconds %= 3600;
$minutes = floor($seconds / 60);
$seconds %= 60;
echo "$days days and $hours hours and $minutes minutes and $seconds seconds";exit;*/
?>
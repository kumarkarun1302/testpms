<?php
$task_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_task` WHERE `id`='$task_id'");
$result = $query->row_array();

//echo print_r($result);exit;
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/tasklist'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Add Task
                </div>
                <div class="card-body">
                 <form method="POST" action="<?php echo base_url('adddb/add_task'); ?>" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="task_id" id="task_id" value="<?php echo $task_id; ?>">
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="projectname">Select Project</label>
                                <select class="custom-select form-control" name="project_id" id="project_id">
                                    <option value="">Select Project</option>
                                    <?php 
                                    foreach (getTable('project_id,project_name','tbl_project','project_id') as $val) {
                                    if($result["project_id"] == $val["project_id"]){ $selected = 'selected'; } else { $selected = ''; }
                                    ?>
                                    <option value="<?php echo $val["project_id"]; ?>" <?php echo $selected; ?>><?php echo $val["project_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
<input type="hidden" name="projectuser_id" id="projectuser_id">
<input type="hidden" name="combo_id" id="combo_id">
<input type="hidden" name="edit_status_id" id="edit_status_id" value="<?php if(isset($result['status_id'])) { echo $result['status_id']; } ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="status_id">Task Status</label>
                                <select class="custom-select mr-sm-2" id="status_id" name="status_id">
                                    <option value="">Select Task Status</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="tasktitle">Task Name</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="title" value="<?php if(isset($result['title'])) { echo $result['title']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="description">Task Description</label>
                                <textarea class="form-control" name="description" id="description"><?php if(isset($result['description'])) { echo $result['description']; } ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="priority">Priority Status</label>
                                <select class="custom-select mr-sm-2" id="priority" name="priority">
                                 <option value="">Select Priority</option>
                                    <?php 
                                    foreach (getTable('priority_id,name','tbl_priority','priority_id') as $val) {
                                    if($result["priority"] == $val["priority_id"]){ $selected = 'selected'; } else { $selected = ''; }
                                    ?>
                                    <option value="<?php echo $val["priority_id"]; ?>" <?php echo $selected; ?>><?php echo $val["name"]; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="due_date">Due Date</label>
                                <input type="text" class="datetimepicker form-control hasDatepicker" name="due_date" id="due_date" value="<?php if(isset($result['due_date'])) { echo $result['due_date']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="assigned_to">Assign To</label>
                                <select class="custom-select mr-sm-2" id="assigned_to" name="assigned_to[]" multiple>
                                    <option value="0">Select Assigned To Task</option>
                                    <?php 
                                    $qryassigned_to = $this->db->query("select user_id,email,username from tbl_users where user_id!=1");
                                    $resultassigned_to = $qryassigned_to->result_array(); 
                                    foreach ($resultassigned_to as $key => $val) { 
                                        $HiddenProducts = explode(',',$result["assigned_to"]);
                                        if(in_array($val["user_id"],$HiddenProducts)){ $selected = 'selected'; } else { $selected = ''; }
                                    ?>
                                    <option value="<?php echo $val['user_id']; ?>" <?php echo $selected; ?>><?php echo $val['username'].' ('.$val['email'].')'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    

                    <div class="form-group mt-4 mb-0">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
        
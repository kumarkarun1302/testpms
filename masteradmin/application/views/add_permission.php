<?php
$permission_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_permission` WHERE `permission_id`='$permission_id'");
$result = $query->row_array();

$task_crudparts = explode(',', trim($result['task_crud']));
$label_crudparts = explode(',', trim($result['label_crud']));
$project_crud = explode(',', trim($result['project_crud']));

if(in_array('add', $project_crud)){
    $checkedp_add='checked';
} else { $checkedp_add=''; }
if(in_array('edit', $project_crud)){
    $checkedp_edit='checked';
} else { $checkedp_edit=''; }
if(in_array('hold', $project_crud)){
    $checkedp_hold='checked';
} else { $checkedp_hold=''; }
if(in_array('delete', $project_crud)){
    $checkedp_delete='checked';
} else { $checkedp_delete=''; }
if(in_array('completed', $project_crud)){
    $checkedp_completed='checked';
} else { $checkedp_completed=''; }

if(in_array('add', $label_crudparts)){
    $checkedl_add='checked';
} else { $checkedl_add=''; }

if(in_array('edit', $label_crudparts)){
    $checkedl_edit='checked';
} else { $checkedl_edit=''; }

if(in_array('view', $label_crudparts)){
    $checkedl_view='checked';
} else { $checkedl_view=''; }

if(in_array('delete', $label_crudparts)){
    $checkedl_delete='checked';
} else { $checkedl_delete=''; }


if(in_array('add', $task_crudparts)){
    $checkedt_add ='checked';
} else { $checkedt_add =''; }

if(in_array('edit', $task_crudparts)){
    $checkedt_edit='checked';
} else { $checkedt_edit=''; }

if(in_array('view', $task_crudparts)){
    $checkedt_view='checked';
} else { $checkedt_view=''; }

if(in_array('delete', $task_crudparts)){
    $checkedt_delete='checked';
} else { $checkedt_delete=''; }

if(isset($result['user_to_permission'])) { 
    $disabled='disabled';
} else { $disabled=''; }

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/rolepermissionlist'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Add Permission
                </div>
                <div class="card-body">
                 
                 <form action="<?php echo base_url('adddb/add_permission'); ?>" method="post" name="form_permission" id="form_permission" autocomplete="off">
                
                <input type="hidden" name="permission_id" id="permission_id" value="<?php echo $permission_id; ?>">

                <div class="form-row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12 stack-item-col mb-3">
    <div class="stack-item-content">
        <div class="blockContent">
            <div class="form-row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="addaccount">Email:</label>
                        <input type="text" class="form-control" name="account_email" id="account_email" placeholder="Enter Email ID" value="<?php if(isset($result['user_to_permission'])) { echo gettbl_users($result['user_to_permission'],'email'); } ?>" <?php echo $disabled; ?>>
                        <span id="errormsgaccount_email"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="user_type">User Type</label>
                        <select class="custom-select" name="user_type" id="user_type" <?php echo $disabled; ?>>
                            <option value="">Select Type</option>
                            <?php 
                            foreach (gettbl_user_typeDropDown() as $val) { 
                            if(gettbl_users($result['user_to_permission'],'user_type') == $val["user_type_id"]){ $selected = 'selected'; } else { $selected = ''; }
                            ?>
                            <option value="<?php echo $val["user_type_id"]; ?>" <?php echo $selected; ?>><?php echo $val["user_type"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="control-label" for="role_name">Select Designation</label>
                        <div class="input-group">
                            <select class="custom-select" id="role_name" name="role_name">
                                <option value="">Select Designation</option>
                                <?php 
                                foreach (getTable('user_type,designation','tbl_rolename','rolename_id') as $val) { 
                                if(gettbl_users($result['user_to_permission'],'designation') == $val["designation"]){ $selected = 'selected'; } else { $selected = ''; }
                                ?>
                                <option value="<?php echo $val["designation"]; ?>" <?php echo $selected; ?>><?php echo $val["designation"]; ?></option>
                                <?php } ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="addroleButton" data-toggle="modal" data-target="#addroleModal"><i class="fas fa-plus"></i></button>
                            </div>

                        </div>
                        <span id="errormsgrole_name"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label for="accountmerge">Account Merge:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="account_merge" type="radio" id="account_merge1" value="yes" <?php echo ($result['account_merge'] == 'yes')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="account_merge1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="account_merge" type="radio" id="account_merge2" value="no" <?php echo ($result['account_merge'] == 'no')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="account_merge2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="team_add">Team Add:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="add_team" type="radio" id="add_team1" value="yes" <?php echo ($result['add_team'] == 'yes')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="add_team1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="add_team" type="radio" id="add_team2" value="no" <?php echo ($result['add_team'] == 'no')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="add_team2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label>Projects</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud1" value="add" <?php echo $checkedp_add; ?>>
                                        <label class="form-check-label" for="project_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud2" value="edit" <?php echo $checkedp_edit; ?>>
                                        <label class="form-check-label" for="project_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud3" value="hold" <?php echo $checkedp_hold; ?>>
                                        <label class="form-check-label" for="project_crud3">Hold</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud4" value="completed" <?php echo $checkedp_completed; ?>>
                                        <label class="form-check-label" for="project_crud4">Completed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud5" value="delete" <?php echo $checkedp_delete; ?>>
                                        <label class="form-check-label" for="project_crud5">Delete</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Labels</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud1" value="add" <?php echo $checkedl_add; ?>>
                                        <label class="form-check-label" for="label_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud2" value="edit" <?php echo $checkedl_edit; ?>>
                                        <label class="form-check-label" for="label_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud3" value="view" <?php echo $checkedl_view; ?>>
                                        <label class="form-check-label" for="label_crud3">View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud4" value="delete" <?php echo $checkedl_delete; ?>>
                                        <label class="form-check-label" for="label_crud4">Delete</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tasks</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud1" value="add" <?php echo $checkedt_add; ?>>
                                        <label class="form-check-label" for="task_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud2" value="edit" <?php echo $checkedt_edit; ?>>
                                        <label class="form-check-label" for="task_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud3" value="view" <?php echo $checkedt_view; ?>>
                                        <label class="form-check-label" for="task_crud3">View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud4" value="delete" <?php echo $checkedt_delete; ?>>
                                        <label class="form-check-label" for="task_crud4">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label for="chat">Chat:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chat" type="radio" id="chat1" value="yes" <?php echo ($result['chat'] == 'yes')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="chat1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chat" type="radio" id="chat2" value="no" <?php echo ($result['chat'] == 'no')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="chat2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="github">Github:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="github" type="radio" id="github1" value="yes" <?php echo ($result['github'] == 'yes')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="github1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="github" type="radio" id="github2" value="no" <?php echo ($result['github'] == 'no')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="github2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file_storage">File Storage:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="file_storage" type="radio" id="file_storage1" value="yes" <?php echo ($result['file_storage'] == 'yes')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="file_storage1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="file_storage" type="radio" id="file_storage2" value="no" <?php echo ($result['file_storage'] == 'no')?'checked="checked"':''; ?>>
                                        <label class="form-check-label" for="file_storage2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="rolePermissionBtn w-100">
                            <input type="submit" class="btn btn-primary d-block"value="Submit" name="submit">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </main>
<div class="modal fade" id="addroleModal" tabindex="-1" role="dialog" aria-labelledby="addroleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addroleModalLabel">Add Role/Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Role / Designation Name:</label>
                    <input autocomplete="off" class="form-control" id="new_rolename" name="new_rolename" placeholder="Enter Role / Designation Name" type="text" required>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="addrole_submit" onclick="addrole_submit()">Submit</button>
      </div>
    </div>
  </div>
</div>
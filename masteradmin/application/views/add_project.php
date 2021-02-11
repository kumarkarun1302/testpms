<?php
$project_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_project` WHERE `project_id`='$project_id'");
$result = $query->row_array();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/projectlist'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Add project
                </div>
                <div class="card-body">
                 <form method="POST" action="<?php echo base_url('adddb/add_project'); ?>" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="edit_project_id" id="edit_project_id" value="<?php echo $project_id; ?>">
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Project Name</label>
                                <input class="form-control" type="text" name="project_name" id="project_name" placeholder="project_name" value="<?php if(isset($result['project_name'])) { echo $result['project_name']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Select User</label>
                                <select class="small mb-1 form-control" name="user_id" id="user_id">
                                    <option value="">Select User</option>
<?php 
foreach (getTable('user_id,username,email','tbl_users','user_id') as $val) {
if($val['user_id']!='1'){ 
if($result["user_id"] == $val["user_id"]){ $selected = 'selected'; } else { $selected = ''; }
?>
<option value="<?php echo $val["user_id"]; ?>" <?php echo $selected; ?>><?php echo $val["username"].'('.$val["email"].')'; ?></option>
<?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Client Name</label>
                                <input class="form-control" type="text" name="client_id" id="client_id" placeholder="client name" value="<?php if(isset($result['client_id'])) { echo $result['client_id']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Category / Technology use to projects</label>
                                <input class="form-control" type="text" name="category" id="category" placeholder="category" value="<?php if(isset($result['category'])) { echo $result['category']; } ?>">
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="start_date">Start Date</label>
                                <input class="form-control" type="text" name="start_date" id="start_date" placeholder="start_date" value="<?php if(isset($result['start_date'])) { echo $result['start_date']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="deadline">deadline</label>
                                <input class="form-control" type="text" name="deadline" id="deadline" placeholder="deadline" value="<?php if(isset($result['deadline'])) { echo $result['deadline']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="project_description">Project Description</label>
                                <textarea class="form-control" name="project_description" id="project_description"><?php if(isset($result['project_description'])) { echo $result['project_description']; } ?></textarea>
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
        
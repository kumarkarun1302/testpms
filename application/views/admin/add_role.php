<div id="layoutSidenav_content">
<main>
<?php
$rolename_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_rolename` WHERE `rolename_id`='$rolename_id'");
$result = $query->row_array();
?>
    <div class="container-fluid">
        <h3 class="mt-4">Role Name Add</h3>
        <a href="<?php echo base_url('rolename'); ?>" class="btn">Back</a>
        <div class="card mb-4">
            <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/insert_rolename'); ?>">
            <input type="hidden" name="rolename_id" id="rolename_id" value="<?php echo $rolename_id; ?>">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">User Type</label>
                            <select class="form-control" name="user_type" id="user_type" required>
                                <option value="">Select Type</option>
                                <?php foreach (getDropDownList('tbl_user_type','user_type,user_type_id','user_type_id','DESC') as $val) { 
                                    if($result["user_type"] == $val["user_type_id"]){ $selected = 'selected'; } else { $selected = ''; }
                                    ?>
                                      <option value="<?php echo $val["user_type_id"]; ?>" <?php echo $selected; ?>><?php echo $val["user_type"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Designation</label>
                            <input class="form-control" id="designation" name="designation" value="<?php echo $result['designation']; ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="submit">
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>


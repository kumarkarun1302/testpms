<?php
$rolename_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_rolename` WHERE `rolename_id`='$rolename_id'");
$result = $query->row_array();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/rolename'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    User Type add 
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('adddb/add_role'); ?>" autocomplete="off">
                     <input type="hidden" name="rolename_id" id="rolename_id" value="<?php echo $rolename_id; ?>">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">User Type</label>
                                    <select class="form-control" name="user_type" id="user_type" required>
                                        <option value="">Select Type</option>

<?php 
foreach (gettbl_user_typeDropDown() as $val) { 
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
                                    <input class="form-control" id="designation" name="designation" value="<?php if(isset($result['user_type'])) { echo $result['designation']; } ?>" required>
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
       

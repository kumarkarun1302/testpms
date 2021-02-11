<?php
$user_type_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_user_type` WHERE `user_type_id`='$user_type_id'");
$result = $query->row_array();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/usertype'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    User Type add 
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('adddb/add_usertype'); ?>" autocomplete="off">
                        <input type="hidden" name="user_type_id" id="user_type_id" value="<?php echo $user_type_id; ?>">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">User Type</label>
                                <input class="form-control" id="user_type" name="user_type" value="<?php if(isset($result['user_type'])) { echo $result['user_type']; } ?>" required>
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
        
<?php
$user_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_users` WHERE `user_id`='$user_id'");
$result = $query->row_array();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/userlist'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    User add 
                </div>
                <div class="card-body">
                 <form method="POST" action="<?php echo base_url('adddb/add_user'); ?>" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Select Designation</label>
                                <select class="small mb-1 form-control" name="designation" id="designation">
                                    <option value="">Select Designation</option>
<?php 
foreach (gettbl_rolenameDropDown() as $val) { 
if($result["designation"] == $val["designation"]){ $selected = 'selected'; } else { $selected = ''; }
?>
<option value="<?php echo $val["designation"]; ?>" <?php echo $selected; ?>><?php echo $val["designation"]; ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Select user type</label>
                                <select class="small mb-1 form-control" name="user_type" id="user_type">
<?php 
foreach (gettbl_user_typeDropDown() as $val) { 
if($result["user_type"] == $val["user_type_id"]){ $selected = 'selected'; } else { $selected = ''; }
?>
<option value="<?php echo $val["user_type_id"]; ?>" <?php echo $selected; ?>><?php echo $val["user_type"]; ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Username</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($result['username'])) { echo $result['username']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="first name" value="<?php if(isset($result['first_name'])) { echo $result['first_name']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="last Name" value="<?php if(isset($result['last_name'])) { echo $result['last_name']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="email" value="<?php if(isset($result['email'])) { echo $result['email']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">code</label>
                                <input class="form-control" type="text" name="code" id="code" placeholder="code" value="<?php if(isset($result['code'])) { echo $result['code']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">mobile_no</label>
                                <input class="form-control" type="text" name="mobile_no" id="mobile_no" placeholder="mobile_no" value="<?php if(isset($result['mobile_no'])) { echo $result['mobile_no']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Password</label>
                                <input class="form-control" type="text" name="password" id="password" placeholder="Change Password">
                                <input type="hidden" name="passwordOLD" id="passwordOLD" value="<?php if(isset($result['password'])) { echo $result['password']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Profile picture</label>
                                <input class="form-control" type="file" name="picture" id="picture">
                                <input type="hidden" name="pictureOLD" id="pictureOLD" value="<?php if(isset($result['picture'])) { echo $result['picture']; } ?>">
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
        
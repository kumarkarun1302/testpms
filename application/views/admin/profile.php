
  <h2>Profile</h2>
        <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                      <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                      <?=$this->session->flashdata('error')?>
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('success')): ?>
                      <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?=$this->session->flashdata('success')?>
                      </div>
                <?php endif; ?>

   <form method="POST" action="<?php echo base_url('dashboard/updateprofile'); ?>">
        <div class="form-group">                                                
            <div class="lrf-transformY-50 lrf-transition-delay-2">
                <input type="text" id="name" class="form-control" name="username" placeholder="Full Name" value="<?php echo $profileDetails['username']; ?>">                                        
            </div>
        </div>
        <div class="form-group">                                                
            <div class="lrf-transformY-50 lrf-transition-delay-3">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required="required" value="<?php echo $profileDetails['email']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <div class="lrf-transformY-50 lrf-transition-delay-6">
                <input type="submit" name="submit" id="submit" class="lrf-btn-fill" value="Update">
            </div>
        </div>
    </form>

    <hr>
    <h2>Change Password</h2>
    <form method="POST" action="<?php echo base_url('dashboard/change_password'); ?>">
        <div class="form-group">                                                
            <div class="lrf-transformY-50 lrf-transition-delay-2">
                <input type="text" id="old_password" class="form-control" name="old_password" placeholder="Old Password" value="<?php //echo $profileDetails['username']; ?>">                                        
            </div>
        </div>
        <div class="form-group">                                                
            <div class="lrf-transformY-50 lrf-transition-delay-2">
                <input type="text" id="password" class="form-control" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group">                                                
            <div class="lrf-transformY-50 lrf-transition-delay-3">
                <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password Confirmation" required>
            </div>
        </div>
        
        <div class="form-group">
            <div class="lrf-transformY-50 lrf-transition-delay-6">
                <input type="submit" name="submit" id="submit" class="lrf-btn-fill" value="submit">
            </div>
        </div>
    </form>
</div>
   

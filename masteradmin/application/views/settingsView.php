<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Settings 
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/settingInsert'); ?>">
                    <?php foreach (getSettings() as $key => $value) { ?>
                            <div class="form-group">                                                
                                <div class="lrf-transformY-50 lrf-transition-delay-2">
                                    <input type="text" id="<?php echo $value['setting_name']; ?>" class="form-control" name="<?php echo $value['setting_name']; ?>" value="<?php echo $value['setting_value']; ?>" placeholder="<?php echo $value['setting_name']; ?>" >
                                </div>
                            </div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="lrf-transformY-50 lrf-transition-delay-6">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

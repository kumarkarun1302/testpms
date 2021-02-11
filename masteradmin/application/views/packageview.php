<div id="layoutSidenav_content">
<main>

<?php
$query1 = $this->db->query("SELECT `total_user_support`, `file_sharing_storage`, `max_file_size_upload` FROM `tbl_price` where month_year='free'");
$result1 = $query1->row_array();

$query3 = $this->db->query("SELECT `total_user_support` FROM `tbl_price` where month_year='custom'");
$result3 = $query3->row_array();
?>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Package Settings 
            </div>
            <div class="card-body">

                <nav class="taskDetails_Nav w-100">
                  <div class="w-100 nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="w-25 text-center nav-item nav-link active" id="nav-task_information-tab" data-toggle="tab" href="#nav-task_information" role="tab" aria-controls="nav-task_information" aria-selected="true">Free / Basic Plan</a>
                    <a class="w-25 text-center nav-item nav-link" id="nav-attachment-tab" data-toggle="tab" href="#nav-attachment" role="tab" aria-controls="nav-attachment" aria-selected="false">Platinum Package</a>
                    <a class="w-25 text-center nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">Custom Package</a>
                  </div>
                </nav>

    <div class="tab-content" id="nav-tabContent">
       <div class="tab-pane fade show active" id="nav-task_information" role="tabpanel" aria-labelledby="nav-task_information-tab">
            <h2>&nbsp;</h2>
           <form method="POST" action="<?php echo base_url('adddb/packageUpdate_free'); ?>" >
            <div class="form-row">
               <div class="col-4">
                  <div class="form-group"> 
                    <label>Total User Support</label>
                    <input type="text" id="total_user_support" class="form-control" name="total_user_support" placeholder="total user support" required value="<?php echo $result1['total_user_support']; ?>">
                  </div>
               </div>
               <div class="col-4">
                  <div class="form-group"> 
                    <label>File Sharing Storage (Convert Kilobytes)</label>
                    <input type="text" id="file_sharing_storage" class="form-control" name="file_sharing_storage" placeholder="File Sharing Storage" required value="<?php echo $result1['file_sharing_storage']; ?>">
                  </div>
               </div>
               <div class="col-4">
                  <div class="form-group"> 
                    <label>Max File Size Upload</label>
                    <input type="text" id="max_file_size_upload" class="form-control" name="max_file_size_upload" placeholder="Max File Size Upload" required value="<?php echo $result1['max_file_size_upload']; ?>">
                  </div>
               </div>
            </div>
            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-6">
                    <input type="submit" name="free_submit" id="submit" class="btn btn-primary" value="basic plan update">
                </div>
            </div>
          </form>
       </div>
       <div class="tab-pane fade" id="nav-attachment" role="tabpanel" aria-labelledby="nav-attachment-tab">
        <h2>&nbsp;</h2>
          <form method="POST" action="<?php echo base_url('adddb/packageUpdate'); ?>" >
            <div class="form-row">
               <div class="col-6">
                  <div class="form-group"> 
                    <label>Select Month and year</label>
                    <select name="month_year" id="month_year" class="form-control" required>
                        <option value="">Select Month and year</option>
                        <option value="month">month</option>
                        <option value="year">year</option>
                    </select>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-group"> 
                    <label>Total User Support</label>
                    <input type="text" id="total_user_support" class="form-control" name="total_user_support" placeholder="total user support" required>
                  </div>
               </div>
            </div>
            <div class="form-row">
               <div class="col-6">
                  <div class="form-group">
                    <label>Max File Size Upload</label> 
                    <input type="text" id="max_file_size_upload" class="form-control" name="max_file_size_upload" placeholder="max file size upload" required>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-group"> 
                    <label>Price in package</label>
                    <input type="text" id="price" class="form-control" name="price" placeholder="price in package" required> 
                  </div>
               </div>
            </div>
            <div class="form-row">
               <!-- <div class="col-6">
                  <div class="form-group"> 
                    <input type="number" min="0" max="999999999" value="1" step="0.00001" name="megabytes" id="megabytes" placeholder="MB" class="form-control" onkeyup="ConvertMegabytes()" autocomplete="off" required /> 
                  </div>
               </div> -->
               <div class="col-6">
                  <div class="form-group"> 
                    <label>File Sharing Storage (Convert Kilobytes)</label>
                    <input type="text" id="file_sharing_storage" class="form-control" name="file_sharing_storage"  placeholder="enter in kilobytes" required> 
                  </div>
               </div>
            </div>
            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-6">
                    <input type="submit" name="Platinum_submit" id="submit" class="btn btn-primary" value="Platinum Update">
                </div>
            </div>
          </form>
       </div>
       <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
        <h2>&nbsp;</h2>
        <form method="POST" action="<?php echo base_url('adddb/packageUpdate_custom'); ?>" >
            <div class="form-row">
               <div class="col-12">
                  <div class="form-group"> 
                    <label>Total User Support</label>
                    <input type="text" id="total_user_support" class="form-control" name="total_user_support" placeholder="total user support" required value="<?php echo $result3['total_user_support']; ?>">
                  </div>
               </div>
            </div>
            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-6">
                    <input type="submit" name="submit_packageUpdate_custom" id="submit" class="btn btn-primary" value="Custom Update">
                </div>
            </div>
          </form>
       </div>
    </div>

    
            </div>
        </div>
    </div>
</main>

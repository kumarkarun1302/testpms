
<?php
$dummy_cryptcode=$this->uri->segment(3);
$query = $this->db->query("SELECT folder  FROM `tbl_anjdrive` WHERE user_id='$user_id' and dummy_cryptcode='$dummy_cryptcode' limit 1");
$result_array = $query->row_array();
?>
<!-- Start Content Page -->
<div class="dd-content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-900 drive-heading"><?php echo $result_array['folder']; ?></h1>
                </div>
                <hr>
            </div>
        </div>
        </div>

    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <?=$this->session->flashdata('success')?>
    </div>
    <?php endif; ?>


    </div>

    <!-- End Content Page -->
</div>
<!-- End Wrapper -->
    <!-- jquery-->
    <script src="<?php echo base_url('assets'); ?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/validator.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/dragula/dragula.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/dragula.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/drive.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script type="text/javascript">
      var main_url = '<?php echo base_url(); ?>';
      var main_url_dashboard = main_url+'dashboard/';
    </script>

    <script type="text/javascript">
      //function to format bites bit.ly/19yoIPO
        function bytesToSize(bytes) {
           var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
           if (bytes == 0) return '0 Bytes';
           var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
           return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
      function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MiB
        var limiminst = bytesToSize(file.files[0].size);
        var mins = file.files[0].size / 1024;
        var limit = '<?php echo getProfileName('file_sharing_storage'); ?>';
        var db_limit = '<?php echo round($file_size); ?>';
        var remember_limits = limit - db_limit;
        if (mins > remember_limits) {
            $("#one_file").val('');
            alert('You cannot upload a fe. Please try it again.');
             return false;
        }

        if (FileSize > 500) {
          $("#one_file").val('');
            alert('You cannot upload a file that exceeds 500MB in size. Please try it again.');
            return false;
        } 
    }

$(document).ready(function() {

$('#one_file').change(function(){
  var files = $('#one_file')[0].files;
  var error = '';

  var file = this.files[0];
  var filesize = file.size / 1024 / 1024;

  var mins = filesize / 1024;
  var limit = '<?php echo getProfileName('file_sharing_storage'); ?>';
  var db_limit = '<?php echo round($file_size); ?>';
  var remember_limits = limit - db_limit;
  

  if (mins > remember_limits) {
      $("#one_file").val('');
      $("#one_file").focus();
      alert('You are out of space. Try to delete some files. Please Upgrade.');
      $("#uploadStatusMsgfolder").html('<span style="color:red;">You are out of space. Try to delete some files. Please <b>upgrade</b>.</span>');
      setTimeout(function(){ window.location ='<?php echo base_url('#pricing-table'); ?>' }, 3000);
      return false;
  }

  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   form_data.append("userfile[]", files[count]);
  }
  form_data.append('task_id',$("#edit_task_id").val());
  form_data.append('new_foldername',$("#new_foldername").val());
  form_data.append('tbl_anjdrive_id',$("#drive_id").val());
  console.log(files)
   $(".progress").show();
  if(error == '')
  {
     $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                  var percentComplete = ((evt.loaded / evt.total) * 100);
                  percentComplete = percentComplete.toFixed(2);
                  $(".progress-bar").width(percentComplete + '%');
                  $(".progress-bar").html(percentComplete+'%');
              }
          }, false);
          return xhr;
        },
        url:main_url+"anj_drive/folder_upload_file",
        method:"POST",
        data:form_data,
        contentType:false,
        cache:false,
        processData:false,
        beforeSend: function(){
          $(".progress-bar").width('0%');
          $('#uploadStatusMsg1').html('<span style="color:red;">*Please don&#x27;t refresh or leave the page/browser, file upload is in progress</span>');
        },
        success:function(response)
        {
           setTimeout(function() {
                swal({
                    title: '',
                    text: "file has been successfully uploaded",
                    imageUrl: "<?php echo base_url('drive_assets/thumbs-up.jpg'); ?>"
                }, function() {
                    window.location = window.location.href = main_url+'anj_drive';;
                });
            }, 1000);
        }
         })
   } else {
       alert(error);
   }

});

});
  

$(document).ready(function(){

});  


</script>
</body>
</html>
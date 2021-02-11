<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('success')?>
</div>
<?php endif; ?>

<!-- Start Content Page -->
        <div class="dd-content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-900 drive-heading">Shared</h1>
                            <div class="view-mode float-right">
                               <!-- <a class="newRequestBtn" href="#" data-toggle="modal" data-target="#createSharedFolderModal">Create shared folder</a> -->
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered" id="sortTable">
                              <thead>
                                  <tr>
                                      <th>File Name</th>
                                      <!-- <th>Share With</th> -->
                                      <th>Date</th>
                                      <th>File Size</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
$i=0;
foreach($drive_images as $key => $value){ 
if($value['file_folder']=='1'){
  $showfilename = $value['file'];
} else if($value['file_folder']=='2'){
  $showfilename = $value['folder'];
}

?>
  <tr>
    <td><?php echo $showfilename; ?></td>
    <!-- <td><?php //echo $value['share_other_people']; ?></td> -->
    <td><?php echo date('M d,Y H:i:s A',strtotime($value['created_date'])); ?></td>
    <td><?php echo $value['file_size']; ?></td>
  </tr>
<?php } ?>

                              </tbody>
                            </table>

                          </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Page -->
    </div>
    <!-- End Wrapper -->

      
    
    <!-- jquery-->
    <script src="<?php echo base_url('assets'); ?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets'); ?>/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?php echo base_url('assets'); ?>/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?php echo base_url('assets'); ?>/js/validator.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>

    <!-- Dragula -->
    <script src="<?php echo base_url('assets'); ?>/js/dragula/dragula.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/dragula.js"></script>

    <!-- Simplebar Scrollbar -->
    <script src="<?php echo base_url('assets'); ?>/js/simplebar/simplebar.min.js"></script>

    <!-- Custom Drive Js -->
    <script src="<?php echo base_url('assets'); ?>/js/drive.js"></script>

    <script src="<?php echo base_url('drive_assets'); ?>/HgHlOrRPFJZYw51l4IwUK3ti7PTmsrGZ0sY7YgJwO4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    <script type="text/javascript">
    function getfolder(e) {
        var form_data = new FormData();
        form_data.append("file", document.getElementById('userfolder').files[0]);
        var files = e.target.files;
        var path = files[0].webkitRelativePath;
        var Folder = path.split("/");
        
      var folder_count = [];
      var file_count = [];
      var abcdxyz = [];
      for (var i = 0; i < files.length; ++i) {
          var filename = files[i].webkitRelativePath;
          var fileSplit = filename.split('/');
          var folder_name = fileSplit.length -2;
          abcdxyz.push(folder_name);
          console.log(abcdxyz)
          console.log(folder_name)
          folder_name = files[i].webkitRelativePath.split("/")[folder_name]
          folder_count.push(folder_name);
          var file_name = fileSplit.length -1;
          console.log(files[i].webkitRelativePath.split("/")[file_name])
          file_count.push(files[i].webkitRelativePath.split("/")[file_name]);
      }
      folder_count = folder_count.filter( function( item, index, inputArray ) {
             return inputArray.indexOf(item) == index;
      });
      var max_folder = folder_count.length;
      console.log(folder_count.length)
      var myvar = '<div class="modal fade" id="subfolderModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="subfolderModalLabel" aria-hidden="true">'+
'  <div class="modal-dialog" role="document">'+
'    <div class="modal-content">'+
'      <div class="modal-header">'+
'        <h5 class="modal-title" id="subfolderModalLabel">Too many sub-folders</h5>'+
'        <button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
'          <span aria-hidden="true">×</span>'+
'        </button>'+
'      </div>'+
'      <div class="modal-body">'+
'        <p>'+
'          The folder you\'re trying to upload has '+max_folder+' sub-folders which are too many to upload at one time. Please keep it to a maximum of 5 sub-folders at one time.'+
'        </p>'+
'      </div>'+
'      <div class="modal-footer">'+
'        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
'      </div>'+
'    </div>'+
'  </div>'+
'</div>';
        $("#folder_subfolder").html(myvar);

      if(max_folder > 5){
        $("#userfolder").val('');
        var html = 'Too many sub-folders The folder you\'re trying to upload has '+max_folder+' sub-folders which are too many to upload at one time. Please keep it to a maximum of 5 sub-folders at one time.';
        alert(html);
        jQuery("#subfolderModal").modal('show');
      }

      var tot = 0;
        for (var i = 0; i < files.length; i++) {
          tot += files[i].size;
        }

        var FileSize = tot / 1024 / 1024;
        if (FileSize > 50) {
          $("#userfolder").val('');
            alert('You cannot upload a file that exceeds 50MB in size. Please try it again.');
            return false;
        }

        document.getElementById('foldername').value = Folder[0];
      }

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

        if (FileSize > 50) {
          $("#one_file").val('');
            alert('You cannot upload a file that exceeds 50MB in size. Please try it again.');
            return false;
        } 
    }

/*$(document).on({
  ajaxStart: function(){
      $("body").addClass("loading"); 
  },
  ajaxStop: function(){ 
      $("body").removeClass("loading"); 
  }    
});*/
  $(document).ready(function() {

    $('#one_file1').change(function(){
        var file_data = $('#one_file').prop('files')[0];
        console.log(file_data)
        var form_data = new FormData();                  
        form_data.append('one_file', file_data);
        $.ajax({
            url: "<?php echo base_url('anj_drive/one_to_one_file'); ?>",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $("body").addClass("loading"); 
            },
            success: function(data){
              $("#createUploadFilesModal").modal('hide');
              $("body").removeClass("loading");

              setTimeout(function() {
                      swal({
                          title: file_data['name'],
                          text: "file has been successfully uploaded",
                          imageUrl: "https://anjwebtech.com/anjwebtech_pms/drive_assets/thumbs-up.jpg"
                      }, function() {
                          window.location = window.location.href = main_url+'anj_drive';;
                      });
                  }, 1000);

            }
        });
    });

    var bars = $('.progress-bar');
    for (i = 0; i < bars.length; i++) {
      console.log(i);
      var progress = $(bars[i]).attr('aria-valuenow');
      $(bars[i]).width(progress + '%');
      if (progress > 90) {
        $(bars[i]).addClass("bar-error");
      } else {
        $(bars[i]).addClass("bar-success");
      }
    }
  });
  
  function shareModal(dummy_cryptcode){
    $("#shareModal").modal('show');
    $("#txt_iddummy_cryptcode").val(dummy_cryptcode);
    var linkhtml = main_url+'file/anj/'+dummy_cryptcode;
    $("#anj_link_url").val(linkhtml);
    $("#modaldummy_cryptcode").val(dummy_cryptcode);
  }

  function linkModal(dummy_cryptcode){
    $("#txt_iddummy_cryptcode").val(dummy_cryptcode);
    var linkhtml = main_url+'file/anj/'+dummy_cryptcode;
    $("#anjlinkurl").val(linkhtml);
  }

function viewModal(dummy_cryptcode){
  $("#viewModal").modal('show');
  $.ajax({
    url: main_url+'file/get_value_anjdrive', 
    dataType: 'html',
    data:{dummy_cryptcode:dummy_cryptcode},
    type: 'post',
    success: function (response) {
      $("#viewimage").html(response);
    },
    error: function (response) {
      console.log(response);
    }
  });

}
function DeleteModal(dummy_cryptcode){
  $("#deleteModal").modal('show');
  $("#delete_id").val(dummy_cryptcode);
}

function copyModal(dummy_cryptcode){
  $("#copyModal").modal('show');
  $("#copy_id").val(dummy_cryptcode);
}

function copy_files(){
  $.ajax({
    url: main_url+'file/copy_files', 
    dataType: 'html',type: 'post',
    data: {del_id:$("#copy_id").val()},
    success: function (response) {
      window.location.href = main_url+'anj_drive';
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function downloadModal(dummy_cryptcode){
    window.location.href = main_url+'file/download_files/'+dummy_cryptcode;
}

$(document).ready(function(){

    // $('#shareModal').on('shown.bs.modal', function() {
    //     var button = $(event.relatedTarget).data('dummy_cryptcode_id');
    //     alert(button)
    // });

    // File type validation
    /*$("#fileInput").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
            $("#fileInput").val('');
            return false;
        }
    });*/
});  

function drive_grid_layout(){
  $("#listView").hide();
  $("#gridView").show();
}

$("#listView").hide();

function drive_list_layout(){
  $("#gridView").hide();
  $("#listView").show();
}

function submit_new_folder(){
  $.ajax({
    url: main_url+'anj_drive/insert_create_folder', 
    dataType: 'html',type: 'post',
    data: {create_folder_textbox:$("#create_folder_textbox").val()},
    success: function (response) {
      window.location.href = main_url+response;
    },
    error: function (response) {
        console.log(response);
    }
  });
}

</script>

</body>
</html>
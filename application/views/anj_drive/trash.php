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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-900 drive-heading">All Delete List</h1>
                    <div class="view-mode float-right">
                       <a class="newRequestBtn" href="#" data-toggle="modal" data-target="#deleteAllFileModal">Delete All</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="blue-boxy trash">
                    <div class="img-blue-box bin">
                        <a>
                            <img src="<?php echo base_url('assets'); ?>/images/dustbin.png" srcset="<?php echo base_url('assets'); ?>/images/dustbin.png" class="img-fluid" width="45px" alt="">
                        </a>
                    </div>
                    <div class="blue-boxy-text bin">
                        All items deleted from your account are stored in Trash for 30 days, and can be restored anytime. This is a Drive Plus feature. Would you like to upgrade? <a href="<?php echo base_url(); ?>">Upgrade now</a>
                    </div>
                </div>
            </div>
        </div>
<input type='hidden' id='del_drive_id'>
<?php //echo $trash_view; ?>
<?php
  $user_id = getProfileName('user_id');
  $query = $this->db->query("SELECT COUNT(drive_id) as total,`drive_id`, `user_id`, `share_other_people`, `file`, `file_ext`, `folder`, `eDelete`, `created_date`, `dummy_cryptcode`, `created_time`, `file_type`, `file_path`, `full_path`, `file_size`, `is_image`, `image_width`, `image_height`, `image_type`, `image_size_str`, `orig_name`, `file_folder` FROM `tbl_anjdrive` where user_id=$user_id and eDelete=1 GROUP by dummy_cryptcode ORDER BY `tbl_anjdrive`.`drive_id`  DESC");
  $drive_images = $query->result_array();
  $i = 0;
  $wrap_count = 4;
  foreach($drive_images as $key => $value){ 
    $user_valueid = $value['user_id'];
    $username = get_one_value('tbl_users','username','user_id',$user_valueid);
    $i+=1;
    if($i%$wrap_count==1) {
      echo '<div class="row">';
    }
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
	<a href="javascript:void(0)" class="deleteFolderBox" data-toggle="modal" data-target="#deleteDriveFolderModal" onclick="deldriveid('<?php echo $value['dummy_cryptcode']; ?>')">
    <?php 
        echo '<div class="deleteFolderImg">
        <img src="'.base_url('assets/images/deleteFolder.png').'" class="img-fluid" alt="">
    </div>
                      <div class="deleteFolderContent">
                          <h4>'.$value['file'].'</h4>
                          <p class="small_folder_show">
                              <span class="sm_folder_item">'.$value['file_size'].' KB</span>
                          </p>
                          <p class="folderDeleteTime">'.date('M d,Y H:i:s A',strtotime($value['created_date'])).'</p>
                      </div>
                      <div class="deleteFolderIcon">
                          <i class="far fa-trash-alt"></i>
                      </div>
                  </a>
              </div>';
    
      if($i%$wrap_count==0) {
         echo '</div>';
      }
   } 
  if($i%$wrap_count!=0) {
        echo '</div>';
  } 
  ?>

        </div>
    </div>
    <!-- End Content Page -->
</div>
<!-- End Wrapper -->

    <!--Begin Drive Delete Folder -->
    <div class="modal fade" id="deleteDriveFolderModal" tabindex="-1" role="dialog" aria-labelledby="deleteDriveFolderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteDriveFolderModalLabel">Delete Folder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <p class="mb-0">Are you sure you want to delete the files / folder ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="restore_items()">Restore</button>
            <button type="button" class="btn btn-danger" onclick="permanently_items()">Permanently Delete</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Delete Folder Modal -->

    <!--Begin Drive Delete Folder -->
    <div class="modal fade" id="deleteAllFileModal" tabindex="-1" role="dialog" aria-labelledby="deleteAllFileModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteAllFileModalLabel">Delete All</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <p class="mb-0">Are you sure you want to delete all the files / folder ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="permanently_items()">Permanently Delete</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Delete Folder Modal -->
      
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

      function deldriveid(drive_id){
        $("#del_drive_id").val(drive_id);
      }

      function restore_items() {
		event.preventDefault(); 
		var form = event.target.form; 
		        swal({
		  title: "Are you sure?",
		  text: "But you will still be able to retrieve this file.",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel please!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
	          url: main_url+'file/delete_restore_items', 
	          dataType: 'html',
	          data:{dummy_cryptcode:$("#del_drive_id").val(),eDelete:2},
	          type: 'post',
	          success: function (response) {
	            window.location.href = main_url+'anj_drive';
	          },
	          error: function (response) {
	            console.log(response);
	          }
	        });
		  } else {
		  	$("#deleteDriveFolderModal").modal('hide');
		    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	}

    function emptytrash_items(){
      $.ajax({
        url: main_url+'file/emptytrash_items', 
        dataType: 'html',
        type: 'post',
        success: function (response) {
          window.location.href = main_url+'anj_drive';
        },
        error: function (response) {
          console.log(response);
        }
      });
    }

     function permanently_items() {
		event.preventDefault(); 
		var form = event.target.form; 
		swal({
		  title: "Are you sure?",
		  text: "Are you sure you want to permanently delete the folder? This action will wipe the folder from our server and make it unrecoverable.",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel please!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
	        $.ajax({
	          url: main_url+'file/delete_restore_items', 
	          dataType: 'html',
	          data:{dummy_cryptcode:$("#del_drive_id").val(),eDelete:3},
	          type: 'post',
	          success: function (response) {
	            window.location.href = main_url+'anj_drive';
	          },
	          error: function (response) {
	            console.log(response);
	          }
	        });
		  } else {
		  	$("#deleteDriveFolderModal").modal('hide');
		    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	}


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

    </script>
</body>

</html>
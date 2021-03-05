<?php 
$user_id = getProfileName('user_id');
$q=$this->db->query("SELECT sum(file_size) as file_size FROM `tbl_anjdrive` where user_id=$user_id and eDelete IN (0,2)");
$r = $q->row_array();
//echo round($r['file_size']);exit;
if($r['file_size']){
$file_size = $r['file_size'];
} else {
$file_size = 0;
}
?>
<!-- Start Content Page -->
<div class="dd-content-page">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h5 mb-0 text-gray-900 drive-heading">My Drive</h1>
          <div class="view-mode float-right">
            <?php 
              $activegridClass=$activelistClass='';
              if($this->session->userdata('drive_grid_layout')=='grid'){
                $activegridClass= 'active';
              } 
              if($this->session->userdata('drive_list_layout')=='list'){
                $activelistClass= 'active';
              } 
            ?>
             <a href="<?php echo base_url('anj_drive'); ?>" class="<?php echo $activegridClass; ?>"><i class="fas fa-th"></i></a>
             <a href="<?php echo base_url('list'); ?>" class="<?php echo $activelistClass; ?>"><i class="fas fa-list"></i></a>
          </div>
      </div>
        <hr>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('success')?>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('error')?>
</div>
<?php endif; ?>

<!-- Begin List View Layout -->
<?php if($this->session->userdata('drive_list_layout')=='list'){ ?>
    <div class="row" id="listView">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-0 text-gray-900 drive-heading">My Folders</h1>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="sortTable">
                    <thead>
                        <tr>
                            <th style="width: 30px;">Type</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$i=0;
foreach($drive_images as $key => $value){ 
$user_valueid = $value['user_id'];

if($value['file_folder']=='1'){
  $showfilename = $value['orig_name'];
  $img = base_url('assets/images/file-type/docs.png').'';

} else if($value['file_folder']=='2'){
  $showfilename = $value['folder'];
  $showfilename = ucwords(str_replace("-"," ",$showfilename));
  $img = base_url('assets/images/file-type/folder.png');
}
$username = get_one_value('tbl_users','username','user_id',$user_valueid);
$i+=1;
?>
    <tr>
        <td class="folder">
            <img src="<?php echo $img; ?>" class="img-fluid">
        </td>
        <td><div class="fileName"><?php echo $showfilename; ?></div></td>
        <td><?php echo date('M d,Y H:i:s A',strtotime($value['created_date'])); ?></td>
        <td><?php echo $value['file_size']; ?> KB</td>
        <td class="text-center">
        <ul class="actionBtn">
            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="View" onclick="viewModal('<?php echo $value['dummy_cryptcode']; ?>')">
                <a href="javascript:void(0)" class="action_attachLink">
                <i class="fas fa-eye"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Share" onclick="shareModal('<?php echo $value['dummy_cryptcode']; ?>')">
                <a href="javascript:void(0)" class="action_attachLink share">
                <i class="fas fa-share-alt"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="DeleteModal('<?php echo $value['dummy_cryptcode']; ?>')">
                <a href="javascript:void(0)" class="action_attachLink delete">
                <i class="far fa-trash-alt"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Download" onclick="downloadModal('<?php echo $value['dummy_cryptcode']; ?>')">
                <a href="javascript:void(0)" class="action_attachLink">
                <i class="fas fa-download"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Copy" onclick="copyModal('<?php echo $value['dummy_cryptcode']; ?>')">
                <a href="javascript:void(0)" class="action_attachLink">
                <i class="far fa-copy"></i>
                </a>
            </li>
        </ul>
        </td>
    </tr>
<?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>
<!-- End List View Layout -->

<!-- Begin Grid View Layout -->

<input type='hidden' id='txt_iddummy_cryptcode'>

<?php
if($this->session->userdata('drive_grid_layout')=='grid'){
$i=0;
$wrap_count = 4;
foreach($drive_images as $key => $value){ 
$user_valueid = $value['user_id'];
if($value['file_folder']=='1'){
  $showfilename = $value['orig_name'];
} else if($value['file_folder']=='2'){
  $showfilename = $value['folder'];
  $showfilename = ucwords(str_replace("-"," ",$showfilename));
}
$username = get_one_value('tbl_users','username','user_id',$user_valueid);
$i+=1;
if($i%$wrap_count==1) {
echo '<div class="row" id="gridView">';
}
?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
        <div class="file-box">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="file-icon">
                    <i class="fas fa-folder"></i>
                </div>
                
                <div class="addUser_attach dropdown">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#shareModal" onclick="shareModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="fas fa-user-plus"></i></a>
                    <a href="javascript:void(0)" data-toggle="dropdown" onclick="linkModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="fas fa-link"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        
                        <a href="javascript:void(0)" class="dropdown-item" onclick="viewModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="dropdown-icon fas fa-eye"></i> View</a>
                        
                        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#" onclick="shareModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="dropdown-icon fas fa-share-alt"></i> Share</a>
                        
                        <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#" onclick="DeleteModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="dropdown-icon far fa-trash-alt"></i> Delete</a>
                        
                        <a href="javascript:void(0)" class="dropdown-item" onclick="downloadModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="dropdown-icon fas fa-download" data-toggle="modal" data-target="#"></i> Download</a>
                        
                        <a href="javascript:void(0)" class="dropdown-item" onclick="copyModal('<?php echo $value['dummy_cryptcode']; ?>')"><i class="dropdown-icon far fa-copy" data-toggle="modal" data-target="#"></i> Copy</a>
                    </div>
                </div>
            </div>
            <div class="fileContent-box">
                <h3 class="fileHeading"><?php echo $showfilename; ?></h3>
                <p class="fileLastModifieDate"><span><?php echo date('M d,Y H:i:s A',strtotime($value['created_date'])); ?></span></p>
            </div>
        </div>
    </div>
<?php
    if($i%$wrap_count==0) {
        echo '</div>';
    }
} 
if($i%$wrap_count!=0) {
    echo '</div>';
} 
}
?>
                <!-- End Grid View Layout -->
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
      var max_file_size_upload = '<?php echo getProfileName('max_file_size_upload'); ?>';
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

        var mins = tot / 1024;
        var limit = '<?php echo getProfileName('file_sharing_storage'); ?>';
        var db_limit = '<?php echo round($file_size); ?>';
        var remember_limits = limit - db_limit;
        
        if (mins > remember_limits) {
            $("#userfolder").val('');
            alert('You are out of space. Try to delete some files. Please Upgrade.');
            $("#uploadStatusMsgfolder").html('<span style="color:red;">You are out of space. Try to delete some files. Please <b>upgrade</b>.</span>');
            setTimeout(function(){ window.location ='<?php echo base_url('#pricing-table'); ?>' }, 3000);
            return false;
        }

        if (FileSize > max_file_size_upload) {
          $("#userfolder").val('');
            alert('You cannot upload a file that exceeds '+max_file_size_upload+' MB in size. Please try it again.');
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
            $("#one_file_f").val('');
            alert('You are out of space. Try to delete some files. Please Upgrade.');
            $("#uploadStatusMsg").html('<span style="color:red;">You are out of space. Try to delete some files. Please <b>upgrade</b>.</span>');
            setTimeout(function(){ window.location ='<?php echo base_url('#pricing-table'); ?>' }, 3000);
            return false;
        }
        
        if (FileSize > max_file_size_upload) {
          $("#one_file_f").val('');
            alert('You cannot upload a file that exceeds '+max_file_size_upload+' MB in size. Please try it again.');
            return false;
        } 

        $(".progress").show();
        var file_data = $('#one_file_f').prop('files')[0];
        var form_data = new FormData();
                         
        form_data.append('one_file', file_data);
        console.log(form_data)
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
            url: "<?php echo base_url('anj_drive/one_to_one_file'); ?>",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $(".progress-bar").width('0%');
              $('#uploadStatusMsg').html('<span style="color:red;">*Please don&#x27;t refresh or leave the page/browser, file upload is in progress</span>');
            },
            success: function(data){
              
              $("#createUploadFilesModal").modal('hide');
              setTimeout(function() {
                      swal({
                          title: '',
                          text: "file has been successfully uploaded",
                          imageUrl: "<?php echo base_url(); ?>/drive_assets/thumbs-up.jpg"
                      }, function() {
                          window.location = window.location.href = main_url+'anj_drive';;
                      });
                  }, 1000);
            }
        });
    }

function closedima(){
  location.reload();
}

  //$("#one_to_one_file").click(function(){
  //$('#one_file_f12').change(function(){        
  //});

  $(document).ready(function() {
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
    data:{dummy_cryptcode:dummy_cryptcode},
    type: 'post',
    dataType:"html",
    success: function (response) {
      $("#viewimage").html(response);
      $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1500,
            autoplayHoverPause:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:true,
                    loop:false
                }
            }
        });
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

function drive__layout(type){
  if(type=='grid'){
    $("#listView").hide();
    $("#gridView").show();
  } else if(type=='list'){
    $("#gridView").hide();
    $("#listView").show();
  }
}

function submit_new_folder(){
  $.ajax({
    url: main_url+'anj_drive/insert_create_folder', 
    dataType: 'html',type: 'post',
    data: {create_folder_textbox:$("#create_folder_textbox").val()},
    success: function (response) {
      $("#createNewFolderModal").hide();
      alert('Folder Created Successfully.');
      window.location.href = main_url+response;
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function ValidURL() {
  var url = document.getElementById("upload_url").value;
  if(url == ''){
      $(".upload_url_error").html('Please enter your url.');
      $(".upload_url_error").css('color','red');
      $(".upload_url_error").css('text-align','center');
      $("#upload_url").focus();
      return false;
  } else {
    $(".upload_url_error").html("");
    var regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (url != "") {
        /*if (!regexp.test(url)) {
          $("#upload_url").focus();
          alert("Please enter valid url.");
          return false;
        } else {*/
            $.ajax({
                url: main_url+'anj_drive/insert_upload_url',
                type: 'POST',
                dataType: 'json',
                data: { upload_url:url},
                success: function(response){
                  console.log(response)
                  if(response.msg=='0'){
                    alert("Please enter valid url.");
                    $("#upload_url").val("");
                    $("#upload_url").focus();
                    return false;
                  }
                }
              });
        //}
    } else {
        alert("Please upload an image.");
        return false;
    }
  }
}

<?php 
if(anjDrive_disabled()){ ?>
  //$('#trialModal').modal('show');
<?php } ?>

</script>
<!-- Owl Carousel JS -->
    <script src="<?php echo base_url('assets'); ?>/js/owl.carousel.min.js"></script>

    <script type="text/javascript">
    
    </script>

</body>
</html>
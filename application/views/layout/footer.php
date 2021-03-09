<script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/validator.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula/dragula.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/'); ?>emoji/emojionearea.min.css">
<script type="text/javascript" src="<?php //echo base_url('assets/'); ?>emoji/emojionearea.min.js"></script>
 -->

<style type="text/css">
  .box{display: none;}
</style>

<?php

?>

<script>
setInterval(function(){
  check_user();
},3000);
function check_user(){
  jQuery.ajax({
    url:'<?php echo base_url('ajax/user_auth'); ?>',
    type:'post',
    data:'type=ajax',
    success:function(result){
      console.log(result);
      if(result=='logout'){
        alert('Your session will expire')
        window.location.href='<?php echo base_url('logout'); ?>';
      }
    }
    
  });
}
</script>


<script type="text/javascript">

  //Nice trick! but not permitted!
var max_file_size_upload = '<?php echo getProfileName('max_file_size_upload'); ?>';
var main_url = '<?php echo base_url(); ?>';
var main_url_dashboard = main_url+'dashboard/';
var timeoutHandle;

<?php 
$qry=$this->db->query("SELECT `user_id` FROM `tbl_page_refresh` where user_id = '".getProfilename('user_id')."'");
$result = $qry->row_array(); 
if($result['user_id']){
?>
$.ajax({
    url: main_url+'ajax_comman/tbl_page_refresh',
    type: 'POST',dataType:'html',
    data:{inviteCopyLink:$("#inviteCopyLink").val()},
    cache: false,
    success: function(response) {
      window.location.href = response;
    }
  });
<?php } ?>

$(".js-select2").select2({
closeOnSelect : true,
placeholder : "search email id",
allowHtml: true,
allowClear: true,
tags: true,
selectOnClose: true
});

$(document).ready(function(){

<?php 
$uid = getProfileName('user_id');
$queryrunning = $this->db->query("SELECT package_date FROM `tbl_users` WHERE package_date!='0000-00-00 00:00:00' and user_id=$uid");
$runningpackage_date = $queryrunning->row_array();

$check_package = dayscounts($runningpackage_date['package_date']); 
if($check_package==2 || $check_package==1){ ?>
//$('#trialModal').modal('show');

<?php } ?>
if ($.cookie('expir1') == null) {
//$('#trialModal').modal('show');
$.cookie('expir1', '10');
}

  all_function_call();
  project_status_check();
  //showRemaining_manish('2020-11-25');  
  $('[data-toggle="tooltip"]').tooltip();
  /*$("#comment_p").emojioneArea({
      standalone: true
      saveEmojisAs: true,
      pickerPosition: "bottom",
      filtersPosition: "bottom",
      searchPosition: "bottom"
    });*/

  /*$('#comment_p').summernote({
      height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link','emoji']],
            ['fullscreen', ['fullscreen']],
        ]
  });*/

  $('#edit_task_description').summernote({
      height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['fullscreen', ['fullscreen']],
        ]
  });

});

$(function(){

  $('#anotherCardModal').keypress(function(e){
    if(e.which == 13) {
      submit_title_new();
    }
  })
  $('#anotherListModal').keypress(function(e){
    if(e.which == 13) {
      submit_rename_to_status();
    }
  })

})

function submit_permission(){
  var add_team = $('input[name="add_team"]:checked').val();
  var add_account = $('input[name="add_account"]:checked').val();
  var project_permission_val = [];
  var checkboxes=document.getElementsByName("project_permission");   
    $('input[name=project_permission]:checked').each(function(){ 
    project_permission_val.push($(this).val());
  });

  var label_permission_val = [];
  var checkboxes=document.getElementsByName("label_permission");   
    $('input[name=label_permission]:checked').each(function(){ 
    label_permission_val.push($(this).val());
  });

  var task_permission_val = [];
  var checkboxes=document.getElementsByName("task_permission");   
    $('input[name=task_permission]:checked').each(function(){ 
    task_permission_val.push($(this).val());
  });

  $.ajax({
    url: main_url+'ajax_comman/access_permission', 
    dataType: 'html',type: 'post',
    data:{add_team:add_team,add_account:add_account,project_permission_val:project_permission_val,label_permission_val:label_permission_val,task_permission_val:task_permission_val,project_id:$("#project_id_new_INSERT").val(),url:document.URL},
    success: function (response) {
      jQuery("#permissionModal").modal('hide');
    },
    error: function (response) {
        console.log(response);
    }
  });

}

function addaccountemail(){
  $.ajax({
    url: main_url+'ajax_comman/addaccountemail_insert', 
    dataType: 'html',type: 'post',
    data:{addaccountemail:$("#addaccountemail").val()},
    success: function (response) {
      location.reload();
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function ajax_permission_ajax(){
  $.ajax({
    url: main_url+'ajax_comman/ajax_permission_ajax', 
    dataType: 'html',type: 'post',
    data:{project_id:$("#project_id_new_INSERT").val()},
    success: function (response) {
      $("#permission_ajax").html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function ajax_show_project_time(){
  var project_id = $("#project_id_new_INSERT").val();
  $.ajax({
    url: main_url+'ajax_comman/ajax_show_project_time', 
    dataType: 'html',type: 'post',
    data:{project_id:project_id},
    success: function (response) {
      if(response){
        //showRemaining_manish(response,'show_project_time');
      }
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function permissionclass_validation(){
  alert("please select project after use permission button");
}

$('#permissionModal').on('show.bs.modal', function (event) {
  ajax_permission_ajax();
});

function all_function_call(){
  edit_task_assigned_to_drop();
  ajax_background();
  ajax_background_frm();
  ajax_getNotificationList();
  ajax_showAllTeamModal();
  ajax_edit_task_status();
  show_header_team_image();
  getEmailID_list();
  get_assing_project_email();
  ajax_show_project_time();  
}


var BASE_URL = "<?php echo base_url(); ?>";

 $(document).ready(function() {

  $('#start_date').datetimepicker({
    format:'Y-m-d H:i:s',
    autoclose: true
  });

  $('#due_date').datetimepicker({
    format:'Y-m-d H:i:s',
    autoclose: true
  });
  
  $('#StartDate').datetimepicker({
    format:'Y-m-d H:i:s',
    autoclose: true,
    onSelect: function(date) {
      $("#EndDate").datetimepicker('option', 'minDate', date);
    },
    onClose: function (selected) {
      if(selected.length <= 0) {
          $("#EndDate").datetimepicker('disable')
      } else {
          $("#EndDate").datetimepicker('enable');
      }
      $("#EndDate").datetimepicker("option", "minDate", selected);
    }
  });

  $('#EndDate').datetimepicker({
    format:'Y-m-d H:i:s',
    autoclose: true,
    orientation: "top",
    onClose: function (selected) {
      if(selected.length <= 0) {
          $("#StartDate").datetimepicker('disable')
      } else {
          $("#StartDate").datetimepicker('enable');
      }
      $("#StartDate").datetimepicker("option", "maxDate", selected);
    }
  });
  
  $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "ajax_comman/search",
            data: { term : request.term },
            dataType: "json",
            success: function(data){
              console.log(data[0])
              console.log(data.project_name)
               var resp = $.map(data,function(obj){
                    return obj.project_name;
               }); 
               response(resp);
            },
            select: function( event, ui ) {
              window.location.href = ui.item.project_id;
            }
        });
    },
    minLength: 1
 });

});
 
 // File type validation
    $("#project_documentation").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX).');
            $("#project_documentation").val('');
            return false;
        }
    });

 

/*document.addEventListener("keydown",function(){return 123==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&event.shiftKey&&73==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&85==event.keyCode?(alert("Nice trick! but not permitted!"),!1):void 0},!1),document.addEventListener?document.addEventListener("contextmenu",function(e){alert("Nice trick! but not permitted!"),e.preventDefault()},!1):document.attachEvent("oncontextmenu",function(){alert("Nice trick! but not permitted!"),window.event.returnValue=!1});
*/

/*document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}
*/
        function myFunction_old_password() {
          var x = document.getElementById("old_password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        function myFunction_password() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        function myFunction_confirm_password() {
          var x = document.getElementById("confirm_password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

    $('#edit_task_file').change(function(){
        var files = $('#edit_task_file')[0].files;
        var error = '';
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        var file = this.files[0];
        var fileType = file.type;
        var taskfilesize = file.size / 1024 / 1024;
        if (taskfilesize > max_file_size_upload) {
          $("#edit_task_file").val('');
            alert('You cannot upload a file that exceeds '+max_file_size_upload+' MB in size. Please try it again.');
            return false;
        } 
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX).');
            $("#edit_task_file").val('');
            return false;
        }
        var form_data = new FormData();
        if(files==''){
          alert("pl")
          return false;
        }
        for(var count = 0; count<files.length; count++)
        {
         var name = files[count].name;
         var extension = name.split('.').pop().toLowerCase();
         form_data.append("edit_task_file[]", files[count]);
         /*if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
         {
          error += "Invalid " + count + " Image File"
         }
         else
         {
          form_data.append("edit_task_file[]", files[count]);
         }*/
        }
        console.log(form_data)
        form_data.append('task_id',$("#edit_task_id").val());
        if(error == '')
        {
           $.ajax({
            xhr: function() {
                  var xhr = new window.XMLHttpRequest();
                  xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                          var percentComplete = ((evt.loaded / evt.total) * 100);
                          percentComplete = percentComplete.toFixed(2);
                          $("#uploadedimages").width(percentComplete + '%');
                          $("#uploadedimages").html(percentComplete+'%');
                      }
                  }, false);
                  return xhr;
              },
            url:main_url+"tasks/upload_multiple_upload",
            method:"POST",
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
              //$("#uploaded_images").css({"border": "1px solid #000"});
              $("#uploadedimages").addClass('progress-bar');
             //$('#uploaded_images').html("<label class='text-success'>Uploading Files...</label>");
             $("#uploadedimages").width('0%');
            },
            success:function(data)
            {
              $("#uploadedimages").removeClass('progress-bar');
              $('#uploaded_images').html(data);
              $('#files').val('');
              $("#uploadedimages").html('');
            }
           })
         } else {
            alert(error);
          }

       });

function delete_task_file(multiple_image_id,task_id){
  $.ajax({
    url: main_url+'tasks/delete_task_file', 
    dataType: 'html',type: 'post',
    data: {multiple_image_id:multiple_image_id,task_id:task_id},
    cache: false,
    success: function (response) {
      $("#successalertsuccess").html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+response+' delete file</div>');
      getimgBYtask(task_id);
    }
  });
}

function download_task_file(multiple_image_id,task_id)
{
   window.location.href = main_url+'tasks/download_files/'+multiple_image_id+'/'+task_id;
}

function edittask_close()
{
  $('#nav-task_information').attr('aria-selected',true);
  $('#nav-attachment-tab').attr('aria-selected', 'false');
  $('#nav-comment').attr('aria-selected', 'false');
  $("#nav-task_information").addClass("active show");
  $("#nav-attachment-tab").removeClass("active show");
  $("#nav-comment").removeClass("active show");
}

</script>

<script src="<?php echo base_url('assets/'); ?>js/anj/bigbull.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/invite.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/comanj.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/task.js"></script>
</body>
</html>
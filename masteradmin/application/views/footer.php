 <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; ANJPMS <?php echo date("Y"); ?></div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
</div>

 </div>
       
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link href="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/css/jquery.datetimepicker.min.css" rel="stylesheet"/>
<script src="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/js/jquery.datetimepicker.js"></script>

<script type="text/javascript">
var mainUrl = 'https://anjpms.com/';
$(document).ready(function() {
  $('#description').summernote();
      $('#dataTable_tbl_feedback').dataTable();

});

  $(document).ready(function(){
    if('<?php echo $this->uri->segment(2); ?>'=='tasklist'){
      ajax_listTabletbl_task();
    
    } else if('<?php echo $this->uri->segment(2); ?>'=='bloglists'){
      ajax_listTabletbl_blog(); 
       
    } else {
      ajax_listTable('tbl_permission'); 
      ajax_listTable('tbl_users');
      ajax_listTable('tbl_user_type');
      ajax_listTable('tbl_rolename');
      ajax_listTable('tbl_project');
    }    
  });

  function ajaxdelete_tbl_blog(blog_id){
     var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajaxdelete_tbl_blog'); ?>',
          type: 'POST',
          data: { blog_id:blog_id },
          success: function(response){
            ajax_listTabletbl_blog();
          }
        });
     }
  }

  function ajaxdelete_tbl_feedback(feedback_id){
     var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajaxdelete_tbl_feedback'); ?>',
          type: 'POST',
          data: {feedback_id:feedback_id},
          success: function(response){
            window.location.href = response;
          }
        });
     }
  }

  function ajax_listTabletbl_blog(){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_listTabletbl_blog'); ?>",             
          dataType: "html",                
          success: function(response){ 
              $("#fetchRecordtbl_blog").html(response); 
          }
      });
  }


  function ajax_listTabletbl_feedback(){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_listTabletbl_feedback'); ?>",             
          dataType: "html",                
          success: function(response){ 
            alert(response)
              $("#fetchRecordtbl_feedback").html(response); 
          }
      });
  }


  function ajax_listTabletbl_task(){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_listTabletbl_task'); ?>",             
          dataType: "html",                
          success: function(response){ 
              $("#fetchRecordtbl_task").html(response); 
          }
      });
  }

  function ajax_listTable(table){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_listTable'); ?>",             
          dataType: "html", 
          data:{table:table},               
          success: function(response){ 
              $("#fetchRecord"+table).html(response); 
          }
      });
  }
  function ajaxdelete_tbl_users(user_id){
    $(this).parent('tr').remove();
     var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajax_delete_table'); ?>',
          type: 'POST',
          data: { id:user_id,table:'tbl_users' },
          success: function(response){
            ajax_listTable('tbl_users');
          }
        });
     }
  }

  function ajaxdelete_tbl_user_type(user_type_id){
     var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajax_delete_table'); ?>',
          type: 'POST',
          data: { id:user_type_id,table:'tbl_user_type' },
          success: function(response){
            ajax_listTable('tbl_user_type');
          }
        });
     }
  }

  function ajaxdelete_tbl_rolename(rolename_id){
     var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajax_delete_table'); ?>',
          type: 'POST',
          data: { id:rolename_id,table:'tbl_rolename' },
          success: function(response){
            ajax_listTable('tbl_rolename');
          }
        });
     }
  }

  function ajaxdelete(id){
    var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajaxdelete'); ?>',
          type: 'POST',
          data: { table_id:id,table:$("#table_id").val()},
          success: function(response){
            ajax_listTable($("#table_id").val());
          }
        });
     }
  }

  function ajaxdelete_tbl_project(project_id){
    var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajaxdelete_tbl_project'); ?>',
          type: 'POST',
          data: { project_id:project_id},
          success: function(response){
            ajax_listTable('tbl_project');
          }
        });
     }
  }

  function ajaxdelete_tbl_task(task_id){
    var confirmalert = confirm("Are you sure?");
     if (confirmalert == true) {
        $.ajax({
          url: '<?php echo base_url('admin/ajaxdelete_tbl_task'); ?>',
          type: 'POST',
          data: { task_id:task_id},
          success: function(response){
            ajax_listTabletbl_task();
          }
        });
     }
  }

  function activeInactive(user_id,status) {
      var message = ((status == 0?" inactive ":" Active "));
      if (confirm("Are you sure to"+ message+ "the user")){
          $.post("<?php echo base_url('admin/ajax_user_activeInactive'); ?>",{key:"activeInactive",status:status,user_id:user_id},function (response) {
              if (response == "1"){
                  if (status == 1){
                      $('#activeBtn'+user_id).show();
                      $('#inactiveBtn'+user_id).hide();
                  }else if (status == 0){
                      $('#inactiveBtn'+user_id).show();
                      $('#activeBtn'+user_id).hide();
                  }
                  alert("User is "+ message +"now");
              }
              ajax_listTable('tbl_users');
          });
      }
  }

// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable_tbl_task').DataTable();

  $('#dataTable_tbl_usertype').DataTable();


  $('#due_date').datetimepicker({
    format:'Y-m-d H:i:s',
    minDate: 0,
    autoclose: true
  });

  $('#start_date').datetimepicker({
    format:'Y-m-d H:i:s',
    minDate: 0,
    autoclose: true
  });

  $('#deadline').datetimepicker({
    format:'Y-m-d H:i:s',
    minDate: 0,
    autoclose: true
  });


});

function validateEmail1(inputText){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(inputText.value) == false) 
    {
        $("#account_email").val('');
        $("#errormsgaccount_email").html('Invalid Email Address');
        $("#errormsgaccount_email").css("color", "red");
        document.form_permission.account_email.focus();
        return false;
    } else {
        $("#errormsgaccount_email").html('');
        $.ajax({
            url: mainUrl+'ajax_comman/checked_email',
            type: 'post',
            dataType:'html',
            data: {'email':$("#account_email").val()},
            success:function(response) { 
                $("#email_error").remove();
                $("#account_email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
            },
            error:function(e) {
            }
        });
    }
 }

function addrole_submit(){
    $.ajax({
    url: mainUrl+'ajax_comman/addrole_submit', 
    dataType: 'html',type: 'post',
    data:{designation:$("#new_rolename").val()},
    success: function (response) {
      location.reload();
        $("#addroleModal").modal('hide');
        $("#role_name").html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}


function ConvertMegabytes()
{
  ResetBytes();
  var megabytes = document.getElementById("megabytes").value;
  var kilobytes10 = +((megabytes * 1000).toFixed(9));
  document.getElementById("file_sharing_storage").value = kilobytes10;
  return false;
}
function ResetBytes() {
  document.getElementById("file_sharing_storage").value = "0";
}
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

$("#month_year").change(function(){
  $.ajax({
      url: '<?php echo base_url('adddb/get_month_year'); ?>',
      dataType: 'json',type: 'post',
      data: {month_year:$("#month_year").val()},
      success: function(response){
        $("#price").val(response.price);
        $("#total_user_support").val(response.total_user_support);
        $("#file_sharing_storage").val(response.file_sharing_storage);
        $("#max_file_size_upload").val(response.max_file_size_upload);
      }
    });
});

$(document).ready(function() {

  if('<?php echo $this->uri->segment(2); ?>'=='add_task'){
    
    ajax_getLabels($("#project_id").val(),$("#edit_status_id").val());
  }

});

$('#project_id').change(function() {
    ajax_getLabels($(this).val());
});

function ajax_getLabels(project_id,status_id=''){

  $.ajax({
      url: '<?php echo base_url('admin/ajax_getLabels'); ?>',
      type: 'POST',
      dataType: 'json',
      data: { project_id:project_id,status_id:status_id},
      success: function(response){
        $("#status_id").html(response.html);
        $("#projectuser_id").val(response.projectuser_id);
        $("#combo_id").val(response.combo_id);
      }
    });
}

</script>
</body>
</html>
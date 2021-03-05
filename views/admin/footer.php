</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/admin/'); ?>js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/admin/'); ?>assets/demo/datatables-demo.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script type="text/javascript">

function submit_attendance_clock_out(){
	$.ajax({
	url: '<?php echo base_url('employee/submit_attendance_clock_out'); ?>',
	type: 'POST',
	dataType: 'html',
	data: { clock_out:$("#clock_out").val()},
	success: function(response){
	  //alert(response)
	  window.location.href = "<?php echo base_url('admin'); ?>";
	},
    error: function (response) {
          console.log(response)
    }
	});
}

function submit_attendance(){
	$.ajax({
	url: '<?php echo base_url('employee/addattendance'); ?>',
	type: 'POST',
	dataType: 'html',
	data: { project_id:$("#project_id").val(),task_id:$("#task_id").val(),start_date:$("#start_date").val(),clock_in:$("#clock_in").val()},
	success: function(response){
	//	alert(response)
	  window.location.href = "<?php echo base_url('admin'); ?>";
	},
    error: function (response) {
          console.log(response)
    }
	});
}

function init ( )
{
  timeDisplay = document.createTextNode ( "" );
  document.getElementById("clock").appendChild ( timeDisplay );
}

function updateClock ( )
{
  var currentTime = new Date ( );
  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
  var currentTimeStringm = currentHours + ":" + currentMinutes + ":" + currentSeconds;
  document.getElementById("clockin").firstChild.nodeValue = currentTimeString;
  document.getElementById("clockout").firstChild.nodeValue = currentTimeString;
  document.getElementById("clock_in").value = currentTimeStringm;
  document.getElementById("clock_out").value = currentTimeStringm;
}
</script>
    </body>


<script type="text/javascript">
  $(document).ready(function() {
    $('#custom_message').summernote({
      height: 400,
      onImageUpload: function(files, editor, welEditable) {
        url = $(this).data('upload');
          alert(url)
          sendFile(files[0], editor, welEditable);
        }
    });

    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append("files", file);
        $.ajax({
            data: data,type: "POST",
            url: "<?php echo base_url('admin/summernote_upload_post'); ?>",
            cache: false,contentType: false,processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
            }
        });
    }

  }); 

  $(document).ready(function(){
    getLocation();
    ajax_listTable('tbl_users');
    ajax_listTable('tbl_user_type');
    ajax_listTable('tbl_rolename');
  });

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
    //$(this).parent('tr').remove();
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
    //$(this).parent('tr').remove();
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
              ajax_userlists();
          });
      }
  }

  function ajax_userlists(){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_userlists'); ?>",             
          dataType: "html",                
          success: function(response){ 
              $("#fetchRecordUsers").html(response); 
          }
      });
  }
  
  function ajax_rolelists(){
    $.ajax({   
          type: "POST",
          url: "<?php echo base_url('admin/ajax_rolelists'); ?>",             
          dataType: "html",                
          success: function(response){ 
              $("#fetchRecordRoles").html(response); 
          }
      });
  }

function logoutlatlong(){
  var confirmalert = confirm("Are you sure logout?");
     if (confirmalert == true) {
       if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition2);
      }
     }
}

function showPosition2(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  var logintype = 'last';
  $.ajax({
      url: '<?php echo base_url('admin/ajax_lat_long'); ?>',
      type: 'POST',
      data: { lat:lat,long:long,logintype:logintype },
      success: function(response){
        window.location.href = "<?php echo base_url('login/logout'); ?>";
      }
    });
}

var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  var logintype = 'first';
  $.ajax({
      url: '<?php echo base_url('admin/ajax_lat_long'); ?>',
      type: 'POST',
      data: { lat:lat,long:long,logintype:logintype },
      success: function(response){
      }
    });
}

$('#country_id').change(function() {
    var country_id= $(this).val(); 
    console.log(country_id);
    $.ajax({
      url: '<?php echo base_url('main/ajax_state'); ?>',
      type: 'POST',
      dataType: 'html',
      data: { country_id:country_id},
      success: function(response){
        $("#state_id").html(response);
      }
    });
});
$('#state_id').change(function() {
    var state_id= $(this).val(); 
    console.log(state_id);
    $.ajax({
      url: '<?php echo base_url('main/ajax_city'); ?>',
      type: 'POST',
      dataType: 'html',
      data: { state_id:state_id},
      success: function(response){
        $("#city_id").html(response);
      }
    });
});
</script>
</html>
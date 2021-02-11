/*
|-------------------------------------------------------------------------
| Copyright (c) 2020 
| This script may be used for non-commercial purposes only. For any
| commercial purposes, please contact the author at sanghanimanish800@gmail.com
|-------------------------------------------------------------------------
*/

$('#removeTeamMemberModal').on('show.bs.modal', function (event) {
  ajax_showAllTeamModal();
});

function postReply(commentId) {
    $('#commentId').val(commentId);
    $("#name").focus();
}

$("#submitButton").click(function () {
  var edit_task_id = $("#edit_task_id").val();

  if($("#comment_p").val()==''){
    alert("please enter comment");
    $("#comment_p").focus();
    return false;
  }
    $.ajax({
        url: main_url+"comment/comment_add",
        data: {projectID:$("#projectID").val(),edit_task_id:edit_task_id,comment:$("#comment_p").val()},
        type: 'post',
        cache: false,
        /*beforeSend: function(){
          $("#showloading").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
        },*/
        success: function (response)
        {
          $("#comment_p").val("");
          $("#commentId").val("");
          listComment(edit_task_id);
          //$("#showloading").empty();
        }
    });
});

function listComment(task_id) {
  //$("#output_comment").html('');
  $.ajax({
    url: main_url+'comment/comment_list', 
    dataType: 'html',type: 'post',
    data: {task_id:task_id},
    cache: false,
    /*beforeSend: function(){
      $("#showloading").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function (response) {
      console.log(response)
        //alert(response)
        jQuery("#addTeamModal").modal('hide');
        if(response){
          $("#output_comment").html(response);
          //timeoutHandle = setTimeout(listComment(task_id), 5000);  
        }
      //$("#showloading").empty();
    }
  });
}

$('.close').click(function(event) {
    console.log("stopped")
    clearTimeout(timeoutHandle);
});

/*function refreshComments() {
    $.get("getComments.php", function(data) {
        $("#output_comment").html(data);
    });
}*/



$("input[name='projectList_checkbox']").click(function(){
  var val = $(this).attr('value');
  $.ajax({
    url: main_url+'ajax/checkbox_session_store', 
    dataType: 'html',type: 'post',
    data: {val:val,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    success: function (response) {
      window.location.href = main_url_dashboard;
    },
    error: function (response) {
        console.log(response);
    }
  });
});

$('input[name="projectList_checkbox"]').click(function() {
   $('input[name="projectList_checkbox"]').not(this).prop("checked", false);
});

function checkProjectaddornot(){
  alert('Please add project after use')
}

function cusomt_notifi(){
  //document.getElementById('toast').innerHTML='<b>Please wait, Your download will start soon!!!</b>'; 
  //setTimeout(function() {document.getElementById('toast').innerHTML='';},5000);
}

function getdata_addteam(){
  //$("#ajax_showAllTeamModal").html('text');
}

$('#addCommentModal').on('show.bs.modal', function (event) {
  jQuery("#editTaskModal").modal('hide');
  jQuery("#viewTaskDetailModal").modal('hide');
  //listComment($("#edit_task_id").val());
  if($("#edit_task_id").val()){
    setTimeout(listComment($("#edit_task_id").val()),5000);
  } else {
    setTimeout(listComment($("#edit_task_idview").val()),5000);
  }
  
});


$('#viewTaskDetailModal').on('show.bs.modal', function (event) {
  $("#countdown").html();
  var button = $(event.relatedTarget);
  $.ajax({
    url: main_url+'ajax_task/get_value_edit_task',
    type: 'POST',cache: false,dataType:'json',
    data:{task_id:$(event.relatedTarget).data('task-id'),projectCombo_id:$("#projectCombo_id").val()},
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
      $("#countdown").html();
      showRemaining_manish(response.created_at);
      $(".headingTaskName").html(response.title);
      $("#edit_task_idview").val(response.id);
      $(".headingTaskDescription").html(response.description);
      if(response.priority==1){
        $(".headingTaskPriority").html('Low Priority');
      } else if(response.priority==2){
        $(".headingTaskPriority").html('Medium Priority');
      } else if(response.priority==3){
        $(".headingTaskPriority").html('High Priority');
      }
      $(".headingTaskDueDate").html(response.due_date);
      var qaz = response.assigned_to;
      $(".headingTaskAssignToPersonName").html(get_assingName_task(qaz));
      
      $.ajax({
        url: main_url+'tasks/viewtaksfiles', 
        dataType: 'html',type: 'post',
        data: {task_file:response.task_file,task_id:response.id},
        cache: false,
        success: function (response) {
          if(response){
            var abcd = main_url+'uploads/task/'+response;
            var htmlfile = '<a href="'+abcd+'" download="'+response+'"><img src="'+abcd+'" id="onChangeImg" class="img-fluid"></a>';
          } else {
            var htmlfile = '<a href="notDelete.png" download="notDelete.png"><img src="'+main_url+'uploads/notDelete.png" id="onChangeImg" class="img-fluid"></a>';
          }
          $("#headingTaskAttachment").html(htmlfile);
        }
      });

    }
  });
});

$('#editTaskModal').on('show.bs.modal', function (event) {
  $("#output_comment").html('');
  var button = $(event.relatedTarget);
  window.clearTimeout(timeoutHandle);
  $('#edit_task_description').summernote('code', '');
  $("#edit_task_id").val($(event.relatedTarget).data('task-id'));
  listComment($(event.relatedTarget).data('task-id'))
  $.ajax({
    url: main_url+'ajax_task/get_value_edit_task',
    type: 'POST',dataType:'json',cache: false,
    data:{task_id:$(event.relatedTarget).data('task-id'),projectCombo_id:$("#projectCombo_id").val()},
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
      $("#edit_task_title").val(response.title);
      $("#edit_task_description").val(response.description);
      $('#edit_task_description').summernote('code', response.description);
      $("#edit_task_priority").val(response.priority);
      $("#due_date").val(response.due_date);
      $("#start_date").val(response.start_date);
      var qaz = response.assigned_to;
      var dataarray = qaz.split(",");
      $("#edit_task_assigned_to").val(dataarray);
      $("#edit_task_fileOLD").val(response.task_file);
      $("#edit_task_status").val($(event.relatedTarget).data('status-id'));
        getimgBYtask(response.id);
      /*if(response.task_file){
        document.getElementById("edit_task_fileOLD_img").src = main_url+'uploads/'+response.task_file;
      } else {
        document.getElementById("edit_task_fileOLD_img").src = main_url+'uploads/'+'not_delete_image_by_defult_user_image.jpg';
      }*/
    }
  });
});

function getimgBYtask(task_id){
  $.ajax({
    url: main_url+'tasks/ajax_getimgBYtask', 
    dataType: 'html',type: 'post',
    data:{task_id:task_id},
    success: function (response) {
      $('#uploaded_images').html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}

$("#edit_task_assigned_to").val('0');

  $('#edit_task_submit').on('click', function () {
      var edit_task_title = $("#edit_task_title").val();
      var edit_task_id = $("#edit_task_id").val();
      var edit_task_description = $("#edit_task_description").val();
      var edit_task_priority = $("#edit_task_priority").val();
      var edit_task_assigned_to = $("#edit_task_assigned_to").val();
      var edit_task_fileOLD = $("#edit_task_fileOLD").val();
      var file_data = $('#edit_task_file').prop('files')[0];
      var form_data = new FormData();
      form_data.append('edit_task_file', file_data);
      form_data.append('edit_task_title', edit_task_title);
      form_data.append('edit_task_id', edit_task_id);
      form_data.append('edit_task_description', edit_task_description);
      form_data.append('edit_task_priority', edit_task_priority);
      form_data.append('due_date', $("#due_date").val());
      form_data.append('start_date', $("#start_date").val());
      form_data.append('edit_task_assigned_to', edit_task_assigned_to);
      form_data.append('edit_task_fileOLD', edit_task_fileOLD);
      form_data.append('projectID',$("#projectID").val());
      form_data.append('projectMain_user_id',$("#projectMain_user_id").val());
      form_data.append('projectCombo_id',$("#projectCombo_id").val());
      form_data.append('edit_task_status',$("#edit_task_status").val());
      form_data.append('url',window.location.href);
      console.log(form_data)
      $("#loader").css({"text-align": "center", "padding-top": "100px"});
      $.ajax({
          url: main_url+'ajax_task/editTask', 
          dataType: 'html', cache: false,contentType: false,processData: false,
          data: form_data,type: 'post',
          beforeSend: function(){
            $("#loading-overlay").show();
            //$("#loader").html('<img src="'+main_url+'/assets/loader.gif" style="text-align:center;"/> Connecting...');
          },
          success: function (response) {
              
              /*setTimeout(function() {
              swal({
              title: '',
              text: "task has been update successfully"
              }, function() {
              jQuery("#editTaskModal").modal('hide');
              });
              }, 1000);*/

              $("#teamProfile").html(response);
              project_status_check();
              all_function_call();
              $("#loading-overlay").hide();
              jQuery("#editTaskModal").modal('hide');
          },
          error: function (response) {
              console.log(response);
          }
      });
  });
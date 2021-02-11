function project_status_check(){ 
  $.ajax({
    url: main_url+'ajax/ajax_tasklists',
    type: 'POST',dataType:'html',
    data:{project_id_new:$("#project_id_new_INSERT").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    success: function(response) {
      if(response==1){
        $('.project_list_area').css('display','block');
        $(".project_list_area").show();
        ajax_all_project();
      } else {
        $("#board").html(response);
      }
        //timeoutHandle = setTimeout(project_status_check(), 9000000);
        //timeoutHandle = setInterval(project_status_check(0), 11000);
    }
  });
}

function ajax_all_project() {
  $.ajax({
    url: main_url+'ajax/ajax_all_project', 
    type: 'POST',dataType:'html',
    success: function (response) {
      $("#show_project_time").html("");
      $(".project_list_area").html(response);
    }
  });
}

function get_assing_project_email() {
  /*$.ajax({
    url: main_url+'ajax_comman/get_assing_project_email', 
    type: 'POST',dataType:'html',
    data:{projectID:$("#projectID").val(),projectMain_user_id:$("#projectMain_user_id").val()},
    success: function (response) {
      $(".inviteTeamGroup").html(response);
    }
  });*/
}

function getEmailID_list() {
    $.ajax({
    url: main_url+'ajax_comman/getEmailID_list', 
    dataType: 'html',type: 'post',
    success: function (response) {
      $("#txt_search").html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function edit_task_assigned_to_drop(){
  $.ajax({
    url: main_url+'ajax_comman/edit_task_assigned_to_drop',
    type: 'POST',dataType:'html',
    data:{projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    success: function(response) {
        $("#edit_task_assigned_to").html(response);
    }
  });
}

function ajax_background_frm(){
  $.get(main_url+'ajax_comman/ajax_background', function(data) {
    if(data==''){
      var imageUrl = main_url+'uploads/bg/trello-bodyBg.jpg';
    } else {
      var imageUrl = main_url+'uploads/'+data;
    }
    $("#onChangeImg1").attr('src',imageUrl);
  });
  
}

function ajax_background(){
  var projectID = $("#projectID").val();
  $.ajax({
    url: main_url+'ajax_comman/ajax_background',
    type: 'POST',dataType:'html',
    data:{projectID:projectID},
    success: function(response) {
        if(response==''){
          var imageUrl = main_url+'uploads/bg/trello-bodyBg.jpg';
        } else {
          var imageUrl = main_url+'uploads/'+response;
        }
        $('.common_dashboard_trello').css({'background-image':'url(' + imageUrl + ')','background-color':'transparent'});
        $("#onChangeImg1").attr('src',imageUrl);
       //window.setTimeout(ajax_background, 6000);
    }
  });
}

function ajax_getNotificationList(){
  $.ajax({
    url: main_url+'ajax_comman/ajax_getNotificationList',
    type: 'POST',dataType:'json',
    success: function(response) {
        console.log(response['list'])
        if(response['total']){
          $("div.notification-box").addClass('alertIcon ');
        } else {
          $("div.notification-box").removeClass('alertIcon ');
        }
        $("#getNotificationList").html(response['list']);
        $('.notification-count').html(response['total']);
        //window.setTimeout(ajax_getNotificationList, 9000);
    }
  });
}

function ajax_showAllTeamModal(){
  $.ajax({
    url: main_url+'ajax_comman/ajax_showAllTeamModal',
    type: 'POST',dataType:'html',
    data:{projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    success: function(response) {
        $("#ajax_showAllTeamModal").html(response);
    }
  });
}

function ajax_edit_task_status(){
  $.ajax({
    url: main_url+'ajax_comman/ajax_edit_task_status',
    type: 'POST',dataType:'html',
    data:{project_id:$("#project_id_new_INSERT").val(),combo_id:$("#projectCombo_id").val()},
    success: function(response) {
        $("#edit_task_status").html(response);
    }
  });
}

function hidecode(){
  
}
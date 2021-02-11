function submit_inviteTeam(){
  var txt_search = $("#txt_search").val();
  $.ajax({
    url: main_url+'ajax_task/send_email_inviteteam', 
    dataType: 'html',type: 'post',
    data: {txt_search:txt_search,projectASSIGN:$("#projectASSIGN").val(),projectID:$("#projectID").val(),projectMain_user_id:$("#projectMain_user_id").val(),inviteCopyLink:$("#inviteCopyLink").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function (response) {
      //alert(response)
      $("#txt_search").val('');
      all_function_call();
      jQuery("#inviteaddTeamModal").modal('hide');
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function inviteteam(){
  var projectMain_user_id = $("#projectMain_user_id").val();
  var projectID = $("#projectID").val();
  $.ajax({
    url: main_url+'ajax/inviteteam', 
    dataType: 'html',type: 'post',
    data: {projectID:projectID,projectMain_user_id:projectMain_user_id,projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function (response) {
        jQuery("#inviteTeamModal").modal('hide');
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function submit_addTeam(){
   var checkbox_addteam_val = [];
   var checkboxes=document.getElementsByName("checkbox_addteam");
   var is_checked=false;
   for(var i=0;i<checkboxes.length;i++)
   {
      if(checkboxes[i].checked)
      {
        is_checked=true;
      }
   }
   if(is_checked){
      $('input[name=checkbox_addteam]:checked').each(function(){ 
        checkbox_addteam_val.push($(this).val());
      });
      //alert(checkbox_addteam_val)
      $.ajax({
        url: main_url+'ajax_task/submit_addTeam', 
        dataType: 'html',type: 'post',
        data: {checkbox_addteam_val:checkbox_addteam_val,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
        cache: false,
        /*beforeSend: function(){
          $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
        },*/
        success: function (response) {
            all_function_call();
            project_status_check();
            $("#teamProfile").html(response);
            jQuery("#addTeamModal").modal('hide');
        },
        error: function (response) {
            console.log(response);
        }
    });

   }else {
      alert("Please select");
   } 
}

function delete_team(user_id){
  $.ajax({
    url: main_url+'ajax_task/delete_team_one_by_one',
    type: 'POST',
    data:{user_id:user_id,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    dataType:'html',
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
        project_status_check();
        all_function_call();
    }
  });
}

function get_assingName_task(user_id){
  $.ajax({
    url: main_url+'ajax_task/get_assingName_task',
    type: 'POST',
    data:{user_id:user_id},
    dataType:'html',
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
      $(".headingTaskAssignToPersonName").html(response);
    }
  });
}

function show_header_team_image(){
  $.ajax({
    url: main_url+'ajax_task/show_header_team_image',
    type: 'POST',
    data:{projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    dataType:'html',
    success: function(response) {
        $("#teamProfile").html(response);
        //window.setTimeout(show_header_team_image(), 9000);
    }
  });
}


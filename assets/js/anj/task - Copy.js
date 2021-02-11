function setText(element){
    var value = $(element).text();
    var user_id = $(element).val();
    $("#txt_search").val(value);
    $("#searchResult").empty();
}

  $(document).ready(function(){

    $('#upload').on('click', function () {
      var mobile_no = $("#mobile_no").val();
      var pictureOLD = $("#pictureOLD").val();
      var username = $("#username").val();
      var first_name = $("#first_name").val();
      var email = $("#email").val();
      var projectID = $("#projectID").val();
      var projectNAME = $("#projectNAME").val();
      var projectASSIGN = $("#projectASSIGN").val();
      var projectMain_user_id = $("#projectMain_user_id").val();
      var file_data = $('#picture').prop('files')[0];
      var form_data = new FormData();
      form_data.append('picture', file_data);
      form_data.append('mobile_no', mobile_no);
      form_data.append('pictureOLD', pictureOLD);
      form_data.append('username', username);
      form_data.append('projectID', projectID);
      form_data.append('projectNAME', projectNAME);
      form_data.append('projectASSIGN', projectASSIGN);
      form_data.append('projectMain_user_id', projectMain_user_id);
      form_data.append('first_name', first_name);
      form_data.append('email', email);
      form_data.append('projectCombo_id', $("#projectCombo_id").val());
      $.ajax({
          url: main_url+'ajax/ajaxfileupload', 
          dataType: 'text', cache: false,contentType: false,processData: false,
          data: form_data,type: 'post',
          /*beforeSend: function(){
            $("#showprofileloading").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
          },*/
          /*beforeSend: function(){
            $("#loader").show();
            swal("profile update", "profile updated.", "success");
          },*/
          success: function (response) {
              project_status_check();
              all_function_call();
              jQuery("#userProfileModal").modal('hide');
              if(projectID){
                window.location.href = main_url_dashboard+response;
              } else {
                window.location.href = main_url_dashboard;
              }
          },
          error: function (response) {
              console.log(response);
          }
      });
  });

  $('#upload_background').on('click', function () {
      var background_color_name = $("#background_color_name").val();
      var background_image_nameOLD = $("#background_image_nameOLD").val();
      var projectID = $("#projectID").val();
      var file_data = $('#background_image_name').prop('files')[0];
      var form_data = new FormData();
      form_data.append('background_image_name', file_data);
      form_data.append('background_color_name', background_color_name);
      form_data.append('background_image_nameOLD', background_image_nameOLD);
      form_data.append('projectID', projectID);
      console.log(form_data)
      $.ajax({
          url: main_url+'ajax/ajaxfileupload_background', 
          dataType: 'json', cache: false,contentType: false,processData: false,
          data: form_data,type: 'post',
          /*beforeSend: function(){
            $("#showupload_background").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
          },*/
          /*beforeSend: function(){
            $("#loader").show();
            swal("image change", "background image change.", "success");
          },*/
          success: function (response) {
              project_status_check();
              all_function_call();
              jQuery("#userChangebgModal").modal('hide');
              $("#showupload_background").empty();
          },
          complete:function(data){
            $("#showupload_background").hide();
          },
          error: function (response) {
              console.log(response);
          }
      });
  });

    $("#serach_any_dataa").on("input", function () {
        var options = {};
        options.url = main_url+'ajax_task/get_search_data',
        options.type = "GET";
        options.data = { "serach_any_data": $("#serach_any_data").val() };
        options.dataType = "json";
        options.success = function (data) {
          console.log(data)
            $("#datalistOptions").empty();
            for(var i=0;i<data.length;i++)
            {
                $("#datalistOptions").append("<option value='" + 
                data[i].project_name + "'></option>");
            }
        };
        $.ajax(options);
    });

    var clipboard = new ClipboardJS('.inviteCopyLink');
        clipboard.on('success', function(e) {
        console.log(e);
    });
        clipboard.on('error', function(e) {
        console.log(e);
    });

    $("#due_date1").datepicker({
        format: "yyyy-mm-dd",
    });

    $("#serach_any_data").keyup(function(){
        var search = $(this).val();
        $("#search_data").html("");
        if(search != ""){
            $.ajax({
                url: main_url+'ajax_comman/serach_any_data',
                type: 'post',dataType: 'html',
                data: {search:search, type:1},
                success:function(response){
                  console.log(response)
                    if(response){
                      $("#search_data").html(response);
                    } else {
                      $("#search_data").html("");
                    }
                }
            });
        }
    });

    $("#txt_search").keyup(function(){
        var search = $(this).val();
        if(search != ""){
            $.ajax({
                url: main_url+'ajax_task/getSearch',
                type: 'post',
                data: {search:search, type:1},
                dataType: 'json',
                success:function(response){
                    var len = response.length;
                    $("#searchResult").empty();
                    for( var i = 0; i<len; i++){
                        var email = response[i]['email'];
                        $("#searchResult").append("<li value='"+email+"'>"+email+"</li>");
                    }
                    $("#searchResult li").bind("click",function(){
                        setText(this);
                    });
                }
            });
        }
    });

    $("#txtsearch").keyup(function(){
        var search = $(this).val();
        alert(search)
        if(search != ""){
            $.ajax({
                url: main_url+'ajax_task/getSearch',
                type: 'post',
                data: {search:search, type:1},
                dataType: 'json',
                success:function(response){
                    var len = response.length;
                    $("#searchResultadd").empty();
                    for( var i = 0; i<len; i++){
                        var email = response[i]['email'];
                        $("#searchResultadd").append("<li value='"+email+"'>"+email+"</li>");
                    }
                    $("#searchResultadd li").bind("click",function(){
                        setText(this);
                    });
                }
            });
        }
    });

    /*$("#StartDate").datepicker({
        format: "yyyy-mm-dd",
        minDate: 0,
        autoclose: true,
        todayHighlight: true,
        startDate: '0d',
        onSelect: function(selected) {
          $("#EndDate").datepicker("option","minDate", selected)
        }
    });
    $("#EndDate").datepicker({ 
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        startDate: '0d',
        minDate: 1,
        onSelect: function(selected) {
          $("#StartDate").datepicker("option","maxDate", selected)
        }
    });*/  
});

function check_date(){
  var startDate = new Date($('#StartDate').val());
  var endDate = new Date($('#EndDate').val());
  if (startDate > endDate) {
    alert("Please ensure that the Deadline Date is greater than or equal to the Start Date.");
    $('#EndDate').val('');
    return false;
  }
}

function showRemaining_manish(deadLine,showid){
    var end = new Date(deadLine);
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;
    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById(showid).innerHTML = 'DEADLINE EXPIRED!';
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);
        document.getElementById(showid).innerHTML = 'Time Remaining ';
        document.getElementById(showid).innerHTML = days + ' days ';
        document.getElementById(showid).innerHTML += hours + ' hrs ';
        document.getElementById(showid).innerHTML += minutes + ' mins ';
        document.getElementById(showid).innerHTML += seconds + ' secs';
    }
    timer = setInterval(showRemaining, 1000);
}

// drop down //


$("#runningProjectList").val($("#project_id_new_INSERT").val());
$("#holdProjectList").val($("#project_id_new_INSERT").val());
$("#canceledProjectList").val($("#project_id_new_INSERT").val());
$("#completedProjectList").val($("#project_id_new_INSERT").val());

$('#runningProjectList').change(function() {
    var runningProjectList= $(this).val(); 
    var project_name = $(this).find('option:selected').data('project_name');
    var projectMain_user_id = $(this).find('option:selected').data('user_id');
    var projectCombo_id = $(this).find('option:selected').data('combo_id');
    $.ajax({
    url: main_url+'ajax/runningProjectList',
    type: 'POST',
    dataType: 'html',
    data: { runningProjectList:runningProjectList,project_name:project_name,projectMain_user_id:projectMain_user_id,projectCombo_id:projectCombo_id},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      //window.history.pushState(null, '', '/anjwebtech_pms/dashboard/'+response);
      if(runningProjectList){
        window.location.href = main_url_dashboard+response; 
      } else {
        window.location.href = main_url_dashboard; 
      }
    }
  });
});

$('#holdProjectList').change(function() {
    var holdProjectList= $(this).val(); 
    var project_name = $(this).find('option:selected').data('project_name');
    var projectMain_user_id = $(this).find('option:selected').data('user_id');
    $.ajax({
    url: main_url+'ajax/holdProjectList',
    type: 'POST',
    dataType: 'html',
    data: { holdProjectList:holdProjectList,project_name:project_name,projectMain_user_id:projectMain_user_id,projectCombo_id:$(this).find('option:selected').data('combo_id')},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      if(holdProjectList){
        window.location.href = main_url_dashboard+response;
      } else {
        window.location.href = main_url_dashboard; 
      }
    }
  });
});

$('#canceledProjectList').change(function() {
    var canceledProjectList= $(this).val(); 
    var project_name = $(this).find('option:selected').data('project_name');
    var projectMain_user_id = $(this).find('option:selected').data('user_id');
    $.ajax({
    url: main_url+'ajax/canceledProjectList',
    type: 'POST',
    dataType: 'html',
    data: { canceledProjectList:canceledProjectList,project_name:project_name,projectMain_user_id:projectMain_user_id,projectCombo_id:$(this).find('option:selected').data('combo_id')},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      if(canceledProjectList){
         window.location.href = main_url_dashboard+response;
      } else {
        window.location.href = main_url_dashboard; 
      }  
    }
  });
});

$('#completedProjectList').change(function() {
    var completedProjectList= $(this).val(); 
    var project_name = $(this).find('option:selected').data('project_name');
    var projectMain_user_id = $(this).find('option:selected').data('user_id');
    $.ajax({
    url: main_url+'ajax/completedProjectList',
    type: 'POST',
    dataType: 'html',
    data: { completedProjectList:completedProjectList,project_name:project_name,projectMain_user_id:projectMain_user_id,projectCombo_id:$(this).find('option:selected').data('combo_id')},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      if(completedProjectList){
         window.location.href = main_url_dashboard+response; 
      } else {
        window.location.href = main_url_dashboard; 
      }
    }
  });
});

function hold_project_name(project_id){
  var checkbox_projectholdVAL = [];
  /*var checkboxes=document.getElementsByName("checkbox_projecthold");
   var is_checked=false;
   for(var i=0;i<checkboxes.length;i++)
   {
      if(checkboxes[i].checked)
      {
        is_checked=true;
      }
   }
   if(is_checked){
        $('input[name=checkbox_projecthold]:checked').each(function(){ 
          checkbox_projectholdVAL.push($(this).val());
        });*/
        $.ajax({
          url: main_url+'ajax_task/hold_project_name',
          type: 'POST',
          data:{checkbox_projectholdVAL:checkbox_projectholdVAL,project_id:project_id,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val(),project_type_status:$("#project_type_status").val()},
          dataType:'html',
          cache: false,
          /*beforeSend: function(){
            $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
          },*/
          success: function(response) {
            localStorage.setItem("status", 3);
            //alert(response)
            window.location.href = main_url_dashboard+response;
          }
        });
  /*} else {
    alert("Please checked one checkebox");
  }*/

}

function completed_project(project_id){
    $.ajax({
      url: main_url+'ajax_task/completed_project',
      type: 'POST',
      data:{project_id:project_id,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
      dataType:'html',
      cache: false,
      /*beforeSend: function(){
        $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
      },*/
      success: function(response) {
        localStorage.setItem("status", 2);
        window.location.href = main_url_dashboard+response;
      }
    });
}

function delete_project(project_id){
  var checkbox_projectdelVAL = [];
  /*var checkboxes=document.getElementsByName("checkbox_projectdel");
   var is_checked=false;
   for(var i=0;i<checkboxes.length;i++)
   {
      if(checkboxes[i].checked)
      {
        is_checked=true;
      }
   }
   if(is_checked){
  $('input[name=checkbox_projectdel]:checked').each(function(){ 
    checkbox_projectdelVAL.push($(this).val());
  });*/
  $.ajax({
    url: main_url+'ajax_task/delete_project',
    type: 'POST',
    data:{checkbox_projectdelVAL:checkbox_projectdelVAL,project_id:project_id,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    dataType:'html',
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
        localStorage.setItem("status", 4);
        window.location.href = main_url_dashboard+response;
    }
  });

  /*} else {
    alert("Please checked one checkebox");
  }*/

}

$('#completedProjectCardModal').on('show.bs.modal', function (event) {
  var mymodal = $(event.relatedTarget);
    $.ajax({
      url: main_url+'ajax_task/get_completed_project_list',
      type: 'POST',
      data:{project_id:$("#project_id_new_INSERT").val(),projectCombo_id:$("#projectCombo_id").val()},
      dataType:'html',
      cache: false,
      /*beforeSend: function(){
        $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
      },*/
      success: function(response) {
        $("#completed_project_name").html(response);
        $("#loader").empty();
      }
    });
});

$('#holdProjectCardModal').on('show.bs.modal', function (event) {
  var mymodal = $(event.relatedTarget);
  var projectNAME = $("#projectNAME").val();
  projectNAME = projectNAME.replace(/-/g, ' ').toLowerCase();
  //$('#hold_project_name').text('Are you sure to hold this project ('+projectNAME+') ?');
  if($(event.relatedTarget).data('projecthold')=='hold'){
    var type_p = 'hold';
    $('#holdProjectCardModalLabel').text('Hold this project');
    $('#buttonnamechange_hold').text('Hold');
  } else if($(event.relatedTarget).data('projecthold')=='running'){
    var type_p = 'running';
    $('#holdProjectCardModalLabel').text('Unhold this project');
    $('#buttonnamechange_hold').text('Unhold');
  }
    $.ajax({
      url: main_url+'ajax_task/get_hold_project_list',
      type: 'POST',
      data:{project_type_status:type_p,project_id:$("#project_id_new_INSERT").val(),projectCombo_id:$("#projectCombo_id").val()},
      dataType:'html',
      cache: false,
      /*beforeSend: function(){
        $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
      },*/
      success: function(response) {
        $("#hold_project_name").html(response);
        $("#loader").empty();
      }
    });
});

$('#deleteProjectCardModal').on('show.bs.modal', function (event) {
  var mymodal = $(event.relatedTarget);
  var projectNAME = $("#projectNAME").val();
  projectNAME = projectNAME.replace(/-/g, ' ');
  //$('#delete_project_name').text('Are you sure to delete this project ('+projectNAME+') ?');
  $.ajax({
    url: main_url+'ajax_task/get_delete_project_list',
    type: 'POST',
    data:{project_id:$("#project_id_new_INSERT").val(),projectCombo_id:$("#projectCombo_id").val()},
    dataType:'html',
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response) {
      $("#delete_project_name").html(response);
      $("#loader").empty();
    }
  });
});

$('#addProjectCardModal').on('show.bs.modal', function (event) {
  
  if($(event.relatedTarget).data('project')=='add'){
    $('#addProjectCardModalLabel').text('Add new project');
    $('#submit').text('Create Project');
      $("#project_name").val('');
      $("#client_id").val('');
      $("#StartDate").val('');
      $("#EndDate").val('');
      $("#project_description").val('');
      $("#category").val('');
  } else 
  if($(event.relatedTarget).data('project')=='edit'){
    $('#addProjectCardModalLabel').text('Edit this project');
    $('#submit').text('Update Project');
    $.ajax({
      url: main_url+'ajax_task/get_project_details_id',
      type: 'POST',
      data:{project_id:$("#project_id_new_INSERT").val(),projectCombo_id:$("#projectCombo_id").val()},
      dataType:'json',
      cache: false,
      success: function(response) {
        $("#edit_project_id").val(response.project_id);
        $("#project_name").val(response.project_name);
        $("#client_id").val(response.client_id);
        $("#category").val(response.category);
        $("#project_description").val(response.project_description);
        $("#StartDate").val(response.start_date);
        $("#EndDate").val(response.deadline);
        $("#project_description").val(response.project_description);
        var img_pro = main_url+'uploads/'+response.project_documentation;
        $('#project_documentationOLD').val(response.project_documentation);
      }
    });
 }
});

// end drop down //

function change_password(){
    $(".error").hide();
    var hasError = false;
    var old_password = $("#old_password").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    if (old_password == '') {
        $("#old_password").after('<span class="error text-danger"><em>Please  enter your current password.</em></span>');
        hasError = true;
    } else if (password == '') {
        $("#password").after('<span class="error text-danger"><em>Please enter a password.</em></span>');
        hasError = true;
    } else if (confirm_password == '') {
        $("#confirm_password").after('<span class="error text-danger"><em>Please re-enter your password.</em></span>');
        hasError = true;
    } else if (password != confirm_password) {
        $("#confirm_password").after('<span class="error text-danger"><em>Passwords do not match.</em></span>');
        hasError = true;
    }
    if (hasError == true) {
       return false;
    }
    if (hasError == false) {
      $.ajax({
        url: main_url+'login/change_password',
        type: 'POST',
        dataType: 'json',
        data: { old_password:old_password,password:password, confirm_password:confirm_password},
        beforeSend: function(){
            swal("password change", "password change.", "success");
          },
        success: function(response){
          console.log(response)
          $('#form1_box').show();
          if (response.code === 1)
          {
              $("#form1_box").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response.msg);
          } else {
              $("#form1_box").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response.msg);
              $(".alert-success").html(response.msg);
              jQuery("#userChangePWModal").modal('hide');
          }
          project_status_check();
          all_function_call();
        }
      });
    }
}

function onlyNumber(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57)){
          return false;
      }
  return true;
}

$('#change_background_ci').change(function() {
    var change_background_ci= $(this).val(); 
    if(change_background_ci = 'color'){
      $("#background_color_hs").css({display:"block"});
      $("#background_image_hs").css({display:"none"});
    } 
    if(change_background_ci = 'image'){
      $("#background_image_hs").css({display:"block"});
      $("#background_color_hs").css({display:"none"});
    }
});

function showImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#onChangeImg').attr('src', e.target.result)
            $('#onChangeImg1').attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showImgAttachment(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#edit_task_fileOLD_img').attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function validateImage(input) {
  var formData = new FormData();
  var file = document.getElementById("background_image_name").files[0];
  formData.append("Filedata", file);
  var t = file.type.split('/').pop().toLowerCase();
  if (t != "jpeg" && t != "jpg" && t != "png" && t != "gif") {
  alert('Please select a valid image file');
  document.getElementById("background_image_name").value = '';
  return false;
  }
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#onChangeImg').attr('src', e.target.result)
          $('#onChangeImg1').attr('src', e.target.result)
      };
      reader.readAsDataURL(input.files[0]);
  }
  return true;
}


function copy_to_status(thiseventt){
  var tablename = thiseventt.getAttribute('tablename');
  var status_id = thiseventt.getAttribute('statusRow_id');
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  
  if(tablename=='tbl_status'){
    var urlcopy = main_url+'boards/copyStatus';
  } else if(tablename=='tbl_task'){
    var urlcopy = main_url+'boards/copyTask';
  }
  $.ajax({
    url: urlcopy,
    type: 'POST',
    dataType: 'html',
    data: { status_id:status_id,project_id:project_id_new_INSERT,projectCombo_id:$("#projectCombo_id").val()},
    success: function(response){
      project_status_check();
      all_function_call();
    }
  });
}

function inviteCopyLink_validation(){
  alert("please add project after add team");
}

function inviteCopyLink(){
var projectID = $("#projectID").val();
var projectNAME = $("#projectNAME").val();
var projectASSIGN = $("#projectASSIGN").val();
var projectMain_user_id = $("#projectMain_user_id").val();
var projectCombo_id = $("#projectCombo_id").val();

  $("#inviteCopyLink").val(main_url+'Invite/anj/'+projectID+'/'+projectNAME+'/'+projectASSIGN+'/'+projectMain_user_id+'/'+projectCombo_id);
}

function delete_to_status(thiseventt){
  $("#status_id_delete").val(thiseventt.getAttribute('statusRow_id'));
  $("#tablename").val(thiseventt.getAttribute('tablename'));
}

function submit_delete_to_status(){
  var status_id_delete = $("#status_id_delete").val();
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  var tablename = $("#tablename").val();
  if(tablename=='tbl_status'){
    var urldel = main_url+'boards/deleteStatus';
  } else {
    var urldel = main_url+'boards/deleteTask';
  }
  $.ajax({
    url: urldel,
    type: 'POST',
    dataType: 'html',
    data: { status_id:status_id_delete,tablename:tablename,project_id:project_id_new_INSERT,projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'"assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      project_status_check();
      all_function_call();
      jQuery("#deleteCardModal").modal('hide');
      //$("#loader").empty();
    }
  });
}

function rename_to_status(thiseventt){
    $("#status_id_rename").val(thiseventt.getAttribute('statusRow_id'));
    $("#status_name").val(thiseventt.getAttribute('status_name'));
    $("#tablenameStatus").val(thiseventt.getAttribute('tablename'));
}

function submit_new_status(status_id){
  var status_name_new = $("#status_name_new").val();
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  var urlrename = main_url+'boards/addStatus';
  $.ajax({
    url: urlrename,
    type: 'POST',
    dataType: 'html',
    data: { status_name:status_name_new,project_id:project_id_new_INSERT,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      var frm = document.getElementsByName('frm_addstatus')[0];
      frm.reset();
      project_status_check();
      all_function_call();
      jQuery("#newstatusModal").modal('hide');
      //$("#loader").empty();
    }
  });
}

//window.history.pushState(null, '', '/dashboard/123/nkgfngkndfjkg/dkgkdfgnkd');

function add_new_task(status_id){
  $("#status_id_first").val(status_id);
}

function submit_title_new(){
  var urlrename = main_url+'boards/addTask';
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  $.ajax({
    url: urlrename,
    type: 'POST',
    dataType: 'html',
    data: { status_id:$("#status_id_first").val(),title:$("#title_new").val(),priority:$("#priority_new").val(),project_id:project_id_new_INSERT,projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectASSIGN:$("#projectASSIGN").val(),projectMain_user_id:$("#projectMain_user_id").val(),projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      $("#title_new").val("");
      project_status_check();
      all_function_call();
      jQuery("#anotherCardModal").modal('hide');
    }
  });
}

function submit_rename_to_status(){
  var status_name = $("#status_name").val();
  var status_id_rename = $("#status_id_rename").val();
  var tablenameStatus = $("#tablenameStatus").val();
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  if(status_id_rename==''){
    var urlrename = main_url+'boards/addStatus';
  } else {
    if(tablenameStatus=='tbl_status'){
      var urlrename = main_url+'boards/renameStatus';
    } else {
      var urlrename = main_url+'boards/renameTask';
    }
  }
  $.ajax({
    url: urlrename,
    type: 'POST',
    dataType: 'html',
    data: { status_id:status_id_rename,status_name:status_name,project_id:project_id_new_INSERT,projectCombo_id:$("#projectCombo_id").val()},
    cache: false,
    /*beforeSend: function(){
      $("#loader").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
    },*/
    success: function(response){
      /*var frm = document.getElementsByName('frm_addtask')[0];
      frm.reset();*/
      project_status_check();
      all_function_call();
      jQuery("#anotherListModal").modal('hide');
    }
  });
}

function submit_move_to_status(){
  var orderBY = $("#orderBY").val();
  var status_id = $("#status_id").val();
  var project_id_new_INSERT = $("#project_id_new_INSERT").val();
  $.ajax({
    url: main_url+'boards/moveStatus',
    type: 'POST',
    dataType: 'html',
    data: { status_id:status_id,orderBY:orderBY,project_id:project_id_new_INSERT,projectCombo_id:$("#projectCombo_id").val()},
    success: function(response){
      project_status_check();
      all_function_call();
      jQuery("#moveCardModal").modal('hide');
    }
  });
}

function move_to_status(thiseventt){
  $("#orderBY").val(thiseventt.getAttribute('orderBY'));
  $("#status_id").val(thiseventt.getAttribute('statusRow_id'));
}

$('#mainstatusOrderBY').change(function() {
    var mainstatusOrderBY= $(this).val(); 
    $("#orderBY").val(mainstatusOrderBY);
});

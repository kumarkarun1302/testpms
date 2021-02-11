var main_url = 'https://anjpms.com/';

$(document).ready(function(){ 
 $(".thumbnail_trash").bind('contextmenu', function (e) {
  var id = this.id;
  $("#txt_id").val(id);
  var top = e.pageY+5;
  var left = e.pageX;
  $(".context-menu").toggle(100).css({
   top: top + "px",
   left: left + "px"
  });
  return false;
 });
 $(document).bind('contextmenu click',function(){
  $(".context-menu").hide();
  //$("#txt_id").val("");
 });
 $('.context-menu').bind('contextmenu',function(){
  return false;
 });
 $('.context-menu li').click(function(){
  var className = $(this).find("span:nth-child(1)").attr("class");
  var titleid = $('#txt_id').val();
  var modaltype = this.id;
  $("#txtjinlid").val(titleid);
  $( "#"+ titleid ).css( "background-color", className );
  $(".context-menu").show();
 });
$(".context-menu").hide();
});




$(document).ready(function(){ 
 $(".thumbnail_loopfile").bind('contextmenu', function (e) {
  var id = this.id;
  $("#txt_id").val(id);
  var top = e.pageY+5;
  var left = e.pageX;
  $(".context-menu").toggle(100).css({
   top: top + "px",
   left: left + "px"
  });
  return false;
 });
 $(document).bind('contextmenu click',function(){
  $(".context-menu").hide();
  $("#txt_id").val("");
 });
 $('.context-menu').bind('contextmenu',function(){
  return false;
 });
 $('.context-menu li').click(function(){
  var className = $(this).find("span:nth-child(1)").attr("class");
  var titleid = $('#txt_id').val();
  var modaltype = this.id;
  $("#"+modaltype+"_id").val(titleid);
  
  $.ajax({
    url: main_url+'file/get_value_anjdrive', 
    dataType: 'html',
    data:{dummy_cryptcode:titleid},
    type: 'post',
    success: function (response) {
      $("#viewimage").html(response);
    },
    error: function (response) {
      console.log(response);
    }
  });

  var linkhtml = main_url+'file/anj/'+titleid;
  $("#anj_link_url").val(linkhtml);
  $(modaltype+'Modal').modal('show');
  $( "#"+ titleid ).css( "background-color", className );
  $(".context-menu").show();
 });
$(".context-menu").hide();
});


function delete_files(){
  $.ajax({
    url: main_url+'file/delete_restore_items', 
    dataType: 'html',type: 'post',
    data: {dummy_cryptcode:$("#delete_id").val(),eDelete:1},
    success: function (response) {
      window.location.href = main_url+'anj_drive';
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function download_file(){
  if($("#txt_id").val()){
    window.location.href = main_url+'file/download_files/'+$("#txt_id").val();
  } else {
    window.location.href = main_url+'file/download_files/'+$("#deltxt_id").val();
  }
  
}

  $('#upload_folder').on('click', function() {
    $('#userfolder').trigger('click');
  });
  $('#upload_file').on('click', function() {
    $('#userfile').trigger('click');
  });
  /*$('#shareModal').on('shown.bs.modal', function(event) {
    var mymodal = $(event.relatedTarget).data('id');
    var linkhtml = 'https://anjwebtech.com/anjwebtech_pms/file/anj/'+mymodal;
    $("#anj_link_url").val(linkhtml);
    $("#del_id").val(mymodal);
  });*/
  //userfolder
  
/*$(document).ready(function(){
  if ($.cookie('abcd') == null) {
    $('#abcdModal').modal('show');
    $.cookie('abcd', '1');
  }
});*/
$('#passwordModal1').modal('show');
$('#password').on('keyup', function () {
  if ($('#password').val() == '123') {
    $('#passwordModal').modal('hide');
  } else 
    $('#passwordModal').modal('show');
});

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="index,follow" />
  <meta name="SLURP" content="INDEX,FOLLOW" />
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  <base href="/">
  <title>ANJ Chat</title>
  <link rel="dns-prefetch" href="https://anjwebtech.com/anjwebtech_pms"/>
  <meta name="keywords" content="online storage, free storage, collaboration, share files, cross platform, remote access, send large files" />
  <meta name="description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime." />
  <meta property="og:title" content="ANJ Chat"/>
  <meta property="twitter:title" content="ANJ Chat" />
  <meta property="og:image" content="https://anjwebtech.com/wp-content/uploads/2020/07/anjwebtech_logo.png"/>
  <meta property="twitter:image" content="https://anjwebtech.com/wp-content/uploads/2020/07/anjwebtech_logo.png" />
  <meta property="og:description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime."/>
  <meta property="twitter:description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime."/>
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://anjwebtech.com/anjwebtech_pms"/>
  <meta property="og:site_name" content="ANJ Chat"/>
  <link rel="canonical" href="https://anjwebtech.com/anjwebtech_pms" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://anjwebtech.com/anjwebtech_pms/assets/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/chat/chat.css">

<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/'); ?>emoji/emojionearea.min.css">
<script type="text/javascript" src="<?php //echo base_url('assets/'); ?>emoji/emojionearea.min.js"></script> -->

</head>

<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo base_url('anj_drive'); ?>">ANJ</a>
  </div>
</div>
</nav>

<div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGroupModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-lg-12">
            <input placeholder="Type your group name" class="form-control" name="group_name" id="group_name">
          </div>
        </div>

        <div class="row list-unstyled-border">
            <?php $qry = $this->db->query("select username,user_id from tbl_users");
            $result = $qry->result_array(); 
            foreach ($result as $key => $val) { 
              if($val['username']){ ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="defaultcheck<?php echo $val['user_id']; ?>" name="checkbox_chat" value="<?php echo $val['user_id']; ?>">
                <label class="form-check-label" for="defaultcheck<?php echo $val['user_id']; ?>"><?php echo $val['username']; ?></label>
                </div>

                </div>
            <?php } } ?>
          
        </div>

      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="create_new_group()">Create</button>
      </div>
    </div>
  </div>
</div>

<div class="main-wrapper" style="cursor: pointer;">
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#one">one</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#group">group</a>
                      </li>
                    </ul>

                    <div class="tab-content">

                      <div class="tab-pane container active" id="one">

                        <ul class="list-unstyled list-unstyled-border">
                          <?php $qry = $this->db->query("select username,user_id from tbl_users where user_id!=1");
                            $result = $qry->result_array(); 
                            foreach ($result as $key => $val) { ?>
                                <li class="media cursor-pointer user-selected-for-chat" data-id="<?php echo $val['user_id']; ?>" onclick="openchat(<?php echo $val['user_id']; ?>,'one')">    
                                  <div class="media-body">
                                    <div class="ml-2 font-weight-bold"><?php echo $val['username']; ?></div>
                                  </div>
                                </li>
                          <?php } ?>
                        </ul>

                      </div>
                      <div class="tab-pane container fade" id="group">
                        <a href="javascript:void()" data-toggle="modal" data-target="#createGroupModal">create group</a>

                          <ul class="list-unstyled list-unstyled-border" id="ajax_get_groupname">

                          <?php $sender_id = getProfileName('user_id');
                            $qry = $this->db->query("SELECT chat_id,sender_id,receiver_id,conversation_id,chat_msg,created_date FROM `tbl_chat` WHERE type_chat = 2 and eDelete = 0 and CONCAT(',', receiver_id, ',') like '%,$sender_id,%' ORDER BY `chat_id` DESC");
                            $result = $qry->result_array(); 
                            foreach ($result as $key => $val) { ?>
                                <li class="media cursor-pointer user-selected-for-chat" data-id="<?php echo $val['conversation_id']; ?>" onclick="openchat(<?php echo $val['conversation_id']; ?>,'group')">    
                                  <div class="media-body">
                                    <div class="ml-2 font-weight-bold"><?php echo $val['chat_msg']; ?></div>
                                  </div>
                                </li>
                            <?php } ?>

                          </ul>
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>

      <div class="col-md-8">
        <div class="card chat-box card-primary" id="mychatbox">
          <div class="card-header">
              
              <div class="media" id="current_chating_user">
                
              </div>

          </div>
          
          <div class="card-body chat-content" id="show_chat_msg">

          </div>

          <div class="card-footer chat-form">
            <form method="post" onsubmit="return false;">
            <input type="hidden" name="receiver_id" id="receiver_id">
            <input type="hidden" name="chat_type" id="chat_type">
            <input placeholder="Type your message" class="form-control" name="chat_msg" id="chat_msg">
              <!-- <button class="btn btn-primary" id="chat_submit" tabindex="-1" onclick="submit_chat_submit()">
                <i class="far fa-paper-plane"></i>
              </button> -->
              </form>
          </div>

        </div>
      </div>
            </div>    
          </div>
        </section>
      </div>
       </div>


<script type="text/javascript">
    var main_url = 'https://anjwebtech.com/anjwebtech_pms/';
    
    var time1;
    var time2;
    
/*$(document).keypress(function (e) {
  if (e.which == 13) {
      alert('enter key is pressed');
      console.log('enter key is pressed');
  }
});*/

    $(document).ready(function() {

        $('#chat_msg').keydown(function(event) {
          if (event.keyCode == 13) {
            submit_chat_submit();
            return false;
          }
        });
        

    });

    

    function submit_chat_submit(){
      var receiver_id =$("#receiver_id").val();
      var chat_type =$("#chat_type").val();
        $.ajax({
            url: main_url+"chat/chat_add",
            data: {receiver_id:receiver_id,chat_msg:$("#chat_msg").val(),chat_type:chat_type},
            type: 'post',
            cache: false,
            beforeSend: function(){
              $("#showchatloading").html('<img src="'+main_url+'/assets/ajax-loader.gif" /> Connecting...');
            },
            success: function (response)
            {
              $("#chat_msg").val('');
              $(".emojionearea-editor").html('');
              $("#showchatloading").html('');
              time1 = setTimeout(openchat(receiver_id,chat_type), 5000);
            }
        });
    }  

    function openchat(chat_id,type){
        clearTimeout(time2);
        $("#receiver_id").val(chat_id);
        $("#chat_type").val(type);
        get_chat_profilename(chat_id,type);
        get_chat_list_manish(chat_id,type);
    }

    function get_chat_profilename(chat_id,type){
        $.ajax({
            url: main_url+"chat/get_chat_profilename",
            data: {chat_id:chat_id,type:type},
            type: 'post',
            cache: false,
            success: function (response)
            {
              $("#current_chating_user").html(response);
            }
        });
    }

    function get_chat_list_manish(chat_id,type){
        $.ajax({
            url: main_url+"chat/show_chat_msg",
            data: {chat_id:chat_id,type:type},
            type: 'post',
            cache: false,
            success: function (response)
            {
              $("#show_chat_msg").html(response);
            }
        });
    }

    /*$("#chat_msg,#chat_msg_g").emojioneArea({
      saveEmojisAs: true,
      pickerPosition: "bottom",
      filtersPosition: "bottom",
      searchPosition: "bottom"
    });*/

    function create_new_group(){
        var checkbox_chat = [];
        $('input[name=checkbox_chat]:checked').each(function(){ 
          checkbox_chat.push($(this).val());
        });
        $.ajax({
            url: main_url+"chat/group_name_add",
            data: {checkbox_chat:checkbox_chat,group_name:$("#group_name").val()},
            type: 'post',
            cache: false,
            success: function (response)
            {
              get_groupname();
              jQuery("#createGroupModal").modal('hide');
            }
        });
    }

    function get_groupname(){
        $.ajax({
            url: main_url+"chat/ajax_get_groupname",
            type: 'post',
            cache: false,
            success: function (response)
            {
              $("#ajax_get_groupname").html(response);
            }
        });
    }
</script>
</body>
</html>
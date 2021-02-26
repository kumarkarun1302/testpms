
        <!-- Start User Chat -->
        <div class="user-chat w-100 overflow-hidden maincontenthide">
            <div class="d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">
                    <div class="p-3 p-lg-4 border-bottom">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8" id="current_chating_user">
                            </div>
                            <div class="col-sm-8 col-4">
                                <ul class="list-inline user-chat-nav text-right mb-0">
                                    <li class="list-inline-item" style="display: none;">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-search-line"></i>
                                            </button>
                                            <div class="dropdown-menu p-0 dropdown-menu-right dropdown-menu-md">
                                                <div class="search-box p-2">
                                                    <input type="text" class="form-control bg-light border-0" placeholder="Search..">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                   <!--  <li class="list-inline-item d-none d-lg-inline-block">
                                        <button type="button" class="btn nav-btn" data-toggle="modal" data-target="#audiocallModal">
                                            <i class="ri-phone-line"></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block">
                                        <button type="button" class="btn nav-btn" data-toggle="modal" data-target="#videocallModal">
                                            <i class="ri-vidicon-line"></i>
                                        </button>
                                    </li> -->

                                    <li class="list-inline-item d-none d-lg-inline-block current_profile_about" onclick="current_profile_about()" id="userprofileshow" style="display: none !important;">
                                        <button type="button" class="btn nav-btn user-profile-show">
                                            <i class="ri-user-2-line"></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item" style="display: none;">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item d-block d-lg-none user-profile-show" href="#">View profile <i class="ri-user-2-line float-right text-muted"></i></a>

                                                <a class="dropdown-item d-block d-lg-none" href="#" data-toggle="modal" data-target="#audiocallModal">Audio <i class="ri-phone-line float-right text-muted"></i></a>

                                                <a class="dropdown-item d-block d-lg-none" href="#">Video <i class="ri-vidicon-line float-right text-muted"></i></a>

                                                <a class="dropdown-item" href="#">Archive <i class="ri-archive-line float-right text-muted"></i></a>

                                                <a class="dropdown-item" href="#">Muted <i class="ri-volume-mute-line float-right text-muted"></i></a>

                                                <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end chat user head -->

                    <!-- start chat conversation -->
                    <div class="chat-conversation p-3 p-lg-4" data-simplebar="init" id="manish">
                        <ul class="list-unstyled mb-0" id="show_chat_msg">
                            
                        </ul>
                    </div>
                    <!-- end chat conversation end -->

                    <!-- start chat input section -->
                    <div class="chat-input-section p-3 p-lg-4 border-top mb-0" id="scrollTo">
                        <div class="row no-gutters">
                            <div class="col">
                                <div>
                                    <input type="hidden" name="receiver_id" id="receiver_id">
                                    <input type="hidden" name="chat_type" id="chat_type">
                                    <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Enter Message..." name="chat_msg" id="chat_msg" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="chat-input-links ml-md-2">
                                    <ul class="list-inline mb-0">
                                        <!-- <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Emoji">
                                            <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                                <i class="ri-emotion-happy-line"></i>
                                            </button>
                                        </li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Attached File">  
                                            <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                                <i class="ri-attachment-line"></i>
                                            </button>
                                        </li> -->
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light" onclick="submit_chat_submit()" disabled="disabled" id="submitchatsubmit">
                                                <i class="ri-send-plane-2-fill"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end chat input section -->
                </div>
                <!-- end chat conversation section -->

                <!-- start User profile detail sidebar -->
                <div class="user-profile-sidebar" id="ajax_current_profile_about">
                    
                </div>
                <!-- end User profile detail sidebar -->
            </div>
        </div>
        <!-- End User Chat -->

       
    </section>     
       
    <!-- jquery-->
    <script src="<?php echo base_url('assets/'); ?>js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?php echo base_url('assets/'); ?>js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?php echo base_url('assets/'); ?>js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
    <!-- App Js -->
    <script src="<?php echo base_url('assets/'); ?>js/app.js"></script>
    <!-- Owl Carousel -->
    <script src="<?php echo base_url('assets/'); ?>js/owl.carousel.min.js"></script>
    <!-- Simplebar Scrollbar -->
    <script src="<?php echo base_url('assets/'); ?>js/simplebar/simplebar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

    <script type="text/javascript">
        var main_url = '<?php echo base_url(); ?>';
        var timer = 0;
        var time1;
        var time2;
        $own_id = '<?php echo getProfileName('user_id'); ?>';
        var heartBeat = 600;
        
        // main function current user list //
        function ajax_searching_current_user(){
            
            $.ajax({
                url: main_url+'chat/ajax_searchingcurrentuser',
                type: 'post',
                dataType: 'html',
                success:function(response){
                    console.log('home page side contact number')
                    $("#show_ajax_searching_current_user").html(response);
                }
            });
        }

        $(document).ready(function () {
            ajax_searching_current_user();
            ajax_show_contact_list();
            $('#groupmembercollapse').collapse({
              toggle: false
            });
            $('#groupmembercollapse1').collapse({
              toggle: false
            });
            ajax_show_contact_list_group();
            ajax_searching_group_list();
            $("#user-status-carousel").owlCarousel({
                items: 4,
                loop: !1,
                margin: 16,
                nav: !1,
                dots: !1
            }), $("#user-profile-hide").click(function () {
                $(".user-profile-sidebar").hide()
            }), $(".user-profile-show").click(function () {
                $(".user-profile-sidebar").show()
            }), $(".chat-user-list li a").click(function () {
                $(".user-chat").addClass("user-chat-show")
            }), $(".user-chat-remove").click(function () {
                $(".user-chat").removeClass("user-chat-show")
            })            
        });

        $(document).ready(function() {
            $('#chat_msg').keydown(function(event) {
              if (event.keyCode == 13) {
                submit_chat_submit();
                return false;
              }
            });
        });

        function current_profile_about(){

            $.ajax({
                url: main_url+"chat/current_profile_about",
                data: {receiver_id:$("#receiver_id").val(),chat_type:$("#chat_type").val()},
                type: 'post',
                cache: false,
                success: function (response)
                {
                  $("#ajax_current_profile_about").html(response);
                  ajax_searching_current_user();
                }
            });
        }

        function submit_chat_submit(){
          ajax_searching_current_user();
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
                  //time1 = setTimeout(openchat(receiver_id,chat_type), 600);
                }
            });
        }

        function openchat(chat_id,type='group'){
            $(".maincontenthide").css('display','block !important');
            //ajax_searching_current_user();
            $(".user-profile-sidebar").hide();
            $("#userprofileshow").show();
            $('#chat_msg').removeAttr("disabled");
            $('#submitchatsubmit').removeAttr("disabled");
            clearTimeout(time2);
            $("#receiver_id").val(chat_id);
            $("#chat_type").val(type);
            get_chat_profilename(chat_id,type);
            get_chat_list_manish();
            liveChat(); //start the chat
        }

        function openchat1(chat_id,type='one'){
            $(".maincontenthide").css('display','block !important');
            msg_read_unread(chat_id);
            //ajax_searching_current_user();
            $("#userprofileshow").show();
            $(".user-profile-sidebar").hide();
            $('#chat_msg').removeAttr("disabled");
            $('#submitchatsubmit').removeAttr("disabled");
            clearTimeout(time2);
            $("#receiver_id").val(chat_id);
            $("#chat_type").val(type);
            get_chat_profilename(chat_id,type);
            get_chat_list_manish();
            liveChat(); //start the chat
        }

        function msg_read_unread(chat_id){
            $.ajax({
                url: main_url+"chat/msg_read_unread",
                data: {chat_id:chat_id},
                type: 'post',
                cache: false,
                success: function (response){ }
            });
        }

        function side_menu_nav(type=''){
            $(".maincontenthide").css('display','none !important');
            ajax_searching_current_user();
            $("#userprofileshow").hide();
            $('#userprofileshow').css('display','none !important');
            if(type=='pills-user'){
               $("#pills-user").show(); 
           } else {
               $("#pills-user").hide(); 
           }
            $("#chat_msg").prop('disabled', true);
            $("#submitchatsubmit").prop('disabled', true);
            $("#current_chating_user").html("");
            $("#show_chat_msg").html("");
            
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
                  ajax_searching_current_user();
                }
            });
        }

        function get_chat_list_manish(){
            $.ajax({
                url: main_url+"chat/show_chat_msg",
                data: {chat_id:$("#receiver_id").val(),type:$("#chat_type").val()},
                type: 'post',
                cache: false,
                success: function (response)
                {
                  $("#show_chat_msg").html(response);
                  $('#show_chat_msg').scrollTop($('#show_chat_msg')[0].scrollHeight);
                  //ajax_searching_current_user();
                }
            });
        }


        function ri_close_line() {
            $(".user-profile-sidebar").hide();
        }

        function submit_invite_contact(type){
            if(type=='chat'){
                var email = $("#chattxtsearch").val();
                var msg = $("#addcontactinvitemessageinput").val();
            } else if(type=='contact'){
                var email = $("#chat_txt_search").val();
                var msg = $("#addcontact-invitemessage-input").val();
            }
            $.ajax({
                url: main_url+'chat/submit_invite_contact',
                type: 'post',
                data: {email:email,message:msg},
                success:function(response){
                    
                    if(response==1){
                        alert('contact number allready added');
                        $("#chat_txt_search").focus();
                        return false;
                    } else if(response==2){
                        alert("please enter correct email id!");
                        return false;
                    } else {
                        window.location = main_url+"chat";
                    }
                    
                }
            });
        }

        function ajax_show_contact_list_group(){
            $.ajax({
                url: main_url+'chat/searching_contact_group',
                type: 'post',
                dataType: 'html',
                success:function(response){
                    $("#searching_contact_group").html(response);
                    ajax_searching_current_user();
                }
            });
        }
        
        function delete_contact(main_chat_id){
            $.ajax({
                url: main_url+'chat/delete_contact',
                type: 'post',
                data: {main_chat_id:main_chat_id},
                dataType: 'html',
                success:function(response){
                    ajax_show_contact_list();
                    ajax_searching_current_user();
                }
            });
        }

        function setText(element){
            var value = $(element).text();
            var user_id = $(element).val();
            $("#chattxtsearch").val(value);
            $("#searchResult").empty();
        }

        $("#chattxtsearch").keyup(function(){
            var search = $(this).val();
            //if(search != ""){
                $.ajax({
                    url: main_url+'ajax_task/getSearch',
                    type: 'post',
                    data: {search:search, type:1},
                    dataType: 'json',
                    success:function(response){
                        ajax_searching_current_user();
                        var len = response.length;
                        $("#searchResult").empty();
                        if(search){
                            for( var i = 0; i<len; i++){
                                var email = response[i]['email'];
                                $("#searchResult").append("<li value='"+email+"'>"+email+"</li>");
                            }
                        }
                        $("#searchResult li").bind("click",function(){
                            setText(this);
                        });
                    }
                });
            //}
        });

        $(".js-select2").select2({
            closeOnSelect : true,
            placeholder : "search email id",
            allowHtml: true,
            allowClear: true,
            tags: true,
            selectOnClose: true
        });
        
        function nmnm(){
            alert(5)
        }
        // sidebar //
        // searching contact list //
        $("#searching_contact").keyup(function(){
            var search = $(this).val();
            ajax_show_contact_list(search);
            ajax_searching_current_user();
        });

        function ajax_show_contact_list(search=''){
            $.ajax({
                url: main_url+'chat/searching_contact',
                type: 'post',
                data: {search:search},
                dataType: 'html',
                success:function(response){
                    $("#searching_contact_result").html(response);
                }
            });
        }
        // group list side //
        $("#searching_group").keyup(function(){
            var search = $(this).val();
            ajax_searching_group_list(search);
            ajax_searching_current_user();
        });

        function ajax_searching_group_list(search=''){
            $.ajax({
                url: main_url+'chat/ajax_groupcontact_list',
                type: 'post',
                data: {search:search},
                dataType: 'html',
                success:function(response){
                    $("#ajax_group_list_id").html(response);
                }
            });
        }
        
        $("#searching_current_user").keyup(function(){
            var search = $(this).val();
            ajax_searching_current_user(search);
            ajax_searching_current_user();
        });

        

        function chat_copy(chat_id){
            $.ajax({
                type: "POST",
                url: main_url+'chat/chat_copy',           
                data: {chat_id:chat_id},
                success: function(e){
                }
            });
        }

        function chat_delete(mchat_id,chat_id){
            $.ajax({
                type: "POST",
                url: main_url+'chat/chat_delete',           
                data: {chat_id:chat_id},
                success: function(e){
                    get_chat_list_manish();
                    ajax_searching_current_user();
                    alert('msg del');
                }
            });
        }

        //LOOP OF LIFE - checks every ... seconds if there's a new message
        var prev_length = new Array();
        function liveChat(){
                get_chat_list_manish();
                var is_typing=0;
                var this_chatbox_textarea  = $("#chat_msg").val();
                var chat_id = $("#receiver_id").val();

                if (this_chatbox_textarea !='') {
                    is_typing = 1;
                } else {
                    is_typing = 0;
                }
                $.ajax({
                    type: "POST",
                    url: main_url+'chat/load_message',                                
                    data: 'own_id='+$own_id+'&partner_id='+chat_id+'&is_typing='+is_typing,
                    success: function(i){   
                    }
                }); 
                //check if user is typing
                $.ajax({
                    type: "POST",
                    url: main_url+'chat/is_typing',           
                    data: 'own_id='+$own_id+'&partner_id='+chat_id,
                    success: function(e){
                        
                        if(e == 1){
                            $('#typing_on'+chat_id).text('User is typing...');
                        }else{
                            $('#typing_on'+chat_id).text('');
                        }
                    }
                });
            t=setTimeout(liveChat,heartBeat);
        }

function submit_create_group(){
    var multiple_user_id = [];
    $('input[name=groupname_userid]:checked').each(function(){ 
        multiple_user_id.push($(this).val());
    });
    $.ajax({
        url: main_url+'chat/submit_create_group',
        type: 'post',
        data: {group_name:$("#addgroupname-input").val(),group_description:$("#addgroupdescription-input").val(),multiple_user_id:multiple_user_id},
        dataType: 'html',
        success:function(response){
            window.location = main_url+"chat";
        }
    });
}

function ajax_show_contact_list_group(){
    $.ajax({
        url: main_url+'chat/searching_contact_group',
        type: 'post',
        dataType: 'html',
        success:function(response){
            $("#searching_contact_group").html(response);
            ajax_searching_current_user();
        }
    });
}

function edit_submit_create_group(){
    var multiple_user_id = [];
    $('input[name=editgroupname_userid]:checked').each(function(){ 
        multiple_user_id.push($(this).val());
    });
    $.ajax({
        url: main_url+'chat/edit_submit_create_group',
        type: 'post',
        data: {group_name:$("#editgroupname").val(),multiple_user_id:multiple_user_id,conversation_id:$("#editgroupreceiver_id").val()},
        dataType: 'html',
        success:function(response){
            window.location = main_url+"chat";
        }
    });
}

function edit_contact_group(){
    $.ajax({
        url: main_url+'chat/edit_contact_group',
        type: 'post',
        data:{conversation_id:$("#receiver_id").val()},
        dataType: 'html',
        success:function(response){
            $("#edit_contact_group").html(response);
        }
    });
}

$('#editgroup-exampleModal').on('show.bs.modal', function (event) {
    edit_contact_group();
    $("#editgroupname").val($("#getGroupName").html());
    $("#editgroupreceiver_id").val($("#receiver_id").val());
});

$('#upload_photo').change(function(){
  var file_data = $('#upload_photo').prop('files')[0];   
  var form_data = new FormData();                  
  form_data.append('upload_photo', file_data);
  $.ajax({
      url: "<?php echo base_url('chat/chat_upload_photo'); ?>",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData:false,
      beforeSend: function(){
      },
       error:function(){
      },
      success: function(resp){
      }
  });
});

function groupdeletemember(user_id)
{
    $.ajax({
        url: main_url+'chat/groupdeletemember',
        type: 'post',
        data:{user_id:user_id,conversation_id:$("#receiver_id").val()},
        dataType: 'html',
        success:function(response){
            
            $("#groupdeletemember_ID").html(response);
        }
    });
}

function attached_file_hideshow(){
    $("#profile-user-collapseTwo").toggle();
}
function attached_file_hideshow1(){
    $("#collapseTwo").toggle();
}

$(document).ready(function(){
  $("#profile-user-collapseTwo").click(function(){
    $(".collapse").collapse('toggle');
  });
  $("#profile-setting-personalinfoheading").click(function(){
    $(".collapse").collapse('toggle');
  });


  $('#manishpatel').collapse({
        toggle: false
    });

});
</script>
<style type="text/css">
label {
    cursor: pointer;
}
#upload_photo {
    opacity: 0;
    position: absolute;
    z-index: -1;
}
</style>

</body>
</html>
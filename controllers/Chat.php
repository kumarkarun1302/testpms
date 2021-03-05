<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends MY_Controller {

    function index() {        
        //echo $this->db->last_query();exit;
        $this->load->view('chat/header_chat');
        $this->load->view('chat/chat');
    }

    public function ajax_get_groupname()
    {
        $html = '';
        $sender_id = getProfileName('user_id');
        $qry = $this->db->query("SELECT chat_id,sender_id,receiver_id,conversation_id,chat_msg,created_date FROM `tbl_chat` WHERE type_chat = 2 and eDelete = 0 and CONCAT(',', receiver_id, ',') like '%,$sender_id,%' ORDER BY `chat_id` DESC");
        $result = $qry->result_array(); 
        foreach ($result as $key => $val) {
            $html .= '<li class="media cursor-pointer user-selected-for-chat" data-id="'.$val['conversation_id'].'" onclick="type('.$val['conversation_id'].',"group")">    
                      <div class="media-body">
                        <div class="ml-2 font-weight-bold">'.$val['chat_msg'].'</div>
                      </div>
                    </li>';
        }
        echo $html;
    }

    public function get_chat_profilename()
    {
        $chat_id = $this->input->post('chat_id');
        $type = $this->input->post('type');
        if($type=='one'){
            $sql = $this->db->query("SELECT username,user_id FROM `tbl_users` WHERE `user_id` = '$chat_id' and user_id!=1");
        } else if($type=='group'){
            $sql = $this->db->query("SELECT chat_msg as username, sender_id as user_id FROM `tbl_chat` WHERE `conversation_id` = '$chat_id'");
        }
        $result = $sql->row_array();
        echo '<div class="media align-items-center"><div class="d-block d-lg-none mr-2">
                <a href="javascript:void(0)" class="user-chat-remove text-muted font-size-16 p-2">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
            </div>
            <div class="mr-3">
                <img src="'.get_user_img($result['user_id']).'" class="rounded-circle avatar-xs" alt="">
            </div>
            <div class="media-body overflow-hidden">
                <h5 class="font-size-16 mb-0 text-truncate">
                    <a href="javascript:void(0)" class="text-reset user-profile-show" id="getGroupName">'.$result['username'].'</a> 
                    <i class="ri-record-circle-fill font-size-10 text-success d-inline-block ml-1"></i>
                </h5>
            </div></div><div id="typing_on'.$chat_id.'"></div>';
    }

    public function chat_add()
    {
        $chat_msg = $this->input->post('chat_msg');
        $chat_type = $this->input->post('chat_type');
        $receiver_id = $this->input->post('receiver_id');
        send_one_message_notification($chat_msg,$receiver_id);
        $checkchatid=$this->db->query("SELECT user_id FROM `tbl_main_chat` WHERE `user_id`='$receiver_id' LIMIT 1");
        if($checkchatid->num_rows() == ''){
            $email=get_by_id('tbl_users','email,username','user_id',getProfileName('user_id'));
            $newcontactData=array('email'=>$email['email'],'username'=>$email['username'],'message'=>$chat_msg,'contact_user_id'=>getProfileName('user_id'),'user_id'=>$receiver_id,'contact_type'=>1,'created_date'=>date_from_today());
            insert_data_last_id('tbl_main_chat', $newcontactData);
            $comment_data = array('receiver_id'=>getProfileName('user_id'),'sender_id'=>$receiver_id,'chat_msg'=>$chat_msg,'type_chat'=>1,'created_date'=>date_from_today());
            insert_data_last_id('tbl_chat', $comment_data);
            //echo $this->db->last_query();exit;
        } 
        if($chat_type=='one'){
            $comment_data = array('sender_id'=>getProfileName('user_id'),'receiver_id'=>$receiver_id,'chat_msg'=>$chat_msg,'type_chat'=>3,'created_date'=>date_from_today());
            insert_data_last_id('tbl_chat', $comment_data);
        } else if($chat_type=='group'){
            $comment_data = array('sender_id'=>getProfileName('user_id'),'message'=>$chat_msg,'created_date'=>date_from_today(),'combo_id'=>$receiver_id);
            insert_data_last_id('tbl_groupchat', $comment_data);
        }        
    }

    public function show_chat_msg()
    {
        $chat_id = $this->input->post('chat_id');
        $type = $this->input->post('type');
        $sender_id = getProfileName('user_id');

        if($type=='one'){
            $sql = $this->db->query("SELECT * FROM `tbl_chat` WHERE `receiver_id` = '$sender_id' AND `sender_id` = '$chat_id' OR `receiver_id` = '$chat_id' AND `sender_id` = '$sender_id' and type_chat=3 ORDER BY `chat_id` ASC");
            $result_array_serach = $sql->result_array();
            $record_set = '';
            foreach ($result_array_serach as $key => $val) {
                if($val['receiver_id']==$chat_id){
                    $leftright = 'right';
                } else {
                    $leftright = 'left';
                }

                if($val['type_chat']=='3'){
                $record_set .= '
                <li class="'.$leftright.'">
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="'.get_user_img($val['receiver_id']).'" alt="">
                                    </div>
                                    <div class="user-chat-content">
                <div class="ctext-wrap">
                <div class="ctext-wrap-content">
                    <p class="mb-0">
                        '.$val['chat_msg'].'
                    </p>
                <p class="chat-time mb-0" style="">
                    <i class="ri-time-line align-middle"></i>
                    <span class="align-middle">'.date('g:i a',strtotime($val['created_date'])).'</span>
                </p>
            </div>
            <div class="dropdown align-self-start" style="display:none;">
                <a class="dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-more-2-fill"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="chat_copy('.$val['chat_id'].')" style="display:none;">Copy <i class="ri-file-copy-line float-right text-muted"></i></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="chat_forward('.$val['chat_id'].')" style="display:none;">Forward <i class="ri-chat-forward-line float-right text-muted"></i></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="chat_delete('.$chat_id.','.$val['chat_id'].')">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
                </div>
            </div>
                        </div>
                        <div class="conversation-name" style="display:none;">'.getProfileName('username').'</div>
                    </div>
                </div>
            </li>';
                }
            }

        } else if($type=='group'){
            $conversationid =$this->input->post('receiver_id');
            $sql = $this->db->query("SELECT sender_id,receiver_id,conversation_id,chat_msg FROM `tbl_chat` WHERE type_chat = 2 and eDelete = 0 and conversation_id=$chat_id");
            $result_array = $sql->row_array();
            $receiver_id = $result_array['receiver_id'];
            $conversation_id = $result_array['conversation_id'];
            $record_set = '';
            $sql1 = $this->db->query("SELECT *  FROM `tbl_groupchat` WHERE `sender_id` IN ($receiver_id) and combo_id = $conversation_id and eDelete = 0");
            $result_main = $sql1->result_array();
            foreach ($result_main as $key => $val) {
                if($val['sender_id']==$sender_id){
                    $leftright = 'right';
                } else {
                    $leftright = 'left';
                }
                $uname=getsession_manish($val['sender_id']);
                //echo $uname;exit;
                $record_set .= '
                <li class="'.$leftright.'">
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="'.get_user_img($val['sender_id']).'" alt="">
                                    </div>

                                    <div class="user-chat-content">
<div class="ctext-wrap">
<div class="ctext-wrap-content">
    <p class="mb-0">
        '.$val['message'].'
    </p>
    <p class="chat-time mb-0">
        <i class="ri-time-line align-middle"></i>
        <span class="align-middle">'.date('g:i a',strtotime($val['created_date'])).'</span>
    </p>
</div>
<div class="dropdown align-self-start" style="display:none;">
    <a class="dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-more-2-fill"></i>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0)" onclick="chat_copy('.$val['group_id'].')" style="display:none;">Copy <i class="ri-file-copy-line float-right text-muted"></i></a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="chat_forward('.$val['group_id'].')" style="display:none;">Forward <i class="ri-chat-forward-line float-right text-muted"></i></a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="chat_groupdelete('.$val['group_id'].','.$val['group_id'].')">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
    </div>
</div>
            </div>
            <div class="conversation-name">'.$uname['username'].'</div>
        </div>
    </div>
</li>';
            }
        }

        echo $record_set;
    }

    public function currentProfileAbout($result)
    {
        return '<div class="px-3 px-lg-4 pt-3 pt-lg-4">
                        <div class="user-chat-nav text-right">
                            <button type="button" class="btn nav-btn" id="user-profile-hide" onclick="ri_close_line()">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center p-4 border-bottom">
                        <div class="mb-4">
                            <img src="'.get_user_img($result['user_id']).'" class="rounded-circle avatar-lg img-thumbnail" alt="">
                        </div>
                        <h5 class="font-size-16 mb-1 text-truncate">'.$result['username'].'</h5>
                        <p class="text-muted text-truncate mb-1">
                            <i class="ri-record-circle-fill font-size-10 text-success mr-1"></i> Active
                        </p>
                    </div>
                    <div class="p-4 user-profile-desc" data-simplebar="init">
                        <div class="text-muted">
                            <p class="mb-4">'.$result['user_about'].'</p>
                        </div>
                        <div id="profile-user-accordion" class="custom-accordion">
                            <div class="card shadow-none border mb-2">
                                <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="font-size-14 m-0">
                                            <i class="ri-user-2-line mr-2 align-middle d-inline-block"></i> About
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#profile-user-accordion">
                                    <div class="card-body">
                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14">'.$result['username'].'</h5>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14">'.$result['email'].'</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14">'.date_fjy($result['created_at']).'</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1 shadow-none border">
                                <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="card-header" id="headingTwo" onclick="attached_file_hideshow1()">
                                        <h5 class="font-size-14 m-0" id="manishpatel">
                                            <i class="ri-attachment-line mr-2 align-middle d-inline-block"></i> Attached Files
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#profile-user-accordion">
        <div class="card-body">
            <div class="card p-2 border mb-2">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3">
                        <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                            <i class="ri-image-fill"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="text-left">
                            <h5 class="font-size-14 mb-1">Image-1.jpg</h5>
                            <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                        </div>
                    </div>
                    <div class="ml-4">
                        <ul class="list-inline mb-0 font-size-18">
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="text-muted px-1">
                                    <i class="ri-download-2-line"></i>
                                </a>
                            </li>
                            <li class="list-inline-item dropdown">
                                <a class="dropdown-toggle text-muted px-1" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>';
    }

    public function currentProfileAboutGroup($receiver_id)
    {
        $sql1=$this->db->query("SELECT sender_id,receiver_id,chat_msg FROM `tbl_chat` WHERE `conversation_id`='$receiver_id'");
        $result1=$sql1->row_array();
        $receiverId=$result1['receiver_id'];
        $sql=$this->db->query("SELECT username,user_id,picture_url FROM `tbl_users` WHERE `user_id` IN ($receiverId) and user_id!=1");
        $result = $sql->result_array();

        $html ='<div class="px-3 px-lg-4 pt-3 pt-lg-4">
                    <div class="user-chat-nav text-right">
                        <button type="button" class="btn nav-btn" id="user-profile-hide" onclick="ri_close_line()">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    </div>
                    <div id="GroupChat-Details">
                        <div class="d-flex justify-content-center mt-3">
                            <div class="avatar xxl">
                                <div class="avatar xxl rounded-circle no-image timber">
                                    <span>'.substr($result1['chat_msg'],0,1).'</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-5">
                            <h4>'.$result1['chat_msg'].'</h4>
                        </div>
                        

                        <ul class="chat-list" id="groupdeletemember_ID" data-simplebar>
                            <li class="header d-flex justify-content-between ps-3 pe-3 mb-1">
                                <span>Members</span>
                                <div class="dropdown">
                                    <a class="btn btn-link d-inline-block px-1 py-0 border-0 text-muted addGroupMemberBtn" href="#" data-toggle="modal" data-target="#editgroup-exampleModal" data-toggle="tooltip" title="" data-original-title="Add new user"><i class="fas fa-user-plus"></i></a>
                                </div>
                            </li>';
            foreach ($result as $key => $value) {
                if($value['user_id']==$result1['sender_id']){
                    $mdr='<div class="groupAdminMember">
                            <h5>Group Admin</h5>
                        </div>';
                } else {
                    $mdr='<div class="removeGroupMember">
                            <a class="btn btn-link d-inline-block px-1 py-0 border-0 text-muted" href="javascript:void(0);" onclick="groupdeletemember('.$value['user_id'].')"><i class="far fa-trash-alt" data-toggle="tooltip" title="" data-original-title="Delete User"></i>
                            </a>
                        </div>';
                }
                
                $html .='<li>
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar mr-3">
                                    <img class="avatar rounded-circle" src="'.$value['picture_url'].'" alt="avatar">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="text-truncate mb-0 me-auto">'.$value['username'].'</h6>
                                    </div>
                                </div>
                                '.$mdr.'
                            </div>
                        </div>
                    </div>
                </li>';
                        
                    }
                $html .='</ul>
            </div>';
        return $html;
    }

    public function get_ajaxdeletegrouplist($receiver_id)
    {
        $sql1=$this->db->query("SELECT sender_id,receiver_id,chat_msg FROM `tbl_chat` WHERE `conversation_id`='$receiver_id'");
        $result1=$sql1->row_array();
        $receiverId=$result1['receiver_id'];
        $sql=$this->db->query("SELECT username,user_id,picture_url FROM `tbl_users` WHERE `user_id` IN ($receiverId) and user_id!=1");
        $result = $sql->result_array();

        $html = '<li class="header d-flex justify-content-between ps-3 pe-3 mb-1">
                    <span>Members</span>
                    <div class="dropdown">
                        <a class="btn btn-link d-inline-block px-1 py-0 border-0 text-muted addGroupMemberBtn" href="#" data-toggle="modal" data-target="#editgroup-exampleModal" data-toggle="tooltip" title="" data-original-title="Add new user"><i class="fas fa-user-plus"></i></a>
                    </div>
                </li>';
        foreach ($result as $key => $value) {
            if($value['user_id']==$result1['sender_id']){
                $html .='<li>
                <div class="card">
                    <div class="card-body">
                <div class="media">
                    <div class="avatar mr-3">
                        <img class="avatar rounded-circle" src="'.$value['picture_url'].'" alt="avatar">
                    </div>
                    <div class="media-body overflow-hidden">
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="text-truncate mb-0 me-auto">'.$value['username'].'</h6>
                                    </div>
                                </div>
                                <div class="removeGroupMember">
                                    Admin
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';
                } else {

                $html .='<li>
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-3">
                                        <img class="avatar rounded-circle" src="'.$value['picture_url'].'" alt="avatar">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 me-auto">'.$value['username'].'</h6>
                                        </div>
                                    </div>
                                    <div class="removeGroupMember">
                                        <a class="btn btn-link d-inline-block px-1 py-0 border-0 text-muted" href="javascript:void(0);" onclick="groupdeletemember('.$value['user_id'].')"><i class="far fa-trash-alt" data-toggle="tooltip" title="" data-original-title="Delete User"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>';
            }

        }
        return $html;
    }

    public function groupdeletemember()
    {
        $conversation_id = $this->input->post('conversation_id');
        $user_id = $this->input->post('user_id');
        $query = $this->db->query("select receiver_id from tbl_chat where conversation_id='$conversation_id' and type_chat=2");
        $get_comma_value_by_user = $query->row_array();

        //echo print_r($get_comma_value_by_user);
        $new_value_userID = removeFromString($get_comma_value_by_user['receiver_id'],$user_id);
        //echo $new_value_userID;exit;
        $sql=$this->db->query("UPDATE `tbl_chat` SET receiver_id='$new_value_userID' WHERE conversation_id='$conversation_id' and type_chat=2");
        echo $this->get_ajaxdeletegrouplist($conversation_id);
    }

    public function current_profile_about()
    {
        $receiver_id = $this->input->post('receiver_id');
        $chat_type = $this->input->post('chat_type');
        
        if($chat_type=='group'){
            echo $this->currentProfileAboutGroup($receiver_id);
        } else {
            $sql = $this->db->query("SELECT username,user_id,email,created_at,user_about FROM `tbl_users` WHERE `user_id` = '$receiver_id' and user_id!=1");
            $result = $sql->row_array();
           echo $this->currentProfileAbout($result);
        }
        
    }

    public function load_message()
    {
        $own_id = $this->input->post('own_id');
        $partner_id = $this->input->post('partner_id');
        $is_typing = $this->input->post('is_typing');
        $sql=$this->db->query("SELECT * FROM `typing` WHERE typing_from=$own_id and typing_to=$partner_id");
        $result=$sql->row_array();
        $typingData=array('typing_from'=>$own_id,'typing_to'=>$partner_id,'typing_ornot'=>$is_typing);
        if($sql->num_rows() > 0){
            $this->db->query("UPDATE `typing` SET `typing_ornot`=$is_typing where `typing_from`=$own_id and `typing_to`=$partner_id");
        } else {
            insert_data_last_id('typing', $typingData);
        }
    }

    public function is_typing()
    {
        $own_id = $this->input->post('own_id');
        $partner_id = $this->input->post('partner_id');
        $sql=$this->db->query("SELECT typing_ornot FROM `typing` WHERE typing_from=$partner_id and typing_to=$own_id and typing_ornot=1");
        if($sql->num_rows() > 0){
            echo '1';
        } else {
            echo '0';
        }
    }

    public function submit_invite_contact()
    {
        $email = $this->input->post('email');
        $parts = explode('@',$email);
        $username = $parts[0];
        $user_id=getProfileName('user_id');
        $asdfg=get_by_id('tbl_users','user_id','email', $email);
        $contact_user_id=$asdfg['user_id'];
        if($contact_user_id){
            $sql=$this->db->query("SELECT contact_user_id FROM `tbl_main_chat` WHERE user_id=$user_id and email='$email'");
            $result=$sql->row_array();
            if($sql->num_rows() > 0){
                echo '1';
            } else {
                $newcontactData=array('email'=>$this->input->post('email'),'username'=>$username,'message'=>$this->input->post('message'),'user_id'=>getProfileName('user_id'),'contact_user_id'=>$contact_user_id,'created_date'=>date_from_today());
                insert_data_last_id('tbl_main_chat', $newcontactData);
            }
        } else {
            echo '2';
        }
    }

    public function searching_contact_group()
    {
        $html = '';
        foreach (range('A', 'Z') as $column){
            $this->db->select('*');
            $this->db->where('user_id',getProfileName('user_id'));
            $this->db->like('username', $column, 'after');
            $query = $this->db->get('tbl_main_chat');
            if($query->num_rows() > 0){
                $html .='<div>
                        <div class="p-3 font-weight-bold text-primary">
                            '.$column.'
                        </div>
                        <ul class="list-unstyled contact-list">';
                        $reslut=$query->result_array();
                        foreach ($reslut as $key => $value) {
                            $html .='<li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input mani" id="memberCheck'.$value['main_chat_id'].'" name="groupname_userid" value="'.$value['contact_user_id'].'">
                                    <label class="custom-control-label" for="memberCheck'.$value['main_chat_id'].'">'.$value['username'].'</label>
                                </div>
                                </li>';
                            }
                        $html .='</ul>
                    </div>';
            }
        }
        echo $html;
    }

    public function edit_contact_group()
    {
        $html = '';
        $receiver_id=$this->input->post('conversation_id');
        $sql1=$this->db->query("SELECT receiver_id FROM `tbl_chat` WHERE `conversation_id`='$receiver_id'");
        $result1=$sql1->row_array();
        $receiverId=$result1['receiver_id'];
        foreach (range('A', 'Z') as $column){
            $this->db->select('*');
            $this->db->where('user_id',getProfileName('user_id'));
            $this->db->like('username', $column, 'after');
            $query = $this->db->get('tbl_main_chat');
            if($query->num_rows() > 0){
                $html .='<div>
                        <div class="p-3 font-weight-bold text-primary">
                            '.$column.'
                        </div>
                        <ul class="list-unstyled contact-list">';
                        $reslut=$query->result_array();
                        $conversation_id = explode(',', trim($receiverId));
                        foreach ($reslut as $key => $value) {

                            if(in_array($value['contact_user_id'],$conversation_id)){
                            $checkedp_edit='checked';
                            } else { $checkedp_edit=''; }

                            $html .='<li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="groupmemberCheck'.$value['main_chat_id'].'" name="editgroupname_userid" value="'.$value['contact_user_id'].'" '.$checkedp_edit.'>
                                    <label class="custom-control-label" for="groupmemberCheck'.$value['main_chat_id'].'">'.$value['username'].'</label>
                                </div>
                                </li>';
                            }
                        $html .='</ul>
                    </div>';
            }
        }
        echo $html;
    }

    public function searching_contact()
    {
        $html = '';
        $emailsearch = $this->input->post('search');
        foreach (range('A', 'Z') as $column){
            $this->db->select('*');
            $this->db->where('user_id',getProfileName('user_id'));
            $this->db->where('contact_type',0);
            $this->db->like('username', $column, 'after');
            if($emailsearch){
                $this->db->like('email', $emailsearch);
            }
            $query = $this->db->get('tbl_main_chat');
            $reslut=$query->result_array();

            //echo print_r($reslut);exit;

            if($query->num_rows() > 0){
            $html .= '<div>
                    <div class="p-3 font-weight-bold text-primary">
                        '.$column.'
                    </div>
                    <ul class="list-unstyled contact-list">';
                    $reslut=$query->result_array();
                    foreach ($reslut as $key => $value) {
                        $html .='<li onclick="openchat1('.$value['contact_user_id'].')">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h5 class="font-size-14 m-0">'.$value['username'].'</h5>
                                </div>
                                <div class="dropdown">
                                <a href="javascript:void(0)" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)" style="display:none;">Share <i class="ri-share-line float-right text-muted"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" style="display:none;">Block <i class="ri-forbid-line float-right text-muted"></i></a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_contact('.$value['main_chat_id'].')">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
                                </div>
                            </div>
                            </div>
                        </li>';
                        }
                    $html .='</ul>
                </div>';
                } 
            }
        echo $html;
    }

    public function delete_contact()
    {
        $main_chat_id = $this->input->post('main_chat_id');
        $sql=$this->db->query("DELETE FROM `tbl_main_chat` WHERE main_chat_id=$main_chat_id");
        echo true;
    }

    public function group_name_add()
    {
        $chat_msg = $this->input->post('group_name');
        $receiver_id = implode(',',$this->input->post('checkbox_chat'));
        $comment_data = array('sender_id'=>getProfileName('user_id'),'receiver_id'=>getProfileName('user_id').','.$receiver_id,'chat_msg'=>$chat_msg,'type_chat'=>2,'created_date'=>date_from_today(),'conversation_id'=>time());
        insert_data_last_id('tbl_chat', $comment_data);
        echo $receiver_id;
    }

    public function submit_create_group()
    {
        $group_name = $this->input->post('group_name');
        $group_description = $this->input->post('group_description');
        $multiple_user_id = $this->input->post('multiple_user_id');
        $multiple_user_id =  implode(',',$multiple_user_id);
        $main_group_chatData=array('group_name'=>$group_name,'group_description'=>$group_description,'multiple_user_id'=>$multiple_user_id,'user_id'=>getProfileName('user_id'));
        insert_data_last_id('tbl_main_group_chat', $main_group_chatData);

        $comment_data = array('sender_id'=>getProfileName('user_id'),'receiver_id'=>getProfileName('user_id').','.$multiple_user_id,'chat_msg'=>$group_name,'type_chat'=>2,'created_date'=>date_from_today(),'conversation_id'=>time());
        insert_data_last_id('tbl_chat', $comment_data);

    }

    public function edit_submit_create_group()
    {
        $group_name = $this->input->post('group_name');
        $multiple_user_id = $this->input->post('multiple_user_id');
        $multiple_user_id =  implode(',',$multiple_user_id);
        $conversation_id = $this->input->post('conversation_id');

        $query=$this->db->query("select receiver_id from tbl_chat where conversation_id=$conversation_id and type_chat=2");
        $checkgetidreceiver_id = $query->row_array();
        $oldmultiple_user_id=$checkgetidreceiver_id['receiver_id'];

        $receiver_id = implode(',',array_unique(explode(',', $oldmultiple_user_id.','.$multiple_user_id)));

        $datatbl_chat = array('chat_msg'=>$group_name,'receiver_id'=>$receiver_id);
        $multi_where = array('conversation_id'=>$conversation_id,'type_chat'=>2);
        edit_update_multi_where('tbl_chat', $datatbl_chat, $multi_where);

    }

    public function ajax_groupcontact_list()
    {
        $html = '';
        $emailsearch = $this->input->post('search');
        $sender_id = getProfileName('user_id');
        /*$this->db->select('*');
        $this->db->where('sender_id',getProfileName('user_id'));
        $this->db->where('type_chat',2);
        if($emailsearch){
            $this->db->like('chat_msg', $emailsearch);
        }
        $query = $this->db->get('tbl_chat');*/

        $query = $this->db->query("SELECT chat_id,sender_id,receiver_id,conversation_id,chat_msg,created_date FROM `tbl_chat` WHERE type_chat = 2 and eDelete = 0 and CONCAT(',', receiver_id, ',') like '%,$sender_id,%' ORDER BY `chat_id` DESC");

        $reslut=$query->result_array();
        //echo $this->db->last_query();exit;
        $group = 'group';
        foreach ($reslut as $key => $value) {
            $html .='<li>
                    <a href="javascript:void(0)" onclick="openchat('.$value['conversation_id'].')">
                        <div class="media align-items-center">
                            <div class="chat-user-img mr-3">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">'.substr($value['chat_msg'],0,1).'</span>
                                </div>
                            </div>
                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-0">'.$value['chat_msg'].' <span class="badge badge-soft-danger badge-pill float-right">+'.count(explode(',', $value['receiver_id'])).'</span></h5>
                            </div>
                        </div>
                    </a>
                </li>';
        }

        echo $html;
    }

    public function chat_delete()
    {
        $chat_id = $this->input->post('chat_id');
        $sql=$this->db->query("DELETE FROM `tbl_chat` WHERE chat_id=$chat_id");
        echo true;
    }

    public function chat_groupdelete()
    {
        $group_id = $this->input->post('group_id');
        $sql=$this->db->query("DELETE FROM `tbl_groupchat` WHERE group_id=$group_id");
        echo true;
    }

    public function chat_upload_photo() {
        $data = array();
        if($_FILES['upload_photo']['name']){
            $data1 = fileUploadd('upload_photo');
            $data = $data1;
            $upload_photo = $data1['file_name'];
        } else {
            $upload_photo = $this->input->post('upload_photoOLD');
        }
        $user_id = getProfileName('user_id');
        $picture_url=base_url().'uploads/'.$upload_photo;
        $data1 = array('picture'=>$upload_photo,'picture_url'=>$picture_url);
        edit_update('tbl_users',$data1,'user_id',$user_id);
        echo 1;
    }

    // searching //

    public function msg_read_unread()
    {
        $chat_id=$this->input->post('chat_id');
        $this->db->query("UPDATE `tbl_chat` SET read_msg=1 where sender_id=$chat_id");
    }

    public function ajax_searchingcurrentuser()
    {
        $search = $this->input->post('search');
        $user_id = getProfileName('user_id');
        $html = '';
        //$qry_one=$this->db->query("SELECT GROUP_CONCAT(DISTINCT t1.contact_user_id) as userid FROM `tbl_main_chat` as t1 left join tbl_chat as t2 ON (t1.contact_user_id=t2.receiver_id) where t2.type_chat IN (1,3)");
//echo $this->db->last_query();exit;
        $qry_one=$this->db->query("SELECT GROUP_CONCAT(sender_id) as userid FROM `tbl_chat` where receiver_id=$user_id");
        $result_one = $qry_one->row_array();
            
$qry_one1=$this->db->query("SELECT GROUP_CONCAT(contact_user_id) as contact_user_id FROM `tbl_main_chat` where user_id=$user_id");
$result_one1 = $qry_one1->row_array();
        
        $multipleuserid=$result_one['userid'];
        if($multipleuserid){
            $multipleuserid = $result_one['userid'].','.$result_one1['contact_user_id'];
        } else {
            $multipleuserid = $result_one1['contact_user_id'];
        }

        if($multipleuserid){
            $qry = $this->db->query("select username,user_id from tbl_users where user_id IN ($multipleuserid) and user_id!=$user_id and user_id!=1");
        } else {
            $qry=$this->db->query("SELECT GROUP_CONCAT(DISTINCT t1.contact_user_id) as userid FROM `tbl_main_chat` as t1 left join tbl_chat as t2 ON (t1.contact_user_id=t2.receiver_id) where t2.type_chat IN (1,3)");
        } 
        $result = $qry->result_array(); 
        foreach ($result as $key => $val) {
        $sender_id=$val['user_id'];
        $qryone=$this->db->query("SELECT COUNT(receiver_id) as receiver_id FROM `tbl_chat` where receiver_id=$user_id and read_msg=0 and sender_id=$sender_id");
        $resultone = $qryone->row_array();
        $msgCount=$resultone['receiver_id'];

            $html .='<li>
                <a href="javascript:void(0)" data-id="'.$val['user_id'].'" onclick="openchat1('.$val['user_id'].')">
                    <div class="media">
                        <div class="chat-user-img online align-self-center mr-3">
                            <img src="'.get_user_img($val['user_id']).'" class="rounded-circle avatar-xs" alt="">
                            <span class="user-status"></span>
                        </div>
                        <div class="media-body overflow-hidden">
                            <h5 class="text-truncate font-size-15 mb-1">'.$val['username'].' </h5>
                        </div>';

                    if($msgCount==0){ $msgCount=''; 
                    } else { 
                       $html .='<div class="font-size-11" style="display:none;"><span class="msgCount">'.$msgCount.'</span></div>';
                    }

                        

                    $html .='</div>
                </a>
            </li>';
             } 
        //}
        echo $html;
    }


}
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PMS Role Permission | ANJ Webtech Pvt Ltd</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="<?php echo base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/responsive.css">

    <!-- Dragula -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/dragula/dragula.min.css">

    <!--Simplebar CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/simplebar.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/structure.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/animate.css/animate.min.css">

    <!-- Nestable CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/jquery-nestable.css">

    <!-- Role Permission CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/rolePermission.css">

    <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=601ba3a85692e4001147c438&product=undefined' async='async'></script> -->

</head>

<body class="common_dashboard_trello rolePermission-bg">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container" style="background-color: rgb(94, 37, 111);">
        <header class="header navbar navbar-expand-sm">
            <ul class="left-side-navbar navbar-item flex-row pl-2">
                
                <li class="nav-item">
                    <a href="<?php echo base_url(''); ?>" class="homeIcon"><i class="fas fa-home"></i></a>
                </li>
                
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>                 
<form action="<?php echo base_url('serach'); ?>" class="form-inline search-full form-inline search" role="search" method="post" autocomplete="off">
    <div class="search-bar">

<input type="search" list="datalistOptions" class="form-control search-form-control  ml-lg-auto" placeholder="Search..." aria-label="Search" id="search" autocomplete="off">

<span id="search_data"></span>
                   
</div>
</form>

                </li>
            </ul>

            <ul class="navbar-item theme-brand flex-row m-auto text-center">
                <li class="nav-item theme-logo">
                    <a href="<?php echo base_url(''); ?>">
                        <img src="<?php echo base_url('assets/'); ?>images/header_logo.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
            </ul>


            <ul class="right-side-navbar navbar-item flex-row ml-md-auto pr-2">
               
<?php if(get_role_permission('github',$project_id_new)=='yes' || get_role_permission('chat',$project_id_new)=='yes' || get_role_permission('file_storage',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
               <li class="nav-item dropdown appList-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle homeIcon" id="appList-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-th"></i>
                    </a>
                    <div class="dropdown-menu position-absolute  moreAtlassian-dropdown" aria-labelledby="appList-dropdown">
                        <div class="appListBlock-box">
                            <ul>
<?php if(get_role_permission('github',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
    <li>
        <a class="appList-icon-item" href="https://github.com/feedbackanjwebtech/pms" target="_blank">
            <img src="<?php echo base_url('assets/'); ?>images/brands/github.png" alt="Github">
            <span>GitHub</span>
        </a>
    </li>
<?php } ?>
                                
<?php if(get_role_permission('file_storage',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
    <li>
        <a class="appList-icon-item" href="<?php echo base_url(); ?>anj_drive" target="_blank">
            <img src="<?php echo base_url('assets/'); ?>images/anjdriveicon.png" alt="ANJ Drive">
            <span>ANJ DRIVE</span>
        </a>
    </li>
<?php } ?>

<?php if(get_role_permission('chat',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
<li>
    <a class="appList-icon-item" href="<?php echo base_url(); ?>chat" target="_blank">
        <img src="<?php echo base_url('assets/'); ?>images/chat-icon.png" alt="chat">
        <span>Chat</span>
    </a>
</li>
<?php } ?>
                            </ul>
                        </div>
                    </div>
                </li>
               <?php } ?>

                <!-- <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link homeIcon" data-toggle="modal" data-target="#inviteTeamModal" data-placement="top" title="mamsamsaska">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </li> -->

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle homeIcon" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="notification-box">
                            <span class="notification-count"></span>
                                <div class="notification-bell">
                                    <i class="far fa-bell"></i>
                                </div>
                        </div>
                    </a> 
                    <div class="dropdown-menu position-absolute  moreAtlassian-dropdown" aria-labelledby="notification-dropdown">
                        <div class="moreAtlassian_heading_icon">
                            <div class="moreAtlassian-heading">
                                Notifications
                            </div>
                            <a href="#" class="popover-close">
                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 7L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893C0.683418 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683418 14.0976 1.31658 13.7071 1.70711L8.41421 7L13.7071 12.2929C14.0976 12.6834 14.0976 13.3166 13.7071 13.7071C13.3166 14.0976 12.6834 14.0976 12.2929 13.7071L7 8.41421L1.70711 13.7071C1.31658 14.0976 0.683418 14.0976 0.292893 13.7071C-0.0976311 13.3166 -0.0976311 12.6834 0.292893 12.2929L5.58579 7Z" fill="currentColor"></path></svg>
                            </a>
                        </div>
                        <div class="notificationBlock-box">
                            <div class="static-message">
                            <div class="static-message-icon">
                            <div class="icon"><i class="fas fa-info"></i></div>
                            </div>
                            <div class="static-message-text">
                            You don't have any notifications
                            </div>
                            </div>
                            <ul id="getNotificationList" data-simplebar>
                            </ul>
                            <!-- <a href="" class="viewAllNotification">View All Notification</a> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo getProfileName('picture_url'); ?>" class="userIcon img-fluid" alt="<?php echo getProfileName('picture'); ?>">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="moreAtlassian_heading_icon">
                            <div class="moreAtlassian-heading">
                                Account
                            </div>
                            <a href="#" class="popover-close">
                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 7L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292893C0.683418 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683418 14.0976 1.31658 13.7071 1.70711L8.41421 7L13.7071 12.2929C14.0976 12.6834 14.0976 13.3166 13.7071 13.7071C13.3166 14.0976 12.6834 14.0976 12.2929 13.7071L7 8.41421L1.70711 13.7071C1.31658 14.0976 0.683418 14.0976 0.292893 13.7071C-0.0976311 13.3166 -0.0976311 12.6834 0.292893 12.2929L5.58579 7Z" fill="currentColor"></path></svg>
                            </a>
                        </div>
                        <div class="UserDetailsList-Box">
                            <div class="userDetails">
                            
                            <div class="userProfileLink-box">
<ul>
    <?php 
    $main_merge_account = get_cookie('manish_mergeaccount_set');
    $merge_account_userID = get_cookie('manish_userid_set');
    $query_joinaccount = $this->db->query("select user_id,main_account from tbl_merge_users where main_account='".$merge_account_userID."'");
    $queryjoinaccount = $query_joinaccount->row_array();
    if($queryjoinaccount['main_account']){
        $user_id_multi = $queryjoinaccount['user_id'];
        $query = $this->db->query("select user_id,username,slug_username from tbl_users where user_id IN ($user_id_multi) OR user_id='".$merge_account_userID."'");
        $queryResult = $query->result_array();
        foreach ($queryResult as $key => $value) {
            if($value['user_id']==$merge_account_userID){ $css = 'background-color: antiquewhite;border-radius: 10px;'; } else { $css=''; }
    ?>
    <li style="<?php echo $css; ?>">
        <a target="_blank" href="<?php echo base_url('anj/').$value['slug_username']; ?>"><?php if($value['slug_username']==getSession('slug_username')){ ?><svg class="Icon MenuItem-selectedIcon CheckIcon" focusable="false" viewBox="0 0 32 32" style="height: 12px;"><path d="M10.9,26.2c-0.5,0-1-0.2-1.4-0.6l-6.9-6.9c-0.8-0.8-0.8-2,0-2.8s2-0.8,2.8,0l5.4,5.4l16-15.9c0.8-0.8,2-0.8,2.8,0s0.8,2,0,2.8L12.3,25.6C11.9,26,11.4,26.2,10.9,26.2z"></path></svg><?php } ?><?php echo $value['username']; ?></a>
    </li>
    <?php } } ?>                    
</ul>
                            </div>

                                <hr>
                                <div class="userImg">
                                    <img src="<?php echo getProfileName('picture_url'); ?>" class="img-fluid" alt="<?php echo getProfileName('picture'); ?>">
                                </div>
                                <div class="userNameEmail">
                                    <h4><?php echo getProfileName('username'); ?></h4>
                                    <h6><?php echo getProfileName('email'); ?></h6>
                                </div>
                            </div>

<?php if(get_role_permission('account_merge',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
<div class="addAccount-box" style="margin: 5px 20px;">
<a href="javascript:void()" data-toggle="modal" data-target="#addanotheraccountModal">Add Another Account <span class="badge badge-secondary">New</span></a>
</div>
<?php } ?>

                            <div class="userProfileLink-box">
                                <ul>
                                    <li>
                                        <a class="" href="#" data-toggle="modal" data-target="#userProfileModal">My Profile</a>
                                    </li>
                                    <li>
                                        <a class="" href="#" data-toggle="modal" data-target="#userChangePWModal">Change Password</a>
                                    </li>
                                    <?php if($this->uri->segment(2)){ ?>
                                    <li>
                                        <a href="javascript:void()" data-toggle="modal" data-target="#userChangebgModal">Change Background</a>
                                    </li>
                                <?php } ?>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="top" title="Logout PMS System" class="" href="<?php echo base_url('logout'); ?>">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <?=$this->session->flashdata('error')?>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <?=$this->session->flashdata('success')?>
    </div>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <!--  BEGIN BOARDS MAIN CONTAINER  -->
    <div class="boards-container rolePermission pt-3" id="container" data-simplebar>
        <div class="board-canvas container-fluid metricsContainer">
            <div class="row no-gape mb-2 mainpageheader">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboardTitleIcon_box">
                        <div class="dashboardTitle">
                            <span>Role Permission</span>
                        </div>
                    </div>
                </div>
            </div>
<?php 
$project_id=anj_decode($this->uri->segment(2));
$query = $this->db->query("SELECT project_link FROM `tbl_project` WHERE `project_id`='$project_id'");
$result = $query->row_array();
?>
            <div class="row no-gape mb-3">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <div class="blockHeaderTitle">
                                <h5 class="blockTitle"><?php echo ucfirst(getProfileName('username').' ('.getuser_type(getProfileName('user_type')).')'); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('insert_Permission'); ?>" method="post" name="form_permission" id="form_permission">
                <input type="hidden" name="project_id" id="project_id" value="<?php echo $this->uri->segment(2); ?>">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="addaccount">Email:</label>
                                            <!-- <input type="text" class="form-control" name="account_email" id="account_email" placeholder="Enter Email ID" onblur="validateEmail1(this);"> -->
                                            <input type="text" class="form-control" name="account_email" id="account_email" placeholder="Enter Email ID">
                                            <span id="errormsgaccount_email" style="display: none;"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="role_name">Select Designation</label>
                                            <div class="input-group">
                                                <select class="custom-select" id="role_name" name="role_name">
                                                    <option value="">Select Designation</option>
                                                    <?php echo getusertypeDropDownList(getProfileName('user_type')); ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="addroleButton" data-toggle="modal" data-target="#addroleModal"><i class="fas fa-plus"></i></button>
                                                </div>

                                            </div>
                                            <span id="errormsgrole_name"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label for="accountmerge">Account Merge:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="account_merge" type="radio" id="account_merge1" value="yes">
                                        <label class="form-check-label" for="account_merge1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="account_merge" type="radio" id="account_merge2" value="no">
                                        <label class="form-check-label" for="account_merge2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="team_add">Team Add:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="add_team" type="radio" id="add_team1" value="yes">
                                        <label class="form-check-label" for="add_team1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="add_team" type="radio" id="add_team2" value="no">
                                        <label class="form-check-label" for="add_team2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label>Projects</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud1" value="add">
                                        <label class="form-check-label" for="project_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud2" value="edit">
                                        <label class="form-check-label" for="project_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud3" value="hold">
                                        <label class="form-check-label" for="project_crud3">Hold</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud4" value="completed">
                                        <label class="form-check-label" for="project_crud4">Completed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project_crud[]" type="checkbox" id="project_crud5" value="delete">
                                        <label class="form-check-label" for="project_crud5">Delete</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Labels</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud1" value="add">
                                        <label class="form-check-label" for="label_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud2" value="edit">
                                        <label class="form-check-label" for="label_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="display: none;">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud3" value="view">
                                        <label class="form-check-label" for="label_crud3">View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="label_crud[]" type="checkbox" id="label_crud4" value="delete">
                                        <label class="form-check-label" for="label_crud4">Delete</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tasks</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud1" value="add">
                                        <label class="form-check-label" for="task_crud1">Add</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud2" value="edit">
                                        <label class="form-check-label" for="task_crud2">Edit</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="display: none;">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud3" value="view">
                                        <label class="form-check-label" for="task_crud3">View</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="task_crud[]" type="checkbox" id="task_crud4" value="delete">
                                        <label class="form-check-label" for="task_crud4">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-group">
                                    <label for="chat">Chat:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chat" type="radio" id="chat1" value="yes">
                                        <label class="form-check-label" for="chat1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="chat" type="radio" id="chat2" value="no">
                                        <label class="form-check-label" for="chat2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="github">Github:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="github" type="radio" id="github1" value="yes">
                                        <label class="form-check-label" for="github1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="github" type="radio" id="github2" value="no">
                                        <label class="form-check-label" for="github2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file_storage">File Storage:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="file_storage" type="radio" id="file_storage1" value="yes">
                                        <label class="form-check-label" for="file_storage1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="file_storage" type="radio" id="file_storage2" value="no">
                                        <label class="form-check-label" for="file_storage2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="rolePermissionBtn w-100">
                            <input type="submit" class="btn btn-primary d-block" onclick="return ValidateEmail2()" value="Submit" name="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END BOARDS MAIN CONTAINER -->

    <div class="modal fade" id="addroleModal" tabindex="-1" role="dialog" aria-labelledby="addroleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addroleModalLabel">Add Role/Designation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <form method="post"> -->
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Role / Designation Name:</label>
                            <input autocomplete="off" class="form-control" id="new_rolename" name="new_rolename" placeholder="Enter Role / Designation Name" type="text" required>
                    </div>
                </div>
           <!--  </form> -->
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addrole_submit" onclick="addrole_submit()">Submit</button>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/jquery-3.5.0.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/validator.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula/dragula.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script type="text/javascript">

  //Nice trick! but not permitted!

var main_url = '<?php echo base_url(); ?>';
var main_url_dashboard = main_url+'dashboard/';

var timeoutHandle;

<?php 
$qry=$this->db->query("SELECT `user_id` FROM `tbl_page_refresh` where user_id = '".getProfilename('user_id')."'");
$result = $qry->row_array(); 
if($result['user_id']){
?>
$.ajax({
    url: main_url+'ajax_comman/tbl_page_refresh',
    type: 'POST',dataType:'html',
    data:{inviteCopyLink:$("#inviteCopyLink").val()},
    cache: false,
    success: function(response) {
      window.location.href = response;
    }
  });
<?php } ?>

$(".js-select2").select2({
closeOnSelect : true,
placeholder : "search email id",
allowHtml: true,
allowClear: true,
tags: true,
selectOnClose: true
});

$(document).ready(function(){

  if ($.cookie('expir') == null) {
         $('#trialModal').modal('show');
         $.cookie('expir', '1');
     }

  all_function_call();
  project_status_check();
  
  $('#edit_task_description').summernote({
      height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['fullscreen', ['fullscreen']],
        ]
  });

  $('#anotherCardModal').keypress(function(e){
    if(e.which == 13) {
      submit_title_new();
    }
  })
  $('#anotherListModal').keypress(function(e){
    if(e.which == 13) {
      submit_rename_to_status();
    }
  })

});


function submit_permission(){
  var add_team = $('input[name="add_team"]:checked').val();
  var add_account = $('input[name="add_account"]:checked').val();
  var project_permission_val = [];
  var checkboxes=document.getElementsByName("project_permission");   
    $('input[name=project_permission]:checked').each(function(){ 
    project_permission_val.push($(this).val());
  });

  var label_permission_val = [];
  var checkboxes=document.getElementsByName("label_permission");   
    $('input[name=label_permission]:checked').each(function(){ 
    label_permission_val.push($(this).val());
  });

  var task_permission_val = [];
  var checkboxes=document.getElementsByName("task_permission");   
    $('input[name=task_permission]:checked').each(function(){ 
    task_permission_val.push($(this).val());
  });

  $.ajax({
    url: main_url+'ajax_comman/access_permission', 
    dataType: 'html',type: 'post',
    data:{add_team:add_team,add_account:add_account,project_permission_val:project_permission_val,label_permission_val:label_permission_val,task_permission_val:task_permission_val,project_id:$("#project_id_new_INSERT").val(),url:document.URL},
    success: function (response) {
      jQuery("#permissionModal").modal('hide');
    },
    error: function (response) {
        console.log(response);
    }
  });

}

function addaccountemail(){
  $.ajax({
    url: main_url+'ajax_comman/addaccountemail_insert', 
    dataType: 'html',type: 'post',
    data:{addaccountemail:$("#addaccountemail").val()},
    success: function (response) {
      location.reload();
    },
    error: function (response) {
        console.log(response);
    }
  });
}


function ajax_permission_ajax(){
  $.ajax({
    url: main_url+'ajax_comman/ajax_permission_ajax', 
    dataType: 'html',type: 'post',
    data:{project_id:$("#project_id_new_INSERT").val()},
    success: function (response) {
      $("#permission_ajax").html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function ajax_show_project_time(){
  var project_id = $("#project_id_new_INSERT").val();
  $.ajax({
    url: main_url+'ajax_comman/ajax_show_project_time', 
    dataType: 'html',type: 'post',
    data:{project_id:project_id},
    success: function (response) {
      if(response){
        //showRemaining_manish(response,'show_project_time');
      }
    },
    error: function (response) {
        console.log(response);
    }
  });
}

function permissionclass_validation(){
  alert("please select project after use permission button");
}

$('#permissionModal').on('show.bs.modal', function (event) {
  ajax_permission_ajax();
});

function all_function_call(){
  edit_task_assigned_to_drop();
  ajax_background();
  ajax_background_frm();
  ajax_getNotificationList();
  ajax_showAllTeamModal();
  ajax_edit_task_status();
  show_header_team_image();
  getEmailID_list();
  get_assing_project_email();
  ajax_show_project_time();  
}


var BASE_URL = "<?php echo base_url(); ?>";

 $(document).ready(function() {
  $('#due_date').datetimepicker({
    format:'Y-m-d H:i:s',
    minDate: 0,
    autoclose: true
  });

  $('#StartDate').datetimepicker({
    format:'Y-m-d H:i:s',
    minDate: 0,
    autoclose: true,
    onSelect: function(date) {
      $("#EndDate").datetimepicker('option', 'minDate', date);
    },
    onClose: function (selected) {
      if(selected.length <= 0) {
          $("#EndDate").datetimepicker('disable')
      } else {
          $("#EndDate").datetimepicker('enable');
      }
      $("#EndDate").datetimepicker("option", "minDate", selected);
    }
  });
  $('#EndDate').datetimepicker({
    format:'Y-m-d H:i:s',
    autoclose: true,
    minDate: 0,
    onClose: function (selected) {
      if(selected.length <= 0) {
          $("#StartDate").datetimepicker('disable')
      } else {
          $("#StartDate").datetimepicker('enable');
      }
      $("#StartDate").datetimepicker("option", "maxDate", selected);
    }
  });
    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "ajax_comman/search",
            data: { term : request.term },
            dataType: "json",
            success: function(data){
              console.log(data[0])
              console.log(data.project_name)
               var resp = $.map(data,function(obj){
                    return obj.project_name;
               }); 
               response(resp);
            },
            select: function( event, ui ) {
              window.location.href = ui.item.project_id;
            }
        });
    },
    minLength: 1
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
            url: main_url+'ajax_comman/checked_email',
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
    url: main_url+'ajax_comman/addrole_submit', 
    dataType: 'html',type: 'post',
    data:{designation:$("#new_rolename").val()},
    success: function (response) {
        $("#addroleModal").modal('hide');
        $("#role_name").html(response);
    },
    error: function (response) {
        console.log(response);
    }
  });
}

$(function(){
  $('#addroleModal').keypress(function(e){
    if(e.which == 13) {
      addrole_submit();
    }
  })
})

/*$(document).keypress(function(e) {
  if ($("#myModal").hasClass('in') && (e.keycode == 13 || e.which == 13)) {
    alert("Enter is pressed");
    $('#addrole_submit').click();
    addrole_submit();
  }
});

$('#addroleModal').on('shown.bs.modal', function (event) {                  
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    alert("AFTER ENTER clicked");
    $('#addrole_submit').click();
    addrole_submit();   
  }     
});*/

function ValidateEmail2()
{

    if($("#account_email").val()==''){
        $("#errormsgaccount_email").html('Invalid Email Address');
        $("#errormsgaccount_email").css("color", "red");
        $("#account_email").focus();
        return false;
    } else {
        $("#errormsgaccount_email").html('');
    }

    if($("#role_name").val()==''){
        $("#errormsgrole_name").html('Select Designation');
        $("#errormsgrole_name").css("color", "red");
        $("#account_email").focus();
        return false;
    } else {
        $("#errormsgrole_name").html('');
    }

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test($("#account_email").val()) == false) 
    {
        $("#account_email").val('');
        $("#errormsgaccount_email").html('Invalid Email Address');
        $("#errormsgaccount_email").css("color", "red");
        $("#account_email").focus();
        return false;
    }

    $.ajax({
            url: main_url+'ajax_comman/checked_email',
            type: 'post',
            dataType:'html',
            data: {'email':$("#account_email").val()},
            success:function(response) { 
                $("#email_error").remove();
                $("#account_email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
                $("#account_email").focus();
        return false;
            },
            error:function(e) {
            }
        });
    
}

 // File type validation
    $("#project_documentation").change(function(){
        var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)){
            alert('Please select a valid file (PDF/DOC/DOCX).');
            $("#project_documentation").val('');
            return false;
        }
    });

 /*document.addEventListener("keydown",function(){return 123==event.keyCode?(alert("This function has been disabled to prevent you from stealing my code!"),!1):event.ctrlKey&&event.shiftKey&&73==event.keyCode?(alert("This function has been disabled to prevent you from stealing my code!"),!1):event.ctrlKey&&85==event.keyCode?(alert("This function has been disabled to prevent you from stealing my code!"),!1):void 0},!1),document.addEventListener?document.addEventListener("contextmenu",function(e){alert("This function has been disabled to prevent you from stealing my code!"),e.preventDefault()},!1):document.attachEvent("oncontextmenu",function(){alert("This function has been disabled to prevent you from stealing my code!"),window.event.returnValue=!1});*/

/*document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}*/

        function myFunction_old_password() {
          var x = document.getElementById("old_password");
          
          if (x.type === "old_password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        function myFunction_password() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        function myFunction_confirm_password() {
          var x = document.getElementById("confirm_password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
</script>

<script src="<?php echo base_url('assets/'); ?>js/anj/bigbull.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/invite.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/comanj.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/anj/task.js"></script>
</body>
</html>
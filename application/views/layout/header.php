<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
<meta name="description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<!-- 
<meta http-equiv="refresh" content="900;url=<?php //echo base_url('logout'); ?>" />
 -->
<meta name="keywords" content="pms, task, team, projects, images, role permission, Account Merge" />
<meta name="robots" content="noindex, nofollow, index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="googlebot" content="index,follow" />
<meta name="SLURP" content="INDEX,FOLLOW" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ANJ Webtech">
<title>PMS | ANJ Webtech Pvt Ltd | Project Tracking Software</title>
<link rel="dns-prefetch" href="<?php echo base_url(); ?>"/>
<meta property="og:title" content="Project Tracking Software"/>
<meta property="twitter:title" content="Project Tracking Software" />
<meta property="og:image" content="<?php echo base_url('assets/images/logo.png'); ?>"/>
<meta property="twitter:image" content="<?php echo base_url('assets/images/logo.png'); ?>" />
<meta property="og:description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<meta property="twitter:description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo base_url(); ?>"/>
<meta property="og:site_name" content="Project Tracking Software"/>
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/dragula/dragula.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/simplebar.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/structure.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/subHeader.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/animate.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/jquery-nestable.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<link href="<?php echo base_url('assets/'); ?>jquery.datetimepicker.min.css" rel="stylesheet"/>
<script src="<?php echo base_url('assets/'); ?>jquery.datetimepicker.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href='<?= base_url('assets/') ?>dropzone.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url('assets/') ?>dropzone.js' type='text/javascript'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
</script>

</head>
<!-- <body class="common_dashboard_trello" oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;">
     -->

<style type="text/css">
    #loading-overlay {
    position: absolute;
    width: 100%;
    height:100%;
    left: 0;
    top: 500px;
    display: none;
    align-items: center;
    z-index: 9999999;
    opacity: 1.5;
    text-align: center;
}
</style>
<body class="common_dashboard_trello" >

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="left-side-navbar navbar-item flex-row pl-2">
                
                <li class="nav-item">
                    <a href="<?php echo base_url(''); ?>" class="homeIcon"><i class="fas fa-home"></i></a>
                </li>
                
                <li class="nav-item align-self-center search-animated">
                    <div class="dd-search-bar device-search">
                        <form action="<?php //echo base_url('serach'); ?>" class="form-inline search-full form-inline search" role="search" method="post" autocomplete="off">
                            <div class="input-prepend input-append">
                                <div class="btn-group">
                                    <label class="dropdown-toggle searchbox" data-toggle="dropdown" aria-expanded="false">
                                        <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                        <a class="search-link" href="#"><i class="fas fa-search"></i></a>
                                        <span class="caret"><!--icon--></span>
                                    </label>
                                    <ul class="dropdown-menu">
<?php
$tbl_project1=$this->db->query("SELECT project_name,project_link FROM `tbl_project` where user_id='".getProfileName('user_id')."'");
$tbl_project=$tbl_project1->result_array();
foreach ($tbl_project as $key => $value) {
?>
<li>
    <a href="<?php echo $value['project_link']; ?>">
        <div class="item"><?php echo $value['project_name']; ?></div>
    </a>
</li>
<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>

            <ul class="navbar-item theme-brand flex-row m-auto text-center">
                <li class="nav-item theme-logo">
                    <a href="<?php echo base_url(''); ?>">
                        <img src="<?php echo base_url('assets/'); ?>images/header_logo.png" class="navbar-logo" alt="ANJ PMS logo">
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
        <a class="appList-icon-item" href="https://github.com/feedbackanjwebtech/pms/" target="_blank">
            <img src="<?php echo base_url('assets/images/brands/github.png'); ?>" alt="Github">
            <span>GitHub</span>
        </a>
    </li>
<?php } ?>
                                
<?php if(get_role_permission('file_storage',$project_id_new)=='yes' || getProfileName('designation')=='Master') { ?>
    <li>
        <a class="appList-icon-item" href="<?php echo $manishurl; ?>" target="_blank">
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
                            <!-- <div class="static-message">
                                <div class="static-message-icon">
                                    <div class="icon"><i class="fas fa-info"></i></div>
                                </div>
                                <div class="static-message-text">
                                    You don't have any notifications
                                </div>
                            </div> -->
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

    
<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('success')?>
</div>
<?php endif; ?>

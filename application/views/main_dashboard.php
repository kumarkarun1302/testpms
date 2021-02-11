<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
    <meta name="keywords" content="pms, task, team, projects, images, role permission, Account Merge" />
    <meta name="robots" content="noindex, nofollow, index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="googlebot" content="index,follow" />
    <meta name="SLURP" content="INDEX,FOLLOW" />
    <title>ANJ PMS | Project Tracking Software</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/subHeader.css"> -->

    <!-- Animate CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/animate.css/animate.min.css"> -->

    <!-- Nestable CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/jquery-nestable.css">

    <!-- Main Dashboard CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/main-dashboard.css">
</head>

<body class="common_dashboard_trello main-dashboard-bg">

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
                        <img src="<?php echo base_url('assets/images/header_logo.png'); ?>" class="navbar-logo" alt="ANJ PMS logo">
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
            <img src="<?php echo base_url('assets/'); ?>images/anjdriveicon.png" alt="ANJ Drive Logo">
            <span>ANJ Drive</span>
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
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN BOARDS MAIN CONTAINER  -->

    <div class="boards-container main-dashboard pt-3" id="container" data-simplebar>
        <div class="board-canvas container-fluid metricsContainer">
            <div class="row no-gape mb-3 mainpageheader">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="dashboardTitleIcon_box">
                        <div class="dashboardTitle">
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div id="show-intro-video-link"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <ul class="mainpageheader-navbar navbar-item flex-row pl-2">

                        <li class="nav-item stickyAddToProject">
                            <a  href="#" class="dropdown-toggle stickyAddToProjectBtn" id="dropdownMenuButton" data-target="#addProjectCardModal" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-project="add">
                                <i class="fas fa-plus"></i> Add to Project
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

<?php $check_package = dayscounts(getProfileName('package_date')); 
if($check_package==2 || $check_package==1){ ?>
<div class="alert alert-danger">
Your ANJ PMS month expires. Please <a href="<?php echo base_url('#pricing-table'); ?>">Upgrade</a>
</div>
<?php } ?>
            <div class="row no-gape mb-4">
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0);" class="blockHeaderTitle">
                                <h5 class="blockTitle">Client in projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_client; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Completed Projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_completed; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="<?php echo base_url('assets/'); ?>#" class="blockHeaderTitle">
                                <h5 class="blockTitle">Running Projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_running; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Section all Projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_section; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Task in projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_task; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 stack-item-col">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:voi(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Completed Tasks in projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="overAllBlock">
                                <a href="javascript:void(0)" class="overall-block">
                                    <div class="overall-block-title">Total</div>
                                    <div class="overall-block-data">
                                        <span id="tasksTotalCount"><?php echo $total_task_completed; ?></span>
                                        <span id="totalUnitName"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gape mb-4">
                
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Technology use in projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="revenueClient_table" data-simplebar>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="revenueClient_no">#</th>
                                                <th class="revenueClient_client">Client</th>
                                                <th class="revenueClient_sumWithoutTax">Technology</th>
                                                <th class="revenueClient_percentage">Total Projects</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query2 = $this->db->query("SELECT client_id,category,COUNT(project_id) as total FROM `tbl_project` WHERE user_id=$maindashboard_user_id GROUP by category");
                                                $result_maindashboard2 = $query2->result_array();
                                                $i=1;
                                                //echo print_r($result_maindashboard2);exit;
                                                foreach ($result_maindashboard2 as $key => $value) {
                                                    
                                                ?>                                           
                                            <tr>
                                                <td class="revenueClient_no"><?php echo $i; ?></td>
                                                <td class="revenueClient_client">
                                                    <a href="javascript:void(0)"><h4 class="projectName"><?php echo ucfirst($value['client_id']); ?></h4></a>
                                                </td>
                                                <td class="revenueClient_sumWithoutTax"><?php echo ucfirst($value['category']); ?></td>
                                                <td class="revenueClient_percentage"><?php echo $value['total']; ?></td>
                                            </tr>
                                            <?php $i++; } ?>                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">All Projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="allProjectTable" data-simplebar>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="project_nameClient">Project Name | Client</th>
                                                <th class="project_startDate">Start Date</th>
                                                <th class="project_DueDate">End Date</th>
                                                <th class="project_income">Category</th>
                                                <th class="project_status">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$get_group_concat_project_id = get_group_concat_project_id('project_id');
if($get_group_concat_project_id){
    $query = $this->db->query("SELECT * FROM `tbl_project` WHERE eDelete=0 and project_id IN ($get_group_concat_project_id) ORDER BY `tbl_project`.`project_id` DESC");
} else {
    $query = $this->db->query("SELECT * FROM `tbl_project` WHERE eDelete=0 and user_id=$maindashboard_user_id ORDER BY `tbl_project`.`project_id` DESC");
}

$result_maindashboard = $query->result_array();
foreach ($result_maindashboard as $key => $value) {
if($value['status']=='3'){
$projectstatus = '<span class="badge badge-warning text-white ml-auto project_status_hold">On Hold</span>';
} else if($value['status']=='2'){
$projectstatus = '<span class="badge badge-success ml-auto project_status_complete">Completed</span>';
} else if($value['status']=='4'){
$projectstatus = '<span class="badge badge-warning text-white ml-auto project_status_cancel">Canceled</span>';
} else if($value['status']=='0'){
$projectstatus = '<span class="badge badge-secondary ml-auto project_status_running">On Running</span>';
}
?>
<tr>
    <?php //echo substr(getProfileName('username'),0,1); ?>
    <td class="project_nameClient">
        <div class="icon"><i class="fas fa-briefcase"></i></div>
        <div class="projectNameClient">
            <h4 class="projectName"><a href="<?php echo $value['project_link']; ?>"><?php echo ucfirst($value['project_name']); ?></a></h4>
            <h5 class="projectClient"><a href="<?php echo $value['project_link']; ?>"><?php echo ucfirst($value['client_id']); ?></a></h5>
        </div>
    </td>
    <td class="project_startDate"><?php echo date_fjy($value['start_date']); ?></td>
    <td class="project_DueDate"><?php echo date_fjy($value['deadline']); ?></td>
    <td class="project_income">
        <div class="income_1"><?php echo $value['category']; ?></div>
    </td>
    <td class="project_status">
        <?php echo $projectstatus; ?>
    </td>
</tr>
<?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gape mb-4">
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Task in projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="revenueClient_table" data-simplebar>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="">#</th>
                                                <th class="">Task Name</th>
                                                <th class="">Start Date</th>
                                                <th class="">End Date</th>
                                                <th class="">Project</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_task_recent=$this->db->query("SELECT * FROM tbl_task where user_id=$maindashboard_user_id ORDER BY id DESC LIMIT 10");
                                            $result_task_recent = $query_task_recent->result_array();
                                            $i=1;
                                            foreach ($result_task_recent as $key => $value) {
                                                $project_id=$value['project_id'];
                                                $query=$this->db->query("SELECT project_name FROM `tbl_project` WHERE `project_id`='$project_id'");
                                                $resultma=$query->row_array();
                                                ?>                                           
                                            <tr>
                                                <td class=""><?php echo $i; ?></td>
                                                <td class=""><?php echo $value['title']; ?></td>
                                                <td class=""><?php echo $value['created_at']; ?></td>
                                                <td class=""><?php echo $value['due_date']; ?></td>
                                                <td class=""><?php echo $resultma['project_name']; ?></td>
                                            </tr>
                                            <?php $i++; } ?>                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Total Tasks Graph</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="totaltaskGraph" id="totaltaskGraph">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gape mb-4">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Total Projects</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="teamActivity_chart">
                                <div id="pie_chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="stack-item-content">
                        <div class="blockHeader">
                            <a href="javascript:void(0)" class="blockHeaderTitle">
                                <h5 class="blockTitle">Role Base wise users</h5>
                            </a>
                        </div>
                        <div class="blockContent">
                            <div class="revenueYear_table" data-simplebar>
                                <div id="column_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gape mb-4 dashboard_footer">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboard_footer-item">
                        <a href="javascript:void(0)">
                            <strong>M</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bar container-fluid">
            <div class="row no-gape">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="versionCode">
                        <!-- <a href="javascript:void(0)">Version 1.0</a> -->
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="copyrightContent">
                        Copyright © 2021 <a href="javascript:void(0)">ANJ Webtech Pvt Ltd.</a>
                    </div>
                </div>
            </div>
            <div class="row no-gape">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="emptySpace" style="height: 10px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- END BOARDS MAIN CONTAINER -->

    <!-- Begin Chat Bubble -->
    <!-- <div class="pms_messenger">
        <a href="#" class="chatIcon">
            <img src="images/chat.png" class="img-fluid" alt="">
        </a>
    </div> -->
    
    <!-- End Chat Bubble -->

    <!-- jquery-->
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<link href="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/css/jquery.datetimepicker.min.css" rel="stylesheet"/>
<script src="https://www.thecodedeveloper.com/demo/add-datetimepicker-jquery-plugin/js/jquery.datetimepicker.js"></script>

<script>
$(document).ready(function() {

Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

var cData = JSON.parse(`<?php echo $chart_data; ?>`);
var cht_cloumn_data = JSON.parse(`<?php echo $chart_data_cloumn; ?>`);
var data_packedbubble = JSON.parse(`<?php echo $data_packedbubble; ?>`);

Highcharts.chart('pie_chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Total Projects in user'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    legend: {
        enabled: true
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: cData
    }]
});   

// Create the chart
Highcharts.chart('column_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Role Base in <?php echo getuser_type(getProfileName('user_type')); ?>'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent users'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: cht_cloumn_data
        }
    ],
    
});

Highcharts.chart('totaltaskGraph', {
    chart: {
        type: 'packedbubble',
        height: '70%'
    },
    title: {
        text: 'Task view in project'
    },
    tooltip: {
        useHTML: true,
        pointFormat: '<b>{point.name}:</b> {point.value}m CO<sub>2</sub>'
    },
    plotOptions: {
        packedbubble: {
            minSize: '20%',
            maxSize: '100%',
            zMin: 0,
            zMax: 1000,
            layoutAlgorithm: {
                gravitationalConstant: 0.05,
                splitSeries: true,
                seriesInteraction: false,
                dragBetweenSeries: true,
                parentNodeLimit: true
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 50
                },
                style: {
                    color: 'black',
                    textOutline: 'none',
                    fontWeight: 'normal'
                }
            }
        }
    },
    series: data_packedbubble
});


});
</script>
<style type="text/css">
    .blockTitle{
        text-align: center;
    }
</style>


<style type="text/css">
  .box{display: none;}
</style>


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
/*
if ($.cookie('expir') == null) {
$('#trialModal').modal('show');
$.cookie('expir', '1');
}*/

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
          
          if (x.type === "password") {
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
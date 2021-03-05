<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Chat | ANJ Webtech Pvt Ltd</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/chat/chat-favicon.png">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/app.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/icons.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/simplebar.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body>
<section class="layout-wrapper d-lg-flex">
    <!-- Start left sidebar-menu -->
    <div class="side-menu flex-lg-column mr-lg-1">
        <!-- Logo -->
        <div class="navbar-brand-box">
            <a href="javascript:void(0)" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?php echo base_url('assets/'); ?>images/chat-logo.png" alt="anj chat logo" height="30">
                </span>
            </a>
            <a href="javascript:void(0)" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?php echo base_url('assets/'); ?>images/chat-logo.png" alt="anj chat logo" height="30">
                </span>
            </a>
        </div>
        <!-- end navbar-brand-box -->

        <!-- Start side-menu nav -->
        <div class="flex-lg-column my-auto">
            <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
                <li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Profile" onclick="side_menu_nav('pills-user')">
                    <a class="nav-link" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-selected="true">
                        <i class="ri-user-2-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Chats" onclick="side_menu_nav()">
                    <a class="nav-link active" id="pills-chat-tab" data-toggle="pill" href="#pills-chat" role="tab" aria-selected="false">
                        <i class="ri-message-3-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Groups" onclick="side_menu_nav()">
                    <a class="nav-link" id="pills-groups-tab" data-toggle="pill" href="#pills-groups" role="tab" aria-selected="false">
                        <i class="ri-group-line"></i>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Contacts" onclick="side_menu_nav()" style="display: none;">
                    <a class="nav-link" id="pills-contacts-tab" data-toggle="pill" href="#pills-contacts" role="tab" aria-selected="false">
                        <i class="ri-contacts-line"></i>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Settings" onclick="side_menu_nav()">
                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#pills-setting" role="tab" aria-selected="false">
                        <i class="ri-settings-2-line"></i>
                    </a>
                </li>
                <li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none" onclick="side_menu_nav()">
                    <a class="nav-link dropdown-toggle" href="javascript: void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo get_user_img(getProfileName('user_id')); ?>" alt="" class="profile-user rounded-circle">
                    </a>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="javascript:void(0)">Profile <i class="ri-profile-line float-right text-muted"></i></a>
                        <a class="dropdown-item" href="javascript:void(0)">Setting <i class="ri-settings-3-line float-right text-muted"></i></a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- end side-menu nav -->

        <div class="flex-lg-column d-none d-lg-block">
            <ul class="nav side-menu-nav justify-content-center">

                <li class="nav-item btn-group dropup profile-user-dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo get_user_img(getProfileName('user_id')); ?>" alt="" class="profile-user rounded-circle">
                    </a>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="javascript:void(0)">Profile <i class="ri-profile-line float-right text-muted"></i></a>
                        <a class="dropdown-item" href="javascript:void(0)">Setting <i class="ri-settings-3-line float-right text-muted"></i></a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Side menu user -->
    </div>



    <div class="chat-leftsidebar mr-lg-1">
        <div class="tab-content">
            <!-- Start Profile tab-pane -->
            <div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                <!-- Start profile content -->
                <div>
                    <div class="px-4 pt-4">
                        <!-- <div class="user-chat-nav float-right">
                            <div class="dropdown">
                                <a href="javascript: void(0);" class="font-size-18 text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                </div>
                            </div>
                        </div> -->
                        <h4 class="mb-0">My Profile</h4>
                    </div>
                    <div class="text-center p-4 border-bottom">
                        <div class="mb-4">
                            <img src="<?php echo get_user_img(getProfileName('user_id')); ?>" class="rounded-circle avatar-lg img-thumbnail" alt="">
                        </div>
                        <h5 class="font-size-16 mb-1 text-truncate"><?php echo getProfileName('username'); ?></h5>
                        <p class="text-muted text-truncate mb-1"><i class="ri-record-circle-fill font-size-10 text-success mr-1 d-inline-block"></i> Active</p>
                    </div>
                    <!-- End profile user -->
                    
                    <!-- Start user-profile-desc -->
                    <div class="p-4 user-profile-desc" data-simplebar="init">
                        <div class="text-muted">
                            <p class="mb-4"><?php echo getProfileName('user_about'); ?></p>
                        </div>
                        <div id="profile-user-accordion-1" class="custom-accordion">
                            <div class="card shadow-none border mb-2">
                                <a href="#profile-user-collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-user-collapseOne">
                                    <div class="card-header" id="profile-user-headingOne">
                                        <h5 class="font-size-14 m-0">
                                            <i class="ri-user-2-line mr-2 align-middle d-inline-block"></i> About
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-user-collapseOne" class="collapse show" aria-labelledby="profile-user-headingOne" data-parent="#profile-user-accordion-1">
                                    <div class="card-body">
                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14"><?php echo getProfileName('username'); ?></h5>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14"><?php echo getProfileName('email'); ?></h5>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14"><?php echo date_fjy(getProfileName('created_at')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End About card -->
                            <div class="card mb-1 shadow-none border">
                                <a href="#profile-user-collapseTwo" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-user-collapseTwo">
                                    <div class="card-header" id="profile-user-headingTwo" onclick="attached_file_hideshow()">
                                        <h5 class="font-size-14 m-0">
                                            <i class="ri-attachment-line mr-2 align-middle d-inline-block"></i> Attached Files
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-user-collapseTwo" class="collapse" aria-labelledby="profile-user-headingTwo" data-parent="#profile-user-accordion-1">
                                    <div class="card-body">
                                        <div class="card p-2 border mb-2">
                                            <div class="media align-items-center">
                                                <div class="avatar-sm mr-3">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-file-text-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-left">
                                                        <h5 class="font-size-14 mb-1">Admin-A.zip</h5>
                                                        <p class="text-muted font-size-13 mb-0">12.5 MB</p>
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
                                        <!-- end card -->
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
                                                            <a  class="text-muted px-1">
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
                                        <!-- end card -->
                                        <div class="card p-2 border mb-2">
                                            <div class="media align-items-center">
                                                <div class="avatar-sm mr-3">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-left">
                                                        <h5 class="font-size-14 mb-1">Image-2.jpg</h5>
                                                        <p class="text-muted font-size-13 mb-0">3.1 MB</p>
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
                                        <!-- end card -->
                                        <div class="card p-2 border mb-2">
                                            <div class="media align-items-center">
                                                <div class="avatar-sm mr-3">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-file-text-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-left">
                                                        <h5 class="font-size-14 mb-1">Landing-A.zip</h5>
                                                        <p class="text-muted font-size-13 mb-0">6.7 MB</p>
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
                                        <!-- end card -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Attached Files card -->
                        </div>
                        <!-- end profile-user-accordion -->
                    </div>
                    <!-- end user-profile-desc -->
                </div>
                <!-- End profile content -->
            </div>
            <!-- End Profile tab-pane -->

<!-- Start Add contact Modal -->
<div class="modal fade" id="addContactexampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="addContact-exampleModalLabel">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body p-4">
            <form autocomplete="off">
                <div class="form-group mb-4">
                    <label for="addcontactemail-input">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Email" id="chattxtsearch" name="chattxtsearch">
                    <ul id="searchResult"></ul> 
                    <div class="clear"></div>
                </div>        
                <div class="form-group">
                    <label for="addcontact-invitemessage-input">Invatation Message</label>
                    <textarea class="form-control" id="addcontactinvitemessageinput" name="invatation_message" rows="3" placeholder="Enter Message"></textarea>
                </div>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_invite_contact('chat')">Invite Contact</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add contact Modal -->

<!-- Start chats tab-pane -->
<div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
<!-- Start chats content -->
<div>
    <div class="px-4 pt-4">
        <div class="user-chat-nav float-right">
            <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Contact">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-toggle="modal" data-target="#addContactexampleModal">
                    <i class="ri-user-add-line"></i>
                </button>
            </div>
        </div>
        <h4 class="mb-4">Chats</h4>
        <div class="search-box chat-search-box">
            <div class="input-group mb-3 bg-light  input-group-lg rounded-lg">
                <div class="input-group-prepend">
                    <button class="btn btn-link text-muted pr-1 text-decoration-none" type="button">
                        <i class="ri-search-line search-icon font-size-18"></i>
                    </button>
                </div>
                <input type="text" class="form-control bg-light" id="searching_current_user" placeholder="Search users">
            </div>
        </div>
        <!-- Search Box-->
    </div>
    <!-- .p-4 -->
    
    <!-- Start user status -->
    
    <!-- end user status -->
    
<!-- Start chat-message-list -->
<div class="px-2">
    <h5 class="mb-3 px-3 font-size-16"></h5>
    <div class="chat-message-list" data-simplebar="init">
        <ul class="list-unstyled chat-list chat-user-list" id="show_ajax_searching_current_user">
            
        </ul>
    </div>
</div>
<!-- End chat-message-list -->
                </div>
                <!-- Start chats content -->
            </div>
            <!-- End chats tab-pane -->
          
            <!-- Start groups tab-pane -->
            <div class="tab-pane" id="pills-groups" role="tabpanel" aria-labelledby="pills-groups-tab">
                <!-- Start Groups content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-right">
                            <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-toggle="modal" data-target="#addgroup-exampleModal">
                                    <i class="ri-group-line mr-1"></i>
                                </button>
                            </div>
                        </div>
<h4 class="mb-4">Groups</h4>
<!-- Start add group Modal -->
<div class="modal fade" id="addgroup-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addgroup-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="addgroup-exampleModalLabel">Create New Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
<div class="modal-body p-4">
    <form>
        <div class="form-group mb-4">
            <label for="addgroupname-input">Group Name</label>
            <input type="text" class="form-control" id="addgroupname-input" placeholder="Enter Group Name">
        </div>
<div class="form-group mb-4">
    <label>Group Members</label>
    <div class="mb-3">
        <button class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#groupmembercollapse" aria-expanded="false" aria-controls="groupmembercollapse">Select Members</button>
    </div>
    <div class="collapse" id="groupmembercollapse">
        <div class="card border">
            <div class="card-header">
                <h5 class="font-size-15 mb-0">Contacts</h5>
            </div>
            <div class="card-body p-2">
                <div data-simplebar="init" style="max-height: 150px;overflow:auto;" id="searching_contact_group">
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="form-group">
            <label for="addgroupdescription-input">Description</label>
            <textarea class="form-control" id="addgroupdescription-input" rows="3" placeholder="Enter Description"></textarea>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="submit_create_group()">Create Groups</button>
</div>
        </div>
    </div>
</div>
<!-- End add group Modal -->

<div class="modal fade" id="editgroup-exampleModal" tabindex="-1" role="dialog" aria-labelledby="editgroup-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="editgroup-exampleModalLabel">Edit Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="form-group mb-4">
                        <label for="addgroupname-input">Group Name</label>
                        <input type="text" class="form-control" id="editgroupname">
                        <input type="hidden" id="editgroupreceiver_id">
                    </div>
                    <div class="form-group mb-4">
                        <label>Group Members</label>
                        <div class="mb-3">
                            <button class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#groupmembercollapse1" aria-expanded="false" aria-controls="groupmembercollapse1">Select Members</button>
                        </div>
                        <div class="collapse" id="groupmembercollapse1">
                            <div class="card border">
                                <div class="card-header">
                                    <h5 class="font-size-15 mb-0">Contacts</h5>
                                </div>
                                <div class="card-body p-2">
                                    <div data-simplebar="init" style="max-height: 150px;overflow:auto;" id="edit_contact_group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="edit_submit_create_group()">Create Groups</button>
            </div>
        </div>
    </div>
</div>
    <div class="search-box chat-search-box">
        <div class="input-group bg-light  input-group-lg rounded-lg">
            <div class="input-group-prepend">
                <button class="btn btn-link text-decoration-none text-muted pr-1" type="button">
                    <i class="ri-search-line search-icon font-size-18"></i>
                </button>
            </div>
            <input type="text" class="form-control bg-light" placeholder="Search groups..." id="searching_group">
        </div>
    </div>
    <!-- end search-box -->
</div>
<!-- Start chat-group-list -->
<div class="p-4 chat-message-list chat-group-list" data-simplebar="init">
    <ul class="list-unstyled chat-list" id="ajax_group_list_id">
        
    </ul>    
</div>
<!-- End chat-group-list -->
</div>
<!-- End Groups content -->
</div>
<!-- End groups tab-pane -->

            <!-- Start contacts tab-pane -->
            <div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
                <!-- Start Contact content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-right">
                            <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Contact">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-toggle="modal" data-target="#addContact-exampleModal">
                                    <i class="ri-user-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <h4 class="mb-4">Contacts</h4>
                        
<!-- Start Add contact Modal -->
<div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="addContact-exampleModalLabel">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body p-4">
            <form autocomplete="off">
                <div class="form-group mb-4">
                    <label for="addcontactemail-input">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Email" id="chat_txt_search" name="chat_txt_search">
                    <ul id="searchResult"></ul> 
                    <div class="clear"></div>
                </div>        
                <div class="form-group">
                    <label for="addcontact-invitemessage-input">Invatation Message</label>
                    <textarea class="form-control" id="addcontact-invitemessage-input" name="invatation_message" rows="3" placeholder="Enter Message"></textarea>
                </div>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_invite_contact('contact')">Invite Contact</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add contact Modal -->
                   
<div class="search-box chat-search-box">
    <div class="input-group bg-light  input-group-lg rounded-lg">
        <div class="input-group-prepend">
            <button class="btn btn-link text-decoration-none text-muted pr-1" type="button">
                <i class="ri-search-line search-icon font-size-18"></i>
            </button>
        </div>
        <input type="text" class="form-control bg-light " id="searching_contact" name="searching_contact" placeholder="Search users..">
    </div>
</div>
    <!-- End search-box -->
</div>
<!-- end p-4 -->

<!-- Start contact lists -->
<div class="p-4 chat-message-list chat-group-list" data-simplebar="init" id="searching_contact_result">
                          
                        
                    </div>
                    <!-- end contact lists -->
                </div>
                <!-- Start Contact content -->
            </div>
            <!-- End contacts tab-pane -->
          
            <!-- Start settings tab-pane -->
            <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                <!-- Start Settings content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-0">Settings</h4>
                    </div>
                    <div class="text-center border-bottom p-4">
                        <div class="mb-4 profile-user">
                            <img src="<?php echo get_user_img(getProfileName('user_id')); ?>" class="rounded-circle avatar-lg img-thumbnail" alt="">
                            <button type="button" class="btn bg-light avatar-xs p-0 rounded-circle profile-photo-edit">
                                <label for="upload_photo"><i class="ri-pencil-fill" id="profileBtn" ></i></label>
                                
                            </button>
                        </div>
                        <input type="file" name="photo" id="upload_photo" />

                        <h5 class="font-size-16 mb-1 text-truncate"><?php echo getProfileName('username'); ?></h5>
                        <div class="dropdown d-inline-block mb-1">
                            <a class="text-muted dropdown-toggle pb-1 d-block" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Available <i class="mdi mdi-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Available</a>
                                <a class="dropdown-item" href="javascript:void(0)">Busy</a>
                            </div>
                        </div>
                    </div>
                    <!-- End profile user -->
                    
                    <!-- Start User profile description -->
                    <div class="p-4 user-profile-desc" data-simplebar="init">
                        <div id="profile-setting-accordion" class="custom-accordion">
                            <div class="card shadow-none border mb-2">
                                <a href="#profile-setting-personalinfocollapse" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-setting-personalinfocollapse">
                                    <div class="card-header" id="profile-setting-personalinfoheading">
                                        <h5 class="font-size-14 m-0">
                                            Personal Info
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-setting-personalinfocollapse" class="collapse show" aria-labelledby="profile-setting-personalinfoheading" data-parent="#profile-setting-accordion">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <button type="button" class="btn btn-light btn-sm"><i class="ri-edit-fill mr-1 align-middle"></i> Edit</button>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14"><?php echo getProfileName('username'); ?></h5>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14"><?php echo getProfileName('email'); ?></h5>
                                        </div>
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14"><?php echo date_fjy(getProfileName('created_at')); ?></h5>
                                        </div>
                                        <!-- <div class="mt-4">
                                            <p class="text-muted mb-1">Location</p>
                                            <h5 class="font-size-14 mb-0">California, USA</h5>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end profile card -->
                            <div class="card shadow-none border mb-2">
                                <a href="#profile-setting-privacycollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-privacycollapse">
                                    <div class="card-header" id="profile-setting-privacyheading">
                                        <h5 class="font-size-14 m-0">
                                            Privacy
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-setting-privacycollapse" class="collapse" aria-labelledby="profile-setting-privacyheading" data-parent="#profile-setting-accordion">
                                    <div class="card-body">
                                        <div class="py-3">
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Profile photo</h5>
                                                </div>
                                                <div class="dropdown ml-2">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">Everyone</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">selected</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Last seen</h5>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="privacy-lastseenSwitch" checked="">
                                                        <label class="custom-control-label" for="privacy-lastseenSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Status</h5>
                                                </div>
                                                <div class="dropdown ml-2">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">Everyone</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">selected</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Read receipts</h5>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="privacy-readreceiptSwitch" checked="">
                                                        <label class="custom-control-label" for="privacy-readreceiptSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Groups</h5>
                                                </div>
                                                <div class="dropdown ml-2">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">Everyone</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">selected</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Privacy card -->
                            
                            <div class="card shadow-none border mb-2">
                                <a href="#profile-setting-securitynoticollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-securitynoticollapse">
                                    <div class="card-header" id="profile-setting-securitynotiheading">
                                        <h5 class="font-size-14 m-0">
                                            Security
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-setting-securitynoticollapse" class="collapse" aria-labelledby="profile-setting-securitynotiheading" data-parent="#profile-setting-accordion">
                                    <div class="card-body">
                                        <div>
                                            <div class="media align-items-center">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Show security notification</h5>
                                                </div>
                                                <div class="ml-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="security-notificationswitch">
                                                        <label class="custom-control-label" for="security-notificationswitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Security card -->
                            
                            <div class="card shadow-none border mb-2">
                                <a href="#profile-setting-helpcollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-helpcollapse">
                                    <div class="card-header" id="profile-setting-helpheading">
                                        <h5 class="font-size-14 m-0">
                                            Help
                                            <i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
                                        </h5>
                                    </div>
                                </a>
                                <div id="profile-setting-helpcollapse" class="collapse" aria-labelledby="profile-setting-helpheading" data-parent="#profile-setting-accordion">
                                    <div class="card-body">
                                        <div>
                                            <div class="py-3">
                                                <h5 class="font-size-13 mb-0"><a href="javascript:void(0)" class="text-body d-block">FAQs</a></h5>
                                            </div>
                                            <div class="py-3 border-top">
                                                <h5 class="font-size-13 mb-0"><a href="javascript:void(0)" class="text-body d-block">Contact</a></h5>
                                            </div>
                                            <div class="py-3 border-top">
                                                <h5 class="font-size-13 mb-0"><a href="javascript:void(0)" class="text-body d-block">Terms &amp; Privacy policy</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Help card -->
                        </div>
                        <!-- end profile-setting-accordion -->                    
                    </div>
                    <!-- End User profile description -->
                </div>
                <!-- Start Settings content -->
            </div>
            <!-- End settings tab-pane -->
        </div>
        <!-- end tab content -->
    </div>
    <!-- End chat-leftsidebar -->



     <!-- Start audiocall Modal -->
    <div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center p-4">
                        <div class="avatar-lg mx-auto mb-4">
                            <img src="<?php echo base_url('assets/'); ?>images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                        </div>

                        <h5 class="text-truncate">Do</h5>
                        <p class="text-muted">Start Audio Call</p>

                        <div class="mt-5">
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item px-2">
                                    <button type="button" class="btn btn-danger avatar-sm rounded-circle" data-dismiss="modal">
                                        <span class="avatar-title bg-transparent font-size-20">
                                            <i class="ri-close-fill"></i>
                                        </span>
                                    </button>
                                </li>
                                <li class="list-inline-item px-2">
                                    <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                        <span class="avatar-title bg-transparent font-size-20">
                                            <i class="ri-phone-fill"></i>
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End audiocall Modal -->

    <!-- Start videocall Modal -->
    <div class="modal fade" id="videocallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center p-4">
                        <div class="avatar-lg mx-auto mb-4">
                            <img src="<?php echo base_url('assets/'); ?>images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                        </div>

                        <h5 class="text-truncate">Doris </h5>
                        <p class="text-muted mb-0">Start Video Call</p>

                        <div class="mt-5">
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item px-2">
                                    <button type="button" class="btn btn-danger avatar-sm rounded-circle" data-dismiss="modal">
                                        <span class="avatar-title bg-transparent font-size-20">
                                            <i class="ri-close-fill"></i>
                                        </span>
                                    </button>
                                </li>
                                <li class="list-inline-item px-2">
                                    <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                        <span class="avatar-title bg-transparent font-size-20">
                                            <i class="ri-vidicon-fill"></i>
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End videocall Modal -->
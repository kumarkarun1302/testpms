<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(''); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <!-- 
    <link rel="stylesheet" href="<?php //echo base_url(''); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
 -->

 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css">

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 -->
    <title>CRM</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?php echo base_url(''); ?>index.html">CRM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item" style="display: none;">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification" style="display: none;">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="<?php echo base_url(''); ?>assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="<?php echo base_url(''); ?>#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection" style="display: none;">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="<?php echo base_url(''); ?>#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="<?php echo base_url(''); ?>#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="<?php echo base_url(''); ?>#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="<?php echo base_url(''); ?>#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="<?php echo base_url(''); ?>#" class="connection-item"><img src="<?php echo base_url(''); ?>assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="<?php echo base_url(''); ?>#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user" style="display: none;">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(''); ?>assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url(''); ?>#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="<?php echo base_url(''); ?>#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="<?php echo base_url(''); ?>#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="<?php echo base_url(''); ?>#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="<?php echo base_url(''); ?>#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item" style="display: none;">
                                            <a class="nav-link" href="<?php echo base_url('contacts'); ?>">Contacts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('sales_view'); ?>">Sales</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('leads'); ?>">Leads</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" target="_blank" href="<?php echo base_url('invoice'); ?>">Invoice</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            
                            <li class="nav-item" style="display: none;">
                                <a class="nav-link" href="<?php echo base_url('sales'); ?>">Sales</a>
                            </li>
                            <li class="nav-item" style="display: none;">
                                <a class="nav-link" href="<?php echo base_url('dashboard/leads2'); ?>">Leads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
 -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Master</title>
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url(''); ?>">ANJPMS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    Masteradmin
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('dashboard/settingsView'); ?>">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">PMS</div>
                            <a class="nav-link" href="<?php echo base_url(''); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('dashboard/userlist'); ?>">Users Lists</a>
                                    <a class="nav-link" href="<?php echo base_url('dashboard/usertype'); ?>">User Type</a>
                                    <a class="nav-link" href="<?php echo base_url('dashboard/rolename'); ?>">Role</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="<?php echo base_url('dashboard/projectlist'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Projects
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/tasklist'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Task
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/rolepermissionlist'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Role Permission
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/bloglists'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Blog
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/packageview'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Package Settings
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/feedbacklist'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                FeedBack Lists
                            </a>
                            <a class="nav-link" href="<?php echo base_url('dashboard/settingsView'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Settings
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        ANJ Webtech Pvt. Ltd
                    </div>
                </nav>
            </div>
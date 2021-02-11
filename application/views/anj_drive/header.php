<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Drive | ANJ Webtech Pvt Ltd</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('drive_assets'); ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/flaticon.css">
    <link href="<?php echo base_url('assets'); ?>/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/dragula/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/simplebar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/jquery-nestable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/drive.css">
    <link href="<?php echo base_url('assets'); ?>/4a0YWgnYPaUPfGyiNypBLzf4jwzSRvtGUJC9faYudD0.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/css/owl.theme.default.min.css">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=601ba3a85692e4001147c438&product=undefined' async='async'></script>
</head>
<style type="text/css">
label {
    cursor: pointer;
}
#one_file {
 /*   opacity: 0;
    position: absolute;
    z-index: -1;
 */   border: 1 solid black;
}
</style>
<body class="common_dashboard_drive">

    <!-- Start Wrapper -->
    <div class="wrapper">
        <!-- Start Drive Sidebar -->
        <div class="dd-sidebar sidebar-default">
            <!-- Start header logo -->
            <div class="dd-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url('anj_drive'); ?>" class="header-logo">
                    <img src="<?php echo base_url('assets'); ?>/images/anj-drive-logo.png" class="img-fluid" alt="anj-drive-logo" title="anj drive logo" data-saferedirecturl="<?php echo base_url('assets/images/anj-drive-logo.png'); ?>">
                </a>
                <!-- Start Menu Sidebar -->
                <div class="dd-menu-bt-sidebar">
                    <i class="fas fa-bars wrapper-menu"></i>
                </div>
                <!-- End Menu Sidebar -->
            </div>
            <!-- End header logo -->

            <div class="dd-sidebar-scroll" data-simplebar>
                <!-- Start Create New Item -->
                <div class="dd-createNewItem">
                    <div class="dropdown createNewItemIcon">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php //echo anjDrive_disabled(); ?>>
                            <i class="fas fa-plus pr-2"></i> Create New
                        </button>
                        <div class="dropdown-menu createNewItem-dropdown" aria-labelledby="dropdownMenuButton">
                            <div class="createNewItem-box">
                                <ul>
                            
                                <?php if($this->uri->segment(3)){ ?>
                                    
                                    <li>
                                        <a class="createNewItem-item" href="javascript:void(0)" data-toggle="modal" data-target="#foldercreateUploadFilesModal">
                                            <span class="createNewItem-item-icon"><i class="fas fa-upload"></i></span> 
                                            <strong class="heading">Upload Files</strong>
                                        </a>
                                    </li>

                                <?php } else { ?>
                                     
                                     <li>
                                        <a class="createNewItem-item" href="javascript:void(0)" data-toggle="modal" data-target="#createNewFolderModal">
                                            <span class="createNewItem-item-icon"><i class="fas fa-upload"></i></span>
                                            <strong class="heading">New Folder</strong>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="createNewItem-item" href="javascript:void(0)" data-toggle="modal" data-target="#createUploadFilesModal">
                                            <span class="createNewItem-item-icon"><i class="fas fa-upload"></i></span> 
                                            <strong class="heading">Upload Files</strong>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="createNewItem-item" href="javascript:void(0)" data-toggle="modal" data-target="#createUploadFolderModal">
                                            <span class="createNewItem-item-icon"><i class="fas fa-upload"></i></span>
                                            <strong class="heading">Upload Folders</strong>
                                        </a>
                                    </li>

                                    <li style="display: none;">
                                        <a class="createNewItem-item" href="javascript:void(0)" data-toggle="modal" data-target="#createUploadLinkModal">
                                            <span class="createNewItem-item-icon"><i class="fas fa-upload"></i></span>
                                            <strong class="heading">Upload URL</strong>
                                        </a>
                                    </li>

                                <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Create New Item -->

                <!-- Start Sidebar Menu -->
                <div class="dd-sidebar-menu">
                    <h2>Files Info</h2>

<?php 
//echo $this->uri->segment(1);exit;
if($this->uri->segment(1)=='anj_drive'){  
    $active1='active';
} else {
    $active1='';
} if($this->uri->segment(1)=='shared_me'){ 
    $active2='active';
} else {
    $active2='';
}
if($this->uri->segment(1)=='request_list'){ 
    $active3='active';
} else {
    $active3='';
}
if($this->uri->segment(1)=='trash'){ 
    $active4='active';
} else {
    $active4='';
}
?>

                    <ul id="dd-sidebar-toggle" class="dd-menu">
                        
                        <li class="<?php echo $active1; ?>">
                            <a href="<?php echo base_url('anj_drive'); ?>"><i class="far fa-folder"></i> My Drive</a>
                        </li>
                    
                        <li class="<?php echo $active2; ?>">
                            <a href="<?php echo base_url('shared_me'); ?>"><i class="far fa-share-square"></i> Shared With Me</a>
                        </li>
                        
                        <li class="<?php echo $active3; ?>" style="display: none;">
                            <a href="<?php echo base_url('request_list'); ?>"><i class="far fa-file-alt"></i> File Request</a>
                        </li>
                        
                        <li class="<?php echo $active4; ?>">
                            <a href="<?php echo base_url('trash'); ?>"><i class="far fa-trash-alt"></i> Deleted Items</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- End Sidebar Menu -->

                <!-- Start Storage -->

<?php 
$user_id = getProfileName('user_id');
$q=$this->db->query("SELECT sum(file_size) as file_size FROM `tbl_anjdrive` where user_id=$user_id");
$r = $q->row_array();

if($r['file_size']){
$file_size = $r['file_size'];
} else {
$file_size = 0;
}

$sizee = '1000';
$hundr = '100';
$total_db_size = $file_size;
$total = $total_db_size / $sizee; 
$limit = getProfileName('file_sharing_storage');

$defult_percet = '90';
$percentage = $limit * $defult_percet / $hundr;
if($total_db_size > $percentage){
  $classshow = 'display: block;';
} else {
  $classshow = 'display: none;';
}

$a = $total_db_size / $limit;
$width = $a * $hundr;
if($width >= '100'){ $width='100'; }

$total = round($total);
$total = $total.' MB';

$limit = $limit / $sizee / $sizee;
$limit = round($limit,2). ' GB';

/*$limit = $limit / $sizee;
$limit = round($limit). ' MB';*/

?>

<div class="dd-sidebar-storage">
    <h2>Storage Info</h2>
    <div class="storageIconTxt">
        <div class="storageIcon">
            <img src="<?php echo base_url('assets'); ?>/images/storage-download.png" class="img-fluid" alt="">
        </div>
        <div class="storageTxtProgress">
            <h3>Storage</h3>
            <div class="storageProgress">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo round($width); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($width); ?>%"></div>
                </div>
                <small><?php echo $total.' of '.$limit; ?> used</small>
            </div>
        </div>
    </div>
</div>
<!-- End Storage -->

<!-- Start Upgrade Account -->
    <div class="dd-sidebar-upgradeAccount">
        <div class="upgradeAccountImg">
            <img src="<?php echo base_url('assets'); ?>/images/upgrade-account-img.png" class="img-fluid" alt="">
        </div>
        <div class="upgradeAccount_txtBtn">
            <h4>Get more storage & benefits</h4>
            <a href="javascript:void(0)" class="upgradeNowBtn">Upgrade Now</a>
        </div>
    </div>
    <!-- End Upgrade Account -->
</div>
</div>
<!-- End Drive Sidebar -->

<!-- Start Drive Top Nav -->
<div class="dd-top-navbar fixed">
    <div class="dd-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <!-- Start Top Nav -->
            <div class="dd-navbar-logo d-flex align-items-center justify-content-between">
                <i class="fas fa-bars wrapper-menu"></i>
                <a href="<?php echo base_url('anj_drive'); ?>" class="header-logo">
                    <img src="<?php echo base_url('assets/images/anj-drive-logo.png'); ?>" class="img-fluid" alt="anj-drive-logo" title="anj drive logo" data-saferedirecturl="<?php echo base_url('assets/images/anj-drive-logo.png'); ?>">
                </a>
            </div>
<!-- End Top Nav -->
<!-- Start Search Bar -->
<div class="dd-search-bar device-search">
    <form>
        <div class="input-prepend input-append">
            <div class="btn-group">
                <label class="dropdown-toggle searchbox" data-toggle="dropdown" aria-expanded="false">
                    <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                    <a class="search-link" href="javascript:void(0)"><i class="fas fa-search"></i></a>
                    <span class="caret"></span>
                </label>
                <ul class="dropdown-menu">
                    <?php 
                    $search_q=$this->db->query("SELECT file FROM `tbl_anjdrive` where user_id=$user_id and eDelete IN (0,2)");
                    $search_result = $search_q->result_array();
                    foreach ($search_result as $key => $value) {
                     
                    ?>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="item">
                                <i class="far fa-file-pdf bg-info"></i><?php echo $value['file']; ?>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </form>
</div>
            <!-- End Search Bar -->

            <div class="d-flex align-items-center">
                <div class="backTopms_Mobile">
                    <a href="<?php echo base_url('dashboard'); ?>" class="backTopmsBtn">
                        <i class="fas fa-chevron-left"></i> Back To PMS
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon search-content">
                            <a href="javascript:void(0)" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dd-search-bar dd-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                        <a href="<?php echo base_url('assets'); ?>/#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon backTopms">
                            <a href="<?php echo base_url(); ?>" class="backTopmsBtn">
                                <i class="fas fa-chevron-left"></i> Back To PMS
                            </a>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="<?php echo base_url('assets'); ?>/#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-question-circle"></i>
                            </a>
                            <div class="dd-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="<?php echo base_url('help'); ?>" class="dd-sub-card pt-0"><i class="far fa-life-ring"></i>Help</a>
                                            <a href="<?php echo base_url('training'); ?>" class="dd-sub-card"><i class="fas fa-sync-alt"></i>Training</a>
                                            <a href="<?php echo base_url('updates'); ?>" class="dd-sub-card"><i class="fas fa-sync-alt"></i>Updates</a>
                                            <a href="<?php echo base_url('terms_policy'); ?>" class="dd-sub-card"><i class="fas fa-heartbeat"></i>Terms and Policy</a>
                                            <a href="<?php echo base_url('send_feedback'); ?>" class="dd-sub-card"><i class="far fa-comment-alt"></i>Send Feedback</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown"> 
                            <a href="javascript:void(0)" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </a>
                            <div class="dd-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="<?php echo base_url('updates'); ?>" class="dd-sub-card pt-0"><i class="fas fa-cog"></i> Settings</a>
                                            <!-- <a href="javascript:void(0)" class="dd-sub-card"><i class="far fa-hdd"></i> Get Drive for desktop</a>
                                            <a href="javascript:void(0)" class="dd-sub-card"><i class="far fa-keyboard"></i> Keyboard Shortcuts</a> -->
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="javascript:void(0)" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="caption bg-primary line-height"><?php echo substr(getProfileName('username'),0,1); ?></div>
                            </a>
                            <div class="dd-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                <div class="card mb-0">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profile</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer ">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <div class="rounded-circle profile-icon bg-primary mx-auto d-block"><?php echo substr(getProfileName('username'),0,1); ?><a href="javascript:void(0)"></a></div>
                                                <div class="profile-detail mt-3">
                                                    <h5>
                                                        <a href="javascript:void(0)"><?php echo getProfileName('username'); ?></a>
                                                    </h5>
                                                    <p><?php echo getProfileName('email'); ?></p>
                                                </div>
                                                <a href="<?php echo base_url('logout'); ?>" class="btn btn-primary">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- End Drive Top Nav -->
<div class="modal fade" id="trialModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="trialModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="trialModalLabel">You're almost out of space</h5>
          </div>
          <div class="modal-body">
               <div class="form-row">
                  <p>You've reached the storage limit for the Free plan.Don't worry, all your data is safely preserved in ANJ PMS. If you have any questions,please contact our <a class="customer-support-link" href="https://anjwebtech.com/contact-us/" target="_blank"> Customer Support</a>.</p>
               </div>
               <div class="form-row">
                  <a href="<?php echo base_url('#pricing-table'); ?>" target="_blank" class="btn btn-purchase_subscription">Purchase</a>
               </div>
            </div>
        </div>
      </div>
    </div>
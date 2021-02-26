<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ANJ PMS - Project Management System</title>
<meta name="description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<meta name="keywords" content="pms, task, team, projects, images, role permission, Account Merge" />
<meta name="robots" content="noindex, nofollow, index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="language" content="en"/>
<meta name="audience" content="ALL"/>
<meta name="copyright" content="anjpmswebtech Pvt Ltd"/>
<meta name="googlebot" content="index,follow" />
<meta name="SLURP" content="INDEX,FOLLOW" />
<meta name="author" content="anjpmswebtech Pvt Ltd">
<meta name="p:domain_verify" content="074142b0b1f71cd9c90164be2a88e4a3"/>
<link rel="dns-prefetch" href="<?php echo base_url(); ?>"/>
<meta property="og:title" content="Project Tracking Software"/>
<meta property="twitter:title" content="Project Tracking Software" />
<meta property="og:image" content="<?php echo base_url('assets/images/ogBanner.png'); ?>"/>
<meta property="twitter:image" content="<?php echo base_url('assets/images/ogBanner.png'); ?>" />
<meta property="og:description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<meta property="twitter:description" content="project management system pms tools Like TO DO Plan, track, and software development projects in ANJ Webtech. Customize your workflow, collaborate, and release great software."/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo base_url(); ?>"/>
<meta property="og:site_name" content="Project Tracking Software"/>
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="canonical" href="<?php echo base_url('assets/images/ogBanner.png'); ?>" />
<link rel="alternate" href="<?php echo base_url('assets/images/ogBanner.png'); ?>" hreflang="en" />
<link rel="shortcut icon" href="<?php echo base_url('assets/home/'); ?>images/favicon.ico" />
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/wow.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/slick-theme.css">
<link rel="stylesheet" href="<?php echo base_url('assets/home/'); ?>css/flaticon.css">

<!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=601ba3a85692e4001147c438&product=undefined' async='async'></script> -->

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "37b918fe-7261-492d-847b-90c5d7d972fa",
    });
  });
</script>

<script>
 function subscribe() {
    OneSignal.push(["registerForPushNotifications"]);
    event.preventDefault();
}
function unsubscribe(){
    OneSignal.setSubscription(true);
}

var OneSignal = OneSignal || [];
OneSignal.push(function() {
OneSignal.on('subscriptionChange', function (isSubscribed) {
    console.log("The user's subscription state is now:", isSubscribed);
    OneSignal.sendTag("user_id","<?php echo getProfilename('user_id'); ?>", function(tagsSent)
    {
        console.log("Tags have finished sending!");
    });
});
OneSignal.setExternalUserId(<?php echo getProfilename('user_id'); ?>);
OneSignal.getUserId().then(function(userId){
        console.log("OneSignal User ID:", userId);
    });
var isPushSupported = OneSignal.isPushNotificationsSupported();
if (isPushSupported)
{
    OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
    {
        if (isEnabled)
        {
            console.log("Push notifications are enabled!");

        } else {
            OneSignal.showHttpPrompt();
            console.log("Push notifications are not enabled yet.");
        }
    });
} else {
    console.log("Push notifications are not supported.");
}
});           
</script>
</head>
  <body class="index">
    <!-- loading -->
    <div id="loading">
      <div id="loading-center">
        <div class="loader">
          <div class="cube">
            <div class="sides">
              <div class="top"></div>
              <div class="right"></div>
              <div class="bottom"></div>
              <div class="left"></div>
              <div class="front"></div>
              <div class="back"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- loading End -->

    <!-- Start Header -->
    <header id="header" class="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="<?php echo base_url(''); ?>">
                <img class="logo" src="<?php echo base_url('assets/home/'); ?>images/index-logo.png" alt="image">
              </a>
            </nav>
          </div>
          <div class="col-lg-4 text-right">
            <ul class="login">
              <?php if(isset($_SESSION['user_details'])){ ?>
                
                <li class="d-inline"><a href="<?php echo base_url('dashboard'); ?>" class="login-btn">Dashboard</a></li>

                <li class="d-inline"><a href="<?php echo base_url('login/logout'); ?>" class="btn">Logout</a></li>

              <?php } else { ?>

                <li class="d-inline text-dark"><a href="<?php echo base_url('login'); ?>" class="login-btn">Login</a></li>
                <li class="d-inline "><a href="<?php echo base_url('register'); ?>" class="login-btn">Signup</a></li>

              <?php } ?>
              
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header -->

    <!-- Banner-->
    <div class="banner laye" data-bg-img="<?php echo base_url('assets/home/'); ?>images/banner/banner_bg.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Banner Content -->
                    <div class="banner-content">
                        <span class="stroke-text">ANJ PMS</span>
                        <h1>Simplify Project Management With <span>ANJ PMS</span>.</h1>
                        <p class="enable-border">Organize and assign tasks. With lists, teams see immediately what they need to do, which tasks are a priority, and when work is due.</p>
                        <a href="<?php echo base_url('register'); ?>" class="btn btn-lg bannerSignUp-Btn">Signup Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <!-- End Banner Content -->
                </div>
                <div class="col-lg-6">
                    <!-- Banner IMG -->
                    <div class="banner-img d-none d-xl-block">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/banner-img.png" alt="main img" data-rjs="2" class="main-img">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/cloud.png" alt="Shield" data-rjs="2" class="cloud-img">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/man1.png" alt="Man1" data-rjs="2" class="man1">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/man2.png" alt="Man2" data-rjs="2" class="man2">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/setting.png" alt="setting" data-rjs="2" class="setting">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/check.png" alt="Check" data-rjs="2" class="check">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/check.png" alt="Check" data-rjs="2" class="check check2">
                    </div>
                    <!-- End Banner IMG -->

                    <!-- Banner IMG Responsive -->
                    <div class="banner-img-responsive d-block d-xl-none">
                        <img src="<?php echo base_url('assets/home/'); ?>images/banner/banner_img_full.png" data-rjs="2" alt="">
                    </div>
                    <!-- End Banner IMG Responsive -->
                </div>
            </div>
        </div>
    </div>
     <!-- Banner End -->

      <!-- Main Content -->
      <div class="main-content">
        <!-- Roadmap-->
        <section class="iq-roadmap">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <div class="title-box">
                  <h6 class="title">Marketing</h6>
                  <h2 class=" "><p>New Starts Build Your Roadmap</p></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="roadmap-img">
                  <img src="<?php echo base_url('assets/home/images/feature/01.png'); ?>" class="img-fluid" alt="images">
                </div>
              </div>
            </div>
          </div>

        </section>
        <!-- Roadmap End-->

        <!-- Features-->
        <section class="iq-feature" id="iq-feature">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">

                <div class="title-box">
                  <h6 class="title">Feature</h6>
                  <h2 class=" ">Our Awesome Features</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                   <i class="flaticon-manager flaticon mb-3"></i>
                   <h4 class="mb-3">Management</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                   <i class="flaticon-statistics flaticon mb-3"></i>
                   <h4 class="mb-3">Gantt Charts</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                  <i class="flaticon-diagram flaticon mb-3"></i>
                   <h4 class="mb-3">Task Hierarchy</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                   <i class="flaticon-cellphone flaticon mb-3"></i>
                   <h4 class="mb-3">Mobile Apps</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                  <i class="flaticon-ip flaticon mb-3"></i>
                   <h4 class="mb-3">File Sharing And Drive</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="iq-feature-box">
                  <i class="flaticon-notification flaticon mb-3"></i>
                   <h4 class="mb-3">Notifications</h4>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
              </div>
            </div>
          </div>

        </section>
        <!-- Features End-->
        <!-- Finance -->
        <!-- Finance End -->
        <!-- Agility -->
        <section class="iq-agility">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <img src="<?php echo base_url('assets/home/'); ?>images/feature/14.png" class="img-fluid" alt="images">
              </div>
              <div class="col-lg-6 iq-rmt-50">
                <h6 class="title mb-0">Agility</h6>
                <h2 class="mb-3">A single, real-time version of the truth</h2>
                <p class="mb-3">Use Timeline to plan projects right the first time. See how the pieces fit together so you can spot gaps and overlaps before you start.</p>
                <ul class="listing-mark mb-5">
                  <li>Say goodbye to navigating between numerous tools and spreadsheets that don’t add up.</li>
                  <li>Track progress and share results with your team using ANJPMS automated reports and personally tailored dashboards, all in real time.</li>
                </ul>
                <a href="<?php echo base_url('register'); ?>" class="button">Get Started Now!</a>
              </div>
            </div>
          </div>

        </section>
        <!-- Agility End-->

        <!-- Operation -->
        <section class="iq-opration">
          <div class="container">
            <div class="row flex-row-reverse">
              <div class="col-lg-6 text-center">
                <img src="<?php echo base_url('assets/home/'); ?>images/feature/16.png" class="img-responsive img-fluid" alt="images">
              </div>
              <div class="col-lg-6 iq-rmt-50">
                <h6 class="title mb-0">Finance</h6>
                <h2 class="mb-3">Perfect for Operations HR and Finance</h2>
                <p class="mb-5">Use Timeline to plan projects right the first time. See how the pieces fit together so you can spot gaps and overlaps before you start.</p>
                <a href="<?php echo base_url('register'); ?>" class="button">Get Started Now!</a>
              </div>
            </div>
          </div>

        </section>
        <!-- Operation End -->

        <!-- Agility -->
        <section class="iq-work">
          <div class="container">
            <div class="row ">
              <div class="col-lg-6 text-center">
                <img src="<?php echo base_url('assets/home/'); ?>images/feature/21.png" class="img-responsive img-fluid" alt="images">
              </div>
              <div class="col-lg-6 iq-rmt-50">
                <h6 class="title mb-0">Finance</h6>
                <h2 class="mb-3">Perfect for Operations HR and Finance</h2>
                <p class="mb-5">Use Timeline to plan projects right the first time. See how the pieces fit together so you can spot gaps and overlaps before you start.</p>
                <a href="<?php echo base_url('register'); ?>" class="button">Get Started Now!</a>
              </div>
            </div>
          </div>

        </section>
        <!-- Agility End -->

        <!-- software compilation -->
        <section class="iq-software gray-bg">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box text-center">
                  <h6 class="title ">PROJECT SOFTWARE</h6>
                  <h2 class="">Software Compilation</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <ul>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/01.png" alt="images"></li>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/02.png" alt="images"></li>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/03.png" alt="images"></li>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/01.png" alt="images"></li>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/02.png" alt="images"></li>
                  <li class="iq-compilation"><img src="<?php echo base_url('assets/home/'); ?>images/project/03.png" alt="images"></li>
                </ul>
                <div class="circle-ripple"></div>
              </div>
            </div>
          </div>
        </section>
        <!-- Software Compilation End -->

        <!-- Blog -->
        <section class="our-blog">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="title-box">
                  <h6 class="title">Marketing</h6>
                  <h2 class="font-weight-bold subtitle">Popular Blog Post</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="slider variable-width">
                  <?php 
                  $query_blog = $this->db->query("SELECT title,blog_image,created_date,like_blog,comment,blog_id FROM `tbl_blog` ORDER BY `tbl_blog`.`blog_id` DESC");
                  $result_blog = $query_blog->result_array();
                  foreach ($result_blog as $key => $value) {
                  ?>
                  <div class="grid d-inline-block position-relative  bg-over-black-70">
                    <figure class="effect-chico">
                      <img src="<?php echo base_url('uploads/'); ?><?php echo $value['blog_image']; ?>" class="img-fluid" alt="img"/>
                      <figcaption>
                        <h2 class="font-weight-bold"><?php echo $value['title']; ?></h2>
                      </figcaption>
                      <div class="blog-comment">
                        <ul class="list-inline">
                          <li class="list-inline-item float-left  font-weight-bold"><a href="javascript:void(0);" class="text-black"><?php echo date('M d,Y',strtotime($value['created_date'])); ?></a></li>

                          <li class="float-right list-inline-item ml-4"><a href="javascript:void(0);" class="text-gray font-weight-bold" ><span class="mr-2"><i class="far fa-comment"></i></span> <?php echo $value['like_blog']; ?> </a></li>

                          <li class="float-right list-inline-item " onclick="like_unlike(<?php echo $value['blog_id']; ?>)"><a href="javascript:void(0);" class="text-gray font-weight-bold"><span class="mr-2"><i class="far fa-heart"></i></span> <?php echo $value['comment']; ?> </a></li>
                        </ul>
                      </div>
                    </figure>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Blog End -->
      </div>
      <!-- Main Content END -->

      <!-- Start Our Pricing Package Section -->
      <section id="pricing-table">
        <div class="container">
        
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
              <div class="sec-heading center">
                <h2>See our packages</h2>
                <p>Take a look at our list of plans and prices available to fit your teams’ needs. Get started for free. No credit card required.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="switch-set text-center wow fadeInUp" data-wow-delay=".2s">
                <div>Monthly plan</div>
                <div>
                  <input id="sw-1" class="switch" type="checkbox" />
                </div>
                <div>Yearly plan</div>
                <div class="spacer-20"></div>
              </div>
            </div>
          </div>

          <div class="row">
<?php
$query1 = $this->db->query("SELECT `total_user_support`, `file_sharing_storage`, `max_file_size_upload` FROM `tbl_price` where month_year='free'");
$result1 = $query1->row_array();

$query3 = $this->db->query("SELECT `total_user_support` FROM `tbl_price` where month_year='custom'");
$result3 = $query3->row_array();
?>
            <!-- Single Package -->
            <div class="col-lg-4 col-md-4">
              <div class="pricing-wrap basic-pr">
                
                <div class="pricing-header">
                  <h4 class="pr-value opt-1"><sup></sup><span>Free</span></h4>
                  <h4 class="pr-value opt-2"><sup></sup><span>Free</span></h4>
                  <h4 class="pr-title">Basic Package</h4>
                </div>
                <div class="pricing-body">
                  <ul>
                    <li class="available">Only <?php echo $result1['total_user_support']; ?> users</li>
                    <li class="available"><?php echo $result1['file_sharing_storage'] / 1000; ?> MB of space</li>
                    <li class="available"><?php echo $result1['max_file_size_upload']; ?> MB file upload limit</li>
                    <li class="available">7x24 Fully Support</li>
                    <li class="available">File share</li>
                    <li class="available" style="text-decoration: line-through;">API access</li>
                    <li class="available" style="text-decoration: line-through;">Masteradmin Panel No access</li>
                  </ul>
                </div>
                <?php if(isset($_SESSION['user_details'])){ ?>
                    <div class="pricing-bottom">
                      <a href="javascript:void(0);" class="btn-pricing">Running Plan</a>
                  </div>
                <?php } else { ?>
                  <div class="pricing-bottom">
                    <a href="<?php echo base_url('register'); ?>" class="btn-pricing">Choose Plan</a>
                  </div>
                <?php }  ?>
                
                
              </div>
            </div>
            
            <!-- Single Package -->
            <div class="col-lg-4 col-md-4">
              <div class="pricing-wrap platinum-pr recommended">
<?php 
$query_tbl_pricemonth = $this->db->query("SELECT * FROM `tbl_price` where month_year='month'");
$result_tbl_pricemonth = $query_tbl_pricemonth->row_array();
$query_tbl_priceyear = $this->db->query("SELECT * FROM `tbl_price` where month_year='year'");
$result_tbl_priceyear = $query_tbl_priceyear->row_array();

$sizee='1000';
$file_sharing_storage_limit = $result_tbl_pricemonth['file_sharing_storage'] / $sizee / $sizee;
$file_sharing_storage_limit = round($file_sharing_storage_limit). ' GB';

$max_file_size_upload_limit = $result_tbl_pricemonth['max_file_size_upload'] / $sizee;
$max_file_size_upload_limit = round($max_file_size_upload_limit,2). ' GB';
?>

                <div class="pricing-header">
                  <h4 class="pr-value opt-1"><sup>$</sup><span id="getpriceMonth"><?php echo $result_tbl_pricemonth['price']; ?></span></h4>
                  <h4 class="pr-value opt-2"><sup>$</sup><span id="getpriceYear"><?php echo $result_tbl_priceyear['price']; ?></span></h4>
                  <h4 class="pr-title">Platinum Package</h4>
                </div>
                <div class="pricing-body">
                  <ul>
                    <li class="available">Upto <?php echo $result_tbl_pricemonth['total_user_support']; ?> users</li>
                    <li class="available">Upto <?php echo $file_sharing_storage_limit; ?> Space</li>
                    <li class="available"><?php echo $max_file_size_upload_limit; ?> Max file size</li>
                    <li class="available">7x24 Fully Support</li>
                    <li class="available">File share</li>
                    <li class="available">API access</li>
                    <li class="available">Masteradmin Panel access</li>
                  </ul>
                </div>

<?php if(isset($_SESSION['user_details'])){ 
?>

  <div class="pricing-bottom opt-1">
    <a href="javascript:void(0);" class="btn-pricing" onclick="upgradePlanM('<?php echo $result_tbl_pricemonth['price_hide']; ?>')">Upgrade now</a>
  </div>
  
  <div class="pricing-bottom opt-2" style="display: none;">
      <a href="javascript:void(0);" class="btn-pricing" onclick="upgradePlanM('<?php echo $result_tbl_priceyear['price_hide']; ?>')">Upgrade now</a>
  </div>

<?php } else { ?>

  <div class="pricing-bottom opt-1">
    <a href="javascript:void(0);" class="btn-pricing" onclick="platinum_packege('<?php echo $result_tbl_pricemonth['price_hide']; ?>')">Choose Plan</a>
  </div>
  <div class="pricing-bottom opt-2" style="display: none;">
    <a href="javascript:void(0);" class="btn-pricing" onclick="platinum_packege('<?php echo $result_tbl_priceyear['price_hide']; ?>')">Choose Plan</a>
  </div>

<?php } ?>
                

              </div>
            </div>
            
            <!-- Single Package -->
            <div class="col-lg-4 col-md-4">
              <div class="pricing-wrap standard-pr">
                
                <div class="pricing-header">
                  <h4 class="pr-value opt-1"><sup>$</sup><span>10</span></h4>
                  <h4 class="pr-value opt-2"><sup>$</sup><span>100</span></h4>
                  <h4 class="pr-title">Custom Package</h4>
                </div>
                <div class="pricing-body">
                  <ul>
                    <li class="available"><?php echo $result3['total_user_support']; ?>+ users</li>
                    <li class="available">To be discussed</li>
                    <li class="available">No Max file size</li>
                    <li class="available">7x24 Fully Support</li>
                    <li class="available">File share</li>
                    <li class="available">API access</li>
                    <li class="available">Masteradmin Panel access</li>
                  </ul>
                </div>

                  <!-- <div class="pricing-bottom">
                    <a href="https://anjwebtech.com/contact-us/" class="btn-pricing">Upgrade now</a>
                  </div> -->
                  <!-- <div class="pricing-bottom">
                    <a href="javascript:void(0);" class="btn-pricing" onclick="standard_package()">Choose Plan</a>
                  </div> -->
                  
                  <div class="pricing-bottom">
                    <a href="javascript:void(0);" class="btn-pricing" data-toggle="modal" data-target="#custompackageModal" onclick="standard_package()">Choose Plan</a>
                  </div>

              </div>
            </div>
            
          </div>
          
        </div>  
      </section>
      <!-- End Our Pricing Package Section -->

      <!-- Start Download App Section -->
      <section class="download-app-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 col-sm-12 content-column">
              <div class="content_block_2">
                <div class="content-box">
                  <div class="sec-title light">
                    <p class="text-blue">Download apps</p>
                    <h2>Download App Free App For Android and iPhone</h2>
                  </div>
                  <div class="text">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto accusantium.</p>
                  </div>
                  <div class="btn-box clearfix mt-5">
                    <a href="<?php echo base_url(''); ?>" class="download-btn play-store">
                      <i class="fab fa-google-play"></i>
                      <span>Download on</span>
                      <h3>Google Play</h3>
                    </a>
                    <a href="<?php echo base_url(''); ?>" class="download-btn app-store">
                      <i class="fab fa-apple"></i>
                      <span>Download on</span>
                      <h3>App Store</h3>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 image-column">
              <div class="image-box">
                <figure class="image"><img src="<?php echo base_url('assets/home/'); ?>images/app.png" class="img-fluid" alt=""></figure>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Download App Section -->

      <!-- Start Call To Action Section -->
      <section class="call-to-act-wrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="call-to-act">
                <div class="call-to-act-head">
                  <h3>Want to Become a ANJ PMS?</h3>
                  <span>We'll help you to grow your career and growth.</span>
                </div>
                <a href="<?php echo base_url('register'); ?>" class="btn btn-call-to-act">SignUp Today</a>
              </div>
              
            </div>
          </div>
        </div>
      </section>
      <!-- End Call To Action Section -->

      
      <div class="modal fade" id="custompackageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="custompackageModalLabel" aria-hidden="true">
        <div class="modal-dialog-centered modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="custompackageModalLabel">Custom Package</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                 <div class="form-row">
                    <p>If you have any questions,<br/>please contact our <a class="customer-support-link" href="https://anjwebtech.com/contact-us/" target="_blank"> Customer Support</a>.</p>
                 </div>
                 <div class="form-row">
                    <div class="gyan-infobox-content gyan-ease-transition">F-504, Titanium City Center, Prahaladnagar, A'bad – 380015 <br>
                    <div class="office-phone"><a href="tel:+919824168721"><span><i class="fas fa-phone"></i><span>+91-982-416-8721</span></span></a></div>
                    <div class="office-email"><a href="mailto:info@anjwebtech.com"><span><i class="fas fa-envelope"></i><span> info@anjwebtech.com</span></span></a></div>
                    </div>
                 </div>
              </div>
              <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
              </div>
          </div>
        </div>
      </div>

      <!-- Footer Start -->
      <footer class="dark-footer skin-dark-footer">
        <div class="footer-bottom">
          <div class="container">
            
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6">
                <p class="mb-0">© <?php echo date("Y"); ?> ANJ PMS. Designd By <a href="https://anjwebtech.com">ANJ Webtech Pvt Ltd</a> All Rights Reserved</p>
              </div>
              <div class="col-lg-6 col-md-6">
                <ul class="footer-bottom-social">
                  <li><a href="https://www.facebook.com/anjpms/"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="https://twitter.com/anjpms"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="https://www.instagram.com/anjpms/"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="https://www.linkedin.com/in/anjpms/"><i class="fab fa-linkedin-in"></i></a></li>
                  <li><a href="https://www.pinterest.com/ajobanputra/"><i class="fab fa-pinterest"></i></a></li>
                  <li><a href="https://www.youtube.com/user/anjpms"><i class="fab fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>

            <ul class="footer-bottom-social" style="text-align: center;">
              <li><u><a href="<?php echo base_url('feedback'); ?>" target="_blank">FeedBack</a></u></li>
              <li><u><a href="<?php echo base_url('#iq-feature'); ?>">Product</a></u></li>
              <li><u><a href="<?php echo base_url('developer_api'); ?>" target="_blank">Developers & API</a></u></li>
              <li><u><a href="<?php echo base_url('#pricing-table'); ?>">Pricing</a></u></li>
              <li><u><a href="<?php echo base_url('contact'); ?>" target="_blank">Contact</a></u></li>
            </ul>

          </div>
        </div>
      </footer>
      <!-- Footer End -->
      <div class="feedback"><a href="<?php echo base_url('feedback'); ?>" target="_blank">FeedBack</a></u></div>
      <style type="text/css">
        .feedback {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        position: fixed;
        top: 40%;
        left: 95%;
        background: #ccc;
        padding: 10px;
        }
      </style>
      <!-- Start Go To Top Section -->
      <div class="go-top-area">
        <div class="go-top-wrap">
          <div class="go-top-btn-wrap">
            <div class="go-top go-top-btn active">
              <i class="fas fa-angle-double-up"></i>
              <i class="fas fa-angle-double-up"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- End Go To Top Section -->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo base_url('assets/home/'); ?>js/jquery-3.5.1.min.js" ></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/popper.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/bootstrap.min.js" ></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/modernizr.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/wow.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/jquery.count.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/owl.carousel.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/parallax.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/slick.min.js"></script>
      <script src="<?php echo base_url('assets/home/'); ?>js/custom.js"></script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
      /*var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/6020f6f5c31c9117cb76dc86/1eu0c9cgh';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();*/
      </script>
      <!--End of Tawk.to Script-->

      <script type="text/javascript">
        function like_unlike(blog_id) {
          $.ajax({
            url: '<?php echo base_url('ajax/like_unlike'); ?>',
            dataType: 'html',type: 'post',
            data: {blog_id:blog_id},
            success: function(response){
            }
          });
        }
        
        function platinum_packege(price_hide){
          $.ajax({
            url: '<?php echo base_url('home/platinum_packege'); ?>',
            dataType: 'html',type: 'post',
            data: {price_hide:price_hide,upgrademdr:'no'},
            success: function(response){
              window.location.href = 'https://anjpms.com/register/';
            }
          });
        } 

        function upgradePlanM(price_hide){
          $.ajax({
            url: '<?php echo base_url('home/platinum_packege'); ?>',
            dataType: 'html',type: 'post',
            data: {price_hide:price_hide,upgrademdr:'yes'},
            success: function(response){
              window.location.href = 'https://anjpms.com/test/radio/';
            }
          });
        }
        $("#button").click(function() {
          $('html, body').animate({
          scrollTop: $("#pricing-table").offset().top
          }, 2000);
        });

/*document.addEventListener("keydown",function(){return 123==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&event.shiftKey&&73==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&85==event.keyCode?(alert("Nice trick! but not permitted!"),!1):void 0},!1),document.addEventListener?document.addEventListener("contextmenu",function(e){alert("Nice trick! but not permitted!"),e.preventDefault()},!1):document.attachEvent("oncontextmenu",function(){alert("Nice trick! but not permitted!"),window.event.returnValue=!1});
*/
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
}
*/
      </script>

<script>
setInterval(function(){
  check_user();
},3000);
function check_user(){
  jQuery.ajax({
    url:'<?php echo base_url('ajax/user_auth'); ?>',
    type:'post',
    data:'type=ajax',
    success:function(result){
      console.log(result);
      if(result=='logout'){
        alert('Your session will expire')
        window.location.href='<?php echo base_url('logout'); ?>';
      }
    }
  });
}
</script>

  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>FeedBack From</title>
<meta name="description" content="feedback anjpms project management system pms tools"/>
<meta name="keywords" content="feedback anjpms project management system pms tools pms, task, team, projects, images, role permission, Account Merge" />
<meta name="robots" content="noindex, nofollow, index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="language" content="en"/>
<meta name="audience" content="ALL"/>
<meta name="copyright" content="anjpmswebtech Pvt Ltd"/>
<meta name="googlebot" content="index,follow" />
<meta name="SLURP" content="INDEX,FOLLOW" />
<meta name="author" content="feedback anjpms">
<meta name="p:domain_verify" content="074142b0b1f71cd9c90164be2a88e4a3"/>
<link rel="dns-prefetch" href="<?php echo base_url('feedback'); ?>"/>
<meta property="og:title" content="feedback anjpms"/>
<meta property="twitter:title" content="feedback anjpms" />
<meta property="og:image" content="<?php echo base_url('assets/images/ogBanner.png'); ?>"/>
<meta property="twitter:image" content="<?php echo base_url('assets/images/ogBanner.png'); ?>" />
<meta property="og:description" content="feedback anjpms project management system pms tools"/>
<meta property="twitter:description" content="feedback anjpms project management system pms tools"/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo base_url('feedback'); ?>"/>
<meta property="og:site_name" content="feedback anjpms"/>
<link rel="canonical" href="<?php echo base_url('feedback'); ?>" />
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
</head>
  <body class="index">
    
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
                
                <li class="d-inline "><a href="<?php echo base_url('dashboard'); ?>" class="login-btn">Dashboard</a></li>

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

      <!-- Main Content -->
      <div class="main-content">
        <!-- Roadmap-->

        <section class="iq-roadmap">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <div class="title-box">
                  <h1 class="title">Feedback ANJPMS</h1>
                </div>
              </div>
            </div>
            

<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('success')?>
</div>
<?php endif; ?>

<form action="<?php echo base_url('feedback/insert_feedback'); ?>" method="post" onsubmit="return validateForm()">
  <div class="row">
              <div class="col-sm-6">
                <label for="quality">Type of Quality:</label>
                <select name="quality" id="quality" class="form-control">
                  <option value=""></option>
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Good">Good</option>
                  <option value="Average">Average</option>
                  <option value="Poor">Poor</option>
                </select>

              </div>

              <div class="col-sm-6">
                <label for="phone">Your Phone:</label>
                <input type="number" id="phone" name="phone" class="form-control">
              </div>

              <div class="col-sm-6">
                <label for="first_name">Your Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control">
              </div>

              <div class="col-sm-6">
                <label for="email">Your Email:</label>
                <input type="text" id="email" name="email" class="form-control">
              </div>

              <div class="col-sm-12">
                <label for="email">Your Comment:</label>
                <textarea name="message" id="message" class="form-control" rows="3"></textarea>
              </div>

              <div class="col-sm-12">
                <input type="submit" name="submit" class="btn login-btn btn-primary" value="Send FeedBack">
              </div>

            </div>
            </form>

          </div>

        </section>
        <!-- Roadmap End-->

      </div>
      <!-- Main Content END -->

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
      
      <script type="text/javascript">
      function validateForm() {
          if($("#quality").val()==''){
            alert("please select quality");
            $("#quality").focus();
            return false;
          }
          if($("#email").val()==''){
            alert("please enter email");
            $("#email").focus();
            return false;
          }
          if($("#message").val()==''){
            alert("please enter your comment");
            $("#message").focus();
            return false;
          }
      }
      </script>
      
  </body>
</html>
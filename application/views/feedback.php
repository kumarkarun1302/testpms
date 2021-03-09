<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Feedback | ANJ PMS</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/payment/'); ?>images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/responsive.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/wow.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/slick-theme.css">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/flaticon.css">
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
                <img class="logo" src="<?php echo base_url('assets/payment/images/index-logo.png'); ?>" alt="image">
              </a>
            </nav>
          </div>
          <div class="col-lg-4 text-right">
            <ul class="login">
                <?php if(isset($_SESSION['user_details'])){ ?>
                  <li class="d-inline "><a href="<?php echo base_url('dashboard'); ?>" class="login-btn">Dashboard</a></li>
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

    <!-- Start Page Title Area -->
    <div class="page-title-area feedback">
       <div class="d-table">
          <div class="d-table-cell">
             <div class="container">
                <div class="page-title-content">
                   <h2>Feedback</h2>
                   <ul>
                      <li><a href="<?php echo base_url(''); ?>">Home</a></li>
                      <li>Feedback</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="default-shape">
          <div class="shape-1">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/1.png" alt="image">
          </div>
          <div class="shape-2 rotateme">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/2.png" alt="image">
          </div>
          <div class="shape-3">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/3.svg" alt="image">
          </div>
          <div class="shape-4">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/4.svg" alt="image">
          </div>
          <div class="shape-5">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/5.png" alt="image">
          </div>
       </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact Section -->
    <section class="pms-contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-widget">
               <div class="sec-title2">
                   <span class="sub-text contact mb-15">Send Us Your Feedback!</span>
                   <h2 class="title testi-title">Do you have a suggestion or found some bug? let us know in the field below.</h2>

               </div>
                <div id="form-messages"></div>
                <form id="contact-form" method="post" action="<?php echo base_url('feedback/insert_feedback'); ?>" onsubmit="return validateForm()"> 
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="name" name="name" placeholder="Name" >
                            </div> 
                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="email" name="email" placeholder="E-Mail" >
                            </div>   
                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone Number" >
                            </div>   
                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                <select name="type_of_enquiry" id="type_of_enquiry" class="form-control" >
                                  <option value="Select Feedback Type">Select Feedback Type</option>
                                  <option value="Excellent">Excellent</option>
                                  <option value="Very Good">Very Good</option>
                                  <option value="Good">Good</option>
                                  <option value="Average">Average</option>
                                  <option value="Poor">Poor</option>
                                </select>
                            </div>
                      
                            <div class="col-lg-12 mb-30">
                                <textarea class="form-control" id="message" name="message" placeholder="Your message Here" ></textarea>
                            </div>
                        </div>
                        <div class="btn-part">                                            
                            <div class="form-group mb-0">
                                <input class="readon learn-more submit" type="submit" value="Send Feedback">
                            </div>
                        </div> 
                    </fieldset>
                </form> 
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

      <!-- Footer Start -->
      <footer class="dark-footer skin-dark-footer">
        <div class="footer-bottom">
          <div class="container">
            <div class="row align-items-center">
              
              <div class="col-lg-6 col-md-6">
                <p class="mb-0">© 2021 ANJ PMS. Designd By <a href="https://anjwebtech.com/">ANJ Webtech Pvt Ltd</a> All Rights Reserved</p>
              </div>
              
              <div class="col-lg-6 col-md-6 text-right">
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
              <li><u><a href="<?php echo base_url('blog'); ?>">Blog</a></u></li>
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
      <script src="<?php echo base_url('assets/payment/'); ?>js/jquery-3.5.1.min.js" ></script>
      <!-- popper  -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/popper.min.js"></script>
      <!--  bootstrap -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/bootstrap.min.js" ></script>
      <!-- Modernizr JavaScript -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/modernizr.js"></script>
      
      <!-- Wow -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/wow.min.js"></script>

      <!-- countTo JavaScript -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/jquery.count.min.js"></script>

      <!-- Owl Carousel JavaScript -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/owl.carousel.min.js"></script>

      <!-- Parallax JavaScript -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/parallax.min.js"></script>

      <!-- slick  -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/slick.min.js"></script>
      <!-- Custom JavaScript -->
      <script src="<?php echo base_url('assets/payment/'); ?>js/custom.js"></script>

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
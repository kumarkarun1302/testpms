<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog | ANJ PMS</title>
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
                <img class="logo" src="<?php echo base_url('assets/payment/'); ?>images/index-logo.png" alt="image">
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
    <div class="page-title-area">
       <div class="d-table">
          <div class="d-table-cell">
             <div class="container">
                <div class="page-title-content">
                   <h2>Blog</h2>
                   <ul>
                      <li><a href="<?php echo base_url('assets/payment/'); ?>index.html">Home</a></li>
                      <li>Blog</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="default-shape">
          <div class="shape-1">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/1.png" class="img-fluid" alt="image">
          </div>
          <div class="shape-2 rotateme">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/2.png" class="img-fluid" alt="image">
          </div>
          <div class="shape-3">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/3.svg" class="img-fluid" alt="image">
          </div>
          <div class="shape-4">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/4.svg" class="img-fluid" alt="image">
          </div>
          <div class="shape-5">
             <img src="<?php echo base_url('assets/payment/'); ?>images/shape/5.png" class="img-fluid" alt="image">
          </div>
       </div>
    </div>
    <!-- End Page title Area -->

    <!-- Start Blog Post -->
    <section id="blog" class="blog-area pt-100 pb-100">
       <div class="container">
          <div class="section-title">
             <h2>Latest Blog Post</h2>
             <div class="bar"></div>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
          </div>
          <div class="row">
            
          <?php 
            $query_blog = $this->db->query("SELECT * FROM `tbl_blog` ORDER BY `tbl_blog`.`blog_id` DESC");
            $result_blog = $query_blog->result_array();
            foreach ($result_blog as $key => $value) {
          ?>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                   <div class="image">
                      <a href="<?php echo base_url('blog_details/1'); ?>">
                      <img src="<?php echo base_url('uploads/'); ?><?php echo $value['blog_image']; ?>" class="img-fluid" alt="image">
                      </a>
                      <div class="btn">
                         <a href="<?php echo base_url('blog_details/1'); ?>"><?php echo $value['categories']; ?></a>
                      </div>
                   </div>
                   <div class="content">
                      <ul class="post-meta">
                         <li>
                            <i class="fa fa-calendar"></i>
                            <?php echo date('M d,Y',strtotime($value['created_date'])); ?>
                         </li>
                         <li>
                            <i class="fa fa-comments"></i>
                            <a href="">3 Comment</a>
                         </li>
                      </ul>
                      <h3>
                         <a href="<?php echo base_url('assets/payment/'); ?>single-blog.html">
                            <?php echo $value['title']; ?>
                         </a>
                      </h3>
                        <p><?php echo substr($value['description'],0,400); ?></p>
                      <a href="<?php echo base_url('assets/payment/'); ?>single-blog.html" class="read-more">
                      Read More
                      </a>
                   </div>
                </div>
            </div>
          
          <?php } ?>
             
             <!-- <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                   <a href="<?php echo base_url('assets/payment/'); ?>#" class="prev page-numbers">
                   <i class="fa fa-chevron-left"></i>
                   </a>
                   <a href="<?php echo base_url('assets/payment/'); ?>#" class="page-numbers">1</a>
                   <span class="page-numbers current" aria-current="page">2</span>
                   <a href="<?php echo base_url('assets/payment/'); ?>#" class="page-numbers">3</a>
                   <a href="<?php echo base_url('assets/payment/'); ?>#" class="page-numbers">4</a>
                   <a href="<?php echo base_url('assets/payment/'); ?>#" class="next page-numbers">
                   <i class="fa fa-chevron-right"></i>
                   </a>
                </div>
             </div> -->
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
    </section>
    <!-- End Blog Post -->

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

      
  </body>
</html>
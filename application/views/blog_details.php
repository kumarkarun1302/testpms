<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $result_blog['title']; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/payment/'); ?>images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/responsive.css">
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
                      <li><a href="<?php echo base_url(''); ?>">Home</a></li>
                      <li>Blog</li>
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

    <!-- Start Single Blog Post -->
    <section class="single-blog-area pt-100 pb-100">
       <div class="container">
          <div class="row">
             <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                   <div class="article-image">
                      <img src="<?php echo base_url('assets/payment/'); ?>images/blog-details.jpg" class="img-fluid" alt="image">
                   </div>
                   <div class="article-content">
                      <div class="entry-meta">
                         <ul>
                            <li>
                               <span>Posted On:</span>
                               <a href="#"><?php echo date('M d,Y',strtotime($result_blog['created_date'])); ?></a>
                            </li>
                            <li>
                               <span>Posted By:</span>
                               <a href="#">Admin</a>
                            </li>
                         </ul>
                      </div>
                      <h3><?php echo $result_blog['title']; ?></h3>

                      <?php echo $result_blog['description']; ?>

                   </div>
                   <div class="article-footer">
                      <div class="article-tags">
                         <!-- <span>
                          <i class="fa fa-bookmark"></i>
                         </span>
                         <a href="">Fashion</a>,
                         <a href="">Travel</a> -->
                      </div>
                      <div class="article-share">
                         <ul class="social">
                            <li><span>Share:</span></li>
                            <li>
                               <a href="https://www.facebook.com/anjpms/" target="_blank">
                               <i class="fab fa-facebook-f"></i>
                               </a>
                            </li>
                            <li>
                               <a href="https://twitter.com/anjpms" target="_blank">
                               <i class="fab fa-twitter"></i>
                               </a>
                            </li>
                            <li>
                               <a href="https://www.instagram.com/anjpms/" target="_blank">
                               <i class="fab fa-instagram"></i>
                               </a>
                            </li>
                            <li>
                               <a href="https://www.linkedin.com/in/anjpms/" target="_blank">
                               <i class="fab fa-linkedin"></i>
                               </a>
                            </li>
                            <li>
                               <a href="https://www.pinterest.com/ajobanputra/" target="_blank">
                               <i class="fab fa-pinterest"></i>
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   
                   <div class="comments-area">
                      <h3 class="comments-title">4 Comments:</h3>
                      <ol class="comment-list" id="get_commentlist">
                         
                         <li class="comment">
                            <article class="comment-body">
                               <footer class="comment-meta">
                                  <div class="comment-author vcard">
                                     <img src="<?php echo base_url('assets/avatar4.jpg'); ?>" class="avatar img-fluid" alt="image">
                                     <b class="fn">James Anderson</b>
                                     <span class="says">says:</span>
                                  </div>
                                  <div class="comment-metadata">
                                     <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                                     <time>April 24, 2020 at 10:59 am</time>
                                     </a>
                                  </div>
                               </footer>
                               <div class="comment-content">
                                  <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                               </div>
                               <div class="reply">
                                  <a href="<?php echo base_url('assets/payment/'); ?>#" class="comment-reply-link">Reply</a>
                               </div>
                            </article>
                         </li>
                         
                      </ol>
                      <div class="comment-respond">
                         <h3 class="comment-reply-title">Leave a Reply</h3>
                         <form class="comment-form">
                            <p class="comment-notes">
                               <span id="email-notes">Your email address will not be published.</span>
                               Required fields are marked
                               <span class="required">*</span>
                            </p>
                            <p class="comment-form-comment">
                               <label>Comment</label>
                               <textarea name="comment" id="comment" cols="45" rows="5" required="required"></textarea>
                            </p>
                            <p class="comment-form-author">
                               <label>Name <span class="required">*</span></label>
                               <input type="text" id="author" name="author" required="required">
                            </p>
                            <p class="comment-form-email">
                               <label>Email <span class="required">*</span></label>
                               <input type="email" id="email" name="email" required="required">
                            </p>
                            <p class="form-submit">
                               <input type="button" name="submit" id="submit" class="submit" value="Post A Comment">
                            </p>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-12">
                <aside class="widget-area" id="secondary">
                   <section class="widget widget_search">
                      <form class="search-form search-top">
                         <label>
                         <span class="screen-reader-text">Search for:</span>
                         <input type="search" class="search-field" placeholder="Search...">
                         </label class="">
                         <button type="submit">
                         <i class="fa fa-search"></i>
                         </button>
                      </form>
                   </section>
                   <section class="widget widget_colugo_posts_thumb">
                      <h3 class="widget-title">Popular Posts</h3>
                      
                    <?php 
                    $query_blog = $this->db->query("SELECT blog_image,created_date,title,blog_id FROM `tbl_blog` ORDER BY `tbl_blog`.`blog_id` DESC");
                    $result_blog = $query_blog->result_array();
                    foreach ($result_blog as $key => $value) {
                    ?>

                      <article class="item">
                         <a href="<?php echo base_url('uploads/'); ?><?php echo $value['blog_image']; ?>" class="thumb">
                         <img src="<?php echo base_url('uploads/'); ?><?php echo $value['blog_image']; ?>" class="img-fluid" alt="image">
                         </a>
                         <div class="info">
                            <time class="<?php echo date('M d,Y',strtotime($value['created_date'])); ?>"><?php echo date('M d,Y',strtotime($value['created_date'])); ?></time>
                            <h4 class="title usmall">
                               <a href="<?php echo base_url('blog_details/'); ?><?php echo $value['blog_id']; ?>"><?php echo $value['title']; ?></a>
                            </h4>
                         </div>
                      </article>
                      
                    <?php } ?>

                   </section>
                   <section class="widget widget_categories">
                      <h3 class="widget-title">Categories</h3>
                      <ul>
                        <?php 
                          $query_blog = $this->db->query("SELECT categories FROM `tbl_blog` ORDER BY `tbl_blog`.`blog_id` DESC");
                          $result_blog = $query_blog->result_array();
                          foreach ($result_blog as $key => $value) {
                        ?>
                         <li>
                            <a href="#"><?php echo $value['categories']; ?></a>
                         </li>
                       <?php } ?>
                      </ul>
                   </section>
                </aside>
             </div>
          </div>
       </div>
    </section>
    <!-- End Single Blog Post -->

      <!-- Footer Start -->
      <footer class="dark-footer skin-dark-footer">
        <div class="footer-bottom">
          <div class="container">
            <div class="row align-items-center">
              
              <div class="col-lg-6 col-md-6">
                <p class="mb-0">© <?php echo date('Y'); ?> ANJ PMS. Designd By <a href="<?php echo base_url('assets/payment/'); ?>https://anjwebtech.com/">ANJ Webtech Pvt Ltd</a> All Rights Reserved</p>
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
      <script src="<?php echo base_url('assets/payment/'); ?>js/popper.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/bootstrap.min.js" ></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/modernizr.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/wow.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/jquery.count.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/owl.carousel.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/parallax.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/slick.min.js"></script>
      <script src="<?php echo base_url('assets/payment/'); ?>js/custom.js"></script>

<script type="text/javascript">
  $("#submit").click(function(){
    $.ajax({
        url: '<?php echo base_url('otherPages/insert_comment'); ?>', 
        dataType: 'html',type: 'post',
        data:{blog_id:'<?php echo $result_blog['blog_id']; ?>',comment:$("#comment").val(),author:$("#author").val(),email:$("#email").val()},
        success: function (response) {
            $('#get_commentlist').html(response);
        }
    });
  });
</script>

  </body>
</html>
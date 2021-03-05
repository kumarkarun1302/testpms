<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Single Blog | ANJ PMS</title>
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
              <a class="navbar-brand" href="<?php echo base_url('assets/payment/'); ?>index.html">
                <img class="logo" src="<?php echo base_url('assets/payment/'); ?>images/index-logo.png" alt="image">
              </a>
            </nav>
          </div>
          <div class="col-lg-4 text-right">
            <ul class="login">
                <?php if(isset($_SESSION['user_details'])){ ?>
                
                <li class="d-inline "><a href="<?php echo base_url('assets/payment/'); ?><?php echo base_url('dashboard'); ?>" class="login-btn">Dashboard</a></li>

                <?php } else { ?>

                <li class="d-inline text-dark"><a href="<?php echo base_url('assets/payment/'); ?><?php echo base_url('login'); ?>" class="login-btn">Login</a></li>
                <li class="d-inline "><a href="<?php echo base_url('assets/payment/'); ?><?php echo base_url('register'); ?>" class="login-btn">Signup</a></li>

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
                   <h2>Single Blog</h2>
                   <ul>
                      <li><a href="<?php echo base_url('assets/payment/'); ?>index.html">Home</a></li>
                      <li>Single Blog</li>
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
                               <a href="<?php echo base_url('assets/payment/'); ?>index.html">September 31, 2020</a>
                            </li>
                            <li>
                               <span>Posted By:</span>
                               <a href="<?php echo base_url('assets/payment/'); ?>index.html">John Anderson</a>
                            </li>
                         </ul>
                      </div>
                      <h3>Weather Evident Smiling Bed Against</h3>
                      <p>Quuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quia non numquam eius modi tempora incidunt ut labore et dolore magnam dolor sit amet, consectetur adipisicing.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <blockquote class="wp-block-quote">
                         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                         <cite>Tom Cruise</cite>
                      </blockquote>
                      <p>Quuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quia non numquam eius modi tempora incidunt ut labore et dolore magnam dolor sit amet, consectetur adipisicing.</p>
                      <ul class="wp-block-gallery columns-3">
                         <li class="blocks-gallery-item">
                            <figure>
                               <img src="<?php echo base_url('assets/payment/'); ?>images/blog/image1.jpg" class="img-fluid" alt="image">
                            </figure>
                         </li>
                         <li class="blocks-gallery-item">
                            <figure>
                               <img src="<?php echo base_url('assets/payment/'); ?>images/blog/image2.jpg" class="img-fluid" alt="image">
                            </figure>
                         </li>
                         <li class="blocks-gallery-item">
                            <figure>
                               <img src="<?php echo base_url('assets/payment/'); ?>images/blog/image3.jpg" class="img-fluid" alt="image">
                            </figure>
                         </li>
                      </ul>
                      <h3>Four major elements that we offer:</h3>
                      <ul class="features-list">
                         <li>
                            <i class="fa fa-check"></i>
                            Scientific Skills For getting a better result
                         </li>
                         <li>
                            <i class="fa fa-check"></i>
                            Communication Skills to getting in touch
                         </li>
                         <li>
                            <i class="fa fa-check"></i>
                            A Career Overview opportunity Available
                         </li>
                         <li>
                            <i class="fa fa-check"></i>
                            A good Work Environment For work
                         </li>
                      </ul>
                      <h3>Setting the mood with incense</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <h3>The Rise Of Marketing And Why You Need It</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                   </div>
                   <div class="article-footer">
                      <div class="article-tags">
                         <span>
                         <i class="fa fa-bookmark"></i>
                         </span>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">Fashion</a>,
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">Travel</a>
                      </div>
                      <div class="article-share">
                         <ul class="social">
                            <li><span>Share:</span></li>
                            <li>
                               <a href="<?php echo base_url('assets/payment/'); ?>#" target="_blank">
                               <i class="fab fa-facebook-f"></i>
                               </a>
                            </li>
                            <li>
                               <a href="<?php echo base_url('assets/payment/'); ?>#" target="_blank">
                               <i class="fab fa-twitter"></i>
                               </a>
                            </li>
                            <li>
                               <a href="<?php echo base_url('assets/payment/'); ?>#" target="_blank">
                               <i class="fab fa-instagram"></i>
                               </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <div class="post-navigation">
                      <div class="navigation-links">
                         <div class="nav-previous">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                            <i class="flaticon-left"></i>
                            Prev Post
                            </a>
                         </div>
                         <div class="nav-next">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                            Next Post
                            <i class="flaticon-right"></i>
                            </a>
                         </div>
                      </div>
                   </div>
                   <div class="comments-area">
                      <h3 class="comments-title">4 Comments:</h3>
                      <ol class="comment-list">
                         <li class="comment">
                            <article class="comment-body">
                               <footer class="comment-meta">
                                  <div class="comment-author vcard">
                                     <img src="<?php echo base_url('assets/payment/'); ?>images/client/1.jpg" class="avatar img-fluid" alt="image">
                                     <b class="fn">John Jones</b>
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
                            <ol class="children">
                               <li class="comment">
                                  <article class="comment-body">
                                     <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                           <img src="<?php echo base_url('assets/payment/'); ?>images/client/2.jpg" class="avatar img-fluid" alt="image">
                                           <b class="fn">Steven Smith</b>
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
                               <ol class="children">
                                  <li class="comment">
                                     <article class="comment-body">
                                        <footer class="comment-meta">
                                           <div class="comment-author vcard">
                                              <img src="<?php echo base_url('assets/payment/'); ?>images/client/3.jpg" class="avatar img-fluid" alt="image">
                                              <b class="fn">Sarah Taylor</b>
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
                            </ol>
                         </li>
                         <li class="comment">
                         <li class="comment">
                            <article class="comment-body">
                               <footer class="comment-meta">
                                  <div class="comment-author vcard">
                                     <img src="<?php echo base_url('assets/payment/'); ?>images/client/4.jpg" class="avatar img-fluid" alt="image">
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
                               <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                            </p>
                            <p class="comment-form-author">
                               <label>Name <span class="required">*</span></label>
                               <input type="text" id="author" name="author" required="required">
                            </p>
                            <p class="comment-form-email">
                               <label>Email <span class="required">*</span></label>
                               <input type="email" id="email" name="email" required="required">
                            </p>
                            <p class="comment-form-url">
                               <label>Website</label>
                               <input type="url" id="url" name="url">
                            </p>
                            <p class="form-submit">
                               <input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
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
                      <article class="item">
                         <a href="<?php echo base_url('assets/payment/'); ?>#" class="thumb">
                         <span class="fullimage cover bg1" role="img"></span>
                         </a>
                         <div class="info">
                            <time class="2020-06-30">June 10, 2020</time>
                            <h4 class="title usmall">
                               <a href="<?php echo base_url('assets/payment/'); ?>index.html">Making Peace With The Feast Or Famine Of Freelancing</a>
                            </h4>
                         </div>
                      </article>
                      <article class="item">
                         <a href="<?php echo base_url('assets/payment/'); ?>#" class="thumb">
                         <span class="fullimage cover bg2" role="img"></span>
                         </a>
                         <div class="info">
                            <time class="2020-06-30">June 21, 2020</time>
                            <h4 class="title usmall">
                               <a href="<?php echo base_url('assets/payment/'); ?>index.html">Be healthy, Enjoy life with Trifles organic</a>
                            </h4>
                         </div>
                      </article>
                      <article class="item">
                         <a href="<?php echo base_url('assets/payment/'); ?>#" class="thumb">
                         <span class="fullimage cover bg3" role="img"></span>
                         </a>
                         <div class="info">
                            <time class="2020-06-30">June 30, 2020</time>
                            <h4 class="title usmall">
                               <a href="<?php echo base_url('assets/payment/'); ?>index.html">Buy organic food online and be healthy</a>
                            </h4>
                         </div>
                      </article>
                   </section>
                   <section class="widget widget_categories">
                      <h3 class="widget-title">Categories</h3>
                      <ul>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Business</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Privacy</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Technology</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Tips</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Uncategorized</a>
                         </li>
                      </ul>
                   </section>
                   <section class="widget widget_recent_comments">
                      <h3 class="widget-title">Recent Comments</h3>
                      <ul>
                         <li>
                            <span class="comment-author-link">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">A WordPress Commenter</a>
                            </span>
                            on
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Hello world!</a>
                         </li>
                         <li>
                            <span class="comment-author-link">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Colugo</a>
                            </span>
                            on
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Hello world!</a>
                         </li>
                         <li>
                            <span class="comment-author-link">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Wordpress</a>
                            </span>
                            on
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Hello world!</a>
                         </li>
                         <li>
                            <span class="comment-author-link">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">A WordPress Commenter</a>
                            </span>
                            on
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Hello world!</a>
                         </li>
                         <li>
                            <span class="comment-author-link">
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Colugo</a>
                            </span>
                            on
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Hello world!</a>
                         </li>
                      </ul>
                   </section>
                   <section class="widget widget_recent_entries">
                      <h3 class="widget-title">Recent Posts</h3>
                      <ul>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">How to Become a Successful Entry Level UX Designer</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">How to start your business as an entrepreneur</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">How to be a successful entrepreneur</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">10 Building Mobile Apps With Ionic And React</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Protect your workplace from cyber attacks</a>
                         </li>
                      </ul>
                   </section>
                   <section class="widget widget_meta">
                      <h3 class="widget-title">Meta</h3>
                      <ul>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Log in</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Entries
                            <abbr title="Really Simple Syndication">RSS</abbr>
                            </a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">Comments
                            <abbr title="Really Simple Syndication">RSS</abbr>
                            </a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">WordPress.org</a>
                         </li>
                      </ul>
                   </section>
                   <section class="widget widget_archive">
                      <h3 class="widget-title">Archives</h3>
                      <ul>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">May 2020</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">April 2020</a>
                         </li>
                         <li>
                            <a href="<?php echo base_url('assets/payment/'); ?>index.html">June 2020</a>
                         </li>
                      </ul>
                   </section>
                   <section class="widget widget_tag_cloud">
                      <h3 class="widget-title">Tags</h3>
                      <div class="tagcloud section-bottom">
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         IT
                         <span class="tag-link-count"> (3)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Fria
                         <span class="tag-link-count"> (3)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Games
                         <span class="tag-link-count"> (2)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Fashion
                         <span class="tag-link-count"> (2)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Travel
                         <span class="tag-link-count"> (1)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Smart
                         <span class="tag-link-count"> (1)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Marketing
                         <span class="tag-link-count"> (1)</span>
                         </a>
                         <a href="<?php echo base_url('assets/payment/'); ?>index.html">
                         Tips
                         <span class="tag-link-count"> (2)</span>
                         </a>
                      </div>
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
                <p class="mb-0">© 2021 ANJ PMS. Designd By <a href="<?php echo base_url('assets/payment/'); ?>https://anjwebtech.com/">ANJ Webtech Pvt Ltd</a> All Rights Reserved</p>
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
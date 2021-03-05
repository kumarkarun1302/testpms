<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Payment Option | ANJ PMS</title>
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
      <link rel="stylesheet" href="<?php echo base_url('assets/payment/'); ?>css/payment-method.css">

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
   </head>
   <body class="index">
      <!-- Start Header -->
      <header id="header" class="home">
         <div class="container">
           <div class="row align-items-center">
             <div class="col-lg-8">
               <nav class="navbar navbar-expand-lg navbar-light">
                 <a class="navbar-brand" href="index.html">
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

      <!-- Start Payment Method -->
      <section class="choosePlanPaymentMethod">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                  <div class="choosePlanPaymentHeading">
                     <h3></h3>
                  </div>
               </div>
            </div>
            <?php $p1 = $this->session->userdata('price');
            $p2 = $this->session->userdata('price_tax'); ?>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto p-0 payment-method-bg">
                  <div class="packagePaymentProcess">
                     <div class="pricingCost">
                        <h6 class="untax-heading">Amount:</h6>
                        <h6 class="untax-priceNo">$ <?php echo $this->session->userdata('price'); ?></h6>
                     </div>
                     <div class="pricingCost">
                        <h6 class="additionalTaxheading">Additional Tax:</h6>
                        <h6 class="additionalTaxpriceNo">$ <?php echo $this->session->userdata('price_tax'); ?></h6>
                     </div>
                     <div class="pricingCost">
                        <h6 class="totalPriceheading">Total:</h6>
                        <h6 class="totalpriceNo">$ <?php echo intval($p1) + $p2; ?></h6>
                     </div>
                     <div class="card mb-0">
                        <div class="card-header">
                           <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                              <!-- Stripe and Paypal form tabs -->
                              <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                 <li class="nav-item"> 
                                    <a data-toggle="pill" href="#stripe" class="nav-link active "> 
                                       <i class="fab fa-cc-stripe"></i> Stripe 
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a data-toggle="pill" href="#paypal" class="nav-link "> 
                                       <i class="fab fa-paypal mr-2"></i> Paypal 
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- End -->
                           <!-- Stripe and Paypal form content -->
                           <div class="tab-content">
                              <!-- stripe info-->
                              <div id="stripe" class="tab-pane fade show active pt-3">
                                 <p> <a href="<?php echo base_url('stripe_payment'); ?>" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Payment Now</a> </p>
                                 <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                              </div>
                              <!-- End -->
                              <!-- Paypal info -->
                              <div id="paypal" class="tab-pane fade pt-3">
                                 <!-- <h6 class="pb-2">Select your paypal account type</h6>
                                 <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked>Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div> -->

                                 <p> 

                                  <a href="<?php echo base_url().'productstwo/buy/1'; ?>" class="btn btn-primary ">
                                       <i class="fab fa-paypal mr-2"></i> Log into my Paypal
                                  </a>
                                  
                                  <!-- <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button>  -->

                                </p>

                                 <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                              </div>
                              <!-- End -->
                              <!-- bank transfer info -->
                              <!-- End -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Payment Method -->

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
          </div>
        </div>
      </footer>
   </body>
</html>
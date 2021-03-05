<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Stripe Payment Method | ANJ PMS</title>
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

   <script src="https://js.stripe.com/v2/"></script>
   <script>
   // Set your publishable key
   Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

   // Callback to handle the response from stripe
   function stripeResponseHandler(status, response) {
       if (response.error) {
           // Enable the submit button
           $('#payBtn').removeAttr("disabled");
           // Display the errors on the form
           $(".card-errors").html('<p>'+response.error.message+'</p>');
       } else {
           var form$ = $("#paymentFrm");
           // Get token id
           var token = response.id;
           // Insert the token into the form
           form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
           // Submit form to the server
           form$.get(0).submit();
       }
   }

   $(document).ready(function() {
       // On form submit
       $("#paymentFrm").submit(function() {
           // Disable the submit button to prevent repeated clicks
           $('#payBtn').attr("disabled", "disabled");
           
           // Create single-use token to charge the user
           Stripe.createToken({
               number: $('#card_number').val(),
               exp_month: $('#card_exp_month').val(),
               exp_year: $('#card_exp_year').val(),
               cvc: $('#card_cvc').val()
           }, stripeResponseHandler);
           
           // Submit from callback
           return false;
       });
   });
   </script>

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
                              </ul>
                           </div>
                           <!-- End -->
                           <!-- Stripe and Paypal form content -->
                           <div class="tab-content">
                              <!-- stripe info-->
                              <div id="stripe" class="tab-pane fade show active pt-3">
                                 <form role="form" action="" method="POST" id="paymentFrm">
                                    <div class="form-group">
                                       <label for="name">
                                          <h6>Card Owner</h6>
                                       </label>
                                       <input type="text" name="name" id="name" placeholder="Card Owner Name" required class="form-control "> 
                                    </div>
                                    <div class="form-group">
                                       <label for="email">
                                          <h6>Card Email</h6>
                                       </label>
                                       <input type="email" name="email" id="email" placeholder="Card Owner Email" required class="form-control "> 
                                    </div>
                                    <div class="form-group">
                                       <label for="card_number">
                                          <h6>Card number</h6>
                                       </label>
                                       <div class="input-group">
                                          <input type="text" name="card_number" id="card_number" placeholder="Valid card number" class="form-control " required>
                                          <div class="input-group-append"> 
                                             <span class="input-group-text text-muted"> 
                                             <i class="fab fa-cc-visa mx-1"></i> 
                                             <i class="fab fa-cc-mastercard mx-1"></i> 
                                             <i class="fab fa-cc-amex mx-1"></i> 
                                             </span> 
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-8">
                                          <div class="form-group">
                                             <label>
                                                <span class="hidden-xs">
                                                   <h6>Expiration Date</h6>
                                                </span>
                                             </label>
                                             <div class="input-group"> <input type="number" placeholder="MM" name="card_exp_month" id="card_exp_month" class="form-control" required> <input type="number" placeholder="YY" name="card_exp_year" id="card_exp_year" class="form-control" required> </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-4">
                                          <div class="form-group mb-4">
                                             <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                             </label>
                                             <input type="text" required class="form-control" name="card_cvc" id="card_cvc"> 
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm" id="payBtn"> Confirm Payment </button>
                                 </form>
                                 </div>
                              </div>
                              <!-- End -->
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
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
                  <!-- Begin Thank You Content -->
                  <section class="thank_you_section">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="thankyouContent">
                            

<?php
$price_hide=$this->session->userdata('price_hide');
$query_tbl_pricemonth = $this->db->query("SELECT file_sharing_storage,max_file_size_upload FROM `tbl_price` where price_hide='$price_hide'");
$result_tbl_pricemonth = $query_tbl_pricemonth->row_array();
$file_sharing_storage = $result_tbl_pricemonth['file_sharing_storage'];
$max_file_size_upload = $result_tbl_pricemonth['max_file_size_upload'];
$month_year=$this->session->userdata('month_year');
$package_date=$this->session->userdata('package_date');
$month_count=$this->session->userdata('month_count');
$plan_packages=$this->session->userdata('plan_packages');
$total_user_support = $this->session->userdata('total_user_support');
if($this->session->userdata('upgrademdr')=='yes'){
    upgrade_plan_mdr(getProfileName('email'),$payment_state,$subtotal);
} else if($this->session->userdata('upgrademdr')=='no'){
    $supayResponse = getResponse($this->session->userdata('user_id_payment'));
    $user_data = array(
        'user_id'=>$this->session->userdata('user_id_payment'),
        'username' => $supayResponse['username'],
        'email' => $supayResponse['email'],
        'user_type' => $supayResponse['user_type'],
        'slug_username' =>slugify($supayResponse['username']), 
        'main_merge_account'=>$supayResponse['merge_account'],
        'merge_account_userID'=>$supayResponse['user_id']);
    $this->session->set_userdata('user_details', $user_data);
}
$this->db->query("UPDATE `tbl_users` SET paymentyesnot='0',month_year='$month_year',package_date='$package_date',month_count='$month_count',plan_packages='$plan_packages',total_user_support='$total_user_support' where user_id='$user_id_payment'");
?>


                            <div class="imgIcon">
                              <img src="<?php echo base_url('assets/payment/'); ?>images/thankyou-icon.png" class="img-fluid" alt="Thank You Icon">
                            </div>
                            <div class="heading">
                              <h2>Thank You <strong>For Ordering ANJ PMS Package From Payment Method</strong></h2>
                            </div>
                            <div class="desc">

                            <?php if($order['payment_status'] == 'succeeded'){ ?>
                                <h3 class="success">Your Payment has been Successful!</h3>
                            <?php }else{ ?>
                                <h3 class="error">The transaction was successful! But your payment has been failed!</h3>
                            <?php } ?>

                              <h4>Payment Information</h4>
                              <p>Transaction ID: <span class="paymentValue"><?php echo $txn_id; ?></span></p>
                              <p>Paid Amount: <span class="packageNameValue">$ <?php echo $payment_amt.' '.$currency_code; ?></span></p>
                              <p>Payment Status: <span class="packageNameValue"><?php echo $status; ?></span></p>
                            
                            </div>

                            <div class="backToDashboard">
                              <a href="<?php echo base_url('dashboard'); ?>" class="dashboardBtn">Back To Dashboard</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- End Thank You Content -->
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

      <style type="text/css">
        .thank_you_section .thankyouContent {
background-color: #fff;
box-shadow: 0px 0px 15px 0px rgb(0, 0, 0, 11%);
border-radius: 10px;
transform: rotate(0deg);
padding: 54px 40px 50px;
text-align: center;
}
.thankyouContent .heading h2 {
line-height: normal;
font-size: 40px;
color: #1d3d71;
}
.thankyouContent .heading h2 strong {
display: block;
font-size: 20px;
font-weight: 700;
}
.thankyouContent .imgIcon {
margin-bottom: 15px;
}

.thankyouContent .desc {
margin-top: 15px;
margin-bottom: 15px;
text-align: left;
}

.thankyouContent .desc p {
margin-bottom: 0;
font-size: 18px;
line-height: normal;
font-weight: bold;
color: #000;
}

.thankyouContent .desc p span {
font-weight: 400;
}
.backToDashboard {
padding-top: 20px;
display: block;
}
.backToDashboard .dashboardBtn {
background: #218dcb;
color: #fff;
padding: 10px 20px;
border-radius: 5px;
}
.backToDashboard .dashboardBtn:hover{
background: #1d3d71;
}

      </style>
   </body>
</html>
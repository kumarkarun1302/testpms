<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reset Password to ANJPMS | Project Management and Collaboration Software</title>
    <meta name="description" content="Sign up free to ANJPMS project management and collaboration software. More productive features to simplify your project management work." />
    <meta name="keywords" content="Project Collaboration Software, Project Collaboration Tool, Project Management Software, Project Management Tool, Task Management Software, Task Management Tool, Time Tracking Software, enterprise collaboration software, Project Management and Collaboration Software."/>
    <meta property="og:type" content="Website" />
    <meta property="og:site_name" content="ANJPMS" />
    <meta property="og:title" content="Reset Password to ANJPMS | Project Management and Collaboration Software" />
    <meta property="og:description" content="Reset Password to ANJPMS project management and collaboration software. More productive features to simplify your project management work."/>
    <meta property="og:image" content="<?php echo base_url('assets/images/logo.png'); ?>" />
    <link rel="image_src" href="<?php echo base_url('assets/images/logo.png'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/responsive.css">
</head>

<body>
         
    <section class="lrf-animation-layout lrf-common-layout">  
        
        <div class="lrf-content">     
        <a href="<?php echo base_url(); ?>" class="lrf-logo"><img src="<?php echo base_url('assets/'); ?>images/logo.png" alt="ANJ PMS Logo"></a>                     
            <div class="lrf-form"> 
                <div class="lrf-transformY-50 lrf-transition-delay-1">
                    <p>Reset Your Password</p>
                </div>
                <?php if($this->session->flashdata('warning')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?=$this->session->flashdata('warning')?>
                </div>
                <?php endif; ?>

                <div id="form_resetPassword" class="alert hidden" role="alert" style="display: none;"></div>
                <!-- <form id="resetPassword-form" action="<?php //echo base_url('login/reset_password/'.$reset_code); ?>" method="post"> -->
                    <div class="form-group">  
                        <div class="lrf-transformY-50 lrf-transition-delay-2">                            <input id="password" type="password" class="form-control" name="password" placeholder="New Password" required="required">
                            <input type="hidden" name="reset_code" id="reset_code" value="<?php echo $reset_code; ?>">
                            <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction()"></i>
                        </div>
                    </div>
                    <div class="form-group">  
                        <div class="lrf-transformY-50 lrf-transition-delay-3">
                            <input id="confirmpassword" type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                            <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction1()"></i>
                            <span id='message'></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="lrf-transformY-50 lrf-transition-delay-4">
                             <!-- <input type="submit" name="submit" class="lrf-btn-fill" value="Submit"> -->
                             <button type="submit" class="lrf-btn-fill" onclick="resetpassword()">Save</button>
                        </div>
                    </div>
               <!--  </form>   -->              
            </div>
        </div>
    </section>    
    <!-- jquery-->
    <script src="<?php echo base_url('assets/'); ?>js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?php echo base_url('assets/'); ?>js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?php echo base_url('assets/'); ?>js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
    </script>
    <script type="text/javascript">
        function resetpassword(){
            $(".error").hide();
            var hasError = false;
            var password = $("#password").val();
            var confirm_password = $("#confirmpassword").val();
            var reset_code = '<?php echo $reset_code; ?>';
            if (password == '') {
                $("#password").after('<span class="error text-danger"><em>Please enter a password.</em></span>');
                hasError = true;
            } else if (confirm_password == '') {
                $("#confirmpassword").after('<span class="error text-danger"><em>Please re-enter your password.</em></span>');
                hasError = true;
            } else if (password != confirm_password) {
                $("#confirmpassword").after('<span class="error text-danger"><em>Passwords do not match.</em></span>');
                hasError = true;
            }
            if (hasError == true) {
               return false;
            }
            if (hasError == false) {
              $.ajax({
                url: '<?php echo base_url('login/reset_passwordist'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { reset_code:reset_code, password:password, confirm_password:confirm_password},
                success: function(response){
                  console.log(response)
                  $('#form_resetPassword').show();

                  if (response.code === 1)
                  {
                      $("#form_resetPassword").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response.msg);
                      window.location.href = "<?php echo base_url('login'); ?>";
                  } else {
                      $("#form_resetPassword").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response.msg);
                      $(".alert-success").html(response.msg);
                      window.location.href = "<?php echo base_url('login'); ?>";
                  }
                }
              });
            }
        }

        
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        function myFunction1() {
          var x = document.getElementById("confirmpassword");
          
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
</body>

</html>
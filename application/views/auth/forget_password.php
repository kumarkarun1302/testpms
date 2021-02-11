<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forgot Password to ANJPMS | Project Management and Collaboration Software</title>
    <meta name="description" content="Sign up free to ANJPMS project management and collaboration software. More productive features to simplify your project management work." />
    <meta name="keywords" content="Project Collaboration Software, Project Collaboration Tool, Project Management Software, Project Management Tool, Task Management Software, Task Management Tool, Time Tracking Software, enterprise collaboration software, Project Management and Collaboration Software"/>
    <meta property="og:type" content="Website" />
    <meta property="og:site_name" content="ANJPMS" />
    <meta property="og:title" content="Forgot Password to ANJPMS | Project Management and Collaboration Software" />
    <meta property="og:description" content="Forgot Password to ANJPMS project management and collaboration software. More productive features to simplify your project management work."/>
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
            <div class="lrf-form" id="forgotPage"> 
                <div class="lrf-transformY-50 lrf-transition-delay-1">
                    <p>We'll send a recovery link to</p>
                </div>
                <?php if(validation_errors() !== ''): ?>
                      <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                          <?= validation_errors();?>
                          <?= isset($msg)? $msg: ''; ?>
                      </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('success')?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('warning')): ?>
                        <div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('warning')?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('error')?>
                        </div>
                    <?php endif; ?>
        <div id="forgotpasswordMsg" class="alert hidden" role="alert" style="display: none;"></div>

            <form method="POST" action="<?php echo base_url('login/forgot_passwordinsert'); ?>"> 
                    <div class="form-group">                                                
                        <div class="lrf-transformY-50 lrf-transition-delay-2">
                            <input type="email" class="form-control" id="email" name="email" placeholder="xxx@gmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="lrf-transformY-50 lrf-transition-delay-3">
                            <input type="submit" name="submit" id="submit" class="lrf-btn-fill" value="Send Me Email">
                            <!-- <button type="submit" class="lrf-btn-fill" onclick="sendmeemail()">Send Me Email</button> -->
                        </div>
                    </div>
              </form>            
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
    <script type="text/javascript">
        function sendmeemail(){
            $(".error").hide();
            var hasError = false;
            var email = $("#email").val();
            if (email == '') {
                $("#email").after('<span class="error text-danger"><em>Please enter your email.</em></span>');
                hasError = true;
            } 
            if (hasError == true) {
               return false;
            }
            if (hasError == false) {
              $.ajax({
                url: '<?php echo base_url('login/forgot_passwordinsert'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { email:email},
                success: function(response){
                  console.log(response)
                  $('#forgotpasswordMsg').show();
                  if (response.code === 1) {
                      $("#forgotpasswordMsg").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response.msg);
                  } else {
                      $("#forgotpasswordMsg").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response.msg);
                      $(".alert-success").html(response.msg);
                      window.location.href = "<?php echo base_url('login'); ?>";
                  }
                }
              });
            }
        }
    </script>
</body>

</html>
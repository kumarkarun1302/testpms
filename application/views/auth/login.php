<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Log in to ANJPMS | Project Management and Collaboration Software</title>
    <meta name="description" content="Sign up free to ANJPMS project management and collaboration software. More productive features to simplify your project management work." />
    <meta name="keywords" content="Project Collaboration Software, Project Collaboration Tool, Project Management Software, Project Management Tool, Task Management Software, Task Management Tool, Time Tracking Software, enterprise collaboration software, Project Management and Collaboration Software, sign up free, free sign up, sign up free to ANJPMS."/>
    <meta property="og:type" content="Website" />
    <meta property="og:site_name" content="ANJPMS" />
    <meta property="og:title" content="Free Sign Up to ANJPMS | Project Management and Collaboration Software" />
    <meta property="og:description" content="Sign up free to ANJPMS project management and collaboration software. More productive features to simplify your project management work."/>
    <meta property="og:image" content="<?php echo base_url('assets/images/logo.png'); ?>" />
    <link rel="image_src" href="<?php echo base_url('assets/images/logo.png'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/responsive.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <section class="lrf-animation-layout lrf-common-layout">  
        <div class="lrf-content">
            <a href="<?php echo base_url(); ?>" class="lrf-logo"><img src="<?php echo base_url('assets/'); ?>images/logo.png" alt="ANJ PMS Logo"></a>  
            <div class="lrf-header">
                 
<ul class="lrf-switcher-wrap">

<?php  if($projectID) {  ?> 

<li><a href="<?php echo base_url('returnUrllogin/'); ?><?php  echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id; ?>" class="switcher-text active">Login</a></li>

<li><a href="<?php echo base_url('register'); ?><?php echo '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id; ?>" class="switcher-text">Register</a></li>

<?php } else { ?>

<li><a href="<?php echo base_url('login'); ?>" class="switcher-text active">Login</a></li>

<li><a href="<?php echo base_url('register'); ?>" class="switcher-text">Register</a></li>

<?php } ?>

</ul>
            </div>                            
            <div class="lrf-form"> 
                <div class="lrf-transformY-50 lrf-transition-delay-1">
                    <p>Login into your account</p>
                </div>

                <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                      <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                      <?=$this->session->flashdata('error')?>
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('success')): ?>
                      <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?=$this->session->flashdata('success')?>
                      </div>
                <?php endif; ?>
                <div class="error">
                    <strong><?=$this->session->flashdata('flashSuccess')?></strong>
                </div>

                <div id="loginError" class="alert hidden" role="alert" style="display: none;"></div>
<form method="POST" action="<?php echo base_url('login/login'); ?>"> 
                    <div class="form-group"> 
                        <div class="lrf-transformY-50 lrf-transition-delay-2"> 
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="text" id="username" class="form-control" name="username" placeholder="Email" value="<?php if(isset($_SESSION['joinEmail'])) { echo $this->session->userdata('joinEmail'); } ?>">

<input type="hidden" name="projectID" id="projectID" value="<?php echo $projectID; ?>">
<input type="hidden" name="projectNAME" id="projectNAME" value="<?php echo $projectNAME; ?>">
<input type="hidden" name="projectASSIGN" id="projectASSIGN" value="<?php echo $projectASSIGN; ?>">
<input type="hidden" name="projectMain_user_id" id="projectMain_user_id" value="<?php echo $projectMain_user_id; ?>">
<input type="hidden" name="projectCombo_id" id="projectCombo_id" value="<?php echo $projectCombo_id; ?>">

                        </div>
                    </div>
                    <div class="form-group">  
                        <div class="lrf-transformY-50 lrf-transition-delay-3">
                            <input id="password" type="password" class="form-control" name="password" placeholder="********">
                            <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction()"></i>
                        </div>
                    </div>

                    <!-- <div class="form-group"> 
                        <div class="lrf-transformY-50 lrf-transition-delay-3">
                            <div class="g-recaptcha" data-sitekey="<?php //echo $this->config->item('google_key') ?>">
                            </div>
                        </div> 
                    </div> -->


                    <div class="form-group">
                        <div class="lrf-transformY-50 lrf-transition-delay-4">
                            <div class="lrf-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" checked="checked">
                                    <label for="checkbox1">Keep me logged in</label>
                                </div>
                                <a href="<?php echo base_url('forget_password'); ?>" class="switcher-text">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="lrf-transformY-50 lrf-transition-delay-5">
                            <!-- <button type="submit" class="lrf-btn-fill w-100 d-block" onclick="login()">Log in</button> -->
                            <input type="submit" name="submit" id="submit" class="lrf-btn-fill w-100 d-block" value="Log in">
                        </div>
                    </div>
                </form>
            </div> 
            <div class="lrf-style-line"> 
                <div class="lrf-transformY-50 lrf-transition-delay-6">                                
                    <h3>Or Login With</h3> 
                </div>
            </div>
            <ul class="lrf-socials">
                <li class="lrf-facebook lrf-transformY-50 lrf-transition-delay-7">
                    <a href="<?php if(!empty($fburl)) echo $fburl;?>" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="lrf-google lrf-transformY-50 lrf-transition-delay-8">
                    <a href="<?php if(!empty($google_login_url)) echo $google_login_url;?>" title="google"><i class="fab fa-google-plus-g"></i></a>
                </li>
            </ul>
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
        // (function() {
        //     if (!localStorage.getItem('cookieconsent')) {
        //         document.body.innerHTML += '\
        //         <div class="cookieconsent" style="position:fixed;padding:50px;left:0;bottom:0;background-color:#eee;color:#000;text-align:left;width:100%;z-index:99999;">\
        //             <span style="text-align:left;">This site uses cookies. By continuing to use this website, you agree to their use.</span> \
        //            <a href="#" style="color:#000;float:right;"><b>OK</b></a>\
        //         </div>\
        //         ';
        //         document.querySelector('.cookieconsent a').onclick = function(e) {
        //             e.preventDefault();
        //             document.querySelector('.cookieconsent').style.display = 'none';
        //             localStorage.setItem('cookieconsent', true);
        //         };
        //     }
        // })();
         function login(){
            $(".error").hide();
            var hasError = false;
            var password = $("#password").val();
            var username = $("#username").val();
            if (username == '') {
                $("#username").after('<span class="error text-danger"><em>Please enter a email.</em></span>');
                hasError = true;
            } else if (password == '') {
                $("#password").after('<span class="error text-danger"><em>Please enter your password.</em></span>');
                hasError = true;
            } 
            if (hasError == true) {
               return false;
            }
            if (hasError == false) {
              $.ajax({
                url: '<?php echo base_url('login/login'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { username:username, password:password, projectASSIGN:$("#projectASSIGN").val(),projectID:$("#projectID").val(),projectNAME:$("#projectNAME").val(),projectMain_user_id:$("#projectMain_user_id").val()},
                success: function(response){
                  console.log(response)
                  $('#loginError').show();
                  if (response.code === 1) {
                      $("#loginError").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response.msg);
                  } else {
                      $("#loginError").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response.msg);
                      $(".alert-success").html(response.msg);
                      if (response.code === 2) {
                         window.location.href = "<?php echo base_url('admin'); ?>";
                      } else if (response.code === 3) {
                         window.location.href = "<?php echo base_url('dashboard/'); ?><?php  echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id; ?>";
                      }
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
    </script>
</body>
</html>
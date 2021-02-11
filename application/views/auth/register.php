<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Create a ANJPMS Account | Project Management and Collaboration Software</title>

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
</head>

<body>
        
    <section class="lrf-animation-layout lrf-common-layout">
        <div class="lrf-content">
            <a href="<?php echo base_url(); ?>" class="lrf-logo">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="ANJ PMS Logo"></a>  
            <div class="lrf-header">
                <ul class="lrf-switcher-wrap">

<?php  if($projectID) {  ?> 

<li><a href="<?php echo base_url('returnUrllogin/'); ?><?php  echo $projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id; ?>" class="switcher-text">Login</a></li>

<li><a href="<?php echo base_url('register'); ?><?php echo '/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id; ?>" class="switcher-text active">Register</a></li>

<?php } else { ?>

<li><a href="<?php echo base_url('login'); ?>" class="switcher-text">Login</a></li>

<li><a href="<?php echo base_url('register'); ?>" class="switcher-text active">Register</a></li>

<?php } ?>

                </ul>
            </div>                            
            <div class="lrf-form" id="registerPage"> 
                <div class="lrf-transformY-50 lrf-transition-delay-1">
                    <p>Create an account</p>
                </div>
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <!-- <i class="icon fa fa-danger"></i>  -->
                      <?= validation_errors();?>
                      <?= isset($msg)? $msg: ''; ?>
                  </div>
                  <?php endif; ?>

                  <?php $registerData= $this->session->userdata('registerData'); ?>
<div id="form_resetPassword" class="alert hidden" role="alert" style="display: none;"></div>

        <form method="POST" action="<?php echo base_url('login/registerInsert'); ?>" autocomplete="off"> 
            
            <div class="form-group">                                                
                <div class="lrf-transformY-50 lrf-transition-delay-2">
                    <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Full Name" autocomplete="off" value="<?php echo $registerData['first_name']; ?>">
                </div>
            </div>

            <div class="form-group">                                                
                <div class="lrf-transformY-50 lrf-transition-delay-2">
                    <input type="text" id="username" class="form-control" name="username" placeholder="User Name" autocomplete="off" value="<?php echo $registerData['username']; ?>">
                    <span class="error_message errormsgusername" style="display: none;color: red;">Please Enter User Name.</span>
                </div>
            </div>

            <div class="form-group">                                                
                <div class="lrf-transformY-50 lrf-transition-delay-3">
    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php if(isset($_SESSION['joinEmail'])) { echo $this->session->userdata('joinEmail'); } ?>">

<input type="hidden" name="projectID" id="projectID" value="<?php echo $projectID; ?>">
<input type="hidden" name="projectNAME" id="projectNAME" value="<?php echo $projectNAME; ?>">
<input type="hidden" name="projectASSIGN" id="projectASSIGN" value="<?php echo $projectASSIGN; ?>">
<input type="hidden" name="projectMain_user_id" id="projectMain_user_id" value="<?php echo $projectMain_user_id; ?>">
<input type="hidden" name="projectCombo_id" id="projectCombo_id" value="<?php echo $projectCombo_id; ?>">

                </div>
            </div>

<div class="form-group">                                                
    <div class="lrf-transformY-50 lrf-transition-delay-5">
        <select class="custom-select mr-sm-2" name="user_type" id="user_type">
            <option value="">Select Country Code</option>
            <?php foreach (getDropDownList('tbl_country','phonecode,country','country','ASC') as $val) { 
                if($val["phonecode"]=='91'){ $selected = 'selected'; } else { $selected = ''; }?>
<option value="<?php echo $val["phonecode"]; ?>" <?php echo $selected; ?>>
    <?php echo '(+'.$val["phonecode"].') '.$val["country"]; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-4">
                    <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter a phone number" value="<?php echo $registerData['mobile_no']; ?>">
                </div>
            </div>
            
            <div class="form-group">                                                
                <div class="lrf-transformY-50 lrf-transition-delay-5">
                    <select class="custom-select mr-sm-2" name="user_type" id="user_type">
                        <option value="">Select Type</option>
                        <?php foreach (getDropDownList('tbl_user_type','user_type,user_type_id','user_type_id','DESC') as $val) { ?>
                              <option value="<?php echo $val["user_type_id"]; ?>"><?php echo $val["user_type"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">                                                
                <div class="lrf-transformY-50 lrf-transition-delay-5">
                    <input id="password" type="password" class="form-control" name="password" placeholder="********" onkeyup="checksPassword(this.value)"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction()"></i>
                    <span class="error_message spassword_error" style="display: none;color: red;">Enter minimum 8 chars with atleast 1 number, lower, upper &amp; special(@#$%&!-_&amp;) char.</span>

                </div>
            </div>

            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-6">
                    <div class="lrf-checkbox-area mb-0">
                        <div class="checkbox mb-0">
                            <input id="checkbox1" type="checkbox" checked="checked">
                            <label for="checkbox1">By clicking Register, you confirm that you've read and accepted our <a href="https://anjwebtech.com/join-our-new-opportunity/">Terms of Service</a> and <a href="https://anjwebtech.com/join-our-new-opportunity/">Privacy Policy</a>.</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="lrf-transformY-50 lrf-transition-delay-7">
                    <input type="submit" name="submit" id="submit" class="lrf-btn-fill d-block w-100" value="Register" onclick="return validateRegister()">
                </div>
            </div>
    </form>              
            </div> 
            <div class="lrf-style-line"> 
                <div class="lrf-transformY-50 lrf-transition-delay-8">                                
                    <h3>Or Register With</h3> 
                </div>
            </div>
            <ul class="lrf-socials">
                <li class="lrf-facebook lrf-transformY-50 lrf-transition-delay-9">
                    <a href="<?php if(!empty($fburl)) echo $fburl;?>" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="lrf-google lrf-transformY-50 lrf-transition-delay-10">
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
        function checksPassword(password){
            var pattern = /^.*(?=.{8,20})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&!-_]).*$/;
            if(!pattern.test(password)) {
                $(".spassword_error").show();
            } else {
                $(".spassword_error").hide();
            }
        }

        function validateRegister()
        {
            if($("#username").val()==''){
                $("#username").focus();
                $(".errormsgusername").show();
                return false;
            } else {
                $(".errormsgusername").hide();
            }
        }

        function register(){
            $(".error").hide();
            var hasError = false;
            var password = $("#password").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var mobile_no = $("#mobile_no").val();
            if (username == '') {
                $("#username").after('<span class="error text-danger"><em>Please enter username.</em></span>');
                hasError = true;
            } else if (email == '') {
                $("#email").after('<span class="error text-danger"><em>Please email.</em></span>');
                hasError = true;
            } else if (mobile_no == '') {
                $("#mobile_no").after('<span class="error text-danger"><em>Please mobile no.</em></span>');
                hasError = true;
            } else if (password == '') {
                $("#password").after('<span class="error text-danger"><em>Please re-enter your password.</em></span>');
                hasError = true;
            }
            if (hasError == true) {
               return false;
            }
            if (hasError == false) {
              $.ajax({
                url: '<?php echo base_url('login/registerInsert'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { username:username,email:email,mobile_no:mobile_no,password:password},
                success: function(response){
                  console.log(response)
                  $('#form_resetPassword').show();
                  if (response.code === 1) {
                      $("#form_resetPassword").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response.msg);
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
    </script>
</body>

</html>
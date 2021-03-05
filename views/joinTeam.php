<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Join Your Teammates | ANJ Webtech Pvt Ltd</title>
    <meta name="description" content="">
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
        
    <section class="joinTeam-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="headerLogo">
                    <img src="<?php echo base_url('assets/'); ?>images/o-logo.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 ml-lg-auto mr-lg-auto">
                    <div class="joinTeam-box">
                        <div class="joinTeamImg">
                            <img src="<?php echo base_url('assets/'); ?>images/join-your-template.png" class="img-fluid" alt="">
                        </div>
                        <div class="joinTeamHeading">
                            <h4 class="heading">Join <span class="team-or-project-name">TEAM ANJ</span> in ANJ</h4>
                            <h6 class="invitebytxt"><?php echo trim(preg_replace('/\s\s+/', ' ', $projectASSIGN)) ?> invite to <?php echo trim(preg_replace('/\s\s+/', ' ', $projectNAME)); ?> </h6>
                            <p class="subHeading">Enter your work email to join your teammates from <span class="domain-name">anjwebtech.com</span></p>
                        </div>
                        <div class="joinTeamLegalCopy">
                            <p class="subheading legal-copy">By continuing, I agree to the ANJ Webtech <a href="javascript:void()">Privacy Policy</a> and <a href="javascript:void()">Terms of Service</a>.</p>
                        </div>
                        <form action="<?php echo base_url('login/jointeamsetemail'); ?>" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" id="joinEmail" name="joinEmail" placeholder="xxx@anjwebtech.com">
                                <input type="hidden" name="projectID" id="projectID" value="<?php echo $projectID; ?>">
<input type="hidden" name="projectNAME" id="projectNAME" value="<?php echo $projectNAME; ?>">
<input type="hidden" name="projectASSIGN" id="projectASSIGN" value="<?php echo $projectASSIGN; ?>">
<input type="hidden" name="projectMain_user_id" id="projectMain_user_id" value="<?php echo $projectMain_user_id; ?>">
<input type="hidden" name="projectCombo_id" id="projectCombo_id" value="<?php echo $projectCombo_id; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary invite-signupSubmit" value="Continue">
                            <!-- <button type="submit" class="btn btn-primary invite-signupSubmit">Continue</button> -->
                        </form>
                    </div>
                </div>
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

</body>

</html>
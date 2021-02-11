<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <title>feedback Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <h1 class="text-center">Feedback Form</h1>
            <div id="note"></div>

<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
<?=$this->session->flashdata('success')?>
</div>
<?php endif; ?>

            <div class="clearfix"></div>
<form action="<?php echo base_url('feedback/insert_feedback'); ?>" method="post" >
            <div class="form-group">
                <label for="Full-name">Full Name: </label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="email">Email: <span style="color: red; font-size: 18px; ">*</span></label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            Please provide your feedback on the quality of our service
            <div class="radio">
                <label for="excellent">
                    <input type="radio" name="quality" id="excellent" value="excellent" checked>
                    Excellent
                </label>
            </div>
            <div class="radio">
                <label for="very-good">
                    <input type="radio" name="quality" id="very-good" value="very-good">
                    Very Good
                </label>
            </div>
            <div class="radio">
                <label for="good">
                    <input type="radio" name="quality" id="good" value="good">
                    Good
                </label>
            </div>
            <div class="radio">
                <label for="average">
                    <input type="radio" name="quality" id="average" value="average">
                    Average
                </label>
            </div>
            <div class="radio">
                <label for="poor">
                    <input type="radio" name="quality" id="poor" value="poor">
                    Poor
                </label>
            </div>
            <div class="form-group">
                <label for="message">Message: <span style="color: red; font-size: 18px; ">*</span></label>
                <textarea name="message" id="message" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="submitfeedbakc">Submit</button>
        
        </form>

            <br/><br/>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script type="text/javascript">
    $("#submit").click(function() {
        $("#submit").button("loading");
        var firstName = $("#first-name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        if ( email == "" || email == null ) {
            showAlert(2, "Please fill out the required fields", "submit");
            return;
        } else {
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if ( atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length ) {
                showAlert(2, 'Please insert a valid email', "submit");
                return;
            }
        }
        if ( message == "" || message == null ) {
            showAlert(2, "Please fill out the required fields", "submit");
            return;
        }

        $.ajax({
            url: 'feedback/insert_feedback',
            type: 'POST',
            data:{firstName:firstName,email:email,message:message},
            success: function(response) {
                window.location.href = response;
            }
        });
        
    });

    $(document).ready(function() {
        if ( top != self )
            top.location.href = self.location.href;
    });
    function showAlert(type, message, button){
        var str = "";
        var alert = "";
        switch ( type ) {
            case 1:
                alert = "success";
                break;
            case 2:
                alert = "danger";
                break;
            case 3:
                alert = "warning";
                break;
        }
        str += '<div class="alert alert-'+alert+' alert-dismissable pull-left full-alert">';
        str += message;
        str += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        str += '</div>';
        $("#note").html(str);
        $('html,body').animate({ scrollTop: 0 });
        if ( button != false ) {
            $("#"+button).button("reset");
            $("#"+button).css("opacity", "1");
        }
    }
    function showAlert(type, message, button){
        var str = "";
        var alert = "";
        switch ( type ) {
            case 1:
                alert = "success";
                break;
            case 2:
                alert = "danger";
                break;
            case 3:
                alert = "warning";
                break;
        }
        str += '<div class="alert alert-'+alert+' alert-dismissable pull-left full-alert">';
        str += message;
        str += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        str += '</div>';
        $("#note").html(str);
        $('html,body').animate({ scrollTop: 0 });
        if ( button != false ) {
            $("#"+button).button("reset");
            $("#"+button).css("opacity", "1");
        }
    }
</script>

</body>
</html>
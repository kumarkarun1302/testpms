<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="index,follow" />
  <meta name="SLURP" content="INDEX,FOLLOW" />

  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  <base href="/">
  <title>Ultrafast ANJ Share Drive | File sharing and storage made simple</title>
  <link rel="dns-prefetch" href="<?php echo base_url(); ?>"/>

  <meta name="keywords" content="online storage, free storage, collaboration, share files, cross platform, remote access, send large files" />

  <meta name="description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime." />

  <meta property="og:title" content="Ultrafast ANJ Share Drive"/>
  <meta property="twitter:title" content="Ultrafast ANJ Share Drive" />
  <meta property="og:image" content="<?php echo base_url('assets/images/logo.png'); ?>"/>
  <meta property="twitter:image" content="<?php echo base_url('assets/images/logo.png'); ?>" />
  <meta property="og:description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime."/>
  <meta property="twitter:description" content="Ultrafast ANJ Share Drive provides free cloud storage and Send large files Share your work instantly shareable links Sync, share and edit on any device, anytime."/>

  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo base_url(); ?>"/>
  <meta property="og:site_name" content="Ultrafast ANJ Share Drive"/>
  <link rel="canonical" href="<?php echo base_url(); ?>" />

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
</script>

<link href="<?php echo base_url('assets'); ?>/4a0YWgnYPaUPfGyiNypBLzf4jwzSRvtGUJC9faYudD0.css" rel="stylesheet">
<script src="<?php echo base_url('drive_assets'); ?>/HgHlOrRPFJZYw51l4IwUK3ti7PTmsrGZ0sY7YgJwO4.js"></script><!-- 
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5feecdae0b50bc00198f42bf&product=sticky-share-buttons' async='async'></script>
 -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body oncontextmenu="return false" >
<div class="container bg-container">
  <div>
  <a href="<?php echo base_url('file/download_files/'); ?><?php echo $this->uri->segment(3); ?>" >Download</a>
  </div>
  <input type='hidden' id='deltxt_id' value="<?php echo $this->uri->segment(3); ?>">
  <br><hr>
  <?php
  $user_id = $display_files['user_id'];
  $username = get_one_value('tbl_users','username','user_id',$user_id);
  ?>
  <div class="row" style="position: relative;text-align: center;width: 50%;left:250px;">
    
    <a href="<?php echo anjdrive_imageget($username,$display_files['file'],$display_files['file_folder'],$display_files['folder']); ?>" download="<?php echo $display_files['file']; ?>"><img src="<?php echo base_url('assets/images/image.png'); ?>" style="position: relative;text-align: center;display: none;"></a>

<div class="download transfer-wrapper">
  <div class="download info-block">
    <div class="file-type-wrapper">
      <div class="block-view-file-type video"></div>
    </div>
    <div class="download thumb-block">
      <img>
    </div>
    <div class="download file-info">
      <div class="download info-txt big-txt" title="<?php echo $display_files['file']; ?>" style="text-align: left;">
        <span class="filename" ><?php echo $display_files['file']; ?></span>
      </div>
      <div class="download info-txt small-txt" style="text-align: left;"><?php echo $display_files['file_size']; ?> KB</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="video-mode-wrapper">
    <div class="download buttons-block">
      <div class="download big-button button download-file green transition">
        <i class="medium-icon icons-sprite download big"></i>
        <span onclick="download_file()">Download</span>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

  </div>



</div>

<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="true" data-backdrop="static" style="position: absolute;float: left;left: 50%;top: 50%;transform: translate(-50%, -50%);">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center;">Enter decryption key</div>
      <div class="modal-body">
        <div class="" style="color: rgb(119, 119, 119);line-height: 24px;padding: 0px 0px 10px;">To access this folder/file, you will need its <b>Decryption key</b>.If you do not have the key, contact the creator of the link.</div>
        <br><b>Testing Password: 123</b>
        <input type="password" name="password" id="password" class="form-control" placeholder="Decryption key" autocomplete="disabled">
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#passwordModal').modal('show');
$('#password').on('keyup', function () {
  if ($('#password').val() == '123') {
    $('#passwordModal').modal('hide');
  } else 
    $('#passwordModal').modal('show');
});
document.addEventListener("keydown",function(){return 123==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&event.shiftKey&&73==event.keyCode?(alert("Nice trick! but not permitted!"),!1):event.ctrlKey&&85==event.keyCode?(alert("Nice trick! but not permitted!"),!1):void 0},!1),document.addEventListener?document.addEventListener("contextmenu",function(e){alert("Nice trick! but not permitted!"),e.preventDefault()},!1):document.attachEvent("oncontextmenu",function(){alert("Nice trick! but not permitted!"),window.event.returnValue=!1});

document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}

</script>

<style type="text/css">
  

</style>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Admin PMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Master Admin</h5>
            <form class="form-signin" action="<?php echo base_url('login/login'); ?>" method="post">
              <div class="form-label-group">
                <input type="email" id="admin_email" name="admin_email" class="form-control" placeholder="Email address" required autofocus>
                <label for="admin_email">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="admin_password" name="admin_password" class="form-control" placeholder="Password" required>
                <label for="admin_password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

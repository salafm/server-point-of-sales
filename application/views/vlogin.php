<!DOCTYPE html>
<html lang="en">
  <head>
	<style>
	.input-group .form-control 
	{
		margin: 0px !important;
	}
	</style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restopos | Masuk</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('login/aksi_login'); ?>" method="post">
              <h1>Masuk ke Sistem</h1>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              </div>
              <div class="input-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" >Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Lupa Kata Sandi?
                  <a href="#signup" class="to_register"> Reset Kata Sandi </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cutlery"></i> Resto<b><i>pos</i></b></h1>
                  <p>©2017 Hak Cipta dilindungi Undang-Undang. <b>Restopos</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Reset Kata Sandi</h1>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Email" required="" />
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Reset Password</a>
				<a class="btn btn-default submit" href="#signin">Batal</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-cutlery"></i> Resto<b><i>pos</i></b></h1>
                  <p>©2017 Hak Cipta dilindungi Undang-Undang. <b>Restopos</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

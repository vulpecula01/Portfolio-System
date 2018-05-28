<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="<?php echo base_url('adminlte/logo/favicon.ico'); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('adminlte/logo/favicon.ico'); ?>" type="image/x-icon">
  <title>PORTFOLIO SYSTEM | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url('adminlte/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url('adminlte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="<?php echo base_url('adminlte/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="login-page">
        <div class="login-box">
          <div class="login-logo">
      
            <a href="#"><b>PORTFOLIO SYSTEM</b><!-- <br>WITH ADMIN LTE --></a>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <!-- <p class="login-box-msg">Sign in to start your session</p> -->
            <?php echo $this->session->flashdata('result');?>
            <form action="<?php echo site_url('c_login');?>" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php echo form_error('username'); ?>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_error('password'); ?>
              </div>
              <div class="row">
                <div class="col-xs-8">    
                  <div class="checkbox icheck">
                    <label>
                      <!--<input type="checkbox" id="checkbox"> Remember Me-->
                    </label>
                  </div>                        
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
              </div>
            </form>

            <!--  <a href="#">I forgot my password</a><br> -->

          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('adminlte/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('adminlte/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('adminlte/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
          });
        </script>
      </body>
      </html>
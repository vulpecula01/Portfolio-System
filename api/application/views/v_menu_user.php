<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('adminlte/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url('adminlte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('adminlte/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url('adminlte/plugins/iCheck/flat/blue.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url('adminlte/plugins/morris/morris.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url('adminlte/plugins/datepicker/datepicker3.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Informatics</b>Portfolio</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo site_url('getpic?image=').$picpath; ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $fullname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo site_url('getpic?image=').$picpath; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $fullname.' - '.$positition; ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-12 text-center">
                      <a href="#">logout</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Information</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> General Information</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Education Background</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Jobs Experience</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Interests</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Researches</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Awards</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Taught</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <?php echo $v_body; ?>
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('adminlte/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('adminlte/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url('adminlte/plugins/morris/morris.min.js'); ?>" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('adminlte/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('adminlte/plugins/knob/jquery.knob.js'); ?>" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('adminlte/plugins/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('adminlte/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url('adminlte/plugins/fastclick/fastclick.min.js'); ?>'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminlte/dist/js/app.min.js'); ?>" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url('adminlte/dist/js/pages/dashboard.js'); ?>" type="text/javascript"></script>  -->

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url('adminlte/dist/js/demo.js'); ?>" type="text/javascript"></script> -->
  </body>
</html>
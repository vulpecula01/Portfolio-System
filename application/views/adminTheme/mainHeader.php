  <header class="main-header">
  	<!-- Logo -->
  	<a href="<?php echo base_url();?>" class="logo"> <b>Informatics</b>Portfolio</a>
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
  								<?php echo $fullname; ?>
  							</p>
  						</li>
  						<!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="col-xs-12 text-center">
                  <a href="<?php echo site_url('c_login/log_out');?>">logout</a>
                </div>
            </li> -->
            <!-- Menu Footer-->
            <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> -->
              <div class="pull-right">
              	<a href="<?php echo site_url('c_login/log_out');?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
          </li>
      </ul>
  </li>
</ul>
</div>
</nav>
</header>
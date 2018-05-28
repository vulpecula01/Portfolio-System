<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <?php if($this->session->userdata('uaut_id') && ($this->session->userdata('aut_user') == 'Y')):?>
        <li class="header">USER NAVIGATION</li>
      </li>
      <li>
        <a href="<?php echo site_url('c_user_page');?>">
          <i class="fa fa-edit"></i> <span>Change to User</span>
        </a>
      </li>
    <?php endif;?>
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview <?php if(substr($this->router->fetch_class(),2,4)=='info'){ echo 'active';}?>">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Information Category</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="treeview <?php if(substr($this->router->fetch_class(),7,5)=='pinfo'){ echo 'active';}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Personal Information</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(substr($this->router->fetch_class(),13)=='academictitle'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_pinfo_academictitle');?>"><i class="fa fa-circle-o"></i> Academic Title </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='department'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_pinfo_department');?>"><i class="fa fa-circle-o"></i> Departments </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='interest'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_pinfo_interest');?>"><i class="fa fa-circle-o"></i> Interest </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='subject'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_pinfo_subject');?>"><i class="fa fa-circle-o"></i> Subject </a></li>
			
          </ul>
        </li>
        <li class="treeview <?php if(substr($this->router->fetch_class(),7,5)=='rinfo'){ echo 'active';}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Research Information</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(substr($this->router->fetch_class(),13)=='researchtype'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_rinfo_researchtype');?>"><i class="fa fa-circle-o"></i> Type of Research  </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='researchertype'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_rinfo_researchertype');?>"><i class="fa fa-circle-o"></i> Type of Researcher  </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='researchintegrating'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_rinfo_researchintegrating');?>"><i class="fa fa-circle-o"></i> Research Integrating  </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='researchlevel'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_rinfo_researchlevel');?>"><i class="fa fa-circle-o"></i> Research Level  </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='researchstatus'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_rinfo_researchstatus');?>"><i class="fa fa-circle-o"></i> Research Status  </a></li>
          </ul>
        </li>
        <li class="treeview <?php if(substr($this->router->fetch_class(),7,5)=='einfo'){ echo 'active';}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Education Information</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(substr($this->router->fetch_class(),13)=='country'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_einfo_country');?>"><i class="fa fa-circle-o"></i> Country </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='degree'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_einfo_degree');?>"><i class="fa fa-circle-o"></i> Degree </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='education_level'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_einfo_education_level');?>"><i class="fa fa-circle-o"></i> Education Level </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='institute'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_einfo_institute');?>"><i class="fa fa-circle-o"></i> Institutes </a></li>
            <li class="<?php if(substr($this->router->fetch_class(),13)=='major'){ echo 'active';}?>"><a href="<?php echo site_url('c_info_einfo_major');?>"><i class="fa fa-circle-o"></i> Major </a></li>
          </ul>
        </li>
		<!--<li class="treeview <?php if(substr($this->router->fetch_class(),7,5)=='einfo'){ echo 'active';}?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Insignia Information</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(substr($this->router->fetch_class(),13)=='Decoration'){ echo 'active';}?>"><a href="<?php echo site_url('c_admin_insignia_add');?>"><i class="fa fa-circle-o"></i> Decoration </a></li>
          </ul>
        </li>-->
      </ul>
    </li>
    <li class="<?php if($this->router->fetch_class()=='c_admin_manage_user'){ echo 'active';}?>">
      <a href="<?php echo site_url('c_admin_manage_user');?>">
        <i class="fa fa-edit"></i> <span>จัดการข้อมูลผู้ใช้</span>
      </a>
    </li>
    <li class="<?php if($this->router->fetch_class()=='c_research'){ echo 'active';}?>">
      <a href="<?php echo site_url('c_research/index_admin');?>">
        <i class="fa fa-edit"></i> <span>ผลงานวิจัย</span>
      </a>
    </li>
	<li class="<?php if($this->router->fetch_class()=='c_admin_pro_insignia'){ echo 'active';}?>">
      <a target="_blank" href="<?php echo site_url('c_admin_pro_insignia/index');?>">
        <i class="fa fa-edit"></i> <span>คาดการณ์เครื่องราชทาน</span>
      </a>
    </li>
	<li class="<?php if($this->router->fetch_class()=='c_admin_insignia'){ echo 'active';}?>">
      <a href="<?php echo site_url('c_admin_insignia');?>">
        <i class="fa fa-edit"></i> <span>จัดการข้อมูลเครื่องราชทาน</span>
      </a>
    </li>
	<li class="<?php if($this->router->fetch_class()=='c_admin_letter'){ echo 'active';}?>">
      <a href="<?php echo site_url('c_admin_letter/index');?>">
        <i class="fa fa-edit"></i> <span>หนังสือคำสั่ง</span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
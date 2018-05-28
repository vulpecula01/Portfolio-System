<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <?php if($this->session->userdata('uaut_id') && ($this->session->userdata('aut_admin') == 'Y')):?>
        <li class="header">USER NAVIGATION</li>
      </li>
      <li>
        <a href="<?php echo site_url('c_admin_page');?>">
          <i class="fa fa-edit"></i> <span>Change to Admin</span>
        </a>
      </li>
    <?php endif;?>
    <li class="header">MAIN NAVIGATION</li>
    <?php
      $ret = $this->encrypt->encode($user_id);
      $ret = strtr(
          $ret,
          array(
              '+' => '.',
              '=' => '-',
              '/' => '~'
          )
      );
    ?>
    <li class="<?php if($this->router->fetch_class()=='c_general_information'){ echo 'active';}?>"><a href="<?php echo site_url('c_general_information/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลทั่วไป</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_education_background'){ echo 'active';}?>"><a href="<?php echo site_url('c_education_background/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลประวัติการศึกษา</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_job_experience'){ echo 'active';}?>"><a href="<?php echo site_url('c_job_experience/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลประสบการณ์ทำงาน</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_interest'){ echo 'active';}?>"><a href="<?php echo site_url('c_interest/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลความสนใจ</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_research'){ echo 'active';}?>"><a href="<?php echo site_url('c_research/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมุลงานวิจัย</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_award'){ echo 'active';}?>"><a href="<?php echo site_url('c_award/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลการรับรางวัล</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_taught'){ echo 'active';}?>"><a href="<?php echo site_url('c_taught/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลประสบการณ์สอน</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_activity'){ echo 'active';}?>"><a href="<?php echo site_url('c_activity/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลกิจกรรม</a></li>
	<li class="<?php if($this->router->fetch_class()=='c_train'){ echo 'active';}?>"><a href="<?php echo site_url('c_train/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลการอบรม</a></li>
	<li class="<?php if($this->router->fetch_class()=='c_insignia'){ echo 'active';}?>"><a href="<?php echo site_url('c_insignia/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>ข้อมูลการได้รับเครื่องราชทาน</a></li>
    <li class="<?php if($this->router->fetch_class()=='c_letter_of_instruction'){ echo 'active';}?>"><a href="<?php echo site_url('c_letter_of_instruction/index/'.$ret); ?>"><i class="fa fa-circle-o"></i>หนังสือคำสั่ง</a></li>
	
    <li class="treeview">
      <a href="#">
        <i class="fa fa-circle-o"></i> <span>Export</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <!--<li><a target ="_blank" href="<?php echo site_url('c_export/pdf/'.$ret); ?>"><i class="fa fa-file-text-o"></i>PDF</a></li>-->
        <li><a href="<?php echo site_url('c_export/word/'.$ret); ?>"><i class="fa fa-file-text-o"></i>Word Document</a></li>
      </ul>
    </li>

  </ul>
</li>
</ul>
</section>
<!-- /.sidebar -->
</aside>
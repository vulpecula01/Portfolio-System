<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/tagsinput/bootstrap-tagsinput.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/chosen/chosen.css'); ?>">
<style type="text/css">
.bold{
    font-weight: bold;
}
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ข้อมูลงานวิจัย
            <small>
                <?php echo $this->session->flashdata('result');?>
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
            <!-- general form elements disabled -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">กรอกข้อมูลงานวิจัย</h3>

                        <button type="button" class="btn btn-primary pull-right otherResearch" title="Create Other Researcher" data-toggle="modal" data-target="#createOther" aria-hidden="true">
                            <i class="fa fa-user-plus"></i>
                        </button></li>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#form_1" data-toggle="tab">โครงการวิจัย</a></li>
                            <li><a href="#form_2" data-toggle="tab">วารสาร</a></li>
                            <li><a href="#form_3" data-toggle="tab">ระเบียบการ</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="form_1">
                                <?php echo form_open_multipart('c_research/insert_project', 'class="insert_PJ" role="form" id="form_PJ"');?>
                                <!-- <form enctype="multipart/form-data" class="insert_PJ" role="form" action="<?php // echo site_url('c_research/insert_project'); ?>" method="post"> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (EN) <small class="error projectTitleEn PJ"></small></label>
                                                <input type="text" class="form-control" id="projectTitleEn" name="projectTitleEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (TH) <small class="error projectTitleTh PJ"></small></label>
                                                <input type="text" class="form-control" id="projectTitleTh" name="projectTitleTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>โครงการ / ผู้บริจาค (EN) <small class="error donorEn PJ"></small></label>
                                                <input type="text" class="form-control" id="donorEn" name="donorEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>โครงการ / ผู้บริจาค (TH) <small class="error donorTh PJ"></small></label>
                                                <input type="text" class="form-control" id="donorTh" name="donorTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <label>ปีของทุนวิจัย <small class="error yearFund PJ"></small></label>
                                                <input type="text" class="form-control" name="yearFund" placeholder="2015"/>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>ประเภทของการวิจัย <small class="error type PJ"></small></label>
                                                <select class="form-control" name="type">
                                                    <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($type as $value) {
                                                            echo '<option value="'.$value['ret_id'].'">'.$value['ret_ename'].'&nbsp;('.$value['ret_tname'].')</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-5">
                                                <label>สถานะ <small class="error status PJ"></small></label>
                                                <select class="form-control" name="status">
                                                    <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($resstatus as $value) {
                                                            echo '<option value="'.$value['rst_id'].'">'.$value['rst_etitle'].'&nbsp;('.$value['rst_ttitle'].')</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>บทคัดย่อ <small class="error abstract PJ"></small></label>
                                                <textarea class="form-control" name="abstract" rows="3" placeholder="กรุณากรอกข้อมูล ..."></textarea>
                                            </div>
                                            <div class="col-xs-12">
                                                <input name="file" type="file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>คำหลัก<small class="error key PJ"></small></label><br>
                                                <input type="text" class="form-control" name="key"  data-role="tagsinput"/>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="mem1-res0">
                                                <div class="col-xs-4">
                                                    <label>ประเภทของนักวิจัย</label>
                                                    <select class="form-control" name="researchType[0]">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($position as $value) {
                                                            echo '<option value="'.$value['rst_id'].'">'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-5">
                                                    <label>ชื่อ</label>
                                                    <select class="form-control" name="researchName[0]">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        echo '<optgroup label="Personnel">';
                                                        foreach ($user as $value) {
                                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        echo '<optgroup label="Other">';
                                                        foreach ($student as $value) {
                                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>เปอร์เซ็นต์</label>
                                                    <input type="text" class="form-control" name="researchPercent[0]" placeholder="100"/>
                                                </div>
                                                <div class="col-xs-1" style="padding-top:25px;">
                                                    <button class="btn btn-primary" id="add1_mem"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr/>
                                            <div class="fun-res0">
                                                <div class="col-xs-5">
                                                    <label>สถาบัน</label>
                                                    <input type="text" class="form-control" name="fundInstitution[]" placeholder="กรุณากรอกข้อมูล ..."/>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>เงินทุน</label>
                                                    <input type="text" class="form-control" name="fundFunding[]" placeholder="กรุณากรอกข้อมูล ..."/>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>วันที่ได้รับทุน</label>
                                                    <input type="text" class="form-control pull-right dateRange" name="fundDate[]" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>
                                                </div>
                                                <div class="col-xs-1" style="padding-top:25px;">
                                                    <button class="btn btn-primary" id="add_fun"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr/>
                                            <div class="int-res0">
                                                <div class="col-xs-4">
                                                    <label>วันที่ประสานงาน</label>
                                                    <input type="text" class="form-control dateRange" name="intDate" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>
                                                </div>
                                                <div class="col-xs-7">
                                                    <label>ประสานงาน</label>
                                                    <select class="form-control" name="intIntegrating[0]">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($inttype as $value) {
                                                            echo '<option value="'.$value['itt_id'].'">'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-1" style="padding-top:25px;">
                                                    <button class="btn btn-primary" id="add_int"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer clearfix" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-success pull-right submit_PJ" onclick="return false;">
                                                <i class="fa fa-check"></i> 
													บันทึก
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="form_2">
                                <?php echo form_open_multipart('c_research/insert_journal', 'class="insert_JN" role="form" id="form_JN"');?>
                                <!-- <form class="insert_JN" role="form" action="<?php //echo site_url('c_research/insert_journal_self'); ?>" method="post"> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>ชื่อเรื่องของวารสาร (EN) <small class="error titleEn JN"></small></label>
                                                <input type="text" class="form-control" id="titleEn" name="titleEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ชื่อเรื่องของวารสาร (TH) <small class="error titleTh JN"></small></label>
                                                <input type="text" class="form-control" id="titleTh" name="titleTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (EN) <small class="error projectEn JN"></small></label>
                                                <input type="text" class="form-control" id="projectEn" name="projectEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (TH) <small class="error projectTh JN"></small></label>
                                                <input type="text" class="form-control" id="projectTh" name="projectTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>ชื่อวารสาร <small class="error journal JN"></small></label>
                                                <input type="text" class="form-control" name="journal" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <label>ปีที่เผยแพร่ <small class="error year JN"></small></label>
                                                <input type="text" class="form-control" name="year" placeholder="2015"/>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>เดือนที่เผยแพร่ <small class="error month JN"></small></label>
                                                <input type="text" class="form-control" name="month" placeholder="2"/>
                                            </div>
                                            <div class="col-xs-5">
                                                <label>Year/Vol./Pages <small class="error page JN"></small></label>
                                                <input type="text" class="form-control"  name="page" placeholder="2009/2/2-4"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>กลุ่มวิจัย <small class="error cluster JN"></small></label>
                                                <input type="text" class="form-control" name="cluster" placeholder="Informatics"/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ติดตามการวิจัย <small class="error track JN"></small></label>
                                                <input type="text" class="form-control" name="track" placeholder="Software Engineering"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>การวิจัยระดับ <small class="error level JN"></small></label>
                                                    <select class="form-control" name="level">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($reslevel as $value) {
                                                            echo '<option value="'.$value['rlv_id'].'">'.$value['rlv_etitle'].'&nbsp;('.$value['rlv_ttitle'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>สิ่งที่แนบ (file)</label><br>
                                                <input name="file" type="file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>คำหลัก <small class="error key JN"></small></label><br>
                                                <input type="text" class="form-control" name="key" data-role="tagsinput"/>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="mem2-res0">
                                                <div class="col-xs-9">
                                                    <label>ชื่อ</label>
                                                    <select class="form-control" name="researchName[0]">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        echo '<optgroup label="Personnel">';
                                                        foreach ($user as $value) {
                                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        echo '<optgroup label="Other">';
                                                        foreach ($student as $value) {
                                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>ลำดับ</label>
                                                    <input type="text" class="form-control" name="researchSequence[0]" placeholder="1"/>
                                                </div>
                                                <div class="col-xs-1" style="padding-top:25px;">
                                                    <button class="btn btn-primary" id="add2_mem"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer clearfix" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-success pull-right submit_JN" onclick="return false;">
                                                <i class="fa fa-check"></i> 
													บันทึก
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="form_3">
                                <?php echo form_open_multipart('c_research/insert_proceeding', 'class="insert_PC" role="form" id="form_PC"');?>
                                <!-- <form class="insert_PC" role="form" action="<?php //echo site_url('c_research/insert_proceeding_self'); ?>" method="post"> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>ชื่อเรื่องของวารสาร (EN) <small class="error titleEn PC"></small></label>
                                                <input type="text" class="form-control" id="titleEn_p" name="titleEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ชื่อเรื่องของวารสาร (TH) <small class="error titleTh PC"></small></label>
                                                <input type="text" class="form-control" id="titleTh_p" name="titleTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (EN) <small class="error projectEn PC"></small></label>
                                                <input type="text" class="form-control" id="projectEn_p" name="projectEn" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ชื่อบทความ (TH) <small class="error projectTh PC"></small></label>
                                                <input type="text" class="form-control" id="projectTh_p" name="projectTh" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>การประชุม <small class="error conference PC"></small></label>
                                                <input type="text" class="form-control" name="conference" placeholder="กรุณากรอกข้อมูล ..."/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>วันที่ประชุม <small class="error date PC"></small></label>
                                                <input type="text" class="form-control dateRange" name="date" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <label>ปีที่เผยแพร่ <small class="error year PC"></small></label>
                                                <input type="text" class="form-control" name="year" placeholder="2015"/>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>เดือนที่เผยแพร่ <small class="error month PC"></small></label>
                                                <input type="text" class="form-control" name="month" placeholder="2"/>
                                            </div>
                                            <div class="col-xs-5">
                                                <label>หน้า <small class="error page PC"></small></label>
                                                <input type="text" class="form-control" name="page" placeholder="(3-5)"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>กลุ่มวิจัย <small class="error cluster PC"></small></label>
                                                <input type="text" class="form-control" name="cluster" placeholder="Informatics"/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>ติดตามการวิจัย <small class="error track PC"></small></label>
                                                <input type="text" class="form-control" name="track" placeholder="Software Engineering"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>การวิจัยระดับ <small class="error level PC"></small></label>
                                                    <select class="form-control" name="level">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        foreach ($reslevel as $value) {
                                                            echo '<option value="'.$value['rlv_id'].'">'.$value['rlv_etitle'].'&nbsp;('.$value['rlv_ttitle'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>สิ่งที่แนบ (file)</label><br>
                                                <input name="file" type="file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>คำหลัก <small class="error key PC"></small></label><br>
                                                <input type="text" class="form-control" name="key" data-role="tagsinput"/>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="mem3-res0">
                                                <div class="col-xs-9">
                                                    <label>ชื่อ</label>
                                                    <select class="form-control" name="researchName[0]">
                                                        <option value="">กรุณาเลือก</option>
                                                        <?php
                                                        echo '<optgroup label="Personnel">';
                                                        foreach ($user as $value) {
                                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        echo '<optgroup label="Other">';
                                                        foreach ($student as $value) {
                                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                        }
                                                        echo '</optgroup>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>ลำดับ</label>
                                                    <input type="text" class="form-control" name="researchSequence[0]" placeholder="1"/>
                                                </div>
                                                <div class="col-xs-1" style="padding-top:25px;">
                                                    <button class="btn btn-primary" id="add3_mem"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer clearfix" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-success pull-right submit_PC" onclick="return false;">
                                                <i class="fa fa-check"></i> 
													บันทึก
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                    <!-- /////////////////////////////////////-->
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <!-- show data -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">รายชื่อนักวิจัย</h3>
                    </div>
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">โครงการวิจัย</a></li>
                                <li><a href="#tab_2" data-toggle="tab">วารสาร</a></li>
                                <li><a href="#tab_3" data-toggle="tab">ระเบียบการ</a></li>
                            </ul>
                            <div class="tab-content">
                                <?php 
                                $projectbg = true;
                                $journalbg = true;
                                $proceedingbg = true;
                                $projected = true;
                                $journaled = true;
                                $proceedinged = true;
                                $lv = '';
                                $lvj = '';
                                foreach ($research as $key => $value) {
                                    if($value['type'] == 1) {
                                        if($projectbg){
                                            echo '<div class="tab-pane active" id="tab_1">
                                                <ul class="list-group">';
                                            $projectbg = false;
                                        }
                                        //Teerapabolarn, K.; Boonderak, A.  (2014)  Improved bounds for the Poisson-binomial relative error  เงินรายได้ คณะวิทยาศาสตร์. 100,000.00 บาท
                                            echo '<li class="list-group-item">'.$value['reference'].'.&nbsp;'.'
                                        <button type="button" class="close del del_PJ" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#del_PJ" aria-hidden="true">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <button type="button" class="close edt PJ" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#edit_PJ" aria-hidden="true">
                                            <i class="fa fa-edit"></i>&nbsp;
                                        </button></li>';
                                     }
                                     elseif ($value['type'] == 2) {
                                            if($projectbg){
                                                echo '<div class="tab-pane active" id="tab_1">
                                                    <ul class="list-group">';
                                                $projectbg = false;
                                            }
                                            if($projected){
                                                echo '</ul>
                                                    </div><!-- /.tab-pane -->';
                                                $projected = false;
                                            }
                                            if($journalbg){
                                                echo '<div class="tab-pane" id="tab_2">';
                                            }
                                            if($lv != $value['rlv']){
                                                echo '<font class="bold">'.$value['rlv'].'</font>';
                                                $lv = $value['rlv'];
                                            }
                                            if($journalbg){
                                                echo '<ul class="list-group">';
                                                $journalbg = false;
                                            }
                                            //Teerapabolarn, K.; เนริสา ทอนศรี  (2014)  Determination of the EOQ Model with Special Sales Price by Algebraic Method  วารสารวิทยาศาสตร์ มศว., 30(1), 193-207.
                                            echo '<li class="list-group-item">'.$value['reference'].'.&nbsp;'.'
                                        <button type="button" class="close del del_JN" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#del_JN" aria-hidden="true">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <button type="button" class="close edt JN" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#edit_JN" aria-hidden="true">
                                            <i class="fa fa-edit"></i>&nbsp;
                                        </button></li>';
                                     }
                                    else{
                                            if($projectbg){
                                                echo '<div class="tab-pane active" id="tab_1">
                                                    <ul class="list-group">';
                                                $projectbg = false;
                                            }
                                            if($projected){
                                                echo '</ul>
                                                    </div><!-- /.tab-pane -->';
                                                $projected = false;
                                            }
                                            if($journalbg){
                                                echo '<div class="tab-pane" id="tab_2">';
                                            }
                                            if($journaled){
                                                echo '</ul>
                                                    </div><!-- /.tab-pane -->';
                                                $journaled = false;
                                            }
                                            if($proceedingbg){
                                                echo '<div class="tab-pane" id="tab_3">';
                                            }
                                            if($lvj != $value['rlv']){
                                                echo '<font class="bold">'.$value['rlv'].'</font>';
                                                $lvj = $value['rlv'];
                                            }
                                            if($proceedingbg){
                                                echo '<ul class="list-group">';
                                                $proceedingbg = false;
                                            }
                                            //Teerapabolarn, K.; K. Neammanee; S. Chongcharoen  (2004)  Approximation of the probability of non-isolated vertices in random graphs  Annual Meeting in Applied Statistics 2004, National Institute of Development Administration, 9-18.
                                            echo '<li class="list-group-item">'.$value['reference'].'
                                        <button type="button" class="close del del_PC" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#del_PC" aria-hidden="true">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <button type="button" class="close edt PC" data="'.$value['res_id'].'" data-toggle="modal" 
                                        data-target="#edit_PC" aria-hidden="true">
                                            <i class="fa fa-edit"></i>&nbsp;
                                        </button></li>';
                                    }
                                }
                                    if($projectbg){
                                        echo '<div class="tab-pane active" id="tab_1">
                                            <ul class="list-group">';
                                        $projectbg = false;
                                    }
                                    if($projected){
                                        echo '</ul>
                                            </div><!-- /.tab-pane -->';
                                        $projected = false;
                                    }
                                    if($journalbg){
                                        echo '<div class="tab-pane" id="tab_2">
                                            <ul class="list-group">';
                                    }
                                    if($journaled){
                                        echo '</ul>
                                            </div><!-- /.tab-pane -->';
                                        $journaled = false;
                                    }
                                    if($proceedingbg){
                                        echo '<div class="tab-pane" id="tab_3">
                                            <ul class="list-group">';
                                    }
                                if($proceedinged && $proceedingbg==false){
                                    echo '</ul>
                                        </div><!-- /.tab-pane -->';
                                    $proceedinged = false;
                                }
                                ?>
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- Dialog -->
 <div class="modal fade" id="edit_PJ" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <?php echo form_open_multipart('c_research/update_project', 'class="myformedt PJ" role="form" id="form_edit_PJ"');?>
            <!-- <form class="myformedt PJ" role="form" action="<?php echo site_url('c_taught/update_self'); ?>" method="post"> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลโครงการวิจัย</h4>
                </div>
                <div class="box-body edit-box PJ">
                    <div class="form-group">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix" >
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-success pull-right  submit_edit_PJ">
                        <i class="fa fa-save"></i> 
							บันทึก
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <div class="modal fade" id="edit_JN" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <?php echo form_open_multipart('c_research/update_journal', 'class="myformedt JN" role="form" id="form_edit_JN"');?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขวารสาร</h4>
                </div>
                <div class="box-body edit-box JN">
                    <div class="form-group">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix" >
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-success pull-right submit_edit_JN">
                        <i class="fa fa-save"></i> 
							บันทึก
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <div class="modal fade" id="edit_PC" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <?php echo form_open_multipart('c_research/update_proceeding', 'class="myformedt PC" role="form" id="form_edit_PC"');?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขระเบียบการ</h4>
                </div>
                <div class="box-body edit-box PC">
                    <div class="form-group">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix" >
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-success pull-right submit_edit_PC">
                        <i class="fa fa-save"></i> 
							บันทึก
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- model for delete -->
<div class="modal fade" id="del_PJ" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลโครงการวิจัย</h4>
            </div>
            <form rold="form" action="<?php echo site_url('c_research/delete_research_self'); ?>" method="post">
                <input type="hidden" class="form-control PJ" id="deleteId" name="res_id"/>
                <div class="modal-body">
					คุณต้องการลบข้อมูลโครงการวิจัยหรือไม่
                </div>
                <div class="modal-footer clearfix">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i> 
							ลบข้อมูล
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- model for delete -->
<div class="modal fade" id="del_JN" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลวารสาร</h4>
            </div>
            <form rold="form" action="<?php echo site_url('c_research/delete_research_self'); ?>" method="post">
                <input type="hidden" class="form-control JN" id="deleteId" name="res_id"/>
                <div class="modal-body">
						คุณต้องการลบข้อมูลวารสาร
                </div>
                <div class="modal-footer clearfix">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i> 
							ลบข้อมูล
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- model for delete -->
<div class="modal fade" id="del_PC" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลระเบียบการ</h4>
            </div>
            <form rold="form" action="<?php echo site_url('c_research/delete_research_self'); ?>" method="post">
                <input type="hidden" class="form-control PC" id="deleteId" name="res_id"/>
                <div class="modal-body">
						คุณต้องการลบลบข้อมูลระเบียบการ
                </div>
                <div class="modal-footer clearfix">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
						ปิด
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i> 
						ลบข้อมูล
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- create other researcher -->
<div class="modal fade" id="createOther" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> สร้างนักวิจัยคนอื่น</h4>
            </div>
            <form rold="form" action="<?php echo site_url('c_research/insert_otherResearcher'); ?>" method="post" class="createOther">
                <div class="modal-body researcher-box">
                    <div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>ชื่อ (EN) <small class="error ename"></small></label>
                                    <input type="text" class="form-control otherEName" name="ename" placeholder="Given name"/>
                                </div>
                                <div class="col-xs-6">
                                    <label>ชื่อ (TH) <small class="error tname"></small></label>
                                    <input type="text" class="form-control otherTName" name="tname" placeholder="ชื่อจริง"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>นามสกุล (EN) <small class="error elastName"></small></label>
                                    <input type="text" class="form-control otherELastName" name="elastName" placeholder="Surname"/>
                                </div>
                                <div class="col-xs-6">
                                    <label>นามสกุล (TH) <small class="error tlastName"></small></label>
                                    <input type="text" class="form-control otherTLastName" name="tlastName" placeholder="นามสกุล"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tableOtherResearcher">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-success" id="otherSubmit">
                        <i class="fa fa-save"></i> 
							บันทึก
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- model for delete -->
<div class="modal fade" id="del-other" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบนักวิจัย</h4>
            </div>
            <form rold="form" action="<?php echo site_url('c_research/delete_otherResearcher'); ?>" method="post">
                <input type="hidden" class="form-control PC" id="deleteOther" name="rsd_id"/>
                <div class="modal-body">
						คุณต้องการลบนักวิจัยหรือไม่
                </div>
                <div class="modal-footer clearfix">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
							ปิด
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i> 
							ลบข้อมูล
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('adminlte/plugins/tagsinput/bootstrap-tagsinput.min.js');?>"></script>
<script src="<?php echo base_url('adminlte/plugins/tagsinput/bootstrap-tagsinput-angular.min.js');?>"></script>
<script src="<?php echo base_url('adminlte/plugins/chosen/chosen.jquery.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
        $('.bootstrap-tagsinput input').removeAttr('style');
        $('.bootstrap-tagsinput input').css('width', '100% !important');
    });

    ///////// DYNAMIC TABLE
    $(function(){
        // member#1
        var m1Row = 0;
        var pm1Row = 0;
        $('#add1_mem').click(function(){
            $('.mem1-res'+m1Row).after('<div class="mem1-res'+(m1Row+1)+'">\
                            <div class="col-xs-4">\
                                <select class="form-control" name="researchType['+(m1Row+1)+']">\
                                    <option value="">กรุณาเลือก</option>\
                                    <?php
                                    foreach ($position as $value) {
                                        echo '<option value="'.$value['rst_id'].'">'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                    }
                                    ?>
                                </select>\
                            </div>\
                            <div class="col-xs-5">\
                                <select class="form-control" name="researchName['+(m1Row+1)+']">\
                                    <option value="">กรุณาเลือก</option>\
                                    <?php
                                    echo '<optgroup label="Personnel">';
                                    foreach ($user as $value) {
                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    echo '<optgroup label="Other">';
                                    foreach ($student as $value) {
                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    ?>
                                </select>\
                            </div>\
                            <div class="col-xs-2">\
                                <input type="text" class="form-control" name="researchPercent['+(m1Row+1)+']" placeholder="100"/>\
                            </div>\
                            <div class="col-xs-1">\
                                <button class="btn bg-red del_mem1" value="'+(m1Row+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                            </div>\
                        </div>');
            m1Row++;
            window.href = '#';
            return false;
        });
        $(document).on('click', '.del_mem1', function(){
            // alert($(this).parent().children().attr('value'));
            $('.mem1-res'+$(this).parent().children().attr('value')).remove();
            window.href = '#';
            pm1Row++;
            if(m1Row == pm1Row){
                m1Row = pm1Row = 0;
            }
            return false;
        });
        // member#2
        var m2Row = 0;
        var pm2Row = 0;
        $('#add2_mem').click(function(){
            $('.mem2-res'+m2Row).after('\
                        <div class="mem2-res'+(m2Row+1)+'">\
                            <div class="col-xs-9">\
                                <select class="form-control" name="researchName['+(m2Row+1)+']">\
                                    <option value="">กรุณาเลือก</option>\
                                    <?php
                                    echo '<optgroup label="Personnel">';
                                    foreach ($user as $value) {
                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    echo '<optgroup label="Other">';
                                    foreach ($student as $value) {
                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    ?>
                                </select>\
                            </div>\
                            <div class="col-xs-2">\
                                <input type="text" class="form-control" name="researchSequence['+(m2Row+1)+']" placeholder="100"/>\
                            </div>\
                            <div class="col-xs-1">\
                                <button class="btn bg-red del_mem2" value="'+(m2Row+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                            </div>\
                        </div>');
            m2Row++;
            window.href = '#';
            return false;
        });
        $(document).on('click', '.del_mem2', function(){
            // alert($(this).parent().children().attr('value'));
            $('.mem2-res'+$(this).parent().children().attr('value')).remove();
            window.href = '#';
            pm2Row++;
            if(m2Row == pm2Row){
                m2Row = pm2Row = 0;
            }
            return false;
        });
        // member#3
        var m3Row = 0;
        var pm3Row = 0;
        $('#add3_mem').click(function(){
            $('.mem3-res'+m3Row).after('\
                        <div class="mem3-res'+(m3Row+1)+'">\
                            <div class="col-xs-9">\
                                <select class="form-control" name="researchName['+(m3Row+1)+']">\
                                    <option value="">กรุณาเลือก</option>\
                                    <?php
                                    echo '<optgroup label="Personnel">';
                                    foreach ($user as $value) {
                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    echo '<optgroup label="Other">';
                                    foreach ($student as $value) {
                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                    }
                                    echo '</optgroup>';
                                    ?>
                                </select>\
                            </div>\
                            <div class="col-xs-2">\
                                <input type="text" class="form-control" name="researchSequence['+(m3Row+1)+']" placeholder="100"/>\
                            </div>\
                            <div class="col-xs-1">\
                                <button class="btn bg-red del_mem3" value="'+(m3Row+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                            </div>\
                        </div>');
            m3Row++;
            window.href = '#';
            return false;
        });
        $(document).on('click', '.del_mem3', function(){
            // alert($(this).parent().children().attr('value'));
            $('.mem3-res'+$(this).parent().children().attr('value')).remove();
            window.href = '#';
            pm3Row++;
            if(m3Row == pm3Row){
                m3Row = pm3Row = 0;
            }
            return false;
        });
        //fund
        var fRow = 0;
        var pfRow = 0;
        $('#add_fun').click(function(){
            $('.fun-res'+fRow).after('\
                        <div class="fun-res'+(fRow+1)+'">\
                            <div class="col-xs-5">\
                                <input type="text" class="form-control" name="fundInstitution[]" placeholder="กรุณากรอกข้อมูล ..."/>\
                            </div>\
                            <div class="col-xs-2">\
                                <input type="text" class="form-control" name="fundFunding[]" placeholder="กรุณากรอกข้อมูล ..."/>\
                            </div>\
                            <div class="col-xs-4">\
                                <input type="text" class="form-control pull-right dateRange" name="fundDate[]" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>\
                            </div>\
                            <div class="col-xs-1">\
                                <button class="btn bg-red del_fun" value="'+(fRow+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                            </div>\
                        </div>');
            fRow++;
            window.href = '#';
            $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
            return false;
        });
        $(document).on('click', '.del_fun', function(){
            // alert($(this).parent().children().attr('value'));
            $('.fun-res'+$(this).parent().children().attr('value')).remove();
            window.href = '#';
            pfRow++;
            if(fRow == pfRow){
                fRow = pfRow = 0;
            }
            return false;
        });
        //Intergra
        var irow = 0;
        var pirow = 0;
        $('#add_int').click(function(){
            $('.int-res'+irow).after('\
                        <div class="int-res'+(irow+1)+'">\
                            <div class="col-xs-4">\
                            </div>\
                            <div class="col-xs-7">\
                                <select class="form-control" name="intIntegrating['+(irow+1)+']">\
                                    <option value="">กรุณาเลือก</option>\
                                    <?php
                                    foreach ($inttype as $value) {
                                        echo '<option value="'.$value['itt_id'].'">'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                    }
                                    ?></select>\
                            </div>\
                            <div class="col-xs-1">\
                                <button class="btn bg-red del_int" value="'+(irow+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                            </div>\
                        </div>');
            irow++;
            $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
            window.href = '#';
            return false;
        });
        $(document).on('click', '.del_int', function(){
            // alert($(this).parent().children().attr('value'));
            $('.int-res'+$(this).parent().children().attr('value')).remove();
            window.href = '#';
            pirow++;
            if(irow == pirow){
                irow = pirow = 0;
            }
            return false;
        });
    });
    /////////// insert
    $(function(){
        $('.submit_PJ').click(function(){
            // e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/insert_project_validate'); ?>",
                data: $('.insert_PJ').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.PJ.projectTitleEn').html(obj.projectTitleEn);
                        $('.error.PJ.projectTitleTh').html(obj.projectTitleTh);
                        $('.error.PJ.donorEn').html(obj.donorEn);
                        $('.error.PJ.donorTh').html(obj.donorTh);
                        $('.error.PJ.yearFund').html(obj.yearFund);
                        $('.error.PJ.abstract').html(obj.abstract);
                        $('.error.PJ.key').html(obj.key);
                        $('.error.PJ.status').html(obj.errstatus);
                        $('.error.PJ.type').html(obj.errtype);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_PJ').submit();
                    }
                    else
                    {
                        alert("error !!!!! ติกต่อ เจ้าหน้าด่วน")
                        // window.location.href = "<?php echo site_url('c_research'); ?>";
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
        $('.submit_JN').click(function(){//.on('click', '.insert_JN', function(e){
            // e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/insert_journal_validate'); ?>",
                data: $('.insert_JN').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.JN.projectEn').html(obj.projectEn);
                        $('.error.JN.projectTh').html(obj.projectTh);
                        $('.error.JN.titleEn').html(obj.titleEn);
                        $('.error.JN.titleTh').html(obj.titleTh);
                        $('.error.JN.journal').html(obj.journal);
                        $('.error.JN.year').html(obj.year);
                        $('.error.JN.month').html(obj.month);
                        $('.error.JN.page').html(obj.page);
                        $('.error.JN.cluster').html(obj.cluster);
                        $('.error.JN.track').html(obj.track);
                        $('.error.JN.level').html(obj.level);
                        $('.error.JN.key').html(obj.errkey);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_JN').submit();
                    }
                    else
                    {
                        alert("error !!!!! ติกต่อ เจ้าหน้าด่วน")
                        // window.location.href = "<?php echo site_url('c_research'); ?>";
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
        $('.submit_PC').click(function(){//.on('click', '.insert_PC', function(e){
            // e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/insert_proceeding_validate'); ?>",
                data: $('.insert_PC').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.PC.projectEn').html(obj.projectEn);
                        $('.error.PC.projectTh').html(obj.projectTh);
                        $('.error.PC.titleEn').html(obj.titleEn);
                        $('.error.PC.titleTh').html(obj.titleTh);
                        $('.error.PC.conference').html(obj.conference);
                        // $('.error.PC.place').html(obj.place);
                        $('.error.PC.date').html(obj.date);
                        $('.error.PC.year').html(obj.year);
                        $('.error.PC.month').html(obj.month);
                        $('.error.PC.page').html(obj.page);
                        $('.error.PC.cluster').html(obj.cluster);
                        $('.error.PC.track').html(obj.track);
                        $('.error.PC.level').html(obj.level);
                        $('.error.PC.key').html(obj.errkey);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_PC').submit();
                    }
                    else
                    {
                        alert("error !!!!! ติกต่อ เจ้าหน้าด่วน")
                        // window.location.href = "<?php echo site_url('c_research'); ?>";
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
    });

    /////////// get update
    $(function(){
        $('.edt.PJ').click(function(){
            $.ajax({
                url: "<?php echo site_url('c_research/get_projectById'); ?>",
                method:'post',
                data: {
                    res_id: $(this).attr('data'),
                },
                success:function(res){
                    $('.edit-box.PJ').children().remove();
                    $('.edit-box.PJ').append(res);
                    $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
                    $('input.tagsinput').tagsinput({trimValue: true});
                    $('.bootstrap-tagsinput input').removeAttr('style');
                    $('.bootstrap-tagsinput input').css('width', '100% !important');
                    $(function(){
                        var em1Row = $('#researcherCount').val();
                        var epm1Row = 0;

                        $('#eadd1_mem').click(function(){
                            $('.emem1-res'+em1Row).after('<div class="emem1-res'+(parseInt(em1Row)+1)+'">\
                                            <div class="col-xs-4">\
                                                <select class="form-control" name="researchType['+(parseInt(em1Row)+1)+']">\
                                                    <option value="">กรุณาเลือก</option>\
                                                    <?php
                                                    foreach ($position as $value) {
                                                        echo '<option value="'.$value['rst_id'].'">'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                                    }
                                                    ?>
                                                </select>\
                                            </div>\
                                            <div class="col-xs-5">\
                                                <select class="form-control" name="researchName['+(parseInt(em1Row)+1)+']">\
                                                    <option value="">กรุณาเลือก</option>\
                                                    <?php
                                                    echo '<optgroup label="Personnel">';
                                                    foreach ($user as $value) {
                                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    echo '<optgroup label="Other">';
                                                    foreach ($student as $value) {
                                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    ?>
                                                </select>\
                                            </div>\
                                            <div class="col-xs-2">\
                                                <input type="text" class="form-control" name="researchPercent['+(parseInt(em1Row)+1)+']" placeholder="100"/>\
                                            </div>\
                                            <div class="col-xs-1">\
                                                <button class="btn bg-red edel_mem1" value="'+(parseInt(em1Row)+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                                            </div>\
                                        </div>');
                            em1Row++;
                            window.href = '#';
                            return false;
                        });
                        $(document).on('click', '.edel_mem1', function(){
                            // alert($(this).parent().children().attr('value'));
                            if($(this).attr('key') != ""){
                                $.ajax({
                                    url: "<?php echo site_url('c_research/delete_researcher'); ?>",
                                    method:'post',
                                    data: {
                                        rer_id: $(this).attr('key'),
                                    }
                                });
                            }
                            // alert($(this).attr('key'));
                            // $('#researcherDelete').val($('#researcherDelete').val()+','+$(this).attr('key'));
                            $('.emem1-res'+$(this).parent().children().attr('value')).remove();
                            window.href = '#';
                            epm1Row++;
                            if(em1Row == epm1Row){
                                em1Row = epm1Row = 0;
                            }
                            return false;
                        });

                        var efRow = $('#fundCount').val();
                        var epfRow = 0;
                        $('#eadd_fun').click(function(){
                            $('.efun-res'+efRow).after('\
                                        <div class="efun-res'+(parseInt(efRow)+1)+'">\
                                            <div class="col-xs-5">\
                                                <input type="text" class="form-control" name="fundInstitution[]" placeholder="กรุณากรอกข้อมูล ..."/>\
                                            </div>\
                                            <div class="col-xs-2">\
                                                <input type="text" class="form-control" name="fundFunding[]" placeholder="กรุณากรอกข้อมูล ..."/>\
                                            </div>\
                                            <div class="col-xs-4">\
                                                <input type="text" class="form-control pull-right dateRange" name="fundDate[]" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>\
                                            </div>\
                                            <div class="col-xs-1">\
                                                <button class="btn bg-red edel_fun" value="'+(parseInt(efRow)+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                                            </div>\
                                        </div>');
                            efRow++;
                            window.href = '#';
                            $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
                            return false;
                        });
                        $(document).on('click', '.edel_fun', function(){
                            // alert($(this).parent().children().attr('value'));
                            if($(this).attr('key') != ""){
                                $.ajax({
                                    url: "<?php echo site_url('c_research/delete_fund'); ?>",
                                    method:'post',
                                    data: {
                                        fud_id: $(this).attr('key'),
                                    }
                                });
                            }
                            $('.efun-res'+$(this).parent().children().attr('value')).remove();
                            window.href = '#';
                            epfRow++;
                            if(efRow == epfRow){
                                efRow = epfRow = 0;
                            }
                            return false;
                        });
                        //Intergra
                        var eirow = $('#integratingCount').val();
                        var epirow = 0;
                        $('#eadd_int').click(function(){
                            $('.eint-res'+eirow).after('\
                                        <div class="eint-res'+(parseInt(eirow)+1)+'">\
                                            <div class="col-xs-4">\
                                            </div>\
                                            <div class="col-xs-7">\
                                                <select class="form-control" name="intIntegrating['+(parseInt(eirow)+1)+']">\
                                                    <option value="">กรุณาเลือก</option>\
                                                    <?php
                                                    foreach ($inttype as $value) {
                                                        echo '<option value="'.$value['itt_id'].'">'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                                    }
                                                    ?></select>\
                                            </div>\
                                            <div class="col-xs-1">\
                                                <button class="btn bg-red edel_int" value="'+(parseInt(eirow)+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                                            </div>\
                                        </div>');
                            eirow++;
                            $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
                            window.href = '#';
                            return false;
                        });
                        $(document).on('click', '.edel_int', function(){
                            // alert($(this).attr('key'));
                            if($(this).attr('key') != ""){

                                $.ajax({
                                    url: "<?php echo site_url('c_research/delete_intconnect'); ?>",
                                    method:'post',
                                    data: {
                                        inc_id: $(this).attr('key')
                                    }
                                });
                            }
                            $('.eint-res'+$(this).parent().children().attr('value')).remove();
                            window.href = '#';
                            epirow++;
                            if(eirow == epirow){
                                eirow = epirow = 0;
                            }
                            return false;
                        });
                    });
                },
                error:function(err){

                }
            });
        });
        $('.edt.JN').click(function(){
            $.ajax({
                url: "<?php echo site_url('c_research/get_journalById'); ?>",
                method:'post',
                data: {
                    res_id: $(this).attr('data'),
                },
                success:function(res){
                    $('.edit-box.JN').children().remove();
                    $('.edit-box.JN').append(res);
                    $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
                    $('input.tagsinput').tagsinput({trimValue: true});
                    $('.bootstrap-tagsinput input').removeAttr('style');
                    $('.bootstrap-tagsinput input').css('width', '100% !important');
                    $(function(){
                        var em2Row = $('#researcherCount').val();
                        var epm2Row = 0;

                        $('#eadd2_mem').click(function(){
                            $('.emem2-res'+em2Row).after('<div class="emem2-res'+(parseInt(em2Row)+1)+'">\
                                            <div class="col-xs-9">\
                                                <select class="form-control" name="researchName['+(parseInt(em2Row)+1)+']">\
                                                    <option value="">กรุณาเลือก</option>\
                                                    <?php
                                                    echo '<optgroup label="Personnel">';
                                                    foreach ($user as $value) {
                                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    echo '<optgroup label="Other">';
                                                    foreach ($student as $value) {
                                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    ?>
                                                </select>\
                                            </div>\
                                            <div class="col-xs-2">\
                                                <input type="text" class="form-control" name="researchSequence['+(parseInt(em2Row)+1)+']" placeholder="1"/>\
                                            </div>\
                                            <div class="col-xs-1">\
                                                <button class="btn bg-red edel_mem2" value="'+(parseInt(em2Row)+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                                            </div>\
                                        </div>');
                            em2Row++;
                            window.href = '#';
                            return false;
                        });
                        $(document).on('click', '.edel_mem2', function(){
                            // alert($(this).parent().children().attr('value'));
                            if($(this).attr('key') != ""){
                                $.ajax({
                                    url: "<?php echo site_url('c_research/delete_researcher'); ?>",
                                    method:'post',
                                    data: {
                                        rer_id: $(this).attr('key'),
                                    }
                                });
                            }
                            $('.emem2-res'+$(this).parent().children().attr('value')).remove();
                            window.href = '#';
                            epm2Row++;
                            if(em2Row == epm2Row){
                                em2Row = epm2Row = 0;
                            }
                            return false;
                        });
                    });
                },
                error:function(err){

                }
            });
        });
        $('.edt.PC').click(function(){
            $.ajax({
                url: "<?php echo site_url('c_research/get_proceedingById'); ?>",
                method:'post',
                data: {
                    res_id: $(this).attr('data'),
                },
                success:function(res){
                    $('.edit-box.PC').children().remove();
                    $('.edit-box.PC').append(res);
                    $('.dateRange').daterangepicker({timePicker: false, format: 'DD/MM/YYYY'});
                    $('input.tagsinput').tagsinput({trimValue: true});
                    $('.bootstrap-tagsinput input').removeAttr('style');
                    $('.bootstrap-tagsinput input').css('width', '100% !important');
                    $(function(){
                        var em3Row = $('#researcher3Count').val();
                        var epm3Row = 0;

                        $('#eadd3_mem').click(function(){
                            $('.emem3-res'+em3Row).after('<div class="emem3-res'+(parseInt(em3Row)+1)+'">\
                                            <div class="col-xs-9">\
                                                <select class="form-control" name="researchName['+(parseInt(em3Row)+1)+']">\
                                                    <option value="">กรุณาเลือก</option>\
                                                    <?php
                                                    echo '<optgroup label="Personnel">';
                                                    foreach ($user as $value) {
                                                        echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    echo '<optgroup label="Other">';
                                                    foreach ($student as $value) {
                                                        echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                                    }
                                                    echo '</optgroup>';
                                                    ?>
                                                </select>\
                                            </div>\
                                            <div class="col-xs-2">\
                                                <input type="text" class="form-control" name="researchSequence['+(parseInt(em3Row)+1)+']" placeholder="1"/>\
                                            </div>\
                                            <div class="col-xs-1">\
                                                <button class="btn bg-red edel_mem3" value="'+(parseInt(em3Row)+1)+'" onclick="return false"><i class="fa fa-close"></i></button>\
                                            </div>\
                                        </div>');
                            em3Row++;
                            window.href = '#';
                            return false;
                        });
                        $(document).on('click', '.edel_mem3', function(){
                            // alert($(this).parent().children().attr('value'));
                            if($(this).attr('key') != ""){
                                $.ajax({
                                    url: "<?php echo site_url('c_research/delete_researcher'); ?>",
                                    method:'post',
                                    data: {
                                        rer_id: $(this).attr('key'),
                                    }
                                });
                            }
                            $('.emem3-res'+$(this).parent().children().attr('value')).remove();
                            window.href = '#';
                            epm3Row++;
                            if(em3Row == epm3Row){
                                em3Row = epm3Row = 0;
                            }
                            return false;
                        });
                    });
                },
                error:function(err){

                }
            });
        });
    });

    ///////// UPDATE
    $(function(){
        $('.submit_edit_PJ').on('click', '.myformedt.PJ', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/update_project_validate'); ?>",
                data: $('.myformedt.PJ').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.projectTitleEn.ePJ').html(obj.projectTitleEn);
                        $('.error.projectTitleTh.ePJ').html(obj.projectTitleTh);
                        $('.error.ePJ.donorEn').html(obj.donorEn);
                        $('.error.ePJ.donorTh').html(obj.donorTh);
                        $('.error.ePJ.yearFund').html(obj.yearFund);
                        $('.error.ePJ.abstract').html(obj.abstract);
                        $('.error.ePJ.key').html(obj.key);
                        $('.error.ePJ.status').html(obj.errstatus);
                        $('.error.ePJ.type').html(obj.errtype);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_edit_PJ').submit();
                    }
                    else
                    {
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
        $('.submit_edit_JN').on('click', '.myformedt.JN', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/update_journal_validate'); ?>",
                data: $('.myformedt.JN').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.eJN.projectEn').html(obj.projectEn);
                        $('.error.eJN.projectTh').html(obj.projectTh);
                        $('.error.eJN.titleEn').html(obj.titleEn);
                        $('.error.eJN.titleTh').html(obj.titleTh);
                        $('.error.eJN.journal').html(obj.journal);
                        $('.error.eJN.year').html(obj.year);
                        $('.error.eJN.month').html(obj.month);
                        $('.error.eJN.page').html(obj.page);
                        $('.error.eJN.cluster').html(obj.cluster);
                        $('.error.eJN.track').html(obj.track);
                        $('.error.eJN.level').html(obj.level);
                        $('.error.eJN.key').html(obj.errkey);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_edit_JN').submit();
                    }
                    else
                    {
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
        $('.submit_edit_PC').on('click', '.myformedt.PC', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/update_proceeding_validate'); ?>",
                data: $('.myformedt.PC').serialize(),
                success: function(response){
                    var obj = jQuery.parseJSON(response);
                    if(obj.message == 'fail')
                    {
                        $('.error.ePC.projectEn').html(obj.projectEn);
                        $('.error.ePC.projectTh').html(obj.projectTh);
                        $('.error.ePC.titleEn').html(obj.titleEn);
                        $('.error.ePC.titleTh').html(obj.titleTh);
                        $('.error.ePC.conference').html(obj.conference);
                        $('.error.ePC.place').html(obj.place);
                        $('.error.ePC.date').html(obj.date);
                        $('.error.ePC.year').html(obj.year);
                        $('.error.ePC.month').html(obj.month);
                        $('.error.ePC.page').html(obj.page);
                        $('.error.ePC.cluster').html(obj.cluster);
                        $('.error.ePC.track').html(obj.track);
                        $('.error.ePC.level').html(obj.level);
                        $('.error.ePC.key').html(obj.errkey);
                    }else if(obj.message == 'success'){
                        // alert("success"+$('#form_PJ').html());
                        $('#form_edit_PC').submit();
                    }
                    else
                    {
                    }
                },
                error: function(){
                    alert('Error');
                }
            });     
        });
    })

    //////// DELETE
    $('.del_PJ').click(function(){
        $('#deleteId.PJ').attr('value', $(this).attr('data'));
    });
    $('.del_JN').click(function(){
        $('#deleteId.JN').attr('value', $(this).attr('data'));
    });
    $('.del_PC').click(function(){
        $('#deleteId.PC').attr('value', $(this).attr('data'));
    });
    //validate other researcher
    $('#otherSubmit').click(function(){
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('c_research/otherResearcher_validate'); ?>",
            data: $('.createOther').serialize(),
            success: function(response){
                var obj = jQuery.parseJSON(response);
                if(obj.message == 'fail')
                {
                    $('.error.ename').html(obj.ename);
                    $('.error.elastName').html(obj.elastname);
                    $('.error.tname').html(obj.tname);
                    $('.error.tlastName').html(obj.tlastname);
                }else if(obj.message == 'success'){
                    // alert("success"+$('#form_PJ').html());
                    $('.createOther').submit();
                }
                else
                {
                    alert("error !!!!! ติกต่อ เจ้าหน้าด่วน")
                    // window.location.href = "<?php echo site_url('c_research'); ?>";
                }
            },
            error: function(err){
                alert(err);
            }
        });
        return false;
    });
    $(function(){
        $('.otherResearch').click(function(){
            $('.createOther').attr('action', '<?php echo site_url('c_research/insert_otherResearcher'); ?>');
            $('.otherEName').val('');
            $('.otherELastName').val('');
            $('.otherTName').val('');
            $('.otherTLastName').val('');

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('c_research/get_other_researcher'); ?>",
                data: $('.createOther').serialize(),
                success: function(response){
                    $('.tableOtherResearcher').html(response);
                    $('#datatable').dataTable({
                      "bPaginate": true,
                      "bLengthChange": true,
                      "bFilter": true,
                      "bSort": true,
                      "bInfo": true,
                      "bAutoWidth": false
                    });
                    $('.edt-other').on('click', function(){
                        $('.createOther').attr('action', '<?php echo site_url('c_research/update_otherResearcher'); ?>');
                        $('.createOther').append('<input type="hidden" value="'+$(this).attr('data')+'" name="id"/>');
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('c_research/get_other_researcher_byId'); ?>",
                            data: {
                                id: $(this).attr('data')
                            },
                            success: function(response){
                                var obj = jQuery.parseJSON(response);
                                $('.otherEName').val(obj.ename);
                                $('.otherELastName').val(obj.elastname);
                                $('.otherTName').val(obj.tname);
                                $('.otherTLastName').val(obj.tlastname);
                            }
                        });
                    });
                    $('.del-other').click(function(){
                        $('#deleteOther').attr('value', $(this).attr('data'));
                    });
                },
                error: function(){
                    alert('Error');
                }
            });
        });
    });

    $('#projectTitleEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#projectTitleTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#donorEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#donorTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#titleEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#titleTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#projectEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#projectTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#titleEn_p').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#titleTh_p').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#projectEn_p').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#projectTh_p').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });

</script>
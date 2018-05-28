<link href="<?php echo base_url('/croppic/assets/css/croppic.css'); ?>" rel="stylesheet">
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ข้อมูลทั่วไป
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">                            
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">แก้ไขรูปโปรไฟล์</h3>
          </div>
            <div class="box-body">
              <div class="form-group">
                <div id="cropContainerModal" style="width:290px;height:370px;padding:0px;">
                  <img class="croppedImg" src="<?php echo site_url('getpic?image='.$pic_path); ?>">
                </div>
                <p class="help-block">290x370 pixel. Type JPG or PNG</p>
              </div>
            </div><!-- /.box-body -->
        </div> 
      </div>                           
      <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">กรอกข้อมูลทั่วไป</h3>
          </div>
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

           <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_general_information/index/'.$ret); ?>">
            <div class="box-body">
			<div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="TID">รหัสประจำตัว<?php echo form_error('TID'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='TID' class="form-control" name="TID" placeholder="" value="<?php echo $person['usr_tid'];?>">
                  </div>
                </div>
				</div>
              <div class="row">
                <?php //if($person['usr_istea'] === '1'):?>
                  <!-- <div id="normal" style="display:none;"> -->
                <?php //else:?>
                  <div id="normal">
                <?php //endif;?>
                  <div class="form-group col-xs-12 col-sm-12 col-md-6">
                      <label for="acrENG">คำนำหน้า</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <select class="form-control" name="prefix">
                              <option value="0" selected>Choose one (เลือก 1 รายการ)</option>
                              <?php foreach ($prefix as $key) {
                              if($key['pfx_id'] == $person['pfx_id']) {?>
                                  <option value="<?php echo $key['pfx_id'];?>" selected><?php echo $key['pfxname'];?></option>
                              <?php } else{ ?>
                                  <option value="<?php echo $key['pfx_id'];?>"><?php echo $key['pfxname'];?></option>
                              <?php }
                              }?>
                        </select>
                      </div>
                  </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-2">
                    <label for="Professor">อาจารย์</label>
                    <div class="input-group">
                      <?php if($person['usr_istea'] === '1'):?>
                        <input type="checkbox" id="ckbox" name="usr_istea" value="yes" onchange="chk();" checked/>
                      <?php else:?>
                        <input type="checkbox" id="ckbox" name="usr_istea" value="yes" onchange="chk();"/>
                      <?php endif;?>
                    </div>
                    <script>
                      function chk(){
                        var norm = document.getElementById("normal");
                        var tea = document.getElementById("teacher");
                        var checkbox = document.getElementById("ckbox");

                        if (checkbox.checked) {
                          //norm.setAttribute("style", "display:none");
                          tea.setAttribute("style", "");
                        } else {
                          //norm.setAttribute("style", "");
                          tea.setAttribute("style", "display:none");
                        };
                      }
                    </script>
                </div>
              </div>
              <?php if($person['usr_istea'] === '1'):?>
                  <div id="teacher" class="row">
                <?php else:?>
                  <div id="teacher" style="display:none!important;" class="row">
                <?php endif;?>
                  <div class="form-group col-xs-12 col-sm-12 col-md-6">
                      <label for="acrENG">ชื่อทางวิชาการ</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-graduation-cap"></i>
                        </div>
                        <select class="form-control" name="acrtitle">
                          <option value="0" selected>Choose one (เลือก 1 รายการ)</option>
                          <?php foreach ($acr as $key) {
                              if($key['acr_id'] == $person['acr_id']) {?>
                              <option value="<?php echo $key['acr_id'];?>" selected><?php echo $person['academictitle'];?></option>
                          <?php } else{ ?>
                              <option value="<?php echo $key['acr_id'];?>"><?php echo $key['arcname'];?></option>
                          <?php }
                          }?>
                        </select>
                      </div>
                  </div>
                  
                </div>
				
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameTH">ชื่อ (TH) <?php echo form_error('nameTH'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxFirstTh' class="form-control" name="nameTH" placeholder="Fill your name in Thai" value="<?php echo $person['usr_tfname'];?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameTH">นามสกุล (TH)  <?php echo form_error('lnameTH'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxLastTh' class="form-control" name="lnameTH" placeholder="Fill your lastname in Thai" value="<?php echo $person['usr_tlname'];?>">
                  </div>
                </div>
              </div><!-- /.form group -->
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameENG">ชื่อ (EN) <?php echo form_error('nameENG'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxFirstEn' class="form-control" name="nameENG" placeholder="Fill your name in English" value="<?php echo $person['usr_efname'];?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameENG">นามสกุล (EN) <?php echo form_error('lnameENG'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxLastEn' class="form-control" name="lnameENG" placeholder="Fill your lastname in English" value="<?php echo $person['usr_elname'];?>">
                  </div>
                </div>
              </div>
			  <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="Born">ปีเกิด <?php echo form_error('Born'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="date" id="usr_born" class="form-control" name="Born" placeholder="" value="<?php echo $person['usr_born'];?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="Location">ที่อยู่ <?php echo form_error('Location'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxLastEn' class="form-control" name="Location" placeholder="" value="<?php echo $person['usr_location'];?>">
                  </div>
                </div>
              </div>
			  <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="Campus">สำนัก/คณะ <?php echo form_error('Campus'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxFirstEn' class="form-control" name="Campus" placeholder="" value="<?php echo $person['usr_campus'];?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="Faculty">วิทยาเขต <?php echo form_error('Faculty'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='textBoxLastEn' class="form-control" name="Faculty" placeholder="" value="<?php echo $person['usr_faculty'];?>">
                  </div>
                </div>
              </div>
              <hr style="margin-top: 0px; margin-bottom: 10px;" />
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="posTH">สาขาวิชา</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building"></i>
                    </div>
                    <select class="form-control" name="dep">
                          <?php foreach ($dep as $key) {
                            if($key['dep_id'] == $person['dep_id']) {?>
                            <option value="<?php echo $key['dep_id'];?>" selected><?php echo $person['department'];?></option>
                        <?php } else{ ?>
                            <option value="<?php echo $key['dep_id'];?>"><?php echo $key['department'];?></option>
                        <?php }
                        }?>
                    </select>
                  </div>
                </div>

				<div class="col-xs-12 col-sm-12 col-md-6">
                                        <!-- text input -->
                                        <label>ปีที่เข้าทำงาน <?php echo form_error('datework'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datework" name="datework" placeholder="ใส่ปีที่เข้าทำงาน" value="<?php echo $person['usr_dateforwork'];?>"/>
                                        </div>
                                    </div>
							
              </div>
			  <div class="row">
			  <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="posTH">ตำแหน่งการทำงาน</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building"></i>
                    </div>
                    <select class="form-control" name="pos">
                          <?php foreach ($pos as $key) {
                            if($key['pos_id'] == $person['pos_id']) {?>
                            <option value="<?php echo $key['pos_id'];?>" selected><?php echo $person['position'];?></option>
                        <?php } else{ ?>
                            <option value="<?php echo $key['pos_id'];?>"><?php echo $key['position'];?></option>
                        <?php }
                        }?>
                    </select>
                  </div>
                </div>
			  <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="salary">เงินเดือน <?php echo form_error('salary'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" id='salary' class="form-control" name="salary" placeholder="" value="<?php echo $person['usr_salary'];?>">  
                  </div>
                </div>
				</div>
              <hr style="margin-top: 0px; margin-bottom: 10px;" />
              <div class="row">
                <div class="form-group col-xs-10 col-sm-10 col-md-5" id="telnum">
                  <label>หมายเลขเบอร์โทรศัพท์</label>

                  <?php $i = 0; if(empty($tel)):?>
                  <div class="input-group" id="telnum">
                      <div class="input-group-btn">
                        <button id="btnLabel<?php echo $i;?>" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-phone"></i>&nbsp;&nbsp;Mobile (มือถือ) &nbsp;<input type="hidden" name="etellabel" value="Mobile"/><input type="hidden" name="ttellabel" value="มือถือ"/><input type="hidden" name="telID" value=""/>
                        <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-phone','Mobile','มือถือ')"><a><i class="fa fa-phone"></i>&nbsp;Mobile (มือถือ)</a></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-home','Home','บ้าน')"><a><i class="fa fa-home"></i>&nbsp;Home (บ้าน)</a></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-building','Work','ที่ทำงาน')"><a><i class="fa fa-building"></i>&nbsp;Work (ที่ทำงาน)</a></li>
                          <li class="divider" style="margin:0px;"></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-plus-circle','Other','อื่นๆ')"><a><i class="fa fa-plus-circle"></i>&nbsp;Other (อื่นๆ)</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                      <input type="text" id='textBoxPhone'  maxlength="10" placeholder="Fill your nomber" class="form-control" name="telnum" />
                    </div><!-- /input-group -->
                  <?php $i++; endif;?>
                  <?php foreach ($tel as $key) {?>
                    <div class="input-group" id="telnum<?php echo $i;?>">
                      <div class="input-group-btn">
                        <button id="btnLabel<?php echo $i;?>" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:150px;text-align:right;">
                          <?php switch($key['tel']) {
                            case "Mobile (มือถือ)": ?>
                              <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $key['tel'];?>&nbsp;<input type="hidden" name="etellabel[]" value="Mobile"/><input type="hidden" name="ttellabel[]" value="มือถือ"/>
                            <?php break;
                            case "Home (บ้าน)": ?>
                              <i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo $key['tel'];?>&nbsp;<input type="hidden" name="etellabel[]" value="Home"/><input type="hidden" name="ttellabel[]" value="บ้าน"/>
                            <?php break;
                            case "Work (ที่ทำงาน)": ?>
                              <i class="fa fa-building"></i>&nbsp;&nbsp;<?php echo $key['tel'];?>&nbsp;<input type="hidden" name="etellabel[]" value="Work"/><input type="hidden" name="ttellabel[]" value="ที่ทำงาน"/>
                            <?php break;
                            case "Other (อื่นๆ)": ?>
                              <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<?php echo $key['tel'];?>&nbsp;<input type="hidden" name="etellabel[]" value="Other"/><input type="hidden" name="ttellabel[]" value="อื่นๆ"/>
                            <?php break; 
                          } ?>
                        <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-phone','Mobile','มือถือ')"><a><i class="fa fa-phone"></i>&nbsp;Mobile (มือถือ)</a></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-home','Home','บ้าน')"><a><i class="fa fa-home"></i>&nbsp;Home (บ้าน)</a></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-building','Work','ที่ทำงาน')"><a><i class="fa fa-building"></i>&nbsp;Work (ที่ทำงาน)</a></li>
                          <li class="divider" style="margin:0px;"></li>
                          <li onClick="changelabel('btnLabel<?php echo $i;?>','fa-plus-circle','Other','อื่นๆ')"><a><i class="fa fa-plus-circle"></i>&nbsp;Other (อื่นๆ)</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                      <input type="text" id='textBoxPhone'  maxlength="10" placeholder="Fill your nomber" class="form-control" name="telnum[]" value="<?php echo $key['tel_number'];?>"/><input type="hidden" name="telID[]" value="<?php echo $key['tel_id'];?>"/>
                    </div><!-- /input-group -->
                    <?php $i++; 
                  } ?>
                  </div><!-- /form group -->
                <div class="form-group col-xs-1 col-sm-1 col-md-1" id="bt-em" style="padding-left: 0px;">
                  <label for="mail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <div class="input" id="optionBtn">
                    <?php $i = 0; if(empty($tel)):?>
                      <button onClick="add()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    <?php $i++; endif;?>
                    <?php foreach ($tel as $key) {
                      if($i == 0) {?>
                      <button onClick="add()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                      <?php } else { ?>
                      <button class="btn btn-danger" id="delbtn<?php echo $i;?>" type="button" onclick="del(telnum<?php echo $i;?>,delbtn<?php echo $i;?>)"><i class="fa fa-minus"></i></button>
                      <?php }
                      $i++;
                    } ?>
                  </div>
                  <script>
                  function changelabel(id,icon,elabel,tlabel){
                    document.getElementById(id).innerHTML = '<i class="fa '+icon+'"></i>&nbsp;&nbsp;'+elabel+'('+tlabel+')'+'&nbsp;<input type="hidden" name="etellabel[]" value="'+elabel+'"/><input type="hidden" name="ttellabel[]" value="'+tlabel+'"/><span class="fa fa-caret-down"></span>';
                  }
                  var count = <?php echo $i;?>;
                  var div = document.getElementById("telnum");
                  var deldiv = document.getElementById("optionBtn");
                  function add() {
                    var divGroupInput = document.createElement("div");
                    divGroupInput.setAttribute("class", "input-group");
                    divGroupInput.innerHTML = '<div class="input-group-btn">\
                                              <button id="btnLabel'+count+'" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:150px;text-align:right;"><i class="fa fa-phone"></i>&nbsp;&nbsp;Mobile (มือถือ)<input type="hidden" name="etellabel[]" value="Mobile"/><input type="hidden" name="ttellabel[]" value="มือถือ"/><span class="fa fa-caret-down"></span></button>\
                                                <ul class="dropdown-menu">\
                                                  <li onClick="changelabel(\'btnLabel'+count+'\',\'fa-phone\',\'Mobile\',\'มือถือ\')"><a><i class="fa fa-phone"></i>&nbsp;Mobile (มือถือ)</a></li>\
                                                  <li onClick="changelabel(\'btnLabel'+count+'\',\'fa-home\',\'Home\',\'บ้าน\')"><a><i class="fa fa-home"></i>&nbsp;Home (บ้าน)</a></li>\
                                                  <li onClick="changelabel(\'btnLabel'+count+'\',\'fa-building\',\'Work\',\'ที่ทำงาน\')"><a><i class="fa fa-building"></i>&nbsp;Work (ที่ทำงาน)</a></li>\
                                                  <li class="divider" style="margin:0px;"></li>\
                                                  <li onClick="changelabel(\'btnLabel'+count+'\',\'fa-plus-circle\',\'Other\',\'อื่นๆ\')"><a><i class="fa fa-plus-circle"></i>&nbsp;Other (อื่นๆ)</a></li>\
                                                </ul>\
                                              </div>\
                    <input type="text" placeholder="Fill your nomber" name="telnum[]" class="form-control"/><input type="hidden" name="telID[]" value=""/>';
                    divGroupInput.setAttribute("id", "telnum"+count);
                    div.appendChild(divGroupInput);
                    
                    var divBtn = document.createElement("div");
                    divBtn.setAttribute("class", "input");
                    divBtn.innerHTML = '<button class="btn btn-danger" type="button" onclick="del(telnum'+count+',delbtn'+count+')"><i class="fa fa-minus"></i></button>';
                    divBtn.setAttribute("id", "delbtn"+count);
                    deldiv.appendChild(divBtn);

                    count++;
                  }
                  function del(id,delid){
                    div.removeChild(id);
                    deldiv.removeChild(delid);
                  }
                  </script>
                </div>
                <div class="form-group  col-xs-10 col-sm-10 col-md-5" id="e-mail">
                  <label for="mail">อีเมล</label>
                  <?php $i = 0; if(empty($mail)):?>
                      <div class="input" id="mail<?php echo $i;?>">
                        <input type="text" id="mail_1" class="form-control" name="mail[]" placeholder="Fill your mail"/><input type="hidden" name="mailID[]" value=""/>
                      </div>
                  <?php $i++; endif;
                  foreach ($mail as $key) { ?>
                  <div class="input" id="mail<?php echo $i;?>">
                    <input type="text" id="mail_1" class="form-control" name="mail[]" placeholder="Fill your mail" value="<?php echo $key['mail_name'];?>"/><input type="hidden" name="mailID[]" value="<?php echo $key['mail_id'];?>"/>
                  </div>
                    <?php $i++;
                  } ?>
                </div>
                <div class="form-group  col-xs-1 col-sm-1 col-md-1" style="padding-left: 0px;">
                  <label for="plus">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <div class="input" id="mailBtn">
                    <?php $i = 0; if(empty($mail)):?>
                      <div class="input" id="mail<?php echo $i;?>">
                        <button onClick="mailadd()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                      </div>
                    <?php $i++; endif;
                    foreach ($mail as $key) { 
                        if($key['mail_name'] == $mail['0']['mail_name']) {?>
                          <button onClick="mailadd()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                      <?php } else { ?>
                          <button class="btn btn-danger" id="maildelbtn<?php echo $i;?>" type="button" onclick="maildel(mail<?php echo $i;?>,maildelbtn<?php echo $i;?>)"><i class="fa fa-minus"></i></button>
                      <?php }
                        $i++;
                    } ?>
                  </div>
                  <script>
                  var mailcount = <?php echo $i;?>;
                  var maildiv = document.getElementById("e-mail");
                  var btndiv = document.getElementById("mailBtn");
                  function mailadd() {
                    var divMainInput = document.createElement("div");
                    divMainInput.setAttribute("class", "input");
                    divMainInput.innerHTML = '<div class="input">\
                                                  <input type="text" name="mail[]" class="form-control" id="mail" placeholder="Fill your mail"><input type="hidden" name="mailID[]" value=""/>\
                                                </div>';
                    divMainInput.setAttribute("id", "mail"+mailcount);
                    maildiv.appendChild(divMainInput);
                    
                    var mailDelButton = document.createElement("div");
                    mailDelButton.setAttribute("class", "input");
                    mailDelButton.innerHTML = '<button class="btn btn-danger" type="button" onclick="maildel(mail'+mailcount+',maildelbtn'+mailcount+')"><i class="fa fa-minus"></i></button>';
                    mailDelButton.setAttribute("id", "maildelbtn"+mailcount);
                    btndiv.appendChild(mailDelButton);

                    mailcount++;
                  }
                  function maildel(id,delid){
                    maildiv.removeChild(id);
                    btndiv.removeChild(delid);
                  }
                  </script>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save</button>
            </div>
          </form>
        </div> 
      </div>

    </div><!-- /.row (main row) -->
  </div>
</aside><!-- /.right-side -->
   
  <script src="<?php echo base_url('/croppic/croppic.js'); ?>"></script>

  <script type="text/javascript">
    var croppicContainerModalOptions = {
        uploadUrl:'<?php echo site_url("c_general_information/saveToFile/".$person["usr_id"]); ?>',
        cropUrl:'<?php echo site_url("c_general_information/cropToFile/".$person["usr_id"]); ?>',
        modal:true,
        imgEyecandyOpacity:0.4,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
    }
    var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);

    $('#textBoxFirstEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });
    $('#textBoxLastEn').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });
    $('#textBoxFirstTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#textBoxLastTh').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#textBoxPhone').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^0-9]/g,''))
        });
    $('#mail_1').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9@-_.]/g,''))
        });
	$('#TID').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^0-9]/g,''))
        });
	$('#salary').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^0-9]/g,''))
        });
		
  </script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
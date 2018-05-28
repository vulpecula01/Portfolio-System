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
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ประวัติการศึกษา
                <small>
                    <?php echo $this->session->flashdata('result');?>
                </small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box box-info">
                        <form role="form" action="<?php echo site_url('c_education_background/index/'.$ret); ?>" method="post">
                            <div class="box-header">
                                <h3 class="box-title"> กรอกข้อมูลประวัติการศึกษา</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                    	<label for="inputEduc">ระดับการศึกษา <?php echo form_error('edl_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-mortar-board "></i>
											</div>
                                            <select id="inputEduc" name="edl_id" class="form-control" datatype="" onchange="edl_change(this)">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($edl as $value) { ?> 
                                                    <option value="<?php echo $value['edl_id'];?>"<?php echo (set_value('edl_id') == $value['edl_id']?' selected':''); ?>><?php echo $value['edl_ename'].' ('.$value['edl_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                    	<label for="inputDegree">ปริญญา <?php echo form_error('deg_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-mortar-board "></i>
											</div>

                                            <select id="inputDegree" name="deg_id" class="form-control" datatype="" onchange="deg_change(this)">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($deg as $value) { ?> 
                                                    <option value="<?php echo $value['deg_id'];?>" dataedl="<?php echo $value['edl_id'];?>" <?php echo (set_value('deg_id') == $value['deg_id']?' selected':''); ?>><?php echo $value['deg_ename'].' ('.$value['deg_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-5">
                                    	<label for="inputDepartment">วิชาเอก <?php echo form_error('maj_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-mortar-board "></i>
											</div>
                                            <select id="inputDepartment" name="maj_id"  class="form-control">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($maj as $value) { ?> 
                                                    <option value="<?php echo $value['maj_id'];?>"<?php echo (set_value('maj_id') == $value['maj_id']?' selected':''); ?>><?php echo $value['maj_ename'].' ('.$value['maj_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                    	<label for="inputYear">ปีที่สำเร็จการศึกษา <?php echo form_error('edb_yeargraduate'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-mortar-board "></i>
											</div>
                                            <select name="edb_yeargraduate" class="form-control">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-40) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('edb_yeargraduate') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                    	<label for="inputCountry">ประเทศ <?php echo form_error('cou_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-institution"></i>
											</div>
                                            <select id="inputCountry" name="cou_id" class="form-control" datatype="" onchange="cou_change(this)">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($cou as $value) { ?> 
                                                    <option value="<?php echo $value['cou_id'];?>" <?php echo (set_value('cou_id') == $value['cou_id']?' selected':''); ?>><?php echo $value['cou_ename'].' ('.$value['cou_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-5">
                                    	<label for="inputInstitute">สถาบัน <?php echo form_error('ins_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-institution"></i>
											</div>
                                            <select id="inputInstitute" name="ins_id" class="form-control" datatype="" onchange="ins_change(this)">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($ins as $value) { ?> 
                                                    <option value="<?php echo $value['ins_id'];?>" datacou="<?php echo $value['cou_id'];?>"<?php echo (set_value('ins_id') == $value['ins_id']?' selected':''); ?>><?php echo $value['ins_ename'].' ('.$value['ins_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    	<label for="inputThesis">หัวข้อวิทยานิพนธ์ (TH) <?php echo form_error('edb_tthesistopic'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-book"></i>
											</div>
                                            <input type="text" class="form-control" id="edb_tthesistopic" name="edb_tthesistopic"   placeholder="กรุณากรอกหัวข้อวิทยานิพนธ์เป็นภาษาไทย" value="<?php echo set_value('edb_tthesistopic'); ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    	<label for="inputThesis">หัวข้อวิทยานิพนธ์ (EN) <?php echo form_error('edb_ethesistopic'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-book"></i>
											</div>
                                            <input type="text" class="form-control" id="edb_ethesistopic" name="edb_ethesistopic"   placeholder="กรุณากรอกหัวข้อวิทยานิพนธ์เป็นภาษาอังกฤษ" value="<?php echo set_value('edb_ethesistopic'); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix" >
                                <button type="submit" class="btn btn-success pull-right ">
                                    <i class="fa fa-check"></i> 
                                    บันทึก
                                </button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Education Background List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ระดับการศึกษา</th>
                                                <th>สถาบัน</th>
                                                <th>ปริญญา</th>
                                                <th>วิชาเอก</th>
                                                <th>ปีที่สำเร็จการศึกษา</th>
                                                <th>หัวข้อวิทยานิพนธ์</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach ($edb as $row):?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['edl_ename'];?></td>
                                                <td><?php echo $row['ins_ename'];?><br /><?php echo $row['cou_ename'];?></td>
                                                <td><?php echo $row['deg_ename'];?></td>
                                                <td><?php echo $row['maj_ename'];?></td>
                                                <td><?php echo $row['edb_yeargraduate'];?></td>
                                                <td><?php echo ($row['edb_ethesistopic'] == ""?"-":$row['edb_ethesistopic']);?></td>
                                                <td align="center">
                                                  <a type="button" class="edt close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#edit_1" aria-hidden="true" data="<?php echo $row['edb_id'];?>">
                                                    <i class="fa fa-edit"></i>
                                                  </a>
                                                  <a type="button" class="del close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['edb_id'];?>">
                                                  <i class="fa fa-trash-o"></i>
                                                  </a>
                                                </td>

                                            </tr>
                                            <?php $i++;?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div> <!-- /.second row --> 

        </section><!-- /.content -->
    </aside><!-- /.right-side -->

    <!-- COMPOSE MESSAGE MODAL -->
    <!-- model for edit -->
    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">  
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_education_background/update_self/'.$ret); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขประวัติการศึกษา</h4>
                    </div>
                    <div class="modal-body edit-box">
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="modal-footer clearfix">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
								ปิด
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> 
								บันทึก
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- model for delete -->
    <div class="modal fade" id="del_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i>  ลบประวัติการศึกษา</h4>
                </div>
                <form action="<?php echo site_url('c_education_background/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="edb_id" value=""/>
                    <div class="modal-body">
							คุณต้องการลบประวัติการศึกษาหรือไม่
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

    <!-- Page script -->
    <script type="text/javascript">

        function edl_change(obj){
            var t = obj.getAttribute("datatype");
            $.ajax({
                url: "<?php echo site_url('c_education_background/getDegreeByEdlId'); ?>",
                method:'post',
                data: {
                    edl_id: obj.value,
                },
                success:function(res){
                    $('#inputDegree'+t).children().remove();
                    $('#inputDegree'+t).append(res);
                },
                error:function(err){

                }
            });
        }

        function deg_change(obj){
            var type = obj.getAttribute("datatype");
            var t = obj.options[obj.selectedIndex].getAttribute('dataedl');
            if(t != null){
                $("#inputEduc"+type+" option[value='"+t+"']").prop('selected', true);
            }
        }

        function ins_change(obj){
            var type = obj.getAttribute("datatype");
            var t = obj.options[obj.selectedIndex].getAttribute('datacou');
            if(t != null){
                $("#inputCountry"+type+" option[value='"+t+"']").prop('selected', true);
            }
        }

        function cou_change(obj){
            var t = obj.getAttribute("datatype");
            $.ajax({
                url: "<?php echo site_url('c_education_background/getInstituteByCouId'); ?>",
                method:'post',
                data: {
                    cou_id: obj.value,
                },
                success:function(res){
                    $('#inputInstitute'+t).children().remove();
                    $('#inputInstitute'+t).append(res);
                },
                error:function(err){

                }
            });
        }

        $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_education_background/getById'); ?>",
                    method:'post',
                    data: {
                        edb_id: $(this).attr('data'),
                    },
                    success:function(res){
                        $('.edit-box').children().remove();
                        $('.edit-box').append(res);
                    },
                    error:function(err){

                    }
                });
            });
            $('.del').click(function(){
                $('#deleteId').attr('value', $(this).attr('data'));
            });
        });

        $(function(){
            $('.modal-dialog').on('submit', '.myformedt', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('c_education_background/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.edb_yeargraduate').html(obj.edb_yeargraduate);
                            $('.error.edb_tthesistopic').html(obj.edb_tthesistopic);
                            $('.error.edb_ethesistopic').html(obj.edb_ethesistopic);
                            $('.error.cou_id').html(obj.cou_id);
                            $('.error.edl_id').html(obj.edl_id);
                            $('.error.ins_id').html(obj.ins_id);
                            $('.error.deg_id').html(obj.deg_id);
                            $('.error.maj_id').html(obj.maj_id);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_education_background/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('error');
                    }
                });     
            });
        });
    </script>

    <script type="text/javascript">
    $(function () {
        $('#datatable').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });
      });

    $('#edb_tthesistopic').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#edb_ethesistopic').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });


    </script>

    
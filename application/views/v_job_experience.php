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
					ประสบการณ์การทำงาน
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
                    <div class="box box-info">
                        <form class="myform" data-toggle="validator" role="form" method="post">
                            <div class="box-header">
                                <h3 class="box-title">กรอกข้อมูลประสบการณ์การทำงาน</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <!-- Date dd/mm/yyyy -->
                                        <label for="fromyear">ปีที่เริ่มทำงาน <?php echo form_error('yearFrom'); ?></label>
                                        <div class="form-group">
                                            <select name="yearFrom" id="fromyear" onchange="onFromYearClick(this)" temp="_root" class="form-control">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-50) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('yearFrom') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div><!-- /.form group -->
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <!-- Date dd/mm/yyyy -->
                                        <label for="toyear_root">ปีที่สิ้นสุด  <?php echo form_error('yearTo'); ?></label>
                                        <div class="form-group">
                                            <select name="yearTo" id="toyear_root" class="form-control" <?php if(set_value('yearFrom')==""){?> disabled="disabled" <?php }?>>
                                                <option value="" selected>กรุณาเลือก</option>
                                                <option value='9999'>ปีปัจจุบัน</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-50) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('yearTo') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div><!-- /.form group -->
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <!-- text input -->
                                        <label>ประสบการณ์การทำงาน (TH) <?php echo form_error('jobexTH'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <input type="text" class="form-control" id="jobexTH" name="jobexTH" value="<?php echo set_value('jobexTH'); ?>" placeholder="กรุณากรอกประสบการณ์เป็นภาษาไทย"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <!-- Date dd/mm/yyyy -->
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <!-- text input -->
                                        <label>ประสบการณ์การทำงาน (EN) <?php echo form_error('jobexEN'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <input type="text" class="form-control" id="jobexEN"  name="jobexEN" value="<?php echo set_value('jobexEN'); ?>" placeholder="กรุณากรอกประสบการณ์เป็นภาษาอังกฤษ" />
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix" >
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-check"></i> 
                                    บันทึก
                                </button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                    <div class="box">

                        <div class="box-body table-responsive">
                            <!-- The time line -->
                            <ul class="timeline">
                                <!-- timeline time label -->
                                <?php 
                                $predatefrom = '';
                                $predateto = '';
                                foreach ($jobex as $value) { 
                                    if($value['jox_fromdate'] != $predatefrom || $value['jox_todate'] != $predateto){
                                        echo '<li class="time-label">
                                            <span class="bg-green">'
                                            .$value['jox_fromdate'].'-';
                                        echo ($value['jox_todate'] == '9999')?'present':$value['jox_todate'];
                                        echo '</span>
                                        </li>';
                                    $predatefrom = $value['jox_fromdate'];
                                    $predateto = $value['jox_todate'];
                                    } ?>
                                <li>
                                    <i class="fa fa-briefcase bg-aqua"></i>
                                    <div class="timeline-item">
                                        <ul class="list-group">
                                          <li class="list-group-item">
                                            <font style="margin-right:42px;"><?php echo $value['jox_ename']?></font>
                                            <button type="button" class="close del" data="<?php echo $value['jox_id']; ?>" data-toggle="modal" data-target="#del_1" aria-hidden="true">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <button type="button" class="close edt" data="<?php echo $value['jox_id']; ?>"  data-toggle="modal" data-target="#edit_1" aria-hidden="true">
                                                <i class="fa fa-edit"></i>&nbsp;
                                            </button>
                                          </li>
                                        </ul>
                                    </div>
                                </li>
                               <?php } ?>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->

    <!-- COMPOSE MESSAGE MODAL -->

    <!-- model for edit -->
    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_job_experience/update_self/'.$ret); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลประสบการณ์ทำงาน</h4>
                    </div>
                    <div class="box-body edit-box">
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix" >
                        <button type="reset" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
								ปิด
                        </button>
                        <button type="submit" class="btn btn-success pull-right ">
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลประสบการณ์ทำงาน</h4>
                </div>
                <form action="<?php echo site_url('c_job_experience/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="jox_id" value=""/>
                    <div class="modal-body">
							คุณต้องการลบข้อมูลประสบการณ์ทำงานหรือไม่
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
        function onFromYearClick(data){
            var fromyear = data.value;
            var d  = new Date();
            var n  = d.getFullYear();
            var id = data.getAttribute('temp');
            var toyear = document.getElementById("toyear"+id).value;
            if(fromyear != ""){
                var str    = "<option value=''>กรุณาเลือก</option>";
                str += "<option value='9999'>ปีปัจจุบัน</option>"
                for (var i = n; i >= fromyear; i--) {
                    if(toyear == i){
                        str += "<option value'"+i+"' selected>"+i+"</option>";
                    }else{
                        str += "<option value'"+i+"' >"+i+"</option>";
                    }
                };

                $('#toyear'+id).html(str);
                $('#toyear'+id).removeAttr("disabled", "disabled");
            }else{
                $('#toyear'+id).attr("disabled", "disabled");
            }
        }

        $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_job_experience/getById'); ?>",
                    method:'post',
                    data: {
                        jox_id: $(this).attr('data'),
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
                    url: "<?php echo site_url('c_job_experience/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.yearFrom').html(obj.yearFrom);
                            $('.error.yearTo').html(obj.yearTo);
                            $('.error.jobexTH').html(obj.jobexTH);
                            $('.error.jobexEN').html(obj.jobexEN);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_job_experience/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });
    
    $('#jobexTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#jobexEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });


    </script>
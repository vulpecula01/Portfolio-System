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
                ข้อมูลการอบรม
				<small>
                    <?php echo $this->session->flashdata('result');?>
                </small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">train</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                <!-- general form elements disabled -->
                    <div class="box box-info">
                        <form role="form" action="<?php echo site_url('c_train/index/'.$ret); ?>" method="post">
                            <div class="box-header">
                                <h3 class="box-title">Training</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>ชื่อการอบรม(EN) <?php echo form_error('trainEN'); ?></label>
                                            <input type="text" class="form-control" value="<?php echo set_value('trainEN'); ?>" id="trainEN" name="trainEN" placeholder="กรุณากรอกข้อมูล ..."/>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>ชื่อการอบรม (TH) <?php echo form_error('trainTH'); ?></label>
                                            <input type="text" class="form-control" value="<?php echo set_value('trainTH'); ?>" id="trainTH" name="trainTH" placeholder="กรุณากรอกข้อมูล ..."/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>ปีที่อบรม <?php echo form_error('year'); ?></label>
                                            <select class="form-control" name="year">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-40) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('year') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
										<div class="col-xs-6">
                                            <label>จำนวนชั่วโมงการอบรม <?php echo form_error('hour'); ?></label>
                                            <input type="text" class="form-control"  id="hour" name="hour" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('hour'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>สถานที่ (EN) <?php echo form_error('locationEN'); ?></label>
                                            <input type="text" class="form-control"  id="locationEN" name="locationEN" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('locationEN'); ?>"/>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>สถานที่ (TH) <?php echo form_error('locationTH'); ?></label>
                                            <input type="text" class="form-control"  id="locationTH" name="locationTH" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('locationTH'); ?>"/>
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

            <!-- show data -->
                <div class="col-md-12">
                    <div class="box">
                        <!-- <div class="box-header">
                            <h3 class="box-title">train List</h3>
                        </div> -->
                        <div class="box-body">
                    <!-- The time line -->
                        <ul class="timeline">
                            <!-- timeline time label -->
                            <?php $predate = '';
                            foreach ($train as $value) { 
                                if($value['tr_date']!=$predate){
                                    echo '<li class="time-label">
                                        <span class="bg-green" style="width:65px;text-align:center;">'
                                        .$value['tr_date']
                                        .'</span>
                                    </li>';
                                $predate = $value['tr_date'];
                                } ?>
                            <li>
                                <i class="fa fa-trophy bg-aqua"></i>
                                <div class="timeline-item">
                                    <ul class="list-group">
                                      <li class="list-group-item">
                                        <font style="margin-right:42px;"><?php echo $value['tr_ename'].'&nbsp;('.$value['tr_date'].')&nbsp;('.$value['tr_elocation'] . ') &nbsp;&nbsp;&nbsp;จำนวน     '.$value['tr_hour']." Hours"; ?>
                                            <br><?php echo $value['tr_tname'].'&nbsp;('.($value['tr_date']+543).')&nbsp;'.$value['tr_tlocation']; ?></font>
                                        <button type="button" class="close del" data="<?php echo $value['tr_id']; ?>" data-toggle="modal" data-target="#del_1" aria-hidden="true">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        <button type="button" class="close edt" data="<?php echo $value['tr_id']; ?>"  data-toggle="modal" data-target="#edit_1" aria-hidden="true">
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
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_train/update_self/'.$ret); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลการอบรม</h4>
                    </div>
                    <div class="box-body edit-box">
                            <!-- text input -->
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลการอบรม</h4>
                </div>
                <form action="<?php echo site_url('c_train/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="id" value="1"/>
                    <div class="modal-body">
							คุณต้องการลบข้อมูลการอบรมหรือไม่ 
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

    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function() {
            // $('#myform').validator()
        });
        $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_train/getById'); ?>",
                    method:'post',
                    data: {
                        tr_id: $(this).attr('data'),
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
                    url: "<?php echo site_url('c_train/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.trainEN').html(obj.trainEN);
                            $('.error.trainTH').html(obj.trainTH);
                            $('.error.year').html(obj.year);
							 $('.error.hour').html(obj.hour);
                            $('.error.locationEN').html(obj.locationEN);
                            $('.error.locationTH').html(obj.locationTH);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_train/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });

    $('#trainEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#trainTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
	$('#hour').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^0-9]/g,' '))
        });
    $('#locationEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#locationTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    </script>

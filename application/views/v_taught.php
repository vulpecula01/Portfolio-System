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
	ข้อมูลประสบการณ์สอน
                <small>
                    <?php echo $this->session->flashdata('result');?>
                </small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Teaching Experience</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                <!-- general form elements disabled -->
                    <div class="box box-info">
                        <form role="form" action="<?php echo site_url('c_taught/index/'.$ret); ?>" method="post">
                            <div class="box-header"><!-- Teaching Experience-->
                                <h3 class="box-title">กรอกข้อมูลประสบการณ์สอน</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>ปีที่เข้าสอน <?php echo form_error('year'); ?></label>
                                            <select class="form-control" name="year">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('year') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>เทอมที่เข้าสอน <?php echo form_error('semeter'); ?></label>
                                            <select class="form-control" name="semeter">
                                                <option value="">กรุณาเลือก</option>
                                                <option value="1"<?php echo (set_value('semeter') == '1'?' selected':''); ?>>1</option>
                                                <option value="2"<?php echo (set_value('semeter') == '2'?' selected':''); ?>>2</option>
                                                <option value="Sum"<?php echo (set_value('semeter') == 'Sum'?' selected':''); ?>>Summer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>ชื่อวิชาที่สอน <?php echo form_error('subject'); ?></label>
                                            <select class="form-control" name="subject">
                                                <option value="">กรุณาเลือก</option>
                                                <?php foreach ($subject as $value) {
                                                    echo '<option value="'.$value['sub_id'].'"'.(set_value('subject') == $value['sub_id']?' selected':'').'>'.$value['sub_ename'].'&nbsp;('.$value['sub_tname'].')</option>';
                                                }
                                                ?>
                                            </select>
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
                            <h3 class="box-title">Teaching Experience List</h3>
                        </div> -->
                        <div class="box-body">
                        <!-- The time line -->
                        <ul class="timeline">
                            <!-- timeline time label -->
                            <?php $predate = '';
                            foreach ($teach as $value) { 
                                if($value['tec_year']!=$predate){
                                    echo '<li class="time-label">
                                        <span class="bg-green" style="width:65px;text-align:center;">'
                                        .$value['tec_year']
                                        .'</span>
                                    </li>';
                                $predate = $value['tec_year'];
                                } ?>
                                <li>
                                    <i class="fa bg-aqua"><?php echo $value['tec_semester']; ?></i>
                                    <div class="timeline-item">
                                        <ul class="list-group">
                                          <li class="list-group-item">
                                            <font style="margin-right:42px;"><font style="font-weight:bold;"><?php echo $value['sub_code']; ?></font>&nbsp;<?php echo $value['sub_ename']; ?>&nbsp;<?php echo $value['sub_tname']; ?></font>
                                            <button type="button" class="close del" data="<?php echo $value['tec_id']; ?>" data-toggle="modal" 
                                            data-target="#del_1" aria-hidden="true">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <button type="button" class="close edt" data="<?php echo $value['tec_id']; ?>" data-toggle="modal" 
                                            data-target="#edit_1" aria-hidden="true">
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
                <form class="myformedt" data-toggle="validator" role="form" novalidate="true" action="<?php echo site_url('c_taught/update_self/'.$ret); ?>" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลประสบการณ์สอน</h4>
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลประสบการณ์สอน</h4>
                </div>
                <form rold="form" action="<?php echo site_url('c_taught/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="id" value="1"/>
                    <div class="modal-body">
							คุณต้องการลบข้อมูลประสบการณ์สอนหรือไม่
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
                    url: "<?php echo site_url('c_taught/getById'); ?>",
                    method:'post',
                    data: {
                        tec_id: $(this).attr('data'),
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
                    url: "<?php echo site_url('c_taught/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.semeter').html(obj.semeter);
                            $('.error.subject').html(obj.subject);
                            $('.error.year').html(obj.year);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_taught/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });
    </script>

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
                ความสนใจ
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
                                <h3 class="box-title">กรอกข้อมูลความสนใจ</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <!-- text input -->
                                        <label>ประเภทความสนใจ <?php echo form_error('int_type'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <select class="form-control" name="int_type">
                                                <option value="">Choose</option>
                                                <?php foreach ($itt as $value) { ?> 
                                                    <option value="<?php echo $value['itt_id'];?>"<?php echo (set_value('int_type') == $value['itt_id']?' selected':''); ?>><?php echo $value['itt_ename'].' ('.$value['itt_tname'].')';?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <!-- text input -->
                                        <label>ความสนใจ (TH) <?php echo form_error('int_tname'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <input type="text" class="form-control" id="int_tname" name="int_tname" value="<?php echo set_value('int_tname'); ?>" placeholder="กรุณากรอกข้อมูลเป็นภาษาไทย"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <!-- text input -->
                                        <label>ความสนใจ (EN) <?php echo form_error('int_ename'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <input type="text" class="form-control" id="int_ename" name="int_ename" value="<?php echo set_value('int_ename'); ?>" placeholder="กรุณากรอกข้อมูลเป็นภาษาอังกฤษ" />
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
                    <?php 
                    if(!empty($itr)){ ?>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $itr[0]['itt_tname'];?></h3>
                            </div>
                            <div class="box-body">
                                <ul class="list-group">
                    <?php } else {?>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">ไม่มีข้อมูล!</h3>
                            </div>
                        </div>
                    <?php }?>
                    <?php 
                    if(!empty($itr)){ 
                        $pretype = $itr[0]['itt_id'];
                        foreach ($itr as $value) { 
                            if($value['itt_id'] != $pretype){?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title"><?php echo $value['itt_tname'];?></h3>
                                    </div>
                                    <div class="box-body">
                                        <ul class="list-group">
                        <?php } ?>
                                    
                                          <li class="list-group-item"><?php echo $value['int_tname'];?>
                                            <button type="button" class="close del" data="<?php echo $value['int_id']; ?>" data-toggle="modal" data-target="#del_1" aria-hidden="true">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <button type="button" class="close edt" data="<?php echo $value['int_id']; ?>"  data-toggle="modal" data-target="#edit_1" aria-hidden="true">
                                                <i class="fa fa-edit"></i>&nbsp;
                                            </button>
                                          </li>
                        <?php $pretype = $value['itt_id'];
                        }
                    }?>

                </div><!-- /.col -->
            </div><!-- /.row -->
            
        </section><!-- /.content -->
    </aside><!-- /.right-side -->

    <!-- COMPOSE MESSAGE MODAL -->
    <!-- model for edit -->
    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_interest/update_self/'.$ret); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลความสนใจ</h4>
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลความสนใจ</h4>
                </div>
                <form action="<?php echo site_url('c_interest/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="int_id" value=""/>
                    <div class="modal-body">
						คุณต้องการลบข้อมูลความสนใจหรือไม่
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

        $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_interest/getById'); ?>",
                    method:'post',
                    data: {
                        int_id: $(this).attr('data'),
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
                    url: "<?php echo site_url('c_interest/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.int_ename').html(obj.int_ename);
                            $('.error.int_tname').html(obj.int_tname);
                            $('.error.int_type').html(obj.int_type);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_interest/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });

    $('#int_tname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#int_ename').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });


    </script>
    
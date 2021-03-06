<style type="text/css">
  .multiselect-container{
    width: auto;
    height: 10em;
    line-height: 2em;
    border: 1px solid #ccc;
    padding: 0;
    margin: 0;
    overflow: scroll;
    overflow-x: hidden;
  }
</style>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ข้อมูลการเป็นกรรมการ
               
                <small>
                    <?php echo $this->session->flashdata('result');?>
                </small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Director</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                <!-- general form elements disabled -->
                    <div class="box box-info">
                        <form role="form" action="<?php echo site_url('c_admin_director/index/'); ?>" method="post">
                            <div class="box-header">
                                <h3 class="box-title">กรอกข้อมูลการเป็นกรรมการ</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
								<div class="row">
									<div class="mem1-res0">
										<div class="form-group col-xs-12 col-sm-12 col-md-5">
											<label>ผู้ได้รับ <?php echo form_error('researchName'); ?></label>
												<select id="example-getting-started" multiple="multiple" name="researchName[0]">
													<?php	
														foreach ($user as $value) {
													echo '<option value="'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
													}
													?>
											</select>
											<input type="hidden" value="" name="select_usr" id="select_usr">

											</div>

							
									</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>เป็นกรรมการในหัวข้อ (EN) <?php echo form_error('directorEN'); ?></label>
                                            <input type="text" class="form-control" value="<?php echo set_value('directorEN'); ?>" id="directorEN" name="directorEN" placeholder="กรุณากรอกข้อมูล ..."/>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>เป็นกรรมการในหัวข้อ (TH) <?php echo form_error('directorTH'); ?></label>
                                            <input type="text" class="form-control" value="<?php echo set_value('directorTH'); ?>" id="directorTH" name="directorTH" placeholder="กรุณากรอกข้อมูล ..."/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>ปีที่เป็นกรรมการ <?php echo form_error('year'); ?></label>
                                            <select class="form-control" name="year">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = date("Y"); $i >= (date("Y")-40) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('year') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
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
                 <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายชื่อการเป็นกรรมการ</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อผู้ได้รับ</th>
                                                <th>ชื่อหัวข้อที่เป็นกรรมการ</th>
                                                <th>ชื่อสถานที่เป็นกรรมการ</th>
												<th>ปี</th>
                                                <th>ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach ($director as $row):?>
                                            <tr>
                                                <td><?php echo $i;?></td>
												 <td><?php echo $row['usr_efname'];?> &nbsp;  
                                                    <?php echo $row['usr_elname'];?> &nbsp;(
                                                    <?php echo $row['usr_tfname'];?> 
                                                    <?php  echo $row['usr_tlname'];?>&nbsp;)</td>
                                                <td><?php echo $row['di_tname'];?></td>
                                                <td><?php echo $row['di_tlocation'];?></td>
                                                <td><?php echo $row['di_date'];?></td>
                                                

                                                <td align="center">
                                                  <a type="button" class="edt close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#edit_1" aria-hidden="true" data="<?php echo $row['di_id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                  </a>
                                                  
                                                  <a type="button" class="del close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['di_id'];?>">
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
            </div><!-- /.row -->

        </section><!-- /.content -->
    </aside><!-- /.right-side -->

    <!-- COMPOSE MESSAGE MODAL -->
    <!-- model for edit -->
    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_director/edit'); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขข้อมูลการเป็นกรรมการ</h4>
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i>ลบข้อมูลการเป็นกรรมการ</h4>
                </div>
                <form action="<?php echo site_url('c_admin_director/delete/'); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="id" value="1"/>
                    <div class="modal-body">
						คุณต้องการลบข้อมูลการเป็นกรรมการหรือไม่
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
      $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_admin_director/get'); ?>",
                    method:'POST',
                    data: {
                        di_id: $(this).attr('data'),
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
			$('#example-getting-started').change(function(e) {
              var selected = $(e.target).val();
              console.log(selected);
              var usr = "";
              for(var i=0; i<selected.length; i++){
                usr = usr + selected[i]+",";
              
              }
              document.getElementById("select_usr").value = usr;

            });

            


        });

        $(function(){
            $('.modal-dialog').on('submit', '.myformedt', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('c_director/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.directorEN').html(obj.directorEN);
                            $('.error.directorTH').html(obj.directorTH);
                            $('.error.year').html(obj.year);
                            $('.error.locationEN').html(obj.locationEN);
                            $('.error.locationTH').html(obj.locationTH);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_director/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });

    $('#directorEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#directorTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#locationEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#locationTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    </script>
</script>
<script type="text/javascript">
      $(document).ready(function() {
        $('#example-getting-started').multiselect();
      });
    </script> 
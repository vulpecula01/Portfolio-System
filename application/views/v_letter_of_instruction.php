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
      Letter of Instruction
      <small></small>
      <small><?php echo $this->session->flashdata('result');?></small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">                            
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">กรอกข้อมูลหนังสือคำสั่ง</h3>
          </div>

          <form action="<?php echo site_url('c_letter_of_instruction/savefile');?>"  data-toggle="validator" role="form" method="post" novalidate="true" enctype="multipart/form-data">

            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-3">
                  <label for="inputletter">หมายเลขจดหมายที่ <?php echo form_error('let_id'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file-text"></i>
                    </div>
                    <input type="text" class="form-control" id="let_id" name="let_id" placeholder="กรอกหมายเลขจดหมาย ..." value="<?php echo set_value('let_id'); ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="inputletter">หัวข้อเรื่อง <?php echo form_error('let_name'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file-text"></i>
                    </div>
                    <input type="text" class="form-control" id="let_name" name="let_name" placeholder="กรอกหัวข้อเรื่อง " value="<?php echo set_value('let_name'); ?>">
                    <input type="hidden" class="form-control" name="encpy" value="<?php echo $ret; ?>">
                  </div>
                </div>
                </div>           
               <div class="row">
                 <div class="mem1-res0">
                    <br>
                   <?php echo form_error('uploadfile'); ?>
                    <div class="form-group col-xs-12 col-sm-12 col-md-5">
                        <input name="uploadfile" type="file" >
                    </div>
                 </div>
              </div> 
              <div class="box-footer clearfix">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save</button>
              </div>
            </form>
          </div> 
        </div>
            
          
             <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายชื่อหนังสือเรียน</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับที่.</th>
                                                <th>หมายเลขจดหมายที่</th>
                                                <th>ชื่อหัวข้อ</th>
                                                <th>ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach ($let as $row):?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['let_id'];?></td>
                                                <td><?php echo $row['let_name'];?></td>
                                                

                                                <td align="center">
                                                  <a type="button" class="edt close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#edit_1" aria-hidden="true" data="<?php echo $row['no_id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                  </a>
                                                  
                                                  <a type="button" class="del close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['no_id'];?>">
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


    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">  
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_letter_of_instruction/update_self'); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขหนังสือคำสั่ง</h4>
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบหนังสือคำสั่ง</h4>
                </div>
                <form action="<?php echo site_url('c_letter_of_instruction/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="no_id" value=""/>
                    <div class="modal-body">
							คุณต้องการลบหนังสือคำสั่งหรือไม่
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

    <script type="text/javascript">

       $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_letter_of_instruction/get'); ?>",
                    method:'POST',
                    data: {
                        no_id: $(this).attr('data'),
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

       
    </script>


    
    <script type="text/javascript">
    $(function () {
        $('#datatable').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": true
        });
      });
    </script>
    
       

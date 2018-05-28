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
            <h3 class="box-title">กรอกหนังสือคำสั่ง</h3>
          </div>
          <form action="<?php echo site_url('c_admin_letter/savefile');?>"  data-toggle="validator" role="form" method="post" novalidate="true" enctype="multipart/form-data">
        
            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-3">
                  <label for="inputletter">เลขที่คำสั่ง <?php echo form_error('let_id'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file-text"></i>
                    </div>
                    <input type="text" class="form-control" id="let_id" name="let_id" placeholder="กรอกจดหมายเลขที่" value="<?php echo set_value('let_id'); ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="inputletter">ชื่อคำสั่ง <?php echo form_error('let_name'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file-text"></i>
                    </div>
                    <input type="text" class="form-control" id="let_name" name="let_name" placeholder="กรอกหัวข้อเรื่อง " value="<?php echo set_value('let_name'); ?>">
                  </div>
                </div>
                </div>
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

                  <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <br> <input name="let_file" type="file">
                  </div>
               </div>
             </div>
              <div class="box-footer clearfix">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> บันทึก</button>
              </div>
            </form>
          </div> 
        </div>


         <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายชื่อหนังสือคำสั่ง</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>เลขที่คำสั่ง</th>
                                                <th>ชื่อคำสั่ง</th>
                                                <th>ชื่อผู้ได้รับ</th>
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
                                                <td><?php echo $row['usr_efname'];?> &nbsp;  
                                                    <?php echo $row['usr_elname'];?> &nbsp;(
                                                    <?php echo $row['usr_tfname'];?> 
                                                    <?php  echo $row['usr_tlname'];?>&nbsp;)</td>
                                                

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
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_letter/edit'); ?>">
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
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลหนังสือคำสั่ง</h4>
                </div>
                <form action="<?php echo site_url('c_admin_letter/delete/'); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="no_id" value=""/>
                    <div class="modal-body">
							ต้องการลบข้อมูลหนังสือคำสั่งหรือไม่
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




<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->


   



     <script type="text/javascript">



       $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_admin_letter/get'); ?>",
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

       
    </script>
<script type="text/javascript">
      $(document).ready(function() {
        $('#example-getting-started').multiselect();
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

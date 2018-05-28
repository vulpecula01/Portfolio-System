<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Department
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
            <h3 class="box-title">กรอกข้อมูลภาควิชา</h3>
          </div>
          <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_info_pinfo_department');?>">
            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameTH">ชื่อภาควิชา (TH) <?php echo form_error('dep_tname'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building"></i>
                    </div>
                    <input type="text" class="form-control" id="dep_tname" name="dep_tname" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('dep_tname'); ?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameTH">ชื่อภาควิชา (EN) <?php echo form_error('dep_ename'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building"></i>
                    </div>
                    <input type="text" class="form-control" id="dep_ename" name="dep_ename" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('dep_ename'); ?>">
                  </div>
                </div>
              </div><!-- /.form group -->
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
                <h3 class="box-title">รายชื่อ ภาควิชา</h3>
              </div>
              <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อภาควิชา (TH)</th>
                      <th>ชื่อภาควิชา (EN)</th>
                      <th style="text-align:center;">ตัวเลือก</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i = 1;?>
                   <?php foreach ($dep as $row):?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row['dep_tname'];?></td>
                      <td><?php echo $row['dep_ename'];?></td>
                      <td align="center">
                        <a type="button" class="edt close pull-center" 
                        style="float:none !important;" data-toggle="modal" 
                        data-target="#edit_1" aria-hidden="true" data="<?php echo $row['dep_id'];?>">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a type="button" class="del close pull-center" 
                      style="float:none !important;" data-toggle="modal" 
                      data-target="#del_1" aria-hidden="true" data="<?php echo $row['dep_id'];?>">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
                <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.row (main row) -->
    </div>
  </aside><!-- /.right-side -->

  <!-- COMPOSE MESSAGE MODAL -->
  <!-- model for edit -->
  <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขชื่อภาควิชา</h4>
        </div>
        <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="#">
          <div class="modal-body edit-box">
            <!--EDIT-->
          </div>
          <div class="modal-footer clearfix">
            <button type="reset" class="btn btn-default" data-dismiss="modal">
              <i class="fa fa-times"></i> 
				ปิด
            </button>
            <button type="submit" class="btn btn-success pull-right">
              <i class="fa fa-check"></i>
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
        <form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_info_pinfo_department/deleteById');?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบภาควิชา</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" class="form-control" id="dep_id" name="dep_id" value="1"/>
			คุณต้องการลบภาควิชาหรือไม่
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
  $(document).ready(function() {
            // $('#myform').validator()
          });
  $(function(){
    $('.edt').click(function(){
      $.ajax({
        url: "<?php echo site_url('c_info_pinfo_department/getById'); ?>",
        method:'post',
        data: {
          dep_id: $(this).attr('data'),
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
      $('#dep_id').attr('value', $(this).attr('data'));
    });
  });

</script>
<script>
  $(function(){
    $('.modal-dialog').on('submit', '.myformedt', function(e){
     e.preventDefault();

     $.ajax({
      type: "POST",
      url: "<?php echo site_url('c_info_pinfo_department/edit'); ?>",
      data: $('.myformedt').serialize(),
      success: function(response){
        var obj = jQuery.parseJSON(response);
        if(obj.message == 'fail')
        {
          $('.error.dep_tname').html(obj.dep_tname);
          $('.error.dep_ename').html(obj.dep_ename);
        }
        else
        {
          window.location.href = "<?php echo site_url('c_info_pinfo_department'); ?>";
        }
      },
      error: function(){alert('Error');}
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

    $('#dep_tname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#dep_ename').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });
</script>
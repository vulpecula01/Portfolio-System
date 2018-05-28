<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Type of Research
      <small></small>
      <small><?php echo $this->session->flashdata('result');?></small>
    </h1>
  </h1>

</section>
<!-- Main content -->
<section class="content">

  <!-- Main row -->
  <div class="row">                            
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">กรอกข้อมูลประเภทงานวิจัย</h3>
        </div>
        <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_info_rinfo_researchtype');?>">
          <div class="box-body">
            <div class="row">
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="nameTH">ประเภทงานวิจัย (TH) <?php echo form_error('ret_tname'); ?></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clipboard"></i>
                  </div>
                  <input type="text" class="form-control" id="ret_tname" name="ret_tname" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('ret_tname'); ?>">
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="lnameTH">ประเภทงานวิจัย (EN) <?php echo form_error('ret_ename'); ?></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clipboard"></i>
                  </div>
                  <input type="text" class="form-control" id="ret_ename" name="ret_ename" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('ret_ename'); ?>">
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
              <h3 class="box-title">รายชื่อประเภทงานวิจัย</h3>
            </div>
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ประเภทงานวิจัย (TH)</th>
                    <th>ประเภทงานวิจัย (EN)</th>
                    <th style="text-align:center;">Option</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $i = 1;?>
                 <?php foreach ($ret as $row):?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['ret_tname'];?></td>
                    <td><?php echo $row['ret_ename'];?></td>
                    <td align="center">
                      <a type="button" class="edt close pull-center" 
                      style="float:none !important;" data-toggle="modal" 
                      data-target="#edit_1" aria-hidden="true" data="<?php echo $row['ret_id'];?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a type="button" class="del close pull-center" 
                    style="float:none !important;" data-toggle="modal" 
                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['ret_id'];?>">
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
        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขประเภทงานวิจัย</h4>
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
      <form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_info_rinfo_researchtype/deleteById');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบประเภทงานวิจัย</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="ret_id" name="ret_id" value="1"/>
			คุณต้องการลบประเภทงานวิจัยหรือไม่
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
        url: "<?php echo site_url('c_info_rinfo_researchtype/getById'); ?>",
        method:'post',
        data: {
          ret_id: $(this).attr('data'),
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
      $('#ret_id').attr('value', $(this).attr('data'));
    });
  });

</script>
<script>
  $(function(){
    $('.modal-dialog').on('submit', '.myformedt', function(e){
     e.preventDefault();

     $.ajax({
      type: "POST",
      url: "<?php echo site_url('c_info_rinfo_researchtype/edit'); ?>",
      data: $('.myformedt').serialize(),
      success: function(response){
        var obj = jQuery.parseJSON(response);
        if(obj.message == 'fail')
        {
          $('.error.ret_tname').html(obj.ret_tname);
          $('.error.ret_ename').html(obj.ret_ename);
        }
        else
        {
          window.location.href = "<?php echo site_url('c_info_rinfo_researchtype'); ?>";
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

   $('#ret_tname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#ret_ename').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        }); 

</script>
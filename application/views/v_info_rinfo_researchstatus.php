<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Research Status
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
            <h3 class="box-title">กรอกสถานะงานวิจัย</h3>
          </div>
          <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_info_rinfo_researchstatus');?>">
            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameTH">สถานะงานวิจัย (TH) <?php echo form_error('rst_ttitle'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-users"></i>
                    </div>
                    <input type="text" class="form-control" id="rst_ttitle" name="rst_ttitle" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('rst_ttitle'); ?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameTH">สถานะงานวิจัย (EN) <?php echo form_error('rst_etitle'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-users"></i>
                    </div>
                    <input type="text" class="form-control" id="rst_etitle" name="rst_etitle" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('rst_etitle'); ?>">
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
                <h3 class="box-title">สถานะงานวิจัย</h3>
              </div>
              <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>สถานะงานวิจัย (TH)</th>
                      <th>สถานะงานวิจัย (EN)</th>
                      <th style="text-align:center;">ตัวเลือก</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i = 1;?>
                   <?php foreach ($rst as $row):?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row['rst_ttitle'];?></td>
                      <td><?php echo $row['rst_etitle'];?></td>
                      <td align="center">
                        <a type="button" class="edt close pull-center" 
                        style="float:none !important;" data-toggle="modal" 
                        data-target="#edit_1" aria-hidden="true" data="<?php echo $row['rst_id'];?>">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a type="button" class="del close pull-center" 
                      style="float:none !important;" data-toggle="modal" 
                      data-target="#del_1" aria-hidden="true" data="<?php echo $row['rst_id'];?>">
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
        <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขสถานะงานวิจัย</h4>
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
      <form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_info_rinfo_researchstatus/deleteById');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบสถานะงานวิจัย </h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="rst_id" name="rst_id" value="1"/>
			คุณต้องการลบสถานะงานวิจัยหรือไม่
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
        url: "<?php echo site_url('c_info_rinfo_researchstatus/getById'); ?>",
        method:'post',
        data: {
          rst_id: $(this).attr('data'),
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
      $('#rst_id').attr('value', $(this).attr('data'));
    });
  });

</script>
<script>
  $(function(){
    $('.modal-dialog').on('submit', '.myformedt', function(e){
     e.preventDefault();

     $.ajax({
      type: "POST",
      url: "<?php echo site_url('c_info_rinfo_researchstatus/edit'); ?>",
      data: $('.myformedt').serialize(),
      success: function(response){
        var obj = jQuery.parseJSON(response);
        if(obj.message == 'fail')
        {
          $('.error.rst_ttitle').html(obj.rst_ttitle);
          $('.error.rst_etitle').html(obj.rst_etitle);
        }
        else
        {
          window.location.href = "<?php echo site_url('c_info_rinfo_researchstatus'); ?>";
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

  $('#rst_ttitle').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#rst_etitle').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });

</script>
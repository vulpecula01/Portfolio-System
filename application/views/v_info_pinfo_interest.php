<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Interest
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
            <h3 class="box-title">กรอก ประเภทความสนใจ</h3>
          </div>
          <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_info_pinfo_interest');?>">
            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameTH">ประเภทความสนใจ (TH) <?php echo form_error('itt_tname'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-star"></i>
                    </div>
                    <input type="text" class="form-control" id="itt_tname" name="itt_tname"  placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('itt_tname'); ?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameTH">ประเภทความสนใจ (EN) <?php echo form_error('itt_ename'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-star"></i>
                    </div>
                    <input type="text" class="form-control" id="itt_ename" name="itt_ename" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('itt_ename'); ?>">
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
                <h3 class="box-title">รายชื่อประเภทความสนใจ</h3>
              </div>
              <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ประเภทความสนใจ (TH)</th>
                      <th>ประเภทความสนใจ (EN)</th>
                      <th style="text-align:center;">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i = 1;?>
                   <?php foreach ($int as $row):?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row['itt_tname'];?></td>
                      <td><?php echo $row['itt_ename'];?></td>
                      <td align="center">
                        <a type="button" class="edt close pull-center" 
                        style="float:none !important;" data-toggle="modal" 
                        data-target="#edit_1" aria-hidden="true" data="<?php echo $row['itt_id'];?>">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a type="button" class="del close pull-center" 
                      style="float:none !important;" data-toggle="modal" 
                      data-target="#del_1" aria-hidden="true" data="<?php echo $row['itt_id'];?>">
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
          <h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขประเภทความสนใจ</h4>
        </div>
        <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="#">
          <div class="modal-body edit-box">
            <!-- EDIT -->
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
        <form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_info_pinfo_interest/deleteById');?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบประเภทควาสนใจ</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" class="form-control" id="itt_id" name="itt_id" value="1"/>
			คุณต้องการลบประเภทความสนใจ
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
        url: "<?php echo site_url('c_info_pinfo_interest/getById'); ?>",
        method:'post',
        data: {
          itt_id: $(this).attr('data'),
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
      $('#itt_id').attr('value', $(this).attr('data'));
    });
  });

</script>
<script>
  $(function(){
    $('.modal-dialog').on('submit', '.myformedt', function(e){
     e.preventDefault();

     $.ajax({
      type: "POST",
      url: "<?php echo site_url('c_info_pinfo_interest/edit'); ?>",
      data: $('.myformedt').serialize(),
      success: function(response){
        var obj = jQuery.parseJSON(response);
        if(obj.message == 'fail')
        {
          $('.error.itt_tname').html(obj.itt_tname);
          $('.error.itt_ename').html(obj.itt_ename);
        }
        else
        {
          window.location.href = "<?php echo site_url('c_info_pinfo_interest'); ?>";
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

    $('#itt_tname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#itt_ename').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });
</script>
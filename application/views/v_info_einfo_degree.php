<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Degree
      <small></small>
      <small><?php echo $this->session->flashdata('result');?></small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">                                                  
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">กรอกข้อมูลปริญญา</h3>
          </div>
          <form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_info_einfo_degree');?>">
            <div class="box-body">
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                  <label for="nameTH">ระดับการศึกษา </label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <select name="edl_id" class="form-control" data-error="Choose Country" required>
                    <?php foreach ($edl as $row): ?>
                     <option value="<?php echo $row['edl_id'];?>"><?php echo $row['edl_ename'];?> (<?php echo $row['edl_tname'];?>)</option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameTH">ปริญญา (TH) <?php echo form_error('deg_tname'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <input type="text" class="form-control" id="deg_tname" name="deg_tname" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('deg_tname'); ?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameTH">คำย่อ (TH) <?php echo form_error('deg_tacronym'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <input type="text" class="form-control" id="deg_tacronym" name="deg_tacronym" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('deg_tacronym'); ?>">
                  </div>
                </div>
              </div><!-- /.form group -->
              <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="nameENG">ปริญญา (EN) <?php echo form_error('deg_ename'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <input type="text" class="form-control" id="deg_ename" name="deg_ename" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('deg_ename'); ?>">
                  </div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="lnameENG">คำย่อ (EN) <?php echo form_error('deg_eacronym'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <input type="text" class="form-control" id="deg_eacronym" name="deg_eacronym" placeholder="กรุณากรอกข้อมูล ..." value="<?php echo set_value('deg_eacronym'); ?>">
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> บันทึก</button>
            </div>
          </form>
        </div> 
      </div>

    </div><!-- /.row (main row) -->

    <!-- Second row -->
    <div class="row">                                                  
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">รายชื่อปริญญา</h3>
          </div>
          <div class="box-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ระดับการศึกษา</th>
                  <th>ปริญญา (TH)</th>
                  <th>คำย่อปริญญา (TH)</th>
                  <th>ปริญญา (EN)</th>
                  <th>คำย่อปริญญา (EN)</th>
                  <th>ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1;?>
               <?php foreach ($deg as $row):?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['edl_ename'];?> (<?php echo $row['edl_tname'];?>)</td>
                  <td><?php echo $row['deg_tname'];?></td>
                  <td><?php echo $row['deg_tacronym'];?></td>
                  <td><?php echo $row['deg_ename'];?></td>
                  <td><?php echo $row['deg_eacronym'];?></td>
                  <td align="center">
                    <a type="button" class="edt close pull-center" 
                    style="float:none !important;" data-toggle="modal" 
                    data-target="#edit_1" aria-hidden="true" data="<?php echo $row['deg_id'];?>">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a type="button" class="del close pull-center" 
                  style="float:none !important;" data-toggle="modal" 
                  data-target="#del_1" aria-hidden="true" data="<?php echo $row['deg_id'];?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              </td>
            </tr>
            <?php $i++;?>
          <?php endforeach;?>
        </tbody>
      </table>
    </div><!-- /.box-body -->
  </div> 
</div>

</div><!-- /.row (main row) -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- COMPOSE MESSAGE MODAL -->
<!-- model for edit -->
<div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Degree</h4>
      </div>
      <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="#">
        <div class="modal-body edit-box">
          <!--EDIT-->
        </div>
        <div class="modal-footer clearfix">

          <button type="reset" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-times"></i> 
            Close
          </button>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> 
            Save
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
      <form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_info_einfo_degree/deleteById');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete Degree</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="deg_id" name="deg_id" value="1"/>
          Do you want to Delete ? 
        </div>
        <div class="modal-footer clearfix">

          <button type="reset" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-times"></i> 
            Close
          </button>
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash-o"></i> 
            Delete
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
        url: "<?php echo site_url('c_info_einfo_degree/getById'); ?>",
        method:'post',
        data: {
          deg_id: $(this).attr('data'),
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
      $('#deg_id').attr('value', $(this).attr('data'));
    });
  });

</script>
<script>
  $(function(){
    $('.modal-dialog').on('submit', '.myformedt', function(e){
     e.preventDefault();

     $.ajax({
      type: "POST",
      url: "<?php echo site_url('c_info_einfo_degree/edit'); ?>",
      data: $('.myformedt').serialize(),
      success: function(response){
        var obj = jQuery.parseJSON(response);
        if(obj.message == 'fail')
        {
          $('.error.deg_tname').html(obj.deg_tname);
          $('.error.deg_ename').html(obj.deg_ename);
          $('.error.deg_tacronym').html(obj.deg_tacronym);
          $('.error.deg_eacronym').html(obj.deg_eacronym);
        }
        else
        {
          window.location.href = "<?php echo site_url('c_info_einfo_degree'); ?>";
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

   $('#deg_tname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#deg_tacronym').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,''))
        });
    $('#deg_ename').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });
    $('#deg_eacronym').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,''))
        });

</script>
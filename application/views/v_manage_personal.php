<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Management
			<small>
				จัดการผู้ใช้งาน
			</small>
			<small>
				<?php echo $this->session->flashdata('result');?>
			</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Main row -->
		<div class="row">                                                  
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">กรอกข้อมูลผู้ใช้</h3>
					</div>
					<form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_manage_user');?>">
						<div class="box-body">
							<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameTH">ผู้ใช้งานระบบ (EN) <?php echo form_error('uaut_username'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="uaut_username"  name="uaut_username" value="<?php echo set_value('uaut_username'); ?>" placeholder="ผู้ใช้งานระบบเป็นภาษาอังกฤษ">
									</div>
								</div>
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameTH">สิทธิ์การใช้งาน</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="aut_authority" class="form-control" data-error="Choose Country" required>
											<option value="user"> User (สิทธิ์ผู้ใช้งานทั่วไป) </option>
											<option value="admin"> Admin (สิทธิ์ผู้ดูแลระบบ) </option>
											<option value="all"> User & Admin (สิทธิ์ผู้ใช้งานทั่วไปและผู้ดูแลระบบ) </option>
										</select>
									</div>
								</div>
							</div><!-- /.form group -->
							<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameENG">รหัสผ่าน <?php echo form_error('uaut_password'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="password" class="form-control" id="uaut_password" name="uaut_password" placeholder="กรอกรหัสผ่าน">
									</div>
								</div>
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="lnameENG">รหัสผ่าน-อีกครั้ง <?php echo form_error('uaut_password2'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="password" class="form-control" id="uaut_password2" name="uaut_password2" placeholder="กรอกรหัสผ่าน">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameENG">ชื่อ (TH) <?php echo form_error('uaut_tfname'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="uaut_tfname" name="uaut_tfname" value="<?php echo set_value('uaut_tfname'); ?>"  placeholder="กรอกชื่อเป็นภาษาไทย">
									</div>
								</div>
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameENG">นามสกุล (TH) <?php echo form_error('uaut_tlname'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="uaut_tlname" name="uaut_tlname" value="<?php echo set_value('uaut_tlname'); ?>"  placeholder="กรอกนามสกุลเป็นภาษาไทย">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="lnameENG">ชื่อ (EN) <?php echo form_error('uaut_efname'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="uaut_efname" name="uaut_efname" value="<?php echo set_value('uaut_efname'); ?>"  placeholder="กรอกชื่อเป็นภาษาอังกฤษ">
									</div>
								</div>
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="lnameENG">นามสกุล (EN) <?php echo form_error('uaut_elname'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="uaut_elname" name="uaut_elname" value="<?php echo set_value('uaut_elname'); ?>"  placeholder="กรอกนามสกุลเป็นภาษาอังกฤษ">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="nameTH">สถานะผู้ใช้งาน</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="status_teacherStatus" class="form-control" data-error="Choose Status" required>
											<option value="teach"> กำลังปฏิบัติงาน</option>
											<option value="learn"> ลาศึกษา </option>
											<option value="resign"> ลาออก </option>
										</select>
									</div>
								</div>
								
						
                                    
						<div class="box-footer clearfix">
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save</button>
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
						<h3 class="box-title">รายชื่อผู้ใช้งาน</h3>
					</div>
					<div class="box-body">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ลำดับ</th>
									<th>ชื่อผู้ใช้งานระบบ</th>
									<th>ชื่อ (TH)</th>
									<th>นามสกุล (TH)</th>
									<th>ชื่อ (EN)</th>
									<th>นามสกุล (EN)</th>
									<th>สิทธิ์การใช้งาน</th>
									<th>สถานะ</th>
									
									<th>ตัวเลือก</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								<?php foreach ($user as $row):?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['uaut_username'];?></td>
										<td><?php echo $row['uaut_tfname'];?></td>
										<td><?php echo $row['uaut_tlname'];?></td>
										<td><?php echo $row['uaut_efname'];?></td>
										<td><?php echo $row['uaut_elname'];?></td>
										
										<td>
											<?php if(($row['aut_user'] == 'Y') && ($row['aut_admin'] == 'Y')):?>
												User & Admin (สิทธิ์ผู้ใช้งานทั่วไปและผู้ดูแลระบบ)
											<?php elseif($row['aut_user'] == 'Y'):?>
												User (สิทธิ์ผู้ใช้งานทั่วไป)
											<?php elseif($row['aut_admin'] == 'Y'):?>
												Admin (สิทธิ์ผู้ดูแลระบบ)
											<?php endif;?>
										</td>
										
										<td>										
											<?php if($row['ts_status'] == 'T'):?>
												กำลังปฏิบัติงาน
											<?php elseif($row['ts_status'] == 'L'):?>
												ลาศึกษา
											<?php elseif($row['ts_status'] == 'R'):?>
												ลาออก
											<?php endif;?>
										</td>
										<td align="center">
											<a type="button" class="edt close pull-center" 
											style="float:none !important;" data-toggle="modal" 
											data-target="#edit_1" aria-hidden="true" data="<?php echo $row['uaut_id'];?>">
											<i class="fa fa-edit"></i>
										</a>
										<?php
										$ret = $this->encrypt->encode($row['uaut_id']);
										$ret = strtr(
											$ret,
											array(
												'+' => '.',
												'=' => '-',
												'/' => '~'
												)
											);
											?>
											<a type="button" class="close pull-center" href="<?php echo site_url('c_admin_user_information/index/'.$ret); ?>" target="_blank">
												<i class="fa fa-fw fa-user"></i>
											</a>
                  <!-- <a type="button" class="del close pull-center" 
                  style="float:none !important;" data-toggle="modal" 
                  data-target="#del_1" aria-hidden="true" data="<?php echo $row['uaut_id'];?>">
                  <i class="fa fa-trash-o"></i>
              </a> -->
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
				<h4 class="modal-title"><i class="fa fa-edit"></i> แก้ไขผู้ใช้งานระบบ</h4>
			</div>
			<form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_manage_user/edit');?>">
				<div class="modal-body edit-box">
					<!-- edit-->
				</div>
				<div class="modal-footer clearfix">

					<button type="reset" class="btn btn-default pull-left" data-dismiss="modal">
						<i class="fa fa-times"></i> 
						ปิด
					</button>
					<button type="submit" class="btn btn-success pull-right">
						<i class="fa fa-save"></i> 
						บันทึก
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 
<div class="modal fade" id="del_1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="myform" data-toggle="validator" role="form" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete User</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" id="deleteId" name="id" value="1"/>
					Do you want to Delete User ? 
				</div>
				<div class="modal-footer clearfix">
					<button type="reset" class="btn btn-default pull-left" data-dismiss="modal">
						<i class="fa fa-times"></i> 
						Close
					</button>
					<button type="submit" class="btn btn-danger pull-right">
						<i class="fa fa-trash-o"></i> 
						Delete
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div> -->
<!-- page script -->

<script type="text/javascript">
	$(document).ready(function() {
            // $('#myform').validator()
        });
	$(function(){
		$('.edt').click(function(){
			$.ajax({
				url: "<?php echo site_url('c_admin_manage_user/getById'); ?>",
				method:'post',
				data: {
					uaut_id: $(this).attr('data'),
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
<script>
	$(function(){
		$('.modal-dialog').on('submit', '.myformedt', function(e){
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('c_admin_manage_user/edit'); ?>",
				data: $('.myformedt').serialize(),
				success: function(response){
					var obj = jQuery.parseJSON(response);
					if(obj.message == 'fail')
					{
						$('.error.uaut_username').html(obj.uaut_username);
						$('.error.uaut_tfname').html(obj.uaut_tfname);
						$('.error.uaut_tlname').html(obj.uaut_tlname);
						$('.error.uaut_efname').html(obj.uaut_efname);
						$('.error.uaut_elname').html(obj.uaut_elname);
					
					}
					else
					{
						window.location.href = "<?php echo site_url('c_admin_manage_user'); ?>";
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

	$('#uaut_username').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#uaut_tfname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#uaut_tlname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐]/g,''))
        });
    $('#uaut_efname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });
    $('#uaut_elname').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z]/g,''))
        });


</script>
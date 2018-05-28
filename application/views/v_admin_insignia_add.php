<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			ข้อมูลเครื่องราชทาน
			<small>
				กรอกข้อมูลเครื่องราชทาน
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
						<h3 class="box-title">ใส่ข้อมูลเครื่องราชทาน</h3>
					</div>
					<form class="myform" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_insignia_add');?>">
						<div class="box-body">	
					<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="ldatework">ชื่อเครื่องราชทาน <?php echo form_error('dec_name'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="dec_name" name="dec_name" value="<?php echo set_value('dec_id'); ?>"  placeholder="กรุณาใส่ระดับเครื่องราช">
									</div>
								</div>	
														
						
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="ldatework">ชื่อตัวย่อ <?php echo form_error('dec_abb'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="dec_abb" name="dec_abb" value="<?php echo set_value('dec_abb'); ?>"  placeholder="กรุณาใส่ชื่อเครื่องราช">
									</div>
								</div>
								</div>	
								<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-6">
									<label for="ldatework">จำนวนปีที่จะได้รับเครื่องราชทาน <?php echo form_error('pos_year'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="pos_year" name="pos_year" value="<?php echo set_value('pos_year'); ?>"  placeholder="กรุณาใส่ชื่ออักษรย่อ">
									</div>
								</div>

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
						<h3 class="box-title">รายชื่อเครื่องราช</h3>
					</div>
					<div class="box-body">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									
									<th>ชื่อเครื่องราชทาน</th>
									<th>ชื่อตัวย่อ</th>
									<th>ระยะเวลาที่จะได้เครื่องราชแต่ละชั้นตรา</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								<?php foreach ($dec as $row):?>
									<tr>
										
										<td><?php echo $row['dec_name'];?></td>
										<td><?php echo $row['dec_abb'];?></td>
										<td><?php echo $row['pos_year'];?></td>
										

										
										
										
										<td align="center">
											<a type="button" class="edt close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#edit_1" aria-hidden="true" data="<?php echo $row['dec_id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                  </a>
										
											<a type="button" class="del close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['dec_id'];?>">
                                                  <i class="fa fa-trash-o"></i>
                                                  </a>
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
				<h4 class="modal-title"><i class="fa fa-edit"></i> Edit Insignia</h4>
			</div>
			<form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_admin_insignia_add/edit/');?>">
				<div class="modal-body edit-box">
					<!-- edit-->
				</div>
				<div class="modal-footer clearfix">

					<button type="reset" class="btn btn-default pull-left" data-dismiss="modal">
						<i class="fa fa-times"></i> 
						Close
					</button>
					<button type="submit" class="btn btn-success pull-right">
						<i class="fa fa-save"></i> 
						Save
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- model for delete -->
<<div class="modal fade" id="del_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลการได้รับเครื่องราชทาน</h4>
                </div>
                <form action="<?php echo site_url('c_admin_insignia_add/delete/'); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="sign_id" value=""/>
                    <div class="modal-body">
                        คุณต้องการลบข้อมูลเครื่องราชทาน ?
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
<!-- page script -->

 <script type="text/javascript">



       $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_admin_insignia_add/get'); ?>",
                    method:'POST',
                    data: {
                        pn_id: $(this).attr('data'),
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
             

            });


        });

       
    </script>
<script>
	$(function(){
		$('.modal-dialog').on('submit', '.myformedt', function(e){
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('c_admin_insignia_add/edit/'.$ret); ?>",
				data: $('.myformedt').serialize(),
				success: function(response){
					var obj = jQuery.parseJSON(response);
					if(obj.message == 'fail')
					{
						
						$('.error.pn_level').html(obj.pn_level);
						$('.error.pn_name').html(obj.pn_name);
						$('.error.pn_abb').html(obj.pn_abb);
					
					}
					else
					{
						window.location.href = "<?php echo site_url('c_admin_insignia_add'.$ret); ?>";
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

    $('#sign_name').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-ฮก-๐]/g,''))
        });
    $('#sign_abb').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-ฮ ก-๐.]/g,''))
        });


</script>
<script>
                  
                  
				  
					$( "#usr_id" ).change(function() {

						jQuery("#workage-display").val( <?php echo date('Y')+543;?>-$(this).find(':selected').attr('data-dateforwork') )
						// alert('The option with value ' + $(this).val() + ' and text ' + $(this).find(':selected').attr('data-dateforwork') + ' was selected.');

					});
				  
				  
			function sign_change(obj){
				return;
				
            var t = obj.getAttribute("datatype");
            $.ajax({
                url: "<?php echo site_url('c_admin_insignia_add/getDateForWork'); ?>",
                method:'post',
                data: {
                    per_id: obj.value,
                },
                success:function(res){
                    $('#inputDegree'+t).children().remove();
                    $('#inputDegree'+t).append(res);
                },
                error:function(err){

                }
            });
        }
                  function del(id,delid){
                    div.removeChild(id);
                    deldiv.removeChild(delid);
                  }
                  </script>
                    <script>
                      function chk(){
                        var norm = document.getElementById("normal");
                        var tea = document.getElementById("teacher");
                        var checkbox = document.getElementById("ckbox");

                        if (checkbox.checked) {
                          //norm.setAttribute("style", "display:none");
                          tea.setAttribute("style", "");
                        } else {
                          //norm.setAttribute("style", "");
                          tea.setAttribute("style", "display:none");
                        };
                      }
                    </script>
					
					
					
			
					
					</form>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			จัดการเครื่องราชทาน
			<small>
				จัดการเครื่องราชทาน
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
					<form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_admin_insignia/index/');?>">
						<div class="box-body">
							<div class="row">
								<div class="form-group col-xs-12 col-sm-12 col-md-4">
                  <label for="posTH">ชื่อผู้ได้รับ<?php echo form_error('usr_id'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <select id="usr_id" name="usr_id" class="form-control">
                                                <option value="">Choose</option>
                                                <?php
                               foreach ($user as $value) { 
							   print_r($value);
                                     echo '<option value="'.$value['usr_id'].'" data-dateforwork="'.$value['usr_dateforwork'].'" data-pos="'.$value['pos_type'].' '.$value['pos_name'].'">'.$value['usr_tfname'].'&nbsp;&nbsp;&nbsp;'.$value['usr_tlname'].'</option>';
                                   }
                               ?>
                                            </select>
											<input type="hidden" value=""  id="select_usr">
                  </div>
              </div>

			<!--  <div class="form-group col-xs-12 col-sm-12 col-md-3">
								
									<label for="workage-display">ปีที่เข้าทำงาน<?php echo form_error('usr_dateforwork'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="workage-display" disabled>
								
									</div>
								</div>
								</div>
							<div class="row"> -->
									
								<div class="form-group col-xs-12 col-sm-12 col-md-3">
								
									<label for="ldatework">ตำแหน่งบุคลากร<?php echo form_error('pos_id'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										
										<input type="text" class="form-control" id="pos_type" disabled >
								
									</div>
								</div>
									
								</div>
							<div class="row">
									
								<div class="form-group col-xs-12 col-sm-12 col-md-4">
								
									<label for="ldatework">ชื่อเครื่องราชที่ได้รับล่าสุด<?php echo form_error('pos_id'); ?>
									
									</label>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										
										<input type="text" class="form-control"  id="current_insignia" disabled >

								
									</div>
								</div>
								<div class="form-group col-xs-12 col-sm-12 col-md-3">
								
									<label for="ldatework">ปีล่าสุดที่ได้รับ
									
									</label>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										
										<input type="text" class="form-control"  id="sign_date_id" disabled >

								
									</div>
								
								</div>
									
								</div>
						<div class="row">
								<!--<div class="form-group col-xs-12 col-sm-12 col-md-6">
                  <label for="posTH">ชื่อเครื่องราชถัดไปที่จะได้รับ<?php echo form_error('dec_name_id'); ?></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building"></i>
                    </div>
						<input type="text" class="form-control"  id="dec_name" disabled >
						<input type="hidden" class="form-control"  id="dec_name_id" name="dec_name_id">
                  </div>
              </div>-->
			  
								<div class="form-group col-xs-12 col-sm-12 col-md-4">
								
									<label for="ldatework">ชื่อเครื่องราชถัดไปที่ได้รับ<?php echo form_error('dec_abb'); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" class="form-control" id="dec_abb" name="dec_abb" disabled >
										<input type="hidden" class="form-control"  id="dec_abb_id" name="dec_abb_id">
								
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-3">
                                    	<label for="inputYear">ปีถัดไปที่จะได้รับ <?php echo form_error('sign_name_id'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
												<i class="fa fa-mortar-board "></i>
											</div>
                                            <select name="sign_date" id="sign_date" class="form-control">
                                                <option value="">กรุณาเลือก</option>
                                                <?php for($i = (date("Y")+543); $i >= (date("Y")+543-20) ; $i-- ){?>
                                                    <option value="<?php echo $i; ?>"<?php echo (set_value('sign_date') == $i?' selected':''); ?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>

							</div>
				
					
						
                                    
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
						<h3 class="box-title">User List</h3>
					</div>
					<div class="box-body">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>ชื่อผู้ได้รับ </th>
									<th>ชื่อเครื่องราชทาน</th>
									<th>ชื่อตัวย่อ</th>
									<th>ปีที่ได้รับ</th>
									
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								<?php foreach ($sign as $row):?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['usr_tfname'];?> &nbsp;&nbsp; <?php echo $row['usr_tlname'];?></td>
										<td><?php echo $row['dec_name'];?></td>
										<td><?php echo $row['dec_abb'];?></td>
										<td><?php echo $row['sign_date'];?></td>
										
										
										
										<td align="center">
											
										
											<a type="button" class="del close pull-center" 
                                                    style="float:none !important;" data-toggle="modal" 
                                                    data-target="#del_1" aria-hidden="true" data="<?php echo $row['sign_id'];?>">
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


<!-- model for delete -->
<<div class="modal fade" id="del_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> ลบข้อมูลการได้รับเครื่องราชทาน</h4>
                </div>
                <form action="<?php echo site_url('c_admin_insignia/delete/'); ?>" method="post">
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
                    url: "<?php echo site_url('c_admin_insignia/get'); ?>",
                    method:'POST',
                    data: {
                        sign_id: $(this).attr('data'),
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
				url: "<?php echo site_url('c_admin_insignia/edit/'); ?>",
				data: $('.myformedt').serialize(),
				success: function(response){
					var obj = jQuery.parseJSON(response);
					if(obj.message == 'fail')
					{
						
						$('.error.sign_date').html(obj.sign_date);
						$('.error.pos_id').html(obj.pos_id);
					
					}
					else
					{
						window.location.href = "<?php echo site_url('c_admin_insignia'); ?>";
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
	

    


</script>
<script>
                  
				  
					$( "#usr_id" ).change(function() {

						jQuery("#workage-display").val($(this).find(':selected').attr('data-dateforwork') )
						jQuery("#sign_date_id").val($(this).find(':selected').attr('data-dateforwork') )
						jQuery("#inputPos").val( $(this).find(':selected').attr('data-posty') )
						jQuery("#pos_type").val( $(this).find(':selected').attr('data-pos') )
						
						// alert('The option with value ' + $(this).val() + ' and text ' + $(this).find(':selected').attr('data-dateforwork') + ' was selected.');

					});
					
					$( "#dec_id" ).change(function() {

						jQuery("#dec_abb").val( $(this).find(':selected').attr('data-abb') )
						// alert('The option with value ' + $(this).val() + ' and text ' + $(this).find(':selected').attr('data-dateforwork') + ' was selected.');

					});
					
					
					
				  
				  
			
			
		function position_change(obj){
            var t = obj.getAttribute("datatype");
            $.ajax({
                url: "<?php echo site_url('c_admin_insignia/getPositionById'); ?>",
                method:'post',
                data: {
                    posty_id: obj.value,
                },
                success:function(res){
                    $('#inputPosition'+t).children().remove();
                    $('#inputPosition'+t).append(res);
                },
                error:function(err){

                }
            });
        }
		function pos_change(obj){
            var type = obj.getAttribute("datatype");
            var t = obj.options[obj.selectedIndex].getAttribute('datapos');
            if(t != null){
                $("#inputPos"+type+" option[value='"+t+"']").prop('selected', true);
            }
        }
                  function del(id,delid){
                    div.removeChild(id);
                    deldiv.removeChild(delid);
                  }
                  </script>
		<script>
		jQuery(document).ready(function(){
			jQuery("#usr_id").change(function(){
				console.log($(this).val())
				var usr_id = $(this).val();

				jQuery.getJSON("<?php echo site_url('c_admin_insignia/get_Probability/');?>/"+usr_id, function(result){
					render_year(result.usr_dateforwork)
					
					if(result.current_insignia.sign_date == null){
						jQuery("#current_insignia").val("ไม่มีข้อมูลเครื่องราชล่าสุด");
						jQuery("#sign_date_id").val("ไม่มีข้อมูลปีที่ได้รับ");
						jQuery("#sign_date").val("")
						
						//jQuery("#sign_date_id").val($(this).find(':selected').attr('data-dateforwork') )
						jQuery("#dec_abb").val(result.probability.dec_abb);
					}else{
						jQuery("#current_insignia").val(result.current_insignia.dec_abb);
						jQuery("#sign_date_id").val(result.current_insignia.sign_date);
						jQuery("#sign_date").val(result.current_insignia.sign_date)
						
						
					}
					if(result.probability == null){
						jQuery("#dec_name").val("ยังไม่สามารถรับเครื่องราชได้");
						jQuery("#dec_abb").val("ยังไม่สามารถรับเครื่องราชได้");
						jQuery("#dec_abb_id").val("ยังไม่สามารถรับเครื่องราชได้");
						$('#sign_date').append($("<option></option>")
	                    	.attr("value","")
	                    	.text("ยังไม่สามารถรับเครื่องราชได้")); 
						jQuery(".btn-success").hide();
					}else{
						jQuery("#dec_name").val(result.probability.dec_name);
						jQuery("#dec_abb_id").val(result.probability.dec_id);
						jQuery("#sign_date_hidden").val(result.probability.pos_year);
						jQuery("#sign_date").val(result.probability.pos_year);
						
						jQuery(".btn-success").show();
					}
					
					if(result.current_insignia.dec_id == result.probability.dec_id){
						jQuery("#dec_name").val("ได้รับเครื่องราชสูงสุดแล้ว");
						jQuery("#sign_date").val("");
						jQuery("#dec_abb").val("ได้รับเครื่องราชสูงสุดแล้ว");
						jQuery(".btn-success").hide();
					}else{
						jQuery("#dec_name").val(result.probability.dec_name);
						jQuery("#dec_abb").val(result.probability.dec_abb);
						jQuery(".btn-success").show();
					}
					
					jQuery("#dec_abb_id").val(result.probability.dec_id);
					jQuery("#sign_name_id").val(result.probability.sign_id);
		
				});
			});
		});
		</script>
               <script>
			   function render_year(year) {
					jQuery('#sign_date').empty()
					for (i = year; i <= <?php echo date('Y')+543;?>; i++) {
	    			 $('#sign_date').append($("<option></option>")
	                    .attr("value",i)
	                    .text(i)); 
					}
					}
				</script>    
					
					
					
			
					
					</form>
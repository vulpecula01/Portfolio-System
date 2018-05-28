<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Insignia Management
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
					<form class="myform" data-toggle="validator" role="form" method="post" action="<?php echo site_url('c_forecast/index/');?>">
						<div class="box-body">
							<div class="row">
							<div class="col-xs-12 col-md-12 col-sm-12">
					<?php
				$sign = 7;

				if ($sign < "10") {
				echo "Have a good morning!";
					} elseif ($t < "20") {
				echo "Have a good day!";
			} else {
				echo "Have a good night!";
					}
					?>
							
					
							</div>
								</div>
						
                                    
						
					</form>
				</div> 
			</div>

		</div><!-- /.row (main row) -->

		<!-- Second row -->
		


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
			<form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('test/edit/');?>">
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
                <form action="<?php echo site_url('test/delete/'); ?>" method="post">
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
                    url: "<?php echo site_url('test/get'); ?>",
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
				url: "<?php echo site_url('test/edit/'); ?>",
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
						window.location.href = "<?php echo site_url('test'); ?>";
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

						jQuery("#workage-display").val( <?php echo date('Y')+543;?>-$(this).find(':selected').attr('data-dateforwork') )
						jQuery("#inputPos").val( $(this).find(':selected').attr('data-posty') )
						// alert('The option with value ' + $(this).val() + ' and text ' + $(this).find(':selected').attr('data-dateforwork') + ' was selected.');

					});
					
					$( "#dec_id" ).change(function() {

						jQuery("#dec_abb").val( $(this).find(':selected').attr('data-abb') )
						// alert('The option with value ' + $(this).val() + ' and text ' + $(this).find(':selected').attr('data-dateforwork') + ' was selected.');

					});
					
					
				  
				  
			
			
		function position_change(obj){
            var t = obj.getAttribute("datatype");
            $.ajax({
                url: "<?php echo site_url('test/getPositionById'); ?>",
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
				  
                   
					
					
					
			
					
					</form>
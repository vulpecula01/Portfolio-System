
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
				เครื่องราชอิสริยาภรณ์
				<small>
                    <?php echo $this->session->flashdata('result');?>
                </small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">insignia</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                <!-- general form elements disabled -->
                    <div class="box box-info">
                        
                             </div>
				</div> 
</div>
                <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">คาดการณ์การได้รับเครื่องราชทาน </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>ชื่อเครื่องราชปัจจุบัน</th>
                                                <th>ชื่อเครื่องราชที่จะได้รับ</th>
                                                <th>ปีที่จะได้รับ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($redult as $row){?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo @$row['person']['usr_tfname']." ".@$row['person']['usr_tlname']; ?></td>
                                                <td>
                                                    <?php if(@$row['current_insignia'] ==""){
                                                        echo "0. ยังไม่ได้รับ";   
                                                    } else{
                                                        echo @$row['current_insignia']['dec_abb'];
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(@$row['probability'] ==""){
                                                        echo "0. ยังไม่สามารถรับได้";
                                                    }else{
                                                        echo @$row['probability']['dec_abb'];
                                                    }?>
                                                </td>
                                                 <td>
                                              
                                                    <?php if(@$row['info'] ==""){
                                                        if(!@$row['probability']){
                                                            echo "0. ไม่ตรงตามเงื่อน";
                                                        }else{
                                                            echo @$row['person']['usr_dateforwork'] + @$row['probability']['pos_year'];
                                                        }   
                                                    } elseif(@$row['probability'] =="") {
                                                        echo "0. ไม่ตรงตามเงื่อน";
                                                        
                                                    } else{
                                                        echo @$row['info']['sign_date'] + @$row['probability']['pos_year'];
                                                    }?>
                                    
                                                 </td>
                                             
                                            </tr>
                                         <?php } ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div> <!-- /.second row -
        </section><!-- /.content -->
    </aside><!-- /.right-side -->

    <!-- COMPOSE MESSAGE MODAL -->


    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function() {
            // $('#myform').validator()
        });
        $(function(){
            $('.edt').click(function(){
                $.ajax({
                    url: "<?php echo site_url('c_insignia/getById'); ?>",
                    method:'post',
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
        });

        $(function(){
            $('.modal-dialog').on('submit', '.myformedt', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('c_insignia/update_self/'.$ret); ?>",
                    data: $('.myformedt').serialize(),
                    success: function(response){
                        var obj = jQuery.parseJSON(response);
                        if(obj.message == 'fail')
                        {
                            $('.error.insigniaEN').html(obj.insigniaEN);
                            $('.error.insigniaTH').html(obj.insigniaTH);
                            $('.error.year').html(obj.year);
                            $('.error.locationEN').html(obj.locationEN);
                            $('.error.locationTH').html(obj.locationTH);
                        }
                        else
                        {
                            window.location.href = "<?php echo site_url('c_insignia/index/'.$ret); ?>";
                        }
                    },
                    error: function(){
                        alert('Error');
                    }
                });     
            });
        });

    $('#insigniaEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#insigniaTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#locationEN').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });
    $('#locationTH').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
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

    $('#edb_tthesistopic').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^ก-๐0-9]/g,' '))
        });
    $('#edb_ethesistopic').bind('keyup blur',function() { 
            $(this).val($(this).val().replace(/[^A-Za-z0-9]/g,' '))
        });


    </script>
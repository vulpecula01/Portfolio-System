<?php
    $ret = $this->encrypt->encode($user_id);
    $ret = strtr(
        $ret,
        array(
            '+' => '.',
            '=' => '-',
            '/' => '~'
        )
    );
?> 
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
                        <form role="form" action="<?php echo site_url('c_insignia/index/'.$ret); ?>" method="post">
                             </div>
				</div> 
</div>
                <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายชื่อเครื่องราชทานที่ได้รับ</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">                                                  
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ชื่อเครื่องราชทาน</th>
                                                <th>ชื่ออักษรย่อ</th>
                                                <th>ปีที่ได้รับ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            <?php foreach ($insignia as $row):?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['dec_name'];?></td>
                                                <td><?php echo $row['dec_abb'];?></td>
                                                <td><?php echo $row['sign_date'];?></td>
                                                
                                               
                                                

                                            </tr>
                                            <?php $i++;?>
                                            <?php endforeach;?>
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
    <!-- model for edit -->
    <div class="modal fade" id="edit_1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="myformedt" data-toggle="validator" role="form" method="post" novalidate="true" action="<?php echo site_url('c_insignia/update_self/'.$ret); ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit insignia</h4>
                    </div>
                    <div class="box-body edit-box">
                            <!-- text input -->
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix" >
                        <button type="reset" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-times"></i> 
                            Close
                        </button>
                        <button type="submit" class="btn btn-success pull-right ">
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete insignia</h4>
                </div>
                <form action="<?php echo site_url('c_insignia/delete_self/'.$ret); ?>" method="post">
                    <input type="hidden" class="form-control" id="deleteId" name="id" value="1"/>
                    <div class="modal-body">
                        You want to delete insignia?
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
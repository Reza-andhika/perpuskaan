<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('klasifikasi/akurasi'); ?>">Laporan Detail Akurasi</a></li>
            <li class="active">Data Kategori</li>
        </ol>

        <?php
        if(!empty($message)){
            echo "$message";
        }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
       
        <div class="panel panel-default">

            <div class="panel-heading">
                Data Confusion Matix
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <?php echo form_open('',array('class'=>'form-horizontal')) ?>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Akurasi </p>

                    <div class="col-sm-10">
                        <input type="text" name="kategori" class="form-control" readonly="" value="<?php echo "$akurasi" ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Total Presisi </p>

                    <div class="col-sm-10">
                        <input type="text" name="kategori" class="form-control" readonly="" value="<?php echo "$presisi" ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Total Recall </p>

                    <div class="col-sm-10">
                        <input type="text" name="kategori" class="form-control" readonly="" value="<?php echo "$recall" ?>">
                    </div>
                </div>
                <?php echo form_close();?>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Kategori</td>
                            <td>Presisi</td>
                            <td>Recall</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td> 1 </td>
                            <td> Agama </td>
                            <td> <?php echo $P_agama; ?></td>
                            <td> <?php echo $R_agama; ?> </td>
                            
                        </tr>

                        <tr>
                            <td> 2 </td>
                            <td> Sastra </td>
                            <td> <?php echo $P_sastra; ?></td>
                            <td> <?php echo $R_sastra; ?> </td>
                            
                        </tr>

                        <tr>
                            <td> 3 </td>
                            <td> Umum </td>
                            <td> <?php echo $P_umum; ?></td>
                            <td> <?php echo $R_umum; ?> </td>
                            
                        </tr>

                        <tr>
                            <td> 4 </td>
                            <td> Teknologi </td>
                            <td> <?php echo $P_tek; ?></td>
                            <td> <?php echo $R_tek; ?> </td>
                            
                        </tr>

                        <tr>
                            <td> 5 </td>
                            <td> Matematika dan Sains </td>
                            <td> <?php echo $P_msain; ?></td>
                            <td> <?php echo $R_msain; ?> </td>
                            
                        </tr>
                      
                    </tbody>
                </table>
            </div>
            
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTables-example').DataTable({
            responsive:true;
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(".restore").click(function(){
            var kategori=$(this).attr("kategori");
            
            $.ajax({
                url:"<?php echo site_url('kategori/restore');?>",
                type:"POST",
                data:"kategori="+kategori,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('kategori/index/create-success');?>";
                }
            });
        });
    });
</script>
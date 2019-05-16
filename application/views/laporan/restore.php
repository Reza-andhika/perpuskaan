<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('kategori/all_temp'); ?>">Laporan Kategori Terhapus</a></li>
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
                Data Klasifikasi
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Kategori</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($list as $value) {
                        ?>
                        <tr>
                            <td> <?php echo $no;?> </td>
                            <td> <?php echo $value->kategori; ?> </td>
                            <td class="text-center"> 
                                <a href="#" name="<?php echo $value->kategori;?>" class="restore btn btn-success" kategori="<?php echo $value->kategori;?>">Restore</a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
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
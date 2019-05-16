<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dataset'); ?>">dataset</a></li>
            <li class="active">Data dataset</li>
        </ol>

        <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('dataset/get_kategori');?>" name="add" method="POST">
            <input type="submit" name="add" value="Add" class="btn-primary btn-sm">
        

        <select name="kategori" id="kategori">
    <option>- Pilih Kategori -</option>
    <?php
        foreach ($kategori as $baris) {
 
            echo "<option value='".$baris->kategori."'>".$baris->kategori."</option>";
        }
    ?>
</select>
        <br /><br />
        </form>
        <div class="panel panel-default">

            <div class="panel-heading">
                List Dataset
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Judul </td>
                                        <td>Sinopsis</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($judul as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row->judul;?></td>
                                        <td><?php echo $row->kategori;?></td>                                 
                                        
                                    </tr>
                                <?php $no++; } ?>    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
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
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
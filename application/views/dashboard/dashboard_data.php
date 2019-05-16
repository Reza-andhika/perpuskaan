<br />
<div class="panel panel-default">
    <div class="panel-heading">

    <div class="row">
        <div class="col-lg-12">
            Dashboard
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $akurasi; ?></div>
                                <div>Total Akurasi!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('klasifikasi/akurasi'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa  fa-share-square fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $dataset; ?></div>
                                <div>Jumlah Dataset</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('dataset/'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check-square   fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $restore; ?></div>
                                <div>Kategori Terhapus!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('Kategori/all_temp'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>

</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>


<!-- test jquery -->
<script type="text/javascript">

    $(document).ready(function(){
        // alert('test jquery');
        
    });
</script>
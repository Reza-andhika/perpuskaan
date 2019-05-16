<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dataset/jumlah_dataset'); ?>">dataset</a></li>
            <li class="active">Diagram Dataset</li>
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
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Diagram Dataset

            </div>
                <input type="hidden" name="agama" id="agama" value="<?php echo $jml_agama?>" readonly="">
                <input type="hidden" name="sastra" id="sastra" value="<?php echo $jml_sastra?>" readonly="">
                <input type="hidden" name="umum" id="umum" value="<?php echo $jml_umum?>" readonly="">
                <input type="hidden" name="tek" id="tek" value="<?php echo $jml_tek?>" readonly="">
                <input type="hidden" name="msain" id="msain" value="<?php echo $jml_msain?>" readonly="">
                <canvas id="mychart"></canvas>
                
            <div class="panel-body">
                            
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

<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/chartjs/Chart.js"></script>

<script>
var kode=document.getElementById('agama').value;
var sastra=document.getElementById('sastra').value;
var umum=document.getElementById('umum').value;
var tek=document.getElementById('tek').value;
var msain=document.getElementById('msain').value;
var ctx = document.getElementById('mychart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Agama', 'Satra' ,'Umum' ,'Teknologi', 'Matematika dan Sains'],
        datasets: [{
            label: '',
            data: [kode, sastra, umum, tek, msain],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(25, 99, 192, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(25, 99, 192, 0.2)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>



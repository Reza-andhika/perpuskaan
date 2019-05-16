<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('klasifikasi'); ?>">Klasifikasi</a></li>
            <li class="active">Klasifikasi</li>
        </ol>

        <?php
            echo validation_errors();
            //buat message nis
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
                Create Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            
            <?php echo form_open_multipart('klasifikasi/klasifikasi', array('class' => 'form-horizontal')) ?>
                <div class="form-group">
                    <p class="col-sm-2 text-left">Judul</p>

                    <div class="col-sm-10">
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul Dalam Bahasa Indonesia" value="<?php echo set_value('Judul'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Sinopsis</p>

                    <div class="col-sm-10">
                        <textarea type="text" name="sinopsis" id="sinopsis" class="form-control" rows="14" value="<?php echo set_value('Sinopsis'); ?>"> </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-3 text-left">
                        Hasil Yang Diharapkan</p>
                    <select name="kategori-harap" id="kategori-harap">
                        <option value="- Pilih Kategori -">- Pilih Kategori -</option>
                        <?php
                            foreach ($kategori as $baris) {
                     
                                echo "<option value='".$baris->kategori."'>".$baris->kategori."</option>";
                               
                            }
                             
                        ?>
                        </select> 
                        <?php echo "Jika Tidak Memilih Kategori (- Pilih Kategori-) Secara Default Prediksi sistem bernilai benar"; ?>

                        
                </div>

                <div class="form-group">

                    
                </div>

                <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="klasifikasi" value="Klasifikasi" class="btn btn-success btn-sm">
                        </div>
                </div>

                </br>
                <br>
            </form>
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

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>
<!-- For Costum textarea like word-->
<script type="text/javascript">
    function pilih(form){
        if (form.kategori-harap.value=="- Pilih Kategori -") {
            alert("Anda tidak memilih kategori yang diharapkan maka secara otomatis sistem akan mendeklarasikan bahwa <strong> prediksi bernilai benar</strong>, hal ini akan berpengaruh pada akurasi");
            return(false);
        }
        return(true);
    }
</script>


<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/zircos_1.6/menu_2_md/page-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Mar 2017 23:55:11 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">


<!-- Head-->
  <?php $this->load->view('template/head'); ?>

    </head>


    <body>
        <!-- Navigation Bar-->
            <?php $this->load->view('template/header'); ?>
        
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li>
                                        <a href="#">Nilai</a>
                                    </li>
                                    
                                    <li class="active">
                                        Input Nilai
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Input Nilai</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                                    <div class="p-20">
                                        <form method="post" role="form" data-parsley-validate novalidate action="<?php echo base_url(); ?>index.php/Input_Nilai/save/" onSubmit="return cekform()">
                                            <div class="form-group row" hidden="">
                                                <label for="kode_jabatan" class="col-sm-4 form-control-label">Index<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Kode Akun"
                                                           id="id" name="id" value="<?php echo $id; ?>">
                                                </div>
                                            </div>
                                            <div id="hid1" class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Kode PIN</label>
                                                </div>
                                                <input type="hidden" name="hid_pin" id="hid_pin" value="$pin">
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="pin" name="pin" placeholder="Kode PIN" class="form-control"  value="<?php echo $pin; ?>" required="">
                                                </div>
                                            </div>
                                            <div id="hid1" class="row form-group">
                                                <div id="hid2" class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nilai Developer</label>
                                                </div>
                                                <div id="hid3" class="col-12 col-md-2">
                                                   <input id="nilai" type="password" name="nilai" required=""> 
                                                   <input type="hidden" name="hid_nilai" id="hid_nilai" value="<?php echo"$nilai"?>">
                                                </div>
                                                <div id="hid4" class="col-12 col-md-2">
                                                   * 1-100
                                                </div>

                                                <script>
                                                function myFunction() {
                                                  document.getElementById("hid1").style.display="none";
                                                  document.getElementById("hid2").style.display="none";
                                                  document.getElementById("hid3").style.display="none";
                                                  document.getElementById("hid4").style.display="none";
                                                  document.getElementById("hid5").style.display="none";
                                                  document.getElementById("hid6").style.display="none";
                                                  document.getElementById("nilai").style.display="none";
                                                  document.getElementById("appear1").style.display="block";
                                                  document.getElementById("appear2").style.display="block";
                                                  
                                                }
                                                </script>
                                               
                                            </div>
                                            <div id="hid6" class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Catatan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    <textarea name="catatan" id="catatan" rows="10" cols="80"  class="form-control"></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <div class="col-sm-7 col-sm-offset-3">
                                                <button id="hid5" onclick="myFunction()" name="steven" class="btn btn-primary waves-effect waves-light">
                                                        Done
                                                    </button>  
                                                </div>
                                            </div>
                                            
                                            <div style="display: none;" id="appear1" class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Poin Pengunjung</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                   <input id="poin" type="password" name="poin" required=""> 
                                                </div>
                                                <div class="col-12 col-md-2">
                                                   * 30-100
                                                </div>
                                               
                                            </div>
                                            <div style="display: none;" id="appear2" class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                            </div>
                            </div>
                            <!-- end row -->
                    </div>
                </div>

                <!-- end page title end breadcrumb -->


                <!-- Footer -->
                    <?php $this->load->view('template/footer'); ?>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
            <?php $this->load->view('template/foot'); ?>
    </body>

<!-- Mirrored from coderthemes.com/zircos_1.6/menu_2_md/page-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Mar 2017 23:55:11 GMT -->
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script>
        
    ClassicEditor
        .create( document.querySelector( '#catatan' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script>
        $("input[name='nilai']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 0,
                boostat: 5,
                maxboostedstep: 10,
            });
    </script>
    <script>
        $("input[name='poin']").TouchSpin({
                min: 30,
                max: 100,
                step: 0.1,
                decimals: 0,
                boostat: 5,
                maxboostedstep: 10,
            });
    </script>

</html>
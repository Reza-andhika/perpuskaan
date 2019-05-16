<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"><strong>PERPUSTAKAAN</strong></a>
            </div>
            <!-- /.navbar-header -->

          
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <br>
                        <li>
                            <a href="#"><i class="fa fa-desktop fa-fw"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> 
                                    <a href="<?php echo base_url('kategori'); ?>"><i class="fa fa-users fa-fw"></i> Kategori</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('klasifikasi'); ?>"><i class="fa fa-book fa-fw"></i> Klasifikasi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('dataset'); ?>"><i class="glyphicon glyphicon-user"></i> Dataset</a>
                                </li>
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Module Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> 
                                    <a href="<?php echo base_url('klasifikasi/laporan'); ?>"><i class="fa fa-book fa-fw"></i> Histori Klasifikasi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('kategori/all_temp'); ?>"><i class="fa fa-refresh fa-fw"></i> List Restore</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('klasifikasi/akurasi'); ?>"><i class="fa fa-percent fa-fw"></i> Detail Akurasi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('dataset/jumlah_dataset'); ?>"><i class="fa  fa-bar-chart fa-fw"></i> Jumlah Dataset</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>User</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url('assets/template/img/favicon.ico')?>" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/template/css/theme-default.css')?>" 
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index">User</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <a href="#" class="profile-mini">
                            
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url('assets/template/assets/images/users/no-image.jpg')?>" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"> <?php echo $this->session->userdata('namaasli') ?> </div>
                                <div class="profile-data-title">Karyawan TBB</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Welcome!</li>
                                       
                    <li class="x-navigation-horizontal">
                        <a href="tabel2"><span class="fa fa-files-o"></span> <span class="xn-text">Lihat Data Presensi</span></a>
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="<?php echo base_url("index.php/LoginBisa/logout"); ?>" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">User</a></li>                    
                    <li class="active">Lihat Data Presensi</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Presensi</h3>  
                                </div>

                                <div class ="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        
                                        $no = 1;
                                        foreach($abc as $u){
                                        ?>
                                        <tr>
                                        <td> <?php echo $no++ ?></td>
                                        <td> <?php echo $u->TGL_PRESENSI ?></td>
                                        <td> <?php echo $u->PRESENSI ?></td>
                                    </tr>
                                        <?php } ?>
                                    </tr>
                                    
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            


                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <h3 class="panel-title">Total Presensi</h3>  
                                    </div>

                                    <div class ="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        
                                        $no = 1;
                                        foreach($def as $u){
                                        ?>
                                        <tr>
                                        <td> <?php echo $no++ ?></td>
                                        <td> <?php echo $u->PRESENSI ?></td>
                                        <td> <?php echo $u->Jumlah ?></td>
                                    </tr>
                                        <?php } ?>
                                    </tr>
                                    
                                    </tr>
                                    </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo base_url("index.php/LoginBisa/logout"); ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/jquery/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/jquery/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/bootstrap/bootstrap.min.js')?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo base_url('assets/template/js/plugins/icheck/icheck.min.js')?>'></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/settings.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins.js')?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/actions.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/demo_dashboard.js')?>"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>







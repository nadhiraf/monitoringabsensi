<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Admin</title>            
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
                        <a href="index">Admin</a>
                        <a href="View_Admin" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url('assets/template/assets/images/users/no-image.jpg')?>" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url('assets/template/assets/images/users/no-image.jpg')?>" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $this->session->userdata('namaasli') ?> </div>
                                <div class="profile-data-title">Admin</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Welcome!</li>
                    <li class="x-navigation-horizontal">
                        <a href="<?php echo base_url("index.php/Admin/upload"); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Update Data Presensi</span></a>                        
                    </li>                    
                    <li class="x-navigation-horizontal">
                        <a href="<?php echo base_url("index.php/Admin/tabel"); ?>"><span class="fa fa-files-o"></span> <span class="xn-text">Lihat Data Presensi</span></a>
                    </li>
                    <li class="x-navigation-horizontal">
                        <a href="<?php echo base_url("index.php/Admin/grafik"); ?>"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Lihat Grafik Data</span></a>
                    </li>
                    <li class="x-navigation-horizontal">
                        <a href="<?php echo base_url("index.php/Admin/datak"); ?>"><span class="fa fa-table"></span> <span class="xn-text">Lihat Data Karyawan</span></a>
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
                    <li><a href="#">Admin</a></li>                    
                    <li class="active">Welcome</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                         <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Halaman Admin</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                <h4> Selamat Datang, pada halaman ini anda dapat melakukan berbagai hal terkait dengan tugas admin diantaranya : </h4> </div>
                                <div class="col-md-6">
                                <ul class="list-group border-bottom">
                                    <li class="list-group-item">Update Data Presensi Karyawan</li>
                                    <li class="list-group-item">Melihat Grafik Data Presensi Karyawan</li>
                                    <li class="list-group-item">Melihat Data Presensi Karyawan</li>
                                    <li class="list-group-item">Melihat Data Karyawan</li>
                                </ul></div>

                                <div class="col-sm-12">
                                <br>
                                <h4>Silahkan klik pada tombol disamping untuk menggunakan fitur-fitur tersebut!</h4></div>
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
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/jquery/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/jquery/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/bootstrap/bootstrap.min.js')?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo base_url('assets/template/js/plugins/icheck/icheck.min.js')?>'></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/scrolltotop/scrolltopcontrol.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/morris/raphael-min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/morris/morris.min.js')?>"></script>       
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/rickshaw/d3.v3.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/rickshaw/rickshaw.min.js')?>"></script>
        <script type='text/javascript' src='<?php echo base_url('assets/template/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>'></script>
        <script type='text/javascript' src='<?php echo base_url('assets/template/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>'></script>                
        <script type='text/javascript' src='<?php echo base_url('assets/template/js/plugins/bootstrap/bootstrap-datepicker.js')?>'></script>                
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/owl/owl.carousel.min.js')?>"></script>                 
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/moment.min.js"></script>
        <script type="text/javascript')?>" src="<?php echo base_url('assets/template/js/plugins/daterangepicker/daterangepicker.js')?>"></script>
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







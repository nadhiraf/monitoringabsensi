<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Line Manager</title>            
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
                        <a href="Line_Manager">Line Manager</a>
                        <a href="#" class="x-navigation-control"></a>
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
                                <div class="profile-data-name"><?php echo $this->session->userdata('namaasli') ?></div>
                                <div class="profile-data-title">Line Manager</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Welcome!</li>                  
                    <li class="x-navigation-horizontal">
                        <a href="datapl"><span class="fa fa-files-o"></span> <span class="xn-text">Lihat Data Presensi</span></a>
                    </li>
                    <li class="active">
                        <a href="grafikm"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Lihat Grafik Data</span></a>
                    </li>
                    <li class="x-navigation-horizontal">
                        <a href="datakm"><span class="fa fa-table"></span> <span class="xn-text">Lihat Data Karyawan</span></a>
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
                    <li><a href="#">Line Manager</a></li>                    
                    <li class="active">Grafik Data</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Grafik Data Presensi Karyawan</h3>
                                </div>
                                <div class="panel-body">                                    
                                    <div id="charts-column"></div>
                                    <h4>Filter Data</h4>
                                <form method = "post" role="form" class="form-horizontal" action="<?php echo site_url("Line_Manager/grafikm"); ?>" >                          
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Bulan</label>
                                        <div class="col-md-4">                                        
                                            <select name ="option" class="form-control select" onchange="this.form.submit()">
                                                <option value = "Januari">Januari</option>
                                                <option value = "Februari">Februari</option>
                                                <option value = "Maret">Maret</option>
                                                <option value = "April">April</option>
                                                <option value = "Mei">Mei</option>
                                                <option value = "Juni">Juni</option>
                                                <option value = "Juli">Juli</option>
                                                <option value = "Agustus">Agustus</option>
                                                <option value = "September">September</option>
                                                <option value = "Oktober">Oktober</option>
                                                <option value = "November">November</option>
                                                <option value = "Desember">Desember</option>
                                                <option value = "All">ALL</option>
                                            </select>
                                        </div>
                                    
                                        <label class="col-md-1 control-label">Tahun</label>
                                        <div class="col-md-4">                                        
                                            <select class="form-control select">
                                                <option>2017</option>
                                                <option>2018</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                        <button type="button" class="btn btn-info btn-rounded">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Presensi</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>   
                                            <?php 
                                        
                                        $no = 1;
                                        foreach($hasil_count as $u){
                                        ?>
                                        <tr>
                                        <td> <?php echo $no++ ?></td>
                                        <td> <?php echo $u->PRESENSI ?></td>
                                        <td> <?php echo $u->Jumlah ?></td>
                                    </tr>
                                        <?php } ?>
                                               
                                            </tr>
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                                </div>
                            </div>                                                        
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
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/rickshaw/d3.v3.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins/rickshaw/rickshaw.min.js')?>"></script> 
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/settings.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/plugins.js')?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/actions.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/template/js/demo_charts_rickshaw.js')?>"></script>>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>

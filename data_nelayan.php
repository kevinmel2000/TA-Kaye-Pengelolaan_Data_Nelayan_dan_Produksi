<?php include('menu/session.php') ?>
<head>
    <?php include('menu/head.php') ?>
</head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
          <?php include('menu/atas.php') ?>
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <?php include('menu/sampingnelayan.php') ?>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Data Nelayan</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Data Nelayan
                            <small>Tabel Data Nelayan</small>
                        </h1>
                        <a class="btn btn-primary" href="input_nelayan.php">+ Tambah Data</a>
                        <a class="btn btn-danger" onclick="window.open('report_nelayan.php', '_blank', 'toolbar=0, location=0, menubar=0');"tyle="margin-left:881px;"><i class="icon-printer"></i> Cetak</a>
                       <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> ID Nelayan </th>
                                                        <th> Nama Nelayan </th>
                                                        <th> Tempat Lahir </th>
                                                        <th> Tanggal Lahir </th>
                                                        <th> Alamat </th>
                                                        <th> Opsi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    include "connect.php";
                                                    if(isset($_GET['cari'])){
                                                        $cari = ($_GET['cari']);
                                                        $query_mysql = mysql_query("SELECT * FROM data_nelayan WHERE id_nelayan like '%$cari%' OR nama_nelayan like '%$cari%'")or die(mysql_error());
                                                    }else{
                                                        $query_mysql = mysql_query("SELECT * FROM data_nelayan")or die(mysql_error());  
                                                    }
                                                    $nomor = 1;
                                                    while($data = mysql_fetch_array($query_mysql)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $data['id_nelayan']; ?></td>
                                                        <td><?php echo $data['nama_nelayan']; ?></td>
                                                        <td><?php echo $data['tempat_lahir_nelayan']; ?></td>
                                                        <td><?php echo $data['tanggal_lahir_nelayan']; ?></td>
                                                        <td><?php echo $data['alamat_nelayan']; ?></td>
                                                        <td>
                                                            <a href="edit_nelayan.php?id=<?php echo $data['id_nelayan']; ?>" class="btn btn-outline btn-circle btn-sm yellow" ><i class="icon-pencil"></i> Edit </a>
                                                            <a href="hapus_nelayan.php?id=<?php echo $data['id_nelayan']; ?>" class="btn btn-outline btn-circle btn-sm red" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA INI ... ?')"><i class="icon-trash"></i> Hapus </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                        <div class="clearfix"></div>
                      
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; Kharisma
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <div class="quick-nav-overlay"></div>
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
</body>
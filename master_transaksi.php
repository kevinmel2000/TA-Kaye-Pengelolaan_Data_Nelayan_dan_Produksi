<?php
    include_once("tglindo.php");
?>
<?php include('menu/session.php') ?>
<head>
       <?php include('menu/head.php') 
      
        ?></head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
          <?php include('menu/atas.php') ?>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">    
          <?php include('menu/sampinghasil.php') ?>
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
                                    <span>Hasil Tangkapan</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Hasil Tangkapan
                            <small>Tabel Hasil Tangkapan</small>
                        </h1>
                        <div class="col-md-10" style="margin-bottom:10px; margin-left:-30px;">
                        <div class="col-md-3">
                        <a class="btn btn-primary" href="input_tangkap.php"><i class="icon-plus"></i> Input</a>
                        <a class="btn btn-danger" onclick="window.open('report_tangkap.php', '_blank', 'toolbar=0, location=0, menubar=0');"><i class="icon-printer"></i> Cetak</a>
                       </div>
                       <td width="195" valign="top">
                       <div class="col-md-5">
                        <select class="bs-select form-control" name="id" id="id" onChange="pilih(this.value)">
                            <option value="0" selected="selected">Pilih Nama</option>
                            <?php 

                            $query_limit=mysql_query("SELECT a.id_nelayan, b.nama_nelayan FROM hasil_tangkapan AS a, data_nelayan AS b WHERE a.id_nelayan = b.id_nelayan GROUP BY b.nama_nelayan");
                            
                            while($row=mysql_fetch_array($query_limit))
                            {
                                ?><option value="<?php  echo $row['id_nelayan']; ?>"><?php  echo $row['nama_nelayan']; ?></option><?php 
                            }
                            ?>
                        </select>   
                        </div>
                        </div>
                        </td>
                       <div class="portlet-body">
                                       <script languange="Javascript1.2">
                                        function pilih(id){
                                            location.replace("master_transaksi.php?id="+id);
                                            $("#hola").show();
                                            $("#hola").hide();
                                        }
                                        </script>
                                        <?php
                                        include "connect.php";
                                        error_reporting(0);
                                        if($_GET['']!==""){
                                            $id=$_GET['id'];
                                            $query=mysql_query("SELECT * FROM data_nelayan WHERE id_nelayan='$id'");
                                            ?>
                                        <div class="table-scrollable" id="hola">
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> ID Nelayan </th>
                                                        <th> Nama Nelayan </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $nomor = 1;
                                                    // mysql_num_rows(result);
                                                    while($data = mysql_fetch_array($query)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $data['id_nelayan']; ?></td>
                                                        <td><?php echo $data['nama_nelayan']; ?></td>
                                                        <td>
                                                            <a href="detail_tangkapan.php?id=<?php echo $data['id_nelayan']; ?>" class="btn btn-outline btn-circle btn-sm yellow"><i class="icon-eye"></i> Detail </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                      
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; Kharisma
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
      <div class="modal fade bs-modal-lg" id="cetak" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" id="modalNelayanClose" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"> Cetak Hasil Tangkapan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                    <div type="button" name="input" rel="tooltip" class="btn btn-primary btn-fill" 
                    onclick="window.open('report_tangkap.php', '_blank', 'toolbar=0, location=0, menubar=0');">
                        <i class="icon-printer"></i> Cetak Semua Data
                    </div>
                  </div>  
                  <div align="center"><h3>Cetak Per Id</h3></div>
                       <div class="form-group" style="margin-top:20px;">
                    <label class="col-sm-3 control-label" form="form-control-5" style="margin-top:7px;">Nama Nelayan</label>
                    <div class="col-sm-6">          
                    <select name="nama" method="POST" action="report_detail_tangkap.php" class="form-control nama" required>                                                     
                    <option>- Pilih -</option>
                    <?php
                        include "connect.php";
                            $query = mysql_query("SELECT * FROM data_nelayan")or die(mysql_error());  
                             if(mysql_num_rows($query) != 0){
                                        while($data = mysql_fetch_assoc($query)){
                                            echo '<option value="'.$data['id_nelayan'].'">'.$data['nama_nelayan'].'</option>';
                                        }
                                    }
                    ?>
                      </select>

                    </div>
                     <br />
                  </div> 
                        </div>
                        <div class="modal-footer">
                            <a class="btn dark btn-outline" href="report_detail_tangkap.php?id=<?php echo $data['id_nelayan']; ?>" name="cetak_nama"><i class="icon-printer"></i> Cetak</a>
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
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    <!-- Google Code for Universal Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- End -->

<!-- Google Tag Manager -->
<noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-W276BJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W276BJ');</script>
<!-- End -->
</body>
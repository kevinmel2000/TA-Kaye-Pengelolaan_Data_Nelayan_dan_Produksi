<?php include('menu/session.php') ?>
<head>
    <?php include('menu/head.php') ?>
</head>
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
                        <h1 class="page-title">+ Tambah Hasil Tangkapan
                        </h1>
                    
                            <div class="portlet-body form">
                                <form action="proses_input_tangkap.php" method="post" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">ID Nelayan</label>
                                            <div class="col-md-4">
                                               
                                                <input type="text" id="id_nelayan" class="form-control" name="id_nelayan" />
                                                <div class="btn btn-primary" data-toggle="modal" href="#large" style="margin-left:340px; margin-top:-35px;">Pilih</div>
                                                 <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" id="modalNelayanClose" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Tabel Nama Nelayan</h4>
                                                    </div>
                                                    <div class="modal-body">  
                                                    <p> <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> ID Nelayan </th>
                                                        <th> Nama Nelayan </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    include "connect.php";
                                                    $query_mysql = mysql_query("SELECT id_nelayan, nama_nelayan FROM data_nelayan")or die(mysql_error());  
                                                        
                                                    $nomor = 1;

                                                    while($data = mysql_fetch_array($query_mysql)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $data['id_nelayan']; ?></td>
                                                        <td><?php echo $data['nama_nelayan']; ?></td>
                                                        <td><div class="btn btn-circle green" name="btn_pilih" id="btn_pilih<?php echo $nomor;?>">Pilih</div></td>
                                                    </tr>
                                                    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                                                    <script type="text/javascript">
                                                        $("#btn_pilih<?php echo $nomor++ ?>").click(function(){
                                                            $("#id_nelayan").val("<?php echo $data['id_nelayan'];?>");
                                                            $("#nama_nelayan").val("<?php echo $data['nama_nelayan'];?>");
                                                        });
                                                    </script>
                                                </tbody>
                                                <?php } ?>
                                            </table></p> </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Nelayan</label>
                                                <div class="col-md-4">
                                                    <input type="text" id="nama_nelayan" class="form-control" name="nama_nelayan" />
                                                </div>
                                        </div> 
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ikan Tangkapan</label>
                                            <div class="col-md-4">
                                               
                                                <?php require "cartikan/cart_vieww.php" ?>
                                                <a class="btn btn-primary" href="cartikan/index.php" style="margin-left:340px; margin-top:-35px;">Pilih</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Tangkapan</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="tgl_tangkapan">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Total Jumlah Tangkapan</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="jumlah_tangkapan" id="jumlah_tangkapan" value="<?php error_reporting(0);  echo $sub ?>">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-circle green" name="submit">Submit</button>
                                                <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                         
                        <div class="clearfix"></div>
                    </div>
                </div>
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
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
        <script type="text/javascript">
 
             $("#jenis_ikan").change(function(){
                var jenis_id = $("#jenis_ikan").val();
            
                $.ajax({
                    type: "POST",
                    url: "nama_ikan.php",
                    data: "prov="+jenis_id,
                    success: function(msg){
                        $("#isimodal").html(msg); 
                    }
                });    
            });
        </script>
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
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            function setName(data){
                var batas = data.indexOf(",");
                var panjang = data.length;
                var nama = data.substring(batas+1, panjang);
                var id = data.substring(0,batas);
                $("#nama_nelayan").val(nama);
            }

            function setTangkap(data){
                var batas = data.indexOf(",");
                var panjang = data.length;
                var jenis = data.substring(batas+1, panjang);
                var id = data.substring(0,batas);
                $("#jenis_ikan").val(jenis);
            }

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
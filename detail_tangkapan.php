<?php
    include_once("tglindo.php");
?>
<?php include('menu/session.php'); ?>
<head>
        <?php include('menu/head_profile.php');?>

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
                                    <span>Detail Tangkapan</span>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"> Detail Tangkapan
                        </h1>
                       <div class="portlet-body">
                        <div class="col-md-12">
                                <div class="profile-sidebar">
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <div class="profile-userpic">
                                            <img src="assets/pages/media/profile/noprofile.png" class="img-responsive" alt="" style="width:200px;height:200px;"> </div>
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name">
                                                 <?php
                                                    include "connect.php";
                                                    $id = $_GET['id'];
                                                    $query = "SELECT a.id_nelayan, b.nama_nelayan FROM hasil_tangkapan 
                                                      AS a INNER JOIN data_nelayan AS b WHERE a.id_nelayan = b.id_nelayan AND b.id_nelayan = '$id'";
                                                    $result = mysql_query($query);
                                                    $data = mysql_fetch_array($result);
                                                    echo $data['nama_nelayan'];
                                                ?>
                                            </div>
                                            <div class="profile-usertitle-job"> 
                                                 <?php
                                                    include "connect.php";
                                                    $id = $_GET['id'];
                                                    $query = "SELECT a.id_nelayan, b.alamat_nelayan FROM hasil_tangkapan 
                                                      AS a INNER JOIN data_nelayan AS b WHERE a.id_nelayan = b.id_nelayan AND b.id_nelayan = '$id'";
                                                    $result = mysql_query($query);
                                                    $data = mysql_fetch_array($result);
                                                    echo $data['alamat_nelayan'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                <li class="active">
                                                    <a href="page_user_profile_1.html">
                                                        <i class="icon-home"></i> Data </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="portlet light">
                                    </div>
                                </div>
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <i class="icon-bar-chart theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Data Hasil Tangkapan</span>
                                                    </div>
                                                    </div>
                                                    <a class="btn btn-primary" onclick="window.open('report_detail_tangkap.php?id=<?php echo $data['id_nelayan'];?>', '_blank', 'toolbar=0, location=0, menubar=0');"><i class="icon-printer"></i> Cetak</a>
                                                
                                                    <div class="portlet-body">
                                                       <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> ID Tangkapan </th>
                                                        <th> Nama Ikan </th>
                                                        <th> Tanggal Tangkapan </th>
                                                        <th> Jumlah  </th>
                                                        <th> Pendapatan </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                               include "connect.php";
                                                    $id = $_GET['id'];
                                                    $query = "SELECT a.id_tangkapan, a.id_nelayan, a.id_ikan, c.nama_ikan, a.tgl_tangkapan, a.jumlah_tangkapan, a.harga FROM hasil_tangkapan 
                                                      AS a INNER JOIN data_nelayan AS b INNER JOIN data_jenis_ikan AS c WHERE a.id_nelayan = b.id_nelayan AND a.id_ikan = c.id_ikan AND b.id_nelayan = '$id'";
                                                    $result = mysql_query($query);
                                                    $nomor = 1;
                                                    // mysql_num_rows(result);
                                                    if ($result === FALSE) {
                                                        die(mysql_error());
                                                    }
                                                    while($data = mysql_fetch_array($result)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $data['id_tangkapan']; ?></td>
                                                        <td><?php echo $data['nama_ikan']; ?></td>
                                                        <td><?php echo TanggalIndo($data['tgl_tangkapan']); ?></td>
                                                        <td><?php echo $data['jumlah_tangkapan']; ?> Kg</td>
                                                        <td>Rp. <?php echo number_format($data['harga'],0,'','.'); ?>,-</td>
                                                        <td>
                                                            <a href="hapus_tangkapan.php?id=<?php echo $data['id_tangkapan']; ?>" class="btn btn-outline btn-circle btn-sm red"><i class="icon-trash" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA INI ... ?')"></i> Hapus </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                                </div>
                                            
                                        

                                   
                                <!-- END PROFILE CONTENT -->
                            </div></div>
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
        
       
</body>
<script>
<?php include ('menu/footer_profile.php') ?>
</script>
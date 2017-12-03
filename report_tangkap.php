<?php
    include_once("tglindo.php");
?>
<html lang="en">
  <?php include('menu/head.php') ?>
  <?php
    include_once("menu/header_report.php");
?>
    <div class="panel panel-default panel-table">
          <div class="row invoice-logo">
                                <div style="margin-left:40px; margin-top:-10px;">
                                <h4><img src="assets/pages/img/logo-big.gif" style="width:15%" alt="" /> Sistem Informasi Pengelolaan Data Nelayan dan Hasil Ikan Tangkap</h4></div>                        
                            </div>
        <div class="panel-body" style="margin-top:-50px;">
          <div align="center">
            <h3>Laporan Data Hasil Tangkapan</h3>
          </div>
          <h4>
          <table width="50%">
            <tr>
                <td width="30%">No. Cetakan </td>
                <td>:</td>
                <td>#<?php echo$random = (rand()%999999); ?></td>
            </tr>
            <tr>
                <td width="30%">Tanggal </td>
                <td>:</td>
                <td><?php echo TanggalIndo(date('Y-m-d'))?></td>
            </tr>
           
        </table>
        </h4>
            <table class="table">
               <thead>
                    <tr> 
                        <th> No </th>
                        <th></th>
                        <th> ID Nelayan </th>
                        <th> Nama Nelayan </th>
                        <th> Hasil Tangkapan </th>
                        <th> Tanggal Tangkapan </th>
                        <th> Jumlah Tangkapan </th>
                        <th> Pendapatan </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    include "connect.php";
                    if(isset($_GET['cari'])){
                        $cari = ($_GET['cari']);
                        $query_mysql = mysql_query("SELECT * FROM data_nelayan WHERE id_nelayan like '%$cari%' OR nama_nelayan like '%$cari%'")or die(mysql_error());
                    }else{
                        $query_mysql = mysql_query("SELECT a.id_nelayan, b.nama_nelayan, a.id_ikan, c.nama_ikan, a.tgl_tangkapan, a.jumlah_tangkapan, a.harga
                                                    FROM hasil_tangkapan AS a INNER JOIN data_nelayan AS b INNER JOIN data_jenis_ikan AS c
                                                    WHERE a.id_nelayan = b.id_nelayan AND a.id_ikan = c.id_ikan")or die(mysql_error());  
                    }
                    $nomor = 1;
                    while($data = mysql_fetch_array($query_mysql)){
                ?>
                    <tr>
                        <td><div align="center"><?php echo $nomor++; ?></div></td>
                        <td></td>
                        <td><?php echo $data['id_nelayan']; ?></td>
                        <td><?php echo $data['nama_nelayan']; ?></td>
                        <td><?php echo $data['nama_ikan']; ?></td>
                        <td><?php echo TanggalIndo($data['tgl_tangkapan']); ?></td>
                        <td><?php echo $data['jumlah_tangkapan']; ?></td>
                        <td><?php echo number_format($data['harga'],0,'','.'); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan="6">Total Tangkapan</th>
                        <td><b>    <?php
                                    $jumlahkan = "SELECT SUM(jumlah_tangkapan) AS total FROM hasil_tangkapan"; 
                                    /*SELECT SUM(jumlah_tangkapan) AS total FROM hasil_tangkapan WHERE id_nelayan = '$idnelayan'*/
                                    $hasil =@mysql_query($jumlahkan) or die (mysql_error());
                                    $t = mysql_fetch_array($hasil); 
                                    echo number_format($t['total'],0,'','.');
                                ?> Kg
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div align="right" style="margin-top:10px;">
            Dicetak Oleh 
            <div style="margin-top:30px; margin-right:20px;">
            Admin
            </div>
            </div>
        </div>    
</html>

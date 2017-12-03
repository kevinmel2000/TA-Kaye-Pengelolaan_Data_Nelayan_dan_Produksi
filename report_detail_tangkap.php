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
          <table width="75%" style="margin-top:30px;">
            <tr>
                <td rowspan="5">  
                <img src="assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="" style="width:150px;height:150px;">  
                </td>
            </tr>                         
            </div>
            </tr>
            <tr>
                <td width="20%"> Nama Nelayan </td>
                <td>:</td>
                <td>&nbsp;   
                    <?php
                        include "connect.php";
                        $id = $_GET['id'];
                        $query = "SELECT a.id_nelayan, b.nama_nelayan FROM hasil_tangkapan 
                          AS a INNER JOIN data_nelayan AS b WHERE a.id_nelayan = b.id_nelayan AND b.id_nelayan = '$id'";
                        $result = mysql_query($query);
                        $data = mysql_fetch_array($result);
                        echo $data['nama_nelayan'];
                    ?>
                </td>
            </tr>
            <tr>
                <td width="30%">Alamat Nelayan </td>
                <td>:</td>
                <td>&nbsp; 
                    <?php
                        include "connect.php";
                        $id = $_GET['id'];
                        $query = "SELECT a.id_nelayan, b.alamat_nelayan FROM hasil_tangkapan 
                          AS a INNER JOIN data_nelayan AS b WHERE a.id_nelayan = b.id_nelayan AND b.id_nelayan = '$id'";
                        $result = mysql_query($query);
                        $data = mysql_fetch_array($result);
                        echo $data['alamat_nelayan'];
                    ?>
                </td>
            </tr>
            <tr>
                <td width="30%">No. Cetakan </td>
                <td>:</td>
                <td>&nbsp; #<?php echo$random = (rand()%999999); ?></td>
            </tr>
            <tr>
                <td width="30%">Tanggal </td>
                <td>:</td>
                <td>&nbsp; <?php echo TanggalIndo(date('Y-m-d'))?></td>
            </tr> 
        </table>
        </h4>
            <table class="table table-bordered">
               <thead>
                    <tr> 
                        <th rowspan="2"><center> No </div></th>
                        <th><center> Hasil Tangkapan </center></th>
                        <th rowspan="2"><center> Tanggal Tangkapan </center> </th>
                        <th rowspan="2"><center> Jumlah Tangkapan </center></th>
                        <th rowspan="2"><center> Pendapatan </center></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    include "connect.php";
                    $id = $_GET['id'];
                    $query_mysql = mysql_query("SELECT a.id_nelayan, a.id_ikan, c.nama_ikan,  a.tgl_tangkapan, a.jumlah_tangkapan, a.harga
                                                FROM hasil_tangkapan AS a INNER JOIN data_nelayan AS b INNER JOIN data_jenis_ikan AS c
                                                WHERE a.id_nelayan = b.id_nelayan AND a.id_ikan = c.id_ikan AND b.id_nelayan = '$id' ORDER BY a.tgl_tangkapan ASC")or die(mysql_error());  
                    $nomor = 1;
                    while($data = mysql_fetch_array($query_mysql)){
                ?>
                    <tr>
                        <td><div align="center"><?php echo $nomor++; ?></div></td>
                        <td><?php echo $data['nama_ikan']; ?></td>
                        <td><?php echo TanggalIndo($data['tgl_tangkapan']); ?></td>
                        <td><?php echo $data['jumlah_tangkapan']; ?> Kg</td>
                        <td>Rp. <?php echo $data['harga']; ?>,-</td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan="3"><center>Total Tangkapan</center></th>
                        <td><b>    <?php
                                    $jumlahkan = "SELECT SUM(jumlah_tangkapan) AS total FROM hasil_tangkapan WHERE id_nelayan = '$id'"; 
                                    $hasil =@mysql_query($jumlahkan) or die (mysql_error());
                                    $t = mysql_fetch_array($hasil); 
                                    echo number_format($t['total']) ;
                                ?> Kg
                            </b>
                        </td>
                        <td><b>Rp. <?php
                                    $jumlahkan2 = "SELECT SUM(harga) AS totall FROM hasil_tangkapan WHERE id_nelayan = '$id'"; 
                                    $hasil2 =@mysql_query($jumlahkan2) or die (mysql_error());
                                    $t2 = mysql_fetch_array($hasil2); 
                                    echo ($t2['totall']) ;
                                ?>,-
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

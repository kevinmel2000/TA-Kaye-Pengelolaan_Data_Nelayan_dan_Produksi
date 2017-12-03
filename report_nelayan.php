<?php
    include_once("tglindo.php");
?>
<html lang="en">
  <?php include('menu/head.php') ?>
    <div class="panel panel-default panel-table">
          <div class="row invoice-logo">
                                <div style="margin-left:20px;">
                                <h4><img src="assets/pages/img/logo-big.gif" style="width:20%" alt="" /> Sistem Informasi Pengelolaan Data Nelayan dan Hasil Ikan Tangkap</h4></div>                        
                            </div>
        <div class="panel-body" style="margin-top:-20px;">
          <div align="center">
            <h3>Laporan Data Nelayan</h3>
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
                        <th> Tempat Lahir </th>
                        <th> Tanggal Lahir </th>
                        <th> Alamat </th>
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
                        <td><div align="center"><?php echo $nomor++; ?></div></td>
                        <td></td>
                        <td><?php echo $data['id_nelayan']; ?></td>
                        <td><?php echo $data['nama_nelayan']; ?></td>
                        <td><?php echo $data['tempat_lahir_nelayan']; ?></td>
                        <td><?php echo TanggalIndo($data['tanggal_lahir_nelayan']); ?></td>
                        <td><?php echo $data['alamat_nelayan']; ?></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <div align="right" style="margin-top:10px;">
            Dicetak Oleh 
            <div style="margin-top:30px; margin-right:20px;">
            Admin
            </div>
            </div>
        </div>    
 <script>
    window.print();
</script>
</html>

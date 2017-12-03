<table class="table table-striped table-bordered table-advance table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
  <tr>
    <th>ID Ikan</th>
    <th>Nama Ikan</th>
    <th><center>Jumlah</center></th>
  </tr>
  <?php
  $total = 0;
  if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val){
            $query = mysql_query ("select data_jenis_ikan.id_ikan, data_jenis_ikan.nama_ikan, data_jenis_ikan.harga_ikan_per_kg from data_jenis_ikan where data_jenis_ikan.id_ikan = '$key'");
            $rs = mysql_fetch_array ($query);
            $jumlah_harga = $rs['harga_ikan_per_kg'] * $val;  
            $total += $jumlah_harga;
            error_reporting(0);
            $sub += $val;

  ?>
  <tr>
    <td><?php echo $rs['id_ikan']; ?></td>
    <td><?php echo $rs['nama_ikan']; ?></td>
    <td><center><?php echo number_format($val); ?></center></td>
  </tr>
  <?php
            mysql_free_result($query);
        }
  }
  ?>
</table>
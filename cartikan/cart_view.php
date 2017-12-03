<table class="table table-striped table-bordered table-advance table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
  <tr>
    <th>ID Ikan</th>
    <th>Nama Ikan</th>
    <th>Harga</th>
    <th colspan="3"><center>Jumlah</center></th>
    <th>Sub Total</th>
    <th>Aksi</th>
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
    <td>Rp. <?php echo number_format($rs['harga_ikan_per_kg'],0,'','.'); ?>,-</td>
    <td><center><a class="btn btn-circle btn-icon-only green" href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=index.php"><b>-</b></a></center></td>
    <td><center><?php echo number_format($val); ?></center></td>
    <td><center><a class="btn btn-circle btn-icon-only blue" href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=index.php"><b>+</b></a></center></td>
    <td>Rp. <?php echo number_format($jumlah_harga,0,'','.'); ?>,-</td>
    <td> <a class="btn btn-circle btn-icon-only red" href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=index.php"><i class="icon-trash"></i></a></td>
  </tr>
  <?php
            mysql_free_result($query);
        }
  }
  ?>
  <tr>
    <td colspan="6"><center><b>Total</b><center></td>\
    <td>Rp. <?php echo number_format($total,0,'','.'); ?>,-</td>
    <td><a href="cart.php?act=clear&amp;ref=index.php">Clear</a></td>
  </tr>
</table>
<div class="form-actions">
  <div class="row">
        <div>
            <a class="btn btn-circle green" name="submit" href="../input_tangkap.php">Submit</a>
            <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
        </div>
    </div>
</div>
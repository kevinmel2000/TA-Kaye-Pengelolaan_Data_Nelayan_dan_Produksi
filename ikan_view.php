<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th><center> ID Ikan </center></th>
            <th><center> Nama Ikan </center></th>
            <th><center> Jumlah </center></th>
            <th>  </th>
            <th><center> Harga </center></th>
            <th> </th>
            <th><center> Total Harga </center></th>
            <th><center> Aksi </center></th>
        </tr>
    </thead>
    <tbody>
    <?php
    $total = 0;
        if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val){
            $query = mysql_query ("select data_jenis_ikan.id_ikan, data_jenis_ikan.nama_ikan, data_jenis_ikan.harga_ikan_per_kg from data_jenis_ikan where data_jenis_ikan.id_ikan = '$key'");
            $rs = mysql_fetch_array ($query);

            $jumlah_harga = $rs['harga_ikan_per_kg'] * $val;
            $total += $jumlah_harga;
        // mysql_num_rows(result);
    ?>
        <tr>
            <td><?php echo $rs['id_ikan']; ?></td>
            <td><?php echo $rs['nama_ikan']; ?></td>
            <td> <?php echo number_format($val); ?></td>
            <td> x </td>
            <td><?php echo number_format($rs['harga_ikan_per_kg']); ?></td>
            <td> = </td>
            <td> <?php echo number_format($jumlah_harga); ?></td>
            <td>
                <a href="ikan.php?act=del&amp;barang_id=<?php echo $key ?>&ref=nama_ikan.php" class="btn btn-outline btn-circle btn-sm red"><i class="icon-trash"></i> Hapus </a>
            </td>
        </tr>
        <tr>
            <th colspan="3"><center> Total </center></th>
            <th>  </th>
            <th>  </th>
            <th>  </th>
            <th><?php echo number_format($total); ?></th>
        </tr>
        <?php mysql_free_result($query); }} ?>
    </tbody>
</table>
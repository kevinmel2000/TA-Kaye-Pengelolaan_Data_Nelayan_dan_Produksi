<?php
include ('connect.php');

$id_nelayan = $_POST['id_nelayan'];
$nama_nelayan = $_POST['nama_nelayan'];
$jenis_ikan = $_POST['jenis_ikan'];
$nama_ikan = $_POST['nama_ikan'];
$tgl_tangkapan = $_POST['tgl_tangkapan'];
$jumlah_tangkapan = $_POST['jumlah_tangkapan'];

$query = mysql_query("insert into hasil_tangkapan values('','$id_nelayan','$nama_nelayan','$jenis_ikan','$nama_ikan','$tgl_tangkapan','$jumlah_tangkapan')") or die(mysql_error());


		if($query)
				{
			
			echo "<script>alert('Data Berhasil di Tambah!'); window.location = 'master_transaksi.php'</script>";
		}
		else
		{
					echo "<script>alert('Data Gagal di Tambah!'); window.location = 'master_transaksi.php'</script>";
				}
?>
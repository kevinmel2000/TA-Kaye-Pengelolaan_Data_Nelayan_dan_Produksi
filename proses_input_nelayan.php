<?php
include ('connect.php');

$id_nelayan = $_POST['id_nelayan'];
$nama_nelayan = $_POST['nama_nelayan'];
$tempat_lahir_nelayan = $_POST['tempat_lahir_nelayan'];
$tanggal_lahir_nelayan = $_POST['tanggal_lahir_nelayan'];
$alamat_nelayan = $_POST['alamat_nelayan'];

$query = mysql_query("insert into data_nelayan values('$id_nelayan','$nama_nelayan','$tempat_lahir_nelayan','$tanggal_lahir_nelayan','$alamat_nelayan')") or die(mysql_error());


		if($query)
				{
			
			echo "<script>alert('Data Berhasil di Tambah!'); window.location = 'data_nelayan.php'</script>";
		}
		else
		{
					echo "<script>alert('Data Gagal di Tambah!'); window.location = 'data_nelayan.php'</script>";
				}
?>
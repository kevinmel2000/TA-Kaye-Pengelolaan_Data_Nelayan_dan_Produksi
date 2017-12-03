<?php
include('connect.php');
//tangkap data dari form
$id_hasil_produksi=$_POST['id_hasil_produksi'];
$kode_hasil_produksi = $_POST['kode_hasil_produksi'];
$nama_hasil_produksi = $_POST['nama_hasil_produksi'];
$tanggal_hasil_produksi = $_POST['tanggal_hasil_produksi'];
$id_ikan = $_POST['id_ikan'];
$nama_ikan = $_POST['nama_ikan'];

		$query = mysql_query("update data_hasil_produksi set kode_hasil_produksi='$kode_hasil_produksi', nama_hasil_produksi ='$nama_hasil_produksi',tanggal_hasil_produksi ='$tanggal_hasil_produksi', id_ikan='$id_ikan', nama_ikan='$nama_ikan' where id_hasil_produksi='$id_hasil_produksi'") or die(mysql_error());
				
				if ($query)
					{
						echo "<script>alert('Data Berhasil di Update!'); window.location = 'data_hasil_produksi.php'</script>";
				}
				
				else
					{
						echo "<script>alert('Data Gagal di Update!'); window.location = 'data_hasil_produksi.php'</script>";
					}
?>

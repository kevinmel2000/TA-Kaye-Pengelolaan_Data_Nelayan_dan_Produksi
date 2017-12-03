
<?php
include('connect.php');
$id = $_GET['id'];
$query = mysql_query("delete from data_hasil_produksi where id_hasil_produksi='$id'") or die(mysql_error());
		if ($query) 
			{
				echo "<script>alert('Data Berhasil di Hapus!'); window.location = 'data_hasil_produksi.php'</script>";
			}
		else
			{
					echo "<script>alert('Data Gagal di Hapus!'); window.location = 'data_hasil_produksi.php'</script>";
			}
?>


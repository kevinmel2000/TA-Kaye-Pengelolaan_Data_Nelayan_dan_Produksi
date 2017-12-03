
<?php
include('connect.php');
$id = $_GET['id'];
$query = mysql_query("delete from data_nelayan where id_nelayan='$id'") or die(mysql_error());
		if ($query) 
			{
				echo "<script>alert('Data Berhasil di Hapus!'); window.location = 'data_nelayan.php'</script>";
			}
		else
			{
					echo "<script>alert('Data Gagal di Hapus!'); window.location = 'data_nelayan.php'</script>";
			}
?>


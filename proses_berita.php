<?php
include ('connect.php');

$isi_berita = $_POST['isi_berita'];
$tgl_berita = $_POST['tgl_berita'];

$query = mysql_query("insert into berita values('','$isi_berita','$tgl_berita')") or die(mysql_error());


		if($query)
				{
			
			echo "<script>alert('Data Berhasil di Tambah!'); window.location = 'berita.php'</script>";
		}
		else
		{
					echo "<script>alert('Data Gagal di Tambah!'); window.location = 'berita.php'</script>";
				}
?>
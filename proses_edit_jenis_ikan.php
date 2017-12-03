
<?php
include('connect.php');
//tangkap data dari form
$id_nelayan=$_POST['id_nelayan'];
$nama_nelayan = $_POST['nama_nelayan'];
$tempat_lahir_nelayan = $_POST['tempat_lahir_nelayan'];
$tanggal_lahir_nelayan = $_POST['tanggal_lahir_nelayan'];
$alamat_nelayan = $_POST['alamat_nelayan'];
$jenis_ikan = $_POST['jenis_ikan'];
$pendapatan_nelayan = $_POST['pendapatan_nelayan'];
//update data di database sesuai user_id

		$query = mysql_query("update data_nelayan set nama_nelayan='$nama_nelayan', tempat_lahir_nelayan ='$tempat_lahir_nelayan',tanggal_lahir_nelayan ='$tanggal_lahir_nelayan', alamat_nelayan='$alamat_nelayan', jenis_ikan ='$jenis_ikan', pendapatan_nelayan ='$pendapatan_nelayan'  where id_nelayan='$id_nelayan'") or die(mysql_error());
				
				if ($query)
					{
						echo "<script>alert('Data Berhasil di Update!'); window.location = 'data_nelayan.php'</script>";
				}
				
				else
					{
						echo "<script>alert('Data Gagal di Update!'); window.location = 'data_nelayan.php'</script>";
					}
?>

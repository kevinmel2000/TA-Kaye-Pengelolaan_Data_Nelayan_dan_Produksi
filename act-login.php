<?php
session_start();
include('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];
if($op=="in"){
	$sql = mysql_query("SELECT * FROM verifikasi_user WHERE username='$username' AND password='$password'");
	if(mysql_num_rows($sql)==1){
		$qry = mysql_fetch_array($sql);
		$_SESSION['username'] = $qry['username'];
		$_SESSION['level'] 	  = $qry['level'];
		if($qry['level']=="admin"){
			header("location:dashboard.php");
		}
		else if($qry['level']=="nelayan"){
			header("location:nelayan/dashboard.php");
		}
		else if($qry['level']=="pengepul"){
			header("location:pengepul/dashboard.php");
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Username/password salah");
			document.location="index.php";
		</script>
		<?php
	}
}else if($op=="out"){
	unset($_SESSION['username']);
	unset($_SESSION['level']);
	header("location:index.php");
}
?>
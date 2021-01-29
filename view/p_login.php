<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login    = mysqli_query($connect, "select * from user where username='$username' and password='$password'");
$result   = mysqli_num_rows($login);
if($result>0){
	$user = mysqli_fetch_array($login);
	session_start();
	header("location:landingpage.php");
}else{
	echo "<script>alert('username atau password salah')</script>";
	echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}
?>

<?php
if (isset($_POST['login'])){
	$sql = mysqli_query($con, "SELECT username, password from user where username='$_POST[username]' and password='$_POST[password]'");
	$cek = mysqli_num_rows($sql);
	if($cek>0){
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];
		echo "<script>alert('Selamat Datang');document.location.href='landingpage.php'</script>";
	}else{
		echo "Maaf username & password tidak sesuai";
	}
}
?>
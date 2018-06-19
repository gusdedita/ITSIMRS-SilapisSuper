<?php
include ("configdb.php");

session_start();

//tangkap data dari form login
$username = $_POST['txt_username'];
$password = $_POST['txt_password'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	//kalau username dan password kosong
	header('location:login.php?msg=emp');
	break;
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?msg=usr-emp');
	break;
} else if (empty($password)) {
	//kalau password saja yang kosong
	header('location:login.php?msg=psr-emp');
	break;
}

$q = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
$data_account = mysql_fetch_array($q);
if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$otoritas = $data_account['otoritas'];
	$_SESSION['username_rsudsupervisi'] = $username;
	$_SESSION['password_rsudsupervisi'] = $password;
	header('location:index.php?msg=log-suc');
} else {
	header('location:login.php?msg=log-fail');
	break;
}
?>
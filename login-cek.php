<?PHP
if (!isset($_SESSION['username_rsudsupervisi']) || empty($_SESSION['username_rsudsupervisi'])) {
	header("location:login.php");
}
?>  
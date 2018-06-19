<?PHP 
	error_reporting(0);
	$msg = $_GET['msg'];
?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="assets/img/logorsud.png" href="assets/img/logorsud.png">
	<title>E-Supervisi Keperawatan</title>
	<link rel="stylesheet" href="assets/login/css/style.css">
	
	<!-- Bootstrap core CSS     
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />-->

    <!-- Animation library for notifications   -->
    <link href="assets/login/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/login/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	
	<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/login/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">
	
		<div class="container">
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<h1>Selamat Datang</h1>
			<h3>E - Supervisi Keperawatan</h3>
			
			<form method="post" action="login-autentifikasi.php" enctype="multipart/form-data">
				<input type="text" class="form-control"  placeholder="username" name="txt_username" id="txt_username">
				<input type="password" class="form-control" placeholder="password" name="txt_password" id="txt_password">
				<button type="submit" class="btn btn-fill btn-info" name="btn_login" id="btn_login">Login</button>
			</form>
			
			<marquee><p>&copy; 2018 Created By Team IT & SIMRS RSUD. Kab. Klungkung</p></marquee>
		</div>
	
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
			
	</div>
	
	<script src='login/login/js/jquery.min.js'></script>
    <script src="login/login/js/index.js"></script>
	<script src="assets/login/js/demo.js"></script>
	<script src="assets/login/js/bootstrap-notify.js"></script>
	<script src="assets/login/js/chartist.min.js"></script>
	<?PHP 
		if ($msg == 'log-fail') {
	?>
			<script type="text/javascript">
				$(document).ready(function(){
					demo.initChartist();
					$.notify({
						icon: 'pe-7s-info',
						message: "Username dan Password tidak terdaftar, silakan hubungi administrator"
					},{
						type: 'danger',
						timer: 1000
					});
				});
			</script>
	<?PHP
		} else if ($msg == 'emp'){
	?>
			<script type="text/javascript">
				$(document).ready(function(){
					demo.initChartist();
					$.notify({
						icon: 'pe-7s-info',
						message: "Username dan Password masih kosong!!!"
					},{
						type: 'warning',
						timer: 1000
					});
				});
			</script>
	<?PHP
		} else if ($msg == 'usr-emp'){
	?>
			<script type="text/javascript">
				$(document).ready(function(){
					demo.initChartist();
					$.notify({
						icon: 'pe-7s-info',
						message: "Username anda masih kosong!!!"
					},{
						type: 'warning',
						timer: 1000
					});
				});
			</script>
	<?PHP
		} else if ($msg == 'psr-emp'){
	?>
			<script type="text/javascript">
				$(document).ready(function(){
					demo.initChartist();
					$.notify({
						icon: 'pe-7s-info',
						message: "Password anda masih kosong!!!"
					},{
						type: 'warning',
						timer: 1000
					});
				});
			</script>
	<?PHP
		} else if ($msg == 'log-out') {
	?>
			<script type="text/javascript">
				$(document).ready(function(){
					demo.initChartist();
					$.notify({
						icon: 'pe-7s-info',
						message: "Terimakasih, user berhasil log out!!!"
					},{
						type: 'success',
						timer: 1000
					});
				});
			</script>
	<?PHP
		}
	?>
</body>
</html>

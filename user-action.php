<?PHP
	include("configdb.php");
	
	date_default_timezone_set('Asia/Jakarta');
	$datenow  = date('y-m-d');
	$datecode = date('dm');
	$timecode = date('hi');

	
	$iduser   = $_POST['txt_iduser'];
	$namauser = $_POST['txt_namauser'];
	$nip 	  = $_POST['txt_nip'];
	$username = $_POST['txt_username'];
	$password = $_POST['txt_password'];
	$otoritas = $_POST['cb_otoritas'];
	$jabatan  = $_POST['txt_jabatan'];
	
	if (isset($_POST['btn_save'])) {
	
		$qu_inuser = "INSERT INTO user (
						id_user,
						nama_user,
						nip,
						username,
						password,
						otoritas,
						jabatan,
						golongan,
						date_created,
						status_active
					) VALUES (
						'$iduser',
						'$namauser',
						'$nip',
						'$username',
						'$password',
						'$otoritas',
						'$jabatan',
						'-',
						'$datenow',
						'Active'
					)";
		
		$sql_inuser = mysql_query($qu_inuser) or die (mysql_error());
		if ($sql_inuser) {
			header("location:index.php?view=user-data&msg=useradd-suc");
		} else {
			header("location:index.php?view=user-data&msg=useradd-fail");
		}
	
	} else if (isset($_POST['btn_update'])) {
		
		$qu_upuser = "UPDATE user SET
						nama_user='$namauser',
						nip='$nip',
						username='$username',
						password='$password',
						otoritas='$otoritas',
						jabatan='$jabatan',
						date_created='$datenow'
					WHERE
						id_user='$iduser'
					";
		$sql_upuser = mysql_query($qu_upuser) or die (mysql_error());
		if ($sql_upuser) {
			header("location:index.php?view=user-data&msg=useredit-suc");
		} else {
			header("location:index.php?view=user-data&msg=useredit-fail");
		}
	
	} else if (isset($_POST['btn_delete'])) {
		
		$qu_deluser = "UPDATE user SET
						status_active='Non Active'
					WHERE
						id_user='$iduser'
					";
		$sql_deluser = mysql_query($qu_deluser) or die (mysql_error());
		if ($sql_deluser) {
			header("location:index.php?view=user-data&msg=userdel-suc");
		} else {
			header("location:index.php?view=user-data&msg=userdel-fail");
		}
	}
?>
	
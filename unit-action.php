<?PHP
	include("configdb.php");
	
	date_default_timezone_set('Asia/Jakarta');
	$datenow  = date('y-m-d');
	$datecode = date('dm');
	$timecode = date('hi');

	$iduser   = $_POST['txt_iduser'];
	$idunit   = $_POST['txt_idunit'];
	$namaunit = $_POST['txt_namaunit'];
	$type	  = $_POST['cb_type'];
	$kapasitas= $_POST['txt_kapasitas'];
	
	if (isset($_POST['btn_save'])) {
		
		$qu_insunit = "INSERT INTO unit
						(nama_unit, jenis_unit, kapasitas, date_created, id_user, status_del)
						VALUES 
						('$namaunit', '$type', '$kapasitas', '$datenow', '$iduser', 'N')
						";
		$sql_inunit = mysql_query($qu_insunit) or die (mysql_error());
		if ($sql_inunit) {
			header("location:index.php?view=unit-data&msg=unitadd-suc");
		} else {
			header("location:index.php?view=unit-data&msg=unitadd-fail");
		}
		
	} else if (isset($_POST['btn_update'])) {
		
		$qu_upunit = "UPDATE unit SET
						nama_unit='$namaunit',
						jenis_unit='$type',
						kapasitas='$kapasitas'
					WHERE
						id_unit='$idunit'
					";
		$sql_upunit = mysql_query($qu_upunit) or die (mysql_error());
		if ($sql_upunit) {
			header("location:index.php?view=unit-data&msg=unitedit-suc");
		} else {
			header("location:index.php?view=unit-data&msg=unitedit-fail");
		}
		
	} else if (isset($_POST['btn_delete'])) {
		
		$qu_delunit = "DELETE FROM unit WHERE id_unit='$idunit'";
		
		$sql_delunit = mysql_query($qu_delunit) or die (mysql_error());
		if ($sql_delunit) {
			header("location:index.php?view=unit-data&msg=unitdel-suc");
		} else {
			header("location:index.php?view=unit-data&msg=unitdel-fail");
		}
		
	}
	
?>
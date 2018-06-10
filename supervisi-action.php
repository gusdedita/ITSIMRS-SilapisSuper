<?PHP
	include("configdb.php");
	
		date_default_timezone_set('Asia/Jakarta');
		$datenow  = date('y-m-d');
		$datecode = date('dm');
		$timecode = date('hi');
		
		$idsupervisi 	= ; 
		$namaunit 		= $_POST['txt_unit_super'];
		$tglsuper		= $_POST['txt_tgl_super'];
		$jamsuper		= $_POST['txt_jam_super'];
		$jum_umum		= $_POST['txt_kapasumum'];
		$jum_jkn		= $_POST['txt_kapasjkn'];
		$jum_umumiii	= $_POST['txt_kapasumum_iii'];
		$jum_jkniii		= $_POST['txt_kapasjkn_iii'];
		$jum_umumii		= $_POST['txt_kapasumum_ii'];
		$jum_jknii		= $_POST['txt_kapasjkn_ii'];
		$jum_umumi		= $_POST['txt_kapasumum_i'];
		$jum_jkni		= $_POST['txt_kapasjkn_i'];
		$rujukumum		= $_POST['txt_dirujuk_umum'];
		$rujukjkn		= $_POST['txt_dirujuk_jkn'];
		$meninggalumum	= $_POST['txt_meninggal_umum'];
		$meninggaljkn	= $_POST['txt_meninggal_jkn'];
		$iduser			= $_POST['txt_user'];
		
		$mas_medis		= $_POST['txt_mas_medis'];
		$mas_pelayanan	= $_POST['txt_mas_pelayanan'];
		$mas_umum		= $_POST['txt_mas_umum'];

	if (isset($_POST['btn_simpan'])) {
		
		$query_insert_sppasien = "INSERT INTO supervisi_pasien (
									id_supervisi,
									nama_unit,
									tgl_supervisi,
									jam_supervisi,
									jum_umum,
									jum_jkn,
									jum_umum_iii,
									jum_jkn_iii,
									jum_umum_ii,
									jum_jkn_ii,
									jum_umum_i,
									jum_jkn_i,
									rujuk_umum,
									rujuk_jkn,
									meninggal_umum,
									meninggal_jkn,
									date_created,
									id_user
								) VALUES (
								
								)";
	
	}
?>
<?PHP
	include("configdb.php");
	
		date_default_timezone_set('Asia/Jakarta');
		$datenow  = date('y-m-d');
		$datecode = date('dm');
		$timecode = date('hi');
		
		$jenisunit		= $_POST['txt_jenisunit'];
		$idsupervisi 	= $_POST['txt_idsuper']; 
		$namaunit 		= $_POST['txt_unit_super'];
		$tglsuper		= $_POST['txt_tgl_super'];
		$jamsuper		= $_POST['txt_jam_super'];
		$jadwalsuper	= $_POST['txt_jadwal'];
		$jum_umumiii	= $_POST['txt_kapasumum_iii'];
		$jum_jkniii		= $_POST['txt_kapasjkn_iii'];
		$jum_umumii		= $_POST['txt_kapasumum_ii'];
		$jum_jknii		= $_POST['txt_kapasjkn_ii'];
		$jum_umumi		= $_POST['txt_kapasumum_i'];
		$jum_jkni		= $_POST['txt_kapasjkn_i'];
		$jum_umum		= $_POST['txt_kapasumum'];
		$jum_jkn		= $_POST['txt_kapasjkn'];
		$rujukumum		= $_POST['txt_dirujuk_umum'];
		$rujukjkn		= $_POST['txt_dirujuk_jkn'];
		$meninggalumum	= $_POST['txt_meninggal_umum'];
		$meninggaljkn	= $_POST['txt_meninggal_jkn'];
		$iduser			= $_POST['txt_iduser'];
		
		$mas_medis		= $_POST['txt_mas_medis'];
		$mas_pelayanan	= $_POST['txt_mas_pelayanan'];
		$mas_umum		= $_POST['txt_mas_umum'];

	if (isset($_POST['btn_simpan'])) {
		
			$query_insert_sppasien = "INSERT INTO supervisi_pasien (
										id_supervisi,
										nama_unit,
										tgl_supervisi,
										jam_supervisi,
										jadwal_supervisi,
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
										'$idsupervisi',
										'$namaunit',
										'$tglsuper',
										'$jamsuper',
										'$jadwalsuper',
										'$jum_umum',
										'$jum_jkn',
										'$jum_umumiii',
										'$jum_jkniii',
										'$jum_umumii',
										'$jum_jknii',
										'$jum_umumi',
										'$jum_jkni',
										'$rujukumum',
										'$rujukjkn',
										'$meninggalumum',
										'$meninggaljkn',
										'$datenow',
										'$iduser'
									)";
		
		$query_insert_spmasalah = "INSERT INTO supervisi_masalah (
										id_supervisi,
										masalah_medis,
										masalah_pelayanan,
										masalah_umum,
										status_medis,
										status_pelayanan,
										status_umum
									) VALUES (
										'$idsupervisi',
										'$mas_medis',
										'$mas_pelayanan',
										'$mas_umum',
										'Belum',
										'Belum',
										'Belum'
									)";
		
		$sql_sppasien 	= mysql_query ($query_insert_sppasien) or die (mysql_error());
		$sql_spmasalah 	= mysql_query ($query_insert_spmasalah) or die (mysql_error());
		if ($sql_spmasalah) {
			header("location:index.php?view=supervisi-data&tglsuper=$tglsuper&jadwalsuper=$jadwalsuper&msg=superadd-suc");
		} else {
			header("location:index.php?view=supervisi-add&msg=superadd-fail");
		}
	}
?>
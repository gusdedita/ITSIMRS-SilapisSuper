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
		
		if ($mas_medis==""){
			$status_medis="Tidak Ada";
		} else {
			$status_medis="Belum";
		}
		
		if ($mas_pelayanan==""){
			$status_pelayanan="Tidak Ada";
		} else {
			$status_pelayanan="Belum";
		}
		
		if ($mas_umum==""){
			$status_umum="Tidak Ada";
		} else {
			$status_umum="Belum";
		}
		
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
										'$status_medis',
										'$status_pelayanan',
										'$status_umum'
									)";
		
		$sql_sppasien 	= mysql_query ($query_insert_sppasien) or die (mysql_error());
		$sql_spmasalah 	= mysql_query ($query_insert_spmasalah) or die (mysql_error());
		if ($sql_spmasalah) {
			header("location:index.php?view=supervisi-data&msg=superadd-suc");
		} else {
			header("location:index.php?view=supervisi-add&msg=superadd-fail");
		}
		
	} else if (isset($_POST['btn_update'])) {
		
		$status_medis	 =$_POST['txt_status_medis'];
		$status_pelayanan=$_POST['txt_status_pelayanan'];
		$status_umum	 =$_POST['txt_status_umum'];
		
		
		$qu_update_sppasien = "UPDATE supervisi_pasien SET
										jum_umum='$jum_umum',
										jum_jkn='$jum_jkn',
										jum_umum_iii='$jum_umumiii',
										jum_jkn_iii='$jum_jkniii',
										jum_umum_ii='$jum_umumii',
										jum_jkn_ii='$jum_jknii',
										jum_umum_i='$jum_umumi',
										jum_jkn_i='$jum_jkni',
										rujuk_umum='$rujukumum',
										rujuk_jkn='$rujukjkn',
										meninggal_umum='$meninggalumum',
										meninggal_jkn='$meninggaljkn',
										date_created='$datenow',
										id_user='$iduser'
								WHERE
										id_supervisi='$idsupervisi'
								";
								
		if ($status_medis=="Sudah"){
			$qu_update_spmasalah = "UPDATE supervisi_masalah SET
											masalah_pelayanan='$mas_pelayanan',
											masalah_umum='$mas_umum',
											status_pelayanan='$status_pelayanan',
											status_umum='$status_umum'
									WHERE
											id_supervisi='$idsupervisi'
											
									";
		} else if ($status_pelayanan=="Sudah"){
			$qu_update_spmasalah = "UPDATE supervisi_masalah SET
											masalah_medis='$mas_medis',
											masalah_umum='$mas_umum',
											status_medis='$status_medis',
											status_umum='$status_umum'
									WHERE
											id_supervisi='$idsupervisi'
											
									";
		} else if ($status_umum=="Sudah"){
			$qu_update_spmasalah = "UPDATE supervisi_masalah SET
											masalah_medis='$mas_medis',
											masalah_pelayanan='$mas_pelayanan'
											status_medis='$status_medis',
											status_pelayanan='$status_pelayanan'
									WHERE
											id_supervisi='$idsupervisi'
											
									";
		} else {
			$qu_update_spmasalah = "UPDATE supervisi_masalah SET
											masalah_medis='$mas_medis',
											masalah_pelayanan='$mas_pelayanan',
											masalah_umum='$mas_umum',
											status_medis='$status_medis',
											status_pelayanan='$status_pelayanan',
											status_umum='$status_umum'
									WHERE
											id_supervisi='$idsupervisi'
											
									";
		}
									
		$sql_update_sppasien 	= mysql_query ($qu_update_sppasien) or die (mysql_error());
		$sql_update_spmasalah 	= mysql_query ($qu_update_spmasalah) or die (mysql_error());
		if ($sql_update_spmasalah) {
			header("location:index.php?view=supervisi-data&msg=superedit-suc");
		} else {
			header("location:index.php?view=supervisi-edit&id=$idsupervisi&msg=superedit-fail");
		}
		
	} else if (isset($_POST['btn_delete'])) {
		
		$qu_delete_sppasein = "DELETE FROM supervisi_pasien WHERE id_supervisi='$idsupervisi'";
		$qu_delete_spmasalah= "DELETE FROM supervisi_masalah WHERE id_supervisi='$idsupervisi'";
		
		$sql_delete_sppasien 	= mysql_query ($qu_delete_sppasien) or die (mysql_error());
		$sql_delete_spmasalah 	= mysql_query ($qu_delete_spmasalah) or die (mysql_error());
		if ($sql_delete_spmasalah) {
			header("location:index.php?view=supervisi-data&msg=superdel-suc");
		} else {
			header("location:index.php?view=supervisi-data&msg=superdel-fail");
		}
	}
?>
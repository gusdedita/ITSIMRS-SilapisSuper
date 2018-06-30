<?PHP
	include("configdb.php");
	
	$query_sel_super  = "SELECT 
							sp.tgl_supervisi,
							sp.jadwal_supervisi,
							u.nama_user
						FROM
							supervisi_pasien AS sp
							JOIN user AS u ON sp.id_user=u.id_user
						GROUP BY
							sp.jadwal_supervisi";
	$no = 1;
	$result_sel_super = mysql_query($query_sel_super) or die(mysql_error());
	$results = array();
	while ($data_sel_super = mysql_fetch_object($result_sel_super)) {
		
		$tglsuper   = $data_sel_super->tgl_supervisi;
		$jadwalsuper= $data_sel_super->jadwal_supervisi;
		
		$qu_status_masalah = "
							SELECT 
								(medis.masbel_medis + pelayanan.masbel_pelayanan + umum.masbel_umum) AS Belum,
								(mediss.masud_medis + pelayanann.masud_pelayanan + umumm.masud_umum) AS Sudah,
								(medisss.masti_medis + pelayanannn.masti_pelayanan + umummm.masti_umum) AS TidakAda
							FROM
								(SELECT COUNT(*) AS masbel_medis 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_medis='Belum' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') medis JOIN

								(SELECT COUNT(*) AS masbel_pelayanan 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_pelayanan='Belum' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') pelayanan JOIN

								(SELECT COUNT(*) AS masbel_umum 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_umum='Belum' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') umum JOIN

								(SELECT COUNT(*) AS masud_medis 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_medis='Sudah' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') mediss JOIN

								(SELECT COUNT(*) AS masud_pelayanan 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_pelayanan='Sudah' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') pelayanann JOIN

								(SELECT COUNT(*) AS masud_umum 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_umum='Sudah' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') umumm JOIN
								
								(SELECT COUNT(*) AS masti_medis 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_medis='Tidak Ada' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') medisss JOIN
								
								(SELECT COUNT(*) AS masti_pelayanan 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_pelayanan='Tidak Ada' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') pelayanannn JOIN
								
								(SELECT COUNT(*) AS masti_umum 
								FROM supervisi_masalah AS sm JOIN supervisi_pasien AS sp ON sm.id_supervisi=sp.id_supervisi  
								WHERE status_umum='Tidak Ada' AND sp.tgl_supervisi='$tglsuper' AND sp.jadwal_supervisi='$jadwalsuper') umummm
		
							";
		$result_status_masalah = mysql_query($qu_status_masalah) or die(mysql_error());
		$data_status_masalah   = mysql_fetch_array($result_status_masalah);
		$totbelum = "<span class='label label-danger'>".$data_status_masalah['Belum']." Belum</span>";
		$totsudah = "<span class='label label-warning'>".$data_status_masalah['Sudah']." Sudah</span>";
		$tottidak = "<span class='label label-success'>".$data_status_masalah['TidakAda']." Tidak Ada</span>";
		$totgabung = $totbelum." ".$totsudah." ".$tottidak;
		
		$query_sel_detsuper  = "SELECT 
									sp.id_supervisi,
									sp.nama_unit,
									(sp.jum_umum + sp.jum_umum_iii + sp.jum_umum_ii + sp.jum_umum_i + sp.jum_jkn + sp.jum_jkn_iii + sp.jum_jkn_ii + sp.jum_jkn_i) AS bed_isi,
									(sp.rujuk_umum + sp.rujuk_jkn) AS jum_rujuk,
									(sp.meninggal_umum + sp.meninggal_jkn) AS jum_meninggal,
									sm.status_medis,
									sm.status_pelayanan,
									sm.status_umum
								FROM 
									supervisi_pasien AS sp 
									JOIN supervisi_masalah AS sm ON sp.id_supervisi=sm.id_supervisi
								WHERE 
									sp.tgl_supervisi='$tglsuper' 
									AND sp.jadwal_supervisi='$jadwalsuper'";
		$result_sel_detsuper = mysql_query($query_sel_detsuper) or die(mysql_error());
		$result_detsuper = array();
		while ($data_sel_detsuper = mysql_fetch_object($result_sel_detsuper)){
			
			if ($data_sel_detsuper->status_medis == "Belum" ){
				$s_medis="<span class='label label-danger'>Belum</span>";
			} else if ($data_sel_detsuper->status_medis == "Sudah" ){
				$s_medis="<span class='label label-warning'>Sudah</span>";
			} else if ($data_sel_detsuper->status_medis == "Tidak Ada" ){
				$s_medis="<span class='label label-success'>Tidak Ada</span>";
			}
			
			if ($data_sel_detsuper->status_pelayanan == "Belum" ){
				$s_pelayanan="<span class='label label-danger'>Belum</span>";
			} else if ($data_sel_detsuper->status_pelayanan == "Sudah" ){
				$s_pelayanan="<span class='label label-warning'>Sudah</span>";
			} else if ($data_sel_detsuper->status_pelayanan == "Tidak Ada" ){
				$s_pelayanan="<span class='label label-success'>Tidak Ada</span>";
			}
			
			if ($data_sel_detsuper->status_umum == "Belum" ){
				$s_umum="<span class='label label-danger'>Belum</span>";
			} else if ($data_sel_detsuper->status_umum == "Sudah" ){
				$s_umum="<span class='label label-warning'>Sudah</span>";
			} else if ($data_sel_detsuper->status_umum == "Tidak Ada" ){
				$s_umum="<span class='label label-success'>Tidak Ada</span>";
			}
			
			$result_detsuper[] = array(
				'id_supervisi'		=> $data_sel_detsuper->id_supervisi,
				'nama_unit' 		=> $data_sel_detsuper->nama_unit,
				'bed_isi'			=> $data_sel_detsuper->bed_isi,
				'jum_rujuk'			=> $data_sel_detsuper->jum_rujuk,
				'jum_meninggal'		=> $data_sel_detsuper->jum_meninggal,
				'status_medis'		=> $s_medis,
				'status_pelayanan'	=> $s_pelayanan,
				'status_umum'		=> $s_umum
			);
		}
		
		$cetak = "<a href='?view=supervisi-cetak&tgl=$tglsuper&jadwal=$jadwalsuper' class='btn-sm btn-info'>Cetak</a>";
		$results[] = array(
			'no' 	   	  	  => $no,
			'tgl_supervisi'   => $tglsuper,
			'jadwal_supervisi'=> $jadwalsuper,
			'detail_super'	  => $result_detsuper,
			'nama_user'		  => $data_sel_super->nama_user,
			'totstatus'		  => $totgabung,
			'cetak'			  => $cetak
		);
		$no++;
	}
	
	$json = json_encode(array('data' => $results));
	echo $json;
?>
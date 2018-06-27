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
		
		$query_sel_detsuper  = "SELECT 
									sp.id_supervisi,
									sp.nama_unit,
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
				'status_medis'		=> $s_medis,
				'status_pelayanan'	=> $s_pelayanan,
				'status_umum'		=> $s_umum
			);
		}
		
		$results[] = array(
			'no' 	   	  	  => $no,
			'tgl_supervisi'   => $tglsuper,
			'jadwal_supervisi'=> $jadwalsuper,
			'detail_super'	  => $result_detsuper,
			'nama_user'		  => $data_sel_super->nama_user
		);
		$no++;
	}
	
	$json = json_encode(array('data' => $results));
	echo $json;
?>
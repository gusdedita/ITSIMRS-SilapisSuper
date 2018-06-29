<?PHP 
	include("configdb.php");
	
	$tglsupervisi = $_GET['tglsupervisi'];
	$jamsupervisi = $_GET['jamsupervisi'];
	$jadwalsupervisi = $_GET['jadwal'];
	$unit = $_GET['unit'];
	
	$idsuper = $tglsupervisi."/".$jadwalsupervisi."/".$unit;
	
	$qu_cekdata = mysql_query ("SELECT * FROM supervisi_pasien WHERE id_supervisi='$idsuper'")or die(mysql_error());
	$data_cekdata  = mysql_fetch_array($qu_cekdata);
	if (mysql_num_rows($qu_cekdata)>0){
		header("location:?view=supervisi-data&id=$idsuper");
	}
	
	if ($data_user['otoritas']=="Bid. Medis" || $data_user['otoritas']=="Bid. Penunjang Pelayanan" || $data_user['otoritas']=="Bid. Adm Umum"){
		header("location:index.php?msg=onlypeg");
	}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			<div class="col-md-12">
                <div class="card">
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">
							Input Data Supervisi
							
							<a href="" data-toggle="modal" data-target="#myModalBuatLap" class="btn btn-success pull-right">Atur Ulang Laporan</a>
						</h4>
						<p class="category">Ruang : <?PHP echo $unit;?> (<?PHP echo $tglsupervisi;?>)
						</p>
                    </div>
                    
					<div class="card-content">
                            
							<div class="row">
							
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Unit</label>
										<input type="text" class="form-control" id="txt_unit" name="txt_unit" value="<?PHP if (!empty($unit)){echo $unit;}?>" disabled>
									</div>
                                </div>
								
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Supervisi</label>
										<input type="date" class="form-control" name="txt_tgl_supervisi" id="txt_tgl_supervisi" value="<?PHP if (!empty($tglsupervisi)){echo $tglsupervisi;}?>" disabled>
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Waktu (Jam Supervisi)</label>
										<input type="time" class="form-control" id="txt_jam" name="txt_jam" value="<?PHP if (!empty($jamsupervisi)){echo $jamsupervisi;}?>" disabled>
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Jadwal Supervisi</label>
										<select class="form-control js-example-responsive" id="cb_jadwalsupervisi" name="cb_jadwalsupervisi" disabled>
											<option value=""></option>
											<option value="Pagi" <?PHP if ($jadwalsupervisi=="Pagi"){echo "selected";}?>>Jadwal Pagi</option>
											<option value="Siang" <?PHP if ($jadwalsupervisi=="Siang"){echo "selected";}?>>Jadwal Siang</option>
											<option value="Sore" <?PHP if ($jadwalsupervisi=="Sore"){echo "selected";}?>>Jadwal Sore</option>
										</select>
									</div>
                                </div>
								
								
								
							</div>
							
					</div>
					
				</div>
			</div>
			
			<?PHP
				
				if (!empty($tglsupervisi) && !empty($unit)){
					
					$query_jenisunit = mysql_query ("SELECT jenis_unit FROM unit WHERE nama_unit='$unit'")or die(mysql_error());
					$data_jenisunit  = mysql_fetch_array($query_jenisunit);
			?>
            <div class="col-md-12">
                <div class="card">
                    
					<div class="card-content">
                        <form method="post" action="supervisi-action.php"  enctype="multipart/form-data">
							<input type="hidden" name="txt_jam_super" id="txt_jam_super" value="<?PHP echo $jamsupervisi;?>">
							<input type="hidden" name="txt_tgl_super" id="txt_tgl_super" value="<?PHP echo $tglsupervisi;?>">
							<input type="hidden" name="txt_jadwal" id="txt_jadwal" value="<?PHP echo $jadwalsupervisi;?>">
							<input type="hidden" name="txt_unit_super" id="txt_unit_super" value="<?PHP echo $unit;?>">
							<input type="hidden" name="txt_idsuper" id="txt_idsuper" value="<?PHP echo $idsuper;?>">
							<input type="hidden" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>">
							<input type="hidden" name="txt_jenisunit" id="txt_jenisunit" value="<?PHP echo $data_jenisunit['jenis_unit'];?>">
                            
							<?PHP 
								if ($data_jenisunit['jenis_unit']=="Kelas") {
							?>
									<div class="row">
										<div class="col-md-4">
											<div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas III</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_iii" id="txt_kapasumum_iii">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_iii" id="txt_kapasjkn_iii">
											</div>
										</div>
									
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas II</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_ii" id="txt_kapasumum_ii">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_ii" id="txt_kapasjkn_ii">
											</div>
										</div>
								  
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas I</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_i" id="txt_kapasumum_i">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_i" id="txt_kapasjkn_i">
											</div>
										</div>
									</div>
							<?PHP
								} else if ($data_jenisunit['jenis_unit']=="Non Kelas"){
							?>
									<div class="row">
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Jumlah Pasien</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum" id="txt_kapasumum">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn" id="txt_kapasjkn">
											</div>
										</div>
									</div>
							<?PHP
								}
							?>
							
							<br></br>
							<div class="row">
                                <div class="col-md-6">
									  <div class="alert alert-info" style="padding:4px">
                                        <span><strong>Dirujuk</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Umum</label>
										<input type="text" class="form-control" name="txt_dirujuk_umum" id="txt_dirujuk_umum">
									</div>
									<div class="form-group label-floating">
                                        <label class="control-label">JKN</label>
										<input type="text" class="form-control" name="txt_dirujuk_jkn" id="txt_dirujuk_jkn">
									</div>
                                </div>
								
								<div class="col-md-6">
									<div class="alert alert-info" style="padding:4px">
                                        <span><strong>Meninggal</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Umum</label>
										<input type="text" class="form-control" name="txt_meninggal_umum" id="txt_meninggal_umum">
									</div>
									<div class="form-group label-floating">
                                        <label class="control-label">JKN</label>
										<input type="text" class="form-control" name="txt_meninggal_jkn" id="txt_meninggal_jkn">
									</div>
                                </div>
							</div>
							
							<br></br>
							<div class="row">
                                <div class="col-md-4">
									<div class="alert alert-info" style="padding:4px">
                                        <span><strong>Pelayanan Medis & Keperawatan</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="5" name="txt_mas_medis" id="txt_mas_medis"></textarea>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
									<div class="alert alert-info" style="padding:4px">
                                        <span><strong>Penunjang Pelayanan</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="5" name="txt_mas_pelayanan" id="txt_mas_pelayanan"></textarea>
                                    </div>
                                </div>
                          
                                <div class="col-md-4">
									<div class="alert alert-info" style="padding:4px">
                                        <span><strong>Adm. Umum & SDM</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="5" name="txt_mas_umum" id="txt_mas_umum"></textarea>
                                    </div>
                                </div>
                            </div>
							
							<br></br>
							<div class="row">
								<div class="col-md-3">
									<button type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-success form-control">Simpan</button>
								</div>
							</div>
                            
                           
                            <div class="clearfix"></div>
                        
						</form>
                    </div>
                   
				</div>
            </div>
			
			<?PHP
				}
			?>
        </div>
    </div>
</div>












<?PHP
	if (isset($_POST['btn_buatlaporan'])){
		$sup_tgl 	= $_POST['txt_tgl_supervisi'];
		$sup_unit	= $_POST['cb_unit'];
		$sup_jam 	= $_POST['txt_jam'];
		$sup_jadwal	= $_POST['cb_jadwalsupervisi'];
		
		header("location:?view=supervisi-add&tglsupervisi=$sup_tgl&jamsupervisi=$sup_jam&unit=$sup_unit&jadwal=$sup_jadwal");
	}
?>
<!--Modal Update Status===================================================================================================================================-->
<div class="modal fade" id="myModalBuatLap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:700px">
		<div class="modal-content">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Buat Laporan</h4>
			</div>
			
			<form method="post" action="<?PHP $_SERVER['PHP_SELF']?>"  enctype="multipart/form-data" >
				<div class="modal-body">
				
				<div class="col-md-6">
                    <div class="form-group">
						<label class="control-label">Unit</label>
						<select class="form-control js-example-responsive" id="cb_unit" name="cb_unit">
							<option value=""></option>
							<?PHP
								$query_unit  = "SELECT * FROM unit WHERE status_del='N' ";
								$result_unit = mysql_query($query_unit) or die(mysql_error());
								while ($rows_unit = mysql_fetch_object($result_unit)) {
							?>
							<option value="<?PHP echo $rows_unit-> nama_unit;?>"><?PHP echo $rows_unit-> nama_unit;?></option>
							<?PHP
								}
							?>
						</select>
						<!--<input type="text" class="form-control" id="txt_unit" name="txt_unit">-->
					</div>
                </div>
			
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal Supervisi</label>
						<input type="date" class="form-control" name="txt_tgl_supervisi" id="txt_tgl_supervisi">
					</div>
                </div>
				
				<div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Waktu (Jam Supervisi)</label>
						<input type="time" class="form-control" id="txt_jam" name="txt_jam" >
					</div>
                </div>
				
				<div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Jadwal Supervisi</label>
						<select class="form-control js-example-responsive" id="cb_jadwalsupervisi" name="cb_jadwalsupervisi">
							<option value=""></option>
							<option value="Pagi">Jadwal Pagi</option>
							<option value="Siang">Jadwal Siang</option>
							<option value="Sore">Jadwal Sore</option>
						</select>
					</div>
                </div>
				</div>
				
				<div class='modal-footer'>
					<button type="submit" class="btn btn-success btn-fill" name="btn_buatlaporan" id ="btn_buatlaporan">Input Data Supervisi</button>
					<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
					<br>
				</div>
				
			</form> 
			
		</div>
	</div>
</div>

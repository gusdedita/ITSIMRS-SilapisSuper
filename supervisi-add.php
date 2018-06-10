<?PHP 
	include("configdb.php");
	
	if (isset($_POST['btn_buatlaporan'])){
		$tglsupervisi = $_POST['txt_tgl_supervisi'];
		$jamsupervisi = $_POST['txt_jam'];
		$unit = $_POST['txt_unit'];
		
		header("location:?view=supervisi-add&tglsupervisi=$tglsupervisi&jamsupervisi=$jamsupervisi&unit=$unit");
	}
	
	$tglsupervisi = $_GET['tglsupervisi'];
	$jamsupervisi = $_GET['jamsupervisi'];
	$unit = $_GET['unit'];
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			<div class="col-md-12">
                <div class="card">
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">Supervisi</h4>
                    </div>
                    
					<div class="card-content">
                        <form method="post" action="<?PHP $_SERVER['PHP_SELF']?>"  enctype="multipart/form-data">
                            
							<div class="row">
							
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Unit</label>
										<input type="text" class="form-control" id="txt_unit" name="txt_unit" value="<?PHP if (!empty($unit)){echo $unit;}?>">
									</div>
                                </div>
								
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Supervisi</label>
										<input type="date" class="form-control" name="txt_tgl_supervisi" id="txt_tgl_supervisi" value="<?PHP if (!empty($tglsupervisi)){echo $tglsupervisi;}?>">
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Waktu (Jam Supervisi)</label>
										<input type="time" class="form-control" id="txt_jam" name="txt_jam" value="<?PHP if (!empty($jamsupervisi)){echo $jamsupervisi;}?>">
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
										<button type="submit" class="btn btn-primary" name="btn_buatlaporan" id="btn_buatlaporan">Buat Laporan</button>
									</div>
                                </div>
								
							</div>
							
						</form>
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
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">Input Data Laporan Supervisi</h4>
                        <p class="category">Ruang : <?PHP echo $unit;?> (<?PHP echo $tglsupervisi;?>)</p>
                    </div>
                    
					<div class="card-content">
                        <form method="post" action="supervisi-action.php"  enctype="multipart/form-data">
							<input type="hidden" name="txt_jam_super" id="txt_jam_super" value="<?PHP echo $jamsupervisi;?>">
							<input type="hidden" name="txt_tgl_super" id="txt_tgl_super" value="<?PHP echo $tglsupervisi;?>">
							<input type="hidden" name="txt_unit_super" id="txt_unit_super" value="<?PHP echo $unit;?>">
                            
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
												<input type="text" class="form-control" name="txt_kapasumum_ii" id="txt_kapasumum_i">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_ii" id="txt_kapasjkn_i">
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
							
                            
                            <button type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-primary pull-right">Simpan</button>
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
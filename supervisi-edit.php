<?PHP 
	include("configdb.php");
	
	$idsupervisi = $_GET['id'];
	
	$qu_super = mysql_query ("SELECT * 
								FROM 
									supervisi_pasien AS sp
									JOIN unit AS u ON sp.nama_unit=u.nama_unit
									JOIN supervisi_masalah AS sm ON sp.id_supervisi=sm.id_supervisi 
								WHERE 
									sp.id_supervisi='$idsupervisi'")or die(mysql_error());
	$data_super = mysql_fetch_array($qu_super);
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
                            
							<div class="row">
							
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Unit</label>
										<input type="text" class="form-control" id="txt_unit" name="txt_unit" value="<?PHP echo $data_super['nama_unit'];?>" disabled>
									</div>
                                </div>
								
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Supervisi</label>
										<input type="date" class="form-control" name="txt_tgl_supervisi" id="txt_tgl_supervisi" value="<?PHP echo $data_super['tgl_supervisi'];?>" disabled>
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Waktu (Jam Supervisi)</label>
										<input type="time" class="form-control" id="txt_jam" name="txt_jam" value="<?PHP echo $data_super['jam_supervisi'];?>" disabled>
									</div>
                                </div>
								
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Jadwal Supervisi</label>
										<select class="form-control js-example-responsive" id="cb_jadwalsupervisi" name="cb_jadwalsupervisi" disabled>
											<option value=""></option>
											<option value="Pagi" <?PHP if ($data_super['jadwal_supervisi']=="Pagi"){echo "selected";}?>>Jadwal Pagi</option>
											<option value="Siang" <?PHP if ($data_super['jadwal_supervisi']=="Siang"){echo "selected";}?>>Jadwal Siang</option>
											<option value="Sore" <?PHP if ($data_super['jadwal_supervisi']=="Sore"){echo "selected";}?>>Jadwal Sore</option>
										</select>
									</div>
                                </div>
								
							</div>
							
					</div>
					
				</div>
			</div>
			
            <div class="col-md-12">
                <div class="card">
                  
					<!--<div class="card-header" data-background-color="purple">
                        <h4 class="title">Detail Data Laporan Supervisi</h4>
                        <p class="category">Ruang : <?PHP //echo $unit;?> (<?PHP //echo $tglsupervisi;?>)</p>
                    </div>-->
                    
					<div class="card-content">
                        <form method="post" action="supervisi-action.php"  enctype="multipart/form-data">
							<input type="hidden" name="txt_jam_super" id="txt_jam_super" value="<?PHP echo $data_super['jam_supervisi'];?>">
							<input type="hidden" name="txt_tgl_super" id="txt_tgl_super" value="<?PHP echo $data_super['tgl_supervisi'];?>">
							<input type="hidden" name="txt_jadwal" id="txt_jadwal" value="<?PHP echo $data_super['jadwal_supervisi'];?>">
							<input type="hidden" name="txt_unit_super" id="txt_unit_super" value="<?PHP echo $data_super['nama_unit'];?>">
							<input type="hidden" name="txt_idsuper" id="txt_idsuper" value="<?PHP echo $idsupervisi;?>">
							<input type="hidden" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>">
                            
							<?PHP 
								if ($data_super['jenis_unit']=="Kelas") {
							?>
									<div class="row">
										<div class="col-md-4">
											<div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas III</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_iii" id="txt_kapasumum_iii" value="<?PHP echo $data_super['jum_umum_iii'];?>">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_iii" id="txt_kapasjkn_iii" value="<?PHP echo $data_super['jum_jkn_iii'];?>">
											</div>
										</div>
									
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas II</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_ii" id="txt_kapasumum_ii" value="<?PHP echo $data_super['jum_umum_ii'];?>">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_ii" id="txt_kapasjkn_ii" value="<?PHP echo $data_super['jum_jkn_ii'];?>">
											</div>
										</div>
								  
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Kelas I</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum_i" id="txt_kapasumum_i" value="<?PHP echo $data_super['jum_umum_i'];?>">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn_i" id="txt_kapasjkn_i" value="<?PHP echo $data_super['jum_jkn_i'];?>">
											</div>
										</div>
									</div>
							<?PHP
								} else if ($data_super['jenis_unit']=="Non Kelas"){
							?>
									<div class="row">
										<div class="col-md-4">
											  <div class="alert alert-info" style="padding:4px">
												<span><strong>Jumlah Pasien</strong></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Umum</label>
												<input type="text" class="form-control" name="txt_kapasumum" id="txt_kapasumum" value="<?PHP echo $data_super['jum_umum'];?>">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">JKN</label>
												<input type="text" class="form-control" name="txt_kapasjkn" id="txt_kapasjkn" value="<?PHP echo $data_super['jum_jkn'];?>">
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
										<input type="text" class="form-control" name="txt_dirujuk_umum" id="txt_dirujuk_umum" value="<?PHP echo $data_super['rujuk_umum'];?>">
									</div>
									<div class="form-group label-floating">
                                        <label class="control-label">JKN</label>
										<input type="text" class="form-control" name="txt_dirujuk_jkn" id="txt_dirujuk_jkn" value="<?PHP echo $data_super['rujuk_jkn'];?>">
									</div>
                                </div>
								
								<div class="col-md-6">
									<div class="alert alert-info" style="padding:4px">
                                        <span><strong>Meninggal</strong></span>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Umum</label>
										<input type="text" class="form-control" name="txt_meninggal_umum" id="txt_meninggal_umum" value="<?PHP echo $data_super['meninggal_umum'];?>">
									</div>
									<div class="form-group label-floating">
                                        <label class="control-label">JKN</label>
										<input type="text" class="form-control" name="txt_meninggal_jkn" id="txt_meninggal_jkn" value="<?PHP echo $data_super['meninggal_jkn'];?>">
									</div>
                                </div>
							</div>
							
							<br></br>
							
							<input type="hidden" name="txt_status_medis" id="txt_status_medis" value="<?PHP echo $data_super['status_medis'];?>">
							<input type="hidden" name="txt_status_pelayanan" id="txt_status_pelayanan" value="<?PHP echo $data_super['status_pelayanan'];?>">
							<input type="hidden" name="txt_status_umum" id="txt_status_umum" value="<?PHP echo $data_super['status_umum'];?>">
							<div class="row">
                                <div class="col-md-4">
									<?PHP if ($data_super['status_medis']=="Sudah"){?>
										<div class="alert alert-success" style="padding:4px">
									<?PHP } else if ($data_super['status_medis']=="Belum"){?>
										<div class="alert alert-danger" style="padding:4px">
									<?PHP } else if ($data_super['status_medis']=="Tidak Ada"){?> 
										<div class="alert alert-info" style="padding:4px">
									<?PHP } ?>
											<span><strong>Pelayanan Medis & Keperawatan</strong></span>
										</div>
										
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="3" name="txt_mas_medis" id="txt_mas_medis" <?PHP if ($data_super['status_medis']=="Sudah"){echo "disabled";}?>><?PHP echo $data_super['masalah_medis'];?></textarea>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
									<?PHP if ($data_super['status_pelayanan']=="Sudah"){?>
										<div class="alert alert-success" style="padding:4px">
									<?PHP } else if ($data_super['status_pelayanan']=="Belum"){?>
										<div class="alert alert-danger" style="padding:4px">
									<?PHP } else if ($data_super['status_pelayanan']=="Tidak Ada"){?> 
										<div class="alert alert-info" style="padding:4px">
									<?PHP } ?>
											<span><strong>Penunjang Pelayanan</strong></span>
										</div>
										
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="3" name="txt_mas_pelayanan" id="txt_mas_pelayanan" <?PHP if ($data_super['status_pelayanan']=="Sudah"){echo "disabled";}?>><?PHP echo $data_super['masalah_pelayanan'];?></textarea>
                                    </div>
                                </div>
                          
                                <div class="col-md-4">
									<?PHP if ($data_super['status_umum']=="Sudah"){?>
										<div class="alert alert-success" style="padding:4px">
									<?PHP } else if ($data_super['status_umum']=="Belum"){?>
										<div class="alert alert-danger" style="padding:4px">
									<?PHP } else if ($data_super['status_umum']=="Tidak Ada"){?> 
										<div class="alert alert-info" style="padding:4px">
									<?PHP } ?>
											<span><strong>Adm. Umum & SDM</strong></span>
										</div>
									
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Masalah</label>
                                        <textarea class="form-control" rows="3" name="txt_mas_umum" id="txt_mas_umum" <?PHP if ($data_super['status_umum']=="Sudah"){echo "disabled";}?>><?PHP echo $data_super['masalah_umum'];?></textarea>
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
							
								<div class="col-md-4">
									<div class="form-group label-floating">
										<?PHP if ($data_super['status_medis']=="Belum"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-danger'>Belum</span>
										<?PHP } else if ($data_super['status_medis']=="Sudah"){?>
											<?PHP
												$id_umedis = $data_super['user_medis'];
												$qu_user_medis = mysql_query ("SELECT nama_user FROM user WHERE id_user='$id_umedis'")or die(mysql_error());
												$data_user_medis = mysql_fetch_array($qu_user_medis);
											?>
											<label class="control-label"> Tanggapan (<?PHP echo $data_user_medis['nama_user'];?>)</label>
											<textarea class="form-control" rows="3" disabled><?PHP echo $data_super['tanggapan_medis'];?></textarea>
										<?PHP } else if ($data_super['status_medis']=="Tidak Ada"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-info'>Tidak Ada</span>
										<?PHP } ?>
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group label-floating">
                                       <?PHP if ($data_super['status_pelayanan']=="Belum"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-danger'>Belum</span>
										<?PHP } else if ($data_super['status_pelayanan']=="Sudah"){?>
											<?PHP
												$id_upelayanan = $data_super['user_pelayanan'];
												$qu_user_pelayanan = mysql_query ("SELECT nama_user FROM user WHERE id_user='$id_upelayanan'")or die(mysql_error());
												$data_user_pelayanan = mysql_fetch_array($qu_user_pelayanan);
											?>
											<label class="control-label"> Tanggapan (<?PHP echo $data_user_pelayanan['nama_user'];?>)</label>
											<textarea class="form-control" rows="3" disabled><?PHP echo $data_super['tanggapan_pelayanan'];?></textarea>
										<?PHP } else if ($data_super['status_pelayanan']=="Tidak Ada"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-info'>Tidak Ada</span>
										<?PHP } ?>
                                    </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group label-floating">
                                        <label class="control-label"> Tanggapan</label>
                                        <?PHP if ($data_super['status_umum']=="Belum"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-danger'>Belum</span>
										<?PHP } else if ($data_super['status_umum']=="Sudah"){?>
											<?PHP
												$id_uumum = $data_super['user_umum'];
												$qu_user_umum = mysql_query ("SELECT nama_user FROM user WHERE id_user='$id_uumum'")or die(mysql_error());
												$data_user_umum = mysql_fetch_array($qu_user_umum);
											?>
											<label class="control-label"> Tanggapan (<?PHP echo $data_user_umum['nama_user'];?>)</label>
											<textarea class="form-control" rows="3" disabled><?PHP echo $data_super['tanggapan_umum'];?></textarea>
										<?PHP } else if ($data_super['status_umum']=="Tidak Ada"){?>
											<label class="control-label"> Tanggapan</label>
											<span class='label label-info'>Tidak Ada</span>
										<?PHP } ?>
                                    </div>
								</div>
							
							</div>
							
                            
                            <button type="submit" name="btn_update" id="btn_update" class="btn btn-success">Update</button>
							 <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
                            <div class="clearfix"></div>
                        
						</form>
                    </div>
                   
				</div>
            </div>
			
        </div>
    </div>
</div>
<?PHP 
	include("configdb.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			
            <div class="col-md-12">
                <div class="card">
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">
							Data Masalah Supervisi
						</h4>
                        <p class="category">Home > Laporan Supervisi > Data Masalah Supervisi</p>
                    </div>
                    
					<div class="card-content table-responsive col-md-12" style="zoom:80%">
						
						
						
                        <table class="table table-bordered" name="tbl_spmasalah" id="tbl_spmasalah">
                            <thead class="text-primary">
								<tr>
									<th rowspan="2">No</th>
									<th rowspan="2">Tgl. Supervisi</th>
									<th rowspan="2">Jadwal Supervisi</th>
									<th rowspan="2">Unit</th>
									<th colspan="2">Medis</th>
									<th colspan="2">Penunjang Pelayanan</th>
									<th colspan="2">Adm. Umum</th>
								</tr>
								<tr>
									<th>Masalah</th>
									<th>Tanggapan</th>
									<th>Masalah</th>
									<th>Tanggapan</th>
									<th>Masalah</th>
									<th>Tanggapan</th>
								</tr>
                            </thead>
							
							<tbody>
								<?PHP
									$qu_sel_spmasalah = "SELECT 
															sp.id_supervisi,
															sp.nama_unit,
															sp.tgl_supervisi,
															sp.jadwal_supervisi,
															sm.masalah_medis,
															sm.masalah_pelayanan,
															sm.masalah_umum,
															sm.status_medis,
															sm.status_pelayanan,
															sm.status_umum,
															sm.tanggapan_medis,
															sm.tanggapan_pelayanan,
															sm.tanggapan_umum
														FROM 
															supervisi_pasien AS sp 
															JOIN supervisi_masalah AS sm ON sp.id_supervisi=sm.id_supervisi";
									$res_sel_spmasalah = mysql_query($qu_sel_spmasalah) or die(mysql_error());
									$no=1;
									while ($data_sel_spmasalah = mysql_fetch_object($res_sel_spmasalah)){
								?>
									<tr>
										<td><?PHP echo $no;?></td>
										<td><?PHP echo $data_sel_spmasalah->tgl_supervisi;?></td>
										<td><?PHP echo $data_sel_spmasalah->jadwal_supervisi;?></td>
										<td><?PHP echo $data_sel_spmasalah->nama_unit;?></td>
										<td><?PHP echo $data_sel_spmasalah->masalah_medis;?></td>
										<td>
											<?PHP
												if ($data_sel_spmasalah->status_medis == "Sudah"){
													echo $data_sel_spmasalah->tanggapan_medis;
												} else if ($data_sel_spmasalah->status_medis == "Belum"){
													echo "<a href='' data-toggle='modal' data-target='#myModalTangMedis".$no."'><span class='label label-danger'>Belum</span></a>";
												} else if ($data_sel_spmasalah->status_medis == "Tidak Ada"){
													echo "<span class='label label-info'>Tidak Ada</span>";
												}
											?>
										</td>
										<td><?PHP echo $data_sel_spmasalah->masalah_pelayanan;?></td>
										<td>
											<?PHP
												if ($data_sel_spmasalah->status_pelayanan == "Sudah"){
													echo $data_sel_spmasalah->tanggapan_pelayanan;
												} else if ($data_sel_spmasalah->status_pelayanan == "Belum"){
													echo "<a href='' data-toggle='modal' data-target='#myModalTangPelayanan".$no."'><span class='label label-danger'>Belum</span></a>";
												} else if ($data_sel_spmasalah->status_pelayanan == "Tidak Ada"){
													echo "<span class='label label-info'>Tidak Ada</span>";
												}
											?>
										</td>
										<td><?PHP echo $data_sel_spmasalah->masalah_umum;?></td>
										<td>
											<?PHP
												if ($data_sel_spmasalah->status_umum == "Sudah"){
													echo $data_sel_spmasalah->tanggapan_umum;
												} else if ($data_sel_spmasalah->status_umum == "Belum"){
													echo "<a href='' data-toggle='modal' data-target='#myModalTangUmum".$no."'><span class='label label-danger'>Belum</span></a>";
												} else if ($data_sel_spmasalah->status_umum == "Tidak Ada"){
													echo "<span class='label label-info'>Tidak Ada</span>";
												}
											?>
										</td>
									</tr>
									
									<!--Modal Tanggapan Medis===================================================================================================================================-->
									<div class="modal fade" id="myModalTangMedis<?PHP echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document" style="width:700px">
											<div class="modal-content" style="zoom:130%">
										
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Tanggapi Masalah : <?PHP echo $data_user['nama_user'];?></h4>
												</div>
												
												<form method="post" action="supervisi-action.php"  enctype="multipart/form-data" >
													
													<input type="hidden" name="txt_idsuper" id="txt_idsuper" value="<?PHP echo $data_sel_spmasalah->id_supervisi;?>"></input>
													<input type="hidden" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>"></input>
													
													<div class="modal-body">
													
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Unit</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->nama_unit;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Tgl. Laporan</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->tgl_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Jadwal Supervisi</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->jadwal_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Masalah Medis</label>
																<textarea class="form-control" rows="3" disabled><?PHP echo $data_sel_spmasalah->masalah_medis;?></textarea>
															</div>
														</div>
													
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Tanggapan Yang Diberikan</label>
																<textarea class="form-control" rows="3" name="txt_tang_medis" id="txt_tang_medis"></textarea>
															</div>
														</div>
														
														<div class='modal-footer'>
															<button type="submit" class="btn btn-success btn-fill" name="btn_save_tmedis" id ="btn_save_tmedis">Simpan Tanggapan</button>
															<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
														</div>
														
													</div>
												</form> 
												
											</div>
										</div>
									</div>
									
									
									
									
									<!--Modal Tanggapan Pelayanan===================================================================================================================================-->
									<div class="modal fade" id="myModalTangPelayanan<?PHP echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document" style="width:700px">
											<div class="modal-content" style="zoom:130%">
										
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Tanggapi Masalah : <?PHP echo $data_user['nama_user'];?></h4>
												</div>
												
												<form method="post" action="supervisi-action.php"  enctype="multipart/form-data" >
													
													<input type="hidden" name="txt_idsuper" id="txt_idsuper" value="<?PHP echo $data_sel_spmasalah->id_supervisi;?>"></input>
													<input type="hidden" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>"></input>
													
													<div class="modal-body">
													
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Unit</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->nama_unit;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Tgl. Laporan</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->tgl_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Jadwal Supervisi</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->jadwal_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Masalah Penunjang Pelayanan</label>
																<textarea class="form-control" rows="3" disabled><?PHP echo $data_sel_spmasalah->masalah_pelayanan;?></textarea>
															</div>
														</div>
													
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Tanggapan Yang Diberikan</label>
																<textarea class="form-control" rows="3" name="txt_tang_pelayanan" id="txt_tang_pelayanan"></textarea>
															</div>
														</div>
														
														<div class='modal-footer'>
															<button type="submit" class="btn btn-success btn-fill" name="btn_save_tpelayanan" id ="btn_save_tpelayanan">Simpan Tanggapan</button>
															<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
														</div>
														
													</div>
												</form> 
												
											</div>
										</div>
									</div>
									
									
									
									
									
									
									<!--Modal Tanggapan Umum===================================================================================================================================-->
									<div class="modal fade" id="myModalTangUmum<?PHP echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document" style="width:700px">
											<div class="modal-content" style="zoom:130%">
										
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Tanggapi Masalah : <?PHP echo $data_user['nama_user'];?></h4>
												</div>
												
												<form method="post" action="supervisi-action.php"  enctype="multipart/form-data" >
													
													<input type="hidden" name="txt_idsuper" id="txt_idsuper" value="<?PHP echo $data_sel_spmasalah->id_supervisi;?>"></input>
													<input type="hidden" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>"></input>
													
													<div class="modal-body">
													
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Unit</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->nama_unit;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Tgl. Laporan</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->tgl_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Jadwal Supervisi</label>
																<input type="text" class="form-control" value="<?PHP echo $data_sel_spmasalah->jadwal_supervisi;?>" disabled></input>
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Masalah Adm. Umum</label>
																<textarea class="form-control" rows="3" disabled><?PHP echo $data_sel_spmasalah->masalah_umum;?></textarea>
															</div>
														</div>
													
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Tanggapan Yang Diberikan</label>
																<textarea class="form-control" rows="3" name="txt_tang_umum" id="txt_tang_umum"></textarea>
															</div>
														</div>
														
														<div class='modal-footer'>
															<button type="submit" class="btn btn-success btn-fill" name="btn_save_tumum" id ="btn_save_tumum">Simpan Tanggapan</button>
															<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
														</div>
														
													</div>
												</form> 
												
											</div>
										</div>
									</div>
									
									
									
									
									
									
								<?PHP
										$no++;
									}
								?>
							</tbody>
							
                        </table>
                    </div>
                   
				</div>
            </div>
			
			
        </div>
    </div>
</div>




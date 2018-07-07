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
							Data Pengguna
							<a href="" data-toggle="modal" data-target="#myModalAddUser" class="btn btn-success pull-right">Buat User</a>
						</h4>
                        <p class="category">Home > Data Pengguna</p>
                    </div>
                    
					<div class="card-content table-responsive col-md-12">
						
                        <table class="table table-bordered" name="tbl_user" id="tbl_user" style="zoom:90%">
                            <thead class="text-primary">
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>NIP</th>
								<th>Otoritas</th>
								<th>Jabatan</th>
								<th>Aksi</th>
                            </thead>
							
							<tbody>
								<?PHP 
									$no_seluser=1;
									$qu_seluser = mysql_query("SELECT * FROM user WHERE status_active='Active'")or die(mysql_error());
									while ($data_seluser = mysql_fetch_object($qu_seluser)){
								?>
								
								<tr>
									<td><?PHP echo $no_seluser;?></td>
									<td><?PHP echo $data_seluser->nama_user;?></td>
									<td><?PHP echo $data_seluser->username;?></td>
									<td><?PHP echo $data_seluser->nip;?></td>
									<td><?PHP echo $data_seluser->otoritas;?></td>
									<td><?PHP echo $data_seluser->jabatan;?></td>
									<td>
										<a href="" class="btn-sm btn-info" data-toggle="modal" data-target="#myModalEditUser<?PHP echo $no_seluser;?>">Edit</a>
									</td>
								</tr>
								
												<!--Modal Edit User===================================================================================================================================-->
												<div class="modal fade" id="myModalEditUser<?PHP echo $no_seluser;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document" style="width:700px">
														<div class="modal-content">
													
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Edit Data Pengguna</h4>
															</div>
															
															<form method="post" action="user-action.php" enctype="multipart/form-data" >
																
																<?PHP if ($data_user['otoritas'] == "Admin") { ?>
																	<input type="hidden" class="form-control" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_seluser->id_user;?>">
																	<div class="modal-body">
																	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Nama User</label>
																				<input type="text" class="form-control" name="txt_namauser" id="txt_namauser" value="<?PHP echo $data_seluser->nama_user;?>">
																			</div>
																		</div>
																	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">NIP</label>
																				<input type="number" class="form-control" name="txt_nip" id="txt_nip" value="<?PHP echo $data_seluser->nip;?>">
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Username</label>
																				<input type="text" class="form-control" id="txt_username" name="txt_username" value="<?PHP echo $data_seluser->username;?>">
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Password</label>
																				<input type="password" class="form-control" id="txt_password" name="txt_password" value="<?PHP echo $data_seluser->password;?>">
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Otoritas</label>
																				<select class="form-control js-example-responsive" id="cb_otoritas" name="cb_otoritas">
																					<option value=""></option>
																					<option value="Pegawai" <?PHP if ($data_seluser->otoritas == "Pegawai"){echo "selected";}?>>Pegawai</option>
																					<option value="Bid. Medis" <?PHP if ($data_seluser->otoritas == "Bid. Medis"){echo "selected";}?>>Bid. Medis</option>
																					<option value="Bid. Penunjang Pelayanan" <?PHP if ($data_seluser->otoritas == "Bid. Penunjang Pelayanan"){echo "selected";}?>>Bid. Penunjang Pelayanan</option>
																					<option value="Bid. Adm Umum" <?PHP if ($data_seluser->otoritas == "Bid. Adm Umum"){echo "selected";}?>>Bid. Adm Umum</option>
																				</select>
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Jabatan</label>
																				<input type="text" class="form-control" id="txt_jabatan" name="txt_jabatan" value="<?PHP echo $data_seluser->jabatan;?>">
																			</div>
																		</div>
																	</div>
																	
																	<div class='modal-footer'>
																		<button type="submit" class="btn btn-danger btn-fill" name="btn_delete" id ="btn_delete">Delete</button>
																		<button type="submit" class="btn btn-success btn-fill" name="btn_update" id ="btn_update">Update</button>
																		<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
																	</div>
																
																<?PHP } else { ?>
																
																	<div class="modal-body">
																		<p>Mohon Maaf Anda tidak mempunyai otoritas untuk merubah data pengguna.</p>
																	</div>
																	
																	<div class='modal-footer'>
																		<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
																	</div>
																	
																<?PHP } ?>
																
															</form> 
															
														</div>
													</div>
												</div>
								
								
								<?PHP
										$no_seluser++;
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



<!--Modal Tambah User===================================================================================================================================-->
<div class="modal fade" id="myModalAddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:700px">
		<div class="modal-content">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Buat Pengguna</h4>
			</div>
			
			<form method="post" action="user-action.php"  enctype="multipart/form-data" >
				
				<?PHP
					$qu_cekid_user   = mysql_query("SELECT COUNT(*) FROM user");
					$jum_user = mysql_result($qu_cekid_user, 0);
					$iduser   = $jum_user+1;
					$iduser_baru = "USR-".$iduser;
				?>
				
				<?PHP if ($data_user['otoritas'] == "Admin") {?>
					<div class="modal-body">
					
						<input type="hidden" class="form-control" name="txt_iduser" id="txt_iduser" value="<?PHP echo $iduser_baru;?>">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Nama User</label>
								<input type="text" class="form-control" name="txt_namauser" id="txt_namauser">
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">NIP</label>
								<input type="number" class="form-control" name="txt_nip" id="txt_nip">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" id="txt_username" name="txt_username" >
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control" id="txt_password" name="txt_password" >
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Otoritas</label>
								<select class="form-control js-example-responsive" id="cb_otoritas" name="cb_otoritas">
									<option value=""></option>
									<option value="Pegawai">Pegawai</option>
									<option value="Bid. Medis">Bid. Medis</option>
									<option value="Bid. Penunjang Pelayanan">Bid. Penunjang Pelayanan</option>
									<option value="Bid. Adm Umum">Bid. Adm Umum</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Jabatan</label>
								<input type="text" class="form-control" id="txt_jabatan" name="txt_jabatan" >
							</div>
						</div>
					</div>
					
					<div class='modal-footer'>
						<button type="submit" class="btn btn-success btn-fill" name="btn_save" id ="btn_save">Simpan</button>
						<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
					</div>
				
				<?PHP } else { ?>
				
					<div class="modal-body">
						<p>Mohon Maaf Anda tidak mempunyai otoritas untuk menambahkan data Pengguna.</p>
					</div>
				
					<div class='modal-footer'>
						<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
					</div>
					
				<?PHP } ?>
				
			</form> 
			
		</div>
	</div>
</div>



<button style="display:none;" data-toggle="modal" data-target="#myModalDuplicateData" class="btn_log_suc" ></button>
<!--Modal Update Status===================================================================================================================================-->
<div class="modal fade" id="myModalDuplicateData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:700px">
		<div class="modal-content">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
			</div>
			
			
			<div class="modal-body">
				<?PHP
					$qu_sel_super   = mysql_query("SELECT * FROM supervisi_pasien AS sp JOIN user AS u ON sp.id_user=u.id_user WHERE id_supervisi='$idsuper'") or die (mysql_error());
					$data_sel_super = mysql_fetch_array($qu_sel_super);
				?>
				<font size="4px">
					<p align="center">	
						Data Laporan Supervisi Unit/Ruang <b><?PHP echo $data_sel_super['nama_unit']."(".$data_sel_super['jadwal_supervisi'].")";?></b><br> 
						Tanggal : <b><?PHP echo $data_sel_super['tgl_supervisi'];?></b> sudah dibuat sebelumnya oleh : <?PHP echo $data_sel_super['nama_user'];?>
					</p>
				</font>
				<hr></hr>
				<br></br>
			</div>
			
			<div class='modal-footer'>
				<a href="?view=supervisi-edit&id=<?PHP echo $idsuper;?>"><button class="btn btn-primary btn-fill">Lihat Laporan</button></a>
				<button data-toggle="modal" data-target="#myModalBuatLap" data-dismiss="modal" class="btn btn-success btn-fill">Buat Laporan Baru</button>
				<button class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
				<br>
			</div>
				
			 
			
		</div>
	</div>
</div>
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
							Data Daftar Unit/Ruang
							<a href="" data-toggle="modal" data-target="#myModalAddUnit" class="btn btn-success pull-right">Tambah Unit</a>
						</h4>
                        <p class="category">Home > Data Unit</p>
                    </div>
                    
					<div class="card-content table-responsive col-md-12">
						
                        <table class="table table-bordered" name="tbl_unit" id="tbl_unit" >
                            <thead class="text-primary">
                                <th>No</th>
                                <th>Nama Unit</th>
                                <th>Type</th>
                                <th>Kapasitas(Brigging)</th>
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
				
			</form> 
			
		</div>
	</div>
</div>


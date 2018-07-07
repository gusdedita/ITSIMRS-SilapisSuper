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
                                <th>Kapasitas</th>
								<th>Action</th>
                            </thead>
							
							<tbody>
								<?PHP 
									$no_selunit=1;
									$qu_selunit = mysql_query("SELECT * FROM unit WHERE status_del='N'")or die(mysql_error());
									while ($data_selunit = mysql_fetch_object($qu_selunit)){
								?>
								
								<tr>
									<td><?PHP echo $no_selunit;?></td>
									<td><?PHP echo $data_selunit->nama_unit;?></td>
									<td><?PHP echo $data_selunit->jenis_unit;?></td>
									<td><?PHP echo $data_selunit->kapasitas;?></td>
									<td>
										<a href="" class="btn-sm btn-info" data-toggle="modal" data-target="#myModalEditUnit<?PHP echo $no_selunit;?>">Edit</a>
									</td>
								</tr>
								
												<!--Modal Edit User===================================================================================================================================-->
												<div class="modal fade" id="myModalEditUnit<?PHP echo $no_selunit;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document" style="width:700px">
														<div class="modal-content">
													
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Edit Data Unit Ruangan</h4>
															</div>
															
															<form method="post" action="unit-action.php" enctype="multipart/form-data" >
															
																<?PHP if ($data_user == "Admin"){?>
																
																	<input type="hidden" class="form-control" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>">
																	<input type="hidden" class="form-control" name="txt_idunit" id="txt_idunit" value="<?PHP echo $data_selunit->id_unit;?>">
																	
																	<div class="modal-body">
																	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Nama Unit/Ruangan</label>
																				<input type="text" class="form-control" name="txt_namaunit" id="txt_namaunit" value="<?PHP echo $data_selunit->nama_unit;?>">
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Type</label>
																				<select class="form-control js-example-responsive" id="cb_type" name="cb_type">
																					<option value=""></option>
																					<option value="Kelas" <?PHP if ($data_selunit->jenis_unit == "Kelas"){echo "selected";}?>>Kelas</option>
																					<option value="Non Kelas" <?PHP if ($data_selunit->jenis_unit == "Non Kelas"){echo "selected";}?>>Non Kelas</option>
																				</select>
																			</div>
																		</div>
																	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Kapasitas</label>
																				<input type="number" class="form-control" name="txt_kapasitas" id="txt_kapasitas" value="<?PHP echo $data_selunit->kapasitas;?>">
																			</div>
																		</div>
																		
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label" style="color:#ffffff">Kapasitas</label>
																				<br></br>
																				<span style="color:#ffffff">-</span>
																				<br>
																			</div>
																		</div>
																	
																	</div>
																	
																	<div class='modal-footer'>
																		<button type="submit" class="btn btn-danger btn-fill" name="btn_delete" id ="btn_delete">Delete</button>
																		<button type="submit" class="btn btn-success btn-fill" name="btn_update" id ="btn_update">Update</button>
																		<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
																	</div>
																
																<?PHP } else {?>
																	
																	<div class="modal-body">
																		<p>Mohon Maaf Anda tidak mempunyai otoritas untuk merubah data ini.</p>
																	</div>
																	
																	<div class='modal-footer'>
																		<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
																	</div>
																	
																<?PHP }?>
																
																
															</form> 
															
														</div>
													</div>
												</div>
								
								
								<?PHP
										$no_selunit++;
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
<div class="modal fade" id="myModalAddUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:700px">
		<div class="modal-content">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data Unit/Ruangan</h4>
			</div>
			
			<form method="post" action="unit-action.php" enctype="multipart/form-data" >
			
				<?PHP if ($data_user['otoritas'] == "Admin") {?>
			
				<input type="hidden" class="form-control" name="txt_iduser" id="txt_iduser" value="<?PHP echo $data_user['id_user'];?>">
				<div class="modal-body">
			
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nama Unit/Ruangan</label>
							<input type="text" class="form-control" name="txt_namaunit" id="txt_namaunit" >
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Type</label>
							<select class="form-control js-example-responsive" id="cb_type" name="cb_type">
								<option value=""></option>
								<option value="Kelas" >Kelas</option>
								<option value="Non Kelas" >Non Kelas</option>
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Kapasitas</label>
							<input type="number" class="form-control" name="txt_kapasitas" id="txt_kapasitas" >
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" style="color:#ffffff">Kapasitas</label>
							<br></br>
							<span style="color:#ffffff">-</span>
							<br>
						</div>
					</div>
				</div>
				
				<div class='modal-footer'>
					<button type="submit" class="btn btn-success btn-fill" name="btn_save" id ="btn_save">Simpan</button>
					<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
				</div>
				
				<?PHP } else {?>
					
					<div class="modal-body">
						<p>Mohon Maaf Anda tidak mempunyai otoritas untuk menambahkan data unit/Ruang.</p>
					</div>
					
					<div class='modal-footer'>
						<button type="button" class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
					</div>
					
				<?PHP }?>
				
			</form> 
		</div>
	</div>
</div>


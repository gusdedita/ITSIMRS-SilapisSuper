<?PHP 
	include("configdb.php");
	
	$idsuper = $_GET['id'];
	$msg     = $_GET['msg'];
	
	if ($idsuper!=""){
?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.btn_log_suc').click()
			})
		</script>
<?PHP
	} 
	
	if ($msg=="notpegawai") {
?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.btn_notpegawai').click()
			})
		</script>
<?PHP
	}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			
            <div class="col-md-12">
                <div class="card">
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">
							Laporan Supervisi
							<a href="" data-toggle="modal" data-target="#myModalBuatLap" class="btn btn-success pull-right">Buat Laporan</a>
						</h4>
                        <p class="category">Home > Laporan Supervisi</p>
                    </div>
                    
					<div class="card-content table-responsive col-md-12">
						
                        <table class="table table-bordered" name="tbl_supervisi" id="tbl_supervisi">
                            <thead class="text-primary">
                                <th>No</th>
                                <th>Tgl. Supervisi</th>
                                <th>Jadwal Supervisi</th>
                                <th>Status Masalah</th>
								<th>Option</th>
                            </thead>
							
							<script>
								/* Formatting function for row details - modify as you need */
								function format ( d ) {
									
									var mycount = d.detail_super.length;
									var table = '';
									
									for (i in d.detail_super) {
										table +='<tr>'+
													'<td><a href="?view=supervisi-edit&id='+d.detail_super[i].id_supervisi+'">'+d.detail_super[i].nama_unit+'</a></td>'+
													'<td align="center">'+d.detail_super[i].bed_isi+'</td>'+
													'<td align="center">'+d.detail_super[i].jum_rujuk+'</td>'+
													'<td align="center">'+d.detail_super[i].jum_meninggal+'</td>'+
													'<td align="center">'+d.detail_super[i].status_medis+'</td>'+
													'<td align="center">'+d.detail_super[i].status_pelayanan+'</td>'+
													'<td align="center">'+d.detail_super[i].status_umum+'</td>'+
												'</tr>';
									}
									
									
									// `d` is the original data object for the row
									return '<table class="table table-bordered" style="zoom:90%">'+
												'<tr>'+
													'<td>Nama Unit</td>'+
													'<td align="center">Bed Terisi</td>'+
													'<td align="center">Pasien Dirujuk</td>'+
													'<td align="center">Pasien Meninggal</td>'+
													'<td align="center">M. Medis</td>'+
													'<td align="center">M. Pelayanan</td>'+
													'<td align="center">M. Umum</td>'+
												'</tr>'+ table;
												
								}
	
							
							</script>
						
							
                        </table>
                    </div>
                   
				</div>
            </div>
			
			
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
			
				<?PHP if ($data_user['otoritas'] == "Pegawai" || $data_user['otoritas'] == "Admin") {?>
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
					</div>
					
				<?PHP } else {?>
				
					<div class="modal-body">
						<p>Mohon Maaf Anda tidak mempunyai otoritas untuk membuat laporan.</p>
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



<button style="display:none;" data-toggle="modal" data-target="#myModalNotPegawai" class="btn_notpegawai" ></button>
<!--Modal Update Status===================================================================================================================================-->
<div class="modal fade" id="myModalNotPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width:700px">
		<div class="modal-content">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
			</div>
			
			
			<div class="modal-body">
				<font size="4px">
					<p align="center">	
						Mohon Maaf Anda tidak mempunyai otoritas untuk merubah data laporan supervisi ini.
					</p>
				</font>
				<hr></hr>
				<br></br>
			</div>
			
			<div class='modal-footer'>
				<button class="btn btn-info btn-fill" class="close" data-dismiss="modal">Cancel</button>
				<br>
			</div>
				
			 
			
		</div>
	</div>
</div>
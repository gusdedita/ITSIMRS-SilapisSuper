<?PHP 
	include("configdb.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			
            <div class="col-md-10">
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
                                <th>User</th>
                            </thead>
							
							<script>
								/* Formatting function for row details - modify as you need */
								function format ( d ) {
									
									var mycount = d.detail_super.length;
									var table = '';
									
									for (i in d.detail_super) {
										table +='<tr>'+
													'<td><a href="?view=supervisi-edit&id='+d.detail_super[i].id_supervisi+'">'+d.detail_super[i].nama_unit+'</a></td>'+
													'<td align="center">'+d.detail_super[i].status_medis+'</td>'+
													'<td align="center">'+d.detail_super[i].status_pelayanan+'</td>'+
													'<td align="center">'+d.detail_super[i].status_umum+'</td>'+
												'</tr>';
									}
									
									
									// `d` is the original data object for the row
									return '<table class="table table-bordered" style="zoom:90%">'+
												'<tr>'+
													'<td>Nama Unit</td>'+
													'<td align="center">Masalah Medis</td>'+
													'<td align="center">Masalah Pen. Pelayanan</td>'+
													'<td align="center">Masalah Adm. Umum</td>'+
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
				
			</form> 
			
		</div>
	</div>
</div>
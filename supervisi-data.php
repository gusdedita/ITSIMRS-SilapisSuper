<?PHP 
	include("configdb.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
			
			
            <div class="col-md-10">
                <div class="card">
                  
					<div class="card-header" data-background-color="purple">
                        <h4 class="title">Laporan Supervisi</h4>
                        <p class="category">Home > Laporan Supervisi</p>
						<p id="demo"></p>
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
													'<td>'+d.detail_super[i].nama_unit+'</td>'+
													'<td>'+d.detail_super[i].status_medis+'</td>'+
													'<td>'+d.detail_super[i].status_pelayanan+'</td>'+
													'<td>'+d.detail_super[i].status_umum+'</td>'+
												'</tr>';
									}
									
									
									// `d` is the original data object for the row
									return '<table class="table table-bordered" style="zoom:80%">'+
												'<tr>'+
													'<td>Nama Unit</td>'+
													'<td>Masalah Medis</td>'+
													'<td>Masalah Pen. Pelayanan</td>'+
													'<td>Masalah Adm. Umum</td>'+
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
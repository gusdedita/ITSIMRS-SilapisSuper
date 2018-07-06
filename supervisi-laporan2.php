<html>
	<head>
		<title>E-Supervisi RSUD Kabupaten Klungkung</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/fontRoboto.css" rel='stylesheet'>
	</head>
	
	<body>
		
		<?PHP 
			include("configdb.php");
	
			require_once ("assets/fpdf/fpdf.php");
			date_default_timezone_set('Asia/Singapore');
			$datenow  = date('y-m-d');
			
			$super_tanggal = $_GET['tanggal'];
			$super_jadwal  = $_GET['jadwal'];
		?>
		<button align="center" onClick="window.print();"><i class="fa fa-print"></i></button>
		<table class="table">
			<tr>
				<td>
					<img src="assets/img/logo-pemkab.png" width="100px">
				</td>
				<td>
					<p align="center" >
						<strong>Laporan Supervisi Keperawatan</strong>
						<br>
						<strong>RSUD KABUPATEN KLUNGKUNG</strong>
						<br>
						Tanggal : <?PHP echo $super_tanggal;?>, Jadwal Supervisi : <?PHP echo $super_jadwal;?> 
					</p>
				</td>
				<td align="right">
					<img src="assets/img/logo-bulat.png" width="100px">
				</td>
			</tr>
		</table>
		<hr>
		
		</br>
		<p>A. Kondisi Ruangan</p>
				<table class="table bordered" border="2px">
					<tr>
						<td align="center" rowspan="2" valign="center"><font size="2px">No.</font></td>
						<td align="center" rowspan="2" valign="center"><font size="2px">Nama Unit/Ruang</font></td>
						<td align="center" rowspan="2" valign="center"><font size="2px">Kapasitas</font></td>
						<td align="center" rowspan="2" valign="center"><font size="2px">Terisi Non Kelas</font></td>
						<td align="center" colspan="3" valign="center"><font size="2px">Terisi Kelas</font></td>
						<td align="center" rowspan="2" valign="center"><font size="2px">Dirujuk</font></td>
						<td align="center" rowspan="2" valign="center"><font size="2px">Meninggal</font></td>
					</tr>
					<tr>
						<td align="center"><font size="2px"> I   </font></td>
						<td align="center"><font size="2px"> II  </font></td>
						<td align="center"><font size="2px"> III </font></td>
					</tr>
						<?PHP 
							$qu_selsuper  = "SELECT * FROM supervisi_pasien AS sp JOIN supervisi_masalah AS sm ON sp.id_supervisi=sm.id_supervisi JOIN unit AS un ON sp.nama_unit=un.nama_unit WHERE sp.tgl_supervisi='$super_tanggal' AND sp.jadwal_supervisi='$super_jadwal'";
							$sql_selsuper = mysql_query($qu_selsuper) or die(mysql_error());
							$no_sp = 1;
							while ($data_selsuper = mysql_fetch_object($sql_selsuper)) {
							
						?>
					<tr>
						<td align="center"><font size="1px"><?PHP echo $no_sp;?>.</font></td>
						<td><font size="1px"><?PHP echo $data_selsuper->nama_unit;?></font></td>
						<td><font size="1px"><?PHP echo $data_selsuper->kapasitas;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->jum_umum + $data_selsuper->jum_jkn;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->jum_umum_i + $data_selsuper->jum_jkn_i;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->jum_umum_ii + $data_selsuper->jum_jkn_ii;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->jum_umum_iii + $data_selsuper->jum_jkn_iii;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->rujuk_umum + $data_selsuper->rujuk_jkn;?></font></td>
						<td align="center"><font size="1px"><?PHP echo $data_selsuper->meninggal_umum + $data_selsuper->meninggal_jkn;?></font></td>
					</tr>
										
					<?PHP
							$no_sp++;
						}
					?>				
				</table>
		<br>
		
		<p>B. Masalah</p>
		<table class="table bordered" border="3px" style="zoom:80%">
			<tr>
				<td rowspan="2">No.</td>
				<td rowspan="2">Nama Ruang</td>
				<td colspan="2">Bid. Medis</td>
				<td colspan="2">Bid. Penunjang Pelayanan</td>
				<td colspan="2">Bid. Adm. Umum</td>
			</tr>
			<tr>
				<td>Masalah</td>
				<td>Tanggapan</td>
				<td>Masalah</td>
				<td>Tanggapan</td>
				<td>Masalah</td>
				<td>Tanggapan</td>
			</tr>
			
			<?PHP
				$sql_selmas = mysql_query($qu_selsuper) or die(mysql_error());
				$no_mas = 1;
				while ($data_selmas = mysql_fetch_object($sql_selmas)) {
			?>
			<tr>
				<td><?PHP echo $no_mas;?></td>
				<td><?PHP echo $data_selmas->nama_unit;?></td>
				<td><?PHP echo $data_selmas->masalah_medis;?></td>
				<td><?PHP echo $data_selmas->tanggapan_medis;?></td>
				<td><?PHP echo $data_selmas->masalah_pelayanan;?></td>
				<td><?PHP echo $data_selmas->tanggapan_pelayanan;?></td>
				<td><?PHP echo $data_selmas->masalah_umum;?></td>
				<td><?PHP echo $data_selmas->tanggapan_umum;?></td>
			</tr>
			
			<?PHP
					$no_mas++;
				}
			?>
		</table>
				
		
	</body>
</html>
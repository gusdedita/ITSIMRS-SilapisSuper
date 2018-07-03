<?PHP
	
	include("configdb.php");
	$super_tgl 	= $_GET['tgl'];
	$super_jadwal = $_GET['jadwal'];
	
	ob_start();
	require ("assets/html2pdf/html2pdf.class.php");
	$now = date('Y-m-d');
	$filename="account.pdf";
	$content = ob_get_clean();
	
	$content = "
				<head>
				</head>
				<body>
					<p align='center'>
						Laporan Supervisi Keperawatan <br>
						RSUD Kabupaten Klungkung <br>
						Tanggal : ".$super_tgl." | Jadwal Supervisi : ".$super_jadwal."
					</p>
					<br>
					
					<table border='1px' style='border-bottom: 1px solid #999999; padding-bottom: 10px; width: 203mm;'>
						<tr>
							<th rowspan='3'>No</th>
							<th rowspan='3'>Nama Ruangan</th>
							<th rowspan='3'>Kapasitas TT</th>
							<th colspan='4'>Terisi</th>
							<th rowspan='3'>Dirujuk</th>
							<th rowspan='3'>Meninggal</th>
						</tr>
						<tr>
							<td rowspan='2'>Non Kelas</td>
							<td colspan='3'>Kelas</td>
						</tr>
						<tr>
							<td>I</td>
							<td>II</td>
							<td>III</td>
						</tr>";
						
							$qu_selsuper  ="SELECT * FROM supervisi_pasien WHERE tgl_supervisi='$super_tgl' AND jadwal_supervisi='$super_jadwal'";
							$sql_selsuper = mysql_query($qu_selsuper)or die(mysql_error());
							$no = 1;
							while ($data_selsuper = mysql_fetch_object($sql_selsuper)){
						
				$content .=		
								"
								<tr>
									<td>".$no."</td>
									<td>".$data_selsuper->nama_unit ."</td>
									<td>0</td>
									<td>".$data_selsuper->jum_umum + $data_selsuper->jum_jkn ."</td>
									<td>".$data_selsuper->jum_umum_i + $data_selsuper->jum_jkn_i ."</td>
									<td>".$data_selsuper->jum_umum_ii + $data_selsuper->jum_jkn_ii ."</td>
									<td>".$data_selsuper->jum_umum_iii + $data_selsuper->jum_jkn_iii ."</td>
									<td>".$data_selsuper->rujuk_umum + $data_selsuper->rujuk_jkn ."</td>
									<td>".$data_selsuper->meninggal_umum + $data_selsuper->meninggal_jkn ."</td>
								</tr>";
						
								$no++;
							}
				$content .= "		
					</table>
				</body>
				";
	
    ob_end_clean();
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('L', 'A4','fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); 
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }

?>
<?php
include("configdb.php");
$noorder = $_GET['noorder'];
require_once ("fpdf/fpdf.php");
date_default_timezone_set('Asia/Jakarta');
$datenow  = date('y-m-d');

//Inisiasi untuk membuat header kolom
$column_no = "";
$column_nama_sulinggih = "";
$column_nama_welaka = "";
$column_alamat = "";
$column_nik = "";
$column_keterangan = "";

$result = mysql_query("SELECT * FROM tbl_order AS odr JOIN tbl_unit AS unt ON odr.unit=unt.id_unit WHERE noorder='$noorder'") or die(mysql_error());
$no=1;
while($row = mysql_fetch_array($result)) {
	$tglorder 	  	= $row['tglorder'];
    $unit 	  	  	= $row['namaunit'];
    $jenisrusak   	= $row['jenisrusak'];
    $laporanrusak 	= $row['laporanrusak'];
    $levelrusak  	= $row['levelrusak'];
	$tglpengerjaan	= $row['tglpengerjaan'];
	$tglselesai  	= $row['tglselesai'];
	$tindakan 		= $row['tindakan'];
	$hasil  		= $row['hasil'];
	$pemakaian  	= $row['pemakaian'];
	$teknisi 		= $row['teknisi'];
	
}

//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('assets/home/logo-bulat.png',30,10,-250);
$pdf->Image('assets/home/logo-it-2.png',240,10,-1800);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(120,10,'LAPORAN SUPERVISI KEPERAWATAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(120,7,'RSUD KABUPATEN KLUNGKUNG',0,0,'C');
$pdf->Ln();
$pdf->Line(20,40,270,40);

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetY(45);
$pdf->Cell(20);
$pdf->Cell(0,0,'No. Order',0,100,'L');
$pdf->Cell(25);
$pdf->Cell(0,0,' : ',0,100,'L');
$pdf->Cell(5);
$pdf->Cell(0,0,$noorder,0,100,'L');


$pdf->SetY(52);
$pdf->Cell(20);
$pdf->Cell(0,0,'Tanggal Order',0,100,'L');
$pdf->Cell(25);
$pdf->Cell(0,0,' : ',0,100,'L');
$pdf->Cell(5);
$pdf->Cell(0,0,$tglorder,0,100,'L');



$pdf->SetY(59);
$pdf->Cell(20);
$pdf->Cell(0,0,'Laporan Kerusakan',0,100,'L');

$pdf->SetY(45);
$pdf->Cell(130);
$pdf->Cell(0,0,'Tindakan Penanganan',0,100,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetY(66);
$pdf->Cell(20);
$pdf->Cell(0,0,'Instalasi/Ruangan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
$pdf->Cell(0,0,$unit,0,10,'L');

$pdf->SetY(73);
$pdf->Cell(20);
$pdf->Cell(0,0,'Laporan Kerusakan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->SetY(70.5);
$pdf->Cell(60);
//$pdf->Cell(0,0,$laporanrusak,0,10,'L');
$pdf->MultiCell(60,5,$laporanrusak,0,'L');

$pdf->SetY(52);
$pdf->Cell(130);
$pdf->Cell(0,0,'Jenis Kerusakan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($jenisrusak==""){
	$pdf->Image('assets/home/square.png',180,50.5,-1800);
	$pdf->Cell(2);
	$pdf->Cell(0,0,'Hardware',0,10,'L');
	
	$pdf->Image('assets/home/square.png',200,50.5,-1800);
	$pdf->Cell(20);
	$pdf->Cell(0,0,'Software',0,10,'L');
	
	$pdf->Image('assets/home/square.png',220,50.5,-1800);
	$pdf->Cell(20);
	$pdf->Cell(0,0,'Networking',0,10,'L');
	
	$pdf->Image('assets/home/square.png',243,50.5,-1800);
	$pdf->Cell(23);
	$pdf->Cell(0,0,'Lain-lain',0,10,'L');
} else {
	$pdf->Cell(0,0,$jenisrusak,0,10,'L');
}

$pdf->SetY(59);
$pdf->Cell(130);
$pdf->Cell(0,0,'Level Kerusakan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($levelrusak==""){
	$pdf->Image('assets/home/square.png',180,57.5,-1800);
	$pdf->Cell(2);
	$pdf->Cell(0,0,'Ringan',0,10,'L');
	
	$pdf->Image('assets/home/square.png',200,57.5,-1800);
	$pdf->Cell(20);
	$pdf->Cell(0,0,'Sedang',0,10,'L');
	
	$pdf->Image('assets/home/square.png',220,57.5,-1800);
	$pdf->Cell(20);
	$pdf->Cell(0,0,'Berat',0,10,'L');
} else {
	$pdf->Cell(0,0,$levelrusak,0,10,'L');
}



$pdf->SetY(66);
$pdf->Cell(130);
$pdf->Cell(0,0,'Tanggal Pengerjaan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($tglpengerjaan==""){
	$pdf->Cell(0,0,'______________________________________________',0,10,'L');
} else {
	$pdf->Cell(0,0,$tglpengerjaan,0,10,'L');
}

$pdf->SetY(73);
$pdf->Cell(130);
$pdf->Cell(0,0,'Tanggal Selesai',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($tglselesai==""){
	$pdf->Cell(0,0,'______________________________________________',0,10,'L');
} else {
	$pdf->Cell(0,0,$tglselesai,0,10,'L');
}

$pdf->SetY(80);
$pdf->Cell(130);
$pdf->Cell(0,0,'Hasil',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($hasil=="On Working"){
	$pdf->Image('assets/home/square.png',180,78.5,-1800);
	$pdf->Cell(2);
	$pdf->Cell(0,0,'Terselesaikan',0,10,'L');
	
	$pdf->Image('assets/home/square.png',210,78.5,-1800);
	$pdf->Cell(30);
	$pdf->Cell(0,0,'Dikirim ke Pihak IIII',0,10,'L');
	
	$pdf->Image('assets/home/square.png',250,78.5,-1800);
	$pdf->Cell(40);
	$pdf->Cell(0,0,'Menunggu Komponen',0,10,'L');
} else {
	$pdf->Cell(0,0,$hasil,0,10,'L');
}

$pdf->SetY(87);
$pdf->Cell(130);
$pdf->Cell(0,0,'Tindakan',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
if ($tindakan==""){
	$pdf->SetY(87);
	$pdf->Cell(170);
	$pdf->Cell(0,0,'______________________________________________',0,10,'L');
	$pdf->SetY(93);
	$pdf->Cell(170);
	$pdf->Cell(100);
	$pdf->Cell(0,0,'______________________________________________',0,10,'L');
} else {
	$pdf->SetY(85);
	$pdf->Cell(170);
	$pdf->MultiCell(80,5,$tindakan,0,'L');
}

$pdf->SetY(100);
$pdf->Cell(130);
$pdf->Cell(0,0,'Pemakaian Material',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');
$pdf->Cell(5);
if ($pemakaian==""){
	$pdf->Cell(0,0,'______________________________________________',0,10,'L');
} else {
	$pdf->Cell(0,0,$pemakaian,0,10,'L');
}


$pdf->SetY(107);
$pdf->Cell(130);
$pdf->Cell(0,0,'Teknisi',0,100,'L');
$pdf->Cell(35);
$pdf->Cell(0,0,' : ',0,10,'L');

if ($teknisi="") {

	$pdf->SetFont('Arial','',9);
	$pdf->Image('assets/home/square.png',180,105.5,-1800);
	$pdf->Cell(7);
	$pdf->Cell(0,0,'Kadek Virgantara,S.Kom',0,10,'L');

	$pdf->Image('assets/home/square.png',240,105.5,-1800);
	$pdf->Cell(60);
	$pdf->Cell(0,0,'Komang Widiana,SE',0,10,'L');

	$pdf->SetY(113);
	$pdf->Image('assets/home/square.png',180,111,-1800);
	$pdf->Cell(172);
	$pdf->Cell(0,0,'Putu Angga Ananda Pangestu,S.Kom',0,10,'L');

	$pdf->Image('assets/home/square.png',240,111,-1800);
	$pdf->Cell(60);
	$pdf->Cell(0,0,'Wayan Satya Werdaya,S.Kom',0,10,'L');

	$pdf->SetY(119);
	$pdf->Image('assets/home/square.png',180,117.5,-1800);
	$pdf->Cell(172);
	$pdf->Cell(0,0,'Kadek Agus Suniantara,S.Kom',0,10,'L');

	$pdf->Image('assets/home/square.png',240,117.5,-1800);
	$pdf->Cell(60);
	$pdf->Cell(0,0,'Putu Yudi Wirawan,S.Kom',0,10,'L');

	$pdf->SetY(125);
	$pdf->Image('assets/home/square.png',180,123.5,-1800);
	$pdf->Cell(172);
	$pdf->Cell(0,0,'Ida Bagus Gede Anandita',0,10,'L');
} else {
	$result_tek = mysql_query("SELECT * FROM tbl_order_det AS odr JOIN tbl_user AS user ON odr.iduser=user.iduser WHERE noorder='$noorder'") or die(mysql_error());
	$no_tek=1;
	$setY = 107;
	while($row_tek = mysql_fetch_array($result_tek)) {
		$nama_tek = $row_tek['nama'];
		$pdf->SetY($setY);
		$pdf->Cell(170);
		$pdf->Cell(0,0,$no_tek.'. '.$nama_tek,0,10,'L');
		
		$no_tek++;
		$setY = $setY + 7;
	}

}


$pdf->Line(20,130,270,130);


$pdf->SetY(135);
$pdf->Cell(35);
$pdf->Cell(0,0,'Mengetahui,',0,100,'L');


$pdf->SetY(140);
$pdf->Cell(28);
$pdf->Cell(0,0,'Ka. Instalasi/Ruangan',0,100,'L');
$pdf->Cell(172);
$pdf->Cell(0,0,'Ka. Subag EVAPOR & SIMRS',0,10,'L');

$pdf->SetY(165);
$pdf->Cell(20);
$pdf->Cell(0,0,'(..................................................)',0,100,'L');
$pdf->Cell(180);
$pdf->Cell(0,0,'(Dewa Gede Hardi Rastama, ST)',0,10,'L');

$pdf->SetY(167);
$pdf->Cell(20);
$pdf->Cell(0,0,'__________________________',0,100,'L');
$pdf->Cell(179);
$pdf->Cell(0,0,'____________________________',0,10,'L');

$pdf->SetY(172);
$pdf->Cell(20);
$pdf->Cell(0,0,'Nip. ',0,100,'L');
$pdf->Cell(182);
$pdf->Cell(0,0,'Nip. 19790925 2009021006',0,10,'L');



$pdf->SetY(155);
$pdf->Cell(127);
$pdf->Cell(0,0,'Mengetahui,',0,100,'L');
$pdf->SetY(160);
$pdf->Cell(120);
$pdf->Cell(0,0,'Kabag. Bina Program',0,100,'L');
$pdf->SetY(180);
$pdf->Cell(120);
$pdf->Cell(0,0,'(I Made Sumiarta, SH)',0,100,'L');
$pdf->SetY(181);
$pdf->Cell(111);
$pdf->Cell(0,0,'__________________________',0,10,'L');
$pdf->SetY(185);
$pdf->Cell(115);
$pdf->Cell(0,0,'Nip. 19700320 1991031003',0,10,'L');



//Fields Name position
$Y_Fields_Name_position = 30;






$pdf->Output();
?>

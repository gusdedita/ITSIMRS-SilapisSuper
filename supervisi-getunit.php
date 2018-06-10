<?php
 include("configdb.php");

$query = mysql_query("SELECT * FROM unit WHERE status_del='N'");
$json  = array();
while($unit = mysql_fetch_array($query)){
	$json[] = array(
		'label' => $unit['nama_unit'], // text sugesti saat user mengetik di input box
		'value' => $unit['id_unit'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
		'nama'  => $unit['nama_unit']
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>
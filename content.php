<?php
	if(!defined("INDEX")) die("---");
	
	$view = isset($_GET['view']) ? $_GET['view'] : "";

	if($view=="login") 									include("login.php");
	
	elseif($view == "") 								include("home.php");
	elseif($view == "supervisi-add") 					include("supervisi-add.php");
	elseif($view == "supervisi-data") 					include("supervisi-data.php");
	elseif($view == "supervisi-edit") 					include("supervisi-edit.php");
	elseif($view == "supervisi-data-masalah") 			include("supervisi-data-masalah.php");
	
	elseif($view == "user-data") 						include("user-data.php");
	
	elseif($view == "unit-data") 						include("unit-data.php");
	
	else echo"No Content";
?>
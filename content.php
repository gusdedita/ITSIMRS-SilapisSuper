<?php
	if(!defined("INDEX")) die("---");
	
	$view = isset($_GET['view']) ? $_GET['view'] : "";

	if($view=="login") 									include("login.php");
	
	elseif($view == "") 								include("home.php");
	elseif($view == "supervisi-add") 					include("supervisi-add.php");
	elseif($view == "supervisi-data") 					include("supervisi-data.php");
	elseif($view == "supervisi-edit") 					include("supervisi-edit.php");
	
	else echo"No Content";
?>
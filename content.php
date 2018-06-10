<?php
	if(!defined("INDEX")) die("---");
	
	$view = isset($_GET['view']) ? $_GET['view'] : "";

	if($view=="login") 									include("login.php");
	
	elseif($view == "") 								include("home.php");
	elseif($view == "supervisi-add") 					include("supervisi-add.php");
	
	else echo"No Content";
?>
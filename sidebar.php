

<?PHP 
	$getview = $_GET['view'];
?>


<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
            <!--
				Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
				Tip 2: you can also add an image using data-image tag
			-->
			
			
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    RSUD KLUNGKUNG
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
				
                    <li <?PHP if ($getview==""){echo "class='active'";}?>>
                        <a href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
					
					<li <?PHP if ($getview=="supervisi-data"){echo "class='active'";}?>>
                        <a href="?view=supervisi-data">
                            <i class="material-icons">content_paste</i>
                            <p>Data Supervisi</p>
                        </a>
                    </li>
					
					<li <?PHP if ($getview=="supervisi-data-masalah"){echo "class='active'";}?>>
                        <a href="?view=supervisi-data-masalah">
                            <i class="material-icons">warning</i>
                            <p>Daftar Masalah Supervisi</p>
                        </a>
                    </li>
					
                    <li <?PHP if ($getview=="user-data"){echo "class='active'";}?>>
                        <a href="?view=user-data">
                            <i class="material-icons">person</i>
                            <p>Data Pengguna</p>
                        </a>
                    </li>
                   
                    <li <?PHP if ($getview=="unit-data"){echo "class='active'";}?>>
                        <a href="?view=unit-data">
                            <i class="material-icons">local_hotel</i>
                            <p>Data Unit/Ruang</p>
                        </a>
                    </li>
					
                    <li class="active-pro">
                        <a href="upgrade.html">
                            <!--<i class="material-icons">unarchive</i>-->
                            <p><font size="1px">© 2018 Develop By : IT & SIMRS RSUD<font></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
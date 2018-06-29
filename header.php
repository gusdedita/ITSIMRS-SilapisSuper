<?PHP
	include("login-cek.php");
	include("configdb.php");
	
	$query_user = mysql_query ("SELECT * FROM user WHERE username='$_SESSION[username_rsudsupervisi]' AND password='$_SESSION[password_rsudsupervisi]'")or die(mysql_error());
	$data_user  = mysql_fetch_array($query_user);
	$data_iduser = $data_user['id_user'];
?>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        
		<div class="navbar-header">
            <a class="navbar-brand" href="#"> E - Supervisi Keperawatan</a>
        </div>
        
		<div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
			
				<?PHP
					$otoritas_user = $data_user['otoritas'];
					if ($otoritas_user=="Bid. Medis"){
						$qu_cek_masalah = mysql_query("SELECT COUNT(*) AS jumlah FROM supervisi_masalah WHERE status_medis='Belum'")or die(mysql_error());
					} else if ($otoritas_user=="Bid. Penunjang Pelayanan"){
						$qu_cek_masalah = mysql_query("SELECT COUNT(*) AS jumlah FROM supervisi_masalah WHERE status_pelayanan='Belum'")or die(mysql_error());
					} else if ($otoritas_user=="Bid. Adm Umum"){
						$qu_cek_masalah = mysql_query("SELECT COUNT(*) AS jumlah FROM supervisi_masalah WHERE status_umum='Belum'")or die(mysql_error());
					} else {
						$qu_cek_masalah = mysql_query("SELECT COUNT(*) AS jumlah FROM supervisi_pasien WHERE id_user='$data_iduser'")or die(mysql_error());
					}
					$data_cek_masalah = mysql_fetch_array($qu_cek_masalah);
				?>
               
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-round btn-white btn-just-icon" data-toggle="dropdown">
						<i class="material-icons">notifications</i>
                        <span class="notification"><?PHP echo $data_cek_masalah['jumlah'];?></span>
                        <p class="hidden-lg hidden-md">Notifications</p>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="#">Ada <b><?PHP echo $data_cek_masalah['jumlah'];?></b> masalah belum ditanggappi</a>
                        </li>
						<li>
                            <a href="#">Edit Profile</a>
                        </li>
						<li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
                
				
            </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" style="text-align:right" value="<?PHP echo $data_user['nama_user'];?>" disabled>
                                <span class="material-input"></span>
                            </div>
                        </form>
						
        </div>
    </div>
</nav>
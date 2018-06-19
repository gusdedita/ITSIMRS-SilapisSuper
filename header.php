<?PHP
	include("login-cek.php");
	include("configdb.php");
	
	$query_user = mysql_query ("SELECT * FROM user WHERE username='$_SESSION[username_rsudsupervisi]' AND password='$_SESSION[password_rsudsupervisi]'")or die(mysql_error());
	$data_user  = mysql_fetch_array($query_user);
?>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        
		<div class="navbar-header">
            <a class="navbar-brand" href="#"> E - Supervisi Keperawatan</a>
        </div>
        
		<div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="hidden-lg hidden-md">Notifications</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Mike John responded to your email</a>
                        </li>
                        <li>
                            <a href="#">You have 5 new tasks</a>
                        </li>
                    </ul>
                </li>
                
				<li>
                    <a href="#pablo" class="btn dropdown-toggle btn-round btn-white btn-just-icon" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
					 <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <li>
                            <a href="#">Edit Profile</a>
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
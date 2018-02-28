<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'home_index';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perpustakaan Online</title>
	<link href="<?php echo $base_url;?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/npm.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	    	<div class="btn-group">
		      <ul class="nav navbar-nav">
		        <li class="dropdown">
		        	<?php if(isset($_SESSION['nama'])):?>
          				<a href="#" data-toggle="dropdown" class="dropdown-toggle" role="button" aria-expanded="false"><i class="icon-user"></i> <?php echo $_SESSION['nama'];?> <strong class="caret"></strong></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                            <?php else:?>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> Guest <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?app=login"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                        <?php endif;?>                          
                    </ul>
		        </li>
		      </ul>
			</div>
	    </div>
	  </div>
	</nav>
<?php 	
//menampilkan pesan setelah berhasil login		
if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}
//cek apakah ada file yang dituju pada direktori app jika tidak ada tampilkan pesan error	
if(file_exists('app/'.$app.'.php')){
	include ('app/'.$app.'.php'); 
}else{
	echo '<div class="well">Error : Aplikasi tidak menemukan adanya file <b>'.$app.'.php </b> pada direktori <b>app/..</b></div>';
}
?>
</body>
</html>

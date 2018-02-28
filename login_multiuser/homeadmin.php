<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'home_admin';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
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
<div class="container">
	<div class="page-header"><h1><img src="../bookhome.png" width="50" height="50" />Perpustakaan Smk Grafika Bakti Nusantara</h1></div>
		<ul class="nav nav-pills">
			<li <?php echo $app=='admin'?'class="active"':'';?>><a href="homeadmin.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
			
			<?php if(isset($_SESSION['level'])){?>
			<li <?php echo $app=='data_admin'?'class="active"':'';?>><a href="homeadmin.php?app=data_admin"><i class="glyphicon glyphicon-tasks"></i> Data Admin</a></li>
			<li <?php echo $app=='data_user'?'class="active"' :'';?>><a href="homeadmin.php?app=data_user"><i class="glyphicon glyphicon-th-list"></i> Data Mahasiswa</a></li>
			<li <?php echo $app=='transaksi'?'class="active"':'';?>><a href="homeadmin.php?app=transaksi"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a></li>
			<li <?php echo $app=='data_kas'?'class="active"' :'';?>><a href="homeadmin.php?app=data_kas"><i class="glyphicon glyphicon-usd"></i> Data Kas</a></li>
			<li <?php echo $app=='data_buku'?'class="active"':'';?>><a href="homeadmin.php?app=data_buku"><i class="glyphicon glyphicon-book"></i> Data Buku</a></li>
			<li <?php echo $app=='ebook'?'class="active"':'';?>><a href="homeadmin.php?app=ebook"><i class="glyphicon glyphicon-file"></i> Ebook</a></li>
			<li <?php echo $app=='about'?'class="active"' :'';?>><a href="homeadmin.php?app=about"><i class="glyphicon glyphicon-info-sign"></i> About</a></li>
			<?php }?>
			<li class="dropdown pull-right">
			<?php if (isset($_SESSION['nama'])):?>
				<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['nama'];?> <strong class="caret"></strong></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					<?php else:?>
				<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> Guest <strong class="caret"></strong></a>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="icon-th-list"></i> Buat Akun Perpus</a></li>
					<li class="divider"></li>
					<li><a href="homeadmin.php?app=login"><i class="glyphicon glyphicon-user"></i> Login</a></li>
					<?php endif;?>							
				</ul>
			</li>
		</ul>
	<div id="content">
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
	</div>
</div>
</body>
</html>

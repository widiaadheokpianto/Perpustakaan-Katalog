<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/Project/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<?php
$pinjam		= date("d-m-Y");
$seminggu	= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali  	= date("d-m-Y", $seminggu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Transaksi</title>
	<link href="<?php echo $base_url;?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/style.css" rel="stylesheet">
	
    <link href="<?php echo $base_url;?>asset/css/datepicker2.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="<?php echo $base_url;?>asset/img/book.ico">
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/scripts.js"></script>
	
    <script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap-datepicker2.js"></script>

<style type="text/css">
      html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }

      #full-screen-background-image {
        z-index: -999;
        min-height: 100%;
        min-width: 1024px;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
      }

      #wrapper {
  	  width: 1000px;
      margin: auto;
      background-color:rgba(255,255,255,0.9);
      border-radius: 50px;
      }

      a:link, a:visited, a:hover {
        color: #333;
        font-style: italic;
      }

      a.to-top:link,
      a.to-top:visited, 
      a.to-top:hover {
        margin-top: 1000px;
        display: block;
        font-weight: bold;
        padding-bottom: 30px;
        font-size: 30px;
      }

    </style>
</head>

<body>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<div id="wrapper">
<div class="page-header"><h3><img src="../../book7.png" width="50" height="50" /> Input Transaksi Buku Perpustakaan</div>
</div>
  
  <img src="../../transaksi.jpg" id="full-screen-background-image" />
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<legend>Formulir Input Data Transaksi Peminjaman</legend>
<form action="input_transaksi_action.php" method="post">
<input type="hidden" name="pinjam" value="<?php echo $pinjam; ?>">
<input type="hidden" name="kembali" value="<?php echo $kembali; ?>">
		
		<p>
            Data Peminjam<br />
		<select class="span4" name="peminjam">
		<option value="" selected>NPM &amp; Nama Peminjam</option>
				<?php
				include "koneksi_transaksi.php";
				$qa=mysql_query("SELECT * FROM user ORDER BY username", $konek);
				while ($peminjam=mysql_fetch_array($qa)) {
                echo "<option value='$peminjam[0].$peminjam[2]'>$peminjam[0]. $peminjam[2]</option>";
				}
				?>
		</select>
        </p>
		
		<p>
            Judul Buku<br />
		<select class="span4" name="buku">
		<option value="" selected>Pilih Judul Buku</option>
				<?php
					include "koneksi_transaksi.php";
					$q=mysql_query("SELECT * FROM buku ORDER BY id_buku", $konek);
					while ($buku=mysql_fetch_array($q)) {
					echo "<option value='$buku[0].$buku[1]'>$buku[0]. $buku[1]</option>";
					}
					?>
		</select>
        </p>
		
        <p>
		
            Tanggal Pinjam<br />
            <b><?php echo $pinjam; ?></b>
        </p>
        
        <p>
            Tangal Kembali<br />
            <b><?php echo $kembali; ?></b>
        </p>
		
		<p>
			Keterangan<br />
			<select type="text" name="ket">
		    <option> </option>	
			<option>1x</option>
			<option>2x</option> </select>
		</p>	
		
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('Reset transaksi yang telah dimasukan?')">
        </p>
    </form>
</fieldset>
			</div>
		</div>
	</div>
</div>

</body>
</html>
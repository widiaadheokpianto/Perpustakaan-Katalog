<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<?php
$sekarang = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Kas</title>
	<title>Data Transaksi</title>
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
<!-- 
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

    </style> -->

</head>
<body>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<div class="container page-header">
  <h2><img src="../../kasmoney.png" width="80" height="80"> Input Data Kas Perpustakaan</h2>
</div>

<div class="jumbotron container" align="center">
  <form class="form-horizontal" action="simpan_kas.php" method="post">
    <input type="hidden" name="tgl" value="<?php echo $sekarang; ?>">
    <fieldset>
      <legend>Formulir Input Kas Perpustakaan</legend>

        <div class="form-group">
          <label class="col-lg-2 control-label">ID Kas</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="id_kas"  placeholder="Disabled input here..." required="required" disabled="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Tanggal Pembayaran</label>
          <div class="col-lg-6">
            <b class="form-control"><?php echo $sekarang; ?></b>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">Denda</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="denda"  placeholder="Denda" required="required">
          </div>
        </div>

        <button type="submit" value="Simpan" class="btn btn-success">
          <span class="glyphicon glyphicon-floppy-save"></span> Simpan
        </button>

        <button type="reset" value="Reset" class="btn btn-danger" onclick="return confirm('Reset data yang telah dimasukan?')">
          <span class="glyphicon glyphicon-refresh"></span> Reset
        </button>


    </fieldset>
  </form>
</div>
<!-- 
<div id="wrapper">
<div class="page-header"><h3><img src="../../uang.png" width="50" height="50" /> Input Data Kas Perpustakaan</div>
</div> -->
  
  <img src="../../kas.jpg" id="full-screen-background-image" />
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<legend>Formulir Input Kas</legend>
<form action="simpan_kas.php" method="post">
<input type="hidden" name="tgl" value="<?php echo $sekarang; ?>">
		
		<p>
            ID Kas<br />
            <input type="text" name="id_kas" required="required" disabled="disabled"/>
        </p>
		
        <p>
            Tanggal Pembayaran<br />
            <b><?php echo $sekarang; ?></b>
        </p>
		
		<p>
            Denda<br />
            <input type="text" name="denda" required="required" />
        </p>
		
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('Reset data yang telah dimasukan?')">
        </p>
    </form>
	
</fieldset>
			</div>
		</div>
	</div>
</div>
	
</body>
</html>
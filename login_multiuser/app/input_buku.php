<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Buku</title>
	<title>Daftar Admin &amp; User</title>
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

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<div class="container page-header">
  <h2><img src="../../inputbuku.png" width="50" height="50"/> Input Data Buku Perpustakaan </h2>
</div>

<div class="jumbotron container" align="center">
  <form class="form-horizontal" action="simpan_buku.php" method="post">
    <fieldset>
      <legend> Formulir Input Data Buku </legend>

      <div class="form-group">
        <label class="col-lg-2 control-label">ID Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="id_buku" placeholder="ID Buku" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Judul Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="judul" placeholder="Judul Buku" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Tahun Terbit</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="terbit" placeholder="Tahun Terbit" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Penerbit</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal Update</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" id="datepicker" name="tanggal" placeholder="Tanggal Update" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Halaman</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="halaman" placeholder="Jumlah Halaman" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Buku" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Asal Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="peroleh" placeholder="Asal Buku" required="required">
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

<script> 
    //options method for call datepicker
	$('#datepicker').datepicker({
         format: 'dd-mm-yyyy',
		 autoclose: true,
		 todayHighlight: true
	})
    </script>
	
</body>
</html>
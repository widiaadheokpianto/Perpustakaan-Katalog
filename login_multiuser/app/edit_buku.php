<?php 
include 'koneksi_buku.php';
?>

<?php 
$id = $_GET['id_buku'];

$query = mysql_query("select * from buku where id_buku='$id'") or die(mysql_error());

$data = mysql_fetch_array($query);
?>

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
	<title>Edit Data</title>
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
  <h2><img src="../../edit.png" width="50" height="50"/> Edit Data Buku Perpustakaan - Admin</h2>
</div>

<div class="jumbotron container" align="center">
  <form class="form-horizontal" action="edit_buku_action.php" method="post">
    <input type="hidden" name="id_buku" value="<?php echo $id; ?>" />
    <fieldset>
      <legend> Formulir Edit Data Buku Perpustakaan </legend>

      <div class="form-group">
        <label class="col-lg-2 control-label">Judul Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Tahun Terbit</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="terbit" value="<?php echo $data['terbit']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Penerbit</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="penerbit" value="<?php echo $data['penerbit']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Halaman</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="halaman" value="<?php echo $data['halaman']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="jumlah" value="<?php echo $data['jumlah']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Asal Buku</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="peroleh" value="<?php echo $data['peroleh']; ?>" required="required">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal Update</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name="tanggal" value="<?php echo $data['tanggal']; ?>" required="required">
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
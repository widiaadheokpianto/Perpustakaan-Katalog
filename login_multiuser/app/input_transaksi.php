<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

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
  <h2><img src="../../transbook.png" width="60" height="60"> Input Transaksi Buku Perpstakaan </h2>
</div>

<div class="jumbotron container" align="center">
  <form class="form-horizontal" action="input_transaksi_action.php" method="post">
    <input type="hidden" name="pinjam" value="<?php echo $pinjam; ?>">
    <input type="hidden" name="kembali" value="<?php echo $kembali; ?>">
    <fieldset>
      <legend>Formulir Input Data Transaksi Peminjaman</legend>

      <div class="form-group">
          <label class="col-lg-2 control-label">Data Peminjam</label>
          <div class="col-lg-6">
            <select class="form-control" name="peminjam" required="required">
              <option value="" selected> NPM &amp; Nama Peminjam</option>  
                <?php
                  include "koneksi_transaksi.php";
                  $qa=mysql_query("SELECT * FROM user ORDER BY username", $konek);
                  while ($peminjam=mysql_fetch_array($qa)) 
                  {
                    echo "<option value='$peminjam[0].$peminjam[2]'>$peminjam[0]. $peminjam[2]</option>";
                  }
                ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Judul Buku</label>
          <div class="col-lg-6">
            <select class="form-control" name="buku" required="required">
              <option value="" selected>Pilih Judul Buku</option>  
                <?php
                  include "koneksi_transaksi.php";
                  $q=mysql_query("SELECT * FROM buku ORDER BY id_buku", $konek);
                  while ($buku=mysql_fetch_array($q)) 
                  {
                    echo "<option value='$buku[0].$buku[1]'>$buku[0]. $buku[1]</option>";
                  }
                ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Tanggal Pinjam</label>
          <div class="col-lg-6">
            <b class="form-control"><?php echo $pinjam; ?></b>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label">Tanggal Kembali</label>
          <div class="col-lg-6">
            <b class="form-control"><?php echo $kembali; ?></b>
          </div>
        </div>

         <div class="form-group">
          <label class="col-lg-2 control-label">Keterangan</label>
          <div class="col-lg-6">
            <select class="form-control" type="text" name="ket" required="required">
              <option> </option>
              <option>1x</option>
              <option>2x</option>
            </select>
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



</body>
</html>
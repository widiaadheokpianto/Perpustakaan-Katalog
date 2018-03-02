<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<?php
include "koneksi_transaksi.php";
include "transaksi_fungsi.php";

$query=mysql_query("SELECT * FROM transaksi ORDER BY id_transaksi", $konek);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>History Transaksi</title>
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
  <h2><img src="../../history.png" width="70" height="60"> Data Transaksi Buku Perpustakaan
  </h2>
</div>

<div class="jumbotron container">
  <table class="table table-striped table-hover ">
    <thead>
      <tr class="danger">
        <td align="center">NO</td>
        <td align="center">Judul Buku</td>
        <td align="center">ID Buku</td>
        <td align="center">Nama Peminjam</td>
        <td align="center">ID Peminjam</td>
        <td align="center">Tgl Pinjam</td>
        <td align="center">Tgl Kembali</td>
        <td align="center">Status</td>
      </tr>
    </thead>
    <tbody>
      <?php
        $no=0;
        while ($hasil=mysql_fetch_array($query)) {
        $no++;
        echo "<tr class='active'>
                <td align='center'>$no</td>
                <td align='center'>$hasil[1]</td>
                <td align='center'>$hasil[2]</td>
                <td align='center'>$hasil[3]</td>
                <td align='center'>$hasil[4]</td>
                <td align='center'>$hasil[5]</td>
                <td align='center'>$hasil[6]</td>
                <td align='center'>$hasil[7]</td>
            </tr>";
        }
      ?>
    </tbody>
  </table>
  <a href="pdf_data_history.php" class="btn btn-info">
    <span class="glyphicon glyphicon-print"></span> Print
  </a>

  <a href="http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi" class="btn btn-primary">
    <span class="glyphicon glyphicon-list-alt"></span> Transaksi
  </a>
</div>

<div class="container">
  <p><b>Note : </b>Data di atas merupakan data history peminjaman buku perpustakaan baik buku yang sudah dikembalikan maupun belum dikembalikan, berguna sebagai data control management buku perpustakaan.</p>
</div>

</body>
</html>
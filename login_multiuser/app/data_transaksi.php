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

$query=mysql_query("SELECT * FROM transaksi WHERE status='Pinjam' ORDER BY id_transaksi", $konek);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Transaksi</title>
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
<div class="page-header"><h3><img src="../../blue.png" width="50" height="50" /> Data Transaksi Buku Perpustakaan</div>
</div>
  
  <img src="../../data_perpus.jpg" id="full-screen-background-image" />
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
        <tr><td align="left">No</td>
		    <td align="left">Judul Buku</td>
			<td align="left">ID Buku</td>
			<td align="left">Nama Peminjam</td>
			<td align="left">ID Peminjam</td>
			<td align="left">Tgl. Pinjam</td>
			<td align="left">Tgl. Kembali</td>
			<td align="left">Status</td>
			<td align="left">Keterangan</td>
			<td align="left">Terlambat</td>
			<td align="left">Kembali</td>
			<td align="left">Perpanjang</td>
	    </tr>
	</thead>
	<tbody>
<?php
$no=0;
while ($hasil=mysql_fetch_array($query)) {
$no++;
echo "<tr>
	  <td class='td-data'>$no</td>
      <td class='pinggir-data'>$hasil[1]</td>
	  <td class='td-data'>$hasil[2]</td>
	  <td class='td-data'>$hasil[3]</td>
	  <td class='td-data'>$hasil[4]</td>
	  <td class='td-data'>$hasil[5]</td>
	  <td class='td-data'>$hasil[6]</td>
	  <td class='td-data'>$hasil[7]</td>
	  <td class='td-data'>$hasil[8]</td>
	  <td class='td-data'>";

	    $tgl_dateline=$hasil['tgl_kembali'];
		$tgl_kembali=date('d-m-Y');
		$lambat=terlambat($tgl_dateline, $tgl_kembali);
		$denda=$lambat*$denda1;
		if ($lambat>0) {
		echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
		}
		else {
		echo $lambat." hari";
		}
echo "</td>
	  <td class='td-data'><a href='kembali_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]'><i class='btn btn-mini'>Kembali&nbsp;<i class='icon-check'></i></i></a></td>
	  <td class='td-data'><a href='perpanjang_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]&kembali=$hasil[6]&lambat=$lambat'><i class='btn btn-mini'>Perpanjang&nbsp;<i class='icon-plus-sign'></i></i></a></td>
	  </tr>";
}
?>
</tbody>
</table>
<a href="pdf_data_transaksi.php" class="btn btn-mini"><i class="icon-print"></i> Print</a>&nbsp;<a href="http://localhost/Project/login_multiuser/homeadmin.php?app=transaksi" class="btn btn-mini"><i class="icon-th-large"></i> Transaksi</a>
<br>
<br>

<p><b>Note : </b>Data di atas merupakan data buku yang siap di perpanjang maupun siap data buku yang siap untuk dikembalikan, perpanjangan buku hanya boleh dilakukan 1x, batas waktu peminjaman 7 hari bila lewat dari batas itu akan dikenakan denda sebaesar Rp.500/hari.</p>
</div>

</div>
		</div>
	</div>
</div>

</body>
</html>
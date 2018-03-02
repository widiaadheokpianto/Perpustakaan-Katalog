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
	<h2><img src="../../booktrans.png" width="60" height="60"> Data Transaksi Buku Perpustakaan - Admin </h2>
</div>

<div class="jumbotron container">
	<table class="table table-striped table-hover">
		<thead>
			<tr class="danger">
	        	<td align="center">No</td>
			    <td align="center">Judul Buku</td>
				<td align="center">ID Buku</td>
				<td align="center">Nama Peminjam</td>
				<td align="center">ID Peminjam</td>
				<td align="center">Tgl. Pinjam</td>
				<td align="center">Tgl. Kembali</td>
				<td align="center">Status</td>
				<td align="center">Keterangan</td>
				<td align="center">Terlambat</td>
				<td align="center">Kembali</td>
				<td align="center">Perpanjang</td>
	    	</tr>
		</thead>
		<tbody>
		<?php
			$no=0;
			while ($hasil=mysql_fetch_array($query)) 
			{
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
					  <td align='center'>$hasil[8]</td>
					  <td align='center'>";

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
					echo "</td align='center'>
						  <td class='td-data'>
						  	<a href='kembali_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]'>
							  	<button type='button' class='btn btn-success btn-xs'>
							  		<span class='glyphicon glyphicon-ok'></span> Kembali
							  	</button>
						  	</a>
						  </td>
						  <td class='td-data'>
						  	<a href='perpanjang_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]&kembali=$hasil[6]&lambat=$lambat'>
						  		<button type='button' class='btn btn-warning btn-xs'>
						  			<span class='glyphicon glyphicon-plus'></span> Perpanjang
						  		</button
						  	</a>
						  </td>
						  </tr>";
			}
		?>
		</tbody>
	</table>
	<a href="pdf_data_transaksi.php" class="btn btn-info">
		<span class="glyphicon glyphicon-print"></span> Print
	</a>

	<a href="http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi" class="btn btn-primary">
		<span class="glyphicon glyphicon-list-alt"></span> Transaksi
	</a>
</div>
<div class="container">
	<p><b>Note : </b>Data di atas merupakan data buku yang siap di perpanjang maupun siap data buku yang siap untuk dikembalikan, perpanjangan buku hanya boleh dilakukan 1x, batas waktu peminjaman 7 hari bila lewat dari batas itu akan dikenakan denda sebaesar Rp.500/hari.</p>
</div>
</body>
</html>
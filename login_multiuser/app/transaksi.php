<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){ ?>

<html>
<head>
</head>

<body>

<div class="jumbotron" align="center">
	
	<?php if($_SESSION['level']!='admin'){
	echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
	die ('');
	?>

	<?php } ?>

	<p class="lead"><img src="../catatan.png" width="50" height="50"/> Transaksi Perpustakaan</p>

	<p>
		<a href="http://localhost/walah/login_multiuser/app/data_transaksi.php">
			<button type="button" class="btn btn-primary">
				<span class="glyphicon glyphicon-list-alt"></span> Data Transaksi
			</button>
		</a>
		
		<a href="http://localhost/walah/login_multiuser/app/input_transaksi.php">
			<button type="button" class="btn btn-success">
				<span class="glyphicon glyphicon-pencil"></span> Input Transaksi
			</button>
		</a>
	    <a href="http://localhost/walah/login_multiuser/app/history_peminjaman.php">
	    	<button type="button" class="btn btn-info">
	    		<span class="glyphicon glyphicon-th-large"></span> History Transaksi
	    	</button>
	    </a>
	</p>

</div>

<p><b>Note : </b>Menu di atas merupakan control panel transaksi peminjaman buku, hanya admin yang diizinkan menggunakannya, mahasiswa hanya diperbolehkan meminjam buku perpustakaan maksimal 2 buku dengan batas peminjaman 7 hari, bila lewat dari batas peminjaman akan diberikan denda Rp.500/hari.</p>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
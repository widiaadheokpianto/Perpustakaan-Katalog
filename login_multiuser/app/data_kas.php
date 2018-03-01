<!DOCTYPE html>
<?php 
include('koneksi.php');
?>

<html>
<body>
<div class="jumbotron">
	<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){ ?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<p class="lead" align="center"><img src="../money.png" width="50" height="50"/>Data Kas Perpustakaan</p>

<p>
	<a href="http://localhost/walah/login_multiuser/app/input_kas.php">
		<button type="button" class="btn btn-success">
			<span class="glyphicon glyphicon-pencil"></span> Input Kas
		</button>
	</a> 
	<a href="http://localhost/walah/login_multiuser/app/pdf_data_kas.php">
		<button type="button" class="btn btn-info">
			<span class="glyphicon glyphicon-print"></span> Print Kas
		</button>
	</a>
</p>

	<table class="table table-striped table-hover ">
		<thead>
			<tr class="danger">
				<td align="center">ID Kas</td>
				<td align="center">Tanggal Pembayaran</td>
				<td align="center">Denda</td>
				<?php if($_SESSION['level']=='admin'){?>
				<td colspan = "1" align="center">Alat</td>
				<?php } ?>
			</tr>
		</thead>
			<?php
			    $sql = "SELECT * FROM kas ORDER BY id_kas";
			    foreach ($dbh->query($sql) as $data) :
				?>
				<tbody>
					<tr class="active">
						<td align="center"><?php echo $data['id_kas'] ?></td>
						<td align="center"><?php echo $data['tgl'] ?></td>
			            <td align="center"><?php echo $data['denda'] ?></td>
						<?php if($_SESSION['level']=='admin'){?>
						<td align="center">
							<a href="app/hapus_kas.php?id_kas=<?php echo $data['id_kas'] ?>" onClick="return confirm('Delete data buku dengan ID : <?php echo $data['id_kas'];?>');">
								<button type="button" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-trash"></span> Delete
								</button>
							</a>
						</td>
				<?php } ?>
			</tr>
	        <?php endforeach; ?>
		</tbody>
	</table>

	<?php
	mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db("project_perpustakaan") or die(mysql_error());
	?>
	<table class="table table-striped table-hover " style="width:5px;">
	    <tr>
	        <td>Jumlah</td>
	        <td>
	        <?php
	        $qry_jumlah_denda=mysql_query("SELECT SUM(denda) FROM kas");
	        $data_denda=mysql_fetch_array($qry_jumlah_denda);
	        $jumlah_nilai_denda=$data_denda[0];
	        echo $jumlah_nilai_denda;
	        ?>
	        </td>
	    </tr>
	</table>

</div>
<p><b>Note : </b>Data di atas merupakan data uang kas yang telah tersimpan setelah melakukan proses transaksi bila ada mahasiswa yang dikenakan denda.</p>

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
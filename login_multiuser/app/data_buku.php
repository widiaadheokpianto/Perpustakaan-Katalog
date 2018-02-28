<!DOCTYPE html>
<?php 
include('koneksi.php');
?>
<html>
<body>
<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<div class="jumbotron">
	<p>
		<a href="http://localhost/Project/login_multiuser/app/input_buku.php">
			<button type="button" class="btn btn-success">
				<span class="glyphicon glyphicon-pencil"></span> Tambah Data Buku
			</button>
		</a>
	</p>

	<table class="table table-striped table-hover ">
		<thead>
			<tr class="danger">
				<td align="center">ID Buku</td>
				<td align="center">Judul Buku</td>
				<td align="center">Tahun Terbit</td>
				<td align="center">Penerbit</td>
				<td align="center">Jumlah Halaman</td>
				<td align="center">Jumlah Buku</td>
				<td align="center">Asal Buku</td>
				<td align="center">Tanggal Update</td>
				<?php if($_SESSION['level']=='admin'){?>
				<td colspan = "2" align="center">Alat</td>
				<?php } ?>
			</tr>
		</thead>
			<?php
	    $sql = "SELECT * FROM buku ORDER BY id_buku";
	    foreach ($dbh->query($sql) as $data) :
		?>
		<tbody>
			<tr class="active">
				<td align="center"><?php echo $data['id_buku'] ?></td>
				<td align="center"><?php echo $data['judul'] ?></td>
	            <td align="center"><?php echo $data['terbit'] ?></td>
				<td align="center"><?php echo $data['penerbit'] ?></td>
	            <td align="center"><?php echo $data['halaman'] ?></td>
				<td align="center"><?php echo $data['jumlah'] ?></td>
				<td align="center"><?php echo $data['peroleh'] ?></td>
				<td align="center"><?php echo $data['tanggal'] ?></td>
				<?php if($_SESSION['level']=='admin'){?>
				<td align="center">
					<a href="app/edit_buku.php?id_buku=<?php echo $data['id_buku'] ?>">
						<button type="button" class="btn btn-info btn-xs">
							<span class="glyphicon glyphicon-edit"></span> Edit
						</button>
					</a>
				</td>
				<td align="center">
					<a href="app/hapus_buku.php?id_buku=<?php echo $data['id_buku'] ?>" onClick="return confirm('Delete data buku dengan ID : <?php echo $data['id_buku'];?>');">
						<button type="button" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button>
					</a>
				</td>
				<?php } ?>
			</tr>
	<?php
	    endforeach;
	?>
		</tbody>
	</table>
</div>
<p><b>Note : </b>Data di atas merupakan data buku yang terdapat di dalam sistem perpustakaan, yang telah ditambahkan oleh seorang admin dan dilakukan penambahan buku secara berkala ketika ada buku baru yang terupdate, untuk menambahkan kapasitas buku bisa dilakukan pengeditan data jumlah buku.</p>

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
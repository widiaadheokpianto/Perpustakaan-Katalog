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

<p>
	<a href="http://localhost/Project/login_multiuser/app/input_buku.php" class="btn btn-mini"><i class="icon-plus"></i> Menambah Data Buku</a>
</p>

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
			<th align="left">ID Buku</th>
			<th align="left">Judul Buku</th>
			<th align="left">Tahun Terbit</th>
			<th align="left">Penerbit</th>
			<th align="left">Jumlah Halaman</th>
			<th align="left">Jumlah Buku</th>
			<th align="left">Asal Buku</th>
			<th align="left">Tanggal Update</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "2" align="center">Alat</th>
			<?php } ?>
		</tr>
	</thead>
		<?php
    $sql = "SELECT * FROM buku ORDER BY id_buku";
    foreach ($dbh->query($sql) as $data) :
	?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $data['id_buku'] ?></td>
			<td><?php echo $data['judul'] ?></td>
            <td><?php echo $data['terbit'] ?></td>
			<td><?php echo $data['penerbit'] ?></td>
            <td><?php echo $data['halaman'] ?></td>
			<td><?php echo $data['jumlah'] ?></td>
			<td><?php echo $data['peroleh'] ?></td>
			<td><?php echo $data['tanggal'] ?></td>
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="app/edit_buku.php?id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Edit</a>
			<td><a href="app/hapus_buku.php?id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-mini" onClick="return confirm('Delete data buku dengan ID : <?php echo $data['id_buku'];?>');"><i class="icon-trash"></i> Delete</a></td>
			<?php } ?>
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>
<p><b>Note : </b>Data di atas merupakan data buku yang terdapat di dalam sistem perpustakaan, yang telah ditambahkan oleh seorang admin dan dilakukan penambahan buku secara berkala ketika ada buku baru yang terupdate, untuk menambahkan kapasitas buku bisa dilakukan pengeditan data jumlah buku.</p>
</div>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
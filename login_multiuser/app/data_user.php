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
		<a href="http://localhost/walah/login_multiuser/app/input_user.php">
			<button type="button" class="btn btn-warning">
				<span class="glyphicon glyphicon-exclamation-sign"></span> Menambah Admin dan User Baru
			</button>
		</a>
	</p>

	<table class="table table-striped table-hover ">
		<thead>
			<tr class="success">
				<td align="center">Username</td>
				<!-- <th align="left">Password</th> -->
				<td align="center">Nama</td>
				<td align="center">J.Kelamin</td>
				<!-- <th align="left">Tempat Lahir</th>
				<th align="left">Tanggal Lahir</th> -->
				<td align="center">Fakultas</td>
				<td align="center">Jurusan</td>
				<td align="center">T.Angkatan</td>
				<!-- <th align="left">Alamat</th> -->
				<td align="center">Email</td>
				<td align="center">Ponsel</td>
				<?php if($_SESSION['level']=='admin'){?>
				<td colspan = "2" align="center">Alat</td>
				<?php } ?>
			</tr>
		</thead>
			<?php
	    $sql = "SELECT username, password, nama, jk, tempat, lahir, fakultas, jurusan, tahun, alamat, email, hp FROM user WHERE level=2";
	    foreach ($dbh->query($sql) as $data) :
		?>
		<tbody>
			<tr class="active">
				<td align="center"><?php echo $data['username'] ?></td>
				<!-- <td><?php echo $data['password'] ?></td> -->
	            <td align="center"><?php echo $data['nama'] ?></td>
				<td align="center"><?php echo $data['jk'] ?></td>
	            <!-- <td><?php echo $data['tempat'] ?></td> -->
				<!-- <td><?php echo $data['lahir'] ?></td> -->
				<td align="center"><?php echo $data['fakultas'] ?></td>
				<td align="center"><?php echo $data['jurusan'] ?></td>
				<td align="center"><?php echo $data['tahun'] ?></td>
				<!-- <td><?php echo $data['alamat'] ?></td> -->
				<td align="center"><?php echo $data['email'] ?></td>
				<td align="center"><?php echo $data['hp'] ?></td>
				<?php if($_SESSION['level']=='admin'){?>
				<td>
					<a href="app/edit_user.php?username=<?php echo $data['username'] ?>">
						<button type="button" class="btn btn-info btn-xs">
							<span class="glyphicon glyphicon-edit"></span> Edit
						</button>
					</a>
				</td>
				<td>
					<a href="app/hapus_user.php?username=<?php echo $data['username'] ?>" onClick="return confirm('Delete mahasiswa dengan NIM : <?php echo $data['username'];?>');">
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
</div>

<p><b>Note : </b>Data di atas merupakan data user yang terdaftar di dalam sistem perpustakaan, baik itu mendaftar sendiri maupun didaftarkan oleh admin, untuk mengelola data user hanya bisa dilakukan oleh seorang admin dan data user ini berguna untuk proses data transaksi meminjam maupun mengembalikan buku perpustakaan.</p>

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
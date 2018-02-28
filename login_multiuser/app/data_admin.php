<!DOCTYPE html>
<?php include('koneksi.php'); ?>
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
		<a href="http://localhost/phpmyadmin/index.php">
			<button type="button" class="btn btn-success">
				<span class="glyphicon glyphicon-hdd"></span> Management Data Admin
			</button>
		</a>
		<a href="http://localhost/walah/login_multiuser/homeupdate.php">
			<button type="button" class="btn btn-warning">
				<span class="glyphicon glyphicon-exclamation-sign"></span> Peraturan
			</button>
		</a>
	</p>

	<table class="table table-striped table-hover ">
		<thead>
			<tr class="info">
				<td align="center">Username</td>
				<td align="center">Nama</td>
				<td align="center">Tempat Lahir</td>
				<td align="center">Tanggal Lahir</td>
				<td align="center">Alamat</td>
				<td align="center">Email</td>
				<td align="center">Ponsel</td>
				<?php if($_SESSION['level']=='admin'){?>
				<td colspan = "2" align="center">Alat</td>
				<?php } ?>
			</tr>
		</thead>
		
		<?php
	    $sql = "SELECT username, nama, tempat, lahir, alamat, email, hp FROM user WHERE level=1";
		foreach ($dbh->query($sql) as $data) :
	    ?>
	    <tbody>
			<tr class="active">
				<td align="center"><?php echo $data['username'] ?></td>
	            <td align="center"><?php echo $data['nama'] ?></td>
	            <td align="center"><?php echo $data['tempat'] ?></td>
				<td align="center"><?php echo $data['lahir'] ?></td>
				<td align="center"><?php echo $data['alamat'] ?></td>
				<td align="center"><?php echo $data['email'] ?></td>
				<td align="center"><?php echo $data['hp'] ?></td>
				<?php if($_SESSION['level']=='admin'){?>
				<td align="center">
					<a href="app/edit_admin.php?username=<?php echo $data['username'] ?>">
						<button type="button" class="btn btn-info btn-xs">
							<span class="glyphicon glyphicon-edit"></span> Edit
						</button>
					</a>
				</td>
				<td align="center">
					<a href="app/hapus_user_admin.php?username=<?php echo $data['username'] ?>" onClick="return confirm('Delete mahasiswa dengan ID : <?php echo $data['username'];?>');">
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
	<?php 
	}else{
	echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
	?>
	</div>
	<p ><b>Note : </b>Data di atas merupakan data admin yang terdaftar di dalam PhpMyadmin yang telah memiliki izin dari kepala perpustakaan untuk mengelola aplikasi ini, untuk mengelola CRUD data admin silahkan kunjungin control panel PhpMyadmin dan cari database "project_perpustakaan" dengan tabel "user", cari user dengan level admin untuk mengelola data admin, lalu fungsi edit &amp; hapus bisa klik pada menu tabel.</p>
	</body>
</html>
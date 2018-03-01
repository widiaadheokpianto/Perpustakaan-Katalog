<?php 
session_start();

//untuk "login_multiuser" bisa diganti dan sesuaikan dengan folder project
//tujuan seperti dibuat menggunakan $_SERVER['HTTP_HOST'] agar hostname berubah sendiri secara dinamis

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/walah/login_multiuser/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daftar Admin &amp; User</title>
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
	<h2><img src="../../user.png" width="50" height="50"/> Daftar Akun Siswa Perpustakaan - Admin </h2>
</div>

<div class="jumbotron container" align="center" >
	<form class="form-horizontal" action="simpan_user.php" method="post">
		<fieldset>
			<legend>Formulir Input Data Siswa SMK Grafika Bakti Nusantara</legend>

			<div class="form-group">
		      <label class="col-lg-2 control-label">NPM</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="username" placeholder="NPM" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Password</label>
		      <div class="col-lg-6">
		        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Nama Lengkap</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Jenis Kelamin</label>
		      <div class="col-lg-6">
		        <select class="form-control" type="text" name="jk" required="required">
		          <option> </option>
		          <option>L</option>
		          <option>P</option>
		        </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Tempat Lahir</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Tanggal Lahir</label>
		      <div class="col-lg-6">
		        <input type="text" id="datepicker" class="form-control input" name="lahir" placeholder="dd-mm-yyyy" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Fakultas</label>
		      <div class="col-lg-6">
		        <select class="form-control" type="text" name="fakultas" required="required">
		          <option> </option>	
				  <option>Fakultas Hukum</option>
				  <option>Fakultas Teknik</option>
				  <option>Fakultas Ekonomi</option>
				  <option>Fakultas Agama Islam</option>
				  <option>Fakultas Ilmu Komputer</option>
				  <option>Fakultas Ilmu Sosial dan Ilmu Politik</option>
				  <option>Fakultas Keguruan dan Ilmu Pendidikan</option>
				  <option>Fakultas Pertanian</option> </select>
		          </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Program Studi</label>
		      <div class="col-lg-6">
		        <select class="form-control" type="text" name="jurusan" required="required">
		          	<option> </option>	
					<option>Ilmu Hukum S-1</option>
					<option>Pascasarjana Magister Manajemen</option>
					<option>Manajemen S-1</option>
					<option>Akuntansi S-1</option>
					<option>Akuntansi D-3</option>
					<option>Pendidikan Luar Sekolah S-1</option>
					<option>Pendidikan Matematika S-1</option>
					<option>Pendidikan Bahasa Inggris S-1</option>
					<option>Pendidikan Jasmani dan Kesehatan S-1</option>
					<option>Agroteknologi S-1</option>
					<option>Kebidanan D-3</option>
					<option>Pendidikan Agama Islam S-1</option>
					<option>Teknik Industri S-1</option>
					<option>Teknik Mesin S-1</option>
					<option>Teknik Mesin D-3</option>
					<option>Teknik Informatika S-1</option>
					<option>Ilmu Komunikasi S-1</option>
					<option>Ilmu Pemerintahan S-1</option> </select>
		          </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Tahun Angkatan</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="tahun" placeholder="Tahun Angkatan" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Alamat</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Email</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Nomor Handphone</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" name="hp" placeholder="Nomor Handphone" required="required">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Pilih File Foto</label>
		      <div class="col-lg-6">
		        <input type="file" class="form-control" name="foto">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Level</label>
		      <div class="col-lg-6">
		        <select class="form-control" type="text" name="level" required="required">
		          <option> </option>
		          <option>Admin</option>
		          <option>User</option>
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



<!-- <div id="wrapper">
<div class="page-header"><h3><img src="../../mhs.png" width="50" height="50" /> Daftar Akun Mahasiswa Perpustakaan - Admin</div>
</div>
  
  <img src="../../perpus.jpg" id="full-screen-background-image" />
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<legend>Formulir Input Data Mahasiswa UNSIKA</legend>
<form action="simpan_user.php" method="post">
		
		<p>
            NPM<br />
            <input type="text" name="username" required="required" />
        </p>
		
		<p>
            Password<br />
            <input type="password" name="password" required="required" />
        </p>
		
        <p>
            Nama Lengkap<br />
            <input type="text" name="nama" required="required" />
        </p>
        
        <p>
		    Jenis Kelamin<br />
			<select type="text" name="jk">
		    <option> </option>		
			<option>L</option>
			<option>P</option> </select>
        </p>
		
		<p>
            Tempat Lahir<br />
            <input type="text" name="tempat" required="required" />
        </p>
		
		<p>
	
		<label class="control-label"> Tanggal Lahir </label>
         <input type="text" id="datepicker" name="lahir" class="input"  >  
        </p>
		
		<p>
			Fakultas<br />
			<select type="text" name="fakultas">
		    <option> </option>	
			<option>Fakultas Hukum</option>
			<option>Fakultas Teknik</option>
			<option>Fakultas Ekonomi</option>
			<option>Fakultas Agama Islam</option>
			<option>Fakultas Ilmu Komputer</option>
			<option>Fakultas Ilmu Sosial dan Ilmu Politik</option>
			<option>Fakultas Keguruan dan Ilmu Pendidikan</option>
			<option>Fakultas Pertanian</option> </select>
		</p>
        
		<p>
            Program Studi<br />
			<select type="text" name="jurusan">
			<option> </option>	
			<option>Ilmu Hukum S-1</option>
			<option>Pascasarjana Magister Manajemen</option>
			<option>Manajemen S-1</option>
			<option>Akuntansi S-1</option>
			<option>Akuntansi D-3</option>
			<option>Pendidikan Luar Sekolah S-1</option>
			<option>Pendidikan Matematika S-1</option>
			<option>Pendidikan Bahasa Inggris S-1</option>
			<option>Pendidikan Jasmani dan Kesehatan S-1</option>
			<option>Agroteknologi S-1</option>
			<option>Kebidanan D-3</option>
			<option>Pendidikan Agama Islam S-1</option>
			<option>Teknik Industri S-1</option>
			<option>Teknik Mesin S-1</option>
			<option>Teknik Mesin D-3</option>
			<option>Teknik Informatika S-1</option>
			<option>Ilmu Komunikasi S-1</option>
			<option>Ilmu Pemerintahan S-1</option> </select>
        </p>

        <p>
            Tahun Angkatan<br />
            <input type="text" name="tahun" />
        </p>
		
		<p>
            Alamat<br />
            <input type="text" name="alamat" required="required" />
        </p>
		
		<p>
            Email<br />
            <input type="email" name="email" required="required" />
        </p>
        
        <p>
            Nomor Handphone<br />
            <input type="text" name="hp" required="required" />
        </p>
		
		<p>
            Pilih File Foto<br />
            <input type="file" name="foto" />
        </p>
        
        <p>
		    Level<br />
			<select type="text" name="level">
		    <option> </option>				
			<option>admin</option>
			<option>user</option></select>
        </p>		
		
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('Reset data yang telah dimasukan?')">
        </p>
    </form>
</fieldset>
			</div>
		</div>
	</div>
</div> -->

    <script> 
    //options method for call datepicker
	$('#datepicker').datepicker({
         format: 'dd-mm-yyyy',
		 autoclose: true,
		 todayHighlight: true
	})
    </script>
	
</body>
</html>
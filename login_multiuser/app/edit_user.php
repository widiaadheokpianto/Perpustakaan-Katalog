<?php
include 'koneksi.php';
if (isset($_GET['username'])) {
    $query = $dbh->query("SELECT * FROM user WHERE username = '$_GET[username]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
} else {
    echo "NPM tidak tersedia, Silahkan Cek Ulang<br /><a href='http://localhost/walah/login_multiuser/homeadmin.php?app=data_user'>Kembali</a>";
    exit();
}

if ($data === false) {
    echo "NPM tidak ditemukan, Silahkan Lakukan Registrasi<br /><a href='http://localhost/walah/login_multiuser/homeadmin.php?app=data_user'>Kembali</a>";
    exit();
}
?>

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
	<title>Edit Data</title>
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

<div class="container page-header">
  <h2><img src="../../edit.png" width="50" height="50"/> Edit Data Buku Perpustakaan - Admin</h2>
</div>

<div class="jumbotron container" align="center">
    <form class="form-horizontal" action="edit_user_action.php" method="post">
        <input type="hidden" name="username" value="<?php echo $data['username']; ?>"/>

        <fieldset>
            <legend>Formulir Edit Data Siswa SMK Grafika Bakti Nusantara</legend>
            <div class="form-group">
            <label class="col-lg-2 control-label">Password</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="password" value="<?php echo $data['password']; ?>" required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Nama Lengkap</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Jenis Kelamin</label>
            <?php if ($data['jk'] === "L") : ?>
            <div class="radio">
                <label for="l">
                    <input type="radio" name="jk" value="L" id="l" checked />L
                </label>
            </div>
            <div class="radio">
                <label for="p">
                    <input type="radio" name="jk" value="P" id="perempuan" />P
                </label>
            </div>
                <?php else : ?>
            <div class="radio">
                <label for="l">
                    <input type="radio" name="jk" value="L" id="l" />
                    L
                </label>
            </div>
            <div class="radio">
                <label for="p">
                    <input type="radio" name="jk" value="P" id="p" checked />
                    P
                </label>
            </div>
             <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Tempat Lahir</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="tempat" value="<?php echo $data['tempat']; ?>" required="required">
            </div>
        </div>

         <div class="form-group">
            <label class="col-lg-2 control-label">Tanggal Lahir</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="lahir" value="<?php echo $data['lahir']; ?>" required="required">
            </div>
        </div>

        <div class="form-group">
              <label class="col-lg-2 control-label">Fakultas</label>
              <div class="col-lg-6">
                <select class="form-control" type="text" name="fakultas" required="required value="<?php echo $data['fakultas']; ?>"">
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
                <select class="form-control" type="text" name="jurusan" required="required" value="<?php echo $data['jurusan']; ?>">
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
                <input type="text" class="form-control" name="tahun" placeholder="Tahun Angkatan" required="required" value="<?php echo $data['tahun']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Alamat</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required" value="<?php echo $data['alamat']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Email</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo $data['email']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Nomor Handphone</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" name="hp" placeholder="Nomor Handphone" required="required" value="<?php echo $data['hp']; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Pilih File Foto</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="foto" value="<?php echo $data['foto']; ?>">
              </div>
            </div>

            <button type="submit" value="Simpan" class="btn btn-success">
                <span class="glyphicon glyphicon-floppy-save"></span> Simpan
            </button>

            <button type="reset" value="Reset" class="btn btn-danger" onclick="return confirm('Reset data yang telah diedit?')">
                <span class="glyphicon glyphicon-refresh"></span> Reset
            </button>
        </fieldset>
    </form>
</div>
<!-- 
<div id="wrapper">
<div class="page-header"><h3><img src="../../pensil.png" width="50" height="50" /> Edit Data Mahasiswa Perpustakaan - Admin</div>
</div>

<img src="../../kelompok.jpg" id="full-screen-background-image" />
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

<fieldset style="width: 100%; margin: auto;">
<legend>Formulir Edit Data Mahasiswa UNSIKA</legend>
    
    <form action="edit_user_action.php" method="post">
        <input type="hidden" name="username" value="<?php echo $data['username']; ?>" />
		
		<p>
            Password<br />
            <input type="text" name="password" required="required" value="<?php echo $data['password']; ?>"/>
        </p>
		
        <p>
            Nama Lengkap<br />
            <input type="text" name="nama" required="required" value="<?php echo $data['nama']; ?>"/>
        </p>
        
        <p>
            Jenis Kelamin<br />
            <?php if ($data['jk'] === "L") : ?>
            <input type="radio" name="jk" value="L" id="l" checked /><label for="l">L</label>
            <input type="radio" name="jk" value="P" id="perempuan" /><label for="p">P</label>
            <?php else : ?>
            <input type="radio" name="jk" value="L" id="l" /><label for="l">L</label>
            <input type="radio" name="jk" value="P" id="p" checked /><label for="p">P</label>
            <?php endif; ?>
        </p>
		
		<p>
            Tempat Lahir<br />
            <input type="text" name="tempat" required="required" value="<?php echo $data['tempat']; ?>"/>
        </p>

		<p>
	
		<label class="control-label"> Tanggal Lahir </label>
            <input type="text" id="datepicker" name="lahir" class="input" value="<?php echo $data['lahir']; ?>"/>
        </p>	
		
		<p>
            Fakultas<br />
            <select type="text" name="fakultas" required="required" value="<?php echo $data['fakultas']; ?>"/>
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
            Jurusan<br />
            <select type="text" name="jurusan" required="required" value="<?php echo $data['jurusan']; ?>"/>
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
            <input type="text" name="tahun" required="required" value="<?php echo $data['tahun']; ?>"/>
        </p>
		
		<p>
            Alamat<br />
            <input type="text" name="alamat" required="required" value="<?php echo $data['alamat']; ?>"/>
        </p>
		
		<p>
            Email<br />
            <input type="email" name="email" required="required" value="<?php echo $data['email']; ?>"/>
        </p>
		
        <p>
            Nomor Handphone<br />
            <input type="text" name="hp" required="required" value="<?php echo $data['hp']; ?>" />
        </p>
		
        <p>
            Pilih File Foto<br />
            <input type="file" name="foto" value="<?php echo $data['foto']; ?>" />
        </p>
		
        <p>
            <input type="submit" value="Simpan" />
            <input type="reset" value="Reset" onclick="return confirm('Reset data yang telah diedit?')">
        </p>
    </form>
</fieldset>
			</div>
		</div>
	</div>
</div>
 -->
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
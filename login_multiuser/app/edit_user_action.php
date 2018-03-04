<?php
include 'koneksi.php';

if (isset($_POST)) {
    $sql = "UPDATE user SET password = '$_POST[password]',
						    nama = '$_POST[nama]',
                            jk = '$_POST[jk]',
							tempat = '$_POST[tempat]',
							lahir = '$_POST[lahir]',
							fakultas = '$_POST[fakultas]',
						    jurusan = '$_POST[jurusan]',
						    tahun = '$_POST[tahun]',
					        alamat = '$_POST[alamat]',
			                email = '$_POST[email]',
                            hp  = '$_POST[hp]',
							foto  = '$_POST[foto]'
									WHERE username = '$_POST[username]' ";
    $dbh->exec($sql);
}

header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_user");
?>
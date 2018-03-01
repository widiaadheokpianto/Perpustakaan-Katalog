<?php
include 'koneksi.php';

if (isset($_POST)) {
    $sql = "INSERT INTO user VALUE ('$_POST[username]', '$_POST[password]', '$_POST[nama]', '$_POST[jk]', '$_POST[tempat]', '$_POST[lahir]', '$_POST[fakultas]', '$_POST[jurusan]', '$_POST[tahun]', '$_POST[alamat]', '$_POST[email]', '$_POST[hp]', '$_POST[foto]', '$_POST[level]')";
    $dbh->exec($sql);
}

header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_user");
?>
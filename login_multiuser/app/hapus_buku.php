<?php
include 'koneksi.php';
if (isset($_GET['id_buku'])) {
    $dbh->exec("DELETE FROM buku WHERE id_buku = '$_GET[id_buku]'");
}
header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_buku")
?>
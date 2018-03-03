<?php
include 'koneksi.php';
if (isset($_GET['id_kas'])) {
    $dbh->exec("DELETE FROM kas WHERE id_kas = '$_GET[id_kas]'");
}
header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_kas")
?>
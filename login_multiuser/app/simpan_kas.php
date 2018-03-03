<?php
include('koneksi_buku.php');

    $id_kas=$_POST['id_kas'];
    $tgl=$_POST['tgl'];
	$denda=$_POST['denda'];
	
    $sql="INSERT INTO kas SET id_kas='$id_kas', tgl='$tgl', denda='$denda'";
	
    $query=mysql_query($sql) or die(mysql_error());
    
	if ($query) {
          header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_kas");
}
?>
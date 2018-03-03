<?php
include('koneksi_buku.php');

//tangkap data dari form
$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$terbit = $_POST['terbit'];
$penerbit = $_POST['penerbit'];
$halaman = $_POST['halaman'];
$jumlah = $_POST['jumlah'];
$peroleh = $_POST['peroleh'];
$tanggal = $_POST['tanggal'];

//update data di database sesuai id_buku
$query = mysql_query("update buku set judul='$judul', terbit='$terbit', penerbit='$penerbit', halaman='$halaman', jumlah='$jumlah', peroleh='$peroleh', tanggal='$tanggal' where id_buku='$id'") or die(mysql_error());

if ($query) {
	header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_buku");
}
?>
<?php
include('koneksi_buku.php');

//tangkap data dari form
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$terbit = $_POST['terbit'];
$penerbit = $_POST['penerbit'];
$halaman = $_POST['halaman'];
$jumlah = $_POST['jumlah'];
$peroleh = $_POST['peroleh'];
$tanggal = $_POST['tanggal'];

//simpan data ke database
$query = mysql_query("insert into buku values('$id_buku', '$judul', '$terbit', '$penerbit', '$halaman', '$jumlah', '$peroleh', '$tanggal')") or die(mysql_error());

if ($query) {
          header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=data_buku");
}
?>
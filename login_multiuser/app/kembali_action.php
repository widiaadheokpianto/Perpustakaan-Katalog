<?php
include "koneksi_transaksi.php";
include "kembali_config.php";

$id_trans	= isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : "";
$judul		= isset($_GET['judul']) ? $_GET['judul'] : "";

if ($id_trans==""||$judul=="") {
	echo "<script>alert('Pilih dulu buku yang akan dikembalikan');</script>";
	echo header("location:http://localhost/walah/login_multiuser/app/data_transaksi.php");
} else {
	$us=mysql_query("UPDATE transaksi SET status='Kembali' WHERE id_transaksi='$id_trans'")or die ("Gagal update".mysql_error());
	$uj=mysql_query("UPDATE buku SET jumlah=(jumlah+1) WHERE judul='$judul'")or die ("Gagal update".mysql_error());

	if ($us || $uj) {
		echo "<script>alert('Berhasil Dikembalikan')</script>";
		echo header("location:http://localhost/walah/login_multiuser/app/data_transaksi.php");
	} else {
		echo "<script>alert('Gagal Dikembalikan')</script>";
		echo header("location:http://localhost/walah/login_multiuser/app/data_transaksi.php");
	}
}
?>
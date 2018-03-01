<?php
$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";

$dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah_buku		= explode (".", $dapat_buku);
$id				= $pecah_buku[0];
$buku			= $pecah_buku[1];

$dapat_mhs		= isset($_POST['peminjam']) ? $_POST['peminjam'] : "";
$pecah_mhs		= explode (".", $dapat_mhs);
$id_mhs 		= $pecah_mhs[0];
$mhs			= $pecah_mhs[1];

$ket			= isset($_POST['ket']) ? $_POST['ket'] : "";

if($buku == "" || $dapat_buku == "") {
	echo "<script>alert('Pilih bukunya terlebih dahulu');</script>";
	echo header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi");
} elseif ($mhs == "" || $dapat_mhs == "") {
	echo "<script>alert('Pilih peminjamnya terlebih dahulu');</script>";
	echo header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi");
} else {
	include "koneksi_transaksi.php";
	$query=mysql_query("SELECT * FROM buku WHERE judul = '$buku'", $konek);
	while ($hasil=mysql_fetch_array($query)) {
		$sisa=$hasil['jumlah'];
	} 
	
	if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
		echo header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi");
	} else {
		$qt			= mysql_query("INSERT INTO transaksi VALUES (null, '$buku', '$id', '$mhs', '$id_mhs', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', '$ket')", $konek) or die ("Gagal Masuk".mysql_error());

		$qu			= mysql_query("UPDATE buku SET jumlah=(jumlah-1) WHERE id_buku=$id ", $konek);

		if ($qt&&$qu) {
	        echo "<script>alert('Transaksi Sukses');</script>";
			echo header("location:http://localhost/walah/login_multiuser/homeadmin.php?app=transaksi");
			
		} else {
			echo "<script>alert('Transaksi Gagal');</script>";
			echo "location:http://localhost/Project/login_multiuser/homeadmin.php?app=transaksi";
		}
	}
}
?>
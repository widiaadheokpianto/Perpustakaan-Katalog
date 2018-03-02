<!DOCTYPE html>
<?php
include "koneksi_transaksi.php";
include "transaksi_fungsi.php";

$query=mysql_query("SELECT * FROM transaksi ORDER BY id_transaksi", $konek);
?>

<?php
$hari = date("d-m-Y");
$proses	= mktime(0,0,0,date("n"),date("j")+0,date("Y"));
$hari_ini = date("d-m-Y", $proses);
?>

<html>
<head>
<title>Laporan</title>
<link rel="shortcut icon" href="../asset/img/book.ico">
</head>
<body>
<h2><center>Laporan History Transaksi Perpustakaan Universitas Singaperbangsa Karawang</center></h2>
<center>Tanggal :&nbsp;<?php echo $hari_ini; ?> </center><br>
<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
            <td align="left">No</td>
		    <td align="left">Judul Buku</td>
			<td align="left">ID Buku</td>
			<td align="left">Nama Peminjam</td>
			<td align="left">ID Peminjam</td>
			<td align="left">Tgl. Pinjam</td>
			<td align="left">Tgl. Kembali</td>
			<td align="left">Status</td></tr>
	    </tr>
	</thead>
	<tbody>
<?php
$no=0;
while ($hasil=mysql_fetch_array($query)) {
$no++;
echo "<tr>
	  <td class='td-data'>$no</td>
      <td class='tpinggir-data'>$hasil[1]</td>
	  <td class='td-data'>$hasil[2]</td>
	  <td class='td-data'>$hasil[3]</td>
	  <td class='td-data'>$hasil[4]</td>
	  <td class='td-data'>$hasil[5]</td>
	  <td class='td-data'>$hasil[6]</td>
	  <td class='td-data'>$hasil[7]</td>
	  </tr>";
}
?>
</tbody>
</table>
<center>________________________________________________________________________________</center>
<h4><center>Admin-Tian &amp; Admin-Mey</center></h4>
</body>
</html>
<script>
window.print();
</script>
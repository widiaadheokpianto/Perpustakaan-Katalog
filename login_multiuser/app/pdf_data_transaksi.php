<!DOCTYPE html>
<?php
include "koneksi_transaksi.php";
include "transaksi_fungsi.php";

$query=mysql_query("SELECT * FROM transaksi WHERE status='Pinjam' ORDER BY id_transaksi", $konek);
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
<h2><center>Laporan Data Transaksi Perpustakaan Universitas Singaperbangsa Karawang</center></h2>
<center>Tanggal :&nbsp;<?php echo $hari_ini; ?> </center><br>
<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
        <tr><td align="left">No</td>
		    <td align="left">Judul Buku</td>
			<td align="left">ID Buku</td>
			<td align="left">Nama Peminjam</td>
			<td align="left">ID Peminjam</td>
			<td align="left">Tgl. Pinjam</td>
			<td align="left">Tgl. Kembali</td>
			<td align="left">Status</td>
			<td align="left">Keterangan</td>
			<td align="left">Terlambat</td>
			<td align="left">Kembali</td>
			<td align="left">Perpanjang</td>
	    </tr>
	</thead>
	<tbody>
<?php
$no=0;
while ($hasil=mysql_fetch_array($query)) {
$no++;
echo "<tr>
	  <td class='td-data'>$no</td>
      <td class='pinggir-data'>$hasil[1]</td>
	  <td class='td-data'>$hasil[2]</td>
	  <td class='td-data'>$hasil[3]</td>
	  <td class='td-data'>$hasil[4]</td>
	  <td class='td-data'>$hasil[5]</td>
	  <td class='td-data'>$hasil[6]</td>
	  <td class='td-data'>$hasil[7]</td>
	  <td class='td-data'>$hasil[8]</td>
	  <td class='td-data'>";

	    $tgl_dateline=$hasil['tgl_kembali'];
		$tgl_kembali=date('d-m-Y');
		$lambat=terlambat($tgl_dateline, $tgl_kembali);
		$denda=$lambat*$denda1;
		if ($lambat>0) {
		echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
		}
		else {
		echo $lambat." hari";
		}
echo "</td>
	  <td class='td-data'><a href='kembali_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]'><i class='btn btn-mini'>Kembali&nbsp;<i class='icon-check'></i></i></a></td>
	  <td class='td-data'><a href='perpanjang_action.php?id_transaksi=$hasil[id_transaksi]&judul=$hasil[1]&kembali=$hasil[6]&lambat=$lambat'><i class='btn btn-mini'>Perpanjang&nbsp;<i class='icon-plus-sign'></i></i></a></td>
	  </tr>";
}
?>
</tbody>
</table>
<center>________________________________________________________________________________</center>
</body>
</html>
<script>
window.print();
</script>
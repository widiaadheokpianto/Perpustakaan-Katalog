<!DOCTYPE html>
<?php 
include('koneksi.php');
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
<h2><center>Laporan History Data Kas Perpustakaan Universitas Singaperbangsa Karawang</center></h2>
<center>Tanggal :&nbsp;<?php echo $hari_ini; ?> </center><br>

<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
			<th align="left">ID Kas</th>
			<th align="left">Tanggal Pembayaran</th>
			<th align="left">Denda</th>
		</tr>
	</thead>
		<?php
    $sql = "SELECT * FROM kas ORDER BY id_kas";
    foreach ($dbh->query($sql) as $data) :
	?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $data['id_kas'] ?></td>
			<td><?php echo $data['tgl'] ?></td>
            <td><?php echo $data['denda'] ?></td>
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>

<br>

<?php
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("project_perpustakaan") or die(mysql_error());
?>
<table align="center" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td>Jumlah</td>
        <td>
        <?php
        $qry_jumlah_denda=mysql_query("SELECT SUM(denda) FROM kas");
        $data_denda=mysql_fetch_array($qry_jumlah_denda);
        $jumlah_nilai_denda=$data_denda[0];
        echo $jumlah_nilai_denda;
        ?>
        </td>
    </tr>
</tbody>
</table>
<center>________________________________________________________________________________</center>
<h4><center>Admin-Tian &amp; Admin-Mey</center></h4>
</body>
</html>
<script>
window.print();
</script>
<!DOCTYPE html>
<?php 
include('koneksi.php');
?>

<html>
<body>
<div class="jumbotron">
	<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){ ?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> Maaf Anda Harus Login sebagai level Admin terlebih dahulu untuk mengakses halaman ini </div>';//jika bukan admin jangan lanjut
die ('');
?>

<?php } ?>

<img src="../money.png" width="50" height="50" style="float:left; margin:0 9px 3px 0;" /><legend>Data Kas Perpustakaan</legend></h3>

<p>
	<a href="http://localhost/Project/login_multiuser/app/input_kas.php" class="btn btn-mini"><i class="icon-qrcode"></i> Input Kas</a>&nbsp; <a href="http://localhost/Project/login_multiuser/app/pdf_data_kas.php" class="btn btn-mini"><i class="icon-print"></i> Print</a>&nbsp;
</p>


<div class="tab-content">
<table class="table table-bordered table-condensed table-hover" style="width:1px;">
	<thead>
		<tr class="nowrap">
			<th align="left">ID Kas</th>
			<th align="left">Tanggal Pembayaran</th>
			<th align="left">Denda</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "1" align="center">Alat</th>
			<?php } ?>
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
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="app/hapus_kas.php?id_kas=<?php echo $data['id_kas'] ?>" class="btn btn-mini" onClick="return confirm('Delete data buku dengan ID : <?php echo $data['id_kas'];?>');"><i class="icon-trash"></i> Delete</a></td>
			<?php } ?>
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>

<?php
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("project_perpustakaan") or die(mysql_error());
?>
<table class="table table-bordered table-condensed table-hover" style="width:1px;">
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
</table>
<p><b>Note : </b>Data di atas merupakan data uang kas yang telah tersimpan setelah melakukan proses transaksi bila ada mahasiswa yang dikenakan denda.</p>
</div>
</div>


<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

</body>
</html>
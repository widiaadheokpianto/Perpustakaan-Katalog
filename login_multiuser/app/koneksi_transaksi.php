<?php

$db_host	= "localhost";
$db_user	= "root";
$db_pass	= "";
$db_name	= "project_perpustakaan";

$konek	= mysql_connect($db_host,$db_user,$db_pass,$db_name) or die ("Gagal Koneksi ke Server");
mysql_select_db($db_name, $konek) or die ("Gagal Mengaktifkan Database".mysql_error());

$denda1=500;
?>
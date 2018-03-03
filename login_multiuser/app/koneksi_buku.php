<?php
//host yang digunakan
$host = 'localhost'; 
 
//username untuk login ke host
$user = 'root'; 
 
//password host
$pass = '';
 
//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'project_perpustakaan';
 
//mengubung ke host
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
 
//memilih database yang akan digunakan
$dbselect = mysql_select_db($dbname);
?>
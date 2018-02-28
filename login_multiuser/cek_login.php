<?php
session_start();
// koneksi database -------------------------------------------->
$db = new mysqli ( "localhost" , "root" , "" , "project_perpustakaan" );
echo $db->connect_errno?'Koneksi gagal : '.$db->connect_error:'';
//<--------------------------------------------------------------

if(isset($_POST['username']) && ($_POST['password'])){
	 $username = $db->real_escape_string($_POST['username']);
	 $password = $db->real_escape_string($_POST['password']);
	 $sql = "select * from user where username = '$username' AND password = '$password'";
	 $result = $db->query($sql) or die('Terjadi Kesalahan : '.$db->error);
 
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  $_SESSION['username'] = $row['username'];
		  $_SESSION['nama'] = $row['nama'];
		  $_SESSION['level'] = $row['level'];
		if($row['level']=="admin"){
            header("location:homeadmin.php");
        }
		else if($row['level']=="user"){
            header("location:homeuser.php");
		}
		  $_SESSION['pesan'] = '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>
		  						<strong> Selamat datang </strong><b>'.$_SESSION['nama'].'</b> Anda login dengan level : <b>'.$_SESSION['level'].'</b></div>';

	}else{
		$_SESSION['error']="Username atau Password salah";
		header("location:index.php?app=login");
	}
}else{
	//jika tidak menggunakan html5 ( 'required' pada form login )
	//pesan ini akan muncul
	$_SESSION['error']="Username atau password tidak boleh kosong"; 
	header("location:index.php?app=login");
}
?>
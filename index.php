<?php 
	
	//zona waktu indonesia
	date_default_timezone_set('Asia/Jakarta');
	//menghilangkan notifikasi error
	error_reporting(0);
	//include koneksi
	include ("config/koneksi.php");
	//memulai session
	session_start();

	if(isset($_SESSION['username'])){
		//jika sudah login
		header('location:./chat');
	} else {
		//jika belum login
		header('location:./auth/login');
	}

?>
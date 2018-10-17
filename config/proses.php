<?php 
	//koneksi
	require_once("koneksi.php");
	//function
	require_once("function.php");

	$action = $_GET['action'];
	$result = "";

	if($action == "login"){
		//data
		$username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        //function login
		$result = login($username,$password,$db,$result);

	} else if ($action == "daftar"){
		//data
		$nama = addslashes($_POST['nama']);
        $email = addslashes($_POST['email']);
        $username = addslashes($_POST['username']);
        $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT);
        //function daftar
		$result = daftar($nama,$email,$username,$password,$db,$result);

	}

	echo json_encode($result);

 ?>
<?php 
	//koneksi
	require_once("koneksi.php");
	//function
	require_once("function.php");

	session_start();

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

	} else if ($action == "kirimpesan"){
		//data
		$id_pengirim = addslashes($_SESSION['id']);
        $id_penerima = addslashes("3");
        $message = addslashes($_POST['message']);
        //function kirimpesan
		$result = kirimpesan($id_pengirim,$id_penerima,$message,$db,$result);

	} else if ($action == "kirimstatus"){
		//data
		$id_user = addslashes($_POST['id_user']);
        $status = addslashes($_POST['status']);
        //function kirimstatus
		$result = kirimstatus($id_user,$status,$db,$result);

	} else if ($action == "ambilkontak"){

        //function ambilkontak
		$result = ambilkontak($db,$result);

	}

	echo json_encode($result);

 ?>
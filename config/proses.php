<?php 
    //menghilangkan notifikasi error
    error_reporting(0);
	//koneksi
	require_once("koneksi.php");
	//function
	require_once("function.php");
	//generate
	require_once("generate.php");

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

		$username_user = $_POST['username_chat'];
        //function ambilkontak
		$result = ambilkontak($username_user,$db,$result);

	} else if ($action == "carikontak"){
		//data
		$key = $_POST['key'];
        //function ambilkontak
		$result = carikontak($key,$db,$result);

	} else if ($action == "bukachat"){

        //function ambilkontak
		$result = bukachat($db,$result);

	} else if ($action == "cekchat"){
		//data
		$jml_awal = $_POST['jml_awal'];
        //function ambilkontak
		$result = cekchat($jml_awal,$db,$result);

	} else if ($action == "loadmoremsg"){
		//data
		$requested_page = $_POST['page_num'];
        //function ambilkontak
		$result = loadmoremsg($requested_page,$db,$result);

	} else if ($action == "tambahkontak"){
		//data
		$username_add = $_POST['username_add'];
		$username_from = $_POST['username_from'];
		$kode_kontak = generate(10);
        //function ambilkontak
		$result = tambahkontak($username_add,$username_from,$kode_kontak,$db,$result);

	} else if ($action == "loadInvitation"){
		//data
		$username = $_POST['username'];
		// $kode_kontak = generate(10);
        //function ambilkontak
		$result = loadInvitation($username,$db,$result);

	}

	echo json_encode($result);

 ?>